<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();

$poll_id = intval($_POST['poll_id']);

if (empty($poll_id)) {
    echo json_encode(['status' => 'error', 'message' => 'Poll ID is required']);
    exit();
}

$SQL = $ELICIT->prepare("SELECT question FROM `word_cloud_polls` WHERE `id` = ?");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();
$question = $RESULT['question'] ?? '';
$SQL->close();

$SQL = $ELICIT->prepare("SELECT response, COUNT(*) as count FROM `word_cloud_responses` WHERE poll_id = ? GROUP BY response ORDER BY count DESC");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RECORD = $SQL->get_result();

$responses = [];
$total_votes = 0;
while ($row = $RECORD->fetch_assoc()) {
    $responses[] = [
        'key' => $row['response'],
        'value' => (int) $row['count']
    ];
    $total_votes += (int) $row['count'];
}
$SQL->close();

$response = [
    'status' => 'success',
    'question' => $question,
    'responses' => $responses,
    'total_votes' => $total_votes
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>
