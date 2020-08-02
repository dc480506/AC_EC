<?php
session_start();

$allowed_roles = array("inst_coor", "faculty_co", "HOD");
if (isset($_SESSION['email']) && in_array($_SESSION['role'], $allowed_roles)) {
    include_once("../../config.php");

    if (isset($_POST['get_logs'])) {
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows display per page
        $orderQuery = " ORDER BY timestamp desc";
        $searchValue = $_POST['search']['value']; // Search value
        $role_restriction = "";
        $accessible_roles = array();
        $isaccessible = false;
        foreach ($all_roles as $role => $value) {
            if ($_SESSION["role"] == $role) {
                $isaccessible = true;
            }
            if ($isaccessible) {
                array_push($accessible_roles, $role);
            }
        }
        $role_restriction = "lg.role in ('" . implode("','", $accessible_roles) . "')";

        ## Search 
        $searchQuery = "1";
        if ($searchValue != '') {
            $searchQuery = "performing_user like '%" . $searchValue . "%' or page_affected like '%" . $searchValue . "%' ";
        }

        ## Total number of records without filtering
        $sel = mysqli_query($conn, "select count(*) as totalcount from activity_log al inner join login_role lg on al.performing_user = lg.email_id where $role_restriction");
        $records = mysqli_fetch_assoc($sel);
        $totalRecords = $records['totalcount'];

        // ## Total number of record with filtering
        $sel = mysqli_query($conn, "select count(*) as totalcountfilters  from activity_log al inner join login_role lg on al.performing_user = lg.email_id WHERE $role_restriction and $searchQuery");
        $records = mysqli_fetch_assoc($sel);
        $totalRecordwithFilter = $records['totalcountfilters'];


        $sql = "select  * from activity_log al inner join login_role lg on al.performing_user = lg.email_id WHERE $role_restriction and  $searchQuery   $orderQuery  limit  $row , $rowperpage";
        // echo $sql;
        $logs = mysqli_query($conn, $sql);
        $data = array();
        $count = 0;

        while ($row = mysqli_fetch_assoc($logs)) {

            $data[] = array(
                // "select-cbox"=>'<input type="checkbox">',

                "performing_user" => $row['performing_user'],
                "role" => $all_roles[$row['role']],
                "affected_user" => $row['affected_user'],
                "page_affected" => $row['page_affected'],
                "operation_performed" => $row['operation_performed'],
                "status" => $row['status'],
                "timestamp" => $row['timestamp'],

                // "action" => '<div class="row"><button type="button" id="" class="btn btn-primary mx-1 icon-btn action-btn edit-button">
                // <i class="fas fa-pen   "></i>
                //   </button><button type="button" id="" class="btn btn-danger mx-1 icon-btn action-btn delete-button">
                //   <i class="fas fa-trash   "></i>
                //   </button></div>',

            );
            $count++;
        }
        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        echo json_encode($response);
    }
}
