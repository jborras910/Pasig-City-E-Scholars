<?php 

$page = 'pageUpdate';
include('includes/dbconfig.php');
include('includes/header.php');

include('includes/navbar.php');
include('includes/restrict.php'); 

 ?>

<?php 

$query = "SELECT * FROM  pages WHERE name='Update_Page'";
$query_run = mysqli_query($conn,$query);


if (mysqli_num_rows($query_run) > 0) {
while ($row=mysqli_fetch_assoc($query_run)) {
    ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Updated Page</h2>
                <div>


                </div>
            </div>
        </div>

        <div class="card-body activePage" id='activePage'>
            <div class="card-body">
                <?php include('sweetAlert.php');?>
                <form action="Function.php" method="POST" enctype="multipart/form-data">
                    <textarea name="content" id="your_summernote" class="form-control" rows="4">
                        <?php echo $row['content'] ?>
                </textarea>
                    <input type="hidden" name="content_id" value="<?php echo $row['id']; ?>">
                    <br>
                    <button type="button" data-toggle="modal" data-target="#Update_Page" class="btn btn-primary">Save
                        content</button>
                    <a type="submit" href="#" onclick="history.go(-1)" class="btn btn-danger">Back</a>

                    <!-- Modal -->
                    <div class="modal fade" id="Update_Page" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Alert</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5>Are You Sure You Want to Update this Page?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="Updated_Page_btn" class="btn btn-primary">Save
                                        changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
}}
?>



<?php include('includes/footer.php') ?>
