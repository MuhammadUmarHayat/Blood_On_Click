 <?php

function start_session()
{
    session_start();
// Check if the user is logged in
if (!isset($_SESSION["user_id"])) 
{
   // header("Location: login.php");
   header("Location:http://localhost/boc/logout.php");

    exit();
}
else
{
    $email = $_SESSION["user_id"];
    return $email;
}
}

   $email = start_session();
   
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Dashboard</title>
</head>
<body>
    <h1 >Wellcome <?php echo($email)?></h1>
    <a href="search_donor.php">Search Donor</a>
    <a href="http://localhost/boc/logout.php">Logout</a>
    <hr>
   


</body>
</html>