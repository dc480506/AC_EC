<?php 
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
include('sidebar.php');
include('../includes/topbar_student.php');
$course=array();
$course_types=array();
$index=0;
$form_id=$_GET['form_id'];
$_SESSION['form_id']=$form_id;
// echo $form_id;


date_default_timezone_set('Asia/Kolkata');
$today = date("Y-m-d H:i:s");
$sql1="SELECT f.sem,f.year,f.start_timestamp,f.end_timestamp,f.no_of_preferences,f.currently_active from form f where form_id=$form_id ";

// echo $sql1;
$email_id=$_SESSION['email'];
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);
$endTime = new DateTime($row1['end_timestamp']);
$_SESSION['sem']=$row1['sem'];
$_SESSION['year']=$row1['year'];
$_SESSION['currently_active']=$row1['currently_active'];
$_SESSION['no_of_preferences']=$row1['no_of_preferences'];

$sql3="select c.name from form_course_category_map fccm,course_types c where fccm.form_id=$form_id AND fccm.course_type_id=c.id ";
// echo $sql3."</br>";
$result3 = mysqli_query($conn, $sql3);

// $row3=mysqli_fetch_assoc($result3);

// {$_SESSION['form_id']}

        $sql2=  "SELECT c.cname,c.cid,c.year FROM course c , student s WHERE c.sem=".$row1['sem']." AND c.year='".$row1['year']."' AND s.email_id='".$email_id."' AND s.dept_id IN (SELECT dept_id FROM course_applicable_dept cad WHERE cad.cid=c.cid AND cad.sem=c.sem AND cad.year=c.year) AND c.course_type_id IN (SELECT course_type_id from form_course_category_map fccm where fccm.form_id=$form_id ) EXCEPT (SELECT hsc.cname, hsc.cid,hsc.year FROM hide_student_course hsc INNER JOIN student ON  hsc.sem=".$row1['sem']."  AND hsc.email_id='".$email_id."' )";
        // echo $sql2;
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
                    <h1 class="h3 mb-4 text-gray-800">
                        <?php
                        $i=0;
                        while($row3 = mysqli_fetch_array($result3)){
                            $course_types[$i]=$row3;
                            $i++;
                            echo $row3['name']." ";                                        
                        }
                        ?>
                      Form</h1>
                    </div>
                    <div class="row align-items-center">
                        <h5 class="card-description"> Courses </h5>
                        <br>    
                    </div>
                    <div class="row float-right text-danger" id="response">
                    </div>
                     
                </div>
                <div class="card-body">
                    <!-- echo $_SERVER['PHP_SELF']; -->
                  
                    <form id="prefForm" onsubmit="return confirmpref();" method="post" action="student_queries/store_preference.php">
                        <?php
                            for($i=1;$i<=$row1['no_of_preferences'];$i++){ ?>
                        <h4 style="color:gray;"><?php echo "Preference $i"; ?></h4>
                        <select id="cname<?php echo $i; ?>" class="btn btn-info dropdown-toggle"
                          aria-haspopup="true" aria-expanded="false"
                            name="cname<?php echo $i; ?>" style="color:#ffffff;" required>
                            <!-- btn btn-primary dropdown-toggle -->
                            <option hidden="false" value="">--------</option>
                            <div class="dropdown-menu">
                                <?php 
                                foreach ($course as $key)
                                {
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
                        <button id="ResetForm" type="reset" class="btn btn-danger align-center" >Reset</button>
                        <button id="button" type="submit" class="btn btn-primary align-center" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
</div>


<script type="text/javascript">

function confirmpref(){
             
        if(confirm("Are you sure you want to submit the selected preferences?"))
        {

            return true;
        }
        else
        {
            return false;
        }
    };


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
       
        <script type="text/javascript">
        var m=new Date("<?php echo " ". date_format($endTime,"Y m d H:i:s") ?>");
        // console.log(m);
        // var countDownDate = new Date("June 28, 2020 13:59:00").getTime();
        var countDownDate=(m.getTime());
        
        var x = setInterval(function() {
        // Get today's date and time
        var now1 = new Date();
        var now=now1.getTime();
        
        // Find the distance between now and the count down date
        var distance = countDownDate - now; 
        // console.log(distance);
        if(now<countDownDate || (distance>-1000) )
        {
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
        document.getElementById("response").innerHTML = `<p style="font-size:17px;"><i class="fas fa-stopwatch" style="font-size:30px;"></i>&nbsp;`+ "Form closes in " +days+" days, "  + hours + " hours, "
        + minutes + " minutes " +"and " +seconds + " seconds.";   
 
        // console.log("now1:"+now1);
        // console.log(m);
        var res=(now1.toString()).localeCompare(m.toString());

        if (distance > 0 && distance<1000) {
            console.log("ho");
            // window.location.reload();
            document.getElementById("response").innerHTML = "";   
              
        }

        else if(res==0)
        {
            console.log("hi");
            window.location.reload();
            document.getElementById("response").innerHTML = "";   
            clearInterval(x); 
        }
    }   
        }, 1000);

       
    var ar=[];
    $('#ResetForm').click(function() {

        var elems = document.getElementsByTagName('option');
        for (var i=0, iLen=elems.length; i<iLen; i++) {
        elems[i].disabled = false;
        }
        console.log(elems);
        document.getElementById('prefForm').reset();         
    });     
        </script>
      
<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>