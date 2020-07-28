<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>

<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>
<?php
    $result = mysqli_query($conn,"select academic_year from current_sem_info WHERE currently_active=1");
    $row_yr=mysqli_fetch_assoc($result);
    $year1=$row_yr['academic_year'];
    $year2=$row_yr['academic_year'];

    $sql = "SELECT * FROM department";
    $dept_result = mysqli_query($conn, $sql);
    $dept_result1 = mysqli_query($conn, $sql);
    $dept_result2 = mysqli_query($conn, $sql);
    // echo $year;
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">Student Records</h4>
                </div>
                <div class="col text-center">
                    <button type="button" class="btn btn-primary" name="addstudent" data-toggle="modal" data-target="#uploadstudent">
                        <i class="fas fa-upload"></i>
                    </button>
                    <!-- <button type="button" class="btn btn-primary" name="updatestudent" data-toggle="modal" data-target="#updatestudent">
                        <i class="fas fa-edit"></i>
                    </button> -->
                </div>
                
                <div class="col text-right">
                    <button type="button" id="filterToggle" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
            </div>
            <br>
            <div class="modal fade " id="invalidstudents" tabindex="-1" role="dialog" aria-labelledby="invalid-students" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="invalid-students">INVALID STUDENTS LIST </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6><b>Following students do not belong to <?php echo $_SESSION['dept_name']  ?> department:</b></h6>
                            <ul id="invalidstudentslist">
                                <li>abc</li>
                                <li>def</li>
                                <li>ghi</li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Upload div -->
            <div class="modal fade" id="uploadstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Upload Your File </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tabb" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-students-tab" data-toggle="tab" href="#nav-students" role="tab" aria-controls="nav-students" aria-selected="true">Instructions</a>
                                    <a class="nav-item nav-link" id="nav-students-upload-tab" data-toggle="tab" href="#nav-students-upload" role="tab" aria-controls="nav-students-upload" aria-selected="false">Upload</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabbContent">
                                <!--Instructions Current-->
                                <div class="tab-pane fade show active" id="nav-students" role="tabpanel" aria-labelledby="nav-students">
                                    <span>
                                        <ol>
                                            <li>Provide the column names (headers of the columns) for the following data from the excel sheet <span class="text-danger">(order is <em><b>Not</b></em> important)*</span></li>
                                            <ul>
                                                <li><b>FIRST NAME:-</b> The first name of the students.</li>
                                                <li><b>MIDDLE NAME:-</b> The middle anme of the students.</li>
                                                <li><b>LAST NAME:-</b> The last name of the students.</li>
                                                <li><b>SEMESTER:-</b> The current semester of the students.</li>
                                                <li><b>YEAR ADMITTED:-</b> The year in which the student was admitted.</li>
                                                <li><b>DEPARTMENT:-</b> The department to which the student belongs <span class="text-danger">(the excel columns should have deparment id's as given in the sample excel sheet)*</span>.</li>
                                                <li><b>EMAIL:-</b> The Email ID of the students.</li>
                                                <li><b>Roll Number:-</b>The roll number of the students</li>
                                            </ul>
                                            <li>For your reference you can download the sample excel sheet from below:</li>
                                        </ol>
                                    </span>
                                    <a href="../demo_excel_downloads/Student.xlsx" class="btn btn-primary btn-icon-split btn-sm float-right" download>
                                        <span class="icon text-white-50">
                                            <i class="fas fa-file-download"></i>
                                        </span>
                                        <span class="text">Download</span>
                                    </a>
                                </div>
                                <!--end Instructions Current-->
                                <!--Upload Current-->
                                <div class="tab-pane fade" id="nav-students-upload" role="tabpanel" aria-labelledby="nav-students-upload">
                                    <div class="container">
                                        <form method="POST" enctype="multipart/form-data" id="bulkUploadstudent">
                                        <div class="form-row">
                                                <br>
                                                <div class="form-group col-md-12">
                                                    <label for="rno"><b>Program</b></label>
                                                    <select class="form-control" id="program" name="program" required>
                                                        <option value="UG">UG</option>
                                                        <option value="PG">PG</option>
                                                        <option value="PHD">PhD</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <label for="">
                                                <br>
                                                <h6>Information for mapping Data from excel sheet to Database</h6>
                                            </label>
                                            <div class="form-row mt-4">
                                                <div class="form-group col-md-4">
                                                    <label for="cname"><b>First Name</b></label>
                                                    <input type="text" class="form-control" id="fname" placeholder="First" name="fname" value="fname" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="cname"><b>Middle Name</b></label>
                                                    <input type="text" class="form-control" id="mname" placeholder="Middle" name="mname" value="mname" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="cname"><b>Last Name</b></label>
                                                    <input type="text" class="form-control" id="lname" placeholder="Last" name="lname" value="lname" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="semester"><b>Semester</b></label>
                                                    <input type="text" class="form-control" id="semester" placeholder="Semester" name="semester" value="current_sem" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="year"><b>Year Admitted</b></label>
                                                    <input type="text" class="form-control" id="year" name="year" placeholder="year" value="year_of_admission" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="department"><b>Department</b></label>
                                                    <input type="text" class="form-control" id="department" name="department" placeholder="Department" value="dept_id" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="email"><b>Email</b></label>
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="email_id" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="rno"><b>Roll Number</b></label>
                                                    <input type="text" class="form-control" id="rno" name="rno" placeholder="Roll no" value="rollno" required>
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
                                                <button type="submit" class="btn btn-primary" name="save_changes" id="upload_student">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end Upload Current -->
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
            <!-- Upload div ends -->
    
            <!-- filter div -->
            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Filter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- filter -->
                            <form class="forms-sample" id="filter_student_form" method="POST" action="">

                                <div class="form-check">
                                    <label for="">Semester</label>
                                    <br />
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" checked name="filter_semester[]" class="custom-control-input" value="1" id="semester_1">
                                        <label class="custom-control-label" for="semester_1">1</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" checked name="filter_semester[]" class="custom-control-input" value="2" id="semester_2">
                                        <label class="custom-control-label" for="semester_2">2</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" checked name="filter_semester[]" class="custom-control-input" value="3" id="semester_3">
                                        <label class="custom-control-label" for="semester_3">3</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" checked name="filter_semester[]" class="custom-control-input" value="4" id="semester_4">
                                        <label class="custom-control-label" for="semester_4">4</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" checked name="filter_semester[]" class="custom-control-input" value="5" id="semester_5">
                                        <label class="custom-control-label" for="semester_5">5</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" checked name="filter_semester[]" class="custom-control-input" value="6" id="semester_6">
                                        <label class="custom-control-label" for="semester_6">6</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" checked name="filter_semester[]" class="custom-control-input" value="7" id="semester_7">
                                        <label class="custom-control-label" for="semester_7">7</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" checked name="filter_semester[]" class="custom-control-input" value="8" id="semester_8">
                                        <label class="custom-control-label" for="semester_8">8</label>
                                    </div>

                                </div>
                                <br>
                                <div class="form-check">
                                    <label for="">Department</label>
                                    <br>
                                    <?php
                                    $dept_names = array();
                                    $email = $_SESSION['email'];
                                    $department = 'department';
                                    $roleRestriction = in_array($_SESSION['role'], array("faculty_co", "HOD")) ? "where dept_id={$_SESSION['dept_id']}" : "";
                                    $query = "SELECT distinct(dept_name) FROM department $roleRestriction";
                                    if ($result = mysqli_query($conn, $query)) {
                                        $rowcount = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $dept_name = $row['dept_name'];
                                            echo '<div class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox" checked name="filter_dept[]" class="custom-control-input" value="' . $dept_name . '" id="filter_dept_' . $dept_name . '">
                                                    <label class="custom-control-label" for="filter_dept_' . $dept_name . '">' . $dept_name . '</label>
                                                </div>';
                                        }
                                    }
                                    ?>
                                </div>
                                <br />
                                <div class="form-check">
                                    <label for="">Year Of Admission</label>
                                    <br>
                                    <?php
                                    $years = array();
                                    $email = $_SESSION['email'];
                                    $department = 'department';
                                    $query = "SELECT distinct(year_of_admission) FROM student";
                                    if ($result = mysqli_query($conn, $query)) {
                                        $rowcount = mysqli_num_rows($result);
                                        while ($row = mysqli_fetch_array($result)) {
                                            array_push($years, $row['year_of_admission']);
                                        }
                                    }

                                    ?>
                                    <div class="row">
                                        <!-- <label for="filter_start_year" class="col col-form-label ">Start Year</label> -->
                                        <div class="col">
                                            <select class="custom-select" id="filter_start_year" name="filter_start_year">
                                                <option value="">Start Year</option>
                                                <?php
                                                foreach ($years as &$year) {
                                                    echo '<option value="' . $year . '">' . $year . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- <label for="filter_start_year" class="col col-form-label ">End Year</label> -->
                                        <div class="col">
                                            <select class="custom-select " name="filter_end_year">
                                                <option value="">End Year</option>
                                                <?php
                                                foreach ($years as &$year) {
                                                    echo '<option value="' . $year . '">' . $year . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" id="clear-filters" name="clear">clear filters</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" name="close">Close</button>
                                    <button type="submit" class="btn btn-primary" name="filter">Filter</button>
                                </div>
                            </form>
                            <!-- filter ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- filter div ends -->
        <div class="card-body">
            <div class="modal-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-Ug-tab" data-toggle="tab" href="#nav-Ug" role="tab" aria-controls="nav-Ug" aria-selected="true">UG</a>
                        <a class="nav-item nav-link" id="nav-Pg-tab" data-toggle="tab" href="#nav-Pg" role="tab" aria-controls="nav-Pg" aria-selected="false">PG</a>
                        <a class="nav-item nav-link" id="nav-Phd-tab" data-toggle="tab" href="#nav-Phd" role="tab" aria-controls="nav-Phd" aria-selected="false">PhD</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
<<<<<<< HEAD
                <!--UG-->
                <div class="tab-pane fade show active " id="nav-Ug" role="tabpanel" aria-labelledby="nav-Ug-tab">
                    <br>
                    <div class="card-header py-3">
                        <div class="row align-items-center">
                            <div class="col text-right" id="delete_selected_Ug_div">
                                <button type="button" class="btn btn-danger" id="delete_selected_Ug_btn" name="delete_selected_Ug">
                                    <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Student(s)
                                </button>
=======
                    <!--UG-->
                    <div class="tab-pane fade show active " id="nav-Ug" role="tabpanel" aria-labelledby="nav-Ug-tab">
                    <!-- BULK UPDATE UG FORM -->
                        <div class="modal fade" id="bulkUpdateModalUg" tabindex="-1" role="dialog" aria-labelledby="bulk UpdateUg" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">BULK UPDATE COURSES</h5>
                                            <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="bulkUpdateFormUg">
                                       
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group ">
                                                        <label for="semUg"><b>Semester</b></label>
                                                        <select class="form-control" id="semUg" name="sem" placeholder="Semester" value="" required>
                                                          <?php
                                                            $i = 1;
                                                            for ($i = 1; $i <= 8; $i++) {
                                                            echo '<option value="';
                                                            echo $i;
                                                            echo '"';
                                                            echo ">";
                                                            echo $i;
                                                            echo '</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group ">
                                                        <label for="yearUg"><b>Year</b></label>
                                                        <select class="form-control"  id="yearUg" name="year" placeholder="Year" value="" required>
                                                        <?php 
                                                            $year1=$row_yr['academic_year'];
                                                            $year2=$row_yr['academic_year'];
                                                             for ($i = 0; $i < 2; $i++) {
                                                                $temp = explode('-', $year1)[0];
                                                                $temp += 1;
                                                                $temp2 = "" . ($temp + 1);
                                                                $year1 = $temp . "-" . substr($temp2, 2);
                                                                $year1_value=$temp;
                                                                echo '<option>' . $year1_value . '</option>';
                                                                }
                                                                for ($i = 0; $i < 4; $i++) {
                                                                if ($year == $year1) {
                                                                    $year_dropdown .= "<option selected>" . $year1_value . "</option>";
                                                                }
                                                                $temp = explode('-', $year2)[0];
                                                                $year2_value = $temp;
                                                                $temp -= 1;
                                                                $temp2 = "" . ($temp + 1);
                                                                $year2 = $temp . "-" . substr($temp2, 2);
                                                                echo '<option>' . $year2_value . '</option>';
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group ">
                                                        <label for="dept_idUg"><b>Department</b></label>
                                                        <select   class="form-control" id="dept_idUg" name="dept_id" placeholder="Dept_id" value="" required>
                                                            <?php
                                                             while ($row = mysqli_fetch_assoc($dept_result)) {
                                                                if($row['dept_id']== $dept_id)
                                                                {
                                                                    echo '<option selected value="'.$row['dept_id'].'">' . $row['dept_name'] . '</option>';
                                                                }
                                                            else{
                                                                echo '<option  value="'.$row['dept_id'].'">' . $row['dept_name'] . '</option>';
                                                            }
                                                            
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <br />
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal" name="close">Close</button>
                                                <button type="submit" id="updatebtnUg" class="btn btn-primary" name="filter">Update</button>
                                            </div>
                                        </form>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- BULK UPDATE UG FORM -->
                        <br>
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col text-right" id="delete_selected_Ug_div">
                                    <button type="button" class="btn btn-danger" id="delete_selected_Ug_btn" name="delete_selected_Ug">
                                        <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Student(s)
                                    </button>
                                </div>
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                    <br>
                    <table class="table table-bordered table-responsive" id="dataTable-studentUg" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="select_allUg">
                                        <label class="custom-control-label" for="select_allUg"></label>
                                    </div>
                                </th>
                                <th>Email Id</th>
                                <th>Roll No.</th>
                                <th>Full Name</th>
                                <th>Department</th>
                                <th>Year of Admission</th>
                                <th>Semester</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Email Id</th>
                                <th>Roll No.</th>
                                <th>Full Name</th>
                                <th>Department</th>
                                <th>Year of Admission</th>
                                <th>Semester</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table> 
                </div>
                <!-- UG ends -->  
                <!--PG-->
                <div class="tab-pane fade " id="nav-Pg" role="tabpanel" aria-labelledby="nav-Pg-tab">
                    <br>
                    <div class="card-header py-3">
                        <div class="row align-items-center">
                            <div class="col text-right" id="delete_selected_Pg_div">
                                <button type="button" class="btn btn-danger" id="delete_selected_Pg_btn" name="delete_selected_Pg">
                                    <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Course(s)
                                </button>
=======
                    <!-- UG ends -->
                    <!--PG-->
                    <div class="tab-pane fade " id="nav-Pg" role="tabpanel" aria-labelledby="nav-Pg-tab">
                    <!-- BULK UPDATE PG FORM -->
                    <div class="modal fade" id="bulkUpdateModalPg" tabindex="-1" role="dialog" aria-labelledby="bulk UpdatePg" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">BULK UPDATE COURSES</h5>
                                            <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="bulkUpdateFormPg">
                                       
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group ">
                                                        <label for="semPg"><b>Semester</b></label>
                                                        <select class="form-control" id="semPg" name="sem" placeholder="Semester" value="" required>
                                                          <?php
                                                            $i = 1;
                                                            for ($i = 1; $i <= 8; $i++) {
                                                            echo '<option value="';
                                                            echo $i;
                                                            echo '"';
                                                            echo ">";
                                                            echo $i;
                                                            echo '</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group ">
                                                        <label for="yearPg"><b>Year</b></label>
                                                        <select class="form-control"  id="yearPg" name="year" placeholder="Year" value="" required>
                                                        <?php 
                                                            $year1=$row_yr['academic_year'];
                                                            $year2=$row_yr['academic_year'];
                                                             for ($i = 0; $i < 2; $i++) {
                                                                $temp = explode('-', $year1)[0];
                                                                $temp += 1;
                                                                $temp2 = "" . ($temp + 1);
                                                                $year1 = $temp . "-" . substr($temp2, 2);
                                                                $year1_value=$temp;
                                                                echo '<option>' . $year1_value . '</option>';
                                                                }
                                                                for ($i = 0; $i < 4; $i++) {
                                                                if ($year == $year1) {
                                                                    $year_dropdown .= "<option selected>" . $year1_value . "</option>";
                                                                }
                                                                $temp = explode('-', $year2)[0];
                                                                $year2_value = $temp;
                                                                $temp -= 1;
                                                                $temp2 = "" . ($temp + 1);
                                                                $year2 = $temp . "-" . substr($temp2, 2);
                                                                echo '<option>' . $year2_value . '</option>';
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group ">
                                                        <label for="dept_idPg"><b>Department</b></label>
                                                        <select   class="form-control" id="dept_idPg" name="dept_id" placeholder="Dept_id" value="" required>
                                                            <?php
                                                             while ($row = mysqli_fetch_assoc($dept_result1)) {
                                                                if($row['dept_id']== $dept_id)
                                                                {
                                                                    echo '<option selected value="'.$row['dept_id'].'">' . $row['dept_name'] . '</option>';
                                                                }
                                                            else{
                                                                echo '<option  value="'.$row['dept_id'].'">' . $row['dept_name'] . '</option>';
                                                            }
                                                            
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <br />
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal" name="close">Close</button>
                                                <button type="submit" id="updatebtnPg" class="btn btn-primary" name="filter">Update</button>
                                            </div>
                                        </form>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- BULK UPDATE PG FORM -->
                        <br>
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col text-right" id="delete_selected_Pg_div">
                                    <button type="button" class="btn btn-danger" id="delete_selected_Pg_btn" name="delete_selected_Pg">
                                        <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Course(s)
                                    </button>
                                </div>
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                    <br>
                    <table class="table table-bordered table-responsive" id="dataTable-studentPg" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="select_allPg">
                                        <label class="custom-control-label" for="select_allPg"></label>
                                    </div>
                                </th>
                                <th>Email Id</th>
                                <th>Roll No.</th>
                                <th>Full Name</th>
                                <th>Department</th>
                                <th>Year of Admission</th>
                                <th>Semester</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Email Id</th>
                                <th>Roll No.</th>
                                <th>Full Name</th>
                                <th>Department</th>
                                <th>Year of Admission</th>
                                <th>Semester</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table> 
                </div>
                <!-- PG ends --> 
                <!-- PHD -->
                <div class="tab-pane fade " id="nav-Phd" role="tabpanel" aria-labelledby="nav-Phd-tab">
                    
                    <div class="card-header py-3">
                        <div class="row align-items-center">
                            <div class="col text-right" id="delete_selected_Phd_div">
                                <button type="button" class="btn btn-danger" id="delete_selected_Phd_btn" name="delete_selected_Phd">
                                    <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Course(s)
                                </button>
=======
                    <!-- PG ends -->
                    <!-- PHD -->
                    <div class="tab-pane fade " id="nav-Phd" role="tabpanel" aria-labelledby="nav-Phd-tab">
  <!-- BULK UPDATE PHD FORM -->
  <div class="modal fade" id="bulkUpdateModalPhd" tabindex="-1" role="dialog" aria-labelledby="bulk UpdatePhd" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">BULK UPDATE COURSES</h5>
                                            <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="bulkUpdateFormPhd">
                                       
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group ">
                                                        <label for="semPhd"><b>Semester</b></label>
                                                        <select class="form-control" id="semPhd" name="sem" placeholder="Semester" value="" required>
                                                          <?php
                                                            $i = 1;
                                                            for ($i = 1; $i <= 8; $i++) {
                                                            echo '<option value="';
                                                            echo $i;
                                                            echo '"';
                                                            echo ">";
                                                            echo $i;
                                                            echo '</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group ">
                                                        <label for="yearPhd"><b>Year</b></label>
                                                        <select class="form-control"  id="yearPhd" name="year" placeholder="Year" value="" required>
                                                        <?php
                                                            $year1=$row_yr['academic_year'];
                                                            $year2=$row_yr['academic_year']; 
                                                             for ($i = 0; $i < 2; $i++) {
                                                                $temp = explode('-', $year1)[0];
                                                                $temp += 1;
                                                                $temp2 = "" . ($temp + 1);
                                                                $year1 = $temp . "-" . substr($temp2, 2);
                                                                $year1_value=$temp;
                                                                echo '<option>' . $year1_value . '</option>';
                                                                }
                                                                for ($i = 0; $i < 4; $i++) {
                                                                if ($year == $year1) {
                                                                    $year_dropdown .= "<option selected>" . $year1_value . "</option>";
                                                                }
                                                                $temp = explode('-', $year2)[0];
                                                                $year2_value = $temp;
                                                                $temp -= 1;
                                                                $temp2 = "" . ($temp + 1);
                                                                $year2 = $temp . "-" . substr($temp2, 2);
                                                                echo '<option>' . $year2_value . '</option>';
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group ">
                                                        <label for="dept_idPhd"><b>Department</b></label>
                                                        <select   class="form-control" id="dept_idPhd" name="dept_id" placeholder="Dept_id" value="" required>
                                                            <?php
                                                             while ($row = mysqli_fetch_assoc($dept_result2)) {
                                                                if($row['dept_id']== $dept_id)
                                                                {
                                                                    echo '<option selected value="'.$row['dept_id'].'">' . $row['dept_name'] . '</option>';
                                                                }
                                                            else{
                                                                echo '<option  value="'.$row['dept_id'].'">' . $row['dept_name'] . '</option>';
                                                            }
                                                            
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <br />
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal" name="close">Close</button>
                                                <button type="submit" id="updatebtnPhd" class="btn btn-primary" name="filter">Update</button>
                                            </div>
                                        </form>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
    <!-- BULK UPDATE PHD FORM -->
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <div class="col text-right" id="delete_selected_Phd_div">
                                    <button type="button" class="btn btn-danger" id="delete_selected_Phd_btn" name="delete_selected_Phd">
                                        <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Course(s)
                                    </button>
                                </div>
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered table-responsive" id="dataTable-studentPhd" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="select_allPhd">
                                        <label class="custom-control-label" for="select_allPhd"></label>
                                    </div>
                                </th>
                                <th>Email Id</th>
                                <th>Roll No.</th>
                                <th>Full Name</th>
                                <th>Department</th>
                                <th>Year of Admission</th>
                                <th>Semester</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Email Id</th>
                                <th>Roll No.</th>
                                <th>Full Name</th>
                                <th>Department</th>
                                <th>Year of Admission</th>
                                <th>Semester</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table> 
                </div>
                <!-- PHD ends -->
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script type="text/javascript">
    var activeTab = "Ug";
    console.log(activeTab);
    $(document).ready(function() {
        loadUg();
        $('#uploadstudent').on('hidden.bs.modal', function(e) {
            document.querySelector("#bulkUploadstudent").reset();
            $("#upload_student").text("Upload")
            $("#upload_student").attr("disabled", false);
        });
    });

    function getFilters() {
        const filters = $("#filter_student_form").serializeArray();
        let normalizedFilters = {};
        for (filter of filters) {
            switch (filter.name) {
                case "filter_start_year":
                    if (filter.value != "") {
                        normalizedFilters.start_year = filter.value
                    }
                    break;
                case "filter_end_year":
                    if (filter.value != "") {
                        normalizedFilters.end_year = filter.value
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

        return normalizedFilters
    }

    $("#filter_student_form").submit(function(e) {
        e.preventDefault();
        $(`#dataTable-student${activeTab}`).DataTable().ajax.reload(false);
        $("#exampleModalCenter1").modal("hide")
    })

    $("#clear-filters").click(function(e) {
        $('#filter_student_form').trigger('reset');
        $(`#dataTable-student${activeTab}`).DataTable().ajax.reload(false);
    });

    function clearFilters() {
        $('#filter_courses_form').trigger('reset');
    }


<<<<<<< HEAD
    $('#nav-tab').on("click", "a", function(event) {
        activeTab = $(this).attr('id').split('-')[1];
        console.log(activeTab);
        console.log("fhhhhhhhhhhhhhh");
        clearFilters();
        if (activeTab == 'Ug') {
            loadUg()
        } else if (activeTab == 'Pg') {
            loadPg();
        } else if (activeTab == 'Phd') {
            loadPhd();
        }
    });
//********** UG SECTION**************

    function loadUg() {
        // document.querySelector("#addCoursebtn").style.display="none"
        $('#dataTable-studentUg').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            dom: '<"d-flex justify-content-between"fBl>tip',
            buttons: [{
                extend: 'excel',
                title: "student-data",
                text: '<span> <i class="fas fa-download "></i> CSV</span>',
                className: "btn btn-outline-primary  ",
                action: newExportAction,
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6]
                },
            }, {
                extend: "pdfHtml5",
                title: "student-data",
                text: '<span> <i class="fas fa-download "></i> PDF</span>',
                className: "btn btn-outline-primary  mx-2",
                action: newExportAction,
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6]
                },
            }],
            ajax: {
                'url': 'adduser/loadInfo/add_student_ug.php',
                "data": function(d) {
                    d.filters = getFilters();
                    return d
                }
            },
            fnDrawCallback: function() {
                console.log("hii")
                $(".action-btn").on('click', loadModalUg)
                $(".selectrow").attr("disabled", true);
                $("th").removeClass('selectbox');
                $(".selectbox").click(function(e) {
                    var row = $(this).closest('tr')
                    var checkbox = $(this).find('input');
                    console.log(checkbox);
                    checkbox.attr("checked", !checkbox.attr("checked"));
                    row.toggleClass('selected table-secondary')
                    if ($("#dataTable-student tbody tr.selected").length != $("#dataTable-studentUg tbody tr").length) {
                        $("#select_allUg").prop("checked", true)
                        $("#select_allUg").prop("checked", false)
                    } else {
                        $("#select_allUg").prop("checked", false)
                        $("#select_allUg").prop("checked", true)
=======
        function loadUg() {
            // document.querySelector("#addCoursebtn").style.display="none"
            $('#dataTable-studentUg').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                serverMethod: 'post',
                aaSorting: [],
                dom: "<'d-flex justify-content-between'f<'#bulkUpdate'>Bl>tip",
                buttons: [{
                    extend: 'excel',
                    title: "student-data",
                    text: '<span> <i class="fas fa-download "></i> EXCEL</span>',
                    className: "btn btn-outline-primary  ",
                    action: newExportAction,
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6]
                    },
                }, {
                    extend: "pdfHtml5",
                    title: "student-data",
                    text: '<span> <i class="fas fa-download "></i> PDF</span>',
                    className: "btn btn-outline-primary  mx-2",
                    action: newExportAction,
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6]
                    },
                }, {
                    text: "BULK UPDATE",
                    container: "#bulkUpdate",
                    className: "btn btn-outline-primary bulkUpdate"
                }],
                ajax: {
                    'url': 'adduser/loadInfo/add_student_ug.php',
                    "data": function(d) {
                        d.filters = getFilters();
                        return d
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
                    }
                })
            },
            columns: [{
                    data: 'select-cbox'
                },
<<<<<<< HEAD
                {
                    data: 'email_id'
                },
                {
                    data: 'rollno'
                },
                {
                    data: 'name'
                },
                {
                    data: 'dept_name'
                },
                {
                    data: 'year_of_admission'
                },
                {
                    data: 'current_sem'
                },
                {
                    data: 'action'
                },
            ],
            columnDefs: [{
                    targets: [0, 7], // column index (start from 0)
                    orderable: false, // set orderable false for selected columns
                },
                {
                    className: "selectbox",
                    targets: [0]
                },
                {
                    className: "email_id",
                    "targets": [1]
=======
                fnDrawCallback: function() {
                    console.log("hii")
                    $(".action-btn").on('click', loadModalUg)
                    $(".selectrow").attr("disabled", true);
                    $("th").removeClass('selectbox');
                    $(".selectbox").click(function(e) {
                        var row = $(this).closest('tr')
                        var checkbox = $(this).find('input');
                        console.log(checkbox);
                        checkbox.attr("checked", !checkbox.attr("checked"));
                        row.toggleClass('selected table-secondary')
                        if ($("#dataTable-studentUg tbody tr.selected").length != $("#dataTable-studentUg tbody tr").length) {
                            $("#select_allUg").prop("checked", true)
                            $("#select_allUg").prop("checked", false)
                        } else {
                            $("#select_allUg").prop("checked", false)
                            $("#select_allUg").prop("checked", true)
                        }
                    })
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
                },

<<<<<<< HEAD
            ],
        });
    }
=======
                ],
            });
            $('.bulkUpdate').detach().appendTo('#bulkUpdate')
        }
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156

    $("#select_allUg").click(function(e) {
        //   var row=$(this).closest('tr')
        if ($(this).is(":checked")) {
            $("#dataTable-studentUg tbody tr").addClass("selected table-secondary");
            $(".selectrow").attr("checked", true);
        } else {
            $(".selectrow").attr("checked", false);
            $("#dataTable-studentUg tbody tr").removeClass("selected table-secondary");
        }
        //   row.toggleClass('selected table-secondary')
    })

<<<<<<< HEAD
    $("#delete_selected_Ug_btn").click(function(e) {
        alert("You have selected " + $("#dataTable-studentUg tbody tr.selected").length + " record(s) for deletion");
        var delete_rows = $("#dataTable-studentUg").DataTable().rows('.selected').data()
        var delete_data = {}
        for (var i = 0; i < delete_rows.length; i++) {
            baseData = {}
            baseData['email_id'] = delete_rows[i].email_id
            baseData['rollno'] = delete_rows[i].rollno
            delete_data[i] = baseData
            // console.log(baseData);
        }
        var actual_data = {}
        actual_data['type'] = 'student'
        actual_data['delete_data'] = delete_data
        actual_delete_data_json = JSON.stringify(actual_data)
        console.log(actual_delete_data_json)
        $.ajax({
            type: "POST",
            url: "ic_queries/multioperation_queries/delete_multiple_student.php",
            data: actual_delete_data_json,
            success: function(data) {
                // console.log(data)
                $("#dataTable-studentUg").DataTable().draw(false);
=======
        $("#bulkUpdateFormUg").submit(function(e) {
        // console.log("a")
        e.preventDefault();
        var update_rows = $("#dataTable-studentUg").DataTable().rows('.selected').data();
        // console.log(update_rows[0].email_id);
        var update_data = {};
        for (var i = 0; i < update_rows.length; i++) {
            baseData = {}
                baseData['email_id'] = update_rows[i].email_id
                // baseData['rollno'] = delete_rows[i].rollno
                update_data[i] = baseData
            // update_data.push($(update_rows[i].email_id).text());
        }
        console.log(update_data);
        var formData = $(this).serializeArray();
        var actual_data = {}
        actual_data['type'] = 'student'
        actual_data['update_data'] = update_data;
        for (data of formData) {
            actual_data[data.name] = data.value;
        }
        actual_update_data_json = JSON.stringify(actual_data);
        console.log(actual_update_data_json)
        $.ajax({
            type: "POST",
            url: "ic_queries/multioperation_queries/update_multiple_student.php",
            data: actual_update_data_json,
            success: function(data) {
                $("#updatebtnUg").text("Updated Successfully");
                // console.log(data)
                $("#dataTable-studentUg").DataTable().draw(false);
            }
        })
    });

    $("body").on("click", ".bulkUpdate", function() {
        var update_rows = $("#dataTable-studentUg").DataTable().rows('.selected').data();
        if (update_rows.length > 0) {
            $("#updatebtnUg").text("Update");
            $("#bulkUpdateModalUg").modal('show');
        } else {
            alert("select some rows");
        }
    })

        $("#delete_selected_Ug_btn").click(function(e) {
            alert("You have selected " + $("#dataTable-studentUg tbody tr.selected").length + " record(s) for deletion");
            var delete_rows = $("#dataTable-studentUg").DataTable().rows('.selected').data()
            var delete_data = {}
            for (var i = 0; i < delete_rows.length; i++) {
                baseData = {}
                baseData['email_id'] = delete_rows[i].email_id
                baseData['rollno'] = delete_rows[i].rollno
                delete_data[i] = baseData
                // console.log(baseData);
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
            }
        })
<<<<<<< HEAD
    })
 
    function loadModalUg() {
        var target_row = $(this).closest("tr"); // this line did the trick
        console.log(target_row)
        var aPos = $("#dataTable-studentUg").dataTable().fnGetPosition(target_row.get(0));
        var courseData = $('#dataTable-studentUg').DataTable().row(aPos).data()
        var json_courseData = JSON.stringify(courseData)
        // console.log(json_courseData)
        $.ajax({
            type: "POST",
            url: "adduser/loadModal/student_modal.php",
            // data: form_serialize, 
            // dataType: "json",
            data: json_courseData,
            success: function(output) {
                // $("#"+x).text("Deleted Successfully");
                target_row.append(output);
                $('#update-del-modal').modal('show')
                $(document).on('hidden.bs.modal', '#update-del-modal', function() {
                    $("#update-del-modal").remove();
                });
                $('#delete_student').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var form_serialize = form.serializeArray(); // serializes the form's elements.
                    form_serialize.push({
                        name: $("#delete_student_btn").attr('name'),
                        value: $("#delete_student_btn").attr('value')
=======

        function loadModalUg() {
            var target_row = $(this).closest("tr"); // this line did the trick
            console.log(target_row)
            var aPos = $("#dataTable-studentUg").dataTable().fnGetPosition(target_row.get(0));
            var courseData = $('#dataTable-studentUg').DataTable().row(aPos).data()
            var json_courseData = JSON.stringify(courseData)
            // console.log(json_courseData)
            $.ajax({
                type: "POST",
                url: "adduser/loadModal/student_modal.php",
                // data: form_serialize, 
                // dataType: "json",
                data: json_courseData,
                success: function(output) {
                    // $("#"+x).text("Deleted Successfully");
                    target_row.append(output);
                    $('#update-del-modal').modal('show')
                    $(document).on('hidden.bs.modal', '#update-del-modal', function() {
                        $("#update-del-modal").remove();
                    });
                    $('#delete_student').submit(function(e) {
                        e.preventDefault();
                        var form = $(this);
                        var form_serialize = form.serializeArray(); // serializes the form's elements.
                        form_serialize.push({
                            name: $("#delete_student_btn").attr('name'),
                            value: $("#delete_student_btn").attr('value')
                        });
                        $("#delete_student_btn").text("Deleting...");
                        $("#delete_student_btn").attr("disabled", true);
                        $.ajax({
                            type: "POST",
                            url: "ic_queries/addstudent_queries.php",
                            data: form_serialize,
                            success: function(data) {
                                //    alert(data); // show response from the php script.
                                $("#delete_student_btn").text("Deleted Successfully");
                                var row = $("#update-del-modal").closest('tr');
                                var aPos = $("#dataTable-studentUg").dataTable().fnGetPosition(row.get(0));
                                $('#update-del-modal').modal('hide');
                                $('body').removeClass('modal-open');
                                $('.modal-backdrop').remove();
                                // row.remove();
                                $("#dataTable-studentUg").DataTable().row(aPos).remove().draw(false);
                                // console.log(aPos);
                                // console.log(row)
                            }
                        });
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
                    });
                    $("#delete_student_btn").text("Deleting...");
                    $("#delete_student_btn").attr("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: "ic_queries/addstudent_queries.php",
                        data: form_serialize,
                        success: function(data) {
                            //    alert(data); // show response from the php script.
                            $("#delete_student_btn").text("Deleted Successfully");
                            var row = $("#update-del-modal").closest('tr');
                            var aPos = $("#dataTable-student").dataTable().fnGetPosition(row.get(0));
                            $('#update-del-modal').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            // row.remove();
                            $("#dataTable-student").DataTable().row(aPos).remove().draw(false);
                            // console.log(aPos);
                            // console.log(row)
                        }
                    });
                });
                $('#update_student').submit(function(e) {
                    update_student_ug(e);
                    // $('#update-del-modal').modal('hide');
                });
            }
        });
    }


    function update_student_ug(e) {
        e.preventDefault();
        var form = $('#update_student');
        var form_serialize = form.serializeArray(); // serializes the form's elements.
        // console.log(form_serialize)
        form_serialize.push({
            name: $("#update_student_btn").attr('name'),
            value: $("#update_student_btn").attr('value')
        });
        $("#update_student_btn").text("Updating...");
        $("#update_student_btn").attr("disabled", true);
        $.ajax({
            type: "POST",
            url: "ic_queries/addstudent_queries.php",
            data: form_serialize,
            success: function(data) {
                //    alert(data); // show response from the php script.
                // console.log(data)
                if (data === "Exists_email_id") {
                    $('#error_email_id').text('*This data already exists');
                    $("#update_student_btn").text("Update");
                    $("#update_student_btn").attr("disabled", false);
                } else if (data === "Exists_rollno") {
                    $('#error_rollno').text('*This data already exists');
                    $("#update_student_btn").text("Update");
                    $("#update_student_btn").attr("disabled", false);
                } else {
                    $("#update_student_btn").text("Updated Successfully");
                    var row = $("#update-del-modal").closest('tr');
                    var aPos = $("#dataTable-studentUg").dataTable().fnGetPosition(row.get(0));
                    var temp = $("#dataTable-studentUg").DataTable().row(aPos).data();
                    // console.log(temp)
                    // console.log(form_serialize)
                    temp['fname'] = form_serialize[0].value; //new values
                    temp['mname'] = form_serialize[1].value; //new values
                    temp['lname'] = form_serialize[2].value; //new values
                    temp['email_id'] = form_serialize[3].value;
                    temp['rollno'] = form_serialize[5].value;
                    temp['year_of_admission'] = form_serialize[7].value;
                    temp['dept_name'] = id_to_name_convertor_dept(form_serialize[9].value);
                    temp['current_sem'] = form_serialize[10].value;
                    // console.log(temp)
                    $('#dataTable-studentUg').dataTable().fnUpdate(temp, aPos, undefined, false);
                    $('.action-btn').off('click')
                    $('.action-btn').on('click', loadModalUg)
                    // $("#dataTable-student").DataTable().row(aPos).draw(false);
                    $(".selectrow_student").attr("disabled", true);
                    $('#error_email_id').remove();
                    $('#error_rollno').remove();
                }
            }
        });
    }

    $("#dataTable-studentUg").on('click', 'td.email_id', function() {
        var tr = $(this).closest('tr');
        var row = $("#dataTable-studentUg").DataTable().row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown table-warning');
        } else {
            // Open this row
            var data = {}
            data['email_id'] = row.data()['email_id'];
            data['type'] = 'student'
            data_json = JSON.stringify(data)
            console.log(data_json)
            $.ajax({
                type: "POST",
                url: "loadAdditionalInfo/additional_info_student.php",
                data: data_json,
                success: function(response) {
                    row.child(response).show();
                    tr.addClass('shown table-warning');
                }
            });
            // row.child("<b>Hello</b>").show();
        }
    })
 
// ********** UG SECTION COMPLETES***************


<<<<<<< HEAD
//********** PG SECTION**************

function loadPg() {
    // document.querySelector("#addCoursebtn").style.display="none"
    $('#dataTable-studentPg').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        serverMethod: 'post',
        aaSorting: [],
        dom: '<"d-flex justify-content-between"fBl>tip',
        buttons: [{
            extend: 'excel',
            title: "student-data",
            text: '<span> <i class="fas fa-download "></i> CSV</span>',
            className: "btn btn-outline-primary  ",
            action: newExportAction,
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6]
            },
        }, {
            extend: "pdfHtml5",
            title: "student-data",
            text: '<span> <i class="fas fa-download "></i> PDF</span>',
            className: "btn btn-outline-primary  mx-2",
            action: newExportAction,
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6]
            },
        }],
        ajax: {
            'url': 'adduser/loadInfo/add_student_pg.php',
            "data": function(d) {
                d.filters = getFilters();
                return d
            }
        },
        fnDrawCallback: function() {
            console.log("hii")
            $(".action-btn").on('click', loadModalPg)
=======
        //********** PG SECTION**************

        
        function loadPg() {
    // document.querySelector("#addCoursebtn").style.display="none"
    $('#dataTable-studentPg').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        serverMethod: 'post',
        aaSorting: [],
        dom: "<'d-flex justify-content-between'f<'#bulkUpdatePg'>Bl>tip",
        buttons: [{
            extend: 'excel',
            title: "student-data",
            text: '<span> <i class="fas fa-download "></i> EXCEL</span>',
            className: "btn btn-outline-primary  ",
            action: newExportAction,
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6]
            },
        }, {
            extend: "pdfHtml5",
            title: "student-data",
            text: '<span> <i class="fas fa-download "></i> PDF</span>',
            className: "btn btn-outline-primary  mx-2",
            action: newExportAction,
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6]
            },
        }, {
            text: "BULK UPDATE",
            container: "#bulkUpdatePg",
            className: "btn btn-outline-primary bulkUpdatePg"
        }],
        ajax: {
            'url': 'adduser/loadInfo/add_student_pg.php',
            "data": function(d) {
                d.filters = getFilters();
                return d
            }
        },
        fnDrawCallback: function() {
            console.log("hii")
            $(".action-btn").on('click', loadModalPg)
            $(".selectrow").attr("disabled", true);
            $("th").removeClass('selectbox');
            $(".selectbox").click(function(e) {
                var row = $(this).closest('tr')
                var checkbox = $(this).find('input');
                console.log(checkbox);
                checkbox.attr("checked", !checkbox.attr("checked"));
                row.toggleClass('selected table-secondary')
                if ($("#dataTable-studentPg tbody tr.selected").length != $("#dataTable-studentPg tbody tr").length) {
                    $("#select_allPg").prop("checked", true)
                    $("#select_allPg").prop("checked", false)
                } else {
                    $("#select_allPg").prop("checked", false)
                    $("#select_allPg").prop("checked", true)
                }
            })
        },
        columns: [{
                data: 'select-cbox'
            },
            {
                data: 'email_id'
            },
            {
                data: 'rollno'
            },
            {
                data: 'name'
            },
            {
                data: 'dept_name'
            },
            {
                data: 'year_of_admission'
            },
            {
                data: 'current_sem'
            },
            {
                data: 'action'
            },
        ],
        columnDefs: [{
                targets: [0, 7], // column index (start from 0)
                orderable: false, // set orderable false for selected columns
            },
            {
                className: "selectbox",
                targets: [0]
            },
            {
                className: "email_id",
                "targets": [1]
            },

        ],
    });
    $('.bulkUpdatePg').detach().appendTo('#bulkUpdatePg')
}

$("#select_allPg").click(function(e) {
    //   var row=$(this).closest('tr')
    if ($(this).is(":checked")) {
        $("#dataTable-studentPg tbody tr").addClass("selected table-secondary");
        $(".selectrow").attr("checked", true);
    } else {
        $(".selectrow").attr("checked", false);
        $("#dataTable-studentPg tbody tr").removeClass("selected table-secondary");
    }
    //   row.toggleClass('selected table-secondary')
})

$("#bulkUpdateFormPg").submit(function(e) {
// console.log("a")
e.preventDefault();
var update_rows = $("#dataTable-studentPg").DataTable().rows('.selected').data();
// console.log(update_rows[0].email_id);
var update_data = {};
for (var i = 0; i < update_rows.length; i++) {
    baseData = {}
        baseData['email_id'] = update_rows[i].email_id
        // baseData['rollno'] = delete_rows[i].rollno
        update_data[i] = baseData
    // update_data.push($(update_rows[i].email_id).text());
}
console.log(update_data);
var formData = $(this).serializeArray();
var actual_data = {}
actual_data['type'] = 'student'
actual_data['update_data'] = update_data;
for (data of formData) {
    actual_data[data.name] = data.value;
}
actual_update_data_json = JSON.stringify(actual_data);
console.log(actual_update_data_json)
$.ajax({
    type: "POST",
    url: "ic_queries/multioperation_queries/update_multiple_student.php",
    data: actual_update_data_json,
    success: function(data) {
        $("#updatebtnPg").text("Updated Successfully");
        // console.log(data)
        $("#dataTable-studentPg").DataTable().draw(false);
    }
})
});

$("body").on("click", ".bulkUpdatePg", function() {
var update_rows = $("#dataTable-studentPg").DataTable().rows('.selected').data();
if (update_rows.length > 0) {
    $("#updatebtnUg").text("Update");
    $("#bulkUpdateModalPg").modal('show');
} else {
    alert("select some rows");
}
})

$("#delete_selected_Pg_btn").click(function(e) {
    alert("You have selected " + $("#dataTable-studentPg tbody tr.selected").length + " record(s) for deletion");
    var delete_rows = $("#dataTable-studentPg").DataTable().rows('.selected').data()
    var delete_data = {}
    for (var i = 0; i < delete_rows.length; i++) {
        baseData = {}
        baseData['email_id'] = delete_rows[i].email_id
        baseData['rollno'] = delete_rows[i].rollno
        delete_data[i] = baseData
        // console.log(baseData);
    }
    var actual_data = {}
    actual_data['type'] = 'student'
    actual_data['delete_data'] = delete_data
    actual_delete_data_json = JSON.stringify(actual_data)
    console.log(actual_delete_data_json)
    $.ajax({
        type: "POST",
        url: "ic_queries/multioperation_queries/delete_multiple_student.php",
        data: actual_delete_data_json,
        success: function(data) {
            // console.log(data)
            $("#dataTable-studentPg").DataTable().draw(false);
        }
    })
})

function loadModalPg() {
    var target_row = $(this).closest("tr"); // this line did the trick
    console.log(target_row)
    var aPos = $("#dataTable-studentPg").dataTable().fnGetPosition(target_row.get(0));
    var courseData = $('#dataTable-studentPg').DataTable().row(aPos).data()
    var json_courseData = JSON.stringify(courseData)
    // console.log(json_courseData)
    $.ajax({
        type: "POST",
        url: "adduser/loadModal/student_modal.php",
        // data: form_serialize, 
        // dataType: "json",
        data: json_courseData,
        success: function(output) {
            // $("#"+x).text("Deleted Successfully");
            target_row.append(output);
            $('#update-del-modal').modal('show')
            $(document).on('hidden.bs.modal', '#update-del-modal', function() {
                $("#update-del-modal").remove();
            });
            $('#delete_student').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var form_serialize = form.serializeArray(); // serializes the form's elements.
                form_serialize.push({
                    name: $("#delete_student_btn").attr('name'),
                    value: $("#delete_student_btn").attr('value')
                });
                $("#delete_student_btn").text("Deleting...");
                $("#delete_student_btn").attr("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "ic_queries/addstudent_queries.php",
                    data: form_serialize,
                    success: function(data) {
                        //    alert(data); // show response from the php script.
                        $("#delete_student_btn").text("Deleted Successfully");
                        var row = $("#update-del-modal").closest('tr');
                        var aPos = $("#dataTable-studentPg").dataTable().fnGetPosition(row.get(0));
                        $('#update-del-modal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        // row.remove();
                        $("#dataTable-studentPg").DataTable().row(aPos).remove().draw(false);
                        // console.log(aPos);
                        // console.log(row)
                    }
                });
            });
            $('#update_student').submit(function(e) {
                update_student_pg(e);
                // $('#update-del-modal').modal('hide');
            });
        }
    });
}


