<?php 


include('includes/header.php');

include('includes/navbar.php');
include('includes/restrict.php'); 

 ?>

<style>
.hidetext {
    -webkit-text-security: circle;
}

.hide {
    display: none !important;
}

.show {
    display: block !important;
}

</style>
<!-- Begin Page Content -->

<!-- Page Heading -->
<div class="container-fluid">
    <!-- DataTales Example -->


    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <h5 class="h6">Total Register Admin</h5>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    require 'dbconfig.php';
                                    $query = "SELECT User_id  FROM users_table WHERE user_type != 'scholar' AND user_type !='Main_Admin' AND verify_status='1'";
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
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <h5 class="h6">Total Register User</h5>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    require 'dbconfig.php';
                                    $query = "SELECT User_id  FROM users_table WHERE user_type = 'scholar' AND verify_status='1'";
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
    </div>
    <div class="card shadow mb-4">

        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">User Profiles<i class="fa-solid fa-user-gear ml-2"></i></h2>
                <div>


                    <a href="download_user.php" class="btn btn-danger">
                        <i class="fa-solid fa-download mr-2"></i>Export to PDF
                    </a>

                    <a href="addUser.php" class="btn btn-primary">Add User Profile</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php include('sweetAlert.php');?>
            <div class="table">
                <?php 

            $conn = mysqli_connect('localhost','root', '', 'project02');
            $query = "SELECT * FROM users_table WHERE verify_status ='1' AND active_status='active' AND user_type='scholar'";
            $query_run = mysqli_query($conn,$query);
            ?>
                <table class="table bg-light table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Created</th>
                            <th>Role</th>

                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(mysqli_num_rows($query_run) > 0){
                            while($row=mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>

                            <th><img class="rounded-circle mr-2 border" width="50px"
                                    src='<?php echo "Users_image/".$row['image'] ?>'><?php echo $row['first_name']." ".$row['last_name']; ?>
                            </th>


                            <th> <?php echo $row['Email']; ?> </th>
                            <th><?php echo date("F j, Y, g:i a", strtotime($row['date_created']));?> </th>
                            <th> <?php echo $row['user_type']; ?> </th>


                            <td class="text-center">
                                <form action="Edit_User.php" method="POST">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['User_id']; ?>">
                                    <button type="submit" name="edit_btn" class="btn btn-success">View User
                                        data</button>
                                </form>
                            </td>

                        </tr>

                        <?php 
                        }
                    }else{
                        echo"<h2>No record found</h2>";
                    }
                    ?>
                    </tbody>
                </table>






            </div>
        </div>
    </div>
</div>




<!-- /.container-fluid -->
<?php include('includes/footer.php') ?>
