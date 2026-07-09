<?php

define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$poll_id = intval($_POST['poll_id']);
$responses = $_POST['responses'] ?? [];

if (empty($poll_id)) {
    respondWithError("Poll is required.");
}

$responses = array_filter(array_map('trim', $responses), function ($v) {
    return $v !== '';
});

if (empty($responses)) {
    respondWithError('At least one response is required');
}

$SQL = $ELICIT->prepare("INSERT INTO `word_cloud_responses` (poll_id, response, created_by) VALUES (?, ?, ?)");

foreach ($responses as $response) {
    $SQL->bind_param('iss', $poll_id, $response, $identification);
    if (!$SQL->execute()) {
        respondWithError("Failed to insert response: " . $SQL->error);
    }
}

$response = ['status' => 'success', 'message' => 'Response submitted successfully'];

$SQL->close();
header('Content-Type: application/json');
echo json_encode($response);
exit();

?>