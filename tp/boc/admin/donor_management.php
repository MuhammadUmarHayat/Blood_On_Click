
<?php
include '../config/config.php';//include form config file

$query = "";
 $result="";

    $query = "SELECT * FROM `donors` ";

    $result = $con->query($query);


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
</head>
<body>

 <h1 >Wellcome <?php echo($email)?></h1>
    <a href="index.php">Home</a>
    <a href="search_donor.php">Search Donor</a>
    <a href="http://localhost/boc/logout.php">Logout</a>
    <hr>

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
             
            <td>Action</td>
        
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
            
            <td><?php echo $donors['address']; ?></td>
            <td><?php echo $donors['status']; ?></td>
            <td>
                                <a href="editDonor.php?id=<?php echo $donors['email']; ?>" class="btn btn-sm btn-success">Edit</a>
                                <a href="deleteDonor.php?id=<?php echo $donors['email']; ?>" class="btn btn-sm btn-danger">Remove</a>
            </td>
           
            

        </tr>
        <?php
}}?>

</table>
</body>
</html>