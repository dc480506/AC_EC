<?php
include_once('../../../verify.php');
include_once('../../../../config.php');
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
if($_SESSION['algorithm_chosen']=="fcfs"){
   if(isset($_POST['order'])){
      $columnIndex = $_POST['order'][0]['column']; // Column index
      $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
      $orderQuery=" order by $columnName $columnSortOrder ";
   }else{
      // $columnName='sem';
      // $columnSortOrder='asc';
      $orderQuery=' order by p.timestamp asc ';
   }
   $searchValue = $_POST['search']['value']; // Search value

   ## Search 
   $searchQuery = "";
   if($searchValue != ''){
      $searchQuery = " and (p.email_id like '%".$searchValue."%' or p.rollno like '%".$searchValue."%')";
   }

   ## Total number of records without filtering
   $sel = mysqli_query($conn,"select count(*) as totalcount from {$_SESSION['student_pref']} WHERE allocate_status=0");
   $records = mysqli_fetch_assoc($sel);
   $totalRecords = $records['totalcount'];
   ## Total number of record with filtering
   $sel = mysqli_query($conn,"select count(*) as totalcountfilters from `{$_SESSION['student_pref']}`p WHERE allocate_status=0 ".$searchQuery);
   $records = mysqli_fetch_assoc($sel);
   $totalRecordwithFilter = $records['totalcountfilters'];
   //$prefas=1/$totalStudentCount;
   ## Fetch records
   $sql="SELECT p.email_id,p.rollno,CONCAT(fname,' ',mname,' ',lname) as fullname,dept_name,
      p.timestamp FROM `{$_SESSION['student_pref']}` p INNER JOIN student s
      INNER JOIN department d ON p.email_id=s.email_id AND s.dept_id=d.dept_id WHERE allocate_status='0' "
      .$searchQuery.$orderQuery." limit ".$row.",".$rowperpage;
   $unallocatedRecords = mysqli_query($conn, $sql);
   $data = array();
   $count=0;
   $firstpercent=0.0;
   while ($row = mysqli_fetch_assoc($unallocatedRecords)) {
      $data[] = array( 
         // "select-cbox"=>'<input type="checkbox">',
         "email_id"=>'<h6 class="font-weight-bold text-danger mb-0">'.$row['email_id'].'</h6>',
         "rollno"=>'<h6 class="font-weight-bold text-danger mb-0">'.$row['rollno'].'</h6>',
         "fullname"=>'<h6 class="font-weight-bold text-danger mb-0">'.$row['fullname'].'</h6>',
         "dept_name"=>'<h6 class="font-weight-bold text-danger mb-0">'.$row['dept_name'].'</h6>',
         "timestamp"=>'<h6 class="font-weight-bold text-danger mb-0">'.$row['timestamp'].'</h6>',
         "action"=>'<button type="button" class="btn btn-primary icon-btn action-btn">
                        <i class="fas fa-tools"></i>
                     </button>'
         );
      $count++;
   }
   ## Response
   $response = array(
   "draw" => intval($draw),
   "iTotalRecords" => $totalRecords,
   "iTotalDisplayRecords" => $totalRecordwithFilter,
   "aaData" => $data
   );

   echo json_encode($response);
// select cname,cid,sem,dept_name,max,min,no_of_allocated,(SELECT aad.dept_id as app FROM audit_course_applicable_dept aad WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year) from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1
}else if($_SESSION['algorithm_chosen']=='previous_sem_marks'){
   if(isset($_POST['order'])){
      $columnIndex = $_POST['order'][0]['column']; // Column index
      $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
      $orderQuery=" order by $columnName $columnSortOrder ";
   }else{
      // $columnName='sem';
      // $columnSortOrder='asc';
      $orderQuery=' order by gpa desc ';
   }
   $searchValue = $_POST['search']['value']; // Search value

   ## Search 
   $searchQuery = "";
   if($searchValue != ''){
      $searchQuery = " and (p.email_id like '%".$searchValue."%' or p.rollno like '%".$searchValue."%')";
   }

   ## Total number of records without filtering
   $sel = mysqli_query($conn,"select count(*) as totalcount from {$_SESSION['student_pref']} WHERE allocate_status=0");
   $records = mysqli_fetch_assoc($sel);
   $totalRecords = $records['totalcount'];
   ## Total number of record with filtering
   $sel = mysqli_query($conn,"select count(*) as totalcountfilters from `{$_SESSION['student_pref']}`p WHERE allocate_status=0 ".$searchQuery);
   $records = mysqli_fetch_assoc($sel);
   $totalRecordwithFilter = $records['totalcountfilters'];
   //$prefas=1/$totalStudentCount;
   ## Fetch records
   $gpa_sem=$_SESSION['sem']-2;
   $sql="SELECT p.email_id,p.rollno,CONCAT(fname,' ',mname,' ',lname) as fullname,dept_name,gpa,
      p.timestamp FROM `{$_SESSION['student_pref']}` p INNER JOIN student s
      INNER JOIN department d INNER JOIN student_marks sm ON p.email_id=s.email_id AND s.dept_id=d.dept_id
      AND sm.email_id=p.email_id AND sm.sem=".$gpa_sem."
      WHERE allocate_status='0' "
      .$searchQuery.$orderQuery." limit ".$row.",".$rowperpage;
   // echo $sql;
   $unallocatedRecords = mysqli_query($conn, $sql);
   $data = array();
   $count=0;
   $firstpercent=0.0;
   while ($row = mysqli_fetch_assoc($unallocatedRecords)) {
      $data[] = array( 
         // "select-cbox"=>'<input type="checkbox">',
         "email_id"=>'<h6 class="font-weight-bold text-danger mb-0">'.$row['email_id'].'</h6>',
         "rollno"=>'<h6 class="font-weight-bold text-danger mb-0">'.$row['rollno'].'</h6>',
         "fullname"=>'<h6 class="font-weight-bold text-danger mb-0">'.$row['fullname'].'</h6>',
         "dept_name"=>'<h6 class="font-weight-bold text-danger mb-0">'.$row['dept_name'].'</h6>',
         "gpa"=>'<h6 class="font-weight-bold text-danger mb-0">'.$row['gpa'].'</h6>',
         "timestamp"=>'<h6 class="font-weight-bold text-danger mb-0">'.$row['timestamp'].'</h6>',
         "action"=>'<button type="button" class="btn btn-primary icon-btn action-btn">
                        <i class="fas fa-tools"></i>
                     </button>'
         );
      $count++;
   }
   ## Response
   $response = array(
   "draw" => intval($draw),
   "iTotalRecords" => $totalRecords,
   "iTotalDisplayRecords" => $totalRecordwithFilter,
   "aaData" => $data
   );

   echo json_encode($response);
}
?>
