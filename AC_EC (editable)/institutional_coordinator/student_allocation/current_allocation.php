<?php
include_once('../verify.php');
include_once('../../config.php');
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
if (isset($_POST['order'])) {
   $columnIndex = $_POST['order'][0]['column']; // Column index
   $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
   $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
   $orderQuery = " order by $columnName $columnSortOrder ";
} else {
   // $columnName='sem,year';
   // $columnSortOrder='desc';
   $orderQuery = " order by s.fname asc ";
}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if ($searchValue != '') {
   // $searchQuery = " and (cid like '%".$searchValue."%' or 
   //      sem like '%".$searchValue."%' or year like '%".$searchValue."%' or
   //      cname like'%".$searchValue."%' or dept_name like '%".$searchValue."%'
   //      ) ";
   $searchQuery = " and (c.cid like '%" . $searchValue . "%' or 
   c.cname like '%" . $searchValue . "%' or stu.fname like '%" . $searchValue . "%' or
   stu.lname like'%" . $searchValue . "%'
   ) ";
}

## Total number of records without filtering
$sel = mysqli_query($conn, "select count(*) as totalcount from 
student_course_alloted where sem='{$_SESSION['sem']}' and year='{$_SESSION['year']}' and course_type_id in ('" . implode("','", $_SESSION['form_course_type_ids']) . "')");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];

## Total number of record with filtering
// $sel = mysqli_query($conn,"select count(*) as totalcountfilters from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=0 ".$searchQuery);
$selQuery = "select count(*) as totalcountfilters from student_course_alloted sca
   inner join student s
   inner join course c
   on sca.cid=c.cid and sca.year=c.year and sca.course_type_id=c.course_type_id and sca.sem=c.sem
   and sca.email_id=s.email_id
   where sca.sem='{$_SESSION['sem']}' and sca.year='{$_SESSION['year']}' and sca.course_type_id in ('" . implode("','", $_SESSION['form_course_type_ids']) . "') 
   " . $searchQuery . $orderQuery;
$sel = mysqli_query($conn, $selQuery);

$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];

## Fetch records
// $sql="select cname,cid,sem,dept_name,max,min,year, 
//        (SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_applicable_dept aad 
//         INNER JOIN department ad ON aad.dept_id=ad.dept_id WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year
//         GROUP BY 'all') as app 
//         from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=0 "
//         .$searchQuery. $orderQuery." limit ".$row.",".$rowperpage;

$sql = "select c.cname,c.cid,sca.sem,sca.year,s.fname,s.lname,s.email_id from student_course_alloted sca
   inner join student s
   inner join course c
   on sca.cid=c.cid and sca.year=c.year and sca.course_type_id=c.course_type_id and sca.sem=c.sem
   and sca.email_id=s.email_id
   where sca.sem='{$_SESSION['sem']}' and sca.year='{$_SESSION['year']}' and sca.course_type_id in ('" . implode("','", $_SESSION['form_course_type_ids']) . "') 
      " . $searchQuery . $orderQuery . " limit " . $row . "," . $rowperpage;
$courseRecords = mysqli_query($conn, $sql);
$data = array();
$count = 0;
while ($row = mysqli_fetch_assoc($courseRecords)) {
   $data[] = array(
      "select-cbox" => '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow_upcoming" id="selectrow_upcoming' . $count . '">
                        <label class="custom-control-label" for="selectrow_upcoming' . $count . '"></label>
                     </div>',

      "cname" => $row['cname'],
      "cid" => $row['cid'],
      "sem" => $row['sem'],
      "fname" => $row['fname'],
      "lname" => $row['lname'],
      "email_id" => $row['email_id'],
      "year" => $row['year'],

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
