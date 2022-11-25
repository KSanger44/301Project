<?php
    include("config.php");
    session_start();

    $sql = "SELECT * FROM procedure WHERE pID = '$_SESSION['pID']'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $procname = $row["name"];


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h4>Hello <?php echo $_SESSION['fname']; ?>,</h4>
    <div class="container-fluid">
        <div id="appt">
            <p><?php echo $_SESSION['fname'] ?> is scheduled for <?php $procname ?> with [doctor] at [time] on [date].</p>
        </div>
        <div id="nextAction">
            <p>Please make sure to do the <a href="checkin.php">Patient Check-in</a> at least 48 hours before the start of the procedure</p>
        </div>
    </div>

    <div class="btn-group">
        <a href="checkin.php" role="button" class="btn btn-danger">Check-in</a>
        <a href="patientStatus.php" role="button" class="btn btn-primary">Patient Status</a>
        <a href="procedureInfo.php" role="button" class="btn btn-primary">Procedure Info</a>
        <a href="contacts.php" role="button" class="btn btn-primary">Contacts</a>
        <a href="logout.php" role="button" class="btn btn-light">Logout</a>
    </div>
</body>

</html>