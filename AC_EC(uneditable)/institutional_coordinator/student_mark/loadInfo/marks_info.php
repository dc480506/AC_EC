<?php
include_once('../../verify.php');
include_once('../../../config.php');
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
   $orderQuery=' order by year desc,sem,rollno asc ';
}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = "1";
if($searchValue != ''){
   $searchQuery = "gpa like '%".$searchValue."%' or sem like '%".$searchValue."%' or m.rollno like '%".$searchValue."%' or m.email_id like '%".$searchValue."%' or year like '%".$searchValue."%'";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as totalcount from student_marks");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];

$sel = mysqli_query($conn,"select count(*) as totalcountfilters from student_marks m INNER JOIN student s ON m.email_id=s.email_id WHERE ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];

##Fetch Record
$sql="select m.email_id,m.rollno,CONCAT(fname,' ',mname,' ',lname) as fullname,sem,gpa,year
from student_marks m INNER JOIN student s ON m.email_id=s.email_id WHERE "
       .$searchQuery. $orderQuery ." limit ".$row.",".$rowperpage;
$studentRecords = mysqli_query($conn, $sql);
$data = array();
$count=0;
while ($row = mysqli_fetch_assoc($studentRecords)) {
    
   $data[] = array( 
      // "select-cbox"=>'<input type="checkbox">',
      "select-cbox"=>'<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow" id="selectrow'.$count.'">
                        <label class="custom-control-label" for="selectrow'.$count.'"></label>
                     </div>',
      "email_id"=>$row['email_id'],
      "rollno"=>$row['rollno'],
      "fullname"=>$row['fullname'],
      "sem"=>$row['sem'],
      "year"=>$row['year'],
      "gpa"=>$row['gpa'],
      "action"=>'<button type="button" class="btn btn-primary icon-btn action-btn-marks">
                    <i class="fas fa-tools"></i>
                </button>',
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
?>
