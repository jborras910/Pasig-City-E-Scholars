<?php 




$page = 'charts';


include('includes/header.php');
include('includes/navbar.php');
include('includes/restrict.php'); 
include('includes/dbconfig.php'); 


 ?>


<style>
.chart-bar,
.chart-pie {
    width: 100% !important;
    height: 100% !important;
    text-align: center !important;

}

canvas {

    margin: 5px auto !important;
    width: 90% !important;
    height: 100% !important;
}

</style>

<!-- js chart api -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<!-- Page Heading -->
<div class="container-fluid">



    <div class="card shadow mb-4" id="div1">
        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Approved Applicants Program</h2>
                <div>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Approved
                            Applicants
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" onclick="showDiv('div1', 'Approved Applicants')">Approved
                                Applicants</a>
                            <a class="dropdown-item" href="#"
                                onclick="showDiv('div2', 'Disapproved Applicants')">Disapproved
                                Applicants</a>
                            <a class="dropdown-item" href="#" onclick="showDiv('div3', 'Overall Applicants')">Overall
                                Applicants</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row d-flex ">
                <div class="col-md-12">
                    <!-- Bar Chart -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="approved_applicants_program"></canvas>
                            </div>
                            <hr>


                        </div>
                    </div>
                </div>


            </div>
        </div>



    </div>



    <div class="card shadow mb-4" style="display:none;" id="div2">
        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Disapproved Applicants Program</h2>
                <div>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Disapproved Applicants
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" onclick="showDiv('div1', 'Approved Applicants')">Approved
                                Applicants</a>
                            <a class="dropdown-item" href="#"
                                onclick="showDiv('div2', 'Disapproved Applicants')">Disapproved
                                Applicants</a>
                            <a class="dropdown-item" href="#" onclick="showDiv('div3', 'Overall Applicants')">Overall
                                Applicants</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php include('sweetAlert.php');?>
            <div class="chart-bar">
                <canvas id="disapproved_applicants_program"></canvas>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4" style="display:none;" id="div3">
        <div class="card-header">
            <div class="flex-box" style="display:flex; justify-content:space-between">
                <h2 class="mb-0">Overall Applicants Program</h2>
                <div>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Overall Applicants
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" onclick="showDiv('div1', 'Approved Applicants')">Approved
                                Applicants</a>
                            <a class="dropdown-item" href="#"
                                onclick="showDiv('div2', 'Disapproved Applicants')">Disapproved
                                Applicants</a>
                            <a class="dropdown-item" href="#" onclick="showDiv('div3', 'Overall Applicants')">Overall
                                Applicants</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php include('sweetAlert.php');?>
            <div class="chart-bar">
                <canvas id="overall_applicants_program"></canvas>
            </div>
        </div>
    </div>








</div>





<!-- /.container-fluid -->
<?php include('includes/footer.php') ?>








<script>
function showDiv(divId, category) {
    // Hide all divs
    document.querySelectorAll('div[id^="div"]').forEach(div => {
        div.style.display = "none";
    });

    // Show selected div
    document.getElementById(divId).style.display = "block";

    // Update dropdown button text
    document.getElementById("dropdownMenuButton").textContent = category;
}
</script>

























<script>
<?php 
$overall_applicants_program_sql = "SELECT program, COUNT(program) AS program_count FROM `applicants_table` GROUP BY program;";
$overall_applicants_program_sql_result = mysqli_query($conn, $overall_applicants_program_sql);

while($overall_applicants_program_sql_result_row = mysqli_fetch_array($overall_applicants_program_sql_result)){


$program_1[] = $overall_applicants_program_sql_result_row['program'];
$program_count_1[] = $overall_applicants_program_sql_result_row['program_count'];


}
?>

const backgroundColors_overall_program = Array.from({
    length: 30
}, () => `#${Math.floor(Math.random()*16777215).toString(16)}`);

const overall_applicants_program_data_4 = {
    labels: <?php echo json_encode($program_1); ?>,
    datasets: [{
        label: '',
        backgroundColor: backgroundColors_overall_program,
        data: <?php echo json_encode($program_count_1); ?>,
        hoverOffset: 4
    }]
};


const overall_applicants_program_config_4 = {
    type: 'bar',
    data: overall_applicants_program_data_4,
    options: {
        plugins: {
            legend: {
                display: false // Set display property to false to hide the label
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        if (Number.isInteger(value)) {
                            return value;
                        }
                        return '';
                    }
                }
            }
        }
    }
};
const overall_applicants_program_bar_chart = new Chart(
    document.getElementById('overall_applicants_program'),
    overall_applicants_program_config_4
);
</script>






<script>
<?php 
$approved_applicants_program_sql = "SELECT program, COUNT(program) AS program_count FROM `applicants_table` WHERE isApproved='true' GROUP BY program;";
$approved_applicants_program_sql_result = mysqli_query($conn, $approved_applicants_program_sql);

while($approved_applicants_program_sql_result_row = mysqli_fetch_array($approved_applicants_program_sql_result)){


$program_2[] = $approved_applicants_program_sql_result_row['program'];
$program_count_2[] = $approved_applicants_program_sql_result_row['program_count'];


}
?>

const backgroundColors_approved_program = Array.from({
    length: 30
}, () => `#${Math.floor(Math.random()*16777215).toString(16)}`);

const approved_applicants_program_data_4 = {
    labels: <?php echo json_encode($program_2); ?>,
    datasets: [{
        label: 'Program',
        backgroundColor: backgroundColors_approved_program,

        data: <?php echo json_encode($program_count_2); ?>,
        hoverOffset: 4
    }]
};

const approved_applicants_program_config_4 = {
    type: 'bar',
    data: approved_applicants_program_data_4,
    options: {
        plugins: {
            legend: {
                display: false // Set display property to false to hide the label
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        if (Number.isInteger(value)) {
                            return value;
                        }
                        return '';
                    }
                }
            }
        }
    }
};
const approved_applicants_program_bar_chart = new Chart(
    document.getElementById('approved_applicants_program'),
    approved_applicants_program_config_4
);
</script>











<script>
<?php 
$disapproved_applicants_program_sql = "SELECT program, COUNT(program) AS program_count FROM `applicants_table` WHERE isApproved='disapproved' GROUP BY program;";
$disapproved_applicants_program_sql_result = mysqli_query($conn, $disapproved_applicants_program_sql);

while($disapproved_applicants_program_sql_result_row = mysqli_fetch_array($disapproved_applicants_program_sql_result)){


$program_3[] = $disapproved_applicants_program_sql_result_row['program'];
$program_count_3[] = $disapproved_applicants_program_sql_result_row['program_count'];


}
?>

const backgroundColors_disapproved_program = Array.from({
    length: 30
}, () => `#${Math.floor(Math.random()*16777215).toString(16)}`);

const disapproved_applicants_program_data_4 = {
    labels: <?php echo json_encode($program_3); ?>,
    datasets: [{
        label: 'Program',
        backgroundColor: backgroundColors_disapproved_program,

        data: <?php echo json_encode($program_count_3); ?>,
        hoverOffset: 4
    }]
};

const disapproved_applicants_program_config_4 = {
    type: 'bar',
    data: disapproved_applicants_program_data_4,
    options: {
        plugins: {
            legend: {
                display: false // Set display property to false to hide the label
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        if (Number.isInteger(value)) {
                            return value;
                        }
                        return '';
                    }
                }
            }
        }
    }
};
const disapproved_applicants_program_bar_chart = new Chart(
    document.getElementById('disapproved_applicants_program'),
    disapproved_applicants_program_config_4
);
</script>
