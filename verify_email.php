<?php 

session_start();
$conn = mysqli_connect('localhost','root', '', 'project02');


if(isset($_GET['token'])){

    $token = $_GET['token'];
    $verify_query = "SELECT verify_token,verify_status FROM users_table WHERE verify_token='$token' LIMIT 1";
    $verify_query_run = mysqli_query($conn,$verify_query);

    if(mysqli_num_rows($verify_query_run) > 0){
        $row = mysqli_fetch_array($verify_query_run);

        
        // echo $row['verify_token'];

        if($row['verify_status'] == "0"){
        date_default_timezone_set('Asia/Manila');
        $clicked_token = $row['verify_token'];
        $current_datetime = date('Y-m-d H:i:s');
        $update_query = "UPDATE users_table SET verify_status='1',date_created='$current_datetime' WHERE verify_token='$clicked_token' LIMIT 1";
        $update_query_run = mysqli_query($conn,  $update_query);

        if( $update_query_run){
            $_SESSION['status'] =  'Your account has been Verified successfully';


            $update_query2 = "UPDATE users_table SET verify_token='Done' WHERE verify_token='$clicked_token' LIMIT 1";
            mysqli_query($conn,  $update_query2);



            header('Location: login.php');
            exit(0);
        }else{
            $_SESSION['status'] =  'Verification failed';
            header('Location: login.php');
            exit(0);
        }

        }else{
            $_SESSION['status'] =  'Email Already verify please Login';
            header('Location: login.php');
            exit(0);
        }

    }else{
        $_SESSION['status'] =  'You only verified once';
        header('Location: login.php');
    }

}else{
    $_SESSION['status'] =  'Not Allowed';
    header('Location: login.php');
}
