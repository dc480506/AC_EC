<?php
include('../config.php');
include('../includes/header.php');
?>
<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">Audit Course Records</h4>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="ni ni-fat-add">&nbsp;</i>+ &nbsp;Add Course
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
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="disp1()" name="cname_cbox">
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
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2" onclick="disp2()" name="cid_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect2">Course ID</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect2" name="cid">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck3" onclick="disp3()" name="sem_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect3">Semester</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect3" name="sem">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck4" onclick="disp4()" name="year_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect4">Year</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect4" name="year">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck5" onclick="disp5()" name="dept_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect5">Department</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect5" name="dept">
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
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Year Admitted</th>
                                    <th>Email Address</th>
                                    <th>Semester</th>
                                    <th>Department</th>
                                    <th>Current Year</th>
                                    <th>CGPA</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Year Admitted</th>
                                    <th>Email Address</th>
                                    <th>Semester</th>
                                    <th>Department</th>
                                    <th>Current Year</th>
                                    <th>CGPA</th>
                                </tr>
                            </tfoot>
                            <tbody>


                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>2017</td>
                                    <td>tiger.n@somaiya.edu</td>
                                    <td>6</td>
                                    <td>Computer</td>
                                    <td>2020</td>
                                    <td>9.02</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">Student Records(KT)</h4>
                    <div class="col text-right">
                        <button type="button" class="btn btn-primary" name="filter" data-toggle="modal" data-target="#exampleModalCenter2">
                            <i class="fas fa-filter"></i>
                        </button>
                    </div>
                    <br>
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
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="disp1()" name="cname_cbox">
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
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2" onclick="disp2()" name="cid_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect2">Course ID</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect2" name="cid">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck3" onclick="disp3()" name="sem_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect3">Semester</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect3" name="sem">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck4" onclick="disp4()" name="year_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect4">Year</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect4" name="year">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck5" onclick="disp5()" name="dept_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect5">Department</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect5" name="dept">
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
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Year Admitted</th>
                                    <th>Email Address</th>
                                    <th>Semester</th>
                                    <th>Department</th>
                                    <th>Current Year</th>
                                    <th>KT Semester</th>
                                    <th>KT Subjects</th>    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Year Admitted</th>
                                    <th>Email Address</th>
                                    <th>Semester</th>
                                    <th>Department</th>
                                    <th>Current Year</th>
                                    <th>KT Semester</th>
                                    <th>KT Subjects</th>
                                </tr>
                            </tfoot>
                            <tbody>


                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>2017</td>
                                    <td>tiger.n@somaiya.edu</td>
                                    <td>6</td>
                                    <td>Computer</td>
                                    <td>2020</td>
                                    <td>5</td>
                                    <td>DS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- /.container-fluid -->

    <?php include('../includes/footer.php');
    include('../includes/scripts.php');
    ?>