<?php
    include("config.php");
    session_start();
    $procID = $_SESSION['procID'];
    $time = $_SESSION['time'];
    $date = $_SESSION['date'];
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

    <?php if($checkin == 0){
      echo "<p>Please confirm following information:</p>";
      echo "<form action='' method ='post'>";
      echo "<label for='fname'>First Name:</label>";
      echo "<div class='col-md-3'>";
      echo "<input type='text' class='form-control' id='fname'></div></div>";

      echo "<div class='form-group'>";
      echo "<label for='lname'>Last Name:</label>";
      echo "<div class='col-md-3'>";
      echo "<input type='text' class='form-control' id='lname'></div></div>";

      echo "<label for='surgery'>You are scheduled for an $procname at $time on $date</label>";
      echo "<div class='form-check'>";
      echo "<input class='form-check-input' type='radio' name='surgery' id='yes'>";
      echo "<label class='form-check-label' for='yes'>Yes</label></div>";

      echo "<div class='form-check'>";
      echo "<input class='form-check-input' type='radio' name='surgery' id='no'>";
      echo "<label class='form-check-label' for='no'>No</label></div>";

      echo "<div class='form-group'>
      <label for='height'>Enter your height in inches:</label>
      <div class='col-md-2'>
      <input type='text' class='form-control' id='height'></div></div>";

      echo "<div class='form-group'>
      <label for='weight'>Enter your weight in pounds:</label>
      <div class='col-md-2'>
      <input type='text' class='form-control' id='weight'>
      </div></div><br>";

      echo "<button type='submit' class='btn btn-secondary'>Submit</button></form><br>";
    }

    else {
      echo "Thank you for completing the checkin.";
    }
    ?>
    <p>Please confirm following information:</p>

    <form action="" method ="post">
        <div class="form-group">
            <label for="fname">First Name:</label>
            <div class="col-md-3">
            <input type="text" class="form-control" id="fname">
            </div>
        </div>
        <div class="form-group">
            <label for="lname">Last Name:</label>
            <div class="col-md-3">
            <input type="text" class="form-control" id="lname">
            </div>
        </div>
        <label for="surgery">You are scheduled for an Appendectomy at 6:00am on 1/1/2023</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="surgery" id="yes">
            <label class="form-check-label" for="yes">
              Yes
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="surgery" id="no">
            <label class="form-check-label" for="no">
              No
            </label>
          </div>
        <div class="form-group">
            <label for="height">Enter your height in inches:</label>
            <div class="col-md-2">
            <input type="text" class="form-control" id="height">
            </div>
        </div>
        <div class="form-group">
            <label for="weight">Enter your weight in pounds:</label>
            <div class="col-md-2">
            <input type="text" class="form-control" id="weight">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-secondary">Submit</button>
      </form><br>

    <div class="btn-group">
        <?php if($checkin == 0){
          echo "<a href='checkin.php' role='button' class='btn btn-danger'>Check-in</a>";
        } else {
          echo "<a href='#' role='button' class='btn btn-success'>Checked In</a>";    
        }
        ?>
        <a href="patientStatus.php" role="button" class="btn btn-primary">Patient Status</a>
        <a href="procedureInfo.php" role="button" class="btn btn-primary">Procedure Info</a>
        <a href="contacts.php" role="button" class="btn btn-primary">Contacts</a>
        <a href="logout.php" role="button" class="btn btn-light">Logout</a>
    </div>
</body>

</html>