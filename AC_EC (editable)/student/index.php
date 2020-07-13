<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>

<?php include('sidebar.php'); ?>

<?php include('../includes/topbar_student.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card mt-2">
            <?php
            // inserting the my profile card


            $email = $_SESSION['email'];
            $fname = 'fname';
            $lname = 'lname';
            $mname = 'mname';
            $department = 'department';
            // $mobile = '9876543201';
            $roll = 'rollno';
            $yoa = '2018';
            $program = "program";
            $current_sem = '3';

            $query = "SELECT s.fname,s.mname,s.lname,s.email_id,d.dept_name,s.program,s.rollno,s.year_of_admission,s.current_sem FROM student AS s,department AS d WHERE s.email_id='$email' AND s.dept_id=d.dept_id";
            if ($result = mysqli_query($conn, $query)) {
                $rowcount = mysqli_num_rows($result);
                if ($rowcount == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $mname = $row['mname'];
                    $roll = $row['rollno'];
                    $department = $row['dept_name'];
                    $yoa = $row['year_of_admission'];
                    $program = $row['program'];
                    $current_sem = $row['current_sem'];
                    $_SESSION['program']=$row['program'];
                }
            }

            // $result= mysqli_query($conn,$sql);
            // $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
            // $count= mysqli_num_rows($result);
            // echo 'hello';
            // $_SESSION['sem']=$row['current_sem'];
            // $_SESSION['rollno']=$row['rollno'];
            // $_SESSION['year']=$row['year'];
            // if($count==1)
            // {
            ?>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-info mb-4">My Profile</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../vendor/img/person1.jpg" class="rounded-circle mx-auto d-block mb-4" alt="..." width="100em" height="100em">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-dark"> <span><b>Name : </b></span><?php echo $fname . ' ' . $mname . ' ' . $lname; ?></p>
                                    <p class="text-dark"> <span><b>Email : </b></span><?php echo $email; ?></p>
                                    <p class="text-dark"> <span><b>Year of Admission: </b></span><?php echo $yoa; ?></p>
                                    <!-- <p class="text-dark"> <span><b>Mobile No. : </b></span><?php echo $mobile; ?> -->
                                </div>
                                <div class="col-md-6">
                                    <p class="text-dark"> <span><b>Program : </b></span><?php echo $program; ?></p>
                                    <p class="text-dark"> <span><b>Department : </b></span><?php echo $department; ?></p>
                                    <p class="text-dark"> <span><b>Roll No. : </b></span><?php echo $roll; ?></p>
                                    <p class="text-dark"> <span><b>Current Semester : </b></span><?php echo $current_sem; ?></p>
                                    </p>
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
                            <h4 class="mb-0"><strong>My Current Courses</strong></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card start(loop) -->
        <div class="col-md-12 grid-margin stretch-card mt-2 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Course Type</th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Year</th>
                                    <th>Semester</th>
                                    <th>Course Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Course Type</th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Year</th>
                                    <th>Semester</th>
                                    <th>Course Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php

                                $sql = "SELECT course_types.name,course.cid,course.cname,sa.sem,sa.year,
                                sa.complete_status,course.year FROM course_types,course AS course INNER Join student_course_alloted
                                AS sa on sa.cid=course.cid AND sa.sem=course.sem AND course.year=sa.year WHERE sa.email_id='$email' 
                                AND sa.currently_active='1' and sa.sem='$current_sem' AND course_types.id=course.course_type_id";


                                $result = mysqli_query($conn, $sql);
                                $count = 0;

                                while ($row = mysqli_fetch_array($result)) {  ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>

                                        <td><?php echo $row['cname']; ?></td>

                                        <td><?php echo $row['cid']; ?></td>

                                        <td><?php echo $row['year']; ?></td>

                                        <td><?php echo $row['sem']; ?></td>

                                        <td>
                                            <?php if ($row['complete_status'] == 1)
                                                echo "Complete";
                                            else
                                                echo "Incomplete";
                                            ?>
                                        </td>
                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
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