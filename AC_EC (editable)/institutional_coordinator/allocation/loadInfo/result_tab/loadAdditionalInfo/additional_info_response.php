<?php
    include_once('../../../../verify.php');
    include_once('../../../../../config.php');
    $data = json_decode(file_get_contents("php://input"),true); 
    $email_id=$data['email_id'];
    $sql_course="SELECT cname,cid FROM course WHERE sem='{$_SESSION['sem']}' AND year='{$_SESSION['year']}'";
    $result=mysqli_query($conn,$sql_course);
    $courses=array();
    while($row=mysqli_fetch_assoc($result)){
        $courses[$row['cid']]=$row['cname'];
    }
    $preferences="";
    $i=1;
    for(;$i<$_SESSION['no_of_preferences'];$i++){
        $preferences.="pref".$i.",";
    }
    $preferences.="pref".$i;
    $sql_response="SELECT ".$preferences." FROM `{$_SESSION['student_pref']}` WHERE email_id='".$email_id."'";
    $result=mysqli_query($conn,$sql_response);
    $row=mysqli_fetch_assoc($result);
    // var_dump($row);
    $preference_list="";
    for($i=1;$i<=$_SESSION['no_of_preferences'];$i++){
        $cid=$row['pref'.$i];
        if(strpos($cid,"same")!==false){
            $preference_list.="<p><small>".$i.") <i>".$cid."</i></small></p>";
        }else{
            $preference_list.="<p><small>".$i.") ".$courses[$cid]." <i>(".$cid.")</i></small></p>";
        }
    }
    echo '
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="added_by"><b>Preference List: </b></label>
                '.$preference_list.'
            </div>
        </div>';
