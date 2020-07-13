

<?php 

include_once('../../verify.php');
include_once('../../../config.php');
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length'];
$cid= $_SESSION['cid'];
$course_type_id=$_SESSION['course_type_id'];
$sem=$_SESSION['sem'];
$year=$_SESSION['year'];
$active=$_SESSION['active'];


if (isset($_POST['order'])) {
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $orderQuery = " order by $columnName $columnSortOrder ";
 } else {
    $orderQuery = ' ORDER BY rollno ';
}



$searchValue = $_POST['search']['value']; // Search value

$searchQuery = "1";



## Search
if($searchValue!=""){
    $searchQuery = " stu.fname like '%" . $searchValue ."%' or stu.lname like '%" . $searchValue .  "%' or stu.email_id like '%" . $searchValue . "%' or stu.rollno like '%" . $searchValue . "%' or stu_gc.student_attendance like '%" . $searchValue . "%' or stu_gc.complete_status like '%" . $searchValue ."%'  ";
}

## Total number of records without filtering
if($active==0 OR $active==1){
    $sel="select count(*) as totalcount, CONCAT(stu.fname,' ',stu.lname) as name,stu.email_id as email_id,stu.rollno as rollno , stu_gc.student_attendance as student_attendance ,stu_gc.complete_status as complete_status from 
                        course as c inner join student_courses_grade as stu_gc 
                        on c.cid=stu_gc.cid inner join student as stu on stu.email_id=stu_gc.email_id 
                        where stu_gc.currently_active=$active AND c.cid='$cid' AND stu_gc.sem=$sem AND stu_gc.year='$year' And  stu_gc.course_type_id=$course_type_id ";

}
else
{
    $sel="select count(*) as totalcount,CONCAT(stu.fname,' ',stu.lname) as name,stu.email_id as email_id,stu.rollno as rollno ,stu_gc.student_attendance as student_attendance ,stu_gc.complete_status as complete_status from 
    course_log as c inner join student_courses_grade_log as stu_gc
    on c.cid=stu_gc.cid inner join student as stu on stu.email_id=stu_gc.email_id 
    where c.cid='$cid' AND stu_gc.sem=$sem AND stu_gc.year='$year' And  stu_gc.course_type_id=$course_type_id ";
}
$result=mysqli_query($conn,$sel);
// echo $sel;
$records =  mysqli_fetch_assoc($result);
// $totalRecords = mysqli_num_rows($result);
$totalRecords = $records['totalcount'];


## Total number of records withfiltering
if($active==0 OR $active==1){
    $sel1="select count(*) as totalcountFilter, CONCAT(stu.fname,' ',stu.lname) as name,stu.email_id as email_id,stu.rollno as rollno , stu_gc.student_attendance as student_attendance ,stu_gc.complete_status as complete_status from 
                        course as c inner join student_courses_grade as stu_gc 
                        on c.cid=stu_gc.cid inner join student as stu on stu.email_id=stu_gc.email_id 
                        where stu_gc.currently_active=$active AND c.cid='$cid' AND stu_gc.sem=$sem AND stu_gc.year='$year' AND ( ". $searchQuery .")";

}
else
{
    $sel1="select count(*) as totalcountFilter,CONCAT(stu.fname,' ',stu.lname) as name,stu.email_id as email_id,stu.rollno as rollno ,stu_gc.student_attendance as student_attendance ,stu_gc.complete_status as complete_status from 
    course_log as c inner join student_courses_grade_log as stu_gc
    on c.cid=stu_gc.cid inner join student as stu on stu.email_id=stu_gc.email_id 
    where c.cid='$cid' AND stu_gc.sem=$sem AND stu_gc.year='$year' AND ( ". $searchQuery .")";
}


$result1=mysqli_query($conn,$sel1);
$records1 = mysqli_fetch_assoc($result1);
$totalRecordwithFilter = $records1['totalcountFilter'];
 


//fetch Records
// $sql= $sel1 . $orderQuery . " limit " . $row . "," . $rowperpage;
if($active==0 OR $active==1){
    $sql="select  CONCAT(stu.fname,' ',stu.lname) as name,stu.email_id as email_id,stu.rollno as rollno , stu_gc.student_attendance as student_attendance ,stu_gc.complete_status as complete_status from 
                        course as c inner join student_courses_grade as stu_gc 
                        on c.cid=stu_gc.cid inner join student as stu on stu.email_id=stu_gc.email_id 
                        where stu_gc.currently_active=$active AND c.cid='$cid' AND stu_gc.sem=$sem AND stu_gc.year='$year' AND ( ". $searchQuery .") ". $orderQuery . " limit " . $row . "," . $rowperpage;

}
else
{
    $sql="select CONCAT(stu.fname,' ',stu.lname) as name,stu.email_id as email_id,stu.rollno as rollno ,stu_gc.student_attendance as student_attendance ,stu_gc.complete_status as complete_status from 
    course_log as c inner join student_courses_grade_log as stu_gc
    on c.cid=stu_gc.cid inner join student as stu on stu.email_id=stu_gc.email_id 
    where c.cid='$cid' AND stu_gc.sem=$sem AND stu_gc.year='$year' AND ( ". $searchQuery .") ". $orderQuery . " limit " . $row . "," . $rowperpage;
}


$studentRecords = mysqli_query($conn, $sql);
// $rowcount = mysqli_num_rows($studentRecords);
// echo $rowcount;
$data = array();
$name = "";

while ($row = mysqli_fetch_assoc($studentRecords)) {
    $data[] = array(
       "name" => $row['name'],
       "email_id" => $row['email_id'],
       "rollno" => $row['rollno'],
       "student_attendance" => $row['student_attendance'],
       "complete_status" => $row['complete_status']  
    );
 
 }


 ## Response
 $response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
 );


 echo json_encode($response);
?>


