<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h4>Hello ksanger,</h4>

    <div class="container-fluid">
        <div class="btn-group-vertical opacity-25" role="group" aria-label="Basic example">
            <button type="button" id="prep" class="btn btn-danger">Preparing for Surgery</button>
            <button type="button" id="surgery" class="btn btn-warning">In Surgery</button>
            <button type="button" id="recovery" class="btn btn-primary">Recovering</button>
            <button type="button" id="checkout" class="btn btn-success">Ready to checkout</button>
          </div>
    </div>
    <div id="nextAction">
        <p>Kyle is scheduled for a consultation with Dr. Susan I. Toth, MD at 8am on 1/1/2023</p>
    </div>
    <div class="btn-group">
        <a href="checkin.php" role="button" class="btn btn-danger">Check-in</a>
        <a href="patientStatus.php" role="button" class="btn btn-primary">Patient Status</a>
        <a href="procedureInfo.php" role="button" class="btn btn-primary">Procedure Info</a>
        <a href="contacts.php" role="button" class="btn btn-primary">Contacts</a>
    </div>
</body>

</html>