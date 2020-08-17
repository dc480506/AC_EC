<?php 
include('../../config.php');
include_once('../verify.php');
include_once("../../Logger/CourseLogger.php");
$logger = CourseLogger::getLogger();
?>



<?php
include('includes/header.php');
 include('includes/topbar1.php'); ?>

<?php

    $cid= $_SESSION['cid'];
    $course_type_id=$_SESSION['course_type_id'];
    $sem=$_SESSION['sem'];
    $year=$_SESSION['year'];
    $active=$_SESSION['active'];

    // $course_type_name=$_SESSION['course_type_name'];
    // $affectedCourse=$cid." sem ".$sem." year ".$year." of ".$course_type_name; 
    // unset($_SESSION['course_type_name']);  

    $affectedCourse=$cid." sem ".$sem." year ".$year; 
    $logger->addiCoursesRecordsViewed($_SESSION['email'], "student enrolled in course", $affectedCourse);

    if($active==0 || $active==1){
        $query1 ="SELECT cname FROM course where cid='$cid' AND sem=$sem AND year='$year' AND course_type_id=$course_type_id ";
    }
    else{
        $query1 ="SELECT cname FROM course_log where cid='$cid' AND sem=$sem AND year='$year' AND course_type_id=$course_type_id";
    }
    $result1 = mysqli_query($conn, $query1);
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
                    <a id="go-back" href="../audit_course.php" >  
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
                <table class="table table-bordered" id="dataTable-students" width="100%" cellspacing="0">
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
                </table>
            </div>
        </div>
    </div>
       

   
    <!-- /.container-fluid -->
<script type="text/javascript">
$(document).ready(function(){

    $('#dataTable-students').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        serverMethod: 'post',
        aaSorting: [],
        dom: '<"d-flex justify-content-between"fBl>tip',
        buttons: [{
            extend: 'excel',
            title: "student-data",
            text: '<span> <i class="fas fa-download "></i> CSV</span>',
            className: "btn btn-outline-primary  ",
            action: newExportAction,
            exportOptions: {
                columns: [0,1, 2, 3, 4]
            },
        }, {
            extend: "pdfHtml5",
            title: "student-data",
            text: '<span> <i class="fas fa-download "></i> PDF</span>',
            className: "btn btn-outline-primary  mx-2",
            action: newExportAction,
            exportOptions: {
                columns: [0,1, 2, 3, 4]
            },
        }],
        ajax: {
            // type: 'POST',
            'url': '../course/loadInfo/additional_info_course_students.php'
        },
        columns :[{
            data:'name'
            },
            {
                data:'email_id'
            },
            {
                data:'rollno'
            },
            {
                data:'student_attendance'
            },
            {
                data:'complete_status'
            }
        ],
        columnDefs:[{
                targets:[0,1,2,3,4],
                orderable: true, 
            }
        
        ],

    });

});
</script>

 
    <?php
    
    include('includes/footer.php');
    include('includes/scripts.php');
    ?>