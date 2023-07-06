<?php 


session_start();
$page = "Profle | Pasig E-Scholar";

if(isset($_SESSION['Admin'])){
    header('location: index.php?=nope');
}


if(isset($_SESSION['auth_user']['user_id'])):
include('Head.php');
include('Includes/authentication.php');
include('Includes/dbconfig.php');









?>


<style>
.main {
    padding-top: 10% !important;
    text-transform: capitalize;


}

.card {
    width: 70% !important;
    margin-left: auto !important;
    margin-right: auto !important;
    margin-bottom: 10% !important;
}

.card img {
    width: 280px;
    border-bottom: 2px solid rgba(22, 22, 26, 0.18);
    box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;
}

.container {
    padding: 40px 10px !important;
    border-radius: 20px;

    background-color: transparent !important;



}

.title_profile {
    color: #01406b !important;
    margin-bottom: 20px !important;
}

.box li {
    list-style: none;
}






.progress-barr {
    display: flex;
    width: 100%;
}

.progress-barr .step {
    text-align: center;
    width: 100%;
}

.progress-barr .step p {
    font-size: 17px;
    font-weight: 500;
    color: #000;
}

.progress-barr .step span {
    font-weight: 500;
    line-height: 25px;
    top: 6px;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
}

.progress-barr .step .bullet {
    position: relative;
    height: 45px;
    width: 45px;
    border: 3px solid #01406b !important;
    display: inline-block;
    border-radius: 50%;
    font-weight: 500;
    font-size: 27px;
}

.progress-barr .step .fa-check {
    display: none;
}

.progress-barr .step:last-child .bullet:before,
.progress-barr .step:last-child .bullet:after {
    display: none;
}

.progress-barr .step .bullet:before,
.progress-barr .step .bullet:after {
    position: absolute;
    content: "";
    bottom: 18px;
    right: -275px;
    height: 5px;
    width: 275px;
    background: #01406b !important;
}

.done {
    background-color: #4bb543;
    color: white;
}

.title h4 {
    background: #f8f9fa !important;
    padding: 10px 0px !important;
    border-bottom: 2px solid rgba(22, 22, 26, 0.18);
    box-shadow: 0 2px 2px -2px rgba(0, 0, 0, 0.2) !important;
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
    margin-top: -27px;
    position: relative;
    font-size: 15px !important;
    color: black !important;
    font-weight: 600;
    cursor: pointer !important;



}


@media screen and (max-width: 1000px) {

    .main {
        margin-top: 25% !important;
        text-align: center;


    }

    .container {

        border-radius: none;
        border: none;
        background-color: #fff !important;
        color: black !important;

        box-shadow: none !important;
    }

    .title_profile {
        color: #01406b !important;
    }

    .card {
        width: 100% !important;
    }

    .btn {
        width: 100% !important;
    }

    .progress-barr .step .bullet:before,
    .progress-barr .step .bullet:after {
        position: absolute;
        content: "";
        bottom: 12px;
        right: -50px;
        height: 2px;
        width: 50px;
    }

    .progress-barr .step p {
        font-size: 12px;
        font-weight: 500;
        color: #000;
    }

    .progress-barr .step span {
        font-weight: 500;
        line-height: 15px;
        top: 6px;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }

    .progress-barr .step .bullet {
        position: relative;
        height: 34px;
        width: 34px;
        border: 3px solid #01406b !important;

        display: inline-block;
        border-radius: 50%;
        font-weight: 500;
        font-size: 16px;
    }

    .edit_acc {
        margin: 10px auto !important;
    }

}

</style>


