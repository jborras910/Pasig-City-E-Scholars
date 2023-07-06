<?php 

session_start();

 if(isset($_SESSION['authenticanted'])){
     header('Location: home.php');
 }
