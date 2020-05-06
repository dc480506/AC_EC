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
                <h1 class="h3 mb-4 text-gray-800">Allocation : Semester 5 and Academic Year 2019-20 </h1>
            </div>
        </div>
        <div class="modal-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-allocate-method-tab" data-toggle="tab" href="#nav-allocate-method" role="tab" aria-controls="nav-allocate-method" aria-selected="true">Allocation Method</a>
                    <a class="nav-item nav-link" id="nav-result-tab" data-toggle="tab" href="#nav-result" role="tab" aria-controls="nav-result" aria-selected="false">Allocation Analysis</a>
                    <a class="nav-item nav-link" id="nav-final-allocate-tab" data-toggle="tab" href="#nav-final-allocate" role="tab" aria-controls="nav-final-allocate" aria-selected="false">Final Allocation</a>
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
                        </div>
                    </form>
                </div>
                <!--end Allocation Method-->
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
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>61</td>
                                    <td>61</td>
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
                                                                            <label for="name"><b>Name</b></label>
                                                                            <input type="text" class="form-control" id="name" name="name" placeholder="name">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="emailid"><b>Email Address</b></label>
                                                                            <input type="email" class="form-control" id="emailid" name="emailid" placeholder="email@gmail.com">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="department"><b>Department</b></label>
                                                                            <input type="text" class="form-control" id="department" name="department" placeholder="department">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="accomplishment"><b>Accomplishment</b></label>
                                                                            <input type="text" class="form-control" id="accomplishment" name="accomplishment" placeholder="accomplishment">
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="post"><b>Post</b></label>
                                                                            <input type="text" class="form-control" id="post" name="post" placeholder="post">
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
                            <button type="submit" class="btn btn-primary align-center" name="allocate">Allocate</button>
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
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>61</td>
                                        <td>61</td>
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
                                                                                <label for="name"><b>Name</b></label>
                                                                                <input type="text" class="form-control" id="name" name="name" placeholder="name">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="emailid"><b>Email Address</b></label>
                                                                                <input type="email" class="form-control" id="emailid" name="emailid" placeholder="email@gmail.com">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="department"><b>Department</b></label>
                                                                                <input type="text" class="form-control" id="department" name="department" placeholder="department">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="accomplishment"><b>Accomplishment</b></label>
                                                                                <input type="text" class="form-control" id="accomplishment" name="accomplishment" placeholder="accomplishment">
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="post"><b>Post</b></label>
                                                                                <input type="text" class="form-control" id="post" name="post" placeholder="post">
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

                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary align-center" name="Complete">Complete</button>
                    </div>
                </div>
                <!--Update end-->
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>