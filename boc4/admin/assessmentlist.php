
<?php
include '../config/config.php';//include form config file

$query = "";
 $result="";

    $query = "SELECT * FROM medical_assessments";

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
            
            <td>Donor Email</td>
            <td>Assessed_by</td>
            <td>Date</td>
            <td>Blood Group</td>
            <td> Hemoglobin Level</td>
            <td>Blood Pressure</td>
             <td>Pulse Rate</td>
             <td>Vital Signs</td>
             <td> Remarks</td>
             <td>Status</td>
             <td>Action</td>
             

            
        
</tr>
<?php
        if ($result && $result->num_rows > 0) 
    { $i=1;
         while ($row  = $result->fetch_assoc()) 
        { 
     //    `donor_id`, `assessed_by`, `assessment_date`, `blood_group`, 
   // `hemoglobin_level`, `blood_pressure`, `pulse`, `vital_signs`, `remarks`
        ?>
        <tr>
         <td><?php echo $i; ?></td>
            <td><?php echo $row['donor_id']; ?></td>
            <td><?php echo $row['assessed_by']; ?></td>
             <td><?php echo $row['assessment_date']; ?></td>
            <td><?php echo $row['blood_group']; ?></td>
             <td><?php echo $row['hemoglobin_level']; ?></td>
             <td><?php echo $row['blood_pressure']; ?></td>
             <td><?php echo $row['pulse']; ?></td>
             <td><?php echo $row['vital_signs']; ?></td>
             <td><?php echo $row['remarks']; ?></td>
             <td><?php echo $row['status']; ?></td>
             <td> 
            <a href="approved_assessment.php?id=<?php echo $row['assessment_id']; ?>" class="btn btn-sm btn-success">Approve</a>
            <a href="reject_assessment.php?id=<?php echo $row['assessment_id']; ?>" class="btn btn-sm btn-danger">Reject</a>
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