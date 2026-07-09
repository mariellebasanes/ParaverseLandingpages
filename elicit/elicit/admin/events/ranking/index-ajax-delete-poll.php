<?php
define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$event_id = intval($_POST['event_id']);
$poll_id = intval($_POST['poll_id']);

$SQL = $ELICIT->prepare("DELETE FROM `ranking_responses` WHERE `poll_id` = ?");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$SQL->close();

$SQL = $ELICIT->prepare("DELETE FROM `ranking_options` WHERE `poll_id` = ?");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$SQL->close();

$SQL = $ELICIT->prepare("DELETE FROM `ranking_polls` WHERE `event_id` = ? AND `id` = ?");
$SQL->bind_param('ii', $event_id, $poll_id);
$SQL->execute();

if ($SQL->affected_rows === 0) {
    respondWithError("Poll not found: " . $ELICIT->error);
}
$SQL->close();

$SQL = $ELICIT->prepare("DELETE FROM `sessions` WHERE `poll_type` = 'ranking' AND `poll_id` = ? AND `event_id` = ?");
$SQL->bind_param('ii', $poll_id, $event_id);
$SQL->execute();
$SQL->close();

$response = ['status' => 'success', 'message' => 'Poll deleted successfully'];

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>