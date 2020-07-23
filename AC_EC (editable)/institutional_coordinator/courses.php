<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>
<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<?php
$course_type_id = mysqli_escape_string($conn, $_POST['course_type_id']);
$sql = "select name from course_types where id='$course_type_id'";
$course_type_name = mysqli_fetch_assoc(mysqli_query($conn, $sql))['name'];
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0"><?php echo $course_type_name ?> records</h4>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                        <i class="fas fa-filter"></i>
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
                            <form class="forms-sample" id="filter_courses_form" method="POST" action="">

                                <div class="form-check">
                                    <label for="">Semester</label>
                                    <br />
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="filter_semester[]" class="custom-control-input" value="1" id="semester_1">
                                        <label class="custom-control-label" for="semester_1">1</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="filter_semester[]" class="custom-control-input" value="2" id="semester_2">
                                        <label class="custom-control-label" for="semester_2">2</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="filter_semester[]" class="custom-control-input" value="3" id="semester_3">
                                        <label class="custom-control-label" for="semester_3">3</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="filter_semester[]" class="custom-control-input" value="4" id="semester_4">
                                        <label class="custom-control-label" for="semester_4">4</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="filter_semester[]" class="custom-control-input" value="5" id="semester_5">
                                        <label class="custom-control-label" for="semester_5">5</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="filter_semester[]" class="custom-control-input" value="6" id="semester_6">
                                        <label class="custom-control-label" for="semester_6">6</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="filter_semester[]" class="custom-control-input" value="7" id="semester_7">
                                        <label class="custom-control-label" for="semester_7">7</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="filter_semester[]" class="custom-control-input" value="8" id="semester_8">
                                        <label class="custom-control-label" for="semester_8">8</label>
                                    </div>

                                </div>
                                <br>
                                <div class="form-check">
                                    <label for="">Floating Department</label>
                                    <br>
                                    <?php
                                    $dept_names = array();
                                    $email = $_SESSION['email'];
                                    $department = 'department';
                                    $query = "SELECT distinct(dept_name) FROM department";
                                    if ($result = mysqli_query($conn, $query)) {
                                        $rowcount = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $dept_name = $row['dept_name'];
                                            echo '<div class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox" name="filter_dept[]" class="custom-control-input" value="' . $dept_name . '" id="filter_dept_' . $dept_name . '">
                                                    <label class="custom-control-label" for="filter_dept_' . $dept_name . '">' . $dept_name . '</label>
                                                </div>';
                                        }
                                    }
                                    ?>
                                </div>
                                <br />
                                <div class="form-check">
                                    <label for="">Academic Year</label>
                                    <br>
                                    <?php
                                    $years = array();
                                    $email = $_SESSION['email'];
                                    $condition = "program='{$_POST['program']}' and course_type_id=$course_type_id ";
                                    $query = "SELECT distinct(year) FROM course where $condition UNION SELECT distinct(year) FROM course_log where $condition ORDER by year desc";
                                    if ($result = mysqli_query($conn, $query)) {
                                        $rowcount = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                            array_push($years, $row['year']);
                                        }
                                    }
                                    ?>
                                    <select class="custom-select" id="filter_start_year" name="filter_academic_year">
                                        <option value="">Select academic Year</option>
                                        <?php
                                        foreach ($years as &$year) {
                                            echo '<option value="' . $year . '">' . $year . '</option>';
                                        }
                                        ?>
                                    </select>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" id="clear-filters" data-dismiss="modal" name="close">Clear Filters</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" name="close">Close</button>
                                    <button type="submit" class="btn btn-primary" name="filter">Filter</button>
                                </div>
                            </form>
                            <!-- fiter form end-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
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
                        <!-- <div class="table-responsive"> -->
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col text-right">
                                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#uploadCurrent">
                                        <i class="fas fa-upload"></i>
                                    </button>
                                </div>
                                <div class="modal fade" id="uploadCurrent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><b>Import Current Audit Courses</b></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <a class="nav-item nav-link active" id="nav-current-instructions-tab" data-toggle="tab" href="#nav-current-instructions" role="tab" aria-controls="nav-current-instructions" aria-selected="true">Instructions</a>
                                                        <a class="nav-item nav-link" id="nav-current-upload-tab" data-toggle="tab" href="#nav-current-upload" role="tab" aria-controls="nav-current-upload" aria-selected="false">Upload</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <!--Instructions Current-->
                                                    <div class="tab-pane fade show active" id="nav-current-instructions" role="tabpanel" aria-labelledby="nav-current-instructions">

                                                    </div>
                                                    <!--end Instructions Current-->
                                                    <!--Upload Current-->
                                                    <div class="tab-pane fade" id="nav-current-upload" role="tabpanel" aria-labelledby="nav-current-upload">
                                                        <div class="container">
                                                            <form method="post" enctype="multipart/form-data" id="bulkUploadCurrent">
                                                                <br>
                                                                <div class="form-row">
                                                                    <?php
                                                                    include_once("../config.php");
                                                                    $sql = "SELECT sem_type,academic_year FROM current_sem_info WHERE currently_active=1";
                                                                    $result = mysqli_query($conn, $sql);
                                                                    $row = mysqli_fetch_assoc($result);
                                                                    $sem_dropdown = "";
                                                                    // while ($row = mysqli_fetch_assoc($result)) {
                                                                    if ($row['sem_type'] == 'EVEN') {
                                                                        for ($sem_start = 2; $sem_start <= 8; $sem_start += 2) {
                                                                            $sem_dropdown .= "<option>" . $sem_start . "</option>";
                                                                        }
                                                                        $temp = explode('-', $row['academic_year'])[0];
                                                                        $temp += 1;
                                                                        $temp2 = "" . ($temp + 1);
                                                                    } else {
                                                                        for ($sem_start = 1; $sem_start <= 8; $sem_start += 2) {
                                                                            $sem_dropdown .= "<option>" . $sem_start . "</option>";
                                                                        }
                                                                    }
                                                                    $year_val = $row['academic_year'];
                                                                    echo '
                                                                    <div class="form-group col-md-6">
                                                                        <label for="sem_current"><b>Semester</b></label>
                                                                        <!-- <input type="text" class="form-control" required id="exampleInputSemester" name="sem" placeholder="Semester"> -->
                                                                        <select class="form-control" required id="sem_current" name="sem">
                                                                        ' . $sem_dropdown . '
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="year_current"><b>Year</b></label>
                                                                        <input type="text" class="form-control" required id="year_current" name="year_disabled" placeholder="Year" value="' . $year_val . '" disabled>
                                                                        <input type="hidden" class="form-control" name="year" value="' . $year_val . '">
                                                                    </div>';
                                                                    ?>
                                                                </div>
                                                                <div id="bulk_current_fields">
                                                                    <label for="">
                                                                        <h6><b>Information for mapping Excel sheet columns to Database columns:</b></h6>
                                                                    </label>
                                                                    <label for=""><small><b>Note:</b>The following fields should be column names in excel sheet</small></label>
                                                                    <div class="card-header py-3">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="cname_current"><b>Course Name</b></label>
                                                                                <input type="text" class="form-control" id="cname_current" placeholder="" name="cname" value="cname" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="cid_current"><b>Course ID</b></label>
                                                                                <input type="text" class="form-control" id="cid_current" placeholder="" name="cid" value="cid" required>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="floating_dept_current"><b>Floating Department</b></label>
                                                                                <input type="text" class="form-control" id="floating_dept_current" placeholder="" name="floating_dept" value="floating_dept_id" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="min_current"><b>Min</b></label>
                                                                                <input type="text" class="form-control" id="min_current" placeholder="" name="min" value="min" required>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="max_current"><b>Max</b></label>
                                                                                <input type="text" class="form-control" id="max_current" name="max" placeholder="" value="max" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="applicable_dept_current"><b>Applicable Departments</b></label>
                                                                                <input type="text" class="form-control" id="applicable_dept_current" name="applicable_department" value="applicable_dept" placeholder="" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="form-group files color">
                                                                    <!-- <input type="file" class="form-control" accept=".xls,.xlsx"> -->
                                                                    <script type="text/javascript" language="javascript">
                                                                        function checkfile(sender) {
                                                                            var validExts = new Array(".xlsx", ".xls");
                                                                            var fileExt = sender.value;
                                                                            fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
                                                                            if (validExts.indexOf(fileExt) < 0) {
                                                                                alert("Invalid file selected, valid files are of " +
                                                                                    validExts.toString() + " types.");
                                                                                return false;
                                                                            } else return true;
                                                                        }
                                                                    </script>
                                                                    <input type="file" name="Uploadfile" class="form-control" onchange="checkfile(this);" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required />
                                                                    <label for=""><b>Accepted formats .xls,.xlsx only.</b></label>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                                    <button type="submit" class="btn btn-primary" id="upload_current" name="save_changes">Upload</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!--end Upload Current-->

                                                    <!-- <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                        <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                                                    </div> -->
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
                                        </div>
                                    </div>
                                </div>

                                <div class="col text-right" id="delete_selected_current_div">
                                    <button type="button" class="btn btn-danger" id="delete_selected_current_btn" name="delete_selected_current">
                                        <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Course(s)
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <table class="table table-bordered table-responsive" id="dataTable-current" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="select_all_current_page">
                                            <label class="custom-control-label" for="select_all_current_page"></label>
                                        </div>
                                    </th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
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
                                    <th></th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Floating Department</th>
                                    <th>Departments Applicable</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Students Allocated</th>
                                    <th>Allocate faculty</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                        </table>
                        <!-- </div> -->
                    </div>
                    <!--end Current-->
                    <!--Upcoming-->
                    <div class="tab-pane fade" id="nav-upcoming" role="tabpanel" aria-labelledby="nav-upcoming-tab">
                        <br>
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <!-- Add course -->
                                <div class="col text-right" id="addCurrentCoursebtn" style="display:block">
                                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#addCurrentCourse">
                                        <i class="ni ni-fat-add">&nbsp;</i>+ &nbsp;Add Course
                                    </button>
                                </div>
                                <div class="modal fade" id="addCurrentCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Course</h5>
                                                <button type="button" class="close" id="close_add_form_cross" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Table -->

                                                <!-- <form class="forms-sample" method="POST" action="ic_queries/addcourse_queries.php"> -->
                                                <form class="forms-sample" id='add_course_form'>

                                                    <div class="form-group">
                                                        <label for="exampleInputName1"><b>Name</b></label>
                                                        <input type="text" class="form-control" required id="exampleInputName1" name="cname" placeholder="Name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputCourseid"><b>Course ID</b></label>
                                                        <input type="text" class="form-control" required id="exampleInputCourseid" name="courseid" placeholder="Course ID">
                                                        <span id="add_upcoming_cid_error" class="text-danger"></span>
                                                    </div>
                                                    <?php
                                                    include_once("../config.php");
                                                    $sql = "SELECT sem_type,academic_year FROM current_sem_info WHERE currently_active=1";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $sem_dropdown = "";
                                                    // while ($row = mysqli_fetch_assoc($result)) {
                                                    if ($row['sem_type'] == 'EVEN') {
                                                        for ($sem_start = 1; $sem_start <= 8; $sem_start += 2) {
                                                            $sem_dropdown .= "<option>" . $sem_start . "</option>";
                                                        }
                                                        $temp = explode('-', $row['academic_year'])[0];
                                                        $temp += 1;
                                                        $temp2 = "" . ($temp + 1);
                                                        $year_val = $temp . "-" . substr($temp2, 2);
                                                    } else {
                                                        for ($sem_start = 2; $sem_start <= 8; $sem_start += 2) {
                                                            $sem_dropdown .= "<option>" . $sem_start . "</option>";
                                                        }
                                                        $year_val = $row['academic_year'];
                                                    }
                                                    echo '
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputSemester"><b>Semester</b></label>
                                                            <!-- <input type="text" class="form-control" required id="exampleInputSemester" name="sem" placeholder="Semester"> -->
                                                            <select class="form-control" required id="exampleInputSemester" name="sem">
                                                            ' . $sem_dropdown . '
                                                            </select>
                                                            <span id="add_upcoming_cid_error" class="text-danger"></span>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputYear"><b>Year</b></label>
                                                            <input type="text" class="form-control" required id="exampleInputYear" name="year" placeholder="Year" value="' . $year_val . '" disabled>
                                                            <input type="hidden" class="form-control" required id="exampleInputYear_submit" name="year" value="' . $year_val . '">
                                                        </div>
                                                    </div>';
                                                    ?>

                                                    <div class="form-group">
                                                        <label for=""><b>Department</b></label>
                                                        <br>
                                                        <!-- <select class="form-control" required name="dept">-->
                                                        <?php
                                                        include_once('../config.php');
                                                        $sql = "SELECT * FROM department";
                                                        $result = mysqli_query($conn, $sql);
                                                        $c = 8;
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo '
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" id="floating_dept_upcoming_cb' . $c . '"  name="floating_check_dept[]" value="' . $row['dept_id'] . '">
                                                            <label class="custom-control-label" for="floating_dept_upcoming_cb' . $c . '"><small>' . $row['dept_name'] . '</small></label>
                                                        </div>
                                                        ';
                                                            $c++;
                                                        }
                                                        ?>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputMax"><b>Max</b></label>
                                                            <input type="number" class="form-control" required id="exampleInputMax" name="max" placeholder="Maximum no. of students">
                                                            <span id="add_upcoming_max_error" class="text-danger"></span>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputMin"><b>Min</b></label>
                                                            <input type="number" class="form-control" required id="exampleInputMin" name="min" placeholder="Minimum no. of students">
                                                        </div>
                                                    </div>
                                                    <label for="branch"><b>Branches to opt for</b></label>
                                                    <br>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="applicable_dept_upcoming_cb7" checked>
                                                        <label class="custom-control-label" for="applicable_dept_upcoming_cb7"><small>All</small></label>
                                                    </div>
                                                    <?php
                                                    include_once('../config.php');
                                                    $sql = "SELECT * FROM department WHERE dept_id NOT IN (" . $exclude_dept . ")";
                                                    $result = mysqli_query($conn, $sql);
                                                    $c = 8;
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input dept" id="applicable_dept_upcoming_cb' . $c . '"  name="check_dept[]" value="' . $row['dept_id'] . '" checked>
                                                        <label class="custom-control-label" for="applicable_dept_upcoming_cb' . $c . '"><small>' . $row['dept_name'] . '</small></label>
                                                    </div>
                                                    ';
                                                        $c++;
                                                    }
                                                    ?>
                                                    <br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" id="close_add_course_form" data-dismiss="modal" name="close">Close</button>
                                                        <button type="submit" id="add_course_btn" class="btn btn-primary" name="add_course">Add</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Bulk addition-->
                                <div class="col text-right">
                                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#uploadUpcoming">
                                        <i class="fas fa-upload"></i>
                                    </button>
                                </div>
                                <div class="modal fade" id="uploadUpcoming" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><b>Import Upcoming Audit Courses</b></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <a class="nav-item nav-link active" id="nav-upcoming-instructions-tab" data-toggle="tab" href="#nav-upcoming-instructions" role="tab" aria-controls="nav-upcoming-instructions" aria-selected="true">Instructions</a>
                                                        <a class="nav-item nav-link" id="nav-upcoming-upload-tab" data-toggle="tab" href="#nav-upcoming-upload" role="tab" aria-controls="nav-upcoming-upload" aria-selected="false">Upload</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <!--Instructions Upcoming-->
                                                    <div class="tab-pane fade show active" id="nav-upcoming-instructions" role="tabpanel" aria-labelledby="nav-upcoming-instructions">

                                                    </div>
                                                    <!--end Instructions Upcoming-->
                                                    <!--Upload Upcoming-->
                                                    <div class="tab-pane fade" id="nav-upcoming-upload" role="tabpanel" aria-labelledby="nav-upcoming-upload">
                                                        <div class="container">
                                                            <form method="post" method="POST" enctype="multipart/form-data" id="bulkUploadUpcoming">
                                                                <br>
                                                                <div class="form-row">
                                                                    <?php
                                                                    include_once("../config.php");
                                                                    $sql = "SELECT sem_type,academic_year FROM current_sem_info WHERE currently_active=1";
                                                                    $result = mysqli_query($conn, $sql);
                                                                    $row = mysqli_fetch_assoc($result);
                                                                    $sem_dropdown = "";
                                                                    // while ($row = mysqli_fetch_assoc($result)) {
                                                                    if ($row['sem_type'] == 'EVEN') {
                                                                        for ($sem_start = 1; $sem_start <= 8; $sem_start += 2) {
                                                                            $sem_dropdown .= "<option>" . $sem_start . "</option>";
                                                                        }
                                                                        $temp = explode('-', $row['academic_year'])[0];
                                                                        $temp += 1;
                                                                        $temp2 = "" . ($temp + 1);
                                                                        $year_val = $temp . "-" . substr($temp2, 2);
                                                                    } else {
                                                                        for ($sem_start = 2; $sem_start <= 8; $sem_start += 2) {
                                                                            $sem_dropdown .= "<option>" . $sem_start . "</option>";
                                                                        }
                                                                        $year_val = $row['academic_year'];
                                                                    }
                                                                    echo '
                                                                    <div class="form-group col-md-6">
                                                                        <label for="sem_upcoming"><b>Semester</b></label>
                                                                        <!-- <input type="text" class="form-control" required id="exampleInputSemester" name="sem" placeholder="Semester"> -->
                                                                        <select class="form-control" required id="sem_upcoming" name="sem">
                                                                        ' . $sem_dropdown . '
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="year_upcoming"><b>Year</b></label>
                                                                        <input type="text" class="form-control" required id="year_upcoming" name="year_disabled" placeholder="Year" value="' . $year_val . '" disabled>
                                                                        <input type="hidden" class="form-control" name="year" value="' . $year_val . '">
                                                                    </div>';
                                                                    ?>
                                                                </div>
                                                                <div id="bulk_upcoming_fields">
                                                                    <label for="">
                                                                        <h6><b>Information for mapping Excel sheet columns to Database columns:</b></h6>
                                                                    </label>
                                                                    <label for=""><small><b>Note:</b>The following fields should be column names in excel sheet</small></label>
                                                                    <div class="card-header py-3">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="cname_upcoming"><b>Course Name</b></label>
                                                                                <input type="text" class="form-control" id="cname_upcoming" placeholder="" name="cname" value="cname" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="cid_upcoming"><b>Course ID</b></label>
                                                                                <input type="text" class="form-control" id="cid_upcoming" placeholder="" name="cid" value="cid" required>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="floating_dept_upcoming"><b>Floating Department</b></label>
                                                                                <input type="text" class="form-control" id="floating_dept_upcoming" placeholder="" name="floating_dept" value="floating_dept_id" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="min_upcoming"><b>Min</b></label>
                                                                                <input type="text" class="form-control" id="min_upcoming" placeholder="" name="min" value="min" required>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="max_upcoming"><b>Max</b></label>
                                                                                <input type="text" class="form-control" id="max_upcoming" name="max" placeholder="" value="max" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="applicable_dept_upcoming"><b>Applicable Departments</b></label>
                                                                                <input type="text" class="form-control" id="applicable_dept_upcoming" name="applicable_department" value="applicable_dept" placeholder="" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="form-group files color">
                                                                    <!-- <input type="file" class="form-control" accept=".xls,.xlsx"> -->
                                                                    <script type="text/javascript" language="javascript">
                                                                        function checkfile(sender) {
                                                                            var validExts = new Array(".xlsx", ".xls");
                                                                            var fileExt = sender.value;
                                                                            fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
                                                                            if (validExts.indexOf(fileExt) < 0) {
                                                                                alert("Invalid file selected, valid files are of " +
                                                                                    validExts.toString() + " types.");
                                                                                return false;
                                                                            } else return true;
                                                                        }
                                                                    </script>
                                                                    <input type="file" name="Uploadfile" class="form-control" onchange="checkfile(this);" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required />
                                                                    <label for=""><b>Accepted formats .xls,.xlsx only.</b></label>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                                    <button type="submit" class="btn btn-primary" id="upload_upcoming" name="save_changes">Upload</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!--end Upload Upcoming-->

                                                    <!-- <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                        <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                                                    </div> -->
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

                                                .modal-lg {
                                                    width: 600px
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
                                        </div>
                                    </div>
                                </div>
                                <!-- Multiple deletion-->
                                <div class="col text-right" id="delete_selected_upcoming_div">
                                    <button type="button" class="btn btn-danger" id="delete_selected_upcoming_btn" name="delete_selected_current">
                                        <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Course(s)
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered table-responsive" id="dataTable-upcoming" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="select_all_upcoming_page">
                                            <label class="custom-control-label" for="select_all_upcoming_page"></label>
                                        </div>
                                    </th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Academic Year</th>
                                    <th>Floating Department</th>
                                    <th>Departments Applicable</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Allocate faculty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Academic Year</th>
                                    <th>Floating Department</th>
                                    <th>Departments Applicable</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Allocate faculty</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                        </table>
                        <!-- </div> -->
                    </div>
                    <!--Upcoming end-->
                    <div class="tab-pane fade" id="nav-previous" role="tabpanel" aria-labelledby="nav-previous-tab">
                        <br>
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col text-right">
                                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#uploadPrevious">
                                        <i class="fas fa-upload"></i>
                                    </button>
                                </div>
                                <div class="modal fade" id="uploadPrevious" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><b>Import Previous Audit Courses</b></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <a class="nav-item nav-link active" id="nav-previous-instructions-tab" data-toggle="tab" href="#nav-previous-instructions" role="tab" aria-controls="nav-previous-instructions" aria-selected="true">Instructions</a>
                                                        <a class="nav-item nav-link" id="nav-previous-upload-tab" data-toggle="tab" href="#nav-previous-upload" role="tab" aria-controls="nav-previous-upload" aria-selected="false">Upload</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <!--Instructions previous-->
                                                    <div class="tab-pane fade show active" id="nav-previous-instructions" role="tabpanel" aria-labelledby="nav-previous-instructions">

                                                    </div>
                                                    <!--end Instructions previous-->
                                                    <!--Upload previous-->
                                                    <div class="tab-pane fade" id="nav-previous-upload" role="tabpanel" aria-labelledby="nav-previous-upload">
                                                        <div class="container">
                                                            <form method="post" method="POST" enctype="multipart/form-data" id="bulkUploadPrevious">
                                                                <br>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="sem_previous"><b>Semester</b></label>
                                                                        <!-- <input type="text" class="form-control" required id="exampleInputSemester" name="sem" placeholder="Semester"> -->
                                                                        <select class="form-control" required id="sem_previous" name="sem">
                                                                            <option>1</option>
                                                                            <option>2</option>
                                                                            <option>3</option>
                                                                            <option>4</option>
                                                                            <option>5</option>
                                                                            <option>6</option>
                                                                            <option>7</option>
                                                                            <option>8</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="year_previous"><b>Year</b></label>
                                                                        <select class="form-control" name="year" id="year_previous">
                                                                            <?php
                                                                            $sql = "SELECT academic_year FROM current_sem_info WHERE currently_active=1";
                                                                            $result = mysqli_query($conn, $sql);
                                                                            $row = mysqli_fetch_assoc($result);
                                                                            $year = $row['academic_year'];
                                                                            for ($i = 0; $i < 4; $i++) {
                                                                                echo '<option>' . $year . '</option>';
                                                                                $temp = explode('-', $year)[0];
                                                                                $temp -= 1;
                                                                                $temp2 = "" . ($temp + 1);
                                                                                $year = $temp . "-" . substr($temp2, 2);
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <!-- <input type="text" class="form-control" required id="year_previous" name="year_disabled" placeholder="Year" value="'.$year_val.'" disabled>
                                                                        <input type="hidden" class="form-control" name="year" value="'.$year_val.'"> -->
                                                                    </div>

                                                                </div>
                                                                <div id="bulk_previous_fields">
                                                                    <label for="">
                                                                        <h6><b>Information for mapping Excel sheet columns to Database columns:</b></h6>
                                                                    </label>
                                                                    <label for=""><small><b>Note:</b>The following fields should be column names in excel sheet</small></label>
                                                                    <div class="card-header py-3">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="cname_previous"><b>Course Name</b></label>
                                                                                <input type="text" class="form-control" id="cname_previous" placeholder="" name="cname" value="cname" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="cid_previous"><b>Course ID</b></label>
                                                                                <input type="text" class="form-control" id="cid_previous" placeholder="" name="cid" value="cid" required>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="floating_dept_previous"><b>Floating Department</b></label>
                                                                                <input type="text" class="form-control" id="floating_dept_previous" placeholder="" name="floating_dept" value="floating_dept_id" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="min_previous"><b>Min</b></label>
                                                                                <input type="text" class="form-control" id="min_previous" placeholder="" name="min" value="min" required>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="max_previous"><b>Max</b></label>
                                                                                <input type="text" class="form-control" id="max_previous" name="max" placeholder="" value="max" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="applicable_dept_previous"><b>Applicable Departments</b></label>
                                                                                <input type="text" class="form-control" id="applicable_dept_previous" name="applicable_department" value="applicable_dept" placeholder="" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="form-group files color">
                                                                    <!-- <input type="file" class="form-control" accept=".xls,.xlsx"> -->
                                                                    <script type="text/javascript" language="javascript">
                                                                        function checkfile(sender) {
                                                                            var validExts = new Array(".xlsx", ".xls");
                                                                            var fileExt = sender.value;
                                                                            fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
                                                                            if (validExts.indexOf(fileExt) < 0) {
                                                                                alert("Invalid file selected, valid files are of " +
                                                                                    validExts.toString() + " types.");
                                                                                return false;
                                                                            } else return true;
                                                                        }
                                                                    </script>
                                                                    <input type="file" name="Uploadfile" class="form-control" onchange="checkfile(this);" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required />
                                                                    <label for=""><b>Accepted formats .xls,.xlsx only.</b></label>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="save_changes" id="upload_previous">Upload</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!--end Upload previous-->

                                                    <!-- <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                        <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                                                    </div> -->
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col text-right" id="delete_selected_previous_div">
                                    <button type="button" class="btn btn-danger" id="delete_selected_previous_btn" name="delete_selected_previous">
                                        <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Course(s)
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered table-responsive" id="dataTable-previous" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="select_all_previous_page">
                                            <label class="custom-control-label" for="select_all_previous_page"></label>
                                        </div>
                                    </th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Academic Year</th>
                                    <th>Floating Dept.</th>
                                    <th>Dept. Applicable</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Students Allocated</th>
                                    <th>Allocate faculty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Academic Year</th>
                                    <th>Floating Dept.</th>
                                    <th>Dept. Applicable</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Students Allocated</th>
                                    <th>Allocate faculty</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                        </table>
                        <!-- </div> -->
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
            $("#map_section").empty();
            $("#total_prev").val("0");
            document.querySelector("#map_section").style.display = "none";
            document.querySelector("#add_prev").style.display = "none";
            document.querySelector("#rem_prev").style.display = "none";
        }
    }
    dept_checkbox = document.querySelectorAll(".dept");

    if (document.querySelector("#applicable_dept_upcoming_cb7").checked) {
        for (i = 0; i < dept_checkbox.length; i++) {
            dept_checkbox[i].checked = true;
        }
    }
    all_cbox = document.querySelector("#applicable_dept_upcoming_cb7")
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

    var activeTab = "current"
    $(document).ready(function() {
        loadCurrent();
        $('#uploadCurrent').on('hidden.bs.modal', function(e) {
            document.querySelector("#bulkUploadCurrent").reset();
            $("#upload_current").text("Upload")
            $("#upload_current").attr("disabled", false);
        });
        $('#uploadUpcoming').on('hidden.bs.modal', function(e) {
            document.querySelector("#bulkUploadUpcoming").reset();
            $("#upload_upcoming").text("Upload")
            $("#upload_upcoming").attr("disabled", false);
        });
        $('#uploadPrevious').on('hidden.bs.modal', function(e) {
            document.querySelector("#bulkUploadPrevious").reset();
            $("#upload_previous").text("Upload")
            $("#upload_previous").attr("disabled", false);
        });
    });

    function findByAttr(array, attr_name, value) {
        var list_index_attr_val = []
        for (var i = 0; i < array.length; i += 1) {
            if (array[i][attr_name] === value) {
                list_index_attr_val.push(i)
            }
        }
        return list_index_attr_val
    }
    // ************Current Course Section**************

    $("#bulkUploadCurrent").submit(function(e) {
        e.preventDefault();
        form = this;
        var formData = new FormData(this);
        formData.append("program", "<?php echo $_POST['program']; ?>")
        formData.append("course_type_id", "<?php echo $course_type_id; ?>")
        $("#upload_current").attr("disabled", true);
        $("#upload_current").text("Uploading...")
        $.ajax({
            url: "course/bulkUpload/current_course_upload.php",
            type: 'POST',
            data: formData,
            success: function(data) {
                if ($.trim(data) == "Successful") {
                    $("#upload_current").text("Uploaded Successfully")
                    loadCurrent();
                } else {
                    $("#upload_current").text("Upload Failed")
                    alert(data);
                }
                // form.reset();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    })
    $("#select_all_current_page").click(function(e) {
        //   var row=$(this).closest('tr')
        if ($(this).is(":checked")) {
            $("#dataTable-current tbody tr").addClass("selected table-secondary");
            $(".selectrow_current").attr("checked", true);
        } else {
            $(".selectrow_current").attr("checked", false);
            $("#dataTable-current tbody tr").removeClass("selected table-secondary");
        }
        //   row.toggleClass('selected table-secondary')
    })
    $("#delete_selected_current_btn").click(function(e) {
        alert("You have selected " + $("#dataTable-current tbody tr.selected").length + " record(s) for deletion");
        var delete_rows = $("#dataTable-current").DataTable().rows('.selected').data()
        var delete_data = {}
        for (var i = 0; i < delete_rows.length; i++) {
            baseData = {}
            baseData['cid'] = delete_rows[i].cid
            baseData['sem'] = delete_rows[i].sem
            delete_data[i] = baseData
            // console.log(baseData);
        }
        var actual_data = {}
        actual_data['type'] = 'current'
        actual_data['course_type_id'] = '<?php echo $course_type_id; ?>';
        actual_data['program'] = '<?php echo $_POST['program']; ?>';
        actual_data['delete_data'] = delete_data
        actual_delete_data_json = JSON.stringify(actual_data)
        console.log(actual_delete_data_json);
        $.ajax({
            type: "POST",
            url: "ic_queries/multioperation_queries/delete_multiple_courses.php",
            data: actual_delete_data_json,
            success: function(data) {
                // console.log(data)
                $("#dataTable-current").DataTable().draw(false);
            }
        })
    })

    function getFilters() {
        const filters = $("#filter_courses_form").serializeArray();

        let normalizedFilters = {};
        for (filter of filters) {
            switch (filter.name) {
                case "filter_academic_year":
                    if (filter.value != "") {
                        normalizedFilters.academic_year = filter.value
                    }
                    break;

                case "filter_semester[]":
                    if (!normalizedFilters.semesters) {
                        normalizedFilters.semesters = []
                    }
                    normalizedFilters.semesters.push(filter.value)
                    break;
                case "filter_dept[]":
                    if (!normalizedFilters.depts) {
                        normalizedFilters.depts = []
                    }
                    normalizedFilters.depts.push(filter.value)
                    break;
            }
        }
        console.log(normalizedFilters);
        return normalizedFilters
    }

    $("#filter_courses_form").submit(function(e) {
        e.preventDefault();
        $(`#dataTable-${activeTab}`).DataTable().ajax.reload(false);
        $("#exampleModalCenter2").modal("hide")
    })

    function clearFilters() {
        $('#filter_courses_form').trigger('reset');
    }

    $("#clear-filters").click(function(e) {
        clearFilters();

        $(`#dataTable-${activeTab}`).DataTable().ajax.reload(false);
    });

    function loadCurrent() {
        // document.querySelector("#addCoursebtn").style.display="none"
        $('#dataTable-current').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            dom: '<"d-flex justify-content-between"fBl>tip',
            buttons: [{
                extend: 'excel',
                title: "current-audit-courses-data",
                text: '<span> <i class="fas fa-download "></i> EXCEL</span>',
                className: "btn btn-outline-primary  ",
                action: newExportAction,
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8]
                }
            }, {
                extend: "pdfHtml5",
                title: "current-audit-courses-data",
                text: '<span> <i class="fas fa-download "></i> PDF</span>',
                className: "btn btn-outline-primary  mx-2",
                action: newExportAction,
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8]
                },
            }],
            ajax: {
                'url': 'course/loadInfo/current_courses.php',
                "data": function(d) {
                    d.filters = getFilters();
                    d.program = "<?php echo $_POST['program']; ?>";
                    d.course_type_id = "<?php echo $course_type_id; ?>"
                    return d
                }
            },
            fnDrawCallback: function() {
                $(".action-btn").on('click', loadModalCurrent)
                $(".allocate-btn").on('click', loadAllocateModalCurrent);
                $(".selectrow_current").attr("disabled", true);
                $("th").removeClass('selectbox_current_td');
                $(".selectbox_current_td").click(function(e) {
                    var row = $(this).closest('tr')
                    var checkbox = $(this).find('input');
                    checkbox.attr("checked", !checkbox.attr("checked"));
                    row.toggleClass('selected table-secondary')
                    if ($("#dataTable-current tbody tr.selected").length != $("#dataTable-current tbody tr").length) {
                        $("#select_all_current_page").prop("checked", true)
                        $("#select_all_current_page").prop("checked", false)
                    } else {
                        $("#select_all_current_page").prop("checked", false)
                        $("#select_all_current_page").prop("checked", true)
                    }
                })
            },
            columns: [{
                    data: 'select-cbox'
                },
                {
                    data: 'cname'
                },
                {
                    data: 'cid'
                },
                {
                    data: 'sem'
                },
                {
                    data: 'dept_name'
                },
                {
                    data: 'dept_applicable'
                },
                {
                    data: 'max'
                },
                {
                    data: 'min'
                },
                {
                    data: 'no_of_allocated'
                },
                {
                    data: 'allocate_faculty'
                },
                {
                    data: 'action'
                },
            ],
            columnDefs: [{
                    targets: [0, 5, 8, 9, 10], // column index (start from 0)
                    orderable: false, // set orderable false for selected columns
                },
                {
                    className: "selectbox_current_td",
                    targets: [0]
                },
                {
                    className: "cname",
                    "targets": [1]
                },
                // { className: "cid", "targets": [ 1 ] },
                // { className: "sem", "targets": [ 2 ] },
                // { className: "dept_name", "targets": [ 3 ] },
                // { className: "dept_applicable", "targets": [ 4 ] },
                // { className: "max", "targets": [ 5 ] },
                // { className: "min", "targets": [ 6 ] }
            ],
        });
    }

    function loadAllocateModalCurrent() {
        var target_row = $(this).closest("tr");
        // var btn=$(this);
        var aPos = $("#dataTable-current").dataTable().fnGetPosition(target_row.get(0));
        var courseData = $('#dataTable-current').DataTable().row(aPos).data();
        courseData['course_type_id'] = '<?php echo $course_type_id; ?>';
        courseData['program'] = '<?php echo $_POST['program']; ?>';
        // delete courseData.action
        // delete courseData.allocate_faculty
        var json_courseData = JSON.stringify(courseData)
        // console.log(json_courseData)
        $.ajax({
            type: "POST",
            url: "course/loadModal/current_course_faculty_allocate_modal.php",
            // data: form_serialize, 
            // dataType: "json",
            data: json_courseData,
            success: function(output) {
                // $("#"+x).text("Deleted Successfully");
                target_row.append(output);

                $('#allocate-modal').modal('show')
                $(document).on('hidden.bs.modal', '#allocate-modal', function() {
                    $("#allocate-modal").remove();
                    $("#deleteFacultyModal").remove();
                });

                $('#allocate_faculty_audit').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var form_serialize = form.serializeArray(); // serializes the form's elements.
                    form_serialize.push({
                        name: $("#allocate_faculty_audit_btn").attr('name'),
                        value: $("#allocate_faculty_audit_btn").attr('value')
                    });
                    if (form_serialize[3].value != null) {
                        $("#allocate_faculty_audit_btn").text("Allocating...");
                        $("#allocate_faculty_audit_btn").attr("disabled", true);
                        $.ajax({
                            type: "POST",
                            url: "ic_queries/allocate_faculty_queries.php",
                            data: form_serialize,
                            success: function(data) {
                                var z = data.split("+");
                                $("#allocate_faculty_audit_btn").text("Allocated Successfully");
                                $("#allocate_faculty_audit_btn").text("Allocate");
                                $("#allocate_faculty_audit_btn").attr("disabled", false);
                                $(".faculty_div").html(z[1]);
                                $('#temp_allocated_faculty').val(z[0]);
                                $('#hiddenemailid').val("null");
                                $('.showtext').html("Choose Faculty ".concat(' <i class="fa fa-caret-down"></i>'));
                            }
                        });
                    }
                });

                $('#deleteFacultyModal').on('show.bs.modal', function(event) {
                    let email_id = $(event.relatedTarget).data('email_id')
                    $(this).find('.modal-body #email_id').val(email_id)
                    let cid = $(event.relatedTarget).data('cid')
                    $(this).find('.modal-body #cid').val(cid)
                    let sem = $(event.relatedTarget).data('sem')
                    $(this).find('.modal-body #sem').val(sem)
                    let year = $(event.relatedTarget).data('year')
                    $(this).find('.modal-body #year').val(year)

                    $('#newModalUnallocate').submit(function(e) {
                        e.preventDefault();
                        var form = $(this);
                        var form_serialize = form.serializeArray(); // serializes the form's elements.
                        form_serialize.push({
                            name: $("#faculty_unallocate_btn").attr('name'),
                            value: $("#faculty_unallocate_btn").attr('value')
                        });
                        $("#faculty_unallocate_btn").text("Deleting...");
                        $("#faculty_unallocate_btn").attr("disabled", true);
                        $.ajax({
                            type: "POST",
                            url: "ic_queries/allocate_faculty_queries.php",
                            data: form_serialize,
                            success: function(data) {
                                var z = data.split("+");
                                $('#deleteFacultyModal').modal('hide');
                                $("#faculty_unallocate_btn").text("Delete");
                                $("#faculty_unallocate_btn").attr("disabled", false);
                                $(".faculty_div").html(z[1]);
                                $('#temp_allocated_faculty').val(z[0]);
                                $('#hiddenemailid').val("null");
                                $('.showtext').html("Choose Faculty ".concat(' <i class="fa fa-caret-down"></i>'));

                            }
                        });
                    });

                });

                $('.showtext').click(function(e) {
                    if (document.querySelector("#show").style.display == "none")
                        document.querySelector("#show").style.display = "inline"
                    else
                        document.querySelector("#show").style.display = "none"
                });
                $('#search_text').keyup(debounce(function() {
                    var txt = $(this).val();
                    var txt2 = $('#temp_allocated_faculty').val();
                    if (txt == '') {
                        $('#result').html('');
                    } else {
                        $('#result').html('');
                        $.ajax({
                            url: "course/loadModal/fetch_faculties.php",
                            method: "post",
                            data: {
                                search: txt,
                                allocated: txt2
                            },
                            dataType: "text",
                            success: function(data) {
                                $('#result').html(data);
                                $('.option-selected').click(function(e) {
                                    var x = $(this).val();
                                    var y = $(this).prev();
                                    $('#hiddenemailid').val(y.val());
                                    $('.showtext').html(x.concat(' <i class="fa fa-caret-down"></i>'));
                                    document.querySelector("#show").style.display = "none";
                                    $('#search_text').val("");
                                    $('#result').html('');
                                });
                            }
                        });
                    }
                }, 300));
            }
        });
    }

    function loadModalCurrent() {
        var target_row = $(this).closest("tr"); // this line did the trick
        console.log(target_row)
        // var btn=$(this);
        var aPos = $("#dataTable-current").dataTable().fnGetPosition(target_row.get(0));
        var courseData = $('#dataTable-current').DataTable().row(aPos).data()
        // delete courseData.action
        // delete courseData.allocate_faculty
        courseData['course_type_id'] = '<?php echo $course_type_id; ?>';
        courseData['program'] = '<?php echo $_POST['program']; ?>';
        var json_courseData = JSON.stringify(courseData)
        // console.log(json_courseData)

        $.ajax({
            type: "POST",
            url: "course/loadModal/current_courses_modal.php",
            // data: form_serialize, 
            // dataType: "json",
            data: json_courseData,
            success: function(output) {
                // $("#"+x).text("Deleted Successfully");
                target_row.append(output);
                $('#update-del-modal').modal('show')
                $(document).on('hidden.bs.modal', '#update-del-modal', function() {
                    $("#update-del-modal").remove();
                    $("#deleteSimilarCourseModal").remove();
                });
                $('#delete_course_form').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var form_serialize = form.serializeArray(); // serializes the form's elements.
                    form_serialize.push({
                        name: $("#delete_course_btn").attr('name'),
                        value: $("#delete_course_btn").attr('value')
                    });
                    $("#delete_course_btn").text("Deleting...");
                    $("#delete_course_btn").attr("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: "ic_queries/addcourse_queries.php",
                        data: form_serialize,
                        success: function(data) {
                            //    alert(data); // show response from the php script.
                            $("#delete_course_btn").text("Deleted Successfully");
                            var row = $("#update-del-modal").closest('tr');
                            var aPos = $("#dataTable-current").dataTable().fnGetPosition(row.get(0));
                            $('#update-del-modal').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            // row.remove();
                            $("#dataTable-current").DataTable().row(aPos).remove().draw(false);
                            // console.log(aPos);
                            // console.log(row)
                        }
                    });
                });
                $('#update_course_form').submit(function(e) {
                    update_course_form_current(e);
                    // $('#update-del-modal').modal('hide');
                });

                $('#add_new_similar_course_btn').click(function(e) {
                    if (document.querySelector(".temporarydiv").style.display == "none")
                        document.querySelector(".temporarydiv").style.display = "inline"
                });

                $("#tempyear").change(function(e) {
                    const year = $(this).val();
                    if (year != "") {
                        $("#tempcid option").not(":first").remove();
                        $.ajax({
                            type: "POST",
                            url: "course/loadModal/course_modal_mapping_utils.php",
                            data: {
                                dataFor: "semester",
                                courseType: "CURRENT",
                                year: year,
                                program: "<?php echo $_POST['program']; ?>"
                            },
                            success: function(data) {
                                $("#tempsem option").not(":first").remove();
                                $("#tempsem").append(data)
                            },
                            error: function(err) {
                                console.log(err)
                            }
                        })
                    }
                })

                $("#tempsem").change(function(e) {
                    const sem = $(this).val();
                    const year = $("#tempyear").val();
                    if (year != "" && sem != "") {
                        $.ajax({
                            type: "POST",
                            url: "course/loadModal/course_modal_mapping_utils.php",
                            data: {
                                dataFor: "courses",
                                year: year,
                                sem: sem,
                                program: "<?php echo $_POST['program']; ?>"
                            },
                            success: function(data) {
                                $("#tempcid option").not(":first").remove();
                                $("#tempcid").append(data)
                            },
                            error: function(err) {
                                console.log(err)
                            }
                        })
                    }
                })

                $("#upload_syllabus").submit(function(e) {
                    e.preventDefault();
                    console.log("abcd")
                    var data = new FormData(this);
                    data.append("upload_syllabus", true);
                    data.append("courseType", "CURRENT");
                    $.ajax({

                        method: "POST",
                        enctype: 'multipart/form-data',
                        url: "ic_queries/upload_syllabus.php",
                        data: data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        xhr: function() {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = ((evt.loaded / evt.total) * 100);
                                    $('#upload_syllabus .progress-bar').css('width', percentComplete + '%').attr('aria-valuenow', percentComplete);
                                    console.log(percentComplete)
                                }
                            }, false);
                            return xhr;
                        },
                        beforeSend: function() {
                            $('#upload_syllabus .progress').show();
                        },
                        success: function(data) {
                            $("#upload_syllabus_btn").html('uploaded successfully').attr('disabled', true);
                        },
                        error: function(e) {
                            window.alert(e);
                        }
                    })
                });
                $("#remove_syllabus_form").submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "ic_queries/remove_syllabus.php",
                        data: $(this).serializeArray(),
                        success: function(data) {
                            $("#remove_syllabus_form *").hide();
                        },
                        error: function(e) {
                            window.alert(e);
                        }
                    })

                })

                $('#add_similar_course').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var form_serialize = form.serializeArray(); // serializes the form's elements.
                    form_serialize.push({
                        name: $("#add_new_similar_course_btn").attr('name'),
                        value: $("#add_new_similar_course_btn").attr('value')
                    });
                    $("#add_new_similar_course_btn").text("Allocating...");
                    $("#add_new_similar_course_btn").attr("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: "ic_queries/addcourse_queries.php",
                        data: form_serialize,
                        success: function(data) {
                            var z = data.split("+");
                            //$('#deleteSimilarCourseModal').modal('hide');
                            $("#add_new_similar_course_btn").text("Allocate");
                            $("#add_new_similar_course_btn").attr("disabled", false);
                            $(".faculty_div").html(z[1]);
                            document.querySelector(".temporarydiv").style.display = "none"
                            $('.tempcid').val('');
                            $('.tempyear').val('');
                            $('.tempsem').val('');
                            //$('#temp_allocated_faculty').val(z[0]);
                            //$('#hiddenemailid').val("null");
                            //$('.showtext').html("Choose Faculty ".concat(' <i class="fa fa-caret-down"></i>'));

                        }
                    });
                });

                $('#deleteSimilarCourseModal').on('show.bs.modal', function(event) {

                    let oldyear = $(event.relatedTarget).data('oldyear')
                    $(this).find('.modal-body #oldyear').val(oldyear)
                    let oldcid = $(event.relatedTarget).data('oldcid')
                    $(this).find('.modal-body #oldcid').val(oldcid)
                    let oldsem = $(event.relatedTarget).data('oldsem')
                    $(this).find('.modal-body #oldsem').val(oldsem)

                    let newyear = $(event.relatedTarget).data('newyear')
                    $(this).find('.modal-body #newyear').val(newyear)
                    let newcid = $(event.relatedTarget).data('newcid')
                    $(this).find('.modal-body #newcid').val(newcid)
                    let newsem = $(event.relatedTarget).data('newsem')
                    $(this).find('.modal-body #newsem').val(newsem)
                    let old_course_type_id = $(event.relatedTarget).data('oldcourse_type_id')
                    $(this).find('.modal-body #old_course_type_id').val(old_course_type_id)
                    let new_course_type_id = $(event.relatedTarget).data('newcourse_type_id')
                    $(this).find('.modal-body #new_course_type_id').val(new_course_type_id)


                    $('#newModalRemoveCourse').submit(function(e) {
                        e.preventDefault();
                        var form = $(this);
                        var form_serialize = form.serializeArray(); // serializes the form's elements.
                        form_serialize.push({
                            name: $("#course_remove_btn").attr('name'),
                            value: $("#course_remove_btn").attr('value')
                        });
                        $("#course_remove_btn").text("Removing...");
                        $("#course_remove_btn").attr("disabled", true);
                        $.ajax({
                            type: "POST",
                            url: "ic_queries/addcourse_queries.php",
                            data: form_serialize,
                            success: function(data) {
                                var z = data.split("+");
                                $('#deleteSimilarCourseModal').modal('hide');
                                $("#course_remove_btn").text("Remove");
                                $("#course_remove_btn").attr("disabled", false);
                                $(".faculty_div").html(z[1]);
                                //$('#temp_allocated_faculty').val(z[0]);
                                //$('#hiddenemailid').val("null");
                                //$('.showtext').html("Choose Faculty ".concat(' <i class="fa fa-caret-down"></i>'));

                            }
                        });
                    });

                });
            }
        });
    }

    function update_course_form_current(e) {
        e.preventDefault();
        var form = $('#update_course_form');
        var form_serialize = form.serializeArray(); // serializes the form's elements.
        // console.log(form_serialize)
        form_serialize.push({
            name: $("#update_course_btn").attr('name'),
            value: $("#update_course_btn").attr('value')
        });
        $("#update_course_btn").text("Updating...");
        $("#update_course_btn").attr("disabled", true);
        $.ajax({
            type: "POST",
            url: "ic_queries/addcourse_queries.php",
            data: form_serialize,
            success: function(data) {
                // alert(data); // show response from the php script.
                if (data === "Exists_cid") {
                    $('#error_cid').text('*This course already exists in this Semester');
                    // $('#error_sem').text('*This course already exists in this Semester');
                    $("#update_course_btn").text("Update");
                    $("#update_course_btn").attr("disabled", false);
                } else if (data === "Max_error") {
                    $('#error_max').text('*Max value is less than Min');
                    $("#update_course_btn").text("Update");
                    $("#update_course_btn").attr("disabled", false);
                } else {
                    $("#update_course_btn").text("Updated Successfully");
                    var row = $("#update-del-modal").closest('tr');
                    var aPos = $("#dataTable-current").dataTable().fnGetPosition(row.get(0));
                    var temp = $("#dataTable-current").DataTable().row(aPos).data();
                    // console.log(temp)
                    console.log(form_serialize)
                    temp['cname'] = form_serialize[findByAttr(form_serialize, 'name', 'coursename')].value;
                    temp['cid'] = form_serialize[findByAttr(form_serialize, 'name', 'courseidnew')].value;
                    temp['sem'] = form_serialize[findByAttr(form_serialize, 'name', 'semnew')].value;
                    // temp['dept_name']=id_to_name_convertor_dept(form_serialize[6].value);
                    var x = "";
                    var index;
                    var floatingDeptIndex = findByAttr(form_serialize, 'name', 'floating_check_dept[]')
                    for (index of floatingDeptIndex) {
                        x = x.concat(id_to_name_convertor_dept(form_serialize[index].value));
                        x = x.concat(", ");
                    }
                    x = x.substr(0, x.length - 2);
                    temp['dept_name'] = x;
                    x = "";
                    var deptApplicableIndex = findByAttr(form_serialize, 'name', 'check_dept[]')
                    for (index of deptApplicableIndex) {
                        x = x.concat(id_to_name_convertor_dept(form_serialize[index].value));
                        x = x.concat(", ");
                    }
                    x = x.substr(0, x.length - 2);
                    temp['dept_applicable'] = x;
                    temp['max'] = form_serialize[findByAttr(form_serialize, 'name', 'max')].value;
                    temp['min'] = form_serialize[findByAttr(form_serialize, 'name', 'min')].value;
                    console.log(temp)
                    $('#dataTable-current').dataTable().fnUpdate(temp, aPos, undefined, false);
                    $('.action-btn').off('click')
                    $('.action-btn').on('click', loadModalCurrent)
                    // $("#dataTable-current").DataTable().row(aPos).draw(false);
                    $(".selectrow_current").attr("disabled", true);
                    $('#error_cid').remove();
                    $('#error_max').remove();
                }
            }
        });
    }
    $("#dataTable-current").on('click', 'td.cname', function() {
        var tr = $(this).closest('tr');
        var row = $("#dataTable-current").DataTable().row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown table-warning');
        } else {
            // Open this row
            var data = {}
            data['cid'] = row.data()['cid'];
            data['sem'] = row.data()['sem'];
            data['course_type_id'] = '<?php echo $course_type_id; ?>';
            data['program'] = '<?php echo $_POST['program'] ?>';
            data['type'] = 'current'
            data_json = JSON.stringify(data)
            console.log(data_json)
            $.ajax({
                type: "POST",
                url: "loadAdditionalInfo/additional_info_course.php",
                data: data_json,
                success: function(response) {
                    row.child(response).show();
                    tr.addClass('shown table-warning');
                }
            });
            // row.child("<b>Hello</b>").show();
        }
    })

    // ***********Upcoming course Section************
    $("#bulkUploadUpcoming").submit(function(e) {
        e.preventDefault();
        form = this;
        var formData = new FormData(this);
        formData.append("program", "<?php echo $_POST['program']; ?>")
        formData.append("course_type_id", "<?php echo $course_type_id; ?>")
        $("#upload_upcoming").attr("disabled", true);
        $("#upload_upcoming").text("Uploading...")
        $.ajax({
            url: "course/bulkUpload/upcoming_course_upload.php",
            type: 'POST',
            data: formData,
            success: function(data) {
                if ($.trim(data) == "Successful") {
                    $("#upload_upcoming").text("Uploaded Successfully")
                    loadUpcoming();
                } else {
                    $("#upload_upcoming").text("Upload Failed")
                    alert(data);
                }
                // form.reset();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    })
    $("#select_all_upcoming_page").click(function(e) {
        //   var row=$(this).closest('tr')
        if ($(this).is(":checked")) {
            $("#dataTable-upcoming tbody tr").addClass("selected table-secondary");
            $(".selectrow_upcoming").attr("checked", true);
        } else {
            $(".selectrow_upcoming").attr("checked", false);
            $("#dataTable-upcoming tbody tr").removeClass("selected table-secondary");
        }
        //   row.toggleClass('selected table-secondary')
    })
    $("#delete_selected_upcoming_btn").click(function(e) {
        alert("You have selected " + $("#dataTable-upcoming tbody tr.selected").length + " record(s) for deletion");
        var delete_rows = $("#dataTable-upcoming").DataTable().rows('.selected').data()
        var delete_data = {}
        for (var i = 0; i < delete_rows.length; i++) {
            baseData = {}
            baseData['cid'] = delete_rows[i].cid
            baseData['sem'] = delete_rows[i].sem
            baseData['year'] = delete_rows[i].year
            delete_data[i] = baseData
            // console.log(baseData);
        }
        var actual_data = {}
        actual_data['type'] = 'upcoming'
        actual_data['course_type_id'] = '<?php echo $course_type_id; ?>';
        actual_data['program'] = '<?php echo $_POST['program']; ?>';
        actual_data['delete_data'] = delete_data
        actual_delete_data_json = JSON.stringify(actual_data)
        console.log(actual_delete_data_json)
        $.ajax({
            type: "POST",
            url: "ic_queries/multioperation_queries/delete_multiple_courses.php",
            data: actual_delete_data_json,
            success: function(data) {
                // console.log(data)
                $("#dataTable-upcoming").DataTable().draw(false);
            }
        })
    })

    function loadUpcoming() {
        // document.querySelector("#addCoursebtn").style.display="block"
        $('#dataTable-upcoming').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            dom: '<"d-flex justify-content-between"fBl>tip',
            buttons: [{
                extend: 'excel',
                title: "upcoming-audit-courses-data",
                text: '<span> <i class="fas fa-download "></i> EXCEL</span>',
                className: "btn btn-outline-primary  ",
                action: newExportAction,
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8]
                }
            }, {
                extend: "pdfHtml5",
                title: "upcoming-audit-courses-data",
                text: '<span> <i class="fas fa-download "></i> PDF</span>',
                className: "btn btn-outline-primary  mx-2",
                action: newExportAction,
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8]
                },
            }],
            ajax: {
                'url': 'course/loadInfo/upcoming_courses.php',
                "data": function(d) {
                    d.filters = getFilters();
                    d.program = "<?php echo $_POST['program']; ?>";
                    d.course_type_id = "<?php echo $course_type_id; ?>"
                    return d
                }
            },
            fnDrawCallback: function() {
                $(".action-btn").on('click', loadModalUpcoming);
                $(".allocate-btn").on('click', loadAllocateModalUpcoming);
                $(".selectrow_upcoming").attr("disabled", true);
                $("th").removeClass('selectbox_upcoming_td');
                $(".selectbox_upcoming_td").click(function(e) {
                    var row = $(this).closest('tr')
                    var checkbox = $(this).find('input');
                    checkbox.attr("checked", !checkbox.attr("checked"));
                    row.toggleClass('selected table-secondary')
                    if ($("#dataTable-upcoming tbody tr.selected").length != $("#dataTable-upcoming tbody tr").length) {
                        $("#select_all_upcoming_page").prop("checked", true)
                        $("#select_all_upcoming_page").prop("checked", false)
                    } else {
                        $("#select_all_upcoming_page").prop("checked", false)
                        $("#select_all_upcoming_page").prop("checked", true)
                    }
                })

            },
            columns: [{
                    data: 'select-cbox'
                },
                {
                    data: 'cname'
                },
                {
                    data: 'cid'
                },
                {
                    data: 'sem'
                },
                {
                    data: 'year'
                },
                {
                    data: 'dept_name'
                },
                {
                    data: 'dept_applicable'
                },
                {
                    data: 'max'
                },
                {
                    data: 'min'
                },
                {
                    data: 'allocate_faculty'
                },
                {
                    data: 'action'
                },
            ],
            columnDefs: [{
                    targets: [0, 6, 9, 10], // column index (start from 0)
                    orderable: false, // set orderable false for selected columns
                },
                {
                    className: "selectbox_upcoming_td",
                    targets: [0]
                },
                {
                    className: "cname",
                    "targets": [1]
                },
            ]
        });
    }

    function loadAllocateModalUpcoming() {
        var target_row = $(this).closest("tr"); // this line did the trick
        console.log(target_row)
        // var btn=$(this);
        var aPos = $("#dataTable-upcoming").dataTable().fnGetPosition(target_row.get(0));
        var courseData = $('#dataTable-upcoming').DataTable().row(aPos).data()
        courseData['course_type_id'] = '<?php echo $course_type_id; ?>';
        courseData['program'] = '<?php echo $_POST['program']; ?>';
        // delete courseData.action
        // delete courseData.allocate_faculty
        var json_courseData = JSON.stringify(courseData)
        // console.log(json_courseData)
        $.ajax({
            type: "POST",
            url: "course/loadModal/upcoming_course_faculty_allocate_modal.php",
            // data: form_serialize, 
            // dataType: "json",
            data: json_courseData,
            success: function(output) {
                // $("#"+x).text("Deleted Successfully");
                target_row.append(output);
                $('#deleteFacultyModal').on('shown.bs.modal', function(e) {
                    // $("#allocate-modal").css({ backdrop-filter: none });
                })

                //when modal closes
                $('#deleteFacultyModal').on('hidden.bs.modal', function(e) {
                    // $("#allocate-modal").css({ opacity: 1 });
                })

                $('#allocate-modal').modal('show')
                $(document).on('hidden.bs.modal', '#allocate-modal', function() {
                    $("#allocate-modal").remove();
                    $("#deleteFacultyModal").remove();
                });

                $('#allocate_faculty_audit').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var form_serialize = form.serializeArray(); // serializes the form's elements.
                    form_serialize.push({
                        name: $("#allocate_faculty_audit_btn").attr('name'),
                        value: $("#allocate_faculty_audit_btn").attr('value')
                    });
                    if (form_serialize[3].value != null) {
                        $("#allocate_faculty_audit_btn").text("Allocating...");
                        $("#allocate_faculty_audit_btn").attr("disabled", true);
                        $.ajax({
                            type: "POST",
                            url: "ic_queries/allocate_faculty_queries.php",
                            data: form_serialize,
                            success: function(data) {
                                var z = data.split("+");
                                $("#allocate_faculty_audit_btn").text("Allocated Successfully");
                                $("#allocate_faculty_audit_btn").text("Allocate");
                                $("#allocate_faculty_audit_btn").attr("disabled", false);
                                $(".faculty_div").html(z[1]);
                                $('#temp_allocated_faculty').val(z[0]);
                                $('#hiddenemailid').val("null");
                                $('.showtext').html("Choose Faculty ".concat(' <i class="fa fa-caret-down"></i>'));

                            }
                        });
                    }
                });

                $('#deleteFacultyModal').on('show.bs.modal', function(event) {
                    let email_id = $(event.relatedTarget).data('email_id')
                    $(this).find('.modal-body #email_id').val(email_id)
                    let cid = $(event.relatedTarget).data('cid')
                    $(this).find('.modal-body #cid').val(cid)
                    let sem = $(event.relatedTarget).data('sem')
                    $(this).find('.modal-body #sem').val(sem)
                    let year = $(event.relatedTarget).data('year')
                    $(this).find('.modal-body #year').val(year)

                    $('#newModalUnallocate').submit(function(e) {
                        e.preventDefault();
                        var form = $(this);
                        var form_serialize = form.serializeArray(); // serializes the form's elements.
                        form_serialize.push({
                            name: $("#faculty_unallocate_btn").attr('name'),
                            value: $("#faculty_unallocate_btn").attr('value')
                        });
                        $("#faculty_unallocate_btn").text("Deleting...");
                        $("#faculty_unallocate_btn").attr("disabled", true);
                        $.ajax({
                            type: "POST",
                            url: "ic_queries/allocate_faculty_queries.php",
                            data: form_serialize,
                            success: function(data) {
                                var z = data.split("+");
                                $('#deleteFacultyModal').modal('hide');
                                $("#faculty_unallocate_btn").text("Delete");
                                $("#faculty_unallocate_btn").attr("disabled", false);
                                $(".faculty_div").html(z[1]);
                                $('#temp_allocated_faculty').val(z[0]);
                                $('#hiddenemailid').val("null");
                                $('.showtext').html("Choose Faculty ".concat(' <i class="fa fa-caret-down"></i>'));

                            }
                        });
                    });

                });

                $('.showtext').click(function(e) {
                    if (document.querySelector("#show").style.display == "none")
                        document.querySelector("#show").style.display = "inline"
                    else
                        document.querySelector("#show").style.display = "none"
                });
                $('#search_text').keyup(debounce(function() {
                    var txt = $(this).val();
                    var txt2 = $('#temp_allocated_faculty').val();
                    if (txt == '') {
                        $('#result').html('');
                    } else {
                        $('#result').html('');
                        $.ajax({
                            url: "course/loadModal/fetch_faculties.php",
                            method: "post",
                            data: {
                                search: txt,
                                allocated: txt2
                            },
                            dataType: "text",
                            success: function(data) {
                                $('#result').html(data);
                                $('.option-selected').click(function(e) {
                                    var x = $(this).val();
                                    var y = $(this).prev();
                                    $('#hiddenemailid').val(y.val());
                                    $('.showtext').html(x.concat(' <i class="fa fa-caret-down"></i>'));
                                    document.querySelector("#show").style.display = "none";
                                    $('#search_text').val("");
                                    $('#result').html('');
                                });
                            }
                        });
                    }
                }, 300));
            }
        });
    }

    function loadModalUpcoming() {
        var target_row = $(this).closest("tr"); // this line did the trick
        console.log(target_row)
        // var btn=$(this);
        var aPos = $("#dataTable-upcoming").dataTable().fnGetPosition(target_row.get(0));
        var courseData = $('#dataTable-upcoming').DataTable().row(aPos).data()
        // delete courseData.action
        // delete courseData.allocate_faculty
        courseData['course_type_id'] = '<?php echo $course_type_id; ?>';
        courseData['program'] = '<?php echo $_POST['program']; ?>';
        var json_courseData = JSON.stringify(courseData)
        // console.log(json_courseData)
        $.ajax({
            type: "POST",
            url: "course/loadModal/upcoming_courses_modal.php",
            // data: form_serialize, 
            // dataType: "json",
            data: json_courseData,
            success: function(output) {
                // $("#"+x).text("Deleted Successfully");
                target_row.append(output);
                $('#update-del-modal').modal('show')
                $(document).on('hidden.bs.modal', '#update-del-modal', function() {
                    $("#update-del-modal").remove();
                    $("#deleteSimilarCourseModal").remove();
                });
                $('#delete_course_form').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var form_serialize = form.serializeArray(); // serializes the form's elements.
                    form_serialize.push({
                        name: $("#delete_course_btn").attr('name'),
                        value: $("#delete_course_btn").attr('value')
                    });
                    $("#delete_course_btn").text("Deleting...");
                    $("#delete_course_btn").attr("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: "ic_queries/addcourse_queries.php",
                        data: form_serialize,
                        success: function(data) {
                            //    alert(data); // show response from the php script.
                            $("#delete_course_btn").text("Deleted Successfully");
                            var row = $("#update-del-modal").closest('tr');
                            var aPos = $("#dataTable-upcoming").dataTable().fnGetPosition(row.get(0));
                            $('#update-del-modal').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            // row.remove();
                            $("#dataTable-upcoming").DataTable().row(aPos).remove().draw(false);
                            // console.log(aPos);
                            // console.log(row)
                        }
                    });
                });
                $('#update_course_form').submit(function(e) {
                    update_course_form_upcoming(e);
                    // $('#update-del-modal').modal('hide');
                });

                $('#add_new_similar_course_btn').click(function(e) {
                    if (document.querySelector(".temporarydiv").style.display == "none")
                        document.querySelector(".temporarydiv").style.display = "inline"
                });

                $("#tempyear").change(function(e) {
                    const year = $(this).val();
                    if (year != "") {
                        $("#tempcid option").not(":first").remove();
                        $.ajax({
                            type: "POST",
                            url: "course/loadModal/course_modal_mapping_utils.php",
                            data: {
                                dataFor: "semester",
                                courseType: "CURRENT",
                                year: year,
                                program: "<?php echo $_POST['program']; ?>"
                            },
                            success: function(data) {
                                $("#tempsem option").not(":first").remove();
                                $("#tempsem").append(data)
                            },
                            error: function(err) {
                                console.log(err)
                            }
                        })
                    }
                })

                $("#tempsem").change(function(e) {
                    const sem = $(this).val();
                    const year = $("#tempyear").val();
                    if (year != "" && sem != "") {
                        $.ajax({
                            type: "POST",
                            url: "course/loadModal/course_modal_mapping_utils.php",
                            data: {
                                dataFor: "courses",
                                year: year,
                                sem: sem,
                                program: "<?php echo $_POST['program']; ?>"
                            },
                            success: function(data) {
                                $("#tempcid option").not(":first").remove();
                                $("#tempcid").append(data)
                            },
                            error: function(err) {
                                console.log(err)
                            }
                        })
                    }
                })

                $("#upload_syllabus").submit(function(e) {
                    e.preventDefault();
                    console.log("abcd")
                    var data = new FormData(this);
                    data.append("upload_syllabus", true);
                    data.append("courseType", "UPCOMING");
                    $.ajax({
                        method: "POST",
                        enctype: 'multipart/form-data',
                        url: "ic_queries/upload_syllabus.php",
                        data: data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        xhr: function() {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = ((evt.loaded / evt.total) * 100);
                                    $('#upload_syllabus .progress-bar').css('width', percentComplete + '%').attr('aria-valuenow', percentComplete);
                                    console.log(percentComplete)
                                }
                            }, false);
                            return xhr;
                        },
                        beforeSend: function() {
                            $('#upload_syllabus .progress').show();
                        },
                        success: function(data) {
                            $("#upload_syllabus_btn").html('uploaded successfully').attr('disabled', true)
                        },
                        error: function(e) {
                            window.alert(e);
                        }
                    })
                })
                $("#remove_syllabus_form").submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "ic_queries/remove_syllabus.php",
                        data: $(this).serializeArray(),
                        success: function(data) {
                            $("#remove_syllabus_form *").hide();
                        },
                        error: function(e) {
                            window.alert(e);
                        }

                    })

                })

                $('#add_similar_course').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var form_serialize = form.serializeArray(); // serializes the form's elements.
                    form_serialize.push({
                        name: $("#add_new_similar_course_btn").attr('name'),
                        value: $("#add_new_similar_course_btn").attr('value')
                    });
                    $("#add_new_similar_course_btn").text("Allocating...");
                    $("#add_new_similar_course_btn").attr("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: "ic_queries/addcourse_queries.php",
                        data: form_serialize,
                        success: function(data) {
                            var z = data.split("+");
                            //$('#deleteSimilarCourseModal').modal('hide');
                            $("#add_new_similar_course_btn").text("Allocate");
                            $("#add_new_similar_course_btn").attr("disabled", false);
                            $(".faculty_div").html(z[1]);
                            document.querySelector(".temporarydiv").style.display = "none"
                            $('.tempcid').val('');
                            $('.tempyear').val('');
                            $('.tempsem').val('');
                            //$('#temp_allocated_faculty').val(z[0]);
                            //$('#hiddenemailid').val("null");
                            //$('.showtext').html("Choose Faculty ".concat(' <i class="fa fa-caret-down"></i>'));

                        }
                    });
                });

                $('#deleteSimilarCourseModal').on('show.bs.modal', function(event) {

                    let oldyear = $(event.relatedTarget).data('oldyear')
                    $(this).find('.modal-body #oldyear').val(oldyear)
                    let oldcid = $(event.relatedTarget).data('oldcid')
                    $(this).find('.modal-body #oldcid').val(oldcid)
                    let oldsem = $(event.relatedTarget).data('oldsem')
                    $(this).find('.modal-body #oldsem').val(oldsem)

                    let newyear = $(event.relatedTarget).data('newyear')
                    $(this).find('.modal-body #newyear').val(newyear)
                    let newcid = $(event.relatedTarget).data('newcid')
                    $(this).find('.modal-body #newcid').val(newcid)
                    let newsem = $(event.relatedTarget).data('newsem')
                    $(this).find('.modal-body #newsem').val(newsem)
                    let old_course_type_id = $(event.relatedTarget).data('oldcourse_type_id')
                    $(this).find('.modal-body #old_course_type_id').val(old_course_type_id)
                    let new_course_type_id = $(event.relatedTarget).data('newcourse_type_id')
                    $(this).find('.modal-body #new_course_type_id').val(new_course_type_id)


                    $('#newModalRemoveCourse').submit(function(e) {
                        e.preventDefault();
                        var form = $(this);
                        var form_serialize = form.serializeArray(); // serializes the form's elements.
                        form_serialize.push({
                            name: $("#course_remove_btn").attr('name'),
                            value: $("#course_remove_btn").attr('value')
                        });
                        $("#course_remove_btn").text("Removing...");
                        $("#course_remove_btn").attr("disabled", true);
                        $.ajax({
                            type: "POST",
                            url: "ic_queries/addcourse_queries.php",
                            data: form_serialize,
                            success: function(data) {
                                var z = data.split("+");
                                $('#deleteSimilarCourseModal').modal('hide');
                                $("#course_remove_btn").text("Remove");
                                $("#course_remove_btn").attr("disabled", false);
                                $(".faculty_div").html(z[1]);
                                //$('#temp_allocated_faculty').val(z[0]);
                                //$('#hiddenemailid').val("null");
                                //$('.showtext').html("Choose Faculty ".concat(' <i class="fa fa-caret-down"></i>'));

                            }
                        });
                    });

                });
            }
        });
    }

    function update_course_form_upcoming(e) {
        e.preventDefault();
        var form = $('#update_course_form');
        var form_serialize = form.serializeArray(); // serializes the form's elements.
        // console.log(form_serialize)
        form_serialize.push({
            name: $("#update_course_btn").attr('name'),
            value: $("#update_course_btn").attr('value')
        });
        $("#update_course_btn").text("Updating...");
        $("#update_course_btn").attr("disabled", true);
        $.ajax({
            type: "POST",
            url: "ic_queries/addcourse_queries.php",
            data: form_serialize,
            success: function(data) {
                //    alert(data); // show response from the php script.
                if (data === "Exists_cid") {
                    $('#error_cid_upcoming').text('*This course already exists in this Semester');
                    // $('#error_sem').text('*This course already exists in this Semester');
                    $("#update_course_btn").text("Update");
                    $("#update_course_btn").attr("disabled", false);
                } else if (data === "Max_error") {
                    $('#error_max_upcoming').text('*Max value is less than Min');
                    $("#update_course_btn").text("Update");
                    $("#update_course_btn").attr("disabled", false);
                } else {
                    $("#update_course_btn").text("Updated Successfully");
                    var row = $("#update-del-modal").closest('tr');
                    var aPos = $("#dataTable-upcoming").dataTable().fnGetPosition(row.get(0));
                    var temp = $("#dataTable-upcoming").DataTable().row(aPos).data();
                    // console.log(temp)
                    console.log(form_serialize)
                    temp['cname'] = form_serialize[findByAttr(form_serialize, 'name', 'coursename')].value;
                    temp['cid'] = form_serialize[findByAttr(form_serialize, 'name', 'courseidnew')].value;
                    temp['sem'] = form_serialize[findByAttr(form_serialize, 'name', 'semnew')].value;
                    temp['year'] = form_serialize[findByAttr(form_serialize, 'name', 'year')].value;
                    // temp['dept_name']=id_to_name_convertor_dept(form_serialize[6].value);
                    var x = "";
                    var index;
                    var floatingDeptIndex = findByAttr(form_serialize, 'name', 'floating_check_dept[]')
                    for (index of floatingDeptIndex) {
                        x = x.concat(id_to_name_convertor_dept(form_serialize[index].value));
                        x = x.concat(", ");
                    }
                    x = x.substr(0, x.length - 2);
                    temp['dept_name'] = x;
                    x = "";
                    var deptApplicableIndex = findByAttr(form_serialize, 'name', 'check_dept[]')
                    for (index of deptApplicableIndex) {
                        x = x.concat(id_to_name_convertor_dept(form_serialize[index].value));
                        x = x.concat(", ");
                    }
                    x = x.substr(0, x.length - 2);
                    temp['dept_applicable'] = x;
                    temp['max'] = form_serialize[findByAttr(form_serialize, 'name', 'max')].value;
                    temp['min'] = form_serialize[findByAttr(form_serialize, 'name', 'min')].value;
                    console.log(temp)
                    $('#dataTable-upcoming').dataTable().fnUpdate(temp, aPos, undefined, false);
                    $('.action-btn').off('click')
                    $('.action-btn').on('click', loadModalUpcoming)
                    $(".selectrow_upcoming").attr("disabled", true);
                    $('#error_cid_upcoming').remove();
                    $('#error_max_upcoming').remove();
                    // $("#dataTable-current").DataTable().row(aPos).draw(false);
                }
            }
        });
    }
    $("#dataTable-upcoming").on('click', 'td.cname', function() {
        var tr = $(this).closest('tr');
        var row = $("#dataTable-upcoming").DataTable().row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown table-warning');
        } else {
            // Open this row
            var data = {}
            data['cid'] = row.data()['cid'];
            data['sem'] = row.data()['sem'];
            data['year'] = row.data()['year'];
            data['type'] = 'upcoming'
            data['course_type_id'] = '<?php echo $course_type_id; ?>';
            data['program'] = '<?php echo $_POST['program'] ?>';
            data_json = JSON.stringify(data)
            console.log(data_json)
            $.ajax({
                type: "POST",
                url: "loadAdditionalInfo/additional_info_course.php",
                data: data_json,
                success: function(response) {
                    row.child(response).show();
                    tr.addClass('shown table-warning');
                }
            });
            // row.child("<b>Hello</b>").show();
        }
    })

    // ***************Previous Course Section**************
    $("#bulkUploadPrevious").submit(function(e) {
        e.preventDefault();
        form = this;
        var formData = new FormData(this);
        formData.append("program", "<?php echo $_POST['program']; ?>")
        formData.append("course_type_id", "<?php echo $course_type_id; ?>")

        $("#upload_previous").attr("disabled", true);
        $("#upload_previous").text("Uploading...")
        $.ajax({
            url: "course/bulkUpload/previous_course_upload.php",
            type: 'POST',
            data: formData,
            success: function(data) {
                if ($.trim(data) == "Successful") {
                    $("#upload_previous").text("Uploaded Successfully")
                    loadPrevious();
                } else {
                    $("#upload_previous").text("Upload Failed")
                    alert(data);
                }
                // form.reset();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    })
    $("#select_all_previous_page").click(function(e) {
        //   var row=$(this).closest('tr')
        if ($(this).is(":checked")) {
            $("#dataTable-previous tbody tr").addClass("selected table-secondary");
            $(".selectrow_previous").attr("checked", true);
        } else {
            $(".selectrow_previous").attr("checked", false);
            $("#dataTable-previous tbody tr").removeClass("selected table-secondary");
        }
        //   row.toggleClass('selected table-secondary')
    })
    $("#delete_selected_previous_btn").click(function(e) {
        alert("You have selected " + $("#dataTable-previous tbody tr.selected").length + " record(s) for deletion");
        var delete_rows = $("#dataTable-previous").DataTable().rows('.selected').data()
        var delete_data = {}
        for (var i = 0; i < delete_rows.length; i++) {
            baseData = {}
            baseData['cid'] = delete_rows[i].cid
            baseData['sem'] = delete_rows[i].sem
            baseData['year'] = delete_rows[i].year
            delete_data[i] = baseData
            // console.log(baseData);
        }
        var actual_data = {}
        actual_data['type'] = 'previous'
        actual_data['course_type_id'] = '<?php echo $course_type_id; ?>';
        actual_data['program'] = '<?php echo $_POST['program']; ?>';
        actual_data['delete_data'] = delete_data
        actual_delete_data_json = JSON.stringify(actual_data)
        console.log(actual_delete_data_json)
        $.ajax({
            type: "POST",
            url: "ic_queries/multioperation_queries/delete_multiple_courses.php",
            data: actual_delete_data_json,
            success: function(data) {
                // console.log(data)
                $("#dataTable-previous").DataTable().draw(false);
            }
        })
    })

    function loadPrevious() {
        // document.querySelector("#addCoursebtn").style.display="none"
        $('#dataTable-previous').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            dom: '<"d-flex justify-content-between"fBl>tip',
            buttons: [{
                extend: 'excel',
                title: "previous-audit-courses-data",
                text: '<span> <i class="fas fa-download "></i> EXCEL</span>',
                className: "btn btn-outline-primary  ",
                action: newExportAction,
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                }
            }, {
                extend: "pdfHtml5",
                title: "previous-audit-courses-data",
                text: '<span> <i class="fas fa-download "></i> PDF</span>',
                className: "btn btn-outline-primary  mx-2",
                action: newExportAction,
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                },
            }],
            ajax: {
                'url': 'course/loadInfo/previous_courses.php',
                "data": function(d) {
                    d.filters = getFilters();
                    d.program = "<?php echo $_POST['program']; ?>";
                    d.course_type_id = "<?php echo $course_type_id; ?>"
                    return d
                }
            },
            fnDrawCallback: function() {
                $(".action-btn").on('click', loadModalPrevious);
                $(".allocate-btn").on('click', loadAllocateModalPrevious);
                $(".selectrow_previous").attr("disabled", true);
                $("th").removeClass('selectbox_previous_td');
                $(".selectbox_previous_td").click(function(e) {
                    var row = $(this).closest('tr')
                    var checkbox = $(this).find('input');
                    checkbox.attr("checked", !checkbox.attr("checked"));
                    row.toggleClass('selected table-secondary')
                    if ($("#dataTable-previous tbody tr.selected").length != $("#dataTable-previous tbody tr").length) {
                        $("#select_all_previous_page").prop("checked", true)
                        $("#select_all_previous_page").prop("checked", false)
                    } else {
                        $("#select_all_previous_page").prop("checked", false)
                        $("#select_all_previous_page").prop("checked", true)
                    }
                })
            },
            columns: [{
                    data: 'select-cbox'
                },
                {
                    data: 'cname'
                },
                {
                    data: 'cid'
                },
                {
                    data: 'sem'
                },
                {
                    data: 'year'
                },
                {
                    data: 'dept_name'
                },
                {
                    data: 'dept_applicable'
                },
                {
                    data: 'max'
                },
                {
                    data: 'min'
                },
                {
                    data: 'no_of_allocated'
                },
                {
                    data: 'allocate_faculty'
                },
                {
                    data: 'action'
                },
            ],
            columnDefs: [{
                    targets: [0, 6, 10, 11], // column index (start from 0)
                    orderable: false, // set orderable false for selected columns
                },
                {
                    className: "selectbox_previous_td",
                    targets: [0]
                },
                {
                    className: "cname",
                    "targets": [1]
                },
            ]
        });
    }

    function loadAllocateModalPrevious() {
        var target_row = $(this).closest("tr"); // this line did the trick
        console.log(target_row)
        var aPos = $("#dataTable-previous").dataTable().fnGetPosition(target_row.get(0));
        var courseData = $('#dataTable-previous').DataTable().row(aPos).data()
        // delete courseData.action
        // delete courseData.allocate_faculty
        courseData['course_type_id'] = '<?php echo $course_type_id; ?>';
        courseData['program'] = '<?php echo $_POST['program']; ?>';
        var json_courseData = JSON.stringify(courseData)
        // console.log(json_courseData)
        $.ajax({
            type: "POST",
            url: "course/loadModal/previous_course_faculty_allocate_modal.php",
            // data: form_serialize, 
            // dataType: "json",
            data: json_courseData,
            success: function(output) {
                // $("#"+x).text("Deleted Successfully");
                target_row.append(output);
                $('#deleteFacultyModal').on('shown.bs.modal', function(e) {
                    // $("#allocate-modal").css({ backdrop-filter: none });
                })

                //when modal closes
                $('#deleteFacultyModal').on('hidden.bs.modal', function(e) {
                    // $("#allocate-modal").css({ opacity: 1 });
                })

                $('#allocate-modal').modal('show')
                $(document).on('hidden.bs.modal', '#allocate-modal', function() {
                    $("#allocate-modal").remove();
                    $("#deleteFacultyModal").remove();
                });

                $('#allocate_faculty_audit').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var form_serialize = form.serializeArray(); // serializes the form's elements.
                    form_serialize.push({
                        name: $("#allocate_faculty_audit_btn").attr('name'),
                        value: $("#allocate_faculty_audit_btn").attr('value')
                    });
                    if (form_serialize[3].value != null) {
                        $("#allocate_faculty_audit_btn").text("Allocating...");
                        $("#allocate_faculty_audit_btn").attr("disabled", true);
                        $.ajax({
                            type: "POST",
                            url: "ic_queries/allocate_faculty_queries.php",
                            data: form_serialize,
                            success: function(data) {
                                var z = data.split("+");
                                $("#allocate_faculty_audit_btn").text("Allocated Successfully");
                                $("#allocate_faculty_audit_btn").text("Allocate");
                                $("#allocate_faculty_audit_btn").attr("disabled", false);
                                $(".faculty_div").html(z[1]);
                                $('#temp_allocated_faculty').val(z[0]);
                                $('#hiddenemailid').val("null");
                                $('.showtext').html("Choose Faculty ".concat(' <i class="fa fa-caret-down"></i>'));

                            }
                        });
                    }
                });

                $('#deleteFacultyModal').on('show.bs.modal', function(event) {
                    let email_id = $(event.relatedTarget).data('email_id')
                    $(this).find('.modal-body #email_id').val(email_id)
                    let cid = $(event.relatedTarget).data('cid')
                    $(this).find('.modal-body #cid').val(cid)
                    let sem = $(event.relatedTarget).data('sem')
                    $(this).find('.modal-body #sem').val(sem)
                    let year = $(event.relatedTarget).data('year')
                    $(this).find('.modal-body #year').val(year)

                    $('#newModalUnallocate').submit(function(e) {
                        e.preventDefault();
                        var form = $(this);
                        var form_serialize = form.serializeArray(); // serializes the form's elements.
                        form_serialize.push({
                            name: $("#faculty_unallocate_btn").attr('name'),
                            value: $("#faculty_unallocate_btn").attr('value')
                        });
                        $("#faculty_unallocate_btn").text("Deleting...");
                        $("#faculty_unallocate_btn").attr("disabled", true);
                        $.ajax({
                            type: "POST",
                            url: "ic_queries/allocate_faculty_queries.php",
                            data: form_serialize,
                            success: function(data) {
                                var z = data.split("+");
                                $('#deleteFacultyModal').modal('hide');
                                $("#faculty_unallocate_btn").text("Delete");
                                $("#faculty_unallocate_btn").attr("disabled", false);
                                $(".faculty_div").html(z[1]);
                                $('#temp_allocated_faculty').val(z[0]);
                                $('#hiddenemailid').val("null");
                                $('.showtext').html("Choose Faculty ".concat(' <i class="fa fa-caret-down"></i>'));

                            }
                        });
                    });

                });

                $('.showtext').click(function(e) {
                    if (document.querySelector("#show").style.display == "none")
                        document.querySelector("#show").style.display = "inline"
                    else
                        document.querySelector("#show").style.display = "none"
                });
                $('#search_text').keyup(debounce(function() {
                    var txt = $(this).val();
                    var txt2 = $('#temp_allocated_faculty').val();
                    if (txt == '') {
                        $('#result').html('');
                    } else {
                        $('#result').html('');
                        $.ajax({
                            url: "course/loadModal/fetch_faculties.php",
                            method: "post",
                            data: {
                                search: txt,
                                allocated: txt2
                            },
                            dataType: "text",
                            success: function(data) {
                                $('#result').html(data);
                                $('.option-selected').click(function(e) {
                                    var x = $(this).val();
                                    var y = $(this).prev();
                                    $('#hiddenemailid').val(y.val());
                                    $('.showtext').html(x.concat(' <i class="fa fa-caret-down"></i>'));
                                    document.querySelector("#show").style.display = "none";
                                    $('# _text').val("");
                                    $('#result').html('');
                                });
                            }
                        });
                    }
                }, 300));
            }
        });
    }

    function loadModalPrevious() {
        var target_row = $(this).closest("tr"); // this line did the trick
        console.log(target_row)
        var aPos = $("#dataTable-previous").dataTable().fnGetPosition(target_row.get(0));
        var courseData = $('#dataTable-previous').DataTable().row(aPos).data()
        // delete courseData.action
        // delete courseData.allocate_faculty
        courseData['course_type_id'] = '<?php echo $course_type_id; ?>';
        courseData['program'] = '<?php echo $_POST['program']; ?>';
        var json_courseData = JSON.stringify(courseData)
        // console.log(json_courseData)
        $.ajax({
            type: "POST",
            url: "course/loadModal/previous_courses_modal.php",
            // data: form_serialize, 
            // dataType: "json",
            data: json_courseData,
            success: function(output) {
                // $("#"+x).text("Deleted Successfully");
                target_row.append(output);
                $('#update-del-modal').modal('show')
                $(document).on('hidden.bs.modal', '#update-del-modal', function() {
                    $("#update-del-modal").remove();
                    $("#deleteSimilarCourseModal").remove();
                });
                $('#delete_course_form').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var form_serialize = form.serializeArray(); // serializes the form's elements.
                    form_serialize.push({
                        name: $("#delete_course_btn").attr('name'),
                        value: $("#delete_course_btn").attr('value')
                    });
                    $("#delete_course_btn").text("Deleting...");
                    $("#delete_course_btn").attr("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: "ic_queries/addcourse_queries.php",
                        data: form_serialize,
                        success: function(data) {
                            //    alert(data); // show response from the php script.
                            $("#delete_course_btn").text("Deleted Successfully");
                            var row = $("#update-del-modal").closest('tr');
                            var aPos = $("#dataTable-previous").dataTable().fnGetPosition(row.get(0));
                            $('#update-del-modal').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            // row.remove();
                            $("#dataTable-previous").DataTable().row(aPos).remove().draw(false);
                            // console.log(aPos);
                            // console.log(row)
                        }
                    });
                });

                $('#add_new_similar_course_btn').click(function(e) {
                    if (document.querySelector(".temporarydiv").style.display == "none")
                        document.querySelector(".temporarydiv").style.display = "inline"
                });
                $("#tempyear").change(function(e) {
                    const year = $(this).val();
                    if (year != "") {
                        $("#tempcid option").not(":first").remove();
                        $.ajax({
                            type: "POST",
                            url: "course/loadModal/course_modal_mapping_utils.php",
                            data: {
                                dataFor: "semester",
                                courseType: "CURRENT",
                                year: year,
                                program: "<?php echo $_POST['program']; ?>"
                            },
                            success: function(data) {
                                $("#tempsem option").not(":first").remove();
                                $("#tempsem").append(data)
                            },
                            error: function(err) {
                                console.log(err)
                            }
                        })
                    }
                })

                $("#tempsem").change(function(e) {
                    const sem = $(this).val();
                    const year = $("#tempyear").val();
                    if (year != "" && sem != "") {
                        $.ajax({
                            type: "POST",
                            url: "course/loadModal/course_modal_mapping_utils.php",
                            data: {
                                dataFor: "courses",
                                year: year,
                                sem: sem,
                                program: "<?php echo $_POST['program']; ?>"
                            },
                            success: function(data) {
                                $("#tempcid option").not(":first").remove();
                                $("#tempcid").append(data)
                            },
                            error: function(err) {
                                console.log(err)
                            }
                        })
                    }
                })

                $("#upload_syllabus").submit(function(e) {
                    e.preventDefault();
                    console.log("abcd")
                    var data = new FormData(this);
                    data.append("upload_syllabus", true);
                    data.append("courseType", "PREVIOUS");
                    $.ajax({
                        method: "POST",
                        enctype: 'multipart/form-data',
                        url: "ic_queries/upload_syllabus.php",
                        data: data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        xhr: function() {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = ((evt.loaded / evt.total) * 100);
                                    $('#upload_syllabus .progress-bar').css('width', percentComplete + '%').attr('aria-valuenow', percentComplete);
                                    console.log(percentComplete)
                                }
                            }, false);
                            return xhr;
                        },
                        beforeSend: function() {
                            $('#upload_syllabus .progress').show();
                        },
                        success: function(data) {
                            $("#upload_syllabus_btn").html('uploaded successfully').attr('disabled', true)
                        },
                        error: function(e) {
                            window.alert(e);
                        }
                    })
                })
                $("#remove_syllabus_form").submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "ic_queries/remove_syllabus.php",
                        data: $(this).serializeArray(),
                        success: function(data) {
                            $("#remove_syllabus_form *").hide();
                        },
                        error: function(e) {
                            window.alert(e);
                        }
                    })

                })

                $('#add_similar_course').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var form_serialize = form.serializeArray(); // serializes the form's elements.
                    form_serialize.push({
                        name: $("#add_new_similar_course_btn").attr('name'),
                        value: $("#add_new_similar_course_btn").attr('value')
                    });
                    $("#add_new_similar_course_btn").text("Allocating...");
                    $("#add_new_similar_course_btn").attr("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: "ic_queries/addcourse_queries.php",
                        data: form_serialize,
                        success: function(data) {
                            var z = data.split("+");
                            //$('#deleteSimilarCourseModal').modal('hide');
                            $("#add_new_similar_course_btn").text("Allocate");
                            $("#add_new_similar_course_btn").attr("disabled", false);
                            $(".faculty_div").html(z[1]);
                            document.querySelector(".temporarydiv").style.display = "none"
                            $('.tempcid').val('');
                            $('.tempyear').val('');
                            $('.tempsem').val('');
                            //$('#temp_allocated_faculty').val(z[0]);
                            //$('#hiddenemailid').val("null");
                            //$('.showtext').html("Choose Faculty ".concat(' <i class="fa fa-caret-down"></i>'));

                        }
                    });
                });

                $('#deleteSimilarCourseModal').on('show.bs.modal', function(event) {

                    let oldyear = $(event.relatedTarget).data('oldyear')
                    $(this).find('.modal-body #oldyear').val(oldyear)
                    let oldcid = $(event.relatedTarget).data('oldcid')
                    $(this).find('.modal-body #oldcid').val(oldcid)
                    let oldsem = $(event.relatedTarget).data('oldsem')
                    $(this).find('.modal-body #oldsem').val(oldsem)

                    let newyear = $(event.relatedTarget).data('newyear')
                    $(this).find('.modal-body #newyear').val(newyear)
                    let newcid = $(event.relatedTarget).data('newcid')
                    $(this).find('.modal-body #newcid').val(newcid)
                    let newsem = $(event.relatedTarget).data('newsem')
                    $(this).find('.modal-body #newsem').val(newsem)
                    let old_course_type_id = $(event.relatedTarget).data('oldcourse_type_id')
                    $(this).find('.modal-body #old_course_type_id').val(old_course_type_id)
                    let new_course_type_id = $(event.relatedTarget).data('newcourse_type_id')
                    $(this).find('.modal-body #new_course_type_id').val(new_course_type_id)


                    $('#newModalRemoveCourse').submit(function(e) {
                        e.preventDefault();
                        var form = $(this);
                        var form_serialize = form.serializeArray(); // serializes the form's elements.
                        form_serialize.push({
                            name: $("#course_remove_btn").attr('name'),
                            value: $("#course_remove_btn").attr('value')
                        });
                        $("#course_remove_btn").text("Removing...");
                        $("#course_remove_btn").attr("disabled", true);
                        $.ajax({
                            type: "POST",
                            url: "ic_queries/addcourse_queries.php",
                            data: form_serialize,
                            success: function(data) {
                                var z = data.split("+");
                                $('#deleteSimilarCourseModal').modal('hide');
                                $("#course_remove_btn").text("Remove");
                                $("#course_remove_btn").attr("disabled", false);
                                $(".faculty_div").html(z[1]);
                                //$('#temp_allocated_faculty').val(z[0]);
                                //$('#hiddenemailid').val("null");
                                //$('.showtext').html("Choose Faculty ".concat(' <i class="fa fa-caret-down"></i>'));

                            }
                        });
                    });

                });
                $('#update_course_form').submit(function(e) {
                    update_course_form_previous(e);
                    // $('#update-del-modal').modal('hide');
                });

            }
        });
    }

    function update_course_form_previous(e) {
        e.preventDefault();
        var form = $('#update_course_form');
        var form_serialize = form.serializeArray(); // serializes the form's elements.
        // console.log(form_serialize)
        form_serialize.push({
            name: $("#update_course_btn").attr('name'),
            value: $("#update_course_btn").attr('value')
        });
        $("#update_course_btn").text("Updating...");
        $("#update_course_btn").attr("disabled", true);
        $.ajax({
            type: "POST",
            url: "ic_queries/addcourse_queries.php",
            data: form_serialize,
            success: function(data) {
                //    alert(data); // show response from the php script.
                if (data === "Exists_cid") {
                    $('#error_cid_previous').text('*This course already exists in this Semester');
                    // $('#error_sem').text('*This course already exists in this Semester');
                    $("#update_course_btn").text("Update");
                    $("#update_course_btn").attr("disabled", false);
                } else if (data === "Max_error") {
                    $('#error_max_previous').text('*Max value is less than Min');
                    $("#update_course_btn").text("Update");
                    $("#update_course_btn").attr("disabled", false);
                } else {
                    $("#update_course_btn").text("Updated Successfully");
                    var row = $("#update-del-modal").closest('tr');
                    var aPos = $("#dataTable-previous").dataTable().fnGetPosition(row.get(0));
                    var temp = $("#dataTable-previous").DataTable().row(aPos).data();
                    // console.log(temp)
                    console.log(form_serialize)
                    temp['cname'] = form_serialize[findByAttr(form_serialize, 'name', 'coursename')].value;
                    temp['cid'] = form_serialize[findByAttr(form_serialize, 'name', 'courseidnew')].value;
                    temp['sem'] = form_serialize[findByAttr(form_serialize, 'name', 'semnew')].value;
                    temp['year'] = form_serialize[findByAttr(form_serialize, 'name', 'year')].value;
                    // temp['dept_name']=id_to_name_convertor_dept(form_serialize[6].value);
                    var x = "";
                    var index;
                    var floatingDeptIndex = findByAttr(form_serialize, 'name', 'floating_check_dept[]')
                    for (index of floatingDeptIndex) {
                        x = x.concat(id_to_name_convertor_dept(form_serialize[index].value));
                        x = x.concat(", ");
                    }
                    x = x.substr(0, x.length - 2);
                    temp['dept_name'] = x;
                    x = "";
                    var deptApplicableIndex = findByAttr(form_serialize, 'name', 'check_dept[]')
                    for (index of deptApplicableIndex) {
                        x = x.concat(id_to_name_convertor_dept(form_serialize[index].value));
                        x = x.concat(", ");
                    }
                    x = x.substr(0, x.length - 2);
                    temp['dept_applicable'] = x;
                    temp['max'] = form_serialize[findByAttr(form_serialize, 'name', 'max')].value;
                    temp['min'] = form_serialize[findByAttr(form_serialize, 'name', 'min')].value;
                    console.log(temp)
                    $('#dataTable-previous').dataTable().fnUpdate(temp, aPos, undefined, false);
                    $('.action-btn').off('click')
                    $('.action-btn').on('click', loadModalPrevious)
                    $(".selectrow_previous").attr("disabled", true);
                    $('#error_cid_previous').remove();
                    $('#error_max_previous').remove();
                    // $("#dataTable-current").DataTable().row(aPos).draw(false);
                }
            }
        });
    }
    $("#dataTable-previous").on('click', 'td.cname', function() {
        var tr = $(this).closest('tr');
        var row = $("#dataTable-previous").DataTable().row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown table-warning');
        } else {
            // Open this row
            var data = {}
            data['cid'] = row.data()['cid'];
            data['sem'] = row.data()['sem'];
            data['year'] = row.data()['year'];
            data['type'] = 'previous'
            data['course_type_id'] = '<?php echo $course_type_id; ?>';
            data['program'] = '<?php echo $_POST['program'] ?>';
            data_json = JSON.stringify(data)
            console.log(data_json)
            $.ajax({
                type: "POST",
                url: "loadAdditionalInfo/additional_info_course.php",
                data: data_json,
                success: function(response) {
                    row.child(response).show();
                    tr.addClass('shown table-warning');
                }
            });
            // row.child("<b>Hello</b>").show();
        }
    })

    function id_to_name_convertor_dept(id) {
        <?php
        include_once('../config.php');
        $sql = "SELECT * FROM department";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo 'if(id=="' . $row['dept_id'] . '") return "' . $row['dept_name'] . '";';
        }
        ?>
        // if(id == "1") return "Comp";
        // if(id == "2") return "ETRX";
        // if(id == "3") return "EXTC";
        // if(id == "4") return "IT";
        // if(id == "5") return "MECH";
    }

    $('#nav-tab').on("click", "a", function(event) {
        activeTab = $(this).attr('id').split('-')[1];
        console.log(activeTab)
        clearFilters();
        if (activeTab == 'current') {
            loadCurrent()
        } else if (activeTab == 'upcoming') {
            loadUpcoming();
        } else if (activeTab == 'previous') {
            loadPrevious()
        }
    });
    $("#add_course_form").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        var form_serialize = form.serializeArray(); // serializes the form's elements.
        form_serialize.push({
            name: $("#add_course_btn").attr('name'),
            value: $("#add_course_btn").attr('value')
        });
        $("#add_course_btn").text("Adding...");
        $("#add_course_btn").attr("disabled", true);
        $.ajax({
            type: "POST",
            url: "ic_queries/addcourse_queries.php",
            data: form_serialize,
            success: function(data) {
                //alert(data); // show response from the php script.
                if (data === "add_up_max_error") {
                    $('#add_upcoming_max_error').text('*Max value is less than Min');
                    $("#add_course_btn").text("Add");
                    $("#add_course_btn").attr("disabled", false);
                } else if (data === "add_up_cid_error") {
                    $('#add_upcoming_cid_error').text('*This course already exists in this Semester');
                    // $('#error_sem').text('*This course already exists in this Semester');
                    $("#add_course_btn").text("Add");
                    $("#add_course_btn").attr("disabled", false);
                } else {
                    $("#add_course_btn").text("Added Successfully");
                    $('add_upcoming_max_error').remove();
                }
            }
        });
    });
    $("#close_add_course_form").click(function() {
        document.querySelector("#add_course_form").reset();
        $("#add_course_btn").text("Add")
        $("#add_course_btn").attr("disabled", false);
        $("#map_section").empty();
        $("#total_prev").val("0");
        $("#add_prev").hide();
    })
    $("#close_add_form_cross").click(function() {
        document.querySelector("#add_course_form").reset();
        $("#add_course_btn").text("Add")
        $("#add_course_btn").attr("disabled", false);
        $("#map_section").empty();
        $("#total_prev").val("0");
        $("#add_prev").hide();
    })
</script>

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>