<?php
define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$event_id = intval($_POST['event_id']);
$poll_id = intval($_POST['poll_id']);

$SQL = $ELICIT->prepare("DELETE FROM `open_text_polls` WHERE `event_id` = ? AND `id` = ?");
$SQL->bind_param('ii', $event_id, $poll_id);

if ($SQL->execute() && $SQL->affected_rows > 0) {
    $stmt = $ELICIT->prepare("DELETE FROM `open_text_responses` WHERE `poll_id` = ?");
    $stmt->bind_param('i', $poll_id);
    $stmt->execute();
    $stmt->close();

    $stmt = $ELICIT->prepare("DELETE FROM `sessions` WHERE `poll_type` = 'open-text' AND `poll_id` = ? AND `event_id` = ?");
    $stmt->bind_param('ii', $poll_id, $event_id);
    $stmt->execute();
    $stmt->close();

    $response = ['status' => 'success', 'message' => 'Poll deleted'];
} else {
    respondWithError("Poll not found: " . $ELICIT->error);
}

$SQL->close();

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>