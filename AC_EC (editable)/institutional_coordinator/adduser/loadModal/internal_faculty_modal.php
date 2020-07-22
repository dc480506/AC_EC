<?php
// echo 'Hi';
session_start();
$allowed_roles = array("inst_coor", "faculty_co", "HOD");
if (isset($_SESSION['email']) && in_array($_SESSION['role'], $allowed_roles)) {
    // echo 'Hi';
    include_once('../../../config.php');
    $data = json_decode(file_get_contents("php://input"), true);
    $name = mysqli_escape_string($conn, $data['name']);
    $email_id = mysqli_escape_string($conn, $data['email_id']);
    $dept_name = mysqli_escape_string($conn, $data['dept_name']);
    // $post=mysqli_escape_string($conn,$data['post']);
    $result = mysqli_query($conn, "select faculty_code,employee_id,fname,mname,lname,dept_id,post,role from faculty WHERE email_id='$email_id'");
    $row = mysqli_fetch_assoc($result);
    $faculty_code = $row['faculty_code'];
    $employee_id = $row['employee_id'];
    $fname = $row['fname'];
    $mname = $row['mname'];
    $lname = $row['lname'];
    $dept_id = $row['dept_id'];
    $post = $row['post'];
    $role = $row['role'];
    // $dept_applicable=mysqli_escape_string($conn,$data['dept_applicable']);
    // $floating_dept=mysqli_escape_string($conn,$data['dept_name']);
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
                                <form id="delete_internal_faculty">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"><i class="text-danger">*This will delete all the information related to the Faculty</i>
                                            <br>Are you sure you want to delete the Faculty with <br> name <i><small><b>' . $name . '</b></small></i>
                                            ,Email ID <i><small><b>' . $email_id . '</small></b></i> ,faculty_code <i><small><b>' . $faculty_code . '</b></small></i>
                                            ,employee_id <i><small><b>' . $employee_id . '</b></small></i> And department <i><small><b>' . $dept_name . '</b></small></i>?
                                        </label>
                                        <br>
                                        <input type="hidden" name="email_id" value="' . $email_id . '">
                                        <div class="row">
                                            <div class="col-md-6 text-left">
                                                <button type="submit" class="btn btn-primary" id="delete_internal_faculty_btn" name="delete_internal_faculty">Yes</button>
                                                <button type="button" class="btn btn-secondary" name="no">No</button>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                            </div>
                                        </div>


                                     
                                           
                                    
                                    </div>
                                </form>
                            </div>
                            <!--end Deletion-->
                            <!--Update-->
                            <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                                <form method="POST" id="update_internal_faculty">
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
                                            <label for="faculty_code"><b>Short Name</b></label>
                                            <input type="text" class="form-control" required="required" placeholder="New Faculty Code" name="faculty_code_new" value="' . $faculty_code . '">
                                            <input type="hidden" class="form-control"  name="faculty_code_old" value="' . $faculty_code . '">
                                            <span id="error_faculty_code" class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="employee_id"><b>Employee ID</b></label>
                                            <input type="text" class="form-control" required="required" placeholder="New Employee ID" name="employee_id_new" value="' . $employee_id . '">
                                            <input type="hidden" class="form-control"  name="employee_id_old" value="' . $employee_id . '">
                                            <span id="error_employee_id" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="dept_name"><b>Department</b></label>
                                            <div class="form-group">
                                                <select class="form-control" required name="dept_id" value="' . $dept_name . '">
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
                                            <label for="post"><b>Post</b></label>
                                            <input type="text" class="form-control" required="required" name="post_new" placeholder="New Post" value="' . $post . '">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="role"><b>Role</b></label>
                                            <div class="form-group">
                                                <select class="form-control" required name="role_new">
                                                ';
    $roles_applicable = array();
    $flag = false;
    foreach ($roles as $key => $value) {
        if ($flag) {
            $roles_applicable[$key] = $value;
        }
        if ($key == $_SESSION["role"]) {
            $flag = 1;
        }
    }

    foreach ($roles_applicable as $key => $value) {
        if ($key == $role) {
            echo "<option selected value='$key'>$value</option>";
        } else {
            echo "<option value='$key'>$value</option>";
        }
    }





    echo '
                                                  
                                                </select>
                                                
                                             </div> 
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 text-center">
                                            <button type="submit" class="btn btn-primary" id="update_internal_faculty_btn" name="update_internal_faculty">Update</button>
                                        </div>
                                        <div class="form-group col-md-6 text-center">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                        </div>
                                    </div>
                                </form>
                            
                            </div>
                            <!--end Update-->
                  
                        </div>
                    </div>
                    </div>
                </div>
            </div>';
    // echo 'Hi';

}
