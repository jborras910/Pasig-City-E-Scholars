<?php 

require_once 'vendor/autoload.php';

// init configuration
$clientID = '710874183005-bl4kpcr86b787a22coibf3gn6r03f3ik.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://ccd0-45-114-134-214.ngrok-free.app/Capstone_Project/home.php';


// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


$servername = "localhost";
$root = "root";
$dbName = 'project02';



$conn = mysqli_connect($servername,$root, '', $dbName);





?>
