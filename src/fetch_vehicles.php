<?php
include 'db_connection.php';

$vehicles = array();

$sql = "SELECT * FROM vehicles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vehicles[] = $row['vehicles'];
    }
} else {
}

$conn->close();

echo json_encode($vehicles);