function update_student_pg(e) {
    e.preventDefault();
    var form = $('#update_student');
    var form_serialize = form.serializeArray(); // serializes the form's elements.
    // console.log(form_serialize)
    form_serialize.push({
        name: $("#update_student_btn").attr('name'),
        value: $("#update_student_btn").attr('value')
    });
    $("#update_student_btn").text("Updating...");
    $("#update_student_btn").attr("disabled", true);
    $.ajax({
        type: "POST",
        url: "ic_queries/addstudent_queries.php",
        data: form_serialize,
        success: function(data) {
            //    alert(data); // show response from the php script.
            // console.log(data)
            if (data === "Exists_email_id") {
                $('#error_email_id').text('*This data already exists');
                $("#update_student_btn").text("Update");
                $("#update_student_btn").attr("disabled", false);
            } else if (data === "Exists_rollno") {
                $('#error_rollno').text('*This data already exists');
                $("#update_student_btn").text("Update");
                $("#update_student_btn").attr("disabled", false);
            } else {
                $("#update_student_btn").text("Updated Successfully");
                var row = $("#update-del-modal").closest('tr');
                var aPos = $("#dataTable-studentPg").dataTable().fnGetPosition(row.get(0));
                var temp = $("#dataTable-studentPg").DataTable().row(aPos).data();
                // console.log(temp)
                // console.log(form_serialize)
                temp['fname'] = form_serialize[0].value; //new values
                temp['mname'] = form_serialize[1].value; //new values
                temp['lname'] = form_serialize[2].value; //new values
                temp['email_id'] = form_serialize[3].value;
                temp['rollno'] = form_serialize[5].value;
                temp['year_of_admission'] = form_serialize[7].value;
                temp['dept_name'] = id_to_name_convertor_dept(form_serialize[9].value);
                temp['current_sem'] = form_serialize[10].value;
                // console.log(temp)
                $('#dataTable-studentPg').dataTable().fnUpdate(temp, aPos, undefined, false);
                $('.action-btn').off('click')
                $('.action-btn').on('click', loadModalPg)
                // $("#dataTable-student").DataTable().row(aPos).draw(false);
                $(".selectrow_student").attr("disabled", true);
                $('#error_email_id').remove();
                $('#error_rollno').remove();
            }
        }
    });
}

