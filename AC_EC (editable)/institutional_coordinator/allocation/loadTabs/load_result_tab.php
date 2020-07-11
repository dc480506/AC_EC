<?php
include_once('../../verify.php');
include_once('../../../config.php');
$args = '["' . $_SESSION['sem'] . '","' . $_SESSION['year'] . '","' . $_SESSION['student_pref'] . '","' . $_SESSION['student_course_table'] . '","' . $_SESSION['course_allocate_info'] . '","' . $_SESSION['course_table'] . '","' . $_SESSION['pref_percent_table'] . '","' . $_SESSION['pref_student_alloted_table'] . '","' . $_SESSION['course_app_dept_table'] . '","' . $_SESSION['no_of_preferences'] . '","' . $servername . '","' . $username . '","' . $password . '","' . $dbname . '","' . $_SESSION['program'] . '"]';
$cmd = 'python ../algorithms/' . $_SESSION['algorithm_chosen'] . '.py ' . $args;
// echo $cmd;
$output = shell_exec($cmd . " 2>&1");

?>
<style>
    .accordion-toggle {
        cursor: pointer;
    }

    .accordion-toggle:hover {
        background-color: #ffcccc;
    }

    .accordion-toggle.open {
        background-color: #ffcccc;
    }

    #spinner_prev,
    #spinner-complete {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 1px solid black;
        border-radius: 0.2em;
        padding: 1em;
        background-color: whitesmoke;
    }
</style>
<br>
<h5 class="font-weight-bold text-dark mb-0">
    Allocation Method: <?php
                        if ($_SESSION['algorithm_chosen'] == "fcfs")
                            echo "First Come First Serve";
                        else if ($_SESSION['algorithm_chosen'] == "previous_sem_marks")
                            echo "Previous Semester Marks";
                        ?>
