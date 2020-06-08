<?php
  include_once('../../../verify.php');
  include_once('../../../../config.php');
  include_once('../../includes/chart_color_combinations.php');
  $sql="SELECT pref_no,no_of_stu FROM {$_SESSION['pref_percent_table']} WHERE pref_no!='-1' ORDER BY pref_no";
  $result=mysqli_query($conn,$sql);
  $labels=array();
  $data=array();
  $bg_color=array();
  $hover_bg_color=array();
  $i=0;
  while($row=mysqli_fetch_assoc($result)){
      $labels[]="Pref ".$row['pref_no'];
      $data[]=$row['no_of_stu'];
      $bg_color[]=$backgroundColor[$i];
      $hover_bg_color[]=$hover_backgroundColor[$i];
      $i++;
  }
  $labels[]="Unallocated";
  $data[]=$_POST['unallocated'];
  $bg_color[]=$backgroundColor[$i];
  $hover_bg_color[]=$hover_backgroundColor[$i];
?>
<canvas id="chart"></canvas>
<script>
    var ctxP = document.getElementById("chart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
    type: 'pie',
	theme: "light1", // "light1", "light2", "dark1", "dark2"
    data: {
    // labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
    labels:<?php echo json_encode($labels)?>,
    datasets: [{
        data:<?php echo json_encode($data)?>,
        backgroundColor:<?php echo json_encode($bg_color)?>,
        hoverBackgroundColor:<?php echo json_encode($hover_bg_color)?>,
    }]
    },
    options: {
    responsive: true,
    title:{
        display:true,
		text: "Preference-Wise Allotment Chart"
    },
    animationEnabled: true,
	exportEnabled: true,
    }
    });
</script>