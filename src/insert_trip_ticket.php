<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <?php
    include 'db_connection.php';

    $sql_last_row = "SELECT MAX(CAST(SUBSTRING_INDEX(trip_ticket_number, ' ', -1) AS UNSIGNED)) AS last_row FROM trip_ticket";
    $result_last_row = $conn->query($sql_last_row);
    $last_row = $result_last_row->fetch_assoc();
    $last_row_number = $last_row['last_row'] ? $last_row['last_row'] : 0;

    $current_date = date("m-d-y");
    $new_trip_ticket_number = sprintf("%s %04d", "NCRC-LR " . $current_date, $last_row_number + 1);

    $trip_ticket_number = $new_trip_ticket_number;


    $date = $_POST["date"];
    $driver = $_POST["driver"];
    $passenger = $_POST["authorized_passenger"];
    $requestingOfficial = $_POST["requesting_official"];
    $obs_no = $_POST["obs_no"];
    $periodCovered = $_POST["period_covered"];
    $destination = $_POST["destination"];
    $purpose = $_POST["purpose"];
    $vehicle = $_POST["vehicle"];
    $departureTime = $_POST["departure_time"];
    $milage = $_POST["milage"];
    $prNo = $_POST["pr_no"];
    $personPrepared = $_POST["person_prepared"];

    $stmt = $conn->prepare("INSERT INTO trip_ticket (trip_ticket_number, ticketdate, driver, authorized_passenger, requesting_official, obs_no, period_covered, destination, purpose, vehicle, departure_time, person_prepared, milage, pr_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssss", $trip_ticket_number, $date, $driver, $passenger, $requestingOfficial, $obs_no, $periodCovered, $destination, $purpose, $vehicle, $departureTime, $personPrepared, $milage, $prNo);

    if ($stmt->execute()) {
        echo "
        <script src='sweetalert2/dist/sweetalert2.all.min.js'></script>
          <script>
              Swal.fire({
                  title: 'Success!',
                  text: 'New Record Saved!',
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