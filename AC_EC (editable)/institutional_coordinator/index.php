<?php
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>
<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-info mb-4">My Profile</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../vendor/img/person1.jpg" class="rounded-circle mx-auto d-block mb-4" alt="..." width="100em" height="100em">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $user = array(
                                        "fname" => "Name",
                                        "lname" => "surname",
                                        "email_id" => "email@gmail.com",
                                        "dept_name" => "Dept."
                                    );
                                    $sql = "select * from login_role lg inner join faculty f inner join department d on f.email_id=lg.email_id and f.dept_id=d.dept_id where lg.email_id = '{$_SESSION['email']}';";
                                    $user_res = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($user_res) > 0) {
                                        $user = mysqli_fetch_assoc($user_res);
                                    }
                                    ?>
                                    <p class="text-dark"> <span><b>Name : </b></span><?php echo "{$user['fname']} {$user['lname']}" ?></p>
                                    <p class="text-dark"> <span><b>Email : </b></span><?php echo "{$user['email_id']}" ?></p>
                                    <p class="text-dark"> <span><b>Department : </b></span><?php echo "{$user['dept_name']}" ?> </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>