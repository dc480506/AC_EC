<?php 
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
include('sidebar.php');
include('../includes/topbar_student.php');




$form_id=$_GET['form_id'];
$_SESSION['form_id']=$form_id;
// echo $form_id;

$sql1="SELECT no_of_preferences from form where form_id=$form_id";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);

$email_id=$_SESSION['email'];
$sql3="select c.name from form_course_category_map fccm,course_types c where fccm.form_id=$form_id AND fccm.course_type_id=c.id ";
$result3 = mysqli_query($conn, $sql3);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0 pb-2">Prefereces submitted for
                    <?php
                    $i=0;
                       
                        while($row3 = mysqli_fetch_array($result3)){
                 
                            $i++;
                            echo $row3['name']." ";                                        
                        }
                        ?>
                     </h4>
                </div>
            </div>


            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>Preferences</th>
                            <th>Course Id</th>
                            <th>Course Name</th>
                        </thead>
                            <?php
                                $sql4="SELECT * FROM student_preferences where email_id='".$email_id."' AND form_id=$form_id";
                                // echo $sql4;
                                
                                $result4 = mysqli_query($conn, $sql4);
                                $row4=mysqli_fetch_assoc($result4);
                           
                                for($j=1;$j<=$row1['no_of_preferences'];$j++)
                                    {
                                        $var="pref".$j; 
                                        $query="SELECT cname from course where cid='$row4[$var]'";
                                        // echo $query;
                                        $result = mysqli_query($conn, $query);
                                        $row=mysqli_fetch_assoc($result);
                                        ?>
                                        <tr>
                                       <td>Preference <?php echo $j?> </td>     
                                        <td><?php echo $row4[$var]?> </td>
                                        <td><?php echo $row['cname']?> </td>
                                        </tr>
                                    
                                <?php } 
                                ?>
                          
                                
                      
                         
                     
                            <?php 

                                $sql= "SELECT scl.cid, scl.sem,scl.course_type_id,scl.year,cl.cname,course_types.name,course_types.is_gradable from student_course_alloted_log as scl inner join course_log as cl on scl.cid=cl.cid inner join course_types on cl.course_type_id=course_types.id where scl.email_id='{$_SESSION['email']}'";
                                $result=mysqli_query($conn,$sql);
                                $count=0;

                                while($row=mysqli_fetch_array($result)){

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

                                            $sql1="SELECT scgl.marks,scgl.complete_status,scgl.student_attendance from student_courses_grade_log as scgl,student_course_alloted_log as scl where scgl.email_id='{$_SESSION['email']}' AND scgl.cid='$cid' and scgl.course_type_id='$course_type_id' AND scgl.sem='$sem' and scgl.year='$year'";
                                            $result1= mysqli_query($conn,$sql1);
                                            while($row1=mysqli_fetch_array($result1))
                                            {  ?>
                                                
                                                <td> <?php echo $row1['marks']; ?> </td>
                                                <td> <?php echo $row1['complete_status']; ?> </td>
                                                <td> <?php echo $row1['student_attendance']; ?> </td>
                                                </tr>
                                            
                                            <?php
                                            } 

                                        }

                                        else{
                                                $sql2="SELECT scngl.complete_status,scngl.student_attendance from student_courses_nongrade_log as scngl,student_course_alloted_log as scl where scngl.email_id='{$_SESSION['email']}' AND scngl.cid='$cid' and scngl.course_type_id='$course_type_id' AND scngl.sem='$sem' and scngl.year='$year'";
                                                $result2= mysqli_query($conn,$sql1);
                                                while($row2=mysqli_fetch_array($result2)){
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

    <?php include('../includes/footer.php');
    include('../includes/scripts.php');
    ?>