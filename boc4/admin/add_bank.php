<?php
include '../config/config.php';//include form config file
include '../form_validation.php';
include '../session/new_session.php';

if(isset($_POST['save'])) //check signup button is clicked or not
{
    $email = start_session();

 $data = $_POST;
//var_dump($data);
//print_r($data);

    if(isNull($data))
    {
      die("Data is null");
    }
    else
    {

    if (!empty($_FILES["image"]["name"])) 
    {
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) 
        {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

//INSERT INTO `blood_banks`( `user_id`, `bank_name`, `license_no`, `location`,`photo`) VALUES ('a','b','c','d')
   $user_id= $_POST['user_id'];
   $bank_name= $_POST['bank_name'];
   $license_no = $_POST['license_no'];
   $location= $_POST['location'];
   


$query = "INSERT INTO `blood_banks`( `user_id`, `bank_name`, `license_no`, `location`,`photo`) VALUES ('$user_id','$bank_name','$license_no','$location','$imgContent')";
    $result1 = mysqli_query($con, $query);
if ($result1) 
    {
       
      
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong>  Details has been added successfully
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
    }
    }


 include '../includes/header.php';
    include '../includes/admin_navbar.php';

?>

    <main class="flex-grow-1">
    <div class="container mt-4">
                <form action="add_bank.php" method="post" onsubmit="return validateForm();" enctype="multipart/form-data">

<table >
    <tr> 
            <td> </td>
            <td> <h2>  Please fill the form </h2></td>
</tr> 
         <tr> 
            <td>  <label for="bank_name" class="form-label">Full Bank Name:</label></td>
            <td><input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Your Full Bank Name" required> </td>
</tr>

<tr>
    <td>  <label for="user_id" class="form-label">Choose Bank Manager</label></td>
      <td> 
            <select name="user_id">
    <option disabled selected>-- Select Manager--</option>
    <?php
	//mysqli_query($con,$q1);
    include '../config/config.php';//include form config file
        $records = mysqli_query($con, "SELECT * FROM `users` WHERE role='manager'");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['email'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
</td>
</tr>

 <tr> 

            <td> <label for="license_no" class="form-label">License No:</label>
                        </td>
            <td> <input type="text" class="form-control" id="license_no" name="license_no" placeholder="Enter your Age" required></td>
</tr>
 
                       
 <tr> 
            <td>
            <label for="image" class="form-label">Upload Bank Front picture:</label>    
           

                       </td>
            <td>  <input type="file" class="form-control" id="image" name="image" >
            <div class="form-text">Supported formats: JPG, PNG, JPEG, GIF</div>
  
 </td>
</tr>
 <tr> 

            <td> <label for="location" class="form-label">Address:</label>
                        </td>
            <td> <input type="text" class="form-control" id="location" name="location" placeholder="Enter complete address " required></td>
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


<?php
include '../includes/footer.php';//include footer
?>
