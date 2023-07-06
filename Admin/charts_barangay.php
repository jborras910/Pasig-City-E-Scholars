<?php 

$page = 'charts_barangay';


include('includes/header.php');
include('includes/navbar.php');
include('includes/restrict.php'); 
include('includes/dbconfig.php'); 


 ?>

<style>
.chart-bar,
.chart-pie {
    width: 100% !important;
    height: 10% !important;

}

</style>


<!-- js chart api -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container-fluid">

    <div class="card shadow mb-4" id="div1">

        <div class="card-header" style="display:flex; justify-content:space-between;">
            <h3>Approved Applicants</h3>



            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Approved Applicants
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" onclick="showDiv('div1', 'Approved Applicants')">Approved
                        Applicants</a>
                    <a class="dropdown-item" href="#" onclick="showDiv('div2', 'Disapproved Applicants')">Disapproved
                        Applicants</a>
                    <a class="dropdown-item" href="#" onclick="showDiv('div3', 'Overall Applicants')">Overall
                        Applicants</a>
                </div>
            </div>











        </div>

        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <!-- Bar Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Number of Scholars from Each Barangay</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="barangay_bar_chart"></canvas>
                            </div>
                            <hr>
                            This bar chart shows the number of scholars from each barangay in a particular area.

                        </div>
                    </div>
                </div>

                <!-- Donut Chart -->
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">New Applicants vs. Renewal</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie ">
                                <canvas id="doughnut_chart"></canvas>
                            </div>
                            <hr>
                            This donut chart shows the proportion of new applicants and renewal for a particular
                            program.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card shadow mb-4" style="display:none;" id="div2">

        <div class="card-header" style="display:flex; justify-content:space-between;">
            <h3>Disaaproved Applicants</h3>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Disaaproved Applicants
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" onclick="showDiv('div1', 'Approved Applicants')">Approved
                        Applicants</a>
                    <a class="dropdown-item" href="#" onclick="showDiv('div2', 'Disapproved Applicants')">Disapproved
                        Applicants</a>
                    <a class="dropdown-item" href="#" onclick="showDiv('div3', 'Overall Applicants')">Overall
                        Applicants</a>
                </div>
            </div>





        </div>

        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <!-- Bar Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Number of Scholars from Each Barangay</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="barangay_bar_chart_2"></canvas>
                            </div>
                            <hr>
                            This bar chart shows the number of scholars from each barangay in a particular area.

                        </div>
                    </div>
                </div>
                <!-- Donut Chart -->
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">New Applicants vs. Renewal</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie ">
                                <canvas id="doughnut_chart_2"></canvas>
                            </div>
                            <hr>
                            This donut chart shows the proportion of new applicants and renewal for a particular
                            program.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="card shadow mb-4" style="display:none;" id="div3">


        <div class="card-header" style="display:flex; justify-content:space-between;">
            <h3>Overall Applicants</h3>


            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Overall Applicants
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" onclick="showDiv('div1', 'Approved Applicants')">Approved
                        Applicants</a>
                    <a class="dropdown-item" href="#" onclick="showDiv('div2', 'Disapproved Applicants')">Disapproved
                        Applicants</a>
                    <a class="dropdown-item" href="#" onclick="showDiv('div3', 'Overall Applicants')">Overall
                        Applicants</a>
                </div>
            </div>

        </div>

        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <!-- Bar Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Number of Scholars from Each Barangay</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="barangay_bar_chart_3"></canvas>
                            </div>
                            <hr>
                            This bar chart shows the number of scholars from each barangay in a particular area.

                        </div>
                    </div>
                </div>
                <!-- Donut Chart -->
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">New Applicants vs. Renewal</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie ">
                                <canvas id="doughnut_chart_3"></canvas>
                            </div>
                            <hr>
                            This donut chart shows the proportion of new applicants and renewal for a particular
                            program.
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>




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
</div>





<script>
<?php 

$sql =
    "SELECT barangay, COUNT(barangay) AS scholars_barangay FROM `applicants_table` WHERE isApproved='true' GROUP BY barangay";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {


    $barangay[] = $row['barangay'];
    $scholars_barangay[] = $row['scholars_barangay'];

}
?>
const backgroundColors = Array.from({
    length: 30
}, () => `#${Math.floor(Math.random()*16777215).toString(16)}`);


const data = {
    labels: <?php echo json_encode($barangay); ?>,
    datasets: [{
        label: 'Baranngay',
        backgroundColor: backgroundColors,
        borderColor: 'rgb(227, 220, 16)',
        data: <?php echo json_encode($scholars_barangay); ?>,
    }]
};

