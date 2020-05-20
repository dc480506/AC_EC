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
                    <h4 class="font-weight-bold text-primary mb-0">Audit Course Records</h4>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
                <div class="col text-right" id ="addCoursebtn" style="display: none">
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
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add New Course</h5>
                            <button type="button" class="close" id="close_add_form_cross" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Table -->

                            <!-- <form class="forms-sample" method="POST" action="ic_queries/addcourse_queries.php"> -->
                            <form class="forms-sample" id='add_course_form'>

                                <div class="form-group">
                                    <label for="exampleInputName1"><b>Name</b></label>
                                    <input type="text" class="form-control" required id="exampleInputName1" name="cname" placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputCourseid"><b>Course ID</b></label>
                                    <input type="text" class="form-control" required id="exampleInputCourseid" name="courseid" placeholder="Course ID">
                                </div>
                                <?php
                                        include_once("../config.php");
                                        $sql = "SELECT sem_type,academic_year FROM current_sem_info WHERE currently_active=1";
                                        $result = mysqli_query($conn, $sql);
                                        $row=mysqli_fetch_assoc($result);
                                        $sem_dropdown="";
                                        // while ($row = mysqli_fetch_assoc($result)) {
                                        if($row['sem_type']=='EVEN'){
                                            for($sem_start=1;$sem_start<=8;$sem_start+=2){
                                                $sem_dropdown.= "<option>" . $sem_start . "</option>";
                                            }
                                          $temp=explode('-',$row['academic_year'])[0];
                                          $temp+=1;
                                          $temp2="".($temp+1);
                                          $year_val=$temp."-".substr($temp2,2);
                                        }else{
                                            for($sem_start=2;$sem_start<=8;$sem_start+=2){
                                                $sem_dropdown.= "<option>" . $sem_start . "</option>";
                                            }
                                            $year_val=$row['academic_year'];
                                        }
                                echo '
                                <div class="form-group">
                                    <label for="exampleInputSemester"><b>Semester</b></label>
                                    <!-- <input type="text" class="form-control" required id="exampleInputSemester" name="sem" placeholder="Semester"> -->
                                    <select class="form-control" required id="exampleInputSemester" name="sem">
                                    '.$sem_dropdown.'
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputYear"><b>Year</b></label>
                                    <input type="text" class="form-control" required id="exampleInputYear" name="year" placeholder="Year" value="'.$year_val.'" disabled>
                                    <input type="hidden" class="form-control" required id="exampleInputYear_submit" name="year" value="'.$year_val.'">
                                </div>';
                                ?>

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
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMax"><b>Max</b></label>
                                    <input type="number" class="form-control" required id="exampleInputMax" name="max" placeholder="Maximum number of students">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMin"><b>Min</b></label>
                                    <input type="number" class="form-control" required id="exampleInputMin" name="min" placeholder="Minimum number of students">
                                </div>
                                <label for="branch"><b>Branches to opt for</b></label>
                                <br>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="customCheck7" checked>
                                    <label class="custom-control-label" for="customCheck7">All</label>
                                </div>
                                <?php
                                include_once('../config.php');
                                $sql = "SELECT * FROM department";
                                $result = mysqli_query($conn, $sql);
                                $c = 8;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                              <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="checkbox" class="custom-control-input dept" id="customCheck' . $c . '"  name="check_dept[]" value="' . $row['dept_id'] . '" checked>
                              <label class="custom-control-label" for="customCheck' . $c . '">' . $row['dept_name'] . '</label>
                             </div>
                              ';
                                    $c++;
                                }
                                ?>
                                <br>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="map_cbox" name="map_cbox" onclick="showMapSection()">
                                    <label class="form-check-label" for="exampleCheck1">Similar previous course</label>
                                </div>
                                <div id="map_section" style="display: none;">
                                    <!-- <input type="hidden" value="0" id="total_prev" name="total_prev"> -->
                                    <!-- <div id="map_sec1" style="display :none;"> -->
                                    <!-- <h5 class="modal-title">Previous Course 1</h5>
                                        <div class="form-group" id="previous_field1" style="display: block;">
                                            <label for="previous_field1"><b>Course ID</b></label>
                                            <input type="text" class="form-control" id="previous_id1" name="prevcid1" placeholder="Course Id">
                                        </div>
                                        <div class="form-group" id="previous_field2" style="display: block;">
                                            <label for="previous_field2"><b>Previous Semester</b></label>
                                            <input type="text" class="form-control" id="previous_sem1" name="prevsem1" placeholder="Previous Semester">
                                        </div>
                                        <div class="form-group" id="previous_field3" style="display: block;">
                                            <label for="previous_field3"><b>Previous Year</b></label>
                                            <input type="text" class="form-control" id="previous_year1" name="prevyear1" placeholder="Previous Year">
                                        </div> -->
                                    <!-- </div> -->
                                </div>
                                <BR>
                                <div class="form-group">

                                    <button type="button" id="add_prev" class="btn btn-primary" style="display: none;">Add</button>
                                    <!-- <button type="button" id="rem_prev" class="btn btn-primary" style="display: none;">Remove the Previous Course</button> -->
                                    <input type="hidden" value="0" id="total_prev" name="total_prev">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" id="close_add_course_form" data-dismiss="modal" name="close">Close</button>
                                    <button type="submit" id="add_course_btn" class="btn btn-primary" name="add_course">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="modal-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-current-tab" data-toggle="tab" href="#nav-current" role="tab" aria-controls="nav-current" aria-selected="true">Current</a>
                        <a class="nav-item nav-link" id="nav-upcoming-tab" data-toggle="tab" href="#nav-upcoming" role="tab" aria-controls="nav-upcoming" aria-selected="false">Upcoming</a>
                        <a class="nav-item nav-link" id="nav-previous-tab" data-toggle="tab" href="#nav-previous" role="tab" aria-controls="nav-previous" aria-selected="false">Previous</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <!--Current-->
                    <div class="tab-pane fade show active" id="nav-current" role="tabpanel" aria-labelledby="nav-current-tab">
                        <br>
                        <!-- <div class="table-responsive"> -->
                        <div class="col text-right" id ="delete_selected_current_div">
                            <button type="button" class="btn btn-primary" id="delete_selected_current_btn" style="background-color:#eb3b5a" name="delete_selected_current">
                                <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Course(s)
                            </button>
                        </div>    
                        <br>
                        <table class="table table-bordered table-responsive" id="dataTable-current" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="select_all_current_page">
                                            <label class="custom-control-label" for="select_all_current_page"></label>
                                        </div>
                                    </th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Floating Department</th>
                                    <th>Departments Applicable</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Students Allocated</th>
                                    <th>Allocate faculty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Floating Department</th>
                                    <th>Departments Applicable</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Students Allocated</th>
                                    <th>Allocate faculty</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                        </table>
                        <!-- </div> -->
                    </div>
                    <!--end Current-->
                    <!--Upcoming-->
                    <div class="tab-pane fade" id="nav-upcoming" role="tabpanel" aria-labelledby="nav-upcoming-tab">
                        <br>
                        <div class="col text-right" id ="delete_selected_upcoming_div">
                            <button type="button" class="btn btn-primary" id="delete_selected_upcoming_btn" style="background-color:#eb3b5a" name="delete_selected_current">
                                <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Course(s)
                            </button>
                        </div>
                        <br>
                        <!-- <div class="table-responsive"> -->
                            <table class="table table-bordered table-responsive" id="dataTable-upcoming" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="select_all_upcoming_page">
                                                <label class="custom-control-label" for="select_all_upcoming_page"></label>
                                            </div>
                                        </th>
                                        <th>Course Name</th>
                                        <th>Course ID</th>
                                        <th>Sem</th>
                                        <th>Academic Year</th>
                                        <th>Floating Department</th>
                                        <th>Departments Applicable</th>
                                        <th>Max</th>
                                        <th>Min</th>
                                        <th>Allocate faculty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Course Name</th>
                                        <th>Course ID</th>
                                        <th>Sem</th>
                                        <th>Academic Year</th>
                                        <th>Floating Department</th>
                                        <th>Departments Applicable</th>
                                        <th>Max</th>
                                        <th>Min</th>
                                        <th>Allocate faculty</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                            </table>
                        <!-- </div> -->
                    </div>
                    <!--Upcoming end-->
                    <div class="tab-pane fade" id="nav-previous" role="tabpanel" aria-labelledby="nav-previous-tab">
                        <br>
                        <!-- <div class="table-responsive"> -->
                            <table class="table table-bordered table-responsive" id="dataTable-previous" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Course ID</th>
                                        <th>Sem</th>
                                        <th>Academic Year</th>
                                        <th>Floating Dept.</th>
                                        <th>Dept. Applicable</th>
                                        <th>Max</th>
                                        <th>Min</th>
                                        <th>Students Allocated</th>
                                        <th>Allocate faculty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Course ID</th>
                                        <th>Sem</th>
                                        <th>Academic Year</th>
                                        <th>Floating Dept.</th>
                                        <th>Dept. Applicable</th>
                                        <th>Max</th>
                                        <th>Min</th>
                                        <th>Students Allocated</th>
                                        <th>Allocate faculty</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                            </table>
                        <!-- </div> -->
                    </div>
                    <!--Update end-->
                </div>
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
            document.querySelector("#add_prev").style.display = "block";
            document.querySelector("#rem_prev").style.display = "block";
        } else {
            $("#map_section").empty();
            $("#total_prev").val("0");
            document.querySelector("#map_section").style.display = "none";
            document.querySelector("#add_prev").style.display = "none";
            document.querySelector("#rem_prev").style.display = "none";
        }
    }
    dept_checkbox = document.querySelectorAll(".dept");

    if (document.querySelector("#customCheck7").checked) {
        for (i = 0; i < dept_checkbox.length; i++) {
            dept_checkbox[i].checked = true;
        }
    }
    all_cbox = document.querySelector("#customCheck7")
    for (i = 0; i < dept_checkbox.length; i++) {
        dept_checkbox[i].addEventListener("click", function() {
            if (!this.checked && all_cbox.checked) {
                all_cbox.checked = false;
            }
            if (this.checked) {
                p = true;
                for (i = 0; i < dept_checkbox.length; i++) {
                    if (!dept_checkbox[i].checked) {
                        p = false
                        break;
                    }
                }
                if (p) {
                    all_cbox.checked = true;
                }
            }
        })
    }
    all_cbox.addEventListener("click", function() {
        if (this.checked) {
            //Check all boxes
            for (i = 0; i < dept_checkbox.length; i++) {
                dept_checkbox[i].checked = true;
            }
        } else {
            //Uncheck all boxes
            for (i = 0; i < dept_checkbox.length; i++) {
                dept_checkbox[i].checked = false;
            }
        }
    })
