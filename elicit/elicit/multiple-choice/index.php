<script>
    const MultipleChoiceManager = {
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
                    url: "/elicit/multiple-choice/index-ajax-get-options.php",
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
                        <button class="btn btn-sm btn-outline-primary mt-2" onclick="MultipleChoiceManager.renderPoll(MultipleChoiceManager.poll)">Try Again</button>
                    </div>
                `);
                return [];
            }
        },

        renderPollForm: function () {
            $('#polls-content').html(`<form id="submit-poll-form" data-poll-type="multiple-choice">
                <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex gap-2 align-items-center">
                        <img src="/elicit/assets/images/poll-types/multiple-choice.svg" class="w-35px">
                        <h5 class="poll-question fw-bold mb-0">${this.poll.question ?? 'Untitled'}</h5>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <span id="total_votes" class="fs-5">0</span>
                        <i class="fs-3 bi bi-people"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-5">
                        <div class="d-flex flex-column gap-3">
                        ${this.poll.options.map((opt, index) => {
                const displayText = opt.option ?? `Option ${index + 1}`;
                return `<div class="option-item bg-light p-4 rounded-2">
                            <div class="form-check">
                                <input class="form-check-input me-3" type="radio" name="multiple_choice_option" id="opt_${opt.id}" value="${opt.id}" required>
                                <label class="form-check-label fs-6 text-dark" for="opt_${opt.id}">${displayText}</label>
                            </div>
                        </div>`;
            }).join('')}
                        </div>
                    </div>
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    <button id="submit-poll-btn" type="submit" class="btn btn-primary rounded-pill fw-bold px-10 fs-5"><i class="ki-duotone ki-send fs-2 me-2"><span class="path1"></span><span class="path2"></span></i>Send</button>
                </div>
            </form>`);

            this.initFormEvents();
        },

        initFormEvents: function () {
            $(document).on('change', 'input[name="multiple_choice_option"]', function () {
                $('.option-item').removeClass('bg-light-primary').addClass('bg-light');
                const checked = $('input[name="multiple_choice_option"]:checked');
                if (checked.length) {
                    checked.closest('.option-item').removeClass('bg-light').addClass('bg-light-primary');
                }
            });

            $(document).on('click', '.option-item', function (e) {
                if ($(e.target).is('input[type="radio"], label')) return;

                const radio = $(this).find('input[type="radio"]');
                if (!radio.is(':checked')) {
                    radio.prop('checked', true).trigger('change');
                }
            });

            $('.option-item').addClass('bg-light').removeClass('bg-light-primary');

            $('#submit-poll-form').off('submit').on('submit', (e) => {
                e.preventDefault();
                const selectedOption = $('input[name="multiple_choice_option"]:checked').val();
                if (!selectedOption) {
                    toastr.error('Please select an option.');
                    return;
                }

                $('#submit-poll-btn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Sending...');

                $.ajax({
                    type: "POST",
                    url: "/elicit/multiple-choice/index-ajax-submit-response.php",
                    data: {
                        poll_id: this.poll.id,
                        option_id: selectedOption
                    },
                    dataType: 'json',
                    success: (response) => {
                        if (response.status === 'success') {
                            toastr.success('Your vote has been recorded!');
                            this.loadPollResults();
                        } else {
                            toastr.error(response.message || 'Error submitting vote.');
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

        loadPollResults: async function () {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "/elicit/multiple-choice/index-ajax-get-responses.php",
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
                        <img src="/elicit/assets/images/poll-types/multiple-choice.svg" class="w-35px">
                        <h5 class="poll-question fw-bold mb-0">${this.poll.question ?? 'Untitled'}</h5>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <span id="total_votes" class="fs-5">${results.total_votes}</span>
                        <i class="fs-3 bi bi-people"></i>
                    </div>
                </div>
                <div class="card">
                    <div id="mc-options-container" class="card-body"></div>
                </div>
            </div>`);

            this.updateData(results);
        },

        updateData: function (results) {
            $('.poll-question').text(results.question || 'Untitled')
            $('#total_votes').text(results.total_votes);
            const maxVotes = Math.max(...results.options.map(opt => opt.votes));
            const container = $('#mc-options-container');

            const existingOptions = {};
            container.find('.poll-question-option').each(function () {
                const id = $(this).data('option-id');
                if (id) existingOptions[id] = $(this);
            });
            const processedIds = new Set();

            results.options.forEach(opt => {
                const index = results.options.findIndex(o => o.id === opt.id);
                const displayText = opt.option ?? `Option ${index + 1}`;
                const barWidth = maxVotes > 0 ? (opt.votes / maxVotes) * 100 : 0;
                const barColor = opt.votes > 0 ? 'bg-primary' : 'bg-gray-300';
                const icon = opt.id === this.poll.user_option
                    ? `<i class="ki-duotone ki-profile-circle fs-1 ms-1 text-dark">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>`
                    : '';

                if (existingOptions[opt.id]) {
                    const el = existingOptions[opt.id]
                    el.find('.option').text(displayText);

                    const grid = el.find('.results-grid');
                    grid.css('grid-template-columns', `minmax(45px, ${barWidth}%) 50px`);

                    const bar = grid.find('> div:first-child');
                    bar.removeClass('bg-primary bg-gray-300').addClass(barColor);
                    el.find('.percentage').text(opt.percentage + '%');

                    const container = el.find('.result-data');
                    const icon = container.find('.ki-profile-circle');
                    if (opt.id === this.poll.user_option) {
                        if (!icon.length) {
                            container.append(icon);
                        }
                    } else {
                        icon.remove();
                    }
                } else {
                    const newEl = $(`
                        <div class="poll-question-option mb-4" data-option-id="${opt.id}">
                            <div class="option fw-semibold text-gray-800 mb-1">${displayText}</div>
                            <div class="results-grid" style="display: grid; grid-template-columns: minmax(45px, ${barWidth}%) 50px; align-items: center;">
                                <div class="h-100 rounded-pill ${barColor}"></div>
                                <div class="result-data d-flex align-items-center ms-3">
                                    <span class="percentage fw-bold text-dark">${opt.percentage}%</span>
                                    ${icon}
                                </div>
                            </div>
                        </div>
                    `);
                    container.append(newEl);
                }

                const formOption = $(`#opt_${opt.id}`).closest('.option-item');
                if (formOption.length) {
                    formOption.find('label.form-check-label').text(displayText);
                }
                processedIds.add(opt.id);
            });

            Object.keys(existingOptions).forEach(id => {
                if (!processedIds.has(parseInt(id))) {
                    existingOptions[id].remove();
                }
            });
        }
    };
</script>