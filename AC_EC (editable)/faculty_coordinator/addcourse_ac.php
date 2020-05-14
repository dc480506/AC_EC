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
                    <h4 class="font-weight-bold text-primary mb-0">Audit Course Records</h4>
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
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck5" onclick="disp5()" name="dept_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect5">Department</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect5" name="dept">
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

                            <form class="forms-sample" method="POST" action="ic_queries/addcourse_queries.php">
                                <div class="form-group">
                                    <label for="exampleInputName1"><b>Name</b></label>
                                    <input type="text" class="form-control" required id="exampleInputName1" name="cname" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCourseid"><b>Course ID</b></label>
                                    <input type="text" class="form-control" required id="exampleInputCourseid" name="courseid" placeholder="Course ID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSemester"><b>Semester</b></label>
                                    <input type="text" class="form-control" required id="exampleInputSemester" name="sem" placeholder="Semester">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputYear"><b>Year</b></label>
                                    <input type="text" class="form-control" required id="exampleInputYear" name="year" placeholder="Year">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDepartment"><b>Department</b></label>
                                    <select class="form-control" required name="dept">
                                        <?php
                                        include_once("../config.php");
                                        $sql = "SELECT dept_name FROM department";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option>" . $row['dept_name'] . "</option>";
                                        }
                                        ?>
                                    </select> </div>
                                <div class="form-group">
                                    <label for="exampleInputMax"><b>Max</b></label>
                                    <input type="number" class="form-control" required id="exampleInputMax" name="max" placeholder="Maximum number of students">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMin"><b>Min</b></label>
                                    <input type="number" class="form-control" required id="exampleInputMin" name="min" placeholder="Minimum number of students">
                                </div>
                                <label for="branch"><b>Branches to opt for</b></label>
                                <br>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="customCheck7" checked>
                                    <label class="custom-control-label" for="customCheck7">All</label>
                                </div>
                                <?php
                                include_once('../config.php');
                                $sql = "SELECT * FROM department";
                                $result = mysqli_query($conn, $sql);
                                $c = 8;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                              <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="checkbox" class="custom-control-input dept" id="customCheck' . $c . '"  name="check_dept[]" value="' . $row['dept_id'] . '">
                              <label class="custom-control-label" for="customCheck' . $c . '">' . $row['dept_name'] . '</label>
                             </div>
                              ';
                                    $c++;
                                }
                                ?>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="map_cbox" name="map_cbox" onclick="showMapSection()">
                                    <label class="form-check-label" for="exampleCheck1">Similar previous course</label>
                                </div>
                                <div id="map_section" style="display: none;">
                                </div>
                                <BR>
                                <div class="form-group">

                                    <button type="button" id="add_prev" class="btn btn-primary" style="display: none;">Add</button>
                                    <input type="hidden" value="0" id="total_prev" name="total_prev">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                    <button type="submit" class="btn btn-primary" name="add_course">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="modal-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-current-tab" data-toggle="tab" href="#nav-current" role="tab" aria-controls="nav-current" aria-selected="true">Current</a>
                        <a class="nav-item nav-link" id="nav-upcoming-tab" data-toggle="tab" href="#nav-upcoming" role="tab" aria-controls="nav-upcoming" aria-selected="false">Upcoming</a>
                        <a class="nav-item nav-link" id="nav-previous-tab" data-toggle="tab" href="#nav-previous" role="tab" aria-controls="nav-previous" aria-selected="false">Previous</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <!--Current-->
                    <div class="tab-pane fade show active" id="nav-current" role="tabpanel" aria-labelledby="nav-current-tab">
                        <br>
                        <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Academic Year</th>
                                    <th>Floating Department</th>
                                    <th>Departments Applicable</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Students Allocated</th>
                                    <th>Allocate faculty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Academic Year</th>
                                    <th>Floating Department</th>
                                    <th>Departments Applicable</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Students Allocated</th>
                                    <th>Allocate faculty</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql3 = "SELECT * FROM department";
                                $dept_list = array();
                                $result3 = mysqli_query($conn, $sql3);
                                while ($row = mysqli_fetch_assoc($result3)) {
                                    array_push($dept_list, $row['dept_id'], $row['dept_name']);
                                }
                                $sql = "SELECT cname,cid,sem,year,dept_name,max,min,no_of_allocated FROM audit_course NATURAL JOIN department";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {

                                    $count = 500;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $checkbox_div = "";
                                        $cid = $row['cid'];
                                        $sem = $row['sem'];
                                        $year = $row['year'];
                                        $checked_dept = array();
                                        $applicable_dept = "";
                                        $sql2 = "SELECT dept_id,dept_name FROM audit_course_applicable_dept NATURAL JOIN department WHERE cid='$cid' AND sem='$sem' AND year='$year'";
                                        $result2 = mysqli_query($conn, $sql2);
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            array_push($checked_dept, $row2['dept_id']);
                                            $applicable_dept .= $row2['dept_name'] . " , ";
                                        }
                                        $applicable_dept = substr($applicable_dept, 0, strlen($applicable_dept) - 2);
                                        for ($i = 0; $i < count($dept_list) - 1; $i = $i + 2) {
                                            $checkbox_div .= '
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="customCheck' . ($i + 100 * $count) . '" name="check_dept[]" value="' . $dept_list[$i] . '"';
                                            if (in_array($dept_list[$i], $checked_dept)) {
                                                $checkbox_div .= " checked";
                                            }
                                            $checkbox_div .= '>
                                        <label class="custom-control-label" for="customCheck' . ($i + 100 * $count) . '">' . $dept_list[$i + 1] . '</label>
                                    </div>
                                    ';
                                        }
                                        echo '
                                <tr>
                                    <td>' . $row['cname'] . '</td>
                                    <td>' . $row['cid'] . '</td>
                                    <td>' . $row['sem'] . '</td>
                                    <td>' . $row['year'] . '</td>
                                    <td>' . $row['dept_name'] . '</td>
                                    <td>' . $applicable_dept . '</td>
                                    <td>' . $row['max'] . '</td>
                                    <td>' . $row['min'] . '</td>
                                    <td>' . $row['no_of_allocated'] . '</td>
                                    
                                    <td>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter10">
                                            <i class="fas fa-toolbox"></i>
                                        </button>
                            
                                        <!-- Modal -->       
                                        <div class="modal fade" id="exampleModalCenter10" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle10" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle10">Action</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <nav>
                                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                        <a class="nav-item nav-link active" id="nav-allocate-tab" data-toggle="tab" href="#nav-allocate" role="tab" aria-controls="nav-allocate" aria-selected="true">Allocation</a>
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
                                                                            
                                                                            <div class="form-group">
                                                                                <label for="exampleFormControlSelect1"><b>Faculty ID</b>
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
                                                                    <!--end Allocation-->
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
                                    <td>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter' . $count . '">
                                            <i class="fas fa-tools"></i>
                                        </button>
                            
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
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
                                                                <a class="nav-item nav-link active" id="nav-delete-tab" data-toggle="tab" href="#nav-delete' . $count . '" role="tab" aria-controls="nav-delete' . $count . '" aria-selected="true">Deletion</a>
                                                                <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update' . $count . '" role="tab" aria-controls="nav-update' . $count . '" aria-selected="false">Update</a>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content" id="nav-tabContent">
                                                            <!--Deletion-->
                                                            <div class="tab-pane fade show active" id="nav-delete' . $count . '" role="tabpanel" aria-labelledby="nav-delete-tab">
                                                                <form action="ic_queries/addcourse_queries.php" method="POST">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect1"><b>Are you sure you want to delete?</b>
                                                                        </label>
                                                                        <br>
                                                                        <input type="hidden" name="cid" value="' . $row['cid'] . '">
                                                                        <input type="hidden" name="sem" value="' . $row['sem'] . '">
                                                                        <input type="hidden" name="year" value="' . $row['year'] . '">
                                                                        <button type="submit" class="btn btn-primary" name="delete_course">Yes</button>
                                                                        <button type="button" class="btn btn-secondary" name="no">No</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--end Deletion-->
                                                            <!--Update-->
                                                            <div class="tab-pane fade" id="nav-update' . $count . '" role="tabpanel" aria-labelledby="nav-update-tab">
                                                                <form action="ic_queries/addcourse_queries.php" method="POST">
                                                                    <div class="form-row mt-4">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="cname"><b>Name</b></label>
                                                                            <input type="text" class="form-control" required="required" placeholder="New Course Name" name="coursename" value="' . $row['cname'] . '">
                                                                            
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="courseid"><b>Course ID</b></label>
                                                                            <input type="text" class="form-control" required="required" placeholder="00000" name="courseidnew" value="' . $row['cid'] . '">
                                                                            <input type="hidden" class="form-control"  placeholder="00000" name="courseidold" value="' . $row['cid'] . '">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="semester"><b>Semester</b></label>
                                                                            <input type="text" class="form-control" required="required" placeholder="Semester" name="semnew" value="' . $row['sem'] . '">
                                                                            <input type="hidden" class="form-control" placeholder="Semester" name="semold" value="' . $row['sem'] . '">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="year"><b>Year</b></label>
                                                                            <input type="text" class="form-control"  name="year" disabled placeholder="year" value="' . $row['year'] . '">
                                                                            <input type="hidden" class="form-control"  name="year" placeholder="year" value="' . $row['year'] . '">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="max"><b>Max</b></label>
                                                                            <input type="number" class="form-control" required="required" name="max" placeholder="120" value="' . $row['max'] . '">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="min"><b>Min</b></label>
                                                                            <input type="number" class="form-control" required="required" name="min" placeholder="1" value="' . $row['min'] . '">
                                                                        </div>
                                                                    </div>
                                                                    <label for="branch"><b>Branches to opt for</b></label>
                                                                    <br>
                                                                    ' . $checkbox_div . '
                                                                    <br>
                                                                    <button type="submit" class="btn btn-primary" name="update_course">Update</button>
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
                                </tr>';


                                        $count++;
                                    }
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!--end Current-->
                    <!--Upcoming-->
                    <div class="tab-pane fade" id="nav-upcoming" role="tabpanel" aria-labelledby="nav-upcoming-tab">
                        <br>
                        <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Academic Year</th>
                                    <th>Floating Department</th>
                                    <th>Departments Applicable</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Students Allocated</th>
                                    <th>Allocate faculty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Academic Year</th>
                                    <th>Floating Department</th>
                                    <th>Departments Applicable</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Students Allocated</th>
                                    <th>Allocate faculty</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql3 = "SELECT * FROM department";
                                $dept_list = array();
                                $result3 = mysqli_query($conn, $sql3);
                                while ($row = mysqli_fetch_assoc($result3)) {
                                    array_push($dept_list, $row['dept_id'], $row['dept_name']);
                                }
                                $sql = "SELECT cname,cid,sem,year,dept_name,max,min,no_of_allocated FROM audit_course NATURAL JOIN department";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {

                                    $count = 500;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $checkbox_div = "";
                                        $cid = $row['cid'];
                                        $sem = $row['sem'];
                                        $year = $row['year'];
                                        $checked_dept = array();
                                        $applicable_dept = "";
                                        $sql2 = "SELECT dept_id,dept_name FROM audit_course_applicable_dept NATURAL JOIN department WHERE cid='$cid' AND sem='$sem' AND year='$year'";
                                        $result2 = mysqli_query($conn, $sql2);
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            array_push($checked_dept, $row2['dept_id']);
                                            $applicable_dept .= $row2['dept_name'] . " , ";
                                        }
                                        $applicable_dept = substr($applicable_dept, 0, strlen($applicable_dept) - 2);
                                        for ($i = 0; $i < count($dept_list) - 1; $i = $i + 2) {
                                            $checkbox_div .= '
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="customCheck' . ($i + 100 * $count) . '" name="check_dept[]" value="' . $dept_list[$i] . '"';
                                            if (in_array($dept_list[$i], $checked_dept)) {
                                                $checkbox_div .= " checked";
                                            }
                                            $checkbox_div .= '>
                                        <label class="custom-control-label" for="customCheck' . ($i + 100 * $count) . '">' . $dept_list[$i + 1] . '</label>
                                    </div>
                                    ';
                                        }
                                        echo '
                                <tr>
                            <td>' . $row['cname'] . '</td>
                            <td>' . $row['cid'] . '</td>
                            <td>' . $row['sem'] . '</td>
                            <td>' . $row['year'] . '</td>
                            <td>' . $row['dept_name'] . '</td>
                            <td>' . $applicable_dept . '</td>
                            <td>' . $row['max'] . '</td>
                            <td>' . $row['min'] . '</td>
                            <td>' . $row['no_of_allocated'] . '</td>
                            
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter10">
                                    <i class="fas fa-toolbox"></i>
                                </button>
                    
                                <!-- Modal -->       
                                <div class="modal fade" id="exampleModalCenter10" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle10" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle10">Action</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <nav>
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                <a class="nav-item nav-link active" id="nav-allocate-tab" data-toggle="tab" href="#nav-allocate" role="tab" aria-controls="nav-allocate" aria-selected="true">Allocation</a>
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
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect1"><b>Faculty ID</b>
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
                                                            <!--end Allocation-->
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
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter' . $count . '">
                                    <i class="fas fa-tools"></i>
                                </button>
                    
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
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
                                                        <a class="nav-item nav-link active" id="nav-delete-tab" data-toggle="tab" href="#nav-delete' . $count . '" role="tab" aria-controls="nav-delete' . $count . '" aria-selected="true">Deletion</a>
                                                        <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update' . $count . '" role="tab" aria-controls="nav-update' . $count . '" aria-selected="false">Update</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <!--Deletion-->
                                                    <div class="tab-pane fade show active" id="nav-delete' . $count . '" role="tabpanel" aria-labelledby="nav-delete-tab">
                                                        <form action="ic_queries/addcourse_queries.php" method="POST">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1"><b>Are you sure you want to delete?</b>
                                                                </label>
                                                                <br>
                                                                <input type="hidden" name="cid" value="' . $row['cid'] . '">
                                                                <input type="hidden" name="sem" value="' . $row['sem'] . '">
                                                                <input type="hidden" name="year" value="' . $row['year'] . '">
                                                                <button type="submit" class="btn btn-primary" name="delete_course">Yes</button>
                                                                <button type="button" class="btn btn-secondary" name="no">No</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!--end Deletion-->
                                                    <!--Update-->
                                                    <div class="tab-pane fade" id="nav-update' . $count . '" role="tabpanel" aria-labelledby="nav-update-tab">
                                                        <form action="ic_queries/addcourse_queries.php" method="POST">
                                                            <div class="form-row mt-4">
                                                                <div class="form-group col-md-6">
                                                                    <label for="cname"><b>Name</b></label>
                                                                    <input type="text" class="form-control" required="required" placeholder="New Course Name" name="coursename" value="' . $row['cname'] . '">
                                                                    
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="courseid"><b>Course ID</b></label>
                                                                    <input type="text" class="form-control" required="required" placeholder="00000" name="courseidnew" value="' . $row['cid'] . '">
                                                                    <input type="hidden" class="form-control"  placeholder="00000" name="courseidold" value="' . $row['cid'] . '">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="semester"><b>Semester</b></label>
                                                                    <input type="text" class="form-control" required="required" placeholder="Semester" name="semnew" value="' . $row['sem'] . '">
                                                                    <input type="hidden" class="form-control" placeholder="Semester" name="semold" value="' . $row['sem'] . '">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="year"><b>Year</b></label>
                                                                    <input type="text" class="form-control"  name="year" disabled placeholder="year" value="' . $row['year'] . '">
                                                                    <input type="hidden" class="form-control"  name="year" placeholder="year" value="' . $row['year'] . '">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="max"><b>Max</b></label>
                                                                    <input type="number" class="form-control" required="required" name="max" placeholder="120" value="' . $row['max'] . '">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="min"><b>Min</b></label>
                                                                    <input type="number" class="form-control" required="required" name="min" placeholder="1" value="' . $row['min'] . '">
                                                                </div>
                                                            </div>
                                                            <label for="branch"><b>Branches to opt for</b></label>
                                                            <br>
                                                            ' . $checkbox_div . '
                                                            <br>
                                                            <button type="submit" class="btn btn-primary" name="update_course">Update</button>
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
                        </tr>';


                                        $count++;
                                    }
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!--Upcoming end-->
                    <div class="tab-pane fade" id="nav-previous" role="tabpanel" aria-labelledby="nav-previous-tab">
                        <br>
                        <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Academic Year</th>
                                    <th>Floating Department</th>
                                    <th>Departments Applicable</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Students Allocated</th>
                                    <th>Allocate faculty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Academic Year</th>
                                    <th>Floating Department</th>
                                    <th>Departments Applicable</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Students Allocated</th>
                                    <th>Allocate faculty</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql3 = "SELECT * FROM department";
                                $dept_list = array();
                                $result3 = mysqli_query($conn, $sql3);
                                while ($row = mysqli_fetch_assoc($result3)) {
                                    array_push($dept_list, $row['dept_id'], $row['dept_name']);
                                }
                                $sql = "SELECT cname,cid,sem,year,dept_name,max,min,no_of_allocated FROM audit_course NATURAL JOIN department";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {

                                    $count = 500;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $checkbox_div = "";
                                        $cid = $row['cid'];
                                        $sem = $row['sem'];
                                        $year = $row['year'];
                                        $checked_dept = array();
                                        $applicable_dept = "";
                                        $sql2 = "SELECT dept_id,dept_name FROM audit_course_applicable_dept NATURAL JOIN department WHERE cid='$cid' AND sem='$sem' AND year='$year'";
                                        $result2 = mysqli_query($conn, $sql2);
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            array_push($checked_dept, $row2['dept_id']);
                                            $applicable_dept .= $row2['dept_name'] . " , ";
                                        }
                                        $applicable_dept = substr($applicable_dept, 0, strlen($applicable_dept) - 2);
                                        for ($i = 0; $i < count($dept_list) - 1; $i = $i + 2) {
                                            $checkbox_div .= '
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="customCheck' . ($i + 100 * $count) . '" name="check_dept[]" value="' . $dept_list[$i] . '"';
                                            if (in_array($dept_list[$i], $checked_dept)) {
                                                $checkbox_div .= " checked";
                                            }
                                            $checkbox_div .= '>
                                        <label class="custom-control-label" for="customCheck' . ($i + 100 * $count) . '">' . $dept_list[$i + 1] . '</label>
                                    </div>
                                    ';
                                        }
                                        echo '
                                <tr>
                            <td>' . $row['cname'] . '</td>
                            <td>' . $row['cid'] . '</td>
                            <td>' . $row['sem'] . '</td>
                            <td>' . $row['year'] . '</td>
                            <td>' . $row['dept_name'] . '</td>
                            <td>' . $applicable_dept . '</td>
                            <td>' . $row['max'] . '</td>
                            <td>' . $row['min'] . '</td>
                            <td>' . $row['no_of_allocated'] . '</td>
                            
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter10">
                                    <i class="fas fa-toolbox"></i>
                                </button>
                    
                                <!-- Modal -->       
                                <div class="modal fade" id="exampleModalCenter10" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle10" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle10">Action</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <nav>
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                <a class="nav-item nav-link active" id="nav-allocate-tab" data-toggle="tab" href="#nav-allocate" role="tab" aria-controls="nav-allocate" aria-selected="true">Allocation</a>
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
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect1"><b>Faculty ID</b>
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
                                                            <!--end Allocation-->
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
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter' . $count . '">
                                    <i class="fas fa-tools"></i>
                                </button>
                    
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
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
                                                        <a class="nav-item nav-link active" id="nav-delete-tab" data-toggle="tab" href="#nav-delete' . $count . '" role="tab" aria-controls="nav-delete' . $count . '" aria-selected="true">Deletion</a>
                                                        <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update' . $count . '" role="tab" aria-controls="nav-update' . $count . '" aria-selected="false">Update</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <!--Deletion-->
                                                    <div class="tab-pane fade show active" id="nav-delete' . $count . '" role="tabpanel" aria-labelledby="nav-delete-tab">
                                                        <form action="ic_queries/addcourse_queries.php" method="POST">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1"><b>Are you sure you want to delete?</b>
                                                                </label>
                                                                <br>
                                                                <input type="hidden" name="cid" value="' . $row['cid'] . '">
                                                                <input type="hidden" name="sem" value="' . $row['sem'] . '">
                                                                <input type="hidden" name="year" value="' . $row['year'] . '">
                                                                <button type="submit" class="btn btn-primary" name="delete_course">Yes</button>
                                                                <button type="button" class="btn btn-secondary" name="no">No</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!--end Deletion-->
                                                    <!--Update-->
                                                    <div class="tab-pane fade" id="nav-update' . $count . '" role="tabpanel" aria-labelledby="nav-update-tab">
                                                        <form action="ic_queries/addcourse_queries.php" method="POST">
                                                            <div class="form-row mt-4">
                                                                <div class="form-group col-md-6">
                                                                    <label for="cname"><b>Name</b></label>
                                                                    <input type="text" class="form-control" required="required" placeholder="New Course Name" name="coursename" value="' . $row['cname'] . '">
                                                                    
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="courseid"><b>Course ID</b></label>
                                                                    <input type="text" class="form-control" required="required" placeholder="00000" name="courseidnew" value="' . $row['cid'] . '">
                                                                    <input type="hidden" class="form-control"  placeholder="00000" name="courseidold" value="' . $row['cid'] . '">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="semester"><b>Semester</b></label>
                                                                    <input type="text" class="form-control" required="required" placeholder="Semester" name="semnew" value="' . $row['sem'] . '">
                                                                    <input type="hidden" class="form-control" placeholder="Semester" name="semold" value="' . $row['sem'] . '">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="year"><b>Year</b></label>
                                                                    <input type="text" class="form-control"  name="year" disabled placeholder="year" value="' . $row['year'] . '">
                                                                    <input type="hidden" class="form-control"  name="year" placeholder="year" value="' . $row['year'] . '">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="max"><b>Max</b></label>
                                                                    <input type="number" class="form-control" required="required" name="max" placeholder="120" value="' . $row['max'] . '">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="min"><b>Min</b></label>
                                                                    <input type="number" class="form-control" required="required" name="min" placeholder="1" value="' . $row['min'] . '">
                                                                </div>
                                                            </div>
                                                            <label for="branch"><b>Branches to opt for</b></label>
                                                            <br>
                                                            ' . $checkbox_div . '
                                                            <br>
                                                            <button type="submit" class="btn btn-primary" name="update_course">Update</button>
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
                        </tr>';


                                        $count++;
                                    }
                                }

                                ?>

                            </tbody>
                        </table>

                    </div>
                    <!--Update end-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script>
    function showMapSection() {
        var checkBox = document.getElementById("map_cbox");

        if (checkBox.checked == true) {
            document.querySelector("#map_section").style.display = "block";
            document.querySelector("#add_prev").style.display = "block";
            document.querySelector("#rem_prev").style.display = "block";
        } else {
            document.querySelector("#map_section").style.display = "none";
            document.querySelector("#add_prev").style.display = "none";
            document.querySelector("#rem_prev").style.display = "none";
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

<script type="text/javascript">
    // previous course details
    // var new_prev_no=1;
    $('#add_prev').on('click', add);
    // $('#rem_prev').on('click',rem);
    var new_prev_no = 1

    function add() {
        var total = parseInt($('#total_prev').val()) + 1
        // console.log("Value of total is "+total)
        var new_input = `<div id="prev_` + new_prev_no + `" >
                            <br>
                            <input type="hidden" class='current_no' value='` + total + `'>
                            <h5 class="modal-title">Previous Course ` + total + `</h5>
                            <div class="form-group" id="previous_field1_` + new_prev_no + `" style="display: block;">
                                <label for="previous_field1"><b>Course ID</b></label>
                                <input type="text" class="form-control prevcid"  required id="previous_id` + new_prev_no + `" name="prevcid` + total + `" placeholder="Course Id">
                            </div>
                            <div class="form-group" id="previous_field2_` + new_prev_no + `" style="display: block;">
                                <label for="previous_field2"><b>Previous Semester</b></label>
                                <input type="text" class="form-control prevsem"  required id="previous_sem` + new_prev_no + `" name="prevsem` + total + `" placeholder="Previous Semester">
                            </div>
                            <div class="form-group" id="previous_field3_` + new_prev_no + `" style="display: block;">
                                <label for="previous_field3"><b>Previous Year</b></label>
                                <input type="text" class="form-control prevyear"  required id="previous_year` + new_prev_no + `" name="prevyear` + total + `" placeholder="Previous Year">
                            </div>
                            <button type="button" id="rem_prev` + new_prev_no + `" class="btn btn-primary">Remove</button>
                            
                        </div>`;
        // alert(new_input);
        // var new_input = "<input type='text' id='new_" + new_prev_no + "'>";
        // var new_input1=`<button type="button" id="rem_prev" class="btn btn-primary "style="display: none;">Remove the Previous Course</button>`;
        // console.log("Add called!!");
        // console.log('#rem_prev'+new_prev_no);

        $('#map_section').append(new_input);
        $("#rem_prev" + new_prev_no).click(function() {
            // console.log("Here bro!!");

            // $('#total_prev').val(new_prev_no - 1);
            // $('#map_section').remove(new_input); 
            // alert("id is "+$(this).parent().attr('id'))
            var rm_id = ($(this).parent()).attr('id');
            console.log(rm_id)
            rm_id = "#" + rm_id
            // console.log("Here bro 3!!");
            adjustDivs($(this).parent().nextAll())
            $(rm_id).remove();
            $('#total_prev').val($('#total_prev').val() - 1);
        });
        new_prev_no += 1;
        $('#total_prev').val(parseInt($('#total_prev').val()) + 1);
        console.log("Add exiting!!");
    }

    function adjustDivs(nextDivs) {
        for (var i = 0; i < nextDivs.length; i++) {
            // console.log(nextDivs[i]);

            var new_index = parseInt(nextDivs[i].querySelector('.current_no').value) - 1
            var header = nextDivs[i].querySelector('h5')
            var prevcid = nextDivs[i].querySelector('.prevcid')
            var prevsem = nextDivs[i].querySelector('.prevsem')
            var prevyear = nextDivs[i].querySelector('.prevyear')

            nextDivs[i].querySelector('.current_no').value = new_index
            header.innerText = "Previous Course " + (new_index)
            prevcid.setAttribute('name', 'prevcid' + new_index)
            prevsem.setAttribute('name', 'prevsem' + new_index)
            prevyear.setAttribute('name', 'prevyear' + new_index)
            // console.log(header)
            // console.log(curr_value)
            // console.log("Bruh")
        }

    }

    function rem() {
        // var last_prev_no=$('#total_prev').val();
        if (last_prev_no > 0) {
            $('#prev_' + last_prev_no).remove();
            $('#total_prev').val(last_prev_no - 1);
        }
    }
</script>

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>