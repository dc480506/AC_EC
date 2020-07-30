
<?php
//echo "its not in";
include_once('config.php');
include_once('Logger/UserLogger.php');
if (isset($_POST['submit'])) {
  $login_user = mysqli_real_escape_string($conn, $_POST['uname']);
  $Password = mysqli_real_escape_string($conn, $_POST['password']);
  // echo $login_user;
  echo $Password;
  $logger = UserLogger::getLogger();
  $sql = "SELECT l.role,l.email_id,f.dept_id,d.dept_name,l.password FROM login_role l left join (faculty f inner join department d on f.dept_id = d.dept_id) on l.email_id = f.email_id where l.username='$login_user'";
  // die($sql);
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  if ($count > 0) {
    if ($row['password'] == $Password) {

      session_start();
      $logger->loginLog($row["email_id"], $row['role']);
      $_SESSION['username'] = $login_user;
      $_SESSION['email'] = $row['email_id'];
      if ($row['role'] == 'student') {
        $_SESSION['role'] = 'student';
        header("location: student/index.php");
        exit();
      } else if ($row['role'] == 'faculty') {
        $_SESSION['role'] = 'faculty';
        header("location: faculty/index.php");
        exit();
      } else if ($row['role'] == 'faculty_co') {
        $_SESSION['role'] = 'faculty_co';
        $_SESSION['dept_id'] = $row['dept_id'];
        $_SESSION['dept_name'] = $row['dept_name'];
        header("location: institutional_coordinator/index.php");
        exit();
      } else if ($row['role'] == 'HOD') {
        // die(json_encode($row));
        $_SESSION['role'] = 'HOD';
        $_SESSION['dept_id'] = $row['dept_id'];
        $_SESSION['dept_name'] = $row['dept_name'];
        header("location: institutional_coordinator/index.php");
        exit();
      } else if ($row['role'] == 'inst_coor') {
        $_SESSION['role'] = 'inst_coor';
        header("location: institutional_coordinator/index.php");
        exit();
      } else
        echo "<script>
    alert('tera role banaya nahi hai- enjoy!!!!!!!!!!!');
    windows.href.location='index.php';
    </script>";
      //   echo $_SESSION['username']."\n";
      //   echo $_SESSION['email']."\n";
      //   echo $_SESSION['role'];
    } else {
      $logger->invalidLogin($row['email_id']);
    }
  } else {
    echo "<script>
      			alert('username or password incorrect');
          </script>";
    header("location:index.php");
  }
}
