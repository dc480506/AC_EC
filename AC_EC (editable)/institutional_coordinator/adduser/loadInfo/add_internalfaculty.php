<?php
include_once('../../verify.php');
include_once('../../../config.php');
include_once("../../../Logger/FacultyLogger.php");
$logger = FacultyLogger::getLogger();
$draw = $_POST['draw'];
$row = $_POST['start'];
if (isset($_POST['pageView']) && $_POST['pageView'] == "true") {
   $logger->facultyRecordsViewed($_SESSION['email'], "faculty records");
}
$rowperpage = $_POST['length']; // Rows display per page
if (isset($_POST['order'])) {
   $columnIndex = $_POST['order'][0]['column']; // Column index
   $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
   $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
   $orderQuery = " order by $columnName $columnSortOrder ";
} else {
   // $columnName='sem';
   // $columnSortOrder='asc';
   $orderQuery = ' order by role,faculty_code asc ';
}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = "1";
if ($searchValue != '') {
   $searchQuery = "(employee_id like '%" . $searchValue . "%' or 
        faculty_code like '%" . $searchValue . "%' or 
        email_id like '%" . $searchValue . "%' or dept_name like '%" . $searchValue . "%'
        or post like '%." . $searchValue . ".%' or fname like '%" . $searchValue . "%' or mname like '%" . $searchValue . "%' or role like '%" . $searchValue . "%' or lname like '%" . $searchValue . "%' or post like '%" . $searchValue . "%') ";
}

$filterQuery = "1 ";
#filters
if (isset($_POST['filters'])) {
   $filters = $_POST['filters'];

   if (isset($filters['post'])) {
      $filterQuery .= "&& post in(" . "'" . implode("', '", $filters['post']) . "'" . ")" . " ";
   }
   if (isset($filters['role'])) {
      $filterQuery .= "&& role in(" . "'" . implode("', '", $filters['role']) . "'" . ")" . " ";
   }
   if (isset($filters['depts'])) {
      $filterQuery .= "&& dept_name in(" . "'" . implode("', '", $filters['depts']) . "'" . ")";
   }
}

$roles_applicable = array();
$flag = false;
foreach ($roles as $key => $value) {
   if ($flag) {
      array_push($roles_applicable, $key);
   }
   if ($key == $_SESSION["role"]) {
      $flag = 1;
   }
}
$role_restriction = " and f.role in ('" . implode("','", $roles_applicable) . "')";
if ($_SESSION['role'] == 'faculty_co' || $_SESSION['role'] == 'HOD') {

   $role_restriction .= " and f.dept_id='{$_SESSION['dept_id']}' ";
}

## Total number of records without filtering
$sel = mysqli_query($conn, "select count(*) as totalcount from faculty f where 1 $role_restriction");

$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];

## Total number of record with filtering
$sel = mysqli_query($conn, "select count(*) as totalcountfilters from faculty f INNER JOIN department d ON f.dept_id=d.dept_id WHERE 1 $role_restriction and " . $searchQuery . "&& (" . $filterQuery . ")");

$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];

## Fetch records

$sql = "select faculty_code,email_id,employee_id,dept_name,CONCAT(fname,' ',mname,' ',lname) as name,post,role from faculty f INNER JOIN department d ON f.dept_id=d.dept_id WHERE 1 $role_restriction and "
   . $searchQuery . "&& (" . $filterQuery . ")" . $orderQuery . " limit " . $row . "," . $rowperpage;
// echo $sql;
$facultyRecords = mysqli_query($conn, $sql);
$data = array();
$count = 0;
$fullname = "";
while ($row = mysqli_fetch_assoc($facultyRecords)) {

   $data[] = array(
      "select-cbox" => '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow" id="selectrow' . $count . '">
                        <label class="custom-control-label" for="selectrow' . $count . '"></label>
                     </div>',
      "faculty_code" => $row['faculty_code'],
      "employee_id" => $row['employee_id'],
      "name" => $row['name'],
      "email_id" => $row['email_id'],
      "dept_name" => $row['dept_name'],
      "post" => $row['post'],
      "role" => $row['role'],
      "action" => '<!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary icon-btn action-btn" >
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
