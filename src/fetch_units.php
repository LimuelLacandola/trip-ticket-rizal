<?php
include 'db_connection.php';

$units = array();

$sql = "SELECT * FROM units";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $units[] = $row['unit'];
    }
} else {
}

$conn->close();

echo json_encode($units);
