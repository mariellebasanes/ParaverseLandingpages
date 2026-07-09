<section>
    <div class="d-flex justify-content-between mb-10">
        <div class="d-flex align-items-center">
            <a href="../" class="btn btn-light-primary btn-circle btn-icon me-3 btn-sm">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h3 class="fw-bold text-gray-900 fs-3 mb-0"><?= htmlspecialchars($META_TITLE, ENT_NOQUOTES) ?></h3>
        </div>
        <div class="d-flex align-items-center gap-4">
            <div class="d-flex gap-3 align-items-center">
                <i class="bi bi-calendar4-week text-dark fs-3"></i>
                <span class="fs-6"><?= formatDateRange($RECORD['start_date'], $RECORD['end_date']) ?></span>
            </div>
            <div class="vr"></div>
            <div class="d-flex gap-2 align-items-center" id="event-code-container" data-bs-toggle="tooltip"
                data-bs-custom-class="tooltip-inverse" data-bs-placement="bottom"
                title="Participants can join at elicit.com using the code #<?= $RECORD['code'] ?>"
                style="cursor: pointer;">
                <i class="bi bi-hash text-dark fs-2"></i>
                <span class="fs-6">
                    <?= $RECORD['code'] ?>
                </span>
            </div>
            <div class="ms-4 d-flex gap-2">
                <button class="btn btn-sm btn-light-primary" data-kt-menu-trigger="click"
                    data-kt-menu-target="share-menu" data-kt-menu-placement="bottom-end">
                    <i class="bi bi-share-fill me-2"></i>
                    <span class="fs-6">Share</span>
                </button>
                <div id="share-menu" class="menu menu-sub menu-sub-dropdown menu-column w-400px w-lg-425px"
                    data-kt-menu="true">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Share with participants</h3>
                        </div>
                        <div class="card-body pt-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item pb-8 px-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex gap-2">
                                            <i class="bi bi-link-45deg fs-3 text-dark"></i>
                                            <h5>Joining Link</h5>
                                        </div>
                                        <button id="copy-join-link-btn" class="btn btn-outline w-200px">
                                            <i class="bi bi-copy fs-5 text-dark me-1"></i>
                                            <span id="join-link-text">Copy joining link</span>
                                        </button>
                                    </div>
                                </li>
                                <li class="list-group-item pt-8 px-0">
                                    <div class="d-flex gap-3 mb-5">
                                        <i class="bi bi-qr-code-scan text-dark"></i>
                                        <h5>QR code</h5>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="edith-qrcode position-relative w-100px"></div>
                                        <div class="d-grid gap-5">
                                            <button id="copy-qr-code-btn" class="btn btn-outline w-200px">
                                                <i class="bi bi-copy fs-5 text-dark me-1"></i>
                                                <span id="qr-code-text">Copy QR code</span>
                                            </button>
                                            <a id="download-qr-btn" href="#" download="QR-<?= $RECORD['code'] ?>.png"
                                                class="btn btn-outline w-200px">
                                                <i class="bi bi-download text-dark me-1"></i>
                                                <span>Download QR code</span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="btn-group" role="group" style="gap: 0.20rem !important;">
                    <a href="/elicit/admin/events/manage/<?= $RECORD['code'] ?>/present" target="_blank" rel="noopener"
                        class="btn btn-sm btn-primary" id="present-btn">
                        <i class="bi bi-easel-fill me-2"></i>
                        <span class="fs-6">Present</span>
                    </a>
                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false"></button>
                    <ul class="dropdown-menu dropdown-menu-end border shadow-lg">
                        <li>
                            <a id="copy-present-link" class="dropdown-item px-5" href="#">
                                <i class="bi bi-link-45deg text-dark fs-5 me-2"></i>
                                Copy present link
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow">
        <div class="card-body py-10 table-responsive">
            <form id="edith_form" class="row form needs-validation" method="post" novalidate>
                <div class="col-xl-4 border-end border-gray-200 pe-10">
                    <h5 class="mb-7">My Interactions</h5>
                    <div class="d-flex gap-3 mb-10">
                        <button type="button" class="btn btn-sm btn-primary" onclick="showView('default')">
                            <i class="bi bi-plus-lg fs-2 me-2"></i>
                            Add
                        </button>
                    </div>
                    <div class="d-flex flex-column">
                        <h6 class="fw-semibold mb-5">Audience Q&A</h6>
                        <div id="qa-container"></div>

                        <h6 class="fw-semibold mb-5">Polls</h6>
                        <div class="hover-scroll-x h-600px">
                            <div id="polls-container" class="d-flex flex-column gap-3"></div>
                        </div>
                    </div>
                </div>
                <div id="card-content" class="col-xl-8 ps-10">
                    <div id="default-view">
                        <h4 class="mt-2 mb-7">Add new interaction</h4>
                        <div class="row row-cols-1 row-cols-md-4 g-6">
                            <div class="col">
                                <div class="card h-100 border border-gray-200 shadow-sm card-hover bg-white" id="multiple-choice-card" style="cursor: pointer;">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center p-8">
                                        <div class="symbol symbol-50px mb-5 d-flex align-items-center justify-content-center">
                                            <img src="/elicit/assets/images/poll-types/multiple-choice.svg" class="h-40px">
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-gray-900 fw-bold mb-1">Multiple Choice</h5>
                                            <div class="text-gray-500 fs-7">Single or multi-select poll</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100 border border-gray-200 shadow-sm card-hover bg-white" id="word-cloud-card" style="cursor: pointer;">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center p-8">
                                        <div class="symbol symbol-50px mb-5 d-flex align-items-center justify-content-center">
                                            <img src="/elicit/assets/images/poll-types/word-cloud.svg" class="h-40px">
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-gray-900 fw-bold mb-1">Word Cloud</h5>
                                            <div class="text-gray-500 fs-7">Visual word cluster from responses</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100 border border-gray-200 shadow-sm card-hover bg-white" id="open-text-card" style="cursor: pointer;">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center p-8">
                                        <div class="symbol symbol-50px mb-5 d-flex align-items-center justify-content-center">
                                            <img src="/elicit/assets/images/poll-types/open-text.svg" class="h-40px">
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-gray-900 fw-bold mb-1">Open Text</h5>
                                            <div class="text-gray-500 fs-7">Free-form text responses</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100 border border-gray-200 shadow-sm card-hover bg-white" id="ranking-card" style="cursor: pointer;">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center p-8">
                                        <div class="symbol symbol-50px mb-5 d-flex align-items-center justify-content-center">
                                            <img src="/elicit/assets/images/poll-types/ranking.svg" class="h-40px">
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-gray-900 fw-bold mb-1">Ranking</h5>
                                            <div class="text-gray-500 fs-7">Participants order the options</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100 border border-gray-200 shadow-sm card-hover bg-white" id="rating-card" style="cursor: pointer;">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center p-8">
                                        <div class="symbol symbol-50px mb-5 d-flex align-items-center justify-content-center">
                                            <img src="/elicit/assets/images/poll-types/rating.svg" class="h-40px">
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-gray-900 fw-bold mb-1">Rating</h5>
                                            <div class="text-gray-500 fs-7">Star or numeric score scale</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100 border border-gray-200 shadow-sm card-hover bg-white" id="quiz-card" style="cursor: pointer;">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center p-8">
                                        <div class="symbol symbol-50px mb-5 d-flex align-items-center justify-content-center">
                                            <img src="/elicit/assets/images/poll-types/quiz.svg" class="h-40px">
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-gray-900 fw-bold mb-1">Quiz</h5>
                                            <div class="text-gray-500 fs-7">Competition with leaderboard</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100 border border-gray-200 shadow-sm card-hover bg-white" id="q&a-card" style="cursor: pointer;">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center p-8">
                                        <div class="symbol symbol-50px mb-5 d-flex align-items-center justify-content-center">
                                            <img src="/elicit/assets/images/poll-types/q-and-a.svg" class="h-40px">
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-gray-900 fw-bold mb-1">Audience Q&A</h5>
                                            <div class="text-gray-500 fs-7">Interactive question bank</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col opacity-50">
                                <div class="card h-100 border border-gray-200 bg-light" id="survey-card">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center p-8">
                                        <div class="symbol symbol-50px mb-5 d-flex align-items-center justify-content-center">
                                            <img src="/elicit/assets/images/poll-types/survey.svg" class="h-40px">
                                        </div>
                                        <div class="text-center">
                                            <h5 class="text-gray-600 fw-bold mb-1">Survey</h5>
                                            <div class="text-gray-400 fs-7">Multi-poll session</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include __DIR__ . '/../../../../..' . '/elicit/admin/events/q&a/index.php'; ?>

                    <?php include __DIR__ . '/../../../../..' . '/elicit/admin/events/rating/index.php'; ?>

                    <?php include __DIR__ . '/../../../../..' . '/elicit/admin/events/open-text/index.php'; ?>

                    <?php include __DIR__ . '/../../../../..' . '/elicit/admin/events/multiple-choice/index.php'; ?>

                    <?php include __DIR__ . '/../../../../..' . '/elicit/admin/events/ranking/index.php'; ?>

                    <?php include __DIR__ . '/../../../../..' . '/elicit/admin/events/word-cloud/index.php'; ?>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="/assets/js/qr.js" defer></script>
