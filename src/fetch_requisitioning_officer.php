<?php
include 'db_connection.php';

$requisitioningOfficer = array();

$sql = "SELECT * FROM requisitioning_officer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $requisitioningOfficer[] = $row['requisitioning_officer'];
    }
} else {
}

$conn->close();