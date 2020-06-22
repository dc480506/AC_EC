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
   $orderQuery=' order by timestamp_created desc ';
}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (year like '%".$searchValue."%' or 
   sem like '%".$searchValue."%' 
   ) ";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as totalcount from form WHERE form_type='audit'");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];

## Total number of record with filtering
// $sel = mysqli_query($conn,"select count(*) as totalcountfilters from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1 ".$searchQuery);
$sel = mysqli_query($conn,"select count(*) as totalcountfilters from form WHERE form_type='audit' ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];

## Fetch records
$sql="SELECT sem,year,curr_sem,start_timestamp,end_timestamp,no_of_preferences,allocate_status
       FROM form WHERE form_type='audit' "
      .$searchQuery. $orderQuery." limit ".$row.",".$rowperpage;
$courseRecords = mysqli_query($conn, $sql);
$data = array();
$count=0;
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i");
while ($row = mysqli_fetch_assoc($courseRecords)) {
   $status='Not opened yet';
   $color='text-info';
   $action='<button type="button" class="btn btn-primary icon-btn action-btn">
                <i class="fas fa-tools"></i>
            </button>';
   $start_timestamp=$row['start_timestamp'];
   $end_timestamp=$row['end_timestamp'];
   $sArr = explode(" ", $start_timestamp);
   $start_date = date("d-M-Y",strtotime($sArr[0]));
   $start_time = $sArr[1];
   $eArr = explode(" ", $end_timestamp);
   $end_date = date("d-M-Y",strtotime($eArr[0]));
   $end_time = $eArr[1];
   if ($timestamp >= $start_timestamp) {
        if ($timestamp < $end_timestamp) {
            $status = "Open";
            $color = 'text-success';
        }else {
            $status = "Closed";
            $color = 'text-danger';
            if ($row['allocate_status'] == 1) {
                $status = 'Already Allocated';
                $action='<button type="button" class="btn btn-primary icon-btn action-btn" disabled>
                            <i class="fas fa-tools"></i>
                        </button>';
                $color = 'text-secondary';
            }
        }
    }
   $data[] = array( 
      // "select-cbox"=>'<input type="checkbox">',
      "select-cbox"=>'<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow_current" id="selectrow_current'.$count.'">
                        <label class="custom-control-label" for="selectrow_current'.$count.'"></label>
                     </div>',
      "sem"=>'<span class='.$color.'>'.$row['sem'].'</span>',
      "year"=>'<span class='.$color.'>'.$row['year'].'</span>',
      "curr_sem"=>'<span class='.$color.'>'.$row['curr_sem'].'</span>',
      "start_date"=>'<span class='.$color.'>'.$start_date.'</span>',
      "start_time"=>'<span class='.$color.'>'.$start_time.'</span>',
      "end_date"=>'<span class='.$color.'>'.$end_date.'</span>',
      "end_time"=>'<span class='.$color.'>'.$end_time.'</span>',
      "no_of_preferences"=>'<span class='.$color.'>'.$row['no_of_preferences'].'</span>',
      "form_status"=>'<span class='.$color.'>'.$status.'</span>',
      "action"=>$action,
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