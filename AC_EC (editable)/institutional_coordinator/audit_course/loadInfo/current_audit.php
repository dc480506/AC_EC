<?php
include_once('../../verify.php');
include_once('../../../config.php');
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
if(isset($_POST['order'])){
   $columnIndex = $_POST['order'][0]['column']; // Column index
   $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
   $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
   $orderQuery=" order by $columnName $columnSortOrder ";
}else{
   // $columnName='sem';
   // $columnSortOrder='asc';
   $orderQuery=' order by sem asc ';
}
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (cid like '%".$searchValue."%' or 
        sem like '%".$searchValue."%' or 
        cname like'%".$searchValue."%' or dept_name like '%".$searchValue."%'
        ) ";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as totalcount from audit_course WHERE currently_active=1");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['totalcount'];

## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*) as totalcountfilters from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['totalcountfilters'];

## Fetch records
// $sql = "select cname,cid,sem,dept_name,max,min,no_of_allocated from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
// $sql="select cname,cid,sem,dept_name,max,min,no_of_allocated,
//      (SELECT GROUP_CONCAT(aad.dept_id SEPARATOR ',') FROM audit_course_applicable_dept aad 
//      WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year GROUP BY 'all') as app 
//      from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1 "
//      .$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
// $sql="select cname,cid,sem,dept_name,max,min,no_of_allocated, 
//       (SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_applicable_dept aad 
//        INNER JOIN department ad ON aad.dept_id=ad.dept_id WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year
//        GROUP BY 'all') as app 
//        from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1 "
//        .$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$sql="select cname,cid,sem,dept_name,max,min,no_of_allocated, 
      (SELECT GROUP_CONCAT(dept_name SEPARATOR ', ') FROM audit_course_applicable_dept aad 
       INNER JOIN department ad ON aad.dept_id=ad.dept_id WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year
       GROUP BY 'all') as app 
       from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1 "
       .$searchQuery. $orderQuery ." limit ".$row.",".$rowperpage;
$courseRecords = mysqli_query($conn, $sql);
$data = array();
$count=0;

while ($row = mysqli_fetch_assoc($courseRecords)) {
   $data[] = array( 
      // "select-cbox"=>'<input type="checkbox">',
      "select-cbox"=>'<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow_current" id="selectrow_current'.$count.'">
                        <label class="custom-control-label" for="selectrow_current'.$count.'"></label>
                     </div>',
      "cname"=>$row['cname'],
      "cid"=>$row['cid'],
      "sem"=>$row['sem'],
      "dept_name"=>$row['dept_name'],
      "dept_applicable"=>$row['app'],
      "max"=>$row['max'],
      "min"=>$row['min'],
      "no_of_allocated"=>$row['no_of_allocated'],
      "allocate_faculty"=>'<!-- Button trigger modal -->
      <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#exampleModalCenter'.$count.'">
          <i class="fas fa-chalkboard-teacher"></i>
      </button>

      <!-- Modal -->       
      <div class="modal fade" id="exampleModalCenter'.$count.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle'.$count.'" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle'.$count.'">Action</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <nav>
                                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                      <a class="nav-item nav-link active" id="nav-allocate-tab" data-toggle="tab" href="#nav-allocate" role="tab" aria-controls="nav-allocate" aria-selected="true">Allocation</a>
                                  </div>
                              </nav>
                              <div class="tab-content" id="nav-tabContent">
                                  <!--Allocation-->
                                  <div class="tab-pane fade show active" id="nav-allocate" role="tabpanel" aria-labelledby="nav-allocate-tab">
                                      <form action="">
                                          <div class="form-group">
                                              <label for="cname"><b>Course Name : </b>
                                              </label>
                                              <span>'.$row['cname'].'</span>
                                          </div>
                                          <div class="form-group">
                                              <label for="cid"><b>Course ID : </b>
                                              </label>
                                              <span>'.$row['cid'].'</span>
                                          </div>
                                          <div class="form-group">
                                              <label for="sem"><b>Semester : </b>
                                              </label>
                                              <span>'.$row['sem'].'</span>
                                          </div>
                                          <hr class="my-4" />
                                          <h6><b>Faculty Allocated</b></h6>
                                              <label for="sem"><b>Faculty 1 : </b>
                                              </label>
                                              <span>ROB</span>
                                              <br>
                                              <label for="sem"><b>Faculty 2 : </b>
                                              </label>
                                              <span>ZSK</span>
                                              <hr class="my-4" />
                                              <h6><b>Allocate new Faculty</b></h6>
                                          <div class="form-group">
                                              <label for="facid"><b>Faculty ID</b>
                                              </label>
                                              <select class="form-control" id="facid" name="course">
                                                  <option selected></option>
                                                  <option>AEX</option>
                                                  <option>BAS</option>
                                                  <option>ASK</option>
                                                  <option>HAR</option>
                                                  <option>DEV</option>
                                              </select>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Allocate</button>
                                      </form>
                                  </div>
                                  <!--end Allocation-->
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                              <button type="button" class="btn btn-primary" name="save_changes">Save changes</button>
                          </div>
                      </div>
                  </div>
              </div>       ',
      "action"=>'<button type="button" class="btn btn-primary icon-btn action-btn">
                    <i class="fas fa-tools"></i>
                </button>',
   );
   $count++;
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);
// select cname,cid,sem,dept_name,max,min,no_of_allocated,(SELECT aad.dept_id as app FROM audit_course_applicable_dept aad WHERE a.cid=aad.cid AND a.sem=aad.sem AND a.year=aad.year) from audit_course a INNER JOIN department d ON a.dept_id=d.dept_id WHERE currently_active=1

?>