<script>
    let refreshInterval = null;
    let currentPollId = null;
    let currentPollType = null;
    let currentPollVotes = 0;
    let activePollId = null;
    let activePollType = null;
    let polls = [];
    let bulkUpdating = false;
    let saveTimeout = null;

    const POLL_TYPES = {
        'rating': {
            class: RatingManager,
            name: 'Rating',
        },
        'open-text': {
            class: OpenTextManager,
            name: 'Open Text',
        },
        'multiple-choice': {
            class: MultipleChoiceManager,
            name: 'Multiple Choice',
        },
        'ranking': {
            class: RankingManager,
            name: 'Ranking',
        },
        'word-cloud': {
            class: WordCloudManager,
            name: 'Word Cloud',
        },
    };

    async function selectPoll(pollId, pollType, pollVotes) {
        currentPollId = parseInt(pollId);
        currentPollType = pollType;
        currentPollVotes = pollVotes;

        if (POLL_TYPES[pollType]?.class?.initChart) {
            await POLL_TYPES[pollType].class.initChart();
        }

        highlightSidebarCard(`#${pollType}-${pollId}`);
        showView(pollType);
        await loadPollResponses();
    }


    function showView(viewName) {
        $('#default-view, #qa-view, #multiple-choice-view, #word-cloud-view, #open-text-view, #rating-view, #ranking-view, #quiz-view, #survey-view').addClass('d-none');

        $(`#${viewName}-view`).removeClass('d-none');

        if (viewName === 'qa' && qaSessionId) {
            loadQuestions();
            highlightSidebarCard('#qa-container .card');
        }
    }

    async function loadPollResponses() {
        await POLL_TYPES[currentPollType].class.loadPollResponses(currentPollId);
    }

    function showSavingIndicator(message, type = 'saving') {
        $('#saving-icon').html(type === 'saving' ?
            '<div class="spinner-border spinner-border-sm text-success me-1" role="status"></div>' :
            '<i class="bi bi-check-circle-fill text-success me-1"></i>'
        );
        $('#saving-text').text(message);
        $('#saving-indicator').removeClass('d-none');
    }

    async function loadPollsSidebar() {
        try {
            const response = await $.ajax({
                type: "POST",
                url: "polls/index-ajax-get-polls.php",
                data: { id: '<?= $RECORD['id'] ?>' },
                dataType: 'json'
            });

            if (response.status === 'success') {
                $('#polls-container').empty();
                polls = response.polls;
                activePollId = null;
                activePollType = null;

                response.polls.forEach(poll => {
                    if (poll.is_active) {
                        activePollId = poll.id;
                        activePollType = poll.poll_type;
                    }
                    renderPollCard(poll);
                });

                manageRealTimeUpdates();
            }
        } catch (error) {
            console.error('Error loading polls:', error);
        }
    }

    function highlightSidebarCard(cardSelector) {
        $('#qa-container .card, #polls-container .card').removeClass('border-primary shadow-sm');
        
        if (cardSelector) {
            $(cardSelector).addClass('border-primary shadow-sm');
        }
    }

    function renderPollCard(poll) {
        const pollId = `${poll.poll_type}-${poll.id}`;

        const isCurrentPoll = currentPollId === poll.id && currentPollType === poll.poll_type;

        const html = `<div id="${pollId}" class="card border-0 shadow-none bg-light mb-4 ${isCurrentPoll ? 'border-primary' : ''}" onclick="selectPoll(${poll.id}, '${poll.poll_type}', ${poll.votes})" style="cursor: pointer;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-4">
                        <div class="symbol symbol-40px">
                                <img src="/elicit/assets/images/poll-types/${poll.poll_type}.svg" class="h-30px">
                        </div>
                        <div class="d-flex flex-column">
                            <span class="fs-7 text-gray-800 fw-bold mb-1 poll-question text-truncate w-150px">${poll.question ?? 'Untitled'}</span>
                            <div class="d-flex align-items-center gap-2">
                                ${poll.is_active ? `
                                    <div class="badge badge-light-success d-flex align-items-center gap-2 py-1 px-2">
                                        <i class="bi bi-circle-fill fs-10"></i>
                                        <span class="fs-9 fw-bold poll-votes">${poll.votes} votes</span>
                                    </div>
                                ` : `
                                    <div class="badge badge-light-secondary d-flex align-items-center gap-2 py-1 px-2">
                                        <span class="fs-9 fw-bold text-gray-600 poll-votes">${poll.votes} votes</span>
                                    </div>
                                `}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-sm btn-icon btn-${poll.is_active ? 'light-danger' : 'light-success'} rounded-circle flex-shrink-0" data-bs-toggle="tooltip" title="${poll.is_active ? 'Stop' : 'Start'} poll" onclick="event.stopPropagation(); togglePoll(${poll.id}, ${poll.is_active}, '${poll.poll_type}')">
                            <i class="fa-solid fa-${poll.is_active ? 'stop' : 'play'}"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-icon btn-light-dark rounded-circle flex-shrink-0" data-bs-toggle="tooltip" title="Delete poll" onclick="event.stopPropagation(); POLL_TYPES['${poll.poll_type}'].class.deletePoll(${poll.id})">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>`;

        $(`#${pollId}`).length ?
            $(`#${pollId}`).replaceWith(html) :
            $('#polls-container').append(html);

        $(`#${pollId} [data-bs-toggle="tooltip"]`).tooltip('dispose');
        $(`#${pollId} [data-bs-toggle="tooltip"]`).tooltip({
            delay: { "show": 0, "hide": 0 }
        });
    }

    function updateVotesCount(isActive) {
        if (isActive) {
            $('.votes-count').removeClass('text-gray-600').addClass('d-flex gap-3 align-items-center').html(`<i class="bi bi-broadcast text-success fs-6"></i> <span class="text-success">${currentPollVotes} votes</span>`);
            $(`#${currentPollType}-view [data-repeater-create]`).addClass('d-none');
        } else {
            $('.votes-count').removeClass('d-flex gap-3 align-items-center').addClass('text-gray-600').text(`${currentPollVotes} votes`);
            $(`#${currentPollType}-view [data-repeater-create]`).removeClass('d-none');
        }
    }

    function manageRealTimeUpdates() {
        if (refreshInterval) {
            clearInterval(refreshInterval);
            refreshInterval = null;
        }

        refreshInterval = setInterval(async () => {
            await loadPollsSidebar();

            if (activePollId) {
                try {
                    const response = await $.ajax({
                        type: "POST",
                        url: `/elicit/admin/events/${activePollType}/index-ajax-get-responses.php`,
                        data: { poll_id: activePollId },
                        dataType: 'json'
                    });

                    if (response.status === 'success') {
                        $(`#${activePollType}-${activePollId} .poll-votes`).text(`${response.total_votes} votes`);

                        if (currentPollId === activePollId && currentPollType === activePollType) {
                            currentPollVotes = response.total_votes;
                            updateVotesCount(true);
                            await POLL_TYPES[activePollType].class.updateData(response);
                        } else {
                            updateVotesCount(false);
                        }
                    }
                } catch (error) {
                    console.error('Error in real-time update:', error);
                }
            }
        }, 5000);
    }

    async function togglePoll(pollId, isCurrentlyActive, pollType) {
        const endpoint = isCurrentlyActive ? 'stop' : 'start';

        try {
            const response = await $.ajax({
                type: "POST",
                url: `polls/index-ajax-${endpoint}-poll.php`,
                data: {
                    poll_id: pollId,
                    event_id: '<?= $RECORD['id'] ?>',
                    poll_type: pollType
                },
                dataType: 'json'
            });

            if (response.status === 'success') {
                activePollId = isCurrentlyActive ? null : pollId;
                activePollType = isCurrentlyActive ? null : pollType;
                manageRealTimeUpdates();
                await loadPollsSidebar();
                if (endpoint === 'start') await selectPoll(pollId, pollType);
                if (endpoint === 'stop') updateVotesCount(false);

                toastr.success(response.message);
            } else {
                throw new Error(response.message);
            }
        } catch (error) {
            toastr.error(`Error ${endpoint}ing poll: ${error.message}`);
        }
    }

    async function initializePollManagers() {
        Object.entries(POLL_TYPES).forEach(([pollType, config]) => {
            $(`#${pollType}-card`).on('click', async function () {
                if (config.class?.addPoll) {
                    await config.class.addPoll();
                } else {
                    showView(pollType);
                }
            });
        });
    }

    $(document).ready(function () {
        $('#event-code-container').on('click', function (e) {
            e.preventDefault();
            let code = '<?= $RECORD['code'] ?>';

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(code);
            } else {
                let textarea = document.createElement('textarea');
                textarea.value = code;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
            }

            $(this).attr('data-bs-original-title', 'Copied!').tooltip('update').tooltip('show');

            $(this).attr('data-bs-original-title', `Participants can join at elicit.com using the code #${code}`).tooltip('update');
        });

        const joinLink = window.location.origin + '/elicit/event/<?= $RECORD['code'] ?>';
        const logoPath = '/assets/img/logo.png';
        let qrImage = null;
        let logoImage = null;

        function createCompositeBlob(callback) {
            const canvas = document.createElement('canvas');
            canvas.width = qrImage.naturalWidth;
            canvas.height = qrImage.naturalHeight;
            const ctx = canvas.getContext('2d');

            ctx.fillStyle = '#ffffff';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.drawImage(qrImage, 0, 0);

            if (logoImage.complete && logoImage.naturalWidth) {
                const logoSize = canvas.width * 0.25;
                const logoX = (canvas.width - logoSize) / 2;
                const logoY = (canvas.height - logoSize) / 2;
                ctx.fillStyle = '#ffffff';
                ctx.fillRect(logoX - 2, logoY - 2, logoSize + 4, logoSize + 4);
                ctx.drawImage(logoImage, logoX, logoY, logoSize, logoSize);
            }
            canvas.toBlob(callback, 'image/png');
        }

        $(".edith-qrcode").empty().qrcode({
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

        qrImage = $(".edith-qrcode img")[0];
        if (!qrImage) return;

        logoImage = new Image();
        logoImage.crossOrigin = 'anonymous';
        logoImage.src = logoPath;

        let loadedCount = 0;
        function onImageLoaded() {
            if (++loadedCount === 2) {
                createCompositeBlob(function (blob) {
                    const blobUrl = URL.createObjectURL(blob);

                    $('#download-qr-btn').off('click').on('click', function (e) {
                        e.preventDefault();
                        const a = document.createElement('a');
                        a.href = blobUrl;
                        a.download = `QR-<?= $RECORD['code'] ?>.png`;
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);
                    });

                    $('#copy-qr-code-btn').off('click').on('click', function () {
                        const span = $('#qr-code-text');
                        const original = span.text();
                        navigator.clipboard.write([
                            new ClipboardItem({ [blob.type]: blob })
                        ]).then(() => {
                            span.text('Copied!');
                            setTimeout(() => span.text(original), 2000);
                        }).catch(() => toastr.error('Failed to copy QR code'));
                    });
                });
            }
        }

        qrImage.onload = onImageLoaded;
        if (qrImage.complete) onImageLoaded();

        logoImage.onload = onImageLoaded;
        if (logoImage.complete) onImageLoaded();

        qrImage.classList.add('w-100');
        $(".edith-qrcode").prepend(`<div class="d-flex justify-content-center align-items-center w-100 h-100 position-absolute top-0 start-0"><img class="w-25 bg-white rounded p-1" src="${logoPath}"></div>`);


        $('#copy-join-link-btn').on('click', function () {
            const originalText = $('#join-link-text').text();
            navigator.clipboard.writeText(joinLink).then(() => {
                $('#join-link-text').text('Copied!');
                setTimeout(() => $('#join-link-text').text(originalText), 2000);
            }).catch(() => toastr.error('Failed to copy link'));
        });

        $('#copy-present-link').on('click', function (e) {
            e.preventDefault();
            const presentUrl = window.location.origin + '/elicit/admin/events/manage/<?= $RECORD['code'] ?>/present';

            navigator.clipboard.writeText(presentUrl).then(() => {
                $(this).tooltip({
                    title: 'Copied!',
                    placement: 'bottom',
                    trigger: 'manual',
                    container: 'body',
                    customClass: 'tooltip-inverse'
                }).tooltip('show');

                setTimeout(() => {
                    $(this).tooltip('hide').tooltip('dispose');
                }, 1000);
            }).catch(() => toastr.error('Failed to copy present link'));
        });

        $(document).on('click', '#qa-container .card', function (e) {
            if (qaSessionId) {
                e.stopPropagation();
                showView('qa');
                highlightSidebarCard('#qa-container .card');
            }
        });

        $('[id="q&a-card"]').on('click', async function (e) {
            e.preventDefault();
            if (!qaSessionId) {
                addQASession();
            }

            showView('qa');
            highlightSidebarCard('#qa-container .card');
        });

        $(document).on('keyup', '.question', function () {
            clearTimeout(window.saveTimeout);
            const question = $(this).val().trim();

            showSavingIndicator('Saving', 'saving');
            window.saveTimeout = setTimeout(() => POLL_TYPES[currentPollType].class.saveQuestion(question, currentPollId), 1500);
        });

        loadPollsSidebar();
        initializePollManagers();
    });
</script>