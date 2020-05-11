<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>

<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<!-- Begin Page Content -->
<div hclass="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Faculty Records</h4>
            <div class="col text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">
                    <i class="fas fa-filter"></i>
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle1">Filter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Table -->

                        <form class="forms-sample" method="POST" action="">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="disp1()">
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
                                <input type="checkbox" class="form-check-input" id="exampleCheck2" onclick="disp2()">
                                <label class="form-check-label" for="exampleFormControlSelect2">Course ID</label>
                                <select class="form-control" style="display: none" id="exampleFormControlSelect2" name="cname">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck3" onclick="disp3()">
                                <label class="form-check-label" for="exampleFormControlSelect3">Semester</label>
                                <select class="form-control" style="display: none" id="exampleFormControlSelect3" name="cname">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck4" onclick="disp4()">
                                <label class="form-check-label" for="exampleFormControlSelect4">Year</label>
                                <select class="form-control" style="display: none" id="exampleFormControlSelect4" name="cname">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck5" onclick="disp5()">
                                <label class="form-check-label" for="exampleFormControlSelect5">Department</label>
                                <select class="form-control" style="display: none" id="exampleFormControlSelect5" name="cname">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                <button type="submit" class="btn btn-outline-primary" name="filter">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Course</th>
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
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Action</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <a class="nav-item nav-link active" id="nav-allocate-tab" data-toggle="tab" href="#nav-allocate" role="tab" aria-controls="nav-allocate" aria-selected="true">Allocation</a>
                                                        <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update" role="tab" aria-controls="nav-update" aria-selected="false">Update</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <!--Allocation-->
                                                    <div class="tab-pane fade show active" id="nav-allocate" role="tabpanel" aria-labelledby="nav-allocate-tab">
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
                                                            <button type="submit" class="btn btn-primary" name="allocate">Allocate</button>
                                                        </form>
                                                    </div>
                                                    <!--end Allocation-->
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
                                                                    <input type="email" class="form-control" name="emailid" id="emailid" placeholder="email@gmail.com">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="department"><b>Department</b></label>
                                                                    <input type="text" class="form-control" name="department" id="department" placeholder="department">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="status"><b>Status</b></label>
                                                                    <input type="text" class="form-control" id="status" name="status" placeholder="status">
                                                                </div>

                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="course"><b>Course</b></label>
                                                                    <input type="text" class="form-control" id="course" name="course" placeholder="course">
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
</div>
<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>