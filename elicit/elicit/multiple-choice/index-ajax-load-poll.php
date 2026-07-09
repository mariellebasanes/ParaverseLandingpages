<?php
define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();

$poll_id = intval($_GET['poll_id']);
$event_id = intval($_GET['event_id']);

if ($poll_id <= 0 || $event_id <= 0) {
    respondWithError('Invalid request');
}

$pollSql = $ELICIT->prepare("SELECT id, question, created_at, created_by FROM multiple_choice_polls WHERE id = ? AND event_id = ?");
$pollSql->bind_param('ii', $poll_id, $event_id);
$pollSql->execute();
$pollResult = $pollSql->get_result();

if ($pollResult->num_rows === 0) {
    respondWithError('Poll not found');
}

$poll = $pollResult->fetch_assoc();
$pollSql->close();

// Fetch options
$optionsSql = $ELICIT->prepare("SELECT id, `option` FROM multiple_choice_options WHERE poll_id = ? ORDER BY id");
$optionsSql->bind_param('i', $poll_id);
$optionsSql->execute();
$optionsResult = $optionsSql->get_result();

$options = [];
while ($row = $optionsResult->fetch_assoc()) {
    $options[] = [
        'id' => $row['id'],
        'option' => $row['option']
    ];
}
$optionsSql->close();

$response = [
    'status' => 'success',
    'poll' => [
        'id' => $poll['id'],
        'question' => $poll['question'],
        'created_at' => $poll['created_at'],
        'created_by' => $poll['created_by']
    ],
    'options' => $options
];

header('Content-Type: application/json');
echo json_encode($response);
exit();