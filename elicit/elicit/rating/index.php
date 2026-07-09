<style>
    .star {
        cursor: pointer;
        padding: 8px;
        border-radius: 6px;
        background-color: #f8f9fa;
        transition: all 0.2s ease-in-out;
    }

    .star:hover {
        transform: scale(1.1);
    }

    .no-active-poll {
        text-align: center;
        padding: 40px 20px;
    }

    .rating-stars {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin: 20px 0;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    const RatingManager = {
        currentRating: 0,
        chart: null,
        poll: null,

        renderPoll: function (poll) {
            this.poll = poll;

            if (this.chart && this.chart.root) {
                this.chart.root.dispose();
                this.chart = null;
            }

            if (poll.user_responded) {
                this.loadPollResults();
            } else {
                this.renderPollForm();
            }
        },

        renderPollResults: function (results) {
            $('#polls-content').html(`
                <div class="poll-results-container">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="/elicit/assets/images/poll-types/rating.svg" class="w-35px">
                            <h5 class="poll-question fw-bold mb-0">${this.poll.question ?? 'Untitled'}</h5>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <span id="total_votes" class="fs-5">${results.total_votes}</span>
                            <i class="fs-3 bi bi-people"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="badge badge-success rounded-pill text-white gap-2 fs-5 px-7 py-4">
                                Score:
                                <i class="bi bi-star-fill text-white"></i>
                                <span id="average_rating">${results.average_rating}</span>
                            </div>
                            <div id="rating-chart" class="col-12 min-h-auto h-400px"></div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <p class="text-muted">
                            <i class="bi bi-arrow-clockwise me-1"></i>
                            Results update in real-time
                        </p>
                    </div>
                </div>
            `);

            this.initChart(results);
        },

        renderPollForm: function () {
            $('#polls-content').html(`<form id="submit-poll-form" data-poll-type="rating">
                <div class="d-flex gap-2 align-items-center mb-3">
                    <img src="/elicit/assets/images/poll-types/rating.svg" class="w-35px">
                    <h5 class="poll-question fw-bold mb-0">${this.poll.question ?? 'Untitled'}</h5>
                </div>
                <div class="card">
                    <div class="d-flex flex-column align-items-center card-body p-15">
                        <label for="rating_stars" class="form-label fs-5 fw-normal mb-5">Give your rating</label>
                        <div class="rating-stars d-flex gap-3">
                        ${[1, 2, 3, 4, 5].map(val => `
                            <div class="star" data-value="${val}">
                                <i class="bi bi-star fs-1"></i>
                            </div>`).join('')}
                        </div>
                    </div>
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    <button id="submit-poll-btn" type="submit" class="btn btn-primary rounded-pill fw-bold px-10 fs-5"><i class="ki-duotone ki-send fs-2 me-2"><span class="path1"></span><span class="path2"></span></i>Send</button>
                </div>
            </form>`);
            this.initRatingEvents();
        },

        loadPollResults: async function () {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "/elicit/rating/index-ajax-get-responses.php",
                    data: { poll_id: this.poll.id },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    console.log("response", response);
                    this.renderPollResults(response);
                }
            } catch (error) {
                console.error('Error loading poll results:', error);
            }
        },

        updateData(response) {
            $('.poll-question').text(response.question || 'Untitled')

            if (!this.chart) return;

            const chartData = Object.entries(response.ratings).map(([rating, data]) => ({
                rating: rating.toString(),
                votes: data.votes,
                percentage: data.percentage,
                isUserRating: parseInt(rating) === this.poll.user_rating
            }));

            this.chart.xAxis.data.setAll(chartData);
            this.chart.series.data.setAll(chartData);

        },

        initChart(response) {
            if (typeof am5 === "undefined") return;

            if (this.chart && this.chart.root) {
                this.updateData(response);
                return;
            }

            am5.ready(() => {
                const root = am5.Root.new('rating-chart');
                root._logo.dispose();
                root.setThemes([am5themes_Animated.new(root)]);

                const chart = root.container.children.push(
                    am5xy.XYChart.new(root, { panX: false, panY: false, layout: root.verticalLayout })
                );

                const xAxis = chart.xAxes.push(
                    am5xy.CategoryAxis.new(root, {
                        categoryField: "rating",
                        renderer: am5xy.AxisRendererX.new(root, { minGridDistance: 30 })
                    })
                );

                xAxis.get("renderer").labels.template.setAll({
                    paddingTop: 20, fontWeight: "700",
                    fill: am5.color(KTUtil.getCssVariableValue('--bs-gray-500'))
                });

                xAxis.get("renderer").grid.template.setAll({ disabled: true, strokeOpacity: 0 });

                const yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                    renderer: am5xy.AxisRendererY.new(root, {})
                }));

                yAxis.get("renderer").labels.template.set('visible', false);

                yAxis.get("renderer").grid.template.setAll({
                    strokeWidth: 0,
                    visible: false
                });

                const series = chart.series.push(
                    am5xy.ColumnSeries.new(root, {
                        xAxis: xAxis, yAxis: yAxis,
                        valueYField: "votes", categoryXField: "rating"
                    })
                );

                series.columns.template.setAll({
                    tooltipY: 0, strokeOpacity: 0, cornerRadiusBR: 0, cornerRadiusTR: 6, cornerRadiusBL: 0, cornerRadiusTL: 6,
                });

                series.columns.template.adapters.add("tooltipText", (text, target) => {
                    const value = target.dataItem.get("valueY");
                    const category = target.dataItem.get("categoryX");
                    return `${category} ⭐: ${value} ${value === 1 ? "vote" : "votes"}`;
                });

                series.bullets.push(() => am5.Bullet.new(root, {
                    locationY: 1,
                    sprite: am5.Label.new(root, {
                        text: "{percentage}%", fill: am5.color(0x000000), fontWeight: "600", fontSize: 15, centerY: am5.p100, centerX: am5.p50, populateText: true
                    })
                }));

                series.bullets.push(() => am5.Bullet.new(root, {
                    sprite: am5.Label.new(root, {
                        text: "{valueY}", fill: am5.color(0xFFFFFF),
                        centerY: am5.p50, centerX: am5.p50, populateText: true
                    })
                }));

                series.bullets.push(function (root, series, dataItem) {
                    if (dataItem.dataContext?.isUserRating) {
                        return am5.Bullet.new(root, {
                            locationY: 1,
                            sprite: am5.Graphics.new(root, {
                                fill: am5.color(0x000000),
                                dy: -30,
                                centerY: am5.p100,
                                centerX: am5.p50,
                                svgPath: "M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08s5.97 1.09 6 3.08c-1.29 1.94-3.5 3.22-6 3.22z"
                            })
                        });
                    }
                    return false;
                });

                this.chart = { root, chart, xAxis, series };

                this.updateData(response);

                series.appear(1000);
                chart.appear(1000, 100);
            });
        },

        initRatingEvents: function () {
            this.setStars(0);
            this.currentRating = 0;

            $('#polls-content').off('click', '.star').on('click', '.star', (e) => {
                const rating = parseInt($(e.currentTarget).data('value'));
                this.currentRating = this.currentRating === rating ? 0 : rating;
                this.setStars(this.currentRating);
            });

            $('#polls-content').off('mouseenter', '.star').on('mouseenter', '.star', (e) => {
                this.setStars(parseInt($(e.currentTarget).data('value')));
            });

            $('#polls-content').off('mouseleave', '.rating-stars').on('mouseleave', '.rating-stars', () => {
                this.setStars(this.currentRating);
            });

            $('#submit-poll-form').off('submit.rating').on('submit.rating', (e) => {
                e.preventDefault();

                if (this.currentRating === 0) {
                    toastr.error('Please select a rating before submitting.');
                    return;
                }

                $('#submit-poll-btn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Sending...');

                $.ajax({
                    type: "POST",
                    url: "/elicit/rating/index-ajax-submit-rating.php",
                    data: {
                        poll_id: this.poll.id,
                        rating: this.currentRating
                    },
                    dataType: 'json',
                    success: (response) => {
                        if (response.status === 'success') {
                            toastr.success('Rating submitted successfully!');
                            this.loadPollResults();
                        } else {
                            toastr.error(response.message || 'Error submitting rating.');
                            $('#submit-poll-btn').prop('disabled', false).text('Send');
                        }
                    },
                    error: function (xhr, status, error) {
                        toastr.error('Error submitting rating. Please try again.');
                        console.error('Rating submission error:', error);
                        $('#submit-poll-btn').prop('disabled', false).text('Send');
                    }
                });
            });
        },

        setStars: function (rating) {
            $('.star').each(function () {
                if ($(this).data('value') <= rating) {
                    $(this).find('i').removeClass('bi-star').addClass('bi-star-fill text-warning');
                } else {
                    $(this).find('i').removeClass('bi-star-fill text-warning').addClass('bi-star');
                }
            });
        }
    };
</script>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>