<?php
include 'db_connection.php';

// Query to count the number of rows in the trip_ticket table
$sql_count = "SELECT COUNT(*) AS total_rows FROM trip_ticket";
$result_count = $conn->query($sql_count);
$count_row = $result_count->fetch_assoc();

if ($count_row) {
    // Get the total number of rows and calculate the next trip ticket number
    $total_rows = $count_row['total_rows'];
    $new_trip_ticket_number = sprintf("%s %04d", date("m-y"), $total_rows + 1);
} else {
    // If no rows are found, start with 1
    $new_trip_ticket_number = sprintf("%s %04d", date("m-y"), 1);
}

// Output the new trip ticket number
// echo $new_trip_ticket_number;
?>
