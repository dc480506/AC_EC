<?php
include('../../../config.php');
include_once('../../verify.php');
if(!isset($_POST['view_response_btn'])){
    header('Location: ../../../index.php');
    exit();
}
include('includes/header.php');
?>
<?php //include('sidebar.php'); ?>

<?php include('includes/topbar1.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
    <style type="text/css">
            .card {
                position: absolute;
                top: 80px;
                left: 0px;
                width: 100%;
            }
            .view-pref{
                font-size: 1.4em;
            }
        </style>
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-md-8 col-lg-7">
                    <h5 class="font-weight-bold text-primary mb-0">
                        <?php
                            if($_POST['type_of_form']=='audit'){
                                echo "Audit Course Responses: Semester ".$_POST['sem']." and Academic Year ".$_POST['yearb'];
                            }
                        ?></h5>
                </div>
                <div class="col-md-3 col-lg-3" id="delete_selected_response_div">
                    <button type="button" class="btn btn-danger" id="delete_selected_response_btn" name="delete_selected_current">
                        <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Response(s)
                    </button>
                </div>
                <div class="col-md-2 col-lg-2">
                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#uploadstudent">
                        <i class="fas fa-upload"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="uploadstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Upload Your File </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-audit-instructions-tab" data-toggle="tab" href="#nav-audit-instructions" role="tab" aria-controls="nav-audit-instructions" aria-selected="true">Instructions</a>
                                <a class="nav-item nav-link" id="nav-audit-upload-tab" data-toggle="tab" href="#nav-audit-upload" role="tab" aria-controls="nav-audit-upload" aria-selected="false">Upload</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <!--Instructions Current-->
                            <div class="tab-pane fade show active" id="nav-audit-instructions" role="tabpanel" aria-labelledby="nav-audit-instructions">
                                <span>
                                    <ol>
                                        <li>Provide the following data directly <span class="text-danger">(not required in the excel sheet)*</span></li>
                                        <ul>
                                            <li><b>SEMESTER:-</b> The semester for which the students will take the course.</li>
                                            <li><b>YEAR:-</b> The acedemic year for which the students will take the course.</li>
                                            <li><b>No of Valid Preferences:-</b> Total number of preferences filled by students.</li>
                                            <li><b>Allocate Status:-</b> Whether the students are allocated or not.</li>
                                        </ul>
                                        <li>Provide the column names (headers of the columns) for the following data from the excel sheet <span class="text-danger">(order is <em><b>Not</b></em> important)*</span></li>
                                        <ul>
                                            <li><b>Roll Number:-</b> The roll number of the students.</li>
                                            <li><b>TIMESTAMP:-</b> The time at which student responded/submitted the Google form.</li>
                                            <li><b>EMAIL:-</b> The Email ID of the student.</li>
                                        </ul>
                                        <li>Click on the "<b><em>Add preference column name</em></b>" checkbox:</li>
                                        <ul>
                                            <li>Then, click on "<b><em>Add</em></b>" button and write the column header/name (from the excel) for the preference number (which appears above the input box) as the input</li>
                                            <li>Click on "<b><em>Undo</em></b>" button to remove the input for a particular preference.</li>
                                        </ul>
                                        <li>For your reference you can download the sample excel sheet from below:</li>
                                    </ol>
                                </span>
                                <a href="../demo_excel_downloads/Student_Preference.xlsx" class="btn btn-primary btn-icon-split btn-sm float-right" download>
                                    <span class="icon text-white-50">
                                        <i class="fas fa-file-download"></i>
                                    </span>
                                    <span class="text">Download</span>
                                </a>
                            </div>
                            <!--end Instructions Current-->
                            <!--Upload Current-->
                            <div class="tab-pane fade" id="nav-audit-upload" role="tabpanel" aria-labelledby="nav-audit-upload">
                                <div class="container">
                                    <form method="post" method="POST" enctype="multipart/form-data" id="bulkUploadCurrent">
                                        <br>
                                        <input type="hidden" name="type" value="audit">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="semester"><b>Semester</b></label>
                                                <?php
                                                include_once("../../../config.php");
                                                $sql = "SELECT sem_type,academic_year FROM current_sem_info WHERE currently_active=1";
                                                $result = mysqli_query($conn, $sql);
                                                $row = mysqli_fetch_assoc($result);
                                                $sem=mysqli_escape_string($conn,$_POST['sem']);
                                                // while ($row = mysqli_fetch_assoc($result)) {
                                                // for ($sem_start = 1; $sem_start <= 8; $sem_start += 1) {

                                                //     $sem_dropdown .= "<option>" . $sem_start . "</option>";
                                                // }
                                                // echo '<select class="form-control" required id="semester" name="semester">
                                                //     ' . $sem_dropdown . '
                                                // </select>'

                                                echo '<input class="form-control" id="semester" name="semester" value="'.$sem. '" disabled>' ;
                                                echo '<input class="form-control" type="hidden" id="semester" name="semester" value="'.$sem.'">';

                                                ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="year"><b>Year</b></label>
                                                <!-- <select class="form-control" name="year" id="year"> -->
                                                    <?php
                                                    $sql = "SELECT academic_year FROM current_sem_info WHERE currently_active=1";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_assoc($result);

                                                    $yr1=mysqli_escape_string($conn,explode("-",$_POST['yearb'])[0]);
                                                    $yr2=mysqli_escape_string($conn,explode("-",$_POST['yearb'])[1]);
                                                    

                                                    echo '<input class="form-control" id="year" name="year" value="'.$yr1.'-'.$yr2. '" disabled>' ;
                                                    echo '<input class="form-control" type="hidden" id="year" name="year" value="'.$yr1.'-'.$yr2. '">'; 

                                                    // $year1 = $row['academic_year'];
                                                    // $year2 = $row['academic_year'];
                                                    // for ($i = 0; $i < 2; $i++) {
                                                    //     $temp = explode('-', $year1)[0];
                                                    //     $temp += 1;
                                                    //     $temp2 = "" . ($temp + 1);
                                                    //     $year1 = $temp . "-" . substr($temp2, 2);
                                                    //     echo '<option>' . $year1 . '</option>';
                                                    // }
                                                    // for ($i = 0; $i < 4; $i++) {

                                                    //     echo '<option>' . $year2 . '</option>';
                                                    //     $temp = explode('-', $year2)[0];
                                                    //     $temp -= 1;
                                                    //     $temp2 = "" . ($temp + 1);
                                                    //     $year2 = $temp . "-" . substr($temp2, 2);
                                                    // }
                                                    // echo '</select>';
                                                    ?>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="npre"><b>Number of valid Preferences</b></label>
                                                <?php
                                                $pref=mysqli_escape_string($conn,$_POST['no_of_preferences']);
                                                echo '<input type="text" class="form-control" id="npre" name="npre" value="'.$pref.'" disabled>' ;
                                                echo '<input type="hidden" class="form-control" id="npre" name="npre" value="'.$pref.'">' ; ?>
                                                <!-- <input type="number" class="form-control" id="npre" placeholder="No. of valid Preferences" name="npre" min=0 oninput="validity.valid||(value='');" required> -->
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="status"><b>Allocate Status</b></label>
                                                <select class="browser-default custom-select" name='status' required>
                                                    <option selected></option>
                                                    <option value="0">Unallocated</option>
                                                    <option value="1">Allocated</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="bulk_current_fields">
                                            <label for="">
                                                <h6><b>Information for mapping Excel sheet columns to Database columns:</b></h6>
                                            </label>
                                            <label for=""><small><b>Note:</b>The following fields should be column names in excel sheet</small></label>
                                            <div class="card-header py-3">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="rno"><b>Roll Number</b></label>
                                                        <input type="text" class="form-control" id="rno" name="rno" placeholder="Column name of Roll Number" value="rollno" required>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="tstamp"><b>Time Stamp</b></label>
                                                        <input type="text" class="form-control" id="tstamp" placeholder="Column name of Time Stamp" name="tstamp" value="timestamp" required>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="email"><b>Email</b></label>
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Column name of Email" value="email_id" required>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-4">
                                                    <div class="form-check">
                                                        <!-- <input type="checkbox" class="form-check-input" id="map_cbox" name="map_cbox" onclick="showMapSection()"> -->
                                                        <p class="text-primary">Add Preference column names</p>
                                                        <!-- </div> -->
                                                        <div id="map_section">
                                                        <?php
                                                           for($i=1;$i<=$_POST['no_of_preferences'];$i++){
                                                               echo '
                                                               <div id="pref_'.$i.'" >
                                                                <div class="form-group" id="pref_field1_ '.$i.'" style="display: block;">
                                                                    <label for="pref_field1"><b>Preference Number '.$i.'</b></label>
                                                                    <input type="text" class="form-control prefid"  required id="pref_id'.$i.'" name="prefid'.$i.'" value="pref'.$i.'" placeholder="Enter the column name of preference number '.$i.'">
                                                                </div>
                                                            </div>
                                                               ';
                                                           }
                                                        ?>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <!-- <button type="button" id="add_pref" class="btn btn-primary" style="display: none;">Add</button> -->
                                                            <!-- <button type="reset" value="reset">reset</button> -->
                                                            <br>
                                                            <button type="button" id="add_pref" class="btn btn-success btn-icon-split" style="display: none;">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-plus"></i>
                                                                </span>
                                                                <span class="text">Add</span>
                                                            </button>
                                                            <input type="hidden" value="<?php echo $_POST['no_of_preferences']?>" id="total_pref" name="total_pref">
                                                        </div>
                                                    </div>
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
                                            <button type="submit" class="btn btn-primary" id="upload_current" name="save_changes">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--end Upload Current-->

                            <!-- <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                        <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                                                    </div> -->
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
                            background-image: url("https://image.flaticon.com/icons/png/128/109/109612.png");
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
                        .text-success{
                            color:#2ecc71!important;
                        }
                    </style>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-4 col-md-4">
                    <label class="font-weight-bold text-info mb-0" style="font-size:1.04em">
                        No. of Preferences:  <?php echo '<span style="font-size:0.9em;">'.$_POST['no_of_preferences']."</span>";?>
                    </label>
                </div>
                <div class="col-md-4 col-md-4">
                    <label class="font-weight-bold text-info mb-0" style="font-size:1.04em">
                        Applicable Department(s):  
                        <?php 
                        include_once('../../../config.php');
                        $res=mysqli_query($conn,"SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') as dept FROM form_applicable_dept 
                                NATURAL JOIN department WHERE form_type='audit' AND sem='{$_POST['sem']}' AND year='{$_POST['yearb']}'");
                        $depts=mysqli_fetch_assoc($res);
                         echo'<span style="font-size:0.9em;">'.$depts['dept']."</span>";
                         ?>
                    </label>
                </div>
            </div>
            <br>
            <div id="response-stats">
            </div>
            <br>
            <p class="text-primary"><b>Collected Responses are as follows: </b></p>
            <table class="table table-bordered table-responsive" id="dataTable-response" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="select_all">
                                <label class="custom-control-label" for="select_all"></label>
                            </div>
                        </th>
                        <th>Email Address</th>
                        <!-- <th>Semester</th>
                        <th>Year</th> -->
                        <th>Roll Number</th>
                        <th>Full Name</th>
                        <th>Student's Department</th>
                        <th>Time Stamp</th>
                        <th>Allocation Status</th>
                        <!-- <th>No of Valid Preferences</th> -->
                        <!-- <th>Preference List</th> -->
                        <th>View Preference</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Email Address</th>
                        <!-- <th>Semester</th>
                        <th>Year</th> -->
                        <th>Roll Number</th>
                        <th>Full Name</th>
                        <th>Student's Department</th>
                        <th>Time Stamp</th>
                        <th>Allocation Status</th>
                        <!-- <th>No of Valid Preferences</th> -->
                        <!-- <th>Preference List</th> -->
                        <th>View Preference</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script type="text/javascript">
    function SemestersOnly(input) {
        var regex = /[^1-8]/;
        input.value = input.value.replace(regex, "");
    }

    $("#bulkUploadCurrent").submit(function(e) {
        e.preventDefault();
        form = this;
        var formData = new FormData(this);
        $("#upload_current").attr("disabled", true);
        $("#upload_current").text("Uploading...")
        $.ajax({
            url: "bulkUpload/upload_response_queries_ac.php",
            type: 'POST',
            data: formData,
            success: function(data) {
                if ($.trim(data) == "Successful") {
                    $("#upload_current").text("Uploaded Successfully")
                    get_response_stats();
                    loadCurrent();
                } else {
                    $("#upload_current").text("Upload Failed")
                    alert(data);
                }
                // form.reset();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    })

    $(document).ready(function() {
        get_response_stats()
        loadCurrent();
        $('#uploadstudent').on('hidden.bs.modal', function(e) {
            document.querySelector("#bulkUploadCurrent").reset();
            $("#upload_current").text("Upload")
            $("#upload_current").attr("disabled", false);
        });
    });

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
                                <br>
                            </div>
                            <button type="button" id="rem_pref` + new_pref_no + `" class="btn btn-secondary btn-icon-split">
                                <span class="icon text-white-50">
                                <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Undo</span>
                            </button>
                            <br>
                    
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

    $("#delete_selected_response_btn").click(function(e) {
        alert("You have selected " + $("#dataTable-response tbody tr.selected").length + " record(s) for deletion");
        var delete_rows = $("#dataTable-response").DataTable().rows('.selected').data()
        var delete_data = {}
        var yr1=<?php echo mysqli_escape_string($conn,explode("-",$_POST['yearb'])[0]);?>;
		var yr2=<?php echo mysqli_escape_string($conn,explode("-",$_POST['yearb'])[1]);?>;
		var y3=yr1+"-"+yr2;
        var sem=<?php echo mysqli_escape_string($conn,$_POST['sem']);?>;
        var currently_active=<?php echo mysqli_escape_string($conn,$_POST['currently_active']);?>;
        for (var i = 0; i < delete_rows.length; i++) {
            baseData = {}
            baseData['email_id'] = delete_rows[i].email_id
            delete_data[i] = baseData
            // console.log(baseData);
        }
        var actual_data = {}
        actual_data['sem'] = sem
        actual_data['year'] = y3
        actual_data['type']='audit'
        actual_data['currently_active']=currently_active
        actual_data['no']='0'
        actual_data['delete_data'] = delete_data
        actual_delete_data_json = JSON.stringify(actual_data)
        console.log(actual_delete_data_json)
        $.ajax({
            type: "POST",
            url: "../../ic_queries/multioperation_queries/delete_multiple_response.php",
            data: actual_delete_data_json,
            success: function(data) {
                console.log("Yo")
                $("#dataTable-response").DataTable().draw(false);
                get_response_stats();
            },
            error:function(){
                alert("Something went wrong while deleting responses!! Please try again")
            }
        })
    })


    function loadCurrent() {
        // document.querySelector("#addCoursebtn").style.display="none"
        var yr1=<?php echo mysqli_escape_string($conn,explode("-",$_POST['yearb'])[0]);?>;
		var yr2=<?php echo mysqli_escape_string($conn,explode("-",$_POST['yearb'])[1]);?>;
		var y3=yr1+"-"+yr2;
        var sem=<?php echo mysqli_escape_string($conn,$_POST['sem']);?>;
        var currently_active=<?php echo mysqli_escape_string($conn,$_POST['currently_active']);?>;
        
        // console.log(y3);
        // console.log(sem);
        // console.log(currently_active);

        $('#dataTable-response').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            ajax: {
                
                'url': 'loadInfo/view_audit.php',
                'data': {
					'year':y3,
                    'sem':sem,
                    'currently_active':currently_active
                }
            },
            fnDrawCallback: function() {
                $(".action-btn").on('click', loadModalCurrent)
                $(".selectrow").attr("disabled", true);
                $("th").removeClass('selectbox');
                $(".selectbox").click(function(e) {
                    var row = $(this).closest('tr')
                    var checkbox = $(this).find('input');
                    console.log(checkbox);
                    checkbox.attr("checked", !checkbox.attr("checked"));
                    row.toggleClass('selected table-secondary')
                    if ($("#dataTable-response tbody tr.selected").length != $("#dataTable-response tbody tr").length) {
                        $("#select_all").prop("checked", true)
                        $("#select_all").prop("checked", false)
                    } else {
                        $("#select_all").prop("checked", false)
                        $("#select_all").prop("checked", true)
                    }
                })
            },
            columns: [{
                    data: 'select-cbox'
                },
                {
                    data: 'email_id'
                },
                // {
                //     data: 'sem'
                // },
                // {
                //     data: 'year'
                // },
                {
                    data: 'rollno'
                },
                {
                    data:'full_name'
                },
                {
                    data:'dept_name'
                },
                {
                    data: 'timestamp'
                },
                {
                    data: 'allocate_status'
                },
                // {
                //     data: 'no_of_valid_preferences'
                // },
                // {
                //     data: 'preference_list'
                // },
                {
                    data: 'view_preference'
                },
                {
                    data: 'action'
                },
            ],
            columnDefs: [{
                    targets: [0, 6,7,8], // column index (start from 0)
                    orderable: false, // set orderable false for selected columns
                },
                {
                    className: "selectbox",
                    targets: [0]
                },
                {
                    className: "email_id",
                    "targets": [1]
                },
                {
                    className: "view-pref-btn",
                    "targets": [7]
                },
            ],
        });
    }
    $("#select_all").click(function(e) {
        //   var row=$(this).closest('tr')
        if ($(this).is(":checked")) {
            $("#dataTable-response tbody tr").addClass("selected table-secondary");
            $(".selectrow").attr("checked", true);
        } else {
            $(".selectrow").attr("checked", false);
            $("#dataTable-response tbody tr").removeClass("selected table-secondary");
        }
    })
    function get_response_stats(){
        var data={}
        var yr1=<?php echo mysqli_escape_string($conn,explode("-",$_POST['yearb'])[0]);?>;
		var yr2=<?php echo mysqli_escape_string($conn,explode("-",$_POST['yearb'])[1]);?>;
        var y3=yr1+"-"+yr2;
        var sem=<?php echo mysqli_escape_string($conn,$_POST['sem']);?>;
        var currently_active=<?php echo mysqli_escape_string($conn,$_POST['currently_active']);?>;
        data={}
        data['sem']=sem
        data['year']=y3
        data['type']='audit'
        data['currently_active']=currently_active
        data['no']='0'
        var json_data = JSON.stringify(data)
        $.ajax({
            type:"POST",
            url:"response_stats.php",
            data:json_data,
            success:function(response){
                $("#response-stats").html(response)
            }
        })
    }
    function loadModalCurrent() {
        var target_row = $(this).closest("tr"); // this line did the trick
        console.log(target_row)
        // var btn=$(this);
        var yr1=<?php echo mysqli_escape_string($conn,explode("-",$_POST['yearb'])[0]);?>;
		var yr2=<?php echo mysqli_escape_string($conn,explode("-",$_POST['yearb'])[1]);?>;
        var y3=yr1+"-"+yr2;
        var sem=<?php echo mysqli_escape_string($conn,$_POST['sem']);?>;
        var currently_active=<?php echo mysqli_escape_string($conn,$_POST['currently_active']);?>;
        var aPos = $("#dataTable-response").dataTable().fnGetPosition(target_row.get(0));
        var courseData = $('#dataTable-response').DataTable().row(aPos).data()
        // delete courseData.action
        // console.log(courseData)
        // delete courseData.allocate_faculty
        courseData['sem']=sem;
        courseData['year']=y3;
        courseData['currently_active']=currently_active
        var json_courseData = JSON.stringify(courseData)
        // console.log(json_courseData)
        $.ajax({
            type: "POST",
            url: "loadModal/audit_response_modal.php",
            // data: form_serialize, 
            // dataType: "json",
            data: json_courseData,
            success: function(output) {
                // $("#"+x).text("Deleted Successfully");
                target_row.append(output);
                $('#update-del-modal').modal('show')
                $(document).on('hidden.bs.modal', '#update-del-modal', function() {
                    $("#update-del-modal").remove();
                });
                $('#delete_response').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var form_serialize = form.serializeArray(); // serializes the form's elements.
                    form_serialize.push({
                        name: $("#delete_response_btn").attr('name'),
                        value: $("#delete_response_btn").attr('value')
                    });
                    $("#delete_response_btn").text("Deleting...");
                    $("#delete_response_btn").attr("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: "../../ic_queries/view_response_queries.php",
                        data: form_serialize,
                        success: function(data) {
                            //    alert(data); // show response from the php script.
                            $("#delete_response_btn").text("Deleted Successfully");
                            var row = $("#update-del-modal").closest('tr');
                            var aPos = $("#dataTable-response").dataTable().fnGetPosition(row.get(0));
                            $('#update-del-modal').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            // row.remove();
                            $("#dataTable-response").DataTable().row(aPos).remove().draw(false);
                            get_response_stats();
                            // console.log(aPos);
                            // console.log(row)
                        }
                    });
                });
                $('#update_response').submit(function(e) {
                    update_response(e);
                    // $('#update-del-modal').modal('hide');
                });
            }
        });
    }

    function update_response(e) {
        e.preventDefault();
        var form = $('#update_response');
        var form_serialize = form.serializeArray(); // serializes the form's elements.
        // console.log(form_serialize)
        form_serialize.push({
            name: $("#update_response_btn").attr('name'),
            value: $("#update_response_btn").attr('value')
        });
        $("#update_response_btn").text("Updating...");
        $("#update_response_btn").attr("disabled", true);
        $.ajax({
            type: "POST",
            url: "../../ic_queries/view_response_queries.php",
            data: form_serialize,
            success: function(data) {
                if (data === "Exists") {
                    $('#rollno_error').text('*Already Exist');
                    $("#update_response_btn").text("Update");
                    $("#update_response_btn").attr("disabled", false);
                } else {
                    //    alert(data); // show response from the php script.
                    $("#update_response_btn").text("Updated Successfully");
                    var row = $("#update-del-modal").closest('tr');
                    var aPos = $("#dataTable-response").dataTable().fnGetPosition(row.get(0));
                    var temp = $("#dataTable-response").DataTable().row(aPos).data();
                    // console.log(temp)
                    console.log(form_serialize)
                    temp['rollno'] = form_serialize[0].value; //new values
                    temp['allocate_status'] = form_serialize[2].value;
                    temp['sem'] = form_serialize[4].value;
                    temp['year'] = form_serialize[6].value;
                    console.log(temp)
                    $('#dataTable-response').dataTable().fnUpdate(temp, aPos, undefined, false);
                    $('.action-btn').off('click')
                    $('.action-btn').on('click', loadModalCurrent)
                    // $("#dataTable-response").DataTable().row(aPos).draw(false);
                    $(".selectrow_student").attr("disabled", true);
                    $('#rollno_error').remove();
                }
            }
        });
    }
    $("#dataTable-response").on('click','td.view-pref-btn',function(){
    var tr = $(this).closest('tr');
        var row = $("#dataTable-response").DataTable().row( tr );
 
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown table-warning');
        }
        else {
            // Open this row
            var yr1=<?php echo mysqli_escape_string($conn,explode("-",$_POST['yearb'])[0]);?>;
            var yr2=<?php echo mysqli_escape_string($conn,explode("-",$_POST['yearb'])[1]);?>;
            var y3=yr1+"-"+yr2;
            var sem=<?php echo mysqli_escape_string($conn,$_POST['sem']);?>;
            var currently_active=<?php echo mysqli_escape_string($conn,$_POST['currently_active']);?>;
            var data={}
            data['email_id']=row.data()['email_id'];
            data['type']='audit'
            data['sem']=sem
            data['year']=y3
            data['currently_active']=currently_active
            data['nop']=<?php echo $pref;?>;
            data_json=JSON.stringify(data)
            console.log(data_json)
            $.ajax({
                type: "POST",
                url: "loadPrefList.php",
                data: data_json, 
                beforeSend:function(){
                    row.child('Loading... <img src="../../../vendor/img/ajax-loader.gif" alt="loading" id="img-spinner">').show();
                    tr.addClass('shown table-warning');
                },
                success: function(response)
                {
                row.child(response).show();
                },
                error:function(){
                    row.child("Cannot load preferences at the moment").show();
                }
            });
            // row.child("<b>Hello</b>").show();
        }
    })
</script>


<?php include('includes/footer.php');
include('includes/scripts.php');
?>