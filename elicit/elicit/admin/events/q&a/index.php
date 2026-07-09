<section id="qa-view" class="d-none">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="d-flex gap-3 align-items-center">
            <img src="/elicit/assets/images/poll-types/q-and-a.svg" class="w-35px">
            <h4 class="fw-bold mb-0">Audience Q&A</h4>
        </div>
        <div id="closed_qa" class="border border-danger px-6 py-2 rounded-3 d-flex align-items-center gap-3 d-none">
            <i class="fa-solid fa-unlock-keyhole text-danger fs-5"></i>
            <span class="text-danger fw-semibold">Q&A is closed</span>
        </div>
        <button id="archived_questions" type="button" class="btn btn-light btn-sm d-flex align-items-center">
            <i class="bi bi-archive me-2"></i>
            <span>Archive</span>
        </button>

        <div class="bg-white drawer drawer-end" data-kt-drawer="true" data-kt-drawer-activate="true"
            data-kt-drawer-toggle="#archived_questions" data-kt-drawer-close="#close_archive"
            data-kt-drawer-width="500px">
            <div class="card w-100 rounded-0">
                <div class="card-header pe-5">
                    <div class="card-title">Archive</div>
                    <div class="card-toolbar">
                        <div class="btn btn-sm btn-icon btn-active-light-primary" id="close_archive">
                            <i class="bi bi-x-lg text-dark"></i>
                        </div>
                    </div>
                </div>
                <div class="card-body hover-scroll-overlay-y">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="fw-semibold fs-6">
                            <span id="archived-count">0</span> questions
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="ki-duotone ki-filter fs-2 text-dark">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <select id="question-status" class="form-select form-select-sm form-select-solid"
                                data-control="select2" data-placeholder="Select status" data-hide-search="true">
                                <option value="All" selected>All questions</option>
                                <option value="Answered">Answered</option>
                                <option value="Archived">Archived</option>
                            </select>
                        </div>
                    </div>
                    <div id="archived-questions-list" class="mt-5 d-flex flex-column gap-3"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow">
        <div class="card-header border-0 align-items-center">
            <div class="d-flex align-items-center gap-2">
                <span class="fw-bold px-3 badge badge-danger position-relative">
                    <i class="bi bi-broadcast me-2 text-white fs-3"></i>
                    LIVE
                    <span id="live-questions-count"
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                        <span class="fs-9 fw-normal text-inverse-primary">0</span>
                        <span class="visually-hidden">questions</span>
                    </span>
                </span>
            </div>
            <div class="d-flex align-items-center">
                <div class="text-muted text-nowrap fs-7 me-2">
                    <i class="fa-solid fa-up-down me-2"></i>
                    <span class="fw-semibold">Sort by</span>
                </div>
                <select id="question-sort"
                    class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                    data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px"
                    data-placeholder="Select an option">
                    <option value="popular" selected>Popular</option>
                    <option value="recent">Recent</option>
                </select>
            </div>
        </div>
        <div class="card-body pt-0">
            <div id="qa-questions-list" class="d-flex flex-column gap-3">
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading questions...</span>
                    </div>
                    <p class="text-muted mt-3">Loading questions...</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let qaSessionId = null;
    let activeQuestionsSort = 'popular';
    let activeQuestions = [];
    let archivedQuestions = [];
    let refreshIntervalQA = null;

    $(document).ready(async function () {
        await checkQASession();

        $('#question-sort').on('change', function () {
            activeQuestionsSort = $(this).val();
            renderActiveQuestions();
        });

        $('#question-status').on('change', function () {
            renderArchivedQuestions();
        });

        $(document).on('click', '#archived_questions', function () {
            renderArchivedQuestions();
        });
    });

    function checkQASession() {
        $.ajax({
            type: "POST",
            url: "/elicit/q&a/index-ajax-check-session.php",
            data: {
                code: '<?= $RECORD['code'] ?>'
            },
            dataType: 'json',
            success: function (response) {
                if (response.has_qa === true) {
                    qaSessionId = response.session_id;
                    updateQAStatus(response.is_open);
                    startAutoRefresh();
                } else {
                    qaSessionId = null;
                    updateQAStatus(false);
                    stopAutoRefresh();
                }
            },
            error: function (xhr, status, error) {
                stopAutoRefresh();
                showView('default');
            }
        });
    }

    function startAutoRefresh() {
        stopAutoRefresh();
        refreshIntervalQA = setInterval(() => {
            if (!$('#qa-view').hasClass('d-none') && qaSessionId) {
                loadQuestions();
            }
        }, 5000);
    }

    function stopAutoRefresh() {
        if (refreshIntervalQA) {
            clearInterval(refreshIntervalQA);
            refreshIntervalQA = null;
        }
    }

    function addQASession() {
        $.ajax({
            type: "POST",
            url: "../q&a/index-ajax-add-session.php",
            data: {
                id: '<?= $RECORD['id'] ?>'
            },
            dataType: 'json',
            success: function (response) {
                qaSessionId = response.session_id;
                updateQAStatus(true);
                toastr.success('Q&A session added');
            },
            error: function (xhr, status, error) {
                toastr.error("AJAX Error:", status, error);
            }
        });
    }

    async function openQASession() {
        const result = await Swal.fire({
            html: `<div class="mt-3">
                <img src="/elicit/assets/images/warning.gif" class="w-100px h-100px mb-3">
                <h4 class="mb-5">Open Q&A?</h4>
                <p class="mx-4 mb-0">This will allow participants to send new questions</p>
            </div>`,
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Yes, open Q&A",
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
                    url: "../q&a/index-ajax-open-session.php",
                    data: {
                        session_id: qaSessionId
                    },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    updateQAStatus(true);
                    toastr.success('Q&A session opened');
                } else {
                    throw new Error(response.message);
                }
            } catch (error) {
                toastr.error("AJAX Error:", status, error);
            }
        }
    }

    async function closeQASession() {
        const result = await Swal.fire({
            html: `<div class="mt-3">
                <img src="/elicit/assets/images/warning.gif" class="w-100px h-100px mb-3">
                <h4 class="mb-5">Close Q&A?</h4>
                <p class="mx-4 mb-0">This will prevent participants from sending new questions</p>
            </div>`,
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Yes, close Q&A",
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
                    url: "../q&a/index-ajax-close-session.php",
                    data: {
                        session_id: qaSessionId
                    },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    updateQAStatus(false);
                    toastr.success('Q&A session closed');
                } else {
                    throw new Error(response.message);
                }
            } catch (error) {
                toastr.error("AJAX Error:", status, error);
            }
        }
    }

    function updateQAStatus(isOpen) {
        const container = $('#qa-container');
        $('[data-bs-toggle="tooltip"]').tooltip('dispose');

        const state = !qaSessionId ? 'no-session' : isOpen ? 'open' : 'closed';

        if (state === 'no-session') {
            activeQuestions = [];
            archivedQuestions = [];
        }

        if (state === 'closed') {
            $('#closed_qa').removeClass('d-none');
        } else {
            $('#closed_qa').addClass('d-none');
        }

        // Get state configuration
        const config = getStateConfig(state);
        container.html(generateCardHTML(config));

        if (qaSessionId) {
            $('#live-questions-count .fs-9').text(activeQuestions.length);
        }

        setTimeout(() => $('[data-bs-toggle="tooltip"]').tooltip({
            delay: { "show": 0, "hide": 0 }
        }), 50);

        qaSessionId ? showView('qa') : showView('default');
        if (qaSessionId) highlightSidebarCard('#qa-container .card');
    }

    function getStateConfig(state) {
        const configs = {
            'no-session': {
                icon: '/elicit/assets/images/poll-types/q-and-a.svg',
                text: 'Add Q&A to collect questions from your audience',
                status: null,
                buttons: `<button type="button" class="btn btn-sm btn-active-light-success text-success" onclick="addQASession()">Add</button>`
            },
            'open': {
                icon: '/elicit/assets/images/poll-types/q-and-a.svg',
                text: `${activeQuestions.length} questions`,
                status: { icon: 'bi bi-circle-fill text-success fs-10', text: 'text-success fs-7', label: 'Open' },
                actionBtn: { class: 'btn-light-danger', icon: 'fa-unlock-keyhole', title: 'Close Q&A', onclick: 'closeQASession()' }
            },
            'closed': {
                icon: '/elicit/assets/images/poll-types/q-and-a.svg',
                text: `${activeQuestions.length} questions`,
                status: { icon: 'bi bi-circle-fill text-danger fs-10', text: 'text-danger fs-7', label: 'Closed' },
                actionBtn: { class: 'btn-light-success', icon: 'fa-lock', title: 'Open Q&A', onclick: 'openQASession()' }
            }
        };

        const config = configs[state];

        if (state !== 'no-session') {
            config.buttons = `
            <button type="button" class="btn btn-sm btn-icon ${config.actionBtn.class} rounded-circle shadow-sm" 
                onclick="${config.actionBtn.onclick}" data-bs-toggle="tooltip" title="${config.actionBtn.title}">
                <i class="fa-solid ${config.actionBtn.icon}"></i>
            </button>
            <button type="button" class="btn btn-sm btn-icon btn-light-dark rounded-circle shadow-sm" 
                onclick="removeQA()" data-bs-toggle="tooltip" title="Remove Q&A">
                <i class="bi bi-trash3"></i>
            </button>
        `;
        }

        return config;
    }

    function generateCardHTML(config) {
        return `
        <div class="card border-0 shadow-none bg-light mb-4 ${qaSessionId ? 'cursor-pointer' : ''}">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-4">
                        <div class="symbol symbol-40px">
                                <img src="${config.icon}" class="h-30px">
                        </div>
                        <div>
                            <span id="questions-count" class="d-block fs-7 text-gray-800 fw-bold mb-1">${config.text}</span>
                            ${config.status ? `
                                <div class="badge badge-light-${config.status.text.includes('success') ? 'success' : 'danger'} d-flex align-items-center gap-2 py-1 px-2">
                                    <i class="${config.status.icon} fs-10"></i>
                                    <span class="fs-9 fw-bold uppercase">${config.status.label}</span>
                                </div>
                            ` : ''}
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        ${config.buttons}
                    </div>
                </div>
            </div>
        </div>`;
    }

    function loadQuestions() {
        if (!qaSessionId) return;

        $.ajax({
            type: "POST",
            url: "/elicit/q&a/index-ajax-get-questions.php",
            data: {
                code: '<?= $RECORD['code'] ?>'
            },
            dataType: 'json',
            success: function (response) {
                if (!qaSessionId) {
                    return;
                }

                activeQuestions = response.questions.filter(q => !q.is_archived && !q.is_answered);
                archivedQuestions = response.questions.filter(q => q.is_archived || q.is_answered);
                $('#questions-count').text(activeQuestions.length + ' questions');
                $('#live-questions-count .fs-9').text(activeQuestions.length);

                renderActiveQuestions()
                renderArchivedQuestions();
            },
            error: function (xhr, status, error) {
                toastr.error("AJAX Error:", status, error);
            }
        });
    }

    function renderActiveQuestions() {
        if (activeQuestions.length === 0) {
            $('#qa-questions-list').html(`
                <div class="text-center py-5">
                    <img src="/elicit/assets/images/poll-types/empty-states/q-and-a.svg" class="mb-4 w-250px">
                    <h4 class="text-muted mt-3">Your Q&A is ready</h4>
                    <p class="text-muted mt-2">Your participants can ask new questions</p>
                </div>
            `);
            return;
        }

        let sortedQuestions = [...activeQuestions];

        if (activeQuestionsSort === 'popular') {
            sortedQuestions.sort((a, b) => {
                if (a.is_highlighted && !b.is_highlighted) return -1;
                if (!a.is_highlighted && b.is_highlighted) return 1;

                return b.likes - a.likes;
            });
        } else {
            sortedQuestions.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
        }

        let html = '';
        sortedQuestions.forEach(question => {
            html += `
            <div class="p-5 rounded-3 border border-hover ${question.is_highlighted ? 'border-success bg-light-success' : 'border-gray-300 bg-hover-secondary'} cursor-pointer" data-question-id="${question.id}">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-circle symbol-35px me-3">
                            <img src="${question.avatar_url}" alt="${question.participant_name}" />
                        </div>
                        <div class="flex-grow-1">
                            <span class="text-gray-800 fs-6 fw-bold">${question.participant_name}</span>
                            <span class="text-gray-500 d-block fs-7">${moment(question.created_at).fromNow()}</span>
                        </div>
                    </div>
                    <div id="action-buttons" class="d-flex align-items-center gap-2 btn-group-sm" role="group">
                        <button type="button" class="btn btn-icon btn-sm btn-${question.is_highlighted ? 'success' : 'light-primary'} rounded-circle" onclick="highlightQuestion(${question.id})" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse"  data-bs-placement="top" data-bs-title="${question.is_highlighted ? 'Remove highlight' : 'Highlight'}">
                            <i class="fa-solid fa-angles-${question.is_highlighted ? 'down' : 'up'} fs-5"></i>
                        </button>
                        <button type="button" class="btn btn-icon btn-sm btn-light-success rounded-circle" onclick="markAsAnswered(${question.id})" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" data-bs-title="Mark as answered">
                            <i class="fa-solid fa-check fs-5"></i>
                        </button>
                        <button type="button" class="btn btn-icon btn-sm btn-light-danger rounded-circle" onclick="archiveQuestion(${question.id})" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" data-bs-title="Archive">
                            <i class="fa-solid fa-box-archive fs-5"></i>
                        </button>
                    </div>
                </div>
                <div class="mt-5 d-flex justify-content-between">
                    <span class="fs-6 fw-normal text-gray-700">${question.text}</span>
                    <div class="d-flex align-items-center gap-2">
                        <span>${question.likes}</span>
                        <i class="fa-regular fa-thumbs-up fs-6 text-gray-700"></i>
                    </div>
                </div>
            </div>`;
        });

        $('#qa-questions-list').find('[data-bs-toggle="tooltip"]').tooltip('dispose');
        $('#qa-questions-list').html(html);
        $('#qa-questions-list').find('[data-bs-toggle="tooltip"]').tooltip({
            delay: { "show": 0, "hide": 0 }
        });
    }

    function renderArchivedQuestions() {
        const filterType = $('#question-status').val().toLowerCase();
        let filteredQuestions = archivedQuestions.filter(question => {
            if (filterType === 'answered') {
                return question.is_answered;
            } else if (filterType === 'archived') {
                return question.is_archived;
            } else {
                return question.is_answered || question.is_archived;
            }
        });

        $('#archived-count').text(filteredQuestions.length);

        if (archivedQuestions.length === 0 && filteredQuestions.length === 0) {
            $('#archived-questions-list').html(`
                <div class="d-flex flex-column align-items-center justify-content-center mt-20">
                    <h4 class="fw-semibold text-gray-700 mb-5">Your archive is empty</h4>
                    <h6 class="fw-normal text-gray-700">You do not have any questions in your archive</h6>
                </div>
            `);
            return;
        } else if (filteredQuestions.length === 0) {
            $('#archived-questions-list').html(`
                <div class="d-flex flex-column align-items-center justify-content-center mt-20">
                    <h4 class="fw-semibold text-gray-700 mb-5">No results found</h4>
                    <h6 class="fw-normal text-gray-700">There are no archived questions that have status ${filterType}.</h6>
                </div>
            `);
            return;
        }

        filteredQuestions.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

        let html = '';
        filteredQuestions.forEach(question => {
            const ribbonLabel = question.is_answered ? 'Answered' : 'Archived';
            const ribbonColor = question.is_answered ? 'bg-success' : 'bg-info';

            html += `
            <div class="card card-flush border border-gray-300 bg-light cursor-pointer" data-question-id="${question.id}">
                <div class="card-header ribbon ribbon-end ribbon-clip">
                    <div class="ribbon-label">
                        ${ribbonLabel}
                        <span class="ribbon-inner ${ribbonColor}"></span>
                    </div>
                    <div class="card-title d-flex align-items-center">
                        <div class="symbol symbol-35px me-3">
                            <img src="${question.avatar_url}" alt="${question.participant_name}">
                        </div>
                        <div class="d-flex flex-column flex-grow-1">
                            <span class="text-gray-800 fs-5 fw-bold">${question.participant_name}</span>
                            <span class="text-gray-500 fs-7">${moment(question.created_at).fromNow()}</span>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="mt-4 d-flex justify-content-between">
                        <span class="fs-6 fw-normal text-gray-700">${question.text}</span>
                        <div class="d-flex align-items-center gap-3 fs-6">
                            <span>${question.likes}</span>
                            <i class="fa-regular fa-thumbs-up fs-3 text-gray-700"></i>
                        </div>
                    </div>
                    <div class="mt-5 d-flex gap-4">
                        <button type="button" class="btn btn-sm btn-outline btn-outline-dark rounded-pill" onclick="restoreQuestion(${question.id})">
                            <i class="fa-solid fa-arrow-rotate-left fs-4 me-2"></i> Restore
                        </button>
                        ${!question.is_answered ? `
                        <button type="button" class="btn btn-sm btn-outline btn-outline-dark rounded-pill" onclick="markAsAnswered(${question.id})">
                            <i class="fa-solid fa-check fs-4 me-2"></i> Mark as answered
                        </button>
                        ` : ''}
                    </div>
                </div>
            </div>`;
        });
        $('#archived-questions-list').html(html);
    }

    function highlightQuestion(questionId) {

        $.ajax({
            type: "POST",
            url: "../q&a/index-ajax-highlight-question.php",
            data: {
                id: questionId
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    loadQuestions();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr, status, error) {
                toastr.error("AJAX Error:", status, error);
            }
        });
    }

    function markAsAnswered(questionId) {
        $.ajax({
            type: "POST",
            url: "../q&a/index-ajax-mark-as-answered.php",
            data: {
                id: questionId
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    loadQuestions();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr, status, error) {
                toastr.error("AJAX Error:", status, error);
            }
        });
    }

    function archiveQuestion(questionId) {
        $.ajax({
            type: "POST",
            url: "../q&a/index-ajax-archive-question.php",
            data: {
                id: questionId
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    loadQuestions();
                    toastr.success('Question archived');
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr, status, error) {
                toastr.error("AJAX Error:", status, error);
            }
        });
    }

    function restoreQuestion(questionId) {
        $.ajax({
            type: "POST",
            url: "../q&a/index-ajax-restore-question.php",
            data: {
                id: questionId
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    loadQuestions();
                    toastr.success('Question restored');
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr, status, error) {
                toastr.error("AJAX Error:", status, error);
            }
        });
    }

    async function removeQA() {
        const result = await Swal.fire({
            html: `<div class="mt-3">
                <h4 class="mb-5">Remove Q&A?</h4>
                <p class="mx-4 mb-0">This will hide the Q&A from your view and that of your participants. Any existing questions will be securely stored. To access the questions, add the Q&A again</p>
            </div>`,
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Yes, remove Q&A",
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
                    url: "../q&a/index-ajax-remove-session.php",
                    data: {
                        id: '<?= $RECORD['id'] ?>'
                    },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    qaSessionId = null;
                    activeQuestions = [];
                    archivedQuestions = [];

                    stopAutoRefresh();

                    updateQAStatus(false, false);

                    $('#archived-questions-list').html('');
                    $('#archived-count').text('0');

                    toastr.success('Q&A session removed');
                } else {
                    throw new Error(response.message);
                }
            } catch (error) {
                toastr.error("AJAX Error:", status, error);
            }
        }
    }
</script>