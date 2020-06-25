<?php 
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
include('sidebar.php');
include('../includes/topbar_student.php');
$course=array();
$index=0;
$sql = "SELECT sem_type,academic_year FROM current_sem_info WHERE currently_active=1";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
// while ($row = mysqli_fetch_assoc($result)) {
if($row['sem_type']=='EVEN'){
    $temp=explode('-',$row['academic_year'])[0];
    $temp+=1;
    $temp2="".($temp+1);
    $year_val=$temp."-".substr($temp2,2);
}else{
    $year_val=$row['academic_year'];
}
// TO get timestamp(start as well as end fOr a particular student) OF a FORM
$sql1 = "SELECT form.start_timestamp,form.end_timestamp,sem,year,form.no_of_preferences FROM form INNER JOIN student ON form.curr_sem=student.current_sem AND student.email_id='{$_SESSION['email']}' AND form.form_type='audit' AND year='$year_val'";
$result1 = mysqli_query($conn, $sql1);
if(mysqli_num_rows($result1)==0)
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

// $count = mysqli_num_rows($result2);
$row1 = mysqli_fetch_array($result1);
$_SESSION['no_of_preferences']=$row1['no_of_preferences'];
date_default_timezone_set('Asia/Kolkata');
$today = date("Y-m-d H:i:s");
// echo $today;
// echo '<br>';
// echo $row1['start_timestamp'];
// echo '<br>';
// echo $row1['end_timestamp'];
// $today_time = date("H:i:s");
// $date = "2020-03-05 00:00:00";
// if ($date < $today) {
//     $allow=1;
// }
if($row1['start_timestamp']>$today){ ?>
<style>
    ::-webkit-scrollbar {
    display: none!important
}
option:disabled{
   color: red;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <h1 class="h3 mb-4 text-gray-800">Form</h1>
                    </div>
                    <div class="row align-items-center">
                        <h6 class="card-description"> The current form will open
                            at<?php echo $row1['start_timestamp']; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
// end timestamp
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
                        <h6 class="card-description"> The current form is closed </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }

// if($allow==1){
else{
//    $info=$row1['end_timestamp'];
//    //function to show time remaining
//    function give_diff($in)
//     {
//         $datetime1 = date("Y-m-d H:i:s");
//         $date=new DateTime($datetime1);
//         // echo  " ". date_format($date,"Y/m/d H:i");
//         // echo " $in";
//         $datetime2 = new DateTime($in);
//         // echo " ". date_format($datetime2,"Y/m/d H:i");
//         $interval = $datetime2->diff($date);
//         echo $interval->format("Closes in %d days, %h hours, %i minutes and %s seconds.");

//     }
//     give_diff($info);

    //session variable to store end timestamp
    $_SESSION['endTime']=$row1['end_timestamp'];
    $sem=$row1['sem'];
    $year=$row1['year'];
    $_SESSION['year']=$year;
    $_SESSION['sem']=$sem;
    $sql7="SELECT * FROM student_form WHERE form_type='audit' AND sem='$sem' AND year='{$row1['year']}' AND no=0 AND email_id='{$_SESSION['email']}'";
    $result7=mysqli_query($conn,$sql7);
    if(mysqli_num_rows($result7)>0)
    {
        $row7=mysqli_fetch_assoc($result7);
        if($row7['form_filled']==0){ 
            $sql2="SELECT audit_course.cname,audit_course.cid,audit_course.year FROM audit_course 
          INNER JOIN student ON audit_course.sem='$sem' AND audit_course.year='$year' AND student.email_id='{$_SESSION['email']}' 
          AND student.dept_id IN(SELECT dept_id FROM audit_course_applicable_dept aca 
                                 WHERE aca.cid=audit_course.cid AND aca.sem=audit_course.sem AND aca.year=audit_course.year) 
          EXCEPT (SELECT hide_student_audit_course.cname, hide_student_audit_course.cid,hide_student_audit_course.year FROM hide_student_audit_course 
                  INNER JOIN student ON hide_student_audit_course.email_id=student.email_id AND hide_student_audit_course.sem='$sem' AND student.email_id='{$_SESSION['email']}')";
        $result2 = mysqli_query($conn, $sql2);
        while($row2 = mysqli_fetch_array($result2))
        {
            $course[$index]=$row2;
            $index++;
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
                        <h6 class="card-description"> Audit Courses </h6>
                        <br>    
                    </div>
                    <div class="row float-right text-danger" id="response">
                    </div>
                     
                </div>
                <div class="card-body">
                    <!-- echo $_SERVER['PHP_SELF']; -->
                    <form id="prefForm" method="post" action="student_queries/store_preference_audit.php">
                        <?php
                            for($i=1;$i<=$row1['no_of_preferences'];$i++){ ?>
                        <h4><?php echo "Preference $i"; ?></h4>
                        <select id="cname<?php echo $i; ?>" class="btn btn-primary dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            name="cname<?php echo $i; ?>" style="color:#ffffff;" required>
                            <!-- btn btn-primary dropdown-toggle -->
                            <option hidden="false" value="">--------</option>
                            <div class="dropdown-menu">
                                <?php 
                                            foreach ($course as $key)
                                            {
                                                // $_SESSION['year']=$key['year'];
                                            ?>
                                <option style="color:white; " class="dropdown-item me" value="<?php echo $key['cid']; ?>">
                                    <?php echo "{$key['cname']} ({$key['cid']})"; ?></option>
                                <?php } ?>
                            </div>
                        </select>
                        <br>
                        <br>
                        <?php }?>
                        <div class="modal-footer">
                        <button id="ResetForm" type="reset" class="btn btn-danger align-center" >Clear</button>
                        <!-- <input type="reset" class="btn btn-danger" id="ResetForm" value="Reset"> -->
                            <button id="button" type="submit" class="btn btn-primary align-center"
                                name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
    }
    else if($row7['form_filled']==1){
        //Major bugs in this section 
        $sql5="SELECT * FROM student_preference_audit WHERE student_preference_audit.sem='{$_SESSION['sem']}' 
              AND student_preference_audit.year='{$_SESSION['year']}' AND student_preference_audit.email_id='{$_SESSION['email']}'";
$result5 = mysqli_query($conn,$sql5);
$row5 = mysqli_fetch_array($result5);
$c_name = array();
for ($i=1; $i <=$row1['no_of_preferences'] ; $i++) {
    $sql6="SELECT cname,cid FROM audit_course WHERE cid='{$row5["pref".$i.""]}'";
    $result6 = mysqli_query($conn,$sql6);
    $row6 = mysqli_fetch_array($result6);
    $c_name[$i]=$row6['cname'];
    $c_id[$i]=$row6['cid'];
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
                        <h6 class="card-description"> Audit Courses </h6>
                    </div>
                </div>
                <div class="card-body">
                    <?php for($i=1;$i<=$row1['no_of_preferences'];$i++){ ?>
                    <div class="row">
                        <?php echo "Preference ".$i."-"; ?>
                        <br>
                        <p><?php echo "{$c_name[$i]} ({$c_id[$i]})";?></p>
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
<?php } }
else 
{ ?>
    <div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <h1 class="h3 mb-4 text-gray-800">Form</h1>
                    </div>
                    <div class="row align-items-center">
                        <h6 class="card-description"> Student not added in student_form table </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <?php
}
}
}
?>
<!-- /.container-fluid -->

<script>
$(".dropdown-toggle").change(function() {
    var selVal = [];
    $(".dropdown-toggle").each(function() {
        selVal.push(this.value);
    });

    $(this).siblings(".dropdown-toggle").find("option").removeAttr("disabled").filter(function() {
        var a = $(this).parent("select").val();
        return (($.inArray(this.value, selVal) > -1) && (this.value != a))
    }).attr("disabled", "disabled");
});
$(".dropdown-toggle").eq(0).trigger('change');
</script>

<script src="https://kit.fontawesome.com/57397afa58.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- ajax to update timer dynamically -->
        <script type="text/javascript">
           setInterval(() => {
               var xmlhttp=new XMLHttpRequest();
               xmlhttp.open("GET","timer.php",false);
               xmlhttp.send(null);
               document.getElementById("response").innerHTML=xmlhttp.responseText;
           }, 1000);
           var ar=[];
            $('#ResetForm').click(function() {
                // console.log("hiiiii0");
                // Reset the form
                // $('.dropdown-toggle option :selected')
                // console.log(ar);
                var elems = document.getElementsByTagName('option');
                for (var i=0, iLen=elems.length; i<iLen; i++) {
                elems[i].disabled = false;
                }
                console.log(elems);
                document.getElementById('prefForm').reset();
            
    // var selVal = [];
    // $(".dropdown-toggle").each(function() {
    //     selVal.push(this.value);
    // });

    // $(this).siblings(".dropdown-toggle").find("option").prop("disabled", false);
// $(".dropdown-toggle").eq(0).trigger('change');

                // if($(".me").prop("disabled", "disabled"))
                // {
                //     console.log("hey");
                //     $(".me").prop("disabled", false);
                // }
            
                // $('.dropdown-toggle').find('option').prop("disabled", false);
                // $('.dropdown-menu').find('option').removeAttr("disabled");
                // $(".dropdown-toggle option").prop('disabled',false);
                
                //     $(".dropdown-toggle").each(function() {
                //         console.log("found");
                //         $('.dropdown-toggle').find("option").prop('disabled', false);
                    
                // });
            //    var arr=[];
            //     $(".dropdown-toggle option:selected").each((i,items)=>{
            //         // arr.push(items);
                    
            //         // $(items).attr('disabled',false);


            //     });
            //     console.log(items);
    

            // var select=$(".dropdown-toggle");
            // if(select.find("option"))
            // {
            //     console.log("hi");
            // }
            // select.find("option:disabled").prop("disabled", false);
            // select.find("option").each(function(index,item.attr('disabled',false);

            
            });

           
        </script>
<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>