<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>

<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>
<?php $program = $_GET['program'] ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="font-weight-bold text-primary mb-0">Undergraduate Course Records</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="courses.php" method="GET" id="courseTypesForm">
                <div class="form-group">
                    <h5><label for="FormControlSelect1">Select Course:</label></h5>
                    <input type="text" name="program" hidden value="<?php echo $program; ?>" />
                    <input type="text" id='is_closed_elective' name="is_closed_elective" hidden />
                    <select class="form-control" id="course_type_select" name="course_type_id">

                        <?php
                        $query = "SELECT name,id,is_closed_elective FROM course_types WHERE program='$program'";
                        $coursetypes = mysqli_query($conn, $query);
                        $rowcount = mysqli_num_rows($coursetypes);

                        while ($row = mysqli_fetch_array($coursetypes)) {
                            echo "<option value='" . $row['id'] . "' data-isClosed='{$row['is_closed_elective']}'>" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-sm-2 offset-sm-5">
                        <button type="submit" class="btn btn-primary btn-block px-2"> Submit </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#courseTypesForm').submit(function(e) {
        // e.preventDefault();
        console.log($('#is_closed_elective').val())
    })
    $('#course_type_select').change(function(e) {

        $('#is_closed_elective').val($(this).find(':selected').data('isclosed'))

    })
</script>

<!-- <form action="#" method="post">
<select name="Color">
<option value="Red">Red</option>
<option value="Green">Green</option>
<option value="Blue">Blue</option>
<option value="Pink">Pink</option>
<option value="Yellow">Yellow</option>
</select>
<input type="submit" name="submit" value="Get Selected Values" />
</form> -->


<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>