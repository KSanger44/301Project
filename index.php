<?php
    include("config.php");
    session_start();
    date_default_timezone_set("America/Chicago");
    $pID = $_SESSION["pID"];
    $psql = "SELECT * FROM procs WHERE pID = '$pID'";
    $presult = mysqli_query($conn,$psql);
    $prow = mysqli_fetch_array($presult,MYSQLI_ASSOC);
    $procname = $prow["name"];
    $procID = $prow["procID"];
    $dID = $prow["dID"];
    $desc = $prow["desc"];
    $zerotime = $prow["time"];
    $atime = rtrim($zerotime, '0');
    $timestamp = strtotime($atime);
    $time = date("h:i:sa", $timestamp);
    
    $rdate = $prow["date"];
    $datestamp = strtotime($rdate);
    $date = date("m-d-Y", $datestamp);

    $datetime = $date . " " . $time;

    //$datestring = date( 'Y-m-d H:i:s', $date );
    //$timestring = strtotime($time);

    $dID = $prow["dID"];
    $_SESSION['dID'] = $dID;
    $_SESSION['procname'] = $procname;
    $_SESSION['procID'] = $procID;
    $_SESSION['time'] = $time;
    $_SESSION['date'] = $date;

    $dsql = "SELECT name FROM doctor WHERE dID = '$dID'";
    $dresult = mysqli_query($conn,$dsql);
    $drow = mysqli_fetch_array($dresult,MYSQLI_ASSOC);
    $docname = $drow["name"];

    $csql = "SELECT checkin FROM procs WHERE procID = '$procID'";
    $cresult = mysqli_query($conn,$csql);
    $crow = mysqli_fetch_array($cresult,MYSQLI_ASSOC);
    $checkin = $crow["checkin"];

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
            <p><?php echo $_SESSION['fname'] . " is scheduled for " .  $procname . " with " . $docname . " at " .  $time . " on " . $date; ?>.</p>
        </div>
        <div id="desc">
        <?php 
            if($checkin == 0){
                echo "<p>Please make sure to do the <a href='checkin.php'>Patient Check-in</a> at least 24 hours before the start of the procedure</p>";
            }
            echo $desc; ?>

        </div>
    </div>

    <div class="btn-group">
        <?php if($checkin == 0){
        echo "<a href='checkin.php' role='button' class='btn btn-danger'>Check-in</a>";
        } else {
            echo "<a href='#' role='button' class='btn btn-success'>Checked In</a>";    
        }
        ?>
        <a href="patientStatus.php" role="button" class="btn btn-primary">Patient Status</a>
        <a href="index.php" role="button" class="btn btn-primary">Procedure Info</a>
        <a href="contacts.php" role="button" class="btn btn-primary">Contacts</a>
        <a href="logout.php" role="button" class="btn btn-light">Logout</a>
    </div>
</body>

</html>