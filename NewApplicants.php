<?php 

    session_start(); 



    if(isset($_SESSION['auth_user']['scholar_type']) && $_SESSION['auth_user']['scholar_type'] == 'renewal') {
        header('location: RenewalApplicants.php?accessdenied');

    }
    


    $page = 'New Applicant Application Form';
    include('Includes/authentication.php');
    include('Head.php');
    require_once 'Includes/dbconfig.php';

 

    ?>




<link rel="stylesheet" type="text/css" href="css/NewApplicants.css?<?php echo time(); ?>" />

<style>
body {
    background: linear-gradient(0deg, rgba(1, 64, 107, 0.67), rgba(1, 64, 107, 0.67)), url('Assets/Background.gif');
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
}

.Affiliations {
    display: none;
}

.main {

    margin-top: 10% !important;
}

.img_congrats {
    width: 300px !important;
}

.notactive {
    background: #FFF !important;
}

.resubmit_input {
    border: 2px solid #DC3545 !important;
}

@media screen and (max-width: 1000px) {

    .main {

        margin-top: 26% !important;
    }

    .img_congrats {
        width: 100% !important;
    }
}

</style>



<div class="main">




    <?php

            $query = "SELECT * FROM  pages WHERE name='NewApplicants_form'";
    $query_run = mysqli_query($conn, $query);
    $id = $_SESSION['auth_user']['user_id'];

    if (mysqli_num_rows($query_run) > 0) {
        while ($row=mysqli_fetch_assoc($query_run)) {
            if ($row['status'] == 'active') {
                $query_2 = "SELECT * FROM  users_table WHERE User_id='$id'";
                $query_run_2 = mysqli_query($conn, $query_2);

                if (mysqli_num_rows($query_run_2) > 0) {
                    while ($row_2=mysqli_fetch_assoc($query_run_2)) {

                        $applicant_email = $row_2['Email'];
                        $query_3 = "SELECT * FROM  applicants_table WHERE email='$applicant_email'";
                        $query_run_3 = mysqli_query($conn, $query_3);
                        $row_3 = mysqli_fetch_array($query_run_3);









                        if ($row_2['application_status'] == 'step_1') {
                            ?>
    <div class="form-container">
        <form action="Includes/Function.php" method="POST" class="form" enctype="multipart/form-data">
            <input type="hidden" name="scholar_type" value="New Applicant">
            <!-- personal information -->
            <input type="hidden" name="email" value="<?php echo $_SESSION['auth_user']['Email'];?>">
            <input type="hidden" name="full_name"
                value="<?php echo $row_2['first_name']." ".$row_2['Middle_Name']." ".$row_2['last_name']." ".$row_2['Suffix'];?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['auth_user']['user_id'];?>">
            <input type="hidden" name="house_number" value="<?php echo $_SESSION['auth_user']['house_number'];?>">
            <input type="hidden" name="Street" value="<?php echo $_SESSION['auth_user']['Street'];?>">
            <input type="hidden" name="barangay" value="<?php echo $_SESSION['auth_user']['barangay'];?>">
            <input type="hidden" name="gender" value="<?php echo $_SESSION['auth_user']['gender'];?>">
            <input type="hidden" name="Date_of_birth" value="<?php echo $_SESSION['auth_user']['Date_of_birth'];?>">
            <input type="hidden" name="Contact_number" value="<?php echo $_SESSION['auth_user']['Contact_number'];?>">


            <?php if($row_2['Inbox'] != ''): ?>
            <div class="text-center">
                <button type="button" data-toggle="modal" data-target="#message" class="btn btn-danger">You Have A
                    Message From Admin</button>
                <hr>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Important Message by Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo $row_2['Inbox']?>
                        </div>
                        <div class="modal-footer">
                            <button style="width:100%" type="button" class="btn btn-secondary"
                                data-dismiss="modal">Okay</button>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="form-title text-center">
                <img class="mb-2 logo" src="Assets/PST_LOGO.png" alt="">
                <h3 class="title">Application Form for New Applicants Pasig City Scholars A.Y <span class="text-danger">
                        <?php echo bcsub(date("Y"), 1)."-".date("Y"); ?></span>
                </h3>
                <hr>
                <?php include('Admin/sweetAlert.php');?>
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
            <hr>
            <div class="active_form" id="">
                <div class="form-box-title userdata">
                    <h6 class="email mb-4 ">
                        <span class="text-danger">This will be Submmited by:</span>
                        <?php if (isset($_SESSION['authenticanted'])) {
                            echo $_SESSION['auth_user']['Email'];
                        }?>
                    </h6>
                    <h6>Please note that any documents or images uploaded to this form must comply with our platform's
                        guidelines. Users are prohibited from uploading documents or images that contain hate speech,
                        explicit content, or copyrighted material, or anything else that violates our guidelines.
                    </h6>
                    <hr>

                </div>
            </div>
            <div class="" id=''>
                <div class="form-box-title">
                    <div class="alert alert-warning" role="alert">
                        <h5>Pasig Scholarship Application Form</h5>
                    </div>
                    <div class="form-group">
                        <h5>School (e.g Technological Institute of the Philippines)</h5>
                        <input type="text" name="school" placeholder="Enter Your School Full Name...." required>
                    </div>

                    <div class="form-group">
                        <h5>Program (e.g BSIT)</h5>
                        <input type="text" name="program" placeholder="Enter Your Program...." required>
                    </div>






                    <div class="form-group">
                        <h5>Year Level</h5>
                        <select name="year_level" class="form-select" aria-label="Default select example">
                            <option selected>Select Year Level</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                            <option value="5th Year">5th Year</option>
                        </select>
                    </div>
















                    <div class="form-group">
                        <h5>Valid id</h5>
                        <input type="file" name="valid_id" accept=".png, .jpg, .jpeg" required>
                    </div>
                    <div class="form-group">
                        <h5>Essay</h5>
                        <input type="file" name="Essay" accept=".pdf" required>
                    </div>
                    <div class="form-group">
                        <h5>1X1 Picture</h5>
                        <input type="file" name="picture" accept=".png, .jpg, .jpeg" required>
                    </div>
                    <div class="form-group">
                        <h5>Proof of Enrollment (Class Assignment list, School Registration Form, Enrollment Slip, or
                            Official
                            Receipt)</h5>
                        <input type="file" name="Proof_of_Enrollment" accept=".pdf" required>
                    </div>
                    <div class="form-group">
                        <h5>School ID</h5>
                        <input type="file" name="School_ID" accept=".png, .jpg, .jpeg" required>
                    </div>
                    <div class="form-group">
                        <h5>Report Card</h5>
                        <input type="file" name="Report_Card" accept=".pdf" required>
                    </div>
                    <div class="form-group">
                        <h5>Barangay Residency</h5>
                        <input type="file" name="Barangay_Residency" accept=".png, .jpg, .jpeg" required>
                    </div>
                    <div class="form-group">
                        <h5>Proof of Income of Parent/s (or Guardian) Please put both proof of Income of Parent/s (or
                            Guardian)
                            or Certificate of non-Filing Tax return (if unumployed)</h5>
                        <input type="file" name="Proof_of_Income" accept=".pdf" required>
                    </div>
                    <input type="hidden" name="fileName" value="<?php echo $_SESSION['auth_user']['Email'] ?>">
                    <input type="hidden" name="affiliation" value="College">
                </div>
            </div>
            <div class="hidden_form" id='form11'>
                <div class="form-box-title">
                    <div class="alert alert-warning" role="alert">
                        <h5>ACCEPTANCE OF TERMS</h5>
                    </div>
                    <P>
                        We affirm that the facts herein provided are true and correct as of the date hereof.
                        We hereby authorize the Pasig City Scholars Office and its authorized representatives to verify
                        the
                        information submitted. We understand that if awarded the benefits under the PCS, any false
                        statement, omissions, or misrepresentation made in this application form may result to the
                        immediate withdrawal of the scholarship grant.</P>
                    <input name="test" type="radio" required>
                      <label>I Agree</label>
                    <br>
                    <hr>
                </div>
                <button type="submit" name="College_NewApplicants_submit_btn"
                    class="btn btn-primary btn-block p-2">SUBMIT</button>

            </div>
        </form>
    </div>

    <?php
                        } elseif($row_2['application_status'] == 'step_2') {
                            ?>



    <div class="form">

        <div class="form-title text-center">
            <img class="mb-2 logo" src="Assets/PST_LOGO.png" alt="">
            <h3 class="title">Application Form for New Applicants Pasig City Scholars A.Y <span class="text-danger">
                    <?php echo bcsub(date("Y"), 1)."-".date("Y"); ?></span>
            </h3>
            <hr>
            <?php include('Admin/sweetAlert.php');?>

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
        <hr>
        <div class="active_form text-center" id="form1">
            <div class="form-box-title userdata">
                <h1 style="color:#4BB543">You already submitted!</h1>
                <p class="mb-3">Allow the administrators some time to review your applications.</p>




                <button class="btn btn-block btn-info mb-2" data-toggle="modal" data-target="#view_application">View
                    Application</button>


                <!-- Modal -->
                <div class="modal fade" id="view_application" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-uppercase" id="exampleModalLongTitle">My Applicantion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <style>
                            .my_applicantion label {
                                border-bottom: 2px solid grey !important;
                                width: 100% !important;
                                padding: 14px !important;
                                margin-bottom: 0px !important;
                            }

                            .my_applicantion h4 {


                                padding: 10px !important;
                                background-color: #003067 !important;
                                color: white !important;


                            }

                            .border-box {
                                border-left: 2px solid grey !important;
                                border-right: 2px solid grey !important;
                                padding: 0px !important;
                            }

                            </style>
                            <div class="my_applicantion modal-body text-left">
                                <div class="border-box mb-3">
                                    <h4>Basic Information</h4>
                                    <label for="">Submitted By: <?php echo $row_3['email'] ?></label>
                                    <label for="">Date submitted:
                                        <?php echo date("F j, Y, g:i a", strtotime($row_3['Date_submitted']));?></label>

                                    <label class="text-capitalize" for="">Full Name:
                                        <?php echo $row_3['full_name'] ?></label>

                                    <label for="">Address:
                                        <?php echo $row_3['house_number']." ".$row_3['Street']." ".$row_3['barangay']; ?></label>
                                    <label for="">Contact Number: <?php echo $row_3['Contact_number'] ?></label>

                                    <label for="">Gender: <?php echo $row_3['gender'] ?></label>
                                    <label for="">School: <?php echo $row_3['school']; ?></label>
                                    <label for="">Program: <?php echo $row_3['program']; ?></label>
                                    <label for="">Year: <?php echo $row_3['year_level']; ?></label>
                                </div>



                                <div class="border-box">
                                    <h4>Documents</h4>


                                    <label for="">Valid id: <a
                                            href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['valid_id'] ?>"
                                            download="<?php echo $row_3['valid_id'] ?>">
                                            <?php echo $row_3['valid_id'] ?>
                                        </a></label>


                                    <label for="">Essay: <a
                                            href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['Essay'] ?>"
                                            download="<?php echo $row_3['Essay'] ?>">
                                            <?php echo $row_3['Essay'] ?>
                                        </a></label>

                                    <label for="">2X2 Picture: <a
                                            href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['picture'] ?>"
                                            download="<?php echo $row_3['picture'] ?>">
                                            <?php echo $row_3['picture'] ?>
                                        </a></label>


                                    <label for="">Proof of Enrollment: <a
                                            href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['Proof_of_Enrollment'] ?>"
                                            download="<?php echo $row_3['Proof_of_Enrollment'] ?>">
                                            <?php echo $row_3['Proof_of_Enrollment'] ?>
                                        </a></label>


                                    <label for="">School ID: <a
                                            href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['School_ID'] ?>"
                                            download="<?php echo $row_3['School_ID'] ?>">
                                            <?php echo $row_3['School_ID'] ?>
                                        </a></label>

                                    <label for="">Report Card: <a
                                            href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['Report_Card'] ?>"
                                            download="<?php echo $row_3['Report_Card'] ?>">
                                            <?php echo $row_3['Report_Card'] ?>
                                        </a></label>


                                    <label for="">Barangay Residency: <a
                                            href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['Barangay_Residency'] ?>"
                                            download="<?php echo $row_3['Barangay_Residency'] ?>">
                                            <?php echo $row_3['Barangay_Residency'] ?>
                                        </a></label>

                                    <label for="">Proof of Income: <a
                                            href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['Proof_of_Income'] ?>"
                                            download="<?php echo $row_3['Proof_of_Income'] ?>">
                                            <?php echo $row_3['Proof_of_Income'] ?>
                                        </a></label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-block"
                                    data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

























                <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#cancelapplication">Cancel
                    Application</button>
                <hr>
                <!-- Modal -->
                <div class="modal fade" id="cancelapplication" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">WARNING</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you certain you want to withdraw your submitted application?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                <form action="Includes/Function.php" method="POST">
                                    <input name="cancel_applicant_id" type="hidden" value="<?php echo $row_3['id'] ?>">
                                    <input name="cancel_applicant_email" type="hidden"
                                        value="<?php echo $row_3['email'] ?>">
                                    <button type="submit" name="cancel_applicant_btn" class="btn btn-danger">Cancel
                                        Application</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <h6>
                    <?php echo $row_3['applicantion_reference_number'] ?><br><span class="text-danger">Application
                        Reference
                        numbers</span></h6>
                <br>
                <h6 class="email mb-2 ">
                    <span class="text-danger">Submmited by:</span>
                    <?php if (isset($_SESSION['authenticanted'])) {
                        echo $_SESSION['auth_user']['Email'];
                    }?>
                </h6>
                <h6>
                    <span class="text-danger">Date Submitted: </span>
                    <?php    echo date("F j, Y, g:i a", strtotime($row_3['Date_submitted'])); ?>
                </h6>
                <hr>
            </div>
        </div>
    </div>





    <?php

                        } elseif($row_2['application_status'] == 'step_3') {
                            ?>

    <div class="form">
        <div class="form-title text-center">
            <img class="mb-2 logo" src="Assets/PST_LOGO.png" alt="">
            <h3 class="title">Application Form for New Applicants Pasig City Scholars A.Y <span class="text-danger">
                    <?php echo bcsub(date("Y"), 1)."-".date("Y"); ?></span>
            </h3>
            <hr>
            <?php include('alert.php');?>
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
                <p>Verify</p>
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
        <hr>
        <div class="active_form text-center" id="form1">
            <div class="form-box-title userdata">
                <h1 style="color:#4BB543">Recommending Approval</h1>

                <p><span class="text-danger">Date View:</span>
                    <?php    echo date("F j, Y, g:i a", strtotime($row_3['date_viewed'])); ?> </p>
                <p>Allow the administrators some time to review your applications.</p>
                <hr>
                <h6>
                    <?php echo $row_3['applicantion_reference_number'] ?><br><span class="text-danger">Application
                        Reference
                        numbers</span></h6>
                <br>

                <h6 class="email mb-2 ">
                    <span class="text-danger">Submmited by:</span>
                    <?php if (isset($_SESSION['authenticanted'])) {
                        echo $_SESSION['auth_user']['Email'];
                    }?>
                </h6>
                <h6>
                    <span class="text-danger">Date Submitted: </span>
                    <?php    echo date("F j, Y, g:i a", strtotime($row_3['Date_submitted'])); ?>
                </h6>
                <hr>

            </div>

        </div>
    </div>




    <?php

                        } elseif($row_2['application_status'] == 'step_4') {
                            ?>

    <div class="form">
        <div class="form-title text-center">
            <img class="mb-2 logo" src="Assets/PST_LOGO.png" alt="">
            <h3 class="title">Application Form for New Applicants Pasig City Scholars A.Y <span class="text-danger">
                    <?php echo bcsub(date("Y"), 1)."-".date("Y"); ?></span>
            </h3>
            <hr>
            <?php include('alert.php');?>
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
                <p>Verify</p>
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
        <div class="active_form text-center" id="form1">
            <div class="form-box-title userdata">
                <h1 style="color:#4BB543">Congratulations</h1>
                <p>You are now a Pasig City Scholar <?php echo $row_2['first_name'] ?>.</p>


                <hr>
                <h6><span class="text-danger">Application
                        Reference
                        numbers: </span><?php echo $row_3['applicantion_reference_number'] ?></h6>

                <h6 class="email mb-4 ">
                    <span class="text-danger">Submmited by:</span>
                    <?php if (isset($_SESSION['authenticanted'])) {
                        echo $_SESSION['auth_user']['Email'];
                    }?>
                </h6>

                <hr>


            </div>

        </div>
    </div>
    <?php
                        }elseif($row_2['application_status'] == 'failed'){
                            ?>
    <div class="form">
        <div class="form-title text-center">
            <img class="mb-2 logo" src="Assets/PST_LOGO.png" alt="">
            <h3 class="title">Application Form for New Applicants Pasig City Scholars A.Y <span class="text-danger">
                    <?php echo bcsub(date("Y"), 1)."-".date("Y"); ?></span>
            </h3>
            <hr>
            <?php include('alert.php');?>
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
                <p>Verify</p>
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
                <div class=" fa-solid fa-check">
                </div>
            </div>

        </div>
        <hr>
        <div class="active_form text-left" id="form1">
            <div class="form-box-title userdata">


                <br>


                <div>
                    <?php if(!empty($row_3['specific_disapproved_reason'])){echo "Reason for Dissapproval"."<br>".$row_3['specific_disapproved_reason'];} ?>
                    <?php if(!empty($row_3['disapproved_message'])){echo $row_3['disapproved_message'];} ?>
                    <br>
                    <br>
                    <h5><?php echo $row_3['admin_full_name']; ?></h5>
                    <h5>Date <span
                            class="text-danger"><?php echo   date("F j, Y, g:i a", strtotime($row_3['disapproved_date'])); ?></span>
                    </h5>


                </div>

                <hr>

            </div>

        </div>
    </div>


    <?php
                        }else if($row_2['application_status'] == 'resubmit'){
                            ?>

    <div class="form">
        <div class="form-title text-center">
            <img class="mb-2 logo" src="Assets/PST_LOGO.png" alt="">
            <h3 class="title">Application Form for New Applicants Pasig City Scholars A.Y <span class="text-danger">
                    <?php echo bcsub(date("Y"), 1)."-".date("Y"); ?></span>
            </h3>
            <hr>
            <?php include('alert.php');?>
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
        <hr>
        <div class="active_form text-center" id="form1">
            <div class="form-box-title userdata">


                <h2 class="text-success">RESUBMIT</h2>






                <!-- Modal -->
                <div class="modal fade" id="cancelapplication" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">WARNING</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you certain you want to withdraw your submitted application?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                <form action="Includes/Function.php" method="POST">
                                    <input name="cancel_applicant_id" type="hidden" value="<?php echo $row_3['id'] ?>">
                                    <input name="cancel_applicant_email" type="hidden"
                                        value="<?php echo $row_3['email'] ?>">
                                    <button type="submit" name="cancel_applicant_btn" class="btn btn-danger">Cancel
                                        Application</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <hr>





                <form action="Includes/Function.php" method="POST" class="text-left">
                    <div class="" id=''>
                        <div class="form-box-title">
                            <div class="alert alert-warning" role="alert">
                                <h5>Thank you for applying to Pasig City Scholars. We have evaluated your documents and
                                    would want to
                                    request that the following be resubmitted:</h5>
                            </div>
                            <hr>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info btn-block" data-toggle="modal"
                                data-target="#exampleModalCenter_resubmit_message">
                                View Message Here
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter_resubmit_message" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenter_resubmit_message" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">View Message</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div style="overflow: hidden;">
                                                <h5><?php echo $row_3['resubmit_message']; ?></h5>
                                                <br>
                                                <label for="">Respectfully yours,<br>
                                                    <?php echo $row_3['admin_full_name']; ?></label>
                                            </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-block"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <?php if ($row_3['school_resubmit'] == 'true'): ?>
                            <div class="form-group">
                                <h5>School (e.g Technological Institute of the Philippines)</h5>

                                <label class="text-primary" for=""><span class="text-danger">Previously Submitted:
                                    </span><?php echo $row_3['school']; ?></label>
                                <input placeholder="Enter Your School..." class="resubmit_input" type="text"
                                    name="school" required>
                            </div>
                            <?php else: ?>
                            <input type="hidden" name="school" value="<?php echo $row_3['school']; ?>">
                            <?php endif; ?>




                            <?php if ($row_3['program_resubmit'] == 'true'): ?>
                            <div class="form-group">
                                <h5>Program (e.g BSIT)</h5>
                                <label class="text-primary" for=""><span class="text-danger">Previously Submitted:
                                    </span><?php echo $row_3['program']; ?></label>
                                <input placeholder="Enter Your Program..." type="text" class="resubmit_input"
                                    name="program" required>
                            </div>
                            <?php else: ?>
                            <input type="hidden" name="program" value="<?php echo $row_3['program']; ?>">
                            <?php endif; ?>








                            <?php if ($row_3['valid_id_resubmit'] == 'true'): ?>
                            <div class="form-group">
                                <h5>Valid ID</h5>
                                <label for=""><span class="text-danger">Previous Upload:</span> <a
                                        href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['valid_id'] ?>"
                                        download="<?php echo $row_3['valid_id'] ?>">
                                        <?php echo $row_3['valid_id'] ?>
                                    </a></label>
                                <input class="resubmit_input" type="file" name="valid_id" accept=".png, .jpg, .jpeg"
                                    required>

                            </div>
                            <?php else: ?>
                            <input type="hidden" name="valid_id" value="<?php echo $row_3['valid_id']; ?>">
                            <?php endif; ?>

                            <?php if ($row_3['Essay_resubmit'] == 'true'): ?>
                            <div class="form-group">
                                <h5>Essay</h5>
                                <label for=""><span class="text-danger">Previous Upload:</span> <a
                                        href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['Essay'] ?>"
                                        download="<?php echo $row_3['Essay'] ?>">
                                        <?php echo $row_3['Essay'] ?>
                                    </a></label>
                                <input class="resubmit_input" type="file" name="Essay" accept=".pdf" required>
                            </div>
                            <?php else: ?>
                            <input type="hidden" name="Essay" value="<?php echo $row_3['Essay']; ?>">
                            <?php endif; ?>

                            <?php if ($row_3['picture_resubmit'] == 'true'): ?>
                            <div class="form-group">
                                <h5>1X1 Picture</h5>
                                <label for=""><span class="text-danger">Previous Upload:</span> <a
                                        href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['picture'] ?>"
                                        download="<?php echo $row_3['picture'] ?>">
                                        <?php echo $row_3['picture'] ?>
                                    </a></label>
                                <input class="resubmit_input" type="file" name="picture" accept=".png, .jpg, .jpeg"
                                    required>

                            </div>
                            <?php else: ?>
                            <input type="hidden" name="picture" value="<?php echo $row_3['picture']; ?>">
                            <?php endif; ?>



                            <?php if ($row_3['Proof_of_Enrollment_resubmit'] == 'true'): ?>
                            <div class="form-group">
                                <h5>Proof of Enrollment (Class Assignment list, School Registration Form, Enrollment
                                    Slip, or
                                    Official
                                    Receipt)</h5>
                                <label for=""><span class="text-danger">Previous Upload:</span> <a
                                        href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['Proof_of_Enrollment'] ?>"
                                        download="<?php echo $row_3['Proof_of_Enrollment'] ?>">
                                        <?php echo $row_3['Proof_of_Enrollment'] ?>
                                    </a></label>
                                <input class="resubmit_input" type="file" name="Proof_of_Enrollment" accept=".pdf"
                                    required>
                            </div>
                            <?php else: ?>
                            <input type="hidden" name="Proof_of_Enrollment"
                                value="<?php echo $row_3['Proof_of_Enrollment']; ?>">
                            <?php endif; ?>

                            <?php if ($row_3['School_ID_resubmit'] == 'true'): ?>

                            <div class="form-group">
                                <h5>School ID</h5>
                                <label for=""><span class="text-danger">Previous Upload: </span><a
                                        href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['School_ID'] ?>"
                                        download="<?php echo $row_3['School_ID'] ?>">
                                        <?php echo $row_3['School_ID'] ?>
                                    </a></label>
                                <input class="resubmit_input" type="file" name="School_ID" accept=".png, .jpg, .jpeg"
                                    required>
                            </div>
                            <?php else: ?>
                            <input type="hidden" name="School_ID" value="<?php echo $row_3['School_ID']; ?>">
                            <?php endif; ?>



                            <?php if ($row_3['Report_Card_resubmit'] == 'true'): ?>
                            <div class="form-group">
                                <h5>Report Card</h5>
                                <label for=""><span class="text-danger">Previous Upload: </span><a
                                        href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['Report_Card'] ?>"
                                        download="<?php echo $row_3['Report_Card'] ?>">
                                        <?php echo $row_3['Report_Card'] ?>
                                    </a></label>
                                <input class="resubmit_input" type="file" name="Report_Card" accept=".pdf" required>
                            </div>
                            <?php else: ?>
                            <input type="hidden" name="Report_Card" value="<?php echo $row_3['Report_Card']; ?>">
                            <?php endif; ?>

                            <?php if ($row_3['Barangay_Residency_resubmit'] == 'true'): ?>
                            <div class="form-group">
                                <h5>Barangay Residency</h5>
                                <label for=""><span class="text-danger">Previous Upload: </span> <a
                                        href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['Barangay_Residency'] ?>"
                                        download="<?php echo $row_3['Barangay_Residency'] ?>">
                                        <?php echo $row_3['Barangay_Residency'] ?>
                                    </a></label>
                                <input class="resubmit_input" type="file" name="Barangay_Residency"
                                    accept=".png, .jpg, .jpeg" required>
                            </div>
                            <?php else: ?>
                            <input type="hidden" name="Barangay_Residency"
                                value="<?php echo $row_3['Barangay_Residency']; ?>">
                            <?php endif; ?>


                            <?php if ($row_3['Proof_of_Income_resubmit'] == 'true'): ?>
                            <div class="form-group">
                                <h5>Proof of Income of Parent/s (or Guardian) Please put both proof of Income of
                                    Parent/s (or
                                    Guardian)
                                    or Certificate of non-Filing Tax return (if unumployed)</h5>
                                <label for=""><span class="text-danger">Previous Upload: </span> <a
                                        href="<?php echo "Admin/upload_docu/".$row_3['fileName']."/".$row_3['Proof_of_Income'] ?>"
                                        download="<?php echo $row_3['Proof_of_Income'] ?>">
                                        <?php echo $row_3['Proof_of_Income'] ?>
                                    </a></label>



                                <input class="resubmit_input" type="file" name="Proof_of_Income" accept=".pdf" required>
                            </div>
                            <?php else: ?>
                            <input type="hidden" name="Proof_of_Income"
                                value="<?php echo $row_3['Proof_of_Income']; ?>">
                            <?php endif; ?>


                            <input type="hidden" name="fileName" value="<?php echo $_SESSION['auth_user']['Email'] ?>">
                            <input type="hidden" name="affiliation" value="College">
                        </div>

                        <button class="btn btn-primary btn-block" type="submit" name="resubmit_btn">RESUBMIT</button>
                        <button class="btn btn-danger btn-block text-uppercase" data-toggle="modal"
                            data-target="#cancelapplication">Cancel
                            Application</button>


                    </div>
                </form>
            </div>

        </div>
    </div>

    <?php
                        }
                    }
                }
            } else {
                ?>
    <div class="container notactive">
        <div class="form-title text-center">
            <img class="mb-2 logo" src="Assets/PST_LOGO.png" alt="">
            <h3 class="title">Application Form for New Applicants Pasig City Scholars A.Y <span class="text-danger">
                    <?php echo bcsub(date("Y"), 1)."-".date("Y"); ?> </span>
                is Temporary Close
            </h3>
            <hr>
            <?php include('alert.php');?>
        </div>

        <?php echo $row['notActiveContent'] ?>
    </div>
    <?php
            }
    }
    }
    ?>
