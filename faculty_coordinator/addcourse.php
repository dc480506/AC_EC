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
                    <h4 class="font-weight-bold text-primary mb-0">Course Records</h4>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="ni ni-fat-add">&nbsp;</i>+ &nbsp;Add Course
                    </button>
                </div>
            </div>
            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle2">Filter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!--filter form start-->
                            <form class="forms-sample" method="POST" action="">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction1()">
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
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
                                    <label class="form-check-label" for="exampleFormControlSelect2">Course ID</label>
                                    <select class="form-control"  style="display: none" id="exampleFormControlSelect2" name="cname">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
                                    <label class="form-check-label" for="exampleFormControlSelect3">Semester</label>
                                    <select class="form-control"  style="display: none" id="exampleFormControlSelect3" name="cname">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
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
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
                                    <label class="form-check-label" for="exampleFormControlSelect5">Department</label>
                                    <select class="form-control"  style="display: none" id="exampleFormControlSelect5" name="cname">
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
                            <!-- fiter form end-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add New Course</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Table -->

                            <form class="forms-sample" method="POST" action="queries.php">
                                <div class="form-group">
                                    <label for="exampleInputName1"><b>Name</b></label>
                                    <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCourseid"><b>Course ID</b></label>
                                    <input type="number" class="form-control" id="exampleInputCourseid" name="courseid" placeholder="Course ID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSemester"><b>Semester</b></label>
                                    <input type="text" class="form-control" id="exampleInputSemester" name="semester" placeholder="Semester">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputYear"><b>Year</b></label>
                                    <input type="text" class="form-control" id="exampleInputYear" name="year" placeholder="Year">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDepartment"><b>Department</b></label>
                                    <input type="text" class="form-control" id="exampleInputDepartment" name="department" placeholder="Department">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMax"><b>Max</b></label>
                                    <input type="number" class="form-control" id="exampleInputMax" name="max" placeholder="Maximum number of students">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMin"><b>Min</b></label>
                                    <input type="number" class="form-control" id="exampleInputMin" name="min" placeholder="Minimum number of students">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
                                    <label class="form-check-label" for="exampleCheck1">Similar previous course</label>
                                </div>
                                <div class="form-group" id="previous_field1" style="display:none;">
                                    <label for="previous_field1"><b>Course ID</b></label>
                                    <input type="text" class="form-control" id="previous_id" name="previous_id" placeholder="Course Id">
                                </div>
                                <div class="form-group" id="previous_field2" style="display:none;">
                                    <label for="previous_field2"><b>Previous Semester</b></label>
                                    <input type="text" class="form-control" id="previous_sem" name="previous_sem" placeholder="Previous Semester">
                                </div>
                                <div class="form-group" id="previous_field3" style="display:none;">
                                    <label for="previous_field3"><b>Previous Year</b></label>
                                    <input type="text" class="form-control" id="previous_year" name="previous_year" placeholder="Previous Year">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                    <button type="submit" class="btn btn-primary" name="addcourse">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
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
                    </tfoot>
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
                                                        <form action="">
                                                            <div class="form-row mt-4">
                                                                <div class="form-group col-md-6">
                                                                    <label for="cname"><b>Name</b></label>
                                                                    <input type="text" class="form-control" id="cname" placeholder="name" name="name">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="courseid"><b>Course ID</b></label>
                                                                    <input type="text" class="form-control" id="courseid" placeholder="00000" name="courseid">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="semester"><b>Semester</b></label>
                                                                    <input type="text" class="form-control" id="semester" placeholder="Semester" name="semester">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="year"><b>Year</b></label>
                                                                    <input type="text" class="form-control" id="year" name="year" placeholder="year">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="max"><b>Max</b></label>
                                                                    <input type="number" class="form-control" id="max" name="max" placeholder="120">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="min"><b>Min</b></label>
                                                                    <input type="number" class="form-control" id="min" name="min" placeholder="1">
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary" name="update">Update</button>
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
</div>
<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>