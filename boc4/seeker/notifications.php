 <?php
 include '../config/config.php';//include form config file
include '../session/new_session.php';
   $email = start_session();
  
   
   include '../includes/header.php';//include header
   include '../includes/seeker_navbar.php';//include navbar

 

 $query2 = "SELECT 
    b.bank_id, 
    b.user_id, 
    b.bank_name, 
    b.license_no, 
    b.location,
    r.request_id,
    r.seeker_id,
    r.blood_group,
    r.units_needed,
    r.request_date,
    r.Remarks,
    r.status
FROM 
    `blood_banks` b
JOIN 
    `blood_requests` r ON b.bank_id = r.bank_id
WHERE 
    r.seeker_id = '$email';
";
 $notifications = $con->query($query2);

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
            <td>Bank Name</td>
            <td>Blood Group</td>
            <td>Location</td>
            <td>Quantity</td>
           
            <td>Remarks </td>
            <td>Status </td>
            
        
</tr>
<?php
$i=1;
        if ($notifications && $notifications->num_rows > 0) 
    {  while ($rows = $notifications->fetch_assoc()) 
        { 
          //bank_name,location,blood_group,units_needed,Remarks,status
        ?>
        <tr>
         <td><?php echo $i; ?> </td>
            <td><?php echo $rows['bank_name']; ?></td>
             <td><?php echo $rows['blood_group']; ?></td>
              <td><?php echo $rows['location']; ?></td>
               <td><?php echo $rows['units_needed']; ?></td>
               <td><?php echo $rows['Remarks']; ?></td>
               <td><?php echo $rows['status']; ?></td>
            
           
           
            

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
                 <a href="sendMsgToDonor.php?id=<?php echo $rows['sendFrom']; ?>" class="btn btn-sm btn-success">Send Message</a>
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