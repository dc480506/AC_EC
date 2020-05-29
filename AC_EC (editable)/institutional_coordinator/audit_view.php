<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>
<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">View Responses</h4>
                </div>
                <div class="col text-right" id="delete_selected_response_div">
                    <button type="button" class="btn btn-danger" id="delete_selected_response_btn" name="delete_selected_current">
                        <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Course(s)
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-responsive" id="dataTable-response" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="select_all">
                                <label class="custom-control-label" for="select_all"></label>
                            </div>
                        </th>
                        <th>Email Address</th>
                        <th>Semester</th>
                        <th>Year</th>
                        <th>Roll Number</th>
                        <!-- <th>Department</th> -->
                        <th>Time Stamp</th>
                        <th>Allocate Status</th>
                        <th>No of Valid Preferences</th>
                        <th>Preference List</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Email Address</th>
                        <th>Semester</th>
                        <th>Year</th>
                        <th>Roll Number</th>
                        <!-- <th>Department</th> -->
                        <th>Time Stamp</th>
                        <th>Allocate Status</th>
                        <th>No of Valid Preferences</th>
                        <th>Preference List</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script type="text/javascript">
    $(document).ready(function() {
        loadCurrent();
    });
    $("#delete_selected_response_btn").click(function(e) {
        alert("You have selected " + $("#dataTable-response tbody tr.selected").length + " record(s) for deletion");
        var delete_rows = $("#dataTable-response").DataTable().rows('.selected').data()
        var delete_data = {}
        for (var i = 0; i < delete_rows.length; i++) {
            baseData = {}
            baseData['email_id'] = delete_rows[i].email_id
            baseData['sem'] = delete_rows[i].sem
            baseData['rollno'] = delete_rows[i].rollno
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
            url: "ic_queries/multioperation_queries/delete_multiple_response.php",
            data: actual_delete_data_json,
            success: function(data) {
                // console.log(data)
                $("#dataTable-response").DataTable().draw(false);
            }
        })
    })


    function loadCurrent() {
        // document.querySelector("#addCoursebtn").style.display="none"
        $('#dataTable-response').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            ajax: {
                'url': 'view_response/loadInfo/view_audit.php'
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
                    if ($("#dataTable-response tbody tr.selected").length != $("#dataTable-response tbody tr").length) {
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
                    data: 'email_id'
                },
                {
                    data: 'sem'
                },
                {
                    data: 'year'
                },
                {
                    data: 'rollno'
                },
                {
                    data: 'timestamp'
                },
                {
                    data: 'allocate_status'
                },
                {
                    data: 'no_of_valid_preferences'
                },
                {
                    data: 'preference_list'
                },
                {
                    data: 'action'
                },
            ],
            columnDefs: [{
                    targets: [0, 8, 9], // column index (start from 0)
                    orderable: false, // set orderable false for selected columns
                },
                {
                    className: "selectbox",
                    targets: [0]
                },
                {
                    className: "email_id",
                    "targets": [1]
                },
            ],
        });
    }
    $("#select_all").click(function(e) {
        //   var row=$(this).closest('tr')
        if ($(this).is(":checked")) {
            $("#dataTable-response tbody tr").addClass("selected table-secondary");
            $(".selectrow").attr("checked", true);
        } else {
            $(".selectrow").attr("checked", false);
            $("#dataTable-response tbody tr").removeClass("selected table-secondary");
        }
    })

    function loadModalCurrent() {
        var target_row = $(this).closest("tr"); // this line did the trick
        console.log(target_row)
        // var btn=$(this);
        var aPos = $("#dataTable-response").dataTable().fnGetPosition(target_row.get(0));
        var courseData = $('#dataTable-response').DataTable().row(aPos).data()
        // delete courseData.action
        // console.log(courseData)
        // delete courseData.allocate_faculty
        var json_courseData = JSON.stringify(courseData)
        // console.log(json_courseData)
        $.ajax({
            type: "POST",
            url: "view_response/loadModal/audit_response_modal.php",
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
                $('#delete_response').submit(function(e) {
                    e.preventDefault();
                    var form = $(this);
                    var form_serialize = form.serializeArray(); // serializes the form's elements.
                    form_serialize.push({
                        name: $("#delete_response_btn").attr('name'),
                        value: $("#delete_response_btn").attr('value')
                    });
                    $("#delete_response_btn").text("Deleting...");
                    $("#delete_response_btn").attr("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: "ic_queries/audit_view_response_queries.php",
                        data: form_serialize,
                        success: function(data) {
                            //    alert(data); // show response from the php script.
                            $("#delete_response_btn").text("Deleted Successfully");
                            var row = $("#update-del-modal").closest('tr');
                            var aPos = $("#dataTable-response").dataTable().fnGetPosition(row.get(0));
                            $('#update-del-modal').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            // row.remove();
                            $("#dataTable-response").DataTable().row(aPos).remove().draw(false);
                            // console.log(aPos);
                            // console.log(row)
                        }
                    });
                });
                $('#update_response').submit(function(e) {
                    update_response(e);
                    // $('#update-del-modal').modal('hide');
                });
            }
        });
    }

    function update_response(e) {
        e.preventDefault();
        var form = $('#update_response');
        var form_serialize = form.serializeArray(); // serializes the form's elements.
        // console.log(form_serialize)
        form_serialize.push({
            name: $("#update_response_btn").attr('name'),
            value: $("#update_response_btn").attr('value')
        });
        $("#update_response_btn").text("Updating...");
        $("#update_response_btn").attr("disabled", true);
        $.ajax({
            type: "POST",
            url: "ic_queries/audit_view_response_queries.php",
            data: form_serialize,
            success: function(data) {
                //    alert(data); // show response from the php script.
                $("#update_response_btn").text("Updated Successfully");
                var row = $("#update-del-modal").closest('tr');
                var aPos = $("#dataTable-response").dataTable().fnGetPosition(row.get(0));
                var temp = $("#dataTable-response").DataTable().row(aPos).data();
                // console.log(temp)
                console.log(form_serialize)
                temp['rollno'] = form_serialize[0].value; //new values
                temp['allocate_status'] = form_serialize[2].value;
                temp['sem'] = form_serialize[4].value;
                temp['year'] = form_serialize[6].value;
                console.log(temp)
                $('#dataTable-response').dataTable().fnUpdate(temp, aPos, undefined, false);
                $('.action-btn').off('click')
                $('.action-btn').on('click', loadModalCurrent)
                // $("#dataTable-response").DataTable().row(aPos).draw(false);
                $(".selectrow_student").attr("disabled", true);
            }
        });
    }
</script>


<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>