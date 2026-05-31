<?php
include 'includes/header.php';//include header
include 'includes/main_navbar.php';//include navbar


?>
<!-- Navbar -->

<!-- Hero Section -->
<section class="hero text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">
            Blood On Click
        </h1>

        <p class="lead mt-4">
            Connecting Blood Donors, Blood Seekers and Blood Banks
            through a centralized Blood Management System.
        </p>

        <p>
            Save Lives • Find Blood Quickly • Manage Blood Banks Efficiently
        </p>

        <a href="donor_registration.php" class="btn btn-success btn-lg me-2">
            Register As Donor
        </a>
        <a href="seeker_registration.php" class="btn btn-warning btn-lg me-2">
            Register As Seeker
        </a>
        <a href="#" class="btn btn-outline-light btn-lg">
            Find Blood
        </a>
    </div>
</section>

<!-- Features -->
<section class="py-5" id="features">
    <div class="container">

        <h2 class="text-center section-title">
            System Features
        </h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card feature-card shadow h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-shield-check fs-1 text-danger"></i>
                        <h4 class="mt-3">Secure Authentication</h4>
                        <p>
                            Secure login, session management and role-based access.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card shadow h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-droplet-half fs-1 text-danger"></i>
                        <h4 class="mt-3">Blood Stock Management</h4>
                        <p>
                            Manage blood inventory and monitor blood stock levels.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card shadow h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-bell-fill fs-1 text-danger"></i>
                        <h4 class="mt-3">Notifications</h4>
                        <p>
                            Real-time notifications for donors, seekers and managers.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card shadow h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-file-medical-fill fs-1 text-danger"></i>
                        <h4 class="mt-3">Medical Assessment</h4>
                        <p>
                            Upload and manage donor assessment reports.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card shadow h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-chat-dots-fill fs-1 text-danger"></i>
                        <h4 class="mt-3">Communication</h4>
                        <p>
                            Direct communication between donors, seekers and blood banks.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card shadow h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-bar-chart-fill fs-1 text-danger"></i>
                        <h4 class="mt-3">Analytics & Reports</h4>
                        <p>
                            Daily, weekly and monthly blood stock insights.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Stakeholders -->
<section class="bg-light py-5" id="roles">
    <div class="container">

        <h2 class="text-center section-title">
            Stakeholders
        </h2>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="card role-card shadow text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-person-gear fs-1 text-danger"></i>
                        <h4>Administrator</h4>
                        <p>
                            Manage users, blood banks, donors, assessments and stock.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card role-card shadow text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-building fs-1 text-danger"></i>
                        <h4>Blood Bank Manager</h4>
                        <p>
                            Manage blood inventory, campaigns and requests.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card role-card shadow text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-heart-pulse-fill fs-1 text-danger"></i>
                        <h4>Blood Donor</h4>
                        <p>
                            Register, upload assessments and donate blood.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card role-card shadow text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-search-heart-fill fs-1 text-danger"></i>
                        <h4>Blood Seeker</h4>
                        <p>
                            Search blood, submit requests and receive notifications.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- How It Works -->
<section class="py-5" id="process">
    <div class="container">

        <h2 class="text-center section-title">
            How It Works
        </h2>

        <div class="row text-center">

            <div class="col-md-3">
                <h1 class="text-danger">1</h1>
                <h5>Register</h5>
                <p>Create account and complete profile.</p>
            </div>

            <div class="col-md-3">
                <h1 class="text-danger">2</h1>
                <h5>Medical Assessment</h5>
                <p>Upload and verify donor assessment reports.</p>
            </div>

            <div class="col-md-3">
                <h1 class="text-danger">3</h1>
                <h5>Blood Matching</h5>
                <p>System locates available blood stocks.</p>
            </div>

            <div class="col-md-3">
                <h1 class="text-danger">4</h1>
                <h5>Donate / Receive</h5>
                <p>Connect donors, seekers and blood banks.</p>
            </div>

        </div>

    </div>
</section>

<!-- Blood Groups -->
<section class="bg-light py-5">
    <div class="container">

        <h2 class="text-center section-title">
            Supported Blood Groups
        </h2>

        <div class="row g-3">

            <div class="col-md-2 col-6">
                <div class="blood-group bg-danger">A+</div>
            </div>

            <div class="col-md-2 col-6">
                <div class="blood-group bg-primary">A-</div>
            </div>

            <div class="col-md-2 col-6">
                <div class="blood-group bg-success">B+</div>
            </div>

            <div class="col-md-2 col-6">
                <div class="blood-group bg-warning text-dark">B-</div>
            </div>

            <div class="col-md-2 col-6">
                <div class="blood-group bg-info">AB+</div>
            </div>

            <div class="col-md-2 col-6">
                <div class="blood-group bg-dark">O+</div>
            </div>

        </div>

    </div>
</section>

<!-- Statistics -->
<section class="py-5">
    <div class="container">

        <div class="row text-center">

            <div class="col-md-3">
                <h2 class="text-danger">5000+</h2>
                <p>Registered Donors</p>
            </div>

            <div class="col-md-3">
                <h2 class="text-danger">100+</h2>
                <p>Blood Banks</p>
            </div>

            <div class="col-md-3">
                <h2 class="text-danger">10000+</h2>
                <p>Blood Units Managed</p>
            </div>

            <div class="col-md-3">
                <h2 class="text-danger">2500+</h2>
                <p>Lives Saved</p>
            </div>

        </div>

    </div>
</section>

<!-- CTA -->
<section class="cta text-center">
    <div class="container">

        <h2 class="fw-bold">
            Become a Blood Donor Today
        </h2>

        <p class="lead">
            Your single donation can save up to three lives.
        </p>

        <a href="login.php" class="btn btn-light btn-lg">
            Join Now
        </a>

    </div>
</section>

<?php
include 'includes/footer.php';//include footer
?>