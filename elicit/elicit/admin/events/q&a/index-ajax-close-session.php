<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$session_id = intval($_POST['session_id']);

if ($session_id <= 0) {
    respondWithError("Invalid request!");
    exit();
}

$SQL = $ELICIT->prepare("UPDATE `sessions` SET `is_open` = 0 WHERE `id` = ?");
$SQL->bind_param('i', $session_id);

if ($SQL->execute()) {
    $response = ['status' => 'success'];
} else {
    respondWithError("Failed to close Q&A session.");
}

header('Content-Type: application/json');
echo json_encode($response);
exit();

?>