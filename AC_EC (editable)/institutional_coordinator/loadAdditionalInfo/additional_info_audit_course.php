<?php
 session_start();
 if(isset($_SESSION['email']) && $_SESSION['role']=='inst_coor'){
    include_once('../../config.php');
    $data = json_decode(file_get_contents("php://input"),true); 
    if($data['type']=="current"){
        $cid=$data['cid'];
        $sem=$data['sem'];
        $result = mysqli_query($conn,"select academic_year from current_sem_info WHERE currently_active=1");
        $row=mysqli_fetch_assoc($result);
        $year=$row['academic_year'];
        $sql="SELECT timestamp,email_id FROM audit_course WHERE cid='$cid' AND sem='$sem' AND year='$year'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $timestamp=date_format(date_create($row['timestamp']),'d-M-Y h:i:s A');
        $email_id=$row['email_id'];
        $sql="(SELECT cname,oldcid,oldsem,oldyear FROM audit_course INNER JOIN audit_map
              ON newcid='$cid' AND newsem='$sem' AND newyear='$year' AND oldcid=cid AND oldsem=sem AND oldyear=year)
              UNION
              (SELECT cname,oldcid,oldsem,oldyear FROM audit_course_log INNER JOIN audit_map
              ON newcid='$cid' AND newsem='$sem' AND newyear='$year' AND oldcid=cid AND oldsem=sem AND oldyear=year)
              ";
        $result=mysqli_query($conn,$sql);
        $similar_courses="";
        if(mysqli_num_rows($result)==0){
            $similar_courses="<p><i><small>No similar courses found</small></i></p>";
        }else{
            $i=1;
            while($row=mysqli_fetch_assoc($result)){
                $similar_courses.="<p><small>".$i.") ".$row['cname']." (Course ID: ".$row['oldcid']." , Sem: ".$row['oldsem']." , Year: ".$row['oldyear'].")</small></p>";
                $i++;
            }
        }
        $sql="SELECT post,fname,mname,lname,faculty_code FROM faculty_audit fa INNER JOIN faculty f ON fa.cid='$cid' AND fa.sem='$sem' AND fa.year='$year' AND fa.email_id=f.email_id";
        $result=mysqli_query($conn,$sql);
        $faculty_info="";
        if(mysqli_num_rows($result)==0){
            $faculty_info="<p><i><small>No faculties found for this course</small></i></p>";
        }else{
            $i=1;
            while($row=mysqli_fetch_assoc($result)){
                $faculty_info.="<p><small>".$i.") ".$row['post'].". ".$row['fname']." ".$row['mname']." ".$row['lname']." (".$row['faculty_code'].")</small></p>";
                $i++;
            }
        }
        echo '
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="added_by"><b>Added by: </b></label>
                    <small><span>'.$email_id.'</span></small>
                </div>
                <div class="form-group col-md-4">
                    <label for="added_on"><b>Added on: </b></label>
                    <small><span>'.$timestamp.'</span></small>
                </div>
                <div class="form-group col-md-4">
                    <label for="syllabus"><b>Syllabus: </b></label>
                    <a href="#">Download</a>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="similar_courses_info"><b>Similar Courses Info: </b></label>'
                    .$similar_courses.'
                </div>
                <div class="form-group col-md-6">
                    <label for="faculties_assigned"><b>Faculties assigned: </b></label>'
                    .$faculty_info.'
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="added_by"><b>Enrolled Students: </b></label>
                    <a href="#"><small>View</small></a>
                </div>
            </div>
        ';
    }else if($data['type']=='upcoming'){
        $cid=$data['cid'];
        $sem=$data['sem'];
        $year=$data['year'];
        $sql="SELECT timestamp,email_id FROM audit_course WHERE cid='$cid' AND sem='$sem' AND year='$year'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $timestamp=date_format(date_create($row['timestamp']),'d-M-Y h:i:s A');
        $email_id=$row['email_id'];
        $sql="(SELECT cname,oldcid,oldsem,oldyear FROM audit_course INNER JOIN audit_map
              ON newcid='$cid' AND newsem='$sem' AND newyear='$year' AND oldcid=cid AND oldsem=sem AND oldyear=year)
              UNION
              (SELECT cname,oldcid,oldsem,oldyear FROM audit_course_log INNER JOIN audit_map
              ON newcid='$cid' AND newsem='$sem' AND newyear='$year' AND oldcid=cid AND oldsem=sem AND oldyear=year)
              ";
        $result=mysqli_query($conn,$sql);
        $similar_courses="";
        if(mysqli_num_rows($result)==0){
            $similar_courses="<p><i><small>No similar courses found</small></i></p>";
        }else{
            $i=1;
            while($row=mysqli_fetch_assoc($result)){
                $similar_courses.="<p><small>".$i.") ".$row['cname']." (Course ID: ".$row['oldcid']." , Sem: ".$row['oldsem']." , Year: ".$row['oldyear'].")</small></p>";
                $i++;
            }
        }
        $sql="SELECT post,fname,mname,lname,faculty_code FROM faculty_audit fa INNER JOIN faculty f ON fa.cid='$cid' AND fa.sem='$sem' AND fa.year='$year' AND fa.email_id=f.email_id";
        $result=mysqli_query($conn,$sql);
        $faculty_info="";
        if(mysqli_num_rows($result)==0){
            $faculty_info="<p><i><small>No faculties found for this course</small></i></p>";
        }else{
            $i=1;
            while($row=mysqli_fetch_assoc($result)){
                $faculty_info.="<p><small>".$i.") ".$row['post'].". ".$row['fname']." ".$row['mname']." ".$row['lname']." (".$row['faculty_code'].")</small></p>";
                $i++;
            }
        }
        echo '
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="added_by"><b>Added by: </b></label>
                    <small><span>'.$email_id.'</span></small>
                </div>
                <div class="form-group col-md-4">
                    <label for="added_on"><b>Added on: </b></label>
                    <small><span>'.$timestamp.'</span></small>
                </div>
                <div class="form-group col-md-4">
                    <label for="syllabus"><b>Syllabus: </b></label>
                    <a href="#">Download</a>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="similar_courses_info"><b>Similar Courses Info: </b></label>'
                    .$similar_courses.'
                </div>
                <div class="form-group col-md-6">
                    <label for="faculties_assigned"><b>Faculties assigned: </b></label>'
                    .$faculty_info.'
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="added_by"><b>Enrolled Students: </b></label>
                    <a href="#"><small>View</small></a>
                </div>
            </div>
        '; 
    }else if($data['type']=='previous'){
        $cid=$data['cid'];
        $sem=$data['sem'];
        $year=$data['year'];
        $sql="SELECT timestamp,email_id FROM audit_course_log WHERE cid='$cid' AND sem='$sem' AND year='$year'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $timestamp=date_format(date_create($row['timestamp']),'d-M-Y h:i:s A');
        $email_id=$row['email_id'];
        $sql="SELECT cname,oldcid,oldsem,oldyear FROM audit_course_log INNER JOIN audit_map
              ON newcid='$cid' AND newsem='$sem' AND newyear='$year' AND oldcid=cid AND oldsem=sem AND oldyear=year
              ";
        $result=mysqli_query($conn,$sql);
        $similar_courses="";
        if(mysqli_num_rows($result)==0){
            $similar_courses="<p><i><small>No similar courses found</small></i></p>";
        }else{
            $i=1;
            while($row=mysqli_fetch_assoc($result)){
                $similar_courses.="<p><small>".$i.") ".$row['cname']." (Course ID: ".$row['oldcid']." , Sem: ".$row['oldsem']." , Year: ".$row['oldyear'].")</small></p>";
                $i++;
            }
        }
        $sql="SELECT post,fname,mname,lname,faculty_code FROM faculty_audit fa INNER JOIN faculty f ON fa.cid='$cid' AND fa.sem='$sem' AND fa.year='$year' AND fa.email_id=f.email_id";
        $result=mysqli_query($conn,$sql);
        $faculty_info="";
        if(mysqli_num_rows($result)==0){
            $faculty_info="<p><i><small>No faculties found for this course</small></i></p>";
        }else{
            $i=1;
            while($row=mysqli_fetch_assoc($result)){
                $faculty_info.="<p><small>".$i.") ".$row['post'].". ".$row['fname']." ".$row['mname']." ".$row['lname']." (".$row['faculty_code'].")</small></p>";
                $i++;
            }
        }
        echo '
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="added_by"><b>Added by: </b></label>
                    <small><span>'.$email_id.'</span></small>
                </div>
                <div class="form-group col-md-4">
                    <label for="added_on"><b>Added on: </b></label>
                    <small><span>'.$timestamp.'</span></small>
                </div>
                <div class="form-group col-md-4">
                    <label for="syllabus"><b>Syllabus: </b></label>
                    <a href="#">Download</a>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="similar_courses"><b>Similar Courses Info: </b></label>'
                    .$similar_courses.'
                </div>
                <div class="form-group col-md-6">
                    <label for="faculties_assigned"><b>Faculties assigned: </b></label>'
                    .$faculty_info.'
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="added_by"><b>Enrolled Students: </b></label>
                    <a href="#"><small>View</small></a>
                </div>
            </div>
        ';
    }
 }
?>