<?php include('../includes/header.php'); 
include('../config.php');
session_start();
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
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>2011/04/25</td>
                </tr>
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