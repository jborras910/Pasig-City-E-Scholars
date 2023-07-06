<?php 
session_start();
if(isset($_SESSION['Admin'])){
    header('location: index.php?=nope');
}

$page = "Profle | Pasig E-Scholar";
include('Head.php');


include('Includes/authentication.php');


include('Includes/dbconfig.php');


?>



<style>
.main {
    padding-top: 10% !important;
    text-transform: capitalize;
}

input[type='number'] {
    border: 1px solid black !important;
    outline: none !important;
}





.card {
    width: 70% !important;
    margin-left: auto !important;
    margin-right: auto !important;
    margin-bottom: 10% !important;
}

.container {
    padding: 40px 10px !important;
    border-radius: 20px;

    background-color: transparent !important;



}

label {
    margin-bottom: 2px !important;
}


.card img {
    width: 280px;
    border-bottom: 2px solid rgba(22, 22, 26, 0.18);
    box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;
}

.form-group input,
.form-select {
    padding: 6px !important;

    border: 1px solid grey;

    width: 100% !important;
}



@media screen and (max-width: 1000px) {

    .main {
        padding-top: 40% !important;
        text-transform: capitalize;
    }



    .image {
        text-align: center;
    }



    .card-header {
        text-align: center;
    }

    .container {

        border-radius: none;
        border: none;
        background-color: #fff !important;
        color: black !important;

        box-shadow: none !important;
    }

    .title_profile {
        color: #01406b !important;
    }

    .card {
        width: 100% !important;
    }

    .btn {
        width: 100% !important;
        margin-bottom: 5px !important;
    }


}

</style>




<?php


$id =  $_SESSION['auth_user']['user_id'];
$query = "SELECT * FROM users_table WHERE User_id='$id'";
$query_run = mysqli_query($conn,$query);

foreach ($query_run as $row) {
    ?>


<div class="container-fluid main">
    <?php include('Admin/sweetAlert.php');?>

    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3>Update Profile</h3>
                </div>
                <div class="col-md-2">
                    <a type="button" href="Profile.php" class="btn btn-danger text-white">BACK</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="Includes/Function.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group image">
                    <img width="240px" height="300px" id="blah" class="mb-3"
                        src="<?php echo "Admin/Users_image/".$row['image'] ?>">
                    <br>
                    <label for="image">Upload User Image</label>


                    <input type="hidden" name="User_id" value="<?php echo $row['User_id']?>">

                    <br>
                    <br>
                    <input type="file" id="imgInp" accept="image/*" onchange="previewImage();" name="user_images" />

                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="">First Name:</label>
                        <input type="text" name="first_name" class="form-control"
                            value="<?php echo $row['first_name']?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Last Name:</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $row['last_name']?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Middle Name:</label>
                        <input type="text" name="Middle_Name" class="form-control"
                            value="<?php echo $row['Middle_Name']?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Suffix:</label>
                        <input type="text" name="Suffix" class="form-control" value="<?php echo $row['Suffix']?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">House Number:</label>
                        <input type="number" name="house_number" class="form-control"
                            value="<?php echo $row['house_number']?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Street:</label>
                        <input type="text" name="Street" class="form-control" value="<?php echo $row['Street']?>">
                    </div>



                    <div class="form-group col-md-4">
                        <label for="">Barangay:</label>
                        <select name="barangay" class="form-select">
                            <option value="<?php echo $row['barangay']?>" selected>
                                <?php echo $row['barangay']?>
                            </option>
                            <option value="Bagong Ilog">Bagong Ilog</option>
                            <option value="Bagong Katipunan">Bagong Katipunan</option>
                            <option value="Buting">Buting</option>
                            <option value="Caniogan">Caniogan</option>
                            <option value="Kalawaan">Kalawaan</option>
                            <option value="Kapasigan">Kapasigan</option>
                            <option value="Kapitolyo">Kapitolyo</option>
                            <option value="Malinao">Malinao</option>
                            <option value="Oranbo">Oranbo</option>
                            <option value="Palatiw">Palatiw</option>
                            <option value="Pineda">Pineda</option>
                            <option value="Sagad">Sagad</option>
                            <option value="San Antonio">San Antonio</option>
                            <option value="San Joaquin">San Joaquin</option>
                            <option value="San Jose">San Jose</option>
                            <option value="San Nicolas">San Nicolas</option>
                            <option value="Sta. Cruz">Sta. Cruz</option>
                            <option value="Sta. Rosa">Sta. Rosa</option>
                            <option value="Sto. Tomas">Sto. Tomas</option>
                            <option value="Sumilang">Sumilang</option>
                            <option value="Ugong">Ugong</option>
                            <option value="Dela Paz">Dela Paz</option>
                            <option value="Manggahan">Manggahan</option>
                            <option value="Maybunga">Maybunga</option>
                            <option value="Pinagbuhatan">Pinagbuhatan</option>
                            <option value="Rosario">Rosario</option>
                            <option value="San Miguel">San Miguel</option>
                            <option value="Santolan">Santolan</option>
                            <option value="Sta. Lucia">Sta. Lucia</option>
                        </select>
                    </div>



                    <div class="form-group col-md-4">
                        <label for="">Unit/Floor:</label>
                        <input type="text" name="Unit" class="form-control" value="<?php echo $row['Unit']?>">
                    </div>


                    <div class="form-group col-md-4">
                        <label for="">Building:</label>
                        <input type="text" name="Building" class="form-control" value="<?php echo $row['Building']?>">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Village/Subdivision:</label>
                        <input type="text" name="Village" class="form-control" value="<?php echo $row['Village']?>">
                    </div>



                </div>

                <div class="row">


                    <div class="form-group col-md-12">
                        <hr>
                        <label for="">Contact Number:</label>



                        <input name="Contact_number" id="phone" value="<?php echo $row['Contact_number']?>"
                            type="number" required>








                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#Update_profile_alert">Update Data</button>

                <a type="button" class="btn btn-danger" href="Profile.php">Cancel</a>

                <!-- Modal -->
                <div class="modal fade" id="Update_profile_alert" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLongTitle">You are your you want to update your
                                    Profile?</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Select Save changes to update
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="edit_user_data_btn" class="btn btn-primary">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>















<?php
}

?>


















<?php 
include('Footer.php');

?>








<script>
const phoneInputField = document.querySelector("#phone");
const phoneInput = window.intlTelInput(phoneInputField, {
    preferredCountries: ["ph"],
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});
</script>




<script>
imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}
</script>
