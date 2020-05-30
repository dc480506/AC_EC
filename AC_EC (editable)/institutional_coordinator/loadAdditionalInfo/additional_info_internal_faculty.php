<?php
 session_start();
 if(isset($_SESSION['email']) && $_SESSION['role']=='inst_coor'){
    include_once('../../config.php');
    $data = json_decode(file_get_contents("php://input"),true); 
    if($data['type']=="faculty"){
        $faculty_code=$data['faculty_code'];
        $result = mysqli_query($conn,"select academic_year from current_sem_info WHERE currently_active=1");
        $row=mysqli_fetch_assoc($result);
        $year=$row['academic_year'];
        // $sql="SELECT timestamp,added_by FROM student_info WHERE faculty_code='$faculty_code'";
        $sql="SELECT `timestamp`,`added_by` FROM faculty WHERE faculty_code='$faculty_code'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $timestamp=date_format(date_create($row['timestamp']),'d-M-Y h:i:s A');
        $added_by=$row['added_by'];
       
        // $sql="SELECT post,fname,mname,lname,faculty_code FROM faculty_audit fa INNER JOIN faculty f ON fa.cid='$cid' AND fa.sem='$sem' AND fa.year='$year' AND fa.email_id=f.email_id";
        // $result=mysqli_query($conn,$sql);
        // $faculty_info="";
        // if(mysqli_num_rows($result)==0){
        //     $faculty_info="<p><i><small>No faculties found for this course</small></i></p>";
        // }else{
        //     $i=1;
        //     while($row=mysqli_fetch_assoc($result)){
        //         $faculty_info.="<p><small>".$i.") ".$row['post'].". ".$row['fname']." ".$row['mname']." ".$row['lname']." (".$row['faculty_code'].")</small></p>";
        //         $i++;
        //     }
        // }
        echo '
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="added_by"><b>Added by: </b></label>
                    <small><span>'.$added_by.'</span></small>
                </div>
                <div class="form-group col-md-4">
                    <label for="added_on"><b>Added on: </b></label>
                    <small><span>'.$timestamp.'</span></small>
                </div>
                <div class="form-group col-md-4">
                    <label for="profile"><b>Profile: </b></label>
                    <a href="#">View</a>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Courses_info"><b>Courses Info: </b></label>
                    <a href="#">View</a>
                </div>
            </div>
        ';
    }
 }
?>