<?php
session_start();
include_once('../../config.php');
if(isset($_SESSION['email']) && $_SESSION['role']=="inst_coor"){
    $sem=mysqli_escape_string($conn,$_POST['sem']);
    $year=mysqli_escape_string($conn,$_POST['year']);
    $no_of_preferences=mysqli_escape_string($conn,$_POST['nop']);
    $course_info_sql="SELECT cid,cname,min,max,no_of_allocated FROM audit_course WHERE sem='$sem' AND year='$year'";
    $result=mysqli_query($conn,$course_info_sql);
    $courses_info_array=array();
    while($row=mysqli_fetch_assoc($result)){
        // $min=(int)$row['min'];
        // $max=(int)$row['min'];
        // $min=(int)$row['min'];
        $courses_info_array[$row['cid']]=$row;
    }
//    var_dump($courses_info_array);
//    echo "70"+2;
    // var_dump($courses_info_array['UCEC121']);
    $pref_list="";
    for($i=1;$i<=$no_of_preferences;$i++){
        $pref_list.="pref".$i.",";
    }
    $pref_list=substr($pref_list,0,strlen($pref_list)-1);
    $preference_sql="SELECT email_id,timestamp,".$pref_list." FROM student_preference_audit WHERE sem='$sem' AND year='$year' ORDER BY timestamp ASC";
    // echo $preference_sql;
    $result=mysqli_query($conn,$preference_sql);
    $student_cid=array();
    $unallocated_student=array();
    while($row=mysqli_fetch_assoc($result)){
        // var_dump($row);
        // echo "\n";
        $i=1;
        $allocated_student=false;
        while($i<=$no_of_preferences){
            $cid_pref=$row['pref'.$i];
            if((int)$courses_info_array[$cid_pref]['no_of_allocated']<(int)$courses_info_array[$cid_pref]['max']){
                $student_cid[$row['email_id']]=$cid_pref;
                $courses_info_array[$cid_pref]['no_of_allocated']+=1;
                $allocated_student=true;
                break;
            }
            $i++;
        }
        if(!$allocated_student){
            $unallocated_student[]=$row['email_id'];
        }
    }
    echo 'student cid<br>';
    echo json_encode($student_cid);
    echo '<br>';
    echo '<br>';
    echo 'student unallocated<br>';
    echo json_encode($unallocated_student);
    echo '<br>';
    echo '<br>';
    echo 'Course info<br>';
    echo json_encode($courses_info_array);
    echo '<br>';
    echo '<br>';

    $course_insufficient=array();
    foreach($courses_info_array as $key=>$course){
        if($course['no_of_allocated']<$course['min']){
            $course_insufficient[$key]=$course;
        }
    }
    $course_insufficient_key=array_keys($course_insufficient); // For keeping the course names of insufficient capacity
    $unallocated_student_insufficient=array();
    foreach($student_cid as $student_email => $value){
        // echo $student_email;
        // break;
        if(in_array($value,$course_insufficient_key)){
            $unallocated_student_insufficient[$student_email]=$value;
            unset($student_cid[$student_email]);
            // echo 'Yo';
        }
    }
    echo 'Course insufficient<br>';
    echo json_encode($course_insufficient);
    echo '<br>';
    echo '<br>';
    echo 'Unallocated students insufficient<br>';
    echo json_encode($unallocated_student_insufficient);
    echo '<br>';
    echo '<br>';

    echo 'student cid<br>';
    echo json_encode($student_cid);
    echo '<br>';

    
    // student_cid for mapping allocated course with email id
    //unallocated_student_insufficient for getting email ids of students who haven't been allocated because of insufficiency but were allocated some course initially
    // course_insufficient for courses which don't have sufficient students
    // courses_info_array for info about all courses
}
?>