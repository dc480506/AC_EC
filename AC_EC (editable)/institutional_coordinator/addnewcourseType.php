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

                <div class="col" id="addCurrentCoursebtn" style="display:block">
                    <h4 class="font-weight-bold text-primary mb-0">Add new course <i class="fas fa-book-open"></i></h4>
                    <br>
                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#addCourseType">
                        <i class="ni ni-fat-add">&nbsp;</i>+ &nbsp;Add Course
                    </button>

                </div>

                <div class="modal fade" id="addCourseType" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                <form class="forms-sample" id='add_new_course_type_form'>

                                    <div class="form-group">
                                        <label for="courseType"><b>Course Type</b></label>
                                        <input type="text" class="form-control" required id="courseType" name="courseTypeName" placeholder="Course Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="program"><b>Program</b></label>
                                        <select class="form-control" id="program" name="program" required>
                                            <option value="UG">UG</option>
                                            <option value="PG">PG</option>
                                            <option value="PHD">PHD</option>
                                        </select>
                                        <!-- <span id="add_upcoming_cid_error" class="text-danger"></span> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="close_add_new_course_form" data-dismiss="modal" name="close">Close</button>
                                        <button type="submit" id="add_new_course_btn" class="btn btn-primary" name="add_new_course_type">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editCourseType" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Course</h5>
                                <button type="button" class="close" id="close_add_form_cross" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Table -->

                                <!-- <form class="forms-sample" method="POST" action="ic_queries/addcourse_queries.php"> -->
                                <form class="forms-sample" id='edit_course_type_form'>
                                    <input type="text" class="form-control" required id="courseTypeId" name="courseTypeId" hidden>
                                    <div class="form-group">
                                        <label for="courseType"><b>Course Type</b></label>
                                        <input type="text" class="form-control" required id="courseTypeName" name="courseTypeName" placeholder="Course Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="program"><b>Program</b></label>
                                        <select disabled class="form-control" id="program" name="program" required>
                                            <option value="UG">UG</option>
                                            <option value="PG">PG</option>
                                            <option value="PHD">PHD</option>
                                        </select>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="close_edit_course_form" data-dismiss="modal" name="close">Close</button>
                                        <button type="submit" id="edit_course_btn" class="btn btn-primary" name="edit_course_type">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h4 class="font-weight-bold text-primary mb-0">Existing course types</h4>
                <br>
                <div class="table-responsive">
                    <table style=" margin: 0 auto !important;" class="table table-bordered table-responsive" id="dataTable-coursetypes" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="select_all">
                                        <label class="custom-control-label" for="select_all"></label>
                                    </div>
                                </th>
                                <th>id</th>
                                <th>Course Type</th>
                                <th>Program</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>id</th>
                                <th>Course Type</th>
                                <th>Program</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- </div> -->
                </div>

            </div>
            <br>
            <br>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(e) {
        loadCurrent();
    })
    $("#add_new_course_type_form").submit(function(e) {
        e.preventDefault();
        const form = $(this).serializeArray();
        form.push({
            name: "add_new_course_type",
            value: "true"
        });
        $.ajax({
            method: "POST",
            data: form,
            url: "ic_queries/addcourse_type_queries.php",
            success: function(data) {
                if (data == "added") {
                    $("#addCourseType").modal("hide");
                    loadCurrent();
                } else {
                    window.alert("data");
                }
            },
            error: function(err) {
                window.alert("something went wrong");
            }
        })

    });

    function deleteCourseType() {
        var confirm = window.confirm("Are you sure you want to delete ?")
        if (confirm) {

            var target_row = $(this).closest("tr");

            var aPos = $("#dataTable-coursetypes").dataTable().fnGetPosition(target_row.get(0));
            var courseTypeData = $('#dataTable-coursetypes').DataTable().row(aPos).data();
            courseTypeData['delete_course_type'] = true;
            $.ajax({
                method: "POST",
                data: courseTypeData,
                url: "ic_queries/addcourse_type_queries.php",
                success: function(data) {

                    if (data == "deleted") {
                        loadCurrent();
                    } else {
                        window.alert(data);
                    }
                },
                error: function(err) {
                    window.alert("something went wrong");
                }
            })
        }
    }

    function loadEditModal() {
        console.log("abcd")
        var target_row = $(this).closest("tr");
        var aPos = $("#dataTable-coursetypes").dataTable().fnGetPosition(target_row.get(0));
        var courseTypeData = $('#dataTable-coursetypes').DataTable().row(aPos).data();
        $("#edit_course_type_form #courseTypeName").val(courseTypeData.name)
        $("#edit_course_type_form #courseTypeId").val(courseTypeData.course_type_id)
        $("#edit_course_type_form #program").val(courseTypeData.program);
        $("#edit_course_type_form").submit(editCourseType);
        $('#editCourseType').modal("show");
    }

    function editCourseType(e) {
        e.preventDefault();
        const form = $(this).serializeArray();
        form.push({
            name: "edit_course_type",
            value: "true"
        });
        $.ajax({
            method: "POST",
            data: form,
            url: "ic_queries/addcourse_type_queries.php",
            success: function(data) {
                if (data == "edited") {
                    $("#editCourseType").modal("hide");
                    loadCurrent();
                } else {
                    window.alert(data);
                }
            },
            error: function(err) {
                window.alert("something went wrong");
            }
        })

        $(this).unbind(e);
    }

    function loadCurrent() {
        $('#dataTable-coursetypes').DataTable({
            serverSide: true,
            processing: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],

            ajax: {
                'url': 'ic_queries/addcourse_type_queries.php',
                "data": function(d) {
                    d.get_course_types = "true";
                    return d;
                }
            },
            fnDrawCallback: function() {
                console.log('aaa');
                $(".edit-button").on('click', loadEditModal)
                $(".delete-button").on('click', deleteCourseType);
                // $(".selectrow").attr("disabled", true);
                // $("th").removeClass('selectbox');
                $(".selectbox").click(function(e) {
                    var row = $(this).closest('tr')
                    var checkbox = $(this).find('input');
                    console.log(checkbox);
                    checkbox.attr("checked", !checkbox.attr("checked"));
                    row.toggleClass('selected table-secondary')
                    if ($("#dataTable-student tbody tr.selected").length != $("#dataTable-student tbody tr").length) {
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
                // {
                //     data: 'email_id'
                // },
                // {
                //     data: 'rollno'
                // },
                {
                    data: 'course_type_id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'program'
                },

                // {
                //     data: 'dept_name'
                // },
                // {
                //     data: 'year_of_admission'
                // },
                // {
                //     data: 'current_sem'
                // },
                {
                    data: 'action'
                },

            ],
            columnDefs: [
                // {
                //     targets: [0, 7], // column index (start from 0)
                //     orderable: false, // set orderable false for selected columns
                // },
                {
                    className: "selectbox",
                    targets: [0]
                },
                {
                    className: "name",
                    "targets": [2]
                },
                {
                    className: "program",
                    "targets": [3]
                },
                {
                    className: "id",
                    "targets": [1],
                    visible: false,
                },
            ],
        });
    }
    $("#select_all").click(function(e) {
        //   var row=$(this).closest('tr')
        if ($(this).is(":checked")) {
            $("#dataTable-student tbody tr").addClass("selected table-secondary");
            $(".selectrow").attr("checked", true);
        } else {
            $(".selectrow").attr("checked", false);
            $("#dataTable-student tbody tr").removeClass("selected table-secondary");
        }
        //   row.toggleClass('selected table-secondary')
    })
</script>
<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>