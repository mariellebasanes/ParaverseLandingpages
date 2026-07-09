<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$event_id = intval($_POST['id']);

if ($event_id <= 0) {
    respondWithError("Invalid request!");
}

$SQL = $ELICIT->prepare("DELETE FROM `sessions` WHERE `event_id` = ? AND poll_id = 1 AND poll_type = 'q&a'");
$SQL->bind_param('i', $event_id);

if ($SQL->execute()) {
    $response = ['status' => 'success', 'message' => 'Audience Q&A removed'];
} else {
    respondWithError("Failed to remove Q&A");
}

header('Content-Type: application/json');
echo json_encode($response);
exit();

?>