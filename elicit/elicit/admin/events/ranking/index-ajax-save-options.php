<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
// SESSION_TIMEOUT_BLOCKED();

$poll_id = isset($_POST['poll_id']) ? intval($_POST['poll_id']) : 0;
$options = isset($_POST['options']) ? $_POST['options'] : [];

if ($poll_id <= 0) {
    respondWithError("Invalid poll ID");
}

$existing = [];
$SQL = $ELICIT->prepare("SELECT id FROM ranking_options WHERE poll_id = ?");
$SQL->bind_param('i', $poll_id);
$SQL->execute();
$result = $SQL->get_result();
while ($row = $result->fetch_assoc()) {
    $existing[$row['id']] = true;
}
$SQL->close();

$incoming_ids = [];

foreach ($options as $opt) {
    $option_id = isset($opt['id']) ? intval($opt['id']) : 0;
    $option_text = isset($opt['text']) && trim($opt['text']) !== '' ? trim($opt['text']) : null;

    if ($option_id > 0 && isset($existing[$option_id])) {
        $SQL = $ELICIT->prepare("UPDATE `ranking_options` SET `option` = ? WHERE `id` = ? AND `poll_id` = ?");
        $SQL->bind_param('sii', $option_text, $option_id, $poll_id);
        $SQL->execute();
        $SQL->close();
        $incoming_ids[] = $option_id;
    } else {
        $SQL = $ELICIT->prepare("INSERT INTO `ranking_options` (`poll_id`, `option`) VALUES (?, ?)");
        $SQL->bind_param('is', $poll_id, $option_text);
        $SQL->execute();
        $new_id = $ELICIT->insert_id;
        $SQL->close();
        $incoming_ids[] = $new_id;
    }
}

if (!empty($incoming_ids)) {
    $placeholders = implode(',', array_fill(0, count($incoming_ids), '?'));
    $types = str_repeat('i', count($incoming_ids));

    $SQL = $ELICIT->prepare("DELETE FROM `ranking_options` WHERE `poll_id` = ? AND id NOT IN ($placeholders)");
    $params = array_merge([$poll_id], $incoming_ids);
    $SQL->bind_param('i' . $types, ...$params);
    $SQL->execute();
    $SQL->close();
} else {
    $SQL = $ELICIT->prepare("DELETE FROM `ranking_options` WHERE `poll_id` = ?");
    $SQL->bind_param('i', $poll_id);
    $SQL->execute();
    $SQL->close();
}

$response = [
    'status' => 'success',
    'message' => 'Options saved successfully',
    'poll_id' => $poll_id
];

header('Content-Type: application/json');
echo json_encode($response);
exit();