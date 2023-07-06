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
        <title>Password Change | Pasig E-Scholar</title>
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

        .email_hidden {
            width: 100% !important;
            padding: 10px 15px;
            font-size: 18px !important;
            background-color: grey !important;
            color: white !important;
        }

        @media screen and (max-width: 1000px) {
            .form {
                background-color: #01406b !important;
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
                <h4>Password Change</h4>
                <hr>
            </div>
            <?php include('alert.php');?>
            <form action="Includes/Function.php" method="POST" autocomplete="off">
                <input type="hidden" name="token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
                <div class="row p-2">
                    <div class="form-group col-md-12 text-left">
                        <label>Email:</label>
                        <input type="hidden" name="email_update"
                            value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>"
                            placeholder="&#xf0e0;  Email Address..." required>

                        <input class="email_hidden" class="text-white bg-dark"
                            value="<?php if(isset($_GET['email'])){echo "&#xf0e0  ".$_GET['email'];}?>"
                            placeholder="&#xf0e0;  Email Address..." disabled="disabled">
                    </div>
                    <div class="form-group col-md-12 text-left">
                        <label>New Password:</label>
                        <input type='password' id="new_password" class="input" name="new_password"
                            placeholder="&#xf023;  New Password..." required>
                        <span class="fa fa-fw fa-solid fa-eye field-icon" id="toggle-password"></span>
                    </div>
                    <div class="form-group col-md-12 text-left">
                        <label>Confirm Password:</label>
                        <input type='password' id="confirm_password" class="input" name="confirm_password"
                            placeholder="&#xf023;   Confirm Password..." required>
                        <span class="fa fa-fw fa-solid fa-eye field-icon" id="toggle-password-2"></span>
                    </div>
                </div>
                <div class="row buttons ">
                    <div class="form-group col-md-12">
                        <button type="submit" name="Update_password" class="btn btn-block register">Update
                            Password</button>
                    </div>

                </div>

            </form>
        </div>

    </body>



    <script>
    let togglePassword = document.getElementById("toggle-password");
    let togglePassword_2 = document.getElementById("toggle-password-2");



    togglePassword.addEventListener("click", PasswordToggle);
    togglePassword_2.addEventListener("click", PasswordToggle2);

    function PasswordToggle() {
        let x = document.getElementById("new_password");
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



    function PasswordToggle2() {
        let x = document.getElementById("confirm_password");
        if (x.type === "password") {
            x.type = "text";
            togglePassword_2.classList.add("fa-eye-low-vision");
            togglePassword_2.classList.remove("fa-eye");
        } else {
            x.type = "password";
            togglePassword_2.classList.remove("fa-eye-low-vision");
            togglePassword_2.classList.add("fa-eye");
        }
    }
    </script>

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
