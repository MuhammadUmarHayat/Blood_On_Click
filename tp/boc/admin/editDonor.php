<?php
include '../config/config.php';//include form config file
include '../form_validation.php';
if (isset($_GET['id'])) 
{
 $email = $_GET['id'];
 $query = "SELECT * FROM `donors` where `email`='$email'";

    $result = $con->query($query);

 if ($result && $result->num_rows > 0) 
                        
    {
        $row = $result->fetch_assoc();
    }
}


if(isset($_POST['signup'])) //check signup button is clicked or not
{
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
   
   $name= $_POST['name'];
   $age= $_POST['age'];
   $gender = $_POST['gender'];
   $blood_group= $_POST['blood_group'];
   $contact_no= $_POST['contact_no'];
   $email= $_POST['email'];
   
   $city = $_POST['city'];
   $donation_date =  date("Y-m-d");
   $status = "active";
   $address = $_POST['address'];

   $query = "UPDATE `donors` 
SET 
    `name` = '$name',
    `age` = '$age',
    `gender` = '$gender',
    `blood_group` = '$blood_group',
    `contact_no` = '$contact_no',
    `email` = '$email',
    `password` = '$password',
    `city` = '$city',
    `donation_date` = '$donation_date',
    `status` = '$status',
    `address` = '$address'
WHERE `email` = '$email'";



    
    $result1 = mysqli_query($con, $query);
if ($result1) 
    {
        echo "Record has been updated successfully";
         header('Location:http://localhost/boc/admin/index.php');//admin main page
    } else 
    {
        echo "something went wrong please try later";
    }


    }




}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration page</title>
</head>
<body>
    <h1>
        Donor Registration page
</h1>
<a href="donor_registration.php">Donor Registration Form</a>
    <a href="login.php">Login  Form</a>
<hr>
    <div >
                <form action="editDonor.php" method="post" onsubmit="return validateForm();">

<table >
    <tr> 
            <td> </td>
            <td> <h2>  Please fill the form </h2></td>

            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
</tr> 
         <tr> 
            <td>  <label for="name" class="form-label">Full Name:</label></td>
            <td><input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Full name" value="<?php echo $row['name']; ?>" required> </td>
</tr>
 <tr> 

            <td> <label for="age" class="form-label">Age:</label>
                        </td>
            <td> <input type="integer" class="form-control" id="age" name="age" placeholder="Enter your Age" value="<?php echo $row['age']; ?>" required></td>
</tr>
 <tr> 
            <td><label for="gender" class="form-label">Gender:</label>

                       </td>
            <td> <select name="gender" id="gender">
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="other">Others</option>
  
</select> </td>
</tr>
 <tr> 
            <td><label for="blood_group" class="form-label">Blood Group:</label>
                        
                         </td>
            <td><select name="blood_group" id="blood_group">
                         <option value="A+">A+</option>
                         <option value="A−">A−</option>
                         <option value="B+">B+</option>
                         <option value="B−">B−</option>
                         <option value="AB+">AB+</option>
                         <option value="AB−">AB−</option>
                         <option value="O+">O+</option>
                         <option value="O-">O-</option>

  
                        </select> </td>
</tr>
 <tr> 
            <td>  <label for="cn" class="form-label">Contact No:</label>
                        </td>
            <td><input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter contact number" value="<?php echo $row['contact_no']; ?>" required> </td>
</tr>
     <tr> 
            <td>  <label for="email" class="form-label">Email:</label>
                        </td>
           
</tr>
 
<tr> 
            <td> <label for="city" class="form-label">City:</label>
                        </td>
            <td><input type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']; ?>"  placeholder="Enter city" required> </td>
</tr>
 <tr> 
            <td> <label for="address" class="form-label">Address:</label>
                         </td>
            <td> <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>" placeholder="Enter Address" required></td>
</tr>
 <tr> 
            <td> </td>
            <td><button type="submit" name="signup" >Save Changes</button> </td>
</tr> 
<tr> 
            <td> </td>
            <td> </td>
</tr> 
           

</table>
                        

 

    </div>

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


</body>
</html>
