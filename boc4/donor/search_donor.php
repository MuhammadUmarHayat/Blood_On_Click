
<?php
include '../config/config.php';//include form config file


$query = "";
 $result="";
if(isset($_POST['search'])) //check signup button is clicked or not
{
    $data= $_POST['data'];
 $query = "SELECT * FROM `users` where role='donor' and `city`='$data' or `blood_group`='$data'";

    $result = $con->query($query);
    
}
else if(isset($_POST['reset'])) //check signup button is clicked or not
{
     $query = "SELECT * FROM `users` where role='donor'";

    $result = $con->query($query);
} 
else 
{
    $query = "SELECT * FROM `users` where role='donor'";

    $result = $con->query($query);
}

//SELECT `name`, `age`, `gender`, `blood_group`, `contact_no`, `email`, 
// `password`, `city`, `donation_date`, `status`, `address` FROM `donors` 

?>
<?php


   include '../session/new_session.php';
   $email = start_session();
   
   include '../includes/header.php';//include header
   include '../includes/donor_navbar.php';//include navbar
   ?>


   
  <main class="flex-grow-1">
    <div class="container mt-4">
    
    

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
</div>
  </main>
<?php
include '../includes/footer.php';//include footer
?>