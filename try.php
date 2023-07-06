<?php
// Set the time zone to your local time zone
date_default_timezone_set('Asia/Manila');

// Get the current time
$current_time = time();

// Set the start and end times for the application form
$start_time = strtotime(date('Y-m-d 7:30:00'));
$end_time = strtotime(date('Y-m-d 17:00:00'));

// Check if the current time is within the specified time range
if ($current_time >= $start_time && $current_time <= $end_time) {
    // Display the application form
    echo "Welcome to the application form!";
} else {
    // Display an error message
    echo "Sorry, the application form is only accessible between 7:30am and 5:00pm.";
}
?>
