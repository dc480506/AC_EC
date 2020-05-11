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
                <div class="col">
                    <h4 class="m-0 font-weight-bold text-primary">Faculty Records</h4>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="ni ni-fat-add">&nbsp;</i>+ &nbsp;Add Faculty
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add New Faculty</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Table -->
                            <form class="forms-sample" method="POST" action="fc_queries/addfaculty_queries.php">
                                <div class="form-group">
                                    <label for="exampleInputName1"><b>Name</b></label>
                                    <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail"><b>Email address</b></label>
                                    <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDepartment"><b>Department</b></label>
                                    <input type="text" class="form-control" id="exampleInputDepartment" name="department" placeholder="Department" disabled value="<?php echo $_SESSION['dept_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputAccomplishment"><b>Accomplishment</b></label>
                                    <input type="text" class="form-control" id="exampleInputAccomplishment" name="accomplishment" placeholder="Accomplishment">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPost"><b>Post</b></label>
                                    <input type="text" class="form-control" id="exampleInputPost" name="post" placeholder="Post">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" name="add_faculty">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle1">Filter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Table -->


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
                            <!-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck5" onclick="disp5()">
                                <label class="form-check-label" for="exampleFormControlSelect5">Department</label>
                                <select class="form-control" style="display: none" id="exampleFormControlSelect5" name="cname">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div> -->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                <button type="submit" class="btn btn-outline-primary" name="filter">Filter</button>
                            </div>
                        </form>
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
                            <th>Email</th>
                            <th>Department</th>
                            <th>Accomplishment</th>
                            <th>Post</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Accomplishment</th>
                            <th>Post</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
<?php
if(isset($_SESSION['email']))
    {
    $fetch_faculty="SELECT c.email_id,f.fname,f.lname,f.mname,d.dept_name,c.course_certified,f.post FROM ((`faculty_certification` as c inner JOIN `faculty` as f on c.email_id=f.email_id AND f.dept_id={$_SESSION['dept_id']}) INNER JOIN `department` as d on f.dept_id = d.dept_id)";
    $result = mysqli_query($conn, $fetch_faculty);
    // $sql1 = "SELECT dept_name FROM department";
    // $result1 = mysqli_query($conn, $sql1);
    $count = 500;
    while($row = mysqli_fetch_array($result))
                            {  
?>
                        <tr>
                            <td><?php echo "{$row['fname']} {$row['mname']} {$row['lname']}"; ?></td>
                            <td><?php echo $row['email_id']; ?></td>
                            <td><?php echo $_SESSION['dept_name'];?></td>
                            <td><?php echo $row['course_certified']; ?></td>
                            <td><?php echo $row['post']; ?></td>
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter2<?php echo $count; ?>">
                                    <i class="fas fa-tools"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter2<?php echo $count ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
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
                                                        <a class="nav-item nav-link active" id="nav-delete-tab" data-toggle="tab" href="#nav-delete<?php echo $count; ?>" role="tab" aria-controls="nav-delete<?php echo $count;?>" aria-selected="true">Deletion</a>
                                                        <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update<?php echo $count; ?>" role="tab" aria-controls="nav-update<?php echo $count;?>" aria-selected="false">Update</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <!--Deletion-->
                                                    <div class="tab-pane fade show active" id="nav-delete<?php echo $count; ?>" role="tabpanel" aria-labelledby="nav-delete-tab">
                                                        <form action="fc_queries/addfaculty_queries.php" method="POST">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1"><b>Are you sure you want to delete?</b>
                                                                </label>
                                                                <br>
                                                                <input type="hidden" name="email" value="<?php echo $row['email_id'];?>">
                                                                <input type="hidden" name="post" value="<?php echo $row['post'];?>">
                                                                <button type="submit" class="btn btn-primary" name="delete_faculty">Yes</button>
                                                                <button type="submit" class="btn btn-secondary" name="no">No</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!--end Deletion-->
                                                    <!--Update-->
                                                    <div class="tab-pane fade" id="nav-update<?php echo $count; ?>" role="tabpanel" aria-labelledby="nav-update-tab">
                                                        <form action="fc_queries/addfaculty_queries.php" method="POST">
                                                            <div class="form-row mt-4">
                                                                <div class="form-group col-md-6">
                                                                    <label for="name"><b>Name</b></label>
                                                                    <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo "{$row['fname']} {$row['mname']} {$row['lname']}";?>">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="emailid"><b>Email Address</b></label>
                                                                    <input type="email" class="form-control" id="emailid" name="email" placeholder="email@gmail.com" value="<?php echo $row['email_id']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="department"><b>Department</b></label>
                                                                    <input type="text" class="form-control" id="department" name="department" placeholder="department" disabled value="<?php echo $_SESSION['dept_name'];?>">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="accomplishment"><b>Accomplishment</b></label>
                                                                    <input type="text" class="form-control" id="accomplishment" name="accomplishment" placeholder="accomplishment" value="<?php echo $row['course_certified'];?>">
                                                                </div>

                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="post"><b>Post</b></label>
                                                                    <input type="text" class="form-control" id="post" name="post" placeholder="post" value="<?php echo $row['post'];?>">
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary" name="update_faculty">Update</button>
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
                        <?php
                        $count++; 
                    }
                }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>