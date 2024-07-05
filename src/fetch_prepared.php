<?php
include 'db_connection.php';

$prepared = array();

$sql = "SELECT * FROM prepared_by";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $prepared[] = $row['name'];
    }
} else {
}

$conn->close();

echo json_encode($prepared);
