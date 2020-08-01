<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
include("../")
?>

<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-info mb-4">My Profile</h4>
                    <?php
                    $email = $_SESSION['email'];
                    $fname = 'fname';
                    $mname = 'mname';
                    $lname = 'lname';
                    $post = 'prof';
                    $emp_id = '1';
                    $department = 'department';
                    $mobile = '9876543201';
                    $image = "../vendor/img/person1.jpg";
                    $query = "SELECT fname,mname,lname,employee_id,post ,dept_id FROM faculty WHERE email_id = '$email'";
                    if ($result = mysqli_query($conn, $query)) {
                        $rowcount = mysqli_num_rows($result);
                        if ($rowcount == 1) {
                            $row = mysqli_fetch_assoc($result);
                            $fname = $row['fname'];
                            $mname = $row['mname'];
                            $emp_id = $row['employee_id'];
                            $post = $row['post'];
                            $lname = $row['lname'];
                            $dept_id = $row['dept_id'];
                            $query = "SELECT dept_name FROM department WHERE dept_id = '$dept_id'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            $department = $row['dept_name'];
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../vendor/img/person1.jpg" class="rounded-circle mx-auto d-block mb-4" alt="..." width="100em" height="100em">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-dark"> <span><b>Name : </b></span><?php echo $fname . ' ' . $mname . ' ' . $lname; ?></p>
                                    <p class="text-dark"> <span><b>ID : </b></span><?php echo $emp_id; ?> </p>
                                    <p class="text-dark"> <span><b>POST : </b></span><?php echo $post; ?> </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-dark"> <span><b>Department : </b></span><?php echo $department; ?> </p>
                                    <p class="text-dark"> <span><b>Mobile No. : </b></span><?php echo $mobile; ?></p>
                                    <p class="text-dark"> <span><b>Email : </b></span><?php echo $email; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h3 class="mb-0"><strong>My Current Course</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card start(loop) -->
        <div class="col-md-12 grid-margin stretch-card mt-2 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Course Type </th>
                                    <th>Semester</th>
                                    <th>Year</th>
                                    <th>Student Data</th>
                                    <th>Erasure </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Course Type </th>
                                    <th>Semester</th>
                                    <th>Year</th>
                                    <th>Student Data</th>
                                    <th>Erasure </th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php

                                $sql = "SELECT fca.cid,fca.course_type_id,fca.sem,fca.year,ctype.name,course.cname from faculty_course_alloted as fca, course, course_types as ctype where fca.cid=course.cid and fca.course_type_id=ctype.id and fca.email_id='$email'";
                                $result = mysqli_query($conn, $sql);
                                $count = 0;

                                while ($row = mysqli_fetch_array($result)) {  ?>
                                    <tr>
                                        <td><?php echo $row['cname']; ?></td>

                                        <td><?php echo $row['cid']; ?></td>

                                        <td><?php echo $row['name']; ?></td>

                                        <td><?php echo $row['sem']; ?></td>

                                        <td><?php echo $row['year']; ?></td>
                                    </tr>



                                    <!-- select fca.cid,fca.course_type_id,fca.sem,fca.year,ctype.name,course.cname from faculty_course_alloted as fca, course, course_types as ctype where fca.cid=course.cid and fca.course_type_id=ctype.id and fca.email_id="faculty@somaiya.edu" -->
                                    <td>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter1">
                                            <i class="fas fa-upload"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle1">Upload Your File </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <form method="post" action="#" id="#">
                                                                <div class="form-group files color">
                                                                    <input type="file" class="form-control" multiple="">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <style type="text/css">
                                                        .files input {
                                                            outline: 2px dashed #92b0b3;
                                                            outline-offset: -10px;
                                                            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                                                            transition: outline-offset .15s ease-in-out, background-color .15s linear;
                                                            padding: 120px 0px 85px 35%;
                                                            text-align: center !important;
                                                            margin: 0;
                                                            width: 100% !important;
                                                        }

                                                        .files input:focus {
                                                            outline: 2px dashed #92b0b3;
                                                            outline-offset: -10px;
                                                            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                                                            transition: outline-offset .15s ease-in-out, background-color .15s linear;
                                                            border: 1px solid #92b0b3;
                                                        }

                                                        .files {
                                                            position: relative
                                                        }

                                                        .files:after {
                                                            pointer-events: none;
                                                            position: absolute;
                                                            top: 60px;
                                                            left: 0;
                                                            width: 50px;
                                                            right: 0;
                                                            height: 56px;
                                                            content: "";
                                                            background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
                                                            display: block;
                                                            margin: 0 auto;
                                                            background-size: 100%;
                                                            background-repeat: no-repeat;
                                                        }

                                                        .color input {
                                                            background-color: #f1f1f1;
                                                        }

                                                        .files:before {
                                                            position: absolute;
                                                            bottom: 10px;
                                                            left: 0;
                                                            pointer-events: none;
                                                            width: 100%;
                                                            right: 0;
                                                            height: 57px;
                                                            display: block;
                                                            margin: 0 auto;
                                                            color: #2ea591;
                                                            font-weight: 600;
                                                            text-transform: capitalize;
                                                            text-align: center;
                                                        }
                                                    </style>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                        <button type="button" class="btn btn-primary" name="save_changes">Upload</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter2">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle2">Action</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <nav>
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                <a class="nav-item nav-link active" id="nav-delete-tab" data-toggle="tab" href="#nav-delete" role="tab" aria-controls="nav-delete" aria-selected="true">Deletion</a>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content" id="nav-tabContent">
                                                            <!--Deletion-->
                                                            <div class="tab-pane fade show active" id="nav-delete" role="tabpanel" aria-labelledby="nav-delete-tab">
                                                                <form action="">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect1"><b>Are you sure you want to erase the uploaded data?</b>
                                                                        </label>
                                                                        <br>
                                                                        <button type="submit" class="btn btn-primary" name="yes">Yes</button>
                                                                        <button type="submit" class="btn btn-secondary" name="no">No</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--end Deletion-->
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                            <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- card end(loop) -->
    </div>
</div>
<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>