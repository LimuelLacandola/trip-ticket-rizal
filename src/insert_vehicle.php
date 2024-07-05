<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <?php
    include 'db_connection.php';

    $vehicle = $_POST["new_vehicle"];

    $stmt = $conn->prepare("INSERT INTO vehicles (id, vehicles) VALUES (?, ?)");
    $stmt->bind_param("is", $id, $vehicle);

    if ($stmt->execute()) {
        echo "<script src='sweetalert2/dist/sweetalert2.all.min.js'></script>
  <script>
      Swal.fire({
          title: 'Success!',
          text: 'New Vehicle Saved!',
          icon: 'success',
          showConfirmButton: false, 
          timer: 2000
      }).then(() => {
          window.location.href = 'index.php';
      });
   </script>";
    } else {
        echo "<script src='sweetalert2/dist/sweetalert2.all.min.js'></script>
<script>
    Swal.fire({
        title: 'Error!',
        text: 'Error saving vehicle',
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