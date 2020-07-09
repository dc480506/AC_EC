<?php 
include('../../config.php');
include_once('../verify.php');
?>



<?php
include('includes/header.php');
 include('includes/topbar1.php'); ?>

<?php

    $cid= $_SESSION['cid'];
    $sem=$_SESSION['sem'];
    $year=$_SESSION['year'];
    $active=$_SESSION['active'];
    // echo $cid .' ';
    // echo $sem.' ';
    // echo $year.' ';
    // echo $active;
    if($active==0 || $active==1){
        $query1 ="SELECT cname FROM course where cid='$cid'";
    }
    else{
        $query1 ="SELECT cname FROM course_log where cid='$cid'";
    }
    $result1 = mysqli_query($conn, $query1);
    if (!$result1) {
        printf("Error: %s\n", mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result1);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- Card Header -->
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5 class="font-weight-bold text-primary mb-0">
                        <?php 
                        echo 'Students Enrolled : ';
                        ?>
                    </h5>
                    <h5 class="font-weight text-primary mb-0">
                        <?php 
                        echo 'Course ID - '.$cid.'<br> Course name - '.$row['cname'].'<br>';
                        echo 'Semester '.$sem.' and Year '.$year ;
                        ?>
                    </h5>

                </div>
                <style>
                a:hover{
                    text-decoration:none;
                }
                </style>

                <div class="col-md-4 text-right">
                    <a id="go-back" href="../courses_landing.php?program=UG" >  
                        <button  class="btn btn-danger btn-icon-split" style="width:120px">
                        <span class="icon text-white-50 pull-left">
                         <i class="fas fa-angle-double-left"></i>
                        </span>
                        <span class="text">Back</span>
                        </button>
                    </a>    
                </div>
            </div>
        </div>
      
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable_students" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email Id</th>
                            <th>Roll No.</th>
                            <th>Attendance</th>
                            <th>Completion Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email Id</th>
                            <th>Roll No.</th>
                            <th>Attendance</th>
                            <th>Completion Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php 
                     
                     if($active==0 OR $active==1){
                        // echo 'active/upcoming hhhhhhhhhhhhhhhhhhhhhhhhhhhh';

                        // select c.cname, stu.fname as fname, stu.lname as lname, stu.email_id as email_id, stu.rollno as rollno , grade.student_attendance as student_attendance , stu_course.complete_status as complete_status from 
                        // course as c inner join student_course_alloted as stu_course 
                        // on c.cid=stu_course.cid inner join student as stu on stu.email_id=stu_course.email_id 
                        // inner join student_courses_grade as grade on stu.email_id=grade.email_id where 
                        // stu_course.currently_active=$active AND c.cid='$cid' AND stu_course.sem=$sem AND stu_course.year='$year'


                        $query="select c.cname, stu.fname as fname, stu.lname as lname, stu.email_id as email_id, stu.rollno as rollno , grade.student_attendance as student_attendance , stu_course.complete_status as complete_status from 
                        course as c inner join student_course_alloted as stu_course 
                        on c.cid=stu_course.cid inner join student as stu on stu.email_id=stu_course.email_id 
                        inner join student_courses_grade as grade on stu.email_id=grade.email_id where 
                        stu_course.currently_active=$active AND c.cid='$cid' AND stu_course.sem=$sem AND stu_course.year='$year'";
                                            $result = mysqli_query($conn, $query);
                    }
                
                    else{
                        // echo 'non active hhhhhhhhhhhhhhhhhhhhhhhhhhhh';

                        // select c.cname, stu.fname as fname, stu.lname as lname, stu.email_id as email_id, stu.rollno as rollno, grade.student_attendance as student_attendance , stu_course.complete_status as complete_status from 
                        // course_log as c inner join student_course_alloted_log as stu_course 
                        // on c.cid=stu_course.cid inner join student as stu on stu.email_id=stu_course.email_id 
                        // inner join student_courses_grade_log as grade on stu.email_id=grade.email_id 
                        // where c.cid='$cid' AND stu_course.sem=1 AND stu_course.year='$year'

                        $query="select c.cname,stu.fname as fname,stu.lname as lname,stu.email_id as email_id,stu.rollno as rollno ,grade.student_attendance as student_attendance ,stu_course.complete_status as complete_status from 
                        course_log as c inner join student_course_alloted_log as stu_course
                        on c.cid=stu_course.cid inner join student as stu on stu.email_id=stu_course.email_id 
                        inner join student_courses_grade_log as grade on stu.email_id=grade.email_id
                        where c.cid='$cid' AND stu_course.sem=$sem AND stu_course.year='$year'";
                                            $result = mysqli_query($conn, $query);

                    }
                    
                    
                    // $result = mysqli_query($conn, $query);
                    // echo $result;
                    if (!$result) {
                        printf("Error: %s\n", mysqli_error($conn));
                    }
                        $rowcount = mysqli_num_rows($result);
                        // echo $rowcount;
                       
                        if($rowcount>0){
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                    <tr>
                                        <td><?php echo $row['fname'].' '.$row['lname'] ;?></td>
                                        <td><?php echo $row['email_id'] ;?></td>
                                        <td><?php echo $row['rollno'] ;?></td>
                                        <td><?php echo $row['student_attendance'] ;?></td>
                                        <td><?php 
                                        if($row['complete_status']==1){
                                            echo 'C';

                                        }
                                        else{
                                            echo 'NC';
                                        }
                                        ?></td>
                                    </tr>
                                <?php
                                            // $rowcount++;    
                            }
                        }
                        else{?>
                                 <tr>
                                     <td valign="centre" colspan="18" class="dataTables_empty">No data available in table</td>
                                </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
       

   
    <!-- /.container-fluid -->
<!-- <script type="text/javascript">
    $(document).ready(function() {

            $('#dataTable_students').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',

            dom: '<"d-flex justify-content-between"fBl>tip',
            buttons: [{
                extend: 'excel',
                title: "student-data",
                text: '<span> <i class="fas fa-download "></i> CSV</span>',
                className: "btn btn-outline-primary  ",
                action: newExportAction,
                exportOptions: {
                    columns: [1, 2, 3, 4,5]
                },
            }, {
                extend: "pdfHtml5",
                title: "student-data",
                text: '<span> <i class="fas fa-download "></i> PDF</span>',
                className: "btn btn-outline-primary  mx-2",
                action: newExportAction,
                exportOptions: {
                    columns: [1, 2, 3, 4,5]
                },
            }],
            ajax: {
                'url': '../audit_course/loadInfo/additional_info_audit_course_students.php',
                type: "POST"
                }
            },
                "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]

        });

    });
</script> -->

 
    <?php
    include('includes/footer.php');
    include('includes/scripts.php');
    ?>