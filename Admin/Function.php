<?php 
session_start();
$conn = mysqli_connect('localhost','root', '', 'project02');

date_default_timezone_set('Asia/Manila');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PhpMailer/src/Exception.php';
require '../PhpMailer/src/PHPMailer.php';
require '../PhpMailer/src/SMTP.php';

function resubmit_email($applicants_email, $applicant_full_name, $resubmit_message){
  
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth= true;
  $mail->Username = 'jborras910@gmail.com';
  $mail->Password = 'gathrquaabwitxdb';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  $mail->setFrom('no-reply@pasigscholar.co', $applicant_full_name);
  $mail->addAddress($applicants_email);
  $mail->isHTML(true);
  $mail->Subject = 'SCHOLARSHIP APPLICANTION PROGRESS';
  $email_firstletter = substr($applicants_email,  0, 1);


  $_email_template_5 = "
  <div
  style='
    border: 4px solid #01406b;
    width: 600px;
    margin: auto;
    padding: 15px;
    text-align: center;

    box-shadow: 0 8px 8px rgba(0, 0, 0, 0.5);
  '
  >
  <img
    style='margin-top: 40px; width: 260px'
    src='https://i.ibb.co/NyK4gQK/PST-LOGO.jpg'
    alt=''
  />
  <br />
  <h3
    style='color: #01406b;
      font-weight: bold;
      font-family: Arial, Helvetica, sans-serif;
      text-transform: uppercase;
    '
  >
  
    HI, $applicant_full_name!
  </h3>
  <hr />
  
  <div
    style='
      padding: 0px 20px;
      font-weight: bold;
      font-family: Arial, Helvetica, sans-serif;
    '
  >
    <h4
      style='
        color: #01406b;
  
        font-family: Arial, Helvetica, sans-serif;
      '
    >
    $resubmit_message
    </h4>
    <br />
    <a
      style='
        background: #dd3e2b !important;
      
        padding: 10px 20px;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        box-shadow: 0 8px 8px rgba(0, 0, 0, 0.5);
        color: white;
        text-decoration: none;
      '
      href='http://localhost/Pasig City E-Scholars/login.php'
      >View Application Here</a
    >
    <br />
    <br />
    <br />
    <br />
   
  </div>
  </div>
  ";

  $mail->Body = $_email_template_5;
  $mail->send();

  

}


function sendemail_approved($applicants_email, $full_name){


  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth= true;
  $mail->Username = 'jborras910@gmail.com';
  $mail->Password = 'gathrquaabwitxdb';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  $mail->setFrom('jborras910@gmail.com', $full_name);
  $mail->addAddress($applicants_email);
  $mail->isHTML(true);
  $mail->Subject = 'SCHOLARSHIP APPLICANTION RESULT';
  $email_firstletter = substr($applicants_email,  0, 1);

  $_email_template_4 = "
  <div
  style='
    border: 4px solid #01406b;
    width: 600px;
    margin: auto;
    padding: 15px;
    text-align: center;

    box-shadow: 0 8px 8px rgba(0, 0, 0, 0.5);
  '
  >
  <img
    style='margin-top: 40px; width: 260px'
    src='https://i.ibb.co/NyK4gQK/PST-LOGO.jpg'
    alt=''
  />
  <br />
  <h3
    style='color: #01406b;
      font-weight: bold;
      font-family: Arial, Helvetica, sans-serif;
      text-transform: uppercase;
    '
  >
  
    HI, $full_name!
  </h3>
  <hr />
  
  <div
    style='
      padding: 0px 20px;
      font-weight: bold;
      font-family: Arial, Helvetica, sans-serif;
    '
  >
    <h4
      style='
        color: #01406b;
  
        font-family: Arial, Helvetica, sans-serif;
      '
    >
    We are pleased to inform you that you have successfully passed the scholarship application requirements. Congratulations on your achievement! 
    We will be in touch shortly with further details on the next steps of the scholarship process. Until then, keep up the good work.
    </h4>
    <br />
    <a
      style='
        background: #dd3e2b !important;
      
        padding: 10px 20px;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        box-shadow: 0 8px 8px rgba(0, 0, 0, 0.5);
        color: white;
        text-decoration: none;
      '
      href='http://localhost/Pasig City E-Scholars/login.php'
      >View Application Here</a
    >
    <br />
    <br />
    <br />
    <br />
   
  </div>
  </div>
  ";

  $mail->Body = $_email_template_4;
  $mail->send();



}


