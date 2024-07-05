<?php
header('Content-Type: application/json');

require 'db_connection.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['driver'])) {
    echo json_encode(['success' => false, 'message' => 'Driver not specified']);
    exit();
}

$driver = $data['driver'];

$stmt = $conn->prepare("DELETE FROM drivers WHERE assigned_driver = ?");
$stmt->bind_param("s", $driver);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Driver deleted successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to delete driver']);
}

$stmt->close();
$conn->close();
