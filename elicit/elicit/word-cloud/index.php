
<script>
    const WordCloudManager = {
        chart: null,
        poll: null,

        randomDarkColor: function () {
            const h = Math.floor(Math.random() * 360);
            const s = 70 + Math.floor(Math.random() * 30);
            const l = 20 + Math.floor(Math.random() * 21);
            return `hsl(${h}, ${s}%, ${l}%)`;
        },

        renderPoll: async function (poll) {
            this.poll = poll;

            if (poll.user_responded) {
                this.loadPollResults();
            } else {
                this.renderPollForm();
            }
        },

        renderPollForm: function () {
            $('#polls-content').html(`<form id="submit-poll-form" data-poll-type="word-cloud">
                <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex gap-2 align-items-center">
                        <img src="/elicit/assets/images/poll-types/word-cloud.svg" class="w-35px">
                        <h5 class="poll-question fw-bold mb-0">${this.poll.question ?? 'Untitled'}</h5>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <span id="total_votes" class="fs-5">0</span>
                        <i class="fs-3 bi bi-people"></i>
                    </div>
                </div>

                <div id="dynamic-fields">
                    <input type="text" name="responses[]" class="form-control mb-5" placeholder="Enter a word" required>
                </div>

                <div class="mt-5 d-flex justify-content-center">
                    <button id="submit-poll-btn" type="submit" class="btn btn-primary rounded-pill fw-bold px-10 fs-5"><i class="ki-duotone ki-send fs-2 me-2"><span class="path1"></span><span class="path2"></span></i>Send</button>
                </div>
            </form>`);

            this.initFormEvents();
        },

        initFormEvents: function () {
            $('#dynamic-fields').on('input', 'input', (e) => {
                const value = $(e.target).val().trim();
                const isLast = $(e.target).is(':last-child');

                if (isLast && value !== '') {
                    const hasOtherEmpty = $('#dynamic-fields').children('input').filter(function () {
                        return $(this).val().trim() === '' && !$(this).is(currentInput);
                    }).length > 0;

                    if (!hasOtherEmpty) {
                        const newField = $('<input type="text" name="responses[]" class="form-control mb-5" placeholder="Enter another word (optional)">');
                        $(e.target).after(newField);
                    }
                }
            });

            $('#dynamic-fields').on('focus', 'input', (e) => {
                $('#dynamic-fields').children('input').each(function (index) {
                    if (index > $(e.target).index()) {
                        if ($(this).val().trim() === '') {
                            $(this).remove();
                        }
                    }
                });
            })

            $('#submit-poll-form').off('submit').on('submit', (e) => {
                e.preventDefault();

                const responses = $('input[name="responses[]"]')
                    .map(function () { return $(this).val().trim(); })
                    .get()
                    .filter(v => v !== '');

                if (responses.length === 0) {
                    toastr.warning('Please enter at least one word.');
                    return;
                }

                $('#submit-poll-btn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Sending...');

                $.ajax({
                    type: "POST",
                    url: "/elicit/word-cloud/index-ajax-submit-response.php",
                    data: {
                        poll_id: this.poll.id,
                        responses: responses
                    },
                    dataType: 'json',
                    success: (response) => {
                        if (response.status === 'success') {
                            toastr.success('Your vote has been recorded!');
                            this.loadPollResults();
                        } else {
                            toastr.error(response.message || 'Error submitting response.');
                            $('#submit-poll-btn').prop('disabled', false).text('Send');
                        }
                    },
                    error: (xhr, status, error) => {
                        toastr.error('Error submitting response. Please try again.');
                        $('#submit-poll-btn').prop('disabled', false).text('Send');
                    }
                });
            });
        },

        loadPollResults: async function () {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "/elicit/word-cloud/index-ajax-get-responses.php",
                    data: { poll_id: this.poll.id },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    this.renderPollResults(response);
                }
            } catch (error) {
                console.error('Error loading poll results:', error);
            }
        },

        renderPollResults: function (results) {
            if (this.chart) {
                this.chart.destroy();
                this.chart = null;
            }

            $('#polls-content').html(`<div class="poll-results-container">
                <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex gap-2 align-items-center">
                        <img src="/elicit/assets/images/poll-types/word-cloud.svg" class="w-35px">
                        <h5 class="poll-question fw-bold mb-0">${this.poll.question ?? 'Untitled'}</h5>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <span id="total_votes" class="fs-5">${results.total_votes}</span>
                        <i class="fs-3 bi bi-people"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center position-relative">
                        <canvas id="word-cloud-canvas" class="col-12"></canvas>
                    </div>
                </div>
            </div>`);

            this.initChart(results);
        },

        initChart: function (results) {
            try {
                this.chart = new Chart(document.getElementById('word-cloud-canvas').getContext('2d'), {
                    type: 'wordCloud',
                    data: {
                        labels: results.responses.map(r => r.key),
                        datasets: [{
                            label: '',
                            data: results.responses.map((r) => 15 + (r.value * 8)),
                            color: results.responses.map(() => this.randomDarkColor()),
                            padding: 5
                        }]
                    },
                    options: {
                        minRotation: 0,
                        maxRotation: 0,
                        plugins: {
                            tooltip: false,
                            legend: false
                        },
                    },
                });

                $('#word-cloud-chart').removeClass('d-none');
                $('#word-cloud-placeholder').addClass('d-none');
            } catch {
                $('#word-cloud-chart').addClass('d-none');
                $('#word-cloud-placeholder').removeClass('d-none');
            }
        },

        updateData: function (results) {
            $('.poll-question').text(results.question || 'Untitled');
            $('#total_votes').text(results.total_votes);

            if (!results.responses || results.responses.length === 0) {
                if (this.chart) {
                    this.chart.destroy();
                    this.chart = null;
                }
                $('#word-cloud-chart').addClass('d-none');
                $('#word-cloud-placeholder').removeClass('d-none');
                return;
            }

            if (!this.chart) {
                this.initChart(results);
            } else {
                this.chart.data.labels = results.responses.map(r => r.key);
                this.chart.data.datasets[0].data = results.responses.map((r) => 15 + (r.value * 8));
                this.chart.update();
                $('#word-cloud-chart').removeClass('d-none');
                $('#word-cloud-placeholder').addClass('d-none');
            }
        }
    };
</script>