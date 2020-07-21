<?php
session_start();
if (isset($_SESSION['email']) && $_SESSION['role'] == 'inst_coor') {
    include_once('../../../config.php');
    $data = json_decode(file_get_contents("php://input"), true);
        if($data['type']=='student'){
            $sem = $data["sem"];
            $year = $data["year"];
            $dept_id = $data["dept_id"];
            $update_data = $data['update_data'];
            $update_condition=" (";

            foreach($update_data as $key=>$val){
                $update_condition.="email_id='".$val['email_id']."') OR (";
            }

        
            $update_condition=substr($update_condition,0,strlen($update_condition)-4);


            $sql=    $sql = "UPDATE student set current_sem= $sem ,year_of_admission=$year,dept_id=$dept_id where ".$update_condition;
            // echo $sql;
            mysqli_query($conn,$sql);

            // echo $sql;
        }
}
?>