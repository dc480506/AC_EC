<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
include('sidebar.php');
include('../includes/topbar_student.php');
$course = array();
$index = 0;
$sql = "SELECT sem_type,academic_year FROM current_sem_info WHERE currently_active=1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
// while ($row = mysqli_fetch_assoc($result)) {
if ($row['sem_type'] == 'EVEN') {
    $temp = explode('-', $row['academic_year'])[0];
    $temp += 1;
    $temp2 = "" . ($temp + 1);
    $year_val = $temp . "-" . substr($temp2, 2);
} else {
    $year_val = $row['academic_year'];
}

// TO get timestamp(start as well as end fOr a particular student) OF a FORM
$sql1 = "SELECT f.start_timestamp,f.end_timestamp,f.sem,f.year,f.no_of_preferences FROM form f INNER JOIN student s ON f.curr_sem=s.current_sem where s.email_id='{$_SESSION['email']}' AND f.year='$year_val'";
// echo $sql1;
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1) == 0) { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4">
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
} else {
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
    $_SESSION['no_of_preferences'] = $row1['no_of_preferences'];
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
    if ($row1['start_timestamp'] > $today) { ?>
        <style>
            ::-webkit-scrollbar {
                display: none !important
            }
            option:disabled {
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
                                <h6 style="color:red" class="card-description"> The current form will open
                                    on <?php echo $row1['start_timestamp']; ?>.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    // end timestamp
    else if ($row1['end_timestamp'] < $today) { ?>
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

    else {

        $_SESSION['endTime'] = $row1['end_timestamp'];
        $endTime = new DateTime($_SESSION['endTime']);
        $sem = $row1['sem'];
        $year = $row1['year'];
        $_SESSION['year'] = $year;
        $_SESSION['sem'] = $sem;
        $sql7 = "SELECT * FROM student_form s inner join form f on s.form_id=f.form_id  where  s.email_id='{$_SESSION['email']}' ";
        echo $sql7;
        $result7 = mysqli_query($conn, $sql7);
        if (mysqli_num_rows($result7) > 0) {
            $row7 = mysqli_fetch_assoc($result7);
            if ($row7['form_filled'] == 0) {
                $sql2 = "SELECT course.cname,course.cid,course.year FROM course 
          INNER JOIN student ON course.sem='$sem' AND course.year='$year' AND student.email_id='{$_SESSION['email']}' 
          AND student.dept_id IN(SELECT dept_id FROM course_applicable_dept aca 
                                 WHERE aca.cid=course.cid AND aca.sem=course.sem AND aca.year=course.year) 
          EXCEPT (SELECT hide_student_course.cname, hide_student_course.cid,hide_student_course.year FROM hide_student_course 
                  INNER JOIN student ON hide_student_course.email_id=student.email_id AND hide_student_course.sem='$sem' AND student.email_id='{$_SESSION['email']}')";
                $result2 = mysqli_query($conn, $sql2);
                while ($row2 = mysqli_fetch_array($result2)) {
                    $course[$index] = $row2;
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
                                        <<<<<<< HEAD <h6 class="card-description"> Audit Courses </h6>
                                            =======
                                            <h5 class="card-description"> Audit Courses </h5>
                                            >>>>>>> e489cab50bdd364b7f926b74ba2079c3b0f8d171
                                            <br>
                                </div>
                                    <div class="row float-right text-danger" id="response">
                                    </div>

                                </div>
                                <div class="card-body">
                                    <!-- echo $_SERVER['PHP_SELF']; -->
                                    <<<<<<< HEAD <form id="prefForm" method="post" action="student_queries/store_preference_audit.php">
                                        =======

                                        <form id="prefForm" onsubmit="return confirmpref();" method="post" action="student_queries/store_preference_audit.php">
                                            >>>>>>> e489cab50bdd364b7f926b74ba2079c3b0f8d171
                                            <?php
                                            for ($i = 1; $i <= $row1['no_of_preferences']; $i++) { ?>
                                                <h4 style="color:gray;"><?php echo "Preference $i"; ?></h4>
                                                <select id="cname<?php echo $i; ?>" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="cname<?php echo $i; ?>" style="color:#ffffff;" required>
                                                    <!-- btn btn-primary dropdown-toggle -->
                                                    <option hidden="false" value="">--------</option>
                                                    <div class="dropdown-menu">
                                                        <?php
                                                        foreach ($course as $key) {
                                                            // $_SESSION['year']=$key['year'];
                                                        ?>
                                                            <option style="color:white; " class="dropdown-item me" value="<?php echo $key['cid']; ?>">
                                                                <?php echo "{$key['cname']} ({$key['cid']})"; ?></option>
                                                        <?php } ?>
                                                    </div>
                                                </select>
                                                <br>
                                                <br>
                                            <?php } ?>
                                            <div class="modal-footer">
                                                <button id="ResetForm" type="reset" class="btn btn-danger align-center">Clear</button>
                                            <input type="reset" class="btn btn-danger" id="ResetForm" value="Reset">
                                                 

                                           
                                                    <button id="button" type="submit" class="btn btn-primary align-center" name="submit">Submit</button>

               
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- confirm modal -->
<<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to submit?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to submit the following details?

                <!-- We display the details entered by the user here -->
                     <table class="table">
                    <tr>
                        <th>ID</th>
                        <td id="cidd"></td>
                    </tr>
                    <tr>
                        <th>Course Name</th>
                        <td id="cnam"></td>
                    </tr>
                </table>
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href='#' id="submitc" class="btn btn-success success" name="sub">Submit</a>
                
                
        </div>
      </div>
    </div>
  </div> 

                </div>


            <?php
            } else if ($row7['form_filled'] == 1) {
                //Major bugs in this section 
                $sql5 = "SELECT * FROM student_preference_audit WHERE student_preference_audit.sem='{$_SESSION['sem']}' 
              AND student_preference_audit.year='{$_SESSION['year']}' AND student_preference_audit.email_id='{$_SESSION['email']}'";
                $result5 = mysqli_query($conn, $sql5);
                $row5 = mysqli_fetch_array($result5);
                $c_name = array();
                for ($i = 1; $i <= $row1['no_of_preferences']; $i++) {
                    $sql6 = "SELECT cname,cid FROM course WHERE cid='{$row5["pref" .$i . ""]}'";
                    $result6 = mysqli_query($conn, $sql6);
                    $row6 = mysqli_fetch_array($result6);
                    $c_name[$i] = $row6['cname'];
                    $c_id[$i] = $row6['cid'];
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
                                <div class="card-body text-center">
                                    <h3 style="color:black;">Your submitted preferences <i class="fas fa-clipboard-check"></i></h3>
                                    <br>
                                    <?php for ($i = 1; $i <= $row1['no_of_preferences']; $i++) { ?>
                                        <div class="card bg-danger text-white ">

                                            <div class="card-body shadow mb-1">
                                                <i class="fas fa-check"></i>
                                                <strong>
                                                    <?php echo "Preference " . $i . " :"; ?>
                                                </strong>
                                                <?php echo "{$c_name[$i]} ({$c_id[$i]})"; ?>

                                            </div>
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
        } else { ?>
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


<script type="text/javascript">
    function confirmpref() {

        if (confirm("Are you sure you want to submit the selected preferences?")) {

            return true;
        } else {
            return false;
        }
    }
    // $('#submitBtn').click(function() {
    //     // e.preventDefault();
    //     $('#cidd').text("course id");
    //     $('#cnam').text("course name");

    // });


    $('#submitc').click(function(){
        console.log("hii");
         /* when the submit button in the modal is clicked, submit the form */
        var formm=document.getElementById('prefForm');
        console.log(formm);
    });
    function openModal()
    {
        $('#confirmModal').modal('show');
        $('#submitc').click(function(e){
            e.preventDefault();
       var formm=document.getElementById('prefForm');
        console.log(formm);
        formm.submit();
        });
    }
    $('#prefForm').on('submit', function(e){
        e.preventDefault();
        openModal();
    });
</script>

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
<<<<<<< HEAD <!-- ajax to update timer dynamically -->
    <script type="text/javascript">
        setInterval(() => {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "timer.php", false);
            xmlhttp.send(null);
            document.getElementById("response").innerHTML = xmlhttp.responseText;
        }, 1000);
        

        
        <script type = "text/javascript" >
            var m = new Date("<?php echo " " . date_format($endTime, "Y m d H:i:s") ?>");
        console.log(m);
        // var countDownDate = new Date("June 28, 2020 13:59:00").getTime();
        var countDownDate = (m.getTime());

        var x = setInterval(function() {
            // Get today's date and time
            var now1 = new Date();
            var now = now1.getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;
            console.log(distance);
            if (now < countDownDate || (distance > -1000)) {
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("response").innerHTML = `<p style="font-size:17px;"><i class="fas fa-stopwatch" style="font-size:30px;"></i>&nbsp;` + "Form closes in " + days + " days, " + hours + " hours, " +
                    minutes + " minutes " + "and " + seconds + " seconds.";
                if(distance==0)
                {
                    console.log("here");
                    document.getElementById("response").innerHTML = "Expired";
                    window.location.reload();
                }
                console.log("now1:" + now1);
                console.log(m);
                var res = (now1.toString()).localeCompare(m.toString());

                if (distance > 0 && distance < 1000) {
                    console.log("ho");
                    // window.location.reload();
                    document.getElementById("response").innerHTML = "";

                } else if (res == 0) {
                    console.log("hi");
                    window.location.reload();
                    document.getElementById("response").innerHTML = "";
                    clearInterval(x);
                }
            }
        }, 1000);
           setInterval(() => {
               var xmlhttp=new XMLHttpRequest();
               xmlhttp.open("GET","timer.php",false);
               xmlhttp.send(null);
               document.getElementById("response").innerHTML=xmlhttp.responseText;
           }, 1000);

        var ar = [];
        $('#ResetForm').click(function() {
            console.log("hiiiii0");
            Reset the form
            $('.dropdown-toggle option :selected')
            console.log(ar);
            var elems = document.getElementsByTagName('option');
            for (var i = 0, iLen = elems.length; i < iLen; i++) {
                elems[i].disabled = false;
            }
            console.log(elems);
            document.getElementById('prefForm').reset();

            var selVal = [];
            $(".dropdown-toggle").each(function() {
                selVal.push(this.value);
            });

            $(this).siblings(".dropdown-toggle").find("option").prop("disabled", false);
            $(".dropdown-toggle").eq(0).trigger('change');

            if($(".me").prop("disabled", "disabled"))
            {
                console.log("hey");
                $(".me").prop("disabled", false);
            }

            $('.dropdown-toggle').find('option').prop("disabled", false);
            $('.dropdown-menu').find('option').removeAttr("disabled");
            $(".dropdown-toggle option").prop('disabled',false);

                $(".dropdown-toggle").each(function() {
                    console.log("found");
                    $('.dropdown-toggle').find("option").prop('disabled', false);

            });
               var arr=[];
                $(".dropdown-toggle option:selected").each((i,items)=>{
                    // arr.push(items);

                    // $(items).attr('disabled',false);


                });
                console.log(items);


            var select=$(".dropdown-toggle");
            if(select.find("option"))
            {
                console.log("hi");
            }
            select.find("option:disabled").prop("disabled", false);
            select.find("option").each(function(index,item.attr('disabled',false);


        });
    </script>

        <?php include('../includes/footer.php');
        include('../includes/scripts.php');
        ?>