$("#dataTable-studentPg").on('click', 'td.email_id', function() {
    var tr = $(this).closest('tr');
    var row = $("#dataTable-studentPg").DataTable().row(tr);

    if (row.child.isShown()) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown table-warning');
    } else {
        // Open this row
        var data = {}
        data['email_id'] = row.data()['email_id'];
        data['type'] = 'student'
        data_json = JSON.stringify(data)
        console.log(data_json)
        $.ajax({
            type: "POST",
            url: "loadAdditionalInfo/additional_info_student.php",
            data: data_json,
            success: function(response) {
                row.child(response).show();
                tr.addClass('shown table-warning');
            }
        });
        // row.child("<b>Hello</b>").show();
    }
})



        // ********** PG SECTION COMPLETES***************

        //********** PHD SECTION**************
        function loadPhd() {
    // document.querySelector("#addCoursebtn").style.display="none"
    $('#dataTable-studentPhd').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        serverMethod: 'post',
        aaSorting: [],
        dom: "<'d-flex justify-content-between'f<'#bulkUpdatePhd'>Bl>tip",
        buttons: [{
            extend: 'excel',
            title: "student-data",
            text: '<span> <i class="fas fa-download "></i> EXCEL</span>',
            className: "btn btn-outline-primary  ",
            action: newExportAction,
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6]
            },
        }, {
            extend: "pdfHtml5",
            title: "student-data",
            text: '<span> <i class="fas fa-download "></i> PDF</span>',
            className: "btn btn-outline-primary  mx-2",
            action: newExportAction,
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6]
            },
        }, {
            text: "BULK UPDATE",
            container: "#bulkUpdatePhd",
            className: "btn btn-outline-primary bulkUpdatePhd"
        }],
        ajax: {
            'url': 'adduser/loadInfo/add_student_phd.php',
            "data": function(d) {
                d.filters = getFilters();
                return d
            }
        },
        fnDrawCallback: function() {
            console.log("hii")
            $(".action-btn").on('click', loadModalPhd)
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
            $(".selectrow").attr("disabled", true);
            $("th").removeClass('selectbox');
            $(".selectbox").click(function(e) {
                var row = $(this).closest('tr')
                var checkbox = $(this).find('input');
                console.log(checkbox);
                checkbox.attr("checked", !checkbox.attr("checked"));
                row.toggleClass('selected table-secondary')
<<<<<<< HEAD
                if ($("#dataTable-student tbody tr.selected").length != $("#dataTable-studentPg tbody tr").length) {
                    $("#select_allPg").prop("checked", true)
                    $("#select_allPg").prop("checked", false)
                } else {
                    $("#select_allPg").prop("checked", false)
                    $("#select_allPg").prop("checked", true)
=======
                if ($("#dataTable-studentPhd tbody tr.selected").length != $("#dataTable-studentPhd tbody tr").length) {
                    $("#select_allPhd").prop("checked", true)
                    $("#select_allPhd").prop("checked", false)
                } else {
                    $("#select_allPhd").prop("checked", false)
                    $("#select_allPhd").prop("checked", true)
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
                }
            })
        },
        columns: [{
                data: 'select-cbox'
            },
            {
                data: 'email_id'
            },
            {
                data: 'rollno'
            },
            {
                data: 'name'
            },
            {
                data: 'dept_name'
            },
            {
                data: 'year_of_admission'
            },
            {
                data: 'current_sem'
            },
            {
                data: 'action'
            },
        ],
        columnDefs: [{
                targets: [0, 7], // column index (start from 0)
                orderable: false, // set orderable false for selected columns
            },
            {
                className: "selectbox",
                targets: [0]
            },
            {
                className: "email_id",
                "targets": [1]
            },

        ],
    });