</div>


<?php





    include('Footer.php');



    ?>

<script>
var affiliation = document.querySelectorAll('.Affiliations');
var Aff_input = document.querySelectorAll('.Aff_input')

function Affiliations_function() {

    var Selected_aff = document.getElementById("Selected_aff").value;
    if (Selected_aff == '4ps') {
        let fourPs_id = document.getElementById('fourPs_id');
        affiliation.forEach(item => item.style.display = 'none')
        Aff_input.forEach(item2 => item2.value = '')
        fourPs_id.style.display = 'block';

    } else if (Selected_aff == 'PWD (Student)' || Selected_aff == "PWD (Family)") {
        let PWD_ID = document.getElementById('PWD_ID');
        affiliation.forEach(item => item.style.display = 'none')
        Aff_input.forEach(item2 => item2.value = '')
        PWD_ID.style.display = 'block';

    } else if (Selected_aff == 'SK Official') {
        let SK_Official_ID = document.getElementById('SK_Official_ID');
        affiliation.forEach(item => item.style.display = 'none')
        Aff_input.forEach(item2 => item2.value = '')
        SK_Official_ID.style.display = 'block';
    } else {
        affiliation.forEach(item => item.style.display = 'none')
        Aff_input.forEach(item2 => item2.value = '')
    }
}
</script>
