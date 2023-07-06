<?php 
if (session_id() == "")
  session_start(); 
  
  ?>




<link rel="stylesheet" type="text/css" href="css/navbar.css?<?php echo time(); ?>" />
<!--Google font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">


<style>
.scroll-nav {
    background-color: #003067 !important;
    border-bottom: 2px solid rgba(22, 22, 26, 0.18);
    box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;
    padding: 15px 155px;

    width: 100%;
    margin-bottom: 0px !important;
}


.user_image {
    border: 2px solid white !important;
    border-radius: 50% !important;
    margin-right: 5px !important;


}

</style>


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







<!-- <div class="header"> -->
<nav class="static-navbar navbar navbar-expand-lg navbar-light align-items-center align-content-center fixed-top "
    id="navbar">
    <a class="navbar-brand" href="#"><img src="Assets/Pasig_City_Seal_Logo.svg.png" alt="">Pasig E-Scholar</a>
    <button id="toggleMenu" class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="fa-solid fa-bars" id="icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link <?php if($page=='Home | Pasig E-Scholar'){echo 'actived';}?>"
                    href="dashboard.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='Tracker | Pasig E-Scholar'){echo 'actived';}?>"
                    href="Tracker.php">Tracker</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='News | Pasig E-Scholar'){echo 'actived';}?>" href="News.php">News &
                    Updates</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if($page=='Feedback | Pasig E-Scholar'){echo 'actived';}?>"
                    href="Feedback.php">Feedback</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if($page=='FAQ | Pasig E-Scholar'){echo 'actived';}?>" href="faq.php">FAQ</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <?php if(isset($_SESSION['authenticanted'] )) : ?>
            <li class="nav-item dropdown no-arrow profile ">
                <a class="nav-link dropdown-toggle " href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">

                    <img height="25px" width="25px" class="user_image"
                        src="<?php echo 'Admin/Users_image/'.$_SESSION['auth_user']['image']; ?>" alt="">
                    <?= $_SESSION['auth_user']['Email'] ?>

                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                    <?php if(!isset($_SESSION['Admin'])):?>
                    <a class="dropdown-item" href="Profile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>

                    <?php endif; ?>

                    <?php if(isset($_SESSION['Admin'])) : ?>

                    <a class="dropdown-item" href="Admin/index.php">
                        <i class="fa-solid fa-screwdriver-wrench fa-sm fa-fw mr-2 text-gray-400"></i>
                        Admin Site
                    </a>
                    <?php endif; ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
            <?php else : ?>
            <li class="nav-item login ml-2" style="background: #dd3e2b !important;"><a class="nav-link"
                    href="login.php"><i class="fa-solid fa-user mr-2"></i>Sign
                    In</a></li>';
            <?php endif; ?>
        </ul>


    </div>




</nav>
<!-- </div> -->
<script>
var navbar = document.getElementById("navbar");

window.addEventListener("scroll", function() {
    if (window.pageYOffset === 0) {
        navbar.classList.add("static-navbar");
        navbar.classList.remove("scroll-nav");
    } else {
        navbar.classList.remove("static-navbar");
        navbar.classList.add("scroll-nav");
    }
});
</script>