<<<<<<< HEAD
}

$("#select_allPg").click(function(e) {
    //   var row=$(this).closest('tr')
    if ($(this).is(":checked")) {
        $("#dataTable-studentPg tbody tr").addClass("selected table-secondary");
        $(".selectrow").attr("checked", true);
    } else {
        $(".selectrow").attr("checked", false);
        $("#dataTable-studentPg tbody tr").removeClass("selected table-secondary");
    }
    //   row.toggleClass('selected table-secondary')
})

$("#delete_selected_Pg_btn").click(function(e) {
    alert("You have selected " + $("#dataTable-studentPg tbody tr.selected").length + " record(s) for deletion");
    var delete_rows = $("#dataTable-studentPg").DataTable().rows('.selected').data()
    var delete_data = {}
    for (var i = 0; i < delete_rows.length; i++) {
        baseData = {}
        baseData['email_id'] = delete_rows[i].email_id
        baseData['rollno'] = delete_rows[i].rollno
        delete_data[i] = baseData
        // console.log(baseData);
    }
    var actual_data = {}
    actual_data['type'] = 'student'
    actual_data['delete_data'] = delete_data
    actual_delete_data_json = JSON.stringify(actual_data)
    console.log(actual_delete_data_json)
    $.ajax({
        type: "POST",
        url: "ic_queries/multioperation_queries/delete_multiple_student.php",
        data: actual_delete_data_json,
        success: function(data) {
            // console.log(data)
            $("#dataTable-studentPg").DataTable().draw(false);
        }
    })
})

