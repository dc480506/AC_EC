<?php
include('../../config.php');
include_once('../verify.php');
// if(!isset($_SESSION['sem'])){
    $_SESSION['sem']=$_POST['sem'];
    $_SESSION['year']=$_POST['year'];
    $_SESSION['type']=$_POST['type'];
    $_SESSION['no']=$_POST['no'];
    $_SESSION['no_of_preferences']=$_POST['no_of_preferences'];
// }
include('includes/header.php');
?>


<?php include('includes/topbar1.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <style type="text/css">
            .card {
                position: absolute;
                top: 80px;
                left: 0px;
                width: 100%;
            }
        </style>
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="font-weight-bold text-primary mb-0">
                        <?php if($_SESSION['type']=='audit'){
                           echo 'Audit Course Allocation : Semester '.$_SESSION['sem'].' and Academic Year '.$_SESSION['year'];
                        }
                        ?>
                    </h5>
                </div>
                <div class="col text-right">
                    <a id="go-back" href="javascript: history.back()" style="display:none;">
                        << Go back to Forms Page
                    </a>
                    <button id="cancel_allocation"  class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="text" id="cancel_text">Cancel Allocation</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="modal-body" id="allocation-tabs">
            <nav>
                <div class="nav nav-tabs" id="allocation" role="tablist">
                    <a class="nav-item nav-link active" id="nav-allocate-method-tab" data-toggle="tab" href="#nav-allocate-method" role="tab" aria-controls="nav-allocate-method" aria-selected="true">Allocation Method</a>
                    <a class="nav-item nav-link disabled" id="nav-course-tab" data-toggle="tab" href="#nav-course" role="tab" aria-controls="nav-course" aria-selected="true">Course Selection</a>
                    <a class="nav-item nav-link disabled" id="nav-result-tab" data-toggle="tab" href="#nav-result" role="tab" aria-controls="nav-result" aria-selected="false">Allocation Analysis</a>
                    <a class="nav-item nav-link disabled" id="nav-final-allocate-tab" data-toggle="tab" href="#nav-final-allocate" role="tab" aria-controls="nav-final-allocate" aria-selected="false">Final Allocation</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->


<?php include('includes/footer.php');
include('includes/scripts.php');
?>
<script>
    function loadAllocationMethodTab(){
        $.ajax({
            type:"POST",
            url:"loadTabs/load_allocation_method_tab.php",
            success:function(html){
                $("#nav-tabContent").html(html)
            }
        })
    }
    function loadCourseSelectionTab(){
        $.ajax({
            type:"POST",
            url:"loadTabs/load_course_selection_tab.php",
            beforeSend:function(){
            //Loader daalna hai baadme
            },
            success:function(html){
                $("#nav-course-tab").removeClass("disabled")
                $("#nav-tabContent").html(html)
                $("#nav-course-tab").addClass("active")
            }
        })
    }
    // function loadAllocationAnalysisTab(){
    //     $.ajax({
    //         type:"POST",
    //         url:"loadTabs/load_allocation_analysis_tab.php",
    //         beforeSend:function(){
    //         //Loader daalna hai baadme
    //         },
    //         success:function(html){
    //             $("#nav-result-tab").removeClass("disabled")
    //             $("#nav-tabContent").html(html)
    //             $("#nav-result-tab").addClass("active")
    //         }
    //     })
    // }
    $(document).ready(function(){
        loadAllocationMethodTab()
    })
    $("#cancel_allocation").on('click',function(){
        $("#cancel_text").text("Cancelling");
        $("#cancel_allocation").attr('disabled',true);
        $(".nav-item.nav-link").addClass("disabled");
        $(".nav-item.nav-link").removeClass("active");
        $("#nav-tabContent").empty();
        $.ajax({
        type: 'POST',
        url: 'unset_requirements.php',
        success:function(){
            $("#cancel_text").text("Cancellation Successful")
            $("#go-back").show();
        }
    });
    })
</script>