function sendemail_disapproval($applicants_email, $dissaproved_message, $full_name){


    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth= true;
    $mail->Username = 'jborras910@gmail.com';
    $mail->Password = 'gathrquaabwitxdb';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('jborras910@gmail.com', $full_name);
    $mail->addAddress($applicants_email);
    $mail->isHTML(true);
    $mail->Subject = 'SCHOLARSHIP APPLICANTION RESULT';
    $email_firstletter = substr($applicants_email,  0, 1);


    $_email_template_3 = "
    <div
    style='
      border: 4px solid #01406b;
      width: 600px;
      margin: auto;
      padding: 15px;
      text-align: center;

      box-shadow: 0 8px 8px rgba(0, 0, 0, 0.5);
    '
    >
    <img
      style='margin-top: 40px; width: 260px'
      src='https://i.ibb.co/NyK4gQK/PST-LOGO.jpg'
      alt=''
    />
    <br />
    <h3
      style='color: #01406b;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        text-transform: uppercase;
      '
    >
    
      HI, $full_name!
    </h3>
    <hr />
    
    <div
      style='
        padding: 0px 20px;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
      '
    >
      <h4
        style='
          color: #01406b;
    
          font-family: Arial, Helvetica, sans-serif;
        '
      >
      $dissaproved_message
      </h4>
      <br />
      <a
        style='
          background: #dd3e2b !important;
        
          padding: 10px 20px;
          font-weight: bold;
          font-family: Arial, Helvetica, sans-serif;
          box-shadow: 0 8px 8px rgba(0, 0, 0, 0.5);
          color: white;
          text-decoration: none;
        '
        href='http://localhost/Pasig City E-Scholars/login.php'
        >View Application Here</a
      >
      <br />
      <br />
      <br />
      <br />
     
    </div>
    </div>
    ";

    $mail->Body = $_email_template_3;
    $mail->send();

}













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
$mail->setFrom('qjaborras01@tip.edu.ph', $first_Name);
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = 'Email verification from PASIG E-SCHOLAR';
$email_firstletter = substr($email,  0, 1);

$_email_template_2 = "
<div
style='
border: 4px solid #01406b;
width: 600px;
margin: auto;
padding: 15px;
text-align: center;

box-shadow: 0 8px 8px rgba(0, 0, 0, 0.5);
'
>
<img
style='margin-top: 40px; width: 260px'
src='https://i.ibb.co/NyK4gQK/PST-LOGO.jpg'
alt=''
/>
<br />
<h3
style='color: #01406b;
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
  <p style='color: #01406b;font-family: Arial, Helvetica, sans-serif;'>
    You have been Invited to
    <span style='color: #fdba1c !important'>PASIG E-SCHOLAR</span> as an one of the admin. Please
    verify your email address by clicking the link below:
  </p>
  <br />
  <a
  style='
  background: #dd3e2b !important;

  padding: 10px 20px;
  font-weight: bold;
  font-family: Arial, Helvetica, sans-serif;
  box-shadow: 0 8px 8px rgba(0, 0, 0, 0.5);
  color: white;
  text-decoration: none;
'
    href='http://localhost/Pasig City E-Scholars/verify_email.php?token=$verify_token'
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





























