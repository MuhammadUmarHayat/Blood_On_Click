
<?php
//add_assessment.php
include '../config/config.php';//include form config file
include '../form_validation.php';
include '../session/new_session.php';
$user = start_session();
if(isset($_POST['save'])) //check signup button is clicked or not
{
    // $user = start_session();
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

//INSERT INTO `blood_requests`(`seeker_id`, `bank_id`, `blood_group`, `units_needed`, `request_date`, `status`) 
// VALUES ('','','','','','')
 
   $seeker_id= $user;
   $bank_id= $_POST['bank_id'];
   $blood_group= $_POST['blood_group'];
   $units_needed= $_POST['units_needed'];
   $request_date = date("Y-m-d");
  
   $status = "pending";
 


$query = "INSERT INTO `blood_requests`(`seeker_id`, `bank_id`, `blood_group`, `units_needed`, `request_date`, `status`) 
          VALUES ('$seeker_id','$bank_id','$blood_group','$units_needed','$request_date','$status')";
    $result1 = mysqli_query($con, $query);
if ($result1) 
    {
       
       echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong>  Details has been added successfully and submitted to Admin and Blood Bank.
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


 include '../includes/header.php';
    include '../includes/seeker_navbar.php';
   
   ?>
   


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<style>

.blood-option{
    border:1px solid #ddd;
    border-radius:10px;
    padding:10px;
    margin:5px;
    cursor:pointer;
    transition:0.3s;
}

.blood-option:hover{
    transform:scale(1.05);
    background:#f8f9fa;
}

.blood-icon{
    font-size:25px;
    margin-right:10px;
}

.aplus{ color:red; }
.aminus{ color:#b30000; }

.bplus{ color:blue; }
.bminus{ color:darkblue; }

.abplus{ color:purple; }
.abminus{ color:indigo; }

.oplus{ color:green; }
.ominus{ color:darkgreen; }

</style>


    
   <main class="flex-grow-1">
    <div class="container mt-4">
                <form action="add_request.php" method="post" onsubmit="return validateForm();">

<table >
    <tr> 
            <td> </td>
            <td> <h2>  Please fill the Blood Request Form </h2></td>
</tr>   
         <tr> 
            <td>  <label for="name" class="form-label">Choose the Nearest Blood Bank</label></td>
            <td>
                   <select name="bank_id">
    <option disabled selected>-- Select Blood Bank--</option>
    <?php
	//mysqli_query($con,$q1);
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT bank_id,bank_name From blood_banks");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['bank_id'] ."'>" .$data['bank_name'] ."</option>";  // displaying data in option menu
        }	
    ?>  

  </select>

             </td>
</tr>
<tr> 
  <td>
        <label class="form-label">Select Blood Group</label>
    </td>
 <td>
    <div class="container mt-2" style="height:auto">

<div class="row">

<div class="col-md-3">
<label class="blood-option d-flex align-items-center">
<input type="radio" name="blood_group" value="A+" hidden>
<i class="fa-solid fa-droplet blood-icon aplus"></i>
A+
</label>
</div>

<div class="col-md-3">
<label class="blood-option d-flex align-items-center">
<input type="radio" name="blood_group" value="A-" hidden>
<i class="fa-solid fa-droplet blood-icon aminus"></i>
A-
</label>
</div>

<div class="col-md-3">
<label class="blood-option d-flex align-items-center">
<input type="radio" name="blood_group" value="B+" hidden>
<i class="fa-solid fa-droplet blood-icon bplus"></i>
B+
</label>
</div>

<div class="col-md-3">
<label class="blood-option d-flex align-items-center">
<input type="radio" name="blood_group" value="B-" hidden>
<i class="fa-solid fa-droplet blood-icon bminus"></i>
B-
</label>
</div>

<div class="col-md-3">
<label class="blood-option d-flex align-items-center">
<input type="radio" name="blood_group" value="AB+" hidden>
<i class="fa-solid fa-droplet blood-icon abplus"></i>
AB+
</label>
</div>

<div class="col-md-3">
<label class="blood-option d-flex align-items-center">
<input type="radio" name="blood_group" value="AB-" hidden>
<i class="fa-solid fa-droplet blood-icon abminus"></i>
AB-
</label>
</div>

<div class="col-md-3">
<label class="blood-option d-flex align-items-center">
<input type="radio" name="blood_group" value="O+" hidden>
<i class="fa-solid fa-droplet blood-icon oplus"></i>
O+
</label>
</div>

<div class="col-md-3">
<label class="blood-option d-flex align-items-center">
<input type="radio" name="blood_group" value="O-" hidden>
<i class="fa-solid fa-droplet blood-icon ominus"></i>
O-
</label>
</div>

</div>

</div>
</td>       
</tr>
 
 <tr> 

            <td> <label for="hemoglobin_level" class="form-label">Units Required:</label>
                        </td>
            <td>
                 <input type="number" class="form-control" id="units_needed" name="units_needed" placeholder="Enter  Hemoglobin Level" required>
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
