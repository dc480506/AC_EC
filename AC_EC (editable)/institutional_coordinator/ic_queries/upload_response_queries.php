<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=="inst_coor"){
    include_once("../../config.php");
    if(isset($_POST['save_changes'])){
        $sem=mysqli_escape_string($conn,$_POST['semester']);
        $year=mysqli_escape_string($conn,$_POST['year']);
        $type=mysqli_escape_string($conn,$_POST['course_type']);
        $rno=mysqli_escape_string($conn,$_POST['rno']);
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
        $target_location=$base_dir.$file_name;
        move_uploaded_file( $_FILES['Uploadfile']['tmp_name'], $target_location);
        $args='["'.$target_location.'","'.$servername.'","'.$username.'","'.$password.'","'.$dbname.'","'.$sem.'","'.$year.'","'.$type.'","'.$status.'","'.$npre.'","'.$rno.'","'.$email.'","'.$tstamp;
        for($i=1;$i<=$total_pref;$i++){
            $args.='","'.$npref[$i];
        }
        $args.='"]';
        // $command = escapeshellcmd($cmd);
        $cmd='python student_preference.py '.$args;
        // echo $cmd;
        $output = shell_exec($cmd." 2>&1");
        if(strpos($output,"Duplicate entry")){
    echo "Import Unsuccessful as adding caused duplicate entries";
}else{
    echo $output;
}

        header("Location: ../upload.php");
        exit();
    }


}
?>