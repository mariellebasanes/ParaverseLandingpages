<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();

$poll_id = intval($_POST['poll_id']);

if (empty($poll_id)) {
    echo json_encode(['status' => 'error', 'message' => 'Poll ID is required']);
    exit();
}

$SQL = $ELICIT->prepare("SELECT question, is_multiple FROM `multiple_choice_polls` WHERE `id` = ?");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();
$question = $RESULT['question'] ?? '';
$is_multiple = $RESULT['is_multiple'] ?? 0;
$SQL->close();

$SQL = $ELICIT->prepare("SELECT o.id, o.option, COUNT(r.id) as votes FROM `multiple_choice_options` o LEFT JOIN `multiple_choice_responses` r ON o.id = r.option_id WHERE o.poll_id = ? GROUP BY o.id ORDER BY o.id");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RECORD = $SQL->get_result();

$options = [];
$total_votes = 0;
while ($row = $RECORD->fetch_assoc()) {
    $options[] = [
        'id' => (int) $row['id'],
        'option' => $row['option'],
        'votes' => (int) $row['votes']
    ];
    $total_votes += (int) $row['votes'];
}
$SQL->close();

$response = [
    'status' => 'success',
    'question' => $question,
    'is_multiple' => (bool)$is_multiple,
    'options' => $options,
    'total_votes' => $total_votes
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>
