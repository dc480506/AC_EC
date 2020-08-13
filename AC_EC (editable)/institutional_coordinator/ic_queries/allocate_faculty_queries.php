<?php

require_once __DIR__."../../utils/email_queue.php";
include_once("../../Logger/CourseLogger.php");
$logger = CourseLogger::getLogger();
session_start();
$insertFlag=false;
$allowed_roles = array("inst_coor", "faculty_co", "HOD");
if (isset($_SESSION['email']) && in_array($_SESSION['role'], $allowed_roles))  {
  include_once("../../config.php");
  if (isset($_POST['faculty_unallocate']) || isset($_POST['faculty_unallocate_upcoming']) || isset($_POST['faculty_unallocate_log'])) {
    $cid = mysqli_escape_string($conn, $_POST['cid']);
    $sem = mysqli_escape_string($conn, $_POST['sem']);
    $year = mysqli_escape_string($conn, $_POST['year']);
    $email_id = mysqli_escape_string($conn, $_POST['email_id']);
    $program = mysqli_escape_string($conn, $_POST['program']);
    $course_type_id = mysqli_escape_string($conn, $_POST['course_type_id']);

    
  
    $course_type_name=$_SESSION['course_type_name'];
    $affectedCourse=$cid." sem ".$sem." year ".$year." of ".$course_type_name; 

    if ($email_id != "null") {
      if (isset($_POST['faculty_unallocate'])) {
        $sql = "DELETE FROM faculty_course_alloted WHERE cid='$cid' AND sem='$sem' AND year='$year' AND email_id='$email_id'  AND course_type_id='$course_type_id' AND currently_active='1'";
        $active_status="Current";
        $logger->courseFacultyDeleted($_SESSION['email'],$email_id, $affectedCourse,$active_status);
      } else if (isset($_POST['faculty_unallocate_upcoming'])) {
        $sql = "DELETE FROM faculty_course_alloted WHERE cid='$cid' AND sem='$sem' AND year='$year' AND email_id='$email_id'  AND course_type_id='$course_type_id' AND currently_active='0'";
        $active_status="Upcoming";
        $logger->courseFacultyDeleted($_SESSION['email'],$email_id, $affectedCourse,$active_status);
      } else if (isset($_POST['faculty_unallocate_log'])) {
        $sql = "DELETE FROM faculty_course_alloted_log WHERE cid='$cid' AND sem='$sem' AND year='$year'  AND course_type_id='$course_type_id' AND email_id='$email_id'";
        $active_status="Previous";
        $logger->courseFacultyDeleted($_SESSION['email'],$email_id, $affectedCourse,$active_status);
      }
      mysqli_query($conn, $sql);
    }

    if (isset($_POST['faculty_unallocate'])) {
      $sql = "SELECT email_id, faculty_code, fname,mname,lname FROM faculty_course_alloted NATURAL JOIN faculty WHERE cid = '$cid' AND sem = '$sem' AND year = '$year' AND course_type_id='$course_type_id' AND currently_active='1'";
    } else if (isset($_POST['faculty_unallocate_upcoming'])) {
      $sql = "SELECT email_id, faculty_code, fname,mname,lname FROM faculty_course_alloted NATURAL JOIN faculty WHERE cid = '$cid' AND sem = '$sem' AND year = '$year' AND course_type_id='$course_type_id' AND currently_active='0'";
    } else if (isset($_POST['faculty_unallocate_log'])) {
      $sql = "SELECT email_id, faculty_code, fname,mname,lname FROM faculty_course_alloted_log NATURAL JOIN faculty WHERE cid = '$cid' AND sem = '$sem' AND year = '$year' AND course_type_id='$course_type_id'";
    }

    $result = mysqli_query($conn, $sql);

    $faculty_div = "";
    $faculties_allocated_temp = "(";
    $i = 1;

    if (mysqli_num_rows($result) == 0) {
      $faculty_div .= 'No Faculty Allocated';
      $faculties_allocated_temp .= "'',";
    }

    while ($row = mysqli_fetch_assoc($result)) {
      $faculties_allocated_temp .= "'" . $row['email_id'] . "',";
      $email = $row['email_id'];
      $faculty_div .= '<button data-toggle="modal" data-target="#deleteFacultyModal" data-email_id="' . $email . '" data-year="' . $year . '" data-cid="' . $cid . '" data-sem="' . $sem . '" id="unallocate_faculty_btn' . $i . '" type="button" class="btn icon-btn" name="unallocate_faculty" value="' . $email . '"><i class="fas fa-trash"></i>
                          </button>
                          <label for="sem"><b>Faculty ' . $i . ' : </b>
                          </label>
                          <span> ' . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ( ' . $row['faculty_code'] . ' ) </span>
                          <br>';
      $i = $i + 1;
    }
    $faculties_allocated_temp = substr($faculties_allocated_temp, 0, strlen($faculties_allocated_temp) - 1);
    $faculties_allocated_temp .= ")";
    echo "{$faculties_allocated_temp}+{$faculty_div}";
    exit();
  } else if (isset($_POST['allocate_faculty_audit']) || isset($_POST['allocate_faculty_audit_upcoming']) || isset($_POST['allocate_faculty_audit_log'])) {
    $cid = mysqli_escape_string($conn, $_POST['cid']);
    $sem = mysqli_escape_string($conn, $_POST['sem']);
    $year = mysqli_escape_string($conn, $_POST['year']);
    $email_id = mysqli_escape_string($conn, $_POST['email_id']);
    $program = mysqli_escape_string($conn, $_POST['program']);
    $course_type_id = mysqli_escape_string($conn, $_POST['course_type_id']);
    $course_type_name=$_SESSION['course_type_name'];
    $affectedCourse=$cid." sem ".$sem." year ".$year." of ".$course_type_name; 

    if (isset($_POST['allocate_faculty_audit'])) {
      $sql = "INSERT INTO faculty_course_alloted VALUES ('$email_id','$cid','$course_type_id','$sem','$year','1')";
      $insertFlag = true;
      $active_status="Current";
      $logger->courseFacultyInserted($_SESSION['email'],$email_id, $affectedCourse,$active_status);
     
    } else if (isset($_POST['allocate_faculty_audit_upcoming'])) {
      $sql = "INSERT INTO faculty_course_alloted VALUES ('$email_id','$cid','$course_type_id','$sem','$year','0')";
      $insertFlag = true;
      $active_status="Upcoming";
      $logger->courseFacultyInserted($_SESSION['email'],$email_id, $affectedCourse,$active_status);
    
    } else if (isset($_POST['allocate_faculty_audit_log'])) {
      $sql = "INSERT INTO faculty_course_alloted_log VALUES ('$email_id','$cid','$course_type_id','$sem','$year')";
      // echo $sql;
      $insertFlag = true;
      $active_status="Previous";
      $logger->courseFacultyInserted($_SESSION['email'],$email_id, $affectedCourse,$active_status);
      

    }

    $result = mysqli_query($conn, $sql) or die($sql);
    if($result){
      if($insertFlag){
        EmailQueue::getInstance()->sendCourseAllotmentEmailToFaculty($email_id,$cid,$sem,$year,$program,$course_type_id);
      }
    }
  

    if (isset($_POST['allocate_faculty_audit'])) {
      $sql = "SELECT email_id, faculty_code, fname,mname,lname FROM faculty_course_alloted NATURAL JOIN faculty WHERE cid = '$cid' AND sem = '$sem' AND year = '$year' AND course_type_id='$course_type_id' AND currently_active='1'";
    } else if (isset($_POST['allocate_faculty_audit_upcoming'])) {
      $sql = "SELECT email_id, faculty_code, fname,mname,lname FROM faculty_course_alloted NATURAL JOIN faculty WHERE cid = '$cid' AND sem = '$sem' AND year = '$year' AND course_type_id='$course_type_id' AND currently_active='0'";
    } else if (isset($_POST['allocate_faculty_audit_log'])) {
      $sql = "SELECT email_id, faculty_code, fname,mname,lname FROM faculty_course_alloted_log NATURAL JOIN faculty WHERE cid = '$cid' AND sem = '$sem' AND year = '$year' AND course_type_id='$course_type_id'";
    }

    $faculty_div = "";
    $faculties_allocated_temp = "(";
    $i = 1;

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
      $faculty_div .= 'No Faculty Allocated';
      $faculties_allocated_temp .= "'',";
    }



    while ($row = mysqli_fetch_assoc($result)) {
      $faculties_allocated_temp .= "'" . $row['email_id'] . "',";
      $email = $row['email_id'];
      $faculty_div .= '<button data-toggle="modal" data-target="#deleteFacultyModal" data-email_id="' . $email . '" data-year="' . $year . '" data-cid="' . $cid . '" data-sem="' . $sem . '" id="unallocate_faculty_btn' . $i . '" type="button" class="btn icon-btn" name="unallocate_faculty" value="' . $email . '"><i class="fas fa-trash"></i>
                        </button>
                        <label for="sem"><b>Faculty ' . $i . ' : </b>
                        </label>
                        <span> ' . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ( ' . $row['faculty_code'] . ' ) </span>
                        <br>';
      $i = $i + 1;
    }
    $faculties_allocated_temp = substr($faculties_allocated_temp, 0, strlen($faculties_allocated_temp) - 1);
    $faculties_allocated_temp .= ")";
    echo "{$faculties_allocated_temp}+{$faculty_div}";
    exit();
  }
}