if(isset($_POST['register_user'])){
    $first_name= $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $Suffix = $_POST['Suffix'];
    $usersEmail = $_POST['usersEmail'];
    $ConfirmUsersEmail = $_POST['ConfirmUsersEmail'];
    $usertype = $_POST['usertype'];
    $password = $_POST['password'];
    $Confirm_password = $_POST['Confirm_password'];
    $user_images = $_FILES['user_images']['name'];
    $verify_token = md5(rand());



    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    

    $_SESSION['hold_inputs'] = [
      'first_name' =>  $first_name,
      'last_name' =>  $last_name,
      'middle_name' => $middle_name,
      'Suffix' => $Suffix,
      'usersEmail' => $usersEmail,
      'ConfirmUsersEmail' => $ConfirmUsersEmail,
      'usertype' => $usertype,
      'password' => $password,
      'Confirm_password' => $Confirm_password
  ];


    if(empty($first_name) || empty($last_name) || empty($usersEmail) || empty($ConfirmUsersEmail) || empty($usertype) || empty($password)){

        $_SESSION["status"] = 'Some input are empty';
        $_SESSION['status_code'] = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
      $_SESSION['status'] =  'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
      header('Location: ' . $_SERVER['HTTP_REFERER']);

    }else if ($usertype =='Select Role'){
      $_SESSION["status"] = 'Please Select Role';
      $_SESSION['status_code'] = 'error';
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      
    }
    else{

      $check_email_query = "SELECT Email FROM users_table WHERE Email='$usersEmail'";
      $check_email_query_run = mysqli_query($conn, $check_email_query);
if(mysqli_num_rows($check_email_query_run) >0) {

  $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Email is already registered';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
  
        unset($_SESSION['hold_inputs']);
        $check_email_query = "SELECT Email FROM users_table WHERE Email='$usersEmail'";
        $check_email_query_run = mysqli_query($conn, $check_email_query);
        if(mysqli_num_rows($check_email_query_run) >0){
            $_SESSION["status"] = 'Email is already taken';
            $_SESSION['status_code'] = 'error';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $query = "INSERT INTO 
            users_table (first_name,last_name,Middle_Name,Suffix,Email,user_type,Password,image,verify_token,active_status) 
            VALUES (
            '$first_name',
            '$last_name',
            '$middle_name',
            '$Suffix',
            '$usersEmail',
            '$usertype',
            '$password',
            '$user_images',
            '$verify_token',
            'active'
            )";

            $query_run = mysqli_query($conn,$query);
            if($query_run){
                sendemail_verify("$first_name", "$usersEmail","$verify_token");
                move_uploaded_file($_FILES['user_images']['tmp_name'],"Users_image/".$_FILES['user_images']['name']);
                $_SESSION['status_code'] = 'success';
                $_SESSION["status"] =  'Sucessfull! please verify the email address';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }else{
                $_SESSION['status'] =  'Registration failed';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }

        }

    }
}
}



if(isset($_POST['update_btn'])){
   
    $User_id = $_POST['User_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $Suffix = $_POST['Suffix'];
    $usertype = $_POST['usertype'];
    $edit_user_images = $_FILES['user_images']['name'];
    $image_name = $_POST['image_name'];


 

if(empty($edit_user_images)){

    $query = "UPDATE users_table
    SET 
    first_name='$first_name',
    last_name	='$last_name',
    Middle_Name='$middle_name',
    Suffix='$Suffix',
    user_type='$usertype',
    image='$image_name'
    WHERE User_id = '$User_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
      
      if($usertype == 'scholar'){
        $_SESSION['status_code'] = 'success';
        $_SESSION["status"] = "Update Successfully";
        header('Location: users.php');
      }else{
        $_SESSION['status_code'] = 'success';
        $_SESSION["status"] = "Update Successfully";
        header('Location: Faculty.php');
      }



  

    }else{
      $_SESSION['status_code'] = 'error';
      $_SESSION["status"] = "Your data is not Updated";
      header('Location: users.php');
    }
}else{
    $query = "UPDATE users_table
    SET 
    first_name='$first_name',
    last_name	='$last_name',
    Middle_Name='$middle_name',
    Suffix='$Suffix',
    user_type='$usertype',
    image='$edit_user_images'
    WHERE User_id = '$User_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
      move_uploaded_file($_FILES['user_images']['tmp_name'],"Users_image/".$_FILES['user_images']['name']);
      if($usertype == 'scholar'){
        $_SESSION['status_code'] = 'success';
        $_SESSION["status"] = "Updated Successfully";
        header('Location: users.php');
      }else{
        $_SESSION['status_code'] = 'success';
        $_SESSION["status"] = "Update Successfully";
        header('Location: Faculty.php');
      }

    }else{
      $_SESSION['status_code'] = 'error';
      $_SESSION["status"] = "Your data is not Updated";
      header('Location: users.php');
    }
}



}



if(isset($_POST['delete_btn'])){



    $id = $_POST['delete_id'];
    $usertype = $_POST['usertype'];

    if($usertype == 'Main_Admin'){
      $_SESSION['status_code'] = 'success';
        $_SESSION["status"] = "User cannot deleted the main admin";
        header('Location: users.php' );
    }else{
        $query = "UPDATE users_table 
        SET 
        active_status='deleted',verify_status='0' WHERE User_id='$id'";
        $query_run = mysqli_query($conn,$query);
    
        if($query_run){
          $_SESSION['status_code'] = 'success';
            $_SESSION["status"] = "Deactivate Account Successfully";
            header('Location: users.php' );
        }else{
          $_SESSION['status_code'] = 'error';
            $_SESSION["status"] = "Your data is NOT DELETED";
            header('Location: users.php' );
        }
    }

}


