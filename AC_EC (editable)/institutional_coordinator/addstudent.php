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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">

                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">Student Records</h4>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" name="addcourse" data-toggle="modal" data-target="#uploadstudent">
                        <i class="fas fa-upload"></i>
                    </button>
                </div>
            </div>
            <br>
            <div class="modal fade" id="uploadstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Upload Your File </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form method="POST" enctype="multipart/form-data" id="bulkUploadstudent">
                                    <label for=""><h6>Information for mapping Data from excel sheet to Database</h6></label>
                                    <div class="form-row mt-4">
                                        <div class="form-group col-md-4">
                                            <label for="cname"><b>First Name</b></label>
                                            <input type="text" class="form-control" id="fname" placeholder="First" name="fname" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cname"><b>Middle Name</b></label>
                                            <input type="text" class="form-control" id="mname" placeholder="Middle" name="mname" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cname"><b>Last Name</b></label>
                                            <input type="text" class="form-control" id="lname" placeholder="Last" name="lname" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="semester"><b>Semester</b></label>
                                            <input type="text" class="form-control" id="semester" placeholder="Semester" name="semester" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="year"><b>Year Admitted</b></label>
                                            <input type="text" class="form-control" id="year" name="year" placeholder="year" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="department"><b>Department</b></label>
                                            <input type="text" class="form-control" id="department" name="department" placeholder="Department" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email"><b>Email</b></label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="rno"><b>Roll Number</b></label>
                                            <input type="text" class="form-control" id="rno" name="rno" placeholder="Roll no" required>
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
                                            }
                                            else return true;
                                        }
                                        </script>
                                        <input type="file" name="Uploadfile" class="form-control" onchange="checkfile(this);" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required/>
                                        <label for=""><b>Accepted formats .xls,.xlsx only.</b></label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                        <button type="submit" class="btn btn-primary" name="save_changes" id="upload_student">Upload</button>
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
            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Filter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="forms-sample" method="POST" action="">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="disp1()" name="cname_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect1">Course Name</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect1" name="cname">
                                        <?php
                                        $email = $_SESSION['email'];
                                        $department = 'department';
                                        $query = "SELECT cname FROM faculty_audit NATURAL JOIN audit_course WHERE email_id = '$email'";
                                        if ($result = mysqli_query($conn, $query)) {
                                            $rowcount = mysqli_num_rows($result);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $cname = $row['cname'];
                                                echo '
                                      <option>' . $cname . '<option>
                                    ';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2" onclick="disp2()" name="cid_box">
                                    <label class="form-check-label" for="exampleFormControlSelect2">Course ID</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect2" name="cid">
                                        <?php
                                        $email = $_SESSION['email'];
                                        $department = 'department';
                                        $query = "SELECT cid FROM faculty_audit WHERE email_id = '$email'";
                                        if ($result = mysqli_query($conn, $query)) {
                                            $rowcount = mysqli_num_rows($result);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $cid = $row['cid'];
                                                echo '
                                      <option>' . $cid . '<option>
                                    ';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck3" onclick="disp3()" name="sem_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect3">Semester</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect3" name="sem">
                                        <?php
                                        $email = $_SESSION['email'];
                                        $department = 'department';
                                        $query = "SELECT sem FROM faculty_audit NATURAL JOIN audit_course WHERE email_id = '$email'";
                                        if ($result = mysqli_query($conn, $query)) {
                                            $rowcount = mysqli_num_rows($result);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $sem = $row['sem'];
                                                echo '
                                      <option>' . $sem . '<option>
                                    ';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck4" onclick="disp4()" name="dos_cbox">
                                    <label class="form-check-label" for="exampleFormControlSelect4">Department of Study</label>
                                    <select class="form-control" style="display: none" id="exampleFormControlSelect4" name="dept">
                                        <?php
                                        $dept_names = array();
                                        $email = $_SESSION['email'];
                                        $department = 'department';
                                        $query = "SELECT distinct(dept_name) FROM faculty_audit NATURAL JOIN audit_course NATURAL JOIN department WHERE email_id = '$email'";
                                        if ($result = mysqli_query($conn, $query)) {
                                            $rowcount = mysqli_num_rows($result);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $dept_name = $row['dept_name'];
                                                echo '<option>' . $dept_name . '<option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck5" onclick="disp5()">
                  <label class="form-check-label" for="exampleFormControlSelect5">Department</label>
                  <select class="form-control" style="display: none" id="exampleFormControlSelect5" name="cname">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div> -->

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" name="filter">Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive" id="dataTable-student" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="select_all">
                                                <label class="custom-control-label" for="select_all"></label>
                                            </div>
                                        </th>
                                        <th>Email Id</th>
                                        <th>Roll No.</th>
                                        <th>Full Name</th>
                                        <th>Department</th>
                                        <th>Year of Admission</th>
                                        <th>Semester</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Email Id</th>
                                        <th>Roll No.</th>
                                        <th>Full Name</th>
                                        <th>Department</th>
                                        <th>Year of Admission</th>
                                        <th>Semester</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        <!-- </div> -->
                    </div>
                                                     

                                        <!-- Modal -->
                                        <!-- <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle2">Action</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <nav>
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                <a class="nav-item nav-link active" id="nav-delete-tab" data-toggle="tab" href="#nav-delete" role="tab" aria-controls="nav-delete" aria-selected="true">Deletion</a>
                                                                <a class="nav-item nav-link" id="nav-update-tab" data-toggle="tab" href="#nav-update" role="tab" aria-controls="nav-update" aria-selected="false">Update</a>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content" id="nav-tabContent"> -->
                                                            <!--Deletion-->
                                                            <!-- <div class="tab-pane fade show active" id="nav-delete" role="tabpanel" aria-labelledby="nav-delete-tab">
                                                                <form action="">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect1"><b>Are you sure you want to remove the student from the course?</b>
                                                                        </label>
                                                                        <br>
                                                                        <button type="submit" class="btn btn-primary" name="yes">Yes</button>
                                                                        <button type="submit" class="btn btn-secondary" name="no">No</button>
                                                                    </div>
                                                                </form>
                                                            </div> -->
                                                            <!--end Deletion-->
                                                            <!--Update-->
                                                            <!-- <div class="tab-pane fade" id="nav-update" role="tabpanel" aria-labelledby="nav-update-tab">
                                                                <form action="">
                                                                    <div class="form-row mt-4">
                                                                        <div class="form-group col-md-4">
                                                                            <label for="cname"><b>First Name</b></label>
                                                                            <input type="text" class="form-control" id="fname" placeholder="First" name="fname">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="cname"><b>Middle Name</b></label>
                                                                            <input type="text" class="form-control" id="fname" placeholder="Middle" name="mname">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="cname"><b>Last Name</b></label>
                                                                            <input type="text" class="form-control" id="lname" placeholder=" Name" name="fname">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="rno"><b>Roll Number</b></label>
                                                                            <input type="text" class="form-control" id="rno" name="rno" placeholder="Roll Number">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="semester"><b>Semester</b></label>
                                                                            <input type="text" class="form-control" id="semester" placeholder="Semester" name="semester">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="year"><b>Year</b></label>
                                                                            <input type="text" class="form-control" id="year" name="year" placeholder="year">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="department"><b>Department</b></label>
                                                                            <input type="text" class="form-control" id="department" name="department" placeholder="Department">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="email"><b>Email</b></label>
                                                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                                                                </form>
                                                                <br>
                                                            </div> -->
                                                            <!--Update end-->
                                                        <!-- </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                                            <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr> -->
                                <!-- </tbody>
                        </table> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
<script type="text/javascript">
    $(document).ready(function(){
    loadCurrent();
    $('#uploadstudent').on('hidden.bs.modal',function (e) {
        document.querySelector("#bulkUploadstudent").reset();
        $("#upload_student").text("Upload")
        $("#upload_student").attr("disabled",false);
    });
});
function loadCurrent(){
    // document.querySelector("#addCoursebtn").style.display="none"
    $('#dataTable-student').DataTable({
      processing: true,
      serverSide: true,
      destroy:true,
      serverMethod: 'post',
      aaSorting:[],
      ajax: {
          'url':'adduser/loadInfo/add_student.php'
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
              if($("#dataTable-student tbody tr.selected").length!=$("#dataTable-student tbody tr").length){
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
         { data: 'email_id' },
         { data: 'rollno' },
         { data: 'fname' },
         { data: 'dept_name' },
         { data: 'year_of_admission' },
         { data: 'current_sem' },
         { data: 'action' },
      ],
      columnDefs: [ {
        targets: [0,7], // column index (start from 0)
        orderable: false, // set orderable false for selected columns
     },
     {className:"selectbox",targets:[0]},
     { className: "email", "targets": [ 1 ] },
        // { className: "cid", "targets": [ 1 ] },
        // { className: "sem", "targets": [ 2 ] },
        // { className: "dept_name", "targets": [ 3 ] },
        // { className: "dept_applicable", "targets": [ 4 ] },
        // { className: "max", "targets": [ 5 ] },
        // { className: "min", "targets": [ 6 ] }
     ],
   });
}
$("#select_all").click(function(e){
            //   var row=$(this).closest('tr')
    if($(this).is(":checked")){    
        $("#dataTable-student tbody tr").addClass("selected table-secondary");
        $(".selectrow").attr("checked",true);
    }else{
        $(".selectrow").attr("checked",false);
        $("#dataTable-student tbody tr").removeClass("selected table-secondary");
    }
            //   row.toggleClass('selected table-secondary')
})
//Bulk Upload 
$("#bulkUploadstudent").submit(function(e) {
    e.preventDefault();  
    form=this;  
    var formData = new FormData(this);
    $("#upload_student").attr("disabled",true);
    $("#upload_student").text("Uploading...")
    $.ajax({
        url: "adduser/bulkUpload/addstudent_queries.php",
        type: 'POST',
        data: formData,
        success: function (data) {
            if($.trim(data)=="Successful"){
                $("#upload_student").text("Uploaded Successfully")
                loadCurrent();
            }else{
                $("#upload_student").text("Upload Failed")
                alert(data);
            }
            // form.reset();
        },
        cache: false,
        contentType: false,
        processData: false
    });
})
function loadModalCurrent()
{
    var count=5;
    console.log(count);
}
</script>
    <?php include('../includes/footer.php');
    include('../includes/scripts.php');
    ?>