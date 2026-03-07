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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
   <header>
    <h1>Admin Panel</h1>
</header>

    
   <nav>
     <a href="donor_registration.php">Add Donor </a>
    <a href="donor_management.php">Donor Management</a>
    <a href="search_donor.php">Search Donor</a>
    <a href="http://localhost/boc/logout.php">Logout</a>
</nav>
    <div class="container" style="height:800px">
   <main class="content">
    <h2>
      Wellcome <?php echo($email)?>
</h2>


</body>
</html>