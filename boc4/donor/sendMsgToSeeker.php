
<?php
//add_assessment.php
include '../config/config.php';//include form config file
include '../form_validation.php';
include '../session/new_session.php';
if(isset($_GET['id']))
{
$sendTo = $_GET['id'];
}

if(isset($_POST['save'])) //check signup button is clicked or not
{
   
     $user = start_session();
// echo("form is validated");
 $data = $_POST;
//var_dump($data);
//print_r($data);

    if(isNull($data))
    {
      die("Data is null");
    }
    else
    {
//INSERT INTO `messages`(`sendTo`, `sendFrom`, `Message`, `dates`)
//  VALUES ('','','','')
   $sendFrom= $user;
   $sendTo= $_POST['sendTo'];
   
   $dates = date("Y-m-d");
   $Message= $_POST['Message'];
   
 


$query = "INSERT INTO `messages`(`sendTo`, `sendFrom`, `Message`, `dates`)
          VALUES ('$sendTo','$sendFrom','$Message','$dates')";
    $result1 = mysqli_query($con, $query);
if ($result1) 
    {
       
       echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong>  Message has been added successfully
                <button type="button"  class="close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    } else 
    {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 <strong>Error!</strong> Something went wrong, please try later.
 <button type="button"  class="close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }


    }




}



include '../includes/header.php';//include header
   include '../includes/donor_navbar.php';//include navbar   
?>

    <main class="flex-grow-1">
    <div class="container mt-4">
                <form action="sendMsgToSeeker.php" method="post" onsubmit="return validateForm();">

<table >
    <tr> 
            <td><input type="hidden" name="sendTo" value="<?php echo $sendTo; ?>"> </td>
            <td> <h2>  Please Send The Message </h2></td>
</tr>   
         
 <tr>
    <td> </td>
    <td> 
                <textarea id="Message" name="Message" rows="6" cols="50" placeholder="Enter Your Message">

</textarea>
            </td>
</tr>
 
 <tr> 
            <td> </td>
            <td><button type="submit" name="save" class="btn btn-success">Save</button> </td>
</tr> 
<tr> 
            <td> </td>
            <td> </td>
</tr> 
           

</table>
                        

 

    </div>
</main>
<script>
function validateForm() 
{

    // Get values
    let name = document.getElementById("name").value.trim();
    let age = document.getElementById("age").value.trim();
    let contact = document.getElementById("contact_no").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let city = document.getElementById("city").value.trim();

    // 1. Empty field check
    if (name === "" || age === "" || contact === "" || email === "" || password === "" || city === "") {
        alert("All fields are required!");
        return false;
    }

    // 2. Age validation
    if (isNaN(age) || age <= 0 || age > 65) {
        alert("Please enter a valid age (1–65).");
        return false;
    }

    // 3. Contact number validation (10–15 digits)
    let contactPattern = /^[0-9]{10,15}$/;
    if (!contactPattern.test(contact)) {
        alert("Please enter a valid contact number (10–15 digits).");
        return false;
    }

    // 4. Email validation
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // 5. Password validation
    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    // If everything is OK
    return true;
}
</script>

</div>
  </main>
<?php
include '../includes/footer.php';//include footer
?>