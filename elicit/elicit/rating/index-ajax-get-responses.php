<?php

define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$poll_id = intval($_POST['poll_id']);

$SQL = $ELICIT->prepare("SELECT p.question, p.min_rating, p.max_rating, COUNT(r.id) as total_votes, AVG(r.rating) as average_rating FROM `rating_polls` p LEFT JOIN `rating_responses` r ON p.id = r.poll_id WHERE p.`id` = ? GROUP BY p.`id`");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();

if (!$RESULT) {
    $response = [
        'status' => 'success',
        'question' => '',
        'min_rating' => 1,
        'max_rating' => 5,
        'ratings' => [],
        'average_rating' => 0,
        'total_votes' => 0
    ];
    echo json_encode($response);
    exit();
}

$question = $RESULT['question'];
$min_rating = $RESULT['min_rating'];
$max_rating = $RESULT['max_rating'];
$total_votes = $RESULT['total_votes'];
$average_rating = $RESULT['average_rating'] ? round((float) $RESULT['average_rating'], 1) : 0;

$ratings = [];
for ($i = $min_rating; $i <= $max_rating; $i++) {
    $ratings[$i] = [
        'votes' => 0,
        'percentage' => 0
    ];
}
$SQL->close();

$SQL = $ELICIT->prepare("SELECT rating, COUNT(*) as votes FROM `rating_responses` WHERE poll_id = ? GROUP BY rating ORDER BY rating DESC");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RECORD = $SQL->get_result();

while ($row = $RECORD->fetch_assoc()) {
    $percentage = $total_votes > 0 ? round(($row['votes'] / $total_votes) * 100) : 0;
    $ratings[$row['rating']] = [
        'votes' => $row['votes'],
        'percentage' => $percentage
    ];
}
$SQL->close();

$response = [
    'status' => 'success',
    'question' => $question,
    'min_rating' => $min_rating,
    'max_rating' => $max_rating,
    'ratings' => $ratings,
    'average_rating' => $average_rating,
    'total_votes' => $total_votes
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>