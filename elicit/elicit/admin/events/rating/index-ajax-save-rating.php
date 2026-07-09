<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$event_id = intval($_POST['id']);
$poll_id = isset($_POST['poll_id']) ? intval($_POST['poll_id']) : null;
$question = isset($_POST['question']) && $_POST['question'] !== '' ? $_POST['question'] : null;

if ($event_id <= 0) {
    respondWithError("Invalid request!");
}

$SQL = $ELICIT->prepare("SELECT * FROM `rating_polls` WHERE `event_id` = ? AND `id` = ?");
$SQL->bind_param('ii', $event_id, $poll_id);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();

if ($RESULT) {
    $SQL = $ELICIT->prepare("UPDATE `rating_polls` SET `question` = ?, `updated_by` = ? WHERE `id` = ?");
    $SQL->bind_param('ssi', $question, $identification, $poll_id);
} else {
    $SQL = $ELICIT->prepare("INSERT INTO `rating_polls` (event_id, question, created_by) VALUES (?, ?, ?)");
    $SQL->bind_param('iss', $event_id, $question, $identification);
}

if ($SQL->execute()) {
    $response = ['status' => 'success', 'message' => 'Rating poll saved successfully', 'poll_id' => $poll_id ?? $ELICIT->insert_id];
} else {
    respondWithError("Failed to save rating poll: " . $ELICIT->error);
}

$SQL->close();
header('Content-Type: application/json');
echo json_encode($response);
exit();

?>