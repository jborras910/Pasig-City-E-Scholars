<?php 
session_start();
$conn = mysqli_connect('localhost','root', '', 'project02');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PhpMailer/src/Exception.php';
require '../PhpMailer/src/PHPMailer.php';
require '../PhpMailer/src/SMTP.php';



function sendemail_verify($first_Name, $email, $verify_token)
{





$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth= true;
$mail->Username = 'jborras910@gmail.com';
$mail->Password = 'gathrquaabwitxdb';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('jborras910@gmail.com', $first_Name);
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = 'Email verification from PASIG E-SCHOLAR';
$email_firstletter = substr($email,  0, 1);

$_email_template_2 = "
<div
style='
  border: 1px solid grey;
  width: 600px;
  margin: auto;
  padding: 15px;
  text-align: center;
  background-color: #01406b;
  box-shadow: 0 8px 8px rgba(0, 0, 0, 0.5);
'
>
<img
  style='margin-top: 40px; width: 300px'
  src='https://i.postimg.cc/QtyMtwZb/login-logo.png'
  alt=''
/>
<br />
<h3
  style='color: white;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    text-transform: uppercase;
  '
>

  HI $first_Name!
</h3>
<hr />

<div
  style='
    padding: 0px 20px;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
  '
>
  <p
    style='
      color: white;

      font-family: Arial, Helvetica, sans-serif;
    '
  >
    You have Registered with
    <span style='color: #fdba1c !important'>PASIG E-SCHOLAR</span>. Verify your email address by clicking the link below:
  </p>
  <br />
  <a
    style='
      background-color: #fdba1c !important;
      padding: 10px 20px;
      font-weight: bold;
      font-family: Arial, Helvetica, sans-serif;
      box-shadow: 0 8px 8px rgba(0, 0, 0, 0.5);
      color: black;
      text-decoration: none;
    '
    href='http://localhost/Capstone_Project/verify_email.php?token=$verify_token'
    >Activate My Account</a
  >
  <br />
  <br />
  <br />
  <br />
</div>
</div>
";



$mail->Body = $_email_template_2;
$mail->send();

}



function send_password_reset($get_name, $get_email,$token){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth= true;
    $mail->Username = 'jborras910@gmail.com';
    $mail->Password = 'gathrquaabwitxdb';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('qjaborras01@tip.edu.ph', $get_name);
    $mail->addAddress($get_email);
    $mail->isHTML(true);
    $mail->Subject = 'Reset password from PASIG E-SCHOLAR';
    $_email_template = "
    <div
    style='
      border: 1px solid grey;
      width: 600px;
      margin: auto;
      padding: 15px;
      text-align: center;
      background-color: #01406b;
      box-shadow: 0 8px 8px rgba(0, 0, 0, 0.5);
    '
    >
    <img
      style='margin-top: 40px; width: 300px'
      src='https://i.postimg.cc/QtyMtwZb/login-logo.png'
      alt=''
    />
    <br />
    <h3
      style='color: white;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        text-transform: uppercase;
      '
    >
    
      HI, $get_name
    </h3>
    <hr />
    
    <div
      style='
        padding: 0px 20px;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
      '
    >
      <p
        style='
          color: white;
    
          font-family: Arial, Helvetica, sans-serif;
        '
      >
      We received a request to reset your account's password, which is why you are receiving this email. To confirm your email address, please click the link below:
      </p>
      <br />
      <a
        style='
          background-color: #fdba1c !important;
          padding: 10px 20px;
          font-weight: bold;
          font-family: Arial, Helvetica, sans-serif;
          box-shadow: 0 8px 8px rgba(0, 0, 0, 0.5);
          color: black;
          text-decoration: none;
        '
        href='http://localhost/Capstone_Project/password-change.php?token=$token&email=$get_email'
        >Reset Password Link</a
      >
      <br />
      <br />
      <br />
      <br />
    </div>
    </div>
    ";
    
    
    



    $mail->Body = $_email_template;
    $mail->send();
    
}


