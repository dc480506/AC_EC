<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>
<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>
<style>
    .text-success {
        /* color: #28a745!important; */
        color: #2ecc71 !important;

    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">Audit Course Form Records</h4>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">Form Records</h4>
                    <br>
                </div>
                <div class="col text-right" id="delete_selected_response_div">
                    <button type="button" class="btn btn-danger" id="delete_selected_response_btn" name="delete_selected_current">
                        <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Form(s)
                    </button>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createForm">
                        <i class="fas fa-plus"></i> Create Form
                    </button>
                </div>
                
                <div class="modal fade" id="createForm" tabindex="-1" role="dialog" aria-labelledby="createForm" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle2">Prepare Audit Course Form</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <br>
                                <label for=""><small><b>Note:</b>2 hours time will be added to start time if current date and time is selected.</small></label>
                                <form action="ic_queries/prepare_form_ac_queries.php" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputPreference"><b>No of Preferences</b></label>
                                        <input type="number" required class="form-control" id="exampleInputPreference" name="nop" maxlength="1" minlength="1"   
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="NumbersOnly(this)">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputSem"><b>Floating Semester</b></label>
                                        <input type="number" required class="form-control" id="exampleInputSem" min="1" max="8" maxlength="1" 
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                                            onkeyup="SemestersOnly(this)"  name="sem">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputYear"><b>Year</b></label>
                                        <input type="year" required class="form-control" id="exampleInputYear" placeholder="Eg: 2019-20" maxlength="7" minlength="7" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="year">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCurrSem"><b>Opening Semester</b></label>
                                        <input type="number" required class="form-control" id="exampleInputCurrSem" name="curr_sem" min="1" max="8" maxlength="1" 
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" 
                                            onkeyup="SemestersOnly(this)">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-check-label" for="exampleInputStartDate"><b>Start Date</b></label>
                                                <input type="date" required class="form-control" id="exampleInputStartDate" name="start_date">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-check-label" for="exampleInputStartDate"><b>Start Time</b></label>
                                                <input type="time" required class="form-control" id="exampleInputStartTime" name="start_time">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-check-label" for="exampleInputStartDate"><b>End Date</b></label>
                                                <input type="date" required class="form-control" id="exampleInputEndDate" name="end_date">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-check-label" for="exampleInputStartDate"><b>End Time</b></label>
                                                <input type="time" required class="form-control" id="exampleInputEndTime" name="end_time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                        <button type="submit" class="btn btn-primary align-center" name="createForm">Create Form</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable-form" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="select_all_current_page">
                                    <label class="custom-control-label" for="select_all_current_page"></label>
                                </div>
                            </th>
                            <th>Floating Sem</th>
                            <th>Year</th>
                            <th>Current Sem</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>End Date</th>
                            <th>End Time</th>
                            <th>No of Preferences</th>
                            <th>Form Status</th>
                            <th>Action</th>
                            <th>View responses</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Floating Sem</th>
                            <th>Year</th>
                            <th>Current Sem</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>End Date</th>
                            <th>End Time</th>
                            <th>No of Preferences</th>
                            <th>Form Status</th>
                            <th>Action</th>
                            <th>View responses</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<script>
    
    $("#delete_selected_response_btn").click(function(e) {
        alert("You have selected " + $("#dataTable-form tbody tr.selected").length + " record(s) for deletion");
        var delete_rows = $("#dataTable-form").DataTable().rows('.selected').data()
        console.log(delete_rows)
        var delete_data = {}
        for (var i = 0; i < delete_rows.length; i++) {
            baseData = {}
            baseData['year'] = delete_rows[i].year
            baseData['sem'] = delete_rows[i].sem
            // baseData['no'] = delete_rows[i].no
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
            url: "ic_queries/multioperation_queries/delete_multiple_form_ac.php",
            data: actual_delete_data_json,
            success: function(data) {
                // console.log(data)
                $("#dataTable-form").DataTable().draw(false);
            }
        })
    })

     function NumbersOnly(input)
    {
        var regex =/[a-z]/;
        input.value = input.value.replace(regex,"");
    }
    function SemestersOnly(input)
    {
        var regex = /[^1-8]/;
        input.value = input.value.replace(regex,"");
        newval = document.querySelector("#exampleInputSem").value - 1;
        
        if (newval < 0 && newval == -1)
        {
            document.querySelector("#exampleInputCurrSem").value = "";}
        else{
            document.querySelector("#exampleInputCurrSem").value = newval;}
    }

    $(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;
        $('#exampleInputStartDate').attr('min', maxDate);
    });

    $(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;
        $('#exampleInputEndDate').attr('min', maxDate);
    });

    $(function() {
        var timeToday = new Date('H:i');
        $('#exampleInputStartTime').attr('min', timeToday);
    });
    $(function() {
        var timeToday = new Date('H:i');
        $('#exampleInputEndTime').attr('min', timeToday);
    });
    // function defaultOpenSemVal() {
    //     newval = document.querySelector("#exampleInputSem").value - 1;
    //     if (newval < 0)
    //         document.querySelector("#exampleInputCurrSem").value = "";
    //     else
    //         document.querySelector("#exampleInputCurrSem").value = newval;
    // }
    $(document).ready(function() {
        loadForms();
        // $('#uploadCurrent').on('hidden.bs.modal',function (e) {
        //     document.querySelector("#bulkUploadCurrent").reset();
        //     $("#upload_current").text("Upload")
        //     $("#upload_current").attr("disabled",false);
        // });
        // $('#uploadUpcoming').on('hidden.bs.modal',function (e) {
        //     document.querySelector("#bulkUploadUpcoming").reset();
        //     $("#upload_upcoming").text("Upload")
        //     $("#upload_upcoming").attr("disabled",false);
        // });
    })

    function loadForms() {
        $('#dataTable-form').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],
            ajax: {
                'url': 'forms/audit_forms/load_audit_form_info.php'
            },
            fnDrawCallback: function() {
                $(".action-btn").on('click', loadModal)
                

                $(".selectrow_current").attr("disabled", true);
                $("th").removeClass('selectbox_current_td');
                $(".selectbox_current_td").click(function(e) {
                    var row = $(this).closest('tr')
                    var checkbox = $(this).find('input');
                    checkbox.attr("checked", !checkbox.attr("checked"));
                    row.toggleClass('selected table-secondary')
                    if ($("#dataTable-current tbody tr.selected").length != $("#dataTable-current tbody tr").length) {
                        $("#select_all_current_page").prop("checked", true)
                        $("#select_all_current_page").prop("checked", false)
                    } else {
                        $("#select_all_current_page").prop("checked", false)
                        $("#select_all_current_page").prop("checked", true)
                    }
                })
            },
            columns: [{
                    data: 'select-cbox'
                },
                {
                    data: 'sem'
                },
                {
                    data: 'year'
                },
                {
                    data: 'curr_sem'
                },
                {
                    data: 'start_date'
                },
                {
                    data: 'start_time'
                },
                {
                    data: 'end_date'
                },
                {
                    data: 'end_time'
                },
                {
                    data: 'no_of_preferences'
                },
                {
                    data: 'form_status'
                },
                {
                    data: 'action'
                },
                {  data: 'view'},
            ],
            columnDefs: [{
                    targets: [0, 3, 4, 5, 6, 7, 8, 9, 10,11
                ], // column index (start from 0)
                    orderable: false, // set orderable false for selected columns
                },
                {
                    className: "selectbox_current_td",
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

    function loadModal() {
        var target_row = $(this).closest("tr"); // this line did the trick
        // console.log(target_row)
        var aPos = $("#dataTable-form").dataTable().fnGetPosition(target_row.get(0));
        var formData = $('#dataTable-form').DataTable().row(aPos).data()
        // console.log(formData)
        form_post_data = {}
        form_post_data['sem'] = formData.sem.split(">")[1].split("</")[0].trim()
        form_post_data['year'] = formData.year.split(">")[1].split("</")[0].trim()
        form_post_data['curr_sem'] = formData.curr_sem.split(">")[1].split("</")[0].trim()
        form_post_data['start_date'] = formData.start_date.split(">")[1].split("</")[0].trim()
        form_post_data['start_time'] = formData.start_time.split(">")[1].split("</")[0].trim()
        form_post_data['end_date'] = formData.end_date.split(">")[1].split("</")[0].trim()
        form_post_data['end_time'] = formData.end_time.split(">")[1].split("</")[0].trim()
        form_post_data['no_of_preferences'] = formData.no_of_preferences.split(">")[1].split("</")[0].trim()
        form_post_data['form_status'] = formData.form_status.split(">")[1].split("</")[0].trim()
        // console.log(form_post_data)
        var json_form_post_data = JSON.stringify(form_post_data)
        // console.log(json_form_post_data)
        $.ajax({
            type: "POST",
            url: "forms/audit_forms/load_audit_form_modal.php",
            // data: form_serialize, 
            // dataType: "json",
            data: json_form_post_data,
            success: function(output) {
                // $("#"+x).text("Deleted Successfully");
                target_row.append(output);
                $('#form_modal').modal('show')
                $(document).on('hidden.bs.modal', '#form_modal', function() {
                    $("#form_modal").remove();
                });
                // $('#delete_course_form').submit(function(e){
                //     e.preventDefault();
                //     var form = $(this);
                //     var form_serialize=form.serializeArray();// serializes the form's elements.
                //     form_serialize.push({ name: $("#delete_course_btn").attr('name'), value: $("#delete_course_btn").attr('value') });
                //     $("#delete_course_btn").text("Deleting...");
                //     $("#delete_course_btn").attr("disabled",true);
                //     $.ajax({
                //         type: "POST",
                //         url: "ic_queries/addcourse_queries.php",
                //         data: form_serialize, 
                //         success: function(data)
                //         {
                //             //    alert(data); // show response from the php script.
                //             $("#delete_course_btn").text("Deleted Successfully");
                //             var row=$("#update-del-modal").closest('tr');
                //             var aPos = $("#dataTable-previous").dataTable().fnGetPosition(row.get(0)); 
                //             $('#update-del-modal').modal('hide');
                //             $('body').removeClass('modal-open');
                //             $('.modal-backdrop').remove();
                //             // row.remove();
                //             $("#dataTable-previous").DataTable().row(aPos).remove().draw(false);
                //             // console.log(aPos);
                //             // console.log(row)
                //         }
                //         });
                // });
                // $('#update_course_form').submit(function(e){
                //     update_course_form_previous(e);
                //     // $('#update-del-modal').modal('hide');
                //     });

            }
        });
    }









</script>
<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>
<!-- class="table-danger" -- red
    class="table-success" --green
    class="table-secondary" --grey
    class="table-warning" --yellow -->