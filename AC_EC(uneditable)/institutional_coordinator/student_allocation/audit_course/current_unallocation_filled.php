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
   $orderQuery=" order by stu.fname asc ";

}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   // $searchQuery = " and (cid like '%".$searchValue."%' or 
   //      sem like '%".$searchValue."%' or year like '%".$searchValue."%' or
   //      cname like'%".$searchValue."%' or dept_name like '%".$searchValue."%'
   //      ) ";
   $searchQuery = " and (stu.email_id like '%".$searchValue."%' or stu.fname like '%".$searchValue."%' 
   or stu.lname like '%".$searchValue."%'
   ) ";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as totalcount from student as stu 
inner join student_preference_audit as stu_pref on stu.email_id=stu_pref.email_id
where stu_pref.allocate_status=0 and stu_pref.currently_active=1");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];

## Total number of record with filtering
// $sel = mysqli_query($conn,"select count(*) as totalcountfilters from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=0 ".$searchQuery);
$sel = mysqli_query($conn,"select count(*) as totalcountfilters from student as stu 
inner join student_preference_audit as stu_pref on stu.email_id=stu_pref.email_id
where stu_pref.allocate_status=0 and stu_pref.currently_active=1 "
.$searchQuery.$orderQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];
// $unallocated_form_filled=$totalRecordwithFilter-$totalRecords;
// $unallocated_form_notfilled=$totalstudents-$totalRecordwithFilter;
// $total_unallocated=$unallocated_form_filled+$unallocated_form_notfilled;
## Fetch records
// $sql="select cname,cid,sem,dept_name,max,min,year, 
//        (SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_applicable_dept aad 
//         INNER JOIN department ad ON aad.dept_id=ad.dept_id WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year
//         GROUP BY 'all') as app 
//         from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=0 "
//         .$searchQuery. $orderQuery." limit ".$row.",".$rowperpage;



$sql="select stu.fname,stu.lname,stu.email_id,stu_pref.sem,stu_pref.year from student as stu 
inner join student_preference_audit as stu_pref on stu.email_id=stu_pref.email_id
where stu_pref.allocate_status=0 and stu_pref.currently_active=1"
.$searchQuery.$orderQuery." limit ".$row.",".$rowperpage;

//select stu.fname,stu.lname,stu.email_id from audit_course as c inner join e55dda_student_audit as stu_audit on c.cid=stu_audit.cid inner join student as stu on stu.email_id=stu_audit.email_id".$searchQuery. $orderQuery." limit ".$row.",".$rowperpage;
$courseRecords = mysqli_query($conn, $sql);
$data = array();
$count=0;
while ($row = mysqli_fetch_assoc($courseRecords)) {
   $data[] = array( 
      "select-cbox"=>'<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow_upcoming" id="selectrow_upcoming'.$count.'">
                        <label class="custom-control-label" for="selectrow_upcoming'.$count.'"></label>
                     </div>',
					 
      
      "fname"=>$row['fname'],
	  "lname"=>$row['lname'],
      "email_id"=>$row['email_id'],
     "status"=>"FILLED",
     "sem"=>$row['sem'],
     "year"=>$row['year'],
      
      
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