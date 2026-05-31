
<?php
include '../config/config.php';//include form config file

$query = "";
 $result="";

    $query = "SELECT * FROM blood_banks";

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
   
   include '../includes/header.php';
    include '../includes/admin_navbar.php';
   ?>
    <main class="flex-grow-1">
    <div class="container mt-4">
  
<h2>Wellcome <?php echo($email)?></h2>

    <table border=1>
        <tr>

       
    
        
            <td>#</td>
            <td>Bank Name</td>
            <td>Manager Email</td>
            <td>License Number</td>
            <td>Address</td>
            <td>Picture</td>
            
        
</tr>
<?php
        if ($result && $result->num_rows > 0) 
    { $i=1;
         while ($row  = $result->fetch_assoc()) 
        { 
         
        ?>
        <tr>
         <td><?php echo $i; ?></td>
            <td><?php echo $row['bank_name']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
             <td><?php echo $row['license_no']; ?></td>
            <td><?php echo $row['location']; ?></td>
             <td>
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=50px; height=50px; />
             </td>
            
           
           
            

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