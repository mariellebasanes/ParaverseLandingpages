<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$poll_id = intval($_POST['poll_id']);

if (empty($poll_id)) {
    echo json_encode(['status' => 'error', 'message' => 'Poll ID is required']);
    exit();
}

$SQL = $ELICIT->prepare("SELECT p.question, COUNT(DISTINCT r.created_by) as total_votes FROM `ranking_polls` p LEFT JOIN `ranking_responses` r ON p.id = r.poll_id WHERE p.`id` = ? GROUP BY p.`id`");

$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();

$question = $RESULT['question'] ?? '';
$total_votes = $RESULT['total_votes'] ?? 0;
$SQL->close();

$SQL = $ELICIT->prepare("SELECT o.id, o.option, COALESCE(AVG(r.rank), 0) as avg_rank FROM `ranking_options` o LEFT JOIN `ranking_responses` r ON o.id = r.option_id WHERE o.poll_id = ? GROUP BY o.id ORDER BY o.id");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RECORD = $SQL->get_result();

$options = [];
while ($row = $RECORD->fetch_assoc()) {
    $options[] = [
        'id' => (int) $row['id'],
        'option' => $row['option'],
        'average' => round((float) $row['avg_rank'], 2),
    ];
}
$SQL->close();

$response = [
    'status' => 'success',
    'question' => $question,
    'options' => $options,
    'total_votes' => $total_votes
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>