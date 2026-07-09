<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$event_id = intval($_POST['id']);

if ($event_id <= 0) {
    respondWithError("Invalid request!");
    exit();
}

$SQL = $ELICIT->prepare("SELECT `id` FROM `sessions` WHERE `event_id` = ? AND `poll_type` = 'q&a'");
$SQL->bind_param('i', $event_id);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();
$SQL->close();

if ($RESULT) {
    $response = ['status' => 'success', 'session_id' => $RESULT['id']];
    exit();
}

$SQL = $ELICIT->prepare("INSERT INTO `sessions` (event_id, poll_type, poll_id, is_open) VALUES (?, 'q&a', 1, 1)");
$SQL->bind_param('i', $event_id);

if ($SQL->execute()) {
    $response = ['status' => 'success', 'session_id' => $ELICIT->insert_id];
} else {
    respondWithError("Failed to add Q&A session.");
}

header('Content-Type: application/json');
echo json_encode($response);
exit();

?>