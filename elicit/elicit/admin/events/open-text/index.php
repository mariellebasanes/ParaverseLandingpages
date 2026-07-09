<section id="open-text-view" class="d-none">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="d-flex gap-3 align-items-center">
            <img src="/elicit/assets/images/poll-types/open-text.svg" class="w-35px">
            <div class="d-flex flex-column">
                <h4 class="fw-bold mb-0">Open text</h4>
                <div class="votes-count text-gray-600">0 votes</div>
            </div>
        </div>
        <button type="button" class="btn btn-light btn-sm" onclick="OpenTextManager.deletePoll()">
            <i class="bi bi-trash3 me-2"></i>
            <span>Delete Poll</span>
        </button>
    </div>

    <div class="card border-0 shadow">
        <div class="card-body p-10">
            <div class="col-lg-12">
                <div class="fv-row mb-10">
                    <input type="text" class="question form-control mb-2" placeholder="What would you like to ask?"
                        required>
                </div>
            </div>

            <div class="col-lg-12 hover-scroll-x h-600px">
                <div id="responses-container" class="d-flex flex-column gap-4"></div>
            </div>
        </div>
    </div>
</section>

<script>
    const OpenTextManager = {
        async addPoll() {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "../open-text/index-ajax-save-poll.php",
                    data: {
                        id: <?= $RECORD['id'] ?>,
                    },
                    dataType: 'json'
                });

                if (response.status === "success") {
                    currentPollId = response.poll_id;
                    currentPollType = 'open-text';
                    currentPollVotes = 0;

                    $('.question').val('');
                    $('#responses-container').html(`
                        <span class="fs-5 mb-5 text-center">Results will appear below</span>
                        <img src="/elicit/assets/images/poll-types/empty-states/open-text.svg" class="w-700px">
                    `);

                    renderPollCard({
                        id: currentPollId,
                        poll_type: currentPollType,
                        votes: currentPollVotes,
                        is_active: false
                    });
                    updateVotesCount(false);
                    highlightSidebarCard(`#poll-open-text-${response.poll_id}`);
                    showView('open-text');
                } else {
                    throw new Error(response.message || 'Failed to save poll');
                }
            } catch (error) {
                toastr.error('Error saving new open text poll: ' + (error.message || 'Unknown error'));
            }
        },

        async loadPollResponses(pollId) {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "/elicit/admin/events/open-text/index-ajax-get-responses.php",
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
                console.error('Error loading open text data:', error);
            }
        },

        async updateData(response) {
            const container = $('#responses-container');
            if (response.total_votes === 0) {
                container.html(`
                    <div class="text-center py-10">
                        <span class="fs-5 mb-5 d-block">Results will appear below</span>
                        <img src="/elicit/assets/images/poll-types/empty-states/open-text.svg" class="w-400px">
                    </div>
                `);
                return;
            }

            let html = '';
            const answers = response.answers || [];

            answers.forEach(poll => {
                try {
                    const avatar = poll.avatar_url || '/elicit/assets/images/avatar-placeholder.png';
                    const timeAgo = (typeof moment !== 'undefined') ? moment(poll.created_at).fromNow() : poll.created_at;
                    
                    html += `
                    <div class="card bg-secondary bg-opacity-25 shadow-none border-0 rounded-3 mb-4">
                        <div class="card-body p-5 d-flex justify-content-between align-items-start">
                            <div class="d-flex gap-4">
                                <div class="symbol symbol-40px flex-shrink-0">
                                    <img src="${avatar}" alt="${poll.participant_name}" onerror="this.src='/elicit/assets/images/avatar-placeholder.png'">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="fs-6 fw-bold text-gray-900 mb-1">${poll.participant_name || 'Anonymous'}</span>
                                    <p class="mb-0 text-gray-700 fs-6 lh-sm">${poll.response}</p>
                                </div>
                            </div>
                            <span class="text-muted fs-8 flex-shrink-0 ms-4">${timeAgo}</span>
                        </div>
                    </div>`;
                } catch (e) {
                    console.error("Error rendering open text response:", e);
                }
            });

            container.html(html || '<p class="text-center text-muted">No valid responses found.</p>');
        },

        async saveQuestion(question, pollId) {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "../open-text/index-ajax-save-poll.php",
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
                    $(`#open-text-${pollId} .poll-question`).text(question || 'Untitled');
                } else {
                    throw new Error(response.message || 'Failed to save question');
                }
            } catch (error) {
                $('#saving-indicator').addClass('d-none');
                toastr.error('Error saving question: ' + (error.message || 'Unknown error'));
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
                        url: "../open-text/index-ajax-delete-poll.php",
                        data: {
                            event_id: '<?= $RECORD['id'] ?>',
                            poll_id: targetPollId
                        },
                        dataType: 'json'
                    });

                    if (response.status === 'success') {
                        $(`#poll-open-text-${targetPollId}`).remove();
 
                        if (activePollId === targetPollId && activePollType === 'open-text') {
                            activePollId = null;
                            activePollType = null;
                        }

                        if (currentPollId === targetPollId) {
                            $(".question").val('');
                            $("#responses-container").empty();
 
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
</script>