function loadModalPg() {
    var target_row = $(this).closest("tr"); // this line did the trick
    console.log(target_row)
    var aPos = $("#dataTable-studentPg").dataTable().fnGetPosition(target_row.get(0));
    var courseData = $('#dataTable-studentPg').DataTable().row(aPos).data()
    var json_courseData = JSON.stringify(courseData)
    // console.log(json_courseData)
    $.ajax({
        type: "POST",
        url: "adduser/loadModal/student_modal.php",
        // data: form_serialize, 
        // dataType: "json",
        data: json_courseData,
        success: function(output) {
            // $("#"+x).text("Deleted Successfully");
            target_row.append(output);
            $('#update-del-modal').modal('show')
            $(document).on('hidden.bs.modal', '#update-del-modal', function() {
                $("#update-del-modal").remove();
            });
            $('#delete_student').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var form_serialize = form.serializeArray(); // serializes the form's elements.
                form_serialize.push({
                    name: $("#delete_student_btn").attr('name'),
                    value: $("#delete_student_btn").attr('value')
                });
                $("#delete_student_btn").text("Deleting...");
                $("#delete_student_btn").attr("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "ic_queries/addstudent_queries.php",
                    data: form_serialize,
                    success: function(data) {
                        //    alert(data); // show response from the php script.
                        $("#delete_student_btn").text("Deleted Successfully");
                        var row = $("#update-del-modal").closest('tr');
                        var aPos = $("#dataTable-student").dataTable().fnGetPosition(row.get(0));
                        $('#update-del-modal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        // row.remove();
                        $("#dataTable-student").DataTable().row(aPos).remove().draw(false);
                        // console.log(aPos);
                        // console.log(row)
                    }
                });
            });
            $('#update_student').submit(function(e) {
                update_student_pg(e);
                // $('#update-del-modal').modal('hide');
            });
        }
    });
}


