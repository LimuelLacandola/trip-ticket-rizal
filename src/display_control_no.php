<?php
include 'db_connection.php';

$sql_last_inserted = "SELECT control_no FROM riv ORDER BY control_no DESC LIMIT 1";
$result_last_inserted = $conn->query($sql_last_inserted);
$last_inserted_row = $result_last_inserted->fetch_assoc();

if ($last_inserted_row) {
    $last_inserted_number = (int)substr($last_inserted_row['control_no'], -3); // Extract last three digits
    $new_control_no = date("Y") . "_" . sprintf("%03d", $last_inserted_number + 1); // Increment and pad with leading zeros if necessary
} else {
    // If there's no existing data, start from 001
    $new_control_no = date("Y") . "_001";
}
