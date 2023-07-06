<?php 
$page='Profile_page';
include('includes/header.php');
include('includes/dbconfig.php');
include('includes/navbar.php');



?>


<style>
.user_image {
    margin: 0 auto !important;

    border: 2px solid #01406b !important;
    width: 100% !important;
    height: 540px !important;
    padding: 20px !important;
    box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;

}

.bg-grey {
    border: 2px solid #01406b !important;

    box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;
    padding: 15px !important;
}


.label {
    font-weight: 600 !important;
    font-size: 17px !important;
    color: #0275d8 !important;
    margin-bottom: 2px !important;
}

.modal input {
    width: 100%;
    padding: 10px !important;
    font-size: 17px !important;
    margin-bottom: 0px !important;
    box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;
    border: 1px solid gray;
    font-weight: 600;
    color: black !important;

}

.modal h6 {
    margin-bottom: 2px !important;
    font-size: 17px !important;
}

.form-group .input {
    width: 100%;


    box-shadow: 0 4px 0px 0px rgba(0, 0, 0, 0.2) !important;
}

.form-group {
    position: relative;
    text-align: left;

}

.field-icon {
    float: right;
    margin-right: 26px;
    margin-top: -28px;
    position: relative;
    font-size: 15px !important;
    color: black !important;
    font-weight: 600;
    cursor: pointer !important;



}

.bg-grey .form-group {
    border-bottom: 2px solid #0275d8 !important;
}

