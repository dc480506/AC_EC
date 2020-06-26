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
   $orderQuery=" order by year desc,sem asc,cid asc";

}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   // $searchQuery = " and (cid like '%".$searchValue."%' or 
   //      sem like '%".$searchValue."%' or year like '%".$searchValue."%' or
   //      cname like'%".$searchValue."%' or dept_name like '%".$searchValue."%'
   //      ) ";
   $searchQuery = " and (cid like '%".$searchValue."%' or 
   sem like '%".$searchValue."%' or year like '%".$searchValue."%' or
   cname like'%".$searchValue."%'
   ) ";
}

$filterQuery="1";
$deptQuery = "";
if (isset($_POST['filters'])) {
   $filters = $_POST['filters'];
   // echo json_encode($filters);
   if (isset($filters['start_year'])) {
      $filterQuery .= "&& year = '" . $filters['start_year'] . "' ";
   }
   
   if (isset($filters['semesters'])) {
      $filterQuery .= "&& sem in(" . "'" . implode("', '", $filters['semesters']) . "'" . ")" . " ";
   }
   if (isset($filters['depts'])) {
       
      foreach($filters['depts'] as &$dept){
         $dept = " dept_name like '%".$dept."%' ";
      }

      $deptQuery.="&& ( " . implode(" || "  ,$filters['depts'])." ) ";
   }
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as totalcount from audit_course_log");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];

## Total number of record with filtering
// $sel = mysqli_query($conn,"select count(*) as totalcountfilters from audit_course_log a INNER JOIN department d ON a.dept_id=d.dept_id WHERE 1 ".$searchQuery);
$sel = mysqli_query($conn,"select count(*) as totalcountfilters from audit_course_log a WHERE 1 ".$searchQuery." && ".$filterQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];

## Fetch records
// $sql = "select cname,cid,sem,dept_name,max,min,no_of_allocated from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
// $sql="select cname,cid,sem,dept_name,max,min,no_of_allocated,
//      (SELECT GROUP_CONCAT(aad.dept_id SEPARATOR ',') FROM audit_course_applicable_dept aad 
//      WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year GROUP BY 'all') as app 
//      from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1 "
//      .$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
// $sql="select cname,cid,sem,dept_name,max,min,year,no_of_allocated, 
//       (SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_applicable_dept_log aad 
//        INNER JOIN department ad ON aad.dept_id=ad.dept_id WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year
//        GROUP BY 'all') as app 
//        from audit_course_log a INNER JOIN department d ON a.dept_id=d.dept_id WHERE 1 "
//        .$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
// $sql="select cname,cid,sem,dept_name,max,min,year,no_of_allocated, 
//       (SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_applicable_dept_log aad 
//       INNER JOIN department ad ON aad.dept_id=ad.dept_id WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year
//       GROUP BY 'all') as app 
//       from audit_course_log a INNER JOIN department d ON a.dept_id=d.dept_id WHERE 1 "
//       .$searchQuery. $orderQuery." limit ".$row.",".$rowperpage;
$sql="select cname,cid,sem,
         (SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_floating_dept_log afd 
         INNER JOIN department d2 ON afd.dept_id=d2.dept_id WHERE a.cid=afd.cid AND a.sem=afd.sem AND a.year=afd.year
         GROUP BY 'all') as dept_name,
         max,min,year, (SELECT COUNT(*) FROM student_audit_log st_aud WHERE st_aud.cid=a.cid AND 
         a.sem=st_aud.sem AND a.year=st_aud.year) as no_of_allocated,
         (SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_applicable_dept_log aad 
         INNER JOIN department ad ON aad.dept_id=ad.dept_id WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year
         GROUP BY 'all') as app 
      from audit_course_log a WHERE 1 "
      .$searchQuery ." HAVING ". $filterQuery." ".$deptQuery." ".$orderQuery." limit ".$row.",".$rowperpage;
$courseRecords = mysqli_query($conn, $sql);
$data = array();
$count=0;
while ($row = mysqli_fetch_assoc($courseRecords)) {
   $data[] = array( 
      "select-cbox"=>'<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow_previous" id="selectrow_previous'.$count.'">
                        <label class="custom-control-label" for="selectrow_previous'.$count.'"></label>
                     </div>',
      "cname"=>$row['cname'],
      "cid"=>$row['cid'],
      "sem"=>$row['sem'],
      "year"=>$row['year'],
      "dept_name"=>$row['dept_name'],
      "dept_applicable"=>$row['app'],
      "max"=>$row['max'],
      "min"=>$row['min'],
      "no_of_allocated"=> $row['no_of_allocated'],
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
