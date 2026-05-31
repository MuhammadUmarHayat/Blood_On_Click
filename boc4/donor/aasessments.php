
<?php
include '../config/config.php';//include form config file
include '../session/new_session.php';
 $email = start_session();

$query = "";
 $result="";

   
    $query = "SELECT 
    u_donor.name AS donor_name,
    u_doctor.name AS doctor_name,
     u_donor.age AS donor_age,
    ma.assessment_date,
    ma.blood_group,
    ma.hemoglobin_level,
    ma.blood_pressure,
    ma.pulse,
    ma.vital_signs,
    ma.remarks
FROM medical_assessments ma
LEFT JOIN users u_donor ON ma.donor_id = u_donor.email
LEFT JOIN users u_doctor ON ma.assessed_by = u_doctor.email
WHERE  u_donor.email = '$email';
";


    $result = $con->query($query);


?>
<?php

 include '../includes/header.php';//include header
   include '../includes/donor_navbar.php';//include navbar   
   ?>
<main class="flex-grow-1">
    <div class="container mt-4">
    

     
    <table border=1 style="margine: 1px;">
        <tr>

     
        
            <td>#</td>
            <td>Donor Name</td>
            
            <td>Donor Age</td>
            <td>Doctor Name</td>
           
            <td>Date of Assessment</td>
 <td>Blood Group</td>
           
             <td>Hemoglobin Level</td>
           <td>Blood Pressure</td>
            
            <td>Pulse Rate</td>
            <td>Vital Signs</td>
            
            <td>remarks</td>
            
        
</tr>
<?php
        if ($result && $result->num_rows > 0) 
    { $i=1;
         while ($donors = $result->fetch_assoc()) 
        { 
         
      // donor_name,doctor_name, donor_age,assessment_date,
      // blood_group,hemoglobin_level,blood_pressure,pulse`, `vital_signs` ,remarks

        ?>
        <tr>
        <td><?php echo $i; ?></td>
            <td><?php echo $donors['donor_name']; ?></td>
            <td><?php echo $donors['doctor_name']; ?></td>
            <td><?php echo $donors['donor_age']; ?></td>
            <td><?php echo $donors['assessment_date']; ?></td>
            <td><?php echo $donors['blood_group']; ?></td>
<td><?php echo $donors['hemoglobin_level']; ?></td>
            <td><?php echo $donors['blood_pressure']; ?></td>
            <td><?php echo $donors['pulse']; ?></td>
            <td><?php echo $donors['vital_signs']; ?></td>
            
            
            <td><?php echo $donors['remarks']; ?></td>
            
           
            

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
