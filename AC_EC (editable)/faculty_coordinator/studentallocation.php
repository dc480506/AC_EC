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
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
            </div>
            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle1">Filter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!--filter form start-->
                            <form class="forms-sample" method="POST" action="">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="disp1()" name="cname_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect1">Course Name</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect1" name="cname">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2" onclick="disp2()" name="cid_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect2">Course ID</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect2" name="cid">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck3" onclick="disp3()" name="sem_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect3">Semester</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect3" name="sem">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck4" onclick="disp4()" name="year_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect4">Year</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect4" name="year">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <!-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck5" onclick="disp5()" name="dept_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect5">Department</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect5" name="dept">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div> -->

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" name="filter">Filter</button>
                                </div>
                            </form>
                            <!-- fiter form end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="modal-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-current-tab" data-toggle="tab" href="#nav-current" role="tab" aria-controls="nav-current" aria-selected="true">Currently Allocated</a>
                        <a class="nav-item nav-link" id="nav-upcoming-tab" data-toggle="tab" href="#nav-upcoming" role="tab" aria-controls="nav-upcoming" aria-selected="false">Currently Unallocated</a>
                        <a class="nav-item nav-link" id="nav-previous-tab" data-toggle="tab" href="#nav-previous" role="tab" aria-controls="nav-previous" aria-selected="false">Previously Allocated</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <!--Current-->
                    <div class="tab-pane fade show active" id="nav-current" role="tabpanel" aria-labelledby="nav-current-tab">
                        <br>
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
                                                                    <a class="nav-item nav-link active" id="nav-allocate1-tab" data-toggle="tab" href="#nav-allocate1" role="tab" aria-controls="nav-allocate1" aria-selected="true">Re-Allocation</a>
                                                                    <a class="nav-item nav-link" id="nav-update1-tab" data-toggle="tab" href="#nav-update1" role="tab" aria-controls="nav-update1" aria-selected="false">Update</a>
                                                                </div>
                                                            </nav>
                                                            <div class="tab-content" id="nav-tabContent">
                                                                <!--Allocation-->
                                                                <div class="tab-pane fade show active" id="nav-allocate1" role="tabpanel" aria-labelledby="nav-allocate1-tab">
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
                                                                        <button type="submit" class="btn btn-primary">Re-Allocate</button>
                                                                    </form>
                                                                </div>
                                                                <!--end Allocation-->
                                                                <!--Update-->
                                                                <div class="tab-pane fade" id="nav-update1" role="tabpanel" aria-labelledby="nav-update1-tab">
                                                                    <form action="">
                                                                        <div class="form-row mt-4">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="fname"><b>First Name</b></label>
                                                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="first name">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="lname"><b>Last Name</b></label>
                                                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="last name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="department"><b>Department</b></label>
                                                                                <input type="text" class="form-control" id="department" name="department" placeholder="department">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="emailid"><b>Email Address</b></label>
                                                                                <input type="email" class="form-control" id="emailid" name="emailid" placeholder="email@gmail.com">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="csem"><b>Current Semester</b></label>
                                                                                <input type="number" class="form-control" id="csem" name="csem" placeholder="1">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="year"><b>Year Admitted</b></label>
                                                                                <input type="email" class="form-control" id="year" name="year" placeholder="2020">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="status"><b>Status</b></label>
                                                                                <input type="text" class="form-control" id="status" name="status" placeholder="status">
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
                        </div>
                    </div>
                    <!--end Current-->
                    <!--Upcoming-->
                    <div class="tab-pane fade" id="nav-upcoming" role="tabpanel" aria-labelledby="nav-upcoming-tab">
                        <br>
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
                                                                    <a class="nav-item nav-link active" id="nav-allocate2-tab" data-toggle="tab" href="#nav-allocate2" role="tab" aria-controls="nav-allocate2" aria-selected="true">Re-Allocation</a>
                                                                    <a class="nav-item nav-link" id="nav-update2-tab" data-toggle="tab" href="#nav-update2" role="tab" aria-controls="nav-update2" aria-selected="false">Update</a>
                                                                </div>
                                                            </nav>
                                                            <div class="tab-content" id="nav-tabContent">
                                                                <!--Allocation-->
                                                                <div class="tab-pane fade show active" id="nav-allocate2" role="tabpanel" aria-labelledby="nav-allocate2-tab">
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
                                                                        <button type="submit" class="btn btn-primary">Re-Allocate</button>
                                                                    </form>
                                                                </div>
                                                                <!--end Allocation-->
                                                                <!--Update-->
                                                                <div class="tab-pane fade" id="nav-update2" role="tabpanel" aria-labelledby="nav-update2-tab">
                                                                    <form action="">
                                                                        <div class="form-row mt-4">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="fname"><b>First Name</b></label>
                                                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="first name">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="lname"><b>Last Name</b></label>
                                                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="last name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="department"><b>Department</b></label>
                                                                                <input type="text" class="form-control" id="department" name="department" placeholder="department">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="emailid"><b>Email Address</b></label>
                                                                                <input type="email" class="form-control" id="emailid" name="emailid" placeholder="email@gmail.com">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="csem"><b>Current Semester</b></label>
                                                                                <input type="number" class="form-control" id="csem" name="csem" placeholder="1">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="year"><b>Year Admitted</b></label>
                                                                                <input type="email" class="form-control" id="year" name="year" placeholder="2020">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="status"><b>Status</b></label>
                                                                                <input type="text" class="form-control" id="status" name="status" placeholder="status">
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
                        </div>
                    </div>
                    <!--Upcoming end-->
                    <div class="tab-pane fade" id="nav-previous" role="tabpanel" aria-labelledby="nav-previous-tab">
                        <br>
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
                                            <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter4">
                                                <i class="fas fa-tools"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle4" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle4">Action</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <nav>
                                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                    <a class="nav-item nav-link active" id="nav-allocate3-tab" data-toggle="tab" href="#nav-allocate3" role="tab" aria-controls="nav-allocate3" aria-selected="true">Re-Allocation</a>
                                                                    <a class="nav-item nav-link" id="nav-update3-tab" data-toggle="tab" href="#nav-update3" role="tab" aria-controls="nav-update3" aria-selected="false">Update</a>
                                                                </div>
                                                            </nav>
                                                            <div class="tab-content" id="nav-tabContent">
                                                                <!--Allocation-->
                                                                <div class="tab-pane fade show active" id="nav-allocate3" role="tabpanel" aria-labelledby="nav-allocate3-tab">
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
                                                                        <button type="submit" class="btn btn-primary">Re-Allocate</button>
                                                                    </form>
                                                                </div>
                                                                <!--end Allocation-->
                                                                <!--Update-->
                                                                <div class="tab-pane fade" id="nav-update3" role="tabpanel" aria-labelledby="nav-update3-tab">
                                                                    <form action="">
                                                                        <div class="form-row mt-4">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="fname"><b>First Name</b></label>
                                                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="first name">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="lname"><b>Last Name</b></label>
                                                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="last name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="department"><b>Department</b></label>
                                                                                <input type="text" class="form-control" id="department" name="department" placeholder="department">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="emailid"><b>Email Address</b></label>
                                                                                <input type="email" class="form-control" id="emailid" name="emailid" placeholder="email@gmail.com">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="csem"><b>Current Semester</b></label>
                                                                                <input type="number" class="form-control" id="csem" name="csem" placeholder="1">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="year"><b>Year Admitted</b></label>
                                                                                <input type="email" class="form-control" id="year" name="year" placeholder="2020">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="status"><b>Status</b></label>
                                                                                <input type="text" class="form-control" id="status" name="status" placeholder="status">
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
                        </div>
                    </div>
                </div>
                <!--Update end-->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script>
        function showMapSection() {
            var checkBox = document.getElementById("map_cbox");

            if (checkBox.checked == true) {
                document.querySelector("#map_section").style.display = "block";
            } else {
                document.querySelector("#map_section").style.display = "none";
            }
        }
        dept_checkbox = document.querySelectorAll(".dept");

        if (document.querySelector("#customCheck7").checked) {
            for (i = 0; i < dept_checkbox.length; i++) {
                dept_checkbox[i].checked = true;
            }
        }
        all_cbox = document.querySelector("#customCheck7")
        for (i = 0; i < dept_checkbox.length; i++) {
            dept_checkbox[i].addEventListener("click", function() {
                if (!this.checked && all_cbox.checked) {
                    all_cbox.checked = false;
                }
                if (this.checked) {
                    p = true;
                    for (i = 0; i < dept_checkbox.length; i++) {
                        if (!dept_checkbox[i].checked) {
                            p = false
                            break;
                        }
                    }
                    if (p) {
                        all_cbox.checked = true;
                    }
                }
            })
        }
        all_cbox.addEventListener("click", function() {
            if (this.checked) {
                //Check all boxes
                for (i = 0; i < dept_checkbox.length; i++) {
                    dept_checkbox[i].checked = true;
                }
            } else {
                //Uncheck all boxes
                for (i = 0; i < dept_checkbox.length; i++) {
                    dept_checkbox[i].checked = false;
                }
            }
        })
    </script>
    <?php include('../includes/footer.php');
    include('../includes/scripts.php');
    ?>