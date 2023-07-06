<!-- datatable -->
<link href="css/jquery.dataTables.min.css" rel="stylesheet">




<?php
    require_once 'Includes/dbconfig.php';

    // Query the database for emails where role is "audit"
    $get_faculty_query = "SELECT email FROM users_table WHERE user_type='audit' ORDER BY RAND()";
    $get_faculty_query_result = mysqli_query($conn, $get_faculty_query);

    // Check that the query was executed successfully
    if (!$get_faculty_query_result) {
        die("Error executing query: " . mysqli_error($conn));
    }

    // Get all rows from the result set
    $rows = mysqli_fetch_all($get_faculty_query_result, MYSQLI_ASSOC);

    // Count the number of rows returned
    $num_rows = count($rows);

    // Generate a random number between 0 and the number of rows returned
    $random_index = rand(0, $num_rows - 1);

    // Get the email from the randomly selected row
    $audit_email = $rows[$random_index]['email'];

    // Close the database connection
    mysqli_close($conn);

    // Return the randomly selected email
    echo $audit_email;
?>



<div class="container">





















    <table class="table bg-light table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>School</th>


            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Jeferson Borras</td>
                <td>Technological Institute of the Philippines</td>


            </tr>
            <tr>
                <td>Jeferson Borras</td>
                <td>Technological Institute of the Philippines</td>


            </tr>
            <tr>
                <td>Jeferson Borras</td>
                <td>Technological Institute of the Philippines</td>


            </tr>
            <tr>
                <td>Jeferson Borras</td>
                <td>Technological Institute of the Philippines</td>


            </tr>

        </tbody>
    </table>

</div>


<script src="js/jquery-3.6.3.min.js" crossorigin="anonymous"></script>


<script src="js/jquery.dataTables.min.js" crossorigin="anonymous"></script>



<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>
