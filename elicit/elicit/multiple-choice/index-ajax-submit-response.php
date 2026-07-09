<?php
define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$poll_id = intval($_POST['poll_id']);
$option_id = intval($_POST['option_id']);

if ($poll_id <= 0) {
    respondWithError("Poll is required.");
}

if ($option_id <= 0) {
    respondWithError("Option is required.");
}

$check = $ELICIT->prepare("SELECT id FROM multiple_choice_options WHERE id = ? AND poll_id = ?");
$check->bind_param('ii', $option_id, $poll_id);
$check->execute();
$check->store_result();
if ($check->num_rows === 0) {
    $check->close();
    respondWithError("Invalid option for this poll.");
}
$check->close();

$SQL = $ELICIT->prepare("INSERT INTO multiple_choice_responses (poll_id, option_id, created_by) VALUES (?, ?, ?)");
$SQL->bind_param('iis', $poll_id, $option_id, $identification);

if ($SQL->execute()) {
    $response = ['status' => 'success', 'message' => 'Vote recorded successfully'];
} else {
    if ($ELICIT->errno == 1062) {
        respondWithError("You have already voted in this poll.");
    } else {
        respondWithError("Failed to record vote. Please try again.");
    }
}

$SQL->close();
header('Content-Type: application/json');
echo json_encode($response);
exit();
?>