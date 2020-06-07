<?php
    // echo 'Hi';
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=='inst_coor'){
    // echo 'Hi';
    include_once('../../../config.php');
    $data = json_decode(file_get_contents("php://input"),true); 
    $email_id=mysqli_escape_string($conn,$data['email_id']);
    $name=mysqli_escape_string($conn,$data['name']);
    $dept_name=mysqli_escape_string($conn,$data['dept_name']);
    $result = mysqli_query($conn,"select rollno,fname,mname,lname,dept_id,year_of_admission,current_sem from student WHERE email_id='$email_id'");
    $row=mysqli_fetch_assoc($result);
    $rollno=$row['rollno'];
    $fname=$row['fname'];
    $mname=$row['mname'];
    $lname=$row['lname'];
    $dept_id=$row['dept_id'];
    $year_of_admission=$row['year_of_admission'];
    $current_sem=$row['current_sem'];
    
    $result = mysqli_query($conn,"select academic_year from current_sem_info WHERE currently_active=1");
    $row=mysqli_fetch_assoc($result);
    $year=$row['academic_year'];
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
                                            <br>Are you sure you want to delete the student with <br> name <i><small><b>'.$name.'</b></small></i>
                                            ,Email ID <i><small><b>'.$email_id.'</small></b></i> ,rollno <i><small><b>'.$rollno.'</b></small></i>
                                            And department <i><small><b>'.$dept_name.'</b></small></i>?
                                        </label>
                                        <br>
                                        <input type="hidden" name="email_id" value="' . $email_id . '">
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
                                            <label for="rollno"><b>Roll No</b></label>
                                            <input type="text" class="form-control" required="required" placeholder="New Roll no" name="rollno_new" value="' . $rollno . '">
                                            <input type="hidden" class="form-control"  name="rollno_old" value="' . $rollno. '">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="year_of_admission"><b>Year_of_Admission</b></label>
                                            <input type="text" class="form-control" required="required" name="year_of_admission_new" value="' . $year_of_admission . '">
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
                                            <label for="current_sem"><b>current_sem</b></label>
                                            <input type="text" class="form-control" required="required" name="current_sem_new" placeholder="1" value="' . $current_sem . '">
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
            // $name=$fname.' '.$mname.' '.$lname;

                                // echo 'Hi';
}
?>