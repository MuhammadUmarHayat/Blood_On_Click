
<?php
//add_assessment.php
include '../config/config.php';//include form config file
include '../form_validation.php';
include '../session/new_session.php';
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
//INSERT INTO `medical_assessments`(`donor_id`, `assessed_by`, `assessment_date`,`blood_group`, 
// `hemoglobin_level`, `blood_pressure`, `pulse`, `vital_signs`, `remarks`)
 //VALUES ('','','','','','','','')
   $assessed_by= $user;
   $donor_id= $_POST['donor_id'];
   
   $assessment_date = date("Y-m-d");
   $blood_group= $_POST['blood_group'];
   $hemoglobin_level= $_POST['hemoglobin_level'];
   $blood_pressure= $_POST['blood_pressure'];
   $pulse= $_POST['pulse'];
   $vital_signs = $_POST['vital_signs'];
   $remarks = $_POST['remarks'];
 
$query = "INSERT INTO `medical_assessments`( `donor_id`, `assessed_by`, `assessment_date`, `blood_group`, `hemoglobin_level`, `blood_pressure`, `pulse`, `vital_signs`, `remarks`)
          VALUES ('$donor_id','$assessed_by','$assessment_date','$blood_group','$hemoglobin_level','$blood_pressure','$pulse','$vital_signs','$remarks')";
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


include '../includes/header.php';
    include '../includes/admin_navbar.php';

?>


   <main class="flex-grow-1">
    <div class="container mt-4">
                <form action="add_assessment.php" method="post" onsubmit="return validateForm();">

<table >
    <tr> 
            <td> </td>
            <td> <h2>  Please fill the Donor Assessment Form </h2></td>
</tr>   
         <tr> 
            <td>  <label for="name" class="form-label">Full Donor Email:</label></td>
            <td><input type="text" class="form-control" id="donor_id" name="donor_id" placeholder="Enter donor email" required> </td>
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

            <td> <label for="hemoglobin_level" class="form-label">Hemoglobin Level:</label>
                        </td>
            <td> <input type="text" class="form-control" id="hemoglobin_level" name="hemoglobin_level" placeholder="Enter  Hemoglobin Level" required></td>
</tr>
 <tr> 
            <td>  <label for="blood_pressure" class="form-label">Blood Pressure</label>
                        </td>
            <td><input type="text" class="form-control" id="blood_pressure" name="blood_pressure" placeholder="Enter Blood Pressure" required> </td>
</tr>
     <tr> 
            <td>  <label for="pulse" class="form-label">Pulse:</label>
                        </td>
            <td><input type="text" class="form-control" id="pulse" name="pulse" placeholder="Enter Pulse rate" required> </td>
</tr>
 <tr> 
            <td><label for="vital_signs" class="form-label">Vital Signs:</label>
                         </td>
            <td> <input type="text" class="form-control" id="vital_signs" name="vital_signs" placeholder="Enter Vital signs" required></td>
</tr>
<tr> 
            <td> <label for="remarks" class="form-label">Recommendations:</label>
                        </td>
            <td>
                <textarea id="remarks" name="remarks" rows="4" cols="50" placeholder="Enter Your remmondations">

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


<?php
include '../includes/footer.php';//include footer
?>
