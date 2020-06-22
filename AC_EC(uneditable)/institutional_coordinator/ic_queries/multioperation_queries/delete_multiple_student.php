<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=='inst_coor'){
    include_once('../../../config.php');
    $data = json_decode(file_get_contents("php://input"),true); 
    if($data['type']=='student'){
        $result = mysqli_query($conn,"select academic_year from current_sem_info WHERE currently_active=1");
        $row=mysqli_fetch_assoc($result);
        $delete_data=$data['delete_data'];
        $del_condition=" (";
        // echo var_dump($delete_data);
        foreach($delete_data as $key=>$val){
            // echo var_dump($val);
            $del_condition.="email_id='".$val['email_id']."' AND ";
            $del_condition.="rollno='".$val['rollno']."') OR (";
        }
        // echo $del_condition;
        $del_condition=substr($del_condition,0,strlen($del_condition)-4);
        echo $del_condition;

        $sql="DELETE FROM student WHERE ".$del_condition;
        mysqli_query($conn,$sql);
        echo $sql;
    }
}
?>