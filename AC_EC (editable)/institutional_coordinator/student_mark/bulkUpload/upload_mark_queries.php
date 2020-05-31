<?php
include_once("../../../config.php");
include_once("../../verify.php");
        $sem=mysqli_escape_string($conn,$_POST['sem']);
        $email=mysqli_escape_string($conn,$_POST['email_id']);
        $rno=mysqli_escape_string($conn,$_POST['gpa']);

        $file_name=$_FILES['Uploadfile']['name'];
        $target_location=$base_dir.$file_name;
        move_uploaded_file( $_FILES['Uploadfile']['tmp_name'], $target_location);
        $cmd=''.$args;
        // $command = escapeshellcmd($cmd);
        // echo $cmd;
        $output = shell_exec($cmd." 2>&1");
        //echo $output;
        if(strpos($output,"Duplicate entry")){
    echo "Import Unsuccessful as adding caused duplicate entries";
}else{
    echo $output;
}
        exit();
?>