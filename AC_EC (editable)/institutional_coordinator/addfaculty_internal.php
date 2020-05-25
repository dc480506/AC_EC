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
                    <h4 class="m-0 font-weight-bold text-primary">Internal Faculty Records</h4>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">
                        <i class="fas fa-filter"></i>
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
                                background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
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
                                        <input type="text" class="form-control" id="nameadd" name="name" placeholder="name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="emailid"><b>Email Address</b></label>
                                        <input type="email" class="form-control" id="emailidadd" name="email" placeholder="email@gmail.com">

                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="form-group col-md-6">
                                        <label for="faculty_code"><b>Faculty Code</b></label>
                                        <input type="text" class="form-control" id="faculty_code_add" name="faculty_code" placeholder="faculty code">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="eid"><b>Employee ID</b></label>
                                        <input type="text" class="form-control" id="eidadd" name="eid" placeholder="Employee Id">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="department"><b>Department</b></label>
                                        <select class="form-control" required name="dept">';
                                            <?php
                                            include_once("../config.php");
                                            $sql = "SELECT dept_id,dept_name FROM department";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value=" . $row['dept_id'] . ">" . $row['dept_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <!-- <input type="text" class="form-control" id="department" name="department" placeholder="department"> -->
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="postadd"><b>Post</b></label>
                                        <input type="text" class="form-control" id="postadd" name="post" placeholder="post">
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
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="disp1()">
                                <label class="form-check-label" for="exampleFormControlSelect1">Course Name</label>
                                <select class="form-control" style="display: none" id="exampleFormControlSelect1" name="cname">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2" onclick="disp2()">
                                <label class="form-check-label" for="exampleFormControlSelect2">Course ID</label>
                                <select class="form-control" style="display: none" id="exampleFormControlSelect2" name="cname">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck3" onclick="disp3()">
                                <label class="form-check-label" for="exampleFormControlSelect3">Semester</label>
                                <select class="form-control" style="display: none" id="exampleFormControlSelect3" name="cname">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck4" onclick="disp4()">
                                <label class="form-check-label" for="exampleFormControlSelect4">Year</label>
                                <select class="form-control" style="display: none" id="exampleFormControlSelect4" name="cname">
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
                                <select class="form-control" style="display: none" id="exampleFormControlSelect5" name="cname">
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

                        <!-- tr starts-->
                                    <!-- Modal -->
                                    <!-- <div class="modal fade" id="exampleModalCenter' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle1">Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <nav>
                                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                            <a class="nav-item nav-link active" id="nav-delete-tab" data-toggle="tab" href="#nav-delete' . $count . '" role="tab" aria-controls="nav-delete' . $count . '" aria-selected="true">Deletion</a>
                                                            <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update' . $count . '" role="tab" aria-controls="nav-update' . $count . '" aria-selected="false">Update</a>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content" id="nav-tabContent"> -->
                                                        <!--Deletion-->
                                                        <!-- <div class="tab-pane fade show active" id="nav-delete' . $count . '" role="tabpanel" aria-labelledby="nav-delete-tab">
                                                            <form action="ic_queries/addfaculty_queries.php" method="POST">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1"><b>Are you sure you want to delete?</b>
                                                                    </label>
                                                                    <br>
                                                                    <input type="hidden" name="email" value="' . $row['email_id'] . '">
                                                                    <button type="submit" class="btn btn-primary" name="delete_faculty">Yes</button>
                                                                    <button type="submit" class="btn btn-secondary" name="no">No</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                         --><!--end Deletion-->
                                                        <!--Update-->
                                                        <!-- <div class="tab-pane fade" id="nav-update' . $count . '" role="tabpanel" aria-labelledby="nav-update-tab">
                                                            <form action="ic_queries/addfaculty_queries.php" method="POST">
                                                                <div class="form-row mt-4">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="name"><b>Name</b></label>
                                                                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="emailid"><b>Email Address</b></label>
                                                                        <input type="email" class="form-control" id="email" name="newemail" placeholder="email@gmail.com" value="">
                                                                        <input type="hidden" class="form-control"  name="oldemail"  value="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row mt-4">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="faculty_code"><b>Faculty Code</b></label>
                                                                        <input type="text" class="form-control" id="faculty_code" name="faculty_code" placeholder="" value="">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="eid"><b>Employee ID</b></label>
                                                                        <input type="text" class="form-control" id="eid" name="eid" placeholder="" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="department"><b>Department</b></label>
                                                                        <select class="form-control" required name="dept">';

                                                                        </select> --> 
                                                                        <!-- <input type="text" class="form-control" id="department" name="department" placeholder="department"> -->
                                                                    <!-- </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="post"><b>Post</b></label>
                                                                        <input type="text" class="form-control" id="post" name="post" placeholder="post" value="">
                                                                    </div>
                                                                </div>
                                    
                                                                <button type="submit" class="btn btn-primary" name="update_faculty">Update</button>
                                                            </form>
                                                        </div> -->
                                                        <!--Update end-->
                                                    <!-- </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                    <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                    </tbody>
                </table> -->
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script type="text/javascript">
     $(document).ready(function(){
    loadCurrent();
    $('#uploadinternal').on('hidden.bs.modal',function (e) {
        document.querySelector("#bulkUploadInternal").reset();
        $("#upload_internal").text("Upload")
        $("#upload_internal").attr("disabled",false);
    });
});
    //DATATABLE CREATE
