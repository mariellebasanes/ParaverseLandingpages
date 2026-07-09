<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function requireEventOwnership(mysqli $EDITH, int $event_id, ?string $identification): void {
    if ($event_id <= 0 || $identification === null || $identification === '') {
        http_response_code(403);
        respondWithError("You do not have permission to modify this event.");
    }
    $SQL = $EDITH->prepare("SELECT 1 FROM elicit.`events` WHERE `id` = ? AND `created_by` = ?");
    $SQL->bind_param('is', $event_id, $identification);
    $SQL->execute();
    $SQL->store_result();
    $owned = $SQL->num_rows > 0;
    $SQL->close();
    if (!$owned) {
        http_response_code(403);
        respondWithError("You do not have permission to modify this event.");
    }
}