<?php 

$page='Recycle bin';
include('includes/header.php');

include('includes/navbar.php');
include('includes/restrict.php'); 

 ?>

<div class="container-fluid">




    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Deactivated Users</h2>
                <div>

                    <a type="button" onclick="location.href = document.referrer; return false;"
                        class="btn btn-danger">BACK</a>

                </div>

            </div>



        </div>
        <div class="card-body">
            <?php include('sweetAlert.php');?>


            <div class="table">
                <?php 

            $conn = mysqli_connect('localhost','root', '', 'project02');
            $query = "SELECT * FROM users_table WHERE verify_status ='0' AND active_status='deleted'";
            $query_run = mysqli_query($conn,$query);
            ?>
                <table class="table table-bordered border border-5 bg-light " id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
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
                            <th> <?php echo $row['user_type']; ?> </th>

                            <td class="text-center">
                                <form action="restore.php" method="POST">
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



<?php include('includes/footer.php') ?>
