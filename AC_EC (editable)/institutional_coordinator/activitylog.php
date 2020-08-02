<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>
<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">

                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0"><i class="fas fa-user-clock" style="font-size:20px"></i> User Activity Log </h4>
                    <br>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">Recorded Logs</h4>
                    <br>
                </div>
                <!-- <div class="col text-right" id="delete_selected_response_div">
                    <button type="button" class="btn btn-danger" id="delete_selected_response_btn" name="delete_selected_current">
                        <i class="fas fa-trash-alt">&nbsp;</i> &nbsp;Selected Log(s)
                    </button>
                </div> -->
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable-activitylog" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="select_all">
                                    <label class="custom-control-label" for="select_all"></label>
                                </div>
                            </th>
                            <th>Log ID</th>
                            <th>Performing User</th>
                            <th>Affected User</th>
                            <th>Page Affected</th>
                            <th>Operation Performed</th>
                            <th>Status</th>
                            <th>Timestamp</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Log ID</th>
                            <th>Performing User</th>
                            <th>Affected User</th>
                            <th>Page Affected</th>
                            <th>Operation Performed</th>
                            <th>Status</th>
                            <th>Timestamp</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
     </div>
    
</div>
<script type="text/javascript">
            $(document).ready(function(e) {
                loadCurrent();
            });

            function loadCurrent() {
        $('#dataTable-activitylog').DataTable({
            serverSide: true,
            processing: true,
            destroy: true,
            serverMethod: 'post',
            aaSorting: [],

            ajax: {
                'url': 'ic_queries/activitylog_queries.php',
                "data": function(d) {
                    d.get_logs = "true";
                    return d;
                }
            },
            fnDrawCallback:function() {
                console.log('aaa');
                // $(".edit-button").on('click', loadEditModal)
                // $(".delete-button").on('click', deleteCourseType);

                // $(".selectrow").attr("disabled", true);
                // $("th").removeClass('selectbox');
                $(".selectbox").click(function(e) {
                    var row = $(this).closest('tr')
                    var checkbox = $(this).find('input');
                    console.log(checkbox);
                    checkbox.attr("checked", !checkbox.attr("checked"));
                    row.toggleClass('selected table-secondary')
                    if ($("#dataTable-activitylog tbody tr.selected").length != $("#dataTable-activitylog tbody tr").length) {
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
                    data: 'log_id'
                },
                {
                    data: 'performing_user'
                },
                {
                    data: 'affected_user'
                },
                {
                    data: 'page_affected'
                },
                {
                    data: 'operation_performed'
                },
                {
                    data: 'status'
                },
                {
                    data: 'timestamp'
                }
                
                // {
                //     data: 'action'
                // },

            ],
            columnDefs: [
                {
                    targets: [0, 7], // column index (start from 0)
                    orderable: false, // set orderable false for selected columns
                },
                {
                    className: "selectbox",
                    "targets": [0]
                },
                {
                    className: "log_id",
                    "targets": [1]
                }
                // {
                //     className: "performing_user",
                //     "targets": [2]
                // },
                // {
                //     className: "affected_user",
                //     "targets": [3]
                // },
                // {
                //     className: "page_affected",
                //     "targets": [4]
                // },
                // {
                //     className: "operation_performed",
                //     "targets": [5]
                // },
                // {
                //     className: "status",
                //     "targets": [6]
                // },
                // {
                //     className: "timestamp",
                //     "targets": [7]
                // }
                // {
                //     className: "id",
                //     "targets": [1],
                //     visible: false,
                // },
            ],
        });
    }
    $("#select_all").click(function(e) {
        //   var row=$(this).closest('tr')
        if ($(this).is(":checked")) {
            $("#dataTable-activitylog tbody tr").addClass("selected table-secondary");
            $(".selectrow").attr("checked", true);
        } else {
            $(".selectrow").attr("checked", false);
            $("#dataTable-activitylog tbody tr").removeClass("selected table-secondary");
        }
        //   row.toggleClass('selected table-secondary')
    })
</script>

    <?php include('../includes/footer.php');
include('../includes/scripts.php');
?>