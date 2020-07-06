<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>
<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
               
                <div class="col" id="addCurrentCoursebtn" style="display:block">
                                    <h4 class="font-weight-bold text-primary mb-0">Add new course <i class="fas fa-book-open"></i></h4>
                                    <br>
                                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#addCurrentCourse">
                                        <i class="ni ni-fat-add">&nbsp;</i>+ &nbsp;Add Course
                                    </button>
                                    
                </div>
                
                <div class="modal fade" id="addCurrentCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Course</h5>
                                                <button type="button" class="close" id="close_add_form_cross" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                            </div>
                            <div class="modal-body">
                                                <!-- Table -->

                                                <!-- <form class="forms-sample" method="POST" action="ic_queries/addcourse_queries.php"> -->
                                                <form class="forms-sample" id='add_new_course_form'>

                                                    <div class="form-group">
                                                        <label for="courseType"><b>Course Type</b></label>
                                                        <input type="text" class="form-control" required id="courseType" name="cname" placeholder="Course Name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="program"><b>Program</b></label>
                                                        <input type="text" class="form-control" required id="program" name="program" placeholder="UG/PG/PHD">
                                                        <!-- <span id="add_upcoming_cid_error" class="text-danger"></span> -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" id="close_add_new_course_form" data-dismiss="modal" name="close">Close</button>
                                                        <button type="submit" id="add_new_course_btn" class="btn btn-primary" name="add_new_course">Add</button>
                                                    </div> 
                                                </form>  
                            </div>
                        </div>
                    </div>
                </div>

                </div>
                </div>
    
                <div class="card shadow mb-4">
                <div class="card-body">
                <h4 class="font-weight-bold text-primary mb-0">Existing course types</h4>
                <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive" id="dataTable-coursetypes" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>
                                        <!-- <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="select_all">
                                            <label class="custom-control-label" for="select_all"></label>
                                        </div> -->
                                    </th>
                                    <th>Course Type</th>
                                    <th>Program</th>
                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Course Type</th>
                                    <th>Program</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- </div> -->
                    </div>

                </div>
<br>
<br>
<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>