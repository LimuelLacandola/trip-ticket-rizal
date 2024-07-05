<?php
include 'db_connection.php';

$approved = array();

$sql = "SELECT * FROM approved_by";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $approved[] = $row['name'];
    }
} else {
}

$conn->close();

echo json_encode($approved);
