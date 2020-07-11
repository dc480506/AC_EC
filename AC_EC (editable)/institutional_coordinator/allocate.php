<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>


<?php include('../includes/topbar1.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <style type="text/css">
            .card {
                position: absolute;
                top: 80px;
                left: 0px;
                width: 100%;
            }
        </style>
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">Allocation : Semester 5 and Academic Year 2019-20</h4>
                </div>
                <div class="col text-right">
                    <a href="prepare_form_ac.php" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="text">Cancel Allocation</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="modal-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-allocate-method-tab" data-toggle="tab" href="#nav-allocate-method" role="tab" aria-controls="nav-allocate-method" aria-selected="true">Allocation Method</a>
                    <a class="nav-item nav-link" id="nav-course-tab" data-toggle="tab" href="#nav-course" role="tab" aria-controls="nav-course" aria-selected="true">Course Selection</a>
                    <a class="nav-item nav-link" id="nav-result-tab" data-toggle="tab" href="#nav-result" role="tab" aria-controls="nav-result" aria-selected="false">Allocation Analysis</a>
                    <a class="nav-item nav-link" id="nav-final-allocate-tab" data-toggle="tab" href="#nav-final-allocate" role="tab" aria-controls="nav-final-allocate" aria-selected="false">Final Allocation</a>
                    <a class="nav-item nav-link" id="nav-complete-tab" data-toggle="tab" href="#nav-complete" role="tab" aria-controls="nav-complete" aria-selected="false">Complete</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <!--Allocation method-->
                <div class="tab-pane fade show active" id="nav-allocate-method" role="tabpanel" aria-labelledby="nav-allocate-method-tab">
                    <form action="">

                        <div class="form-group">
                            <br>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">First Come First Serve</label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                <label class="custom-control-label" for="customSwitch2">Previous Semester Marks</label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                <label class="custom-control-label" for="customSwitch3">Cumulative Semester Marks</label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch4">
                                <label class="custom-control-label" for="customSwitch4">Profile Based</label>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary align-center" name="allocate">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--end Allocation Method-->
                <div class="tab-pane fade" id="nav-course" role="tabpanel" aria-labelledby="nav-course-tab">
                    <form class="forms-sample" method="POST" action="">
                        <div class="form-row mt-4">
                            <div class="form-group col-md-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label font-weight-bold text-primary text-uppercase mb-1" for="customSwitch1">All Courses</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label font-weight-bold text-primary text-uppercase mb-1" for="customSwitch1">Introduction to Python for Data Science</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label font-weight-bold text-primary text-uppercase mb-1" for="customSwitch1">Introduction to Python for Data Science</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label font-weight-bold text-primary text-uppercase mb-1" for="customSwitch1">Introduction to Python for Data Science</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary align-center" name="previous">Previous</button>
                            <button type="submit" class="btn btn-primary align-center" name="allocate">Next</button>
                        </div>
                    </form>
                </div>
                <!--Result Analysis-->
                <div class="tab-pane fade" id="nav-result" role="tabpanel" aria-labelledby="nav-result-tab">
                    <div class="table-responsive">
                        <br>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Python</td>
                                    <td>UCH102</td>
                                    <td>6</td>
                                    <td>2019</td>
                                    <td>Comp</td>
                                    <td>75</td>
                                    <td>10</td>
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
                                                                            <label for="cname"><b>Course Name</b></label>
                                                                            <input type="text" class="form-control" id="cname" name="cname" placeholder="Course Name">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="cid"><b>Course ID</b></label>
                                                                            <input type="text" class="form-control" id="cid" name="cid" placeholder="Course ID">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="year"><b>Year</b></label>
                                                                            <input type="text" class="form-control" id="year" name="year" placeholder="Year">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="semester"><b>Semester</b></label>
                                                                            <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester">
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="department"><b>Department</b></label>
                                                                            <input type="text" class="form-control" id="department" name="department" placeholder="department">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="max"><b>Max</b></label>
                                                                            <input type="number" class="form-control" id="max" name="max" placeholder="Max">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="min"><b>Min</b></label>
                                                                            <input type="number" class="form-control" id="min" name="min" placeholder="Min">
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

                            <button type="submit" class="btn btn-secondary align-center" name="previous">Previous</button>
                            <button type="submit" class="btn btn-primary align-center" name="allocate">Next</button>
                        </div>
                    </div>
                    <!--Update end-->
                </div>
                <div class="tab-pane fade" id="nav-final-allocate" role="tabpanel" aria-labelledby="nav-final-allocate-tab">
                    <br>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                    </div>
                    <br>
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Student Unallocated</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <br>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email ID</th>
                                        <th>Roll Number</th>
                                        <th>Preference List</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ganesh Gaitonde</td>
                                        <td>ganesh.g@somaiya.edu</td>
                                        <td>1719082</td>
                                        <td>1.Python<br> 2.OOPM <br>3.Data Structure</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter3">
                                                <i class="fas fa-tools"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle3" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle3">Action</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <nav>
                                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                    <a class="nav-item nav-link active" id="nav-delete1-tab" data-toggle="tab" href="#nav-delete1" role="tab" aria-controls="nav-delete1" aria-selected="true">Deletion</a>
                                                                    <a class="nav-item nav-link" id="nav-update1-tab" data-toggle="tab" href="#nav-update1" role="tab" aria-controls="nav-update1" aria-selected="false">Allocate</a>
                                                                </div>
                                                            </nav>
                                                            <div class="tab-content" id="nav-tabContent">
                                                                <!--Deletion-->
                                                                <div class="tab-pane fade show active" id="nav-delete1" role="tabpanel" aria-labelledby="nav-delete1-tab">
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
                                                                <div class="tab-pane fade show " id="nav-update1" role="tabpanel" aria-labelledby="nav-update1-tab">
                                                                    <form action="">
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlSelect1"><b>Department</b>
                                                                            </label>
                                                                            <select class="form-control" id="exampleFormControlSelect1" name="department">
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlSelect1"><b>Course</b>
                                                                            </label>
                                                                            <select class="form-control" id="exampleFormControlSelect1" name="course">
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlSelect1"><b>Course ID</b>
                                                                            </label>
                                                                            <select class="form-control" id="exampleFormControlSelect1" name="course">
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                            </select>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary">Allocate</button>
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
                        </div>
                    </div>

                    <br>
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Student Allocated</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <br>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email ID</th>
                                        <th>Roll Number</th>
                                        <th>Preference List</th>
                                        <th>Course</th>
                                        <th>Preference Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>tiger.n@somaiya.edu</td>
                                        <td>1719092</td>
                                        <td>1.Python<br> 2.OOPM <br>3.Data Structure</td>
                                        <td>Python(UCH132)</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-secondary align-center" name="previous">Previous</button>
                        <button type="submit" class="btn btn-primary align-center" name="Complete">Complete</button>
                    </div>
                </div>
                <!--Update end-->
                <div class="tab-pane fade " id="nav-complete" role="tabpanel" aria-labelledby="nav-complete-tab">
                    <form action="">

                        <div class="form-group">
                            <br>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">First Come First Serve</label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                <label class="custom-control-label" for="customSwitch2">Previous Semester Marks</label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                <label class="custom-control-label" for="customSwitch3">Cumulative Semester Marks</label>
                            </div>
                            <br>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch4">
                                <label class="custom-control-label" for="customSwitch4">Profile Based</label>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary align-center" name="allocate">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>