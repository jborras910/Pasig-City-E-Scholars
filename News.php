<?php 
$page = 'News | Pasig E-Scholar';
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
    margin-bottom: 10% !important;




}

.card-header img {
    width: 100% !important;
    height: 340px !important;
}

.btn {
    background: #dd3e2b !important;
    border: 0px !important;
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




}

</style>






<div class="container-fluid  main">
    <div class="text-center mb-3">
        <h3>News and updates for Pasig City Scholars<span class="text-danger">
                <?php echo date("m/d/Y")  ?></span>
        </h3>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <?php 
            $query = "SELECT * FROM  news_updates_table ORDER BY date DESC";
            $query_run = mysqli_query($conn,$query);
            if (mysqli_num_rows($query_run) > 0) {
            while ($row=mysqli_fetch_assoc($query_run)) {
                ?>
            <div class="col-sm-6">
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <img src="<?php echo "Admin/news_updates_image/".$row['image'] ?>" alt="">
                    </div>
                    <div class="card-body">


                        <label class="text-secondary" for="">
                            <?php echo date("F j, Y, g:i a", strtotime($row['date']));?></label>
                        <h5 class="text-danger"><?php echo $row['title'] ?></h5>
                        <br>

                    </div>

                    <div class="card-footer p-3 bg-white">
                        <a class="btn btn-primary" href="News_view.php?id=<?php echo $row['id'] ?>">View More<i
                                class="fa-solid fa-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>

            <?php
            }}
            ?>
        </div>
    </div>


















</div>






















<?php 


include('Footer.php');



?>
