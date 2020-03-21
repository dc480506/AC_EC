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
                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                    <label class="custom-control-label" for="customCheck7">All</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="customCheck8">
                                    <label class="custom-control-label" for="customCheck8">COMP</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="customCheck9">
                                    <label class="custom-control-label" for="customCheck9">IT</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="customCheck10">
                                    <label class="custom-control-label" for="customCheck10">MECH</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="customCheck11">
                                    <label class="custom-control-label" for="customCheck11">EXTC</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="customCheck12">
                                    <label class="custom-control-label" for="customCheck12">ETRX</label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="map_cbox" name="map_cbox" onclick="showMapSection()">
                                    <label class="form-check-label" for="exampleCheck1">Similar previous course</label>
                                </div>
                                <div id="map_section" style="display: none;">
                                    <div class="form-group" id="previous_field1" style="display: block;">
                                        <label for="previous_field1"><b>Course ID</b></label>
                                        <input type="text" class="form-control" id="previous_id" name="prevcid" placeholder="Course Id">
                                    </div>
                                    <div class="form-group" id="previous_field2" style="display: block;">
                                        <label for="previous_field2"><b>Previous Semester</b></label>
                                        <input type="text" class="form-control" id="previous_sem" name="prevsem" placeholder="Previous Semester">
                                    </div>
                                    <div class="form-group" id="previous_field3" style="display: block;">
                                        <label for="previous_field3"><b>Previous Year</b></label>
                                        <input type="text" class="form-control" id="previous_year" name="prevyear" placeholder="Previous Year">
                                    </div>
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
                        <?php
                        $sql = "SELECT cname,cid,sem,year,dept_name,max,min FROM audit_course NATURAL JOIN department";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {

                            $count = 500;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
                                <tr>
                            <td>' . $row['cname'] . '</td>
                            <td>' . $row['cid'] . '</td>
                            <td>' . $row['sem'] . '</td>
                            <td>' . $row['year'] . '</td>
                            <td>' . $row['dept_name'] . '</td>
                            <td>' . $row['max'] . '</td>
                            <td>' . $row['min'] . '</td>
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
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                <label class="custom-control-label" for="customCheck1">All</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                                <label class="custom-control-label" for="customCheck2">COMP</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                                <label class="custom-control-label" for="customCheck3">IT</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                                <label class="custom-control-label" for="customCheck4">MECH</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                                <label class="custom-control-label" for="customCheck5">EXTC</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                                <label class="custom-control-label" for="customCheck6">ETRX</label>
                                                            </div>
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
                        </tr>

                                ';
                                $count++;
                            }
                        }

                        ?>

                    </tbody>
                </table>
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
        } else {
            document.querySelector("#map_section").style.display = "none";
        }
    }
</script>
<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>