<?php 




if(!isset($_SESSION['authenticanted'])){

    $_SESSION['status'] =  'Please log in to continue';
    header('Location: login.php');
  
}


?>
