<?php
include_once('../../../verify.php');
include_once('../../../../config.php');
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
if($_SESSION['algorithm_chosen']=='fcfs'){
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
      $searchQuery = " and (p.email_id like '%".$searchValue."%' or p.rollno like '%".$searchValue."%' 
      or sct.cid like '%".$searchValue."%' or ct.cname like '%".$searchValue."%')";
   }

   ## Total number of records without filtering
   $sel = mysqli_query($conn,"select count(*) as totalcount from {$_SESSION['student_pref']} WHERE allocate_status=1");
   $records = mysqli_fetch_assoc($sel);
   $totalRecords = $records['totalcount'];
   ## Total number of record with filtering
   $sel = mysqli_query($conn,"select count(*) as totalcountfilters from `{$_SESSION['student_pref']}` p INNER JOIN 
      `{$_SESSION['course_table']}` ct INNER JOIN `{$_SESSION['student_course_table']}` sct 
         ON p.email_id=sct.email_id AND sct.cid=ct.cid
         WHERE allocate_status=1 ".$searchQuery);
   $records = mysqli_fetch_assoc($sel);
   $totalRecordwithFilter = $records['totalcountfilters'];
   //$prefas=1/$totalStudentCount;
   ## Fetch records
   $sql="SELECT p.email_id,p.rollno,CONCAT(fname,' ',mname,' ',lname) as fullname,dept_name,
      p.timestamp,pref_no as pref_no_allotted,CONCAT(cname,' (',sct.cid,')') as allocated_course FROM `{$_SESSION['student_pref']}` p INNER JOIN student s
      INNER JOIN department d INNER JOIN `{$_SESSION['course_table']}` ct INNER JOIN `{$_SESSION['student_course_table']}` sct
      INNER JOIN `{$_SESSION['pref_student_alloted_table']}` pa
         ON p.email_id=s.email_id AND p.email_id=sct.email_id AND p.email_id=pa.email_id AND sct.cid=ct.cid AND s.dept_id=d.dept_id WHERE allocate_status='1' "
      .$searchQuery.$orderQuery." limit ".$row.",".$rowperpage;
   $allocatedRecords = mysqli_query($conn, $sql);
   $data = array();
   while ($row = mysqli_fetch_assoc($allocatedRecords)) {
      $data[] = array( 
         // "select-cbox"=>'<input type="checkbox">',
         "email_id"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['email_id'].'</h6>',
         "rollno"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['rollno'].'</h6>',
         "fullname"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['fullname'].'</h6>',
         "dept_name"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['dept_name'].'</h6>',
         "timestamp"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['timestamp'].'</h6>',
         "pref_no_allotted"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['pref_no_allotted'].'</h6>',
         "allocated_course"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['allocated_course'].'</h6>'
         );
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
      $orderQuery=' order by gpa desc,p.timestamp asc ';
   }
   $searchValue = $_POST['search']['value']; // Search value

   ## Search 
   $searchQuery = "";
   if($searchValue != ''){
      $searchQuery = " and (p.email_id like '%".$searchValue."%' or p.rollno like '%".$searchValue."%' 
      or sct.cid like '%".$searchValue."%' or ct.cname like '%".$searchValue."%')";
   }

   ## Total number of records without filtering
   $sel = mysqli_query($conn,"select count(*) as totalcount from {$_SESSION['student_pref']} WHERE allocate_status=1");
   $records = mysqli_fetch_assoc($sel);
   $totalRecords = $records['totalcount'];
   ## Total number of record with filtering
   $sel = mysqli_query($conn,"select count(*) as totalcountfilters from `{$_SESSION['student_pref']}` p INNER JOIN 
      `{$_SESSION['course_table']}` ct INNER JOIN `{$_SESSION['student_course_table']}` sct 
         ON p.email_id=sct.email_id AND sct.cid=ct.cid
         WHERE allocate_status=1 ".$searchQuery);
   $records = mysqli_fetch_assoc($sel);
   $totalRecordwithFilter = $records['totalcountfilters'];
   //$prefas=1/$totalStudentCount;
   ## Fetch records
   $gpa_sem=$_SESSION['sem']-2;
   $sql="SELECT p.email_id,p.rollno,CONCAT(fname,' ',mname,' ',lname) as fullname,dept_name,gpa,
      p.timestamp,pref_no as pref_no_allotted,CONCAT(cname,' (',sct.cid,')') as allocated_course FROM `{$_SESSION['student_pref']}` p INNER JOIN student s
      INNER JOIN department d INNER JOIN `{$_SESSION['course_table']}` ct INNER JOIN `{$_SESSION['student_course_table']}` sct
      INNER JOIN `{$_SESSION['pref_student_alloted_table']}` pa INNER JOIN student_marks sm
         ON p.email_id=s.email_id AND p.email_id=sct.email_id AND p.email_id=pa.email_id
         AND sm.email_id=p.email_id AND sm.sem=".$gpa_sem." AND
          sct.cid=ct.cid AND s.dept_id=d.dept_id WHERE allocate_status='1' "
      .$searchQuery.$orderQuery." limit ".$row.",".$rowperpage;
   // echo $sql;
   $allocatedRecords = mysqli_query($conn, $sql);
   $data = array();
   while ($row = mysqli_fetch_assoc($allocatedRecords)) {
      $data[] = array( 
         // "select-cbox"=>'<input type="checkbox">',
         "email_id"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['email_id'].'</h6>',
         "rollno"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['rollno'].'</h6>',
         "fullname"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['fullname'].'</h6>',
         "dept_name"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['dept_name'].'</h6>',
         "gpa"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['gpa'].'</h6>',
         "timestamp"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['timestamp'].'</h6>',
         "pref_no_allotted"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['pref_no_allotted'].'</h6>',
         "allocated_course"=>'<h6 class="font-weight-bold text-success mb-0">'.$row['allocated_course'].'</h6>'
         );
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
