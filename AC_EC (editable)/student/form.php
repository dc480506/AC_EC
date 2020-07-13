<?php
    include('../config.php');
    include_once('verify.php');
    include('../includes/header.php');
    include('sidebar.php');
    include('../includes/topbar_student.php');

    $course = array();
    $index = 0;
    $sql = "SELECT sem_type,academic_year FROM current_sem_info WHERE currently_active=1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['sem_type'] == 'EVEN') {
        $temp = explode('-', $row['academic_year'])[0];
        $temp += 1;
      
        $temp2 = "" . ($temp + 1);
        $year_val = $temp . "-" . substr($temp2, 2);
      
    } else {
        $year_val = $row['academic_year'];
    }

    $sql1 = "SELECT form.form_id,form.start_timestamp,form.end_timestamp,sem,year,form.no_of_preferences FROM form INNER JOIN student ON form.curr_sem=student.current_sem AND student.email_id='{$_SESSION['email']}' AND form.program='{$_SESSION['program']}' AND year='$year_val'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) == 0) { ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <h1 class="h3 mb-4 text-gray-800">Form</h1>
                            </div>
                            <div class="row align-items-center">
                                <h6 class="card-description" style="color:red;">No Forms Are Floated At The Moment!</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {

        $row1 = mysqli_fetch_array($result1);
        $_SESSION['no_of_preferences'] = $row1['no_of_preferences'];
        date_default_timezone_set('Asia/Kolkata');
        $today = date("Y-m-d H:i:s");

        $_SESSION['form_id']=$row1['form_id'];
        // echo $_SESSION['form_id'];
        if ($row1['start_timestamp'] > $today) { ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <h1 class="h3 mb-4 text-gray-800">Form</h1>
                            </div>
                            <div class="row align-items-center">
                                <h6 style="color:red" class="card-description"> The current form will open
                                    on <?php echo $row1['start_timestamp']; ?>.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }

else if($row1['end_timestamp'] < $today) { ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <h1 class="h3 mb-4 text-gray-800">Form</h1>
                            </div>
                            <div class="row align-items-center">
                                <h6 class="card-description"> The current form is closed </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }

         else {
            $_SESSION['endTime'] = $row1['end_timestamp'];
            $endTime = new DateTime($_SESSION['endTime']);
            $sem = $row1['sem'];
            $year = $row1['year'];
            $_SESSION['year'] = $year;
            $_SESSION['sem'] = $sem;
            echo "form is open";
            // $sql7 = "SELECT * FROM student_form WHERE form_type='audit' AND sem='$sem' AND year='{$row1['year']}' AND no=0 AND email_id='{$_SESSION['email']}'";

            // $sql7 = "SELECT * FROM student_form WHERE form_id='{$_SESSION['form_id']}' AND email_id='{$_SESSION['email']}'";
            // $result7 = mysqli_query($conn, $sql7);

            // if (mysqli_num_rows($result7) > 0) {
            //         $row7 = mysqli_fetch_assoc($result7);
            //        echo json_encode($row7);
            //     }
         }
        }
 ?>
 <?php
 include('../includes/footer.php');
 include('../includes/scripts.php');
?>