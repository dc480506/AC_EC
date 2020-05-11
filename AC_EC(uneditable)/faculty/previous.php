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
          <h4 class="font-weight-bold text-primary mb-0">Faculty Records</h4>
        </div>
      </div>
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Course Name</th>
                  <th>Course ID</th>
                  <th>Year</th>
                  <th>Semester</th>
                  <th>Department</th>
                  <th>No of Students</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Course Name</th>
                  <th>Course ID</th>
                  <th>Year</th>
                  <th>Semester</th>
                  <th>Department</th>
                  <th>No of Students</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                    $email = $_SESSION['email'];

                    $query = "SELECT cid, cname, sem, year, no_of_allocated, dept_name FROM faculty_audit_log NATURAL JOIN audit_course_log NATURAL JOIN department WHERE email_id = '$email'";

                    if($result = mysqli_query($conn, $query)){
                      $rowcount = mysqli_num_rows($result);
                      while($row = mysqli_fetch_array($result)){

                          $cid = $row['cid'];
                          $cname = $row['cname'];
                          $sem = $row['sem'];
                          $year = $row['year'];
                          $no_of_allocated = $row['no_of_allocated'];
                          $dept_name = $row['dept_name'];
                          
                          echo '
                                <tr>
                                  <td>' .$cname.'</td>
                                  <td>' .$cid.'</td>
                                  <td>' .$year.'</td>
                                  <td>' .$sem.'</td>
                                  <td>' .$dept_name.'</td>
                                  <td>' .$no_of_allocated.'</td>
                                </tr>
                                ';                      
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