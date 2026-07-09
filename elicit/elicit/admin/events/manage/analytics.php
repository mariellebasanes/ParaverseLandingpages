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

$SQL = $ELICIT->prepare("SELECT * FROM `events` WHERE `code` = ?");
$SQL->bind_param('i', $END_URL);
$SQL->execute();
$RESULT = $SQL->get_result();

if ($RESULT->num_rows == 0) {
    header("location: ../");
    exit;
}

$RECORD = $RESULT->fetch_assoc();
$META_TITLE = htmlspecialchars($RECORD['name']) . " - Analytics";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php HEAD_ESSENTIALS(); ?>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-wordcloud"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
    data-kt-app-layout="light-header" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    class="app-default">
    <?php include(__DIR__ . '/../../../..' . '/elicit/partials/_page-loader.php'); ?>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <?php include(__DIR__ . '/../../../..' . '/elicit/partials/_header.php'); ?>
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <main>
                            <div id="kt_app_content" class="app-content flex-column-fluid">
                                <div id="kt_app_content_container" class="app-container container-xxl">
                                    <section>
                                        <div class="d-flex justify-content-between mb-10">
                                            <div class="d-flex align-items-center">
                                                <a href="../../"
                                                    class="btn btn-light-primary btn-circle btn-icon me-3 btn-sm">
                                                    <i class="bi bi-arrow-left"></i>
                                                </a>
                                                <h3 class="fw-bold text-gray-900 fs-3 mb-0">
                                                    Analytics:
                                                    <?= htmlspecialchars($RECORD['name']) ?>
                                                </h3>
                                            </div>
                                        </div>


                                        <h4 class="fw-semibold mb-7">Q&A Insights</h4>
                                        <div class="row align-items-stretch">
                                            <!-- Left column: three stacked cards -->
                                            <div class="col-md-6 d-flex flex-column gap-4 h-100">
                                                <!-- Metrics card -->
                                                <div class="card border-0 shadow flex-grow-0">
                                                    <div class="card-body">
                                                        <div class="row g-3">
                                                            <div class="col-4 text-center">
                                                                <div class="fs-1 fw-bold" id="qa-total-questions">0
                                                                </div>
                                                                <div class="text-muted">Total Questions</div>
                                                            </div>
                                                            <div class="col-4 text-center">
                                                                <div class="fs-1 fw-bold" id="qa-anonymous-rate">0%
                                                                </div>
                                                                <div class="text-muted">Anonymous Rate</div>
                                                            </div>
                                                            <div class="col-4 text-center">
                                                                <div class="fs-1 fw-bold" id="qa-named-authors">0</div>
                                                                <div class="text-muted">Named Authors</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Word Cloud card -->
                                                <div class="card border-0 shadow flex-grow-1 d-flex flex-column">
                                                    <div class="card-header">
                                                        <h5 class="card-title mb-0">Q&A Word Cloud</h5>
                                                    </div>
                                                    <div class="card-body overflow-auto">
                                                        <canvas id="qa-wordcloud-canvas"
                                                            style="height: 100%; width: 100%; min-height: 200px;"></canvas>
                                                    </div>
                                                </div>

                                                <!-- Sentiment card -->
                                                <?php include(__DIR__ . '/../../../..' . '/elicit/includes/widget-event-sentiment.php'); ?>
                                            </div>

                                            <!-- Right column: list of questions -->
                                            <div class="col-md-6">
                                                <div class="card border-0 shadow h-100 d-flex flex-column"
                                                    style="overflow: hidden;">
                                                    <div class="card-header">
                                                        <h5 class="card-title mb-0">All Questions</h5>
                                                    </div>
                                                    <div class="card-body overflow-auto p-0">
                                                        <div id="qa-questions-list"
                                                            class="list-group list-group-flush hover-scroll-x h-600px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <h4 class="fw-semibold my-7">Poll Insights</h4>
                                        <div class="row align-items-stretch">
                                            <div class="col-md-4">
                                                <div class="card border-0 shadow hover-scroll-x h-600px">
                                                    <div class="card-body p-0 overflow-auto">
                                                        <div id="polls-sidebar" class="list-group list-group-flush">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div id="polls-content" class="hover-scroll-x h-600px">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </main>
                    </div>
                    <?php include(__DIR__ . '/../../../..' . '/elicit/partials/_footer.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php include(__DIR__ . '/../../../..' . '/elicit/partials/_scrolltop.php'); ?>

    <script src="/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/assets/js/scripts.bundle.v2.01.js"></script>
    <script>
        const POLL_TYPE_UPDATERS = {
            'rating': updateRatingChart,
            'open-text': updateOpenTextResponse,
            'multiple-choice': updateMultipleChoicePoll,
            'ranking': updateRankingPoll,
            'word-cloud': updateWordCloudPoll
        };

        window.chartInstances ??= {};

        $(document).ready(async () => {
            loadQAInsights();

            const sidebar = $('#polls-sidebar');

            const setError = (el, msg) => el.html(`<div class="list-group-item text-danger">${msg}</div>`);
            const setInfo = (el, msg) => el.html(`<div class="list-group-item text-muted">${msg}</div>`);

            try {
                const response = await ajaxPost('/elicit/admin/events/manage/polls/index-ajax-get-polls.php', {
                    id: <?= (int) $RECORD['id'] ?>
                });

                if (response.status !== 'success') return setError(sidebar, 'Failed to load polls.');
                if (!response.polls.length) return setInfo(sidebar, 'No polls found.');

                const pollsWithData = response.polls.filter(poll => poll.votes > 0);
                if (pollsWithData.length === 0) {
                    return setInfo(sidebar, 'No polls with responses yet.');
                }

                pollsWithData.forEach((poll, index) => {
                    const card = buildPollCard(poll);
                    card.on('click', handlePollClick);
                    sidebar.append(card);
                    if (index === 0) card.trigger('click');
                });

            } catch (err) {
                console.error('Error loading polls:', err);
                setError(sidebar, 'Error loading polls.');
            }
        });

        function ajaxPost(url, data) {
            return $.ajax({ type: 'POST', url, data, dataType: 'json' });
        }

        function capitalizeWords(str) {
            return str.replace(/\b\w/g, l => l.toUpperCase());
        }

        function randomDarkColor() {
            const h = Math.floor(Math.random() * 360);
            const s = 70 + Math.floor(Math.random() * 30);
            const l = 20 + Math.floor(Math.random() * 21);
            return `hsl(${h}, ${s}%, ${l}%)`;
        }

        function buildPollCard(poll) {
            return $(`<a href="#" class="list-group-item d-flex align-items-center gap-3 p-5 bg-white border-secondary"
               data-poll-id="${poll.id}" data-poll-type="${poll.poll_type}">
                <img src="/elicit/assets/images/poll-types/${poll.poll_type}.svg" class="w-30px">
                <div>
                    <div class="fw-semibold">${poll.question ?? 'Untitled'}</div>
                </div>
            </a>`);
        }

        async function handlePollClick(e) {
            e.preventDefault();

            $('#polls-sidebar .list-group-item').removeClass('bg-success-subtle').addClass('bg-white');
            $(this).removeClass('bg-white').addClass('bg-success-subtle');

            const pollId = $(this).data('poll-id');
            const pollType = $(this).data('poll-type');
            const content = $('#polls-content');

            destroyChart(pollId, pollType);

            try {
                const data = await ajaxPost(`/elicit/${pollType}/index-ajax-get-responses.php`, { poll_id: pollId });

                if (data.status !== 'success') return content.html('<div class="card-body text-danger">Failed to load results.</div>');

                content.html(getPollContainerHtml(pollType, pollId, data.question, data.total_votes));

                if (pollType === 'rating') await initRatingChart(pollId);
                POLL_TYPE_UPDATERS[pollType]?.(pollId, data);

            } catch (err) {
                console.error('Error loading poll results:', err);
                content.html('<div class="card-body text-danger">Failed to load results.</div>');
            }
        }

        function destroyChart(pollId, pollType) {
            const instance = window.chartInstances[pollId];
            if (!instance) return;

            if (pollType === 'word-cloud') instance.destroy();
            if (pollType === 'rating' && instance.root) instance.root.dispose();

            delete window.chartInstances[pollId];
        }

        async function initRatingChart(pollId) {
            if (window.chartInstances[pollId]) return window.chartInstances[pollId];

            return new Promise(resolve => {
                am5.ready(() => {
                    const root = am5.Root.new(`chart-${pollId}`);
                    root._logo.dispose();
                    root.setThemes([am5themes_Animated.new(root)]);

                    const chart = root.container.children.push(
                        am5xy.XYChart.new(root, { panX: false, panY: false, layout: root.verticalLayout, maxTooltipDistance: 0 })
                    );

                    const xAxis = chart.xAxes.push(
                        am5xy.CategoryAxis.new(root, {
                            categoryField: 'rating',
                            renderer: am5xy.AxisRendererX.new(root, { minGridDistance: 30 })
                        })
                    );
                    xAxis.get('renderer').labels.template.setAll({
                        paddingTop: 20,
                        fill: am5.color(KTUtil.getCssVariableValue('--bs-gray-500'))
                    });
                    xAxis.get('renderer').grid.template.setAll({ disabled: true, strokeOpacity: 0 });

                    const yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, { renderer: am5xy.AxisRendererY.new(root, {}) }));
                    yAxis.get('renderer').labels.template.set('visible', false);
                    yAxis.get('renderer').grid.template.setAll({ strokeWidth: 0, visible: false });

                    const series = chart.series.push(
                        am5xy.ColumnSeries.new(root, {
                            xAxis, yAxis, valueYField: 'votes', categoryXField: 'rating', maskBullets: false
                        })
                    );
                    series.columns.template.setAll({
                        tooltipY: 0, strokeOpacity: 0,
                        cornerRadiusBR: 0, cornerRadiusTR: 6, cornerRadiusBL: 0, cornerRadiusTL: 6
                    });
                    series.columns.template.adapters.add('tooltipText', (text, target) => {
                        const value = target.dataItem.get('valueY');
                        const category = target.dataItem.get('categoryX');
                        return `${category} ⭐: ${value} ${value === 1 ? 'vote' : 'votes'}`;
                    });

                    // Bullets
                    const makeBulletLabel = (text, fill, extra = {}) =>
                        () => am5.Bullet.new(root, {
                            ...extra,
                            sprite: am5.Label.new(root, { text, fill: am5.color(fill), populateText: true, ...extra.sprite })
                        });

                    series.bullets.push(makeBulletLabel('{percentage}%', 0x000000, {
                        locationY: 1, sprite: { fontSize: 12, centerY: am5.p100, centerX: am5.p50 }
                    }));
                    series.bullets.push(makeBulletLabel('{valueY}', 0xFFFFFF, {
                        sprite: { centerY: am5.p50, centerX: am5.p50 }
                    }));

                    const emptyRatings = [1, 2, 3, 4, 5].map(r => ({ rating: String(r), votes: 0, percentage: 0 }));
                    xAxis.data.setAll(emptyRatings);
                    series.data.setAll(emptyRatings);

                    series.appear(1000);
                    chart.appear(1000, 100);

                    root.container.set("height", am5.percent(100));
                    chart.set("height", am5.percent(100));

                    const chartObj = { root, chart, xAxis, series, pollId };
                    window.chartInstances[pollId] = chartObj;
                    resolve(chartObj);
                });
            });
        }

        function updateRatingChart(pollId, response) {
            const instance = window.chartInstances?.[pollId];
            if (!instance) return;

            const chartData = Object.entries(response.ratings).map(([rating, data]) => ({
                rating: String(rating), votes: data.votes, percentage: data.percentage
            }));
            instance.xAxis.data.setAll(chartData);
            instance.series.data.setAll(chartData);
            $(`#average-rating-${pollId}`).text(response.average_rating.toFixed(1));
            $(`#total-votes-${pollId}`).text(response.total_votes);
        }

        function updateOpenTextResponse(pollId, response) {
            const container = $(`#responses-container-${pollId}`).empty();
            if (!response.answers.length) return;

            const html = [...response.answers]
                .sort((a, b) => new Date(b.created_at) - new Date(a.created_at))
                .map(poll =>
                    `<div class="d-flex gap-4 align-items-center mb-4">
                    <div class="symbol symbol-circle symbol-35px">
                        <img src="${poll.avatar_url}" alt="${poll.participant_name}" class="rounded-circle">
                    </div>
                    <div>
                        <span class="fw-bold text-gray-800">${poll.participant_name}</span>
                        <p class="mb-0 text-gray-700">${poll.response}</p>
                    </div>
                </div>
            `).join('');

            container.html(html);
            $(`#total-votes-${pollId}`).text(response.total_votes);
        }

        function updateOptionsPoll(pollId, response, buildOptionEl, buildUpdater) {
            $(`#poll-question-${pollId}`).text(response.question || 'Untitled');
            $(`#total-votes-${pollId}`).text(response.total_votes);

            const container = $(`#options-container-${pollId}`);
            const existing = {};
            container.children('.poll-question-option').each(function () {
                existing[$(this).data('option-id')] = $(this);
            });
            const processed = new Set();

            response.options.forEach((opt, idx) => {
                if (existing[opt.id]) {
                    buildUpdater(existing[opt.id], opt, idx, response);
                } else {
                    container.append(buildOptionEl(opt, idx, response));
                }
                processed.add(opt.id);
            });

            Object.keys(existing).forEach(id => {
                if (!processed.has(parseInt(id))) existing[id].remove();
            });
        }

        function updateMultipleChoicePoll(pollId, response) {
            const maxVotes = Math.max(...response.options.map(o => o.votes));

            updateOptionsPoll(pollId, response,
                (opt, idx) => {
                    const display = opt.option ?? `Option ${idx + 1}`;
                    const barWidth = maxVotes > 0 ? (opt.votes / maxVotes) * 100 : 0;
                    const barColor = opt.votes > 0 ? 'bg-primary' : 'bg-gray-300';
                    return $(`
                    <div class="poll-question-option" data-option-id="${opt.id}">
                        <h6 class="option fw-semibold text-gray-800 mb-3">${display} - <span class="text-gray-600">${opt.votes} votes</span></h6>
                        <div class="d-flex align-items-center gap-4">
                            <div class="progress bg-gray-300 flex-grow-1 rounded-pill" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height:20px">
                                <div class="progress-bar progress-bar-animated rounded-pill ${barColor}" style="width:${opt.percentage}%"></div>
                            </div>
                            <div class="result-data d-flex align-items-center ms-3">
                                <span class="percentage text-dark">${opt.percentage}%</span>
                            </div>
                        </div>
                    </div>
                `);
                },
                (el, opt, idx) => {
                    const display = opt.option ?? `Option ${idx + 1}`;
                    const barWidth = maxVotes > 0 ? (opt.votes / maxVotes) * 100 : 0;
                    const barColor = opt.votes > 0 ? 'bg-primary' : 'bg-gray-300';
                    el.find('.option').text(display);
                    el.find('.progress-bar').css('width', opt.percentage + '%').attr('aria-valuenow', opt.percentage).removeClass('bg-primary bg-gray-300').addClass(barColor);
                    el.find('.percentage').text(opt.percentage + '%');
                }
            );
        }

        function updateRankingPoll(pollId, response) {
            const sorted = response.options
                .map((opt, idx) => ({ ...opt, orig_id: idx + 1, average: Number(opt.average) }))
                .sort((a, b) => b.average - a.average);
            const total = response.options.length;

            updateOptionsPoll(pollId, { ...response, options: sorted },
                (opt, idx) => {
                    const display = opt.option ?? `Option ${opt.orig_id}`;
                    const percentage = total > 0 ? (opt.average / total) * 100 : 0;
                    const barColor = opt.average > 0 ? 'bg-primary' : 'bg-gray-300';
                    return $(` <div class="poll-question-option" data-option-id="${opt.id}">
                        <div class="d-flex gap-4">
                            <span class="me-2">${idx + 1}.</span>
                            <div class="flex-grow-1">
                                <h6 class="option fw-semibold text-gray-800 mb-3">
                                    ${display}
                                </h6>
                                <div class="progress bg-gray-300 rounded-pill" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height:20px">
                                    <div class="progress-bar progress-bar-animated rounded-pill ${barColor}" style="width:${percentage}%"></div>
                                </div>
                            </div>
                            <div class="result-data d-flex align-items-end ms-3">
                                <span class="percentage text-dark">${opt.average}</span>
                            </div>
                        </div>
                    </div>`);
                },
                (el, opt, idx) => {
                    const display = opt.option ?? `Option ${opt.orig_id}`;
                    const percentage = total > 0 ? (opt.average / total) * 100 : 0;
                    const barColor = opt.average > 0 ? 'bg-primary' : 'bg-gray-300';
                    el.find('.option').html(`<span class="me-2">${idx + 1}.</span> ${display}`);
                    el.find('.progress-bar').css('width', percentage + '%').attr('aria-valuenow', percentage).removeClass('bg-primary bg-gray-300').addClass(barColor);
                }
            );
        }

        function updateWordCloudPoll(pollId, response) {
            $(`#poll-question-${pollId}`).text(response.question || 'Untitled');
            $(`#total-votes-${pollId}`).text(response.total_votes);

            const responses = response.responses || [];
            if (!responses.length) return;

            const canvas = document.getElementById(`word-cloud-canvas-${pollId}`);
            window.chartInstances[pollId] = new Chart(canvas.getContext('2d'), {
                type: 'wordCloud',
                data: {
                    labels: responses.map(r => r.key),
                    datasets: [{
                        data: responses.map(r => r.value * 10),
                        color: responses.map(() => randomDarkColor()),
                    }]
                },
                options: { minRotation: 0, maxRotation: 0, plugins: { tooltip: false, legend: false } }
            });
        }

        function getPollContainerHtml(pollType, pollId, question, totalVotes) {
            const header = `
            <div class="card-header ps-3">
                <div class="d-flex gap-3 align-items-center">
                    <img src="/elicit/assets/images/poll-types/${pollType}.svg" class="w-40px">
                    <div class="d-flex flex-column">
                        <h6 class="fw-bold mb-0" id="poll-question-${pollId}">${question ?? 'Untitled'}</h6>
                        <div class="mt-1 d-flex gap-5 align-items-center text-gray-700">
                            <span>${capitalizeWords(pollType.replace(/-/g, ' '))} Poll</span>
                            <div>
                                <i class="bi bi-people me-1"></i>
                                <span id="total-votes-${pollId}" class="fw-normal mb-0">${totalVotes}</span>
                                <span>participants</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;

            let innerContent = '';

            switch (pollType) {
                case 'rating':
                    innerContent = `<div class="d-flex flex-column h-100">
                        <div class="badge badge-light-success fs-6 gap-2 align-self-center px-6 py-4 rounded-pill mb-3">
                            <span class="fw-semibold">Score:</span>
                            <i class="bi bi-star-fill text-success"></i>
                            <span id="average-rating-${pollId}">0</span>
                        </div>
                        <div id="chart-${pollId}" style="flex: 1; min-height: 0;"></div>
                    </div>`;
                    break;
                case 'open-text':
                    innerContent = `<div id="responses-container-${pollId}" class="d-flex flex-column gap-5"</div>`;
                    break;
                case 'multiple-choice':
                    innerContent = `<div id="options-container-${pollId}" class="d-flex flex-column gap-10"></div>`;
                    break;
                case 'ranking':
                    innerContent = `<div id="options-container-${pollId}" class="d-flex flex-column gap-10"></div>`;
                    break;
                case 'word-cloud':
                    innerContent = `<canvas id="word-cloud-canvas-${pollId}" style="height: 100%; width: 100%; min-height: 400px;"></canvas>`;
                    break;
                default:
                    innerContent = '<p>Unknown poll type</p>';
            };

            return `<div class="card border-0 shadow h-100 d-flex flex-column" style="overflow: hidden;">
                    ${header}
                    <div class="card-body flex-grow-1 overflow-auto">
                        ${innerContent}
                    </div>
                </div>`;
        }



        let qaWordCloudChart = null;
        let qaSentimentChart = null;

        async function loadQAInsights() {
            try {
                const response = await ajaxPost('/elicit/q&a/index-ajax-get-questions.php', {
                    code: '<?= $RECORD['code'] ?>'
                });

                if (response.status !== 'success' || !response.questions) {
                    console.warn('No Q&A data');
                    return;
                }

                const questions = response.questions;
                renderQAMetrics(questions);
                renderQAWordCloud(questions);
                renderQAQuestionList(questions);
            } catch (err) {
                console.error('Error loading Q&A insights:', err);
            }
        }

        function renderQAMetrics(questions) {
            const total = questions.length;
            const anonymousCount = questions.filter(q => q.is_anonymous).length;
            const namedCount = total - anonymousCount;
            const anonymousRate = total ? ((anonymousCount / total) * 100).toFixed(1) : 0;

            $('#qa-total-questions').text(total);
            $('#qa-anonymous-rate').text(anonymousRate + '%');
            $('#qa-named-authors').text(namedCount);
        }

        function renderQAWordCloud(questions) {
            const texts = questions.map(q => q.text).filter(t => t && t.trim().length > 0);
            if (texts.length === 0) return;

            const stopWords = new Set([
                'the', 'and', 'of', 'to', 'a', 'in', 'for', 'is', 'on', 'that', 'by', 'this', 'with', 'i', 'you', 'it',
                'or', 'are', 'as', 'be', 'at', 'have', 'from', 'was', 'we', 'an', 'but', 'not', 'what', 'when', 'where',
                'who', 'which', 'how', 'why', 'can', 'will', 'would', 'could', 'should', 'do', 'does', 'did', 'has', 'had',
                'have', 'may', 'might', 'must', 'am', 'were', 'been', 'being', 'your', 'my', 'our', 'their', 'his', 'her',
                'its', 'these', 'those', 'some', 'any', 'no', 'yes', 'so', 'up', 'down', 'out', 'into', 'through',
                'during', 'before', 'after', 'above', 'below', 'between', 'under', 'over', 'again', 'further', 'then',
                'once', 'here', 'there', 'all', 'both', 'each', 'few', 'more', 'most', 'other', 'some', 'such', 'nor',
                'only', 'own', 'same', 'than', 'too', 'very', 'just', 'but', 'does', 'doing', 'get', 'make', 'like',
                'well', 'good', 'bad', 'big', 'small', 'new', 'old', 'use', 'used', 'using', 'want', 'need', 'ask', 'tell'
            ]);

            const words = texts.flatMap(t => t.toLowerCase().replace(/[^\w\s]/g, '').split(/\s+/).filter(w => w.length > 2 && !stopWords.has(w)));
            const freq = {};
            words.forEach(w => { freq[w] = (freq[w] || 0) + 1; });

            const topWords = Object.entries(freq)
                .sort((a, b) => b[1] - a[1])
                .slice(0, 30);

            if (qaWordCloudChart) qaWordCloudChart.destroy();

            const canvas = document.getElementById('qa-wordcloud-canvas');
            qaWordCloudChart = new Chart(canvas.getContext('2d'), {
                type: 'wordCloud',
                data: {
                    labels: topWords.map(w => w[0]),
                    datasets: [{
                        data: topWords.map(w => 10 + w[1] * 10),
                        color: topWords.map(() => randomDarkColor()),
                    }]
                },
                options: {
                    minRotation: 0,
                    maxRotation: 0,
                    plugins: { tooltip: false, legend: false }
                }
            });
        }

        function renderQAQuestionList(questions) {
            const container = $('#qa-questions-list');
            container.empty();

            if (!questions.length) {
                container.html('<div class="list-group-item text-muted">No questions yet.</div>');
                return;
            }

            const sorted = [...questions].sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

            sorted.forEach(q => {
                const likes = q.likes || 0;
                const anonymous = q.is_anonymous ? 'Anonymous' : q.participant_name;
                const avatar = q.avatar_url || '/briefcase/assets/images/avatars/avatar-default.jpg';
                const item = $(`
                    <div class="list-group-item">
                        <div class="d-flex gap-3">
                            <div class="symbol symbol-40px">
                                <img src="${avatar}" alt="${anonymous}" class="rounded-circle">
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="fw-bold">${anonymous}</div>
                                        <div class="text-muted small">${new Date(q.created_at).toLocaleString()}</div>
                                    </div>
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="bi bi-hand-thumbs-up"></i>
                                        <span>${likes}</span>
                                    </div>
                                </div>
                                <div class="mt-2">${q.text}</div>
                            </div>
                        </div>
                    </div>
                `);
                container.append(item);
            });
        }
    </script>
</body>

</html>