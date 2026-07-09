<?php

define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$poll_id = intval($_POST['poll_id']);

if (empty($poll_id)) {
    $response = [
        'status' => 'error',
        'message' => 'Poll ID is required'
    ];
    echo json_encode($response);
    exit();
}

$SQL = $ELICIT->prepare("SELECT `question` FROM `open_text_polls` WHERE `id` = ?");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();

if (!$RESULT) {
    $response = [
        'status' => 'error',
        'message' => 'Poll not found'
    ];
    echo json_encode($response);
    exit();
}

$question = $RESULT['question'];
$SQL->close();

$SQL = $ELICIT->prepare("SELECT COUNT(*) as `total_votes` FROM `open_text_responses` WHERE `poll_id` = ?");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();
$total_votes = $RESULT['total_votes'] ?? 0;
$SQL->close();

$SQL = $ELICIT->prepare("SELECT `response`, `is_anonymous`, `created_at`, `created_by` FROM `open_text_responses` WHERE `poll_id` = ? ORDER BY `created_at` DESC");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$RESULT = $SQL->get_result();

$answers = [];

while ($row = $RESULT->fetch_assoc()) {
    if ($row['is_anonymous'] == 1) {
        $row['participant_name'] = 'Anonymous';
        $row['avatar_url'] = '/briefcase/assets/images/avatars/avatar-default.jpg';
    } else {
        $ACCOUNT = GET_ACCOUNT_DETAILS($row['created_by']);
        $row['participant_name'] = DISPLAY_NAME($ACCOUNT);
        $row['avatar_url'] = $ACCOUNT['avatar_md'];
    }
    $answers[] = $row;
}
$SQL->close();

$response = [
    'status' => 'success',
    'question' => $question,
    'answers' => $answers,
    'total_votes' => $total_votes
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>