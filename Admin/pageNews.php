<?php 

$page = 'pageNews';
include('includes/dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/restrict.php'); 

 ?>

<style>
.card {

    border-radius: 0px !important;
    margin-bottom: 10px !important;

}

.card-head {

    padding: 0px !important;
}


.card img {
    width: 100% !important;
    height: 300px !important;
}

</style>


<?php 

$query = "SELECT * FROM  pages WHERE name='News_Page'";
$query_run = mysqli_query($conn,$query);


if (mysqli_num_rows($query_run) > 0) {
  while ($row=mysqli_fetch_assoc($query_run)) {

  ?>
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">News & Updates</h2>
                <div>

                    <a href="pageNewsAdd.php" type="button" class="btn btn-primary">
                        Add News and Updates
                    </a>


                </div>
            </div>




        </div>
        <div class="card-body activePage" id='activePage'>

            <?php include('sweetAlert.php');?>

            <div class="container">
                <div class="text-center mb-3">
                    <h3>News and updates for Pasig City Scholars A.Y <span class="text-danger">
                            <?php echo date("m/d/Y")  ?></span>
                    </h3>
                </div>

                <div class="row">

                    <?php 
            $query = "SELECT * FROM  news_updates_table";
            $query_run = mysqli_query($conn,$query);


            if (mysqli_num_rows($query_run) > 0) {
while ($row=mysqli_fetch_assoc($query_run)) {
    ?>

                    <div class="col-md-6 card">
                        <div class="card-head">
                            <img src="<?php echo "news_updates_image/".$row['image'] ?>" alt="">
                        </div>
                        <div class="card-body">
                            <label class="text-secondary" for="">
                                <?php echo date("F j, Y, g:i a", strtotime($row['date']));?></label>
                            <h5 class="text-danger"><?php echo $row['title'] ?></h5>
                            <br>
                            <form action="Function.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModaldelete_<?php echo $row['id'] ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="#deleteContent_<?php echo $row['id'] ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">DELETE NEWS
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>Are you certain you want to remove this post?</h3>
                                                <input type="hidden" name="content_id" value="<?php echo $row['id'] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" name="delete_news_btn"
                                                    class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <a href="pageNewsUpdate.php?id=<?php echo $row['id'] ?>"
                                class="btn btn-primary btn-block mb-2">EDIT</a>
                            <button data-toggle="modal" data-target="#exampleModaldelete_<?php echo $row['id'] ?>"
                                class="btn btn-danger btn-block">DELETE</button>


                        </div>
                    </div>



                    <?php
}}
                    ?>


                    <div>













                    </div>

                </div>
            </div>
        </div>

        <?php

}
}
?>











        <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
        </script>







        <?php include('includes/footer.php') ?>
