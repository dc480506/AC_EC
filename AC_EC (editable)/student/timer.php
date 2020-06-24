<?php 
        session_start();
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date("Y-m-d H:i:s");
        $date1=new DateTime($currentTime);
        // echo  " ". date_format($date1,"Y/m/d H:i");
        $endTime = new DateTime($_SESSION['endTime']);
        // echo " ". date_format($endTime,"Y/m/d H:i");
        $interval = $endTime->diff($date1);
        echo $interval->format(" Form closes in %d days, %h hours, %i minutes and %s seconds.");

?>