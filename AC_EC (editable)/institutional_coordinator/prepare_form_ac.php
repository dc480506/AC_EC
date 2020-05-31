<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>
<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>
<style>
    .text-success{
       /* color: #28a745!important; */
       color: #2ecc71!important;

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
                                <form action="ic_queries/prepare_form_ac_queries.php" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputPreference"><b>No of Preferences</b></label>
                                        <input type="number" required class="form-control" id="exampleInputPreference" name="nop">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputSem"><b>Floating Semester</b></label>
                                        <input type="number" required class="form-control" id="exampleInputSem" onkeyup="defaultOpenSemVal()" name="sem">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputYear"><b>Year</b></label>
                                        <input type="year" required class="form-control" id="exampleInputYear" name="year">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCurrSem"><b>Opening Semester</b></label>
                                        <input type="number" required class="form-control" id="exampleInputCurrSem" name="curr_sem">
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
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                //         include_once('../config.php');
                //         $sql = "SELECT sem,year,curr_sem,start_timestamp,end_timestamp,no_of_preferences,allocate_status FROM form WHERE form_type='audit'";

                //         $result = mysqli_query($conn, $sql);
                //         if (mysqli_num_rows($result) > 0) {
                //             $count = 500;

                //             while ($row = mysqli_fetch_assoc($result)) {
                //                 $status = "Not opened yet";
                //                 date_default_timezone_set('Asia/Kolkata');
                //                 $timestamp = date("Y-m-d H:i");
                //                 $start_timestamp = $row['start_timestamp'];
                //                 $end_timestamp = $row['end_timestamp'];
                //                 $show_allocate = false;
                //                 $color = 'table-warning';
                //                 $tabs = '<a class="nav-item nav-link active" id="nav-delete-tab" data-toggle="tab" href="#nav-delete' . $count . '" role="tab" aria-controls="nav-delete' . $count . '" aria-selected="true">Deletion</a>
                //         <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update' . $count . '" role="tab" aria-controls="nav-update' . $count . '" aria-selected="false">Update</a>';
                //                 if ($timestamp >= $start_timestamp) {
                //                     if ($timestamp < $end_timestamp) {
                //                         $status = "Open";
                //                         $color = 'table-success';
                //                     } else {
                //                         $status = "Closed";
                //                         $tabs .= '<a class="nav-item nav-link" id="nav-allocate-tab" data-toggle="tab" href="#nav-allocate' . $count . '" role="tab" aria-controls="nav-allocate' . $count . '" aria-selected="false">Allocate</a>';
                //                         $color = 'table-danger';
                //                         $show_allocate = true;
                //                         if ($row['allocate_status'] == 1) {
                //                             $status = 'Already Allocated';
                //                             $color = 'table-secondary';
                //                         }
                //                     }
                //                 }
                //                 $sArr = explode(" ", $start_timestamp);
                //                 $start_date = $sArr[0];
                //                 $start_time = $sArr[1];
                //                 $eArr = explode(" ", $end_timestamp);
                //                 $end_date = $eArr[0];
                //                 $end_time = $eArr[1];
                //                 echo '
                // <tr class="' . $color . '"">
                //     <td></td>
                //     <td>' . $row['sem'] . '</td>
                //     <td>' . $row['year'] . '</td>
                //     <td>' . $row['curr_sem'] . '</td>
                //     <td>' . date("d-M-Y", strtotime($start_date)) . '</td>
                //     <td>' . $start_time . '</td>
                //     <td>' . date("d-M-Y", strtotime($end_date)) . '</td>
                //     <td>' . $end_time . '</td>
                //     <td>' . $row['no_of_preferences'] . '</td>
                //     <td>' . $status . '</td>';
                //                 if ($status != 'Already Allocated') {
                //                     echo '
                //     <td>
                //         <!-- Button trigger modal -->
                //         <!-- Add disabled = "disabled" in button tag to disable the button -->
                //         <button type="button" class="btn btn-primary icon-btn"  data-toggle="modal" data-target="#exampleModalCenter' . $count . '">
                //             <i class="fas fa-tools"></i>
                //         </button>
                //         <!-- Modal -->
                //         <div class="modal fade" id="exampleModalCenter' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                //             <div class="modal-dialog modal-dialog-centered" role="document">
                //                 <div class="modal-content">
                //                     <div class="modal-header">
                //                         <h5 class="modal-title" id="exampleModalCenterTitle1">Action</h5>
                //                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                //                             <span aria-hidden="true">&times;</span>
                //                         </button>
                //                     </div>
                //                     <div class="modal-body">
                //                         <nav>
                //                             <div class="nav nav-tabs" id="nav-tab" role="tablist">
                //                                 ' . $tabs . '
                //                             </div>
                //                         </nav>
                //                         <div class="tab-content" id="nav-tabContent">
                //                             <!--Deletion-->
                //                             <div class="tab-pane fade show active" id="nav-delete' . $count . '" role="tabpanel" aria-labelledby="nav-delete-tab">
                //                                 <form action="ic_queries/prepare_form_ac_queries.php" method="POST">
                //                                     <div class="form-group">
                //                                         <label for="exampleFormControlSelect1"><b>Are you sure you want to delete?</b>
                //                                         </label>
                //                                         <br>
                //                                         <input type="hidden" name="sem" value="' . $row['sem'] . '">
                //                                         <input type="hidden" name="year" value="' . $row['year'] . '">
                //                                         <button type="submit" class="btn btn-primary" name="deleteForm">Yes</button>
                //                                         <button type="button" class="btn btn-secondary" name="no">No</button>
                //                                     </div>
                //                                 </form>
                //                             </div>
                //                             <!--end Deletion-->
                //                             <!--Update-->
                //                             <div class="tab-pane fade" id="nav-update' . $count . '" role="tabpanel" aria-labelledby="nav-update-tab">
                //                                 <form action="ic_queries/prepare_form_ac_queries.php" method="POST">
                //                                     <div class="form-group">
                //                                         <label for="exampleInputPreference"><b>No of Preferences</b></label>
                //                                         <input type="number" required class="form-control" name="nop" value="' . $row['no_of_preferences'] . '">
                //                                     </div>
                //                                     <div class="form-group">
                //                                         <label for="exampleInputSem"><b>Floating Semester</b></label>
                //                                         <input type="number" required class="form-control" name="sem" value="' . $row['sem'] . '">
                //                                         <input type="hidden" required class="form-control" name="oldsem" value="' . $row['sem'] . '">
                //                                     </div>
                //                                     <div class="form-group">
                //                                         <label for="exampleInputYear"><b>Year</b></label>
                //                                         <input type="year" required class="form-control" name="year" value="' . $row['year'] . '">
                //                                         <input type="hidden" required class="form-control" name="oldyear" value="' . $row['year'] . '">
                //                                     </div>
                //                                     <div class="form-group">
                //                                         <label for="exampleInputCurrSem"><b>Opening Semester</b></label>
                //                                         <input type="number" required class="form-control" name="curr_sem" value="' . $row['curr_sem'] . '">
                            
                //                                     </div>
                //                                     <div class="row">
                //                                         <div class="col-6">
                //                                             <div class="form-group">
                //                                                 <label class="form-check-label" for="exampleInputStartDate"><b>Start Date</b></label>
                //                                                 <input type="date" required class="form-control" name="start_date" value="' . $start_date . '">
                //                                             </div>
                //                                             <div class="form-group">
                //                                                 <label class="form-check-label" for="exampleInputStartDate"><b>Start Time</b></label>
                //                                                 <input type="time" required class="form-control"  name="start_time" value="' . $start_time . '">
                //                                             </div>
                //                                         </div>
                //                                         <div class="col-6">
                //                                             <div class="form-group">
                //                                                 <label class="form-check-label" for="exampleInputStartDate"><b>End Date</b></label>
                //                                                 <input type="date" required class="form-control" name="end_date" value="' . $end_date . '">
                //                                             </div>
                //                                             <div class="form-group">
                //                                                 <label class="form-check-label" for="exampleInputStartDate"><b>End Time</b></label>
                //                                                 <input type="time" required class="form-control"  name="end_time" value="' . $end_time . '">
                //                                             </div>
                //                                         </div>
                //                                     </div>
                //                                     <button type="submit" class="btn btn-primary align-center" name="modifyForm">Modify</button>
                //                                 </form>
                //                                 <br>
                //                             </div>
                //                             <!--Update end-->
                //                         ';
                //                     if ($show_allocate) {
                //                         echo '
                //                             <div class="tab-pane fade" id="nav-allocate' . $count . '" role="tabpanel" aria-labelledby="nav-allocate-tab">
                //                                 <form action="ic_queries/allocate_audit.php" method="POST">
                //                                     <div class="form-group">
                //                                         <label for="exampleFormControlSelect3"><b>Are you sure you want to Allocate courses for Semester ' . $row['sem'] . ' and Academic Year ' . $row['year'] . ' ?</b>
                //                                         </label>
                //                                         <br>
                //                                         <input type="hidden" name="sem" value="' . $row['sem'] . '">
                //                                         <input type="hidden" name="year" value="' . $row['year'] . '">
                //                                         <input type="hidden" name="nop" value="' . $row['no_of_preferences'] . '">
                //                                         <a class="btn btn-primary" href="allocate.php" role="button" name="allocate">Yes</a>
                //                                         <a class="btn btn-secondary" href="prepare_form_ac.php" role="button" name="no">No</a>
                //                                         <br>
                //                                     </div>
                //                                 </form>
                //                             </div>
                //                             ';
                //                     }
                //                     echo '
                //                         </div>
                //                         <div class="modal-footer">
                //                             <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                //                             <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                //                         </div>
                //                     </div>
                //                 </div>
                //             </div>
                //         </div>
                //     </td>';
                //                 } else {
                //                     echo ' 
                //     <td>
                //         <!-- Button trigger modal -->
                //         <!-- Add disabled = "disabled" in button tag to disable the button -->
                //         <button type="button" class="btn btn-primary icon-btn" disabled="disabled" data-toggle="modal" data-target="#exampleModalCenter' . $count . '">
                //             <i class="fas fa-tools"></i>
                //         </button>
                //     </td>
                //         ';
                //                 }
                //                 echo '</tr>';


                //                 $count++;
                //             }
                //         }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
        
        <!-- /.container-fluid -->
<script>
    function defaultOpenSemVal() {
        newval = document.querySelector("#exampleInputSem").value - 1;
        if (newval < 0)
            document.querySelector("#exampleInputCurrSem").value = "";
        else
            document.querySelector("#exampleInputCurrSem").value = newval;
    }
    $(document).ready(function(){
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
    function loadForms(){
        $('#dataTable-form').DataTable({
            processing: true,
            serverSide: true,
            destroy:true,
            serverMethod: 'post',
            aaSorting:[],
            ajax: {
                'url':'forms/audit_forms/load_audit_form_info.php'
            },
            fnDrawCallback:function(){
                $(".action-btn").on('click',loadModal)
                $(".selectrow_current").attr("disabled",true);
                $("th").removeClass('selectbox_current_td');
                $(".selectbox_current_td").click(function(e){
                    var row=$(this).closest('tr')
                    var checkbox = $(this).find('input');
                    checkbox.attr("checked", !checkbox.attr("checked"));
                    row.toggleClass('selected table-secondary')
                    if($("#dataTable-current tbody tr.selected").length!=$("#dataTable-current tbody tr").length){
                        $("#select_all_current_page").prop("checked",true)
                        $("#select_all_current_page").prop("checked",false)
                    }else{
                        $("#select_all_current_page").prop("checked",false)
                        $("#select_all_current_page").prop("checked",true)
                    }
                })
            },
            columns: [
                { data: 'select-cbox'},
                { data: 'sem' },
                { data: 'year' },
                { data: 'curr_sem' },
                { data: 'start_date' },
                { data: 'start_time' },
                { data: 'end_date' },
                { data: 'end_time' },
                { data: 'no_of_preferences' },
                { data: 'form_status' },
                { data: 'action' },
            ],
            columnDefs: [ {
                targets: [0,3,4,5,6,7,8,9,10], // column index (start from 0)
                orderable: false, // set orderable false for selected columns
            },
            {className:"selectbox_current_td",targets:[0]},
            { className: "cname", "targets": [ 1 ] },
                // { className: "cid", "targets": [ 1 ] },
                // { className: "sem", "targets": [ 2 ] },
                // { className: "dept_name", "targets": [ 3 ] },
                // { className: "dept_applicable", "targets": [ 4 ] },
                // { className: "max", "targets": [ 5 ] },
                // { className: "min", "targets": [ 6 ] }
            ],
        }); 
    }
    function loadModal(){
        var target_row = $(this).closest("tr"); // this line did the trick
        // console.log(target_row)
        var aPos = $("#dataTable-form").dataTable().fnGetPosition(target_row.get(0)); 
        var formData=$('#dataTable-form').DataTable().row(aPos).data()
        // console.log(formData)
        form_post_data={}
        form_post_data['sem']=formData.sem.split(">")[1].split("</")[0].trim()
        form_post_data['year']=formData.year.split(">")[1].split("</")[0].trim()
        form_post_data['curr_sem']=formData.curr_sem.split(">")[1].split("</")[0].trim()
        form_post_data['start_date']=formData.start_date.split(">")[1].split("</")[0].trim()
        form_post_data['start_time']=formData.start_time.split(">")[1].split("</")[0].trim()
        form_post_data['end_date']=formData.end_date.split(">")[1].split("</")[0].trim()
        form_post_data['end_time']=formData.end_time.split(">")[1].split("</")[0].trim()
        form_post_data['no_of_preferences']=formData.no_of_preferences.split(">")[1].split("</")[0].trim()
        form_post_data['form_status']=formData.form_status.split(">")[1].split("</")[0].trim()
        // console.log(form_post_data)
        var json_form_post_data=JSON.stringify(form_post_data)
        // console.log(json_form_post_data)
        $.ajax({
            type: "POST",
            url: "forms/audit_forms/load_audit_form_modal.php",
            // data: form_serialize, 
            // dataType: "json",
            data: json_form_post_data,
            success: function(output)
            {
                // $("#"+x).text("Deleted Successfully");
                target_row.append(output);
                $('#form_modal').modal('show')
                    $(document).on('hidden.bs.modal', '#form_modal', function () {
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