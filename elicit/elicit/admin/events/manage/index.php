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
} else {
    $RECORD = array(
        "code" => 0,
        "name" => "",
        "start_date" => date('Y-m-d'),
        "end_date" => date('Y-m-d'),
        "created_at" => date('Y-m-d H:i:s'),
    );
    $META_TITLE = "Manage Event";
}

function formatDateRange($start, $end)
{
    $s = new DateTime($start);
    $e = new DateTime($end);
    if ($s == $e)
        return $s->format('M j, Y');
    if ($s->format('Y') != $e->format('Y'))
        return $s->format('M j, Y') . ' – ' . $e->format('M j, Y');
    if ($s->format('m') == $e->format('m'))
        return $s->format('M j') . ' – ' . $e->format('j, Y');
    return $s->format('M j') . ' – ' . $e->format('M j, Y');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php HEAD_ESSENTIALS(); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-wordcloud@4.3.0/build/index.umd.js"></script>
    <script src="/assets/plugins/custom/formrepeater/formrepeater.bundle.js" defer></script>
    <style>
        .card-hover {
            transition: all 0.2s ease-in-out;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
    </style>
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
                                    <?php include("polls/index-inc-form.php"); ?>
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
</body>

</html>