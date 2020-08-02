<?php
    session_start();

    if (isset($_SESSION['email']) && ($_SESSION['role'] == "inst_coor"))
    {
        include_once("../../config.php");

        if (isset($_POST['get_logs'])) {
            $draw = $_POST['draw'];
            $row = $_POST['start'];
            $rowperpage = $_POST['length']; // Rows display per page
            $orderQuery = " ORDER BY timestamp desc";
            $searchValue = $_POST['search']['value']; // Search value
    
    
            ## Search 
            $searchQuery = "1";
            if ($searchValue != '') {
                $searchQuery = "performing_user like '%" . $searchValue . "%' or page_affected like '%" . $searchValue . "%' ";
            }
    
            ## Total number of records without filtering
            $sel = mysqli_query($conn, "select count(*) as totalcount from activity_log");
            $records = mysqli_fetch_assoc($sel);
            $totalRecords = $records['totalcount'];
    
            // ## Total number of record with filtering
            $sel = mysqli_query($conn, "select count(*) as totalcountfilters  from activity_log WHERE " . $searchQuery);
            $records = mysqli_fetch_assoc($sel);
            $totalRecordwithFilter = $records['totalcountfilters'];
    
    
            $sql = "select  * from activity_log WHERE " . $searchQuery  . $orderQuery . " limit " . $row . "," . $rowperpage;
            // echo $sql;
            $logs = mysqli_query($conn, $sql);
            $data = array();
            $count = 0;
            
            while ($row = mysqli_fetch_assoc($logs)) {
              
                $data[] = array(
                    // "select-cbox"=>'<input type="checkbox">',
                    "select-cbox" => '<div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input selectrow" id="selectrow' . $count . '">
                            <label class="custom-control-label" for="selectrow' . $count . '"></label>
                            </div>',
                    "log_id" => $row['log_id'],
                    "performing_user" => $row['performing_user'],
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
?>