<div class="accordion" id="final_allocation_accordion">

<div class="card-header" id="pref_percent_stats">
    <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pref_percent_stats_div" aria-expanded="true" aria-controls="pref_percent_stats_div">
            <h5 class="font-weight-bold text-primary mb-0">Preference-Wise Allotment Stats</h5>
        </button>
    </h2>
</div>

<div id="pref_percent_stats_div" class="collapse show" aria-labelledby="pref_percent_stats" data-parent="#final_allocation_accordion">
    <div class="card-body">
        <?php 
            include_once('../../../config.php');
            $sql="SELECT COUNT(*) as total FROM {$_SESSION['student_pref']}";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $totalResponses=$row['total'];
            $sql="SELECT COUNT(*) as allocated FROM {$_SESSION['student_course_table']}";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $allocated=$row['allocated'];
            $unallocated=$totalResponses-$allocated;
            echo '
            <div class="row align-items-center">
                <div class="col text-left">
                    <h6 class="font-weight-bold text-dark mb-0">
                        Total Responses Collected: '.$totalResponses.'
                    </h6>
                </div>
                <div class="col text-left">
                    <h6 class="font-weight-bold text-success mb-0">
                        No. of Students Allocated: '.$allocated.'
                    </h6>
                </div>
                <div class="col text-left">
                    <h6 class="font-weight-bold text-danger mb-0">
                        No. of Students Unallocated: '.$unallocated.'
                    </h6>
                </div>
            </div>
            ';
        ?>
        <style>
            .text-success{
                color:#2ecc71!important;
            }
        </style>
        <??>
        <div class="container">
            <div class="row ">
                <div class="col-lg-5 col-md-5">
                    <div class="table-responsive">
                        <br>
                        <table class="table table-bordered" id="dataTable-pref-percent" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Preference No</th>
                                    <th>No. of Students Allotted</th>
                                    <th>Percentage of Students Allotted</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="card-body" id="chart-canvas-div" style="position:relative;top:50%;transform:translateY(-50%)">
                        <!-- <canvas id='chart'></canvas> -->
                        <div id="chart-spinner" style="top:50%;left:50%;position:relative">
                            <label><b>Loading Chart </b></label>
                            <img src="loadTabs/ajax-loader.gif" alt="loading" id="img-spinner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-header" id="unallocated_students">
    <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#unallocated_students_div" aria-expanded="false" aria-controls="unallocated_students_div">
        <h5 class="font-weight-bold text-primary mb-0"> Unallocated Students Info</h5>
        </button>
    </h2>
</div>
<div id="unallocated_students_div" class="collapse" aria-labelledby="unallocated_students" data-parent="#final_allocation_accordion">
    <div class="card-body">
        <div class="table-responsive">
            <br>
            <table class="table table-bordered" id="dataTable-unallocated" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Email ID</th>
                        <th>Roll No</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Timestamp</th>
                        <th>Allocate</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Email ID</th>
                        <th>Roll No</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Timestamp</th>
                        <th>Allocate</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="card-header" id="allocated_students">
    <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#allocated_students_div" aria-expanded="false" aria-controls="allocated_students_div">
        <h5 class="font-weight-bold text-primary mb-0"> Allocated Students Info</h5>
        </button>
    </h2>
</div>
<div id="allocated_students_div" class="collapse" aria-labelledby="allocated_students" data-parent="#final_allocation_accordion">
    <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
    </div>
</div>

<div class="card-header" id="course">
    <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#course_div" aria-expanded="false" aria-controls="course_div">
        <h5 class="font-weight-bold text-primary mb-0"> Course Status</h5>
        </button>
    </h2>
</div>
<div id="course_div" class="collapse" aria-labelledby="course" data-parent="#final_allocation_accordion">
    <div class="card-body">   
    </div>
</div>

</div>