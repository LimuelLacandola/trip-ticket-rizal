<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
<?php
include 'db_connection.php';

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO riv (control_no, unit, item_description, quantity, estimated_unit_cost, estimated_total_cost, date) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiiis", $controlNo, $unit, $itemDescription, $quantity, $estimatedUnitCost, $estimatedTotalCost, $currentDate);

// Get the input arrays
$controlNo = $_POST['control_no'];
$units = $_POST['unit'];
$itemDescriptions = $_POST['itemDescription'];
$quantities = $_POST['quantity'];
$estimatedUnitCosts = $_POST['estimatedUnitCost'];

$currentDate = date("Y-m-d"); 

// Initialize a flag for success
$success = true;
$error_message = "";

// Insert each item into the database
for ($i = 0; $i < count($itemDescriptions); $i++) {
    // Set parameters and execute
    $unit = $units[$i];
    $itemDescription = $itemDescriptions[$i];
    $quantity = $quantities[$i];
    $estimatedUnitCost = $estimatedUnitCosts[$i];
    $estimatedTotalCost = $quantity * $estimatedUnitCost;
    if (!$stmt->execute()) {
        $success = false;
        $error_message = $stmt->error;
        break; // Exit the loop on the first failure
    }
}

// Close statement
$stmt->close();
$conn->close();

// Check for success and display appropriate message
if ($success) {
    echo "
    <script src='sweetalert2/dist/sweetalert2.all.min.js'></script>
      <script>
          Swal.fire({
              title: 'Success!',
              text: 'All Records Saved!',
              icon: 'success',
              showConfirmButton: false, 
              timer: 2000
          }).then(() => {
              window.location.href = 'index.php';
          });
       </script>";
} else {
    $encoded_error_message = htmlspecialchars($error_message, ENT_QUOTES);
    echo "<script src='sweetalert2/dist/sweetalert2.all.min.js'></script>
    <script>
    console.error('Error saving record: " . $encoded_error_message . "');
        Swal.fire({
            title: 'Error!',
            text: 'Error saving record',
            icon: 'error',
            showConfirmButton: false, 
            timer: 2000
        }).then(() => {
            window.location.href = 'index.php';
        });
     </script>";
}
?>
</body>
</html>
