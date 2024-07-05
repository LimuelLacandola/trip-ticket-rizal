<?php
include 'db_connection.php';

$reco = array();

$sql = "SELECT * FROM recommending_approval";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reco[] = $row['name'];
    }
} else {
}

$conn->close();

echo json_encode($reco);