if(isset($_POST['Register_user'])){ 

    $First_Name =  $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Middle_Name = $_POST['Middle_Name'];
    $Suffix = $_POST['Suffix'];
    $house_number = $_POST['house_number'];
    $Street = $_POST['Street'];
    $barangay = $_POST['barangay'];
    $Unit_Floor = $_POST['Unit/Floor'];
    $Building = $_POST['Building'];
    $Village_Subdivision = $_POST['Village/Subdivision'];
    $Gender = $_POST['Gender'];
    $Date_of_birth = $_POST['Date_of_birth'];
    $Contact = $_POST['Contact'];
    $email = $_POST['email'];
    $Confirm_email = $_POST['Confirm_email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $user_type = $_POST['user_type'];
    $verify_token = md5(rand());
    $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
    $email_pattern = "/@gmail.com/";


    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    $_SESSION['user_inputs'] = [
        'First_Name' =>  $First_Name,
        'Last_Name' =>  $Last_Name,
        'Middle_Name' => $Middle_Name,
        'Suffix' => $Suffix,
        'house_number' => $house_number,
        'Street' => $Street,
        'barangay' => $barangay,
        'Unit/Floor' =>$Unit_Floor,
        'Building' => $Building,
        'Village/Subdivision' =>$Village_Subdivision,
        'Gender' => $Gender,
        'Date_of_birth' => $Date_of_birth,
        'Contact' => $Contact,
        'email' =>  $email,
        'Confirm_email' =>  $Confirm_email,
        'password' => $password,
        'confirmpassword' => $confirmpassword
    ];



  if(strlen($First_Name)<3 || strlen($First_Name) > 18 || preg_match('~[0-9]+~', $First_Name) || preg_match($pattern, $First_Name)){
        $_SESSION['status'] =  'Invalid First Name';
        $_SESSION['error_first_name'] = 'error';
        $_SESSION['fname_error_icon'] = 'show-error';


        header('Location: ../SignUp.php');
    }else if(strlen($Last_Name)<3 || strlen($Last_Name) >15 || preg_match('~[0-9]+~', $Last_Name) || preg_match($pattern , $Last_Name) || !preg_match ("/^[a-zA-z]*$/", $Last_Name) || preg_match ("/^[0-9]*$/", $Last_Name)){
        $_SESSION['status'] =  'Invalid last Name';
        $_SESSION['error_last_name'] = 'error';
        $_SESSION['lname_error_icon'] = 'show-error';

     

        header('Location: ../SignUp.php');
    }else if(preg_match('~[0-9]+~', $Middle_Name) || preg_match($pattern , $Middle_Name)){
        $_SESSION['status'] =  'Invalid Middle Name';
        $_SESSION['error_middle_name'] = 'error';
        $_SESSION['Mname_error_icon'] = 'show-error';



        header('Location: ../SignUp.php');
    }else if(preg_match('~[0-9]+~', $Suffix)){

        $_SESSION['status'] =  'Invalid Suffix';
        $_SESSION['error_Suffix_name'] = 'error';
        $_SESSION['Sname_error_icon'] = 'show-error';

     

        header('Location: ../SignUp.php');
    }else if ($house_number == null){
        

        $_SESSION['status'] =  'Invalid House Number';
        $_SESSION['error_house_number_name'] = 'error';
        $_SESSION['house_number_error_icon'] = 'show-error';

      





        header('Location: ../SignUp.php');
    }
    else if (strlen($Street) < 5 || !preg_match ("/^[a-zA-z]*$/", $Street) || preg_match($pattern , $Street)){


        $_SESSION['status'] =  'Invalid Street';
        $_SESSION['error_Street_name'] = 'error';
        $_SESSION['Street_error_icon'] = 'show-error';





        header('Location: ../SignUp.php');
    }else if ($barangay == "Select Barangay"){


        $_SESSION['status'] =  'Please select your barangay';
        $_SESSION['error_barangay_name'] = 'error';
        $_SESSION['barangay_error_icon'] = 'show-error';
      

        header("Location: ../SignUp.php");




    } else if ($Gender == 'Select Gender'){
        $_SESSION['status'] =  'Invalid Gender';
        $_SESSION['error_Gender_name'] = 'error';
        $_SESSION['Gender_error_icon'] = 'show-error';
      

        header("Location: ../SignUp.php");
    }
    
    
    
    else if (strlen($Date_of_birth) < 5 || strlen($Date_of_birth) > 13){
        
        $_SESSION['status'] =  'Invalid Birthday';
        $_SESSION['error_Date_of_birth'] = 'error';
        $_SESSION['Date_of_birth_icon'] = 'show-error';



        header("Location: ../SignUp.php");






    }
    
    else if (strlen($Contact) !=11){

        $_SESSION['status'] =  'Invalid Contact';
        $_SESSION['error_Contact'] = 'error';
        $_SESSION['error_contact_icon'] = 'show-error';




        header("Location: ../SignUp.php");
    }
    
    
    

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)  || strlen($email) <strlen('@gmail.com')){


        $_SESSION['status'] =  'Invalid Email';
        $_SESSION['error_email'] = 'error';
        $_SESSION['email_error_icon'] = 'show-error';

   


        header('Location: ../SignUp.php');

    }else if($email != $Confirm_email){


        $_SESSION['status'] =  'Email and confirm Email does not match';
        $_SESSION['Confirm_email_error_email'] = 'error';
        $_SESSION['Confirm_email_error_icon'] = 'show-error';


    
        header('Location: ../SignUp.php');
    }else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){

        $_SESSION['status'] =  'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        $_SESSION['password_error_email'] = 'error';
        $_SESSION['password_error_icon'] = 'show-error';


    
        header('Location: ../SignUp.php');

    }else if($password != $confirmpassword){
        $_SESSION['status'] =  'Passsword and Confirm Password does not match';
        $_SESSION['confirmpassword_error_email'] = 'error';
        $_SESSION['confirmpassword_error_icon'] = 'show-error';

        header('Location: ../SignUp.php');
    }
    
    else{
        
    $check_email_query = "SELECT Email FROM users_table WHERE Email='$email'";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

        if(mysqli_num_rows($check_email_query_run) >0){
            $_SESSION['status'] =  'Email is already Registered';

            $_SESSION['error_email'] = 'error';
            $_SESSION['email_error_icon'] = 'show-error';
            $_SESSION['Confirm_email_error_email'] = 'error';
            $_SESSION['Confirm_email_error_icon'] = 'show-error';




            header('Location: ../SignUp.php');

     
        }else{


            $check_contact_query = "SELECT Contact_number FROM users_table WHERE Contact_number='$Contact'";
            $check_contact_query_run = mysqli_query($conn, $check_contact_query);

            if(mysqli_num_rows($check_contact_query_run) >0){
                $_SESSION['status'] =  'Number is already registered';
    
                $_SESSION['error_Contact'] = 'error';
                $_SESSION['error_contact_icon'] = 'show-error';
    
    
    
                header('Location: ../SignUp.php');
            }else{

                $query = "INSERT INTO 
                users_table 
                (
                first_name,
                last_name,
                Middle_Name,
                Suffix,
                house_number,
                Street,
                barangay,
                Unit,
                Building,
                Village,
                gender,
                Date_of_birth,
                Contact_number,
                Email,user_type,Password,verify_token,active_status) 
                VALUES (
                '$First_Name',
                '$Last_Name',
                '$Middle_Name',
                '$Suffix',
                '$house_number',
                '$Street',
                '$barangay',
                '$Unit_Floor',
                '$Building',
                '$Village_Subdivision',
                '$Gender',
                '$Date_of_birth',
                '$Contact',
                '$email',
                '$user_type',
                '$password',
                '$verify_token',
                'active'  
                )";

        
                $query_run = mysqli_query($conn,$query);
                if($query_run){
                    unset($_SESSION['user_inputs']);
                    sendemail_verify("$First_Name", "$email","$verify_token");
                    $_SESSION['status_code'] =  'success';
                    $_SESSION['success_register'] =  'Successful! Please use the email address you used to register to verify the information you provided. Allow 4-5 minutes for email delivery confirmation.';

                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }else{
                    $_SESSION['status'] =  'Registration failed: ' . mysqli_error($conn);
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }

    }
    }


}


