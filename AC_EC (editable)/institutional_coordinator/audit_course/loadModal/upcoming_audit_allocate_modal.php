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
    $year=mysqli_escape_string($conn,$data['year']);
    $faculty_div = "";
    $faculties_allocated_temp = "(";
    $i = 1;
    $sql = "SELECT email_id, faculty_code, fname FROM faculty_audit NATURAL JOIN faculty WHERE cid = '$cid' AND sem = '$sem' AND year = '$year' AND currently_active='0'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0) {
        $faculty_div .= 'No Faculty Allocated';
        $faculties_allocated_temp .= "'',";
    }
    while ($row = mysqli_fetch_assoc($result)) {
      $faculties_allocated_temp .= "'". $row['email_id']. "',";
      $email = $row['email_id'];
      $faculty_div .= '<button data-toggle="modal" data-target="#deleteFacultyModal" data-email_id="'.$email.'" data-year="'.$year.'" data-cid="'.$cid.'" data-sem="'.$sem.'" id="unallocate_faculty_btn'.$i.'" type="button" class="btn icon-btn" name="unallocate_faculty" value="'.$email.'"><i class="fas fa-trash"></i>
                      </button>
                      <label for="sem"><b>Faculty ' . $i . ' : </b>
                      </label>
                      <span> ' . $row['fname'] . '( ' . $row['faculty_code'] .' ) </span>
                      <br>';
                      $i = $i + 1;
    }
    $faculties_allocated_temp=substr($faculties_allocated_temp,0,strlen($faculties_allocated_temp)-1);
    $faculties_allocated_temp .= ")";
    echo '
    <!--allocate Modal-->
    <div class="modal fade mymodal" id="allocate-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
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
                            <a class="nav-item nav-link active" id="nav-allocate-tab" data-toggle="tab" href="#nav-allocate" role="tab" aria-controls="nav-allocate" aria-selected="true">Allocation</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <!--Allocation-->
                                  <div class="tab-pane fade show active" id="nav-allocate" role="tabpanel" aria-labelledby="nav-allocate-tab">
                                      <form id="allocate_faculty_audit" action="ic_queries/allocate_faculty_queries.php" method="POST">
                                          <input type="hidden" name="cid" value="' . $cid . '">
                                          <input type="hidden" name="sem" value="' . $sem . '">
                                          <input type="hidden" name="year" value="' . $year . '">
                                          <div class="form-group">
                                              <label for="cname"><b>Course Name : </b>
                                              </label>
                                              <span>'.$cname.'</span>
                                          </div>
                                          <div class="form-group">
                                              <label for="cid"><b>Course ID : </b>
                                              </label>
                                              <span>'.$cid.'</span>
                                          </div>
                                          <div class="form-group">
                                              <label for="sem"><b>Semester : </b>
                                              </label>
                                              <span>'.$sem.'</span>
                                          </div>
                                          <hr class="my-4" />
                                          <h6><b>Faculty Allocated</b></h6>
                                              <div class="faculty_div">' . $faculty_div . '</div>
                                              <hr class="my-4" />
                                              <h6><b>Allocate new Faculty</b></h6>

                                          <div class="form-group">
                                            <input type="hidden" name="email_id" id="hiddenemailid" value="null"/>
                                            <input type="hidden" name="temp_allocated_faculty" id="temp_allocated_faculty" value="'.$faculties_allocated_temp.'"/>
                                            <div class="" style="margin-bottom: 10px"><button type="button" class="showtext btn btn-secondary">Choose Faculty <i class="fa fa-caret-down"></i></button></div>
                                            <div id="show" style="display:none" class="fade">
                                                <input class="form-control" type="text" name="search_text" id="search_text" placeholder="Faculty Name"></input>
                                                <div id="result"></div>
                                            </div>
                                          
                                          </div>
                                          <br>
                                          
                                          <button type="submit" class="btn btn-primary" id="allocate_faculty_audit_btn" name="allocate_faculty_audit_upcoming">Allocate</button>
                                          <br>
                                      </form>
                                  </div>
                                  <!--end Allocation-->
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                          <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--end Allocate Modal-->

            <!--delete Faculty Modal-->
              <div style="background-color: rgba(40, 40, 40, .7)" class="modal fade" id="deleteFacultyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Are you sure?</h5>
                      <button class="close" type="submit" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <form id="newModalUnallocate">
                      <div class="modal-body">Select "Delete" below if you want to delete the selected faculty.
                          <input type="hidden" name="email_id" id="email_id" value=""/>
                          <input type="hidden" name="year" id="year" value=""/>
                          <input type="hidden" name="sem" id="sem" value=""/>
                          <input type="hidden" name="cid" id="cid" value=""/>
                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <button class="btn btn-primary" type="submit" id="faculty_unallocate_btn" name="faculty_unallocate_upcoming">Delete</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
            <!--end Delete Faculty Modal-->';
                                // echo 'Hi';
}
?>