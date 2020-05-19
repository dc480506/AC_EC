<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>
<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">View Responses</h4>
                </div>
            </div>
        </div>
        <div class="modal-body">
            <!--Allocation method-->
            <!--Result Analysis-->
            <br>
            <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Email Address</th>
                        <th>Roll Number</th>
                        <th>Year</th>
                        <!-- <th>Department</th> -->
                        <th>Semester</th>
                        <th>Time Stamp</th>
                        <th>Allocate Status</th>
                        <th>No of Valid Preferences</th>
                        <th>Preference List</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM student_preference_audit;";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['email_id']; ?></td>
                            <td><?php echo $row['rollno']; ?></td>
                            <td><?php echo $row['year']; ?></td>
                            <!-- <td></td> -->
                            <td><?php echo $row['sem']; ?></td>
                            <td><?php echo $row['timestamp']; ?></td>
                            <td><?php echo $row['allocate_status']; ?></td>
                            <td><?php echo $row['no_of_valid_preferences']; ?></td>
                            <td><?php
                                for ($i = 1; $i <= $row['no_of_valid_preferences']; $i++) {
                                    # code...
                                ?>
                                <?php echo "{$i}.{$row['pref' . $i]}";
                                } ?></td>
                            <td>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter2">
                                    <i class="fas fa-tools"></i>
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
                                                                    <label for="rno"><b>Roll Number</b></label>
                                                                    <input type="text" class="form-control" id="rno" name="rno" placeholder="Roll Number">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="emailid"><b>Email Address</b></label>
                                                                    <input type="email" class="form-control" id="emailid" name="emailid" placeholder="email@gmail.com">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="department"><b>Department</b></label>
                                                                    <input type="text" class="form-control" id="department" name="department" placeholder="Department">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="sem"><b>Semester</b></label>
                                                                    <input type="text" class="form-control" id="sem" name="sem" placeholder="Semester">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="year"><b>Year</b></label>
                                                                    <input type="text" class="form-control" id="year" name="year" placeholder="Year">
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary" name="update">Update</button>
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
                    <?php } ?>
                    </tbody>
            </table>
            <br>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary align-center" name="upload">upload</button>
            </div>

            <!--Update end-->


        </div>
    </div>
</div>

<script>
    function showMapSection() {
        var checkBox = document.getElementById("map_cbox");

        if (checkBox.checked == true) {
            document.querySelector("#map_section").style.display = "block";
            document.querySelector("#add_pref").style.display = "block";
            document.querySelector("#rem_pref").style.display = "block";
        } else {
            document.querySelector("#map_section").style.display = "none";
            document.querySelector("#add_pref").style.display = "none";
            document.querySelector("#rem_pref").style.display = "none";
        }
    }
</script>

<script type="text/javascript">
    // previous course details
    // var new_prev_no=1;
    $('#add_pref').on('click', add);
    // $('#rem_prev').on('click',rem);
    var new_pref_no = 1

    function add() {
        var total = parseInt($('#total_pref').val()) + 1
        // console.log("Value of total is "+total)
        var new_input = `<div id="pref_` + new_pref_no + `" >
                            <br>
                            <input type="hidden" class='current_no' value='` + total + `'>
                            <h5 class="modal-title">Preference Number ` + total + `</h5>
                            <div class="form-group" id="pref_field1_` + new_pref_no + `" style="display: block;">
                                <label for="pref_field1"><b>Preference Number</b></label>
                                <input type="text" class="form-control prefid"  required id="pref_id` + new_pref_no + `" name="prefid` + total + `" placeholder="Enter the column name of preference number` + new_pref_no + `">
                            </div>
                            <button type="button" id="rem_pref` + new_pref_no + `" class="btn btn-primary">Remove</button>
                        </div>`;
        // alert(new_input);
        // var new_input = "<input type='text' id='new_" + new_prev_no + "'>";
        // var new_input1=`<button type="button" id="rem_prev" class="btn btn-primary "style="display: none;">Remove the Previous Course</button>`;
        // console.log("Add called!!");
        // console.log('#rem_prev'+new_prev_no);

        $('#map_section').append(new_input);
        $("#rem_pref" + new_pref_no).click(function() {
            // console.log("Here bro!!");

            // $('#total_prev').val(new_prev_no - 1);
            // $('#map_section').remove(new_input); 
            // alert("id is "+$(this).parent().attr('id'))
            var rm_id = ($(this).parent()).attr('id');
            console.log(rm_id)
            rm_id = "#" + rm_id
            console.log("Here bro 3!!");
            adjustDivs($(this).parent().nextAll())
            $(rm_id).remove();
            $('#total_pref').val($('#total_pref').val() - 1);
        });
        new_pref_no += 1;
        $('#total_pref').val(parseInt($('#total_pref').val()) + 1);
        console.log("Add exiting!!");
    }

    function adjustDivs(nextDivs) {
        for (var i = 0; i < nextDivs.length; i++) {
            // console.log(nextDivs[i]);

            var new_index = parseInt(nextDivs[i].querySelector('.current_no').value) - 1
            var header = nextDivs[i].querySelector('h5')
            var prefid = nextDivs[i].querySelector('.prefid')

            nextDivs[i].querySelector('.current_no').value = new_index
            header.innerText = "Preference Number " + (new_index)
            prefid.setAttribute('name', 'prefid' + new_index)
            // console.log(header)
            // console.log(curr_value)
            // console.log("Bruh")
        }

    }

    function rem() {
        // var last_prev_no=$('#total_pref').val();
        if (last_pref_no > 0) {
            $('#pref_' + last_pref_no).remove();
            $('#total_pref').val(last_pref_no - 1);
        }
    }
</script>
<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>