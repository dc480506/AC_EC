<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>

<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">PhD Course Records</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="#">
                <div class="form-group">
                    <div class="form-group">
                        <h5><label for="exampleFormControlSelect1">Select Course:</label></h5>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Audit Course</option>
                            <option>Interdisciplinary Course</option>
                            <option>Close Elective Course</option>
                            <option>Open Elective Course</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-sm-2 offset-sm-5">
                            <button type="submit" class="btn btn-primary btn-block px-2"> Submit </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>