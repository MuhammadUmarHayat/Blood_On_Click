
<?php
include '../config/config.php';//include form config file

$query = "";
 $result="";
if(isset($_POST['search'])) //check signup button is clicked or not
{
    $data= $_POST['data'];
 $query = "SELECT * FROM `donors` where `city`='$data' or `blood_group`='$data'";

    $result = $con->query($query);
    
}
else if(isset($_POST['reset'])) //check signup button is clicked or not
{
     $query = "SELECT * FROM `donors` ";

    $result = $con->query($query);
} 
else 
{
    $query = "SELECT * FROM `donors` ";

    $result = $con->query($query);
}

//SELECT `name`, `age`, `gender`, `blood_group`, `contact_no`, `email`, 
// `password`, `city`, `donation_date`, `status`, `address` FROM `donors` 

?>
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
    <title>Search Donor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

 <header>
    <h1>Donor Dashboard</h1>
</header>

<nav>
    <a href="search_donor.php">Search Donor</a>
    <a href="http://localhost/boc/logout.php">Logout</a>
</nav>
   
  <div class="container" style="height:800px">
   <main class="content">
    

     <form action="search_donor.php" method="post">
<table>

<tr> 
            <td> 
                 <td><input type="text"  id="data" name="data" placeholder="Enter city or blood group"> 
            </td>
            <td>  <button type="submit" name="search" >Search</button></td>
             <td>  <button type="submit" name="reset" >Reset</button></td>
 </tr>
</table>
</form>
    <table border=1>
        <tr>

       
    
        
            <td>#</td>
            <td>Name</td>
            <td>Age</td>
            <td>Gender</td>
            <td>Blood Group</td>
            <td>Contact number</td>
            <td>Email</td>
            <td>City</td>
            <td>Date of Donation</td>
            <td>Address</td>
            <td>Status</td>
            
        
</tr>
<?php
        if ($result && $result->num_rows > 0) 
    {  while ($donors = $result->fetch_assoc()) 
        { 
         
        ?>
        <tr>
         <td>#</td>
            <td><?php echo $donors['name']; ?></td>
            <td><?php echo $donors['age']; ?></td>
            <td><?php echo $donors['gender']; ?></td>
            <td><?php echo $donors['blood_group']; ?></td>
            <td><?php echo $donors['contact_no']; ?></td>
            <td><?php echo $donors['email']; ?></td>
            <td><?php echo $donors['city']; ?></td>
            <td><?php echo $donors['donation_date']; ?></td>
            <td><?php echo $donors['status']; ?></td>
            <td><?php echo $donors['address']; ?></td>
           
            

        </tr>
        <?php
}}?>

</table>
</main>
</body>
</html>