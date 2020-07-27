<?php
include_once('../../verify.php');
include_once('../../../config.php');
$draw = $_POST['draw'];
$row = $_POST['start'];
$program = $_POST['program'];

$rowperpage = $_POST['length']; // Rows display per page
if (isset($_POST['order'])) {
   $columnIndex = $_POST['order'][0]['column']; // Column index
   $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
   $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
   $orderQuery = " order by $columnName $columnSortOrder ";
} else {
   // $columnName='sem';
   // $columnSortOrder='asc';
   $orderQuery = ' order by current_sem,rollno asc ';
}

$searchValue = $_POST['search']['value']; // Search value
$filterQuery = "1 ";
#filters
if (isset($_POST['filters'])) {
   $filters = $_POST['filters'];
   if (isset($filters['start_year'])) {
      $filterQuery .= "&& year_of_admission >= " . $filters['start_year'] . " ";
   }
   if (isset($filters['end_year'])) {
      $filterQuery .= "&& year_of_admission <= " . $filters['end_year'] . " ";
   }
   if (isset($filters['semesters'])) {
      $filterQuery .= "&& current_sem in(" . "'" . implode("', '", $filters['semesters']) . "'" . ")" . " ";
   }
   if (isset($filters['depts'])) {
      $filterQuery .= "&& dept_name in(" . "'" . implode("', '", $filters['depts']) . "'" . ")";
   }
}


## Search 
$searchQuery = "1";
if ($searchValue != '') {
   $searchQuery = "(email_id like '%" . $searchValue . "%' or current_sem like '%" . $searchValue . "%' or rollno like '%" . $searchValue . "%' or dept_name like '%" . $searchValue . "%' or fname like '%" . $searchValue . "%' or mname like '%" . $searchValue . "%' or lname like '%" . $searchValue . "%' or year_of_admission like '%" . $searchValue . "%' )";
}
$role_restriction = "";
if ($_SESSION['role'] == 'faculty_co' || $_SESSION['role'] == 'HOD') {
   $role_restriction = " and s.dept_id='{$_SESSION['dept_id']}' ";
}

## Total number of records without filtering
$sql = "select count(*) as totalcount from student s WHERE s.program='$program' " . $role_restriction;
$sel = mysqli_query($conn, $sql);
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];

## Total number of record with filtering

$sqlFiltered = "select count(*) as totalcountfilters from student s INNER JOIN department d ON s.dept_id=d.dept_id WHERE s.program='$program'" . $role_restriction . " && " . $searchQuery . "&& (" . $filterQuery . ")";
// die($sqlFiltered);
$sel = mysqli_query($conn, $sqlFiltered);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];

## Fetch records

$sql = "select email_id,rollno,current_sem,dept_name,CONCAT(fname,' ',mname,' ',lname) as name,year_of_admission  
       from student s INNER JOIN department d ON s.dept_id=d.dept_id WHERE s.program='$program'" . $role_restriction . " && "
   . $searchQuery . "&& (" . $filterQuery . ")" . $orderQuery . " limit " . $row . "," . $rowperpage;
// echo $sql;
$studentRecords = mysqli_query($conn, $sql);
$data = array();
$count = 0;
$fullname = "";
while ($row = mysqli_fetch_assoc($studentRecords)) {

   $data[] = array(

      "select-cbox" => '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow" id="selectrow' . $count . '">
                        <label class="custom-control-label" for="selectrow' . $count . '"></label>
                     </div>',
      "email_id" => $row['email_id'],
      "rollno" => $row['rollno'],
      "name" => $row['name'],
      "current_sem" => $row['current_sem'],
      "dept_name" => $row['dept_name'],
      "year_of_admission" => $row['year_of_admission'],
      "action" => '<button type="button" class="btn btn-primary icon-btn action-btn">
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
