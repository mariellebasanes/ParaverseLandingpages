<section id="rating-view" class="d-none">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="d-flex gap-3 align-items-center">
            <img src="/elicit/assets/images/poll-types/rating.svg" class="w-35px">
            <div class="d-flex flex-column">
                <h4 class="fw-bold mb-0">Rating</h4>
                <div class="votes-count text-gray-600">0 votes</div>
            </div>
        </div>
        <button type="button" class="btn btn-light btn-sm" onclick="RatingManager.deletePoll()">
            <i class="bi bi-trash3 me-2"></i>
            <span>Delete Poll</span>
        </button>
    </div>

    <div class="card border-0 shadow">
        <div class="card-body d-flex flex-column align-items-center justify-content-center">
            <div class="col-lg-12">
                <div class="fv-row mb-10">
                    <input type="text" class="question form-control mb-2" placeholder="What would you like to ask?"
                        required>
                </div>
            </div>

            <div class="badge bg-light-success rounded gap-2 fw-normal fs-6 px-4 py-3">
                Score:
                <i class="bi bi-star-fill text-gray-700"></i>
                <span id="average_rating">0.0</span>
            </div>

            <div id="rating_chart" class="col-lg-12 min-h-auto h-400px"></div>
        </div>
    </div>
</section>

<div id="saving-indicator" class="d-none position-fixed bottom-0 start-50 translate-middle-x mb-3 z-3 pe-none">
    <div class="d-flex align-items-center gap-2 px-5 py-3 rounded-3 bg-dark text-white small">
        <span id="saving-icon"></span>
        <span id="saving-text" class="fs-7"></span>
    </div>
</div>