</h5>
<div class="tab-pane fade show active" id="nav-final-allocate" role="tabpanel" aria-labelledby="nav-final-allocate-tab">
    <br>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
    </div>
    <br>
    <form id="complete_allocation" method="POST">
        <div class="accordion-container" id="final_allocation_accordion">

            <div class="card-header accordion-toggle open" id="pref_percent_stats">
                <h2 class="mb-0">
                    <button class="btn btn-link accordion-div" type="button">
                        <h5 class="font-weight-bold text-primary mb-0">Preference-Wise Allotment Stats</h5>
                    </button>
                </h2>
            </div>

            <div id="pref_percent_stats_div" class="collapse show" aria-labelledby="pref_percent_stats" data-parent="#final_allocation_accordion">
                <div class="card-body">
                    <?php
                    include_once('../../../config.php');
                    $sql = "SELECT COUNT(*) as total FROM {$_SESSION['student_pref']}";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $totalResponses = $row['total'];
                    $sql = "SELECT COUNT(*) as allocated FROM {$_SESSION['student_course_table']}";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $allocated = $row['allocated'];
                    $unallocated = $totalResponses - $allocated;
                    echo '
                        <div class="row align-items-center">
                            <div class="col text-left">
                                <h6 class="font-weight-bold text-dark mb-0">
                                    Total Responses Collected: ' . $totalResponses . '
                                </h6>
                            </div>
                            <div class="col text-left">
                                <h6 class="font-weight-bold text-success mb-0">
                                    No. of Students Allocated: ' . $allocated . ' (' . round($allocated * 100 / $totalResponses, 2) . '%)
                                </h6>
                            </div>
                            <div class="col text-left">
                                <h6 class="font-weight-bold text-danger mb-0">
                                    No. of Students Unallocated: ' . $unallocated . ' (' . round($unallocated * 100 / $totalResponses, 2) . '%)
                                </h6>
                            </div>
                        </div>
                        ';
                    ?>
                    <style>
                        .text-success {
                            color: #2ecc71 !important;
                        }
                    </style>
                    <??>
                    <div class="container">
                        <div class="row ">
                            <div class="col-lg-5 col-md-5">
                                <div class="table-responsive">
                                    <br>
                                    <table class="table table-bordered" id="dataTable-pref-percent" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Preference No</th>
                                                <th>No. of Students Allotted</th>
                                                <th>Percentage of Students Allotted</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="card-body" id="chart-canvas-div" style="position:relative;top:50%;transform:translateY(-50%)">
                                    <!-- <canvas id='chart'></canvas> -->
                                    <div id="chart-spinner" style="top:50%;left:50%;position:relative">
                                        <label><b>Loading Chart </b></label>
                                        <img src="loadTabs/ajax-loader.gif" alt="loading" id="img-spinner">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header accordion-toggle" id="unallocated_students">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed accordion-div" type="button">
                        <h5 class="font-weight-bold text-primary mb-0"> Unallocated Students Info</h5>
                    </button>
                </h2>
            </div>
            <div id="unallocated_students_div" class="collapse" aria-labelledby="unallocated_students" data-parent="#final_allocation_accordion">
                <div class="card-body">
                    <div class="table-responsive">
                        <br>
                        <table class="table table-bordered" id="dataTable-unallocated" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Email ID</th>
                                    <th>Roll No</th>
                                    <th>Full Name</th>
                                    <th>Student's Dept.</th>
                                    <?php
                                    if ($_SESSION['algorithm_chosen'] == 'previous_sem_marks') {
                                        echo '<th>GPA</th>';
                                    }
                                    ?>
                                    <th>Timestamp</th>
                                    <th>Allocate</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Email ID</th>
                                    <th>Roll No</th>
                                    <th>Full Name</th>
                                    <th>Student's Dept.</th>
                                    <?php
                                    if ($_SESSION['algorithm_chosen'] == 'previous_sem_marks') {
                                        echo '<th>GPA</th>';
                                    }
                                    ?>
                                    <th>Timestamp</th>
                                    <th>Allocate</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card-header accordion-toggle" id="allocated_students">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed accordion-div" type="button">
                        <h5 class="font-weight-bold text-primary mb-0"> Allocated Students Info</h5>
                    </button>
                </h2>
            </div>
            <div id="allocated_students_div" class="collapse" aria-labelledby="allocated_students" data-parent="#final_allocation_accordion">
                <div class="card-body">
                    <div class="table-responsive">
                        <br>
                        <table class="table table-bordered" id="dataTable-allocated" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Email ID</th>
                                    <th>Roll No</th>
                                    <th>Full Name</th>
                                    <th>Student's Dept.</th>
                                    <?php
                                    if ($_SESSION['algorithm_chosen'] == 'previous_sem_marks') {
                                        echo '<th>GPA</th>';
                                    }
                                    ?>
                                    <th>Timestamp</th>
                                    <th>Pref No Allotted</th>
                                    <th>Allocated Course</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Email ID</th>
                                    <th>Roll No</th>
                                    <th>Full Name</th>
                                    <th>Student's Dept.</th>
                                    <?php
                                    if ($_SESSION['algorithm_chosen'] == 'previous_sem_marks') {
                                        echo '<th>GPA</th>';
                                    }
                                    ?>
                                    <th>Timestamp</th>
                                    <th>Pref No Allotted</th>
                                    <th>Allocated Course</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card-header accordion-toggle" id="course">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed accordion-div" type="button">
                        <h5 class="font-weight-bold text-primary mb-0"> Course Status</h5>
                    </button>
                </h2>
            </div>
            <div id="course_div" class="collapse" aria-labelledby="course" data-parent="#final_allocation_accordion">
                <br>
                <div class="custom-control custom-switch" style="float: right;">
                    <input type="checkbox" class="custom-control-input" id="show_all_course_analysis">
                    <label class="custom-control-label" for="show_all_course_analysis"><b>View All Courses Analysis</b></label>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <br>
                        <table class="table table-bordered" id="dataTable-courses" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Offering Dept.</th>
                                    <th>Min</th>
                                    <th>Max</th>
                                    <th>No of Students Allocated</th>
                                    <th>View Analysis</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Offering Dept.</th>
                                    <th>Min</th>
                                    <th>Max</th>
                                    <th>No of Students Allocated</th>
                                    <th>View Analysis</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="modal-footer">

            <button type="button" class="btn btn-secondary align-center" id="prev_btn" name="previous">Previous</button>
            <button type="submit" class="btn btn-primary align-center" id="complete_btn" name="Complete">Complete</button>
        </div>
    </form>
    <div id="spinner_prev" style="display: none;">
        <label class="text-dark">Navigating to 1st Iteration Allocation Analysis</label>
        <img src="loadTabs/ajax-loader.gif" alt="loading" id="img-spinner">
    </div>

    <div id="spinner-complete" style="display: none;">
        <label class="text-dark">generating reports and finalizing allocation</label>
        <img src="loadTabs/ajax-loader.gif" alt="loading" id="img-spinner">
    </div>
