
<?php
include '../config/config.php';//include form config file

//$query = "";
 $result="";

    if(isset($_POST['alldonors'])) //check button is clicked or not
{
    $data= $_POST['data'];
    //search by email or name of the user
 $query = "SELECT * FROM `users` where role='donor'";

$result = $con->query($query);
    
}
else  if(isset($_POST['allseekers'])) //check signup button is clicked or not
{
    $data= $_POST['data'];
    //search by email or name of the user
$query = "SELECT * FROM `users` where role='seeker'";

    $result = $con->query($query);
    
}
else  if(isset($_POST['seeker'])) //check signup button is clicked or not
{
    $data= $_POST['data'];
    //search by email or name of the user
 $query = "SELECT * FROM `users` where  email='$data' or name='$data'and role='seeker'";

    $result = $con->query($query);
    
}
else  if(isset($_POST['donor'])) //check signup button is clicked or not
{
    $data= $_POST['data'];
    //search by email or name of the user
 $query = "SELECT * FROM `users` where email='$data' or name='$data'and role='donor'";

    $result = $con->query($query);
    
}
else  if(isset($_POST['allmanager'])) //check signup button is clicked or not
{
    $data= $_POST['data'];
    //search by email or name of the user
 $query = "SELECT * FROM `users` where role='manager'";

    $result = $con->query($query);
    
}
else  if(isset($_POST['manager'])) //check signup button is clicked or not
{
    $data= $_POST['data'];
    //search by email or name of the user
  $query = "SELECT * FROM `users` where email='$data' or name='$data'and role='manager'";

    $result = $con->query($query);
    
}
else if(isset($_POST['search'])) //check signup button is clicked or not
{
    $data= $_POST['data'];
    //search by email or name of the user
 $query = "SELECT * FROM `users` where role<> 'admin' and email='$data' or name='$data'";

    $result = $con->query($query);
    
}
else if(isset($_POST['reset'])) //check signup button is clicked or not
{
    $query = "SELECT * FROM `users` where role<> 'admin' ";

    $result = $con->query($query);
} 
else 
{
    $query = "SELECT * FROM `users` where role<> 'admin' ";

    $result = $con->query($query);
}
?>
<?php

function start_session()
{
    session_start();
// Check if the user is logged in
if (!isset($_SESSION["user_id"])) 
{
   // header("Location: login.php");
   header("Location:http://localhost/boc/logout.php");

    exit();
}
else
{
    $email = $_SESSION["user_id"];
    return $email;
}
}

   $email = start_session();

    include '../includes/header.php';
    include '../includes/admin_navbar.php';
   ?>
<main class="flex-grow-1">
    <div class="container mt-4">

    <!-- Welcome Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-danger">
            Welcome <?php echo $email; ?>
        </h3>
    </div>

    <!-- Search + Filters Card -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form action="userlist.php" method="post">

                <div class="row g-2 align-items-center">

                    <!-- Search Box -->
                    <div class="col-md-3">
                        <input type="text"
                               name="data"
                               class="form-control"
                               placeholder="Search by name or email">
                    </div>

                    <!-- Buttons -->
                    <div class="col-md-9">

                        <div class="d-flex flex-wrap gap-2">

                            <button class="btn btn-primary btn-sm" name="search">Search</button>

                            <button class="btn btn-outline-danger btn-sm" name="donor">Donor</button>
                            <button class="btn btn-outline-success btn-sm" name="seeker">Seeker</button>
                            <button class="btn btn-outline-warning btn-sm" name="manager">Manager</button>

                            <button class="btn btn-dark btn-sm" name="alldonors">All Donors</button>
                            <button class="btn btn-dark btn-sm" name="allseekers">All Seekers</button>
                            <button class="btn btn-dark btn-sm" name="allmanager">All Managers</button>

                            <button class="btn btn-secondary btn-sm" name="reset">Reset</button>

                        </div>

                    </div>

                </div>

            </form>

        </div>
    </div>

    <!-- Table Card -->
    <div class="card shadow-sm">

        <div class="card-header bg-danger text-white">
            <strong>User List</strong>
        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover table-bordered mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        if ($result && $result->num_rows > 0)
                        {
                            $i = 1;
                            while ($donors = $result->fetch_assoc())
                            {
                        ?>

                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $donors['name']; ?></td>
                            <td><?php echo $donors['email']; ?></td>
                            <td>

                                 <?php if ($donors['role'] == 'donor') { ?>
        <span class="badge bg-warning">
            <?php echo $donors['role']; ?>
        </span>

    <?php } 
    else if ($donors['role'] == 'manager') { ?>
    <span class="badge bg-dark">
            <?php echo $donors['role']; ?>
        </span>

    <?php } 
    
    else { ?>
        <span class="badge bg-primary">
            <?php echo $donors['role']; ?>
        </span>
    <?php } ?>
                            </td>
                            <td>
                                <a href="viewUserProfile.php?id=<?php echo $donors['email']; ?>"
                                   class="btn btn-sm btn-success">
                                    View Profile
                                </a>
                            </td>
                        </tr>

                        <?php
                                $i++;
                            }
                        }
                        else
                        {
                        ?>

                        <tr>
                            <td colspan="5" class="text-center text-danger py-3">
                                No record found
                            </td>
                        </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>
</div>
</main>
<?php
include '../includes/footer.php';//include footer
?>