<script>
    const RatingManager = {
        chart: null,

        async initChart() {
            if (typeof am5 === "undefined") return;

            if (this.chart && this.chart.root) {
                this.chart.root.dispose();
                this.chart = null;
            }

            return new Promise((resolve) => {
                am5.ready(() => {
                    const root = am5.Root.new('rating_chart');
                    root._logo.dispose();
                    root.setThemes([am5themes_Animated.new(root)]);

                    const chart = root.container.children.push(
                        am5xy.XYChart.new(root, { panX: false, panY: false, layout: root.verticalLayout })
                    );

                    const xAxis = chart.xAxes.push(
                        am5xy.CategoryAxis.new(root, {
                            categoryField: "rating",
                            renderer: am5xy.AxisRendererX.new(root, { minGridDistance: 30 }),
                        })
                    );

                    xAxis.get("renderer").labels.template.setAll({
                        paddingTop: 20, fontWeight: "600", fontSize: "14px",
                        fill: am5.color(KTUtil.getCssVariableValue('--bs-gray-500'))
                    });

                    xAxis.get("renderer").grid.template.setAll({ disabled: true, strokeOpacity: 0 });

                    const yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                        renderer: am5xy.AxisRendererY.new(root, {})
                    }));

                    yAxis.get("renderer").labels.template.set('visible', false);

                    yAxis.get("renderer").grid.template.setAll({ strokeWidth: 0, visible: false });

                    const series = chart.series.push(
                        am5xy.ColumnSeries.new(root, {
                            xAxis: xAxis, yAxis: yAxis,
                            valueYField: "votes", categoryXField: "rating", minHeight: 5
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
                            text: "{percentage}%", fill: am5.color(0x000000), centerY: am5.p100, centerX: am5.p50, populateText: true
                        })
                    }));

                    series.bullets.push(() => am5.Bullet.new(root, {
                        sprite: am5.Label.new(root, {
                            text: "{valueY}", fill: am5.color(0xFFFFFF),
                            centerY: am5.p50, centerX: am5.p50, populateText: true
                        })
                    }));

                    this.chart = { root, chart, xAxis, series };

                    const ratings = [
                        { rating: "1", votes: 0, percentage: 0 },
                        { rating: "2", votes: 0, percentage: 0 },
                        { rating: "3", votes: 0, percentage: 0 },
                        { rating: "4", votes: 0, percentage: 0 },
                        { rating: "5", votes: 0, percentage: 0 }
                    ];

                    xAxis.data.setAll(ratings);
                    series.data.setAll(ratings);

                    series.appear(1000);
                    chart.appear(1000, 100);

                    resolve();
                });
            });
        },

        async resetForm() {
            $('.question').val('');
            $('#average_rating').text('0.0');


            if (refreshInterval) {
                clearInterval(refreshInterval);
                refreshInterval = null;
            }

            if (this.chart) {
                this.chart.root.dispose();
                this.chart = null;
            }
        },

        async addPoll() {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "../rating/index-ajax-save-rating.php",
                    data: {
                        id: <?= $RECORD['id'] ?>,
                    },
                    dataType: 'json'
                });

                if (response.status === "success") {
                    currentPollId = response.poll_id;
                    currentPollType = 'rating';
                    currentPollVotes = 0;

                    updateVotesCount(false);
                    this.resetForm();
                    await this.initChart();
                    renderPollCard({
                        id: currentPollId,
                        poll_type: currentPollType,
                        votes: currentPollVotes,
                        is_active: false
                    });

                    highlightSidebarCard(`#poll-rating-${response.poll_id}`);
                    showView('rating');
                } else {
                    throw new Error(response.error);
                }
            } catch (error) {
                toastr.error('Error saving new rating: ' + (error.message || 'Unknown error'));
            }
        },

        async loadPollResponses(pollId) {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "/elicit/admin/events/rating/index-ajax-get-responses.php",
                    data: { poll_id: pollId },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    currentPollVotes = response.total_votes;
                    updateVotesCount(activePollId === pollId);
                    $('.question').val(response.question);
                    await this.updateData(response);
                }
            } catch (error) {
                console.error('Error loading poll data:', error);
            }
        },

        async updateData(response) {
            if (!this.chart) return;

            const chartData = Object.entries(response.ratings).map(([rating, data]) => ({
                rating: rating.toString(),
                votes: data.votes,
                percentage: data.percentage
            }));

            this.chart.xAxis.data.setAll(chartData);
            this.chart.series.data.setAll(chartData);

            $('#average_rating').text(response.average_rating);
        },

        async saveQuestion(question, pollId) {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "../rating/index-ajax-save-rating.php",
                    data: {
                        id: <?= $RECORD['id'] ?>,
                        poll_id: pollId,
                        question: question
                    },
                    dataType: 'json'
                });

                if (response.status === "success") {
                    showSavingIndicator('Saved', 'saved');
                    setTimeout(() => $('#saving-indicator').addClass('d-none'), 2000);
                    $(`#rating-${pollId} .poll-question`).text(question || 'Untitled');
                } else {
                    throw new Error(response.error);
                }
            } catch (error) {
                $('#saving-indicator').addClass('d-none');
                toastr.error('Error saving question: ' + (error.message || 'Unknown error'));
            }
        },

        async deletePoll() {
            const result = await Swal.fire({
                html: `<div class="mt-3">
                    <img src="/elicit/assets/images/warning.gif" class="w-100px h-100px mb-3">
                    <h4 class="mb-5">Delete Poll?</h4>
                    <p class="mx-4 mb-0">Are you sure you want to delete this poll? This action can't be undone.</p>
                </div>`,
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Dismiss",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-danger",
                },
            });

            if (result.isConfirmed) {
                try {
                    const response = await $.ajax({
                        type: "POST",
                        url: "../rating/index-ajax-delete-poll.php",
                        data: {
                            event_id: '<?= $RECORD['id'] ?>',
                            poll_id: currentPollId
                        },
                        dataType: 'json'
                    });

                    if (response.status === 'success') {
                        $(`#poll-rating-${currentPollId}`).remove();

                        if (activePollId === currentPollId && activePollType === 'rating') {
                            activePollId = null;
                            activePollType = null;
                        }

                        await this.resetForm();
                        currentPollId = null;
                        currentPollType = null;
                        currentPollVotes = 0;
                        loadPollsSidebar();

                        toastr.success('Poll deleted');
                        showView('default');
                    } else {
                        throw new Error(response.message);
                    }
                } catch (error) {
                    toastr.error('Error deleting poll: ' + (error.message || 'Unknown error'));
                }
            }
        }
    };
</script>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>