<?php 

  
        $id =  $_SESSION['auth_user']['user_id'];
        $query = "SELECT * FROM users_table WHERE User_id='$id'";
        $query_run = mysqli_query($conn,$query);
    
        foreach($query_run as $row)
        {
            ?>


<div class="container-fluid main">


    <div class="card shadow mb-4">
        <div class="card-header">

            <div class="row">
                <div class="col-md-8">
                    <h3>Profile Page </h3>
                </div>
                <div class="col-md-4 btns">

                    <a type="button" href="Profile_edit.php" class="btn btn-success text-white edit_acc">EDIT
                        ACCOUNT</a>

                    <button type="button" data-toggle="modal" data-target="#reset_password_modal"
                        class="btn btn-danger text-uppercase">Change Password</button>





                    <!-- Modal -->
                    <form action="Includes/function.php" method="POST">
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
                        </div>
                    </form>
                </div>

            </div>


        </div>

        <div class="card-body">
            <?php include('Admin/sweetAlert.php');?>
            <div class="container  p-3 ">
                <div class="row align-items-center align-content-center">
                    <div class="col-md-5  text-center">
                        <div class="img mb-4 ">
                            <img class="" id="blah" src="<?php echo "Admin/Users_image/".$row['image'] ?>">
                        </div>
                    </div>
                    <div class="col-md-7  ">
                        <div class="box">
                            <h3 class="title_profile mb-2"><i class="fa-solid fa-circle-info mr-2 "></i>Personal
                                Information
                            </h3>
                            <li><span>Full Name:</span>
                                <?php echo $row['first_name']." ".$row['Middle_Name']." ".$row['last_name']." ".$row['Suffix'];?>
                            </li>
                            <li> <span>Gender: </span> <?php echo $row['gender'];?></li>

                        </div>

                        <hr>

                        <div class="box">
                            <h3 class="title_profile mb-2"><i class="fa-regular fa-address-card mr-2 "></i>Contacts</h3>

                            <li> <span>Email: </span> <?php echo $row['Email']; ?></li>
                            <li> <span>Contact Number: </span><?php echo $row['Contact_number']; ?></li>
                        </div>
                        <hr>



                        <hr>
                        <div class="box">
                            <h3 class="title_profile mb-2"><i class="fa-solid fa-location-dot mr-2"></i> Address</h3>
                            <li><?php echo $row['house_number']." ".$row['Street']." ".$row['barangay']." Pasig City";?>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <?php 
if ($row['application_status'] == 'step_1') {
    ?>
            <div class="application">
                <div class="title text-center mb-5">
                    <h4>My Application progress</h4>
                </div>
                <div class="progress-barr">

                    <div class="step ">
                        <p>Form</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>
                        <div class="fa-solid fa-check"></div>
                    </div>

                    <div class="step ">
                        <p>Submit</p>
                        <div class="bullet">
                            <span><i class="fa-solid fa-paper-plane"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Review</p>
                        <div class="bullet">
                            <span><i class="fa-solid fa-screwdriver-wrench"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Approved</p>
                        <div class="bullet">
                            <span><i class="fa-solid fa-thumbs-up"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                </div>
            </div>

            <?php }else if($row['application_status'] == 'step_2'){
?>

            <div class="application">
                <div class="title text-center mb-5">
                    <h4>My Application progress</h4>
                </div>
                <div class="text-center">
                    <h1 class="text-success">Submitted</h1>
                    <hr>
                </div>

                <div class="progress-barr">
                    <div class="step ">
                        <p>Form</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>

                    <div class="step ">
                        <p>Submit</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Review</p>
                        <div class="bullet">
                            <span><i class="fa-solid fa-screwdriver-wrench"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Approved</p>
                        <div class="bullet">
                            <span><i class="fa-solid fa-thumbs-up"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>

                </div>
            </div>

            <?php 


            }else if($row['application_status'] == 'step_3'){


                ?>




            <div class="application ">
                <div class="title text-center mb-5">
                    <h4>My Application progress</h4>
                </div>
                <div class="text-center">
                    <h1 class="text-success">Reviewing</h1>
                    <hr>
                </div>
                <div class="progress-barr">
                    <div class="step ">
                        <p>Form</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>

                    <div class="step ">
                        <p>Submit</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Review</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Approved</p>
                        <div class="bullet">
                            <span><i class="fa-solid fa-thumbs-up"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>

                </div>
            </div>


            <?php 
                
            }else if($row['application_status'] == 'step_4'){
                ?>

            <div class="application">
                <div class="title text-center mb-5">
                    <h4>My Application progress</h4>
                </div>

                <div class="text-center">
                    <h1 class="text-success">Approved</h1>
                    <hr>
                </div>
                <div class="progress-barr">
                    <div class="step ">
                        <p>Form</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>

                    <div class="step ">
                        <p>Submit</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Review</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Approved</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                </div>
                <hr>

            </div>



            <?php         

            }elseif($row['application_status'] == 'failed'){
                ?>

            <div class="application">
                <div class="title text-center mb-5">
                    <h4>My Application progress</h4>
                </div>

                <div class="text-center">
                    <h1 class="text-success">Disapproved</h1>
                    <hr>
                </div>


                <div class="progress-barr">
                    <div class="step ">
                        <p>Form</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>

                    <div class="step ">
                        <p>Submit</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Review</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Approved</p>
                        <div class="bullet bg-danger text-white">
                            <span><i class="fa-regular fa-circle-xmark"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                </div>
                <hr>

            </div>
            <?php
            }else if ($row['application_status'] =='resubmit'){

                ?>

            <div class="application">
                <div class="title text-center mb-5">
                    <h4>My Application progress</h4>
                </div>

                <div class="text-center">
                    <h1 class="text-success">RESUBMIT</h1>
                    <hr>
                </div>
                <div class="progress-barr">
                    <div class="step ">
                        <p>Form</p>
                        <div class="bullet done">
                            <span><i class="fa-regular fa-circle-check"></i></span>
                        </div>
                        <div class="fa-solid fa-check"></div>
                    </div>

                    <div class="step ">
                        <p>Submit</p>
                        <div class="bullet">
                            <span><i class="fa-solid fa-paper-plane"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Verify</p>
                        <div class="bullet">
                            <span><i class="fa-solid fa-screwdriver-wrench"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                    <div class="step">
                        <p>Approved</p>
                        <div class="bullet">
                            <span><i class="fa-solid fa-thumbs-up"></i></span>
                        </div>

                        <div class="fa-solid fa-check"></div>
                    </div>
                </div>
            </div>


            <?php
            }

?>






            <div class="title text-center mt-5"><a href="application_form.php" class="btn btn-primary">View My
                    Application</a></div>






















        </div>
    </div>
</div>

</div>


<?php
        }
    
    
    ?>

<?php 
include('Footer.php');
    else:
        header('location: index.php');
?>

<?php endif; ?>
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
