<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../vendor/js/sb-admin-2.js"></script>

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
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

<!-- Page level custom scripts -->
<script src="../vendor/js/demo/datatables-demo.js"></script>
<script>
  function disp1() {
    var checkBox = document.getElementById("exampleCheck1");
    var field2 = document.getElementById("exampleFormControlSelect1");
    if (checkBox.checked == true) {
      field2.style.display = "block";

    } else {
      field2.style.display = "none";
    }
  }

  function disp2() {
    var checkBox = document.getElementById("exampleCheck2");
    var field2 = document.getElementById("exampleFormControlSelect2");
    if (checkBox.checked == true) {
      field2.style.display = "block";

    } else {
      field2.style.display = "none";
    }
  }

  function disp3() {
    var checkBox = document.getElementById("exampleCheck3");
    var field2 = document.getElementById("exampleFormControlSelect3");
    if (checkBox.checked == true) {
      field2.style.display = "block";

    } else {
      field2.style.display = "none";
    }
  }

  function disp4() {
    var checkBox = document.getElementById("exampleCheck4");
    var field2 = document.getElementById("exampleFormControlSelect4");
    if (checkBox.checked == true) {
      field2.style.display = "block";

    } else {
      field2.style.display = "none";
    }
  }

  function disp5() {
    var checkBox = document.getElementById("exampleCheck5");
    var field2 = document.getElementById("exampleFormControlSelect5");
    if (checkBox.checked == true) {
      field2.style.display = "block";

    } else {
      field2.style.display = "none";
    }
  }

  var oldExportAction = function(self, e, dt, button, config) {
    if (button[0].className.indexOf('buttons-excel') >= 0) {
      if ($.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {
        $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
      } else {
        $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
      }
    } else if (button[0].className.indexOf('buttons-print') >= 0) {
      $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
    }
  };

  var newExportAction = function(e, dt, button, config) {
    var self = this;
    var oldStart = dt.settings()[0]._iDisplayStart;

    dt.one('preXhr', function(e, s, data) {
      // Just this once, load all data from the server...
      data.start = 0;
      data.length = 2147483647;

      dt.one('preDraw', function(e, settings) {
        // Call the original action function 
        oldExportAction(self, e, dt, button, config);

        dt.one('preXhr', function(e, s, data) {
          // DataTables thinks the first item displayed is index 0, but we're not drawing that.
          // Set the property to what it was before exporting.
          settings._iDisplayStart = oldStart;
          data.start = oldStart;
        });

        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
        setTimeout(dt.ajax.reload, 0);

        // Prevent rendering of the full data to the DOM
        return false;
      });
    });

    // Requery the server with the new one-time export settings
    dt.ajax.reload();
  };
</script>


</body>

</html>