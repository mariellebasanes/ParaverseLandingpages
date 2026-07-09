<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();

$event_id = intval($_POST['event_id']);
$poll_id = intval($_POST['poll_id']);

if (empty($poll_id) || empty($event_id)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    exit();
}

// Delete from word_cloud_polls
$SQL = $ELICIT->prepare("DELETE FROM `word_cloud_polls` WHERE `id` = ? AND `event_id` = ?");
$SQL->bind_param('ii', $poll_id, $event_id);
$SQL->execute();
$affected = $SQL->affected_rows;
$SQL->close();

if ($affected > 0) {
    // Also delete associated responses
    $SQL = $ELICIT->prepare("DELETE FROM `word_cloud_responses` WHERE `poll_id` = ?");
    $SQL->bind_param('i', $poll_id);
    $SQL->execute();
    $SQL->close();

    // Also stop it if it's active in sessions
    $SQL = $ELICIT->prepare("DELETE FROM `sessions` WHERE `poll_id` = ? AND `poll_type` = 'word-cloud'");
    $SQL->bind_param('i', $poll_id);
    $SQL->execute();
    $SQL->close();

    echo json_encode(['status' => 'success', 'message' => 'Poll deleted successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Poll not found or already deleted']);
}
exit();
?>
