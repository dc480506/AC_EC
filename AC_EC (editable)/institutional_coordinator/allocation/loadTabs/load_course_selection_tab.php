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
 $_SESSION['student_course_table']=$hash."_student_".$_SESSION['type'];
 mysqli_query($conn,"INSERT INTO delete_temp_tables VALUES ('".$_SESSION['course_table']."','".$timestamp."'),
        ('".$_SESSION['student_course_table']."','".$timestamp."')");
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
  for($i=1;$i<=$_SESSION['no_of_preferences'];$i++){
      $preferences.='`pref'.$i.'` varchar(15) NOT NULL DEFAULT(""),';
  }
  mysqli_query($conn,'CREATE TABLE '.$_SESSION['student_course_table'].' (
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
?>
<div class="tab-pane fade show active" id="nav-course" role="tabpanel" aria-labelledby="nav-course-tab">
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
</div>
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
                    targets: [0, 7], // column index (start from 0)
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
    function loadModalCurrent(){}
</script>
