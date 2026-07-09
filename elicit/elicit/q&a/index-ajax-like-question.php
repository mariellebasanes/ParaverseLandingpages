<?php

define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$id = intval($_POST['id']);

if (empty($id)) {
    respondWithError("ID is missing.");
    exit();
}

if (empty($identification)) {
    respondWithError("You must be signed in to like a question.");
    exit();
}

$CHECK = $ELICIT->prepare("SELECT id FROM audience_qa_likes WHERE identification = ? AND question_id = ?");
$CHECK->bind_param('si', $identification, $id);
$CHECK->execute();
$existing = $CHECK->get_result()->fetch_assoc();
$CHECK->close();

$ELICIT->begin_transaction();
try {
    if ($existing) {
        $DEL = $ELICIT->prepare("DELETE FROM audience_qa_likes WHERE identification = ? AND question_id = ?");
        $DEL->bind_param('si', $identification, $id);
        $DEL->execute();
        $DEL->close();

        $UPD = $ELICIT->prepare("UPDATE `audience_qa` SET `likes` = GREATEST(0, likes - 1) WHERE `id` = ?");
        $UPD->bind_param('i', $id);
        $UPD->execute();
        $UPD->close();

        $liked = false;
    } else {
        $INS = $ELICIT->prepare("INSERT INTO audience_qa_likes (identification, question_id) VALUES (?, ?)");
        $INS->bind_param('si', $identification, $id);
        $INS->execute();
        $INS->close();

        $UPD = $ELICIT->prepare("UPDATE `audience_qa` SET `likes` = likes + 1 WHERE `id` = ?");
        $UPD->bind_param('i', $id);
        $UPD->execute();
        $UPD->close();

        $liked = true;
    }
    $ELICIT->commit();
} catch (Exception $e) {
    $ELICIT->rollback();
    respondWithError("Failed to update like.");
    exit();
}

header('Content-Type: application/json');
echo json_encode(['status' => 'success', 'liked' => $liked]);
exit();
?>