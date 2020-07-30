<?php
session_start();
$allowed_roles = array("inst_coor", "faculty_co", "HOD");
if (isset($_SESSION['email']) && in_array($_SESSION['role'], $allowed_roles)) {
    include_once('../../../config.php');
    $data = json_decode(file_get_contents("php://input"),true); 
    if($data['type']=='student'){
        $result = mysqli_query($conn,"select academic_year from current_sem_info WHERE currently_active=1");
        $row=mysqli_fetch_assoc($result);
        $delete_data=$data['delete_data'];
        $del_condition=" (";
        $del_condition2=" (";
        // echo var_dump($delete_data);
        foreach($delete_data as $key=>$val){
            $del_condition2.="email_id='".$val['email_id']."') OR (";
            // echo var_dump($val);
            $del_condition.="email_id='".$val['email_id']."' AND ";
            $del_condition.="sem='".$val['sem']."' AND ";
            $del_condition.="year='".$val['year']."') OR (";
        }

        $del_condition2=substr($del_condition2,0,strlen($del_condition2)-4);
        $sql1="DELETE FROM login_role where ".$del_condition2;
        // echo $del_condition;
        $del_condition=substr($del_condition,0,strlen($del_condition)-4);
        // echo $del_condition;
        $sql="DELETE FROM student_marks WHERE ".$del_condition;
        mysqli_query($conn,$sql);
        mysqli_query($conn,$sql1);
        // echo $sql;
    }
}
?>