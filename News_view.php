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
    background: #fff !important;





}




.container img {
    width: 60% !important;
    height: 400px !important;
    margin: 10px auto !important;
}

.card {
    background: transparent !important;
    border: 0px !important;
}

.flex-box {
    padding-top: 20px !important;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

span {
    font-size: 25px !important;
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






<?php 
    $content_id = $_GET['id'];
    $query = "SELECT * FROM  news_updates_table WHERE id='$content_id'";
    $query_run = mysqli_query($conn,$query);
    if (mysqli_num_rows($query_run) > 0) {
    while ($row=mysqli_fetch_assoc($query_run)) {
    ?>

<div class="container  main">
    <div class="text-center mb-3 flex-box">



        <a class="btn btn-danger " href="News.php"><i class="fa-solid fa-backward mr-2"></i>BACK</a>
    </div>

    <hr>
    <div class="container">
        <div class="card">
            <div class="text-center mb-2">

                <span class=""><?php echo $row['title'] ?></span>
                <br> <br>
                <img src="<?php echo "Admin/news_updates_image/".$row['image'] ?>" alt="">
            </div>

            <br>
            <label class="text-secondary" for="">
                <?php echo date("F j, Y, g:i a", strtotime($row['date']));?></label>
            <br>
            <h5><?php echo $row['content']?></h5>
            <br> <br>

        </div>





    </div>


    <?php
            }}
            ?>




















</div>






















<?php 


include('Footer.php');



?>
