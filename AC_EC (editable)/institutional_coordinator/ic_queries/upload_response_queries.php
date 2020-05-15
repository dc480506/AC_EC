<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=="inst_coor"){
    include_once("../../config.php");
    if(isset($_POST['save_changes'])){
        $sem=mysqli_escape_string($conn,$_POST['semester']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $type=mysqli_escape_string($conn,$_POST['course_type']);
        $rno=mysqli_escape_string($conn,$_POST['rno']);
        $dep=mysqli_escape_string($conn,$_POST['department']);
        $email=mysqli_escape_string($conn,$_POST['email']);
        $tstamp=mysqli_escape_string($conn,$_POST['tstamp']);
        $status=mysqli_escape_string($conn,$_POST['status']);
        $npre=mysqli_escape_string($conn,$_POST['npre']);

        $total_pref=mysqli_escape_string($conn,$_POST['total_pref']);

        $npref=[];
        for($i=1;$i<=$total_pref;$i++){
            $npref[$i]=mysqli_escape_string($conn,$_POST['prefid'.(string)$i]);
        }

        $file_name=$_FILES['Uploadfile']['name'];
        $target_location="../../../uploads\\".$file_name;
        move_uploaded_file( $_FILES['Uploadfile']['tmp_name'], $target_location);

        $cmd='python student_preference.py "'.$sem.'" "'.$year.'" "'.$type.'" "'.$status.'" "'.$npre.'" "'.$dep.'" "'.$rno.'" "'.$email.'" "'.$tstamp;
        for($i=1;$i<=$total_pref;$i++){
            $cmd.='" "'.$npref[$i];
        }
        $cmd.='" "'.$target_location.'"';
        // $command = escapeshellcmd($cmd);
        echo $cmd;
        $output = shell_exec($cmd);

        header("Location: ../upload_response.php");
        exit();
    }


}
?>