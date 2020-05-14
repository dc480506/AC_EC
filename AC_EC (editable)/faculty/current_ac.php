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
        <div class="col text-right">
          <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fas fa-upload"></i>
          </button>
        </div>
      </div>
      <br>
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Upload Your File </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form method="post" action="#" id="#">
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
              <button type="button" class="btn btn-primary" name="save_changes">Upload</button>
            </div>
          </div>
        </div>
      </div>
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
              <form class="forms-sample" method="POST" action="">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="disp1()" name="cname_cbox">
                  <label class="form-check-label" for="exampleFormControlSelect1">Course Name</label>
                  <select class="form-control" style="display: none" id="exampleFormControlSelect1" name="cname">
                    <?php
                    $email = $_SESSION['email'];
                    $department = 'department';
                    $query = "SELECT cname FROM faculty_audit NATURAL JOIN audit_course WHERE email_id = '$email'";
                    if ($result = mysqli_query($conn, $query)) {
                      $rowcount = mysqli_num_rows($result);
                      while ($row = mysqli_fetch_array($result)) {
                        $cname = $row['cname'];
                        echo '
                                      <option>' . $cname . '<option>
                                    ';
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck2" onclick="disp2()" name="cid_box">
                  <label class="form-check-label" for="exampleFormControlSelect2">Course ID</label>
                  <select class="form-control" style="display: none" id="exampleFormControlSelect2" name="cid">
                    <?php
                    $email = $_SESSION['email'];
                    $department = 'department';
                    $query = "SELECT cid FROM faculty_audit WHERE email_id = '$email'";
                    if ($result = mysqli_query($conn, $query)) {
                      $rowcount = mysqli_num_rows($result);
                      while ($row = mysqli_fetch_array($result)) {
                        $cid = $row['cid'];
                        echo '
                                      <option>' . $cid . '<option>
                                    ';
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck3" onclick="disp3()" name="sem_cbox">
                  <label class="form-check-label" for="exampleFormControlSelect3">Semester</label>
                  <select class="form-control" style="display: none" id="exampleFormControlSelect3" name="sem">
                    <?php
                    $email = $_SESSION['email'];
                    $department = 'department';
                    $query = "SELECT sem FROM faculty_audit NATURAL JOIN audit_course WHERE email_id = '$email'";
                    if ($result = mysqli_query($conn, $query)) {
                      $rowcount = mysqli_num_rows($result);
                      while ($row = mysqli_fetch_array($result)) {
                        $sem = $row['sem'];
                        echo '
                                      <option>' . $sem . '<option>
                                    ';
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck4" onclick="disp4()" name="dos_cbox">
                  <label class="form-check-label" for="exampleFormControlSelect4">Department of Study</label>
                  <select class="form-control" style="display: none" id="exampleFormControlSelect4" name="dept">
                    <?php
                    $dept_names = array();
                    $email = $_SESSION['email'];
                    $department = 'department';
                    $query = "SELECT distinct(dept_name) FROM faculty_audit NATURAL JOIN audit_course NATURAL JOIN department WHERE email_id = '$email'";
                    if ($result = mysqli_query($conn, $query)) {
                      $rowcount = mysqli_num_rows($result);
                      while ($row = mysqli_fetch_array($result)) {
                        $dept_name = $row['dept_name'];
                        echo '<option>' . $dept_name . '<option>';
                      }
                    }
                    ?>
                  </select>
                </div>
                <!-- <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck5" onclick="disp5()">
                  <label class="form-check-label" for="exampleFormControlSelect5">Department</label>
                  <select class="form-control" style="display: none" id="exampleFormControlSelect5" name="cname">
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
            </div>
          </div>
        </div>
      </div>
      <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Year</th>
                  <th>Email Address</th>
                  <th>Semester</th>
                  <th>Department</th>
                  <th>Course Name</th>
                  <th>Attendance</th>
                  <th>Marks</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Year</th>
                  <th>Email Address</th>
                  <th>Semester</th>
                  <th>Department</th>
                  <th>Course Name</th>
                  <th>Attendance</th>
                  <th>Marks</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $email = $_SESSION['email'];
                $query = "SELECT cid FROM faculty_audit WHERE email_id = '$email'";
                if ($result = mysqli_query($conn, $query)) {

                  while ($row = mysqli_fetch_array($result)) {
                    $cid = $row['cid'];

                    $query1 = "SELECT cname, dept_id FROM audit_course WHERE cid = '$cid'";
                    $result1 = mysqli_query($conn, $query1);
                    $row1 = mysqli_fetch_assoc($result1);
                    $cname = $row1['cname'];
                    $dept_id = $row1['dept_id'];

                    $query2 = "SELECT email_id, sem, year, student_attendance FROM student_audit WHERE cid = '$cid'";
                    if ($result2 = mysqli_query($conn, $query2)) {

                      while ($row2 = mysqli_fetch_array($result2)) {
                        $email_id = $row2['email_id'];
                        $sem = $row2['sem'];
                        $year = $row2['year'];
                        $attendance = $row2['student_attendance'];
                        $query3 = "SELECT rollno, fname, mname, lname, dept_id FROM student WHERE email_id = '$email_id'";
                        $result3 = mysqli_query($conn, $query3);
                        $row3 = mysqli_fetch_assoc($result3);
                        $rollno = $row3['rollno'];
                        $fname = $row3['fname'];
                        $mname = $row3['mname'];
                        $lname = $row3['lname'];

                        $query4 = "SELECT dept_name FROM department WHERE dept_id = '$dept_id'";
                        $result4 = mysqli_query($conn, $query4);
                        $row4 = mysqli_fetch_assoc($result4);
                        $dept_name = $row4['dept_name'];

                        echo '
                                  <tr>
                                    <td>' . $fname . '</td>
                                    <td>' . $mname . '</td>
                                    <td>' . $lname . '</td>
                                    <td>' . $year . '</td>
                                    <td>' . $email_id . '</td>
                                    <td>' . $sem . '</td>
                                    <td>' . $dept_name . '</td>
                                    <td>' . $cname . '</td>
                                    <td>' . $attendance . '</td>
                                    <td>' . $rollno . '</td>
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
                                                                        <label for="exampleFormControlSelect1"><b>Are you sure you want to remove the student from the course?</b>
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
                                                                        <div class="form-group col-md-4">
                                                                            <label for="cname"><b>First Name</b></label>
                                                                            <input type="text" class="form-control" id="fname" placeholder="First" name="fname">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="cname"><b>Middle Name</b></label>
                                                                            <input type="text" class="form-control" id="fname" placeholder="Middle" name="mname">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="cname"><b>Last Name</b></label>
                                                                            <input type="text" class="form-control" id="lname" placeholder=" Name" name="fname">
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
                                                                            <label for="department"><b>Department</b></label>
                                                                            <input type="text" class="form-control" id="department" name="department" placeholder="Department">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="email"><b>Email</b></label>
                                                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="cname"><b>Course Name</b></label>
                                                                            <input type="text" class="form-control" id="cname" name="cname" placeholder="Course Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="attendance"><b>Attendance</b></label>
                                                                            <input type="text" class="form-control" id="attendance" name="attendance" placeholder="Attendance">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="marks"><b>Marks</b></label>
                                                                            <input type="number" class="form-control" id="marks" name="marks" placeholder="Marks">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <br>
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
                                  ';
                      }
                    }
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
  <?php include('../includes/footer.php');
  include('../includes/scripts.php');
  ?>