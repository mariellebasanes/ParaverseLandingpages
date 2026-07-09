<?php
define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$poll_id = intval($_POST['poll_id']);

if (empty($poll_id)) {
    echo json_encode(['status' => 'error', 'message' => 'Poll ID is required']);
    exit();
}

$SQL = $ELICIT->prepare("SELECT id, `option` FROM ranking_options WHERE poll_id = ? ORDER BY id");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RESULT = $SQL->get_result();
$options = [];
while ($row = $RESULT->fetch_assoc()) {
    $options[] = [
        'id' => (int) $row['id'],
        'option' => $row['option']
    ];
}
$SQL->close();

$response = ['status' => 'success', 'options' => $options];
header('Content-Type: application/json');
echo json_encode($response);
exit();