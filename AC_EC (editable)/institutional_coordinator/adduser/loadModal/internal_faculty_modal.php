<?php
    // echo 'Hi';
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=='inst_coor'){
    // echo 'Hi';
    include_once('../../../config.php');
    $data = json_decode(file_get_contents("php://input"),true); 
    $name=mysqli_escape_string($conn,$data['name']);
    $email_id=mysqli_escape_string($conn,$data['email_id']);
    $dept_name=mysqli_escape_string($conn,$data['dept_name']);
    // $post=mysqli_escape_string($conn,$data['post']);
    $result = mysqli_query($conn,"select faculty_code,employee_id,fname,mname,lname,dept_id,post from faculty WHERE email_id='$email_id'");
    $row=mysqli_fetch_assoc($result);
    $faculty_code=$row['faculty_code'];
    $employee_id=$row['employee_id'];
    $fname=$row['fname'];
    $mname=$row['mname'];
    $lname=$row['lname'];
    $dept_id=$row['dept_id'];
    $post=$row['post'];
    // $dept_applicable=mysqli_escape_string($conn,$data['dept_applicable']);
    // $floating_dept=mysqli_escape_string($conn,$data['dept_name']);
    $result = mysqli_query($conn,"select academic_year from current_sem_info WHERE currently_active=1");
    $row=mysqli_fetch_assoc($result);
    $year=$row['academic_year'];
    // $checkbox_div='';
    // $floating_checkbox_div='';
    // $sql3 = "SELECT * FROM department";
    // $dept_list = array();
    // $result3 = mysqli_query($conn, $sql3);
    // while ($row = mysqli_fetch_assoc($result3)) {
    //   array_push($dept_list, $row['dept_id'], $row['dept_name']);
    // }
    // $str_arr = explode (", ", $dept_applicable);
    // $str_arr2= explode (", ", $floating_dept);
    // for ($i = 1; $i < count($dept_list); $i = $i + 2) {
    //   // For applicable dept
    //   if($dept_list[$i-1]!=$exclude_dept){
    //     $checkbox_div .= '
    //     <div class="custom-control custom-checkbox custom-control-inline">
    //         <input type="checkbox" class="custom-control-input" id="applicableDeptCheck' . $i . '" name="check_dept[]" value="' . $dept_list[$i - 1] . '"';
    //     if (in_array($dept_list[$i], $str_arr)) {
    //         $checkbox_div .= " checked";
    //     }
    //     $checkbox_div .= '>
    //         <label class="custom-control-label" for="applicableDeptCheck' . $i   . '"><small>' . $dept_list[$i] . '</small></label>
    //     </div>
    //     ';
    //   }
    //   // For floating dept
    //     $floating_checkbox_div .= '
    //     <div class="custom-control custom-checkbox custom-control-inline">
    //         <input type="checkbox" class="custom-control-input" id="floatingDeptCheck' . $i . '" name="floating_check_dept[]" value="' . $dept_list[$i - 1] . '"';
    //     if (in_array($dept_list[$i], $str_arr2)) {
    //         $floating_checkbox_div .= " checked";
    //     }
    //     $floating_checkbox_div .= '>
    //         <label class="custom-control-label" for="floatingDeptCheck' . $i   . '"><small>' . $dept_list[$i] . '</small></label>
    //     </div>
    //     ';
    // }
    // $dept_div .= '<div class="form-group">
    //                 <label for="exampleInputDepartment"><b>Floating Department</b></label>
    //                 <select class="form-control" required name="dept_id">';
    // for ($i = 1; $i < count($dept_list); $i = $i + 2) {
    //   $dept_div .= '<option';
    //   if($floating_dept == $dept_list[$i])
    //     $dept_div .= ' selected';
    //   $dept_div .= ' value="' . $dept_list[$i - 1] . '">' . $dept_list[$i] . '';
    //   $dept_div .= '</option>';
    // }
    // $dept_div .= '</select></div>';
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
                                            <br>Are you sure you want to delete the Faculty with <br> name <i><small><b>'.$name.'</b></small></i>
                                            ,Email ID <i><small><b>'.$email_id.'</small></b></i> ,faculty_code <i><small><b>'.$faculty_code.'</b></small></i>
                                            ,employee_id <i><small><b>'.$employee_id.'</b></small></i> And department <i><small><b>'.$dept_name.'</b></small></i>?
                                        </label>
                                        <br>
                                        <input type="hidden" name="email_id" value="' . $email_id . '">
                                        <button type="submit" class="btn btn-primary" id="delete_internal_faculty_btn" name="delete_internal_faculty">Yes</button>
                                        <button type="button" class="btn btn-secondary" name="no">No</button>
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
                                        <input type="text" class="form-control" required="required" placeholder="New Email Id" name="email_id_new" value="' . $email_id . '">
                                        <input type="hidden" class="form-control"  name="email_id_old" value="' . $email_id. '">
                                    </div>                                   
                                </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="faculty_code"><b>Faculty Code</b></label>
                                            <input type="text" class="form-control" required="required" placeholder="New Faculty Code" name="faculty_code_new" value="' . $faculty_code . '">
                                            <input type="hidden" class="form-control"  name="faculty_code_old" value="' . $faculty_code. '">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="employee_id"><b>Employee ID</b></label>
                                            <input type="text" class="form-control" required="required" placeholder="New Employee ID" name="employee_id_new" value="' . $employee_id. '">
                                            <input type="hidden" class="form-control"  name="employee_id_old" value="' . $employee_id. '">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="dept_name"><b>dept_name</b></label>
                                            <div class="form-group">
                                                <select class="form-control" required name="dept_id">
                                                    ';
                                                    $sql = "SELECT * FROM department";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$row['dept_id'].'">' . $row['dept_name'] . '</option>';
                                                    }
                                                    echo '
                                                </select>
                                             </div> 
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="post"><b>post</b></label>
                                            <input type="text" class="form-control" required="required" name="post_new" placeholder="New Post" value="' . $post . '">
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary" id="update_internal_faculty_btn" name="update_internal_faculty">Update</button>
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
                                // echo 'Hi';

}
?>