<!-- Sidebar -->


<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon ">
      <i class="far fa-user"></i>
    </div>
    <div class="sidebar-brand-text mx-3">
      <?php
      if ($_SESSION['role'] == "inst_coor") {
        echo "INSTITUTIONAL COORDINATOR";
      } else if ($_SESSION['role'] == 'faculty_co') {
        echo "FACULTY COORDINATOR " . strtoupper($_SESSION['dept_name']);
      } else if ($_SESSION['role'] == 'HOD') {
        echo "HOD " . strtoupper($_SESSION['dept_name']);
      }
      ?>
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-chalkboard-teacher"></i>
      <span>Users</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="addstudent.php">Student</a>
        <a class="collapse-item" href="addfaculty_internal.php">Internal faculty</a>
        <a class="collapse-item" href="addfaculty_external.php">External faculty</a>
      </div>
    </div>
  </li>

  <!-- changed -->
  <!-- Divider -->
  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link" href="addnewcourseType.php">
      <i class="fas fa-book"></i>
      <span>Course Types</span></a>
  </li>


  <hr class="sidebar-divider">

  <!-- Nav Item - Utilities Collapse Menu -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Course Records</span>
    </a>
    <div id="collapsePages4" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <!-- <a class="collapse-item" href="addcourse_ac.php">Audit Course</a> -->

        <a class="collapse-item" href="courses_landing.php?program=UG">UG</a>
        <a class="collapse-item" href="courses_landing.php?program=PG">PG</a>
        <a class="collapse-item" href="courses_landing.php?program=PHD">PHD</a>


      </div>
    </div>
  </li>

  <!-- <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages10" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-user-graduate"></i>
      <span>Student Allocation</span></a>
    </a>
    <div id="collapsePages10" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="studentallocation.php">Audit Course</a>
        <a class="collapse-item" href="studentallocation_idc.php">Interdisciplinary Course</a>
        <a class="collapse-item" href="studentallocation_cec.php">Close Elective Course</a>
        <a class="collapse-item" href="studentallocation_oec.php">Open Elective Course</a>

      </div>
    </div>
  </li> -->


  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link" href="prepare_form.php">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Prepare Form</span></a>
  </li>


  <hr class="sidebar-divider">
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="upload_marks.php">
      <i class="fas fa-file"></i>

      <span>Marks</span></a>
  </li>

  <hr class="sidebar-divider">
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link" href="activitylog.php">
      <i class="fas fa-user-clock" style="font-size:15px"></i>

      <span>Activity Log</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>


</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->

<script>
  // // When we click on the LI
  // $("li").click(function(){
  //   // If this isn't already active
  //   if (!$(this).hasClass("active")) {
  //     // Remove the class from anything that is active
  //     $("li.active").removeClass("active");
  //     // And make this active
  //     $(this).addClass("active");
  //   }
  // });
</script>

<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">