<?php include('../includes/header.php');
include('../config.php');
include_once('verify.php');
?>

<?php include('sidebar.php'); ?>

<?php include('../includes/topbar_student.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">Student Records</h4>
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
                                    <th>Floating Departments</th>
                                    <th>About</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Year</th>
                                    <th>Semester</th>
                                    <th>Floating Departments</th>
                                    <th>About</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql = "SELECT scl.cid, scl.sem,scl.course_type_id,scl.year,cl.cname,course_types.name,course_types.is_gradable from student_course_alloted_log as scl inner join course_log as cl on scl.cid=cl.cid inner join course_types on cl.course_type_id=course_types.id where scl.email_id='{$_SESSION['email']}'";
                                $result = mysqli_query($conn, $sql);
                                $count = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['cname']; ?></td>
                                        <td><?php echo $row['cid']; ?></td>
                                        <td><?php echo $row['year']; ?></td>
                                        <td><?php echo $row['sem']; ?></td>
                                        <td><?php echo $row['dept_name']; ?></td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter<?php echo $count; ?>">
                                                <i class="fas fa-tools"></i>
                                            </button>

                                            <!-- Modal -->


                                            <div class="modal fade" id="exampleModalCenter<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle<?php echo $count; ?>">About</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputUsername1"><b>Faculty Name</b></label>
                                                                        <br>
                                                                        <span><?php
                                                                                echo " {$row['fname']} {$row['mname']} {$row['lname']}"; ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class=" col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputUsername1"><b>Course Status</b></label>
                                                                        <br>
                                                                        <span><?php
                                                                                if ($row['complete_status'] == 1)
                                                                                    echo "Completed";
                                                                                else
                                                                                    echo "Incomplete";
                                                                                ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputUsername1"><b>Syllabus Link</b></label>
                                                                        <br>
                                                                        <span>aayega jaldi ayega</span>
                                                                    </div>
                                                                </div>
                                                                <div class=" col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputUsername1"><b>Attendance</b></label>
                                                                        <br>
                                                                        <span><?php echo $row['student_attendence']; ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputUsername1"><b>Marks</b></label>
                                                                        <br>
                                                                        <span>woh bhi milenge tension mat le!!!<?php echo $count;
                                                                                                                $count++;
                                                                                                                ?></span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
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