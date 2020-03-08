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
          <div class="col text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">
              <i class="fas fa-filter"></i>
            </button>
          </div>
          <br>
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
                        $query = "SELECT cid FROM faculty_audit WHERE email_id = '$email'";
                        if($result = mysqli_query($conn, $query)){
                          $rowcount = mysqli_num_rows($result);
                          while($row = mysqli_fetch_array($result)){
                              $cid = $row['cid'];
                              $query1 = "SELECT cname FROM audit_course WHERE cid = '$cid'";
                              $result1 = mysqli_query($conn, $query1);
                              $row1= mysqli_fetch_assoc($result1);
                              $cname = $row1['cname'];
                              echo '
                                      <option>'.$cname.'<option>
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
                        if($result = mysqli_query($conn, $query)){
                          $rowcount = mysqli_num_rows($result);
                          while($row = mysqli_fetch_array($result)){
                              $cid = $row['cid'];
                              echo '
                                      <option>'.$cid.'<option>
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
                        $query = "SELECT cid FROM faculty_audit WHERE email_id = '$email'";
                        if($result = mysqli_query($conn, $query)){
                          $rowcount = mysqli_num_rows($result);
                          while($row = mysqli_fetch_array($result)){
                              $cid = $row['cid'];
                              $query1 = "SELECT sem FROM audit_course WHERE cid = '$cid'";
                              $result1 = mysqli_query($conn, $query1);
                              $row1= mysqli_fetch_assoc($result1);
                              $sem = $row1['sem'];
                              echo '
                                      <option>'.$sem.'<option>
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
                      $query = "SELECT cid FROM faculty_audit WHERE email_id = '$email'";
                      if($result = mysqli_query($conn, $query)){
                        $rowcount = mysqli_num_rows($result);
                        while($row = mysqli_fetch_array($result)){
                            $cid = $row['cid'];
                            
                            $query1 = "SELECT dept_id FROM audit_course WHERE cid = '$cid'";
                            $result1 = mysqli_query($conn, $query1);
                            $row1= mysqli_fetch_assoc($result1);
                            $dept_id = $row1['dept_id'];
                            
                            $query2 = "SELECT DISTINCT dept_name FROM department WHERE dept_id = '$dept_id'";
                            $result2 = mysqli_query($conn, $query2);
                            $row2= mysqli_fetch_assoc($result2);
                            $dept_name = $row2['dept_name'];
                            if(!in_array($dept_name, $dept_names)){
                              array_push($dept_names, $dept_name);
                            }
                        }
                        $count = 0; 

                        while($count < count($dept_names)) {
                            echo '<option>'.$dept_names[$count].'<option>';
                            $count++;
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
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                </tr>
              </tfoot>
              <tbody>
                <?php
                  $email = $_SESSION['email'];
                  $query = "SELECT cid FROM faculty_audit WHERE email_id = '$email'";
                  if($result = mysqli_query($conn, $query)){
                    
                      while($row = mysqli_fetch_array($result)){
                          $cid = $row['cid'];

                          $query1 = "SELECT cname FROM audit_course WHERE cid = '$cid'";
                          $result1 = mysqli_query($conn, $query1);
                          $row1= mysqli_fetch_assoc($result1);
                          $cname = $row1['cname'];

                          $query2 = "SELECT email_id, sem, year, student_attendance FROM student_audit WHERE cid = '$cid'";
                          if($result2 = mysqli_query($conn, $query2)){

                          while($row2 = mysqli_fetch_array($result2)){
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
                                    <td>' .$fname.'</td>
                                    <td>' .$mname.'</td>
                                    <td>' .$lname.'</td>
                                    <td>' .$year.'</td>
                                    <td>' .$email_id.'</td>
                                    <td>' .$sem.'</td>
                                    <td>' .$dept_name.'</td>
                                    <td>' .$cname.'</td>
                                    <td>' .$attendance.'</td>
                                    <td>' .$rollno.'</td>
                                  </tr>
                                  ';
                          }}
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
  <?php include('../includes/footer.php');
  include('../includes/scripts.php');
  ?>