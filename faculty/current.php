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
                <div class="form-group">
                  <label for="exampleFormControlSelect1"><b>First Name</b>
                  </label>
                  <select class="form-control" id="exampleFormControlSelect1" name="fname">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect2"><b>Middle Name</b>
                  </label>
                  <select class="form-control" id="exampleFormControlSelect2" name="mname">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect3"><b>Last Name</b>
                  </label>
                  <select class="form-control" id="exampleFormControlSelect3" name="lname">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect4"><b>Email</b>
                  </label>
                  <select class="form-control" id="exampleFormControlSelect4" name="Email">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect5"><b>Department</b>
                  </label>
                  <select class="form-control" id="exampleFormControlSelect5" name="department">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect6"><b>Course Name</b>
                  </label>
                  <select class="form-control" id="exampleFormControlSelect6" name="course">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect7"><b>Year</b>
                  </label>
                  <select class="form-control" id="exampleFormControlSelect7" name="year">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect8"><b>Semester</b>
                  </label>
                  <select class="form-control" id="exampleFormControlSelect8" name="semester">
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
                <tr>
                  <td>Tiger </td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>2011/04/25</td>
                  <td>2011/04/25</td>
                  <td>2011/04/25</td>
                  <td>61</td>
                  <td>61</td>
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