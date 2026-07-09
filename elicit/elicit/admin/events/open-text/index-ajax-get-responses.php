<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();

$poll_id = intval($_POST['poll_id']);

if (empty($poll_id)) {
    echo json_encode(['status' => 'error', 'message' => 'Poll ID is required']);
    exit();
}

$SQL = $ELICIT->prepare("SELECT question FROM `open_text_polls` WHERE `id` = ?");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();
$question = $RESULT['question'] ?? '';
$SQL->close();

$SQL = $ELICIT->prepare("
    SELECT r.response, r.created_at, r.is_anonymous, a.display_name, a.avatar_md
    FROM `open_text_responses` r
    LEFT JOIN `accounts` a ON r.created_by = a.identification
    WHERE r.poll_id = ? 
    ORDER BY r.created_at DESC
");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RECORD = $SQL->get_result();

$answers = [];
while ($row = $RECORD->fetch_assoc()) {
    $is_anon = (int)$row['is_anonymous'];
    $answers[] = [
        'response' => $row['response'],
        'created_at' => $row['created_at'],
        'participant_name' => $is_anon ? 'Anonymous Participant' : ($row['display_name'] ?? 'Guest Participant'),
        'avatar_url' => $is_anon ? '' : ($row['avatar_md'] ?? '')
    ];
}
$SQL->close();

$response = [
    'status' => 'success',
    'question' => $question,
    'answers' => $answers,
    'total_votes' => count($answers)
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>
