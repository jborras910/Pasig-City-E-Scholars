<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/restrict.php'); 

?>


<?php 
    $conn = mysqli_connect('localhost','root', '', 'project02');
    if(isset($_POST['edit_btn'])){
        $id = $_POST['edit_id'];
        $query = "SELECT * FROM users_table WHERE User_id='$id'";
        $query_run = mysqli_query($conn,$query);
    
        foreach($query_run as $row)
        {
            ?>




<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Profile of <?php echo $row['Email']?> <i class="fa-solid fa-user-pen"></i>

                </h2>
                <a type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#deleted<?php echo $row['User_id']?>">DELETE USER PERMANET<i
                        class="ml-1 fa-solid fa-trash-can"></i></a>

            </div>
        </div>
        <?php include('sweetAlert.php');?>
        <div class="card-body">
            <form action="Function.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <div>
                    <img width="240px" id="blah" src="<?php echo "Users_image/".$row['image'] ?>">


                    <input type="hidden" value="<?php echo $row['User_id']?>" name="Restore_User_id">
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-3">
                        <h5 class="mb-1">First Name:</h5>
                        <input disabled="disabled" type="text" value="<?php echo $row['first_name']?>" name="first_name"
                            class="form-control" required placeholder="First name..">
                    </div>
                    <div class="form-group col-md-3 ">
                        <h5 class="mb-1">Last Name:</h5>
                        <input disabled="disabled" type="text" value="<?php echo $row['last_name']?>" name="last_name"
                            class="form-control" required placeholder="Last name..">
                    </div>

                    <div class="form-group col-md-3 ">
                        <h5 class="mb-1">Middle Name:</h5>
                        <input disabled="disabled" type="text" value="<?php echo $row['Middle_Name']?>"
                            name="middle_name" class="form-control" placeholder="Middle name..">
                    </div>

                    <div class="form-group col-md-3 ">
                        <h5 class="mb-1"> Suffix:</h5>
                        <input disabled="disabled" type="text" value="<?php echo $row['Suffix']?>" name="Suffix"
                            class="form-control" placeholder="Suffix">
                    </div>

                    <div class="form-group col-md-6 ">
                        <h5 class="mb-1">User Role:</h5>
                        <input disabled="disabled" type="text" value="<?php echo $row['user_type']?>"
                            class="form-control" placeholder="Suffix">
                    </div>
                    <div class="form-group col-md-6">
                        <h5 class="mb-1">Email</h5>
                        <input disabled="disabled" type="email" value="<?php echo $row['Email']?>" name="usersEmail"
                            class="form-control" required placeholder="Email..">
                    </div>
                    <div class="form-group col-md-6">
                        <h5 class="mb-1">Passoword</h5>
                        <input disabled="disabled" type="password" value="<?php echo $row['Password']?>" name="password"
                            class="form-control" required placeholder="Password..">
                    </div>

                </div>
                <hr>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModalCenter<?php echo $row['User_id']?>">
                    RESTORED DATA
                </button>
                <a class="btn btn-secondary" onclick="location.href = document.referrer; return false;">Back</a>
                <!-- Modal Restore-->
                <div class="modal fade" id="exampleModalCenter<?php echo $row['User_id']?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to restore this
                                    data?
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">


                                <img class="rounded-circle" width="150px"
                                    src='<?php echo "Users_image/".$row['image'] ?>'>
                                <br>
                                <br>

                                <h4>Are you sure you want to restore <span
                                        class="text-danger"><?php echo $row['first_name']." ".$row['last_name']; ?>?</span>
                                </h4>
                                <hr>
                                <h6>This user is <?php echo $row['user_type']; ?></h6>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" name="restore_btn" class="btn btn-primary">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal deleted -->
                <div class="modal fade" id="deleted<?php echo $row['User_id']?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to Delete this
                                    user?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">


                                <img class="rounded-circle" width="150px"
                                    src='<?php echo "Users_image/".$row['image'] ?>'>
                                <br>
                                <br>

                                <h4>Are you sure you want to delete <span
                                        class="text-danger"><?php echo $row['first_name']." ".$row['last_name']; ?>?
                                    </span>this user will permanently remove
                                </h4>
                                <hr>
                                <h6>This user is <?php echo $row['user_type']." id=".$row['User_id']; ?></h6>
                                <input type="hidden" name="applicants_email" value="<?php echo $row['Email']; ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button name="permanent_data_deleted" type="submit" class="btn btn-danger">Yes I want to
                                    delete it</button>
                            </div>
                        </div>
                    </div>
                </div>





            </form>
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