if(isset($_POST['restore_btn'])){
    $User_id = $_POST['Restore_User_id'];

    $query = "UPDATE users_table
    SET 
    active_status='active',verify_status='1' WHERE User_id='$User_id'";
        $query_run = mysqli_query($conn,$query);

        if($query_run){
          $_SESSION['status_code'] = 'success';
            $_SESSION["status"] = "User Successfully Restored.";
            header('Location: users.php' );
        }else{
          $_SESSION['status_code'] = 'error';
            $_SESSION["status"] = "Your data is NOT Restored";
            header('Location: users.php' );
        }

}

if(isset($_POST['permanent_data_deleted'])){
    $User_id = $_POST['Restore_User_id'];
    $applicants_email = $_POST['applicants_email'];
    $query = "DELETE FROM users_table WHERE User_id=$User_id;";

  $query_run = mysqli_query($conn,$query);

  if($query_run){


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

    $update_audit = "UPDATE applicants_table SET assists_by='$audit_email' WHERE assists_by='$applicants_email'";
    $update_audit_run = mysqli_query($conn, $update_audit);


    if($update_audit_run){
      $_SESSION['status_code'] = 'success';
      $_SESSION["status"] = "User deleted successfully";
      header('Location: Recycle.php' );
    }else{
      $_SESSION['status_code'] = 'error';
      $_SESSION["status"] = "Your data is not deleted";
      header('Location: Recycle.php' );
    }
    




 
}else{
  $_SESSION['status_code'] = 'error';
    $_SESSION["status"] = "Your data is NOT deleted";
    header('Location: restore.php' );
}
  
}


if(isset($_POST['New_applicants_notActiveContent_btn'])){
    $notActiveContent = $_POST['notActiveContent'];


    $query = "UPDATE pages SET notActiveContent='$notActiveContent' WHERE name='NewApplicants_form'";
    $query_run = mysqli_query($conn,$query);

if ($query_run) {
  $_SESSION['status_code'] = 'Page Updated Successfully';
  $_SESSION['status'] = 'Page updated';
    header('Location: NewApplicants.php?=dataUpdated');
}else{
  $_SESSION['status_code'] = 'error';
  $_SESSION['status'] = 'Page updated';
    header('Location: NewApplicants.php?=dataNotUpdated');
}


}



if(isset($_POST['Publish_NewApplicants_form'])){
    $query = "UPDATE pages SET status='active' WHERE name='NewApplicants_form'";
    $query_run = mysqli_query($conn,$query);
    if ($query_run) {
      $_SESSION['status_code'] = 'Publish Successfully';
      $_SESSION['status'] = 'Page updated';
        header('Location: NewApplicants.php?=dataUpdated');
    }else{
      $_SESSION['status_code'] = 'success';
      $_SESSION['status'] = 'Page not updated';
        header('Location: NewApplicants.php?=dataNotUpdated');
    }
    
}






if(isset($_POST['Unpublish_NewApplicants_form'])){
    $query = "UPDATE pages SET status='Notactive' WHERE name='NewApplicants_form'";

    $query_run = mysqli_query($conn,$query);
    if ($query_run) {
      $_SESSION['status_code'] = 'success';
      $_SESSION['status'] = 'Page updated Successfully';
        header('Location: NewApplicants.php?=dataUpdated');
    }else{
      $_SESSION['status_code'] = 'error';
      $_SESSION['status'] = 'Page not updated';
        header('Location: NewApplicants.php?=dataNotUpdated');
    }
}



if(isset($_POST['resubmit_btn'])){

    $applicants_email = $_POST['applicants_email'];
    $applicants_id = $_POST['applicants_id'];
    $applicant_full_name = $_POST['applicant_full_name'];
    $resubmit_message = $_POST['resubmit_message'];

    $selectedValues = $_POST['checkbox'];
    $new_value = "true"; // replace this with the new value you want to set
    $update_user_stats = "UPDATE users_table SET 
    application_status='resubmit'
    WHERE Email = '$applicants_email'";
    
    $update_user_stats_run = mysqli_query($conn,$update_user_stats);

    foreach ($selectedValues as $column_name) {

      // update the column value in the database for the current row
      $query = "UPDATE applicants_table SET `$column_name` = '$new_value', resubmit='true',resubmit_message='$resubmit_message' WHERE id='$applicants_id'";
      mysqli_query($conn, $query); // assuming $conn is your database connection object
    }

    resubmit_email("$applicants_email", "$applicant_full_name","$resubmit_message");

      if($_SESSION['auth_user']['role'] == 'Main_Admin'){
        $_SESSION['status_code'] = 'success';
        $_SESSION['status'] =  'Resubmit Successfully';
        header('Location: Applicants_Scholar_Table_Checklist.php');
      }else{
        $_SESSION['status_code'] = 'success';
        $_SESSION['status'] =  'Resubmit Successfully';
        header('Location: index.php');
      }

}








