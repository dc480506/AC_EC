
<?php
//echo "its not in";
include_once('config.php');
if (isset($_POST['submit'])) {
  $login_user = mysqli_real_escape_string($conn, $_POST['uname']);
  $Password = mysqli_real_escape_string($conn, $_POST['password']);
  // echo $login_user;
  // echo $Password;

  $sql = "SELECT l.role,l.email_id,f.dept_id,d.dept_name FROM login_role l left join (faculty f inner join department d on f.dept_id = d.dept_id) on l.email_id = f.email_id where l.username='$login_user' AND l.password='$Password'";
  // die($sql);
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  // die(json_encode($row));
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    session_start();
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
    echo "<script>
      			alert('username or password incorrect');
          </script>";
    header("location:index.php");
  }
}