function update_student_pg(e) {
    e.preventDefault();
    var form = $('#update_student');
    var form_serialize = form.serializeArray(); // serializes the form's elements.
    // console.log(form_serialize)
    form_serialize.push({
        name: $("#update_student_btn").attr('name'),
        value: $("#update_student_btn").attr('value')
    });
    $("#update_student_btn").text("Updating...");
    $("#update_student_btn").attr("disabled", true);
    $.ajax({
        type: "POST",
        url: "ic_queries/addstudent_queries.php",
        data: form_serialize,
        success: function(data) {
            //    alert(data); // show response from the php script.
            // console.log(data)
            if (data === "Exists_email_id") {
                $('#error_email_id').text('*This data already exists');
                $("#update_student_btn").text("Update");
                $("#update_student_btn").attr("disabled", false);
            } else if (data === "Exists_rollno") {
                $('#error_rollno').text('*This data already exists');
                $("#update_student_btn").text("Update");
                $("#update_student_btn").attr("disabled", false);
            } else {
                $("#update_student_btn").text("Updated Successfully");
                var row = $("#update-del-modal").closest('tr');
                var aPos = $("#dataTable-studentPg").dataTable().fnGetPosition(row.get(0));
                var temp = $("#dataTable-studentPg").DataTable().row(aPos).data();
                // console.log(temp)
                // console.log(form_serialize)
                temp['fname'] = form_serialize[0].value; //new values
                temp['mname'] = form_serialize[1].value; //new values
                temp['lname'] = form_serialize[2].value; //new values
                temp['email_id'] = form_serialize[3].value;
                temp['rollno'] = form_serialize[5].value;
                temp['year_of_admission'] = form_serialize[7].value;
                temp['dept_name'] = id_to_name_convertor_dept(form_serialize[9].value);
                temp['current_sem'] = form_serialize[10].value;
                // console.log(temp)
                $('#dataTable-studentPg').dataTable().fnUpdate(temp, aPos, undefined, false);
                $('.action-btn').off('click')
                $('.action-btn').on('click', loadModalPg)
                // $("#dataTable-student").DataTable().row(aPos).draw(false);
                $(".selectrow_student").attr("disabled", true);
                $('#error_email_id').remove();
                $('#error_rollno').remove();
            }
        }
    });
}

