<?php
include 'db_connection.php';

$trip_records = array();
$sql = "SELECT * FROM trip_ticket";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $trip_records[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($trip_records);
