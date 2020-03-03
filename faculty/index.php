<?php include('../includes/header.php'); 
include('../config.php');
session_start();
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
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../vendor/img/person1.jpg" class="rounded-circle mx-auto d-block mb-4" alt="..." width="100em" height="100em">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-dark"> <span><b>Name : </b></span>Name Surname</p>
                                    <p class="text-dark"> <span><b>Email : </b></span>email@gmail.com</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-dark"> <span><b>Department : </b></span>Computer </p>
                                    <p class="text-dark"> <span><b>Mobile No. : </b></span>1234567890</p>
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
                    <form class="forms-sample mt-4" action="">
                        <p class="card-description">
                            <h5><strong> Audit Course </strong></h5>
                        </p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputCourseName"><b>Course Name</b></label>
                                    <br>
                                    <span>Name</span>
                                </div>
                            </div>

                            <div class=" col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputSemester"><b>Semester</b></label>
                                    <br>
                                    <span>2</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputStatus"><b>Course Status</b></label>
                                    <br>
                                    <span>2</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputStrength"><b>Course Strength</b></label>
                                    <br>
                                    <span>60</span>
                                </div>
                            </div>
                        </div>
                    </form>
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