</script>

<script type="text/javascript">
    // previous course details
    // var new_prev_no=1;
    $('#add_prev').on('click', add);
    // $('#rem_prev').on('click',rem);
    var new_prev_no = 1

    function add() {
        var total = parseInt($('#total_prev').val()) + 1
        // console.log("Value of total is "+total)
        var new_input = `<div id="prev_` + new_prev_no + `" >
                            <br>
                            <input type="hidden" class='current_no' value='` + total + `'>
                            <h5 class="modal-title">Previous Course ` + total + `</h5>
                            <div class="form-group" id="previous_field1_` + new_prev_no + `" style="display: block;">
                                <label for="previous_field1"><b>Course ID</b></label>
                                <input type="text" class="form-control prevcid"  required id="previous_id` + new_prev_no + `" name="prevcid` + total + `" placeholder="Course Id">
                            </div>
                            <div class="form-group" id="previous_field2_` + new_prev_no + `" style="display: block;">
                                <label for="previous_field2"><b>Previous Semester</b></label>
                                <input type="text" class="form-control prevsem"  required id="previous_sem` + new_prev_no + `" name="prevsem` + total + `" placeholder="Previous Semester">
                            </div>
                            <div class="form-group" id="previous_field3_` + new_prev_no + `" style="display: block;">
                                <label for="previous_field3"><b>Previous Year</b></label>
                                <input type="text" class="form-control prevyear"  required id="previous_year` + new_prev_no + `" name="prevyear` + total + `" placeholder="Previous Year">
                            </div>
                            <button type="button" id="rem_prev` + new_prev_no + `" class="btn btn-primary">Remove</button>
                            
                        </div>`;
        // alert(new_input);
        // var new_input = "<input type='text' id='new_" + new_prev_no + "'>";
        // var new_input1=`<button type="button" id="rem_prev" class="btn btn-primary "style="display: none;">Remove the Previous Course</button>`;
        // console.log("Add called!!");
        // console.log('#rem_prev'+new_prev_no);

        $('#map_section').append(new_input);
        $("#rem_prev" + new_prev_no).click(function() {
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
            $('#total_prev').val($('#total_prev').val() - 1);
        });
        new_prev_no += 1;
        $('#total_prev').val(parseInt($('#total_prev').val()) + 1);
        console.log("Add exiting!!");
    }

    function adjustDivs(nextDivs) {
        for (var i = 0; i < nextDivs.length; i++) {
            // console.log(nextDivs[i]);

            var new_index = parseInt(nextDivs[i].querySelector('.current_no').value) - 1
            var header = nextDivs[i].querySelector('h5')
            var prevcid = nextDivs[i].querySelector('.prevcid')
            var prevsem = nextDivs[i].querySelector('.prevsem')
            var prevyear = nextDivs[i].querySelector('.prevyear')

            nextDivs[i].querySelector('.current_no').value = new_index
            header.innerText = "Previous Course " + (new_index)
            prevcid.setAttribute('name', 'prevcid' + new_index)
            prevsem.setAttribute('name', 'prevsem' + new_index)
            prevyear.setAttribute('name', 'prevyear' + new_index)
            // console.log(header)
            // console.log(curr_value)
            // console.log("Bruh")
        }

    }

    function rem() {
        // var last_prev_no=$('#total_prev').val();
        if (last_prev_no > 0) {
            $('#prev_' + last_prev_no).remove();
            $('#total_prev').val(last_prev_no - 1);
        }
    }
