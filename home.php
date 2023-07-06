<?php 
session_start();

require_once 'Includes/dbconfig.php';



if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    $userInfo = [
      'first_name' => $google_account_info['givenName'],
      'last_name' => $google_account_info['familyName'],
      'email' => $google_account_info['email'],
      'image' => $google_account_info['picture'],
      'token' => $google_account_info['id']
    ];

      $sql = "SELECT * FROM users_table WHERE Email='{$userInfo['email']}'";
      $result = mysqli_query($conn, $sql);
     
      if(mysqli_num_rows($result)>0){

        $row = mysqli_fetch_array($result);

        if($row['verify_status'] == '1'){
          $_SESSION['authenticanted'] = true;
          $_SESSION['auth_user'] = [
            'user_id' => $row['User_id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'Middle_Name' => $row['Middle_Name'],
            'Suffix' => $row['Suffix'],
            'house_number' => $row['house_number'],
            'Street' => $row['Street'],
            'barangay' => $row['barangay'],
            'gender' => $row['gender'],
            'Date_of_birth' => $row['Date_of_birth'],
            'place_of_birth' => $row['place_of_birth'],
            'Contact_number' => $row['Contact_number'],
            'Email' => $row['Email'],
            'image' => $row['image'],
            'role' => $row['user_type'],
            'scholar_type' => $row['scholar_type'],
            'date_created' => $row['date_created']
        ];

       if($_SESSION['auth_user']['role'] == 'scholar'){
        $_SESSION['status'] =  'You are logged in succesfully';
        header('Location: dashboard.php');
       }else{
        $_SESSION['Admin'] = true;
        $_SESSION['status_code'] = 'success';
        $_SESSION['status'] = 'You are logged in succesfully';
        header('Location: admin/index.php');
       }

        }else{
            $_SESSION['status'] =  'Please verify your email address to login';
            header('Location: login.php?error=wronglogin');
            exit(0);
        }










      }else{
        $_SESSION['status'] =  'You dont have an account';
        header('Location: login.php?error=accountNotregister');
        exit(0);

      }

  }




?>
