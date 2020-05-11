<?php 
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>

<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-info mb-4">My Profile</h4>
                    <?php
                        $email = $_SESSION['email'];
                        $fname = 'fname';
                        $lname = 'lname';
                        $department = 'department';
                        $mobile = '9876543201';
                        $image = "../vendor/img/person1.jpg";
                        $query = "SELECT fname, lname, dept_id FROM faculty WHERE email_id = '$email'";
                        if($result = mysqli_query($conn, $query)){
                            $rowcount = mysqli_num_rows($result);
                            if($rowcount == 1){
                                $row = mysqli_fetch_assoc($result);
                                $fname = $row['fname'];
                                $lname = $row['lname'];
                                $dept_id = $row['dept_id'];
                                $query = "SELECT dept_name FROM department WHERE dept_id = '$dept_id'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                $department = $row['dept_name'];
                            }
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../vendor/img/person1.jpg" class="rounded-circle mx-auto d-block mb-4" alt="..." width="100em" height="100em">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-dark"> <span><b>Name : </b></span><?php echo $fname.' '.$lname; ?></p>
                                    <p class="text-dark"> <span><b>Email : </b></span><?php echo $email; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-dark"> <span><b>Department : </b></span><?php echo $department; ?> </p>
                                    <p class="text-dark"> <span><b>Mobile No. : </b></span><?php echo $mobile; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h3 class="mb-0"><strong>My Current Course</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card start(loop) -->
        <div class="col-md-12 grid-margin stretch-card mt-2 mb-4">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample mt-4" action="">
                        <p class="card-description">
                            <h5><strong> Audit Course </strong></h5>
                        </p>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputCourseName"><b>Course Name</b></label>
                                    <br>
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
                                                      <span>'.$cname.'<span>
                                                      <br>
                                                    ';
                                          }
                                        }
                                    ?>
                                </div>
                            </div>

                            <div class=" col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputSemester"><b>Semester</b></label>
                                    <br>
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
                                                      <span>'.$sem.'<span>
                                                      <br>
                                                    ';
                                          }
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputStatus"><b>Course Status</b></label>
                                    <br>
                                    <?php
                                        $email = $_SESSION['email'];
                                        $department = 'department';
                                        $query = "SELECT cid FROM faculty_audit WHERE email_id = '$email'";
                                        if($result = mysqli_query($conn, $query)){
                                          $rowcount = mysqli_num_rows($result);
                                          while($row = mysqli_fetch_array($result)){
                                              $cid = $row['cid'];
                                              $query1 = "SELECT no_of_allocated FROM audit_course WHERE cid = '$cid'";
                                              $result1 = mysqli_query($conn, $query1);
                                              $row1= mysqli_fetch_assoc($result1);
                                              $no_of_allocated = $row1['no_of_allocated'];
                                              echo '
                                                      <span>'.$no_of_allocated.'<span>
                                                      <br>
                                                    ';
                                          }
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputStrength"><b>Course Strength</b></label>
                                    <br>
                                    <?php
                                        $email = $_SESSION['email'];
                                        $department = 'department';
                                        $query = "SELECT cid FROM faculty_audit WHERE email_id = '$email'";
                                        if($result = mysqli_query($conn, $query)){
                                          $rowcount = mysqli_num_rows($result);
                                          while($row = mysqli_fetch_array($result)){
                                              $cid = $row['cid'];
                                              $query1 = "SELECT max FROM audit_course WHERE cid = '$cid'";
                                              $result1 = mysqli_query($conn, $query1);
                                              $row1= mysqli_fetch_assoc($result1);
                                              $max = $row1['max'];
                                              echo '
                                                      <span>'.$max.'<span>
                                                      <br>
                                                    ';
                                          }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- card end(loop) -->
    </div>
</div>
<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>