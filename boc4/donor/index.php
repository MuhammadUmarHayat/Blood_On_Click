 <?php

include '../session/new_session.php';
   $email = start_session();
  
   
   include '../includes/header.php';//include header
   include '../includes/donor_navbar.php';//include navbar
   ?>


   
  <main class="flex-grow-1">
    <div class="container mt-4">
    
   <h2>
    Wellcome <?php echo($email)?>
</h2>

</div>
  </main>
<?php
include '../includes/footer.php';//include footer
?>