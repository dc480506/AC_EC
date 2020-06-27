<?php
include_once('../../verify.php');
include_once('../../../config.php');
$data = json_decode(file_get_contents("php://input"),true); 
$email_id=$data['email_id'];
$sem=$data['sem'];
$year=$data['year'];
$currently_active=$data['currently_active'];
$nop=$data['nop'];
$course_type=$data['type'];
$preferences="";
$i=1;
for(;$i<$nop;$i++){
    $preferences.="pref".$i.",";
}
$preferences.="pref".$i;
if($currently_active<2){
    $sql_course="SELECT cname,cid FROM ".$course_type."_course WHERE sem='$sem' AND year='$year'";
    $sql_response="SELECT ".$preferences." FROM student_preference_".$course_type." 
                WHERE email_id='".$email_id."' AND sem='".$sem."' AND year='".$year."'";
}else{
    $sql_course="SELECT cname,cid FROM ".$course_type."_course_log WHERE sem='$sem' AND year='$year'";
    $sql_response="SELECT ".$preferences." FROM student_preference_".$course_type."_log  
                WHERE email_id='".$email_id."' AND sem='".$sem."' AND year='".$year."'";
}
//Course Info
$result=mysqli_query($conn,$sql_course);
$courses=array();
while($row=mysqli_fetch_assoc($result)){
    $courses[$row['cid']]=$row['cname'];
}
//Preference
$result=mysqli_query($conn,$sql_response);
$row=mysqli_fetch_assoc($result);
// var_dump($row);
$preference_list="";
for($i=1;$i<=$nop;$i++){
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
?>