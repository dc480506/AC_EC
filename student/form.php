<?php 
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
include('sidebar.php');
include('../includes/topbar.php');
$course=array();
$index=0;
// TO get timestamp(start as well as end fOr a particular student) OF a FORM
$sql1 = "SELECT form.start_timestamp,form.end_timestamp,form.no_of_preferences,student.form_filled FROM form INNER JOIN student ON form.sem=student.current_sem AND student.email_id='{$_SESSION['email']}' AND form.form_type='audit'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);
$_SESSION['no_of_preferences']=$row1['no_of_preferences'];
if(!$result1)
{?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <h1 class="h3 mb-4 text-gray-800">Form</h1>
                    </div>
                    <div class="row align-items-center">
                    <h6 class="card-description">No Forms Are Floated At The Moment!!!!!!</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
else{
// $prefer="";
// for ($i=1; $i <$row1['no_of_preferences'] ; $i++) { 
//     # code...
//     $prefer.="pref".$i."";
//     $prefer.=",";
// }
// $prefer.="pref".$i."";
// echo $prefer;
$sql2="SELECT audit_course.cname,audit_course.cid,audit_course.year FROM audit_course 
      INNER JOIN student ON student.current_sem=audit_course.sem AND student.email_id='{$_SESSION['email']}' 
      AND student.dept_id IN(SELECT dept_id FROM audit_course_applicable_dept aca 
                             WHERE aca.cid=audit_course.cid AND aca.sem=audit_course.sem AND aca.year=audit_course.year) 
      EXCEPT (SELECT hide_student_audit_course.cname, hide_student_audit_course.cid,hide_student_audit_course.year FROM hide_student_audit_course 
              LEFT JOIN student ON hide_student_audit_course.email_id=student.email_id AND student.current_sem=hide_student_audit_course.sem AND student.email_id='{$_SESSION['email']}')";
$result2 = mysqli_query($conn, $sql2);
while($row2 = mysqli_fetch_array($result2))
{
    $course[$index]=$row2;
    $index++;
}
// $count = mysqli_num_rows($result2);
$today = date("Y-m-d H:i:s.u");
//echo $today;
// $today_time = date("H:i:s");
// $date = "2020-03-05 00:00:00";
// if ($date < $today) {
//     $allow=1;
// }
if($row1['start_timestamp']>$today){ ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <h1 class="h3 mb-4 text-gray-800">Form</h1>
                    </div>
                    <div class="row align-items-center">
                    <h6 class="card-description"> The current form will open at<?php echo $row1['start_timestamp']; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }

else if($row1['end_timestamp']<$today){ ?>
    <div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <h1 class="h3 mb-4 text-gray-800">Form</h1>
                    </div>
                    <div class="row align-items-center">
                        <h6 class="card-description"> The current form is closed  </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }

// if($allow==1){
else{
    if($row1['form_filled']==0){ ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <h1 class="h3 mb-4 text-gray-800">Form</h1>
                            </div>
                            <div class="row align-items-center">
                                <h6 class="card-description"> Audit/Elective/InterDisciplinary Courses </h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- echo $_SERVER['PHP_SELF']; -->
                            <form method="post" action="insert.php">
                            <?php
                            for($i=1;$i<=$row1['no_of_preferences'];$i++){ ?>
                                             <h4><?php echo "Preference $i"; ?></h4>
                                             <select  id="cname<?php echo $i; ?>" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="cname<?php echo $i; ?>" required>
                                            <!-- btn btn-primary dropdown-toggle -->
                                            <option hidden="false" value="">--------</option>
                                            <div class="dropdown-menu">
                                            <?php 
                                            foreach ($course as $key)
                                            {
                                                $_SESSION['year']=$key['year'];
                                            ?>
                                                    <option class="dropdown-item" value="<?php echo $key['cid']; ?>"><?php echo $key['cname']; ?></option>
                                            <?php } ?>
                                            </div>
                                        </select>
                                        <br>
                                        <br>
                            <?php }?>
                            <div class="modal-footer">
                            <button id="button" type="submit" class="btn btn-primary align-center" name="submit">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<?php 
    }
    else if($row1['form_filled']==1){
        $sql5="SELECT * FROM student_preference_audit LEFT JOIN student ON student_preference_audit.email_id=student.email_id AND student_preference_audit.sem='{$_SESSION['sem']}' AND student.email_id='{$_SESSION['email']}'";
$result5 = mysqli_query($conn,$sql5);
$row5 = mysqli_fetch_array($result5);
$c_name = array();
for ($i=1; $i <=$row1['no_of_preferences'] ; $i++) {
    $sql6="SELECT cname FROM audit_course WHERE cid='{$row5["pref".$i.""]}'";
    $result6 = mysqli_query($conn,$sql6);
    $row6 = mysqli_fetch_array($result6);
    $c_name[$i]=$row6['cname'];
    # code...
}
     ?>
        <!-- Begin Page Content -->

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center">
                                <h1 class="h3 mb-4 text-gray-800">Form</h1>
                            </div>
                            <div class="row align-items-center">
                                <h6 class="card-description"> Audit/Elective/InterDisciplinary Courses </h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php for($i=1;$i<=$row1['no_of_preferences'];$i++){ ?>
                                <div class="row">
                                         <?php echo "Preference ".$i."-"; ?> 
                                         <br>
                                            <p><?php echo $c_name[$i]; ?></p>
                                </div>
                          <?php  } ?>
                          <div class="modal-footer">
            <button type="modify" class="btn btn-primary align-center" name="modify">Modify</button>
        </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
   <?php }
}
}
?>
<!-- /.container-fluid -->
<script>
   $(".dropdown-toggle").change(function(){
    var selVal=[];
    $(".dropdown-toggle").each(function(){
        selVal.push(this.value);
    });
   
    $(this).siblings(".dropdown-toggle").find("option").removeAttr("disabled").filter(function(){
       var a=$(this).parent("select").val();
       return (($.inArray(this.value, selVal) > -1) && (this.value!=a))
    }).attr("disabled","disabled");
});
$(".dropdown-toggle").eq(0).trigger('change');
</script>
<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>