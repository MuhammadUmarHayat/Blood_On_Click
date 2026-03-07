<?php
include '../config/config.php';//include form config file
$test ;
if (isset($_GET['id'])) 
{
    $id = $_GET['id'];


     $query = "delete from `donors` where `email`='$id'";
    $result=mysqli_query($con, $query);
if ($result) {
    return true;
} 
else
     {
    return false;
}
   
  
    
}

?>