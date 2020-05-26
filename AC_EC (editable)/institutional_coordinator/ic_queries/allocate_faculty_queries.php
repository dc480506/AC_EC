
<?php
  session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=="inst_coor"){
  include_once("../../config.php");
  if(isset($_POST['faculty_unallocate']) || isset($_POST['faculty_unallocate_upcoming']) || isset($_POST['faculty_unallocate_log'])){
    $cid=mysqli_escape_string($conn,$_POST['cid']);
    $sem=mysqli_escape_string($conn,$_POST['sem']);
    $year=mysqli_escape_string($conn,$_POST['year']);
    $email_id=mysqli_escape_string($conn,$_POST['email_id']);

    if($email_id != "null") {
      if(isset($_POST['faculty_unallocate'])) {
        $sql="DELETE FROM faculty_audit WHERE cid='$cid' AND sem='$sem' AND year='$year' AND email_id='$email_id' AND currently_active='1'";
      } else if(isset($_POST['faculty_unallocate_upcoming'])) {
        $sql="DELETE FROM faculty_audit WHERE cid='$cid' AND sem='$sem' AND year='$year' AND email_id='$email_id' AND currently_active='0'";
      } else if(isset($_POST['faculty_unallocate_log'])) {
        $sql="DELETE FROM faculty_audit_log WHERE cid='$cid' AND sem='$sem' AND year='$year' AND email_id='$email_id'";
      }
      mysqli_query($conn,$sql);
    }

    if(isset($_POST['faculty_unallocate'])) {
      $sql = "SELECT email_id, faculty_code, fname FROM faculty_audit NATURAL JOIN faculty WHERE cid = '$cid' AND sem = '$sem' AND year = '$year' AND currently_active='1'";
    } else if(isset($_POST['faculty_unallocate_upcoming'])) {
      $sql = "SELECT email_id, faculty_code, fname FROM faculty_audit NATURAL JOIN faculty WHERE cid = '$cid' AND sem = '$sem' AND year = '$year' AND currently_active='0'";
    } else if(isset($_POST['faculty_unallocate_log'])) {
      $sql = "SELECT email_id, faculty_code, fname FROM faculty_audit_log NATURAL JOIN faculty WHERE cid = '$cid' AND sem = '$sem' AND year = '$year'";
    }

    $result = mysqli_query($conn, $sql);

        $faculty_div = "";
        $faculties_allocated_temp = "(";
        $i = 1;

        if(mysqli_num_rows($result) == 0) {
            $faculty_div .= 'No Faculty Allocated';
            $faculties_allocated_temp .= "'',";
        }

        while ($row = mysqli_fetch_assoc($result)) {
          $faculties_allocated_temp .= "'". $row['email_id']. "',";
          $email = $row['email_id'];
          $faculty_div .= '<button data-toggle="modal" data-target="#deleteFacultyModal" data-email_id="'.$email.'" data-year="'.$year.'" data-cid="'.$cid.'" data-sem="'.$sem.'" id="unallocate_faculty_btn'.$i.'" type="button" class="btn icon-btn" name="unallocate_faculty" value="'.$email.'"><i class="fas fa-trash"></i>
                          </button>
                          <label for="sem"><b>Faculty ' . $i . ' : </b>
                          </label>
                          <span> ' . $row['fname'] . '( ' . $row['faculty_code'] .' ) </span>
                          <br>';
                          $i = $i + 1;
        }
        $faculties_allocated_temp=substr($faculties_allocated_temp,0,strlen($faculties_allocated_temp)-1);
        $faculties_allocated_temp .= ")";
        echo "{$faculties_allocated_temp}+{$faculty_div}";
        exit();
  } else if(isset($_POST['allocate_faculty_audit']) || isset($_POST['allocate_faculty_audit_upcoming']) || isset($_POST['allocate_faculty_audit_log'])) {
      $cid=mysqli_escape_string($conn,$_POST['cid']);
      $sem=mysqli_escape_string($conn,$_POST['sem']);
      $year=mysqli_escape_string($conn,$_POST['year']);
      $email_id=mysqli_escape_string($conn,$_POST['email_id']);

      if(isset($_POST['allocate_faculty_audit'])) {
        $sql="INSERT INTO faculty_audit VALUES ('$email_id','$cid','$sem','$year','1')";
      } else if(isset($_POST['allocate_faculty_audit_upcoming'])) {
        $sql="INSERT INTO faculty_audit VALUES ('$email_id','$cid','$sem','$year','0')";
      } else if(isset($_POST['allocate_faculty_audit_log'])) {
        $sql="INSERT INTO faculty_audit_log VALUES ('$email_id','$cid','$sem','$year')";
      }

      mysqli_query($conn,$sql);

      if(isset($_POST['allocate_faculty_audit'])) {
        $sql = "SELECT email_id, faculty_code, fname FROM faculty_audit NATURAL JOIN faculty WHERE cid = '$cid' AND sem = '$sem' AND year = '$year' AND currently_active='1'";
      } else if(isset($_POST['allocate_faculty_audit_upcoming'])) {
        $sql = "SELECT email_id, faculty_code, fname FROM faculty_audit NATURAL JOIN faculty WHERE cid = '$cid' AND sem = '$sem' AND year = '$year' AND currently_active='0'";
      } else if(isset($_POST['allocate_faculty_audit_log'])) {
        $sql = "SELECT email_id, faculty_code, fname FROM faculty_audit_log NATURAL JOIN faculty WHERE cid = '$cid' AND sem = '$sem' AND year = '$year'";
      }

      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) == 0) {
          $faculty_div .= 'No Faculty Allocated';
          $faculties_allocated_temp .= "'',";
      }

      $faculty_div = "";
      $faculties_allocated_temp = "(";
      $i = 1;

      while ($row = mysqli_fetch_assoc($result)) {
        $faculties_allocated_temp .= "'". $row['email_id']. "',";
        $email = $row['email_id'];
        $faculty_div .= '<button data-toggle="modal" data-target="#deleteFacultyModal" data-email_id="'.$email.'" data-year="'.$year.'" data-cid="'.$cid.'" data-sem="'.$sem.'" id="unallocate_faculty_btn'.$i.'" type="button" class="btn icon-btn" name="unallocate_faculty" value="'.$email.'"><i class="fas fa-trash"></i>
                        </button>
                        <label for="sem"><b>Faculty ' . $i . ' : </b>
                        </label>
                        <span> ' . $row['fname'] . '( ' . $row['faculty_code'] .' ) </span>
                        <br>';
                        $i = $i + 1;
      }
      $faculties_allocated_temp=substr($faculties_allocated_temp,0,strlen($faculties_allocated_temp)-1);
      $faculties_allocated_temp .= ")";
      echo "{$faculties_allocated_temp}+{$faculty_div}";
      exit();
  }
}
?>