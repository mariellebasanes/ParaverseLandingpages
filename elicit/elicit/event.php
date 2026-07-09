<?php
define('MBG', TRUE);
include(__DIR__ . '/../functions-new.php');
include(__DIR__ . '/..' . '/elicit/functions.elicit.php');

if (!isset($END_URL)) $END_URL = $_GET['id'] ?? null;

IS_LOGGED_IN($_SERVER['REQUEST_URI']);

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-wordcloud@4.3.0/build/index.umd.js"></script>
    <style>
        @media (min-width: 1200px) {
            .event-info-card, .interaction-card { height: 700px !important; }
        }
        @media (max-width: 1199.98px) {
            .event-info-card { height: auto !important; min-height: 200px; margin-bottom: 20px; }
            .interaction-card { height: 600px !important; }
        }
    </style>
</head>

<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on"
    data-kt-app-layout="light-header" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    class="app-default">
    <?php include(__DIR__ . '/..' . '/elicit/partials/_page-loader.php'); ?>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <?php include(__DIR__ . '/..' . '/elicit/partials/_header.php'); ?>
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">

                        <main>
                            <div id="kt_app_content" class="app-content flex-column-fluid">
                                <div id="kt_app_content_container" class="app-container container-xxl">
                                    <div class="d-flex flex-column flex-xl-row gap-7 gap-xl-10">
                                        <div class="w-100 w-xl-350px w-xxl-400px">
                                            <div class="card bg-primary border-0 shadow-sm event-info-card" style="background-image: url('<?= $BASE_PATH ?>/assets/svg/border.svg'); background-size: cover; background-position: center;">
                                                <div class="card-body d-flex flex-column justify-content-center p-8">
                                                    <h2 class="fw-bolder text-white fs-2tx mb-4">
                                                        <?= htmlspecialchars($META_TITLE, ENT_NOQUOTES) ?>
                                                    </h2>
                                                    <div class="d-flex align-items-center gap-3 mb-6">
                                                        <i class="ki-duotone ki-calendar-8 text-white fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></i>
                                                        <span class="fs-5 text-white opacity-75">
                                                            <?php
                                                            $start = new DateTime($RECORD['start_date']);
                                                            $end = new DateTime($RECORD['end_date']);
 
                                                            if ($start->format('Y') === $end->format('Y')) {
                                                                if ($start->format('F') === $end->format('F')) {
                                                                    echo $start->format('M j') . ' – ' . $end->format('j, Y');
                                                                } else {
                                                                    echo $start->format('M j') . ' – ' . $end->format('M j, Y');
                                                                }
                                                            } else {
                                                                echo $start->format('M j, Y') . ' – ' . $end->format('M j, Y');
                                                            }
                                                            ?>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex align-items-center mt-5">
                                                        <span class="badge badge-light-primary fw-bolder fs-3 px-6 py-4 rounded-pill shadow-sm">
                                                            <i class="bi bi-hash fs-2 text-primary me-1"></i> <?= $RECORD['code'] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
 
                                        <div class="flex-grow-1">
                                            <div class="card border-0 shadow-sm interaction-card">
                                                <div class="card-header border-0 pt-7">
                                                    <div class="nav-group nav-group-outline bg-light d-flex p-1 w-100 mb-0 rounded-3 shadow-sm" role="tablist">
                                                        <button class="nav-link btn btn-color-gray-600 btn-active btn-active-dark p-5 active flex-grow-1 rounded-3" data-bs-toggle="tab" href="#questions">
                                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                                 <i class="fs-3 bi bi-patch-question"></i>
                                                                 <span class="fs-4 fw-bold">Q&A</span>
                                                            </div>
                                                        </button>
                                                        <button class="nav-link btn btn-color-gray-600 btn-active btn-active-dark p-5 flex-grow-1 rounded-3" data-bs-toggle="tab" href="#polls">
                                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                                 <i class="fs-3 bi bi-bar-chart-line-fill"></i>
                                                                 <span class="fs-4 fw-bold">Polls</span>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body hover-scroll-y">
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="questions" role="tabpanel">
                                                            <?php include("q&a/index.php"); ?>
                                                        </div>
                                                        <div class="tab-pane fade" id="polls" role="tabpanel">
                                                            <div id="polls-content"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>

                    </div>
                    <?php include(__DIR__ . '/..' . '/elicit/partials/_footer.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php include(__DIR__ . '/..' . '/elicit/partials/_scrolltop.php'); ?>
    <?php include("rating/index.php"); ?>
    <?php include("open-text/index.php"); ?>
    <?php include("multiple-choice/index.php"); ?>
    <?php include("ranking/index.php"); ?>
    <?php include("word-cloud/index.php"); ?>

    <script>
        let currentPoll = null;
        let activeInterval = null;
        let pollInterval = null;

        const POLL_MANAGERS = {
            'rating': RatingManager,
            'open-text': OpenTextManager,
            'multiple-choice': MultipleChoiceManager,
            'ranking': RankingManager,
            'word-cloud': WordCloudManager
        };

        function hasPollChanged(oldPoll, newPoll) {
            if (!oldPoll || !newPoll) return true;
            if (oldPoll.id !== newPoll.id || oldPoll.type !== newPoll.type) return true;
            return false;
        }

        $('a[href="#questions"]').on('shown.bs.tab', function () {
            stopCheckUpdates();
            stopPollUpdates();
        });

        $('a[href="#polls"]').on('shown.bs.tab', function () {
            if (currentPoll) {
                startPollUpdates(currentPoll);
            }
        });

        function stopCheckUpdates() {
            if (activeInterval) {
                clearInterval(activeInterval);
                activeInterval = null;
            }
        }

        async function checkActivePoll() {
            try {
                const response = await $.ajax({
                    type: "POST",
                    url: "<?= $BASE_PATH ?>/elicit/includes/event-ajax-active-polls.php",
                    data: { event_id: '<?= $RECORD['id'] ?>' },
                    dataType: 'json'
                });

                if (response.status === 'success') {
                    if (response.poll) {
                        if (hasPollChanged(currentPoll, response.poll)) {
                            currentPoll = response.poll;
                            renderPoll(currentPoll);
                        }
                    } else {
                        if (currentPoll) {
                            currentPoll = null;
                            stopPollUpdates();
                        }
                        showNoActivePoll();
                    }
                } else {
                    showError('Failed to check for polls');
                }
            } catch (error) {
                console.error('Error checking active poll:', error);
                showError('Failed to load polls');
            }
        }

        function renderPoll(poll) {
            if (POLL_MANAGERS[poll.type]) {
                POLL_MANAGERS[poll.type].renderPoll(poll);
                startPollUpdates(poll);
            }
        }

        function startPollUpdates(poll) {
            stopPollUpdates()

            pollInterval = setInterval(async () => {
                try {
                    const response = await $.ajax({
                        type: "POST",
                        url: `/elicit/${poll.type}/index-ajax-get-responses.php`,
                        data: { poll_id: poll.id },
                        dataType: 'json'
                    });

                    if (response.status === 'success') {
                        POLL_MANAGERS[poll.type].updateData(response);

                        if (poll.type === 'rating') {
                            $('#total_votes').text(response.total_votes);
                            $('#average_rating').text(response.average_rating);
                        }
                    }
                } catch (error) {
                    console.error('Error updating poll:', error);
                }
            }, 3000);
        }

        function stopPollUpdates() {
            if (pollInterval) {
                clearInterval(pollInterval);
                pollInterval = null;
            }
        }

        function showNoActivePoll() {
            $('#polls-content').html(`<div class="text-center py-10">
                <img class="w-100px" src="<?= $BASE_PATH ?>/elicit/assets/images/no-polls.svg">
                <p class="text-muted mt-10 fs-5">There are no active polls at the moment.</p>
            </div>`);
        }

        function showError(message) {
            $('#polls-content').html(`<div class="text-center py-10">
                <i class="bi bi-exclamation-triangle fs-1 text-danger mb-3"></i>
                <p class="text-danger">${message}</p>
                <button class="btn btn-sm btn-outline-primary mt-2" onclick="checkActivePoll()">Try Again</button>
            </div>`);
        }

        $(document).ready(function () {
            checkActivePoll();

            stopCheckUpdates();
            activeInterval = setInterval(() => checkActivePoll(), 5000);
        });
    </script>
    <script>
        function removeLoader() {
            document.body.removeAttribute('data-kt-app-page-loading');
            document.body.removeAttribute('data-kt-app-page-loading-enabled');
            var loader = document.querySelector('.page-loader');
            if (loader) {
                loader.style.opacity = '0';
                setTimeout(function() {
                    loader.style.display = 'none';
                }, 500);
            }
        }
        window.addEventListener('load', removeLoader);
        setTimeout(removeLoader, 3000); // Safeguard
    </script>
</body>

</html>