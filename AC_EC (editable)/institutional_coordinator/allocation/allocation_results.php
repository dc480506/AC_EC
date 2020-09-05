<?php
include('../../config.php');
include_once('../verify.php');
?>



<?php
include('includes/header.php');
include('includes/topbar1.php'); ?>

<?php


$sem = $_SESSION['sem'];
$year = $_SESSION['year'];
$form_id = $_SESSION['form_id'];
$program = $_SESSION['program'];
$form_course_type_ids = $_SESSION['form_course_type_ids'];
$course_type_names_sql = "select name from course_types where id in ('" . implode("','", $form_course_type_ids) . "');";
$course_type_names = array();
$result = mysqli_query($conn, $course_type_names_sql);
while ($row = mysqli_fetch_assoc($result)) {
    array_push($course_type_names, $row['name']);
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- Card Header -->
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5 class="font-weight-bold text-primary mb-0">
                        <?php
                        echo implode(",", $course_type_names) . " allocation results<br>";
                        echo "program-'$program' sem-'$sem' , year-'$year'"

                        ?>
                    </h5>
                </div>
                <style>
                    a:hover {
                        text-decoration: none;
                    }
                </style>

                <div class="col-md-4 text-right">
                    <a id="go-back" href="../prepare_form.php">
                        <button class="btn btn-danger btn-icon-split" style="width:120px">
                            <span class="icon text-white-50 pull-left">
                                <i class="fas fa-angle-double-left"></i>
                            </span>
                            <span class="text">Back</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tabb" role="tablist">
                    <a class="nav-item nav-link active" id="nav-allocated-students-tab" data-toggle="tab" href="#nav-allocated-students" role="tab" aria-controls="nav-allocated-students" aria-selected="true">Allocated</a>
                    <a class="nav-item nav-link" id="nav-filled-unallocated-students-tab" data-toggle="tab" href="#nav-filled-unallocated-students" role="tab" aria-controls="nav-filled-unallocated-students" aria-selected="true">form filled and unallocated</a>
                    <a class="nav-item nav-link" id="nav-unfilled-unallocated-students-tab" data-toggle="tab" href="#nav-unfilled-unallocated-students" role="tab" aria-controls="nav-unfilled-unallocated-students" aria-selected="true">form not filled and unallocated</a>

                </div>
            </nav>
            <div class="tab-content py-2" id="nav-tabbContent">

                <div class="tab-pane fade show active" id="nav-allocated-students" role="tabpanel" aria-labelledby="nav-allocated-students">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive" id="dataTable-current-allocate" style=" margin: 0 auto !important;" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="select_all_current_page">
                                            <label class="custom-control-label" for="select_all_current_page"></label>
                                        </div>
                                    </th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Course Name</th>
                                    <th>Course ID</th>

                                    <th>Sem</th>
                                    <th>Year</th>


                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>

                                    <th>Course Name</th>
                                    <th>Course ID</th>
                                    <th>Sem</th>
                                    <th>Year</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-filled-unallocated-students" role="tabpanel" aria-labelledby="nav-filled-unallocated-students">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive" id="dataTable-current-unallocate-filled" style="width:100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="select_all_current_page_unallocate_f">
                                            <label class="custom-control-label" for="select_all_current_page_unallocate_f"></label>
                                        </div>
                                    </th>
                                    <th>Status</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Sem</th>
                                    <th>Year</th>



                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Status</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Sem</th>
                                    <th>Year</th>

                                    <th>Action</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-unfilled-unallocated-students" role="tabpanel" aria-labelledby="nav-unfilled-unallocated-students">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive" id="dataTable-current-unallocate-notfilled" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="select_all_current_page_unallocate_nf">
                                            <label class="custom-control-label" for="select_all_current_page_unallocate_nf"></label>
                                        </div>
                                    </th>
                                    <th>Status</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Sem</th>
                                    <th>Year</th>



                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Status</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Sem</th>
                                    <th>Year</th>

                                    <th>Action</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- /.container-fluid -->
<script>
    $(document).ready(function() {
        loadCurrent_allocated();
        loadCurrent_unallocated_filled();
        loadCurrent_unallocated_notfilled();
    })

    function loadCurrent_allocated() {
        // document.querySelector("#addCoursebtn").style.display="block"
        $('#dataTable-current-allocate').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            autoWidth: true,
            serverMethod: 'post',
            aaSorting: [],
            ajax: {
                'url': '../student_allocation/current_allocation.php'
            },
            fnDrawCallback: function() {
                //$(".action-btn").on('click',loadModalUpcoming);
                //$(".allocate-btn").on('click',loadAllocateModalUpcoming);
                $(".selectrow_upcoming").attr("disabled", true);
                $("th").removeClass('selectbox_upcoming_td');
                $(".selectbox_upcoming_td").click(function(e) {
                    var row = $(this).closest('tr')
                    var checkbox = $(this).find('input');
                    checkbox.attr("checked", !checkbox.attr("checked"));
                    row.toggleClass('selected table-secondary')
                    if ($("#dataTable-upcoming tbody tr.selected").length != $("#dataTable-upcoming tbody tr").length) {
                        $("#select_all_upcoming_page").prop("checked", true)
                        $("#select_all_upcoming_page").prop("checked", false)
                    } else {
                        $("#select_all_upcoming_page").prop("checked", false)
                        $("#select_all_upcoming_page").prop("checked", true)
                    }
                })

            },
            columns: [{
                    data: 'select-cbox'
                },
                {
                    data: 'fname'
                },
                {
                    data: 'lname'
                },
                {
                    data: 'email_id'
                },


                {
                    data: 'cname'
                },
                {
                    data: 'cid'
                },
                {
                    data: 'sem'
                },
                {
                    data: 'year'
                },


                {
                    data: 'action'
                },
            ],
            columnDefs: [{
                    targets: [0, 2, 8], // column index (start from 0)
                    orderable: false, // set orderable false for selected columns
                },
                {
                    className: "selectbox_upcoming_td",
                    targets: [0]
                },
                {
                    className: "cname",
                    "targets": [1]
                },
            ]
        });
    }

    function loadCurrent_unallocated_filled() {
        // document.querySelector("#addCoursebtn").style.display="block"
        //alert("unallocated_students");
        $('#dataTable-current-unallocate-filled').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            autoWidth: false,
            ajax: {
                'url': '../student_allocation/current_unallocation_filled.php'
            },
            fnDrawCallback: function() {
                //   $(".action-btn").on('click',loadModalUpcoming);
                //   $(".allocate-btn").on('click',loadAllocateModalUpcoming);
                //   $(".selectrow_upcoming").attr("disabled",true);
                //   $("th").removeClass('selectbox_upcoming_td');
                //   $(".selectbox_upcoming_td").click(function(e){
                //       var row=$(this).closest('tr')
                //       var checkbox = $(this).find('input');
                //       checkbox.attr("checked", !checkbox.attr("checked"));
                //       row.toggleClass('selected table-secondary')
                //       if($("#dataTable-upcoming tbody tr.selected").length!=$("#dataTable-upcoming tbody tr").length){
                //         $("#select_all_upcoming_page").prop("checked",true)
                //         $("#select_all_upcoming_page").prop("checked",false)
                //       }else{
                //         $("#select_all_upcoming_page").prop("checked",false)
                //         $("#select_all_upcoming_page").prop("checked",true)
                //       }
                //   })

            },
            columns: [{
                    data: 'select-cbox'
                },
                {
                    data: 'status'
                },

                {
                    data: 'fname'
                },
                {
                    data: 'lname'
                },
                {
                    data: 'email_id'
                },
                {
                    data: 'sem'
                },
                {
                    data: 'year'
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
                    className: "selectbox_upcoming_td",
                    targets: [0]
                },
                //{ className: "cname", "targets": [ 1 ] },
            ]
        });
    }

    function loadCurrent_unallocated_notfilled() {
        // document.querySelector("#addCoursebtn").style.display="block"
        //alert("unallocated_students");
        $('#dataTable-current-unallocate-notfilled').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            ajax: {
                'url': '../student_allocation/current_unallocation_notfilled.php'
            },
            fnDrawCallback: function() {
                //$(".action-btn").on('click',loadModalUpcoming);
                //$(".allocate-btn").on('click',loadAllocateModalUpcoming);
                //$(".selectrow_upcoming").attr("disabled",true);
                //$("th").removeClass('selectbox_upcoming_td');
                /*$(".selectbox_upcoming_td").click(function(e){
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
                })*/

            },
            columns: [{
                    data: 'select-cbox'
                },
                {
                    data: 'status'
                },

                {
                    data: 'fname'
                },
                {
                    data: 'lname'
                },
                {
                    data: 'email_id'
                },
                {
                    data: 'sem'
                },
                {
                    data: 'year'
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
                    className: "selectbox_upcoming_td",
                    targets: [0]
                },
                //{ className: "cname", "targets": [ 1 ] },
            ]
        });
    }
</script>
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>