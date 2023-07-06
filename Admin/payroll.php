<?php 

$page = 'payroll';
include('includes/dbconfig.php');
include('includes/header.php');

include('includes/navbar.php');


 ?>

<?php if($_SESSION['auth_user']['role'] == 'Main_Admin'): ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Payroll Check</h2>
                <div>

                    <a class="btn btn-danger text-white" href="javascript:history.back()">BACK</a>
                </div>
            </div>
        </div>

        <div class="card-body activePage" id='activePage'>
            <div class="card-body">
                <?php include('sweetAlert.php');?>




                <div class="table-responsive" id='link_server'>
                    <?php 
                        

                            $query = "SELECT * FROM applicants_table WHERE get_allowance='true' AND isApproved='true' AND resubmit='false'";
                            $query_run = mysqli_query($conn,$query);
                            ?>
                    <table class="table bg-light table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>Date receipt of allowance</th>
                                <th>Email</th>
                                <th>Full Name</th>
                                <th>Reference Number</th>
                                <th class="text-center">View data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row=mysqli_fetch_assoc($query_run)) {
                        ?>
                            <tr>
                                <td><?php echo date("F j, Y, g:i a", strtotime($row['allowance_get_date']));?></td>
                                <td><img class="rounded-circle mr-2 border" width="50px" height="50px"
                                        src='<?php echo "upload_docu/".$row['fileName']."/".$row['picture'] ?>'><?php echo $row['email'];?>
                                </td>

                                <td><?php echo $row['full_name'];?></td>
                                <td><?php echo $row['applicantion_reference_number'];?></td>
                                <th class="text-center">
                                    <form action="ApprovedScholarsChecklist.php" method="POST">
                                        <input type="hidden" name="application_id" value="<?php echo $row['id']; ?>">

                                        <input type="hidden" name="application_email"
                                            value="<?php echo $row['email']; ?>">

                                        <button type="submit" name="application_view" class="btn btn-success">View
                                            Details</button>
                                    </form>
                                </th>
                            </tr>
                            <?php
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


<?php else: ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Payroll Check</h2>
                <div>

                    <a class="btn btn-danger text-white" href="index.php">BACK</a>
                </div>
            </div>
        </div>

        <div class="card-body activePage" id='activePage'>
            <div class="card-body">
                <?php include('sweetAlert.php');?>




                <div class="table-responsive" id='link_server'>
                    <?php 
                            $faculty_email = $_SESSION['auth_user']['Email'];

                            $query = "SELECT * FROM applicants_table WHERE get_allowance='true' AND isApproved='true' AND resubmit='false' AND assists_by='$faculty_email'";
                            $query_run = mysqli_query($conn,$query);
                            ?>
                    <table class="table bg-light table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>Date receipt of allowance</th>
                                <th>Email</th>
                                <th>Full Name</th>
                                <th>Reference Number</th>
                                <th class="text-center">View data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row=mysqli_fetch_assoc($query_run)) {
                        ?>
                            <tr>
                                <td><?php echo date("F j, Y, g:i a", strtotime($row['allowance_get_date']));?></td>
                                <td><img class="rounded-circle mr-2 border" width="50px" height="50px"
                                        src='<?php echo "upload_docu/".$row['fileName']."/".$row['picture'] ?>'><?php echo $row['email'];?>
                                </td>

                                <td><?php echo $row['full_name'];?></td>
                                <td><?php echo $row['applicantion_reference_number'];?></td>
                                <th class="text-center">
                                    <form action="ApprovedScholarsChecklist.php" method="POST">
                                        <input type="hidden" name="application_id" value="<?php echo $row['id']; ?>">

                                        <input type="hidden" name="application_email"
                                            value="<?php echo $row['email']; ?>">

                                        <button type="submit" name="application_view" class="btn btn-success">View
                                            Details</button>
                                    </form>
                                </th>
                            </tr>
                            <?php
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


<?php endif; ?>

<?php include('includes/footer.php') ?>
