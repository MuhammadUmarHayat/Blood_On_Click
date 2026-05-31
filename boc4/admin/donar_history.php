
<?php
include '../config/config.php';//include form config file

$query = "";
 $result="";
  $data="";
if(isset($_POST['search'])) //check signup button is clicked or not
{
    $data= $_POST['data'];
    
    // $query = "SELECT * FROM `users` where role='donor' and `city`='$data' or `blood_group`='$data'";

     $query = "SELECT 
    dh.donation_id,
    dh.donation_date,
    dh.units_donated,
    dh.status,
    u.name AS donor_name,
    u.email AS donor_email,
    u.contact_no,
    dd.blood_group,
    bb.bank_name,
    bb.location AS bank_location
FROM donation_history dh
JOIN donor_details dd ON dh.donor_id = dd.donor_id
JOIN users u ON dd.user_id ='$data' 
JOIN blood_banks bb ON dh.bank_id = bb.bank_id";


    $result = $con->query($query);
    
}
else if(isset($_POST['reset'])) //check signup button is clicked or not
{
    $query = "SELECT 
    dh.donation_id,
    dh.donation_date,
    dh.units_donated,
    dh.status,
    u.name AS donor_name,
    u.email AS donor_email,
    u.contact_no,
    dd.blood_group,
    bb.bank_name,
    bb.location AS bank_location
FROM donation_history dh
JOIN donor_details dd ON dh.donor_id = dd.donor_id
JOIN users u ON dd.user_id ='$data' 
JOIN blood_banks bb ON dh.bank_id = bb.bank_id";


    $result = $con->query($query);
} 
else 
{
    $query = "SELECT 
    dh.donation_id,
    dh.donation_date,
    dh.units_donated,
    dh.status,
    u.name AS donor_name,
    u.email AS donor_email,
    u.contact_no,
    dd.blood_group,
    bb.bank_name,
    bb.location AS bank_location
FROM donation_history dh
JOIN donor_details dd ON dh.donor_id = dd.donor_id
JOIN users u ON dd.user_id ='$data' 
JOIN blood_banks bb ON dh.bank_id = bb.bank_id";


    $result = $con->query($query);
}

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

    include '../includes/header.php';
    include '../includes/admin_navbar.php';
   
   ?>
    <main class="flex-grow-1">
    <div class="container mt-4">
    

     <form action="search_donor.php" method="post">
<table>

<tr> 
          
                 <td><input type="text"  id="data" name="data" placeholder="Enter donor email address"> 
            </td>
            <td>  <button type="submit" name="search" >Search</button></td>
             <td>  <button type="submit" name="reset" >Reset</button></td>
 </tr>
</table>
</form>
    <table border=1 style="margine: 1px;">
        <tr>

       

        
            <td>#</td>
            <td>Name</td>
            <td>Email</td>
            <td>Donor ID</td>
            <td>Blood Group</td>
            <td>Quantity</td>
            <td>Date</td>
            
            <td>Contact number</td>
            
            <td>Blood Bank</td>
            <td>Location</td>
            
            <td>Status</td>
            
        
</tr>
<?php
        if ($result && $result->num_rows > 0) 
    { $i=1;
         while ($donors = $result->fetch_assoc()) 
        { 
         
      

        ?>
        <tr>
        <td><?php echo $i; ?></td>
            <td><?php echo $donors['donor_name']; ?></td>
            <td><?php echo $donors['donor_email']; ?></td>
            <td><?php echo $donors['donation_id']; ?></td>
            <td><?php echo $donors['blood_group']; ?></td>
            <td><?php echo $donors['units_donated']; ?></td>
<td><?php echo $donors['donation_date']; ?></td>
            <td><?php echo $donors['contact_no']; ?></td>
            <td><?php echo $donors['bank_name']; ?></td>
            <td><?php echo $donors['bank_location']; ?></td>
            
            
            <td><?php echo $donors['status']; ?></td>
            
           
            

        </tr>
        <?php
        $i++;
}}?>

</table>
</div>
</main>
<?php
include '../includes/footer.php';//include footer
?>