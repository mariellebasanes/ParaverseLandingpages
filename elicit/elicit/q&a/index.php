<?php
$ACCOUNT = GET_ACCOUNT_DETAILS($identification);
?>

<div id="qa-participant-container">
    <div id="qa-question-form" class="card border-0 shadow mb-4 d-none">
        <div class="card-body p-5">
            <form id="submit-question-form">
                <div class="mb-4">
                    <textarea class="form-control form-control-solid" id="question-text" rows="3"
                        placeholder="Type your question" required maxlength="500"></textarea>
                </div>
                <div class="flex-grow-1 d-flex justify-content-between align-items-center">
                    <div class="border rounded w-300px">
                        <select class="form-select form-select-transparent" id="visibility">
                            <option value="0" data-kt-select2-profile="<?= $ACCOUNT['avatar_md'] ?>">
                                <span class="ms-2"><?= DISPLAY_NAME($ACCOUNT) ?></span>
                            </option>
                            <option value="1"
                                data-kt-select2-profile="/briefcase/assets/images/avatars/avatar-default.jpg">
                                <span class="ms-2">Anonymous</span>
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill fw-bold px-8" id="submit-question-btn">
                        <i class="ki-duotone ki-send fs-3 me-2"><span class="path1"></span><span class="path2"></span></i>Send
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Closed Session Message -->
    <div id="qa-closed-message" class="card border-0 bg-light-warning d-none">
        <div class="card-body text-center p-5">
            <i class="bi bi-lock-fill fs-1 text-warning mb-3"></i>
            <h5 class="fw-bold text-gray-900">Q&A is Closed</h5>
            <p class="text-muted">The Q&A session is not currently active. Please check back later.</p>
        </div>
    </div>

    <!-- Questions List -->
    <div id="qa-questions-container" class="d-none">
        <div class="d-flex justify-content-between align-items-center mx-10">
            <ul class="nav nav-underline gap-7" id="questions_tabs">
                <li class="nav-item">
                    <a class="nav-link text-muted text-active-success fs-5 pb-4 active" data-bs-toggle="tab"
                        href="#popular" data-sort="popular">Popular</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted text-active-success fs-5 pb-4" data-bs-toggle="tab" href="#recent"
                        data-sort="recent">Recent</a>
                </li>
            </ul>
            <div class="fs-5 text-muted"><span class="question-count me-2">0</span>Questions</div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="popular" role="tabpanel">
                <div id="qa-questions-popular" class="d-flex flex-column gap-3">
                </div>
            </div>
            <div class="tab-pane fade" id="recent" role="tabpanel">
                <div id="qa-questions-recent" class="d-flex flex-column gap-3">
                </div>
            </div>
        </div>
        <div id="qa-no-questions" class="text-center py-5 d-none">
            <i class="bi bi-chat-square-text fs-1 text-muted"></i>
            <p class="text-muted mt-3">No questions yet. Be the first to ask!</p>
        </div>
    </div>
</div>