if(isset($_POST['Approve_Scholar_btn'])){


  date_default_timezone_set('Asia/Manila');

  
  $approved_date = date('Y-m-d H:i:s');
  $approved_by = $_POST['approved_by'];
  $full_name = $_POST['full_name'];

  $applicants_id = $_POST['applicants_id'];
  $applicants_email = $_POST['applicants_email'];



  $Approve_Scholar_query = "UPDATE applicants_table SET date_approved='$approved_date', isApproved='true' WHERE id='$applicants_id'";
  $Approve_Scholar_query_run = mysqli_query($conn,$Approve_Scholar_query);


  if($Approve_Scholar_query_run){

    $update_progress = "UPDATE users_table SET application_status='step_4', scholar_type='renewal' WHERE Email='$applicants_email'";

    if(mysqli_query($conn,$update_progress)){

      sendemail_approved("$applicants_email", "$full_name");

      $_SESSION['status_code'] = 'success';
      $_SESSION['status'] =  'Applicant approved Successfully';

      if($_SESSION['auth_user']['role'] == 'Main_Admin'){
        header('Location: Applicants_Scholar_Table_Checklist.php');
      }else{
        header('Location: index.php');
      }

   
    }else{
      $_SESSION['status_code'] = 'error';
      $_SESSION['status'] =  'error update_progress';
    }




    
  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'error';
    header('Location: Applicants_Scholar_Table_Checklist.php');
  }


}








if(isset($_POST['Updated_NewsPage_btn'])){

$content_id = $_POST['content_id'];
$content = $_POST['content'];
$query = "UPDATE pages SET content='$content' WHERE id='$content_id'";
$query_run = mysqli_query($conn,$query);
if($query_run){
  $_SESSION['status'] =  'Page Content Updated Successfully';
  header('Location: pageNews.php');
}else{
  $_SESSION['status'] =  'Page Content not Updated';
  header('Location: pageNews.php');
}

}

if(isset($_POST['Updated_Page_btn'])){

  $content_id = $_POST['content_id'];
  $content = $_POST['content'];
  $query = "UPDATE pages SET content='$content' WHERE id='$content_id'";
  $query_run = mysqli_query($conn,$query);

  if($query_run){
    $_SESSION['status_code'] = 'success';
    $_SESSION['status'] =  'Page Content Updated Successfully';
    header('Location: pageUpdate.php');
  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Page Content not Updated';
    header('Location: pageUpdate.php');
  }



}


if(isset($_POST['Unpublish_scholar_btn'])){

  $query = "UPDATE pages SET status='Notactive' WHERE name='Scholars_List'";

  $query_run = mysqli_query($conn,$query);

  if($query_run){
    $_SESSION['status_code'] = 'success';
    $_SESSION['status'] =  'Unpublish Successfully';
    header('Location: ApprovedScholars_table.php');
  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Page Content not Updated';
    header('Location: ApprovedScholars_table.php');
  }


  
}


if(isset($_POST['publish_scholar_btn'])){


  $query = "UPDATE pages SET status='active' WHERE name='Scholars_List'";

  $query_run = mysqli_query($conn,$query);

  if($query_run){
    $_SESSION['status_code'] = 'success';
    $_SESSION['status'] =  'Publish Successfully';
    header('Location: ApprovedScholars_table.php');
  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Page Content not Updated';
    header('Location: ApprovedScholars_table.php');
  }

}


if(isset($_POST['reset_scholarlist_btn'])){
  $reset_type = $_POST['reset_type'];




  if($reset_type =='RESET NOW'){



    $reset_scholar_list = "DELETE FROM applicants_table WHERE id!=''";
    $reset_scholar_list_run = mysqli_query($conn, $reset_scholar_list);

    if($reset_scholar_list_run){


      $query = "UPDATE users_table SET application_status='step_1',Inbox='' WHERE User_id !=''";
      
      $query_run = mysqli_query($conn,$query);
      if($query_run){
        $_SESSION['status_code'] = 'success';
        $_SESSION['status'] =  'Reset Scholar list Successfully';
        header('Location: ApprovedScholars_table.php');
      }else{
        $_SESSION['status_code'] = 'error';
        $_SESSION['status'] =  'Reset error 3';
        header('Location: ApprovedScholars_table.php');
      }

      

    }else{

      $_SESSION['status_code'] = 'error';
      $_SESSION['status'] =  'Reset error 2';
      header('Location: ApprovedScholars_table.php');
    }




  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Reset error';
    header('Location: ApprovedScholars_table.php');
  }



}


