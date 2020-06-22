<?php 
 include_once('../../verify.php');
 include_once('../../../config.php');
 if(isset($_SESSION['course_table'])){
 mysqli_query($conn,"DROP TABLE `".$_SESSION['course_table'])."`";
 mysqli_query($conn,"DROP TABLE `".$_SESSION['course_app_dept_table'])."`";
 mysqli_query($conn,"DROP TABLE `".$_SESSION['student_course_table'])."`";
 mysqli_query($conn,"DROP TABLE `".$_SESSION['student_pref'])."`";
 mysqli_query($conn,"DROP TABLE `".$_SESSION['course_allocate_info'])."`";
 mysqli_query($conn,"DROP TABLE `".$_SESSION['pref_percent_table'])."`";
 mysqli_query($conn,"DROP TABLE `".$_SESSION['pref_student_alloted_table'])."`";
 }
?>
<div class="tab-pane fade show active" id="nav-allocate-method" role="tabpanel" aria-labelledby="nav-allocate-method-tab">
   <br>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
    </div>
    <br>
    <form action="" id="allocation_method">

        <div class="form-group">
            <br>
            <div class="custom-control custom-switch">
                <input type="radio" class="custom-control-input" id="algo_selection_1" required name="algo_selection" value="fcfs">
                <label class="custom-control-label" for="algo_selection_1">First Come First Serve</label>
            </div>
            <br>
            <div class="custom-control custom-switch">
                <input type="radio" class="custom-control-input" id="algo_selection_2" name="algo_selection" value="previous_sem_marks">
                <label class="custom-control-label" for="algo_selection_2">Previous Semester Marks</label>
            </div>
            <br>
            <div class="custom-control custom-switch">
                <input type="radio" class="custom-control-input" id="algo_selection_3" name="algo_selection" value="cumulative_sem_marks">
                <label class="custom-control-label" for="algo_selection_3">Cumulative Semester Marks</label>
            </div>
            <br>
            <div class="custom-control custom-switch">
                <input type="radio" class="custom-control-input" id="algo_selection_4" name="algo_selection" value="profile_based"> 
                <label class="custom-control-label" for="algo_selection_4">Profile Based</label>
            </div>
            <br>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary align-center" name="allocate" id='next_btn'>Proceed</button>
            </div>
        </div>
    </form>
</div>
<div id="spinner" style="display: none;">
    <img src="loadTabs/ajax-loader.gif" alt="loading" id="img-spinner">
</div>
<style type="text/css">
    #spinner{
        position: fixed;
        top: 50%;
        left:50%;
    }
</style>
<script>
    $("#allocation_method").submit(function(e){
        e.preventDefault();
        var form=$(this);
        form_serialize=form.serializeArray();
        console.log(form_serialize);
        $("#nav-allocate-method-tab").removeClass("active")
        $("#nav-allocate-method-tab").addClass("disabled")
        $("#allocation_method").css("opacity",0.3)
        $.ajax({
            type:"POST",
            url:"loadTabs/load_course_selection_tab.php",
            data:form_serialize,
            beforeSend:function(){
            //Loader daalna hai baadme
                $("#spinner").show();
                $("#next_btn").attr('disabled',true)

            },
            success:function(html){
                $("#nav-course-tab").removeClass("disabled")
                $("#nav-tabContent").html(html)
                $("#nav-course-tab").addClass("active")
            }
        })
    })
</script>