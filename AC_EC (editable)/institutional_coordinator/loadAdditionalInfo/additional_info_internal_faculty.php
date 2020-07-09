<?php
 session_start();
 if(isset($_SESSION['email']) && $_SESSION['role']=='inst_coor'){
    include_once('../../config.php');
    $data = json_decode(file_get_contents("php://input"),true); 
    if($data['type']=="faculty"){
        $faculty_code=$data['faculty_code'];
        $result = mysqli_query($conn,"select academic_year from current_sem_info WHERE currently_active=1");
        $row=mysqli_fetch_assoc($result);
        $year=$row['academic_year'];
        // $sql="SELECT timestamp,added_by FROM student_info WHERE faculty_code='$faculty_code'";
        $sql="SELECT `timestamp`,`added_by` FROM faculty WHERE faculty_code='$faculty_code'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $timestamp=date_format(date_create($row['timestamp']),'d-M-Y h:i:s A');
        $added_by=$row['added_by'];
       
        // $sql="SELECT post,fname,mname,lname,faculty_code FROM faculty_audit fa INNER JOIN faculty f ON fa.cid='$cid' AND fa.sem='$sem' AND fa.year='$year' AND fa.email_id=f.email_id";
        // $result=mysqli_query($conn,$sql);
        // $faculty_info="";
        // if(mysqli_num_rows($result)==0){
        //     $faculty_info="<p><i><small>No faculties found for this course</small></i></p>";
        // }else{
        //     $i=1;
        //     while($row=mysqli_fetch_assoc($result)){
        //         $faculty_info.="<p><small>".$i.") ".$row['post'].". ".$row['fname']." ".$row['mname']." ".$row['lname']." (".$row['faculty_code'].")</small></p>";
        //         $i++;
        //     }
        // }

            //get courses taught
            $email_id=$data['email_id'];
            // echo $email_id;
            $sql1="SELECT `cname` from course c where c.cid in (select `cid` from faculty_course_alloted where currently_active=1 and email_id='$email_id')";
        
            $result1 = mysqli_query($conn,$sql1);
            $str=array();
            
            while($row1=mysqli_fetch_assoc($result1))
            {
                array_push($str, $row1['cname']);
            }
            
        echo '
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="added_by"><b>Added by: </b></label>
                    <small><span>'.$added_by.'</span></small>
                </div>
                <div class="form-group col-md-4">
                    <label for="added_on"><b>Added on: </b></label>
                    <small><span>'.$timestamp.'</span></small>
                </div>
               
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Courses_info"><b>Courses Info: </b></label>
                    <a data-toggle="modal" href="#myModal">View</a>
                </div>
            </div>

         
        ';
        ?>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Additonal Faculty details</h5>
                        <button type="button" class="close" id="close_add_form_cross" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    
                    
                    <?php if(count($str)>0)
                    {?>
                     <h5 class="text-primary">Courses alloted currently:</h5>
                    <br>
                    
                    <ul>
                    <?php foreach($str as $val) {
                       ?><li><?php echo $val;?></li> 
                    <?php } ?>
           </ul>
           <?php
           }
           else
           {?>
           <h6 class="text-danger">No course alloted currently.</h6>
           <?php
           }?>

                    </div>
                    <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" name="close">Close</button>
                                
                            </div>

                            </div>
                            </div>
                            </div>
      <?php  
    }
 }
?>

                            