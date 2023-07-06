<?php 
    
    require_once 'Includes/dbconfig.php';
    session_start();

    if(isset($_SESSION['authenticanted'])){
        header('Location: Profile.php');
    }
   

    ?>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <head>
        <link rel="icon" href="Assets/Pasig_City_Seal_Logo.svg.png">
        <title>Login | Pasig E-Scholar</title>
        <link rel="stylesheet" type="text/css" href="css/login.css?<?php echo time(); ?>" />

        <!--font awesome icon-->
        <script src="https://kit.fontawesome.com/6cea1e7bdb.js" crossorigin="anonymous"></script>
        <!--bootstrap css-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous" />
        <!--bootstrap css-->






        <style>
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

        </style>


    </head>

    <body style="
      background-image: url('Assets/Login_bg.png');
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
    ">






        <div class="container rounded ">

            <div class="logo text-center">
                <img src="Assets/login_logo.png" alt="" />
                <hr>
                <h4><span class="auto-input"></span></h4>


            </div>
            <div class="form">
                <form action="Includes/loginFunction.php" method="POST" autocomplete="off">
                    <div class="logo-form">
                        <img src="Assets/Pasig_City_Seal_Logo.svg.png" alt="" />
                        <h4>Welcome to Pasig E-Scholar</h4>

                        <hr>
                    </div>
                    <h4 class="login_here">Login <span>Here</span></h4>


                    <div class="form-group">
                        <input class="input" placeholder="&#xf0e0; Email..." name="email" type="email"
                            value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email']; unset($_SESSION['email']);}?>">
                    </div>
                    <div class="form-group">
                        <input
                            class="<?php if(isset($_SESSION['error'])){echo $_SESSION['error']; unset($_SESSION['error']);}else{echo 'input';}?>"
                            name="password" type="password" value="" id="password" placeholder="&#xf023;  Password..."
                            required>


                        <span class="fa fa-fw fa-solid fa-eye field-icon" id="toggle-password"></span>
                    </div>
                    <button name="Login" type="submit" class="login ">Login</button>
                    <label class="forgot_password">Forgot password? <a href="password-reset.php">Click Here</a></label>
                    <?php include('alert.php');?>
                    <hr>
                    <?php echo "<a href='".$client->createAuthUrl()."' class='btn btn-google'><i class='fa-brands fa-google'></i>Login with Google</a>"; ?>

                    <hr>
                    <div class="form-footer">
                        <h6 class="h4"> Don't have an account? <a href="SignUp.php">Register here</a></h6>
                        <h6 class="h4"><a href="dashboard.php">Go back to the page</a></h6>

                    </div>
                </form>

            </div>
        </div>
    </body>


    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <script>
    let typed = new Typed(".auto-input", {
        strings: ["Welcome to Pasig E-Scholarship!", "You can apply scholarship here!"],
        typeSpeed: 40,
        backSpeed: 100,
        loop: true,
    });
    </script>



    <!-- 

    <script>
    var loader = document.getElementById('preloader');




    window.addEventListener('load', setTimeout(function() {
        loader.style.display = 'none';

    }, 1500));
    </script> -->










    <script src="js/login.js"></script>

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
