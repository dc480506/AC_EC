<?php 

include_once('../../verify.php');
include_once('../../../config.php');
// $sql="DELETE FROM `{$_SESSION['course_allocate_info']}` WHERE 1";
// mysqli_query($conn,$sql);
if(isset($_POST['prev_result_tab'])){
    mysqli_query($conn,"DELETE FROM `{$_SESSION['student_course_table']}` WHERE 1");
    mysqli_query($conn,"DELETE FROM `{$_SESSION['pref_percent_table']}` WHERE 1");
    mysqli_query($conn,"DELETE FROM `{$_SESSION['pref_student_alloted_table']}` WHERE 1");
    mysqli_query($conn,"DELETE FROM `{$_SESSION['course_allocate_info']}` WHERE 1");
    mysqli_query($conn,"UPDATE `{$_SESSION['student_pref']}` SET allocate_status='0' WHERE 1");
}
$args='["'.$_SESSION['sem'].'","'.$_SESSION['year'].'","'.$_SESSION['student_pref'].'","'.$_SESSION['student_course_table'].'","'.$_SESSION['course_allocate_info'].'","'.$_SESSION['course_table'].'","'.$_SESSION['course_app_dept_table'].'","'.$_SESSION['no_of_preferences'].'","'.$servername.'","'.$username.'","'.$password.'","'.$dbname.'"]';
$cmd='python ../algorithms/'.$_SESSION['algorithm_chosen'].'_phase1.py '.$args;
// echo $cmd;
$output=shell_exec($cmd." 2>&1");
// echo $output;
?>
<br>
<h5 class="font-weight-bold text-dark mb-0">
    Allocation Method: <?php
     if($_SESSION['algorithm_chosen']=="fcfs")
        echo "First Come First Serve";
     else if($_SESSION['algorithm_chosen']=="previous_sem_marks")
        echo "Previous Semester Marks";
     ?>
</h5>
<div class="tab-pane fade show active" id="nav-result" role="tabpanel" aria-labelledby="nav-result-tab">
    <br>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
    </div>
    <br>
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
                    <th>Offering Dept.</th>
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
                    <th>Offering Dept.</th>
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
        <button type="button" class="btn btn-secondary align-center" name="previous" id="prev_btn">Go Back</button>
        <button type="submit" class="btn btn-primary align-center" name="allocate" id="next_btn">Proceed</button>
        <button id="reallocate" type="button" style="display:none;" class="btn btn-primary align-center">Reallocate</button>
    </div>
</form>
            </div>
            <div id="spinner" style="display: none;">
                <label class="text-dark">Generating Final Results. This may take some time </label>
                <img src="loadTabs/ajax-loader.gif" alt="loading" id="img-spinner">
            </div>
            <div id="spinner_prev" style="display: none;">
                <label class="text-dark">Navigating to Course Selection</label>
                <img src="loadTabs/ajax-loader.gif" alt="loading" id="img-spinner">
            </div>
            <div id="spinner_reallocate" style="display: none;">
                <label class="text-dark">Regenerating Results for 1st iteration</label>
                <img src="loadTabs/ajax-loader.gif" alt="loading" id="img-spinner">
            </div>
            <style type="text/css">
                 #spinner,#spinner_prev,#spinner_reallocate{
                    position: fixed;
                    top: 50%;
                    left:50%;
                    transform: translate(-50%,-50%);
                    border: 1px solid black;
                    border-radius: 0.2em;
                    padding: 1em;
                    background-color: whitesmoke;
                }
            </style>
<script type="text/javascript">
   $(document).ready(function() {
        console.log("hello")
        loadCurrent();
    });
    var courseUpdated=false;
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
            dom: '<"d-flex justify-content-between"fBl>tip',
            buttons: [{
                extend: 'excel',
                title: `<?php 
                if($_SESSION['type']=='audit'){
                    echo "Audit-Sem-".$_SESSION['sem']."-".$_SESSION['year']."-Course-Stats";
                }
                ?>`,
                text: '<span> <i class="fas fa-download "></i> EXCEL</span>',
                className: "btn btn-outline-primary  ",
                action: newExportAction,
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6,7,8]
                }
            }, {
                extend: "pdfHtml5",
                title: `<?php 
                if($_SESSION['type']=='audit'){
                    echo "Audit-Sem-".$_SESSION['sem']."-".$_SESSION['year']."-Course-Stats";
                }
                ?>`,
                text: '<span> <i class="fas fa-download "></i> PDF</span>',
                className: "btn btn-outline-primary  mx-2",
                action: newExportAction,
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6,7,8]
                },
            }],
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
                    data: 'offering_dept'
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
                    targets: [0,9], // column index (start from 0)
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
                    url: "../allocation/update_tempcourse_queries.php",
                    data: form_serialize, 
                    success: function(data)
                    {
                        //    alert(data); // show response from the php script.
                        if(!courseUpdated){
                            courseUpdated=true
                            $("#next_btn").hide();
                            $("#reallocate").show();
                        }
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
    url: "../allocation/update_tempcourse_queries.php",
    data: form_serialize, 
    success: function(data)
    {
        //    alert(data); // show response from the php script.
        $("#update_course_btn").text("Updated Successfully");
        if(!courseUpdated){
            courseUpdated=true
            $("#next_btn").hide();
            $("#reallocate").show();
        }
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
            {color = "text-info";}
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

$("#course_analysis").submit(function(e){
        e.preventDefault();
        var form=$(this);
        form_serialize=form.serializeArray();
        console.log(form_serialize);
        $("#course_analysis").css("opacity",0.3)
        $("#nav-result-tab").removeClass("active")
        $("#nav-result-tab").addClass("disabled")
        $.ajax({
            type:"POST",
            url:"loadTabs/load_result_tab.php",
            data:form_serialize,
            beforeSend:function(){
            //Loader daalna hai baadme
            $('#spinner').show();
            $('#next_btn').attr('disabled',true);
            $('#prev_btn').attr('disabled',true);
            },
            success:function(html){
                $("#nav-final-allocate-tab").removeClass("disabled")
                $("#nav-tabContent").html(html)
                $("#nav-final-allocate-tab").addClass("active")
            },
            complete:function(){
                $('#spinner').hide();
            }
        })
    })

    // Previous Button Action
    $("#prev_btn").on("click",function(){
        $("#nav-result-tab").removeClass("active")
        $("#nav-result-tab").addClass("disabled")
        $("#course_analysis").css("opacity",0.3)
        $.ajax({
            url:'../allocation/loadTabs/load_course_selection_tab.php',
            success:function(html){
                $("#spinner_prev").hide()
                $("#nav-course-tab").removeClass("disabled")
                $("#nav-tabContent").html(html)
                $("#nav-course-tab").addClass("active")
            },
            beforeSend:function(){
            //Loader daalna hai baadme
            $('#spinner_prev').show();
            $('#next_btn').attr('disabled',true);
            $('#prev_btn').attr('disabled',true);
            $("#reallocate").attr('disabled',true);
            },
        })
    })
    // Reallocate Button Action
    $("#reallocate").on("click",function(){
        $.ajax({
            url:'../allocation/loadTabs/load_allocation_analysis_tab.php',
            success:function(html){
                $("#spinner_reallocate").hide()
                $("#nav-tabContent").html(html)
            },
            beforeSend:function(){
            //Loader daalna hai baadme
            $("#course_analysis").css("opacity",0.3)
            $('#spinner_reallocate').show();
            $('#next_btn').attr('disabled',true);
            $('#prev_btn').attr('disabled',true);
            $("#reallocate").attr('disabled',true);
            },
        })
    })
</script>