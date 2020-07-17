<?php 
include('../../config.php');
include_once('../verify.php');
?>

<?php
include('includes/header.php');
include('includes/topbar1.php'); ?>

<?php
    $email_id= $_SESSION['email_id'] ;
    $result = mysqli_query($conn,"select * from student WHERE email_id='$email_id'");
    $row=mysqli_fetch_assoc($result);
    $year=$row['year_of_admission'];
    $rollno=$row['rollno'];
    $current_sem=$row['current_sem'];
    $name=$row['fname'].' '.$row['mname'].' '.$row['lname'];
?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                <h4 class="font-weight-bold text-primary mb-0 pb-2">
                <?php 
                        echo 'Courses Info: Name - '.$name;
                        echo ', Roll Number - '.$rollno.' and Semester - '.$current_sem ;
                        ?>
                </h4>
                </div>
            </div>


            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <th>Course Type </th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Year</th>
                                    <th>Semester</th>
                                    <th>Marks </th>
                                    <th>Completion Status</th>
                                    <th>Attendance</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Course Type </th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Year</th>
                                    <th>Semester</th>
                                    <th>Marks </th>
                                    <th>Completion Status</th>
                                    <th>Attendance</th>
                                    
                                    
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php 

                                $sql1= "SELECT sca.cid, sca.sem,sca.course_type_id,sca.year,c.cname,course_types.name,course_types.is_gradable from student_course_alloted as sca inner join course as c on sca.cid=c.cid inner join course_types on c.course_type_id=course_types.id where sca.email_id='$email_id'";
                                $sql2="SELECT sca.cid, sca.sem,sca.course_type_id,sca.year,c.cname,course_types.name,course_types.is_gradable from student_course_alloted_log as sca inner join course_log as c on sca.cid=c.cid inner join course_types on c.course_type_id=course_types.id where sca.email_id='$email_id'";
                                $sql=$sql1 ." UNION ALL ".$sql2;
                                // echo $sql;
                                $result1=mysqli_query($conn,$sql);
                                $count=0;

                                while($row=mysqli_fetch_array($result1)){

                                    $sem=$row['sem']; 
                                    $year=$row['year'];
                                    $cid= $row['cid'];
                                    $course_type_id=$row['course_type_id'];

                                    ?>

                                    <tr>
                                        <td><?php echo $row['name']; ?> </td>
                                        <td><?php echo $row['cname']; ?> </td>
                                        <td><?php echo $row['cid']; ?> </td>
                                        <td><?php echo $row['year']; ?></td>
                                        <td><?php echo $row['sem']; ?></td>

                                        <?php if($row['is_gradable']==1){

                                            $sql1="SELECT scg.marks,scg.complete_status,scg.student_attendance from student_courses_grade as scg,student_course_alloted as sca where scg.email_id='$email_id' AND scg.cid='$cid' and scg.course_type_id='$course_type_id' AND scg.sem='$sem' and scg.year='$year'";
                                            $sql2="SELECT scg.marks,scg.complete_status,scg.student_attendance from student_courses_grade_log as scg,student_course_alloted_log as sca where scg.email_id='$email_id' AND scg.cid='$cid' and scg.course_type_id='$course_type_id' AND scg.sem='$sem' and scg.year='$year'";
                                            $sql=$sql1 ." UNION ALL ".$sql2;
                                            $result2= mysqli_query($conn,$sql);
                                            while($row1=mysqli_fetch_array($result2))
                                            {  ?>
                                                
                                                <td> <?php echo $row1['marks']; ?> </td>
                                                <td> <?php echo $row1['complete_status']; ?> </td>
                                                <td> <?php echo $row1['student_attendance']; ?> </td>
                                                </tr>
                                            
                                            <?php
                                            } 

                                        }

                                        else{
                                                $sql1="SELECT scng.complete_status,scng.student_attendance from student_courses_nongrade as scng,student_course_alloted as sca where scng.email_id='$email_id' AND scng.cid='$cid' and scng.course_type_id='$course_type_id' AND scng.sem='$sem' and scng.year='$year'";
                                                $sql2="SELECT scng.complete_status,scng.student_attendance from student_courses_nongrade_log as scng,student_course_alloted as sca where scng.email_id='$email_id' AND scng.cid='$cid' and scng.course_type_id='$course_type_id' AND scng.sem='$sem' and scng.year='$year'";
                                                $sql=$sql1 ." UNION ALL ".$sql2;
                                                $result3= mysqli_query($conn,$sql);
                                                while($row2=mysqli_fetch_array($result3)){
                                                    ?> 
                                                    <td> <?php echo 'NA' ?> </td>
                                                    <td> <?php echo $row2['complete_status']; ?> </td>
                                                    <td> <?php echo $row2['student_attendance']; ?> </td>
                                                    </tr>

                                               <?php }
                                            }
                                 ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <?php include('includes/footer.php');
    include('includes/scripts.php');
    ?>