<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
include("../Logger/FacultyLogger.php");
$logger = FacultyLogger::getLogger();
$logger->facultyRecordsViewed($_SESSION['email'], "faculty previous courses");
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
                  <th>Course Type </th>
                  <th>Course Name</th>
                  <th>Course ID</th>
                  <th>Year</th>
                  <th>Semester</th>
                  <th>Program</th>

                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Course Type </th>
                  <th>Course Name</th>
                  <th>Course ID</th>
                  <th>Year</th>
                  <th>Semester</th>
                  <th>Program</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $email = $_SESSION['email'];

                $query = "SELECT fca.cid,c.cname,ct.name, c.program, fca.course_type_id, fca.sem, fca.year FROM faculty_course_alloted_log as fca ,course_log as c,course_types as ct WHERE fca.email_id = '$email' and fca.cid=c.cid and fca.course_type_id=ct.id";

                if ($result = mysqli_query($conn, $query)) {
                  $rowcount = mysqli_num_rows($result);
                  while ($row = mysqli_fetch_array($result)) {

                    $cid = $row['cid'];
                    $cname = $row['cname'];
                    $sem = $row['sem'];
                    $year = $row['year'];
                    $program = $row['program'];
                    $ctype = $row['name'];

                    echo '
                                <tr>
                                  <td>' . $ctype . '</td>
                                  <td>' . $cname . '</td>
                                  <td>' . $cid . '</td>
                                  <td>' . $year . '</td>
                                  <td>' . $sem . '</td>
                                  <td>' . $program . '</td>
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