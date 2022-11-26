<!DOCTYPE html>
<?php
    $dsql = "SELECT * FROM doctor WHERE dID = '$dID'";
    $dresult = mysqli_query($conn,$dsql);
    $drow = mysqli_fetch_array($dresult,MYSQLI_ASSOC);
    $docname = $drow["name"];
    $dphone = $drow["phone"];
    $demail["email"];

    $csql = "SELECT checkin FROM procs WHERE procID = '$procID'";
    $cresult = mysqli_query($conn,$csql);
    $crow = mysqli_fetch_array($cresult,MYSQLI_ASSOC);
    $checkin = $crow["checkin"];
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        table td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h4>Hello ksanger,</h4>

        <table>
            <tr>
                <th>Contact</th><th>Phone</th>
            </tr>
            <tr>
                <td>General Questions</td><td>608 778-4444</td>
            </tr>
            <tr> 
                <td><? echo php $docname, $demail ?></td><td><?php echo $dphone ?></td>
            </tr>
            <tr>
                <td>Pharmacy</td><td>608 888-3312</td>
            </tr>
            <tr>
                <td>Billing</td><td>608 666-9999</td>
            </tr>
        </table><br>

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