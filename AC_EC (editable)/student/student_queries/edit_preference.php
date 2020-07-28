<?php
include('../../config.php');
include('../verify.php');
echo "hello there";
echo $_POST['submit'];
if(isset($_POST['submit']))
{
    $cname="";
    $prefs="";
    $query="";
    for($i=1;$i<$_SESSION['no_of_preferences'];$i++)
        {
        $query.="`pref".$i."`='".$_POST['cname'.$i.'']."', ";
        }
        // echo $query;
     

        date_default_timezone_set('Asia/Kolkata');
        $timestamp=date("Y-m-d H:i:s");

        $sql3="UPDATE student_preferences set ". $query." timestamp='{$timestamp}' where email_id='{$_SESSION['email']}'  AND form_id='{$_SESSION['form_id']}'";
        // echo $sql3;
        mysqli_query($conn, $sql3);
   

        $sql4="UPDATE student_form set timestamp='{$timestamp}' WHERE email_id='{$_SESSION['email']}' AND form_id='{$_SESSION['form_id']}' ";
        // echo $sql4;
        mysqli_query($conn,$sql4);
        unset($_SESSION['no_of_preferences']);
        unset($_SESSION['form_id']);
        header('location: ../forms.php');

}
?>