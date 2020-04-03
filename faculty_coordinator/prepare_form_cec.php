<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>
<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="offset-lg-3 offset-md-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <h1 class="h3 mb-4 text-gray-800">Prepare Form Fill</h1>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="fc_queries/prepare_form_cec_queries.php">
                        <div class="form-group">
                            <label for="exampleInputPreference"><b>No of Preferences</b></label>
                            <input type="number" class="form-control" id="exampleInputPreference" name="no_of_preferences">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSem"><b>Floating Semester</b></label>
                            <input type="number" required class="form-control" id="exampleInputSem" onkeyup="defaultOpenSemVal()" name="sem">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSem"><b>Opening Semester</b></label>
                            <input type="number" class="form-control" id="exampleInputSem" name="curr_sem">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputYear"><b>Year</b></label>
                            <input type="year" class="form-control" id="exampleInputYear" name="year">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputElectiveNo"><b>Elective Number</b></label>
                            <input type="number" class="form-control" id="exampleInputElectiveNo" name="electivenumber">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-check-label" for="exampleInputStartDate"><b>Start Date</b></label>
                                    <input type="date" class="form-control" id="exampleInputStartDate" name="start_date">
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label" for="exampleInputStartDate"><b>Start Time</b></label>
                                    <input type="time" class="form-control" id="exampleInputStartDate" name="start_time">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-check-label" for="exampleInputStartDate"><b>End Date</b></label>
                                    <input type="date" class="form-control" id="exampleInputStartDate" name="end_date">
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label" for="exampleInputStartDate"><b>End Time</b></label>
                                    <input type="time" class="form-control" id="exampleInputStartDate" name="end_time">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary align-center" name="submit">Submit</button>
                            <!-- <button type="modify" class="btn btn-primary align-center" name="modify">Modify</button> -->
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Floating Semester</th>
                            <th>Year</th>
                            <th>Opening Semester</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>End Date</th>
                            <th>End Time</th>
                            <th>No of Preferences</th>
                            <th>Elective Number</th>
                            <th>Form Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Floating Semester</th>
                            <th>Year</th>
                            <th>Opening Semester</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>End Date</th>
                            <th>End Time</th>
                            <th>No of Preferences</th>
                            <th>Elective Number</th>
                            <th>Form Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
<?php
$fetch_form="SELECT sem,year,curr_sem,no_of_preferences,no,start_timestamp,end_timestamp FRoM closed_elective_dept_form WHERE form_type='closed ele';";
$result_fetch=mysqli_query($conn,$fetch_form);
if(mysqli_num_rows($result_fetch)>0)
{   
    $count=1;
    while($row=mysqli_fetch_assoc($result_fetch))
    {
    $status = "Not opened yet";
    date_default_timezone_set('Asia/Kolkata');
    $timestamp=date("Y-m-d H:i");
    $start_timestamp = $row['start_timestamp'];
    $end_timestamp = $row['end_timestamp'];
    if($timestamp>=$start_timestamp)
    {
        if($timestamp<$end_timestamp)
        {
            $status="Open";
        }else
        {
            $status="Closed";
        }
        $sArr = explode(" ", $start_timestamp);
        $start_date = $sArr[0];
        $start_time = $sArr[1];
        $eArr = explode(" ", $end_timestamp);
        $end_date = $eArr[0];
        $end_time = $eArr[1];
    } 

                         ?>
                        <tr>
                            <td><?php echo $row['sem'];?></td>
                            <td><?php echo $row['year'];?></td>
                            <td><?php echo $row['curr_sem'];?></td>
                            <td><?php echo $start_date;?>;</td>
                            <td><?php echo $start_time; ?></td>
                            <td><?php echo $end_date;?></td>
                            <td><?php echo $end_time;?></td>
                            <td><?php echo $row['no_of_preferences'];?></td>
                            <td><?php echo $row['no']; ?></td>
                            <td><?php echo $status?></td>
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter<?php echo $count;?>">
                                    <i class="fas fa-tools"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter<?php echo $count;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
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
                                                        <a class="nav-item nav-link active" id="nav-delete-tab" data-toggle="tab" href="#nav-delete<?php echo $count;?>" role="tab" aria-controls="nav-delete<?php echo $count;?>" aria-selected="true">Deletion</a>
                                                        <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update<?php echo $count?>" role="tab" aria-controls="nav-update<?php echo $count;?>" aria-selected="false">Update</a>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <!--Deletion-->
                                                    <div class="tab-pane fade show active" id="nav-delete<?php echo $count;?>" role="tabpanel" aria-labelledby="nav-delete-tab">
                                                        <form action="fc_queries/prepare_form_cec_queries.php" method="POST">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1"><b>Are you sure you want to delete?</b>
                                                                </label>
                                                                <br>
                                                                <input type="hidden" name="sem" value="<?php echo $row['sem'];?>">
                                                                <input type="hidden" name="year" value="<?php echo $row['year'];?>">
                                                                <input type="hidden" name="electivenumber" value="<?php echo $row['no']; ?>">
                                                                <button type="submit" class="btn btn-primary" name="deleteForm">Yes</button>
                                                                <button type="button" class="btn btn-secondary" name="no">No</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!--end Deletion-->
                                                    <!--Update-->
                                                    <div class="tab-pane fade" id="nav-update<?php echo $count;?>" role="tabpanel" aria-labelledby="nav-update-tab">
                                                        <form action="fc_queries/prepare_form_cec_queries.php" method="POST">
                                                            <div class="form-group">
                                                                <label for="exampleInputPreference"><b>No of Preferences</b></label>
                                                                <input type="number" required class="form-control" name="no_of_preferences" value="<?php echo $row['no_of_preferences']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputSem"><b>Floating Semester</b></label>
                                                                <input type="number" required class="form-control" name="sem" value="<?php echo $row['sem']; ?>">
                                                                <input type="hidden" required class="form-control" name="oldsem" value="<?php echo $row['sem']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputYear"><b>Year</b></label>
                                                                <input type="year" required class="form-control" name="year" value="<?php echo $row['year']; ?>">
                                                                <input type="hidden" required class="form-control" name="oldyear" value="<?php echo $row['year']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputCurrSem"><b>Opening Semester</b></label>
                                                                <input type="number" required class="form-control" name="curr_sem" value="<?php echo $row['curr_sem'];?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputElectiveNo"><b>Elective Number</b></label>
                                                                <input type="number" class="form-control" id="exampleInputElectiveNo" name="electivenumber" value="<?php echo $row['no']; ?>">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="exampleInputStartDate"><b>Start Date</b></label>
                                                                        <input type="date" required class="form-control" name="start_date" value="<?php echo $start_date; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="exampleInputStartDate"><b>Start Time</b></label>
                                                                        <input type="time" required class="form-control" name="start_time" value="<?php echo $start_time; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="exampleInputStartDate"><b>End Date</b></label>
                                                                        <input type="date" required class="form-control" name="end_date" value="<?php echo $end_date; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-check-label" for="exampleInputStartDate"><b>End Time</b></label>
                                                                        <input type="time" required class="form-control" name="end_time" value="<?php echo $end_time; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary align-center" name="modifyForm">Modify</button>
                                                        </form>
                                                        <br>
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
                        <?php $count++;
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->

    <?php include('../includes/footer.php');
    include('../includes/scripts.php');
    ?>