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
  <title>Audit</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/css/styles.css" rel="stylesheet">

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
		<section class="login-section">
			
			<div class="container-fluid">
					<div class="row">
	                    <div class="col-sm-6">
	                        <div class="image-wrapper">
	                            <img class="img-responsive" src="vendor/img/login2.gif" alt="">
	                        </div>
	                    </div>
                     	<div class="col-sm-6">
              			  <div class="content-wrapper label-input">
		                    <h2 class="page-title mb-4">Sign in to Explore</h2>
		                    <form method="post" action="loginusername.php">
		                         <div class="phone-wrapper field-wrapper">
		                            <input type="text" name="uname" placeholder="Username">
		                        </div>
		                        <div class="pass-wrapper field-wrapper">
		                           <input type="password" name="password" placeholder="Password" />
		                        </div>
		                        <input class="form-submit-btn" type="submit" value="Log in" name="submit">
		                       		<a class="form-link create-ac-btn" href="forget.php">Forgot your password? </a>
									<hr>
									<div class="form-group">
  <!-- 				       <button class="btn btn-light btn-block">
                    <img class="mr-3" src="vendor/img/icon-google.svg" data-onsuccess="onSignIn">Log in with Google</button> -->
                    <div class="g-signin2" data-onsuccess="onSignIn" align="middle">
                    <!-- <a href="#" class="google">
                      <span class="fab fa-google"></span>
                    </a> -->
                    </div>
				        </div>
							</form>
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
				document.querySelector('.container-fluid').appendChild(theForm);
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

		</script>
		</section>

      <!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Your Website 2019</span>
    </div>
  </div>
</footer>
      <!-- End of Footer -->
      </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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