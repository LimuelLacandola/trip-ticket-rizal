<?php
include 'db_connection.php';

$designation = array();

$sql = "SELECT * FROM designation";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $designation[] = $row['designation'];
    }
} else {
}

$conn->close();

echo json_encode($designation);
