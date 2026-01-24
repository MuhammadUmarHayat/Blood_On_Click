
<?php

    // Start the session
session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>
    Blood On Click: Logout
</h1>

    <a href="donor_registration.php">Donor Registration Form</a>
    <a href="login.php">Login  Form</a>
    <hr>
    <h3>
        You are successfully Loggedout
</h3>

</body>
</html>