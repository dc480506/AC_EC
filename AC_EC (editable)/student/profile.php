<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
// include('../includes/topbar_profile.php');
?>

<?php include('sidebar.php'); ?>

<?php include('../includes/topbar_student.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <h1 class="h3 mb-4 text-align-center">Additional Profile Details</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                    </div>
                    <hr class="my-4" />
                    <div class="modal-body">
                        <form class="forms-sample" method="POST" action="#">
                            <div class="form-group">
                                <label for="exampleInputDomain"><b>Domain Interested</b></label>
                                <input type="text" class="form-control" name="domain" placeholder="Enter future scope or the domain you are interested to be in future" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBio"><b>BIO</b></label>
                                <textarea rows="4" name="about" class="form-control form-control-alternative" placeholder="A few words about yourself ..." required></textarea>
                                <!-- <input type="text" class="form-control" name="about" required id="exampleInputBio" name="courseid" placeholder="Course ID"> -->
                            </div>
                            <br>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="map_cbox1" name="map_cbox1" onclick="showMapSection()">
                                <label class="form-check-label" for="exampleCheck1"><b>Add Extra Course Details</b></label>
                            </div>
                            <div id="map_section" style="display: none;">
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="button" id="add_course" class="btn btn-primary" style="display: none;">Add</button>
                                <input type="hidden" value="0" id="total_course" name="total_course">
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal" value="reset">reset</button>
                                <button type="submit" class="btn btn-primary" name="add_profile">Submit</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#add_course').on('click', add);
    var new_prev_no = 1

    function showMapSection() {
        var checkBox = document.getElementById("map_cbox1");

        if (checkBox.checked == true) {
            document.querySelector("#map_section").style.display = "block";
            document.querySelector("#add_course").style.display = "block";
        } else {
            document.querySelector("#map_section").style.display = "none";
            document.querySelector("#add_course").style.display = "none";
        }
    }

    function add() {
        var total = parseInt($('#total_course').val()) + 1
        var new_input = `<div id="crs_` + new_prev_no + `" >
                            <br>
                            <input type="hidden" class='current_no' value='` + total + `'>
                            <h5 class="modal-title"> Course Details ` + total + `</h5>
                            <div class="form-group" id="ptf1_` + new_prev_no + `" style="display: block;">
                                <label for="ptf1"><b>Platform Name</b></label>
                                <input type="text" class="form-control ptfid"  required id="platform_id` + new_prev_no + `" name="pftid` + total + `" placeholder="Platform name">
                            </div>
                            <div class="form-group" id="crs_det1_` + new_prev_no + `" style="display: block;">
                                <label for="crs_det1"><b> Course Name</b></label>
                                <input type="text" class="form-control crs_det"  required id="crs` + new_prev_no + `" name="crs_det` + total + `" placeholder=" course Name">
                            </div>                            
                            <button type="button" id="rem_course` + new_prev_no + `" class="btn btn-primary">Remove</button>
                        </div>`;

        $('#map_section').append(new_input);
        $("#rem_course" + new_prev_no).click(function() {
            var rm_id = ($(this).parent()).attr('id');
            console.log(rm_id)
            rm_id = "#" + rm_id
            adjustDivs($(this).parent().nextAll())
            $(rm_id).remove();
            $('#total_course').val($('#total_course').val() - 1);
        });
        new_prev_no += 1;
        $('#total_course').val(parseInt($('#total_course').val()) + 1);
        console.log("Add exiting!!");
    }

    function adjustDivs(nextDivs) {
        for (var i = 0; i < nextDivs.length; i++) {
            var new_index = parseInt(nextDivs[i].querySelector('.current_no').value) - 1
            var header = nextDivs[i].querySelector('h5')
            var ptfid = nextDivs[i].querySelector('.ptfid')
            var crs_det = nextDivs[i].querySelector('.crs_det')

            nextDivs[i].querySelector('.current_no').value = new_index
            header.innerText = "Course Details " + (new_index)
            ptfid.setAttribute('name', 'ptfid' + new_index)
            crs_det.setAttribute('name', 'crs_det' + new_index)
        }

    }

    function rem() {
        if (last_prev_no > 0) {
            $('#crs_' + last_prev_no).remove();
            $('#total_course').val(last_prev_no - 1);
        }
    }
</script>
<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>