<?php 

$page='Users_page';
include('includes/header.php');

include('includes/navbar.php');
include('includes/restrict.php'); 

 ?>



<div class="container-fluid">










    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Add user Profiles<i class="fa-solid fa-user-gear ml-2"></i></h2>
                <a type="button" onclick="location.href = document.referrer; return false;"
                    class="btn btn-danger">BACK</a>

            </div>
        </div>

        <div class="card-body">
            <?php include('sweetAlert.php');?>
            <form action="Function.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <div>
                    <img class="border" id="blah" src="#" alt="" width="200px">
                    <br><br>
                    <label for="image">Upload User Image</label>
                    <br>
                    <input type="file" id="imgInp" accept="image/*" onchange="previewImage();" name="user_images"
                        required>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-3">
                        <h5 class="mb-1">First Name:</h5>
                        <input type="text"
                            value="<?php echo isset($_SESSION['hold_inputs']['first_name']) ? $_SESSION['hold_inputs']['first_name'] : ''; unset($_SESSION['hold_inputs']['first_name']);?>"
                            name="first_name" class="form-control" required placeholder="First name..">
                    </div>
                    <div class="form-group col-md-3 ">
                        <h5 class="mb-1">Last Name:</h5>
                        <input type="text"
                            value="<?php echo isset($_SESSION['hold_inputs']['last_name']) ? $_SESSION['hold_inputs']['last_name'] : ''; unset($_SESSION['hold_inputs']['last_name']);?>"
                            name="last_name" class="form-control" required placeholder="Last name..">
                    </div>

                    <div class="form-group col-md-3 ">
                        <h5 class="mb-1">Middle Name:</h5>
                        <input type="text"
                            value="<?php echo isset($_SESSION['hold_inputs']['middle_name']) ? $_SESSION['hold_inputs']['middle_name'] : ''; unset($_SESSION['hold_inputs']['middle_name']);?>"
                            name="middle_name" class="form-control" placeholder="Middle name..">
                    </div>

                    <div class="form-group col-md-3 ">
                        <h5 class="mb-1"> Suffix:</h5>
                        <input type="text"
                            value="<?php echo isset($_SESSION['hold_inputs']['Suffix']) ? $_SESSION['hold_inputs']['Suffix'] : ''; unset($_SESSION['hold_inputs']['Suffix']);?>"
                            name="Suffix" class="form-control" placeholder="Suffix">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-6">
                        <h5 class="mb-1">Email</h5>
                        <input type="email"
                            value="<?php echo isset($_SESSION['hold_inputs']['usersEmail']) ? $_SESSION['hold_inputs']['usersEmail'] : ''; unset($_SESSION['hold_inputs']['usersEmail']);?>"
                            name="usersEmail" class="form-control" required placeholder="Email..">
                    </div>
                    <div class="form-group col-md-6">
                        <h5 class="mb-1">Confirm Email</h5>
                        <input type="email"
                            value="<?php echo isset($_SESSION['hold_inputs']['ConfirmUsersEmail']) ? $_SESSION['hold_inputs']['ConfirmUsersEmail'] : ''; unset($_SESSION['hold_inputs']['ConfirmUsersEmail']);?>"
                            name="ConfirmUsersEmail" class="form-control" required placeholder="Confirm Email..">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-6">
                        <h5 class="mb-1">Role</h5>
                        <select name="usertype" required class="form-control" id="exampleFormControlSelect1">
                            <option value="Select Role">Select Role</option>
                            <option
                                <?php if (isset($_SESSION['hold_inputs']['usertype']) && $_SESSION['hold_inputs']['usertype'] == 'scholar') echo 'selected'; ?>
                                value="scholar">Scholar</option>
                            <option
                                <?php if (isset($_SESSION['hold_inputs']['usertype']) && $_SESSION['hold_inputs']['usertype'] == 'Evaluator') echo 'selected'; ?>
                                value="Evaluator">Evaluator</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-6">
                        <h5 class="mb-1">Passoword</h5>
                        <input type="password"
                            value="<?php echo isset($_SESSION['hold_inputs']['password']) ? $_SESSION['hold_inputs']['password'] : ''; unset($_SESSION['hold_inputs']['password']);?>"
                            name="password" class="form-control" required placeholder="Password..">
                    </div>
                    <div class="form-group col-md-6">
                        <h5 class="mb-1">Confirm Passoword</h5>
                        <input type="passowrd"
                            value="<?php echo isset($_SESSION['hold_inputs']['Confirm_password']) ? $_SESSION['hold_inputs']['Confirm_password'] : ''; unset($_SESSION['hold_inputs']['Confirm_password']);?>"
                            name="Confirm_password" class="form-control" required placeholder="Confirm Passoword..">
                    </div>
                </div>
                <hr>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Add User Profile
                </button>
                <a type="button" onclick="location.href = document.referrer; return false;"
                    class="btn btn-danger">Cancel</a>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to add this
                                    user?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-footer">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="register_user" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>


<script>
imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}
</script>



<?php include('includes/footer.php') ?>
