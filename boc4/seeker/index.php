
<?php
include '../config/config.php';//include form config file

$query = "";
 $result="";
if(isset($_POST['search'])) //check signup button is clicked or not
{
    $data= $_POST['data'];
    
    $query = "SELECT  b.bank_name,b.location,s.group AS blood_group,SUM(s.qty) AS total_quantity
FROM 
    `blood_banks` b
JOIN 
    `blood_stocks` s ON b.bank_id = s.bank_id
WHERE 
    b.location = '$data' 
    OR s.group = '$data'
GROUP BY 
    b.bank_name, 
    b.location,
    s.group
ORDER BY 
    b.bank_name, 
    s.group;

    ";

    $result = $con->query($query);
    
}
else if(isset($_POST['reset'])) //check signup button is clicked or not
{
     $query = "SELECT 
    b.bank_name,
    s.group AS blood_group,b.location,
    SUM(s.qty) AS total_quantity
FROM 
    `blood_banks` b
JOIN 
    `blood_stocks` s ON b.bank_id = s.bank_id
GROUP BY 
    b.bank_name, 
    s.group
ORDER BY 
    b.bank_name, 
    s.group";


    $result = $con->query($query);
} 
else 
{
    $query = "SELECT 
    b.bank_name,
    s.group AS blood_group,b.location,
    SUM(s.qty) AS total_quantity
FROM 
    `blood_banks` b
JOIN 
    `blood_stocks` s ON b.bank_id = s.bank_id
GROUP BY 
    b.bank_name, 
    s.group
ORDER BY 
    b.bank_name, 
    s.group";

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
    include '../includes/seeker_navbar.php';
   
   ?>
    <main class="flex-grow-1">
    <div class="container mt-4">
    

     <form action="index.php" method="post">
<table>

<tr> 
          
                 <td><input type="text"  id="data" name="data" placeholder="Enter city or blood group"> 
            </td>
            <td>  <button type="submit" name="search" >Search</button></td>
             <td>  <button type="submit" name="reset" >Reset</button></td>
 </tr>
</table>
</form>
    <table border=1 style="margine: 1px;">
        <tr>

       
    
        
            <td>#</td>
            <td>Bank Name</td>
            <td>Blood Group</td>
            <td>Location</td>
            <td>Quantity</td>
           
            <td> </td>
            
        
</tr>
<?php
$i=1;
        if ($result && $result->num_rows > 0) 
    {  while ($rows = $result->fetch_assoc()) 
        { 
         
        ?>
        <tr>
         <td><?php echo $i; ?> </td>
            <td><?php echo $rows['bank_name']; ?></td>
             <td><?php echo $rows['blood_group']; ?></td>
              <td><?php echo $rows['location']; ?></td>
               <td><?php echo $rows['total_quantity']; ?></td>
               <td> <a href="add_request.php" class="btn btn-sm btn-success">Send Request</a> </td>
            
           
           
            

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