$(document).ready(function(){
    loadCurrent();
});

$("#select_all_current_page").click(function(e){
            //   var row=$(this).closest('tr')
    if($(this).is(":checked")){    
        $("#dataTable-current tbody tr").addClass("selected table-secondary");
        $(".selectrow_current").attr("checked",true);
    }else{
        $(".selectrow_current").attr("checked",false);
        $("#dataTable-current tbody tr").removeClass("selected table-secondary");
    }
            //   row.toggleClass('selected table-secondary')
})
$("#delete_selected_current_btn").click(function(e){
    alert("You have selected "+$("#dataTable-current tbody tr.selected").length+" record(s) for deletion");
    var delete_rows=$("#dataTable-current").DataTable().rows('.selected').data()
    var delete_data={}
    for(var i=0;i<delete_rows.length;i++){
        baseData={}
        baseData['cid']=delete_rows[i].cid
        baseData['sem']=delete_rows[i].sem
        delete_data[i]=baseData
        // console.log(baseData);
    }
    var actual_data={}
    actual_data['type']='current'
    actual_data['delete_data']=delete_data
    actual_delete_data_json=JSON.stringify(actual_data)
    console.log(actual_delete_data_json)
    $.ajax({
        type: "POST",
        url: "ic_queries/multioperation_queries/delete_multiple_audit.php",
        data: actual_delete_data_json, 
        success: function(data)
        {
            // console.log(data)
            $("#dataTable-current").DataTable().draw(false);
        }
    })
})
function loadCurrent(){
    document.querySelector("#addCoursebtn").style.display="none"
    $('#dataTable-current').DataTable({
      processing: true,
      serverSide: true,
      destroy:true,
      serverMethod: 'post',
      aaSorting:[],
      ajax: {
          'url':'loadInfo/current_audit.php'
      },
      fnDrawCallback:function(){
          $(".action-btn").on('click',loadModalCurrent)
          $(".selectrow_current").attr("disabled",true);
          $("th").removeClass('selectbox_current_td');
          $(".selectbox_current_td").click(function(e){
              var row=$(this).closest('tr')
              var checkbox = $(this).find('input');
              checkbox.attr("checked", !checkbox.attr("checked"));
              row.toggleClass('selected table-secondary')
              if($("#dataTable-current tbody tr.selected").length!=$("#dataTable-current tbody tr").length){
                $("#select_all_current_page").prop("checked",true)
                $("#select_all_current_page").prop("checked",false)
              }else{
                $("#select_all_current_page").prop("checked",false)
                $("#select_all_current_page").prop("checked",true)
              }
          })
      },
      columns: [
         { data: 'select-cbox'},
         { data: 'cname' },
         { data: 'cid' },
         { data: 'sem' },
         { data: 'dept_name' },
         { data: 'dept_applicable' },
         { data: 'max' },
         { data: 'min' },
         { data: 'no_of_allocated' },
         { data: 'allocate_faculty' },
         { data: 'action' },
      ],
      columnDefs: [ {
        targets: [0,5,8,9,10], // column index (start from 0)
        orderable: false, // set orderable false for selected columns
     },
     {className:"selectbox_current_td",targets:[0]}
        // { className: "cname", "targets": [ 0 ] },
        // { className: "cid", "targets": [ 1 ] },
        // { className: "sem", "targets": [ 2 ] },
        // { className: "dept_name", "targets": [ 3 ] },
        // { className: "dept_applicable", "targets": [ 4 ] },
        // { className: "max", "targets": [ 5 ] },
        // { className: "min", "targets": [ 6 ] }
     ],
   });  
}

