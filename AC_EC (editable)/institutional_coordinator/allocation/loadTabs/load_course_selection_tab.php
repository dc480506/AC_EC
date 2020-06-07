<?php
//SELECT CONCAT('DROP TABLE `',t.table_name,'`;') AS stmt FROM delete_temp_tables as t (For cron)

 include_once('../../verify.php');
 include_once('../../../config.php');
 $_SESSION['algorithm_chosen']=$_POST['algo_selection'];
 $time=time();
 $hash=substr(hash_hmac('sha256', $time, $hash_key),0,6);
 $timestamp=date("Y-m-d H:i:s");
 $_SESSION['course_table']=$hash."_".$_SESSION['type']."_course";
//  echo $_SESSION['course_table'];
 $_SESSION['student_pref']=$hash."_student_pref_".$_SESSION['type'];
 $_SESSION['student_course_table']=$hash."_student_".$_SESSION['type'];
 $_SESSION['course_allocate_info']=$hash."_".$_SESSION['type']."_course_info";
 mysqli_query($conn,"INSERT INTO delete_temp_tables VALUES ('".$_SESSION['course_table']."','".$timestamp."'),
        ('".$_SESSION['student_pref']."','".$timestamp."'),('".$_SESSION['student_course_table']."','".$timestamp."'),('".$_SESSION['course_allocate_info']."','".$timestamp."')");
 $result=mysqli_query($conn,'CREATE TABLE '.$_SESSION['course_table'].' (
    `cid` varchar(30) NOT NULL,
    `sem` int(11) NOT NULL,
    `year` varchar(8) NOT NULL,
    `cname` varchar(50) NOT NULL,
    `currently_active` tinyint(4) NOT NULL DEFAULT 0,
    `min` int(11) NOT NULL,
    `max` int(11) NOT NULL,
    `no_of_allocated` int(11) NOT NULL DEFAULT 0,
    `email_id` varchar(50) NOT NULL,
    `timestamp` varchar(30) NOT NULL,
    PRIMARY KEY(cid,sem,year)
  )');
//   echo $result." yo";
  $preferences="";
  $pref="";
  for($i=1;$i<=$_SESSION['no_of_preferences'];$i++){
      $preferences.='`pref'.$i.'` varchar(15) NOT NULL DEFAULT(""),';
      if($i!=$_SESSION['no_of_preferences'])
      {
        $pref.='`pref'.$i.'`,';
      }
    }
  $pref.='`pref'.$_SESSION['no_of_preferences'].'`';
  mysqli_query($conn,'CREATE TABLE '.$_SESSION['student_pref'].' (
    `email_id` varchar(50) NOT NULL,
    `sem` int(11) NOT NULL,
    `year` varchar(8) NOT NULL,
    `rollno` varchar(20) NOT NULL,
    `timestamp` varchar(30) NOT NULL,
    `allocate_status` tinyint(4) NOT NULL DEFAULT 0,
    `no_of_valid_preferences` int(11) NOT NULL,
    '.$preferences.'
    PRIMARY KEY(email_id,sem,year)
  )');
  mysqli_query($conn,'INSERT INTO '.$_SESSION['course_table'].
  ' (`cid`, `sem`, `year`, `cname`, `currently_active`, `min`, `max`, `no_of_allocated`, `email_id`, `timestamp`)
  SELECT cid,sem,year,cname,currently_active,min,max,no_of_allocated,email_id,timestamp 
  FROM '.$_SESSION['type'].'_course WHERE sem="'.$_SESSION['sem'].'" AND year="'.$_SESSION['year'].'"
  ');
  mysqli_query($conn,'CREATE TABLE '.$_SESSION['student_course_table'].'(
    `email_id` varchar(50) NOT NULL,
    `cid` varchar(30) NOT NULL,
    `sem` int(11) NOT NULL,
    `year` varchar(8) NOT NULL,
    PRIMARY KEY (email_id,sem,year)
)');
  mysqli_query($conn,'CREATE TABLE '.$_SESSION['course_allocate_info'].'(
    `cid` varchar(30) NOT NULL,
    `sem` int(11) NOT NULL,
    `year` varchar(8) NOT NULL,
    `status` varchar(2) NOT NULL,
    `no_of_hits` int(11) NOT NULL,
    PRIMARY KEY(cid,sem,year)
)');
  mysqli_query($conn,'INSERT INTO '.$_SESSION['student_pref'].'(`email_id`,`sem`,`year`,`rollno`,`timestamp`,`allocate_status`,`no_of_valid_preferences`,'.$pref.') SELECT email_id,sem,year,rollno,timestamp,allocate_status,no_of_valid_preferences,'.$pref.' FROM student_preference_'.$_SESSION['type'].' WHERE sem="'.$_SESSION['sem'].'" AND year="'.$_SESSION['year'].'"');
?>
<div class="tab-pane fade show active" id="nav-course" role="tabpanel" aria-labelledby="nav-course-tab">
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
                        <button type="submit" class="btn btn-secondary align-center" name="previous">Previous</button>
                        <button type="submit" class="btn btn-primary align-center" name="allocate">Next</button>
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
        $.ajax({
            type:"POST",
            url:"loadTabs/load_allocation_analysis_tab.php",
            data:form_serialize,
            beforeSend:function(){
            //Loader daalna hai baadme
            $('#spinner').show;
            },
            success:function(html){
                $("#nav-result-tab").removeClass("disabled")
                $("#nav-tabContent").html(html)
                $("#nav-result-tab").addClass("active")
            },
            complete:function(){
                $('#spinner').hide;
            }
        })
    })
</script>
