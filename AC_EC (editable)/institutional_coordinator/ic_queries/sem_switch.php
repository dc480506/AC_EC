<?php
session_start();
if (isset($_SESSION['email']) && ($_SESSION['role'] == 'inst_coor')) {
    include_once("../../config.php");
    //update sem info in current sem info
    $currentSemSql = "select * from current_sem_info where currently_active=1";
    $current_sem = mysqli_fetch_assoc(mysqli_query($conn, $currentSem));
    $sem_type = $current_sem["sem_type"] == "EVEN" ? "ODD" : "EVEN";
    $curr_acad_year = explode("-", $current_sem['academic_year']);
    $academic_year = $current_sem['academic_year'];
    if ($sem_type == "ODD") {
        $academic_year = ((int)$curr_acad_year[0] + 1) . "-" . ((int)$curr_acad_year[1] + 1);
    }
    $timestamp = date("Y-m-d H:i:s");
    $currentSemInactiveSql = "update current_sem_info set currently_active=0 , ended_on='$timestamp' where currently_active=1";
    $startNewSem = "insert into current_sem_info(sem_type,academic_year,started_on,email_id) values('$sem_type','$academic_year','$timestamp','{$_SESSION['email']}')";


    //update students sem and move last sem students to log
    $studentUpdateSql = "update student set current_sem = current_sem+1";
    $sem_to_delete = $last_sem + 1;
    $moveStudentsToLog = "insert into student_log(email_id,rollno,fname,mname,lname,year_of_admission,dept_id,program,adding_email_id,timestamp) 
                          values
                          select email_id,rollno,fname,mname,lname,year_of_admission,dept_id,program,adding_email_id,timestamp from student where current_sem=$sem_to_delete";
    $delete_role = "delete from login_role where email_id in (select email_id from students where current_sem = $sem_to_delete)";
    $removeStudents = "delete from students where current_sem = $sem_to_delete";


    //update courses for next sem
    $moveActiveCoursesToLog = "insert into course_log(cid,sem,year,course_type_id,cname,program,min,max,email_id,timestamp,syllabus_path,is_gradable,upload_timestamp) 
                                values
                                select cid,sem,year,course_type_id,cname,program,min,max,email_ id,timestamp,syllabus_path,is_gradable,upload_timestamp
                                from course where currently_active=1";
    $deleteActiveCourses = "delete from course where currently_active=1";
    $makeinactiveCoursesActive = "update course set currently_active=1 where currently_active=0";
    $moveActiveCourseApplicableDeptToLog = "insert into course_applicable_dept_log values 
                                            select * from course_applicable_dept where (cid,sem,year,course_type_id,program) in 
                                            (select cid,sem,year,course_type_id,program from course where currently_active=1)";
    $moveActiveCourseFloatingDeptToLog = "insert into course_floating_dept_log values 
                                            select * from course_floating_dept where (cid,sem,year,course_type_id,program) in 
                                            (select cid,sem,year,course_type_id,program from course where currently_active=1)";
    $moveFacultyAllotmentToLog = "insert into faculty_course_alloted_log values 
                                 select email_id,cid,course_type_id,sem,year from faculty_course_alloted where currently_active=1";
    $deleteActiveFacultyAllotment = "delete from faculty_course_alloted where currently_active=1";
    $makeinactiveFacultyAllotmentActive = "update faculty_course_alloted set currently_active=1 where currently_active=0";

    //update forms

    $updateForms = "update form set currently_active=currently_active+1 where currently_active in (0,1)";
    $moveStudent_form_to_log = "insert into student_form_log values (select * from student_form where currently_active = 1)";
    $delete_old_from_student_form = "delete from student_from where currently_active=1";
    $updateStudent_form = "update student_form set currently_active=1 where currently_active=0";

    //adding cols to student preferences log
    $npre = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) as total_cols FROM information_schema.columns WHERE table_name = 'student_preferences'"))['total_cols'];
    $npre = $npre - $other_pref_cols_audit_count;

    $numColsResult = mysqli_query($conn, "SELECT count(*) as total_cols FROM information_schema.columns WHERE table_name = 'student_preferences_log'");

    $total_cols_table = mysqli_fetch_assoc($numColsResult);
    ['total_cols'];
    $current_pref_columns = $total_cols_table - $other_pref_cols_audit_count - 1;
    if ($npre > $current_pref_columns) {
        $new_col_no = $current_pref_columns + 1;
        $after_col_num = $current_pref_columns;
        $add_cols = " ";
        for ($i = 0; $i < $npre - $current_pref_columns; $i++) {
            $add_cols .= ' ADD COLUMN `pref' . $new_col_no . '` VARCHAR(15) NOT NULL DEFAULT ("") AFTER `pref' . $after_col_num . '`,';
            $new_col_no++;
            $after_col_num++;
        }
        $sql = "ALTER TABLE student_preferences_log" . substr($add_cols, 0, strlen($add_cols) - 1);
        mysqli_query($conn, $sql);
    }
    $prefs = "";
    for ($i = 1; $i <= $npre; $i++) {
        $prefs += "pref$i,";
    }
    $prefs = substr($prefs, strlen($prefs) - 1);
    $movepreferences = "insert into student_preferences_log(email_id,form_id,sem,year,rollno,timestamp,allocate_status,no_of_valid_preferences,$prefs) values select email_id,form_id,sem,year,rollno,timestamp,allocate_status,no_of_valid_preferences,$prefs from student_preferences where currently_active=1";
    $deletePreferences = "delete from student_preferences where currently_active=1";
    $updatePreferences = "update student_preferences set currently_active=1 where currently_active=0";

    $movecourseAlloted = "insert into student_course_alloted_log values select * from student_course_alloted where currently_active=1";
    $deletFromCoursesAlloted = "delete from student_course_alloted where currently_active=1";
    $updateCoursesAlloted = "update student_course_alloted set currently_active=1 where currently_active=0";


    $movecourseGrade = "insert into student_course_grade_log values select email_id, cid,course_type_id,sem,year,marks,complete_status,student_attendance from student_course_grade where currently_active=1";
    $deletFromCourseGrade = "delete from student_course_grade where currently_active=1";
    $updateCourseGrade = "update student_course_grade set currently_active=1 where currently_active=0";

    mysqli_autocommit($conn, FALSE);

    mysqli_query($conn, $currentSemInactiveSql) or die(mysqli_error($conn));
    mysqli_query($conn, $startNewSem) or die(mysqli_error($conn));


    mysqli_query($conn, $studentUpdateSql) or die(mysqli_error($conn));
    mysqli_query($conn, $moveStudentsToLog) or die(mysqli_error($conn));
    mysqli_query($conn, $delete_role) or die(mysqli_error($conn));
    mysqli_query($conn, $removeStudents) or die(mysqli_error($conn));


    mysqli_query($conn, $moveActiveCoursesToLog) or die(mysqli_error($conn));
    mysqli_query($conn, $deleteActiveCourses) or die(mysqli_error($conn));
    mysqli_query($conn, $makeinactiveCoursesActive) or die(mysqli_error($conn));
    mysqli_query($conn, $moveActiveCourseApplicableDeptToLog) or die(mysqli_error($conn));
    mysqli_query($conn, $moveActiveCourseFloatingDeptToLog) or die(mysqli_error($conn));

    mysqli_query($conn, $moveFacultyAllotmentToLog) or die(mysqli_error($conn));
    mysqli_query($conn, $deleteActiveFacultyAllotment) or die(mysqli_error($conn));
    mysqli_query($conn, $makeinactiveFacultyAllotmentActive) or die(mysqli_error($conn));

    mysqli_query($conn, $updateForms) or die(mysqli_error($conn));
    mysqli_query($conn, $moveStudent_form_to_log) or die(mysqli_error($conn));
    mysqli_query($conn, $delete_old_from_student_form) or die(mysqli_error($conn));
    mysqli_query($conn, $updateStudent_form) or die(mysqli_error($conn));

    mysqli_query($conn, $movepreferences) or die(mysqli_error($conn));
    mysqli_query($conn, $deletePreferences) or die(mysqli_error($conn));
    mysqli_query($conn, $updatePreferences) or die(mysqli_error($conn));

    mysqli_query($conn, $movecourseAlloted) or die(mysqli_error($conn));
    mysqli_query($conn, $deletFromCoursesAlloted) or die(mysqli_error($conn));
    mysqli_query($conn, $updateCoursesAlloted) or die(mysqli_error($conn));

    mysqli_query($conn, $movecourseGrade) or die(mysqli_error($conn));
    mysqli_query($conn, $deletFromCourseGrade) or die(mysqli_error($conn));
    mysqli_query($conn, $updateCourseGrade) or die(mysqli_error($conn));

    if (!mysqli_commit($conn)) {
        die("error");
        // mysqli_autocommit($conn, TRUE);
        exit();
    }
    mysqli_close($conn);
    // mysqli_autocommit($conn, TRUE);
    echo "done";
}
