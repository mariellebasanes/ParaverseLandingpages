<?php
define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$poll_id = intval($_POST['poll_id']);
$ranked_options = isset($_POST['ranked_options']) ? $_POST['ranked_options'] : [];

if ($poll_id <= 0) {
    respondWithError("Poll is required.");
}

if (empty($ranked_options)) {
    respondWithError("Ranking options are required");
}

$check = $ELICIT->prepare("SELECT s.id FROM `sessions` s INNER JOIN `ranking_polls` rp ON s.poll_id = rp.id WHERE s.poll_type = 'ranking' AND s.poll_id = ? AND s.is_open = 1");
$check->bind_param('i', $poll_id);
$check->execute();
$check->store_result();
if ($check->num_rows === 0) {
    $check->close();
    respondWithError("Poll is not open or does not exist.");
}
$check->close();

$SQL = $ELICIT->prepare("INSERT INTO ranking_responses (poll_id, option_id, rank, created_by) VALUES (?, ?, ?, ?)");

$errors = false;
foreach ($ranked_options as $rank => $option_id) {
    $rank_num = $rank + 1;
    $SQL->bind_param('iiis', $poll_id, $option_id, $rank_num, $identification);
    if (!$SQL->execute()) {
        $errors = true;
        break;
    }
}

$SQL->close();

if ($errors) {
    $response = ['status' => 'error', 'message' => 'Failed to save ranking.'];
} else {
    $response = ['status' => 'success', 'message' => 'Vote ranking saved successfully.'];
}

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>