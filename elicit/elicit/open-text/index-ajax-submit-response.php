<?php

define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$poll_id = intval($_POST['poll_id']);
$answer = trim($_POST['answer']);
$is_anonymous = $_POST['is_anonymous'] ?? 0;

if (empty($poll_id)) {
    respondWithError("Poll is required.");
}

if (empty($answer)) {
    respondWithError('Response is required');
}

$SQL = $ELICIT->prepare("INSERT INTO `open_text_responses` (poll_id, response, is_anonymous, created_by) VALUES (?, ?, ?, ?)");
$SQL->bind_param('isis', $poll_id, $answer, $is_anonymous, $identification);

if ($SQL->execute()) {
    $response = ['status' => 'success', 'message' => 'Response submitted successfully'];
} else {
    respondWithError("Failed to submit response. Please try again.");
}


$SQL->close();
header('Content-Type: application/json');
echo json_encode($response);
exit();

?>