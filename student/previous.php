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
                    <h4 class="font-weight-bold text-primary mb-0">Student Records</h4>
                </div>
            </div>


            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Year</th>
                                    <th>Semester</th>
                                    <th>Department</th>
                                    <th>About</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Year</th>
                                    <th>Semester</th>
                                    <th>Department</th>
                                    <th>About</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="fas fa-tools"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">About</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1"><b>Faculty Name</b></label>
                                                                    <br>
                                                                    <span>24-02-2020</span>
                                                                </div>
                                                            </div>
                                                            <div class=" col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1"><b>Course Status</b></label>
                                                                    <br>
                                                                    <span>Operating System</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1"><b>Syllabus Link</b></label>
                                                                    <br>
                                                                    <span>24-02-2020</span>
                                                                </div>
                                                            </div>
                                                            <div class=" col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1"><b>Attendance</b></label>
                                                                    <br>
                                                                    <span>Operating System</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row align-items-center">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1"><b>Marks</b></label>
                                                                    <br>
                                                                    <span>24-02-2020</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <?php include('../includes/footer.php');
    include('../includes/scripts.php');
    ?>