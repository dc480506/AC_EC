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
    $orderQuery=' order by no_of_allocated desc';
}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = "";
if($searchValue != ''){
    $searchQuery = " and (cname like '%".$searchValue."%' or cid like '%".$searchValue."%')";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as totalcount from {$_SESSION['course_table']}");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];
## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*) as totalcountfilters from `{$_SESSION['course_table']}`p WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];
//$prefas=1/$totalStudentCount;
## Fetch records
$sql="SELECT cname,cid,max,min,no_of_allocated FROM `{$_SESSION['course_table']}` WHERE 1 "
    .$searchQuery.$orderQuery." limit ".$row.",".$rowperpage;
$courseRecords = mysqli_query($conn, $sql);
$data = array();
$count=0;
$firstpercent=0.0;
while ($row = mysqli_fetch_assoc($courseRecords)) {
    $color="";
    if($row['no_of_allocated']==0){
        $color="text-danger";
    }
    $data[] = array( 
        // "select-cbox"=>'<input type="checkbox">',
        "cname"=>'<h6 class="font-weight-bold '.$color.' mb-0">'.$row['cname'].'</h6>',
        "cid"=>'<h6 class="font-weight-bold '.$color.' mb-0">'.$row['cid'].'</h6>',
        "max"=>'<h6 class="font-weight-bold '.$color.' mb-0">'.$row['max'].'</h6>',
        "min"=>'<h6 class="font-weight-bold '.$color.' mb-0">'.$row['min'].'</h6>',
        "no_of_allocated"=>'<h6 class="font-weight-bold '.$color.' mb-0">'.$row['no_of_allocated'].'</h6>',
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
