<?php

define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

header('Content-Type: application/json');

$code = intval($_POST['code']);

if (empty($code)) {
    respondWithError("Event code is missing.");
}

$SQL = $ELICIT->prepare("SELECT * FROM `events` WHERE `code` = ?");
$SQL->bind_param('i', $code);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();

if (!$RESULT) {
    respondWithError("Event not found.");
}

$SQL = $ELICIT->prepare("SELECT * FROM `sessions` WHERE `event_id` = ? AND `poll_id` = 1 AND `poll_type` = 'q&a'");
$SQL->bind_param('i', $RESULT['id']);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();

if (!$RESULT) {
    echo json_encode(['status' => 'success', 'has_qa' => false]);
    exit();
}

echo json_encode([
    'status' => 'success',
    'has_qa' => true,
    'is_open' => (bool) $RESULT['is_open'],
    'session_id' => $RESULT['id']
]);
exit();
?>