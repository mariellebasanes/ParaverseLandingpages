<?php
define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();

$id = intval($_POST['id'] ?? 0);
if (!$id)
    respondWithError('Invalid event ID');

$SQL = $ELICIT->prepare("SELECT `id`, `code`, `name`, `start_date`, `end_date` FROM `events` WHERE `id` = ? AND `created_by` = ?");
$SQL->bind_param('is', $id, $identification);
$SQL->execute();
$RESULT = $SQL->get_result();

if ($RESULT->num_rows == 0)
    respondWithError('Event not found');
$event = $RESULT->fetch_assoc();

$response = [
    'status' => 'success',
    'data' => $event
];

header('Content-Type: application/json');
echo json_encode($response);
exit();