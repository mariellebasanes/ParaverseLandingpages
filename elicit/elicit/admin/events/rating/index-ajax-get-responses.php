<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();

$poll_id = intval($_POST['poll_id']);

if (empty($poll_id)) {
    echo json_encode(['status' => 'error', 'message' => 'Poll ID is required']);
    exit();
}

$SQL = $ELICIT->prepare("SELECT question FROM `rating_polls` WHERE `id` = ?");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();
$question = $RESULT['question'] ?? '';
$SQL->close();

$SQL = $ELICIT->prepare("SELECT rating, COUNT(*) as count FROM `rating_responses` WHERE poll_id = ? GROUP BY rating");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RECORD = $SQL->get_result();

$ratings = [];
$total_votes = 0;
$sum_rating = 0;
while ($row = $RECORD->fetch_assoc()) {
    $ratings[(int)$row['rating']] = (int)$row['count'];
    $total_votes += (int)$row['count'];
    $sum_rating += (int)$row['rating'] * (int)$row['count'];
}
$SQL->close();

$response_ratings = [];
for ($i = 1; $i <= 5; $i++) {
    $count = $ratings[$i] ?? 0;
    $response_ratings[$i] = [
        'votes' => $count,
        'percentage' => $total_votes > 0 ? round(($count / $total_votes) * 100) : 0
    ];
}

$response = [
    'status' => 'success',
    'question' => $question,
    'ratings' => $response_ratings,
    'total_votes' => $total_votes,
    'average_rating' => $total_votes > 0 ? round($sum_rating / $total_votes, 1) : 0
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>
