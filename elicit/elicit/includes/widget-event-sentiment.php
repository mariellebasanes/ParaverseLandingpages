<?php
require($_SERVER['DOCUMENT_ROOT'] . '/elicit/assets/library/SentimentAnalyzer/Config/Config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/elicit/assets/library/SentimentAnalyzer/Procedures/SentiText.php');
require($_SERVER['DOCUMENT_ROOT'] . '/elicit/assets/library/SentimentAnalyzer/Analyzer.php');

use Sentiment\Analyzer;

$analyzer = new Analyzer();

// Fetch questions from the database
$SQL = $EDITH->prepare("SELECT `text` FROM elicit.`audience_qa` WHERE `event_id` = ?");
$SQL->bind_param("i", $RECORD['id']);
$SQL->execute();
$RESULT = $SQL->get_result();

$positive_count = 0;
$negative_count = 0;
$neutral_count = 0;

while ($ROW = $RESULT->fetch_assoc()) {
    if (!empty(trim($ROW['text']))) {
        $scores = $analyzer->getSentiment($ROW['text']);
        $compound = $scores['compound'] ?? 0;
        if ($compound > 0.05) {
            $positive_count++;
        } elseif ($compound < -0.05) {
            $negative_count++;
        } else {
            $neutral_count++;
        }
    }
}

$total = $positive_count + $neutral_count + $negative_count;
if ($total == 0) {
    ?>
    <div class="card border-0 shadow flex-grow-0">
        <div class="card-header">
            <h5 class="card-title mb-0">Question Sentiment</h5>
        </div>
        <div class="card-body">
            <div class="d-flex flex-column align-items-center justify-content-center text-center py-8">
                <i class="bi bi-emoji-neutral text-gray-400 fs-3x mb-3"></i>
                <div class="fw-semibold text-gray-700 mb-1">No sentiment data yet</div>
                <div class="text-muted fs-7">Sentiment will appear once questions are submitted.</div>
            </div>
        </div>
    </div>
    <?php
    return;
}

$positive_percent = round(($positive_count / $total) * 100, 2) ?? 0;
$neutral_percent = round(($neutral_count / $total) * 100, 2) ?? 0;
$negative_percent = round(($negative_count / $total) * 100, 2) ?? 0;
?>

<div class="card border-0 shadow flex-grow-0">
    <div class="card-header">
        <h5 class="card-title mb-0">Question Sentiment</h5>
    </div>
    <div class="card-body">
        <div class="mb-4">
            <span class="fw-semibold">Positive</span>
            <span class="text-muted fw-normal"> - <?= $positive_count ?> questions</span>
            <div class="mt-2 d-flex justify-content-between align-items-center gap-3">
                <div class="progress bg-light-success flex-grow-1 rounded" role="progressbar" style="height: 15px;">
                    <div class="progress-bar bg-success" style="width: <?= $positive_percent ?>%;"></div>
                </div>
                <span><?= $positive_percent ?>%</span>
            </div>
        </div>

        <div class="mb-4">
            <span class="fw-semibold">Neutral</span>
            <span class="text-muted fw-normal"> - <?= $neutral_count ?> questions</span>
            <div class="mt-2 d-flex justify-content-between align-items-center gap-3">
                <div class="progress bg-light-primary flex-grow-1 rounded" role="progressbar" style="height: 15px;">
                    <div class="progress-bar bg-primary" style="width: <?= $neutral_percent ?>%;" role="progressbar">
                    </div>
                </div>
                <span><?= $neutral_percent ?>%</span>
            </div>
        </div>

        <div class="mb-4">
            <span class="fw-semibold">Negative</span>
            <span class="text-muted fw-normal"> - <?= $negative_count ?> questions</span>
            <div class="mt-2 d-flex justify-content-between align-items-center gap-3">
                <div class="progress bg-light-danger flex-grow-1 rounded" role="progressbar" style="height: 15px;">
                    <div class="progress-bar bg-danger" style="width: <?= $negative_percent ?>%;" role="progressbar">
                    </div>
                </div>
                <span><?= $negative_percent ?>%</span>
            </div>
        </div>
    </div>
</div>