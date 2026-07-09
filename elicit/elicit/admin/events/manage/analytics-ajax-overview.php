<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');

DIRECT_ACCESS_BLOCKED();

$event_id = intval($_POST['id'] ?? 0);

if (empty($event_id)) {
    respondWithError("Event ID is missing.");
}

function fetchScalar($db, $sql, $types, ...$params)
{
    $stmt = $db->prepare($sql);
    if ($types)
        $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_row();
    $stmt->close();
    return $row ? (int) $row[0] : 0;
}

function fetchColumn($db, $sql, $types, ...$params)
{
    $stmt = $db->prepare($sql);
    if ($types)
        $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $rs = $stmt->get_result();
    $col = [];
    while ($row = $rs->fetch_row()) {
        if ($row[0] !== null && $row[0] !== '')
            $col[] = $row[0];
    }
    $stmt->close();
    return $col;
}

function pct($num, $den)
{
    return $den > 0 ? (int) round(($num / $den) * 100) : 0;
}

// Q&A counts
$total_questions = fetchScalar($EDITH, "SELECT COUNT(*) FROM elicit.audience_qa WHERE event_id = ?", 'i', $event_id);
$anonymous_questions = fetchScalar($EDITH, "SELECT COUNT(*) FROM elicit.audience_qa WHERE event_id = ? AND is_anonymous = 1", 'i', $event_id);
$answered_questions = fetchScalar($EDITH, "SELECT COUNT(*) FROM elicit.audience_qa WHERE event_id = ? AND is_answered = 1", 'i', $event_id);
$unanswered_questions = $total_questions - $answered_questions;
$total_qa_likes = fetchScalar(
    $EDITH,
    "SELECT COUNT(*) FROM elicit.audience_qa_likes l JOIN elicit.audience_qa q ON l.question_id = q.id WHERE q.event_id = ?",
    'i',
    $event_id
);

// Distinct askers and likers
$askers = fetchColumn($EDITH, "SELECT DISTINCT created_by FROM elicit.audience_qa WHERE event_id = ?", 'i', $event_id);
$likers = fetchColumn(
    $EDITH,
    "SELECT DISTINCT l.identification FROM elicit.audience_qa_likes l JOIN elicit.audience_qa q ON l.question_id = q.id WHERE q.event_id = ?",
    'i',
    $event_id
);

// Poll metrics across all 5 poll types
$pollTables = [
    ['rating', 'rating_polls', 'rating_responses', false],
    ['open-text', 'open_text_polls', 'open_text_responses', false],
    ['multiple-choice', 'multiple_choice_polls', 'multiple_choice_responses', false],
    ['ranking', 'ranking_polls', 'ranking_responses', true],
    ['word-cloud', 'word_cloud_polls', 'word_cloud_responses', true],
];

$voters = [];
$total_poll_votes = 0;
$total_polls = 0;
$polls_with_responses = 0;

foreach ($pollTables as [$type, $pollTable, $respTable, $multiRowPerVote]) {
    $total_polls += fetchScalar($EDITH, "SELECT COUNT(*) FROM elicit.$pollTable WHERE event_id = ?", 'i', $event_id);

    $polls_with_responses += fetchScalar(
        $EDITH,
        "SELECT COUNT(DISTINCT p.id) FROM elicit.$pollTable p JOIN elicit.$respTable r ON p.id = r.poll_id WHERE p.event_id = ?",
        'i',
        $event_id
    );

    if ($multiRowPerVote) {
        // Ranking and word-cloud insert multiple rows per submission — count distinct (user, poll) pairs as one vote.
        $total_poll_votes += fetchScalar(
            $EDITH,
            "SELECT COUNT(*) FROM (SELECT DISTINCT r.created_by, r.poll_id FROM elicit.$respTable r JOIN elicit.$pollTable p ON r.poll_id = p.id WHERE p.event_id = ?) AS t",
            'i',
            $event_id
        );
    } else {
        $total_poll_votes += fetchScalar(
            $EDITH,
            "SELECT COUNT(*) FROM elicit.$respTable r JOIN elicit.$pollTable p ON r.poll_id = p.id WHERE p.event_id = ?",
            'i',
            $event_id
        );
    }

    $col = fetchColumn(
        $EDITH,
        "SELECT DISTINCT r.created_by FROM elicit.$respTable r JOIN elicit.$pollTable p ON r.poll_id = p.id WHERE p.event_id = ?",
        'i',
        $event_id
    );
    $voters = array_merge($voters, $col);
}

$askersSet = array_unique($askers);
$likersSet = array_unique($likers);
$votersSet = array_unique($voters);

$participants_asking_qa = count($askersSet);
$participants_voting_qa = count($likersSet);
$participants_voting_polls = count($votersSet);

$qa_engaged_set = array_unique(array_merge($askersSet, $likersSet));
$total_engaged_set = array_unique(array_merge($askersSet, $likersSet, $votersSet));

$qa_engaged_count = count($qa_engaged_set);
$total_engaged = count($total_engaged_set);

// True audience size from attendance log
$total_participants = fetchScalar(
    $EDITH,
    "SELECT COUNT(*) FROM elicit.event_attendees WHERE event_id = ?",
    'i',
    $event_id
);

// Fallback: if attendance hasn't been tracked yet, use the engaged set so the page isn't empty
if ($total_participants < $total_engaged) {
    $total_participants = $total_engaged;
}

$avg_votes_per_poll = $total_polls > 0 ? (int) round($total_poll_votes / $total_polls) : 0;

$response = [
    'status' => 'success',
    'total_participants' => $total_participants,
    'engaged' => [
        'count' => $total_engaged,
        'score' => pct($total_engaged, $total_participants),
        'asking_qa' => $participants_asking_qa,
        'voting_qa' => $participants_voting_qa,
        'voting_polls' => $participants_voting_polls,
    ],
    'qa' => [
        'engaged_count' => $qa_engaged_count,
        'score' => pct($qa_engaged_count, $total_participants),
        'total_questions' => $total_questions,
        'anonymous_questions' => $anonymous_questions,
        'answered_questions' => $answered_questions,
        'unanswered_questions' => $unanswered_questions,
        'total_likes' => $total_qa_likes,
    ],
    'polls' => [
        'voter_count' => $participants_voting_polls,
        'score' => pct($participants_voting_polls, $total_participants),
        'total_votes' => $total_poll_votes,
        'polls_with_responses' => $polls_with_responses,
        'total_polls' => $total_polls,
        'avg_votes_per_poll' => $avg_votes_per_poll,
    ],
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
?>