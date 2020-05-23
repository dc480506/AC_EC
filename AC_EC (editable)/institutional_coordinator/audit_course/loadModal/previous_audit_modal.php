<?php
    // echo 'Hi';
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=='inst_coor'){
    // echo 'Hi';
    include_once('../../../config.php');
    $data = json_decode(file_get_contents("php://input"),true);
    $cid=mysqli_escape_string($conn,$data['cid']);
    $cname=mysqli_escape_string($conn,$data['cname']);
    $sem=mysqli_escape_string($conn,$data['sem']);
    $max=mysqli_escape_string($conn,$data['max']);
    $min=mysqli_escape_string($conn,$data['min']);
    $year=mysqli_escape_string($conn,$data['year']);
    $dept_applicable=mysqli_escape_string($conn,$data['dept_applicable']);
    $floating_dept=mysqli_escape_string($conn,$data['dept_name']);
    // $result = mysqli_query($conn,"select academic_year from current_sem_info WHERE currently_active=1");
    // $row=mysqli_fetch_assoc($result);
    // $year=$row['academic_year'];
    $dept_div='';
    $checkbox_div='';
    $sql3 = "SELECT * FROM department";
    $dept_list = array();
    $result3 = mysqli_query($conn, $sql3);
    while ($row = mysqli_fetch_assoc($result3)) {
      array_push($dept_list, $row['dept_id'], $row['dept_name']);
    }
    $str_arr = explode (", ", $dept_applicable);
    for ($i = 1; $i < count($dept_list); $i = $i + 2) {
        $checkbox_div .= '
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="mycustomCheck' . $i . '" name="check_dept[]" value="' . $dept_list[$i - 1] . '"';
        if (in_array($dept_list[$i], $str_arr)) {
            $checkbox_div .= " checked";
        }
        $checkbox_div .= '>
            <label class="custom-control-label" for="mycustomCheck' . $i   . '">' . $dept_list[$i] . '</label>
        </div>
        ';

    }
    $dept_div .= '<div class="form-group">
                    <label for="exampleInputDepartment"><b>Floating Department</b></label>
                    <select class="form-control" required name="dept_id">';
    for ($i = 1; $i < count($dept_list); $i = $i + 2) {
      $dept_div .= '<option';
      if($floating_dept == $dept_list[$i])
        $dept_div .= ' selected';
      $dept_div .= ' value="' . $dept_list[$i - 1] . '">' . $dept_list[$i] . '';
      $dept_div .= '</option>';
    }
    $dept_div .= '</select></div>';
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
                          <a class="nav-item nav-link" id="nav-moreinfo-tab" data-toggle="tab" href="#nav-moreinfo" role="tab" aria-controls="nav-moreinfo" aria-selected="false">More Info</a>
                        
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <!--Deletion-->
                        <div class="tab-pane fade show active" id="nav-delete" role="tabpanel" aria-labelledby="nav-delete-tab">
                        <form id="delete_course_form">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1"><b>Are you sure you want to delete?</b>
                          </label>
                          <br>
                          <input type="hidden" name="cid" value="' . $cid . '">
                          <input type="hidden" name="sem" value="' . $sem . '">
                          <input type="hidden" name="year" value="' . $year . '">
                          <button type="submit" class="btn btn-primary" id="delete_course_btn" name="delete_course_log">Yes</button>
                          <button type="button" class="btn btn-secondary" name="no">No</button>
                        </div>
                      </form>
                        </div>
                      <!--end Deletion-->
                      <!--Update-->
                      <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                        <form method="POST" id="update_course_form">
                          <div class="form-row mt-4">
                              <div class="form-group col-md-6">
                                  <label for="cname"><b>Name</b></label>
                                  <input type="text" class="form-control" required="required" placeholder="New Course Name" name="coursename" value="' . $cname . '">
                                  
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="courseid"><b>Course ID</b></label>
                                  <input type="text" class="form-control" required="required" placeholder="00000" name="courseidnew" value="' . $cid . '">
                                  <input type="hidden" class="form-control"  placeholder="00000" name="courseidold" value="' . $cid. '">
                              </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="semester"><b>Semester</b></label> 
                                <input type="text" class="form-control" required="required" placeholder="Semester" name="semnew" value="' . $sem . '">
                                <input type="hidden" class="form-control" placeholder="Semester" name="semold" value="' . $sem . '">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="semester"><b>Year</b></label>
                                <input type="text" class="form-control" disabled required="required" placeholder="Year" name="year" value="' . $year . '">
                                <input type="hidden" class="form-control" placeholder="Year" name="year" value="' . $year . '">
                            </div>        
                          </div>
                          <br>
                          ' . $dept_div . '
                          <br>
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="max"><b>Max</b></label>
                                  <input type="number" class="form-control" required="required" name="max" placeholder="120" value="' . $max . '">
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="min"><b>Min</b></label>
                                  <input type="number" class="form-control" required="required" name="min" placeholder="1" value="' . $min . '">
                              </div>
                          </div>
                          <label for="branch"><b>Branches to opt for</b></label>
                          <br>
                          ' . $checkbox_div . '
                          <br>
                          <button type="submit" class="btn btn-primary" id="update_course_btn" name="update_course_log">Update</button>
                        </form>
                        <br>
                      </div>
                      <!--end Update-->
                      <!--MoreInfo-->
                      <div class="tab-pane fade show" id="nav-moreinfo" role="tabpanel" aria-labelledby="nav-moreinfo-tab">
                      <form id="">
                      <div class="form-group">
                        <label for=""><b>More Info</b>
                        </label>
                      </div>
                    </form>
                      </div>
                      <!--end MoreInfo-->
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