<?php 
$page = 'Tracker | Pasig E-Scholar';
include('Includes/dbconfig.php');


include('Head.php');



?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />


<style>
body {
    background-image: url(assets/BackgroundTip.jpg);
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
}

.main {
    margin-top: 12% !important;
    margin-bottom: 10% !important;
    height: auto;



}

.main img {
    width: 105px;
}

h3 {
    color: #01406b !important;
}

.hide {
    display: none !important;
}

.pagination .page-item.active .page-link {
    color: white;
    font-weight: bold;
    background: #003067;
    border: none !important;
}

div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-item.active .page-link:focus {
    background-color: none;

}

.pagination .page-item.active .page-link:hover {
    background-color: #fcd116 !important;
    border: none !important;

}

.card {

    padding: 10px !important;
}

tr {
    font-size: 20px !important;
    text-transform: uppercase !important;
}


@media screen and (max-width: 1000px) {
    .main {
        margin-top: 40% !important;
        width: 100% !important;
    }

    .tr_row {
        font-size: 13px !important;
        text-align: center !important;
    }

    thead tr {
        font-size: 13px !important;
    }
}

</style>

<div class="container main">



    <div class="card shadow mb-4">
        <div class="card-header bg-white text-center py-3">
            <img class="mb-2" src="Assets/PST_LOGO.png" alt="">

            <h3 class="m-0 font-weight-bold ">
                Scholars <?php echo bcsub(date("Y"),1)."-".date("Y"); ?>
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table bg-light table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>School</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                $control_page = "SELECT * FROM pages WHERE name='Scholars_List'";

                $control_page_run = mysqli_query($conn,$control_page);
                $Scholars_List=mysqli_fetch_assoc($control_page_run);

if ($Scholars_List['status'] =='active') {
    $query = "SELECT * FROM applicants_table WHERE isApproved='true'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
        while ($row=mysqli_fetch_assoc($query_run)) {
            ?>
                        <tr class="tr_row" style="color: white ;font-weight:bold; background: #003067" class="">
                            <td><?php echo $row['full_name'] ?></td>
                            <td><?php echo $row['school'] ?></td>

                        </tr>
                        <?php
        }
    }
}

                    
?>

                    </tbody>
                </table>



            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->






<?php 


 include('Footer.php');



?>
