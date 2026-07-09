<section id="multiple-choice-view" class="d-none">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="d-flex gap-3 align-items-center">
            <img src="/elicit/assets/images/poll-types/multiple-choice.svg" class="w-35px">
            <div class="d-flex flex-column">
                <h4 class="fw-bold mb-0">Multiple Choice</h4>
                <div class="votes-count text-gray-600">0 votes</div>
            </div>
        </div>
        <button type="button" class="btn btn-light btn-sm" onclick="MultipleChoiceManager.deletePoll()">
            <i class="bi bi-trash3 me-2"></i>
            <span>Delete Poll</span>
        </button>
    </div>

    <div class="card border-0 shadow">
        <div class="card-body d-flex flex-column align-items-center justify-content-center">
            <div class="col-lg-12">
                <div class="fv-row">
                    <input type="text" class="question form-control mb-2" placeholder="What would you like to ask?"
                        required>
                </div>
            </div>
            <div class="col-lg-12">
                <div id="options_repeater">
                    <div class="form-group">
                        <div data-repeater-list="options_repeater">
                            <div data-repeater-item>
                                <div
                                    class="option-item d-flex flex-column ps-4 py-4 pe-3 rounded cursor-pointer border border-transparent form-group">
                                    <input type="hidden" class="option-id" value="">
                                    <div class="d-flex align-items-center gap-4 mb-2">
                                        <input type="text"
                                            class="form-control p-0 form-control-transparent option-input"
                                            placeholder="Option 1" />
                                        <a href="javascript:;" data-repeater-delete
                                            class="btn btn-icon btn-sm btn-active-secondary rounded-circle delete-btn invisible">
                                            <i class="bi bi-trash text-dark fs-4"></i>
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center gap-4">
                                        <div class="progress bg-gray-300 flex-grow-1 rounded-pill" role="progressbar"
                                            aria-valuemin="0" aria-valuemax="100" style="height: 20px;">
                                            <div class="progress-bar progress-bar-animated rounded-pill">
                                            </div>
                                        </div>
                                        <span class="min-w-30px percentage text-dark">0%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="javascript:;" data-repeater-create class="btn btn-active-light p-3">
                            <i class="ki-duotone ki-plus fs-3 text-gray-600"></i>
                            <span class="text-gray-600">Add option</span>
                        </a>
                    </div>
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
    const MultipleChoiceManager = {
        updateState(element, state) {
            element.removeClass('border-transparent border-gray-400 border-success border-2 selected');

            const deleteBtn = element.find('.delete-btn');
            deleteBtn.removeClass('visible invisible');

            switch (state) {
                case 'default':
                    element.addClass('border-transparent');
                    deleteBtn.addClass('invisible');
                    break;

                case 'hover':
                    element.addClass('border-gray-400');
                    if ($('#multiple-choice-view [data-repeater-item]').length > 2 && activePollId !== currentPollId) {
                        deleteBtn.addClass('visible');
                    } else {
                        deleteBtn.addClass('invisible');
                    }
                    break;

                case 'selected':
                    element.addClass('selected border-success border-2');

                    if ($('#multiple-choice-view [data-repeater-item]').length > 2 && activePollId !== currentPollId) {
                        deleteBtn.addClass('visible');
                    } else {
                        deleteBtn.addClass('invisible');
                    }
                    break;
            }
        },

        selectItem(item) {
            $('#multiple-choice-view .option-item').each(function () {
                MultipleChoiceManager.updateState($(this), 'default');
            });
            MultipleChoiceManager.updateState(item, 'selected');
        },

        updatePlaceholders() {
            $('#multiple-choice-view .option-item').each(function (index) {
                $(this).find('.option-input').attr('placeholder', `Option ${index + 1}`);
            });
        },

        init() {
            this.initEventHandlers();
            $('#multiple-choice-view #options_repeater').repeater({
                initEmpty: false,
                show: function () {
                    $(this).slideDown();
                    MultipleChoiceManager.updatePlaceholders();
                    if (!bulkUpdating) {
                        setTimeout(() => {
                            MultipleChoiceManager.selectItem($(this).find('.option-item'));
                        }, 10);
                    }
                },
                hide: function (deleteElement) {
                    $(this).slideUp(function () {
                        $(this).remove();
                        MultipleChoiceManager.updatePlaceholders();
                        if ($('#multiple-choice-view [data-repeater-item]').length > 0) {
                            const newIndex = Math.min($(this).index(), $('#multiple-choice-view [data-repeater-item]').length - 1);
                            MultipleChoiceManager.selectItem($('#multiple-choice-view [data-repeater-item]').eq(newIndex).find('.option-item'));
                        }
                    });
                }
            });
        },

        initEventHandlers() {
            $(document).on('click', '#multiple-choice-view .option-item', function (e) {
                if ($(e.target).closest('[data-repeater-delete]').length) return;
                e.stopPropagation();
                MultipleChoiceManager.selectItem($(this));
            });

            $(document).on('mouseenter', '#multiple-choice-view .option-item', function () {
                if (!$(this).hasClass('selected')) {
                    MultipleChoiceManager.updateState($(this), 'hover');
                }
            });

            $(document).on('mouseleave', '#multiple-choice-view .option-item', function () {
                if (!$(this).hasClass('selected')) {
                    MultipleChoiceManager.updateState($(this), 'default');
                }
            });

            $(document).on('click', function (e) {
                if (!$(e.target).closest('#multiple-choice-view .option-item').length) {
                    $('#multiple-choice-view .option-item').each(function () {
                        MultipleChoiceManager.updateState($(this), 'default');
                    });
                }
            });

            $(document).on('click', '#multiple-choice-view [data-repeater-create]', function (e) {
                e.stopPropagation();
                if (!bulkUpdating) {
                    MultipleChoiceManager.triggerSaveOptions();
                }
            });

            $(document).on('input', '#multiple-choice-view .option-input', function () {
                MultipleChoiceManager.triggerSaveOptions();
            });

            $(document).on('click', '#multiple-choice-view .delete-btn', function (e) {
                e.stopPropagation();
                MultipleChoiceManager.triggerSaveOptions();
            });
        },

        async addPoll() {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "../multiple-choice/index-ajax-save-poll.php",
                    data: {
                        id: <?= $RECORD['id'] ?>,
                    },
                    dataType: 'json'
                });

                if (response.status === "success") {
                    currentPollId = response.poll_id;
                    currentPollType = 'multiple-choice';
                    currentPollVotes = 0;

                    renderPollCard({
                        id: currentPollId,
                        poll_type: currentPollType,
                        votes: currentPollVotes,
                        is_active: false
                    });

                    updateVotesCount(false);
                    highlightSidebarCard(`#poll-multiple-choice-${currentPollId}`);
                    showView('multiple-choice');

                    await this.loadPollResponses(currentPollId);

                    toastr.success(response.message);
                    return response.poll_id;
                } else {
                    throw new Error(response.message || 'Failed to save poll');
                }
            } catch (error) {
                console.error('Add poll error:', error);
                toastr.error('Error saving new multiple choice poll: ' + (error.message || 'Unknown error'));
                return null;
            }
        },

        async loadPollResponses(pollId) {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "/elicit/admin/events/multiple-choice/index-ajax-get-responses.php",
                    data: { poll_id: pollId },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    $('#multiple-choice-view .question').val(response.question);
                    currentPollVotes = response.total_votes;
                    updateVotesCount(activePollId === pollId);

                    $('#multiple-choice-view #options_repeater [data-repeater-list]').empty();

                    bulkUpdating = true;
                    const options = response.options;
                    options.forEach(opt => {
                        $('#multiple-choice-view [data-repeater-create]').click();
                        const item = $('#multiple-choice-view #options_repeater [data-repeater-list]').find('[data-repeater-item]').last();
                        item.find('.option-input').val(opt.option);
                        item.find('.option-id').val(opt.id);
                    });

                    this.updatePlaceholders();
                    bulkUpdating = false;

                    await this.updateData(response);
                }
            } catch (error) {
                console.error('Error loading poll responses:', error);
            }
        },

        updateData(response) {
            const optionsMap = {};
            response.options.forEach(opt => { optionsMap[opt.id] = opt; });

            $('#multiple-choice-view .option-item').each(function () {
                const id = parseInt($(this).find('.option-id').val());
                const matchedOption = optionsMap[id];

                if (matchedOption) {
                    const percentage = matchedOption.percentage || 0;
                    $(this).find('.progress-bar').css('width', percentage + '%').attr('aria-valuenow', percentage);
                    $(this).find('.percentage').text(percentage + '%');
                } else {
                    $(this).find('.progress-bar').css('width', '0%').attr('aria-valuenow', 0);
                    $(this).find('.percentage').text('0%');
                }
            });

            if (response.total_votes !== undefined) {
                currentPollVotes = response.total_votes;
                updateVotesCount(activePollId === currentPollId);
            }
        },

        async saveQuestion(question, pollId) {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "../multiple-choice/index-ajax-save-poll.php",
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
                    $(`#multiple-choice-${pollId} .poll-question`).text(question || 'Untitled');
                } else {
                    throw new Error(response.error);
                }
            } catch (error) {
                $('#saving-indicator').addClass('d-none');
                console.error('Save question error:', error);
                toastr.error('Error saving question: ' + (error.message || 'Unknown error'));
            }
        },

        triggerSaveOptions() {
            clearTimeout(saveTimeout);
            showSavingIndicator('Saving', 'saving');
            saveTimeout = setTimeout(() => this.saveOptions(), 1500);
        },

        async saveOptions() {
            const options = [];

            $('#multiple-choice-view .option-item').each(function () {
                const id = $(this).find('.option-id').val();
                const text = $(this).find('.option-input').val().trim();
                options.push({
                    id: id ? parseInt(id) : null,
                    text: text
                });
            });

            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "../multiple-choice/index-ajax-save-options.php",
                    data: {
                        poll_id: currentPollId,
                        options: options
                    },
                    dataType: 'json'
                });

                if (response.status === "success") {
                    showSavingIndicator('Saved', 'saved');
                    setTimeout(() => $('#saving-indicator').addClass('d-none'), 2000);
                    toastr.success('Options saved');
                    return true;
                } else {
                    toastr.error(response.error || response.message);
                    return false;
                }
            } catch (error) {
                console.error('Save options error:', error);
                toastr.error('Error saving options: ' + (error.message || 'Unknown error'));
                return false;
            }
        },

        resetForm() {
            $('#multiple-choice-view .question').val('');
            $('#multiple-choice-view #options_repeater [data-repeater-list]').empty();
            $('#multiple-choice-view .option-item').each(function () {
                MultipleChoiceManager.updateState($(this), 'default');
            });
            bulkUpdating = true;
            $('#multiple-choice-view [data-repeater-create]').click();
            $('#multiple-choice-view [data-repeater-create]').click();
            bulkUpdating = false;
            this.updatePlaceholders();
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
                        url: "../multiple-choice/index-ajax-delete-poll.php",
                        data: {
                            event_id: '<?= $RECORD['id'] ?>',
                            poll_id: targetPollId
                        },
                        dataType: 'json'
                    });

                    if (response.status === 'success') {
                        $(`#poll-multiple-choice-${targetPollId}`).remove();
 
                        if (activePollId === targetPollId && activePollType === 'multiple-choice') {
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
                    console.error('Delete poll error:', error);
                    toastr.error('Error deleting poll: ' + (error.message || 'Unknown error'));
                }
            }
        }
    };

    $(document).ready(function () {
        MultipleChoiceManager.init();
    });
</script>