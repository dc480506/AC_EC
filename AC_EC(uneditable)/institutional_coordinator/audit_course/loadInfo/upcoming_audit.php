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
   // $columnName='sem,year';
   // $columnSortOrder='desc';
   // $orderQuery=" order by timestamp desc ";
  $orderQuery="order by cid asc";

}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   // $searchQuery = " and (cid like '%".$searchValue."%' or 
   //      sem like '%".$searchValue."%' or year like '%".$searchValue."%' or
   //      cname like'%".$searchValue."%' or dept_name like '%".$searchValue."%'
   //      ) ";
   $searchQuery = " and (a.cid like '%".$searchValue."%' or 
   a.sem like '%".$searchValue."%' or a.year like '%".$searchValue."%' or
   a.cname like'%".$searchValue."%'
   ) ";
}

$filterQuery="1";
$filterQuery2="1";
$deptQuery = "";
if (isset($_POST['filters'])) {
   $filters = $_POST['filters'];
   // echo json_encode($filters);
   if (isset($filters['start_year'])) {
      $filterQuery .= "&& year = '" . $filters['start_year'] . "' ";
      $filterQuery2 .= "&& a.year = '" . $filters['start_year'] . "' ";
   }
   
   if (isset($filters['semesters'])) {
      $filterQuery .= "&& sem in(" . "'" . implode("', '", $filters['semesters']) . "'" . ")" . " ";
      $filterQuery2 .= "&& a.sem in(" . "'" . implode("', '", $filters['semesters']) . "'" . ")" . " ";

   }
   if (isset($filters['depts'])) {
       
      foreach($filters['depts'] as &$dept){
         $dept = " dept_name like '%".$dept."%' ";
      }

      $deptQuery.="&& ( " . implode(" || "  ,$filters['depts'])." ) ";
   }
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as totalcount from audit_course WHERE currently_active=0");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];

## Total number of record with filtering
// $sel = mysqli_query($conn,"select count(*) as totalcountfilters from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=0 ".$searchQuery);
// $sel = mysqli_query($conn,"select count(*) as totalcountfilters from audit_course WHERE currently_active=0 ".$searchQuery ." && ".$filterQueryz);
// $sel= mysqli_query($conn,"SELECT cid,cname,(SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_floating_dept afd INNER JOIN department d WHERE 
//             afd.cid=a.cid AND afd.sem=a.sem AND afd.year=a.year AND afd.dept_id=d.dept_id GROUP BY 'all' ".$deptQuery.") FROM audit_course a WHERE currently_active=0");
// echo "SELECT cid,cname,(SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_floating_dept afd INNER JOIN department d WHERE 
// afd.cid=a.cid AND afd.sem=a.sem AND afd.year=a.year ".$deptQuery.") FROM audit_course a WHERE currently_active=0";
// $records = mysqli_fetch_assoc($sel);
// $totalRecordwithFilter = $records['totalcountfilters'];
$sql="SELECT DISTINCT a.cid,a.cname,a.sem,a.year FROM audit_course a INNER JOIN audit_course_floating_dept afd 
INNER JOIN department d ON a.cid=afd.cid AND a.sem=afd.sem AND a.year=afd.year AND afd.dept_id=d.dept_id WHERE currently_active=0"
.$searchQuery." && ".$filterQuery2." ".$deptQuery;
// echo $sql;
$sel=mysqli_query($conn,$sql);
$totalRecordwithFilter=mysqli_num_rows($sel);

## Fetch records
// $sql="select cname,cid,sem,dept_name,max,min,year, 
//        (SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_applicable_dept aad 
//         INNER JOIN department ad ON aad.dept_id=ad.dept_id WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year
//         GROUP BY 'all') as app 
//         from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=0 "
//         .$searchQuery. $orderQuery." limit ".$row.",".$rowperpage;

$sql="select cname,cid,sem,
         (SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_floating_dept afd 
         INNER JOIN department d2 ON afd.dept_id=d2.dept_id WHERE a.cid=afd.cid AND a.sem=afd.sem AND a.year=afd.year
         GROUP BY 'all') as dept_name,
         max,min,year, 
         (SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_applicable_dept aad 
         INNER JOIN department ad ON aad.dept_id=ad.dept_id WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year
         GROUP BY 'all') as app 
      from audit_course a WHERE currently_active=0 "
.$searchQuery." HAVING ". $filterQuery." ".$deptQuery." ". $orderQuery." limit ".$row.",".$rowperpage;
$courseRecords = mysqli_query($conn, $sql);
$data = array();
$count=0;
while ($row = mysqli_fetch_assoc($courseRecords)) {
   $data[] = array( 
      "select-cbox"=>'<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow_upcoming" id="selectrow_upcoming'.$count.'">
                        <label class="custom-control-label" for="selectrow_upcoming'.$count.'"></label>
                     </div>',
      "cname"=>$row['cname'],
      "cid"=>$row['cid'],
      "sem"=>$row['sem'],
      "year"=>$row['year'],
      "dept_name"=>$row['dept_name'],
      "dept_applicable"=>$row['app'],
      "max"=>$row['max'],
      "min"=>$row['min'],
      "allocate_faculty"=>'<button type="button" class="btn btn-primary icon-btn allocate-btn">
                              <i class="fas fa-chalkboard-teacher"></i>
                          </button>',
      "action"=>'<button type="button" class="btn btn-primary icon-btn action-btn">
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
// select cname,cid,sem,dept_name,max,min,no_of_allocated,(SELECT aad.dept_id as app FROM audit_course_applicable_dept aad WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year) from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1

?>
