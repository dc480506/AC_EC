<?php
include_once('../../../verify.php');
include_once('../../../../config.php');
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
   $orderQuery=' order by sem,rollno asc ';
}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = "1";
if($searchValue != ''){
   $searchQuery = " (email_id like '%".$searchValue."%' or sem like '%".$searchValue."%' or year like '%".$searchValue."%' or rollno like '%".$searchValue."%' or timestamp like '%".$searchValue."%' or allocate_status like '%".$searchValue."%' or no_of_valid_preferences like '%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as totalcount from student_preference_audit");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];

$sel = mysqli_query($conn,"select count(*) as totalcountfilters from student_preference_audit WHERE ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];
$sem=$_POST['sem'];
$cr=$_POST['currently_active'];
$yr=$_POST['year'];
//echo $yr;
//echo $sem;
##Fetch Record
if($cr<2){
$sql="select *  
       from student_preference_audit WHERE year='$yr' AND  sem='$sem' AND currently_active='$cr' and ".$searchQuery. $orderQuery ." limit ".$row.",".$rowperpage;
}else{
   "select *  
       from student_preference_audit_log WHERE year='$yr' AND  sem='$sem' AND currently_active='$cr' and ".$searchQuery. $orderQuery ." limit ".$row.",".$rowperpage;
}
$studentRecords = mysqli_query($conn, $sql);
//echo $sql;
$data = array();
$count=0;
$preference_list="";
while ($row = mysqli_fetch_assoc($studentRecords)) {
   for ($i = 1; $i <= $row['no_of_valid_preferences']; $i++) {
      $preference_list.= $row['pref'.$i].'<br>';
  } 
   $data[] = array( 
      // "select-cbox"=>'<input type="checkbox">',
      "select-cbox"=>'<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow" id="selectrow'.$count.'">
                        <label class="custom-control-label" for="selectrow'.$count.'"></label>
                     </div>',
      "email_id"=>$row['email_id'],
      "sem"=>$row['sem'],
      "year"=>$row['year'],
      "rollno"=>$row['rollno'],
      "timestamp"=>$row['timestamp'],
      "allocate_status"=>$row['allocate_status'],
      "no_of_valid_preferences"=>$row['no_of_valid_preferences'],
      "preference_list"=>$preference_list,
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
