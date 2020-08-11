<?php
// echo 'Hi';
session_start();
$allowed_roles = array("inst_coor", "faculty_co", "HOD");
if (isset($_SESSION['email']) && in_array($_SESSION['role'], $allowed_roles)) {
  // echo 'Hi';
  include_once('../../../config.php');
  $data = json_decode(file_get_contents("php://input"), true);
  $cid = mysqli_escape_string($conn, $data['cid']);
  $cname = mysqli_escape_string($conn, $data['cname']);
  $sem = mysqli_escape_string($conn, $data['sem']);
  $max = mysqli_escape_string($conn, $data['max']);
  $min = mysqli_escape_string($conn, $data['min']);
  $program = mysqli_escape_string($conn, $data['program']);
  $course_type_id = mysqli_escape_string($conn, $data['course_type_id']);
  $dept_applicable = mysqli_escape_string($conn, $data['dept_applicable']);
  $floating_dept = mysqli_escape_string($conn, $data['dept_name']);
  $is_closed_elective = mysqli_escape_string($conn, $data['is_closed_elective']) == 1;

  $result = mysqli_query($conn, "select academic_year from current_sem_info WHERE currently_active=1");
  $row = mysqli_fetch_assoc($result);

  $year = $row['academic_year'];
  $sql = "SELECT sem_type,academic_year FROM current_sem_info WHERE currently_active=1";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $sem_dropdown = "";
  // while ($row = mysqli_fetch_assoc($result)) {
  $sem_dropdown .= "<option>" . $sem . "</option>";
  if ($row['sem_type'] == 'EVEN') {
    for ($sem_start = 2; $sem_start <= 8; $sem_start += 2) {
      if ($sem == $sem_start) {
        continue;
      } else {
        $sem_dropdown .= "<option>" . $sem_start . "</option>";
      }
    }
    $temp = explode('-', $row['academic_year'])[0];
    $temp += 1;
    $temp2 = "" . ($temp + 1);
  } else {
    for ($sem_start = 1; $sem_start <= 8; $sem_start += 2) {
      $sem_dropdown .= "<option>" . $sem_start . "</option>";
    }
  }

  $faculty_div = "";
  $i = 1;
  //$faculties_allocated_temp = "(";
  $sql = "(SELECT cname,oldcid,oldsem,old_course_type_id,new_course_type_id , name ,oldyear,newcid, newsem,newyear,new_course_type_id FROM course INNER JOIN course_similar_map INNER JOIN course_types as ct
                ON newcid='$cid' AND newsem='$sem' AND newyear='$year' and new_course_type_id='$course_type_id' AND oldcid=cid AND oldsem=sem AND oldyear=year and old_course_type_id=course_type_id and old_course_type_id = ct.id)
                UNION
               (SELECT cname,oldcid,oldsem,old_course_type_id,new_course_type_id , name ,oldyear,newcid, newsem,newyear,new_course_type_id FROM course_log INNER JOIN course_similar_map INNER JOIN course_types as ct
                ON newcid='$cid' AND newsem='$sem' AND newyear='$year' and new_course_type_id='$course_type_id' AND oldcid=cid AND oldsem=sem AND oldyear=year and old_course_type_id=course_type_id and old_course_type_id = ct.id)
                ";

  $result = mysqli_query($conn, $sql);
  $similar_courses = "";
  if (mysqli_num_rows($result) == 0) {
    $faculty_div .= 'No Similar Courses Found';
    //$faculties_allocated_temp .= "'',";
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $oldyear = $row['oldyear'];
      $newyear = $row['newyear'];
      $oldsem = $row['oldsem'];
      $newsem = $row['newsem'];
      $oldcid = $row['oldcid'];
      $newcid = $row['newcid'];
      $cname = $row['cname'];
      $course_type = $row['name'];
      $new_course_type_id = $row['new_course_type_id'];
      $old_course_type_id = $row['old_course_type_id'];
      // $similar_courses.="<p><small>".$i.") ".$row['cname']." (Course ID: ".$row['oldcid']." , Sem: ".$row['oldsem']." , Year: ".$row['oldyear'].")</small></p>";
      // $faculty_div .= '<button data-toggle="modal" data-target="#deleteSimilarCourseModal" data-oldyear="'.$row['oldyear'].'" data-oldcid="'.$row['oldcid'].'" data-oldsem="'.$row['oldsem'].'" data-newyear="'.$row['newyear'].'" data-newcid="'.$row['newcid'].'" data-newsem="'.$row['newsem'].'" id="unallocate_faculty_btn'.$i.'" type="button" class="btn icon-btn" name="unallocate_faculty" value="'.$row['oldcid'].''.$row['oldsem'].''.$row['oldyear'].'"><i class="fas fa-trash"></i>
      //           </button>
      //           <label for="sem"><b>Course ' . $i . ' : </b>
      //           </label>
      //           <span>' . $row['cname'] .'<br>(CID: '.$row['oldcid'].', SEM: '.$row['oldsem']. ', YEAR: ' . $row['oldyear'] .' ) </span>
      //           <br>';
      //           $i = $i + 1;

      $faculty_div .= '<button data-toggle="modal" data-target="#deleteSimilarCourseModal" data-oldsem="' . $oldsem . '" data-newsem="' . $newsem . '" data-oldyear="' . $oldyear . '" data-newyear="' . $newyear . '" data-oldcid="' . $oldcid . '" data-newcid="' . $newcid . '" data-newcourse_type_id="' . $new_course_type_id . '" data-oldcourse_type_id="' . $old_course_type_id . '" id="unallocate_faculty_btn' . $i . '" type="button" class="btn icon-btn" name="unallocate_faculty" value="' . $oldcid . '"><i class="fas fa-trash"></i>
                      </button>
                      <label for="sem"><b>Course ' . $i . ' : </b>
                      </label>
                      <span>' . $row['cname'] . '</span><br><span style="margin-left: 44px;"><b>CID:</b> ' . $row['oldcid'] . ', <b>SEM:</b> ' . $row['oldsem'] . ', <b>YEAR:</b> ' . $row['oldyear'] . ', <b>COURSE TYPE:</b> ' . $course_type . '</span>
                      <br>';
      $i = $i + 1;
    }
  }



  $applicable_dept_div = '';
  $floating_dept_div = '';
  $sql3 = "SELECT * FROM department";
  $dept_list = array();
  $dept_ids = array();
  $result3 = mysqli_query($conn, $sql3);
  $include_dept_type_arr=array();
  while ($row = mysqli_fetch_assoc($result3)) {
    array_push($dept_list, $row['dept_id'], $row['dept_name']);
    $dept_ids[$row['dept_name']] = $row['dept_id'];
  }

  
  $sql4="SELECT dept_id FROM course_type_applicable_dept where course_type_id=$course_type_id";
  // echo $sql;
  $result4 = mysqli_query($conn, $sql4);
  while ($row = mysqli_fetch_assoc($result4)) {
    array_push($include_dept_type_arr, $row['dept_id']);
  }

  $str_arr = explode(", ", $dept_applicable);
  $str_arr2 = explode(", ", $floating_dept);
  $exclude_dept_arr = explode(',', $exclude_dept);

  // die(json_encode($dept_applicable));

  if ($is_closed_elective) {
    if (in_array($_SESSION['role'], array("faculty_co", "HOD"))) {
      $applicable_dept_div .= '
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" checked disabled  class="custom-control-input" id="applicableDeptCheck1" name="check_dept[]" value="' . $_SESSION['dept_id'] . '">
            <label class="custom-control-label" for="applicableDeptCheck1"><small>' . $_SESSION['dept_name'] . '</small></label>
        </div>
        ';
    } elseif ($_SESSION['role'] == 'inst_coor') {

      $applicable_dept_div = '<input type="text" class="form-control" required value="' . $floating_dept . '" readonly id= "exampleInputApplicableDeptUpdate" />';
      $applicable_dept_div .= '<input type="hidden" value="' . $dept_ids[$floating_dept] . '"  id= "exampleInputApplicableDeptUpdateVal" name= "check_dept[]" />';
      $floating_dept_div = '<select class="form-control" required id="exampleInputFloatingDeptUpdate" name="floating_check_dept[]" required>';
      for ($i = 1; $i < count($dept_list); $i = $i + 2) {
        if (!in_array($dept_list[$i - 1], $exclude_dept_arr) && in_array($dept_list[$i - 1], $include_dept_type_arr)) {
          $isChecked = in_array($dept_list[$i], $str_arr) ? "selected" : "";
          echo $dept_list[$i];
          $floating_dept_div .= "<option $isChecked value='{$dept_list[$i - 1]}'>{$dept_list[$i]}</option>";
        }
      }
      $floating_dept_div .= "</select>";
    }
  }

  for ($i = 1; $i < count($dept_list); $i = $i + 2) {
    // For applicable dept
    if (!$is_closed_elective && !in_array($dept_list[$i - 1], $exclude_dept_arr) && in_array($dept_list[$i - 1], $include_dept_type_arr) ) {
      $isChecked = in_array($dept_list[$i], $str_arr) ? "checked" : "";
      $applicable_dept_div .= '
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" ' . $isChecked . ' class="custom-control-input" id="applicableDeptCheck' . $i . '" name="check_dept[]" value="' . $dept_list[$i - 1] . '">
            <label class="custom-control-label" for="applicableDeptCheck' . $i   . '"><small>' . $dept_list[$i] . '</small></label>
        </div>
        ';
    }
    // For floating dept
    if ( in_array($dept_list[$i - 1], $include_dept_type_arr)  && ((!$is_closed_elective && $_SESSION['role'] == "inst_coor") || (in_array($_SESSION['role'], array("faculty_co", "HOD")) && $_SESSION['dept_name'] == $dept_list[$i]))) {
      $isChecked = in_array($dept_list[$i], $str_arr2) ? "checked" : "";
      $isEnabled = in_array($_SESSION['role'], array("faculty_co", "HOD")) ? "disabled" : "";
      $floating_dept_div .= '
      <div class="custom-control custom-checkbox custom-control-inline">
        <input type="checkbox" ' . $isChecked . ' ' . $isEnabled . ' class="custom-control-input" id="floatingDeptCheck' . $i . '" name="floating_check_dept[]" value="' . $dept_list[$i - 1] . '">
        <label class="custom-control-label" for="floatingDeptCheck' . $i   . '"><small>' . $dept_list[$i] . '</small></label>
      </div>';
    }
  }
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


  $yearsQuery = "(select distinct(year) from course) union (select distinct(year) from course_log)";
  $yearsQueryResult = mysqli_query($conn, $yearsQuery);
  $years = "<option value=''>Select Year..</option>";
  while ($row = mysqli_fetch_assoc($yearsQueryResult)) {
    $years .= "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
  }

  $syllabusQuery = "select syllabus_path from course where cid = '$cid' and year='$year' and sem='$sem' and course_type_id='$course_type_id' and program='$program'";
  $syllabus_path = mysqli_fetch_assoc(mysqli_query($conn, $syllabusQuery))['syllabus_path'];
  $removeSyllabusForm = "";
  if ($syllabus_path != "")
    $removeSyllabusForm = '<form id = "remove_syllabus_form">
    <input type="hidden" name="cid" value="' . $cid . '">
    <input type="hidden" name="year" value="' . $year . '"/>
    <input type="hidden" name="sem" value="' . $sem . '"/>
    <input type="hidden" name="program" value="' . $program . '">
    <input type="hidden" name="course_type_id" value="' . $course_type_id . '">
    <input type="hidden" name="syllabus_path" value="' . $syllabus_path . '">
    <input type="hidden" name="type" value="CURRENT">
    <button type="submit" class="btn btn-danger" id="remove_syllabus_btn" name="remove_syllabus">Remove Existing</button>
    <br><br>
     </form>';

  echo '<div class="modal fade mymodal" id="update-del-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered"  role="document">
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
                          <a class="nav-item nav-link" id="nav-map-tab" data-toggle="tab" href="#nav-map" role="tab" aria-controls="nav-map" aria-selected="false">Similar Previous Courses</a> 
                          <a class="nav-item nav-link" id="nav-map-tab" data-toggle="tab" href="#nav-syllabus" role="tab" aria-controls="nav-syllabus" aria-selected="false">Upload Syllabus</a>                        
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <!--Deletion-->
                        <div class="tab-pane fade show active" id="nav-delete" role="tabpanel" aria-labelledby="nav-delete-tab">
                        <form id="delete_course_form">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1"><i class="text-danger">*This will delete all the information related to the course including
                          students and faculties associated with it if there are any.</i><br>Are you sure you want to delete the course 
                          with Course ID <i><small><b>' . $cid . '</small></b></i> ,Semester <i><small><b>' . $sem . '</b></small></i> and
                            Academic Year <i><small><b>' . $year . '</b></small></i>?
                          </label>
                          <br>
                          <input type="hidden" name="cid" value="' . $cid . '">
                          <input type="hidden" name="program" value="' . $program . '">
                          <input type="hidden" name="course_type_id" value="' . $course_type_id . '">
                          <input type="hidden" name="sem" value="' . $sem . '">
                          <input type="hidden" name="year" value="' . $year . '">
                          <button type="submit" class="btn btn-primary" id="delete_course_btn" name="delete_course">Yes</button>
                          <button type="button" class="btn btn-secondary" name="no">No</button>
                        </div>
                      </form>
                        </div>
                      <!--end Deletion-->
                      <!--Update-->
                      <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                        <form method="POST" id="update_course_form">
                          <input type="hidden" name="program" value="' . $program . '">
                          <input type="hidden" name="course_type_id" value="' . $course_type_id . '">
                          <div class="form-row mt-4">
                              <div class="form-group col-md-6">
                                  <label for="cname"><b>Name</b></label>
                                  <input type="text" class="form-control" required="required" placeholder="New Course Name" name="coursename" value="' . $cname . '">
                                  
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="courseid"><b>Course ID</b></label>
                                  <input type="text" class="form-control" required="required" placeholder="00000" name="courseidnew" value="' . $cid . '">
                                  <input type="hidden" class="form-control"  placeholder="00000" name="courseidold" value="' . $cid . '">
                                  <span id="error_cid" class="text-danger"></span>
                              </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="semester"><b>Semester</b></label> 
                                <select class="form-control" required id="semnew" name="semnew" required="required" placeholder="Semester">
                                ' . $sem_dropdown . '
                                </select>
                              <input type="hidden" class="form-control" placeholder="Semester" id="semold" name="semold" value="' . $sem . '">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="semester"><b>Year</b></label>
                                <input type="text" class="form-control" disabled required="required" placeholder="Year" name="year" value="' . $year . '">
                                <input type="hidden" class="form-control" placeholder="Year" name="year" value="' . $year . '">
                            </div>        
                          </div>
                          <label for="floatingdept"><b>Floating Department</b></label>
                          <br>
                          ' . $floating_dept_div . '
                          <br>
                          <br>
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="max"><b>Max</b></label>
                                  <input type="number" class="form-control" required="required" id="max "name="max" placeholder="120" min="0" value="' . $max . '">
                                  <span id="error_max" class="text-danger"></span>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="min"><b>Min</b></label>
                                  <input type="number" class="form-control" required="required" id="min" name="min" placeholder="1" min="0" value="' . $min . '">
                              </div>
                          </div>
                          <label for="branch"><b>Branches to opt for</b></label>
                          <br>
                          ' . $applicable_dept_div . '
                          <br>
                          <button type="submit" class="btn btn-primary" id="update_course_btn" name="update_course">Update</button>
                        </form>
                        <br>
                      </div>
                      <!--end Update-->
                      <!--Map-->
                        <div class="tab-pane fade show" id="nav-map" role="tabpanel" aria-labelledby="nav-map-tab">
                        <br>
                          <form id="add_similar_course" method="POST" action="ic_queries/addcourse_queries.php">
                          <input type="hidden" name="tempoldyear" value="' . $year . '"/>
                          <input type="hidden" name="tempoldsem" value="' . $sem . '"/>
                          <input type="hidden" name="tempoldcid" value="' . $cid . '"/>
                          <input type="hidden" name="tempoldcourse_type_id" value="' . $course_type_id . '"/>

                            <h6><b>Similar Previous Courses</b></h6>
                                              <div class="faculty_div">' . $faculty_div . '</div>
                                              <hr class="my-4" />
                                              <h6><b>Add New Course</b></h6>
                                              
                                              <br>
                                              <div class = "temporarydiv" style="display:none">
                                              <div class="form-row mt-4">

                              <div class="form-group col-md-6">
                                  <label for="cname"><b>Year</b></label>
                                  <br>
                                  <select class="custom-select tempyear" id="tempyear" name="tempyear" required>' . $years . '</select>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="courseid"><b>Semester</b></label>
                                  <select class="custom-select tempsem" id="tempsem" name="tempsem" required> <option value="">Select Semester</option></select>
                              </div>
                          </div>
                          <div class="form-row mt-4">
                              <div class="form-group col-md-6">
                                  <label for="cname"><b>Course </b></label>
                                   <select class="custom-select tempcid" id="tempcid" name="tempcid" required> <option value="">Select Course</option></select>
                              </div>
                              <div class="form-group col-md-6">
                                  
                                  <input type="hidden" class="form-control" required="required" placeholder="New Year" name="tempyear2" value="">
                              </div>
                          </div>
                          </div>
                          <button type="submit" class="btn btn-primary" id="add_new_similar_course_btn" name="add_new_similar_course">Allocate</button>
                          <br>
                          <br>
                          </form>
                        </div>
                      <!--end Map-->

                      <div class="tab-pane fade show" id="nav-syllabus" role="tabpanel" aria-labelledby="nav-syllabus-tab"><br>
                      ' . $removeSyllabusForm . '
                       <form id="upload_syllabus" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="year" value="' . $year . '"/>
                          <input type="hidden" name="sem" value="' . $sem . '"/>
                          <input type="hidden" name="cid" value="' . $cid . '"/>
                          <input type="hidden" name="cname" value="' . $cname . '"/>
                          <input type="hidden" name="program" value="' . $program . '">
                          <input type="hidden" name="course_type_id" value="' . $course_type_id . '">

                          <div class="form-group files color">                                                          
                              <input type="file" name="UploadSyllabusfile" class="form-control" required />
                          </div>
                             <div class="d-flex align-items-center">
                            <button type="submit" class="btn btn-primary" id="upload_syllabus_btn" name="upload_syllabus">upload</button>
                            <div class="progress w-50 mx-2" style="display:none;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0"></div>
                              </div>
                          </div>
                           
                           <br/>
                          </form>
                      </div>


                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                          <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<!--delete Faculty Modal-->
              <div style="background-color: rgba(40, 40, 40, .7)" class="modal fade" id="deleteSimilarCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Are you sure?</h5>
                      <button class="close" type="submit" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <form id="newModalRemoveCourse" method="POST" action="ic_queries/addcourse_queries.php">
                      <div class="modal-body">Select "Remove" below if you want to remove the selected course.
                          <input type="hidden" name="oldyear" id="oldyear" value=""/>
                          <input type="hidden" name="oldsem" id="oldsem" value=""/>
                          <input type="hidden" name="oldcid" id="oldcid" value=""/>
                          <input type="hidden" name="newyear" id="newyear" value=""/>
                          <input type="hidden" name="newsem" id="newsem" value=""/>
                          <input type="hidden" name="newcid" id="newcid" value=""/>
                           <input type="hidden" name="newcid" id="newcid" value=""/>
                           <input type="hidden" name="new_course_type_id" id="new_course_type_id" value=""/>
                           <input type="hidden" name="old_course_type_id" id="old_course_type_id" value=""/>
                           </div>
                      <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <button class="btn btn-primary" type="submit" id="course_remove_btn" name="course_remove">Remove</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
            <!--end Delete Faculty Modal-->';

  // echo 'Hi';
}
