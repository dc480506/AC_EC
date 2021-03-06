<?php
include_once('../../../verify.php');
include_once('../../../../config.php');
$sem=$_POST['sem'];
$cr=$_POST['currently_active'];
$yr=$_POST['year'];
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
if(isset($_POST['order'])){
   $columnIndex = $_POST['order'][0]['column']; // Column index
   $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
   $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
   $orderQuery=" order by $columnName $columnSortOrder ";
}else{
   // $columnName='sem';
   // $columnSortOrder='asc';
   $orderQuery=' order by timestamp,rollno asc ';
}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = "1";
if($searchValue != ''){
   $searchQuery = " (s.email_id like '%".$searchValue."%'  or s.rollno like '%".$searchValue."%' or s.fname like '%".$searchValue."%' or s.mname like '%".$searchValue."%' or s.lname like '%".$searchValue."%') ";
}

## Total number of records without filtering
if($cr<2){
   $sel = mysqli_query($conn,"select count(*) as totalcount from student_preference_audit WHERE year='$yr' AND  sem='$sem'");
}else{
   $sel = mysqli_query($conn,"select count(*) as totalcount from student_preference_audit_log WHERE year='$yr' AND  sem='$sem'");
}
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];

if($cr<2){
   $sel = mysqli_query($conn,"select count(*) as totalcountfilters from student_preference_audit spa 
                  INNER JOIN student s ON s.email_id=spa.email_id  WHERE year='$yr' AND  sem='$sem' AND ".$searchQuery);
}else{
   $sel = mysqli_query($conn,"select count(*) as totalcountfilters from student_preference_audit_log spa 
            INNER JOIN student s ON s.email_id=spa.email_id  WHERE year='$yr' AND  sem='$sem' AND ".$searchQuery);
}
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];
//echo $yr;
//echo $sem;
##Fetch Record
if($cr<2){
$sql="select s.email_id,s.rollno,CONCAT(fname,' ',mname,' ',lname) as full_name, dept_name,spa.timestamp,allocate_status
   FROM student_preference_audit spa INNER JOIN student s INNER JOIN department d
   ON s.email_id=spa.email_id AND s.dept_id=d.dept_id WHERE year='$yr' AND  sem='$sem' AND currently_active='$cr' and ".$searchQuery. $orderQuery ." limit ".$row.",".$rowperpage;
}else{
   $sql="select s.email_id,s.rollno,CONCAT(fname,' ',mname,' ',lname) as full_name, dept_name,spa.timestamp,allocate_status
   FROM student_preference_audit_log spa INNER JOIN student s INNER JOIN department d
   ON s.email_id=spa.email_id AND s.dept_id=d.dept_id WHERE year='$yr' AND  sem='$sem' and ".$searchQuery. $orderQuery ." limit ".$row.",".$rowperpage;
}
$studentRecords = mysqli_query($conn, $sql);
//echo $sql;
$data = array();
$count=0;
$preference_list="";
while ($row = mysqli_fetch_assoc($studentRecords)) {
//    for ($i = 1; $i <= $row['no_of_valid_preferences']; $i++) {
//       $preference_list.= $row['pref'.$i].'<br>';
//   } 
   $allocate_status="Unallocated";
   if($row['allocate_status']==1){
      $allocate_status="Allocated";
   }
   $data[] = array( 
      // "select-cbox"=>'<input type="checkbox">',
      "select-cbox"=>'<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow" id="selectrow'.$count.'">
                        <label class="custom-control-label" for="selectrow'.$count.'"></label>
                     </div>',
      "email_id"=>$row['email_id'],
      // "sem"=>$row['sem'],
      // "year"=>$row['year'],
      "rollno"=>$row['rollno'],
      "full_name"=>$row['full_name'],
      "dept_name"=>$row['dept_name'],
      "timestamp"=>$row['timestamp'],
      "allocate_status"=>$allocate_status,
      // "no_of_valid_preferences"=>$row['no_of_valid_preferences'],
      "preference_list"=>$preference_list,
      "view_preference"=>'<button type="button" class="btn btn-primary icon-btn">
                              <i class="fas fa-list-ol view-pref"></i>
                           </button>',
      "action"=>'<button type="button" class="btn btn-primary icon-btn action-btn">
                     <i class="fas fa-tools"></i>
                  </button>'
       );
   $count++;
   $preference_list="";
}
## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);
?>
