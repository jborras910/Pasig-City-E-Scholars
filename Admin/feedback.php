<?php 


$page='feedback';
include('includes/dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/restrict.php'); 

?>


<div class="container-fluid">





    <div class="card shadow mb-4">


        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Users Feedbacks</h2>
                <div>

                </div>
            </div>
        </div>
        <div class="card-body">
            <?php include('sweetAlert.php');?>
            <div class="card-body">
                <div class="table-responsive" id='link_server'>
                    <?php 
     
    $query = "SELECT * FROM feedback ORDER BY date DESC;";
    $query_run = mysqli_query($conn,$query);
    $counter = 1;
    ?>
                    <table class="table bg-light table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>

                                <th>Date</th>
                                <th>Email</th>

                                <th>Full Name</th>
                                <th>Feedback</th>


                            </tr>
                        </thead>


                        <tbody>
                            <?php 
            if (mysqli_num_rows($query_run) > 0) {
                while ($row=mysqli_fetch_assoc($query_run)) {
            ?>
                            <tr>

                                <td class="text-danger"><?php echo date("F j, Y, g:i a", strtotime($row['date']));?>
                                </td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];?></td>
                                <th><?php echo $row['feedback'] ?></th>
                            </tr>
                            <?php
                $counter++;
                }
            }
            ?>
                        </tbody>


                    </table>
                </div>
            </div>

        </div>
    </div>
















</div>




<?php include('includes/footer.php') ?>
