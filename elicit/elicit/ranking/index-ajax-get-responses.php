<?php

define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$poll_id = intval($_POST['poll_id']);

if (empty($poll_id)) {
    echo json_encode(['status' => 'error', 'message' => 'Poll ID is required']);
    exit();
}

$SQL = $ELICIT->prepare("SELECT p.question, COUNT(DISTINCT r.created_by) as total_respondents FROM `ranking_polls` p LEFT JOIN `ranking_responses` r ON p.id = r.poll_id WHERE p.`id` = ? GROUP BY p.`id`");

$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();
$question = $RESULT['question'] ?? '';
$total_respondents = $RESULT['total_respondents'] ?? 0;
$SQL->close();

$SQL = $ELICIT->prepare("SELECT COUNT(*) as total_options FROM `ranking_options` WHERE `poll_id` = ?");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$total_options = $SQL->get_result()->fetch_assoc()['total_options'];
$SQL->close();

$SQL = $ELICIT->prepare("SELECT o.id, o.option,
    COALESCE((
        SELECT SUM(? - r.rank + 1)
        FROM ranking_responses r
        WHERE r.poll_id = o.poll_id AND r.option_id = o.id
    ), 0) as sum_points
    FROM `ranking_options` o
    WHERE o.poll_id = ?
    ORDER BY o.id"
);
$SQL->bind_param('ii', $total_options, $poll_id);
$SQL->execute();
$options_result = $SQL->get_result();

$options = [];
while ($row = $options_result->fetch_assoc()) {
    $sum_points = (float) $row['sum_points'];
    $avg_points = $total_respondents > 0 ? round($sum_points / $total_respondents, 2) : 0.00;
    $options[] = [
        'id' => (int) $row['id'],
        'option' => $row['option'],
        'average' => $avg_points
    ];
}
$SQL->close();

$response = [
    'status' => 'success',
    'question' => $question,
    'options' => $options,
    'total_votes' => $total_respondents
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>