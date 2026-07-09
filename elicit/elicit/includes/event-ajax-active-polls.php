<?php

define('MBG', TRUE);
include(__DIR__ . '/../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$id = intval($_POST['event_id']);

if (empty($id)) {
    respondWithError("Event ID is missing.");
}

$SQL = $ELICIT->prepare("SELECT * FROM `sessions` WHERE `event_id` = ? AND `is_open` = 1 AND `poll_type` != 'q&a' LIMIT 1");
$SQL->bind_param('i', $id);
$SQL->execute();
$session = $SQL->get_result()->fetch_assoc();
$SQL->close();

if (!$session) {
    $response = ['status' => 'success', 'poll' => null];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

$poll = null;

switch ($session['poll_type']) {
    case 'rating':
        $SQL = $ELICIT->prepare("SELECT rp.id, rp.question, rp.min_rating, rp.max_rating, rr.rating as user_rating, CASE WHEN rr.id IS NOT NULL THEN 1 ELSE 0 END as user_responded FROM rating_polls rp LEFT JOIN rating_responses rr ON rp.id = rr.poll_id AND rr.created_by = ? WHERE rp.id = ?");
        $SQL->bind_param('si', $identification, $session['poll_id']);
        $SQL->execute();

        if ($poll = $SQL->get_result()->fetch_assoc()) {
            $poll['type'] = 'rating';
            $poll['user_rating'] = $poll['user_rating'] ? (int) $poll['user_rating'] : null;
            $poll['user_responded'] = (bool) $poll['user_responded'];
        }
        $SQL->close();
        break;
    case 'open-text':
        $SQL = $ELICIT->prepare("SELECT otp.id, otp.question, otr.response as user_response, CASE WHEN otr.id IS NOT NULL THEN 1 ELSE 0 END as user_responded FROM open_text_polls otp LEFT JOIN open_text_responses otr ON otp.id = otr.poll_id AND otr.created_by = ? WHERE otp.id = ?");
        $SQL->bind_param('si', $identification, $session['poll_id']);
        $SQL->execute();

        if ($poll = $SQL->get_result()->fetch_assoc()) {
            $poll['type'] = 'open-text';
            $poll['user_response'] = $poll['user_response'] ? $poll['user_response'] : null;
            $poll['user_responded'] = (bool) $poll['user_responded'];
        }
        $SQL->close();
        break;
    case 'multiple-choice':
        $SQL = $ELICIT->prepare("SELECT mcp.id, mcp.question, mcr.option_id as user_option, CASE WHEN mcr.id IS NOT NULL THEN 1 ELSE 0 END as user_responded FROM multiple_choice_polls mcp LEFT JOIN multiple_choice_responses mcr ON mcp.id = mcr.poll_id AND mcr.created_by = ? WHERE mcp.id = ?");
        $SQL->bind_param('si', $identification, $session['poll_id']);
        $SQL->execute();

        if ($poll = $SQL->get_result()->fetch_assoc()) {
            $poll['type'] = 'multiple-choice';
            $poll['user_option'] = $poll['user_option'] ? (int) $poll['user_option'] : null;
            $poll['user_responded'] = (bool) $poll['user_responded'];
        }
        $SQL->close();
        break;
    case 'ranking':
        $SQL = $ELICIT->prepare("SELECT rp.id, rp.question, rr.option_id as user_option, CASE WHEN rr.id IS NOT NULL THEN 1 ELSE 0 END as user_responded FROM ranking_polls rp LEFT JOIN ranking_responses rr ON rp.id = rr.poll_id AND rr.created_by = ? WHERE rp.id = ?");
        $SQL->bind_param('si', $identification, $session['poll_id']);
        $SQL->execute();

        if ($poll = $SQL->get_result()->fetch_assoc()) {
            $poll['type'] = 'ranking';
            $poll['user_option'] = $poll['user_option'] ? (int) $poll['user_option'] : null;
            $poll['user_responded'] = (bool) $poll['user_responded'];
        }
        $SQL->close();
        break;
    case 'word-cloud':
        $SQL = $ELICIT->prepare("SELECT wcp.id, wcp.question, wcr.response as user_response, CASE WHEN wcr.id IS NOT NULL THEN 1 ELSE 0 END as user_responded FROM word_cloud_polls wcp LEFT JOIN word_cloud_responses wcr ON wcp.id = wcr.poll_id AND wcr.created_by = ? WHERE wcp.id = ?");
        $SQL->bind_param('si', $identification, $session['poll_id']);
        $SQL->execute();

        if ($poll = $SQL->get_result()->fetch_assoc()) {
            $poll['type'] = 'word-cloud';
            $poll['user_response'] = $poll['user_response'] ? $poll['user_response'] : null;
            $poll['user_responded'] = (bool) $poll['user_responded'];
        }
        $SQL->close();
        break;


    default:
        break;
}

if ($poll) {
    $response = ['status' => 'success', 'poll' => $poll];
} else {
    $response = ['status' => 'success', 'poll' => null];
}

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>