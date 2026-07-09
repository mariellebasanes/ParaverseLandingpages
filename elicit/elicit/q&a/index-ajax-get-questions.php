<?php

define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$code = intval($_POST['code']);

if (empty($code)) {
    respondWithError("Event code is missing.");
}

$SQL = $ELICIT->prepare("SELECT id FROM events WHERE code = ?");
$SQL->bind_param('i', $code);
$SQL->execute();
$RESULT = $SQL->get_result()->fetch_assoc();

if (!$RESULT) {
    respondWithError("Event not found.");
}
$SQL->close();

$SQL = $ELICIT->prepare("
    SELECT q.*,
           EXISTS(SELECT 1 FROM audience_qa_likes l WHERE l.question_id = q.id AND l.identification = ?) AS user_has_liked
    FROM `audience_qa` q
    WHERE q.event_id = ?
    ORDER BY q.is_highlighted DESC, q.likes DESC, q.created_at DESC
");
$SQL->bind_param('si', $identification, $RESULT['id']);
$SQL->execute();
$RESULT = $SQL->get_result();

$questions = [];

while ($row = $RESULT->fetch_assoc()) {
    if ($row['is_anonymous'] == 1) {
        $row['participant_name'] = 'Anonymous';
        $row['avatar_url'] = '/briefcase/assets/images/avatars/avatar-default.jpg';
    } else {
        $ACCOUNT = GET_ACCOUNT_DETAILS($row['created_by']);
        $row['participant_name'] = DISPLAY_NAME($ACCOUNT);
        $row['avatar_url'] = $ACCOUNT['avatar_md'];
    }
    $row['user_has_liked'] = (bool) $row['user_has_liked'];
    $questions[] = $row;
}

$response = ['status' => 'success', 'questions' => $questions];
$SQL->close();

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>