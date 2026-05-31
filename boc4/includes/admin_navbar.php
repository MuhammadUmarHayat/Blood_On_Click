<nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">
    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">
            <i class="bi bi-droplet-fill"></i> Blood On Click
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <!-- HOME -->
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>

                <!-- REGISTRATION DROPDOWN -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       data-bs-toggle="dropdown">
                        Add Records
                    </a>

                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="donor_registration.php">Add Donor</a></li>
                        <li><a class="dropdown-item" href="seeker_registration.php">Add Seeker</a></li>
                        <li><a class="dropdown-item" href="bank_manager_reg.php">Add Bank Manager</a></li>
                        <li><a class="dropdown-item" href="add_bank.php">Add Bank</a></li>
                        <li><a class="dropdown-item" href="add_assessment.php">Add Assessment</a></li>

                    </ul>
                </li>

                <!-- MANAGEMENT DROPDOWN -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       data-bs-toggle="dropdown">
                        Management
                    </a>

                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="donor_management.php">Donors</a></li>
                        <li><a class="dropdown-item" href="seekerlist.php">Seekers</a></li>
                        <li><a class="dropdown-item" href="managerlist.php">Managers</a></li>
                        <li><a class="dropdown-item" href="banklist.php">Banks</a></li>
                        <li><a class="dropdown-item" href="userlist.php">Users</a></li>

                    </ul>
                </li>

                <!-- REPORTS -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       data-bs-toggle="dropdown">
                        Reports
                    </a>

                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="donar_history.php">Donation History</a></li>
                        <li><a class="dropdown-item" href="assessmentlist.php">Assessments</a></li>
                        <li><a class="dropdown-item" href="search_donor.php">Search Donor</a></li>

                    </ul>
                </li>

                <!-- PROFILE -->
                <li class="nav-item">
                    <a href="viewAdminProfile.php" class="nav-link">
                        Profile
                    </a>
                </li>

                <!-- LOGOUT -->
                <li class="nav-item">
                    <a href="../logout.php" class="nav-link text-white">
                        Logout
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>