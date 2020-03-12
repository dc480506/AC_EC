<?php 
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>

<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<?php
$sql1 = "SELECT * from audit_form,student where audit_form.sem=student.current_sem";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);

$sql2="SELECT * from student_preference_audit,student,audit_form where student_preference_audit.email_id=student.email_id && student_preference_audit.sem=audit_form.sem ";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_array($result2);
// $count = mysqli_num_rows($result2);
$today = date("Y-m-d H:i:s");
// $today_time = date("H:i:s");
// $date = "2020-03-05 00:00:00";
// if ($date < $today) {
//     $allow=1;
// }

if($row1['start_timestamp']>$today){
    echo'<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <h1 class="h3 mb-4 text-gray-800">Form</h1>
                    </div>
                    <div class="row align-items-center">
                    <h6 class="card-description"> The current form will open at '.$row1['start_timestamp'].' </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
}

else if($row1['end_timestamp']<$today){
    echo'
    <div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <h1 class="h3 mb-4 text-gray-800">Form</h1>
                    </div>
                    <div class="row align-items-center">
                        <h6 class="card-description"> The current form is closed  </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
}

// if($allow==1){
else{
    if($row2['form_filled']==1){
        echo'
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <h1 class="h3 mb-4 text-gray-800">Form</h1>
                            </div>
                            <div class="row align-items-center">
                                <h6 class="card-description"> Audit/Elective/InterDisciplinary Courses </h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">';
                            for($i=1;$i<=$row2['no_of_preferences'];$i++){
                                echo '<div class="col-6">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Preference '.$i.'
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item">'.$row2["pref".$i].'</a>
                                        </div>
                                    </div>
                                </div>';
                            }
    }
    else{
        echo'
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <h1 class="h3 mb-4 text-gray-800">Form</h1>
                            </div>
                            <div class="row align-items-center">
                                <h6 class="card-description"> Audit/Elective/InterDisciplinary Courses </h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="btn-group">
                                        <h6 class="card-description">Plsfill the form  </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
}
?>
<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>