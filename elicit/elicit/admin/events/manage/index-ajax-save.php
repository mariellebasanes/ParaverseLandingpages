<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();
//SESSION_TIMEOUT_BLOCKED();

$id = intval($_POST['id'] ?? 0);
$name = htmlspecialchars($_POST['name'], ENT_NOQUOTES);
$start_date = htmlspecialchars($_POST['start_date'], ENT_NOQUOTES);
$end_date = htmlspecialchars($_POST['end_date'], ENT_NOQUOTES);

if (empty($name) || empty($start_date) || empty($end_date)) {
    respondWithError("Please complete the details.");
}

$code = null;

if ($id == 0) {
    $SQL = $ELICIT->prepare("SELECT COUNT(id) AS TOTAL FROM events WHERE name = ?");
    $SQL->bind_param('s', $name);
    $SQL->execute();
    $RECORD = $SQL->get_result()->fetch_assoc();

    if ($RECORD['TOTAL'] > 0) {
        respondWithError($name . ' event already exists. Please choose another name!');
    }

    $code = strtoupper(crc32(date('ymdHis') . microtime(true)));

    $SQL = $ELICIT->prepare("INSERT INTO events (code, name, start_date, end_date, created_by) VALUES (?,?,?,?,?)");
    $SQL->bind_param('sssss', $code, $name, $start_date, $end_date, $identification);
    if (!$SQL->execute()) {
        respondWithError("SQL execute failed: " . $SQL->error);
    }
    $id = $ELICIT->insert_id;

    $message = "Event created successfully.";
} else {
    $SQL = $ELICIT->prepare("UPDATE events SET name = ?, start_date = ?, end_date = ?, updated_by = ? WHERE id = ?");
    $SQL->bind_param('ssssi', $name, $start_date, $end_date, $identification, $id);
    if (!$SQL->execute()) {
        respondWithError("SQL execute failed: " . $SQL->error);
    }
    $message = "Event updated successfully.";
}

$response = [
    'status' => 'success',
    'message' => $message,
    'code' => $code
];

header('Content-Type: application/json');
echo json_encode($response);
exit();

?>