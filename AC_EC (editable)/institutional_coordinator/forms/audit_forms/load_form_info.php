<?php
include_once('../../verify.php');
include_once('../../../config.php');
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
if (isset($_POST['order'])) {
   $columnIndex = $_POST['order'][0]['column']; // Column index
   $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
   $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
   $orderQuery = " order by $columnName $columnSortOrder ";
} else {
   // $columnName='sem';
   // $columnSortOrder='asc';
   $orderQuery = ' order by timestamp_created desc ';
}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = "1";
if ($searchValue != '') {
   $searchQuery .= " and (year like '%" . $searchValue . "%' or 
   sem like '%" . $searchValue . "%' 
   ) ";
}

## Total number of records without filtering
$sel = mysqli_query($conn, "select count(*) as totalcount from form ");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];

## Total number of record with filtering
// $sel = mysqli_query($conn,"select count(*) as totalcountfilters from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1 ".$searchQuery);
$sel = mysqli_query($conn, "select count(*) as totalcountfilters from form WHERE " . $searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];

## Fetch records
$sql = "SELECT form_id, sem,year,curr_sem,program,start_timestamp,end_timestamp,no_of_preferences,allocate_status , currently_active,(SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM form_applicable_dept afd 
         INNER JOIN department d2 ON afd.dept_id=d2.dept_id WHERE afd.form_id = f.form_id
         GROUP BY 'all') as dept_name,
         (SELECT GROUP_CONCAT(name SEPARATOR ', ') FROM form_course_category_map fccm 
         INNER JOIN course_types ct ON fccm.course_type_id=ct.id WHERE fccm.form_id = f.form_id
         GROUP BY 'all') as course_types
       FROM form f WHERE "
   . $searchQuery . $orderQuery . " limit " . $row . "," . $rowperpage;
$courseRecords = mysqli_query($conn, $sql);
$data = array();
$count = 0;
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i");
while ($row = mysqli_fetch_assoc($courseRecords)) {
   $status = 'Not opened yet';
   $color = 'text-info';
   $action = '<button type="button" class="btn btn-primary icon-btn action-btn">
                <i class="fas fa-tools"></i>
            </button>';
   $view = '<form action="forms/view_response/view.php" method="post">
   <input type="hidden" name="sem" value="' . $row['sem'] . '">
   <input type="hidden" name="yearb" value="' . $row['year'] . '">
   <input type="hidden" name="form_id" value="' . $row['form_id'] . '">
   <input type="hidden" name="currently_active" value="' . $row['currently_active'] . '">
   <input type="hidden" name="no_of_preferences" value="' . $row['no_of_preferences'] . '">
   <input type="hidden" name="type_of_form" value="' . $row['course_types'] . '">
   <button type="submit"  name="view_response_btn" class="btn btn-primary icon-btn view-btn">
            <i class="fas fa-eye"></i>
        </button></form>';
   $start_timestamp = $row['start_timestamp'];
   $end_timestamp = $row['end_timestamp'];
   $sArr = explode(" ", $start_timestamp);
   $start_date = date("d-M-Y", strtotime($sArr[0]));
   $start_time = $sArr[1];
   $eArr = explode(" ", $end_timestamp);
   $end_date = date("d-M-Y", strtotime($eArr[0]));
   $end_time = $eArr[1];
   if ($timestamp >= $start_timestamp) {
      if ($timestamp < $end_timestamp) {
         $status = "Open";
         $color = 'text-success';
      } else {
         $status = "Closed";
         $color = 'text-danger';
         if ($row['allocate_status'] == 1) {
            $status = 'Already Allocated';
            $action = '<button type="button" class="btn btn-primary icon-btn action-btn" disabled>
                            <i class="fas fa-tools"></i>
                        </button>';
            $color = 'text-secondary';
         }
      }
   }
   $data[] = array(
      // "select-cbox"=>'<input type="checkbox">',
      "form_id" => '<span class=' . $color . '>' . $row['form_id'] . '</span>',
      "sem" => '<span class=' . $color . '>' . $row['sem'] . '</span>',
      "year" => '<span class=' . $color . '>' . $row['year'] . '</span>',
      "curr_sem" => '<span class=' . $color . '>' . $row['curr_sem'] . '</span>',
      "program" => '<span class=' . $color . '>' . $row['program'] . '</span>',
      "course_types" => '<span class=' . $color . '>' . $row['course_types'] . '</span>',
      "departments" => '<span class=' . $color . '>' . $row['dept_name'] . '</span>',
      "start_date" => '<span class=' . $color . '>' . $start_date . '</span>',
      "start_time" => '<span class=' . $color . '>' . $start_time . '</span>',
      "end_date" => '<span class=' . $color . '>' . $end_date . '</span>',
      "end_time" => '<span class=' . $color . '>' . $end_time . '</span>',
      "no_of_preferences" => '<span class=' . $color . '>' . $row['no_of_preferences'] . '</span>',
      "form_status" => '<span class=' . $color . '>' . $status . '</span>',
      "action" => $action,
      "view" => $view,
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
