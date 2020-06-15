<?php
// echo 'Hi';
session_start();
if (isset($_SESSION['email']) && $_SESSION['role'] == 'inst_coor') {
  // echo 'Hi';
  include_once('../../../config.php');
  $data = json_decode(file_get_contents("php://input"), true);
  $email_id = mysqli_escape_string($conn, $data['email_id']);
  $rollno = mysqli_escape_string($conn, $data['rollno']);
  $sem = mysqli_escape_string($conn, $data['sem']);
  $year = mysqli_escape_string($conn, $data['year']);
  $gpa = mysqli_escape_string($conn, $data['gpa']);

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
                        <form id="delete_course_form">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1"><i class="text-danger">*This will delete all the information of this student related to the course</i><br>Are you sure you want to delete the student record 
                          with Email ID <i><small><b>' . $email_id . '</small></b></i> ,Semester <i><small><b>' . $sem . '</b></small></i> and
                            Academic Year <i><small><b>' . $year . '</b></small></i>?
                          </label>
                          <br>
                          <input type="hidden" name="email_id" value="' . $email_id . '">
                          <input type="hidden" name="sem" value="' . $sem . '">
                          <input type="hidden" name="year" value="' . $year . '">
                          <button type="submit" class="btn btn-primary" id="delete_course_btn" name="delete_student_marks">Yes</button>
                          <button type="button" class="btn btn-secondary" name="no">No</button>
                        </div>
                      </form>
                        </div>
                      <!--end Deletion-->
                      <!--Update-->
                      <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                        <form method="POST" id="update_course_form" action="ic_queries/studentmarks_queries.php">
                          <div class="form-row mt-4">
                              <div class="form-group col-md-6">
                                  <label for="email_id"><b>Email</b></label>
                                  <input type="text" class="form-control" disabled required="required" placeholder="Email ID" name="email_id" value="' . $email_id . '">
                                  
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="rollno"><b>Roll Number</b></label>
                                  <input type="text" class="form-control" disabled required="required" placeholder="00000" name="rollno" value="' . $rollno . '">
                              </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="semester"><b>Semester</b></label> 
                                <select class="form-control" name="semnew" id="sem_new">';
  $i = 1;
  for ($i = 1; $i <= 8; $i++) {
    echo '<option value="';
    echo $i;
    echo '"';
    if ($i == $sem)
      echo ' selected';
    echo ">";
    echo $i;
    echo '</option>';
  }
  echo '</select>
<input type="hidden" class="form-control" placeholder="Semester" name="semold" value="' . $sem . '">
<input type="hidden" class="form-control" placeholder="Semester" name="email_id_student" value="' . $email_id . '">
</div>
<div class="form-group col-md-6">
<label for="semester"><b>Year</b></label>
<select class="form-control" name="yearnew" id="year_new">';
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
    echo '<option>' . $year1 . '</option>';
  }
  for ($i = 0; $i < 4; $i++) {
    if ($year == $year1) {
      $year_dropdown .= "<option selected>" . $year1 . "</option>";
    }
    echo '<option>' . $year2 . '</option>';
    $temp = explode('-', $year2)[0];
    $temp -= 1;
    $temp2 = "" . ($temp + 1);
    $year2 = $temp . "-" . substr($temp2, 2);
  }

  echo '</select>
                                <input type="hidden" class="form-control" placeholder="Year" name="yearold" value="' . $year . '">
                            </div>        
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="max"><b>GPA</b></label>
                                  <input type="number" step="0.001" class="form-control" required="required" name="gpa" placeholder="10.0" value="' . $gpa . '">
                              </div>
                              <div class="form-group col-md-6">
                                  <input type="hidden" class="form-control" required="required" name="min" placeholder="1" value="' . $year . '">
                              </div>
                          </div>
                          <button type="submit" class="btn btn-primary" id="update_course_btn" name="update_marks">Update</button>
                        </form>
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
