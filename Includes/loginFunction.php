<?php 

session_start();


$conn = mysqli_connect('localhost',"root", '', 'project02');

if(isset($_POST['Login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        $_SESSION['status'] =  'Empty inputs';
        $_SESSION['email'] =  $email;
        header('Location: ../login.php?error=wronglogin');
    }else{
        $login_query = "SELECT * FROM users_table WHERE Email='$email' AND Password='$password'";
        $login_query_run = mysqli_query($conn,$login_query);

    
        if(mysqli_num_rows($login_query_run) >0){

            $row = mysqli_fetch_array($login_query_run);

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
                header('Location: ../dashboard.php');
               }else{
                $_SESSION['Admin'] = true;
                $_SESSION['status_code'] = 'success';
                $_SESSION['status'] =  'You are logged in succesfully';
                
                header('Location: ../admin/index.php');
               }







            }else{
                $_SESSION['status'] =  'Please verify your email address to login';
                header('Location: ../login.php?error=wronglogin');
                exit(0);
            }

        }
        
        else{
            $_SESSION['status'] =  'Invalid';
            $_SESSION['email'] =  $email;
            $_SESSION['error'] =  'error';
       
       

            header('Location: ../login.php?error=wronglogin');
            exit(0);
        }
    }
}
