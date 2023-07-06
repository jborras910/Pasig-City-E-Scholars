<?php 
    session_start();
    if(isset($_SESSION['authenticanted'])){
        header('Location: Profile.php');
    } 
    ?>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <head>
        <link rel="icon" href="Assets/Pasig_City_Seal_Logo.svg.png">
        <title>Resend Email | Pasig E-Scholar</title>
        <link rel="stylesheet" type="text/css" href="css/SignUp.css?<?php echo time(); ?>" />

        <!--font awesome icon-->
        <script src="https://kit.fontawesome.com/6cea1e7bdb.js" crossorigin="anonymous"></script>
        <!--bootstrap css-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous" />
        <style>
        body {
            background-image: url('Assets/Login_bg.png');
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;

        }

        .form {
            width: 500px !important;
            margin-top: 120px !important;
        }

        .form-group {

            text-align: center;
            margin: 5px !important;

        }


        .form .form-group button,
        .form .form-group a {
            width: 97% !important;
            padding: 6px !important;
            font-weight: 600;


        }

        .error {
            width: 100%;
            padding: 10px 15px;

            border: 3px solid #df4759 !important;
            color: black !important;
            outline: none;
            border: none;

            box-shadow: 0 2px 0px 0px rgba(0, 0, 0, 0.2) !important;
        }

        .input {
            width: 100%;
            padding: 10px 15px;
            font-size: 18px !important;

            outline: none;
            border: none;
            color: black;
            box-shadow: 0 2px 0px 0px rgba(0, 0, 0, 0.2) !important;
        }

        @media screen and (max-width: 1000px) {
            .form {

                width: 100% !important;
            }

        }

        </style>

        <!--bootstrap css-->
    </head>

    <body>


        <div class="container form">
            <div class="form-title">
                <img src="Assets/Pasig_City_Seal_Logo.svg.png" alt="" />
                <h4>Resend Email Verification</h4>
                <hr>
            </div>
            <?php include('alert.php');?>
            <form action="Includes/Function.php" method="POST" autocomplete="off">
                <div class="row p-2">
                    <div class="form-group col-md-12 text-left">
                        <label>Email:</label>
                        <input class="input" name="resend_email" placeholder="&#xf0e0;  Email Address..." required>
                    </div>
                </div>
                <div class="row buttons ">
                    <div class="form-group col-md-12">
                        <button type="submit" name="resend_email_verify_btn"
                            class="btn btn-block register">Submit</button>
                    </div>
                    <div class="form-group col-md-12">
                        <a type="button" href="SignUp.php" class="btn cancel ">Back to the Registration</a>
                    </div>
                </div>

            </form>
        </div>

    </body>



    <script src="js/SignUp.js"></script>

    <!--bootstrap script-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!--bootstrap script-->

</html>
