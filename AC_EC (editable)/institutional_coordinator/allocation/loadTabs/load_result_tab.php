<?php 

include_once('../../verify.php');
include_once('../../../config.php');
$args='["'.$_SESSION['sem'].'","'.$_SESSION['year'].'","'.$_SESSION['student_pref'].'","'.$_SESSION['student_course_table'].'","'.$_SESSION['course_allocate_info'].'","'.$_SESSION['course_table'].'","'.$_SESSION['no_of_preferences'].'","'.$servername.'","'.$username.'","'.$password.'","'.$dbname.'"]';
$cmd='python ../algorithms/'.$_SESSION['algorithm_chosen'].'.py '.$args;
// echo $cmd;
$output=shell_exec($cmd." 2>&1");
// echo $output;
?>
<div class="tab-pane fade show active" id="nav-final-allocate" role="tabpanel" aria-labelledby="nav-final-allocate-tab">
    <br>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
    </div>
    <br>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Student Unallocated</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>Roll Number</th>
                        <th>Preference List</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ganesh Gaitonde</td>
                        <td>ganesh.g@somaiya.edu</td>
                        <td>1719082</td>
                        <td>1.Python<br> 2.OOPM <br>3.Data Structure</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter3">
                                <i class="fas fa-tools"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle3" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle3">Action</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-delete1-tab" data-toggle="tab" href="#nav-delete1" role="tab" aria-controls="nav-delete1" aria-selected="true">Deletion</a>
                                                    <a class="nav-item nav-link" id="nav-update1-tab" data-toggle="tab" href="#nav-update1" role="tab" aria-controls="nav-update1" aria-selected="false">Allocate</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <!--Deletion-->
                                                <div class="tab-pane fade show active" id="nav-delete1" role="tabpanel" aria-labelledby="nav-delete1-tab">
                                                    <form action="">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1"><b>Are you sure you want to delete?</b>
                                                            </label>
                                                            <br>
                                                            <button type="submit" class="btn btn-primary" name="yes">Yes</button>
                                                            <button type="submit" class="btn btn-secondary" name="no">No</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--end Deletion-->
                                                <!--Update-->
                                                <div class="tab-pane fade show " id="nav-update1" role="tabpanel" aria-labelledby="nav-update1-tab">
                                                    <form action="">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1"><b>Department</b>
                                                            </label>
                                                            <select class="form-control" id="exampleFormControlSelect1" name="department">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1"><b>Course</b>
                                                            </label>
                                                            <select class="form-control" id="exampleFormControlSelect1" name="course">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1"><b>Course ID</b>
                                                            </label>
                                                            <select class="form-control" id="exampleFormControlSelect1" name="course">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Allocate</button>
                                                    </form>
                                                </div>



                                                <!--Update end-->

                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                            <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
        </div>
    </div>

    <br>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Student Allocated</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>Roll Number</th>
                        <th>Preference List</th>
                        <th>Course</th>
                        <th>Preference Number</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>tiger.n@somaiya.edu</td>
                        <td>1719092</td>
                        <td>1.Python<br> 2.OOPM <br>3.Data Structure</td>
                        <td>Python(UCH132)</td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br>
    <div class="modal-footer">
        
        <button type="submit" class="btn btn-secondary align-center" name="previous">Previous</button>
        <button type="submit" class="btn btn-primary align-center" name="Complete">Complete</button>
    </div>
</div>
                <!--Update end-->
