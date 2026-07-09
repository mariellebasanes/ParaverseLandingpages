<script src="/assets/plugins/custom/draggable/draggable.bundle.js"></script>
<script>
    const RankingManager = {
        poll: null,

        renderPoll: async function (poll) {
            this.poll = poll;

            if (poll.user_responded) {
                this.loadPollResults();
            } else {
                if (!this.poll.options) {
                    await this.loadPollOptions();
                }
                this.renderPollForm();
            }
        },

        loadPollOptions: async function () {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "/elicit/ranking/index-ajax-get-options.php",
                    data: { poll_id: this.poll.id },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    this.poll.options = response.options;
                    return this.poll.options;
                } else {
                    throw new Error(response.message || 'Failed to load options');
                }
            } catch (error) {
                console.error('Error loading options:', error);
                $('#polls-content').html(`
                    <div class="text-center py-10">
                        <i class="bi bi-exclamation-triangle fs-1 text-danger mb-3"></i>
                        <p class="text-danger">Could not load poll options.</p>
                        <button class="btn btn-sm btn-outline-primary mt-2" onclick="RankingManager.renderPoll(RankingManager.poll)">Try Again</button>
                    </div>
                `);
                return [];
            }
        },

        renderPollForm: function () {
            const optionsHtml = this.poll.options.map((opt, index) => {
                const displayText = opt.option ?? `Option ${index + 1}`;
                return `<div class="draggable" data-option-id="${opt.id}">
                            <div class="option-item bg-light-secondary hover-elevate-up p-4 rounded-3 border border-gray-300 draggable-handle mb-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <span class="badge badge-primary badge-circle badge-lg me-4 rank-badge" style="display: none;">1</span>
                                        <span class="option-text fs-5 text-gray-800 fw-bold">${displayText}</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <i class="ki-duotone ki-element-plus fs-2 text-gray-400"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                    </div>
                                </div>
                            </div>
                        </div>`;
            }).join('');

            $('#polls-content').html(`<form id="submit-poll-form" data-poll-type="ranking">
                <div class="d-flex justify-content-between mb-6">
                    <div class="d-flex gap-3 align-items-center">
                        <div class="symbol symbol-40px d-flex align-items-center justify-content-center">
                            <img src="/elicit/assets/images/poll-types/ranking.svg" class="w-35px">
                        </div>
                        <h5 class="poll-question fw-bolder mb-0 fs-3">${this.poll.question ?? 'Untitled'}</h5>
                    </div>
                    <div class="d-flex gap-2 align-items-center text-gray-600">
                        <span id="total_votes" class="fs-4 fw-bold">0</span>
                        <i class="fs-3 bi bi-people"></i>
                    </div>
                </div>
                
                <div class="card card-dashed bg-light-primary border-primary border-dashed mb-8">
                    <div id="ranked-zone" class="card-body py-6 px-4 d-flex flex-column gap-3 draggable-zone min-h-100px">
                        <div class="drop-placeholder text-center py-4">
                            <i class="ki-duotone ki-mouse-square fs-2tx text-primary opacity-50 mb-2"><span class="path1"></span><span class="path2"></span></i>
                            <p class="fs-5 text-primary fw-semibold mb-0">Drag options here to rank them</p>
                            <span class="fs-7 text-muted">Items at the top have higher rank</span>
                        </div>
                    </div>
                </div>

                <div class="separator separator-content border-gray-300 my-8">
                    <span class="text-gray-500 fw-bold fs-7 uppercase">Available Options</span>
                </div>

                <div id="available-zone" class="d-flex flex-column gap-3 draggable-zone min-h-150px">
                    ${optionsHtml}
                </div>

                <div class="mt-8 d-flex justify-content-center">
                    <button id="submit-poll-btn" type="submit" class="btn btn-primary rounded-pill fw-bolder px-12 py-4 fs-4 shadow-sm">
                        <i class="ki-duotone ki-send fs-2 me-2"><span class="path1"></span><span class="path2"></span></i>
                        Send Rankings
                    </button>
                </div>
            </form>`);

            this.initFormEvents();
        },

        initFormEvents: function () {
            let containers = document.querySelectorAll(".draggable-zone");
            if (containers.length === 0) return;

            let swappable = new Draggable.Sortable(containers, {
                draggable: ".draggable",
                handle: ".draggable .draggable-handle",
                mirror: {
                    appendTo: "body",
                    constrainDimensions: true
                }
            });

            swappable.off('sortable:stop');

            swappable.on('sortable:stop', () => {
                setTimeout(() => {
                    this.updateRankBadges();
                }, 0);
            });

            this.updateRankBadges();

            $('#submit-poll-form').off('submit').on('submit', (e) => {
                e.preventDefault();

                const rankedOptions = $('#ranked-zone .draggable').map(function () {
                    return $(this).data('option-id');
                }).get();

                if (rankedOptions.length === 0) {
                    toastr.error('Please rank at least one option.');
                    return;
                }

                $('#submit-poll-btn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Sending...');

                // log formData for debugging

                console.log("poll id", this.poll.id);
                console.log("ranked options", rankedOptions);

                $.ajax({
                    type: "POST",
                    url: "/elicit/ranking/index-ajax-submit-response.php",
                    data: {
                        poll_id: this.poll.id,
                        ranked_options: rankedOptions
                    },
                    dataType: 'json',
                    success: (response) => {
                        if (response.status === 'success') {
                            toastr.success('Your vote has been recorded!');
                            this.loadPollResults();
                        } else {
                            toastr.error(response.message || 'Error submitting rankings.');
                            $('#submit-poll-btn').prop('disabled', false).text('Send');
                        }
                    },
                    error: (xhr, status, error) => {
                        toastr.error('Error submitting vote. Please try again.');
                        $('#submit-poll-btn').prop('disabled', false).text('Send');
                    }
                });
            });
        },

        updateRankBadges: function () {
            const rankedZone = $('#ranked-zone');
            const availableZone = $('#available-zone');
            const placeholder = rankedZone.find('.drop-placeholder');

            $('.draggable').each(function () {
                const badge = $(this).find('.rank-badge');
                const isRanked = $(this).closest('#ranked-zone').length > 0;

                if (isRanked) {
                    badge.show();
                    $(this).find('.option-item').removeClass('bg-light-secondary border-gray-300').addClass('bg-white border-primary shadow-sm');
                } else {
                    badge.hide();
                    $(this).find('.option-item').removeClass('bg-white border-primary shadow-sm').addClass('bg-light-secondary border-gray-300');
                }
            });

            const rankedItems = rankedZone.find('.draggable');

            rankedItems.each(function (index) {
                $(this).find('.rank-badge').text(index + 1);
            });

            if (rankedItems.length === 0) {
                placeholder.show();
            } else {
                placeholder.hide();
            }
        },

        loadPollResults: async function () {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "/elicit/ranking/index-ajax-get-responses.php",
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
            $('#polls-content').html(`<div class="poll-results-container">
                <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex gap-2 align-items-center">
                        <img src="/elicit/assets/images/poll-types/ranking.svg" class="w-35px">
                        <h5 class="poll-question fw-bold mb-0">${this.poll.question ?? 'Untitled'}</h5>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <span id="total_votes" class="fs-5">${results.total_votes}</span>
                        <i class="fs-3 bi bi-people"></i>
                    </div>
                </div>
                <div class="card">
                    <div id="ranking-options-container" class="card-body"></div>
                </div>
            </div>`);

            this.updateData(results);
        },

        updateData: function (results) {
            $('.poll-question').text(results.question || 'Untitled')
            $('#total_votes').text(results.total_votes);

            const options = results.options.map((opt, idx) => ({
                ...opt, orig_id: idx + 1, average: Number(opt.average)
            }));
            const sortedOptions = options.sort((a, b) => b.average - a.average);
            const totalOptions = results.options.length;
            const container = $('#ranking-options-container');

            const existingElements = {};
            container.children('.poll-question-option').each(function () {
                const id = $(this).data('option-id');
                if (id) existingElements[id] = $(this);
            });

            const processedIds = new Set();

            sortedOptions.forEach((opt, index) => {
                const item = existingElements[opt.id];
                const displayText = opt.option ?? `Option ${opt.orig_id}`;
                const percentage = totalOptions > 0 ? (opt.average / totalOptions) * 100 : 0;
                const barColor = opt.average > 0 ? 'bg-primary' : 'bg-gray-300';

                if (item) {
                    container.append(item);
                    item.find('.option').html(`<span class="me-2">${index + 1}.</span> ${displayText}`);

                    const bar = item.find('.progress-bar');
                    bar.css('width', percentage + '%').attr('aria-valuenow', percentage);
                    bar.removeClass('bg-primary bg-gray-300').addClass(barColor);
                } else {
                    const newEl = $(`<div class="poll-question-option mb-7" data-option-id="${opt.id}">
                        <div class="option fw-semibold text-gray-800 mb-2">
                            <span class="me-2">${index + 1}.</span> ${displayText}
                        </div>
                        <div class="d-flex align-items-center gap-4">
                            <div class="progress bg-gray-300 flex-grow-1 rounded-pill"
                                role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                style="height: 20px;">
                                <div class="progress-bar progress-bar-animated rounded-pill ${barColor}" style="width: ${percentage}%">
                                </div>
                            </div>
                        </div>
                    </div>`);
                    container.append(newEl);
                }

                const formOption = $(`.draggable[data-option-id="${opt.id}"] .option-text`);
                if (formOption.length) {
                    formOption.text(displayText);
                }
                processedIds.add(opt.id);
            });

            Object.keys(existingElements).forEach(id => {
                if (!processedIds.has(parseInt(id))) {
                    existingElements[id].remove();
                }
            });
        }
    };
</script>