<?php include('../includes/header.php'); 
include('../config.php');
session_start();
?>

<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <h1 class="h3 mb-4 text-gray-800">Allocation method</h1>
            </div>
        </div>
        <form>
            <div class="card-body">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">First Come First Serve</label>
                </div>
                <br>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" disabled id="customSwitch2">
                    <label class="custom-control-label" for="customSwitch2">Disabled</label>
                </div>
                <br>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" disabled id="customSwitch3">
                    <label class="custom-control-label" for="customSwitch3">Disabled</label>
                </div>
                <br>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" disabled id="customSwitch4">
                    <label class="custom-control-label" for="customSwitch4">Disabled</label>
                </div>
                <br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary align-center" name="allocate">Allocate</button>
                </div>
        </form>
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Allocation Table</h5>
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
                            <th>Max</th>
                            <th>Min</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>61</td>
                            <td>61</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>