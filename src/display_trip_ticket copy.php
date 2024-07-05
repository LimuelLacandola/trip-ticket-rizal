<?php
include 'db_connection.php';


$sql_last_inserted = "SELECT trip_ticket_number FROM trip_ticket ORDER BY trip_ticket_number DESC LIMIT 1";
$result_last_inserted = $conn->query($sql_last_inserted);
$last_inserted_row = $result_last_inserted->fetch_assoc();

if ($last_inserted_row) {

    $last_inserted_number = (int)substr($last_inserted_row['trip_ticket_number'], -4);


    $new_trip_ticket_number = sprintf("%s %04d", date("m-y"), $last_inserted_number + 1);
} else {

    $new_trip_ticket_number = sprintf("%s %04d", date("m-y"), 1);
}
