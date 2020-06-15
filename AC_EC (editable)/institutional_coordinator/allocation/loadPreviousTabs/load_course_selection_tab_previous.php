<?php
//SELECT CONCAT('DROP TABLE `',t.table_name,'`;') AS stmt FROM delete_temp_tables as t (For cron)

 include_once('../../verify.php');
 include_once('../../../config.php');
 mysqli_query($conn,"DELETE FROM `{$_SESSION['course_allocate_info']}` WHERE 1");
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
<div class="tab-pane fade show active" id="nav-course" role="tabpanel" aria-labelledby="nav-course-tab">
    <br>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
    </div>
    <br>
     <form class="forms-sample" method="POST" id="course_selection">
    <table class="table table-bordered table-responsive" id="dataTable-course" width="100%" cellspacing="0">
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
                                    <th>1st Preference %</th>
                                    <th>1st Preference Count</th>
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
                                    <th>1st Preference %</th>
                                    <th>1st Preference Count</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary align-center" name="previous" id="prev_btn">Go Back</button>
                        <button type="submit" class="btn btn-primary align-center" id="next_btn" name="allocate">Proceed</button>
                    </div>
                </form>
            </div>
            <div id="spinner" style="display: none;">
                <img src="loadTabs/ajax-loader.gif" alt="loading" id="img-spinner">
            </div>
            <style type="text/css">
                #spinner{
                    position: fixed;
                    top: 50%;
                    left:50%;
                }
            </style>
<script type="text/javascript">
   $(document).ready(function() {
        loadCurrent();
    });
   function loadCurrent() {
        // document.querySelector("#addCoursebtn").style.display="none"
        $('#dataTable-course').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            pageLength:50,
            ajax: {
                'url': '../allocation/loadInfo/select_course.php'
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
                    if ($("#dataTable-course tbody tr.selected").length != $("#dataTable-course tbody tr").length) {
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
                    data: 'firstpercent'
                },
                {
                    data: 'firstcount'
                },
                {
                    data: 'action'
                },
            ],
            columnDefs: [{
                    targets: [0,7], // column index (start from 0)
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
    var aPos = $("#dataTable-course").dataTable().fnGetPosition(target_row.get(0)); 
    var courseData=$('#dataTable-course').DataTable().row(aPos).data()
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
                        var aPos = $("#dataTable-course").dataTable().fnGetPosition(row.get(0)); 
                        $('#update-del-modal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        // row.remove();
                        $("#dataTable-course").DataTable().row(aPos).remove().draw(false);
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
        var aPos = $("#dataTable-course").dataTable().fnGetPosition(row.get(0));
        var temp = $("#dataTable-course").DataTable().row(aPos).data();
        console.log(temp)
        //console.log(form_serialize)
        var color="text-success";
        var maximum=form_serialize[3].value
        var fc=temp.firstcount.split(">")[1].split("</")[0].trim()
        var fp=temp.firstpercent.split(">")[1].split("</")[0].trim()
        var name=temp.cname.split(">")[1].split("</")[0].trim()
        //console.log('max: '+maximum+' fc: '+fc)
        if(parseInt(maximum)<parseInt(fc))
           { color="text-danger";}
        //console.log(color)
        temp['cid'] = '<span class="'+color+'">'+form_serialize[1].value+'</span>';
        temp['min'] = '<span class="'+color+'">'+form_serialize[2].value+'</span>';    //new values
        temp['max'] = '<span class="'+color+'">'+form_serialize[3].value+'</span>';
        temp['cname']= '<span class="'+color+'">'+name+'</span>';   //new values
        temp['firstcount']='<span class="'+color+'">'+fc+'</span>';
        temp['firstpercent']='<span class="'+color+'">'+fp+'</span>';
        //console.log(temp)
        $('#dataTable-course').dataTable().fnUpdate(temp,aPos,undefined,false);
        $('.action-btn').off('click')
        $('.action-btn').on('click',loadModalCurrent)
        // $("#dataTable-student").DataTable().row(aPos).draw(false);
        //$(".selectrow_course").attr("disabled",true);
    }
    });
}
$("#course_selection").submit(function(e){
        e.preventDefault();
        var form=$(this);
        form_serialize=form.serializeArray();
        console.log(form_serialize);
        $("#nav-course-tab").removeClass("active")
        $("#nav-course-tab").addClass("disabled")
        $("#course_selection").css("opacity",0.3)
        $.ajax({
            type:"POST",
            url:"loadTabs/load_allocation_analysis_tab.php",
            data:form_serialize,
            beforeSend:function(){
            //Loader daalna hai baadme
            $('#spinner').show();
            $('#next_btn').attr('disabled',true);
            $('#prev_btn').attr('disabled',true);
            },
            success:function(html){
                $("#nav-result-tab").removeClass("disabled")
                $("#nav-tabContent").html(html)
                $("#nav-result-tab").addClass("active")
            },
            complete:function(){
                $('#spinner').hide();
            }
        })
    })
    // Previous Button Action
    $("#prev_btn").on("click",function(){
        $("#nav-course-tab").removeClass("active")
        $("#nav-course-tab").addClass("disabled")
        $.ajax({
            url:'../allocation/loadPreviousTabs/load_allocation_method_tab_previous.php',
            success:function(html){
                $("#spinner").hide()
                $("#nav-allocate-method-tab").removeClass("disabled")
                $("#nav-tabContent").html(html)
                $("#nav-allocate-method-tab").addClass("active")
            },
            beforeSend:function(){
            //Loader daalna hai baadme
            $("#course_selection").css("opacity",0.3)
            $('#spinner').show();
            $('#next_btn').attr('disabled',true);
            $('#prev_btn').attr('disabled',true);
            },
        })
    })
</script>
