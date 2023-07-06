<!DOCTYPE html>

<?php 



include('security.php');



?>
<html lang="en">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="../Assets/Pasig_City_Seal_Logo.svg.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <head>
        <title>Admin Dashboard</title>


        <!-- datatable -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"
            rel="stylesheet">

        <!-- datatable -->
        <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">



        <!-- Summernote CSS - CDN Link -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <!-- //Summernote CSS - CDN Link -->


        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet" />



        <!--font awesome icon-->
        <script src="https://kit.fontawesome.com/6cea1e7bdb.js" crossorigin="anonymous"></script>

        <!--google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap" rel="stylesheet">

        <style>
        body,
        html {
            height: 100%;
            margin: 0;

            font-family: 'Nunito', sans-serif !important;
            color: black;
        }

        .main_admin,
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 15px !important;
            font-size: 20px;
            margin-bottom: 5px;
            box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;
            border: 1px solid gray;
            font-weight: 600;
            color: black !important;
            border-radius: 10px !important;
        }

        .logo_image {
            width: 150px !important;
            padding: 15px !important;
        }

        .nav-item {
            padding: 5px 0px !important;
        }

        .nav-item span,
        .collapse-item {

            font-size: 15px !important;
        }

        </style>



    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
