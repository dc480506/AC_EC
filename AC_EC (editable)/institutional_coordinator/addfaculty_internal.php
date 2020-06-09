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
                    <h4 class="m-0 font-weight-bold text-primary">Faculty Records</h4>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
                <div class="col text-right" id="delete_selected_response_div">
                    <button type="button" class="btn btn-danger" id="delete_selected_response_btn" name="delete_selected_current">
                        <i class="fas fa-trash-alt">&nbsp;</i>Selected Faculty
                    </button>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#uploadinternal">
                        <i class="fas fa-upload"></i>
                    </button>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="ni ni-fat-add">&nbsp;</i>+ &nbsp;Add Faculty
                    </button>
                </div>
            </div>
            <div class="modal fade" id="uploadinternal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle0" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle0">Upload Your File </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form method="POST" enctype="multipart/form-data" id="bulkUploadInternal">
                                    <label for="">
                                        <h6>Information for mapping Data from excel sheet columns to database columns </h6>
                                    </label>
                                    <label for=""><small><b>Note:</b> The following fields should be column names in excel sheet</small>
                                    </label>
                                    <div class="form-row mt-4">
                                        <div class="form-group col-md-6">
                                            <label for="fcode"><b>Faculty Code</b></label>
                                            <input type="text" class="form-control" id="fcode" placeholder="Column name of Faculty Code" name="fcode" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="eid"><b>Employee ID</b></label>
                                            <input type="text" class="form-control" id="eid" placeholder="Column name of Employee ID" name="eid" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name"><b>First Name</b></label>
                                            <input type="text" class="form-control" id="fname" placeholder="Column name of First Name" name="fname" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="emailid"><b>Middle Name</b></label>
                                            <input type="text" class="form-control" id="mname" name="mname" placeholder="Column name of Middle Name" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name"><b>Last Name</b></label>
                                            <input type="text" class="form-control" id="lname" placeholder="Column name of Last Name" name="lname" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="emailid"><b>Email ID</b></label>
                                            <input type="text" class="form-control" id="emailid" name="emailid" placeholder="Column name of Email ID" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="department"><b>Department</b></label>
                                            <input type="text" class="form-control" id="department" name="department" placeholder="Column name of Department" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="post"><b>Post</b></label>
                                            <input type="text" class="form-control" id="post" name="post" placeholder="Column name of Post" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group files color">
                                        <!-- <input type="file" class="form-control" accept=".xls,.xlsx"> -->
                                        <script type="text/javascript" language="javascript">
                                            function checkfile(sender) {
                                                var validExts = new Array(".xlsx", ".xls");
                                                var fileExt = sender.value;
                                                fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
                                                if (validExts.indexOf(fileExt) < 0) {
                                                    alert("Invalid file selected, valid files are of " +
                                                        validExts.toString() + " types.");
                                                    return false;
                                                } else return true;
                                            }
                                        </script>
                                        <input type="file" name="Uploadfile" class="form-control" onchange="checkfile(this);" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required />
                                        <label for=""><b>Accepted formats .xls,.xlsx only.</b></label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                        <button type="submit" class="btn btn-primary" name="save_changes" id="upload_internal">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <style type="text/css">
                            .files input {
                                outline: 2px dashed #92b0b3;
                                outline-offset: -10px;
                                -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                                transition: outline-offset .15s ease-in-out, background-color .15s linear;
                                padding: 120px 0px 85px 35%;
                                text-align: center !important;
                                margin: 0;
                                width: 100% !important;
                            }

                            .files input:focus {
                                outline: 2px dashed #92b0b3;
                                outline-offset: -10px;
                                -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                                transition: outline-offset .15s ease-in-out, background-color .15s linear;
                                border: 1px solid #92b0b3;
                            }

                            .files {
                                position: relative
                            }

                            .files:after {
                                pointer-events: none;
                                position: absolute;
                                top: 60px;
                                left: 0;
                                width: 50px;
                                right: 0;
                                height: 56px;
                                content: "";
                                background-image: url('https://image.flaticon.com/icons/png/128/109/109612.png');
                                display: block;
                                margin: 0 auto;
                                background-size: 100%;
                                background-repeat: no-repeat;
                            }

                            .color input {
                                background-color: #f1f1f1;
                            }

                            .files:before {
                                position: absolute;
                                bottom: 10px;
                                left: 0;
                                pointer-events: none;
                                width: 100%;
                                right: 0;
                                height: 57px;
                                display: block;
                                margin: 0 auto;
                                color: #2ea591;
                                font-weight: 600;
                                text-transform: capitalize;
                                text-align: center;
                            }
                        </style>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add New Faculty</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Table -->
                            <form class="forms-sample" method="POST" action="ic_queries/addfaculty_queries.php">
                                <div class="form-row mt-4">
                                    <div class="form-group col-md-6">
                                        <label for="name"><b>Name</b></label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="emailid"><b>Email Address</b></label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com">
                                        <!-- <span id="error_email_id" class="text-danger"></span> -->

                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="form-group col-md-6">
                                        <label for="faculty_code"><b>Faculty Code</b></label>
                                        <input type="text" class="form-control" id="faculty_code" name="faculty_code" placeholder="faculty code">
                                        <!-- <span id="error_faculty_code" class="text-danger"></span> -->
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="eid"><b>Employee ID</b></label>
                                        <input type="text" class="form-control" id="eid" name="eid" placeholder="Employee Id">
                                        <!-- <span id="error_employee_id" class="text-danger"></span> -->
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="department"><b>Department</b></label>
                                        <select class="form-control" required name="dept">
                                            <?php
                                            include_once("../config.php");
                                            $sql = "SELECT * FROM department";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$row['dept_id'].'">' . $row['dept_name'] . '</option>';
                                                    }
                                            ?>
                                        </select>
                                        <!-- <input type="text" class="form-control" id="department" name="department" placeholder="department"> -->
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="postadd"><b>Post</b></label>
                                        <input type="text" class="form-control" id="post" name="post" placeholder="post">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" name="add_faculty">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle1">Filter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Table -->

                        <form class="forms-sample" method="POST" action="">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck4" onclick="disp4()">
                                <label class="form-check-label" for="exampleFormControlSelect4">Post</label>
                                <select class="form-control" style="display: none" id="exampleFormControlSelect4" name="post">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck5" onclick="disp5()">
                                <label class="form-check-label" for="exampleFormControlSelect5">Department</label>
                                <select class="form-control" style="display: none" id="exampleFormControlSelect5" name="dept_name">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-responsive" id="dataTable-internal" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="select_all">
                                <label class="custom-control-label" for="select_all"></label>
                            </div>
                        </th>
                        <th>Faculty Code</th>
                        <th>Employee Id</th>
                        <th>Full Name</th>
                        <th>Email Id</th>
                        <th>Department</th>
                        <th>Post</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Faculty Code</th>
                        <th>Employee Id</th>
                        <th>Full Name</th>
                        <th>Email Id</th>
                        <th>Department</th>
                        <th>Post</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            <!-- </div> -->
        </div>

    </div>