if (isset($_POST['Disapproved_btn'])) {
  $applicants_id = $_POST['applicants_id'];
  $applicants_email = $_POST['applicants_email'];
  $dissaproved_message = $_POST['dissaproved_message'];
  $full_name = $_POST['full_name'];

 

  $selectedCheckboxes = $_POST['checkbox'];
  $selectedValues = implode("<br>", $selectedCheckboxes);

  $currentDateTime = date('Y-m-d H:i:s');

  $delete_applicant = "UPDATE applicants_table SET 
  isApproved='disapproved', 
  specific_disapproved_reason='$selectedValues',
  disapproved_date='$currentDateTime', 
  disapproved_message='".mysqli_real_escape_string($conn, $dissaproved_message)."' WHERE id='$applicants_id'";
  $delete_applicant_run = mysqli_query($conn, $delete_applicant);
  

  if($delete_applicant_run){
    $update_user_progress = "UPDATE users_table SET application_status='failed' WHERE Email='$applicants_email'";
    $update_user_progress_run = mysqli_query($conn, $update_user_progress);



    if($update_user_progress_run){
      sendemail_disapproval("$applicants_email","$dissaproved_message","$full_name");


      if($_SESSION['auth_user']['role'] == 'Main_Admin'){
        $_SESSION['status_code'] = 'success';
        $_SESSION['status'] =  'Disapproved Successfully';
        header('Location: Applicants_Scholar_Table_Checklist.php');
      }else{
        $_SESSION['status_code'] = 'success';
        $_SESSION['status'] =  'Disapproved Successfully';
        header('Location: index.php');
      }

    




    }else{
      $_SESSION['status_code'] = 'error';
      $_SESSION['status'] = 'Disapprved error 2';
      header('Location: Applicants_Scholar_Table_Checklist.php');
    }


  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] = 'Disapprved error';
    
    header('Location: Applicants_Scholar_Table_Checklist.php');

  }


}


















if(isset($_POST['Remove_scholar'])){
  $scholar_id = $_POST['scholar_id'];
  $scholar_email = $_POST['scholar_email'];



  $remove_scholar_query = "DELETE FROM applicants_table WHERE id='$scholar_id'";
  $remove_scholar_query_run = mysqli_query($conn, $remove_scholar_query);


  if($remove_scholar_query_run){

    $update_scholar_email = "UPDATE  users_table SET application_status='step_1' WHERE Email='$scholar_email'";
    $update_scholar_email_run = mysqli_query($conn, $update_scholar_email);

    if($update_scholar_email_run){
      $_SESSION['status_code'] = 'success';
      $_SESSION['status'] =  'Scholar Successfully Removed';
      header('Location: ApprovedScholars_table.php');
    }else{
      $_SESSION['status_code'] = 'error';
      $_SESSION['status'] =  'Remove Scholar Successfully error';
      header('Location: ApprovedScholars_table.php');
    }



  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Remove scholar error';
    header('Location: ApprovedScholars_table.php');
  }



}









if(isset($_POST['add_faq_btn'])){
  $question = $_POST['question'];
  $answer = $_POST['answer'];

if(strlen($question) < 5){
  $_SESSION['status_code'] = 'error';
  $_SESSION['status'] =  'Invalid Question';
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}else if (strlen($question) < 5){
  $_SESSION['status_code'] = 'error';
  $_SESSION['status'] =  'Invalid Answer';
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
  $add_faq_query = "INSERT INTO faq_list (question,answer) VALUES ('$question','$answer')";
  $add_faq_query_run = mysqli_query($conn, $add_faq_query);


  if($add_faq_query_run){
    $_SESSION['status_code'] = 'success';
    $_SESSION['status'] =  'FAQ Added Successfully';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'FAQ Added error';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }



}





}






