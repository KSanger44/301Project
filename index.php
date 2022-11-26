<?php
    include("config.php");
    session_start();

    $pID = $_SESSION["pID"];
    $psql = "SELECT * FROM procs WHERE pID = '$pID'";
    $presult = mysqli_query($conn,$psql);
    $prow = mysqli_fetch_array($presult,MYSQLI_ASSOC);
    $procname = $prow["name"];
    $procID = $prow["procID"];
    $dID = $prow["dID"];
    $desc = $prow["desc"];
    $time = $prow["time"];
    $date = $prow["date"];


    $dID = $prow["dID"];
    $_SESSION['procname'] = $procname;
    $_SESSION['procID'] = $procID;

    $dsql = "SELECT name FROM doctor WHERE dID = '$dID'";
    $dresult = mysqli_query($conn,$dsql);
    $drow = mysqli_fetch_array($dresult,MYSQLI_ASSOC);
    $docname = $drow["name"];

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

    <!-- Testing can Delete -------------------->
    <p>procname is <?php echo $procname; ?></p>
    <p>dID is <?php echo $dID; ?></p>
    <p>procID is <?php echo $procID; ?></p>
    <!------------------------------------------->

    <div class="container-fluid">
        <div id="appt">
            <p><?php echo $_SESSION['fname']; ?> is scheduled for <?php echo $procname; ?> with <?php echo  $docname; ?> at <?php echo  $time; ?> on <?php echo $date; ?>.</p>
        </div>
        <div id="desc">
            <p>Please make sure to do the <a href="checkin.php">Patient Check-in</a> at least 48 hours before the start of the procedure</p>
            <p><?php echo $desc; ?></p>

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