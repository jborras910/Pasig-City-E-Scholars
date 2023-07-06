<?php 
$page = 'NewApplicants';
include('includes/dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/restrict.php'); 

?>


<style>
.NotactivePage {
    display: none;
}


.main {
    margin: 10% auto;
    padding: none !important;



}

.form-container {
    width: 100% !important;

}

.progress-box {
    margin: 10px auto;
}


.form {
    padding: 50px 25px;
    width: 58%;
    margin: 5px auto;
    border: 2px solid grey;
    height: auto;
    background-color: white !important;
    box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;
}

.form h5 {
    font-size: 18px !important;
}


.alert {
    background-color: #01406b !important;
    color: white;
    text-align: center;
    padding-bottom: 0px !important;
    box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;
}

.alert h5 {
    padding-bottom: 5px !important;

}

.form input,
.form select {
    border: none;
    padding: 10px;
    border: 2px solid grey;
    background: transparent;
    outline: none;
    width: auto;


}

input[type="text"],
input[type="number"],
input[type="file"],
.form select {
    width: 100%;
    margin-bottom: 20px;
}


::placeholder {
    color: grey;
}

.logo {
    width: 180px;
    margin-bottom: 20px !important;
}




@media screen and (max-width: 1000px) {
    .form {
        margin: 30% auto;
        width: 100%;
        border: none;
    }





}

</style>




<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Applicants Form</h2>
                <div>
                    <button type="button" id="Active" class="btn btn-primary">Publish Form</button>
                    <button type="button" id="NotActive" class="btn btn-danger">Not Publish Page</button>
                </div>
            </div>
        </div>

        <div class="card-body activePage" id='activePage'>
            <?php include('sweetAlert.php');?>

            <?php 

$query = "SELECT * FROM  pages WHERE name='NewApplicants_form'";
$query_run = mysqli_query($conn,$query);


if (mysqli_num_rows($query_run) > 0) {
  while ($row=mysqli_fetch_assoc($query_run)) {

  ?>

            <form action="Function.php" method="POST" class="form">
                <div class="form-title">
                    <div class="form-title">
                        <?php if($row['status'] == 'active') : ?>
                        <button type="button" data-toggle="modal" data-target="#UnpublishModal"
                            class="btn btn-danger btn-block">Click here to Unpublish this Form
                        </button>
                        <!-- Unpublish modal -->
                        <div class="modal fade" id="UnpublishModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Alert..</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to Unpublish this Application Form?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" name="Unpublish_NewApplicants_form"
                                            class="btn btn-primary">Unpublish
                                            this Application
                                            Form</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php else:?>
                        <button type="button" data-toggle="modal" data-target="#PublishModal"
                            class="btn btn-secondary btn-block">Click here to
                            Publish this Form
                        </button>
                        <!-- Publish modal -->
                        <div class="modal fade" id="PublishModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Alert..</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to Publish this Application Form?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" name="Publish_NewApplicants_form"
                                            class="btn btn-primary">Publish
                                            this Application
                                            Form</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <hr>
                    </div>
                    <div class="text-center">
                        <img class="mb-2 logo" src="../Assets/PST_LOGO.png" alt="">
                        <h5>Application Form for New Applicants Pasig City Scholars A.Y <span class="text-danger">
                                <?php echo bcsub(date("Y"),1)."-".date("Y"); ?></span>
                        </h5>
                    </div>
                    <hr>
                </div>
                <div class="active_form" id="form1">
                    <div class="form-box-title">
                        <h6 class="email">
                            <?php if(isset( $_SESSION['authenticanted'] )){echo $_SESSION['auth_user']['Email']; }?>
                        </h6>

                        <hr>
                    </div>

                </div>
                <div class="hidden_form" id=''>
                    <div class="form-box-title">
                        <div class="alert alert-warning" role="alert">
                            <h5>DOCUMENTS</h5>
                        </div>
                        <h5>1X1 Picture</h5>
                        <input type="file" name="picture">
                        <hr>
                        <h5>Proof of Enrollment (Class Assignment list, School Registration Form, Enrollment Slip, or
                            Official
                            Receipt)</h5>
                        <input type="file" name="Proof_of_Enrollment">
                        <hr>
                        <h5>School ID</h5>
                        <input type="file" name="School_ID">
                        <hr>
                        <h5>Report Card</h5>
                        <input type="file" name="Report_Card">
                        <hr>
                        <h5>Proof of Income of Parent/s (or Guardian) Please put both proof of Income of Parent/s (or
                            Guardian)
                            or Certificate of non-Filing Tax return (if unumployed)</h5>
                        <input type="file" name="Proof_of_Income">
                        <hr>
                        <h5> Barangay Residency (As proof of residency indicating the number of years residence if
                            available)
                        </h5>
                        <input type="file" name="Barangay_Residency">
                        <hr>
                    </div>
                </div>
                <div class="hidden_form" id='form11'>
                    <div class="form-box-title">
                        <div class="alert alert-warning" role="alert">
                            <h5>ACCEPTANCE OF TERMS</h5>
                        </div>
                        <P>
                            We affirm that the facts herein provided are true and correct as of the date hereof.
                            We hereby authorize the Pasig City Scholars Office and its authorized representatives to
                            verify
                            the
                            information submitted. We understand that if awarded the benefits under the PCS, any false
                            statement, omissions, or misrepresentation made in this application form may result to the
                            immediate withdrawal of the scholarship grant.</P>

                        <input type="radio" required>
                          <label>I Agree</label>
                        <br>
                        <hr>
                    </div>
                    <button type="submit" name="NewApplicants_submit_btn" class="btn btn-primary btn-block">Submit
                        user</button>
                    <button type="button" class="btn btn-danger btn-block ">Back</button>
                </div>
            </form>
        </div>








        <div class="card-body NotactivePage" id='NotactivePage'>
            <form action="Function.php" method="POST" enctype="multipart/form-data">
                <textarea name="notActiveContent" id="your_summernote" class="form-control" rows="4">
                <?php echo $row['notActiveContent'] ?>
                </textarea>
                <br>
                <button type="submit" name="New_applicants_notActiveContent_btn" class="btn btn-primary">Save
                    content</button>
                <a type="submit" href="#" onclick="history.go(-1)" class="btn btn-danger">Back</a>
            </form>
        </div>





    </div>
</div>
<?php

}
}
?>














<script>
let Active = document.getElementById("Active");

let NotActive = document.getElementById("NotActive");


let activePage = document.getElementById("activePage");

let NotactivePage = document.getElementById("NotactivePage");



Active.onclick = function() {
    activePage.style.display = "block";
    NotactivePage.style.display = "none";
}



NotActive.onclick = function() {
    activePage.style.display = "none";
    NotactivePage.style.display = "block";
}
</script>

<?php include('includes/footer.php') ?>