if(isset($_POST['edit_faq_btn'])){
  $faq_id = $_POST['faq_id'];
  $question = $_POST['question'];
  $answer = $_POST['answer'];
  if(strlen($question) < 5){
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Invalid Question';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }else if (strlen($question) < 5){
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Invalid Answer';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }else{

    $update_faq_query = "UPDATE faq_list SET question='$question',answer='$answer' WHERE id='$faq_id'";
    $update_faq_query_run = mysqli_query($conn, $update_faq_query);

    if($update_faq_query_run){
      $_SESSION['status_code'] = 'success';
      $_SESSION['status'] =  'FAQ Updated Successfully';
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
      $_SESSION['status_code'] = 'error';
      $_SESSION['status'] =  'FAQ Updated error';
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }








  }


}



if(isset($_POST['delete_faq_btn'])){
  $faq_id = $_POST['faq_id'];

  $remove_faq_query = "DELETE FROM faq_list WHERE id='$faq_id'";
  $remove_faq_query_run = mysqli_query($conn, $remove_faq_query);

  if($remove_faq_query_run){
    $_SESSION['status_code'] = 'success';
    $_SESSION['status'] =  'FAQ remove succesfully';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'FAQ remove error';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }



}



if(isset($_POST['get_scholar_payroll_btn'])){


  $scholar_id = $_POST['scholar_id'];
  date_default_timezone_set('Asia/Manila');
  $get_date = date('Y-m-d H:i:s');
  $get_scholar_payroll_query = "UPDATE applicants_table SET get_allowance='true',allowance_get_date='$get_date' WHERE id='$scholar_id'";
  $get_scholar_payroll_query_run = mysqli_query($conn, $get_scholar_payroll_query);


  if($get_scholar_payroll_query_run){
    $_SESSION['status_code'] = 'success';
    $_SESSION['status'] =  'The allowance has been issued successfully.';
    header('Location: payroll.php');
  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'payroll error';
    header('Location: ApprovedScholars_table.php');
  }

}






if(isset($_POST['edit_user_profile_btn'])){
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $middle_name = $_POST['middle_name'];
  $house_number = $_POST['house_number'];
  $Street = $_POST['Street'];
  $barangay = $_POST['barangay'];


  $Unit = $_POST['Unit'];
  $Building = $_POST['Building'];
  $Village = $_POST['Village'];

  $Contact_number = $_POST['Contact_number'];
  $user_id = $_POST['user_id'];
  $current_image = $_POST['current_image'];
  $user_image_uploaded = $_FILES['user_image_uploaded']['name'];


  $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';


if(strlen($first_name)<3 || strlen($first_name) > 18 || preg_match('~[0-9]+~', $first_name) || preg_match($pattern, $first_name)){

  $_SESSION['status_code'] = 'error';
  $_SESSION['status'] =  'Invalid First Name';
  header('Location: profile.php');

}else if(strlen($last_name)==1 || strlen($last_name) > 18 || preg_match('~[0-9]+~', $last_name) || preg_match($pattern, $last_name)){
  $_SESSION['status_code'] = 'error';
  $_SESSION['status'] =  'Invalid Last Name';
  header('Location: profile.php');
}else if(preg_match('~[0-9]+~', $middle_name) || preg_match($pattern , $middle_name)){
  $_SESSION['status_code'] = 'error';
  $_SESSION['status'] =  'Invalid Middle Name';
  header('Location: profile.php');
}else if ($house_number == null){
  $_SESSION['status_code'] = 'error';
  $_SESSION['status'] =  'Invalid House Number';
  header('Location: profile.php');
}else if(strlen($barangay)==1 || strlen($barangay) > 18 ||  preg_match($pattern, $barangay)){
  $_SESSION['status_code'] = 'error';
  $_SESSION['status'] =  'Invalid Barangay';
  header('Location: profile.php');
}else if (strlen($Street) < 3 ){
  $_SESSION['status_code'] = 'error';
  $_SESSION['status'] =  'Invalid Street';
  header('Location: profile.php');
}else if (strlen($Contact_number) !=11 ){
  $_SESSION['status_code'] = 'error';
  $_SESSION['status'] =  'Invalid Contact Number';
  header('Location: profile.php');
}else{





  if(empty($user_image_uploaded)){
    $update_user_profile_query = "UPDATE users_table
    SET 
    first_name='$first_name',
    last_name='$last_name',
    Middle_Name='$middle_name',
    house_number='$house_number',
    Street='$Street',
    barangay='$barangay',
    Unit='$Unit',
    Building='$Building',
    Village='$Village',
    Contact_number='$Contact_number',
    image='$current_image' WHERE User_id='$user_id'";
  }else{
    $update_user_profile_query = "UPDATE users_table
    SET 
    first_name='$first_name',
    last_name='$last_name',
    Middle_Name='$middle_name',
    house_number='$house_number',
    Street='$Street',
    barangay='$barangay',
    Unit='$Unit',
    Building='$Building',
    Village='$Village',
    Contact_number='$Contact_number',
    image='$user_image_uploaded' WHERE User_id='$user_id'";

  move_uploaded_file($_FILES['user_image_uploaded']['tmp_name'],"Users_image/".$_FILES['user_image_uploaded']['name']);


  }




 $update_user_profile_query_run = mysqli_query($conn, $update_user_profile_query);

 if($update_user_profile_query_run){
  $_SESSION['status_code'] = 'success';
  $_SESSION['status'] =  'Profile Updated Successfully';
  header('Location: profile.php');
 }else{
  $_SESSION['status_code'] = 'error';
  $_SESSION['status'] =  'Profile Updated error';
  header('Location: profile.php');
 }



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
  header('Location: profile.php');
}else if ($new_password != $confirm_password){
  $_SESSION['status_code'] = 'error';
  $_SESSION['status'] =  'New password and Confirm Password Does not match';
  header('Location: profile.php');
}else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($new_password) < 8) {




  $_SESSION['status_code'] = 'error';
  $_SESSION['status'] =  'Passwords must be at least 8 characters long and contain at least one upper case letter, one number, and one special character.';
  header('Location: profile.php');




}else {



$update_password_query = "UPDATE users_table SET Password='$new_password' WHERE User_id='$user_id'";


$update_password_query_run = mysqli_query($conn, $update_password_query);


  if($update_password_query_run){
    $_SESSION['status_code'] = 'success';
    $_SESSION['status'] =  'Password Change successfully';
    header('Location: profile.php');
  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Password Change error';
    header('Location: profile.php');
  }












}







}



