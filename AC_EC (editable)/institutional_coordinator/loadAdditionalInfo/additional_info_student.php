<?php
session_start();
$allowed_roles = array("inst_coor", "faculty_co", "HOD");
if (isset($_SESSION['email']) && in_array($_SESSION['role'], $allowed_roles)) {
    include_once('../../config.php');
    $data = json_decode(file_get_contents("php://input"), true);
    if ($data['type'] == "student") {
        $email_id = $data['email_id'];
        $result = mysqli_query($conn, "select academic_year from current_sem_info WHERE currently_active=1");
        $row = mysqli_fetch_assoc($result);
        $year = $row['academic_year'];
        // $sql="SELECT timestamp,adding_email_id FROM student_info WHERE email_id='$email_id'";
        $sql = "SELECT timestamp,adding_email_id FROM student WHERE email_id='$email_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $timestamp = date_format(date_create($row['timestamp']), 'd-M-Y h:i:s A');
        $adding_email_id = $row['adding_email_id'];
        $_SESSION['email_id'] = $email_id;
        echo '
            <div class="form-row px-auto">
                <div class="form-group col-md-4">
                    <label for="added_by"><b>Added by: </b></label>
                    <small><span>' . $adding_email_id . '</span></small>
                </div>
                <div class="form-group col-md-8">
                    <label for="added_on"><b>Added on: </b></label>
                    <small><span>' . $timestamp . '</span></small>
                </div>
                
                <div class="form-group col-md-2">  
                <a href="loadAdditionalInfo/additional_info_student_courses.php">          
                    <button type="submit" class="btn btn-primary" onClick="myfun()" role="button" id="student_courses">View Courses Info</button>    
                </a>  
                
                </div>
                <div class="form-group col-md-2">  
                <form method="POST" action="activityLog.php">
                <input type="hidden" name="userLogs" value="' . $email_id . '">
                <button type="submit" class="btn btn-primary" id="student_logs">View Activity Logs</button>
                </form>
                </div>
            </div>
        ';
    }
}