<script>
    let refreshInterval = null;
    let activeQuestions = [];

    var optionFormat = function (item) {
        if (!item.id) {
            return item.text;
        }

        var span = document.createElement('span');
        var imgUrl = item.element.getAttribute('data-kt-select2-profile');
        var template = '';

        template += '<img src="' + imgUrl + '" class="rounded-circle h-30px me-2" />';
        template += item.text;

        span.innerHTML = template;

        return $(span);
    }

    $(document).ready(function () {
        checkQASessionStatus();
        setupEventListeners();

        $('#visibility').select2({
            templateSelection: optionFormat,
            templateResult: optionFormat,
            minimumResultsForSearch: Infinity

        });
    });

    function setupEventListeners() {
        // Character count for question text
        $('#question-text').on('input', function () {
            const count = $(this).val().length;
            $('#question-char-count').text(count);
        });

        // Submit question form
        $('#submit-question-form').on('submit', function (e) {
            e.preventDefault();
            addQuestion();
        });

        // Handle sort tab changes
        $('#questions-tabs a').on('shown.bs.tab', function (e) {
            const sortType = $(e.target).data('sort');
            renderQuestions(activeQuestions, sortType);
        });

        // Handle tab changes to refresh data
        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            if (e.target.getAttribute('href') === '#questions') {
                checkQASessionStatus();
            }
        });
    }

    function checkQASessionStatus() {
        $.ajax({
            type: "POST",
            url: "/elicit/q&a/index-ajax-check-session.php",
            data: {
                code: '<?= $RECORD['code'] ?>'
            },
            success: function (response) {
                if (response.has_qa && response.is_open) {
                    showActiveSession();
                } else if (response.has_qa && !response.is_open) {
                    showClosedSession();
                } else {
                    showNoSession();
                }
            },
            error: function (xhr, status, error) {
                showErrorState('Network error. Please try again.', status, error);
            }
        });
    }

    function showLoadingState() {
        $('#qa-question-form, #qa-closed-message, #qa-questions-container').addClass('d-none');
    }

    function showActiveSession() {
        $('#qa-question-form').removeClass('d-none');
        $('#qa-questions-container').removeClass('d-none');
        $('#qa-closed-message').addClass('d-none');

        loadQuestions();
        startAutoRefresh();
    }

    function showClosedSession() {
        $('#qa-question-form').addClass('d-none');
        $('#qa-questions-container').removeClass('d-none');
        $('#qa-closed-message').removeClass('d-none');

        loadQuestions();
        stopAutoRefresh();
    }

    function showNoSession() {
        $('#qa-question-form, #qa-questions-container').addClass('d-none');
        $('#qa-closed-message').removeClass('d-none');
        stopAutoRefresh();
    }

    function showErrorState(message) {
        $('#qa-question-form, #qa-questions-container, #qa-closed-message').addClass('d-none');
        toastr.error(message);
        stopAutoRefresh();
    }

    function addQuestion() {
        const questionText = $('#question-text').val().trim();
        const isAnonymous = $('#visibility').val() === '1';
        ;
        $("#submit-question-btn").removeClass("btn-success").addClass("btn-secondary").attr("disabled", "disabled");

        if (!questionText) {
            toastr.error('Please enter your question');
            $("#submit-question-btn").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
            return;
        }

        $.ajax({
            type: "POST",
            url: "/elicit/q&a/index-ajax-add-question.php",
            data: {
                code: '<?= $RECORD['code'] ?>',
                text: questionText,
                is_anonymous: isAnonymous ? 1 : 0
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === "success") {
                    toastr.success('Question submitted successfully!');
                    $('#submit-question-form')[0].reset();
                    $('#question-char-count').text('0');
                    loadQuestions();

                    $("#submit-question-btn").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
                }
                else {
                    toastr.error(response.message);
                    $("#submit-question-btn").removeClass("btn-secondary").addClass("btn-primary").removeAttr("disabled");
                }
            },
            error: function (xhr, status, error) {
                showErrorState('Network error. Please try again.', status, error);
            }
        });
    }

    function loadQuestions() {
        $.ajax({
            type: "POST",
            url: "/elicit/q&a/index-ajax-get-questions.php",
            data: {
                code: '<?= $RECORD['code'] ?>',
            },
            dataType: 'json',
            success: function (response) {
                activeQuestions = response.questions.filter(q => !q.is_archived && !q.is_answered);
                updateQuestionCount(activeQuestions.length);
                renderQuestions(activeQuestions, 'popular');
                renderQuestions(activeQuestions, 'recent');
            },
            error: function (xhr, status, error) {
                $('#qa-questions-popular, #qa-questions-recent').html('<div class="text-center text-muted py-4">Network error loading questions</div>');
            }
        });
    }

    function updateQuestionCount(count) {
        $('.question-count').text(count);
        if (count === 0) {
            $('#qa-no-questions').removeClass('d-none');
        } else {
            $('#qa-no-questions').addClass('d-none');
        }
    }

    function renderQuestions(questions, sortType) {
        let sortedQuestions = [...questions];

        if (sortType === 'popular') {
            sortedQuestions.sort((a, b) => {
                if (a.is_highlighted && !b.is_highlighted) return -1;
                if (!a.is_highlighted && b.is_highlighted) return 1;

                return b.likes - a.likes;
            });
        } else {
            sortedQuestions.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
        }

        const container = sortType === 'popular' ? $('#qa-questions-popular') : $('#qa-questions-recent');

        if (sortedQuestions.length === 0) {
            container.html('');
            return;
        }

        let html = '';

        sortedQuestions.forEach(question => {
            html += `
            <div class="card card-flush mb-4 question-item${question.is_highlighted ? ' border-success bg-light-success' : ''}" data-question-id="${question.id}">
                <div class="card-header pt-5">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-35px me-5">
                            <img src="${question.avatar_url}" alt="${question.participant_name}" />
                        </div>
                        <div class="flex-grow-1">
                            <span class="text-gray-800 fs-5 fw-bold">${question.participant_name}</span>
                            <span class="text-gray-500 d-block fs-7">${moment(question.created_at).fromNow()}</span>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="m-0">
                            <button class="btn btn-sm rounded-pill btn-light-primary align-items-center px-4 like-btn ${question.user_has_liked ? 'active' : ''}"
                                    onclick="likeQuestion(${question.id}, this)">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="like-count fw-bold">${question.likes}</span>
                                    <i class="${question.user_has_liked ? 'fa-solid' : 'fa-regular'} fa-thumbs-up fs-4"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="fs-6 fw-normal text-gray-700">${question.text}</div>
                </div>
            </div>`;
        });

        container.html(html);
    }

    function likeQuestion(questionId, buttonElement) {
        const likeBtn = $(buttonElement);
        const likeCount = likeBtn.find('.like-count');
        const currentLikes = parseInt(likeCount.text());
        const isCurrentlyLiked = likeBtn.hasClass('active');

        likeBtn.prop('disabled', true);

        if (isCurrentlyLiked) {
            likeBtn.removeClass('active');
            likeBtn.find('i').removeClass('fa-solid').addClass('fa-regular');
            likeCount.text(currentLikes - 1);
        } else {
            likeBtn.addClass('active');
            likeBtn.find('i').removeClass('fa-regular').addClass('fa-solid');
            likeCount.text(currentLikes + 1);
        }

        $.ajax({
            type: "POST",
            url: "/elicit/q&a/index-ajax-like-question.php",
            data: {
                id: questionId,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    loadQuestions();
                } else {
                    revertLikeUpdate(likeBtn, currentLikes, isCurrentlyLiked);
                    if (response.message) {
                        toastr.error(response.message);
                    }
                }
            },
            error: function (xhr, status, error) {
                revertLikeUpdate(likeBtn, currentLikes, isCurrentlyLiked);
                toastr.error('Network error');
            }
        });
    }

    function revertLikeUpdate(likeBtn, originalLikes, wasLiked) {
        if (wasLiked) {
            likeBtn.addClass('active');
            likeBtn.find('i').removeClass('fa-regular').addClass('fa-solid');
        } else {
            likeBtn.removeClass('active');
            likeBtn.find('i').removeClass('fa-solid').addClass('fa-regular');
        }
        likeBtn.find('.like-count').text(originalLikes);
    }

    function startAutoRefresh() {
        stopAutoRefresh();
        refreshInterval = setInterval(() => {
            loadQuestions();
        }, 5000);
    }

    function stopAutoRefresh() {
        if (refreshInterval) {
            clearInterval(refreshInterval);
            refreshInterval = null;
        }
    }

    // Cleanup on page unload
    $(window).on('beforeunload', function () {
        stopAutoRefresh();
    });
</script>