const config = {
    type: 'bar',
    data: data,
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

const barangay_bar_chart = new Chart(
    document.getElementById('barangay_bar_chart'),
    config
);
</script>


<script>
<?php 

$sql_3 =
    "SELECT barangay, COUNT(barangay) AS scholars_barangay FROM `applicants_table` WHERE isApproved='disapproved' GROUP BY barangay";

$result_3 = mysqli_query($conn, $sql_3);

while ($row_3 = mysqli_fetch_array($result_3)) {


    $barangay_3[] = $row_3['barangay'];
    $scholars_barangay_3[] = $row_3['scholars_barangay'];

}
?>
const backgroundColors_3 = Array.from({
    length: 30
}, () => `#${Math.floor(Math.random()*16777215).toString(16)}`);


const data_3 = {
    labels: <?php echo json_encode($barangay_3); ?>,
    datasets: [{
        label: 'Baranngay',
        backgroundColor: backgroundColors_3,
        borderColor: 'rgb(227, 220, 16)',
        data: <?php echo json_encode($scholars_barangay_3); ?>,
    }]
};

const config_3 = {
    type: 'bar',
    data: data_3,
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

const barangay_bar_chart_2 = new Chart(
    document.getElementById('barangay_bar_chart_2'),
    config_3
);
</script>

<script>
<?php 

$sql_5 =
    "SELECT barangay, COUNT(barangay) AS scholars_barangay FROM `applicants_table` GROUP BY barangay";

$result_5 = mysqli_query($conn, $sql_5);

while ($row_5 = mysqli_fetch_array($result_5)) {


    $barangay_5[] = $row_5['barangay'];
    $scholars_barangay_5[] = $row_5['scholars_barangay'];

}
?>
const backgroundColors_4 = Array.from({
    length: 30
}, () => `#${Math.floor(Math.random()*16777215).toString(16)}`);


const data_5 = {
    labels: <?php echo json_encode($barangay_5); ?>,
    datasets: [{
        label: 'Baranngay',
        backgroundColor: backgroundColors_4,
        borderColor: 'rgb(227, 220, 16)',
        data: <?php echo json_encode($scholars_barangay_5); ?>,
    }]
};

const config_5 = {
    type: 'bar',
    data: data_5,
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

const barangay_bar_chart_3 = new Chart(
    document.getElementById('barangay_bar_chart_3'),
    config_5
);
</script>


<script>
<?php 
$sql_2 = "SELECT scholar_type, COUNT(scholar_type) AS Scholar_tpye FROM `applicants_table` WHERE isApproved='true' GROUP BY scholar_type;";
$result = mysqli_query($conn, $sql_2);

while($row_2 = mysqli_fetch_array($result)){


$scholar_type[] = $row_2['scholar_type'];
$Scholar_tpye[] = $row_2['Scholar_tpye'];


}
?>

const data_2 = {
    labels: <?php echo json_encode($scholar_type); ?>,
    datasets: [{

        data: <?php echo json_encode($Scholar_tpye); ?>,
        hoverOffset: 4
    }]
};

const config_2 = {
    type: 'pie',
    data: data_2
};
const doughnut_chart = new Chart(
    document.getElementById('doughnut_chart'),
    config_2
);
</script>

<script>
<?php 
$sql_4 = "SELECT scholar_type, COUNT(scholar_type) AS Scholar_tpye FROM `applicants_table` WHERE isApproved='disapproved' GROUP BY scholar_type;";
$result_4 = mysqli_query($conn, $sql_4);

while($row_4 = mysqli_fetch_array($result_4)){


$scholar_type_4[] = $row_4['scholar_type'];
$Scholar_tpye_4[] = $row_4['Scholar_tpye'];


}
?>

const data_4 = {
    labels: <?php echo json_encode($scholar_type_4); ?>,
    datasets: [{

        data: <?php echo json_encode($Scholar_tpye_4); ?>,
        hoverOffset: 4
    }]
};

const config_4 = {
    type: 'pie',
    data: data_4
};
const doughnut_chart_2 = new Chart(
    document.getElementById('doughnut_chart_2'),
    config_4
);
</script>

<script>
<?php 
$sql_5 = "SELECT scholar_type, COUNT(scholar_type) AS Scholar_tpye FROM `applicants_table` GROUP BY scholar_type;";
$result_5 = mysqli_query($conn, $sql_5);

while($row_5 = mysqli_fetch_array($result_5)){


$scholar_type_5[] = $row_5['scholar_type'];
$Scholar_tpye_5[] = $row_5['Scholar_tpye'];


}
?>

const data_6 = {
    labels: <?php echo json_encode($scholar_type_5); ?>,
    datasets: [{

        data: <?php echo json_encode($Scholar_tpye_5); ?>,
        hoverOffset: 4
    }]
};

const config_6 = {
    type: 'pie',
    data: data_6
};
const doughnut_chart_3 = new Chart(
    document.getElementById('doughnut_chart_3'),
    config_6
);
</script>













<!-- /.container-fluid -->
<?php include('includes/footer.php') ?>
