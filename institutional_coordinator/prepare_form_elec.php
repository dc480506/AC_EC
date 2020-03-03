<?php include('../includes/header.php'); 
include('../config.php');
session_start();
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
                            <input type="number" class="form-control" id="exampleInputPreference" name="no_of_preferences">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSem"><b>Semester</b></label>
                            <input type="number" class="form-control" id="exampleInputSem" name="semester">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputYear"><b>Year</b></label>
                            <input type="year" class="form-control" id="exampleInputYear" name="year">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-check-label" for="exampleInputStartDate"><b>Start Date</b></label>
                                    <input type="date" class="form-control" id="exampleInputStartDate" name="start_date">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-check-label" for="exampleInputStartDate"><b>End Date</b></label>
                                    <input type="date" class="form-control" id="exampleInputStartDate" name="end_date">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary align-center" name="submit">Submit</button>
                            <button type="modify" class="btn btn-primary align-center" name="modify">Modify</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->

    <?php include('../includes/footer.php');
    include('../includes/scripts.php');
    ?>