if(isset($_POST['add_news_updates'])){
  $image = $_FILES['image']['name'];
  $title = $_POST['title'];
  $content = $_POST['content'];

  date_default_timezone_set('Asia/Manila'); // set timezone to Philippines

  $currentDateTime = new DateTime(); // create DateTime object for current date and time
  $currentDateTimeStr = $currentDateTime->format('Y-m-d H:i:s');

  $date = $currentDateTimeStr;

  
  $add_news_query = "INSERT INTO news_updates_table (date,image,title,content) VALUES ('$date','$image','$title','".mysqli_real_escape_string($conn, $content)."')";

  $add_news_query_run = mysqli_query($conn, $add_news_query);

  if($add_news_query_run){

    move_uploaded_file($_FILES['image']['tmp_name'],"news_updates_image/".$_FILES['image']['name']);

    $_SESSION['status_code'] = 'success';
    $_SESSION['status'] =  'Add news and updates successfully';
    header('Location: pageNews.php');
  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Add news and updates error';
    header('Location: pageNews.php');
  }




}




if(isset($_POST['delete_news_btn'])){

  $content_id = $_POST['content_id'];

  $delete_content_query = "DELETE FROM news_updates_table WHERE id='$content_id'";

  $delete_content_query_run = mysqli_query($conn, $delete_content_query);

  if($delete_content_query_run){
    $_SESSION['status_code'] = 'success';
    $_SESSION['status'] =  'Deleted news successfully';
    header('Location: pageNews.php');
  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Deleted news and updates error';
    header('Location: pageNews.php');
  }


}



if(isset($_POST['update_news_updates'])){
  $image = $_FILES['image']['name'];
  $uploaded_image = $_POST['uploaded_image'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $content_id = $_POST['content_id'];





  if(empty($image)){

    $update_content_query = "UPDATE news_updates_table SET 
    image='$uploaded_image',
    title='$title',
    content='$content' 
    WHERE id='$content_id'";


  if(mysqli_query($conn, $update_content_query)){
    $_SESSION['status_code'] = 'success';
    $_SESSION['status'] =  'Update News Update Successfully';
    header('Location: pageNews.php');
  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Update News Update Error';
    header('Location: pageNews.php');
  }




  }else{

    $update_content_query_2 = "UPDATE news_updates_table SET 
    image='$image',
    title='$title',
    content='$content' 
    WHERE id='$content_id'";




  if(mysqli_query($conn, $update_content_query_2)){
    $_SESSION['status_code'] = 'success';
    $_SESSION['status'] =  'Update News Update Successfully';
    header('Location: pageNews.php');
  }else{
    $_SESSION['status_code'] = 'error';
    $_SESSION['status'] =  'Update News Update Error 2';
    header('Location: pageNews.php');
  }


  }


}














































































































?>
