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
  $allocate_status = mysqli_escape_string($conn, $data['allocate_status']);
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
                  <form id="delete_response">
                      <div class="form-group">
                          <label for="exampleFormControlSelect1"><i class="text-danger">*This will delete all the information related to the students</i>
                              <br>Are you sure you want to delete the student with Email ID <i><small><b>'.$email_id.'</small></b></i> ,rollno <i><small><b>'.$rollno.'</b></small></i>?
                          </label>
                          <br>
                          <input type="hidden" name="email_id" value="' .$email_id. '">
                          <input type="hidden" name="rollno" value="' .$rollno. '">
                          <input type="hidden" name="sem" value="' .$sem. '">
                          <button type="submit" class="btn btn-primary" id="delete_response_btn" name="delete_response">Yes</button>
                          <button type="button" class="btn btn-secondary" name="no">No</button>
                      </div>
                  </form>
              </div>
              <!--end Deletion-->
              <!--Update-->
              <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                  <form method="POST" id="update_response">
                        <div class="form-row mt-4">
                            <div class="form-group col-md-6">
                            <label for="rollno"><b>Roll No</b></label>
                            <input type="text" class="form-control" required="required" placeholder="New Roll no" name="rollno_new" value="' .$rollno. '">
                            <input type="hidden" class="form-control"  name="rollno_old" value="' .$rollno. '">
                        </div>           
                        <div class="form-group col-md-6">
                              <label for="allocate_status"><b>Allocate Status (0/1)</b></label>
                              <input type="text" class="form-control" required="required" name="allocate_status_new" placeholder="New Allocate Status" value="' .$allocate_status. '">
                              <input type="hidden" class="form-control"  name="allocate_status_old" value="' .$allocate_status. '">
                          </div>                 
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="sem"><b>Semester</b></label>
                              <input type="text" class="form-control" required="required" placeholder="New Semester" name="sem_new" value="' .$sem. '">
                              <input type="hidden" class="form-control"  name="sem_old" value="' .$sem. '">
                          </div>
                          <div class="form-group col-md-6">
                              <label for="year"><b>Year</b></label>
                              <input type="text" class="form-control" required="required" placeholder="New Year" name="year_new" value="' .$year. '">
                              <input type="hidden" class="form-control"  name="year_old" value="' .$year. '">
                          </div>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary" id="update_response_btn" name="update_response">Update</button>
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
}
