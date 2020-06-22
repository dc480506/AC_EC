<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=='inst_coor'){
    // echo 'Hi';
    include_once('../../../config.php');
    $data = json_decode(file_get_contents("php://input"),true); 
    $cid=mysqli_escape_string($conn,$data['cid']);
    $cname=mysqli_escape_string($conn,$data['cname']);
    $result = mysqli_query($conn,"select max,min from {$_SESSION['course_table']} WHERE sem='{$_SESSION['sem']}' and year='{$_SESSION['year']}' and cid='{$cid}'");
    $row=mysqli_fetch_assoc($result);
    $max=$row['max'];
    $min=$row['min'];
    $result=mysqli_query($conn,"(SELECT GROUP_CONCAT(dept_id SEPARATOR ', ') as dept
                        FROM `{$_SESSION['course_app_dept_table']}` 
                        WHERE cid='{$cid}' AND sem='{$_SESSION['sem']}' AND year='{$_SESSION['year']}'
                        GROUP BY 'all')");
    $str_arr=explode(", ",mysqli_fetch_assoc($result)['dept']);
    $checkbox_div='';

    $sql3 = "SELECT * FROM department WHERE dept_id NOT IN (".$exclude_dept.")";
    $dept_list = array();
    $result3 = mysqli_query($conn, $sql3);
    while ($row = mysqli_fetch_assoc($result3)) {
      array_push($dept_list, $row['dept_id'], $row['dept_name']);
    }
    for ($i = 1; $i < count($dept_list); $i = $i + 2) {
        $checkbox_div .= '
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="applicableDeptCheck' . $i . '" name="check_dept[]" value="' . $dept_list[$i - 1] . '"';
        if (in_array($dept_list[$i-1], $str_arr)) {
            $checkbox_div .= " checked";
        }
        $checkbox_div .= '>
            <label class="custom-control-label" for="applicableDeptCheck' . $i   . '"><small>' . $dept_list[$i] . '</small></label>
        </div>
        ';
    }
    // $checkbox_div='<div class="custom-control custom-checkbox custom-control-inline">
    //                  <input type="checkbox" class="custom-control-input" id="applicableDeptCheck" name="check_dept[]" value="1">
    //                  <label class="custom-control-label" for="applicableDeptCheck"><small>Comp</small></label>
    //              </div>';
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
                                <form id="delete_course">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1"><i class="text-danger">*This will delete all the information related to the students</i>
                                            <br>Are you sure you want to delete the course with <br> name <i><small><b>'.$cname.'</b></small></i>
                                            ,Course ID <i><small><b>'.$cid.'</small></b></i> ,semester <i><small><b>'.$_SESSION["sem"].'</b></small></i>
                                            And year <i><small><b>'.$_SESSION["year"].'</b></small></i>?
                                        </label>
                                        <br>
                                        <input type="hidden" name="cid" value="' . $cid . '">
                                        <button type="submit" class="btn btn-primary" id="delete_course_btn" name="delete_course">Yes</button>
                                        <button type="button" class="btn btn-secondary" name="no">No</button>
                                    </div>
                                </form>
                            </div>
                            <!--end Deletion-->
                            <!--Update-->
                            <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                                <form method="POST" id="update_course">
                                    <div class="form-row mt-4">
                                        <div class="form-group col-md-12">
                                        <label for="cname"><b>Course Name</b></label>
                                            <input type="text" class="form-control" required="required" placeholder="Course Name" name="cname" value="' . $cname . '" disabled>
                                            <input type="hidden" class="form-control"  name="cname" value="' . $cname. '">
                                        </div>
                                        <div class="form-group col-md-12">
                                        <label for="cid"><b>Course ID</b></label>
                                            <input type="text" class="form-control" required="required" placeholder="Course Id" name="cid" value="' . $cid . '" disabled>
                                            <input type="hidden" class="form-control"  name="cid" value="' . $cid. '">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="min"><b>Minimum Limit</b></label> 
                                            <input type="number" class="form-control"  placeholder="Minimum Strength" name="min_new" value="' . $min . '">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="max"><b>Maximum Limit</b></label> 
                                            <input type="number" class="form-control"  placeholder="Maximum Strength" name="max_new" value="' . $max . '">
                                        </div>
                                    </div>
                                    <label for="branch"><b>Applicable Departments</b></label>
                                    <br>
                                    ' . $checkbox_div . '
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-primary" id="update_course_btn" name="update_course">Update</button>
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