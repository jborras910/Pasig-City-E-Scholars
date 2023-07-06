<?php include('includes/header.php');
include('includes/navbar.php');

?>


<style>
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
    margin-top: -34px;
    position: relative;
    font-size: 15px !important;
    color: black !important;
    font-weight: 600;



}

</style>


<?php 
    $conn = mysqli_connect('localhost','root', '', 'project02');
    if(isset($_POST['edit_btn'])){
        $id = $_POST['edit_id'];
        $query = "SELECT * FROM users_table WHERE User_id='$id'";
        $query_run = mysqli_query($conn,$query);
    
        foreach($query_run as $row)
        {
            ?>
<form action="Function.php" method="POST">
    <!-- Modal -->
    <div class="modal fade" id="ModalCenter<?php echo $row['User_id']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Warning!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">


                    <img class="rounded-circle" width="150px" src='<?php echo "Users_image/".$row['image'] ?>'>
                    <br>
                    <br>

                    <h4>Do you want to block <span
                            class="text-danger"><?php echo $row['first_name']." ".$row['last_name']; ?>?</span> This
                        process
                        cannot be undone</h4>

                    <input type="hidden" name="delete_id" value="<?php echo $row['User_id']; ?>">
                    <input type="hidden" name="usertype" value="<?php echo $row['user_type']; ?>">
                    <input type="hidden" name="usertype" value="<?php echo $row['Email']; ?>">

                    <hr>

                    <label for="">This user is a <?php echo $row['user_type']; ?> </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button name="delete_btn" type="submit" class="btn btn-danger">Deactivate Account</button>
                </div>
            </div>
        </div>
    </div>
</form>



<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Profile of <?php echo $row['Email']?> <i class="fa-solid fa-user-pen"></i>
                </h2>
                <div>
                    <a type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#ModalCenter<?php echo $row['User_id']?>">Deactivate Account<i
                            class="ml-1 fa-solid fa-trash-can"></i></a>

                </div>


            </div>
        </div>
        <?php include('sweetAlert.php');?>
        <div class="card-body">
            <form action="Function.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <div>
                    <h3>Date Created: <?php echo date("F j, Y, g:i a", strtotime($row['date_created']));?> </h3>
                    <hr>
                    <img width="240px" id="blah" src="<?php echo "Users_image/".$row['image'] ?>">
                    <br><br>
                    <label for="image">Upload User Image</label>
                    <input type="hidden" name="image_name" value="<?php echo $row['image']?>">
                    <br>

                    <input type="file" id="imgInp" accept="image/*" onchange="previewImage();" name="user_images" />

                    <input type="hidden" value="<?php echo $row['User_id']?>" name="User_id">
                </div>

                <hr>

                <div class="row">
                    <div class="form-group col-md-3">
                        <h5 class="mb-1">First Name:</h5>
                        <input type="text" value="<?php echo $row['first_name']?>" name="first_name"
                            class="form-control" required placeholder="First name..">
                    </div>
                    <div class="form-group col-md-3 ">
                        <h5 class="mb-1">Last Name:</h5>
                        <input type="text" value="<?php echo $row['last_name']?>" name="last_name" class="form-control"
                            required placeholder="Last name..">
                    </div>

                    <div class="form-group col-md-3 ">
                        <h5 class="mb-1">Middle Name:</h5>
                        <input type="text" value="<?php echo $row['Middle_Name']?>" name="middle_name"
                            class="form-control" placeholder="Middle name..">
                    </div>

                    <div class="form-group col-md-3 ">
                        <h5 class="mb-1"> Suffix:</h5>
                        <input type="text" value="<?php echo $row['Suffix']?>" name="Suffix" class="form-control"
                            placeholder="Suffix">
                    </div>
                    <?php if($row['user_type'] == 'Main_Admin') : ?>
                    <div class="form-group col-md-4">
                        <h5 class="mb-1">Role</h5>
                        <input type="hidden" value="<?php echo $row['user_type']?>" name="usertype"
                            class="form-control">
                        <h5 class="main_admin bg-light"><?php echo $row['user_type']?></h5>
                        </h5>
                    </div>
                    <?php else : ?>
                    <div class="form-group col-md-4">
                        <h5 class="mb-1">Role</h5>
                        <select name="usertype" class="form-control" id="exampleFormControlSelect1">
                            <option value="<?php echo $row['user_type']?>"><?php echo $row['user_type']?></option>
                            <option value="scholar">Scholar</option>
                            <option value="Evaluator">Evaluator</option>
                        </select>
                    </div>
                    <?php endif; ?>
                    <div class="form-group col-md-12">
                        <h5 class="mb-1">Address</h5>
                        <input
                            value="<?php echo $row['house_number']." ".$row['Street']." ".$row['barangay']." ".$row['Unit']." ".$row['Building']." ".$row['Village']?>"
                            class="form-control" placeholder="Email.." disabled>
                    </div>



                    <div class="form-group col-md-12">
                        <h5 class="mb-1">Email</h5>
                        <input type="email" value="<?php echo $row['Email']?>" class="form-control" required
                            placeholder="Email.." disabled>
                    </div>
                    <div class="form-group col-md-12">
                        <h5 class="mb-1">Passoword</h5>
                        <input type="password" id='password'
                            value="<?php $hash = hash('sha256', $row['Password']); echo substr($hash, 0, 18); ?>"
                            class="form-control" required placeholder="Password.." disabled>
                        <span class="fa fa-fw fa-solid fa-eye field-icon" id="toggle-password"></span>
                    </div>


                </div>
                <hr>
                <button type="button" data-toggle="modal" data-target="#update_btn"
                    class="btn btn-primary">UPDATE</button>
                <a class="btn btn-secondary" onclick="location.href = document.referrer; return false;">CANCEL</a>



                <!-- Modal -->
                <div class="modal fade" id="update_btn" tabindex="-1" role="dialog"
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
                                Are you sure you want to update this person's information?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="sumbit" name="update_btn" class="btn btn-primary">Save changes</button>
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

<script>
let togglePassword = document.getElementById("toggle-password");

togglePassword.addEventListener("click", PasswordToggle);

function PasswordToggle() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
        togglePassword.classList.add("fa-eye-low-vision");
        togglePassword.classList.remove("fa-eye");
    } else {
        x.type = "password";
        togglePassword.classList.remove("fa-eye-low-vision");
        togglePassword.classList.add("fa-eye");
    }
}
</script>


<?php include('includes/footer.php') ?>
