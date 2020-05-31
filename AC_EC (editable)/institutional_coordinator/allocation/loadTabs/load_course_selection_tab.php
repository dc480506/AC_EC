<?php
//SELECT CONCAT('DROP TABLE `',t.table_name,'`;') AS stmt FROM delete_temp_tables as t (For cron)

 include_once('../../verify.php');
 include_once('../../../config.php');
 $_SESSION['algorithm_chosen']=$_POST['algo_selection'];
 $time=time();
 $hash=substr(hash_hmac('sha256', $time, $hash_key),0,6);
 $timestamp=date("Y-m-d H:i:s");
 $_SESSION['course_table']=$hash."_".$_SESSION['type']."_course";
//  echo $_SESSION['course_table'];
 $_SESSION['student_course_table']=$hash."_student_".$_SESSION['type'];
 mysqli_query($conn,"INSERT INTO delete_temp_tables VALUES ('".$_SESSION['course_table']."','".$timestamp."'),
        ('".$_SESSION['student_course_table']."','".$timestamp."')");
 $result=mysqli_query($conn,'CREATE TABLE '.$_SESSION['course_table'].' (
    `cid` varchar(30) NOT NULL,
    `sem` int(11) NOT NULL,
    `year` varchar(8) NOT NULL,
    `cname` varchar(50) NOT NULL,
    `currently_active` tinyint(4) NOT NULL DEFAULT 0,
    `min` int(11) NOT NULL,
    `max` int(11) NOT NULL,
    `no_of_allocated` int(11) NOT NULL DEFAULT 0,
    `email_id` varchar(50) NOT NULL,
    `timestamp` varchar(30) NOT NULL,
    PRIMARY KEY(cid,sem,year)
  )');
//   echo $result." yo";
  $preferences="";
  for($i=1;$i<=$_SESSION['no_of_preferences'];$i++){
      $preferences.='`pref'.$i.'` varchar(15) NOT NULL DEFAULT(""),';
  }
  mysqli_query($conn,'CREATE TABLE '.$_SESSION['student_course_table'].' (
    `email_id` varchar(50) NOT NULL,
    `sem` int(11) NOT NULL,
    `year` varchar(8) NOT NULL,
    `rollno` varchar(20) NOT NULL,
    `timestamp` varchar(30) NOT NULL,
    `allocate_status` tinyint(4) NOT NULL DEFAULT 0,
    `no_of_valid_preferences` int(11) NOT NULL,
    '.$preferences.'
    PRIMARY KEY(email_id,sem,year)
  )');
  mysqli_query($conn,'INSERT INTO '.$_SESSION['course_table'].
  ' (`cid`, `sem`, `year`, `cname`, `currently_active`, `min`, `max`, `no_of_allocated`, `email_id`, `timestamp`)
  SELECT cid,sem,year,cname,currently_active,min,max,no_of_allocated,email_id,timestamp 
  FROM '.$_SESSION['type'].'_course WHERE sem="'.$_SESSION['sem'].'" AND year="'.$_SESSION['year'].'"
  ');
?>
<div class="tab-pane fade show active" id="nav-course" role="tabpanel" aria-labelledby="nav-course-tab">
    <form class="forms-sample" method="POST" action="">
        <div class="form-row mt-4">
            <div class="form-group col-md-3">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label font-weight-bold text-primary text-uppercase mb-1" for="customSwitch1">All Courses</label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label font-weight-bold text-primary text-uppercase mb-1" for="customSwitch1">Introduction to Python for Data Science</label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label font-weight-bold text-primary text-uppercase mb-1" for="customSwitch1">Introduction to Python for Data Science</label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label font-weight-bold text-primary text-uppercase mb-1" for="customSwitch1">Introduction to Python for Data Science</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-secondary align-center" name="previous">Previous</button>
            <button type="submit" class="btn btn-primary align-center" name="allocate">Next</button>
        </div>
    </form>
</div>