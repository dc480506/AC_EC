<?php 

include_once('../../verify.php');
include_once('../../../config.php');
$args='["'.$_SESSION['sem'].'","'.$_SESSION['year'].'","'.$_SESSION['student_pref'].'","'.$_SESSION['student_course_table'].'","'.$_SESSION['course_allocate_info'].'","'.$_SESSION['course_table'].'","'.$_SESSION['no_of_preferences'].'","'.$servername.'","'.$username.'","'.$password.'","'.$dbname.'"]';
$cmd='python ../algorithms/'.$_SESSION['algorithm_chosen'].'_phase1.py '.$args;
// echo $cmd;
$output=shell_exec($cmd." 2>&1");
// echo $output;
?>
<div class="tab-pane fade show active" id="nav-result" role="tabpanel" aria-labelledby="nav-result-tab">
     <form class="forms-sample" method="POST" id="course_analysis">
    <table class="table table-bordered table-responsive" id="dataTable-analysis" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="select_all">
                                            <label class="custom-control-label" for="select_all"></label>
                                        </div>
                                    </th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>MIN Students</th>
                                    <th>MAX Students</th>
                                    <th>No of Students Allocated</th>
                                    <th>Allocation Status</th>
                                    <th>Course is overflow by</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>MIN Students</th>
                                    <th>MAX Students</th>
                                    <th>No of Students Allocated</th>
                                    <th>Allocation Status</th>
                                    <th>Course is overflow by</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary align-center" name="previous">Previous</button>
                        <button type="submit" class="btn btn-primary align-center" name="allocate">Next</button>
                    </div>
                </form>
            </div>
            <button id="reallocate" class="btn btn-primary align-center"><span class="text" id="reallocate_text">Reallocate</span></button>
