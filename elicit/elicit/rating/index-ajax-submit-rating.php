<?php

define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$poll_id = intval($_POST['poll_id']);
$rating = intval($_POST['rating']);

if (empty($poll_id)) {
    respondWithError("Poll is required.");
}

if (empty($rating)) {
    respondWithError("Rating is required.");
}

if ($rating < 1 || $rating > 5) {
    respondWithError("Rating must be between 1 and 5.");
}

$SQL = $ELICIT->prepare("SELECT * FROM `rating_responses` WHERE `poll_id` = ? AND `created_by` = ?");
$SQL->bind_param('is', $poll_id, $identification);
$SQL->execute();
$RESULT = $SQL->get_result();

if ($RESULT->num_rows > 0) {
    respondWithError("You have already submitted a rating for this poll");
}

$SQL = $ELICIT->prepare("INSERT INTO `rating_responses` (poll_id, rating, created_by) VALUES (?, ?, ?)");
$SQL->bind_param('iis', $poll_id, $rating, $identification);

if ($SQL->execute()) {
    $response = ['status' => 'success', 'message' => 'Rating submitted successfully'];
} else {
    respondWithError("Failed to submit rating. Please try again.");
}

header('Content-Type: application/json');
echo json_encode($response);
exit();

?>