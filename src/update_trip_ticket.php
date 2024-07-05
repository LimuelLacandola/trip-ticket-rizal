<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <?php
    include 'db_connection.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $trip_ticket_number = $_POST['trip_ticket_number'];
        $driver = $_POST['driver'];
        $authorized_passenger = $_POST['authorized_passenger'];
        $requesting_official = $_POST['requesting_official'];
        $obs_no = $_POST['obs_no'];
        $period_covered = $_POST['period_covered'];
        $destination = $_POST['destination'];
        $purpose = $_POST['purpose'];
        $vehicle = $_POST['vehicle'];
        $departure_time = $_POST['departure_time'];
        $person_prepared = $_POST['person_prepared'];

        $stmt = $conn->prepare("UPDATE trip_ticket SET driver = ?, authorized_passenger = ?, requesting_official = ?, obs_no = ?, period_covered = ?, destination = ?, purpose = ?, vehicle = ?, departure_time = ?, person_prepared = ? WHERE trip_ticket_number = ?");
        $stmt->bind_param("sssssssssss", $driver, $authorized_passenger, $requesting_official, $obs_no, $period_covered, $destination, $purpose, $vehicle, $departure_time, $person_prepared, $trip_ticket_number);

        if ($stmt->execute()) {
            echo "<script src='sweetalert2/dist/sweetalert2.all.min.js'></script>
                  <script>
                      Swal.fire({
                          title: 'Are you sure?',
                          text: 'You are about to update this record.',
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonText: 'Yes, update it!',
                          cancelButtonText: 'No, cancel!'
                      }).then((result) => {
                          if (result.isConfirmed) {
                              
                              Swal.fire({
                                  title: 'Success!',
                                  text: 'Record updated successfully!',
                                  icon: 'success',
                                  showConfirmButton: false,
                                  timer: 2000
                              }).then(() => {
                                  window.location.href = 'trip_ticket_records.php';
                              });
                          } else if (result.dismiss === Swal.DismissReason.cancel) {
                              Swal.fire({
                                  title: 'Cancelled',
                                  text: 'Update operation cancelled.',
                                  icon: 'error',
                                  showConfirmButton: false,
                                  timer: 2000
                              }).then(() => {
                                  window.location.href = 'trip_ticket_records.php';
                              });
                          }
                      });
                   </script>";
        } else {
            echo "<script src='sweetalert2/dist/sweetalert2.all.min.js'></script>
                  <script>
                      Swal.fire({
                          title: 'Error!',
                          text: 'Error updating record: " . $conn->error . "',
                          icon: 'error',
                          showConfirmButton: false, 
                          timer: 2000
                      }).then(() => {
                          window.location.href = 'index.php';
                      });
                   </script>";
        }
        
        $stmt->close();

        }
    
    $conn->close();
    ?>

    
</body>
</html>