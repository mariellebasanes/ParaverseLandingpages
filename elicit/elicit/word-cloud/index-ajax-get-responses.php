<?php

define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$poll_id = intval($_POST['poll_id']);

$SQL = $ELICIT->prepare("SELECT p.question, COUNT(DISTINCT r.created_by) as total_votes FROM `word_cloud_polls` p LEFT JOIN `word_cloud_responses` r ON p.id = r.poll_id WHERE p.`id` = ? GROUP BY p.`id`");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$poll_info = $SQL->get_result()->fetch_assoc();
$SQL->close();

if (!$poll_info) {
    respondWithError("Poll not found.");
}

$SQL = $ELICIT->prepare("SELECT `response`, COUNT(*) as frequency FROM `word_cloud_responses` WHERE `poll_id` = ? GROUP BY `response` ORDER BY frequency DESC");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RESULT = $SQL->get_result();

$responses = [];
while ($row = $RESULT->fetch_assoc()) {
    $responses[] = [
        'key' => $row['response'],
        'value' => $row['frequency']
    ];
}
$SQL->close();

$response = [
    'status' => 'success',
    'question' => $poll_info['question'],
    'total_votes' => $poll_info['total_votes'],
    'responses' => $responses
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>