<?php
include_once('../../../verify.php');
include_once('../../../../config.php');
$data = json_decode(file_get_contents("php://input"), true);
$email_id = mysqli_escape_string($conn, $data['email_id']);
$rollno = mysqli_escape_string($conn, $data['rollno']);
$sem = mysqli_escape_string($conn, $data['sem']);
$year = mysqli_escape_string($conn, $data['year']);
$form_id = mysqli_escape_string($conn, $data['form_id']);
$currently_active = mysqli_escape_string($conn, $data['currently_active']);
$allocate_status = mysqli_escape_string($conn, $data['allocate_status']);
$year_temp = mysqli_escape_string($conn, $data['year']);
// echo $year_temp;
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
                        <label for="exampleFormControlSelect1"><i class="text-danger">*This will delete the response collected from this student and the student will have to fill the form again</i>
                            <br>Are you sure you want to delete the student with Email ID <i><small><b>' . $email_id . '</small></b></i> ,rollno <i><small><b>' . $rollno . '</b></small></i>?
                        </label>
                        <br>
                        <input type="hidden" name="email_id" value="' . $email_id . '">
                        <input type="hidden" name="rollno" value="' . $rollno . '">
                        <input type="hidden" name="sem" value="' . $sem . '">
                        <input type="hidden" name="year" value="' . $year . '">
                        <input type="hidden" name="currently_active" value="' . $currently_active . '">
                        <input type="hidden" name="type" value="audit">
                        <input type="hidden" name="no" value="0">
                        <input type="hidden" name="form_id" value="' . $form_id . '">
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
                        <input type="text" class="form-control" required="required" placeholder="New Roll no" name="rollno_new" id ="rollno_new" value="' . $rollno . '">
                        <input type="hidden" class="form-control"  name="rollno_old" id="rollno_old" value="' . $rollno . '">
                        <span id="rollno_error" class="text-danger"></span>
                    </div>           
                    <div class="form-group col-md-6">
                            <label for="allocate_status"><b>Allocate Status (0/1)</b></label>
                            <input type="text" class="form-control" required="required" name="allocate_status_new" placeholder="New Allocate Status" maxlength="1" minlength="1" min="0" max="1"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="NumbersOnly(this)" value="' . $allocate_status . '">
                            <input type="hidden" class="form-control"  name="allocate_status_old" value="' . $allocate_status . '">
                        </div>                 
                    </div>'
?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="semester"><b>Semester</b></label>
        <?php
        $sql = "SELECT sem_type,academic_year FROM current_sem_info WHERE currently_active=1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $sem_dropdown = "";

        for ($sem_start = 1; $sem_start <= 8; $sem_start += 1) {
            if ($sem == $sem_start) {
                $sem_dropdown .= "<option selected>" . $sem_start . "</option>";
            } else {
                $sem_dropdown .= "<option>" . $sem_start . "</option>";
            }
        }
        echo '<select class="form-control" name="sem_new" id="sem_new">
                                ' . $sem_dropdown . '
                            </select>';
        echo '<input type="hidden" class="form-control" placeholder="Semester" name="sem_old" value="' . $sem . '">';

        ?>
    </div>
    <div class="form-group col-md-6">
        <label for="year"><b>Year</b></label>
        <select class="form-control" name="year_new" id="year_new">
            <?php
            $sql = "SELECT academic_year FROM current_sem_info WHERE currently_active=1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $year1 = $row['academic_year'];
            $year2 = $row['academic_year'];
            // $selected = false;
            // $temp3 = explode('-', $year_temp)[0];
            // $temp4 = explode('-', $year1)[0];
            // $temp5 = explode('-', $year2)[0];
            echo "<option selected>" . $year_temp . "</option>";
            for ($i = 0; $i < 2; $i++) {
                // if ($temp3 == $year2 || $temp3 == $year1) 
                // 
                if ($year1 == $year_temp) {
                    continue;
                } else {
                    $temp = explode('-', $year1)[0];
                    $temp += 1;
                    $temp2 = "" . ($temp + 1);
                    $year1 = $temp . "-" . substr($temp2, 2);
                    echo '<option>' . $year1 . '</option>';
                }
            }
            for ($i = 0; $i < 4; $i++) {
                if ($year_temp == $year2) {
                    continue;
                } else {
                    echo '<option>' . $year2 . '</option>';
                    $temp = explode('-', $year2)[0];
                    $temp -= 1;
                    $temp2 = "" . ($temp + 1);
                    $year2 = $temp . "-" . substr($temp2, 2);
                }
            }
            echo '<input type="hidden" class="form-control" placeholder="Year" id ="year_old" name="year_old" value="' . $year . '">';
            ?>
    </div>

</div>
<?php
echo '
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