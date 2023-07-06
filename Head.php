<!DOCTYPE html>
<html lang="en">

    <head lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="Assets/PST_LOGO.png">
        <title><?php echo $page; ?></title>



        <!--font awesome icon-->
        <script src="https://kit.fontawesome.com/6cea1e7bdb.js" crossorigin="anonymous"></script>

        <!--font awesome icon-->
        <script src="https://kit.fontawesome.com/6cea1e7bdb.js" crossorigin="anonymous"></script>

        <!--Bootstrap 4 stylesheet-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">






        <!--Sweet alert-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>

    <style>
    * {
        margin: 0;
        padding: 0;
        transition: all 0.8s ease;
        scroll-behavior: smooth;

    }


    #preloader {
        /* background: black; */
        width: 100%;
        position: fixed;
        height: 100vh;
        z-index: 100;
    }

    #myBtn {

        display: none;
        position: fixed;
        bottom: 100px;
        right: 100px;
        z-index: 99;
        font-size: 20px;
        border: none;
        outline: none;
        background: #dd3e2b !important;
        color: white;
        cursor: pointer;
        padding: 10px;
        width: 50px;

        box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;

    }















    .Name_logo {
        border: 1px solid #fff;
        padding: 3px 10px !important;
        text-transform: uppercase;
        margin-right: 6px !important;
        background: #dd3e2b !important;
        color: #fff !important;
        box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;

    }








    @media screen and (max-width: 1000px) {
        #myBtn {


            right: 40px;
            bottom: 130px;
        }

    }

    </style>

































    <body id="page-top">











        <button class="rounded-circle" onclick="topFunction()" id="myBtn" title="Go to top"><i
                class="fa-solid fa-arrow-up"></i></button>






        <?php     include('Navbar.php'); ?>
