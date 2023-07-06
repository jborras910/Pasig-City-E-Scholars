<?php 
$page = 'Updates | Pasig E-Scholar';
include('includes/dbconfig.php');
include('Head.php');



?>
<style>
body {
    background-image: url(assets/BackgroundTip.jpg);
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
}

.main {
    margin-top: 10% !important;
    font-weight: 600 !important;
    margin-bottom: 10% !important;

}


.logo_image {
    width: 500px !important;
}

@media screen and (max-width: 1000px) {

    .main {
        margin-top: 40% !important;
    }

    .logo_image {
        width: 100% !important;


    }

    .main img {
        width: 100% !important;
    }

    .main {
        font-size: 10px !important;
    }
}

</style>

<?php 

$query = "SELECT * FROM  pages WHERE name='Update_Page'";
$query_run = mysqli_query($conn,$query);


if (mysqli_num_rows($query_run) > 0) {
while ($row=mysqli_fetch_assoc($query_run)) {
    ?>



<div class="container  main">
    <div class="text-center mb-3">
        <img class="mb-2 logo_image" src="Assets/PST_ICON.png" alt="">

        <h5>Updates for Pasig City Scholars A.Y <span class="text-danger">
                <?php echo date("m/d/Y")  ?></span>
        </h5>
    </div>

    <div class="card mb-5">

        <h5 class="card-header">Updates</h5>
        <div class="card-body">
            <?php echo $row['content']?>
        </div>
    </div>

</div>



<?php
}}
?>


<?php 
include('Footer.php');

?>
