 <?php
 include '../config/config.php';//include form config file
include '../session/new_session.php';
   $email = start_session();
  
   
   include '../includes/header.php';//include header
   include '../includes/seeker_navbar.php';//include navbar

 

 //$query2 = "SELECT * FROM `medical_assessments` WHERE  `donor_id` = '$email'";

  $query2 = "SELECT 
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
WHERE u_donor.email = '$email'";


   
 $notifications = $con->query($query2);
//////////////////////////////////////////

 $query = "SELECT * FROM `messages` where `sendTo`='$email'";
 $messages = $con->query($query);
//bank_name,location,blood_group,units_needed,Remarks,status
   ?>


   
  <main class="flex-grow-1">
    <div class="container mt-4">
<div>
<h2>Notifications</h2>
</div>
<div>
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
        if ($notifications && $notifications->num_rows > 0) 
    { $i=1;
         while ($donors = $notifications->fetch_assoc()) 
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
   <div>
    <h2>Messages</h2>
    <div>
<table border=1 style="margine: 1px;">
        <tr>

      
    
        
            <td></td>
            <td>To </td>
            <td>From</td>
            <td>Message</td>
            <td>Date</td>
           
            <td> </td>
            
            
        
</tr>
<?php
$i=1;
        if ($messages && $messages->num_rows > 0) 
    {  while ($rows = $messages->fetch_assoc()) 
        { 
          ////sendTo,sendFrom, Message, dates
        ?>
        <tr>
          <td> </td>
            <td><?php echo $rows['sendTo']; ?></td>
             <td><?php echo $rows['sendFrom']; ?></td>
              <td><?php echo $rows['Message']; ?></td>
               <td><?php echo $rows['dates']; ?></td>
            
               <td> 
                 <a href="sendMsgToSeeker.php?id=<?php echo $rows['sendFrom']; ?>" class="btn btn-sm btn-success">Send Message</a>
               </td>
            
           
           
            

        </tr>
        <?php
        $i++;
}}?>

</table>


</div>

</div>
  
    
   
</div>
  </main>
<?php
include '../includes/footer.php';//include footer
?>