<?php
define('MBG', TRUE);
include(__DIR__ . '/../../../functions-new.php');
DIRECT_ACCESS_BLOCKED();

$identification = $_SESSION['identification'] ?? '';

$counts = ['all' => 0, 'active' => 0, 'past' => 0];

$stmt = $ELICIT->prepare("SELECT COUNT(*) as total FROM events WHERE created_by = ?");
$stmt->bind_param('s', $identification);
$stmt->execute();
$counts['all'] = $stmt->get_result()->fetch_assoc()['total'];

$stmt = $ELICIT->prepare("SELECT COUNT(*) as total FROM events WHERE created_by = ? AND end_date >= CURDATE()");
$stmt->bind_param('s', $identification);
$stmt->execute();
$counts['active'] = $stmt->get_result()->fetch_assoc()['total'];

$stmt = $ELICIT->prepare("SELECT COUNT(*) as total FROM events WHERE created_by = ? AND end_date < CURDATE()");
$stmt->bind_param('s', $identification);
$stmt->execute();
$counts['past'] = $stmt->get_result()->fetch_assoc()['total'];

header('Content-Type: application/json');
echo json_encode(['status' => 'success', 'counts' => $counts]);