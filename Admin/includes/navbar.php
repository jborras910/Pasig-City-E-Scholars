<link rel="stylesheet" type="text/css" href="layout/sidebar.css?<?php echo time(); ?>" />


<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <img src="../Assets/login_logo.png" alt="">
    <!-- Divider -->
    <hr class="sidebar-divider my-0" />
    <br>
    <div class="sidebar-heading">Core</div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if($page=='dashboard_page'){echo 'active';}?> ">

        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />
    <!-- Nav Item - Dashboard -->
    <div class="sidebar-heading">Your Profile</div>
    <li class="nav-item <?php if($page=='Profile_page'){echo 'active';}?> ">
        <a class="nav-link" href="profile.php">
            <i class="fa-solid fa-user"></i>
            <span>System User</span></a>
    </li>

    <?php if($_SESSION['auth_user']['role'] == 'Main_Admin'): ?>
    <hr class="sidebar-divider d-none d-md-block" />

    <div class="sidebar-heading">Chart</div>
    <li class="nav-item <?php if($page=='charts'){echo 'active';}?> ">
        <a class="nav-link" href="charts.php">
            <i class="fa-brands fa-discourse"></i>
            <span>Applicants Program</span></a>
    </li>

    <li class="nav-item <?php if($page=='charts_barangay'){echo 'active';}?> ">
        <a class="nav-link" href="charts_barangay.php">
            <i class="fa-solid fa-city"></i>
            <span>Applicants Barangay</span></a>
    </li>












    <hr class="sidebar-divider d-none d-md-block" />
    <div class="sidebar-heading">System Users</div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Users Management</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components</h6>
                <a class="collapse-item" href="Faculty.php">Admin Users</a>
                <a class="collapse-item" href="users.php">Scholar Users</a>


                <a class="collapse-item" href="Recycle.php">Deactivated Users</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block" />
    <div class="sidebar-heading">Applicants</div>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true"
            aria-controls="collapse_3">
            <i class="fas fa-fw fa-cog"></i>
            <span>Scholarship</span>
        </a>
        <div id="collapse_3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components</h6>
                <a class="collapse-item" href="Applicants_Scholar_Table_Checklist.php">Applicants</a>
                <a class="collapse-item" href="ApprovedScholars_table.php">Approved Applicants</a>
                <a class="collapse-item" href="Disapproved_applicants.php">Disqualified Applicants</a>
                <a class="collapse-item" href="Overall_applicants.php">Overall Applicants</a>
                <h6 class="collapse-header">Payroll</h6>
                <a class="collapse-item" href="payroll.php">Payroll Check</a>
                <a class="collapse-item" href="Unclaimed_Allowance.php">Unclaimed Allowance</a>


            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block" />
    <div class="sidebar-heading">Client Side</div>




    <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="true"
            aria-controls="collapse_4">
            <i class="fas fa-fw fa-cog"></i>
            <span>Interface</span>
        </a>
        <div id="collapse_4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components</h6>
                <a class="collapse-item" href="NewApplicants.php">Applicants form</a>
                <a class="collapse-item" href="pageNews.php">News & Updates Page</a>

                <a class="collapse-item" href="page_faq.php">FAQ Page</a>
                <a class="collapse-item" href="feedback.php">Users Feedback</a>
            </div>
        </div>
    </li>



    <?php else: ?>


    <hr class="sidebar-divider d-none d-md-block" />
    <div class="sidebar-heading">Scholarship applicants</div>



    <li class="nav-item <?php if($page=='payroll'){echo 'active';}?>">
        <a class="nav-link" href="payroll.php">
            <i class="fa-solid fa-user-check"></i>
            <span>Check Payroll</span></a>
    </li>

    <li class="nav-item <?php if($page=='Unclaimed Allowance'){echo 'active';}?>">
        <a class="nav-link" href="Unclaimed_Allowance.php">
            <i class="fa-solid fa-person-circle-question"></i>
            <span>Unclaimed Allowance</span></a>
    </li>












    <li class="nav-item <?php if($page=='Resubmit'){echo 'active';}?>">
        <a class="nav-link" href="Resubmit.php">
            <i class="fa-regular fa-pen-to-square"></i>
            <span>Pending Resubmit</span></a>
    </li>




















    <li class="nav-item <?php if($page=='Approved Applicants'){echo 'active';}?>">
        <a class="nav-link" href="ApprovedScholars_table.php">
            <i class="fa-regular fa-circle-check"></i>
            <span>Approved Applicants</span></a>
    </li>



    <li class="nav-item <?php if($page=='Disapproved Applicants'){echo 'active';}?>">
        <a class="nav-link" href="Disapproved_applicants.php">
            <i class="fa-regular fa-circle-xmark"></i>
            <span>Disqualified Applicants</span></a>
    </li>


    <li class="nav-item <?php if($page=='Overall Applicants'){echo 'active';}?>">
        <a class="nav-link" href="Overall_applicants.php">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span>Overall Applicants</span></a>
    </li>





















    <?php endif; ?>

    <hr class="sidebar-divider d-none d-md-block" />
    <div class="sidebar-heading">Logout</div>
    <li class="nav-item">
        <a class="nav-link" type="button" data-toggle="modal" data-target="#logoutModal">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block" />


    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancel
                </button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <!-- End of Sidebar -->
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


            <a class="navbar-brand" href="#">
                <h3 class="ml-2 d-none d-lg-inline text-gray-600 small text-uppercase"><i
                        class="fa-solid fa-circle-user mr-2"></i>Admin
                    <span class=" text-primary">
                        <?php echo $_SESSION['auth_user']['first_name']." ".$_SESSION['auth_user']['Middle_Name']." ".$_SESSION['auth_user']['last_name'] ?></span>
                    Dashboard
                </h3>

            </a>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">






                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">

                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span
                            class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['auth_user']['Email'] ?></span>

                        <img class="img-profile rounded-circle border"
                            src="<?= "Users_image/".$_SESSION['auth_user']['image'] ?>">
                    </a>

                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="profile.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../dashboard.php">
                            <i class="fa-solid fa-window-maximize mr-2 text-gray-400"></i>
                            Client side
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->
