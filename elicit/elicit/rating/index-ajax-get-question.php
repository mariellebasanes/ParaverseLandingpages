<?php

define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$code = intval($_POST['code']);

if (empty($code)) {
    respondWithError("Event code is missing.");
}

$SQL = $ELICIT->prepare("SELECT id FROM events WHERE code = ?");
$SQL->bind_param('i', $code);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();

if (!$RESULT) {
    respondWithError("Event not found.");
}
$SQL->close();

$SQL = $ELICIT->prepare("SELECT * FROM `rating_polls` WHERE `event_id` = ? ORDER BY `created_at` DESC");
$SQL->bind_param('i', $RESULT['id']);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();

if ($RESULT) {
    $response = ['status' => 'success', 'question' => $RESULT['question']];
} else {
    $response = ['status' => 'success', 'question' => ''];
}
$SQL->close();

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>