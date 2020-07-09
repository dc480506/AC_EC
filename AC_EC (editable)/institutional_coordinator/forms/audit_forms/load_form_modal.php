<?php
include_once('../../verify.php');
include_once('../../../config.php');
$data = json_decode(file_get_contents("php://input"), true);
$sem = mysqli_escape_string($conn, $data['sem']);
$form_id = mysqli_escape_string($conn, $data['form_id']);
$year = mysqli_escape_string($conn, $data['year']);
$curr_sem = mysqli_escape_string($conn, $data['curr_sem']);
$start_date = date("Y-m-d", strtotime(mysqli_escape_string($conn, $data['start_date'])));
$start_time = mysqli_escape_string($conn, $data['start_time']);
$end_date = date("Y-m-d", strtotime(mysqli_escape_string($conn, $data['end_date'])));
$end_time = mysqli_escape_string($conn, $data['end_time']);
$no_of_preferences = mysqli_escape_string($conn, $data['no_of_preferences']);
$form_status = mysqli_escape_string($conn, $data['form_status']);

$applicabeDepartmentsSql = "select dept_id,dept_name , (if((select count(*) from form_applicable_dept acd inner join department d on acd.dept_id = d.dept_id where acd.dept_id=outerDept.dept_id and acd.form_id='$form_id' ) > 0,'checked','')) as is_applicable from department as outerDept";
$result = mysqli_query($conn, $applicabeDepartmentsSql);
$depts = "";
$c = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $depts .= '<div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" ' . $row['is_applicable'] . ' class="custom-control-input" id="dept_applicable_cb' . $c . '"  name="dept_applicable[]" value="' . $row['dept_id'] . '">
            <label class="custom-control-label" for="dept_applicable_cb' . $c . '"><small>' . $row['dept_name'] . '</small></label>
        </div>';
    $c++;
}
$tabs = '<a class="nav-item nav-link active" id="nav-delete-tab" data-toggle="tab" href="#nav-delete" role="tab" aria-controls="nav-delete" aria-selected="true">Deletion</a>
         <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update" role="tab" aria-controls="nav-update" aria-selected="false">Update</a>';
$show_allocate = false;
if ($form_status == 'Closed') {
    $tabs .= '<a class="nav-item nav-link" id="nav-allocate-tab" data-toggle="tab" href="#nav-allocate" role="tab" aria-controls="nav-allocate" aria-selected="false">Allocate</a>';
    $show_allocate = true;
}
echo '
    <div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-labelledby="form_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form_modal">Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            ' . $tabs . '
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <!--Deletion-->
                        <div class="tab-pane fade show active" id="nav-delete" role="tabpanel" aria-labelledby="nav-delete-tab">
                            <form action="ic_queries/prepare_form_ac_queries.php" id="delete-form" method="POST">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">
                                        <i class="text-danger">*This will delete all the information related to the Form including responses 
                                             collected if there are any.</i>
                                        <br>Are you sure you want to delete the <i><small><b>Audit Course Form</b></small></i> 
                                            for Semester <i><small><b>' . $sem . '</b></small></i> and Academic Year 
                                            <i><small><b>' . $year . '</b></small> ?</i>
                                    </label>
                                    <br>
                                    <input type="hidden" name="form_id" value="' . $form_id . '">
                                    <button type="submit" class="btn btn-primary" name="deleteForm">Yes, Delete</button>
                                    <button type="button" class="btn btn-secondary" name="no">No</button>
                                </div>
                            </form>
                        </div>
                        <!--end Deletion-->
                        <!--Update-->
                        <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                            <form action="ic_queries/prepare_form_ac_queries.php" id="update-form" method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputSem"><b>Floating Semester</b></label>
                                            <input type="number" required class="form-control" disabled value="' . $sem . '">
                                            <input type="hidden" required class="form-control" name="sem" value="' . $sem . '">
                                            <input type="hidden" required class="form-control" name="form_id" value="' . $form_id . '">
                                            </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputCurrSem"><b>Opening Semester</b></label>
                                            <input type="number" required class="form-control" name="curr_sem" disabled value="' . $curr_sem . '">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputYear"><b>Year</b></label>
                                            <input type="year" required class="form-control" disabled value="' . $year . '">
                                            <input type="hidden" required class="form-control" name="year" value="' . $year . '">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPreference"><b>No of Preferences</b></label>
                                            <input type="number" required class="form-control" name="nop" value="' . $no_of_preferences . '">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label for=""><b>Departments Applicable</b></label>
                                        <br>
                                        ' . $depts . '

                                    </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-check-label" for="exampleInputStartDate"><b>Start Date</b></label>
                                            <input type="date" required class="form-control" name="start_date" value="' . $start_date . '">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-check-label" for="exampleInputStartDate"><b>Start Time</b></label>
                                            <input type="time" required class="form-control"  name="start_time" value="' . $start_time . '">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-check-label" for="exampleInputStartDate"><b>End Date</b></label>
                                            <input type="date" required class="form-control" name="end_date" value="' . $end_date . '">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-check-label" for="exampleInputStartDate"><b>End Time</b></label>
                                            <input type="time" required class="form-control"  name="end_time" value="' . $end_time . '">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary align-center" name="modifyForm">Modify</button>
                            </form>
                            <br>
                        </div>
                        <!--Update end-->
                    ';
if ($show_allocate) {
    echo '
                        <div class="tab-pane fade" id="nav-allocate" role="tabpanel" aria-labelledby="nav-allocate-tab">
                            <form action="allocation/allocate_page.php" method="POST">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect3">
                                        Are you sure you want to proceed with Allocation process for Semester <i><small><b>' . $sem . '</b></small></i>
                                         and Academic Year <i><small><b>' . $year . '</b></small></i> ?</b>
                                    </label>
                                    <br>
                                    <input type="hidden" name="sem" value="' . $sem . '">
                                    <input type="hidden" name="year" value="' . $year . '">
                                    <input type="hidden" name="form_id" value="' . $form_id . '">

                                    <input type="hidden" name="no_of_preferences" value="' . $no_of_preferences . '">
                                    <button type="submit" class="btn btn-primary" role="button" name="allocate">Yes, Allocate</button>
                                    <a class="btn btn-secondary" href="prepare_form_ac.php" role="button" name="no">No</a>
                                    <br>
                                </div>
                            </form>
                        </div>
                        ';
}
echo '
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                        <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>';
