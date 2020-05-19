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
                    <h4 class="font-weight-bold text-primary mb-0">Upload Responses</h4>
                </div>
                <div class="col text-right">
                    <a href="upload.php" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="text">Cancel Upload</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="modal-body">
            <!--Allocation method-->
            <div class="tab-pane fade show active" id="nav-upload-method" role="tabpanel" aria-labelledby="nav-upload-method-tab">
                <div class="modal-body">
                    <div class="container">
                        <form method="post" method="POST" enctype="multipart/form-data" action="ic_queries/upload_response_queries.php" id="#">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="semester"><b>Semester</b></label>
                                    <input type="text" class="form-control" id="semester" placeholder="Semester" name="semester" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="year"><b>Year</b></label>
                                    <input type="text" class="form-control" id="year" name="year" placeholder="Year" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="ctype"><b>Course Type</b></label>
                                    <select class="browser-default custom-select" name='course_type' required>
                                        <option selected></option>
                                        <option value="audit">Audit Course</option>
                                        <option value="idc">interdisciplinary Course</option>
                                        <option value="oec">Open Elective Course</option>
                                        <option value="cec">Close Elective Course</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="status"><b>Allocate Status</b></label>
                                    <select class="browser-default custom-select" name='status' required>
                                        <option selected></option>
                                        <option value="0">Unallocated</option>
                                        <option value="1">Allocated</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="npre"><b>Number of valid Preferences</b></label>
                                    <input type="number" class="form-control" id="npre" placeholder="No. of valid Preferences" name="npre" required>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="rno"><b>Roll Number</b></label>
                                    <input type="text" class="form-control" id="rno" name="rno" placeholder="Column name of Roll Number" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tstamp"><b>Time Stamp</b></label>
                                    <input type="text" class="form-control" id="tstamp" placeholder="Column name of Time Stamp" name="tstamp" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email"><b>Email</b></label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Column name of Email" required>
                                </div>
                            </div>

                            <div class="form-row mt-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="map_cbox" name="map_cbox" onclick="showMapSection()">
                                    <label class="form-check-label" for="exampleCheck">Add preference column name</label>
                                    <!-- </div> -->
                                    <div id="map_section" style="display: none;">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" id="add_pref" class="btn btn-primary" style="display: none;">Add</button>
                                        <!-- <button type="reset" value="reset">reset</button> -->
                                        <input type="hidden" value="0" id="total_pref" name="total_pref">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group files color">
                                <script type="text/javascript" language="javascript">
                                    function checkfile(sender) {
                                        var validExts = new Array(".xlsx", ".xls");
                                        var fileExt = sender.value;
                                        fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
                                        if (validExts.indexOf(fileExt) < 0) {
                                            alert("Invalid file selected, valid files are of " +
                                                validExts.toString() + " types.");
                                            return false;
                                        } else return true;
                                    }
                                </script>
                                <input type="file" name="Uploadfile" class="form-control" onchange="checkfile(this);" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required />
                                <label for=""><b>Accepted formats .xls,.xlsx only.</b></label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                <button type="submit" class="btn btn-primary" name="save_changes">Upload</button>
                            </div>
                        </form>
                    </div>
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
            <!--end Allocation Method-->

        </div>
    </div>
</div>

<<script>
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