<?php
include('../config.php');
session_start();
if(isset($_POST['submit']))
{
    $cname="";
    for($i=1;$i<$_SESSION['no_of_preferences'];$i++)
        {
        $cname.="'";    
        $cname.=$_POST['cname'.$i.''];
        $cname.="',";
        }
        $cname.="'";    
        $cname.=$_POST['cname'.$i.''];
        $cname.="'";
        // echo $cname;
        date_default_timezone_set('Asia/Kolkata');
        $timestamp=date("Y-m-d H:i:s");
        $sql3="INSERT INTO student_preference_audit VALUES('{$_SESSION['email']}','{$_SESSION['sem']}','{$_SESSION['year']}','{$timestamp}',0,".$cname.");";
        $result3 = mysqli_query($conn, $sql3);
        $sql4="UPDATE student SET form_filled=1 WHERE email_id='{$_SESSION['email']}';";
        $result4= mysqli_query($conn,$sql4);
        unset($_SESSION['no_of_preferences']);
        header('location: form.php');
        //header('Location: '.$_SERVER['REQUEST_URI']);
        // echo "<script>
        //     alert('submitted!!!!!!');
        //     window.href.location(form.php);
        // </script";
}
?>