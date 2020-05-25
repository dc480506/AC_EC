<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=="inst_coor"){
    include_once("../../config.php");
    //For Course deletion
    if(isset($_POST['delete_course']) || isset($_POST['delete_course_log'])){
        $cid=mysqli_escape_string($conn,$_POST['cid']);
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        if(isset($_POST['delete_course'])){
            $sql="DELETE FROM audit_course WHERE cid='$cid' AND sem='$sem' AND year='$year'";
        }
        else if(isset($_POST['delete_course_log'])){
            $sql="DELETE FROM audit_course_log WHERE cid='$cid' AND sem='$sem' AND year='$year'";
        }
        mysqli_query($conn,$sql);
        // header("Location: ../addcourse_ac.php");
        exit();
    }else if(isset($_POST['update_course']) || isset($_POST['update_course_log'])){
        $cname=mysqli_escape_string($conn,$_POST['coursename']);
        $cidnew=mysqli_escape_string($conn,$_POST['courseidnew']);
        $cidold=mysqli_escape_string($conn,$_POST['courseidold']);
        $semnew=mysqli_escape_string($conn,$_POST['semnew']);
        $semold=mysqli_escape_string($conn,$_POST['semold']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $min=mysqli_escape_string($conn,$_POST['min']);
        $max=mysqli_escape_string($conn,$_POST['max']);
        // $dept_id=mysqli_escape_string($conn,$_POST['dept_id']);
        if(isset($_POST['update_course'])){
            $sql="UPDATE audit_course SET cname='$cname',cid='$cidnew',sem='$semnew',min='$min',max='$max' WHERE cid='$cidold' 
                  AND sem='$semold' AND year='$year'";
        } else if(isset($_POST['update_course_log'])){
            $sql="UPDATE audit_course_log SET cname='$cname',cid='$cidnew',sem='$semnew',min='$min',max='$max' WHERE cid='$cidold' 
                  AND sem='$semold' AND year='$year'";
        }
        mysqli_query($conn,$sql);
        //Department applicable updation start
        if(isset($_POST['update_course'])){
            $sql="SELECT dept_id FROM audit_course_applicable_dept WHERE cid='$cidnew' AND sem='$semnew' AND year='$year'";
        } else if(isset($_POST['update_course_log'])){
            $sql="SELECT dept_id FROM audit_course_applicable_dept_log WHERE cid='$cidnew' AND sem='$semnew' AND year='$year'";
        }
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
        // foreach($delete_dept as $r){
        //     echo $r;
        // }
        
        if(!empty($delete_dept)){
            $s="(";
            foreach($delete_dept as $r){
                $s.="$r,";
            }
            $s=substr($s,0,strlen($s)-1);
            $s.=")";
            if(isset($_POST['update_course'])){
                $sql="DELETE FROM audit_course_applicable_dept WHERE cid='$cidnew' AND sem='$semnew' AND year='$year' AND dept_id IN $s";
                echo $sql;
            } else if(isset($_POST['update_course_log'])){
                $sql="DELETE FROM audit_course_applicable_dept_log WHERE cid='$cidnew' AND sem='$semnew' AND year='$year' AND dept_id IN $s";
            }
            mysqli_query($conn,$sql);
        }
        if(!empty($insert_dept)){
            $Values="";
            foreach($insert_dept as $u){
            $Values.="('$cidnew','$semnew','$year','$u'),";
            }
            if(isset($_POST['update_course'])){
                $sql="INSERT INTO audit_course_applicable_dept VALUES ".substr($Values,0,strlen($Values)-1);
            } else if(isset($_POST['update_course_log'])){
                $sql="INSERT INTO audit_course_applicable_dept_log VALUES ".substr($Values,0,strlen($Values)-1);
            }
            mysqli_query($conn,$sql) or die(mysqli_error($conn));
        }
        //Department applicable updation end

        //Floating department updation start
        echo "Floating dept ".var_dump($_POST['floating_check_dept']);
        if(isset($_POST['update_course'])){
            $sql="SELECT dept_id FROM audit_course_floating_dept WHERE cid='$cidnew' AND sem='$semnew' AND year='$year'";
        } else if(isset($_POST['update_course_log'])){
            $sql="SELECT dept_id FROM audit_course_floating_dept_log WHERE cid='$cidnew' AND sem='$semnew' AND year='$year'";
        }
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
            if(!in_array($r,$_POST['floating_check_dept'])){
                array_push($delete_dept,$r);
            }
        }
        // foreach($delete_dept as $d){
        //     echo 'Delete<p>'.$d.'</p>';
        // }
        // echo '<br>';
        foreach($_POST['floating_check_dept'] as $r){
            if(!in_array($r,$row_dept)){
                array_push($insert_dept,$r);
            }
        }
        // foreach($insert_dept as $d){
        //     echo 'Insert <p>'.$d.'</p>';
        // }
        // echo '<br>';
        // foreach($delete_dept as $r){
        //     echo $r;
        // }
        
        if(!empty($delete_dept)){
            $s="(";
            foreach($delete_dept as $r){
                $s.="$r,";
            }
            $s=substr($s,0,strlen($s)-1);
            $s.=")";
            if(isset($_POST['update_course'])){
                $sql="DELETE FROM audit_course_floating_dept WHERE cid='$cidnew' AND sem='$semnew' AND year='$year' AND dept_id IN $s";
                echo $sql;
            } else if(isset($_POST['update_course_log'])){
                $sql="DELETE FROM audit_course_floating_dept_log WHERE cid='$cidnew' AND sem='$semnew' AND year='$year' AND dept_id IN $s";
            }
            mysqli_query($conn,$sql);
        }
        if(!empty($insert_dept)){
            $Values="";
            foreach($insert_dept as $u){
            $Values.="('$cidnew','$semnew','$year','$u'),";
            }
            if(isset($_POST['update_course'])){
                $sql="INSERT INTO audit_course_floating_dept VALUES ".substr($Values,0,strlen($Values)-1);
            } else if(isset($_POST['update_course_log'])){
                $sql="INSERT INTO audit_course_floating_dept_log VALUES ".substr($Values,0,strlen($Values)-1);
            }
            mysqli_query($conn,$sql) or die(mysqli_error($conn));
        }
        //Floating department updation end
        // header("Location: ../addcourse_ac.php");
        exit();
    }else if(isset($_POST['add_course'])){
        $cname=mysqli_escape_string($conn,$_POST['cname']);
        $cid=mysqli_escape_string($conn,$_POST['courseid']);
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $dept_name=mysqli_escape_string($conn,$_POST['dept']);
        $max=mysqli_escape_string($conn,$_POST['max']);
        $min=mysqli_escape_string($conn,$_POST['min']);
        
        // echo $cname."<br>";
        // echo $cid."<br>";
        // echo $sem."<br>";
        // echo $year."<br>";
        // echo $max."<br>";
        // echo $min."<br>";
        // echo $prevcid."<br>";
        // echo $prevsem."<br>";
        // echo $prevyear."<br>";
        // echo $dept_id;
        $email=$_SESSION['email'];
        date_default_timezone_set('Asia/Kolkata');
        $timestamp=date("Y-m-d H:i:s");
        $sql="INSERT INTO audit_course(`cid`,`sem`,`year`,`cname`,`min`,`max`,`email_id`,`timestamp`) VALUES('$cid','$sem','$year','$cname','$min','$max','$email','$timestamp')";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $Values="";
        foreach($_POST['floating_check_dept'] as $u){
            $Values.="('$cid','$sem','$year','$u'),";
        }
        $sql="INSERT INTO audit_course_floating_dept VALUES ".substr($Values,0,strlen($Values)-1);
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $Values="";
        foreach($_POST['check_dept'] as $u){
           $Values.="('$cid','$sem','$year','$u'),";
        };
        $sql="INSERT INTO audit_course_applicable_dept VALUES ".substr($Values,0,strlen($Values)-1);
        mysqli_query($conn,$sql) or die(mysqli_error($conn));

        if(isset($_POST['map_cbox'])){
            $total_prev=mysqli_escape_string($conn,$_POST['total_prev']);
            $temp=1;
            $tuples="";
            for($i=0;$i<$total_prev;$i++){
                $prevcid=mysqli_escape_string($conn,$_POST['prevcid'.$temp]);
                $prevsem=mysqli_escape_string($conn,$_POST['prevsem'.$temp]);
                $prevyear=mysqli_escape_string($conn,$_POST['prevyear'.$temp]);
                // echo ''.$prevcid.'';
                $tuples.="('$cid','$sem','$year','$prevcid','$prevsem','$prevyear'),";
                $temp++;
            }
            $sql="INSERT into audit_map VALUES ".substr($tuples,0,strlen($tuples)-1);
            $result=mysqli_query($conn,$sql);

        }
    }
}
?>