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
       
            //get courses taught
            $email_id=$data['email_id'];
           
            // $sql1="SELECT `cname` from course c where c.cid in (select `cid` from faculty_course_alloted where currently_active=1 and email_id='$email_id')";
            $sql1="SELECT cname,c.sem  from course c, faculty_course_alloted f where c.cid=f.cid and c.course_type_id=f.course_type_id and c.sem=f.sem and c.year=f.year and c.currently_active=1 and f.email_id='$email_id'";
            // echo $sql1;
            $result1 = mysqli_query($conn,$sql1);
            $rowcount=mysqli_num_rows($result1);
            // $str=array();
            
            // while($row1=mysqli_fetch_assoc($result1))
            // {
            //     array_push($str, $row1['cname']);
            // }
            
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
               
           
                <div class="form-group col-md-4">
                    <a data-toggle="modal" href="#myModal">          
                        <button type="submit" class="btn btn-primary"  role="button" id="student_courses">View alloted courses</button>    
                    </a>
                 
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
                    
                    
                    <?php 
                    // echo $rowcount;
                    if($rowcount)
                    {?>
                     <h5 class="text-primary">Courses alloted currently:</h5>
                    <br>
                    
                    <ul>
                    <?php
                      while($row1=mysqli_fetch_assoc($result1)) {
                       ?><li><?php echo $row1['cname'] . " - ".$row1['sem'] ?></li> 
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

                            