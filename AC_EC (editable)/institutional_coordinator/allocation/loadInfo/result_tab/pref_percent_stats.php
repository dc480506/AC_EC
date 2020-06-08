<?php
include_once('../../../verify.php');
include_once('../../../../config.php');
$draw = $_POST['draw'];
## Search 
// $searchQuery = "";
// if($searchValue != ''){
//    $searchQuery = " and (cname like '%".$searchValue."%' or ct.cid like '%".$searchValue."%')";
// }
$sql="select pref_no,no_of_stu,percent from {$_SESSION['pref_percent_table']} WHERE pref_no !='-1'";
$prefStatsRecords = mysqli_query($conn, $sql);
$data = array();
while ($row = mysqli_fetch_assoc($prefStatsRecords)) {
    if($row['pref_no']==-1){
        $pref_no='<span class="text-danger"><b>Unallocated</b></span>';
        $no_of_stu='<span class="text-danger"><b>'.$row['no_of_stu'].'</b></span>';
        $percent='<span class="text-danger"><b>'.round($row['percent'],2).'</b></span>';
    }else{
        $pref_no='<span class="text-info">Preference '.$row['pref_no'].'</span>';
        $no_of_stu='<span class="text-info">'.$row['no_of_stu'].'</span>';
        $percent='<span class="text-info">'.round($row['percent'],2).'</span>';
    }
   $data[] = array( 
      // "select-cbox"=>'<input type="checkbox">',
      "pref_no"=>$pref_no,
      "no_of_stu"=>$no_of_stu,
      "percent"=>$percent,
       );
}
## Response
$response = array(
  "draw" => intval($draw),
  "aaData" => $data
);

echo json_encode($response);
// select cname,cid,sem,dept_name,max,min,no_of_allocated,(SELECT aad.dept_id as app FROM audit_course_applicable_dept aad WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year) from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1

?>