$("#dataTable-studentPg").on('click', 'td.email_id', function() {
    var tr = $(this).closest('tr');
    var row = $("#dataTable-studentPg").DataTable().row(tr);

    if (row.child.isShown()) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown table-warning');
    } else {
        // Open this row
        var data = {}
        data['email_id'] = row.data()['email_id'];
        data['type'] = 'student'
        data_json = JSON.stringify(data)
        console.log(data_json)
        $.ajax({
            type: "POST",
            url: "loadAdditionalInfo/additional_info_student.php",
            data: data_json,
            success: function(response) {
                row.child(response).show();
                tr.addClass('shown table-warning');
            }
        });
        // row.child("<b>Hello</b>").show();
    }
})

// ********** PG SECTION COMPLETES***************

//********** PHD SECTION**************

function loadPhd() {
    // document.querySelector("#addCoursebtn").style.display="none"
    $('#dataTable-studentPhd').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        serverMethod: 'post',
        aaSorting: [],
        dom: '<"d-flex justify-content-between"fBl>tip',
        buttons: [{
            extend: 'excel',
            title: "student-data",
            text: '<span> <i class="fas fa-download "></i> CSV</span>',
            className: "btn btn-outline-primary  ",
            action: newExportAction,
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6]
            },
        }, {
            extend: "pdfHtml5",
            title: "student-data",
            text: '<span> <i class="fas fa-download "></i> PDF</span>',
            className: "btn btn-outline-primary  mx-2",
            action: newExportAction,
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6]
            },
        }],
        ajax: {
            'url': 'adduser/loadInfo/add_student_phd.php',
            "data": function(d) {
                d.filters = getFilters();
                return d
            }
        },
        fnDrawCallback: function() {
            console.log("hii")
            $(".action-btn").on('click', loadModalPhd)
            $(".selectrow").attr("disabled", true);
            $("th").removeClass('selectbox');
            $(".selectbox").click(function(e) {
                var row = $(this).closest('tr')
                var checkbox = $(this).find('input');
                console.log(checkbox);
                checkbox.attr("checked", !checkbox.attr("checked"));
                row.toggleClass('selected table-secondary')
                if ($("#dataTable-student tbody tr.selected").length != $("#dataTable-studentPhd tbody tr").length) {
                    $("#select_allPhd").prop("checked", true)
                    $("#select_allPhd").prop("checked", false)
                } else {
                    $("#select_allPhd").prop("checked", false)
                    $("#select_allPhd").prop("checked", true)
                }
            })
        },
        columns: [{
                data: 'select-cbox'
            },
            {
                data: 'email_id'
            },
            {
                data: 'rollno'
            },
            {
                data: 'name'
            },
            {
                data: 'dept_name'
            },
            {
                data: 'year_of_admission'
            },
            {
                data: 'current_sem'
            },
            {
                data: 'action'
            },
        ],
        columnDefs: [{
                targets: [0, 7], // column index (start from 0)
                orderable: false, // set orderable false for selected columns
            },
            {
                className: "selectbox",
                targets: [0]
            },
            {
                className: "email_id",
                "targets": [1]
            },

        ],
    });
}

$("#select_allPhd").click(function(e) {
    //   var row=$(this).closest('tr')
    if ($(this).is(":checked")) {
        $("#dataTable-studentPhd tbody tr").addClass("selected table-secondary");
        $(".selectrow").attr("checked", true);
    } else {
        $(".selectrow").attr("checked", false);
        $("#dataTable-studentPhd tbody tr").removeClass("selected table-secondary");
    }
    //   row.toggleClass('selected table-secondary')
})

$("#delete_selected_Phd_btn").click(function(e) {
    alert("You have selected " + $("#dataTable-studentPhd tbody tr.selected").length + " record(s) for deletion");
    var delete_rows = $("#dataTable-studentPhd").DataTable().rows('.selected').data()
    var delete_data = {}
    for (var i = 0; i < delete_rows.length; i++) {
        baseData = {}
        baseData['email_id'] = delete_rows[i].email_id
        baseData['rollno'] = delete_rows[i].rollno
        delete_data[i] = baseData
        // console.log(baseData);
    }
    var actual_data = {}
    actual_data['type'] = 'student'
    actual_data['delete_data'] = delete_data
    actual_delete_data_json = JSON.stringify(actual_data)
    console.log(actual_delete_data_json)
    $.ajax({
        type: "POST",
        url: "ic_queries/multioperation_queries/delete_multiple_student.php",
        data: actual_delete_data_json,
        success: function(data) {
            // console.log(data)
            $("#dataTable-studentPhd").DataTable().draw(false);
        }
    })
})

=======
    $('.bulkUpdatePhd').detach().appendTo('#bulkUpdatePhd')
}

$("#select_allPhd").click(function(e) {
    //   var row=$(this).closest('tr')
    if ($(this).is(":checked")) {
        $("#dataTable-studentPhd tbody tr").addClass("selected table-secondary");
        $(".selectrow").attr("checked", true);
    } else {
        $(".selectrow").attr("checked", false);
        $("#dataTable-studentPhd tbody tr").removeClass("selected table-secondary");
    }
    //   row.toggleClass('selected table-secondary')
})

$("#bulkUpdateFormPhd").submit(function(e) {

// console.log("a")
e.preventDefault();
var update_rows = $("#dataTable-studentPhd").DataTable().rows('.selected').data();
// console.log(update_rows[0].email_id);
var update_data = {};
for (var i = 0; i < update_rows.length; i++) {
    baseData = {}
        baseData['email_id'] = update_rows[i].email_id
        // baseData['rollno'] = delete_rows[i].rollno
        update_data[i] = baseData
    // update_data.push($(update_rows[i].email_id).text());
}
console.log(update_data);
var formData = $(this).serializeArray();
var actual_data = {}
actual_data['type'] = 'student'
actual_data['update_data'] = update_data;
for (data of formData) {
    actual_data[data.name] = data.value;
}
actual_update_data_json = JSON.stringify(actual_data);
console.log(actual_update_data_json)
$.ajax({
    type: "POST",
    url: "ic_queries/multioperation_queries/update_multiple_student.php",
    data: actual_update_data_json,
    success: function(data) {
        $("#updatebtnPhd").text("Updated Successfully");
        // console.log(data)
        $("#dataTable-studentPhd").DataTable().draw(false);
     
    }
})
});

