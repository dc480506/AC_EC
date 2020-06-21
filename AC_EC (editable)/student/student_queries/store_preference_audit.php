<?php
include('../../config.php');
include('../verify.php');
if(isset($_POST['submit']))
{
    $cname="";
    $prefs="";
    for($i=1;$i<$_SESSION['no_of_preferences'];$i++)
        {
        $cname.="'".$_POST['cname'.$i.'']."',";    
        $prefs.="`pref".$i."`,";
        }
        // $cname.="'";    
        // $cname.=$_POST['cname'.$i.''];
        // $cname.="'";
        $cname.="'".$_POST['cname'.$i.'']."'";    
        $prefs.="`pref".$i."`";
        // echo $cname;
        date_default_timezone_set('Asia/Kolkata');
        $timestamp=date("Y-m-d H:i:s");
        // echo $cname;
        // echo $prefs."<br>";
        $sql3="INSERT INTO student_preference_audit (`email_id`,`sem`,`year`,`rollno`,`timestamp`,`allocate_status`,`no_of_valid_preferences`,
        ".$prefs.") VALUES('{$_SESSION['email']}','{$_SESSION['sem']}','{$_SESSION['year']}','{$_SESSION['rollno']}','{$timestamp}',0,'{$_SESSION['no_of_preferences']}',".$cname.");";
        mysqli_query($conn, $sql3);
        echo $sql3;
        // $sql4="UPDATE student SET form_filled=1 WHERE email_id='{$_SESSION['email']}';";
        $sql4="UPDATE student_form set form_filled=1,timestamp='{$timestamp}' WHERE sem='{$_SESSION['sem']}'AND year='{$_SESSION['year']}' AND email_id='{$_SESSION['email']}'";
        mysqli_query($conn,$sql4);
        unset($_SESSION['no_of_preferences']);
        unset($_SESSION['sem']);
        unset($_SESSION['year']);
        unset($_SESSION['rollno']);

        header('location: ../audit_form.php');
        //header('Location: '.$_SERVER['REQUEST_URI']);
        // echo "<script>
        //     alert('submitted!!!!!!');
        //     window.href.location(form.php);
        // </script";
}
?>