</style>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">My Account</h2>
                <div>
                    <button type="button" class="btn btn-success text-uppercase" data-toggle="modal"
                        data-target="#edit_profile">Edit
                        Profile</button>

                    <?php  
                            $user_id = $_SESSION['auth_user']['user_id'];
                            $query = "SELECT * FROM users_table WHERE User_id='$user_id'";
                            $query_run = mysqli_query($conn,$query);              
                            ?>

                    <?php 
                    if (mysqli_num_rows($query_run) > 0) {
                        while ($row=mysqli_fetch_assoc($query_run)) {
                            ?>

                    <button type="button" data-toggle="modal" data-target="#reset_password_modal"
                        class="btn btn-danger text-uppercase">Change Password</button>
                    <!-- Modal -->
                    <form action="Function.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <div class="modal fade" id="edit_profile" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">EDIT PROFILE</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">

                                            <div class="text-center">
                                                <img width="200px" height="200" id="blah"
                                                    src="<?php echo "Users_image/".$row['image'] ?>">
                                            </div>
                                            <br><br>

                                            <input type="hidden" name="current_image"
                                                value="<?php echo $row['image']?>">
                                            <br>
                                            <h6 for="image">Change User Image</h6>
                                            <input type="file" id="imgInp" accept="image/*" onchange="previewImage();"
                                                name="user_image_uploaded" />

                                            <input type="hidden" value="<?php echo $row['User_id']?>" name="User_id">
                                        </div>
                                        <div class="form-group">
                                            <h6 class="ml-1" for="">First Name</h6>
                                            <input type="text" name="first_name"
                                                value="<?php echo $row['first_name']; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <h6 class="ml-1" for="">Last Name</h6>
                                            <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <h6 class="ml-1" for="">Middle Name</h6>
                                            <input type="text" name="middle_name"
                                                value="<?php echo $row['Middle_Name']; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <h6 class="ml-1" for="">House Number</h6>
                                            <input type="text" name="house_number"
                                                value="<?php echo $row['house_number']; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <h6 class="ml-1" for="">Street</h6>
                                            <input type="text" name="Street" value="<?php echo $row['Street']; ?>"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <h6 class="ml-1" for="">Barangay</h6>
                                            <input type="text" name="barangay" value="<?php echo $row['barangay'] ?>"
                                                class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <h6 class="ml-1" for="">Unit/Floor:</h6>
                                            <input type="text" placeholder="Unit/Floor..." name="Unit"
                                                value="<?php echo $row['Unit'] ?>" class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <h6 class="ml-1" for="">Building:</h6>
                                            <input type="text" placeholder="Building..." name="Building"
                                                value="<?php echo $row['Building'] ?>" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <h6 class="ml-1" for="">Village/Subdivision:</h6>
                                            <input type="text" placeholder="Village/Subdivision..." name="Village"
                                                value="<?php echo $row['Village'] ?>" class="form-control">
                                        </div>














                                        <div class="form-group">
                                            <h6 class="ml-1" for="">Contact Number</h6>
                                            <input type="text" name="Contact_number"
                                                value="<?php echo $row['Contact_number'] ?>" class="form-control">
                                            <input type="hidden" name="user_id"
                                                value="<?php echo $_SESSION['auth_user']['user_id'] ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" name="edit_user_profile_btn" class="btn btn-success">Save
                                            changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Modal -->
                    <form action="Function.php" method="POST" autocomplete="off">
                        <div class="modal fade" id="reset_password_modal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">ALERT</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="password">Old Password</label>
                                                <input type="password" name="old_password" id="password"
                                                    placeholder="Old password..." class="form-control" required>
                                                <span class="fa fa-fw fa-solid fa-eye field-icon toggle-password"
                                                    data-target="#password"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="password_2">New Password</label>
                                                <input type="hidden" name="user_id"
                                                    value="<?php echo $row['User_id'] ?>" required>





                                                <input type="hidden" name="current_password"
                                                    value="<?php echo $row['Password'] ?>" required>




                                                <input type="password" name="new_password" id="password_2"
                                                    placeholder="New password..." class="form-control">
                                                <span class="fa fa-fw fa-solid fa-eye field-icon toggle-password"
                                                    data-target="#password_2"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="password_3">Confirm Password</label>
                                                <input type="password" name="confirm_password" id="password_3"
                                                    placeholder="Confirm password..." class="form-control">
                                                <span class="fa fa-fw fa-solid fa-eye field-icon toggle-password"
                                                    data-target="#password_3"></span>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" name="change_password_btn" class="btn btn-danger">Save
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
    <div class="card-body activePage">
        <div class="card-body">
            <?php include('sweetAlert.php');?>
            <div class="row">
                <div class="col-md-4">
                    <img class="user_image" src="<?= "Users_image/".$row['image']?>" alt="">
                    <hr>
                </div>
                <div class="col-md-8">
                    <div class="bg-grey">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Your Information</h2>
                                <hr>
                                <div class="form-group">
                                    <h5 class="label mb-0">Name</h5>
                                    <h5 class="text-capitalize">
                                        <?= $row['first_name']." ".$row['Middle_Name']." ".$row['last_name']   ?>
                                    </h5>
                                </div>

                                <div class="form-group">
                                    <h5 class="label mb-0">Role</h5>
                                    <h5 class="text-capitalize"><?=  $row['user_type'] ?></h5>
                                </div>

                                <div class="form-group">
                                    <h5 class="label mb-0">Email Address</h5>
                                    <h5><?=  $_SESSION['auth_user']['Email'] ?></h5>
                                </div>

                                <div class="form-group">
                                    <h5 class="label mb-0">Location</h5>
                                    <h5>
                                        <?= $row['house_number']." ".$row['Street']." ".$row['barangay']." ".$row['Unit']." ".$row['Building']." ".$row['Village'] ?>
                                    </h5>
                                </div>
                                <div class="form-group">
                                    <h5 class="label mb-0">Contact</h5>
                                    <h5>
                                        <?= $row['Contact_number'] ?>
                                    </h5>
                                </div>

                                <div class="form-group">
                                    <h5 class="label mb-0">Date</h5>
                                    <h5>
                                        <?php echo date("F j, Y, g:i a", strtotime($row['date_created'] )); ?>
                                    </h5>
                                </div>



                            </div>

                        </div>

                        <?php
                                }}
                                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php include('includes/footer.php') ?>




<script>
imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}
</script>
















<script>
const togglePasswords = document.querySelectorAll('.toggle-password');

togglePasswords.forEach(btn => {
    btn.addEventListener('click', () => {
        const passwordField = document.querySelector(btn.dataset.target);
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        btn.classList.toggle('fa-eye');
        btn.classList.toggle('fa-eye-low-vision');
    });
});
</script>