<script type="text/javascript">
   $(document).ready(function() {
        console.log("hello")
        loadCurrent();
    });
   function loadCurrent() {
        // document.querySelector("#addCoursebtn").style.display="none"
        $('#dataTable-analysis').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            pageLength:50,
            ajax: {
                'url': '../allocation/loadInfo/course_analysis.php'
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
                    if ($("#dataTable-analysis tbody tr.selected").length != $("#dataTable-analysis tbody tr").length) {
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
                    data: 'cname'
                },
                {
                    data: 'cid'
                },
                {
                    data: 'min'
                },
                {
                    data: 'max'
                },
                {
                    data: 'no_of_allocated'
                },
                {
                    data: 'status'
                },
                {
                    data: 'no_of_hits'
                },
                {
                    data: 'action'
                },
            ],
            columnDefs: [{
                    targets: [0,8], // column index (start from 0)
                    orderable: false, // set orderable false for selected columns
                },
                {
                    className: "selectbox",
                    targets: [0]
                },
                {
                    className: "cname",
                    "targets": [1]
                },
                // { className: "cid", "targets": [ 1 ] },
                // { className: "sem", "targets": [ 2 ] },
                // { className: "dept_name", "targets": [ 3 ] },
                // { className: "dept_applicable", "targets": [ 4 ] },
                // { className: "max", "targets": [ 5 ] },
                // { className: "min", "targets": [ 6 ] }
            ],
        });
    }
    $("#select_all").click(function(e) {
        //   var row=$(this).closest('tr')
        if ($(this).is(":checked")) {
            $("#dataTable-course tbody tr").addClass("selected table-secondary");
            $(".selectrow").attr("checked", true);
        } else {
            $(".selectrow").attr("checked", false);
            $("#dataTable-course tbody tr").removeClass("selected table-secondary");
        }
        //   row.toggleClass('selected table-secondary')
    })
    function loadModalCurrent(){
        var target_row = $(this).closest("tr"); // this line did the trick
        console.log(target_row)
    // var btn=$(this);
    var aPos = $("#dataTable-analysis").dataTable().fnGetPosition(target_row.get(0)); 
    var courseData=$('#dataTable-analysis').DataTable().row(aPos).data()
    console.log(courseData)
    course_post_data={}
    course_post_data['cid']=courseData.cid.split(">")[1].split("</")[0].trim()
    course_post_data['max']=courseData.max.split(">")[1].split("</")[0].trim()
    course_post_data['min']=courseData.min.split(">")[1].split("</")[0].trim()
    course_post_data['cname']=courseData.cname.split(">")[1].split("</")[0].trim()
        
    // delete courseData.action
    console.log(course_post_data)
    // delete courseData.allocate_faculty
    var json_courseData=JSON.stringify(course_post_data)
    $.ajax({
        type: "POST",
        url: "../allocation/loadModal/select_course_modal.php",
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
            $('#delete_course').submit(function(e){
                e.preventDefault();
                var form = $(this);
                var form_serialize=form.serializeArray();// serializes the form's elements.
                form_serialize.push({ name: $("#delete_course_btn").attr('name'), value: $("#delete_course_btn").attr('value') });
                $("#delete_course_btn").text("Deleting...");
                $("#delete_course_btn").attr("disabled",true);
                $.ajax({
                    type: "POST",
                    url: "../ic_queries/update_tempcourse_queries.php",
                    data: form_serialize, 
                    success: function(data)
                    {
                        //    alert(data); // show response from the php script.
                        $("#delete_course_btn").text("Deleted Successfully");
                        var row=$("#update-del-modal").closest('tr');
                        var aPos = $("#dataTable-analysis").dataTable().fnGetPosition(row.get(0)); 
                        $('#update-del-modal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        // row.remove();
                        $("#dataTable-analysis").DataTable().row(aPos).remove().draw(false);
                        // console.log(aPos);
                        // console.log(row)
                    }
                    });
            });
            $('#update_course').submit(function(e){
                update_course(e);
                // $('#update-del-modal').modal('hide');
            });
        }
    });
    }
    function update_course(e){
    e.preventDefault();
    var form = $('#update_course');
    var form_serialize=form.serializeArray();// serializes the form's elements.
    // console.log(form_serialize)
    form_serialize.push({ name: $("#update_course_btn").attr('name'), value: $("#update_course_btn").attr('value') });
    console.log(form_serialize);
    $("#update_course_btn").text("Updating...");
    $("#update_course_btn").attr("disabled",true);
    $.ajax({
    type: "POST",
    url: "../ic_queries/update_tempcourse_queries.php",
    data: form_serialize, 
    success: function(data)
    {
        //    alert(data); // show response from the php script.
        $("#update_course_btn").text("Updated Successfully");
        var row=$("#update-del-modal").closest('tr');
        var aPos = $("#dataTable-analysis").dataTable().fnGetPosition(row.get(0));
        var temp = $("#dataTable-analysis").DataTable().row(aPos).data();
        console.log(temp)
        //console.log(form_serialize)
        var color="text-success";
        var status=temp.status.split(">")[1].split("</")[0].trim()
        //console.log('max: '+maximum+' fc: '+fc)
        if(status == "Overflow")
           { color="text-danger";}
        else if(status == "Underflow")
            {color == "text-info";}
        //console.log(color)
        temp['cid'] = '<span class="'+color+'">'+form_serialize[1].value+'</span>';
        temp['min'] = '<span class="'+color+'">'+form_serialize[2].value+'</span>';    //new values
        temp['max'] = '<span class="'+color+'">'+form_serialize[3].value+'</span>';   //new values
        //console.log(temp)
        $('#dataTable-analysis').dataTable().fnUpdate(temp,aPos,undefined,false);
        $('.action-btn').off('click')
        $('.action-btn').on('click',loadModalCurrent)
        // $("#dataTable-student").DataTable().row(aPos).draw(false);
        //$(".selectrow_course").attr("disabled",true);
    }
    });
}
</script>
                    <!-- <div class="table-responsive">
                        <br>
                        <table class="table table-bordered" id="dataTable-analysis" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>MIN Students</th>
                                    <th>MAX Students</th>
                                    <th>Department</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Action</th>
                                </tr>
                            </thead> -->
                            
                                        <!-- Button trigger modal -->
                                        <!-- <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter2">
                                            <i class="fas fa-tools"></i>
                                        </button>
 -->
                                        <!-- Modal -->
                                        <!-- <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
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
                                                        <div class="tab-content" id="nav-tabContent"> -->
                                                            <!--Deletion-->
                                                            <!-- <div class="tab-pane fade show active" id="nav-delete" role="tabpanel" aria-labelledby="nav-delete-tab">
                                                                <form action="">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect1"><b>Are you sure you want to delete?</b>
                                                                        </label>
                                                                        <br>
                                                                        <button type="submit" class="btn btn-primary" name="yes">Yes</button>
                                                                        <button type="submit" class="btn btn-secondary" name="no">No</button>
                                                                    </div>
                                                                </form>
                                                            </div> -->
                                                            <!--end Deletion-->
                                                            <!--Update-->
                                                            <!-- <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                                                                <form action="">
                                                                    <div class="form-row mt-4">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="cname"><b>Course Name</b></label>
                                                                            <input type="text" class="form-control" id="cname" name="cname" placeholder="Course Name">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="cid"><b>Course ID</b></label>
                                                                            <input type="text" class="form-control" id="cid" name="cid" placeholder="Course ID">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="year"><b>Year</b></label>
                                                                            <input type="text" class="form-control" id="year" name="year" placeholder="Year">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="semester"><b>Semester</b></label>
                                                                            <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester">
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="department"><b>Department</b></label>
                                                                            <input type="text" class="form-control" id="department" name="department" placeholder="department">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="max"><b>Max</b></label>
                                                                            <input type="number" class="form-control" id="max" name="max" placeholder="Max">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="min"><b>Min</b></label>
                                                                            <input type="number" class="form-control" id="min" name="min" placeholder="Min">
                                                                        </div>
                                                                    </div>

                                                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                                                                </form>
                                                            </div> -->
                                                            <!--Update end-->

                                                        <!-- </div>
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
                            </tbody>
                        </table>
                        <br>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-secondary align-center" name="previous">Previous</button>
                            <button type="submit" class="btn btn-primary align-center" name="allocate">Next</button>
                        </div>
                    </div> -->
                    <!--Update end-->