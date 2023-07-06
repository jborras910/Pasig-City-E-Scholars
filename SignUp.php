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
        <title>Sign Up | Pasig E-Scholar</title>
        <link rel="stylesheet" type="text/css" href="css/SignUp.css?<?php echo time(); ?>" />

        <!--font awesome icon-->
        <script src="https://kit.fontawesome.com/6cea1e7bdb.js" crossorigin="anonymous"></script>
        <!--bootstrap css-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous" />
        <!--bootstrap css-->


        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


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

        input[type=tel] {

            padding-left: 60px !important;

        }

        .form-group i {
            top: 45;
            font-size: 15px !important;
            position: absolute;
            right: 55px !important;


        }

        .fa-exclamation-circle {
            visibility: hidden;
        }

        .show-error {
            visibility: visible !important;
            color: #df4759;
        }

        .text-white {
            margin-top: 10px;
            display: block !important
        }

        .hide {
            display: none !important;
        }

        .show {
            display: block !important;
        }

        p {
            color: white !important;
        }

        .modal p {
            color: black !important;
        }

        .iti {
            width: 100%;
            display: block;
        }

        .modal .btn {
            width: 100% !important;
        }




        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100% !important;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            animation-name: fadeIn;
            animation-duration: 0.5s;


        }



        /* Define the fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Add a fade-out animation to the modal */
        .modal.fadeOut {
            animation-name: fadeOut;
            animation-duration: 0.5s;
        }

        /* Define the fade-out animation */
        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }















        .modal-content {
            background-color: #fefefe;
            margin: 2% auto;
            /* 10% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 95% !important;

            /* Could be more or less, depending on screen size */
            max-width: 600px;
            /* Set a max-width to make the modal responsive */
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        </style>
    </head>

    <body style="
      background-image: url('Assets/Login_bg.png');
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
    ">



        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



        <?php if(isset($_SESSION['success_register']) && $_SESSION['success_register'] !='') :?>


        <script>
        Swal.fire({
            title: "<?php echo $_SESSION['success_register'];?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            confirmButtonText: 'DONE'
        })
        </script>


        <?php
            unset($_SESSION['success_register']);
            endif; ?>

        <!-- First Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h6>TERMS OF USE</h6>
                </div>
                <div class="modal-body">
                    <h5>
                        1. Use of PST: PST is intended for authorized users, including students, scholars,
                        administrators, and other relevant stakeholders in Pasig City. You agree to use PST solely for
                        its intended purpose and in compliance with all applicable laws and regulations. <br><br>
                        2. User Accounts: To access certain features of PST, you may need to create a user account. You
                        are responsible for maintaining the confidentiality of your account credentials, including your
                        username and password. You agree not to share your account credentials with anyone else and to
                        notify us immediately of any unauthorized use of your account. <br><br>
                        3. Privacy: PST may collect and store personal information about users, such as names, contact
                        information, and academic records, as necessary for the system's operation. By using PST, you
                        consent to the collection, storage, and use of your personal information as described in our
                        Privacy Policy. <br><br>
                        4. Content-Based Filtering Algorithm and Collaborative Algorithm: PST uses a contentbased
                        filtering algorithm and collaborative algorithm to provide personalized recommendations and
                        insights to users. You acknowledge that the accuracy and effectiveness of these algorithms may
                        depend on various factors, including the data available, and that PST does not guarantee the
                        accuracy or effectiveness of its recommendations or insights.

                    </h5>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-block" id="doneButton">I understand</button>
                    <hr>
                    <a class="btn btn-danger btn-block" href="index.php">Go Back</a>
                </div>
            </div>
        </div>

        <!-- Second Modal -->
        <div id="myModal2" class="modal">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h6>DATA PRIVACY CONSENT</h6>
                </div>
                <div class="modal-body">
                    <h5>
                        A Web-based Student E-Scholar Tracking and Management System for Pasig City (hereinafter
                        referred to as "PST") is a web-based application that utilizes content-based filtering algorithm
                        and collaborative algorithm to manage and track student e-scholars in Pasig City. We are
                        committed to protecting the privacy and security of your personal information while providing a
                        seamless user experience. This Privacy Policy outlines how we collect, use, disclose, and
                        protect your personal information when you use PST.

                        <hr>
                        The Pasig Scholar Tracker strives to comply with the Data Privacy Act of 2012 that is designed
                        to protect your privacy. We intend to adhere to the principles set forth in this Privacy
                        Statement and recognize your need for appropriate protection and management of any personal
                        information. In other words, our goal is to provide protection for your privacy regardless of
                        what types of devices or application to access our Services. By using our Services, you consent
                        to the collection, storage, processing, transferring, disclosure, and other usage of the
                        Information described in this Privacy Statement and Terms of Service Agreement.

                    </h5>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-block" id="doneButton2">I
                        understand</button>
                    <hr>
                    <a class="btn btn-danger btn-block" href="index.php">Go Back</a>
                </div>
            </div>
        </div>




        <script>
        // Get the modals
        var modal = document.getElementById("myModal");
        var modal2 = document.getElementById("myModal2");

        // Get the button that dismisses the first modal and displays the second modal
        var doneButton = document.getElementById("doneButton");

        // When the page loads, check if the first modal should be displayed
        window.onload = function() {
            if (!localStorage.getItem("dismissedModal")) {
                modal.style.display = "block";
            }
        }

        // When the user clicks the "I understand" button in the first modal, dismiss the first modal and display the second modal
        doneButton.onclick = function() {
            modal.style.display = "none";
            modal2.style.display = "block";

            // Store a flag indicating that the user has dismissed the first modal
            localStorage.setItem("dismissedModal", true);
        }

        // Get the button that dismisses the second modal
        var doneButton2 = document.getElementById("doneButton2");

        // When the user clicks the "I understand" button in the second modal, dismiss the second modal
        doneButton2.onclick = function() {
            modal2.style.display = "none";
        }
        </script>









        <div class="container form">

            <div class="form-title">
                <img src="Assets/Pasig_City_Seal_Logo.svg.png" alt="" />
                <h4>CREATE PASIG E-SCHOLAR ACCOUNT</h4>



                <hr>
            </div>

            <?php include('alert.php');?>

            <form action="Includes/Function.php" method="POST" autocomplete="off">
                <h2>Basic Information</h2>
                <div class="row p-2 ">
                    <div class="form-group col-md-6">
                        <label>First Name:</label>

                        <input
                            class=" <?php if(isset($_SESSION['error_first_name'])){echo $_SESSION['error_first_name']; unset($_SESSION['error_first_name']);}else{echo 'input';}?>"
                            value="<?php if(isset( $_SESSION['user_inputs']['First_Name'])){echo $_SESSION['user_inputs']['First_Name']; unset($_SESSION['user_inputs']['First_Name']);}?>"
                            name="First_Name" type="text" placeholder="&#xf007;  First Name..." required>

                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['fname_error_icon'])){echo $_SESSION['fname_error_icon']; unset($_SESSION['fname_error_icon']);}?>"
                            aria-hidden="true"></i>

                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name:</label>
                        <input
                            class=" <?php if(isset($_SESSION['error_last_name'])){echo $_SESSION['error_last_name']; unset($_SESSION['error_last_name']);}else{echo 'input';}?>"
                            value="<?php if(isset($_SESSION['user_inputs']['Last_Name'])){echo $_SESSION['user_inputs']['Last_Name']; unset($_SESSION['user_inputs']['Last_Name']);}?>"
                            name="Last_Name" type="text" placeholder="&#xf007;  Last Lame..." required>

                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['lname_error_icon'])){echo $_SESSION['lname_error_icon']; unset($_SESSION['lname_error_icon']);}?>"
                            aria-hidden="true"></i>


                    </div>
                    <div class="form-group col-md-6">
                        <label>Middle Name:</label>
                        <input
                            class=" <?php if(isset($_SESSION['error_middle_name'])){echo $_SESSION['error_middle_name']; unset($_SESSION['error_middle_name']);}else{echo 'input';}?>"
                            value="<?php if(isset($_SESSION['user_inputs']['Middle_Name'])){echo $_SESSION['user_inputs']['Middle_Name']; unset($_SESSION['user_inputs']['Middle_Name']);}?>"
                            name="Middle_Name" type="text" placeholder="&#xf007;  Middle name...">

                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['Mname_error_icon'])){echo $_SESSION['Mname_error_icon']; unset($_SESSION['Mname_error_icon']);}?>"
                            aria-hidden="true"></i>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Suffix:</label>
                        <input
                            class=" <?php if(isset($_SESSION['error_Suffix_name'])){echo $_SESSION['error_Suffix_name']; unset($_SESSION['error_Suffix_name']);}else{echo 'input';}?>"
                            value="<?php if(isset($_SESSION['user_inputs']['Suffix'])){echo $_SESSION['user_inputs']['Suffix']; unset($_SESSION['user_inputs']['Suffix']);}?>"
                            name="Suffix" type="text" placeholder="&#xf007;  Suffix ...">
                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['Sname_error_icon'])){echo $_SESSION['Sname_error_icon']; unset($_SESSION['Sname_error_icon']);}else{echo 'input';}?>"
                            aria-hidden="true"></i>

                    </div>

                    <div class="form-group col-md-6">
                        <label>Gender:</label>
                        <select name="Gender"
                            class="<?php if(isset($_SESSION['error_Gender_name'])){echo $_SESSION['error_Gender_name']; unset($_SESSION['error_Gender_name']);}?> form-select form-select-lg mb-3"
                            required>
                            <option class="default_select_option text-danger" value="Select Gender">Select Gender
                            </option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['Gender']) && $_SESSION['user_inputs']['Gender'] == 'Male') echo 'selected'; ?>
                                value="Male">Male</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['Gender']) && $_SESSION['user_inputs']['Gender'] == 'Female') echo 'selected'; ?>
                                value="Female">Female</option>
                        </select>

                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['Gender_error_icon'])){echo $_SESSION['Gender_error_icon']; unset($_SESSION['Gender_error_icon']);}?>"
                            aria-hidden="true"></i>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Date of birth:</label>
                        <input name="Date_of_birth"
                            class=" <?php if(isset($_SESSION['error_Date_of_birth'])){echo $_SESSION['error_Date_of_birth']; unset($_SESSION['error_Date_of_birth']);}else{echo 'input';}?>"
                            value="<?php if(isset($_SESSION['user_inputs']['Date_of_birth'])){echo $_SESSION['user_inputs']['Date_of_birth']; unset($_SESSION['user_inputs']['Date_of_birth']);}?>"
                            type="date" placeholder="&#xf007;  Date of birth..." required>
                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['Date_of_birth_icon'])){echo $_SESSION['Date_of_birth_icon']; unset($_SESSION['Date_of_birth_icon']);}?>"
                            aria-hidden="true"></i>
                    </div>
                </div>

                <h2>Address Information</h2>
                <div class="row p-2">
                    <div class="form-group col-md-4">
                        <label>House #:</label>
                        <input
                            class=" <?php if(isset($_SESSION['error_house_number_name'])){echo $_SESSION['error_house_number_name']; unset($_SESSION['error_house_number_name']);}else{echo 'input';}?>"
                            value="<?php if(isset($_SESSION['user_inputs']['house_number'])){echo $_SESSION['user_inputs']['house_number']; unset($_SESSION['user_inputs']['house_number']);}?>"
                            name="house_number" min="0" type="text" placeholder="&#xf015;  House Number...">

                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['house_number_error_icon'])){echo $_SESSION['house_number_error_icon']; unset($_SESSION['house_number_error_icon']);}?>"
                            aria-hidden="true"></i>

                    </div>
                    <div class="form-group col-md-4">
                        <label>Street:</label>
                        <input
                            class=" <?php if(isset($_SESSION['error_Street_name'])){echo $_SESSION['error_Street_name']; unset($_SESSION['error_Street_name']);}else{echo 'input';}?>"
                            value="<?php if(isset($_SESSION['user_inputs']['Street'])){echo $_SESSION['user_inputs']['Street']; unset($_SESSION['user_inputs']['Street']);}?>"
                            name="Street" type="text" placeholder="&#xf21d;  Street..." required>

                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['Street_error_icon'])){echo $_SESSION['Street_error_icon']; unset($_SESSION['Street_error_icon']);}?>"
                            aria-hidden="true"></i>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Barangay:</label>
                        <select name="barangay"
                            class="<?php if(isset($_SESSION['error_barangay_name'])){echo $_SESSION['error_barangay_name']; unset($_SESSION['error_barangay_name']);}?> form-select form-select-lg mb-3"
                            required>
                            <option class="default_select_option" value="Select Barangay">Select Barangay</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Bagong Ilog') echo 'selected'; ?>
                                value="Bagong Ilog">Bagong Ilog</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Bagong Katipunan') echo 'selected'; ?>
                                value="Bagong Katipunan">Bagong Katipunan</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Buting') echo 'selected'; ?>
                                value="Buting">Buting</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Caniogan') echo 'selected'; ?>
                                value="Caniogan">Caniogan</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Kalawaan') echo 'selected'; ?>
                                value="Kalawaan">Kalawaan</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Kapasigan') echo 'selected'; ?>
                                value="Kapasigan">Kapasigan</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Kapitolyo') echo 'selected'; ?>
                                value="Kapitolyo">Kapitolyo</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Malinao') echo 'selected'; ?>
                                value="Malinao">Malinao</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Oranbo') echo 'selected'; ?>
                                value="Oranbo">Oranbo</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Palatiw') echo 'selected'; ?>
                                value="Palatiw">Palatiw</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Pineda') echo 'selected'; ?>
                                value="Pineda">Pineda</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Sagad') echo 'selected'; ?>
                                value="Sagad">Sagad</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'San Antonio') echo 'selected'; ?>
                                value="San Antonio">San Antonio</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'San Joaquin') echo 'selected'; ?>
                                value="San Joaquin">San Joaquin</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'San Jose') echo 'selected'; ?>
                                value="San Jose">San Jose</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'San Nicolas') echo 'selected'; ?>
                                value="San Nicolas">San Nicolas</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Sta. Cruz') echo 'selected'; ?>
                                value="Sta. Cruz">Sta. Cruz</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Sta. Rosa') echo 'selected'; ?>
                                value="Sta. Rosa">Sta. Rosa</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Sto. Tomas') echo 'selected'; ?>
                                value="Sto. Tomas">Sto. Tomas</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Sumilang') echo 'selected'; ?>
                                value="Sumilang">Sumilang</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Ugong') echo 'selected'; ?>
                                value="Ugong">Ugong</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Dela Paz') echo 'selected'; ?>
                                value="Dela Paz">Dela Paz</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Manggahan') echo 'selected'; ?>
                                value="Manggahan">Manggahan</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Maybunga') echo 'selected'; ?>
                                value="Maybunga">Maybunga</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Pinagbuhatan') echo 'selected'; ?>
                                value="Pinagbuhatan">Pinagbuhatan</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Rosario') echo 'selected'; ?>
                                value="Rosario">Rosario</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'San Miguel') echo 'selected'; ?>
                                value="San Miguel">San Miguel</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Santolan') echo 'selected'; ?>
                                value="Santolan">Santolan</option>
                            <option
                                <?php if (isset($_SESSION['user_inputs']['barangay']) && $_SESSION['user_inputs']['barangay'] == 'Sta. Lucia') echo 'selected'; ?>
                                value="Sta. Lucia">Sta. Lucia</option>
                        </select>
                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['barangay_error_icon'])){echo $_SESSION['barangay_error_icon']; unset($_SESSION['barangay_error_icon']);}?>"
                            aria-hidden="true"></i>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Unit/Floor:</label>
                        <input class="input"
                            value="<?php if(isset($_SESSION['user_inputs']['Unit/Floor'])){echo $_SESSION['user_inputs']['Unit/Floor']; unset($_SESSION['user_inputs']['Unit/Floor']);}?>"
                            name="Unit/Floor" type="text" placeholder="&#xf015;  Unit/Floor...">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Building:</label>
                        <input class="input"
                            value="<?php if(isset($_SESSION['user_inputs']['Building'])){echo $_SESSION['user_inputs']['Building']; unset($_SESSION['user_inputs']['Building']);}?>"
                            name="Building" type="text" placeholder="&#xf015;  Building...">


                    </div>
                    <div class="form-group col-md-4">
                        <label>Village/Subdivision:</label>
                        <input class="input"
                            value="<?php if(isset($_SESSION['user_inputs']['Village/Subdivision'])){echo $_SESSION['user_inputs']['Village/Subdivision']; unset($_SESSION['user_inputs']['Village/Subdivision']);}?>"
                            name="Village/Subdivision" type="text" placeholder="&#xf015;  Village/Subdivision...">
                    </div>


                </div>



                <h2>Contact Information</h2>
                <div class="row p-2">
                    <div class="form-group col-md-12">
                        <label>Contact Number:</label>

                        <input name="Contact" id="phone"
                            class=" <?php if(isset($_SESSION['error_Contact'])){echo $_SESSION['error_Contact']; unset($_SESSION['error_Contact']);}else{echo 'input';}?>"
                            value="<?php if(isset($_SESSION['user_inputs']['Contact'])){echo $_SESSION['user_inputs']['Contact']; unset($_SESSION['user_inputs']['Contact']);}?>"
                            type="tel" required>

                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['error_contact_icon'])){echo $_SESSION['error_contact_icon']; unset($_SESSION['error_contact_icon']);}?>"
                            aria-hidden="true"></i>
                    </div>
                </div>





                <h2>Email Address</h2>
                <div class="row p-2">


                    <div class="form-group col-md-6">
                        <label>Email:</label>
                        <input
                            class=" <?php if(isset($_SESSION['error_email'])){echo $_SESSION['error_email']; unset($_SESSION['error_email']);}
                            else if(isset($_SESSION['error_email_2'])){ echo $_SESSION['error_email_2']; unset($_SESSION['error_email_2']);}else{echo 'input';}?>"
                            value="<?php if(isset($_SESSION['user_inputs']['email'])){echo $_SESSION['user_inputs']['email']; unset($_SESSION['user_inputs']['email']);}?>"
                            name="email" type="email" placeholder="&#xf0e0;  Email Address..." required>

                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['email_error_icon'])){echo $_SESSION['email_error_icon']; unset($_SESSION['email_error_icon']);}?>"
                            aria-hidden="true"></i>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Confirm Email Address:</label>
                        <input
                            class=" <?php if(isset($_SESSION['Confirm_email_error_email'])){echo $_SESSION['Confirm_email_error_email']; unset($_SESSION['Confirm_email_error_email']);}else{echo 'input';}?>"
                            value="<?php if(isset($_SESSION['user_inputs']['Confirm_email'])){echo $_SESSION['user_inputs']['Confirm_email']; unset($_SESSION['user_inputs']['Confirm_email']);}?>"
                            name="Confirm_email" placeholder="&#xf0e0;  Confirm Email Address..." required>



                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['Confirm_email_error_icon'])){echo $_SESSION['Confirm_email_error_icon']; unset($_SESSION['Confirm_email_error_icon']);}?>"
                            aria-hidden="true"></i>
                    </div>
                </div>

                <h2>Password</h2>
                <div class="row p-2">
                    <input type="hidden" value="scholar" name="user_type">
                    <div class="form-group col-md-6">
                        <label>Password:</label>
                        <input onkeyup="checking_password()"
                            class=" <?php if(isset($_SESSION['password_error_email'])){echo $_SESSION['password_error_email']; unset($_SESSION['password_error_email']);}else{echo 'input';}?>"
                            value="<?php if(isset($_SESSION['user_inputs']['password'])){echo $_SESSION['user_inputs']['password']; unset($_SESSION['user_inputs']['password']);}?>"
                            name="password" type="password" id="password" placeholder="&#xf023;  Password..." required>

                        <span class="fa fa-fw fa-solid fa-eye field-icon" id="toggle-password1"></span>
                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['password_error_icon'])){echo $_SESSION['password_error_icon']; unset($_SESSION['password_error_icon']);}?>"
                            aria-hidden="true"></i>

                        <label style="font-weight:600" id="chek_password" class="password-checking "></label>










                    </div>
                    <div class="form-group col-md-6">
                        <label>Confirm Password:</label>
                        <input onkeyup="confirmPassword_checking()"
                            class=" <?php if(isset($_SESSION['confirmpassword_error_email'])){echo $_SESSION['confirmpassword_error_email']; unset($_SESSION['confirmpassword_error_email']);}else{echo 'input';}?>"
                            value="<?php if(isset($_SESSION['user_inputs']['confirmpassword'])){echo $_SESSION['user_inputs']['confirmpassword']; unset($_SESSION['user_inputs']['confirmpassword']);}?>"
                            name="confirmpassword" type="password" id="password2"
                            placeholder="&#xf023;  Confirm Password..." required>
                        <span class="fa fa-fw fa-solid fa-eye field-icon" id="toggle-password2"></span>

                        <i class="fa fa-exclamation-circle 
                        <?php if(isset($_SESSION['confirmpassword_error_icon'])){echo $_SESSION['confirmpassword_error_icon']; unset($_SESSION['confirmpassword_error_icon']);}?>"
                            aria-hidden="true"></i>

                        <label id="confirm_password" class="password-checking">
                        </label>

                    </div>
                </div>

                <h2>Terms and Conditions</h2>

                <div class="text-left mt-3">
                    <h5 style="margin-left: 5px" class="text-white">
                        <input type="checkbox" value="" required>
                        I have read and comprehended the <a class="text-capitalize"
                            style="text-decoration:underline; color:#fcd116" type="button" id="myButton">terms of
                            service and the data
                            privacy statement</a>
                    </h5>



                </div>






                <hr>
                <div class="row p-2 buttons">
                    <div class="form-group col-md-6">
                        <button type="submit" name="Register_user" class="btn btn-block register">Register now</button>
                    </div>
                    <div class="form-group col-md-6">
                        <a type="button" href="login.php" class="btn btn-block cancel ">I have an Account</a>
                    </div>
                </div>
                <hr>
                <div class="form-group col-md-12 verification-form">
                    <h5>Did not recieve your verification Email? <a href="resend-email-verification.php">Click Here</a>
                    </h5>
                </div>



            </form>
        </div>

    </body>









    <script>
    var modal = document.getElementById("myModal");
    var modal2 = document.getElementById("myModal2");
    var button = document.getElementById("myButton");

    // Attach a click event listener to the button
    button.onclick = function() {

        modal.style.display = "block";
    };
    </script>






















    <script>
    function Religion_function() {
        var Selected_Religion = document.getElementById('Selected_Religion').value;
        var other = document.getElementById("other");

        if (Selected_Religion == 'Other') {

            other.classList.remove("hide");

        } else {

            other.classList.add("hide");
        }



    }














    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;
    var specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

    var lowerCaseLetters = /[a-z]/g;

    function checking_password() {
        let chek_password = document.getElementById("chek_password");
        let x = document.getElementById("password");
        if (x.value.length < 8) {
            chek_password.innerHTML = "Password should atlest 8 characters";
            chek_password.className = 'p-1  text-white'
            chek_password.style.backgroundColor = "#b00020";
            x.classList.remove("input");
            x.classList.add("error");




        } else if (!x.value.match(upperCaseLetters)) {
            chek_password.innerHTML = "need uppercase";
            chek_password.className = 'p-1  text-white'

            chek_password.style.backgroundColor = "#b00020";
            x.classList.remove("input");
            x.classList.add("error");










        } else if (!x.value.match(numbers)) {
            chek_password.innerHTML = "need number";
            chek_password.className = 'p-1  text-white'

            chek_password.style.backgroundColor = "#b00020";
            x.classList.remove("input");
            x.classList.add("error");










        } else if (!x.value.match(specialChars)) {
            chek_password.innerHTML = "need special char";
            chek_password.className = 'p-1  text-white'

            chek_password.style.backgroundColor = "#b00020";

            x.classList.remove("input");
            x.classList.add("error");



        } else if (!x.value.match(lowerCaseLetters)) {
            chek_password.innerHTML = "need lowercase ";
            chek_password.className = 'p-1  text-white'

            chek_password.style.backgroundColor = "#b00020";




            x.classList.remove("input");
            x.classList.add("error");











        } else {
            chek_password.innerHTML = "";
            chek_password.className = ''
            x.classList.remove("error");
            x.classList.add("input");

        }
    }


    function confirmPassword_checking() {
        let confirm_password = document.getElementById("confirm_password");
        let x = document.getElementById("password")
        let y = document.getElementById("password2")
        if (x.value != y.value) {
            confirm_password.innerHTML = "Password and confirm password does not match";
            confirm_password.className = 'p-1  text-white'
            y.classList.remove("input");
            y.classList.add("error");
            confirm_password.style.backgroundColor = "#b00020";

        } else {
            confirm_password.innerHTML = "";
            confirm_password.className = ''
            y.classList.remove("error");
            y.classList.add("input");
        }

    }
    </script>



    <script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        preferredCountries: ["ph"],
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
    </script>









    <script src="js/SignUp.js"></script>





    <script>
    <?php
    $location_test = $_SERVER['REMOTE_ADDR'];
        ?>
    console.log(<?php echo '$location_test;'?>);
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
