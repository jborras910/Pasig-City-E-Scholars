<?php 

$page='Users_page';
include('includes/header.php');

include('includes/navbar.php');

 ?>


<style>
.card-body .hero-image {

    text-align: center;
    background-image: url('../Assets/pasig_wallpaper.png');
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    color: #fff;
}

.card-body .hero-image img {
    width: 220px;
    filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
}

.card-body .btn-outline-primary {
    color: aliceblue !important;
    background-color: #820c0c !important;
    border: 1px solid aliceblue !important;
    box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;
}

.card-body h2 {
    font-size: 50px;
}

.card-body .hero-image span {
    color: #fcd116 !important;
}

.card-body .col-md-12 {
    background: rgba(0, 0, 0, 0.5);
    margin: 80px auto;
    padding: 35px 20px !important;
    border-radius: 10px;

}






@media screen and (max-width: 1000px) {}

</style>



<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Home Page</h2>
                <a type="button" class="btn btn-info">EDIT
                    THE PAGE</a>

            </div>
        </div>

        <div class="card-body">

            <form action="">
                <div class="hero-image ">
                    <div class="container ">
                        <div class=" row align-items-center align-content-center  d-flex flex-row-reverse">
                            <div class="col-md-12">


                                <img class="mb-2" src="../Assets/PST_LOGO.png" alt="">



                                <h2>Welcome to <span>Pasig City E-Scholar</span></h2>

                                <p>Pasig City Scholarship Program is for students who are residents of the
                                    city for five years. It requires academic qualifications such as at least 85 average
                                    and
                                    no final
                                    subject average below 80, no failed, or droppe or incomplete mark..</p>
                                <a href="" type="button" class="btn btn-outline-primary"><i
                                        class="fa-solid fa-arrow-right-long mr-2"></i>Apply
                                    scholarship here<i class="fa-solid fa-arrow-left-long ml-2"></i></a>

                            </div>

                        </div>
                        <hr>

                    </div>
                </div>
            </form>





        </div>
    </div>
</div>









<?php include('includes/footer.php') ?>
