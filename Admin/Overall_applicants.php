<?php 


$page='Overall Applicants';
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
        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Overall Applicants List <?php echo bcsub(date("Y"),1)."-".date("Y"); ?></h2>
                <div>
                    <a class="btn btn-danger" href="download_overall_applicants.php"><i
                            class="fa-solid fa-file-pdf mr-2"></i>Download in PDF</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php include('sweetAlert.php');?>
            <div class="card-body">
                <div class="table-responsive" id='link_server'>
                    <?php 
                $query = "SELECT * FROM applicants_table";
                $query_run = mysqli_query($conn,$query);
                $counter = 1;
                ?>
                    <table class="table bg-light table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date Submitted</th>
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
                                    <?php echo date("F j, Y, g:i a", strtotime($row['Date_submitted']));?></td>
                                <td><img class="rounded-circle mr-2 border" width="50px" height="50px"
                                        src='<?php echo "upload_docu/".$row['fileName']."/".$row['picture'] ?>'><?php echo $row['email'];?>
                                </td>
                                <td><?php echo $row['full_name'];?></td>
                                <td><?php echo $row['applicantion_reference_number'] ?></td>
                                <th class="text-center">
                                    <form action="Overall_applicants_checklist.php" method="POST">
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
                <h2 class="mb-0">Your Overall Scholars <?php echo bcsub(date("Y"),1)."-".date("Y"); ?></h2>
                <div>
                    <a class="btn btn-danger" href="download_overall_individual_reports.php"><i
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
            $query = "SELECT * FROM applicants_table WHERE  assists_by='$faculty_email'";
            $query_run = mysqli_query($conn,$query);
            $counter = 1;
            ?>
                    <table class="table bg-light table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Submitted Date</th>
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
                                    <?php echo date("F j, Y, g:i a", strtotime($row['Date_submitted']));?></td>
                                <td><img class="rounded-circle mr-2 border" width="50px" height="50px"
                                        src='<?php echo "upload_docu/".$row['fileName']."/".$row['picture'] ?>'><?php echo $row['email'];?>
                                </td>
                                <td><?php echo $row['full_name'];?></td>
                                <td><?php echo $row['applicantion_reference_number'] ?></td>
                                <th class="text-center">
                                    <form action="Overall_applicants_checklist.php" method="POST">
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
