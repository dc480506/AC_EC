<?php 
	include('config.php');
  session_start();
  if(isset($_SESSION['email'])){
    if($_SESSION['role']=='student')
    header("location: student/index.php");
  else if($_SESSION['role']=='faculty')
    header("location: faculty/index.php");
  else if($_SESSION['role']=='faculty_co')
    header("location: faculty_coordinator/index.php");
  else if($_SESSION['role']=='inst_coor')
    header("location: institutional_coordinator/index.php");
  }
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<meta name="google-signin-client_id" content="<?php 
    include_once 'config.php';
    echo $CLIENT_ID;  
    ?>">
  <title>Sign In</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
  
  <!-- fontawesome-icons -->
  <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css" type="text/css">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/css/styles.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="vendor/css/signin.css">

<style>
  #msg {
      visibility: hidden;
      min-width: 250px;
      background-color: yellow;
      color: #000;
      text-align: center;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
      z-index: 1;
      right: 30%;
      top: 30px;
      font-size: 17px;
      margin-right: 50px;
  }

  #msg.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
  }

  @-webkit-keyframes fadein {
      from {
          top: 0;
          opacity: 0;
      }

      to {
          top: 30px;
          opacity: 1;
      }
  }

  @keyframes fadein {
      from {
          top: 0;
          opacity: 0;
      }

      to {
          top: 30px;
          opacity: 1;
      }
  }

  @-webkit-keyframes fadeout {
      from {
          top: 30px;
          opacity: 1;
      }

      to {
          top: 0;
          opacity: 0;
      }
  }

  @keyframes fadeout {
      from {
          top: 30px;
          opacity: 1;
      }

      to {
          top: 0;
          opacity: 0;
      }
  }
</style>

</head>
<body>
<section class="login-sec">
  <nav class="navbar sticky-top navbar-expand-lg navbar-light navbar-static-top" >
      <div class="container-fluid">
          <div class="container-fluid">
              <div class="row-fluid" >
                <div class="pull-left logo-container" style="position:fixed;top:0;left:0;margin-left:10px;margin-top:10px">
                  <a class="logo" href="//lms-kjsce.somaiya.edu" title="Home">
                    <img src="vendor/img/somaiya_logo1.png" class="img-responsive" alt="Home" style="height:60px;width:auto;">
                    <img src="vendor/img/somaiya_logo2.jpg" class="img-responsive" alt="Home" style="height:60px;width:auto;">
                  </a>
                </div>

                  <div class="pull-right text-center" style="position:fixed;top:0;right:0;margin-top:10px;margin-right: 10px;">
                      <div class="d-flex justify-content-end social_icon">
                          <a href="https://twitter.com/SomaiyaTrust"><span class="btn btn-primary btn-inverse"><i class="fab fa-twitter"></i></span></a>
                          <a href="https://www.facebook.com/SomaiyaTrust/"><span class="btn btn-primary btn-inverse"><i class="fab fa-facebook-f"></i></span></a>
                          <a href="https://www.youtube.com/user/SomaiyaVidyavihar"><span class="btn btn-primary btn-inverse"><i class="fab fa-youtube"></i></span></a>
                          <a href="https://www.instagram.com/somaiyatrust/"><span class="btn btn-primary btn-inverse"><i class="fab fa-instagram"></i></span></a>
                          <a href="https://kjsce.somaiya.edu/en"><span class="btn btn-primary btn-inverse"><i class="fas fa-globe"></i></span></a>
                      </div> 
                  </div>
              </div>
            </div>
      </div>
  </nav>

  <div class="container my-auto" id="loginContainer" style="width:100%" >
    <div class="sandbox sandbox-correct-pronounciation mt-3">
      <h5 class="heading heading-correct-pronounciation">
        The
        <em>COURSE ALLOCATION SYSTEM</em>
        A portal for managing allocation of courses to students with focus on clearity of process.
      </h5>
    </div>
    <br>
    <div class="row pb-2 ">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin ">
          <div class="card-body">
            <h3 class="card-title text-center headd" s>Sign In</h3>
            <form class="form-signin" method="post" action="loginusername.php" style="width:100%">
              
              <div class="row" style="width:100%">
                <span class="input-icon" style="width:20%">
                  <div class="login100-social-item">
                    <i class="fas fa-user"></i>
                  </div>
                </span>
                <div class="input-text form-label-group" style="width:80%">
                  <input type="username" name="uname" id="inputusername" class="form-control" placeholder="username address"  autofocus>
                  <label for="inputusername">Username</label>
                </div>
              </div> 
            
              <div class="row" style="width:100%">
                <span class="input-icon" style="width:20%">
                  <div class="login100-social-item">
                    <i class="fas fa-lock"></i>
                  </div>
                </span>
                <div class="input-text form-label-group" style="width:80%">
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >  
                <label for="inputPassword">Password</label>
                </div>

                <div class="form-check" style="margin-left: auto;margin-right: auto;">
                  <input type="checkbox" onclick="toggleFunction()" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1" style="color:black">Show Password</label>
                </div>
            
              
              </div>

              <br>
              <button  name="submit" class="btn btn-lg btn-outline-primary btn-block text-uppercase raisedb" type="submit">Sign in</button>
              <br>
              <a class="d-block text-center  mt-2 small linkk" href="forget.php" >Forget your password?</a>
              <hr>
            
              <div class="form-group">
                  <div class="g-signin2"  align="middle" data-width="300" data-height="50" data-theme="dark" data-longtitle="true" data-onsuccess="onSignIn" style="border-radius:20px" >
                  <!-- <div class="btn btn-lg btn-outline-danger btn-block text-uppercase raisedr" ><i class="fab fa-google mr-2" style="height:70%"></i> Sign in with Google</button> -->
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script type="text/javascript">
      function onSignIn(googleUser){
          var profile = googleUser.getBasicProfile();
          var email=profile.getEmail();
          var id_token = googleUser.getAuthResponse().id_token;
          googleUser.disconnect();
          if(email.includes("somaiya.edu")){
              theForm = document.createElement('form');
              theForm.action = 'homepage.php';	//enter the page url you want to redirect the index page to after sign in
              theForm.method = 'post';
              newInput = document.createElement('input');
              newInput.type = 'hidden';
              newInput.name = 'idtoken';
              newInput.value = id_token;
              theForm.appendChild(newInput);
              document.querySelector('#loginContainer').appendChild(theForm);
              theForm.submit();
          }else{
              window.location.href="index.php";
              alert("Please login using Somaiya Mail ID");
          }
      }


      function signOut() {
          var auth2 = gapi.auth2.getAuthInstance();
          auth2.signOut().then(function () {
          alert('User signed out.');
          });
      }


      function toggleFunction() {
      var x = document.getElementById("inputPassword");
      if (x.type === "password") {
          x.type = "text";
      } else {
          x.type = "password";
      }
      }
  </script>
</section>
  <!-- Footer -->
  <footer class=" footer bg-white">
      <div class="container copyright text-center">
          <span class="text-muted">Copyright © 2019-20 KJSCE, All Rights Reserved.Developed by <a class="linkk" href="https://kjsce.somaiya.edu/kjsce" target="_blank">KJSCE SDC</a></span>
      </div>
  </footer>
  <!-- End of Footer -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/js/slick.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="vendor/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="vendor/js/demo/chart-area-demo.js"></script>
    <script src="vendor/js/demo/chart-pie-demo.js"></script>  


</body>

</html>