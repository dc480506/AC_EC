<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../vendor/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../vendor/js/demo/chart-area-demo.js"></script>
<script src="../vendor/js/demo/chart-bar-demo.js"></script>
<script src="../vendor/js/demo/chart-pie-demo.js"></script>
<script src="../vendor/js/demo/chart-horizontal-demo.js"></script>
<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../vendor/js/demo/datatables-demo.js"></script>
<script>
  function myFunction() {
    var checkBox = document.getElementById("exampleCheck1");
    var field1 = document.getElementById("previous_field1");
    var field2 = document.getElementById("previous_field2");
    var field3 = document.getElementById("previous_field3");
    if (checkBox.checked == true) {
      field1.style.display = "block";
      field2.style.display = "block";
      field3.style.display = "block";

    } else {
      field1.style.display = "none";
      field2.style.display = "none";
      field3.style.display = "none";
    }
  }

  
  function myFunction1() {
    var checkBox = document.getElementById("exampleCheck1");
    var field2 = document.getElementById("exampleFormControlSelect1");
    if (checkBox.checked == true) {
      field2.style.display = "block";

    } else {
      field2.style.display = "none";
    }
  }
</script>


</body>

</html>