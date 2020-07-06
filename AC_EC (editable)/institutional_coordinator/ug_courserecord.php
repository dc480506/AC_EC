<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>

<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

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
            <form action="courses.php" method="POST">
                <div class="form-group">
                    <h5><label for="FormControlSelect1">Select Course:</label></h5>
                    <select class="form-control" id="FormControlSelect1" name="course">

                    <?php  
                        $query ='SELECT name FROM course_types WHERE program="UG"';
                        $coursetypes = mysqli_query($conn, $query);
                        $rowcount = mysqli_num_rows($coursetypes);
                        echo $row['name'];
                        while($row = mysqli_fetch_array($coursetypes))
                        {
                            $storeArray[]=$row['name'];
                        }
                        for($i=0;$i<$rowcount;$i++)
                        {
                            echo'<option value="'.$storeArray[$i].'">'.$storeArray[$i].'</option>';
                        }
                    ?>

                    </select>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-sm-2 offset-sm-5">
                        <button type="submit" class="btn btn-primary btn-block px-2" name="submit"> Submit </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

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