</div>
<script>
    // $("#spinner").show();
    var unallocated_loaded = false;
    var allocated_loaded = false;
    $(".accordion-toggle").on("click", function() {
        console.log($(this).next());
        $(this).toggleClass("open");
        $(this).next().slideToggle(200);
        $(this).next().toggleClass('show');
    })
    $("#dataTable-pref-percent").DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        serverMethod: 'post',
        searching: false,
        aaSorting: [],
        lengthChange: false,
        info: false,
        "bPaginate": false,
        // pageLength:50,
        ajax: {
            'url': '../allocation/loadInfo/result_tab/pref_percent_stats.php'
        },
        columns: [{
                data: 'pref_no'
            },
            {
                data: 'no_of_stu'
            },
            {
                data: 'percent'
            },
        ],
    })

    function loadChart() {
        var unallocated = <?php echo $unallocated . ";"; ?>
        $.ajax({
            url: '../allocation/loadInfo/result_tab/loadChart.php',
            type: 'POST',
            data: "unallocated=" + unallocated,
            success: function(response) {
                $("#chart-spinner").hide();
                $("#chart-canvas-div").html(response);
            }
        })
    }
    loadChart();

    function loadUnallocated() {
        if (!unallocated_loaded) {
            unallocated_loaded = true;
            $("#dataTable-unallocated").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                serverMethod: 'post',
                aaSorting: [],
                ajax: {
                    'url': '../allocation/loadInfo/result_tab/unallocated_students.php'
                },
                fnDrawCallback: function() {
                    // $(".action-btn").on('click', loadModalCurrent)
                    // $(".selectrow").attr("disabled", true);
                    // $("th").removeClass('selectbox');
                    // $(".selectbox").click(function(e) {
                    //     var row = $(this).closest('tr')
                    //     var checkbox = $(this).find('input');
                    //     console.log(checkbox);
                    //     checkbox.attr("checked", !checkbox.attr("checked"));
                    //     row.toggleClass('selected table-secondary')
                    //     if ($("#dataTable-course tbody tr.selected").length != $("#dataTable-course tbody tr").length) {
                    //         $("#select_all").prop("checked", true)
                    //         $("#select_all").prop("checked", false)
                    //     } else {
                    //         $("#select_all").prop("checked", false)
                    //         $("#select_all").prop("checked", true)
                    //     }
                    // })
                },
                columns: [{
                        data: 'email_id'
                    },
                    {
                        data: 'rollno'
                    },
                    {
                        data: 'fullname'
                    },
                    {
                        data: 'dept_name'
                    },
                    <?php
                    if ($_SESSION['algorithm_chosen'] == 'previous_sem_marks') {
                        echo "
                        {
                            data: 'gpa'
                        }";
                    }
                    ?>,
                    {
                        data: 'timestamp'
                    },
                    {
                        data: 'action'
                    },
                ],
                columnDefs: [{
                        orderable: false,
                        targets: <?php
                                    if ($_SESSION['algorithm_chosen'] == 'previous_sem_marks') {
                                        echo "
                      [3,6],
                    ";
                                    } else {
                                        echo "
                     [3,5],
                    ";
                                    }
                                    ?>
                        // set orderable false for selected columns
                        // column index (start from 0)
                    },
                    {
                        className: "email_id",
                        "targets": [0]
                    },

                ],
            })
        }
    }
    loadUnallocated();

    function loadAllocated() {
        $("#dataTable-allocated").DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            ajax: {
                'url': '../allocation/loadInfo/result_tab/allocated_students.php'
            },
            columns: [{
                    data: 'email_id'
                },
                {
                    data: 'rollno'
                },
                {
                    data: 'fullname'
                },
                {
                    data: 'dept_name'
                },
                <?php
                if ($_SESSION['algorithm_chosen'] == 'previous_sem_marks') {
                    echo "
                        {
                            data: 'gpa'
                        }";
                }
                ?>,
                {
                    data: 'timestamp'
                },
                {
                    data: 'pref_no_allotted'
                },
                {
                    data: 'allocated_course'
                },
            ],
            columnDefs: [{
                    targets: [], // column index (start from 0)
                    orderable: false, // set orderable false for selected columns
                },
                {
                    className: "email_id",
                    "targets": [0]
                },

            ],
        })
    }
    loadAllocated();

    function loadCourses() {
        $("#dataTable-courses").DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            dom: '<"d-flex justify-content-between"fBl>tip',
            buttons: [{
                extend: 'excel',
                title: `<?php
                        if ($_SESSION['type'] == 'audit') {
                            echo "Audit-Sem-" . $_SESSION['sem'] . "-" . $_SESSION['year'] . "-Final-Allocation-Course-Stats";
                        }
                        ?>`,
                text: '<span> <i class="fas fa-download "></i> EXCEL</span>',
                className: "btn btn-outline-primary  ",
                action: newExportAction,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            }, {
                extend: "pdfHtml5",
                title: `<?php
                        if ($_SESSION['type'] == 'audit') {
                            echo "Audit-Sem-" . $_SESSION['sem'] . "-" . $_SESSION['year'] . "-Final-Allocation-Course-Stats";
                        }
                        ?>`,
                text: '<span> <i class="fas fa-download "></i> PDF</span>',
                className: "btn btn-outline-primary  mx-2",
                action: newExportAction,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                },
            }],
            ajax: {
                'url': '../allocation/loadInfo/result_tab/course_status.php'
            },
            columns: [{
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
                    data: 'view_analysis'
                }
            ],
            columnDefs: [{
                    targets: [6], // column index (start from 0)
                    orderable: false, // set orderable false for selected columns
                },
                {
                    className: "view_analysis",
                    "targets": [6]
                },
            ],
        })
    }
    loadCourses();

    // Additional Info Section
    $("#dataTable-allocated").on('click', 'td.email_id', function() {
        var tr = $(this).closest('tr');
        var row = $("#dataTable-allocated").DataTable().row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown table-warning');
        } else {
            // Open this row
            var data = {}
            data['email_id'] = row.data()['email_id'].split(">")[1].split("<")[0];
            data_json = JSON.stringify(data)
            console.log(data_json)
            $.ajax({
                type: "POST",
                url: "../allocation/loadInfo/result_tab/loadAdditionalInfo/additional_info_response.php",
                data: data_json,
                success: function(response) {
                    row.child(response).show();
                    tr.addClass('shown table-warning');
                }
            });
            // row.child("<b>Hello</b>").show();
        }
    })
    $("#dataTable-unallocated").on('click', 'td.email_id', function() {
        var tr = $(this).closest('tr');
        var row = $("#dataTable-unallocated").DataTable().row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown table-warning');
        } else {
            // Open this row
            var data = {}
            data['email_id'] = row.data()['email_id'].split(">")[1].split("<")[0];
            data_json = JSON.stringify(data)
            console.log(data_json)
            $.ajax({
                type: "POST",
                url: "../allocation/loadInfo/result_tab/loadAdditionalInfo/additional_info_response.php",
                data: data_json,
                success: function(response) {
                    row.child(response).show();
                    tr.addClass('shown table-warning');
                }
            });
            // row.child("<b>Hello</b>").show();
        }
    })

    $("#dataTable-courses").on('click', 'td.view_analysis', function() {
        var tr = $(this).closest('tr');
        var row = $("#dataTable-courses").DataTable().row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown table-warning');
        } else {
            // Open this row
            var data = {}
            data['cid'] = row.data()['cid'].split(">")[1].split("<")[0];
            data_json = JSON.stringify(data)
            console.log(data_json)
            $.ajax({
                type: "POST",
                url: "../allocation/loadInfo/result_tab/loadAdditionalInfo/additional_info_course.php",
                data: data_json,
                success: function(response) {
                    row.child(response).show();
                    tr.addClass('shown table-warning');
                }
            });
            // row.child("<b>Hello</b>").show();
        }
    })
    // $("#show_all_course_analysis").on('change',function(){
    //     var rows=$("#dataTable-courses tbody tr")
    //     console.log(rows)
    //     if($(this).is(':checked')){

    //     }else{
    //     try{
    //         $("#dataTable-courses tbody tr").child.hide()
    //     }catch(err){

    //     }
    //         $("#dataTable-courses tbody tr").removeClass('shown table-warning')

    //     }
    // })
    $("#complete_allocation").submit(function(e) {
        e.preventDefault();
        $("#nav-final-allocate-tab").removeClass("active")
        $("#nav-final-allocate-tab").addClass("disabled")
        // $("body").css("opacity",'0.5')
        data_serialize = "prev_result_tab=1"
        $.ajax({
            // url:'../allocation/loadPreviousTabs/load_allocation_analysis_tab_previous.php',
            url: 'complete_allocation.php',
            data: data_serialize,
            method: "POST",
            success: function(html) {
                $("#spinner-complete").hide()
                $("#nav-final-allocate-tab").removeClass("disabled")
                $("#nav-tabContent").html(html)
                $("#nav-final-allocate-tab").addClass("active")
            },
            beforeSend: function() {
                //Loader daalna hai baadme
                $("#complete_allocation").css("opacity", 0.3)
                $('#spinner-complete').show();
                $('#complete_btn').attr('disabled', true);
                $('#prev_btn').attr('disabled', true);
            },
        })
        // $("#complete_allocation").css("opacity", 0.3)
        // $('#spinner_prev').show();
        // $('#complete_btn').attr('disabled', true);
        // $('#prev_btn').attr('disabled', true);
    })
    // Previous Button Action
    $("#prev_btn").on("click", function() {
        $("#nav-final-allocate-tab").removeClass("active")
        $("#nav-final-allocate-tab").addClass("disabled")
        // $("body").css("opacity",'0.5')
        data_serialize = "prev_result_tab=1"
        $.ajax({
            // url:'../allocation/loadPreviousTabs/load_allocation_analysis_tab_previous.php',
            url: '../allocation/loadTabs/load_allocation_analysis_tab.php',
            data: data_serialize,
            method: "POST",
            success: function(html) {
                $("#spinner_prev").hide()
                $("#nav-result-tab").removeClass("disabled")
                $("#nav-tabContent").html(html)
                $("#nav-result-tab").addClass("active")
            },
            beforeSend: function() {
                //Loader daalna hai baadme
                $("#complete_allocation").css("opacity", 0.3)
                $('#spinner_prev').show();
                $('#complete_btn').attr('disabled', true);
                $('#prev_btn').attr('disabled', true);
            },
        })
    })
</script>
<!--Update end-->