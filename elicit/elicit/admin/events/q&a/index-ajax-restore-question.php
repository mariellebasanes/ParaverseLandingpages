<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$id = intval($_POST['id']);

if (empty($id)) {
    respondWithError("ID is missing.");
    exit();
}

$SQL = $ELICIT->prepare("SELECT `is_archived` FROM `audience_qa` WHERE `id` = ?");
$SQL->bind_param('i', $id);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();

if (!$RESULT) {
    respondWithError("Question not found.");
    exit();
}

$SQL = $ELICIT->prepare("UPDATE `audience_qa` SET `is_archived` = 0, `is_answered` = 0 WHERE `id` = ?");
$SQL->bind_param('i', $id);

if ($SQL->execute()) {
    $response = ['status' => 'success'];
} else {
    respondWithError("Failed to restore question.");
}

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>