<?php
// echo 'Hi';
session_start();
$allowed_roles = array("inst_coor", "faculty_co", "HOD");
if (isset($_SESSION['email']) && in_array($_SESSION['role'], $allowed_roles)) {
    include_once('../../../config.php');
    // echo 'Hi';
    $data = json_decode(file_get_contents("php://input"), true);
    $email_id = mysqli_escape_string($conn, $data['email_id']);
    $name = mysqli_escape_string($conn, $data['name']);
    $dept_name = mysqli_escape_string($conn, $data['dept_name']);
    $result = mysqli_query($conn, "select rollno,fname,mname,lname,dept_id,year_of_admission,current_sem from student WHERE email_id='$email_id'");
    $row = mysqli_fetch_assoc($result);
    $rollno = $row['rollno'];
    $fname = $row['fname'];
    $mname = $row['mname'];
    $lname = $row['lname'];
    $dept_id = $row['dept_id'];
    $year_of_admission = $row['year_of_admission'];
    $current_sem = $row['current_sem'];

    $result = mysqli_query($conn, "select academic_year from current_sem_info WHERE currently_active=1");
    $row = mysqli_fetch_assoc($result);
    $year = $row['academic_year'];
    echo '<div class="modal fade mymodal" id="update-del-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle1">Action</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    
                    <div class="modal-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-delete-tab" data-toggle="tab" href="#nav-delete" role="tab" aria-controls="nav-delete" aria-selected="true">Deletion</a>
                                <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update" role="tab" aria-controls="nav-update" aria-selected="false">Update</a>                        
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <!--Deletion-->
                            <div class="tab-pane fade show active" id="nav-delete" role="tabpanel" aria-labelledby="nav-delete-tab">
                                <form id="delete_student">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"><i class="text-danger">*This will delete all the information related to the students</i>
                                            <br>Are you sure you want to delete the student with <br> name <i><small><b>' . $name . '</b></small></i>
                                            ,Email ID <i><small><b>' . $email_id . '</small></b></i> ,rollno <i><small><b>' . $rollno . '</b></small></i>
                                            And department <i><small><b>' . $dept_name . '</b></small></i>?
                                        </label>
                                        <br>
                                        <input type="hidden" name="email_id" value="' . $email_id . '">
                                        <button type="submit" class="btn btn-primary" id="delete_student_btn" name="delete_student">Yes</button>
                                        <button type="button" class="btn btn-secondary" name="no">No</button>
                                    </div>
                                </form>
                            </div>
                            <!--end Deletion-->
                            <!--Update-->
                            <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                                <form method="POST" id="update_student">
                                    <div class="form-row mt-4">
                                        <div class="form-group col-md-6">
                                            <label for="fname"><b>First Name</b></label> 
                                            <input type="text" class="form-control"  placeholder="First Name" name="fname_new" value="' . $fname . '">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="mname"><b>Middle Name</b></label> 
                                            <input type="text" class="form-control"  placeholder="Middle Name" name="mname_new" value="' . $mname . '">
                                        </div><div class="form-group col-md-6">
                                            <label for="lname"><b>Last Name</b></label> 
                                            <input type="text" class="form-control"  placeholder="Last Name" name="lname_new" value="' . $lname . '">
                                        </div>  
                                        <div class="form-group col-md-6">
                                            <label for="email_id"><b>Email ID</b></label>
                                            <input type="email" class="form-control" required="required" placeholder="New Email Id" name="email_id_new" id="email_id_new" value="' . $email_id . '">
                                            <input type="hidden" class="form-control"  name="email_id_old" id="email_id_old" value="' . $email_id . '">
                                            <span id="error_email_id" class="text-danger"></span>
                                        </div>                                   
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="rollno"><b>Roll No</b></label>
                                            <input type="text" class="form-control" required="required" placeholder="New Roll no" name="rollno_new" value="' . $rollno . '">
                                            <input type="hidden" class="form-control"  name="rollno_old" value="' . $rollno . '">
                                            <span id="error_rollno" class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="year_of_admission"><b>Year</b></label>
                                            <select class="form-control" name="year_of_admission_new" id="year_of_admission_new">';
    $sql = "SELECT academic_year FROM current_sem_info WHERE currently_active=1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $year1 = $row['academic_year'];
    $year2 = $row['academic_year'];
    for ($i = 0; $i < 2; $i++) {
        $temp = explode('-', $year1)[0];
        $temp += 1;
        $temp2 = "" . ($temp + 1);
        $year1 = $temp . "-" . substr($temp2, 2);
        $year1_value = $temp;
        echo '<option>' . $year1_value . '</option>';
    }
    for ($i = 0; $i < 4; $i++) {
        if ($year == $year1) {
            $year_dropdown .= "<option selected>" . $year1_value . "</option>";
        }
        $temp = explode('-', $year2)[0];
        $year2_value = $temp;
        $temp -= 1;
        $temp2 = "" . ($temp + 1);
        $year2 = $temp . "-" . substr($temp2, 2);
        //   $year2_value = $temp;
        echo '<option>' . $year2_value . '</option>';
    }

    echo '</select>
                                            <input type="hidden" class="form-control"  name="year_of_admission_old" value="' . $year_of_admission . '">
                                        </div>  
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="dept_name"><b>Department</b></label>
                                            <div class="form-group">
                                                <select class="form-control" required name="dept_id">
                                                    ';
    if ($_SESSION['role'] == "inst_coor") {

        $sql = "SELECT * FROM department";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['dept_id'] == $dept_id) {
                echo '<option selected value="' . $row['dept_id'] . '">' . $row['dept_name'] . '</option>';
            } else {
                echo '<option  value="' . $row['dept_id'] . '">' . $row['dept_name'] . '</option>';
            }
        }
    } else if (in_array($_SESSION['role'], array('faculty_co', "HOD"))) {
        echo '<option  value="' . $_SESSION['dept_id'] . '">' . $_SESSION['dept_name'] . '</option>';
    }

    echo '
                                                </select>
                                             </div> 
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="current_sem"><b>Semester</b></label>
                                            <select class="form-control" required="required" name="current_sem_new" id="current_sem_new">';
    $i = 1;
    for ($i = 1; $i <= 8; $i++) {
        echo '<option value="';
        echo $i;
        echo '"';
        if ($i == $current_sem)
            echo ' selected';
        echo ">";
        echo $i;
        echo '</option>';
    }
    echo '</select>                                            
                                        </div>                                    
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary" id="update_student_btn" name="update_student">Update</button>
                                </form>
                                <br>
                            </div>
                            <!--end Update-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>';
    // $name=$fname.' '.$mname.' '.$lname;

    // echo 'Hi';
}
?>
<script>
    function SemestersOnly(input) {
        var regex = /[^1-8]/;
        input.value = input.value.replace(regex, "");
    }

    function NumbersOnly(input) {
        var regex = /[a-z]/;
        input.value = input.value.replace(regex, "");
        var regex1 = /[2-9]/;
        input.value = input.value.replace(regex1, "");
    }
</script>