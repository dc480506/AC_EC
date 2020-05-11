<?php
include('../config.php');
include('../includes/header.php');
?>
<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Charts</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pie Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Horizontal Bar Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="horizontalBar"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Course ID</th>
                        <th>Semester</th>
                        <th>Year</th>
                        <th>Department</th>
                        <th>No of Students</th>
                        <th>Faculty</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Course Name</th>
                        <th>Course ID</th>
                        <th>Semester</th>
                        <th>Year</th>
                        <th>Department</th>
                        <th>No of Students</th>
                        <th>Faculty</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Python</td>
                        <td>UCH103</td>
                        <td>6</td>
                        <td>2020</td>
                        <td>Computer</td>
                        <td>75</td>
                        <td>Sachin Jogendra</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>