<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$id = intval($_POST['id']);

if (empty($id)) {
    respondWithError("ID is missing.");
}

$SQL = $ELICIT->prepare("SELECT * FROM `audience_qa` WHERE `id` = ?");
$SQL->bind_param('i', $id);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();

if (!$RESULT) {
    respondWithError("Question not found.");
}

$SQL = $ELICIT->prepare("UPDATE `audience_qa` SET `is_answered` = 1, `is_archived` = 0 WHERE `id` = ?");
$SQL->bind_param('i', $id);

if ($SQL->execute()) {
    $response = ['status' => 'success'];
} else {
    respondWithError("Failed to mark question as answered.");
}

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>