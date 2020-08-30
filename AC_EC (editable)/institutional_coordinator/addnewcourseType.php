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
                    <h4 class="font-weight-bold text-primary mb-0">Existing course types</h4>
                </div>

                <div class="col text-right" id="addCurrentCoursebtn" style="display:block">
                    <!-- <h4 class="font-weight-bold text-primary mb-0">Add new course <i class="fas fa-book-open"></i></h4>
                    <br> -->
                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#addCourseType">
                        <i class="ni ni-fat-add">&nbsp;</i>+ &nbsp;Add Course Type &nbsp <i class="fas fa-book-open"></i>
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
                                    <label for="branch"><b>Branches to opt for</b></label>
                                    <br>

                                    <?php
                                    include_once('../config.php');
                                    $sql = "SELECT * FROM department WHERE dept_id NOT IN (" . $exclude_dept . ")";
                                    $result = mysqli_query($conn, $sql);
                                    $c = 8;

                                    if ($_SESSION['role'] == "inst_coor") {
                                        echo '<div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="applicable_dept_upcoming_cb7" checked>
                                        <label class="custom-control-label" for="applicable_dept_upcoming_cb7"><small>All</small></label>
                                    </div>';

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input dept" id="applicable_dept_upcoming_cb' . $c . '"  name="check_dept[]" value="' . $row['dept_id'] . '" checked>
                                        <label class="custom-control-label" for="applicable_dept_upcoming_cb' . $c . '"><small>' . $row['dept_name'] . '</small></label>
                                        </div>
                                        ';
                                            $c++;
                                        }
                                    } else {
                                        echo '
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                        
                                        <input type="checkbox" class="custom-control-input dept" id="applicable_dept_upcoming_cb' . $c . '"  name="check_dept[]" value="' . $_SESSION['dept_id'] . '" checked>
                                        <label class="custom-control-label" for="applicable_dept_upcoming_cb' . $c . '"><small>' . $_SESSION['dept_name'] . '</small></label>
                                        </div>
                                        ';
                                    }

                                    ?>
                                    <br>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="is_gradable" name="is_gradable" value="" checked>
                                        <label class="custom-control-label" for="is_gradable">Is Gradable</label>
                                    </div>
                                    <br>

                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="is_closed_elective" name="is_closed_elective" value="">
                                        <label class="custom-control-label" for="is_closed_elective">Is Closed Elective</label>
                                    </div>
                                    <br>
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
                                        <select disabled class="form-control" id="programName" name="program" required>
                                            <option value="UG">UG</option>
                                            <option value="PG">PG</option>
                                            <option value="PHD">PHD</option>
                                        </select>

                                    </div>

                                    <label for="branch"><b>Branches to opt for</b></label>
                                    <br>
                                    <div class="row ml-1" id="editdepartments">

                                        <?php
                                        include_once('../config.php');
                                        $sql = "SELECT * FROM department WHERE dept_id NOT IN (" . $exclude_dept . ")";
                                        $result = mysqli_query($conn, $sql);
                                        $c = 8;

                                        if ($_SESSION['role'] == "inst_coor") {


                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input dept" id="applicable_dept' . $row['dept_id'] . '"  name="check_dept[]" value="' . $row['dept_id'] . '" checked>
                                        <label class="custom-control-label" for="applicable_dept' . $row['dept_id'] . '"><small>' . $row['dept_name'] . '</small></label>
                                        </div>
                                        ';
                                                $c++;
                                            }
                                        } else {
                                            echo '
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                        
                                        <input type="checkbox" class="custom-control-input dept" id="applicable_dept' . $c . '"  name="check_dept[]" value="' . $_SESSION['dept_id'] . '" checked>
                                        <label class="custom-control-label" for="applicable_dept' . $c . '"><small>' . $_SESSION['dept_name'] . '</small></label>
                                        </div>
                                        ';
                                        }

                                        ?>
                                    </div>
                                    <br>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" checked class="custom-control-input" id="edit_is_gradable" name="is_gradable" value="">
                                        <label class="custom-control-label" for="edit_is_gradable">Is Gradable</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" checked class="custom-control-input" id="edit_is_closed_elective" name="edit_is_closed_elective" value="">
                                        <label class="custom-control-label" for="edit_is_closed_elective">Is Closed Elective</label>
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


        <div class="card-body">
            <!-- <h4 class="font-weight-bold text-primary mb-0">Existing course types</h4> -->
            <!-- <br> -->
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
                            <th>Graded</th>
                            <th>Closed Elective</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th> .
                            <th>id</th>
                            <th>Course Type</th>
                            <th>Program</th>
                            <th>Graded</th>
                            <th>Closed Elective</th>
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


