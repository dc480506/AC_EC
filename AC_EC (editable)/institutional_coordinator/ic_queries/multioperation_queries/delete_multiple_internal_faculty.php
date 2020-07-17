<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=='inst_coor'){
    include_once('../../../config.php');
    $data = json_decode(file_get_contents("php://input"),true); 
    if($data['type']=='current'){
     
        $delete_data=$data['delete_data'];
        $del_condition=" (";
        // echo var_dump($delete_data);
        foreach($delete_data as $key=>$val){
            // echo var_dump($val);
            $email_id=$val['email_id'];
            $del_condition.="email_id='".$val['email_id']."' AND ";
            $del_condition.="faculty_code='".$val['faculty_code']."' AND ";
            $del_condition.="employee_id='".$val['employee_id']."') OR (";
        }
        //  echo $del_condition;
        //  echo "\nhi\n";
        $sql1="DELETE FROM login_role where email_id='$email_id' ";
        // echo $sql1;
       
        $del_condition=substr($del_condition,0,strlen($del_condition)-4);
    
        $sql="DELETE FROM faculty WHERE ".$del_condition;
        mysqli_query($conn,$sql);
        mysqli_query($conn,$sql1);
   
    }
}
?>