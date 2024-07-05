<?php
header('Content-Type: application/json');

require 'db_connection.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['vehicle'])) {
    echo json_encode(['success' => false, 'message' => 'Vehicle not specified']);
    exit();
}

$vehicle = $data['vehicle'];

$stmt = $conn->prepare("DELETE FROM vehicles WHERE vehicles = ?");
if ($stmt === false) {
    echo json_encode(['success' => false, 'message' => 'Prepare failed: ' . $conn->error]);
    exit();
}

$stmt->bind_param("s", $vehicle);
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Vehicle deleted successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Execute failed: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
