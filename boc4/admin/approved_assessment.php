<?php
include '../config/config.php';//include form config file
$assessment_id= $_GET['id'];
$query="UPDATE `medical_assessments` SET `status`='approved' WHERE assessment_id='$assessment_id'";
$result1 = mysqli_query($con, $query);

      
         header('Location:http://localhost/boc/admin/index.php');//admin main page
    
?>