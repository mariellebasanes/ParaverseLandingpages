<?php
define('MBG', TRUE);
include(__DIR__ . '/../../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$event_id = intval($_POST['event_id']);
$poll_id = intval($_POST['poll_id']);
$poll_type = $_POST['poll_type'];

if (empty($poll_type)) {
    respondWithError("Poll type is required.");
}

$SQL = $ELICIT->prepare("UPDATE `sessions` SET is_open = 0 WHERE event_id = ? AND poll_id = ? AND poll_type = ?");
$SQL->bind_param('iis', $event_id, $poll_id, $poll_type);

if ($SQL->execute()) {
    $response = ['status' => 'success', 'message' => 'Poll was deactivated'];
} else {
    respondWithError("Failed to stop poll: " . $ELICIT->error);
}

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>