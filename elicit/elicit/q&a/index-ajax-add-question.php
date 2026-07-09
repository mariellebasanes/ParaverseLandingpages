<?php

define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$code = intval($_POST['code']);
$text = trim($_POST['text']);
$is_anonymous = $_POST['is_anonymous'] ?? 0;

if (empty($code)) {
    respondWithError("Event code is missing.");
}

$SQL = $ELICIT->prepare("SELECT `id` FROM `events` WHERE `code` = ?");
$SQL->bind_param('i', $code);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();

if (!$RESULT) {
    respondWithError("Event not found.");
}

if (empty($text)) {
    respondWithError('Question text is required');
}

if (strlen($text) > 500) {
    respondWithError('Question too long (max 500 characters)');
}

$SQL = $ELICIT->prepare("INSERT INTO `audience_qa` (event_id, text, is_anonymous, created_by) VALUES (?, ?, ?, ?)");
$SQL->bind_param('isis', $RESULT['id'], $text, $is_anonymous, $identification);

if ($SQL->execute()) {
    $response = ['status' => 'success', 'message' => 'Question submitted successfully'];
} else {
    respondWithError("Failed to submit question");
}

header('Content-Type: application/json');
echo json_encode($response);
exit();

?>