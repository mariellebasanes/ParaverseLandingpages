<?php
define('MBG', TRUE);
include(__DIR__ . '/../../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$poll_id = intval($_POST['poll_id']);
$event_id = intval($_POST['event_id']);
$poll_type = $_POST['poll_type'];

if (empty($poll_type)) {
    respondWithError("Poll type is required.");
}

// First, close all other polls for this event (except QA)
$SQL = $ELICIT->prepare("UPDATE `sessions` SET `is_open` = 0 WHERE `event_id` = ? AND `poll_type` != 'q&a'");
$SQL->bind_param('i', $event_id);
$SQL->execute();
$SQL->close();

// Check if session already exists for this poll
$SQL = $ELICIT->prepare("SELECT * FROM `sessions` WHERE `event_id` = ? AND `poll_type` = ? AND `poll_id` = ?");
$SQL->bind_param('isi', $event_id, $poll_type, $poll_id);
$SQL->execute();

if ($SQL->get_result()->num_rows > 0) {
    // Update existing session
    $stmt = $ELICIT->prepare("UPDATE `sessions` SET `is_open` = 1 WHERE `event_id` = ? AND `poll_type` = ? AND `poll_id` = ?");
} else {
    // Insert new session
    $stmt = $ELICIT->prepare("INSERT INTO `sessions` (event_id, poll_type, poll_id, is_open) VALUES (?, ?, ?, 1)");
}

$stmt->bind_param('isi', $event_id, $poll_type, $poll_id);
if ($stmt->execute()) {
    $response = ['status' => 'success', 'message' => 'Poll is active for participants'];
} else {
    respondWithError("Failed to start poll: " . $ELICIT->error);
}

$SQL->close();
$stmt->close();

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>