function loadCurrent(){
    var count=5;
    console.log(count);
    // document.querySelector("#addCoursebtn").style.display="none"
    $('#dataTable-internal').DataTable({
      processing: true,
      serverSide: true,
      destroy:true,
      serverMethod: 'post',
      aaSorting:[],
      ajax: {
          'url':'adduser/loadInfo/add_internalfaculty.php'
      },
      fnDrawCallback:function(){
          $(".action-btn").on('click',loadModalCurrent)
          $(".selectrow").attr("disabled",true);
          $("th").removeClass('selectbox');
          $(".selectbox").click(function(e){
              var row=$(this).closest('tr')
              var checkbox = $(this).find('input');
              console.log(checkbox);
              checkbox.attr("checked", !checkbox.attr("checked"));
              row.toggleClass('selected table-secondary')
              if($("#dataTable-internal tbody tr.selected").length!=$("#dataTable-internal tbody tr").length){
                $("#select_all").prop("checked",true)
                $("#select_all").prop("checked",false)
              }else{
                $("#select_all").prop("checked",false)
                $("#select_all").prop("checked",true)
              }
          })
      },
      columns: [
         { data: 'select-cbox'},
         { data: 'faculty_code' },
         { data: 'employee_id' },
         { data: 'fname' },
         { data: 'email_id'},
         { data: 'dept_name' },
         { data: 'post' },
         { data: 'action' },
      ],
      columnDefs: [ {
        targets: [0,7], // column index (start from 0)
        orderable: false, // set orderable false for selected columns
     },
     {className:"selectbox",targets:[0]},
     { className: "faculty_code", "targets": [ 1 ] },
        // { className: "cid", "targets": [ 1 ] },
        // { className: "sem", "targets": [ 2 ] },
        // { className: "dept_name", "targets": [ 3 ] },
        // { className: "dept_applicable", "targets": [ 4 ] },
        // { className: "max", "targets": [ 5 ] },
        // { className: "min", "targets": [ 6 ] }
     ],
   });
}
//SELECT CHECKALL
$("#select_all").click(function(e){
            //   var row=$(this).closest('tr')
    if($(this).is(":checked")){    
        $("#dataTable-internal tbody tr").addClass("selected table-secondary");
        $(".selectrow").attr("checked",true);
    }else{
        $(".selectrow").attr("checked",false);
        $("#dataTable-internal tbody tr").removeClass("selected table-secondary");
    }
            //   row.toggleClass('selected table-secondary')
})
//Bulk Upload 
$("#bulkUploadInternal").submit(function(e) {
    e.preventDefault();  
    form=this;  
    var formData = new FormData(this);
    $("#upload_internal").attr("disabled",true);
    $("#upload_internal").text("Uploading...")
    $.ajax({
        url: "adduser/bulkUpload/add_internalfaculty.php",
        type: 'POST',
        data: formData,
        success: function (data) {
            if($.trim(data)=="Successful"){
                $("#upload_internal").text("Uploaded Successfully")
                loadCurrent();
            }else{
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
//action modal part
function loadModalCurrent()
{
    var count=5;
    console.log(count);
}
</script>
  
<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>