<?php
include 'config/config.php';//include form config file
include 'form_validation.php';
if(isset($_POST['login'])) //check signup button is clicked or not
{
   $email= $_POST['email'];
   $password= $_POST['password'];
   $usertype= $_POST['usertype'];


// Start the session
session_start();

   if($usertype=="admin")
    {
        if($email=="admin123@gmail.com" && $password=="admin@123")
            {
                $_SESSION["user_id"] =$email;

             header('Location:http://localhost/boc/admin/index.php');//admin main page

        }

   }
else if($usertype=="donor")
    {
        $query = "SELECT * FROM `donors` WHERE email='$email' and password='$password'";
    
    $result = $con->query($query);
    if ($result && $result->num_rows > 0) 
    {
        $_SESSION["user_id"] =$email;

        header('Location:http://localhost/boc/donor/index.php');//donor main page
    }

   }
   else if($usertype=="seeker")
    {
    }
    else{
        echo "enter valid email and password";
    }


    
   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood On Click | Login</title>
      <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
    <h1>Donor Registration page</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="donor_registration.php">Donor Registration Form</a>
    <a href="login.php">Login  Form</a>
</nav>
    <hr>
    <div class="container" style="height:800px">
   <main class="content" >


     <form action="login.php" method="post">
    <table >
       <td colspan="2" style="text-align:center; font-size:22px;">
        
        <h2>
            Login Form
</h2>
    </td>
         <tr> 
            <td>User Type </td>
            <td> 
             <select name="usertype" id="usertype">
  <option value="admin">Admin</option>
  <option value="donor">Donor</option>
  <option value="seeker">Seeker</option>
  
  
</select>
</td>
            
         </tr>
<tr> 
            <td> <label for="email" class="form-label">Email:</label></td>
            <td><input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required> </td>
 </tr>
 <tr> 
            <td><label for="Password" class="form-label">Password:</label> </td>
            <td><input type="password" class="form-control" id="password" name="password" placeholder="Enter contact number" required> </td>
 </tr>
<tr> 
            <td> </td>
            <td>  <button type="submit" name="login" >Login</button></td>
 </tr>
</table>
</form>
</main>
</body>
</html>

                        
 <br>                       
                       
                        
<br>