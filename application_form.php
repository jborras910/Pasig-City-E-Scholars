<?php 



session_start();
if(isset($_SESSION['auth_user']['scholar_type']) && $_SESSION['auth_user']['scholar_type'] == 'renewal'){
    header('location: RenewalApplicants.php');

}else if(isset($_SESSION['auth_user']['scholar_type']) && $_SESSION['auth_user']['scholar_type'] == 'new'){
    header('location: NewApplicants.php');
}






$page = 'Application Form | Pasig E-Scholar';

include('Head.php');



?>

<style>
.container {
    margin: 200px auto;
    height: 400px;

}



h3 {
    color: #01406b !important;
}

.card {

    width: 100%;
    margin: 10px;
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.5);
}

.card a {
    background-color: #01406b !important;
    border: none;
}

.card-title {
    border-bottom: 2px solid black;
    width: 100%;
}

@media screen and (max-width: 1000px) {
    .container {
        margin: 60px auto;
        height: auto
    }

    .card {
        width: 80%;
        margin: 10px auto;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.5);
    }
}

</style>


<div class="container">
    <?php include('alert.php');?>
    <h4>Please Choose your category</h4>
    <hr>
    <div class="row">
        <div class="col-sm card">
            <div class="card-body">
                <h5 class="card-title">New Applicants</h5>
                <p class="card-text">To access the form for the New Applicants, please click the button that is provided
                    below.
                </p>
                <br>
                <a href="NewApplicants.php" class="btn btn-primary">Apply Here</a>
            </div>
        </div>
        <div class="col-sm card">
            <div class="card-body">
                <h5 class="card-title">Renewal Applicants</h5>
                <p class="card-text">To access the form for the Renewal, please click the button that is provided
                    below.</p>
                <br>
                <a href="RenewalApplicants.php" class="btn btn-primary">Apply Here</a>
            </div>

        </div>

    </div>

</div>

















<?php 
include('Footer.php');

?>


<script>
window.onload = function() {
    document.getElementById("myModal").style.display = "block";


    document.getElementById("close").addEventListener("click", myFunction);


    function myFunction() {
        document.getElementById("myModal").style.display = "none";
    }














};
</script>