<script type="text/javascript">
    $(document).ready(function(e) {
        loadCurrent();
    })

    dept_checkbox = document.querySelectorAll(".dept");

    if (document.querySelector("#applicable_dept_upcoming_cb7").checked) {
        for (i = 0; i < dept_checkbox.length; i++) {
            dept_checkbox[i].checked = true;
        }
    }
    all_cbox = document.querySelector("#applicable_dept_upcoming_cb7")
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

    $("#select_all").click(function(e) {
        //   var row=$(this).closest('tr')
        if ($(this).is(":checked")) {
            $("#dataTable-coursetypes tbody tr").addClass("selected table-secondary");
            $(".selectrow").attr("checked", true);
        } else {
            $(".selectrow").attr("checked", false);
            $("#dataTable-coursetypes tbody tr").removeClass("selected table-secondary");
        }
        console.log("blah blah blahhhh");

    });

    $("#add_new_course_type_form").submit(function(e) {
        e.preventDefault();
        const form = $(this).serializeArray();
        form.push({
            name: "add_new_course_type",
            value: "true"
        });
        var is_gradable = $("#add_new_course_type_form #is_gradable").prop("checked") ? 1 : 0;
        form.push({
            name: "is_gradable",
            value: is_gradable
        });
        var is_closed_elective = $("#add_new_course_type_form #is_closed_elective").prop("checked") ? 1 : 0;
        form.push({
            name: "is_closed_elective",
            value: is_closed_elective
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
        var edit_cid = courseTypeData.course_type_id;
        $("#edit_course_type_form #courseTypeName").val(courseTypeData.name)
        $("#edit_course_type_form #courseTypeId").val(courseTypeData.course_type_id)
        $.ajax({
            method: "POST",
            data: {
                id: courseTypeData.course_type_id,
                edit_course_type_depts: true
            },
            url: "ic_queries/addcourse_type_queries.php",
            success: function(data) {
                let applicable_depts = JSON.parse(data);
                var dept_div = $("#editdepartments input");
                $.each(dept_div, function() {
                    var checked = applicable_depts.includes($(this).val()) ? true : false;
                    $(this).prop("checked", checked);


                })
            },
            error: function(err) {
                window.alert("something went wrong");
            }
        })
        $("#edit_course_type_form #programName").val(courseTypeData.program);
        console.log(courseTypeData.is_closed_elective)
        $("#edit_course_type_form #edit_is_gradable").attr("checked", courseTypeData.is_gradable == "yes" ? true : false)
        $("#edit_course_type_form #edit_is_closed_elective").attr("checked", courseTypeData.is_closed_elective == "yes" ? true : false)

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
        var is_gradable = $("#edit_course_type_form #edit_is_gradable").prop("checked") ? 1 : 0;

        form.push({
            name: "is_gradable",
            value: is_gradable
        });
        var is_closed_elective = $("#edit_course_type_form #edit_is_closed_elective").prop("checked") ? 1 : 0;
        console.log(is_closed_elective);
        form.push({
            name: "is_closed_elective",
            value: is_closed_elective
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
                $(".selectrow").attr("disabled", true);
                $("th").removeClass('selectbox');
                $(".selectbox").click(function(e) {
                    var row = $(this).closest('tr')
                    var checkbox = $(this).find('input');
                    console.log(checkbox);
                    checkbox.attr("checked", !checkbox.attr("checked"));
                    row.toggleClass('selected table-secondary')
                    if ($("#dataTable-coursetypes tbody tr.selected").length != $("#dataTable-coursetypes tbody tr").length) {
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
                    data: 'course_type_id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'program'
                },
                {
                    data: 'is_gradable'
                },
                {
                    data: 'is_closed_elective'
                },
                {
                    data: 'action'
                },

            ],
            columnDefs: [

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

    function id_to_name_convertor_dept(id) {
        <?php
        include_once('../config.php');
        $sql = "SELECT * FROM department";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo 'if(id=="' . $row['dept_id'] . '") return "' . $row['dept_name'] . '";';
        }
        ?>
        // if(id == "1") return "Comp";
        // if(id == "2") return "ETRX";
        // if(id == "3") return "EXTC";
        // if(id == "4") return "IT";
        // if(id == "5") return "MECH";
    }
</script>
<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>