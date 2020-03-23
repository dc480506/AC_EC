<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=="inst_coor"){
    include_once("../../config.php");
    //For Course deletion
    if(isset($_POST['delete_course'])){
        $cid=mysqli_escape_string($conn,$_POST['cid']);
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $sql="DELETE FROM audit_course WHERE cid='$cid' AND sem='$sem' AND year='$year'";
        echo $sql;
        mysqli_query($conn,$sql);
        header("Location: ../addcourse_ac.php");
        exit();
    }else if(isset($_POST['update_course'])){
        $cname=mysqli_escape_string($conn,$_POST['coursename']);
        $cidnew=mysqli_escape_string($conn,$_POST['courseidnew']);
        $cidold=mysqli_escape_string($conn,$_POST['courseidold']);
        $semnew=mysqli_escape_string($conn,$_POST['semnew']);
        $semold=mysqli_escape_string($conn,$_POST['semold']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $min=mysqli_escape_string($conn,$_POST['min']);
        $max=mysqli_escape_string($conn,$_POST['max']);
        $sql="UPDATE audit_course SET cname='$cname',cid='$cidnew',sem='$semnew',min='$min',max='$max' WHERE cid='$cidold' 
        AND sem='$semold' AND year='$year'";
        mysqli_query($conn,$sql);
        $sql="SELECT dept_id FROM audit_course_applicable_dept WHERE cid='$cidnew' AND sem='$semnew' AND year='$year'";
        $result=mysqli_query($conn,$sql);
        $delete_dept=array();
        $insert_dept=array();
        $row_dept=array();
        
        while($row=mysqli_fetch_assoc($result)){
            // if(!in_array($row['dept_id'],$_POST['check_dept'])){
            //     array_push($delete_dept,$row['dept_id']);
            // }
            array_push($row_dept,$row['dept_id']);
        }
        // foreach($row_dept as $d){
        //     echo'<p>'.$d.'</p>';
        // }
        foreach($row_dept as $r){
            if(!in_array($r,$_POST['check_dept'])){
                array_push($delete_dept,$r);
            }
        }
        // foreach($delete_dept as $d){
        //     echo 'Delete<p>'.$d.'</p>';
        // }
        // echo '<br>';
        foreach($_POST['check_dept'] as $r){
            if(!in_array($r,$row_dept)){
                array_push($insert_dept,$r);
            }
        }
        // foreach($insert_dept as $d){
        //     echo 'Insert <p>'.$d.'</p>';
        // }
        // echo '<br>';
        if(!empty($delete_dept)){
            $s="(";
            foreach($delete_dept as $r){
                $s.="$r,";
            }
            $s=substr($s,0,strlen($s)-1);
            $s.=")";
            $sql="DELETE FROM audit_course_applicable_dept WHERE cid='$cidnew' AND sem='$semnew' AND year='$year' AND dept_id IN ($s)";
            mysqli_query($conn,$sql);
        }
        if(!empty($insert_dept)){
            $Values="";
        foreach($insert_dept as $u){
           $Values.="('$cidnew','$semnew','$year','$u'),";
        }
        $sql="INSERT INTO audit_course_applicable_dept VALUES ".substr($Values,0,strlen($Values)-1);
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        }
        
        header("Location: ../addcourse_ac.php");
        exit();
    }else if(isset($_POST['add_course'])){
        $cname=mysqli_escape_string($conn,$_POST['cname']);
        $cid=mysqli_escape_string($conn,$_POST['courseid']);
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $dept_name=mysqli_escape_string($conn,$_POST['dept']);
        $max=mysqli_escape_string($conn,$_POST['max']);
        $min=mysqli_escape_string($conn,$_POST['min']);
        if(isset($_POST['map_cbox'])){
            $prevcid=mysqli_escape_string($conn,$_POST['prevcid']);
            $prevsem=mysqli_escape_string($conn,$_POST['prevsem']);
            $prevyear=mysqli_escape_string($conn,$_POST['prevyear']);
        }
        // echo $cname."<br>";
        // echo $cid."<br>";
        // echo $sem."<br>";
        // echo $year."<br>";
        // echo $max."<br>";
        // echo $min."<br>";
        // echo $prevcid."<br>";
        // echo $prevsem."<br>";
        // echo $prevyear."<br>";
        $sql="SELECT dept_id FROM department WHERE dept_name='$dept_name'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $dept_id=$row['dept_id'];
        // echo $dept_id;
        $email=$_SESSION['email'];
        date_default_timezone_set('Asia/Kolkata');
        $timestamp=date("Y-m-d H:i:s");
        $sql="INSERT INTO audit_course(`cid`,`sem`,`year`,`cname`,`dept_id`,`min`,`max`,`email_id`,`timestamp`) VALUES('$cid','$sem','$year','$cname','$dept_id','$min','$max','$email','$timestamp')";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $Values="";
        foreach($_POST['check_dept'] as $u){
           $Values.="('$cid','$sem','$year','$u'),";
        };
        $sql="INSERT INTO audit_course_applicable_dept VALUES ".substr($Values,0,strlen($Values)-1);
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        header("Location: ../addcourse_ac.php");
    }
}
?>