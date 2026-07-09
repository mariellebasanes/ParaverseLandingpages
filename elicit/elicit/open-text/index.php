<?php
$ACCOUNT = GET_ACCOUNT_DETAILS($identification);
?>

<script>
    const OpenTextManager = {
        poll: null,

        renderPoll: function (poll) {
            this.poll = poll;
            $('#polls-content').html(`
                <div class="poll-results-container">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="/elicit/assets/images/poll-types/open-text.svg" class="w-35px">
                            <h5 class="poll-question fw-bold mb-0">${poll.question ?? 'Untitled'}</h5>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <span id="total_votes" class="fs-5">0</span>
                            <i class="fs-3 bi bi-people"></i>
                        </div>
                    </div>
                    <div class="card mb-5 rounded-4" id="response-form-container" style="box-shadow: 0px 0px 1px rgba(0, 0, 0, .18), 0px 2px 4px rgba(0, 0, 0, .16);">
                        <div class="card-body p-3">
                            <form id="submit-answer-form">
                                <textarea id="answer" name="answer" class="form-control form-control-transparent" rows="1" placeholder="Type your answer..." required></textarea>
                                <div class="mt-4 d-flex flex-grow-1 justify-content-between align-items-center">
                                    <div class="rounded w-300px">
                                        <select id="account" name="account" class="form-select form-select-transparent" required>
                                            <option value="0" data-kt-select2-profile="<?= $ACCOUNT['avatar_md'] ?>">
                                                <span class="ms-2"><?= DISPLAY_NAME($ACCOUNT) ?></span>
                                            </option>
                                            <option value="1" data-kt-select2-profile="/briefcase/assets/images/avatars/avatar-default.jpg">
                                                <span class="ms-2">Anonymous</span>
                                            </option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary rounded-pill fw-bold px-8" id="submit-answer-btn">
                                        <i class="ki-duotone ki-send fs-3 me-2"><span class="path1"></span><span class="path2"></span></i>Send
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="responses-list" class="mt-7 d-flex flex-column gap-3">
                        <div class="text-center py-10">
                            <div class="spinner-border spinner-border-sm text-primary" role="status"></div>
                            <p class="text-muted mt-2">Loading responses...</p>
                        </div>
                    </div>
                </div>
            `);

            const optionFormat = function (item) {
                if (!item.id) return item.text;

                const imgUrl = item.element.getAttribute('data-kt-select2-profile');

                return $(`<span class="d-flex align-items-center">
                <img src="${imgUrl}" class="rounded-circle h-30px me-3" />
                    ${item.text}
                </span>`);
            };

            $('#account').select2({
                templateSelection: optionFormat,
                templateResult: optionFormat,
                minimumResultsForSearch: Infinity
            });

            $('#total_votes').text('0');

            $('#submit-answer-form').off('submit').on('submit', (e) => {
                e.preventDefault();
                this.handleFormSubmit();
            });

            this.loadPollResponses();
        },

        async handleFormSubmit() {
            const answer = $('#answer').val().trim();
            const isAnonymous = $('#account').val() === '1';

            if (!answer) {
                toastr.error('Please enter your answer');
                return;
            }

            const submitBtn = $('#submit-answer-btn');
            submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Sending...');

            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "/elicit/open-text/index-ajax-submit-response.php",
                    data: {
                        poll_id: this.poll.id,
                        answer: answer,
                        is_anonymous: isAnonymous ? 1 : 0
                    },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    toastr.success('Response submitted successfully!');
                    $('#answer').val('');
                    $('#answer').focus();
                    submitBtn.prop('disabled', false).html('<i class="ki-duotone ki-send fs-3 me-2"><span class="path1"></span><span class="path2"></span></i> Send');
                    await this.loadPollResponses();
                } else {
                    toastr.error(response.message || 'Error submitting response');
                    submitBtn.prop('disabled', false).html('<i class="ki-duotone ki-send fs-3 me-2"><span class="path1"></span><span class="path2"></span></i> Send');
                }
            } catch (error) {
                toastr.error('Error submitting response. Please try again.');
                toastr.error('Response submission error:', error);
                submitBtn.prop('disabled', false).html('<i class="ki-duotone ki-send fs-3 me-2"><span class="path1"></span><span class="path2"></span></i> Send');
            }
        },

        async loadPollResponses() {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "/elicit/open-text/index-ajax-get-responses.php",
                    data: { poll_id: this.poll.id },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    this.updateData(response);
                }
            } catch (error) {
                console.error('Error loading poll data:', error);
            }
        },

        updateData: function (response) {
            $("#total_votes").text(response.total_votes);
            $('.poll-question').text(response.question || 'Untitled');
            if (!response.answers || response.answers.length === 0) {
                $('#responses-list').html(`<div class="card bg-transparent shadow-none border border-gray-300 rounded-4">
                    <div class="card-body">
                        <p class="card-text fs-6 text-gray-600 text-center">There are no responses yet.</p>
                    </div>
                </div>`);
                return;
            }

            const sortedAnswers = [...response.answers].sort((a, b) => {
                return new Date(b.created_at) - new Date(a.created_at);
            });

            let html = '';

            sortedAnswers.forEach(poll => {
                html += `<div class="card bg-transparent shadow-none border border-gray-300 rounded-4">
                    <div class="card-body p-5 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="d-flex gap-3 align-items-center mb-4">
                                <div class="symbol symbol-circle symbol-30px">
                                    <img src="${poll.avatar_url}" alt="${poll.participant_name}" class="rounded-circle">
                                </div>
                                <span class="fs-6 fw-semibold text-gray-800">${poll.participant_name}</span>
                            </div>
                            <p class="mb-0 text-gray-700 fs-6">${poll.response}</p>
                        </div>
                        <small class="text-muted">${moment(poll.created_at).fromNow()}</small>
                    </div>
                </div>`;
            });

            $('#responses-list').html(
                `<div class="d-flex flex-column gap-3">` + html + `</div>`
            );
        },
    };
</script>