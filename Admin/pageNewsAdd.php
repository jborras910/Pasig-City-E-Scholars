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

.image {
    width: 400px !important;

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
                <h2 class="mb-0">Add News and Updates</h2>
                <div>
                    <!-- Button trigger modal -->
                    <a href="pageNews.php" type="button" class="btn btn-danger">
                        Back
                    </a>


                </div>
            </div>


        </div>
        <div class="card-body activePage" id='activePage'>
            <div class="card-body">

                <form action="Function.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div>
                        <img class="image" id="blah" src="#">
                        <br><br>
                        <label for="image">Upload User Image</label>
                        <br>
                        <input type="file" id="imgInp" accept="image/*" onchange="previewImage();" name="image"
                            required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <h5>Title</h5>
                        <input class="form-control" name="title" type="text" placeholder="Enter Title...">
                    </div>
                    <hr>
                    <div class="form-group">
                        <h5>Content</h5>
                        <textarea placeholder="Please provide reasons for disapproval..." name="content"
                            class="form-control" required id="your_summernote_2"></textarea>
                    </div>
                    <button type="submit" name="add_news_updates" class="btn btn-primary">Save
                        changes</button>
                </form>

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
