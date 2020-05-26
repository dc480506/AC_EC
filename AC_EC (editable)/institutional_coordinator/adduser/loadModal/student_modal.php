<?php
    // echo 'Hi';
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=='inst_coor'){
    // echo 'Hi';
    include_once('../../../config.php');
    $data = json_decode(file_get_contents("php://input"),true); 
    $email_id=mysqli_escape_string($conn,$data['email_id']);
    $rollno=mysqli_escape_string($conn,$data['rollno']);
    $fname=mysqli_escape_string($conn,$data['fname']);
    $dept_name=mysqli_escape_string($conn,$data['dept_name']);
    $year_of_admission=mysqli_escape_string($conn,$data['year_of_admission']);
    $current_sem=mysqli_escape_string($conn,$data['current_sem']);
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
                                <form id="delete_student">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"><i class="text-danger">*This will delete all the information related to the students</i>
                                            <br>Are you sure you want to delete the student with <br> name <i><small><b>'.$fname.'</b></small></i>
                                            ,Email ID <i><small><b>'.$email_id.'</small></b></i> ,rollno <i><small><b>'.$rollno.'</b></small></i>
                                            And department <i><small><b>'.$dept_name.'</b></small></i>?
                                        </label>
                                        <br>
                                        <input type="hidden" name="fname" value="' . $fname . '">
                                        <input type="hidden" name="email_id" value="' . $email_id . '">
                                        <input type="hidden" name="rollno" value="' . $rollno . '">
                                        <input type="hidden" name="dept_name" value="' . $dept_name . '">
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
                                            <input type="text" class="form-control" required="required" placeholder="First Name" name="fname_new" value="' . $fname . '">
                                            <input type="hidden" class="form-control" placeholder="First Name" name="fname_old" value="' . $fname . '">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email_id"><b>Email ID</b></label>
                                            <input type="text" class="form-control" required="required" placeholder="New Email Id" name="email_id_new" value="' . $email_id . '">
                                            <input type="hidden" class="form-control"  name="email_id_old" value="' . $email_id. '">
                                        </div>                                   
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="rollno"><b>Roll No</b></label>
                                            <input type="text" class="form-control" required="required" placeholder="New Roll no" name="rollno_new" value="' . $rollno . '">
                                            <input type="hidden" class="form-control"  name="rollno_old" value="' . $rollno. '">
                                        </div>
                                            
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="dept_name"><b>dept_name</b></label>
                                            <input type="text" class="form-control" required="required" name="dept_name_new" placeholder="120" value="' . $dept_name . '">
                                            <input type="hidden" class="form-control"  name="dept_name_old" value="' . $dept_name. '">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="current_sem"><b>current_sem</b></label>
                                            <input type="text" class="form-control" required="required" name="current_sem_new" placeholder="1" value="' . $current_sem . '">
                                            <input type="hidden" class="form-control"  name="current_sem_old" value="' . $current_sem. '">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="year_of_admission"><b>Year_of_Admission</b></label>
                                            <input type="text" class="form-control" required="required" name="year_of_admission_new" value="' . $year_of_admission . '">
                                            <input type="hidden" class="form-control"  name="year_of_admission_old" value="' . $year_of_admission. '">
                                        </div>
                                    </div>
                                    <br>
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
                                // echo 'Hi';
}
?>