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
    <div class="card-body">
        <form action="" method="post">
        <div class="pl-lg-4">
            <hr class="my-4" />
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="#">
                    <div class="form-group">
                        <label for="exampleInputDomain"><b>Domain</b></label>
                        <input type="text" class="form-control" name="domain" placeholder="Enter future scope or the domain you are interested to be in future" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBio"><b>BIO</b></label>
                        <textarea rows="4" name ="about" class="form-control form-control-alternative" placeholder="A few words about yourself ..." required></textarea>
                        <!-- <input type="text" class="form-control" name="about" required id="exampleInputBio" name="courseid" placeholder="Course ID"> -->
                    </div>
                    <br>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="map_cbox1" name="map_cbox1" onclick="showMapSection()">
                        <label class="form-check-label" for="exampleCheck1">Add Extra Course Details</label>
                    </div>
                    <div id="map_section" style="display: none;">
                        <!-- <h5 class="modal-title">Extra Course 1</h5>
                            <div class="form-group" id="previous_field1" style="display: block;">
                                <label for="platform1"><b>Platform</b></label>
                                <input type="text" class="form-control" id="platform1" name="platform1" placeholder="Platform where the course is done">
                            </div>
                            <div class="form-group" id="Course" style="display: block;">
                                <label for="previous_field2"><b> Course Details</b></label>
                                <input type="text" class="form-control" id="previous_sem1" name="prevsem1" placeholder="Previous Semester">
                            </div>
                            <div class="form-group" id="previous_field3" style="display: block;">
                                <label for="previous_field3"><b>Previous Year</b></label>
                                <input type="text" class="form-control" id="previous_year1" name="prevyear1" placeholder="Previous Year">
                            </div> -->
                    </div>
                    <BR>
                    <div class="form-group">
                        <button type="button" id="add_course" class="btn btn-primary" style="display: none;">Add</button>
                        <!-- <button type="button" id="rem_prev" class="btn btn-primary" style="display: none;">Remove the Previous Course</button> -->
                        <input type="hidden" value="0" id="total_course" name="total_course">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal" value="reset">reset</button>
                        <button type="submit" class="btn btn-primary" name="add_profile">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        </form>
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
        // alert(new_input);
        // var new_input = "<input type='text' id='new_" + new_prev_no + "'>";
        // var new_input1=`<button type="button" id="rem_prev" class="btn btn-primary "style="display: none;">Remove the Previous Course</button>`;
        // console.log("Add called!!");
        // console.log('#rem_prev'+new_prev_no);

        $('#map_section').append(new_input);
        $("#rem_course" + new_prev_no).click(function() {
            // console.log("Here bro!!");

            // $('#total_prev').val(new_prev_no - 1);
            // $('#map_section').remove(new_input); 
            // alert("id is "+$(this).parent().attr('id'))
            var rm_id = ($(this).parent()).attr('id');
            console.log(rm_id)
            rm_id = "#" + rm_id
            // console.log("Here bro 3!!");
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
            // console.log(nextDivs[i]);

            var new_index = parseInt(nextDivs[i].querySelector('.current_no').value) - 1
            var header = nextDivs[i].querySelector('h5')
            var ptfid = nextDivs[i].querySelector('.ptfid')
            var crs_det = nextDivs[i].querySelector('.crs_det')

            nextDivs[i].querySelector('.current_no').value = new_index
            header.innerText = "Course Details " + (new_index)
            ptfid.setAttribute('name', 'ptfid' + new_index)
            crs_det.setAttribute('name', 'crs_det' + new_index)
            // console.log(header)
            // console.log(curr_value)
            // console.log("Bruh")
        }

    }

    function rem() {
        // var last_prev_no=$('#total_prev').val();
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