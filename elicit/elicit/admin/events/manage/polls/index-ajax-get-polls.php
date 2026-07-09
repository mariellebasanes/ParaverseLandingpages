<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$event_id = intval($_POST['id']);

if (empty($event_id)) {
    respondWithError("Event ID is missing.");
}

$allPolls = [];

function fetchPolls($ELICIT, $pollType, $pollTable, $responseTable, $event_id, $identification)
{
    if ($pollType === 'ranking' || $pollType === 'word-cloud') {
        $countField = "COUNT(DISTINCT r.created_by)";
    } else {
        $countField = "COUNT(r.id)";
    }

    $query = "SELECT p.id, p.question, $countField as votes, 
        EXISTS(SELECT 1 FROM sessions s WHERE s.poll_id = p.id AND s.poll_type = ? AND s.is_open = 1) as is_active, ? as poll_type
        FROM $pollTable p 
        LEFT JOIN $responseTable r ON p.id = r.poll_id 
        WHERE p.event_id = ? AND p.created_by = ? 
        GROUP BY p.id ORDER BY p.created_at DESC";
    $SQL = $ELICIT->prepare($query);
    $SQL->bind_param('ssis', $pollType, $pollType, $event_id, $identification);
    $SQL->execute();
    $poll = $SQL->get_result()->fetch_all(MYSQLI_ASSOC);
    $SQL->close();
    return $poll;
}

$pollConfigs = [
    ['rating', 'rating_polls', 'rating_responses'],
    ['open-text', 'open_text_polls', 'open_text_responses'],
    ['multiple-choice', 'multiple_choice_polls', 'multiple_choice_responses'],
    ['ranking', 'ranking_polls', 'ranking_responses'],
    ['word-cloud', 'word_cloud_polls', 'word_cloud_responses']
];

foreach ($pollConfigs as $config) {
    list($pollType, $pollTable, $responseTable) = $config;

    $polls = fetchPolls($ELICIT, $pollType, $pollTable, $responseTable, $event_id, $identification);
    $allPolls = array_merge($allPolls, $polls);
}

$response = [
    'status' => 'success',
    'polls' => $allPolls
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>