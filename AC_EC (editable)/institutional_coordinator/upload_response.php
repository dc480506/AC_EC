<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>
<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">Upload Process</h4>
                </div>
                <div class="col text-right">
                    <a href="upload_response.php" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="text">Cancel Process</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="modal-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-upload-method-tab" data-toggle="tab" href="#nav-upload-method" role="tab" aria-controls="nav-upload-method" aria-selected="true">Upload</a>
                    <a class="nav-item nav-link" id="nav-result-tab" data-toggle="tab" href="#nav-result" role="tab" aria-controls="nav-result" aria-selected="false">Result</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <!--Allocation method-->
                <div class="tab-pane fade show active" id="nav-upload-method" role="tabpanel" aria-labelledby="nav-upload-method-tab">
                    <div class="modal-body">
                        <div class="container">
                            <form method="post" action="#" id="#">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="semester"><b>Semester</b></label>
                                        <input type="text" class="form-control" id="semester" placeholder="Semester" name="semester">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="year"><b>Year</b></label>
                                        <input type="number" class="form-control" id="year" name="year" placeholder="Year">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="ctype"><b>Course Type</b></label>
                                        <select class="browser-default custom-select">
                                            <option selected></option>
                                            <option value="1">Audit Course</option>
                                            <option value="2">interdisciplinary Course</option>
                                            <option value="3">Open Elective Course</option>
                                            <option value="4">Close Elective Course</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="rno"><b>Roll Number</b></label>
                                        <input type="number" class="form-control" id="rno" name="rno" placeholder="Column Number">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="department"><b>Department</b></label>
                                        <input type="number" class="form-control" id="department" name="department" placeholder="Column Number">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email"><b>Email</b></label>
                                        <input type="number" class="form-control" id="email" name="email" placeholder="Column Number">
                                    </div>
                                </div>
                                
                                <div class="form-row mt-4">
                                    <div class="form-group col-md-4">
                                        <label for="tstamp"><b>Time Stamp</b></label>
                                        <input type="number" class="form-control" id="tstamp" placeholder="Column Number" name="tstamp">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="status"><b>Allocate Status</b></label>
                                        <input type="number" class="form-control" id="status" placeholder="Column Number" name="status">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="npre"><b>Number of valid Preferences</b></label>
                                        <input type="number" class="form-control" id="npre" placeholder=" Column Number" name="npre">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group files color">
                                    <input type="file" class="form-control" multiple="">
                                </div>
                            </form>
                        </div>
                    </div>
                    <style type="text/css">
                        .files input {
                            outline: 2px dashed #92b0b3;
                            outline-offset: -10px;
                            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                            transition: outline-offset .15s ease-in-out, background-color .15s linear;
                            padding: 120px 0px 85px 35%;
                            text-align: center !important;
                            margin: 0;
                            width: 100% !important;
                        }

                        .files input:focus {
                            outline: 2px dashed #92b0b3;
                            outline-offset: -10px;
                            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                            transition: outline-offset .15s ease-in-out, background-color .15s linear;
                            border: 1px solid #92b0b3;
                        }

                        .files {
                            position: relative
                        }

                        .files:after {
                            pointer-events: none;
                            position: absolute;
                            top: 60px;
                            left: 0;
                            width: 50px;
                            right: 0;
                            height: 56px;
                            content: "";
                            background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
                            display: block;
                            margin: 0 auto;
                            background-size: 100%;
                            background-repeat: no-repeat;
                        }

                        .color input {
                            background-color: #f1f1f1;
                        }

                        .files:before {
                            position: absolute;
                            bottom: 10px;
                            left: 0;
                            pointer-events: none;
                            width: 100%;
                            right: 0;
                            height: 57px;
                            display: block;
                            margin: 0 auto;
                            color: #2ea591;
                            font-weight: 600;
                            text-transform: capitalize;
                            text-align: center;
                        }
                    </style>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                        <button type="button" class="btn btn-primary" name="save_changes">Next</button>
                    </div>
                </div>
                <!--end Allocation Method-->
                <!--Result Analysis-->
                <div class="tab-pane fade" id="nav-result" role="tabpanel" aria-labelledby="nav-result-tab">
                    <br>
                    <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Email Address</th>
                                <th>Roll Number</th>
                                <th>Year</th>
                                <th>Department</th>
                                <th>Semester</th>
                                <th>Time Stamp</th>
                                <th>Allocate Status</th>
                                <th>No of Valid Preferences</th>
                                <th>Preference List</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>emailID</td>
                                <td>rollno</td>
                                <td>year</td>
                                <td>department</td>
                                <td>Sem</td>
                                <td>timestamp</td>
                                <td>status</td>
                                <td>no_preference</td>
                                <td>preferences</td>
                                <td>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter2">
                                        <i class="fas fa-tools"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle2">Action</h5>
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
                                                            <form action="">
                                                                <div class="form-row mt-4">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="rno"><b>Roll Number</b></label>
                                                                        <input type="text" class="form-control" id="rno" name="rno" placeholder="Roll Number">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="emailid"><b>Email Address</b></label>
                                                                        <input type="email" class="form-control" id="emailid" name="emailid" placeholder="email@gmail.com">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="department"><b>Department</b></label>
                                                                        <input type="text" class="form-control" id="department" name="department" placeholder="Department">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="sem"><b>Semester</b></label>
                                                                        <input type="text" class="form-control" id="sem" name="sem" placeholder="Semester">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="year"><b>Year</b></label>
                                                                        <input type="text" class="form-control" id="year" name="year" placeholder="Year">
                                                                    </div>
                                                                </div>

                                                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                                                            </form>
                                                        </div>
                                                        <!--Update end-->

                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                    <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary align-center" name="upload">upload</button>
                    </div>

                    <!--Update end-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>