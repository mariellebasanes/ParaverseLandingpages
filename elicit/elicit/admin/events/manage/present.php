<?php
define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');
include(__DIR__ . '/../../../..' . '/elicit/functions.elicit.php');


if (!isset($END_URL)) $END_URL = $_GET['id'] ?? null;

IS_LOGGED_IN($_SERVER['REQUEST_URI']);

if (getUserClassification($identification) == "Student") {
    http_response_code(403);
    exit;
}

if (!empty($END_URL)) {
    $SQL = "SELECT * FROM events WHERE id = ? OR code = ?";
    $SQL = $ELICIT->prepare($SQL);
    $SQL->bind_param('is', $END_URL, $END_URL);
    $SQL->execute();
    $RESULT = $SQL->get_result();

    if ($RESULT->num_rows == 0) {
        header("location: ../");
        exit();
    }

    $RECORD = $RESULT->fetch_assoc();
    $META_TITLE = $RECORD['name'];
    $META_DESC = $RECORD['code'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php HEAD_ESSENTIALS(); ?>

    <style>
        #floating-controls {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 5;
            transform: translateY(-50%);
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-wordcloud@4.3.0/build/index.umd.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

</head>

<body id="kt_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
    data-kt-app-layout="light-header" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    class="app-default">
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid bg-warning bg-opacity-10" id="kt_app_page">
            <div class="app-wrapper flex-column flex-row-fluid mt-4" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <main>
                            <div id="kt_app_content" class="app-content flex-column-fluid pt-0">
                                <div id="kt_app_content_container" class="app-container container-fluid">
                                    <div class="row">
                                        <div class="col-3 d-flex flex-column">
                                            <a href="/elicit/admin/events/manage/<?= $RECORD['id'] ?>"
                                                class="btn btn-outline btn-outline-dark btn-circle btn-icon me-3 mb-15">
                                                <i class="fs-4 text-dark bi bi-chevron-left"></i>
                                            </a>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="edith-qrcode position-relative bg-white w-250px"></div>
                                            </div>
                                            <div
                                                class="flex-grow-1 d-flex flex-column align-items-center gap-2 text-wrap mt-15">
                                                <span class="fs-3x fw-light">Join at</span>
                                                <span class="fs-4qx fw-bolder">elicit.com</span>
                                                <span class="fs-3qx fw-bolder">#
                                                    <?= $RECORD['code'] ?>
                                                </span>
                                                <div class="d-flex w-100 gap-3 mt-7">
                                                    <input id="join_link_input" type="text" class="form-control"
                                                        name="search"
                                                        value="http://localhost/elicit/event/<?= $RECORD['code'] ?>"
                                                        readonly />
                                                    <button id="join_link_button" class="btn btn-icon btn-light"
                                                        data-clipboard-target="#join_link_input">
                                                        <i class="ki-duotone ki-copy fs-2 text-muted"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div id="polls-view">
                                                <div id="slide-content" class="carousel slide">
                                                    <div class="carousel-inner"></div>
                                                </div>
                                            </div>
                                            <div id="qa-view" class="d-none">
                                                <div class="d-flex justify-content-between mb-10">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <img src="/elicit/assets/images/poll-types/q-and-a.svg"
                                                            class="w-40px">
                                                        <h1 class="fw-normal mb-0">Q&A</h1>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <select id="sort-questions"
                                                            class="form-select form-select-transparent form-select-lg fs-1"
                                                            data-control="select2" data-hide-search="true">
                                                            <option value="popular">Popular</option>
                                                            <option value="recent">Recent</option>
                                                            <option value="oldest">Oldest</option>
                                                        </select>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <h1 id="total-questions" class="fw-normal mb-0">0</h1>
                                                            <i class="fs-1 text-dark bi bi-chat"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="qa-questions-container"
                                                    class="d-flex flex-column gap-3 scroll h-700px">
                                                </div>
                                                <div id="qa-no-questions" class="text-center py-5 d-none">
                                                    <i class="bi bi-chat-square-text fs-1 text-muted"></i>
                                                    <p class="text-muted mt-3">No questions yet. Be the first to ask!
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="floating-controls"
                                        class="bg-dark p-3 rounded-3 d-flex gap-3 align-items-center">
                                        <button id="prev-btn" class="btn btn-dark">
                                            <i class="bi bi-arrow-left fs-4 me-2"></i> Prev
                                        </button>

                                        <button id="next-btn" class="btn btn-dark">
                                            Next <i class="bi bi-arrow-right fs-4 me-2"></i>
                                        </button>
                                        <div class="vr text-muted"></div>
                                        <button id="toggle-view-btn" class="btn btn-dark">Show Q&A</button>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/assets/js/scripts.bundle.v2.01.js"></script>
    <script src="/assets/js/qr.js"></script>
    <script>
        let currentChart = null;
        let currentPollId = null;
        let currentPollType = null;
        let refreshInterval = null;
        let currentView = 'polls';
        let currentPollIndex = 0;
        let questions = [];
        let polls = [];
        let chartInstances = {};
        let pollStructureHash = '';

        const target = $('#join_link_input');
        const button = $('#join_link_button');

        const clipboard = new ClipboardJS(button[0]);

        clipboard.on('success', (e) => {
            if (button.find('.ki-check').length) return;

            const check = $('<i class="ki-duotone ki-check fs-2x"></i>');
            button.addClass('btn-success').append(check).find('.ki-copy').addClass('d-none');
            target.addClass('text-success fw-boldest');

            setTimeout(() => {
                button.removeClass('btn-success').find('.ki-copy').removeClass('d-none');
                check.remove();
                target.removeClass('text-success fw-boldest');
            }, 3000);

            e.clearSelection();
        });

        function randomDarkColor() {
            const h = Math.floor(Math.random() * 360);
            const s = 70 + Math.floor(Math.random() * 30);
            const l = 20 + Math.floor(Math.random() * 21);
            return `hsl(${h}, ${s}%, ${l}%)`;
        }

        const POLL_TYPE_HANDLERS = {
            'rating': {
                icon: 'rating.svg',
                title: 'Rating Poll',
                render: (poll) => `
                    <div class="d-flex justify-content-between mb-7">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="/elicit/assets/images/poll-types/rating.svg" class="w-40px">
                            <h1 class="fw-normal mb-0">Active poll</h1>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <h1 id="total-votes-${poll.id}" class="fw-normal mb-0">0</h1>
                            <i class="fs-1 text-dark bi bi-people"></i>
                        </div>
                    </div>
                    <div class="card card-bordered h-800px">
                        <div class="card-header py-7">
                            <div class="card-title">
                                <h1 class="display-5 fw-bold mb-0" id="poll-question-${poll.id}">${poll.question ?? 'Untitled'}</h1>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="badge badge-success rounded-pill text-white text-center gap-3 fs-2 px-12 py-4 align-self-center">
                                Score:
                                <i class="fs-2 bi bi-star-fill text-white"></i>
                                <span id="average-rating-${poll.id}">0.0</span>
                            </div>
                            
                            <div class="h-600px" id="chart-${poll.id}"></div>
                        </div>
                    </div>`,
                initChart: initRatingChart,
                updateData: updateRatingChart
            },
            'open-text': {
                icon: 'open-text.svg',
                title: 'Open Text Poll',
                render: (poll) => `
                    <div class="d-flex justify-content-between mb-7">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="/elicit/assets/images/poll-types/open-text.svg" class="w-40px">
                            <h1 class="fw-normal mb-0">Active poll</h1>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <h1 id="total-votes-${poll.id}" class="fw-normal mb-0">0</h1>
                            <i class="fs-1 text-dark bi bi-people"></i>
                        </div>
                    </div>
                    <div class="card card-bordered h-800px">
                        <div class="card-header py-7">
                            <div class="card-title">
                                <h1 class="display-5 fw-bold mb-0" id="poll-question-${poll.id}">${poll.question ?? 'Untitled'}</h1>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="responses-container-${poll.id}" class="d-flex flex-column gap-5"></div>
                        </div>
                    </div>`,
                updateData: updateOpenTextResponse
            },
            'multiple-choice': {
                icon: 'multiple-choice.svg',
                title: 'Multiple Choice Poll',
                render: (poll) => {
                    return `<div class="d-flex justify-content-between mb-7">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="/elicit/assets/images/poll-types/multiple-choice.svg" class="w-40px">
                            <h1 class="fw-normal mb-0">Active poll</h1>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <h1 id="total-votes-${poll.id}" class="fw-normal mb-0">0</h1>
                            <i class="fs-1 text-dark bi bi-people"></i>
                        </div>
                    </div>
                    <div class="card card-bordered h-800px">
                        <div class="card-header py-7">
                            <div class="card-title">
                                <h1 class="display-5 fw-bold mb-0" id="poll-question-${poll.id}">${poll.question ?? 'Untitled'}</h1>
                            </div>
                        </div>
                        <div class="card-body scroll h-600px">
                            <div id="options-container-${poll.id}" class="d-flex flex-column gap-15"></div>
                        </div>
                    </div>`;
                },
                updateData: updateMultipleChoicePoll
            },
            'ranking': {
                icon: 'ranking.svg',
                title: 'Ranking Poll',
                render: (poll) => {
                    return `<div class="d-flex justify-content-between mb-7">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="/elicit/assets/images/poll-types/ranking.svg" class="w-40px">
                            <h1 class="fw-normal mb-0">Active poll</h1>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <h1 id="total-votes-${poll.id}" class="fw-normal mb-0">0</h1>
                            <i class="fs-1 text-dark bi bi-people"></i>
                        </div>
                    </div>
                    <div class="card card-bordered h-800px">
                        <div class="card-header py-7">
                            <div class="card-title">
                                <h1 class="display-5 fw-bold mb-0" id="poll-question-${poll.id}">${poll.question ?? 'Untitled'}</h1>
                            </div>
                        </div>
                        <div class="card-body scroll h-600px">
                            <div id="options-container-${poll.id}" class="d-flex flex-column gap-15"></div>
                        </div>
                    </div>`;
                },
                updateData: updateRankingPoll
            },
            'word-cloud': {
                icon: 'word-cloud.svg',
                title: 'Word Cloud Poll',
                render: (poll) => {
                    return `<div class="d-flex justify-content-between mb-7">
                        <div class="d-flex gap-2 align-items-center">
                            <img src="/elicit/assets/images/poll-types/word-cloud.svg" class="w-40px">
                            <h1 class="fw-normal mb-0">Active poll</h1>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <h1 id="total-votes-${poll.id}" class="fw-normal mb-0">0</h1>
                            <i class="fs-1 text-dark bi bi-people"></i>
                        </div>
                    </div>
                    <div class="card card-bordered h-800px">
                        <div class="card-header py-7">
                            <div class="card-title">
                                <h1 class="display-5 fw-bold mb-0" id="poll-question-${poll.id}">${poll.question ?? 'Untitled'}</h1>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="word-cloud-canvas-${poll.id}"></canvas>
                        </div>
                    </div>`;
                },
                updateData: updateWordCloudPoll
            },
        };

        function switchToPollsView() {
            if (currentView === 'qa') {
                $('#qa-view').addClass('d-none');
                $('#polls-view').removeClass('d-none');
                $('#toggle-view-btn').text('Show Q&A');
                currentView = 'polls';
                return true;
            }
            return false;
        }

        $('#toggle-view-btn').on('click', function () {
            if (!switchToPollsView()) {
                $('#polls-view').addClass('d-none');
                $('#qa-view').removeClass('d-none');
                $(this).text('Show Polls');
                currentView = 'qa';
                manageRealTimeUpdates();
            }
        });

        function handleNavigation(direction) {
            const newIndex = currentPollIndex + direction;
            if (polls.length === 0 || newIndex < 0 || newIndex >= polls.length) return;

            switchToPollsView();
            navigateToPoll(newIndex);
        }

        $('#prev-btn').on('click', () => handleNavigation(-1));
        $('#next-btn').on('click', () => handleNavigation(1));
        $('#sort-questions').on('change', renderQuestions);

        async function navigateToPoll(index) {
            if (refreshInterval) {
                clearInterval(refreshInterval);
                refreshInterval = null;
            }

            const poll = polls[index];
            if (!poll) return;

            currentPollIndex = index;
            currentPollId = poll.id;
            currentPollType = poll.poll_type;

            updateNavigationButtons();
            $('.carousel-item').removeClass('active').eq(index).addClass('active');

            await startPoll();
            await loadPollResponses();
            manageRealTimeUpdates();
        }

        function updateNavigationButtons() {
            $('#prev-btn').prop('disabled', currentPollIndex === 0);
            $('#next-btn').prop('disabled', currentPollIndex === polls.length - 1);
        }

        function formatDateTime(datetime) {
            const date = new Date(datetime);

            const options = { day: "2-digit", month: "long", year: "numeric" };
            const formattedDate = date.toLocaleDateString("en-US", options);

            let hours = date.getHours();
            const minutes = date.getMinutes().toString().padStart(2, "0");
            const period = hours >= 12 ? "PM" : "AM";
            hours = hours % 12 || 12;

            return `${formattedDate}, ${hours}:${minutes} ${period}`;
        }

        async function loadAllPolls() {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "../polls/index-ajax-get-polls.php",
                    data: { id: '<?= $RECORD['id'] ?>' },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    const newPolls = response.polls || [];
                    const newHash = newPolls.map(poll =>
                        `${poll.id}:${poll.poll_type}:${poll.question}`
                    ).join('|');

                    if (newHash !== pollStructureHash) {
                        pollStructureHash = newHash;
                        await handlePollStructureChange(newPolls);
                    } else {
                        updatePollData(newPolls);

                        const activePollIndex = newPolls.findIndex(p => p.is_active);
                        if (activePollIndex !== -1 && activePollIndex !== currentPollIndex) {
                            await navigateToPoll(activePollIndex);
                        }
                    }
                } else {
                    if (polls.length > 0) {
                        await handlePollStructureChange([]);
                    }
                }
            } catch (error) {
                console.error('Error loading polls:', error);
            }
        }

        function renderPollCard(poll) {
            const handler = POLL_TYPE_HANDLERS[poll.poll_type];

            return `<div class="carousel-item" data-poll-id="${poll.id}" data-poll-type="${poll.poll_type}">
                ${handler.render(poll)}
            </div>`;
        }

        async function handlePollStructureChange(newPolls) {
            const oldPollIds = polls.map(p => `${p.id}-${p.poll_type}`);
            const newPollIds = newPolls.map(p => `${p.id}-${p.poll_type}`);

            oldPollIds.forEach(pollKey => {
                const [pollId, pollType] = pollKey.split('-');

                if (chartInstances[pollId]) {
                    if (chartInstances[pollId].root?.dispose) {
                        chartInstances[pollId].root.dispose();
                    }

                    if (chartInstances[pollId]?.destroy) {
                        chartInstances[pollId].destroy();
                    }
                    delete chartInstances[pollId];
                }
            });

            const previousPolls = [...polls];
            polls = newPolls;

            updateCarouselSelectively(previousPolls, newPolls);

            updateNavigationButtons();

            if (polls.length === 0) {
                currentPollId = null;
                currentPollType = null;
                currentPollIndex = 0;
                updateNavigationButtons();
            } else {
                const currentPollExists = currentPollId ?
                    polls.findIndex(p => p.id === currentPollId && p.poll_type === currentPollType) : -1;

                if (currentPollExists !== -1) {
                    currentPollIndex = currentPollExists;
                    $('.carousel-item').removeClass('active').eq(currentPollIndex).addClass('active');

                    if (!chartInstances[currentPollId]) {
                        const handler = POLL_TYPE_HANDLERS[currentPollType];
                        if (handler?.initChart) {
                            await handler.initChart(currentPollId);
                        }
                    }
                } else {
                    const activePollIndex = polls.findIndex(p => p.is_active);
                    await navigateToPoll(activePollIndex !== -1 ? activePollIndex : 0);
                }
            }
        }

        function updateCarouselSelectively(oldPolls, newPolls) {
            const carouselInner = $('.carousel-inner');

            const existingElements = {};
            carouselInner.find('.carousel-item').each(function () {
                const pollId = $(this).data('poll-id');
                const pollType = $(this).data('poll-type');
                const pollKey = `${pollId}-${pollType}`;
                existingElements[pollKey] = $(this);
            });

            carouselInner.empty();

            newPolls.forEach((poll, index) => {
                const pollKey = `${poll.id}-${poll.poll_type}`;

                if (existingElements[pollKey]) {
                    const element = existingElements[pollKey];
                    element.find(`#poll-question-${poll.id}`).text(poll.question ?? 'Untitled');
                    carouselInner.append(element);
                } else {
                    const handler = POLL_TYPE_HANDLERS[poll.poll_type];
                    if (handler) {
                        const element = $(`<div class="carousel-item" data-poll-id="${poll.id}" data-poll-type="${poll.poll_type}">
                    ${handler.render(poll)}
                </div>`);
                        carouselInner.append(element);
                    }
                }

                if (currentPollId === poll.id && currentPollType === poll.poll_type) {
                    carouselInner.children().last().addClass('active');
                }
            });
        }

        function updatePollData(newPolls) {
            newPolls.forEach(newPoll => {
                const existingPollIndex = polls.findIndex(p =>
                    p.id === newPoll.id && p.poll_type === newPoll.poll_type
                );

                if (existingPollIndex !== -1) {
                    polls[existingPollIndex] = { ...polls[existingPollIndex], ...newPoll };

                    if (currentPollId === newPoll.id && currentPollType === newPoll.poll_type) {
                        $(`#poll-question-${newPoll.id}`).text(newPoll.question ?? 'Untitled');
                    }
                }
            });
        }

        async function startPoll() {
            try {
                await $.ajax({
                    type: "POST",
                    url: `../polls/index-ajax-start-poll.php`,
                    data: {
                        poll_id: currentPollId,
                        event_id: '<?= $RECORD['id'] ?>',
                        poll_type: currentPollType
                    },
                    dataType: 'json'
                });

                const handler = POLL_TYPE_HANDLERS[currentPollType];
                if (handler?.initChart && !chartInstances[currentPollId]) {
                    await handler.initChart(currentPollId);
                } else {
                    currentChart = chartInstances[currentPollId];
                }
            } catch (error) {
                toastr.error(`Error starting poll: ${error}`);
            }
        }

        async function loadQuestions() {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "/elicit/q&a/index-ajax-get-questions.php",
                    data: { code: '<?= $RECORD['code'] ?>' },
                    dataType: 'json'
                });

                questions = response.questions.filter(q => !q.is_archived && !q.is_answered);
                updateQuestionCount(questions.length);
                renderQuestions();
            } catch (error) {
                console.error('Error loading Q&A data:', error);
                $('#qa-questions-container').html('<div class="text-center text-muted py-4">Error loading questions</div>');
            }
        }

        function updateQuestionCount(count) {
            $('#total-questions').text(count);
            if (count === 0) {
                $('#qa-no-questions').removeClass('d-none');
                $('#qa-questions-container').addClass('d-none');
            } else {
                $('#qa-no-questions').addClass('d-none');
                $('#qa-questions-container').removeClass('d-none');
            }
        }

        function renderQuestions() {
            const container = $('#qa-questions-container');
            container.empty();

            if (questions.length === 0) return;

            let sortedQuestions = [...questions];

            switch ($('#sort-questions').val()) {
                case 'popular':
                    sortedQuestions.sort((a, b) => {
                        if (a.is_highlighted && !b.is_highlighted) return -1;
                        if (!a.is_highlighted && b.is_highlighted) return 1;

                        return b.likes - a.likes;
                    });
                    break;
                case 'recent':
                    sortedQuestions.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                    break;
                case 'oldest':
                    sortedQuestions.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
                    break;
            }

            sortedQuestions.forEach(question => {
                container.append(`
                <div class="card card-flush mb-5 question-item ${question.is_highlighted ? 'bg-success' : ''}" data-question-id="${question.id}">
                    <div class="card-header pt-5">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-40px me-5">
                                <img src="${question.avatar_url}" alt="${question.participant_name}" />
                            </div>
                            <div class="flex-grow-1">
                                <span class="fs-4 fw-bold ${question.is_highlighted ? 'text-inverse-success' : 'text-gray-800'}">${question.participant_name}</span>
                                <span class="d-block fs-6 ${question.is_highlighted ? 'text-inverse-success' : 'text-gray-500'}">${formatDateTime(question.created_at)}</span>
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <div class="m-0">
                                <button class="btn btn-sm rounded-pill btn-secondary align-items-center px-5 like-btn">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="like-count">${question.likes}</span>
                                        <i class="fa-regular fa-thumbs-up fs-4"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="fs-1 fw-normal ${question.is_highlighted ? 'text-inverse-success' : 'text-gray-700'}">${question.text}</div>
                    </div>
                </div>`);
            });
        }

        async function initRatingChart(pollId) {
            if (chartInstances[pollId]) {
                currentChart = chartInstances[pollId];
                return Promise.resolve(currentChart);
            }

            const chartContainer = document.getElementById(`chart-${pollId}`);
            if (!chartContainer) {
                console.warn(`Chart container #chart-${pollId} not found`);
                return Promise.resolve();
            }

            return new Promise((resolve) => {
                am5.ready(() => {
                    const root = am5.Root.new(`chart-${pollId}`);

                    root._logo.dispose();
                    root.setThemes([am5themes_Animated.new(root)]);

                    const chart = root.container.children.push(
                        am5xy.XYChart.new(root, { panX: false, panY: false, layout: root.verticalLayout, maxTooltipDistance: 0 })
                    );

                    const xAxis = chart.xAxes.push(
                        am5xy.CategoryAxis.new(root, {
                            categoryField: "rating",
                            renderer: am5xy.AxisRendererX.new(root, { minGridDistance: 30 })
                        })
                    );

                    xAxis.get("renderer").labels.template.setAll({
                        paddingTop: 20, fontWeight: "700",
                        fill: am5.color(KTUtil.getCssVariableValue('--bs-gray-500'))
                    });

                    xAxis.get("renderer").grid.template.setAll({ disabled: true, strokeOpacity: 0 });

                    const yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                        renderer: am5xy.AxisRendererY.new(root, {})
                    }));

                    yAxis.get("renderer").labels.template.set('visible', false);

                    yAxis.get("renderer").grid.template.setAll({
                        strokeWidth: 0,
                        visible: false
                    });

                    const series = chart.series.push(
                        am5xy.ColumnSeries.new(root, {
                            xAxis: xAxis, yAxis: yAxis,
                            valueYField: "votes", categoryXField: "rating", maskBullets: false
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
                            text: "{percentage}%", fill: am5.color(0x000000), fontWeight: "600", fontSize: 15, centerY: am5.p100, centerX: am5.p50, populateText: true
                        })
                    }));

                    series.bullets.push(() => am5.Bullet.new(root, {
                        sprite: am5.Label.new(root, {
                            text: "{valueY}", fill: am5.color(0xFFFFFF),
                            centerY: am5.p50, centerX: am5.p50, populateText: true
                        })
                    }));

                    currentChart = { root, chart, xAxis, series, pollId };
                    chartInstances[pollId] = currentChart;

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
                    resolve(currentChart);
                });
            });
        }

        async function loadPollResponses() {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: `/elicit/${currentPollType}/index-ajax-get-responses.php`,
                    data: { poll_id: currentPollId },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    updateData(response);
                }
            } catch (error) {
                console.error('Error loading poll data:', error);
            }
        }

        async function updateData(response) {
            const handler = POLL_TYPE_HANDLERS[currentPollType];
            if (handler?.updateData) {
                handler.updateData(response);
            }
        }

        function updateRatingChart(response) {
            if (!currentChart || !chartInstances[currentPollId]) return;

            const chartData = Object.entries(response.ratings).map(([rating, data]) => ({
                rating: rating.toString(),
                votes: data.votes,
                percentage: data.percentage
            }));

            currentChart.xAxis.data.setAll(chartData);
            currentChart.series.data.setAll(chartData);

            $(`#average-rating-${currentPollId}`).text(response.average_rating.toFixed(1));
            $(`#total-votes-${currentPollId}`).text(response.total_votes);
        }

        function updateOpenTextResponse(response) {
            const container = $(`#responses-container-${currentPollId}`);
            container.empty();

            if (response.answers.length === 0) {
                return;
            }

            const sortedAnswers = [...response.answers].sort((a, b) => {
                return new Date(b.created_at) - new Date(a.created_at);
            });

            let html = '';

            sortedAnswers.forEach(poll => {
                html += `<div class="card bg-secondary bg-opacity-50 shadow-none border-top-0 border-end-0 border-bottom-0 border-5 border-gray-300 rounded-3">
                    <div class="card-body p-5 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="d-flex gap-4 align-items-center mb-4">
                                <div class="symbol symbol-circle symbol-45px">
                                    <img src="${poll.avatar_url}" alt="${poll.participant_name}" class="rounded-circle">
                                </div>
                                <span class="fs-2 fw-bold text-gray-800">${poll.participant_name}</span>
                            </div>
                            <p class="fs-1 mb-0 text-gray-700">${poll.response}</p>
                        </div>
                        <span class="fs-5 text-muted">${moment(poll.created_at).fromNow()}</span>
                    </div>
                </div>`;
            });

            container.html(html);

            $(`#total-votes-${currentPollId}`).text(response.total_votes);
        }

        function updateMultipleChoicePoll(response) {
            $(`#poll-question-${currentPollId}`).text(response.question || 'Untitled')
            $(`#total-votes-${currentPollId}`).text(response.total_votes);

            const maxVotes = Math.max(...response.options.map(opt => opt.votes));
            const container = $(`#options-container-${currentPollId}`);

            const existingOptions = {};
            container.find('.poll-question-option').each(function () {
                const id = $(this).data('option-id');
                if (id) existingOptions[id] = $(this);
            });
            const processedIds = new Set();

            response.options.forEach(opt => {
                const index = response.options.findIndex(o => o.id === opt.id);
                const displayText = opt.option ?? `Option ${index + 1}`;
                const barWidth = maxVotes > 0 ? (opt.votes / maxVotes) * 100 : 0;
                const barColor = opt.votes > 0 ? 'bg-primary' : 'bg-gray-300';

                if (existingOptions[opt.id]) {
                    const el = existingOptions[opt.id]
                    el.find('.option').text(displayText);

                    const grid = el.find('.results-grid');
                    grid.css('grid-template-columns', `minmax(45px, ${barWidth}%) 50px`);

                    const bar = grid.find('> div:first-child');
                    bar.removeClass('bg-primary bg-gray-300').addClass(barColor);
                    el.find('.percentage').text(opt.percentage + '%');
                } else {
                    const newEl = $(`
                        <div class="poll-question-option" data-option-id="${opt.id}">
                            <h1 class="option fs-2x fw-semibold text-gray-800 mb-5">${displayText}</h1>
                            <div class="results-grid" style="display: grid; grid-template-columns: minmax(45px, ${barWidth}%) 50px; align-items: center;">
                                <div class="h-100 rounded-pill ${barColor}"></div>
                                <div class="result-data d-flex align-items-center ms-3">
                                    <span class="percentage fs-1 fw-bold text-dark">${opt.percentage}%</span>
                                </div>
                            </div>
                        </div>
                    `);
                    container.append(newEl);
                }

                processedIds.add(opt.id);
            });

            Object.keys(existingOptions).forEach(id => {
                if (!processedIds.has(parseInt(id))) {
                    existingOptions[id].remove();
                }
            });
        }

        function updateRankingPoll(response) {
            $(`#poll-question-${currentPollId}`).text(response.question || 'Untitled')
            $(`#total-votes-${currentPollId}`).text(response.total_votes);

            const options = response.options.map((opt, idx) => ({
                ...opt, orig_id: idx + 1, average: Number(opt.average)
            }));
            const sortedOptions = options.sort((a, b) => b.average - a.average);
            const totalOptions = response.options.length;
            const container = $(`#options-container-${currentPollId}`);

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
                    const newEl = $(`<div class="poll-question-option" data-option-id="${opt.id}">
                        <h1 class="option fs-2x fw-semibold text-gray-800 mb-5">
                        <span class="me-2">${index + 1}.</span> ${displayText}</h1>
                        <div class="d-flex align-items-center gap-4">
                            <div class="progress bg-gray-300 flex-grow-1 rounded-pill"
                                role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height: 30px">
                                <div class="progress-bar progress-bar-animated rounded-pill ${barColor}" style="width: ${percentage}%">
                                </div>
                            </div>
                        </div>
                    </div>`);
                    container.append(newEl);
                }

                processedIds.add(opt.id);
            });

            Object.keys(existingElements).forEach(id => {
                if (!processedIds.has(parseInt(id))) {
                    existingElements[id].remove();
                }
            });
        }

        function updateWordCloudPoll(response) {
            $(`#poll-question-${currentPollId}`).text(response.question || 'Untitled');
            $(`#total-votes-${currentPollId}`).text(response.total_votes);

            const responses = response.responses || [];
            const canvas = document.getElementById(`word-cloud-canvas-${currentPollId}`);

            if (responses.length === 0) {
                if (chartInstances[currentPollId]) {
                    chartInstances[currentPollId].destroy();
                    delete chartInstances[currentPollId];
                }
                return;
            }

            if (!chartInstances[currentPollId]) {
                const chart = new Chart(canvas.getContext('2d'), {
                    type: 'wordCloud',
                    data: {
                        labels: responses.map(r => r.key),
                        datasets: [{
                            data: responses.map((r) => 15 + (r.value * 8)),
                            color: responses.map(() => randomDarkColor()),
                            padding: 5,
                        }]
                    },
                    options: {
                        minRotation: 0,
                        maxRotation: 0,
                        plugins: {
                            tooltip: false,
                            legend: false
                        }
                    }
                });

                chartInstances[currentPollId] = chart;
            } else {
                const chart = chartInstances[currentPollId];
                chart.data.labels = responses.map(r => r.key);
                chart.data.datasets[0].data = responses.map((r) => 15 + (r.value * 8));
                chart.update();
            }
        }

        function manageRealTimeUpdates() {
            if (refreshInterval) {
                clearInterval(refreshInterval);
                refreshInterval = null;
            }

            refreshInterval = setInterval(async () => {
                await loadAllPolls();

                try {
                    if (currentView === 'polls') {

                        if (currentPollId) {
                            await loadPollResponses();
                        }
                    } else if (currentView === 'qa') {
                        await loadQuestions();
                    }
                } catch (error) {
                    console.error('Error in real-time update:', error);
                }
            }, 3000);
        }

        const joinLink = window.location.origin + `/elicit/event/${'<?= $RECORD['code'] ?>'}`;

        const edithLogo = `<div class="d-flex justify-content-center align-items-center w-100 h-100 position-absolute">
            <img class="w-25 bg-white rounded p-1" src="/assets/img/logo.png">
        </div>`;

        $(".edith-qrcode").qrcode({
            render: 'image',
            ecLevel: 'L',
            background: "",
            size: 500,
            fill: "#333",
            text: joinLink,
            radius: 5,
            mode: 3,
            fontname: 'sans',
            fontcolor: '#000',
        });

        $(".edith-qrcode img").addClass("w-100");
        $(".edith-qrcode").prepend(edithLogo);

        $(document).ready(async () => {
            await loadAllPolls();
            await loadQuestions();
        });
    </script>
</body>

</html>