if(isset($_POST['resend_email_verify_btn'])){

    if(!empty(trim($_POST['resend_email']))){
        $email = mysqli_real_escape_string($conn, $_POST['resend_email']);
        if(preg_match("/^[a-zA-Z0-9]*$/", $email) ){
            $_SESSION['status'] =  'Please enter the correct email format';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit(0);

        }else{
    $checkEmail_query = "SELECT * FROM users_table WHERE Email ='$email' LIMIT 1";

    $checkEmail_query_run = mysqli_query($conn, $checkEmail_query);

    if (mysqli_num_rows($checkEmail_query_run) > 0) {
        $row = mysqli_fetch_array($checkEmail_query_run);

        if ($row['verify_status'] == '0') {
            $First_Name = $row['first_name'];
            $email = $row['Email'];
            $verify_token = $row['verify_token'];

            sendemail_verify("$First_Name", "$email", "$verify_token");
            $_SESSION['status'] =  'An email with verification instructions has been sent to your email address.';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit(0);
        } else {
            $_SESSION['status'] =  'Your email address has already been validated. Please login';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit(0);
        }
    } else {
        $_SESSION['status'] =  'Email is not registered. Register now';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
}
    }else{
        $_SESSION['status'] =  'Please enter the email field';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
}






if(isset($_POST['password_reset_link'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT * FROM users_table WHERE Email='$email'";
    $check_email_run = mysqli_query($conn, $check_email);

    if(mysqli_num_rows($check_email_run) > 0){
        $row = mysqli_fetch_array($check_email_run);

        $get_name = $row['first_name']." ".$row['last_name'];
        $get_email = $row['Email'];

        $update_token = "UPDATE users_table SET verify_token='$token' WHERE Email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($conn, $update_token );

        if($update_token_run)
        {
            send_password_reset($get_name,$get_email,$token);
            $_SESSION['status'] =  'We will send you an email with a password reset link. Please allow 4-5 minutes for email verification.';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit(0);
        }else
        {
            $_SESSION['status'] =  'Something went wrong.';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit(0);
        }



    }
    else{
        $_SESSION['status'] =  'No email found';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }

}


if(isset($_POST['Update_password'])){
    $email_update = mysqli_real_escape_string($conn, $_POST['email_update']);
    $new_password = $_POST['new_password'];
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($conn, $_POST['token']);

    $uppercase = preg_match('@[A-Z]@', $new_password);
    $lowercase = preg_match('@[a-z]@', $new_password);
    $number    = preg_match('@[0-9]@', $new_password);
    $specialChars = preg_match('@[^\w]@', $new_password);

    if(!empty($token)){
            if(!empty($email_update) && !empty($new_password) && !empty($confirm_password)){
                //checking token if valid or not 
                $check_token = "SELECT verify_token FROM users_table WHERE verify_token='$token' LIMIT 1";
                $check_token_run = mysqli_query($conn,  $check_token);
    
                if(mysqli_num_rows($check_token_run) > 0){
    
                        if($new_password !=  $confirm_password){
                            $_SESSION['status'] =  'New Password and Confirm passoword does not match';
                            header("Location: ../password-change.php?token=$token&email=$email_update");
                            exit(0);
                        }else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($new_password) < 8){
                            $_SESSION['status'] =  'Passwords must be at least 8 characters long and contain at least one upper case letter, one number, and one special character.';
                            header("Location: ../password-change.php?token=$token&email=$email_update");
                            exit(0);

                        }else{
                            $update_password = "UPDATE users_table SET Password='$new_password' WHERE verify_token='$token' LIMIT 1";
                            $update_password_run = mysqli_query($conn,  $update_password);
                            if( $update_password_run ){
                                $new_token = md5(rand())."expired";
                                $update_new_token =  "UPDATE users_table SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                                $_SESSION['status'] =  'New password Successfully updated';
                                header("Location: ../login.php");
                                exit(0); 
                            }else{
                                $_SESSION['status'] =  'Didnt not update the password. something went wrong';
                                header("Location: ../password-change.php?token=$token&email=$email_update");
                                exit(0); 
                            }
                        }
                }else{
                    $_SESSION['status'] =  'Invalid token';
                    header("Location: ../password-change.php?token=$token&email=$email_update");
                    exit(0);
                }
    
            }
            
            else{
                $_SESSION['status'] =  'All filled are mandetory';
                header("Location: ../password-change.php?token=$token&email=$email_update");
                exit(0);
            }
    }
    
    
    else{
        $_SESSION['status'] =  'You should provide an email';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
}






if(isset($_POST['College_NewApplicants_submit_btn'])){

    $user_id = $_POST['user_id'];

    $fileName = $_POST['fileName'];
    $affiliation = $_POST['affiliation'];
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $house_number = $_POST['house_number'];
    $Street = $_POST['Street'];
    $barangay = $_POST['barangay'];
    $gender = $_POST['gender'];
    $Date_of_birth = $_POST['Date_of_birth'];
    $Contact_number = $_POST['Contact_number'];
    $school = $_POST['school'];
    $scholar_type = $_POST['scholar_type'];

    //files
   
    $program = strtoupper($_POST['program']);
    $year_level = $_POST['year_level'];
    $valid_id = $_FILES['valid_id']['name'];
    $Essay = $_FILES['Essay']['name'];
    $picture = $_FILES['picture']['name'];
    $Proof_of_Enrollment = $_FILES['Proof_of_Enrollment']['name'];
    $School_ID = $_FILES['School_ID']['name'];
    $Report_Card = $_FILES['Report_Card']['name'];
    $Barangay_Residency = $_FILES['Barangay_Residency']['name'];
    $Proof_of_Income = $_FILES['Proof_of_Income']['name'];

    $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';



    
    // Query the database for emails where role is "audit"
    $get_faculty_query = "SELECT email FROM users_table WHERE user_type='Evaluator' ORDER BY RAND()";
    $get_faculty_query_result = mysqli_query($conn, $get_faculty_query);


    // Get all rows from the result set
    $rows = mysqli_fetch_all($get_faculty_query_result, MYSQLI_ASSOC);

    // Count the number of rows returned
    $num_rows = count($rows);

    // Generate a random number between 0 and the number of rows returned
    $random_index = rand(0, $num_rows - 1);

    // Get the email from the randomly selected row
    $audit_email = $rows[$random_index]['email'];

    $get_admin_fullname = "SELECT * FROM users_table WHERE Email='$audit_email'";
    $get_admin_fullname_run = mysqli_query($conn, $get_admin_fullname);
    $admin_name_row = mysqli_fetch_array($get_admin_fullname_run);
    $admin_full_name = $admin_name_row['first_name']." ".$admin_name_row['Middle_Name']." ".$admin_name_row['last_name'];

    $applicantion_reference = substr(date('y') . uniqid('', true), 0, 10); 





    if(strlen($school)<3 || preg_match('~[0-9]+~', $school) || preg_match($pattern, $school)){

        
        $_SESSION['status'] =  'Invalid School';
        $_SESSION['status_code'] =  'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }else if (strlen($program)==1 || preg_match('~[0-9]+~', $program) || preg_match($pattern, $program)){
        $_SESSION['status'] =  'Invalid Program';
        $_SESSION['status_code'] =  'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        
    $query = "
    INSERT INTO
    applicants_table 
    (
        applicantion_reference_number,
        affiliation,
        school,
        email,
        full_name,
        house_number,
        Street,
        barangay,
        gender,
        Date_of_birth,
        Contact_number,
        valid_id,
        program,
        year_level,
        Essay,
        picture,
        Proof_of_Enrollment,
        School_ID,
        Report_Card,
        Barangay_Residency,
        Proof_of_Income,
        fileName,
        scholar_type,
        assists_by,
        admin_full_name

    ) 
    VALUES 
    (
        '$applicantion_reference',
        '$affiliation',
        '$school',
        '$email',
        '$full_name',
        '$house_number',
        '$Street',
        '$barangay',
        '$gender',
        '$Date_of_birth',
        '$Contact_number',
        '$valid_id',
        '$program',
        '$year_level',
        '$Essay',
        '$picture',
        '$Proof_of_Enrollment',
        '$School_ID',
        '$Report_Card',
        '$Barangay_Residency',
        '$Proof_of_Income',
        '$fileName',
        '$scholar_type',
        '$audit_email',
        '$admin_full_name')";

    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        $path = '../Admin/upload_docu/'.$fileName;

        if(!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $valid_id_temp_file = $_FILES['valid_id']['tmp_name'];
        $Essay_temp_file = $_FILES['Essay']['tmp_name'];
        $picture_temp_file = $_FILES['picture']['tmp_name'];
        $Proof_of_Enrollment_temp_file = $_FILES['Proof_of_Enrollment']['tmp_name'];
        $School_ID_temp_file = $_FILES['School_ID']['tmp_name'];
        $Report_Card_temp_file = $_FILES['Report_Card']['tmp_name'];
        $Barangay_Residency_temp_file = $_FILES['Barangay_Residency']['tmp_name'];
        $Proof_of_Income_temp_file = $_FILES['Proof_of_Income']['tmp_name'];


        if($picture_temp_file != ''|| $valid_id_temp_file  !='' || $Essay_temp_file !='') {


            $newfilepath = $path.'/'.$_FILES['valid_id']['name'];
            $newfilepath1 = $path.'/'.$_FILES['Essay']['name'];
            $newfilepath2 = $path.'/'.$_FILES['picture']['name'];
            $newfilepath3 = $path.'/'.$_FILES['Proof_of_Enrollment']['name'];
            $newfilepath4 = $path.'/'.$_FILES['School_ID']['name'];
            $newfilepath5 = $path.'/'.$_FILES['Report_Card']['name'];
            $newfilepath6 = $path.'/'.$_FILES['Barangay_Residency']['name'];
            $newfilepath7 = $path.'/'.$_FILES['Proof_of_Income']['name'];

            move_uploaded_file($valid_id_temp_file, $newfilepath);
            move_uploaded_file($Essay_temp_file, $newfilepath1);
            move_uploaded_file($picture_temp_file, $newfilepath2);
            move_uploaded_file($Proof_of_Enrollment_temp_file, $newfilepath3);
            move_uploaded_file($School_ID_temp_file, $newfilepath4);
            move_uploaded_file($Report_Card_temp_file, $newfilepath5);
            move_uploaded_file($Barangay_Residency_temp_file, $newfilepath6);
            move_uploaded_file($Proof_of_Income_temp_file, $newfilepath7);

            $hide_form = "UPDATE users_table SET application_status='step_2' WHERE User_id='$user_id' LIMIT 1";
            $hide_form_run = mysqli_query($conn, $hide_form);

            if($hide_form_run) {

                $_SESSION['status'] =  'Successfully Submitted';
                $_SESSION['status_code'] =  'success';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['status'] =  'ERROR';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }


        } else {
            $_SESSION['status'] =  'ERROR 2';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    } else {
        $_SESSION['status'] =  'DATA SUBMMITED failed';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


}

}

if(isset($_POST['edit_user_data_btn'])){

    $User_id = $_POST['User_id'];
    $user_images = $_FILES['user_images']['name'];



    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $Middle_Name = $_POST['Middle_Name'];
    $Suffix = $_POST['Suffix'];
    $house_number = $_POST['house_number'];
    $Street = $_POST['Street'];
    $barangay = $_POST['barangay'];
    $Unit = $_POST['Unit'];
    $Building = $_POST['Building'];
    $Village = $_POST['Village'];
    $Civil_Status = $_POST['Civil_Status'];

    $Contact_number = $_POST['Contact_number'];

    $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';

    if(strlen($first_name)<3 || strlen($first_name) > 18 || preg_match('~[0-9]+~', $first_name) || preg_match($pattern, $first_name)){
        $_SESSION['status_code'] =  'error';
        $_SESSION['status'] =  'Invalid First Name';
        header('Location: ../Profile_edit.php');
    }else if(strlen($last_name)<3 || strlen($last_name) >15 || preg_match('~[0-9]+~', $last_name) || preg_match($pattern , $last_name) || !preg_match ("/^[a-zA-z]*$/", $last_name) || preg_match ("/^[0-9]*$/", $last_name)){
        $_SESSION['status_code'] =  'error';
        $_SESSION['status'] =  'Invalid Last Name';
        header('Location: ../Profile_edit.php');
    }else if(preg_match('~[0-9]+~', $Middle_Name) || preg_match($pattern , $Middle_Name)){
        $_SESSION['status_code'] =  'error';
        $_SESSION['status'] =  'Invalid Middle Name';
        header('Location: ../Profile_edit.php');
    }else if(preg_match('~[0-9]+~', $Suffix)){
        $_SESSION['status_code'] =  'error';
        $_SESSION['status'] =  'Invalid Suffix';
        header('Location: ../Profile_edit.php');
    }else if ($house_number == null){
        $_SESSION['status_code'] =  'error';
        $_SESSION['status'] =  'Invalid House Number';
        header('Location: ../Profile_edit.php');
    }else if (strlen($Street) < 5 || !preg_match ("/^[a-zA-z]*$/", $Street) || preg_match($pattern , $Street)){
        $_SESSION['status_code'] =  'error';
        $_SESSION['status'] =  'Invalid Street';
        header('Location: ../Profile_edit.php');
    }else if(strlen($Contact_number) !=11){
        $_SESSION['status_code'] =  'error';
        $_SESSION['status'] =  'Invalid Contact Number';
        header('Location: ../Profile_edit.php');
    }
    
    
    
    else{






    if(empty($user_images)) {

        $query = "UPDATE users_table
        SET 
        first_name='$first_name',
        last_name='$last_name',
        Middle_Name='$Middle_Name',
        Suffix='$Suffix',
        house_number='$house_number',
        Street='$Street',
        Unit='$Unit',
        Building='$Building',
        Village='$Village',
        barangay='$barangay',
        Contact_number='$Contact_number'
        WHERE User_id = '$User_id'";

        $query_run = mysqli_query($conn, $query);
        if($query_run) {
            $_SESSION['status_code'] =  'success';
            $_SESSION['status'] =  'PROFILE UPDATED SUCCESSFULLY';
            header('Location: ../Profile.php');
        } else {
            $_SESSION['status_code'] =  'error';
            $_SESSION['status'] =  'Error';
            header('Location: ../Profile.php');
        }

    } else {
        $query = "UPDATE users_table
        SET 
        image='$user_images',
        first_name='$first_name',
        last_name='$last_name',
        Middle_Name='$Middle_Name',
        Suffix='$Suffix',
        house_number='$house_number',
        Street='$Street',
        Unit='$Unit',
        Building='$Building',
        Village='$Village',
        barangay='$barangay',
        Contact_number='$Contact_number'
        WHERE User_id = '$User_id'";

        $query_run = mysqli_query($conn, $query);
        if($query_run) {
            move_uploaded_file($_FILES['user_images']['tmp_name'], "../Admin/Users_image/".$_FILES['user_images']['name']);
            $_SESSION['status_code'] =  'success';
            $_SESSION['status'] =  'PROFILE UPDATED SUCCESSFULLY';
            header('Location: ../Profile.php');
        } else {
            $_SESSION['status_code'] =  'error';
            $_SESSION['status'] =  'Error';
            header('Location: ../Profile.php');
        }
    }
}
}




if(isset($_POST['Renewal_Applicants_submit_btn'])){
  
    $user_id = $_POST['user_id'];

    $fileName = $_POST['fileName'];
    $affiliation = $_POST['affiliation'];
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $house_number = $_POST['house_number'];
    $Street = $_POST['Street'];
    $barangay = $_POST['barangay'];
    $gender = $_POST['gender'];
    $Date_of_birth = $_POST['Date_of_birth'];
    $Contact_number = $_POST['Contact_number'];
    $school = $_POST['school'];
    $scholar_type = $_POST['scholar_type'];

    //files
    $program = strtoupper($_POST['program']);
    $year_level = $_POST['year_level'];
    $valid_id = $_FILES['valid_id']['name'];

    $picture = $_FILES['picture']['name'];
    $Proof_of_Enrollment = $_FILES['Proof_of_Enrollment']['name'];
    $School_ID = $_FILES['School_ID']['name'];
    $Report_Card = $_FILES['Report_Card']['name'];
    $Barangay_Residency = $_FILES['Barangay_Residency']['name'];
    $Proof_of_Income = $_FILES['Proof_of_Income']['name'];


    // Query the database for emails where role is "audit"
    $get_faculty_query = "SELECT email FROM users_table WHERE user_type='Evaluator' ORDER BY RAND()";
    $get_faculty_query_result = mysqli_query($conn, $get_faculty_query);


    // Get all rows from the result set
    $rows = mysqli_fetch_all($get_faculty_query_result, MYSQLI_ASSOC);

    // Count the number of rows returned
    $num_rows = count($rows);

    // Generate a random number between 0 and the number of rows returned
    $random_index = rand(0, $num_rows - 1);

    // Get the email from the randomly selected row
    $audit_email = $rows[$random_index]['email'];



    $get_admin_fullname = "SELECT * FROM users_table WHERE Email='$audit_email'";
    $get_admin_fullname_run = mysqli_query($conn, $get_admin_fullname);
    $admin_name_row = mysqli_fetch_array($get_admin_fullname_run);
    $admin_full_name = $admin_name_row['first_name']." ".$admin_name_row['Middle_Name']." ".$admin_name_row['last_name'];

    $applicantion_reference = substr(date('y') . uniqid('', true), 0, 10); 

    if(strlen($school)<3 || preg_match('~[0-9]+~', $school) || preg_match($pattern, $school)){

        
        $_SESSION['status'] =  'Invalid School';
        $_SESSION['status_code'] =  'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }else if (strlen($program)==1 || strlen($program) > 15 || preg_match('~[0-9]+~', $program) || preg_match($pattern, $program)){
        $_SESSION['status'] =  'Invalid Program';
        $_SESSION['status_code'] =  'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{





    $query = "
    INSERT INTO
    applicants_table 
    (
        applicantion_reference_number,
        affiliation,
        school,
        email,
        full_name,
        house_number,
        Street,
        barangay,
        gender,
        Date_of_birth,
        Contact_number,
        valid_id,
        program,
        year_level,
        picture,
        Proof_of_Enrollment,
        School_ID,
        Report_Card,
        Barangay_Residency,
        Proof_of_Income,
        fileName,
        scholar_type,
        assists_by,
        admin_full_name

    ) 
    VALUES 
    (
        '$applicantion_reference',
        '$affiliation',
        '$school',
        '$email',
        '$full_name',
        '$house_number',
        '$Street',
        '$barangay',
        '$gender',
        '$Date_of_birth',
        '$Contact_number',
        '$valid_id',
        '$program',
        '$year_level',
        '$picture',
        '$Proof_of_Enrollment',
        '$School_ID',
        '$Report_Card',
        '$Barangay_Residency',
        '$Proof_of_Income',
        '$fileName',
        '$scholar_type',
        '$audit_email',
        '$admin_full_name')";

    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        $path = '../Admin/upload_docu/'.$fileName;

        if(!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $valid_id_temp_file = $_FILES['valid_id']['tmp_name'];
        $picture_temp_file = $_FILES['picture']['tmp_name'];
        $Proof_of_Enrollment_temp_file = $_FILES['Proof_of_Enrollment']['tmp_name'];
        $School_ID_temp_file = $_FILES['School_ID']['tmp_name'];
        $Report_Card_temp_file = $_FILES['Report_Card']['tmp_name'];
        $Barangay_Residency_temp_file = $_FILES['Barangay_Residency']['tmp_name'];
        $Proof_of_Income_temp_file = $_FILES['Proof_of_Income']['tmp_name'];


        if($picture_temp_file != ''|| $valid_id_temp_file  !='' || $Essay_temp_file !='') {


            $newfilepath = $path.'/'.$_FILES['valid_id']['name'];

            $newfilepath2 = $path.'/'.$_FILES['picture']['name'];
            $newfilepath3 = $path.'/'.$_FILES['Proof_of_Enrollment']['name'];
            $newfilepath4 = $path.'/'.$_FILES['School_ID']['name'];
            $newfilepath5 = $path.'/'.$_FILES['Report_Card']['name'];
            $newfilepath6 = $path.'/'.$_FILES['Barangay_Residency']['name'];
            $newfilepath7 = $path.'/'.$_FILES['Proof_of_Income']['name'];

            move_uploaded_file($valid_id_temp_file, $newfilepath);

            move_uploaded_file($picture_temp_file, $newfilepath2);
            move_uploaded_file($Proof_of_Enrollment_temp_file, $newfilepath3);
            move_uploaded_file($School_ID_temp_file, $newfilepath4);
            move_uploaded_file($Report_Card_temp_file, $newfilepath5);
            move_uploaded_file($Barangay_Residency_temp_file, $newfilepath6);
            move_uploaded_file($Proof_of_Income_temp_file, $newfilepath7);

            $hide_form = "UPDATE users_table SET application_status='step_2' WHERE User_id='$user_id' LIMIT 1";
            $hide_form_run = mysqli_query($conn, $hide_form);

            if($hide_form_run) {
                $_SESSION['status_code'] =  'success';
                $_SESSION['status'] =  'SUBMMITED SUCCESSFULLY';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                echo"error!!!!";
            }


        } else {
            echo 'Error';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }




    } else {
        $_SESSION['status'] =  'DATA SUBMMITED failed';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

     
}






if(isset($_POST['cancel_applicant_btn'])){

    $cancel_applicant_id = $_POST['cancel_applicant_id'];
    $cancel_applicant_email = $_POST['cancel_applicant_email'];


    $cancel_application_query = "DELETE FROM applicants_table WHERE id='$cancel_applicant_id'";
    $cancel_application_query_run = mysqli_query($conn,$cancel_application_query);

    if($cancel_application_query_run){


        $update_progress_query = "UPDATE users_table SET application_status='step_1' WHERE Email='$cancel_applicant_email'";
        $update_progress_query_run = mysqli_query($conn,$update_progress_query);

        if($update_progress_query_run){
            $_SESSION['status'] =  'Your application has been cancelled.';


            $_SESSION['status_code'] =  'success';
       
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['status'] =  'Your application has been cancelled. is not working at all';
            header('Location: ' . $_SERVER['HTTP_REFERER']); 
        }



    }else{
        $_SESSION['status'] =  'Your application has been cancelled is not working';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


}






if(isset($_POST['get_feedback'])){
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $midddle_name = $_POST['midddle_name'];
    $last_name = $_POST['last_name'];
    $feedback = $_POST['feedback'];



    $_SESSION['get_feedback_data'] = [
        'email' =>  $email,
        'first_name' =>  $first_name,
        'midddle_name' => $midddle_name,
        'last_name' => $last_name,
        'feedback' => $feedback
    ];






















    $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
    $email_pattern = "/@gmail.com/";

    if(strlen($first_name)<3 || strlen($first_name) > 18 || preg_match('~[0-9]+~', $first_name) || preg_match($pattern, $first_name)){
        $_SESSION['status'] =  'Invalid First Name';
        $_SESSION['status_code'] =  'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else if (strlen($last_name)<1 || strlen($last_name) > 18 || preg_match('~[0-9]+~', $last_name) || preg_match($pattern, $last_name)){
        $_SESSION['status'] =  'Invalid Last Name';
        $_SESSION['status_code'] =  'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else if (preg_match('~[0-9]+~', $midddle_name) || preg_match($pattern , $midddle_name)){
        $_SESSION['status'] =  'Invalid Middle Name';
        $_SESSION['status_code'] =  'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)  || strlen($email) <strlen('@gmail.com')){
        $_SESSION['status'] =  'Invalid Email';
        $_SESSION['status_code'] =  'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else if(strlen($feedback)<2){
        $_SESSION['status'] =  'Invalid Feedback';
        $_SESSION['status_code'] =  'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{

       $get_feedback_query = "INSERT INTO feedback (email,first_name,middle_name,last_name,feedback) VALUES ('$email','$first_name','$midddle_name','$last_name','$feedback')";


       $get_feedback_query_run = mysqli_query($conn,$get_feedback_query);

       if($get_feedback_query_run){
        $_SESSION['status'] =  'Submitted Succesfully';
        $_SESSION['status_code'] =  'success';



        unset($_SESSION['get_feedback_data']);


        header('Location: ' . $_SERVER['HTTP_REFERER']);
       }else{
        $_SESSION['status'] =  'Submitted error';
        $_SESSION['status_code'] =  'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
       }

    }

}





if(isset($_POST['resubmit_btn'])){

    date_default_timezone_set('Asia/Manila');

  
    $resubmit_date = date('Y-m-d H:i:s');



    $fileName = $_POST['fileName'];

    $school = $_POST['school'];
    $program = strtoupper($_POST['program']);

    $valid_id = $_POST['valid_id'];
    $Essay = $_POST['Essay'];
    $picture = $_POST['picture'];
    $Proof_of_Enrollment = $_POST['Proof_of_Enrollment'];
    $School_ID = $_POST['School_ID'];
    $Report_Card = $_POST['Report_Card'];
    $Barangay_Residency = $_POST['Barangay_Residency'];
    $Proof_of_Income = $_POST['Proof_of_Income'];



    $resubmit_query = "UPDATE applicants_table SET 
    Date_submitted='$resubmit_date',
    school='$school',
    program='$program',
    valid_id='$valid_id',
    Essay='$Essay',
    picture='$picture',
    Proof_of_Enrollment='$Proof_of_Enrollment',
    School_ID='$School_ID',
    Report_Card='$Report_Card',
    Barangay_Residency='$Barangay_Residency',
    Proof_of_Income='$Proof_of_Income',
    resubmit='false',
    school_resubmit='false',
    valid_id_resubmit='false',
    Essay_resubmit='false',
    picture_resubmit='false',
    Proof_of_Enrollment_resubmit='false',
    School_ID_resubmit='false',
    Report_Card_resubmit='false',
    Barangay_Residency_resubmit='false',
    Proof_of_Income_resubmit='false'
    WHERE fileName='$fileName'";

    $resubmit_query_run = mysqli_query($conn,$resubmit_query);



    if($resubmit_query_run){


        $update_user_status = "UPDATE users_table SET application_status='step_2' WHERE Email='$fileName'";
        $update_user_status_run = mysqli_query($conn,$update_user_status);

        if($update_user_status_run){

            $_SESSION['status'] =  'Submitted Successfully';
            $_SESSION['status_code'] =  'success';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['status'] =  'Submitted error';
            $_SESSION['status_code'] =  'error';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }



    }else{
        $_SESSION['status'] =  'Resubmit error';
        $_SESSION['status_code'] =  'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }















}








if(isset($_POST['change_password_btn'])){

    $user_id = $_POST['user_id'];
    $old_password = $_POST['old_password'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
  
    
    $uppercase = preg_match('@[A-Z]@', $new_password);
    $lowercase = preg_match('@[a-z]@', $new_password);
    $number    = preg_match('@[0-9]@', $new_password);
    $specialChars = preg_match('@[^\w]@', $new_password);
  
  
  
  
  
  if($old_password != $current_password){
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Old password is incorrect';
    header('Location: ../Profile.php');
  }else if ($new_password != $confirm_password){
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'New password and Confirm Password Does not match';
    header('Location: ../Profile.php');
  }else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($new_password) < 8) {
  
  
  
  
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Passwords must be at least 8 characters long and contain at least one upper case letter, one number, and one special character.';
    header('Location: ../Profile.php');
  
  
  
  
  }else {
  
  
  
  $update_password_query = "UPDATE users_table SET Password='$new_password' WHERE User_id='$user_id'";
  
  
  $update_password_query_run = mysqli_query($conn, $update_password_query);
  
  
    if($update_password_query_run){
      $_SESSION['status_code'] = 'success';
      $_SESSION['status'] =  'Password Change successfully';
      header('Location: ../Profile.php');
    }else{
      $_SESSION['status_code'] = 'error';
      $_SESSION['status'] =  'Password Change error';
      header('Location: ../Profile.php');
    }
  
  
  
  
  
  
  
  
  
  
  
  
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  }






















?>