</div>
<!-- /.container-fluid -->
<script type="text/javascript">
    //Bulk Upload 
    $("#bulkUploadInternal").submit(function(e) {
        e.preventDefault();
        form = this;
        var formData = new FormData(this);
        $("#upload_internal").attr("disabled", true);
        $("#upload_internal").text("Uploading...")
        $.ajax({
            url: "adduser/bulkUpload/add_internalfaculty.php",
            type: 'POST',
            data: formData,
            success: function(data) {
                if ($.trim(data) == "Successful") {
                    $("#upload_internal").text("Uploaded Successfully")
                    loadCurrent();
                } else {
                    $("#upload_internal").text("Upload Failed")
                    alert(data);
                }
                // form.reset();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    })

    $(document).ready(function() {
        loadCurrent();
        // filterTable();
        $('#uploadinternal').on('hidden.bs.modal', function(e) {
            document.querySelector("#bulkUploadInternal").reset();
            $("#upload_internal").text("Upload")
            $("#upload_internal").attr("disabled", false);
        });
    });

    // //filter table
    // function filterTable(){
    //     function filter_internal_faculty(filter_post = '',filter_dept_id = ''){
    //         var dataTable = $('#dataTable-internal').DataTable({
    //             "processing": true,
    //             "serverSide": true,
    //             "destroy": true,
    //             "aaSorting": [],
    //             "searching": false,
    //             "ajax": {
    //                 url: "adduser/filter/filter_internalfaculty.php",
    //                 // url: "adduser/loadInfo/add_internalfaculty.php",
    //                 type:"POST",
    //                 data:{
    //                     filter_post:filter_post,
    //                     filter_dept_id:filter_dept_id
    //                 }

    //             },
    //         });
    //     }
    // }

    //DATATABLE CREATE
    function loadCurrent() {
        // document.querySelector("#addCoursebtn").style.display="none"
        $('#dataTable-internal').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            ajax: {
                'url': 'adduser/loadInfo/add_internalfaculty.php'
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
                    if ($("#dataTable-internal tbody tr.selected").length != $("#dataTable-internal tbody tr").length) {
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
                    data: 'faculty_code'
                },
                {
                    data: 'employee_id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'email_id'
                },
                {
                    data: 'dept_name'
                },
                {
                    data: 'post'
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
                    className: "faculty_code",
                    "targets": [1]
                },
            ],
        });
    }
    //SELECT CHECKALL
    $("#select_all").click(function(e) {
        // console.log("Hi")
        //   var row=$(this).closest('tr')
        if ($(this).is(":checked")) {
            $("#dataTable-internal tbody tr").addClass("selected table-secondary");
            $(".selectrow").attr("checked", true);
        } else {
            $(".selectrow").attr("checked", false);
            $("#dataTable-internal tbody tr").removeClass("selected table-secondary");
        }
        //   row.toggleClass('selected table-secondary')
    })
    //action modal part
    function loadModalCurrent() {
        var target_row = $(this).closest("tr"); // this line did the trick
        console.log(target_row)
        // var btn=$(this);
        var aPos = $("#dataTable-internal").dataTable().fnGetPosition(target_row.get(0));
        var courseData = $('#dataTable-internal').DataTable().row(aPos).data()
        // delete courseData.action
        // console.log(courseData)
        // delete courseData.allocate_faculty
        var json_courseData = JSON.stringify(courseData)
        // console.log(json_courseData)
        $.ajax({
            type: "POST",
            url: "adduser/loadModal/internal_faculty_modal.php",
            // data: form_serialize, 
            // dataType: "json",
            data: json_courseData,
            success: function(output) {
                // $("#"+x).text("Deleted Successfully");
                target_row.append(output);
                $('#update-del-modal').modal('show')
                $(document).on('hidden.bs.modal', '#update-del-modal', function() {
                    $("#update-del-modal").remove();
                });
                $('#delete_internal_faculty').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var form_serialize = form.serializeArray(); // serializes the form's elements.
                    form_serialize.push({
                        name: $("#delete_internal_faculty_btn").attr('name'),
                        value: $("#delete_internal_faculty_btn").attr('value')
                    });
                    $("#delete_internal_faculty_btn").text("Deleting...");
                    $("#delete_internal_faculty_btn").attr("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: "ic_queries/addfaculty_queries.php",
                        data: form_serialize,
                        success: function(data) {
                            //    alert(data); // show response from the php script.
                            $("#delete_internal_faculty_btn").text("Deleted Successfully");
                            var row = $("#update-del-modal").closest('tr');
                            var aPos = $("#dataTable-internal").dataTable().fnGetPosition(row.get(0));
                            $('#update-del-modal').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            // row.remove();
                            $("#dataTable-internal").DataTable().row(aPos).remove().draw(false);
                            // console.log(aPos);
                            // console.log(row)
                        }
                    });
                });
                $('#update_internal_faculty').submit(function(e) {
                    update_internal_faculty(e);
                    // $('#update-del-modal').modal('hide');
                });
            }
        });
    }

    function update_internal_faculty(e) {
        e.preventDefault();
        var form = $('#update_internal_faculty');
        var form_serialize = form.serializeArray(); // serializes the form's elements.
        // console.log(form_serialize)
        form_serialize.push({
            name: $("#update_internal_faculty_btn").attr('name'),
            value: $("#update_internal_faculty_btn").attr('value')
        });
        $("#update_internal_faculty_btn").text("Updating...");
        $("#update_internal_faculty_btn").attr("disabled", true);
        $.ajax({
            type: "POST",
            url: "ic_queries/addfaculty_queries.php",
            data: form_serialize,
            success: function(data) {
                // alert(data); // show response from the php script.
                // console.log(data)
                if(data === "Exists_email_id"){
                    $('#error_email_id').text('*This data already exists');
                    $("#update_internal_faculty_btn").text("Update");
                    $("#update_internal_faculty_btn").attr("disabled", false);
                }else  if(data === "Exists_faculty_code"){
                    $('#error_faculty_code').text('*This data already exists');
                    $("#update_internal_faculty_btn").text("Update");
                    $("#update_internal_faculty_btn").attr("disabled", false);
                }else  if(data === "Exists_employee_id"){
                    $('#error_employee_id').text('*This data already exists');
                    $("#update_internal_faculty_btn").text("Update");
                    $("#update_internal_faculty_btn").attr("disabled", false);
                }
                else{
                    $("#update_internal_faculty_btn").text("Updated Successfully");
                    var row = $("#update-del-modal").closest('tr');
                    var aPos = $("#dataTable-internal").dataTable().fnGetPosition(row.get(0));
                    var temp = $("#dataTable-internal").DataTable().row(aPos).data();
                    // console.log(temp)
                    // console.log(form_serialize)
                    temp['fname'] = form_serialize[0].value; //new values
                    temp['mname'] = form_serialize[1].value; //new values
                    temp['lname'] = form_serialize[2].value; //new values
                    temp['email_id'] = form_serialize[3].value;
                    temp['faculty_code'] = form_serialize[5].value;
                    temp['employee_id'] = form_serialize[7].value;
                    temp['dept_name'] = id_to_name_convertor_dept(form_serialize[9].value);
                    temp['post'] = form_serialize[10].value;
                    // // console.log(temp)
                    $('#dataTable-internal').dataTable().fnUpdate(temp, aPos, undefined, false);
                    $('.action-btn').off('click')
                    $('.action-btn').on('click', loadModalCurrent)
                    // $("#dataTable-internal").DataTable().row(aPos).draw(false);
                    $(".selectrow_student").attr("disabled", true);
                    $('#error_email_id').remove();
                    $('#error_faculty_code').remove();
                    $('#error_employee_id').remove();
                }
            }
        });
    }

    $("#dataTable-internal").on('click', 'td.faculty_code', function() {
        var tr = $(this).closest('tr');
        var row = $("#dataTable-internal").DataTable().row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown table-warning');
        } else {
            // Open this row
            var data = {}
            data['faculty_code'] = row.data()['faculty_code'];
            data['type'] = 'faculty'
            data_json = JSON.stringify(data)
            console.log(data_json)
            $.ajax({
                type: "POST",
                url: "loadAdditionalInfo/additional_info_internal_faculty.php",
                data: data_json,
                success: function(response) {
                    row.child(response).show();
                    tr.addClass('shown table-warning');
                }
            });
            // row.child("<b>Hello</b>").show();
        }
    })

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

    $("#delete_selected_response_btn").click(function(e) {
        alert("You have selected " + $("#dataTable-internal tbody tr.selected").length + " record(s) for deletion");
        var delete_rows = $("#dataTable-internal").DataTable().rows('.selected').data()
        var delete_data = {}
        for (var i = 0; i < delete_rows.length; i++) {
            baseData = {}
            baseData['email_id'] = delete_rows[i].email_id
            baseData['faculty_code'] = delete_rows[i].faculty_code
            baseData['employee_id'] = delete_rows[i].employee_id
            delete_data[i] = baseData
            // console.log(baseData);
        }
        var actual_data = {}
        actual_data['type'] = 'current'
        actual_data['delete_data'] = delete_data
        actual_delete_data_json = JSON.stringify(actual_data)
        console.log(actual_delete_data_json)
        $.ajax({
            type: "POST",
            url: "ic_queries/multioperation_queries/delete_multiple_internal_faculty.php",
            data: actual_delete_data_json,
            success: function(data) {
                // console.log(data)
                $("#dataTable-internal").DataTable().draw(false);
            }
        })
    })

</script>

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>