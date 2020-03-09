<?php
include('../config.php');
include('../includes/header.php');
?>
<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="offset-lg-3 offset-md-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <h1 class="h3 mb-4 text-gray-800">Prepare Form Fill</h1>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputPreference"><b>No of Preferences</b></label>
                            <input type="number" required class="form-control" id="exampleInputPreference" name="no_of_preferences">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSem"><b>Semester</b></label>
                            <input type="number" required class="form-control" id="exampleInputSem" name="semester">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputYear"><b>Year</b></label>
                            <input type="year" required class="form-control" id="exampleInputYear" name="year">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-check-label" for="exampleInputStartDate"><b>Start Date</b></label>
                                    <input type="date" required class="form-control" id="exampleInputStartDate" name="start_date">
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label" for="exampleInputStartDate"><b>Start Time</b></label>
                                    <input type="time" required class="form-control" id="exampleInputStartDate" name="start_time">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-check-label" for="exampleInputStartDate"><b>End Date</b></label>
                                    <input type="date" required class="form-control" id="exampleInputStartDate" name="end_date">
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label" for="exampleInputStartDate"><b>End Time</b></label>
                                    <input type="time" required class="form-control" id="exampleInputStartDate" name="end_time">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary align-center" name="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Year Admitted</th>
                            <th>Email Address</th>
                            <th>Current Semester</th>
                            <th>Department</th>
                            <th>Form Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Year Admitted</th>
                            <th>Email Address</th>
                            <th>Current Semester</th>
                            <th>Department</th>
                            <th>Form Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>


                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>2011/04/25</td>
                            <td>2011/04/25</td>
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter1">
                                    <i class="fas fa-tools"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle1">Action</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <a class="nav-item nav-link active" id="nav-delete-tab" data-toggle="tab" href="#nav-delete" role="tab" aria-controls="nav-delete" aria-selected="true">Deletion</a>
                                                        <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update" role="tab" aria-controls="nav-update" aria-selected="false">Update</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <!--Deletion-->
                                                    <div class="tab-pane fade show active" id="nav-delete" role="tabpanel" aria-labelledby="nav-delete-tab">
                                                        <form action="">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1"><b>Are you sure you want to delete?</b>
                                                                </label>
                                                                <br>
                                                                <button type="submit" class="btn btn-primary" name="yes">Yes</button>
                                                                <button type="submit" class="btn btn-secondary" name="no">No</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!--end Deletion-->
                                                    <!--Update-->
                                                    <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                                                        <form>
                                                            <div class="form-group">
                                                                <label for="exampleInputPreference"><b>No of Preferences</b></label>
                                                                <input type="number" required class="form-control" id="exampleInputPreference" name="no_of_preferences">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputSem"><b>Semester</b></label>
                                                                <input type="number" required class="form-control" id="exampleInputSem" name="semester">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputYear"><b>Year</b></label>
                                                                <input type="year" required class="form-control" id="exampleInputYear" name="year">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="exampleInputStartDate"><b>Start Date</b></label>
                                                                        <input type="date" required class="form-control" id="exampleInputStartDate" name="start_date">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="exampleInputStartDate"><b>Start Time</b></label>
                                                                        <input type="time" required class="form-control" id="exampleInputStartDate" name="start_time">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="exampleInputStartDate"><b>End Date</b></label>
                                                                        <input type="date" required class="form-control" id="exampleInputStartDate" name="end_date">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="exampleInputStartDate"><b>End Time</b></label>
                                                                        <input type="time" required class="form-control" id="exampleInputStartDate" name="end_time">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="modify" class="btn btn-primary align-center" name="modify">Modify</button>
                                                        </form>
                                                        <br>
                                                    </div>
                                                    <!--Update end-->
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                    <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                                                </div>
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

    <!-- /.container-fluid -->

    <?php include('../includes/footer.php');
    include('../includes/scripts.php');
    ?>