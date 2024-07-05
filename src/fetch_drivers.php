<?php
include 'db_connection.php';

$drivers = array();

$sql = "SELECT * FROM drivers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $drivers[] = $row['assigned_driver'];
    }
} else {
}

$conn->close();

echo json_encode($drivers);
