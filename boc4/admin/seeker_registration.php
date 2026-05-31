<?php
include '../config/config.php';//include form config file
include '../form_validation.php';
include '../db_actions.php';//include action file
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
   $password= $_POST['password'];
   $city = $_POST['city'];
   $donation_date = NULL; //date("Y-m-d");
   $status = "active";
   $role = "seeker";
   $address = $_POST['address'];

$saveData=SaveSeekerPersonalInfo($name,$age,$gender,$blood_group,$contact_no,$email,$password,$city,$donation_date,$status,$role,$address);
    
     if($saveData)
         {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Record is saved successfully.
                <button type="button"  class="close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
         }
         else
      {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> There was a problem. Please try again.
            <button type="button"  class="close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      
      }


    }




}

include '../includes/header.php';//include footer

include '../includes/admin_navbar.php';


?>
<main>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3>
                        <i class="bi bi-search-heart-fill"></i>
                        Blood Seeker Registration
                    </h3>
                </div>

                <div class="card-body">

                    <form action="seeker_registration.php" method="post">

                        <div class="row">

                            <!-- Full Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control"
                                       placeholder="Enter Full Name" required>
                            </div>

                            <!-- Age -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Age</label>
                                <input type="number" name="age" class="form-control"
                                       min="1" max="100" placeholder="Enter Age" required>
                            </div>

                            <!-- Gender -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <!-- Blood Group -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Blood Group Needed</label>
                                <select name="blood_group" class="form-select">
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                </select>
                            </div>

                            <!-- Contact -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact No</label>
                                <input type="text" name="contact_no" class="form-control"
                                       placeholder="03XXXXXXXXX" required>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                       placeholder="Enter Email" required>
                            </div>

                            <!-- Password -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control"
                                       placeholder="Enter Password" required>
                            </div>

                            <!-- City -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control"
                                       placeholder="Enter City" required>
                            </div>

                            <!-- Address -->
                            <div class="col-12 mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="3"
                                          placeholder="Enter Full Address" required></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 text-center">
                                <button type="submit" name="signup" class="btn btn-primary px-5">
                                    <i class="bi bi-send-fill"></i>
                                    Register as Seeker
                                </button>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
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