function loadModalCurrent(){
    var target_row = $(this).closest("tr"); // this line did the trick
        console.log(target_row)
    // var btn=$(this);
    var aPos = $("#dataTable-current").dataTable().fnGetPosition(target_row.get(0)); 
    var courseData=$('#dataTable-current').DataTable().row(aPos).data()
    // delete courseData.action
    // delete courseData.allocate_faculty
    var json_courseData=JSON.stringify(courseData)
    console.log(json_courseData)
    $.ajax({
        type: "POST",
        url: "loadModal/current_audit_modal.php",
        // data: form_serialize, 
        // dataType: "json",
        data: json_courseData,
        success: function(output)
        {
            // $("#"+x).text("Deleted Successfully");
            target_row.append(output);
            $('#update-del-modal').modal('show')
                $(document).on('hidden.bs.modal', '#update-del-modal', function () {
                    $("#update-del-modal").remove(); 
                });
            $('#delete_course_form').submit(function(e){
                e.preventDefault();
                var form = $(this);
                var form_serialize=form.serializeArray();// serializes the form's elements.
                form_serialize.push({ name: $("#delete_course_btn").attr('name'), value: $("#delete_course_btn").attr('value') });
                $("#delete_course_btn").text("Deleting...");
                $("#delete_course_btn").attr("disabled",true);
                $.ajax({
                    type: "POST",
                    url: "ic_queries/addcourse_queries.php",
                    data: form_serialize, 
                    success: function(data)
                    {
                        //    alert(data); // show response from the php script.
                        $("#delete_course_btn").text("Deleted Successfully");
                        var row=$("#update-del-modal").closest('tr');
                        var aPos = $("#dataTable-current").dataTable().fnGetPosition(row.get(0)); 
                        $('#update-del-modal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        // row.remove();
                        $("#dataTable-current").DataTable().row(aPos).remove().draw(false);
                        // console.log(aPos);
                        // console.log(row)
                    }
                    });
            });
            $('#update_course_form').submit(function(e){
                update_course_form_current(e);
                // $('#update-del-modal').modal('hide');
            });
        }
    });
}
function update_course_form_current(e){
    e.preventDefault();
    var form = $('#update_course_form');
    var form_serialize=form.serializeArray();// serializes the form's elements.
    console.log(form_serialize)
    form_serialize.push({ name: $("#update_course_btn").attr('name'), value: $("#update_course_btn").attr('value') });
    $("#update_course_btn").text("Updating...");
    $("#update_course_btn").attr("disabled",true);
    $.ajax({
    type: "POST",
    url: "ic_queries/addcourse_queries.php",
    data: form_serialize, 
    success: function(data)
    {
        //    alert(data); // show response from the php script.
        $("#update_course_btn").text("Updated Successfully");
        var row=$("#update-del-modal").closest('tr');
        var aPos = $("#dataTable-current").dataTable().fnGetPosition(row.get(0));
        var temp = $("#dataTable-current").DataTable().row(aPos).data();
        console.log(temp)
        console.log(form_serialize)
        temp['cname'] = form_serialize[0].value;
        temp['cid']=form_serialize[1].value;
        temp['sem']=form_serialize[3].value;
        temp['dept_name']=id_to_name_convertor_dept(form_serialize[6].value);
        var x="";
        for (i = 9; i < form_serialize.length - 1; i++) { 
            x = x.concat(id_to_name_convertor_dept(form_serialize[i].value));
            x = x.concat(", ");
        }
        x = x.substr(0, x.length - 2);
        temp['dept_applicable']=x;
        temp['max']=form_serialize[7].value;
        temp['min']=form_serialize[8].value;
        console.log(temp)
        $('#dataTable-current').dataTable().fnUpdate(temp,aPos,undefined,false);
        $('.action-btn').off('click')
        $('.action-btn').on('click',loadModalCurrent)
        // $("#dataTable-current").DataTable().row(aPos).draw(false);
        $(".selectrow_current").attr("disabled",true);

    }
    });
}


$("#select_all_upcoming_page").click(function(e){
            //   var row=$(this).closest('tr')
    if($(this).is(":checked")){    
        $("#dataTable-upcoming tbody tr").addClass("selected table-secondary");
        $(".selectrow_upcoming").attr("checked",true);
    }else{
        $(".selectrow_upcoming").attr("checked",false);
        $("#dataTable-upcoming tbody tr").removeClass("selected table-secondary");
    }
            //   row.toggleClass('selected table-secondary')
})
$("#delete_selected_upcoming_btn").click(function(e){
    alert("You have selected "+$("#dataTable-upcoming tbody tr.selected").length+" record(s) for deletion");
    var delete_rows=$("#dataTable-upcoming").DataTable().rows('.selected').data()
    var delete_data={}
    for(var i=0;i<delete_rows.length;i++){
        baseData={}
        baseData['cid']=delete_rows[i].cid
        baseData['sem']=delete_rows[i].sem
        baseData['year']=delete_rows[i].year
        delete_data[i]=baseData
        // console.log(baseData);
    }
    var actual_data={}
    actual_data['type']='upcoming'
    actual_data['delete_data']=delete_data
    actual_delete_data_json=JSON.stringify(actual_data)
    console.log(actual_delete_data_json)
    $.ajax({
        type: "POST",
        url: "ic_queries/multioperation_queries/delete_multiple_audit.php",
        data: actual_delete_data_json, 
        success: function(data)
        {
            // console.log(data)
            $("#dataTable-upcoming").DataTable().draw(false);
        }
    })
})
function loadUpcoming(){
    document.querySelector("#addCoursebtn").style.display="block"
    $('#dataTable-upcoming').DataTable({
      processing: true,
      serverSide: true,
      destroy:true,
      serverMethod: 'post',
      aaSorting:[],
      ajax: {
          'url':'loadInfo/upcoming_audit.php'
      },
      fnDrawCallback:function(){
          $(".action-btn").on('click',loadModalUpcoming)
          $(".selectrow_upcoming").attr("disabled",true);
          $("th").removeClass('selectbox_upcoming_td');
          $(".selectbox_upcoming_td").click(function(e){
              var row=$(this).closest('tr')
              var checkbox = $(this).find('input');
              checkbox.attr("checked", !checkbox.attr("checked"));
              row.toggleClass('selected table-secondary')
              if($("#dataTable-upcoming tbody tr.selected").length!=$("#dataTable-upcoming tbody tr").length){
                $("#select_all_upcoming_page").prop("checked",true)
                $("#select_all_upcoming_page").prop("checked",false)
              }else{
                $("#select_all_upcoming_page").prop("checked",false)
                $("#select_all_upcoming_page").prop("checked",true)
              }
          })

      },
      columns: [
         { data: 'select-cbox'},
         { data: 'cname' },
         { data: 'cid' },
         { data: 'sem' },
         { data: 'year' },
         { data: 'dept_name' },
         { data: 'dept_applicable' },
         { data: 'max' },
         { data: 'min' },
         { data: 'allocate_faculty' },
         { data: 'action' },
      ],
      columnDefs: [ {
        targets: [0,6,9,10], // column index (start from 0)
        orderable: false, // set orderable false for selected columns
     },
     {className:"selectbox_upcoming_td",targets:[0]}
     ]
   });
}
function loadModalUpcoming(){
    var target_row = $(this).closest("tr"); // this line did the trick
        console.log(target_row)
    // var btn=$(this);
    var aPos = $("#dataTable-upcoming").dataTable().fnGetPosition(target_row.get(0)); 
    var courseData=$('#dataTable-upcoming').DataTable().row(aPos).data()
    // delete courseData.action
    // delete courseData.allocate_faculty
    var json_courseData=JSON.stringify(courseData)
    console.log(json_courseData)
    $.ajax({
        type: "POST",
        url: "loadModal/upcoming_audit_modal.php",
        // data: form_serialize, 
        // dataType: "json",
        data: json_courseData,
        success: function(output)
        {
            // $("#"+x).text("Deleted Successfully");
            target_row.append(output);
            $('#update-del-modal').modal('show')
                $(document).on('hidden.bs.modal', '#update-del-modal', function () {
                    $("#update-del-modal").remove(); 
                });
            $('#delete_course_form').submit(function(e){
                e.preventDefault();
                var form = $(this);
                var form_serialize=form.serializeArray();// serializes the form's elements.
                form_serialize.push({ name: $("#delete_course_btn").attr('name'), value: $("#delete_course_btn").attr('value') });
                $("#delete_course_btn").text("Deleting...");
                $("#delete_course_btn").attr("disabled",true);
                $.ajax({
                    type: "POST",
                    url: "ic_queries/addcourse_queries.php",
                    data: form_serialize, 
                    success: function(data)
                    {
                        //    alert(data); // show response from the php script.
                        $("#delete_course_btn").text("Deleted Successfully");
                        var row=$("#update-del-modal").closest('tr');
                        var aPos = $("#dataTable-upcoming").dataTable().fnGetPosition(row.get(0)); 
                        $('#update-del-modal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        // row.remove();
                        $("#dataTable-upcoming").DataTable().row(aPos).remove().draw(false);
                        // console.log(aPos);
                        // console.log(row)
                    }
                    });
            });
            $('#update_course_form').submit(function(e){
                update_course_form_upcoming(e);
                // $('#update-del-modal').modal('hide');
                });
        }
    });
}

function update_course_form_upcoming(e){
    e.preventDefault();
    var form = $('#update_course_form');
    var form_serialize=form.serializeArray();// serializes the form's elements.
    console.log(form_serialize)
    form_serialize.push({ name: $("#update_course_btn").attr('name'), value: $("#update_course_btn").attr('value') });
    $("#update_course_btn").text("Updating...");
    $("#update_course_btn").attr("disabled",true);
    $.ajax({
    type: "POST",
    url: "ic_queries/addcourse_queries.php",
    data: form_serialize, 
    success: function(data)
    {
        //    alert(data); // show response from the php script.
        $("#update_course_btn").text("Updated Successfully");
        var row=$("#update-del-modal").closest('tr');
        var aPos = $("#dataTable-upcoming").dataTable().fnGetPosition(row.get(0));
        var temp = $("#dataTable-upcoming").DataTable().row(aPos).data();
        console.log(temp)
        console.log(form_serialize)
        temp['cname'] = form_serialize[0].value;
        temp['cid']=form_serialize[1].value;
        temp['sem']=form_serialize[3].value;
        temp['year']=form_serialize[5].value;
        temp['dept_name']=id_to_name_convertor_dept(form_serialize[6].value);
        var x="";
        for (i = 9; i < form_serialize.length - 1; i++) { 
            x = x.concat(id_to_name_convertor_dept(form_serialize[i].value));
            x = x.concat(", ");
        }
        x = x.substr(0, x.length - 2);
        temp['dept_applicable']=x;
        temp['max']=form_serialize[7].value;
        temp['min']=form_serialize[8].value;
        console.log(temp)
        $('#dataTable-upcoming').dataTable().fnUpdate(temp,aPos,undefined,false);
        $('.action-btn').off('click')
        $('.action-btn').on('click',loadModalUpcoming)
        $(".selectrow_upcoming").attr("disabled",true);
        // $("#dataTable-current").DataTable().row(aPos).draw(false);
    }
    });
}
function loadPrevious(){
    document.querySelector("#addCoursebtn").style.display="none"
    $('#dataTable-previous').DataTable({
      processing: true,
      serverSide: true,
      destroy:true,
      serverMethod: 'post',
      aaSorting:[],
      ajax: {
          'url':'loadInfo/previous_audit.php'
      },
      fnDrawCallback:function(){
          $(".action-btn").on('click',loadModalPrevious)
      },
      columns: [
         { data: 'cname' },
         { data: 'cid' },
         { data: 'sem' },
         { data: 'year' },
         { data: 'dept_name' },
         { data: 'dept_applicable' },
         { data: 'max' },
         { data: 'min' },
         { data: 'no_of_allocated' },
         { data: 'allocate_faculty' },
         { data: 'action' },
      ],
      columnDefs: [ {
        targets: [4,8,9], // column index (start from 0)
        orderable: false, // set orderable false for selected columns
     }]
   });
}
function loadModalPrevious(){
    var target_row = $(this).closest("tr"); // this line did the trick
        console.log(target_row)
    var aPos = $("#dataTable-previous").dataTable().fnGetPosition(target_row.get(0)); 
    var courseData=$('#dataTable-previous').DataTable().row(aPos).data()
    // delete courseData.action
    // delete courseData.allocate_faculty
    var json_courseData=JSON.stringify(courseData)
    console.log(json_courseData)
    $.ajax({
        type: "POST",
        url: "loadModal/previous_audit_modal.php",
        // data: form_serialize, 
        // dataType: "json",
        data: json_courseData,
        success: function(output)
        {
            // $("#"+x).text("Deleted Successfully");
            target_row.append(output);
            $('#update-del-modal').modal('show')
                $(document).on('hidden.bs.modal', '#update-del-modal', function () {
                    $("#update-del-modal").remove(); 
                });
            $('#delete_course_form').submit(function(e){
                e.preventDefault();
                var form = $(this);
                var form_serialize=form.serializeArray();// serializes the form's elements.
                form_serialize.push({ name: $("#delete_course_btn").attr('name'), value: $("#delete_course_btn").attr('value') });
                $("#delete_course_btn").text("Deleting...");
                $("#delete_course_btn").attr("disabled",true);
                $.ajax({
                    type: "POST",
                    url: "ic_queries/addcourse_queries.php",
                    data: form_serialize, 
                    success: function(data)
                    {
                        //    alert(data); // show response from the php script.
                        $("#delete_course_btn").text("Deleted Successfully");
                        var row=$("#update-del-modal").closest('tr');
                        var aPos = $("#dataTable-previous").dataTable().fnGetPosition(row.get(0)); 
                        $('#update-del-modal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        // row.remove();
                        $("#dataTable-previous").DataTable().row(aPos).remove().draw(false);
                        // console.log(aPos);
                        // console.log(row)
                    }
                    });
            });
            $('#update_course_form').submit(function(e){
                update_course_form_previous(e);
                // $('#update-del-modal').modal('hide');
                });

        }
    });
}
function update_course_form_previous(e){
    e.preventDefault();
    var form = $('#update_course_form');
    var form_serialize=form.serializeArray();// serializes the form's elements.
    console.log(form_serialize)
    form_serialize.push({ name: $("#update_course_btn").attr('name'), value: $("#update_course_btn").attr('value') });
    $("#update_course_btn").text("Updating...");
    $("#update_course_btn").attr("disabled",true);
    $.ajax({
    type: "POST",
    url: "ic_queries/addcourse_queries.php",
    data: form_serialize, 
    success: function(data)
    {
        //    alert(data); // show response from the php script.
        $("#update_course_btn").text("Updated Successfully");
        var row=$("#update-del-modal").closest('tr');
        var aPos = $("#dataTable-previous").dataTable().fnGetPosition(row.get(0));
        var temp = $("#dataTable-previous").DataTable().row(aPos).data();
        console.log(temp)
        console.log(form_serialize)
        temp['cname'] = form_serialize[0].value;
        temp['cid']=form_serialize[1].value;
        temp['sem']=form_serialize[3].value;
        temp['year']=form_serialize[5].value;
        temp['dept_name']=id_to_name_convertor_dept(form_serialize[6].value);
        var x="";
        for (i = 9; i < form_serialize.length - 1; i++) { 
            x = x.concat(id_to_name_convertor_dept(form_serialize[i].value));
            x = x.concat(", ");
        }
        x = x.substr(0, x.length - 2);
        temp['dept_applicable']=x;
        temp['max']=form_serialize[7].value;
        temp['min']=form_serialize[8].value;
        console.log(temp)
        $('#dataTable-previous').dataTable().fnUpdate(temp,aPos,undefined,false);
        $('.action-btn').off('click')
        $('.action-btn').on('click',loadModalPrevious)
        // $("#dataTable-current").DataTable().row(aPos).draw(false);
    }
    });
}
function id_to_name_convertor_dept(id) {
        if(id == "1") return "Comp";
        if(id == "2") return "IT";
        if(id == "3") return "EXTC";
        if(id == "4") return "ETRX";
        if(id == "5") return "MECH";
    }

$('#nav-tab').on("click", "a", function (event) {         
  var activeTab = $(this).attr('id').split('-')[1];
  console.log(activeTab)
  if(activeTab=='current'){
      loadCurrent()
  }else if(activeTab=='upcoming'){
      loadUpcoming();
  }else if(activeTab=='previous'){
      loadPrevious()
  }
});
$("#add_course_form").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var form_serialize=form.serializeArray();// serializes the form's elements.
    form_serialize.push({ name: $("#add_course_btn").attr('name'), value: $("#add_course_btn").attr('value') });
    $("#add_course_btn").text("Adding...");
    $("#add_course_btn").attr("disabled",true);
    $.ajax({
        type: "POST",
        url: "ic_queries/addcourse_queries.php",
        data: form_serialize, 
        success: function(data)
        {
            //    alert(data); // show response from the php script.
            $("#add_course_btn").text("Added Successfully");
        }
        });
});
$("#close_add_course_form").click(function(){
    document.querySelector("#add_course_form").reset();
    $("#add_course_btn").text("Add")
    $("#add_course_btn").attr("disabled",false);
    $("#map_section").empty();
    $("#total_prev").val("0");
    $("#add_prev").hide();
})
$("#close_add_form_cross").click(function(){
    document.querySelector("#add_course_form").reset();
    $("#add_course_btn").text("Add")
    $("#add_course_btn").attr("disabled",false);
    $("#map_section").empty();
    $("#total_prev").val("0");
    $("#add_prev").hide();
})
</script>

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>
