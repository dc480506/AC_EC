<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
include("../Logger/StudentLogger.php");
$logger = StudentLogger::getLogger();
$logger->studentsRecordsViewed($_SESSION['email'], "student dashboard");
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
                    $program = $row['program'];
                }
            }

            ?>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title font-weight-bold text-dark mb-0">My Profile</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../vendor/img/person1.jpg" class="rounded-circle mx-auto d-block mb-4" alt="..." width="100em" height="100em">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-dark"> <span><b>Name : </b></span><?php echo $fname . " " .$mname. " " .$lname. ""; ?></p>
                                    <p class="text-dark"> <span><b>Email : </b></span><?php echo $email; ?></p>
                                    <p class="text-dark"> <span><b>Year of addmission : </b></span><?php echo $yoa; ?></p>
                                    <p class="text-dark"> <span><b>Roll number : </b></span><?php echo $roll; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-dark"> <span><b>Program : </b></span><?php echo $program; ?></p>
                                    <p class="text-dark"> <span><b>Department : </b></span><?php echo $department; ?></p>
                                    <p class="text-dark"> <span><b>Current semester : </b></span><?php echo $current_sem; ?></p>
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
                            <h3 class=" text-dark mb-0"><strong>My Current Courses <i class="fas fa-book-open"></i></strong></h3>
                           <br>
                          <br>
                            <?php 
                            // echo "$current_sem";
                            $query="select cname,cid,course_type_id from course c where c.cid in (select cid from student_course_alloted s where s.email_id='$email' and c.sem='$current_sem' and s.sem='$current_sem' and c.currently_active=1 and s.currently_active=1)";
                            $result = mysqli_query($conn, $query);
                            $c=mysqli_num_rows($result);
        
                            if($c>0) {
                                ?><div class="row">
                                <?php
                                while($row=mysqli_fetch_assoc($result))
                                {
                                   $course_type=$row['course_type_id'];
                                   $quer="select name from course_types where id='$course_type'";
                                   $res1=mysqli_query($conn,$quer);
                                   
                                    ?>
                                    

                                    <div class="col-sm-6">
                                    <div class="card w-79 shadow mb-4 text-center">
                                    <div class="card-header">
                                    <?php
                                    while($r=mysqli_fetch_assoc($res1))
                                    {
                                        ?>
                                    <h4 class="font-weight-bold text-primary">Course: <?php echo $r['name'];?></h4>
                                    
                                    <?php
                                    }
                                    ?>
                                    </div>
                                    <div class="card-body text-center">
                                    
                                   
                                    <div class="card-title font-weight-bold">
                                    <br>
                                    <h4 class="font-weight-bold text-danger"><?php echo $row['cname'];?></h4>
                                   
                                    <!-- <h5 class="font-weight-bold text-dark">Course ID: <?php echo $row['cid'];?></h5> -->
                                    </div>
                                  
                                    
                                   <br>
                                    <?php
                                     $cid=$row['cid'];
                                    // $query1="select student_attendance from student_courses_grade where cid='$row['cid']' and email_id='$email' and currently_active=1";
                                    // select student_attendance from student_courses_grade g where g.cid in (select cid from student_course_alloted a where a.email_id ="deepanshu.v@somaiya.edu" and g.currently_active=1 and a.currently_active=1)
                                    $query1="select student_attendance,marks from student_courses_grade g where g.cid in (select cid from student_course_alloted a where a.cid='$cid' and a.email_id ='$email' and g.currently_active=1 and a.currently_active=1 and a.sem='$current_sem' and g.complete_status=1)";
                                    $res=mysqli_query($conn,$query1);
                                    $c1=mysqli_num_rows($res);
                                    if($c1>0)
                                        {
                                    while($row1=mysqli_fetch_assoc($res))
                                    {
                                        
                                        ?>
                                         
                                        <h5 class="card-text font-weight-bold text-dark">Marks obtained: </h5>
                                        <h5 class="font-weight-bold text-danger"><?php echo $row1['marks'];?></h5>
                                       
                                
                                        <h5 class="font-weight-bold text-dark">Attendance <i class="fas fa-user-check"></i> </h5>
                                        <h5 class="font-weight-bold text-danger"><?php echo $row1['student_attendance'];?></h5>
                                        <br>
                                       
                                        <?php
                                        
                                    }
                                }
                                else
                                {
                                    ?>
                                    <h5 class="card-text font-weight-bold text-dark">Marks obtained: </h5>
                                        <h5 class="font-weight-bold text-danger"> --</h5>
                                       
                                       

                                        <h5 class="font-weight-bold text-dark">Attendance <i class="fas fa-user-check"></i> </h5>
                                        <h5 class="font-weight-bold text-danger"> --</h5>
                                        <br>
                                    <?php
                                }
                                    ?>
                                    </div>
                                    
                                    </div>
                                    
                                    
                                    <!-- row -->
                                    </div>
                                    <br>
                                    <?php
                                }
                                
                            }
                            else
                            {
                              ?> <h4 class="text-danger font-weight-bold">No course alloted currently.</h4>
                              <?php
                            }
                            ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card start(loop) -->
        <!-- <div class="col-md-12 grid-margin stretch-card mt-2 mb-4">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample mt-4" action="">
                        <p class="card-description">
                            <h4><strong> Audit Course </strong></h4>
                        </p> -->
                        <?php
                        // $sql = "SELECT ac.cname,sa.sem,(SELECT count(*) FROM student_audit sa WHERE currently_active=1 AND sa.cid=ac.cid) as no_of_allocated,sa.complete_status,ac.year FROM audit_course AS ac INNER Join student_audit AS sa on sa.cid=ac.cid AND sa.sem=ac.sem AND ac.year=sa.year WHERE sa.email_id='{$_SESSION['email']}' AND sa.currently_active='1'";
                        // $result = mysqli_query($conn, $sql);
                        // if (mysqli_num_rows($result) == 0) {
                        // ?>
                        <!-- <h5 style="color:red;"> 
                        <?php 
                        // echo 'No courses available currently'; 
                        ?>&nbsp;<i class="fas fa-times"></i></h5> -->
                            <?php
                        // } else {
                        //     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        //     $count = mysqli_num_rows($result);
                        //     if ($count == 1) {
                        //     ?>
                                <!-- <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputCourseName"><b>Course Name</b></label>
                                            <br>
                                            <span><?php 
                                            // echo $row['cname'];
                                             ?></span>
                                        </div>
                                    </div> -->

                                    <!-- <div class=" col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputSemester"><b>Semester</b></label>
                                            <br>
                                            <span><?php 
                                            // echo $row['sem']; 
                                            ?></span>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputStatus"><b>Course Status</b></label>
                                            <br>
                                            <span><?php 
                                                    // if ($row['complete_status'] == 1)
                                                    //     echo "Complete";
                                                    // else
                                                    //     echo "Incomplete";
                                                    ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputStrength"><b>Course Strength</b></label>
                                            <br>
                                            <span><?php
                                            //  echo $row['no_of_allocated'];
                                                // } 
                                                ?></span>
                                        </div>
                                    </div>
                                </div> <?php
                                //  }
                                 ?>
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