$("body").on("click", ".bulkUpdatePhd", function() {
var update_rows = $("#dataTable-studentPhd").DataTable().rows('.selected').data();
if (update_rows.length > 0) {
    $("#updatebtnUg").text("Update");
    $("#bulkUpdateModalPhd").modal('show');
} else {
    alert("select some rows");
}
})


$("#delete_selected_Phd_btn").click(function(e) {
    alert("You have selected " + $("#dataTable-studentPhd tbody tr.selected").length + " record(s) for deletion");
    var delete_rows = $("#dataTable-studentPhd").DataTable().rows('.selected').data()
    var delete_data = {}
    for (var i = 0; i < delete_rows.length; i++) {
        baseData = {}
        baseData['email_id'] = delete_rows[i].email_id
        baseData['rollno'] = delete_rows[i].rollno
        delete_data[i] = baseData
        // console.log(baseData);
    }
    var actual_data = {}
    actual_data['type'] = 'student'
    actual_data['delete_data'] = delete_data
    actual_delete_data_json = JSON.stringify(actual_data)
    console.log(actual_delete_data_json)
    $.ajax({
        type: "POST",
        url: "ic_queries/multioperation_queries/delete_multiple_student.php",
        data: actual_delete_data_json,
        success: function(data) {
            // console.log(data)
            $("#dataTable-studentPhd").DataTable().draw(false);
        }
    })
})

>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
function loadModalPhd() {
    var target_row = $(this).closest("tr"); // this line did the trick
    console.log(target_row)
    var aPos = $("#dataTable-studentPhd").dataTable().fnGetPosition(target_row.get(0));
    var courseData = $('#dataTable-studentPhd').DataTable().row(aPos).data()
    var json_courseData = JSON.stringify(courseData)
    // console.log(json_courseData)
    $.ajax({
        type: "POST",
        url: "adduser/loadModal/student_modal.php",
        // data: form_serialize, 
        // dataType: "json",
        data: json_courseData,
        success: function(output) {
            // $("#"+x).text("Deleted Successfully");
            target_row.append(output);
            $('#update-del-modal').modal('show')
            $(document).on('hidden.bs.modal', '#update-del-modal', function() {
                $("#update-del-modal").remove();
            });
            $('#delete_student').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var form_serialize = form.serializeArray(); // serializes the form's elements.
                form_serialize.push({
                    name: $("#delete_student_btn").attr('name'),
                    value: $("#delete_student_btn").attr('value')
                });
                $("#delete_student_btn").text("Deleting...");
                $("#delete_student_btn").attr("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "ic_queries/addstudent_queries.php",
                    data: form_serialize,
                    success: function(data) {
                        //    alert(data); // show response from the php script.
                        $("#delete_student_btn").text("Deleted Successfully");
                        var row = $("#update-del-modal").closest('tr');
<<<<<<< HEAD
                        var aPos = $("#dataTable-student").dataTable().fnGetPosition(row.get(0));
=======
                        var aPos = $("#dataTable-studentPhd").dataTable().fnGetPosition(row.get(0));
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
                        $('#update-del-modal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        // row.remove();
<<<<<<< HEAD
                        $("#dataTable-student").DataTable().row(aPos).remove().draw(false);
=======
                        $("#dataTable-studentPhd").DataTable().row(aPos).remove().draw(false);
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156
                        // console.log(aPos);
                        // console.log(row)
                    }
                });
            });
            $('#update_student').submit(function(e) {
                update_student_phd(e);
                // $('#update-del-modal').modal('hide');
            });
        }
    });
}


function update_student_phd(e) {
    e.preventDefault();
    var form = $('#update_student');
    var form_serialize = form.serializeArray(); // serializes the form's elements.
    // console.log(form_serialize)
    form_serialize.push({
        name: $("#update_student_btn").attr('name'),
        value: $("#update_student_btn").attr('value')
    });
    $("#update_student_btn").text("Updating...");
    $("#update_student_btn").attr("disabled", true);
    $.ajax({
        type: "POST",
        url: "ic_queries/addstudent_queries.php",
        data: form_serialize,
        success: function(data) {
            //    alert(data); // show response from the php script.
            // console.log(data)
            if (data === "Exists_email_id") {
                $('#error_email_id').text('*This data already exists');
                $("#update_student_btn").text("Update");
                $("#update_student_btn").attr("disabled", false);
            } else if (data === "Exists_rollno") {
                $('#error_rollno').text('*This data already exists');
                $("#update_student_btn").text("Update");
                $("#update_student_btn").attr("disabled", false);
            } else {
                $("#update_student_btn").text("Updated Successfully");
                var row = $("#update-del-modal").closest('tr');
                var aPos = $("#dataTable-studentPhd").dataTable().fnGetPosition(row.get(0));
                var temp = $("#dataTable-studentPhd").DataTable().row(aPos).data();
                // console.log(temp)
                // console.log(form_serialize)
                temp['fname'] = form_serialize[0].value; //new values
                temp['mname'] = form_serialize[1].value; //new values
                temp['lname'] = form_serialize[2].value; //new values
                temp['email_id'] = form_serialize[3].value;
                temp['rollno'] = form_serialize[5].value;
                temp['year_of_admission'] = form_serialize[7].value;
                temp['dept_name'] = id_to_name_convertor_dept(form_serialize[9].value);
                temp['current_sem'] = form_serialize[10].value;
                // console.log(temp)
                $('#dataTable-studentPhd').dataTable().fnUpdate(temp, aPos, undefined, false);
                $('.action-btn').off('click')
                $('.action-btn').on('click', loadModalPhd)
                // $("#dataTable-student").DataTable().row(aPos).draw(false);
                $(".selectrow_student").attr("disabled", true);
                $('#error_email_id').remove();
                $('#error_rollno').remove();
            }
        }
    });
}

$("#dataTable-studentPhd").on('click', 'td.email_id', function() {
    var tr = $(this).closest('tr');
    var row = $("#dataTable-studentPhd").DataTable().row(tr);
<<<<<<< HEAD
=======

    if (row.child.isShown()) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown table-warning');
    } else {
        // Open this row
        var data = {}
        data['email_id'] = row.data()['email_id'];
        data['type'] = 'student'
        data_json = JSON.stringify(data)
        console.log(data_json)
        $.ajax({
            type: "POST",
            url: "loadAdditionalInfo/additional_info_student.php",
            data: data_json,
            success: function(response) {
                row.child(response).show();
                tr.addClass('shown table-warning');
            }
        });
        // row.child("<b>Hello</b>").show();
    }
})

       
        // ********** PHD SECTION COMPLETES***************
        //Bulk Upload 
        $("#bulkUploadstudent").submit(function(e) {
            e.preventDefault();
            form = this;
            var formData = new FormData(this);
            $("#upload_student").attr("disabled", true);
            $("#upload_student").text("Uploading...")
            $.ajax({
                url: "adduser/bulkUpload/addstudent_queries.php",
                type: 'POST',
                data: formData,
                success: function(data) {

                    let [status, response] = $.trim(data).split("+");

                    if (status == "Successful") {
                        $("#upload_student").text("Uploaded Successfully")
                        const resData = JSON.parse(response);
                        console.log(resData)
                        if (resData.errors.wrongDept.length > 0) {
                            $('#invalidstudentslist').empty();
                            resData.errors.wrongDept.forEach((entry) => {
                                $('#invalidstudentslist').append(`<li class='text-danger'>${entry.email} - ${id_to_name_convertor_dept(entry.dept)}</li>`)
                            })
                            $('#uploadstudent').modal('hide');
                            $('#invalidstudents').modal('show')
                        } else {

                            alert("inserted : " + resData.insertedRecords + "\nupdated : " + resData.updatedRecords + "\nno Operation : " + (resData.totalRecords - (resData.updatedRecords + resData.insertedRecords)))
                        }
                        if (activeTab == "Ug") {
                            loadUg();
                        } else if (activeTab == "Pg") {
                            loadPg();
                        } else {
                            loadPhd();
                        }
>>>>>>> dc92e723bb853cecd634325384b23c64a55b8156

    if (row.child.isShown()) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown table-warning');
    } else {
        // Open this row
        var data = {}
        data['email_id'] = row.data()['email_id'];
        data['type'] = 'student'
        data_json = JSON.stringify(data)
        console.log(data_json)
        $.ajax({
            type: "POST",
            url: "loadAdditionalInfo/additional_info_student.php",
            data: data_json,
            success: function(response) {
                row.child(response).show();
                tr.addClass('shown table-warning');
            }
        });
        // row.child("<b>Hello</b>").show();
    }
})

// ********** PHD SECTION COMPLETES***************
    //Bulk Upload 
    $("#bulkUploadstudent").submit(function(e) {
    e.preventDefault();
    form = this;
    var formData = new FormData(this);
    $("#upload_student").attr("disabled", true);
    $("#upload_student").text("Uploading...")
    $.ajax({
        url: "adduser/bulkUpload/addstudent_queries.php",
        type: 'POST',
        data: formData,
        success: function(data) {
            if ($.trim(data) == "Successful") {
                $("#upload_student").text("Uploaded Successfully")
                if(activeTab=="Ug")
                {
                    loadUg();
                }
                else if(activeTab=="Pg")
                {
                    loadPg();
                }
                else{
                    loadPhd();
                }
                
            } else {
                $("#upload_student").text("Upload Failed")
                alert(data);
            }
            // form.reset();
        },
        cache: false,
        contentType: false,
        processData: false
    });
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
</script>
<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>