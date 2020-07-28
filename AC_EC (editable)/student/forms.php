<?php 
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
include('sidebar.php');
include('../includes/topbar_student.php');
$course=array();
$index=0;
$student_mail=$_SESSION['email'];
$sql = "SELECT sem_type,academic_year FROM current_sem_info WHERE currently_active=1";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
$count=0;
date_default_timezone_set('Asia/Kolkata');
$today = date("Y-m-d H:i:s");
$form_ids=array();
$end_times=array();
if($row['sem_type']=='EVEN'){
    $temp=explode('-',$row['academic_year'])[0];
    $temp+=1;
    $temp2="".($temp+1);
    $year_val=$temp."-".substr($temp2,2);
    }else{
        $year_val=$row['academic_year'];
}

$sql1 = "SELECT f.form_id,f.start_timestamp,f.end_timestamp,f.sem,f.year,f.no_of_preferences,sf.form_filled,f.currently_active FROM form f,student s ,form_applicable_dept fad,student_form sf where s.email_id='$student_mail' AND f.year='$year_val' AND s.dept_id=fad.dept_id AND f.form_id=fad.form_id AND f.curr_sem=s.current_sem AND sf.email_id='$student_mail' AND sf.form_id=f.form_id";
// echo $sql1;
$result1 = mysqli_query($conn, $sql1);
?>

<style>
.card-description
{
    font-size: 1.1rem; 
}
</style>
<?php
if(mysqli_num_rows($result1)==0)
    {
      
    ?>
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4 ">
                    <div class="card-header py-3">
                        <div class="row align-items-center">
                            <h1 class="h3 mb-4 text-gray-800">Form</h1>
                        </div>
                        <div class="row align-items-center">
                            <h6 class="card-description" style="color:red;">No Forms Are Floated At The Moment!</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    else{
        $k=0;
        while($row1 = mysqli_fetch_assoc($result1))
        {
            
            $form_id=$row1['form_id']; 
            $start_timestamp=$row1['start_timestamp'];
            $end_timestamp=$row1['end_timestamp'];
            $endTime = new DateTime($end_timestamp);

           

            $sem=$row1['sem'];
            $year=$row1['year'];
            $no_of_preferences=$row1['no_of_preferences'];
            $form_filled=$row1['form_filled'];
            $currently_active=$row1['currently_active'];
            // echo   $form_id ."</br>";
         
            $sql3="select c.name from form_course_category_map fccm,course_types c where fccm.form_id='$form_id' AND fccm.course_type_id=c.id ";
            // echo $sql3."</br>";
            $result3 = mysqli_query($conn, $sql3);
            // $row3=mysqli_fetch_assoc($result3);
            ?>

            <div class="container-fluid px-5">
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="row align-items-center">
                                    <h1 class="h3 mb-4 text-gray-800">
                                        <?php
                                         while($row3 = mysqli_fetch_array($result3)){
                                            echo $row3['name']." ";                                        
                                         }
                                         ?>
                                      
                                   Form </h1>
                                </div>
                                 
                                    <?php 
  
                                        if($start_timestamp>$today) {  ?>
                                          <style>
                                                ::-webkit-scrollbar {
                                                display: none!important
                                            }

                                                option:disabled {
                                                color: red;
                                            }
                                            </style>
                                        <div class="row align-items-center"> 
                                             <h6 style="color:red" class="card-description mx-3"> The current form will open
                                            on <?php echo  date_format(new DateTime($start_timestamp),"d-m-Y H:i:s");?>.</h6>
                                        </div>

                                        <?php
                                        }    
                                        else if($end_timestamp<$today && $form_filled==0){ ?>   
                                        <div class="row align-items-center">                            
                                            <h6 class="card-description mx-3" style="color:red;"> The current form is closed and cannot be filled now </h6>
                                        </div>
                                        <?php } 

                                        else if($end_timestamp<$today && $form_filled==1){ ?>                              
                                        <div class="row align-items-center"> 
                                            <div class="col ">
                                                 <h6 class="card-description"> The current form is closed </h6>
                                            </div>
                                            <div class="col text-right pr-5">
                                                <a href="show_form.php?form_id=<?php echo $form_id ?>" class="btn btn-primary" >Show Form</a>
                                            </div>
                                        </div>

                                        <?php }
                                        else{
                                            $form_ids[$k]=$form_id;
                                            $end_times[$k]= date_format($endTime,"Y m d H:i:s");
                                            $k++;
                                            $count=$count+1;
                                            ?>
                                             <div class="row align-items-center">
                                                <div class="col text-right text-danger" id="<?php echo $form_id?>">
                                                </div>
                                            </div>
                                         
                                           <?php

                                            if($form_filled==1)
                                                {
                                                    ?>
                                                <div class="row">
                                                    <div class="col-md-6 text-left card-description">
                                                        <h6 class="mx-3" style="color:green;font-size:1.1rem">Form is filled</h6>
                                                    </div>
                                                    <div class="col-md-6 text-right pr-5">
                                                    <a href="edit_form.php?form_id=<?php echo $form_id ?>" class="btn btn-primary" >Edit Form</a>
                                                    </div>
                                                </div>
                                      
                                                <?php
                                             }else{
                                                ?> 
                                                <div class="row">
                                                    <div class="col-md-6 text-left card-description">
                                                        <h6 class="mx-3" style="color:green;font-size:1.1rem">Form is not filled</h6>
                                                    </div>
                                                    <div class="col-md-6 text-right pr-5">
                                                    <a href="fill_form.php?form_id=<?php echo $form_id ?>" class="btn btn-primary" >Fill Form</a>
                                                    </div>
                                                </div>
                                             
                                                 
                                              
                                         
                                        <?php  }
                                         }
                                         ?>
                                   
                              
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
    <?php
    };
    }

    ?>



<script src="https://kit.fontawesome.com/57397afa58.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
<script type="text/javascript">


var x = setInterval(function() {
    
    // Get today's date and time
    var now1 = new Date();
    var now=now1.getTime();
    var count=<?php echo $count?>;
    // console.log("count"+count);
    var ids=<?php echo json_encode($form_ids); ?>;
    var endT=<?php echo json_encode($end_times); ?>;


    for(var i=0;i<count;i++){
    id=ids[i];
    // console.log("id:    "+id); 
    var m=new Date(endT[i]);
    // console.log("   m:"+m);
    var countDownDate=(m.getTime());
    // console.log("   now:"+now);
    // console.log("   countDownDate:"+countDownDate);

    // Find the distance between now and the count down date
    var distance = countDownDate - now; 
    // console.log("   distance:"+distance);
    if(now<countDownDate || (distance>-1000) )
    {
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById(id).innerHTML = `<p style="font-size:17px;"><i class="fas fa-stopwatch" style="font-size:28px;"></i>&nbsp;`+ "Form closes in " +days+" days, "  + hours + " hours, "
        + minutes + " minutes " +"and " +seconds + " seconds.";   
        // console.log("now1:"+now1);
        // console.log(m);
        var res=(now1.toString()).localeCompare(m.toString());

        if (distance > 0 && distance<1000) {
            // console.log("ho");
            // window.location.reload();
            document.getElementById(id).innerHTML = "";   
                
        }
        else if(res==0)
        {
            // console.log("hi");
            window.location.reload();
            document.getElementById(id).innerHTML = "";   
            clearInterval(x); 
        }
    }   
    }
   
}, 1000);      



</script>
      
<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>