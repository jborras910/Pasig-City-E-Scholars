<?php

$page = 'Feedback | Pasig E-Scholar';
include('Head.php');
require_once 'Includes/dbconfig.php';
?>



<style>
body {
    background-image: url(assets/BackgroundTip.jpg);
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
}

.feedback-main-container {
    padding: 8% !important;
    color: white;
}

.feedback_form {
    background: #fff !important;
    padding: 20px !important;
}


.feedback-main-container h1 {
    margin-bottom: 15px !important;
}

.feedback_form {
    margin: 30px auto !important;
    width: 60%;
    box-shadow: 0 10px 5px -2px rgba(0, 0, 0, 0.2) !important;
    border-radius: 10px !important;
}

.feedback_form input,
.feedback_form textarea {
    width: 100% !important;
    padding: 10px !important;
    margin-bottom: 10px !important;


}

.form-header img {
    width: 200px !important;

}

input,
textarea {
    width: 100% !important;
    font-size: 20px !important;
    box-shadow: 0 2px 0px 0px rgba(0, 0, 0, 0.2) !important;
}





@media screen and (max-width: 1000px) {
    .feedback-main-container {
        margin-top: 35% !important;

    }

    .feedback-main-container img {
        width: 100px !important;
        margin-bottom: 10px !important;
    }

    .feedback-main-container h1 {
        font-size: 20px !important;
        margin-bottom: 5px !important;
        text-align: center !important;
    }


    .feedback-main-container p {
        text-align: center !important;
        font-size: 13px !important;
    }

    .feedback_form {
        margin-bottom: 17% !important;

    }

    .feedback_form {

        width: 100% !important;

    }

    .feedback_form input,
    .feedback_form textarea {
        font-size: 14px !important;

    }
}

</style>
<?php include('Admin/sweetAlert.php');?>
<div class="container-fluid feedback-main-container mt-5">
    <div class="container">
        <div class="row align-items-center align-content-center">

            <div class="col-md-12">
                <div class="form-header text-center text-dark">
                    <!-- <img src="Assets/PST_LOGO.png" alt=""> -->

                    <h1>Suggestions & Recommendations</h1>

                    <h5>We would like to invite you to participate in a survey that aims to gather feedback on the
                        usability
                        and effectiveness of the PST system - a Web-based Student E-Scholar Tracking and Management
                        System
                        for Pasig City that utilizes Content-based filtering and Collaborative algorithms.


                    </h5>
                </div>
                <?php if(isset($_SESSION['authenticanted'])): ?>
                <form action="Includes/Function.php" method="POST" class="feedback_form">
                    <div class="form-header text-center">
                        <h4 class="text-dark">Feedback Form
                        </h4>
                    </div>
                    <br>


                    <input type="hidden" name="email" value="<?php echo $_SESSION['auth_user']['Email'] ?>">

                    <input type="hidden" name="first_name" value="<?php echo $_SESSION['auth_user']['first_name'] ?>">

                    <input type="hidden" name="midddle_name"
                        value="<?php echo $_SESSION['auth_user']['Middle_Name'] ?>">

                    <input type="hidden" name="last_name" value="<?php echo $_SESSION['auth_user']['last_name'] ?>">



                    <textarea class="form-control" name="feedback" placeholder='Suggestions & Recommendations'
                        rows="3"><?php echo isset($_SESSION['get_feedback_data']['feedback']) ? $_SESSION['get_feedback_data']['feedback'] : ''; unset($_SESSION['get_feedback_data']['feedback']);?></textarea>
                    <button type="submit" name="get_feedback" class="btn btn-primary btn-block">Submit</button>
                </form>

                <?php else: ?>

                <form action="Includes/Function.php" method="POST" class="feedback_form">
                    <div class="form-header text-center">
                        <h4 class="text-dark">Feedback Form
                        </h4>
                    </div>
                    <br>

                    <input type="email"
                        value="<?php echo isset($_SESSION['get_feedback_data']['email']) ? $_SESSION['get_feedback_data']['email'] : ''; unset($_SESSION['get_feedback_data']['email']);?>"
                        name="email" class="form-control" placeholder="Enter email...">
                    <input type="text"
                        value="<?php echo isset($_SESSION['get_feedback_data']['first_name']) ? $_SESSION['get_feedback_data']['first_name'] : ''; unset($_SESSION['get_feedback_data']['first_name']);?>"
                        name="first_name" class="form-control" placeholder="First Name...">
                    <input type="text"
                        value="<?php echo isset($_SESSION['get_feedback_data']['midddle_name']) ? $_SESSION['get_feedback_data']['midddle_name'] : ''; unset($_SESSION['get_feedback_data']['midddle_name']);?>"
                        name="midddle_name" class="form-control" placeholder="Middle Name...">
                    <input type="text"
                        value="<?php echo isset($_SESSION['get_feedback_data']['last_name']) ? $_SESSION['get_feedback_data']['last_name'] : ''; unset($_SESSION['get_feedback_data']['last_name']);?>"
                        name="last_name" class="form-control" placeholder="Last Name...">
                    <textarea class="form-control" name="feedback" placeholder='Suggestions & Recommendations'
                        rows="3"><?php echo isset($_SESSION['get_feedback_data']['feedback']) ? $_SESSION['get_feedback_data']['feedback'] : ''; unset($_SESSION['get_feedback_data']['feedback']);?></textarea>
                    <button type="submit" name="get_feedback" class="btn btn-primary btn-block">Submit</button>
                </form>



                <?php endif; ?>










            </div>
        </div>
    </div>
</div>




<?php 


include('Footer.php');



?>
