<section id="word-cloud-view" class="d-none">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="d-flex gap-3 align-items-center">
            <img src="/elicit/assets/images/poll-types/word-cloud.svg" class="w-35px">
            <div class="d-flex flex-column">
                <h4 class="fw-bold mb-0">Word Cloud</h4>
                <div class="votes-count text-gray-600">0 votes</div>
            </div>
        </div>
        <button type="button" class="btn btn-light btn-sm" onclick="WordCloudManager.deletePoll()">
            <i class="bi bi-trash3 me-2"></i>
            <span>Delete Poll</span>
        </button>
    </div>

    <div class="card border-0 shadow">
        <div class="card-body d-flex flex-column align-items-center justify-content-center">
            <div class="col-lg-12">
                <div class="fv-row mb-5">
                    <input type="text" class="question form-control" placeholder="What would you like to ask?" required>
                </div>
            </div>
            <div class="col-12 mb-5">
                <button type="button" class="btn btn-dark btn-sm" id="review-answers-btn">
                    Review Answers
                    <span class="badge bg-secondary rounded-pill ms-2" id="review-answers-count">0</span>
                    <i class="ms-2 fa fa-angle-right"></i>
                </button>
            </div>
            <div id="review-answers-list" class="col-12 mb-10 d-none"></div>
            <div id="word-cloud-container" class="col-12">
                <canvas id="word-cloud-chart" style="width: 100%; height: 400px;"></canvas>
                <div id="word-cloud-placeholder" class="text-center d-none">
                    <span class="fs-5 text-center">Results will appear below</span>
                    <img src="/elicit/assets/images/poll-types/empty-states/word-cloud.svg" class="mt-5 w-700px">
                </div>
            </div>
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
    const WordCloudManager = {
        chart: null,
        responses: null,
        wordColors: null,

        randomDarkColor: function () {
            const h = Math.floor(Math.random() * 360);
            const s = 70 + Math.floor(Math.random() * 30);
            const l = 20 + Math.floor(Math.random() * 21);
            return `hsl(${h}, ${s}%, ${l}%)`;
        },

        async createChart() {
            try {
                const canvas = document.getElementById('word-cloud-chart');
                const existingChart = Chart.getChart(canvas);
                if (existingChart) existingChart.destroy();

                this.wordColors = this.responses.map(() => this.randomDarkColor());

                this.chart = new Chart(canvas.getContext('2d'), {
                    type: 'wordCloud',
                    data: {
                        labels: this.responses.map(r => r.key),
                        datasets: [{
                            label: '',
                            data: this.responses.map(r => 15 + (r.value * 8)),
                            color: this.wordColors,
                            padding: 5,
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
            } catch (e) {
                console.error("Word Cloud Chart Error:", e);
                $('#word-cloud-chart').addClass('d-none');
                $('#word-cloud-placeholder').removeClass('d-none');
            }
        },

        async addPoll() {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "../word-cloud/index-ajax-save-poll.php",
                    data: { id: <?= $RECORD['id'] ?> },
                    dataType: 'json'
                });

                if (response.status === "success") {
                    currentPollId = response.poll_id;
                    currentPollType = 'word-cloud';
                    currentPollVotes = 0;

                    renderPollCard({
                        id: currentPollId,
                        poll_type: currentPollType,
                        votes: currentPollVotes,
                        is_active: false
                    });

                    updateVotesCount(false);
                    highlightSidebarCard(`#poll-word-cloud-${currentPollId}`);
                    showView('word-cloud');

                    await this.loadPollResponses(currentPollId);

                    toastr.success(response.message);
                    return response.poll_id;
                } else {
                    throw new Error(response.message || 'Failed to save poll');
                }
            } catch (error) {
                toastr.error('Error saving new word cloud: ' + (error.message || 'Unknown error'));
                return null;
            }
        },

        async loadPollResponses(pollId) {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "/elicit/admin/events/word-cloud/index-ajax-get-responses.php",
                    data: { poll_id: pollId },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    $('#word-cloud-view .question').val(response.question);
                    currentPollVotes = response.total_votes;
                    updateVotesCount(activePollId === pollId);

                    this.updateData(response);
                }
            } catch (error) {
                console.error('Error loading poll responses:', error);
            }
        },

        async updateData(response) {
            this.responses = response.responses;

            if (!this.responses || this.responses.length === 0) {
                if (this.chart) {
                    this.chart.destroy();
                    this.chart = null;
                }
                this.wordColors = null;
                $('#word-cloud-chart').addClass('d-none');
                $('#word-cloud-placeholder').removeClass('d-none');
                $('#review-answers-count').text(0)
                $('#review-answers-list').addClass('d-none').empty();
                return;
            }

            if (!this.chart) {
                await this.createChart();
            } else {
                this.chart.data.labels = this.responses.map(r => r.key);
                this.chart.data.datasets[0].data = this.responses.map((r) => 15 + (r.value * 8));
                this.chart.update();
                $('#word-cloud-chart').removeClass('d-none');
                $('#word-cloud-placeholder').addClass('d-none');
            }

            $('#review-answers-count').text(currentPollVotes);

            if (!$('#review-answers-list').hasClass('d-none')) {
                this.updateReviewList();
            }
        },

        toggleReviewList() {
            const list = $('#review-answers-list');
            const icon = $('#review-answers-btn i.fa');

            list.toggleClass('d-none');

            if (list.hasClass('d-none')) {
                icon.removeClass('fa-angle-down').addClass('fa-angle-right');
            } else {
                icon.removeClass('fa-angle-right').addClass('fa-angle-down');
                this.updateReviewList();
            }
        },

        updateReviewList() {
            if (!this.responses || this.responses.length === 0) {
                $('#review-answers-list').html('<p class="text-muted">No responses yet.</p>');
                return;
            }

            const scrollTop = $('#review-answers-list').find('ul').scrollTop() ?? 0;

            const sorted = this.responses.map((r, idx) => ({
                key: r.key,
                value: r.value,
                color: this.wordColors[idx]
            })).sort((a, b) => b.value - a.value);

            const html = `
                <ul class="list-group list-group-flush" style="max-height: 300px; overflow-y: auto;">
                    ${sorted.map(item => `
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <i class="fa fa-genderless align-middle lh-1 me-2" style="color: ${item.color};"></i>
                                    <span>${item.key}</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="fs-5 fw-bold">${item.value}</span>
                                </div>
                            </div>
                        </li>
                    `).join('')}
                </ul>
            `;
            $('#review-answers-list').html(html);

            $('#review-answers-list').find('ul').scrollTop(scrollTop);
        },

        async saveQuestion(question, pollId) {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "../word-cloud/index-ajax-save-poll.php",
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
                    $(`#word-cloud-${pollId} .poll-question`).text(question || 'Untitled');
                } else {
                    throw new Error(response.message || 'Failed to save question');
                }
            } catch (error) {
                $('#saving-indicator').addClass('d-none');
                toastr.error('Error saving question: ' + (error.message || 'Unknown error'));
            }
        },

        resetForm() {
            if (this.chart) {
                this.chart.destroy();
                this.chart = null;
            }

            $('#word-cloud-view .question').val('');
            $('#word-cloud-chart').addClass('d-none');
            $('#word-cloud-placeholder').removeClass('d-none');

            $('#review-answers-list').addClass('d-none').empty();
            $('#review-answers-count').text('0');
            this.responses = null;

            $('#review-answers-btn i.fa').removeClass('fa-angle-down').addClass('fa-angle-right');

            if (refreshInterval) {
                clearInterval(refreshInterval);
                refreshInterval = null;
            }
        },

        async deletePoll(pollId) {
            const targetPollId = pollId || currentPollId;
            if (!targetPollId) return;
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
                        url: "../word-cloud/index-ajax-delete-poll.php",
                        data: {
                            event_id: '<?= $RECORD['id'] ?>',
                            poll_id: targetPollId
                        },
                        dataType: 'json'
                    });

                    if (response.status === 'success') {
                        $(`#poll-word-cloud-${targetPollId}`).remove();
 
                        if (activePollId === targetPollId && activePollType === 'word-cloud') {
                            activePollId = null;
                            activePollType = null;
                        }

                        if (currentPollId === targetPollId) {
                            await this.resetForm();
                            currentPollId = null;
                            currentPollType = null;
                            showView('default');
                        }
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

    $(document).ready(function () {
        $('#review-answers-btn').on('click', () => WordCloudManager.toggleReviewList());
    });
</script>