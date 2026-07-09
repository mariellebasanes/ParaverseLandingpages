<?php

define('MBG', TRUE);
include(__DIR__ . '/../../../functions-new.php');

DIRECT_ACCESS_BLOCKED();

$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'elicit',
    'host' => '127.0.0.1'
);

$table = 'events_sorted_view';
$primaryKey = 'id';

$columns = array(
    array(
        'db' => 'id',
        'dt' => 0,
        'formatter' => fn($d, $row) => htmlspecialchars($d)
    ),
    array(
        'db' => 'code',
        'dt' => 1,
        'formatter' => fn($d, $row) => htmlspecialchars($d)
    ),
    array(
        'db' => 'name',
        'dt' => 2,
        'formatter' => fn($d, $row) => htmlspecialchars($d, ENT_NOQUOTES)
    ),
    array(
        'db' => 'start_date',
        'dt' => 3,
        'formatter' => fn($d, $row) => htmlspecialchars($d)
    ),
    array(
        'db' => 'end_date',
        'dt' => 4,
        'formatter' => fn($d, $row) => htmlspecialchars($d)
    ),
    array(
        'db' => 'created_by',
        'dt' => 5,
        'formatter' => fn($d, $row) => DISPLAY_NAME(GET_ACCOUNT_DETAILS($d))
    ),
    array('db' => 'sort_group', 'dt' => 6, 'formatter' => fn($d) => intval($d)),
    array('db' => 'sort_value', 'dt' => 7, 'formatter' => fn($d) => intval($d)),
);

$where = "created_by = '$identification'";

if (isset($_GET['status'])) {
    if ($_GET['status'] === 'Active') {
        $where .= " AND end_date >= CURDATE()";
    } elseif ($_GET['status'] === 'Past') {
        $where .= " AND end_date < CURDATE()";
    }
}

require(__DIR__ . '/../../..' . '/assets/_datatables-ssp.php');
echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, null, $where)
);

?>