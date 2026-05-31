<?php
include 'config/config.php';//include form config file
include 'form_validation.php';
include 'db_actions.php';//include action file

if(isset($_POST['login'])) //check signup button is clicked or not
{
  $email= $_POST['email'];
   $password= $_POST['password'];
 $usertype= $_POST['usertype'];


// Start the session
session_start();

   if($usertype=="admin")
    {
        
            
    $result = isValidUser($email,$password,$usertype);
    //print_r($result);

    if ($result) 
    {
        $_SESSION["user_id"] =$email;

        header('Location:http://localhost/boc/admin/index.php');//donor main page
    }

   }
else if($usertype=="donor")
    {
        $result = isValidUser($email,$password,$usertype);
    
    
    if ($result) 
    {
        $_SESSION["user_id"] =$email;

        header('Location:http://localhost/boc/donor/index.php');//donor main page
    }

   }
   else if($usertype=="seeker")
    {
         $result = isValidUser($email,$password,$usertype);
    
   
    if ($result) 
    {
        $_SESSION["user_id"] =$email;

        header('Location:http://localhost/boc/seeker/index.php');//donor main page
    }
    }
    else if($usertype=="manager")
    {
         $result = isValidUser($email,$password,$usertype);
    if ($result) 
    {
        $_SESSION["user_id"] =$email;

        header('Location:http://localhost/boc/manager/index.php');//donor main page
    }
    }
    else
    {
        echo "enter valid email and password";
    }


    
   
}
include 'includes/header.php';//include footer
include 'includes/main_navbar.php';//include footer

?>

   <div class="container my-5">
    <div class="row justify-content-center">

        <div class="col-lg-5 col-md-7">

            <div class="card shadow-lg border-0">

                <!-- Header -->
                <div class="card-header bg-danger text-white text-center">
                    <h3 class="mb-0">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Blood On Click Login
                    </h3>
                </div>

                <!-- Body -->
                <div class="card-body p-4">

                    <form action="login.php" method="post">

                        <!-- User Type -->
                        <div class="mb-3">
                            <label class="form-label">Login As</label>
                            <select name="usertype" class="form-select" required>
                                <option value="admin">Admin</option>
                                <option value="donor">Donor</option>
                                <option value="seeker">Seeker</option>
                                <option value="manager">Blood Bank Manager</option>
                            </select>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Enter your email"
                                   required>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Enter your password"
                                   required>
                        </div>

                        <!-- Login Button -->
                        <div class="d-grid">
                            <button type="submit" name="login" class="btn btn-danger">
                                <i class="bi bi-lock-fill"></i>
                                Login
                            </button>
                        </div>

                    </form>

                </div>

                <!-- Footer -->
                <div class="card-footer text-center bg-light">
                    <small>
                        Don’t have an account?
                        <a href="#" class="text-danger fw-bold">Register here</a>
                    </small>
                </div>

            </div>

        </div>

    </div>
</div>

<?php
include 'includes/footer.php';//include footer
?>