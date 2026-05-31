
<?php
include '../config/config.php';//include form config file
include '../session/new_session.php';

$query = "";
$result="";

$email = start_session();

 $query = "SELECT * FROM `users` where `email`='$email'";
 $result = $con->query($query);


 include '../includes/header.php';
    include '../includes/admin_navbar.php';
?>
  <main class="flex-grow-1">
    <div class="container mt-4">
    

     
    <table border=1 style="margin: 1px;">
        <tr>

       
    
        
            <td>#</td>
            <td>Name</td>
            <td>Age</td>
            <td>Gender</td>
            <td>Blood Group</td>
            <td>Contact number</td>
            <td>Email</td>
            <td>City</td>
            <td>Date of Donation/seeking</td>
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
                                <a href="editProfile.php?id=<?php echo $donors['email']; ?>" class="btn btn-sm btn-success">Edit</a>
                                
            </td>

        </tr>
        <?php
}}?>

</table>
</div>
  </main>
<?php
include '../includes/footer.php';//include footer
?>