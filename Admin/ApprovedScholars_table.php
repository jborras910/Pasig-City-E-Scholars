<?php 


$page='Approved Applicants';
include('includes/dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<?php if($_SESSION['auth_user']['role'] == 'Main_Admin'): ?>

<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <h5 class="h6"><strong>Total New Applicant Scholars</strong></h5>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    require 'dbconfig.php';
                                    $query = "SELECT id FROM applicants_table WHERE isApproved = 'true' AND scholar_type='New Applicant'";
                                    $query_run = mysqli_query($conn,$query);
                                    $row = mysqli_num_rows($query_run);
                                    echo '<h1>'.$row.'</h1>';
                                    ?>
                            </div>
                        </div>
                        <div class="col-auto">

                            <i class="fa-solid fa-circle-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <h5 class="h6"><strong>Total Renewal Scholars</strong></h5>

                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    require 'dbconfig.php';
                                    $query = "SELECT id FROM applicants_table WHERE isApproved = 'true' AND scholar_type='Renewal'";
                                    $query_run = mysqli_query($conn,$query);
                                    $row = mysqli_num_rows($query_run);
                                    echo '<h1>'.$row.'</h1>';
                                    ?>
                            </div>
                        </div>
                        <div class="col-auto">

                            <i class="fa-solid fa-pen-to-square fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="Function.php" method="POST">
            <!-- Modal -->
            <div class="modal fade" id="Unpublish_ModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">ALERT</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure? you want to Unpublish the Officials Scholars List?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="Unpublish_scholar_btn"
                                class="btn btn-primary">Unpublish</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>





        <form action="Function.php" method="POST">
            <!-- Modal -->
            <div class="modal fade" id="publish_ModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">ALERT</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure? you want to publish the Officials Scholars List?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="publish_scholar_btn" class="btn btn-primary">Publish
                                List</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Officials Scholars List <?php echo bcsub(date("Y"),1)."-".date("Y"); ?></h2>
                <div>
                    <?php
                        $query = "SELECT * FROM pages WHERE name='Scholars_List' AND status='active'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);

                        if ($row) {
                            $button_text = 'Unpublish List';
                            $modal_target = 'Unpublish_ModalCenter';
                            $button_icon = 'fa-solid fa-eye-slash mr-1';
                        } else {
                            $button_text = 'Publish Page';
                            $modal_target = 'publish_ModalCenter';
                            $button_icon = 'fa-solid fa-eye mr-1';
                        }
                        ?>

                    <button type="button" class="btn <?php echo $row ? 'btn-danger' : 'btn-primary'; ?>"
                        data-toggle="modal" data-target="#<?php echo $modal_target; ?>">
                        <i class="<?php echo $button_icon; ?>"></i>
                        <?php echo $button_text; ?>
                    </button>


                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="fa-solid fa-gear mr-1"></i>
                        Action List
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a type="button" class="dropdown-item" href="payroll.php"><i
                                class="fa-regular fa-circle-check mr-2"></i>Check Payroll</a>
                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#resetalert"><i
                                class="fa-solid fa-triangle-exclamation mr-2"></i>Reset Scholar
                            List</button>


                        <a href="download_approved_scholars.php" class="dropdown-item">
                            <i class="fa-solid fa-file-pdf mr-2"></i>Export to PDF
                        </a>
                    </div>

















                    <!-- Modal -->
                    <form action="Function.php" method="POST">
                        <div class="modal fade" id="resetalert" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">WARNING</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group text-center">
                                            <label class="text-uppercase text-bold " for="">Please Type <span
                                                    class="text-danger">"RESET
                                                    NOW"</span> to
                                                confirm the
                                                changes</label>
                                            <input type="text" name="reset_type" class="form-control"
                                                placeholder="Type Here..." required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary text-uppercase"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" name="reset_scholarlist_btn"
                                            class="btn btn-danger text-uppercase">Reset Scholar
                                            list</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
































                </div>
            </div>
        </div>
        <div class="card-body">
            <?php include('sweetAlert.php');?>
            <div class="card-body">
                <div class="table-responsive" id='link_server'>
                    <?php 
                $query = "SELECT * FROM applicants_table WHERE isApproved='true'";
                $query_run = mysqli_query($conn,$query);
                $counter = 1;
                ?>
                    <table class="table bg-light table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Approved Date</th>
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
                                <th><?php echo $counter; ?></th>
                                <td class="text-danger">
                                    <?php echo date("F j, Y, g:i a", strtotime($row['date_approved']));?></td>
                                <td><img class="rounded-circle mr-2 border" width="50px" height="50px"
                                        src='<?php echo "upload_docu/".$row['fileName']."/".$row['picture'] ?>'><?php echo $row['email'];?>
                                </td>
                                <td><?php echo $row['full_name'];?></td>
                                <td><?php echo $row['applicantion_reference_number'] ?></td>
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

<?php else: ?>


<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <h5 class="h6"><strong>YOUR TOTAL APPROVED SCHOLARS</strong></h5>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    require 'dbconfig.php';
                                    $admin_email = $_SESSION['auth_user']['Email'];
                                    $query = "SELECT id FROM applicants_table WHERE isApproved = 'true' AND assists_by='$admin_email'";
                                    $query_run = mysqli_query($conn,$query);
                                    $row = mysqli_num_rows($query_run);
                                    echo '<h1>'.$row.'</h1>';
                                    ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user-gear fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <h5 class="h6"><strong>YOUR PENDING APPLICATION</strong></h5>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    require 'dbconfig.php';
                                    $admin_email = $_SESSION['auth_user']['Email'];
                                    $query = "SELECT id FROM applicants_table WHERE isApproved = 'false' AND assists_by='$admin_email'";
                                    $query_run = mysqli_query($conn,$query);
                                    $row = mysqli_num_rows($query_run);
                                    echo '<h1>'.$row.'</h1>';
                                    ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user-group fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <h5 class="h6"><strong>YOUR TOTAL NEW SCHOLARS</strong></h5>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    require 'dbconfig.php';
                                    $admin_email = $_SESSION['auth_user']['Email'];
                                    $query = "SELECT id FROM applicants_table WHERE isApproved = 'true' AND scholar_type='New Applicant' AND assists_by='$admin_email'";
                                    $query_run = mysqli_query($conn,$query);
                                    $row = mysqli_num_rows($query_run);
                                    echo '<h1>'.$row.'</h1>';
                                    ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-person-circle-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <h5 class="h6"><strong>YOUR TOTAL RENEWAL SCHOLARS</strong></h5>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    require 'dbconfig.php';
                                    $admin_email = $_SESSION['auth_user']['Email'];
                                    $query = "SELECT id FROM applicants_table WHERE isApproved = 'true' AND scholar_type='Renewal' AND assists_by='$admin_email'";
                                    $query_run = mysqli_query($conn,$query);
                                    $row = mysqli_num_rows($query_run);
                                    echo '<h1>'.$row.'</h1>';
                                    ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-pen-to-square fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








    <div class="card shadow mb-4">


        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Your Approved Scholars <?php echo bcsub(date("Y"),1)."-".date("Y"); ?></h2>
                <div>
                    <a class="btn btn-danger" href="download_report.php"><i
                            class="fa-solid fa-file-pdf mr-2"></i>Download
                        in PDF</a>

                    <a class="btn btn-danger text-white" href="index.php">BACK</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php include('sweetAlert.php');?>
            <div class="card-body">
                <div class="table-responsive" id='link_server'>
                    <?php 
                     $faculty_email = $_SESSION['auth_user']['Email'];
            $query = "SELECT * FROM applicants_table WHERE isApproved='true' AND assists_by='$faculty_email'";
            $query_run = mysqli_query($conn,$query);
            $counter = 1;
            ?>
                    <table class="table bg-light table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Approved Date</th>
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
                                <th><?php echo $counter; ?></th>
                                <td class="text-danger">
                                    <?php echo date("F j, Y, g:i a", strtotime($row['date_approved']));?></td>
                                <td><img class="rounded-circle mr-2 border" width="50px" height="50px"
                                        src='<?php echo "upload_docu/".$row['fileName']."/".$row['picture'] ?>'><?php echo $row['email'];?>
                                </td>
                                <td><?php echo $row['full_name'];?></td>
                                <td><?php echo $row['applicantion_reference_number'] ?></td>
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



<?php endif; ?>





</div>

<script>
function loadXMLDoc() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("link_server").innerHTML =
                this.responseText;
        }
    };
    xhttp.open("GET", "ChecklistServer.php", true);
    xhttp.send();
}

setInterval(function() {
    loadXMLDoc()
}, 1000);

window.onload = loadXMLDoc;
</script>








<?php include('includes/footer.php') ?>
