
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
     <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
    <h1>Logout</h1>
</header>
  <nav>
    <a href="index.php">Home</a>
    <a href="donor_registration.php">Donor Registration Form</a>
    <a href="login.php">Login  Form</a>
</nav>
    <hr>
    <div class="container" style="height:800px">
   <main class="content">
    <h2>
        You are successfully Loggedout
</h2>
</main>
</body>
</html>