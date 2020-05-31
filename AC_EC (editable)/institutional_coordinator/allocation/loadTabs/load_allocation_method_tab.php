<?php 
 include_once('../../verify.php');
?>
<div class="tab-pane fade show active" id="nav-allocate-method" role="tabpanel" aria-labelledby="nav-allocate-method-tab">
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
                <button type="submit" class="btn btn-primary align-center" name="allocate">Next</button>
            </div>
        </div>
    </form>
</div>
<script>
    $("#allocation_method").submit(function(e){
        e.preventDefault();
        var form=$(this);
        form_serialize=form.serializeArray();
        console.log(form_serialize);
        $("#nav-allocate-method-tab").removeClass("active")
        $("#nav-allocate-method-tab").addClass("disabled")
        $.ajax({
            type:"POST",
            url:"loadTabs/load_course_selection_tab.php",
            data:form_serialize,
            beforeSend:function(){
            //Loader daalna hai baadme
            },
            success:function(html){
                $("#nav-course-tab").removeClass("disabled")
                $("#nav-tabContent").html(html)
                $("#nav-course-tab").addClass("active")
            }
        })
    })
</script>