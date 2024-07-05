<!DOCTYPE html>
<html>

<head>
    <title>Recommending by:</title>
    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <?php
    include 'db_connection.php';

    $approved = $_POST["new_approved"];

    $stmt = $conn->prepare("INSERT INTO approved_by (id, name) VALUES (?, ?)");
    $stmt->bind_param("is", $id, $approved);

    if ($stmt->execute()) {
        echo "<script src='sweetalert2/dist/sweetalert2.all.min.js'></script>
      <script>
          Swal.fire({
              title: 'Success!',
              text: 'New Approving Person Saved!',
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
            text: 'Error saving approving person',
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