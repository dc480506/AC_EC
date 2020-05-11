<?php
include('../config.php');
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
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">Result</h4>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fas fa-calculator"></i>
                    </button>
                </div>
            </div>
            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle2">Filter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!--filter form start-->

                            <form class="forms-sample" method="POST" action="">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="disp1()">
                                    <label class="form-check-label" for="exampleFormControlSelect1">Course Name</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect1" name="cname">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2" onclick="disp2()">
                                    <label class="form-check-label" for="exampleFormControlSelect2">Course ID</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect2" name="cname">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck3" onclick="disp3()">
                                    <label class="form-check-label" for="exampleFormControlSelect3">Semester</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect3" name="cname">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck4" onclick="disp4()">
                                    <label class="form-check-label" for="exampleFormControlSelect4">Year</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect4" name="cname">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck5" onclick="disp5()">
                                    <label class="form-check-label" for="exampleFormControlSelect5">Department</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect5" name="cname">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" name="filter">Filter</button>
                                </div>
                            </form>
                            <!-- fiter form end-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Calculator</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!--filter form start-->

                            <form class="forms-sample" method="POST" action="">
                                <div class="form-group">
                                    <label for="exampleInputName1"><b>Course Name</b></label>
                                    <input type="text" class="form-control" required id="exampleInputName1" name="cname" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCourseid"><b>Course ID</b></label>
                                    <input type="text" class="form-control" required id="exampleInputCourseid" name="courseid" placeholder="Course ID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSemester"><b>Semester</b></label>
                                    <input type="text" class="form-control" required id="exampleInputSemester" name="sem" placeholder="Semester">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputYear"><b>Year</b></label>
                                    <input type="text" class="form-control" required id="exampleInputYear" name="year" placeholder="Year">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDepartment"><b>Department</b></label>
                                    <select class="form-control" required name="dept">
                                        <?php
                                        include_once("../config.php");
                                        $sql = "SELECT dept_name FROM department";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option>" . $row['dept_name'] . "</option>";
                                        }
                                        ?>
                                    </select> </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" name="calculate">Calculate</button>
                                </div>
                            </form>
                            <!-- fiter form end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Year Admitted</th>
                            <th>Email Address</th>
                            <th>Current Semester</th>
                            <th>Department</th>
                            <th>CA</th>
                            <th>ESE</th>
                            <th>GPA</th>
                            <th>Action</>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Year Admitted</th>
                            <th>Email Address</th>
                            <th>Current Semester</th>
                            <th>Department</th>
                            <th>CA</th>
                            <th>ESE</th>
                            <th>GPA</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>2017</td>
                            <td>tiger.nsomaiya.edu</td>
                            <td>6</td>
                            <td>Computer</td>
                            <td>40</td>
                            <td>60</td>
                            <td>10</td>
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter1">
                                    <i class="fas fa-tools"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
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
                                                    <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                                                        <form action="">
                                                            <div class="form-row mt-4">
                                                                <div class="form-group col-md-6">
                                                                    <label for="fname"><b>First Name</b></label>
                                                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="first name">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="lname"><b>Last Name</b></label>
                                                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="last name">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="department"><b>Department</b></label>
                                                                    <input type="text" class="form-control" id="department" name="department" placeholder="department">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="emailid"><b>Email Address</b></label>
                                                                    <input type="email" class="form-control" id="emailid" name="emailid" placeholder="email@gmail.com">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="csem"><b>Current Semester</b></label>
                                                                    <input type="number" class="form-control" id="csem" name="csem" placeholder="1">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="year"><b>Year Admitted</b></label>
                                                                    <input type="email" class="form-control" id="year" name="year" placeholder="2020">
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="ca"><b>CA</b></label>
                                                                    <input type="number" class="form-control" id="ca" name="ca" placeholder="40">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="ese"><b>ESE</b></label>
                                                                    <input type="number" class="form-control" id="ese" name="ese" placeholder="60">
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="cgpa"><b>CGPA</b></label>
                                                                    <input type="name" class="form-control" id="cgpa" name="cgpa" placeholder="10">
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                                                        </form>
                                                    </div>
                                                    <!--Update end-->
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
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script>
    function showMapSection() {
        var checkBox = document.getElementById("map_cbox");

        if (checkBox.checked == true) {
            document.querySelector("#map_section").style.display = "block";
        } else {
            document.querySelector("#map_section").style.display = "none";
        }
    }
</script>
<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>