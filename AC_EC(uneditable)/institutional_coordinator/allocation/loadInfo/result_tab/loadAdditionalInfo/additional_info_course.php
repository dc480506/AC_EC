<?php
    include_once('../../../../verify.php');
    include_once('../../../../../config.php');
    $data = json_decode(file_get_contents("php://input"),true); 
    $cid=$data['cid'];
    $sql="SELECT COUNT(*) as no_of_allocated FROM `{$_SESSION['student_course_table']}` WHERE cid='$cid'";
    $total_result=mysqli_query($conn,$sql);
    $total=mysqli_fetch_assoc($total_result)['no_of_allocated'];
    $sql="SELECT COUNT(*) as dept_count,dept_name,d.dept_id FROM `{$_SESSION['student_course_table']}` sct 
            INNER JOIN student s INNER JOIN department d ON s.email_id=sct.email_id AND s.dept_id=d.dept_id
            AND sct.cid='$cid' GROUP BY dept_name ORDER BY dept_count desc";
    $result_dept=mysqli_query($conn,$sql);
    $html_dept_status="";
    $dept_present="'".$exclude_dept."',";
    while($row=mysqli_fetch_assoc($result_dept)){
        $html_dept_status.=
        '<tr>
           <td class="text-info"><small>'.$row['dept_name'].'</small></td>
           <td class="text-info"><small>'.$row['dept_count'].'</small></td>
           <td class="text-info"><small>'.round(($row['dept_count']/$total)*100,2).'%</small></td>
        </tr>
         ';
         $dept_present.="'".$row['dept_id']."',";
    }
    $dept_present=substr($dept_present,0,strlen($dept_present)-1);
    $sql="SELECT dept_name FROM department WHERE dept_id NOT IN ($dept_present)";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $html_dept_status.=
        '<tr>
            <td class="text-info"><small>'.$row['dept_name'].'</small></td>
            <td class="text-info"><small>0</small></td>
            <td class="text-info"><small>0.00%</small></td>
        </tr>';
    }
    $response_dept_status=
        '<table class="table table-bordered" id="dataTable-dept-allotted" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="font-weight-bold mb-0"><small><b>Department Name</b></small></th>
                    <th class="font-weight-bold mb-0"><small><b>No. of Students Allotted</b></small></th>
                    <th class="font-weight-bold mb-0"><small><b>Percentage of Students Allotted</b></small></th>
                </tr>
            </thead>
            <tbody>
                '.$html_dept_status.'
            </tbody>
         </table>';
    $sql="SELECT COUNT(*) as pref_no_count,pref_no FROM `{$_SESSION['student_course_table']}` sct INNER JOIN `{$_SESSION['pref_student_alloted_table']}` psa
         ON sct.cid='$cid' AND sct.email_id=psa.email_id GROUP BY pref_no";
    $result=mysqli_query($conn,$sql);
    $html_pref_status="";
    while($row=mysqli_fetch_assoc($result)){
        $html_pref_status.=
        '<tr>
        <td class="text-info"><small>Preference '.$row['pref_no'].'</small></td>
        <td class="text-info"><small>'.$row['pref_no_count'].'</small></td>
        <td class="text-info"><small>'.round(($row['pref_no_count']/$total)*100,2).'%</small></td>
     </tr>';
    }
    $response_pref_status=
       '<table class="table table-bordered" id="dataTable-pref-allotted" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="font-weight-bold mb-0"><small><b>Preference No</b></small></th>
                    <th class="font-weight-bold mb-0"><small><b>No. of Students Allotted</b></small></th>
                    <th class="font-weight-bold mb-0"><small><b>Percentage of Students Allotted</b></small></th>
                </tr>
            </thead>
            <tbody>
                '.$html_pref_status.'
            </tbody>
        </table>
       ';
    echo '
    <!--<style>
    .vertical { 
        border-left: 0.5px solid black; 
        height: 200px; 
        position:absolute; 
        left: 50%; 
                } 
    </style>-->
    <div class="container">
        <div class="row ">
            <div class="col-lg-4 col-md-4">
               <h6 class="font-weight-bold  mb-2">Department-Wise Distribution: </h6>
                <div class="table-responsive">
                    '.$response_dept_status.'
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
            </div>
            <!--<div class="vertical"></div>-->
            <div class="col-lg-5 col-md-5">
               <h6 class="font-weight-bold  mb-2">Preference-Wise Distribution: </h6>
                <div class="table-responsive">
                    '.$response_pref_status.'
                </div>
            </div>
        </div>
    </div    
                    ';
    // $preferences="";
    // $i=1;
    // for(;$i<$_SESSION['no_of_preferences'];$i++){
    //     $preferences.="pref".$i.",";
    // }
    // $preferences.="pref".$i;
    // $sql_response="SELECT ".$preferences." FROM `{$_SESSION['student_pref']}` WHERE email_id='".$email_id."'";
    // $result=mysqli_query($conn,$sql_response);
    // $row=mysqli_fetch_assoc($result);
    // // var_dump($row);
    // $preference_list="";
    // for($i=1;$i<=$_SESSION['no_of_preferences'];$i++){
    //     $cid=$row['pref'.$i];
    //     if(strpos($cid,"same")!==false){
    //         $preference_list.="<p><small>".$i.") <i>".$cid."</i></small></p>";
    //     }else{
    //         $preference_list.="<p><small>".$i.") ".$courses[$cid]." <i>(".$cid.")</i></small></p>";
    //     }
    // }
    // echo '
    //     <div class="form-row">
    //         <div class="form-group col-md-6">
    //             <label for="added_by"><b>Preference List: </b></label>
    //             '.$preference_list.'
    //         </div>
    //     </div>';
?>