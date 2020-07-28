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
   $orderQuery = ' order by year desc,sem,rollno asc ';
}

#filters
$filterQuery = "1 ";
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

$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = "1";
if ($searchValue != '') {
   $searchQuery = "( gpa like '%" . $searchValue . "%' or dept_name like '%" . $searchValue . "%' or sem like '%" . $searchValue . "%' or m.rollno like '%" . $searchValue . "%' or m.email_id like '%" . $searchValue . "%' or year like '%" . $searchValue . "%')";
}

$role_restriction = "";
if ($_SESSION['role'] == 'faculty_co' || $_SESSION['role'] == 'HOD') {
   $role_restriction = " and s.dept_id='{$_SESSION['dept_id']}' ";
}


## Total number of records without filtering
$query="select count(*) as totalcount from student_marks s where program='UG' ";
$sel = mysqli_query($conn,$query);
// echo $query;
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];

$query = "select count(*) as totalcountfilters from student_marks m INNER JOIN student s ON m.email_id=s.email_id INNER JOIN department d ON s.dept_id=d.dept_id WHERE m.program='UG' " . $role_restriction. " and " . $searchQuery . "&& (" . $filterQuery . ")";
$sel = mysqli_query($conn, $query);
// echo $query;
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];

##Fetch Record
$sql = "select m.email_id,m.rollno,CONCAT(fname,' ',mname,' ',lname) as fullname,dept_name,sem,gpa,year
from student_marks m INNER JOIN student s ON m.email_id=s.email_id INNER JOIN department d ON s.dept_id=d.dept_id WHERE m.program='UG' " . $role_restriction. " && "
   . $searchQuery . " && (" . $filterQuery . ")" . $orderQuery . " limit " . $row . "," . $rowperpage;
$studentRecords = mysqli_query($conn, $sql);
$data = array();
$count = 0;
while ($row = mysqli_fetch_assoc($studentRecords)) {

   $data[] = array(
      // "select-cbox"=>'<input type="checkbox">',
      "select-cbox" => '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow" id="selectrow' . $count . '">
                        <label class="custom-control-label" for="selectrow' . $count . '"></label>
                     </div>',
      "email_id" => $row['email_id'],
      "rollno" => $row['rollno'],
      "fullname" => $row['fullname'],
      "dept_name" => $row['dept_name'],
      "sem" => $row['sem'],
      "year" => $row['year'],
      "gpa" => $row['gpa'],
      "action" => '<button type="button" class="btn btn-primary icon-btn action-btn">
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