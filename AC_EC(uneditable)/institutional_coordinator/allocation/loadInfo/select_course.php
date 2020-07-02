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
   $orderQuery=' order by firstcount desc ';
}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = "";
if($searchValue != ''){
   $searchQuery = " and (cname like '%".$searchValue."%' or cid like '%".$searchValue."%')";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as totalcount from {$_SESSION['course_table']} WHERE sem='{$_SESSION['sem']}' and year='{$_SESSION['year']}'");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];
## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*) as totalcountfilters from {$_SESSION['course_table']} WHERE sem='{$_SESSION['sem']}' and year='{$_SESSION['year']}'".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];

$total=mysqli_query($conn,"select count(*) as totalStudentCount from {$_SESSION['student_pref']} WHERE sem='{$_SESSION['sem']}' and year='{$_SESSION['year']}'");
$res=mysqli_fetch_assoc($total);
$totalStudentCount=$res['totalStudentCount'];
//$prefas=1/$totalStudentCount;
## Fetch records
// $sql = "select cname,cid,sem,dept_name,max,min,no_of_allocated from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
// $sql="select cname,cid,sem,dept_name,max,min,no_of_allocated,
//      (SELECT GROUP_CONCAT(aad.dept_id SEPARATOR ',') FROM audit_course_applicable_dept aad 
//      WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year GROUP BY 'all') as app 
//      from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1 "
//      .$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
// $sql="select cname,cid,sem,dept_name,max,min,no_of_allocated, 
//       (SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_applicable_dept aad 
//        INNER JOIN department ad ON aad.dept_id=ad.dept_id WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year
//        GROUP BY 'all') as app 
//        from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1 "
//        .$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$sql="select cid,cname,max,min,(SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM ".$_SESSION['type']."_course_floating_dept afd 
INNER JOIN department d ON afd.dept_id=d.dept_id WHERE ac.cid=afd.cid AND ac.sem=afd.sem AND ac.year=afd.year
GROUP BY 'all') as offering_dept,
(select count(*) as firstprefCount from {$_SESSION['student_pref']} spa where ac.cid=spa.pref1) as firstcount,
round((select count(*)/{$totalStudentCount}*100 as firstpercentCount from {$_SESSION['student_pref']} spa where ac.cid=spa.pref1),2) as firstpercent 
from {$_SESSION['course_table']} ac WHERE sem='{$_SESSION['sem']}' and year='{$_SESSION['year']}'".$searchQuery. $orderQuery ." limit ".$row.",".$rowperpage;
$courseRecords = mysqli_query($conn, $sql);
$data = array();
$count=0;
$firstpercent=0.0;
while ($row = mysqli_fetch_assoc($courseRecords)) {
  $color='text-success';
  if($row['max']<$row['firstcount'])
  {
    $color='text-danger';
  }
   $data[] = array( 
      // "select-cbox"=>'<input type="checkbox">',
      "select-cbox"=>'<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow" id="selectrow'.$count.'">
                        <label class="custom-control-label" for="selectrow'.$count.'"></label>
                     </div>',
      "cname"=>'<span class='.$color.'>'.$row['cname'].'</span>',
      "cid"=>'<span class='.$color.'>'.$row['cid'].'</span>',
      "offering_dept"=>'<span class='.$color.'>'.$row['offering_dept'].'</span>',
      "max"=>'<span class='.$color.'>'.$row['max'].'</span>',
      "min"=>'<span class='.$color.'>'.$row['min'].'</span>',
      "firstpercent"=>'<span class='.$color.'>'.$row['firstpercent'].'</span>',
      "firstcount"=>'<span class='.$color.'>'.$row['firstcount'].'</span>',
      // "action"=>'<button type="button" class="btn btn-primary icon-btn action-btn" data-toggle="modal" data-target="#exampleModalCenter'.$count.'">
      //                <i class="fas fa-tools"></i>
      //             </button>'
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

?>
