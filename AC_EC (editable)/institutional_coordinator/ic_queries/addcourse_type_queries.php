<?php
session_start();
if (isset($_SESSION['email']) && $_SESSION['role'] == "inst_coor") {
    include_once("../../config.php");
    //For Course deletion
    if (isset($_POST['add_new_course_type'])) {
        $course_type_name = mysqli_escape_string($conn, $_POST['courseTypeName']);
        $program = mysqli_escape_string($conn, $_POST['program']);
        $sql = "insert into course_types(name,program) values ('$course_type_name','$program')";

        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        echo "added";
    } else if (isset($_POST['get_course_types'])) {
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows display per page
        $orderQuery = " ORDER BY program desc";
        $searchValue = $_POST['search']['value']; // Search value


        ## Search 
        $searchQuery = "1";
        if ($searchValue != '') {
            $searchQuery = "name like '%" . $searchValue . "%' or program like '%" . $searchValue . "%' ";
        }

        ## Total number of records without filtering
        $sel = mysqli_query($conn, "select count(*) as totalcount from course_types");
        $records = mysqli_fetch_assoc($sel);
        $totalRecords = $records['totalcount'];

        ## Total number of record with filtering
        $sel = mysqli_query($conn, "select count(*) as totalcountfilters  from course_types WHERE " . $searchQuery);
        $records = mysqli_fetch_assoc($sel);
        $totalRecordwithFilter = $records['totalcountfilters'];


        $sql = "select  * from course_types WHERE " . $searchQuery  . $orderQuery . " limit " . $row . "," . $rowperpage;
        // echo $sql;
        $courseTypeRecords = mysqli_query($conn, $sql);
        $data = array();
        $count = 0;
        $fullname = "";
        while ($row = mysqli_fetch_assoc($courseTypeRecords)) {
            //   if($row['mname']!='')
            //    {$fullname=$row['fname']." ".$row['mname']." ".$row['lname'];}
            //   else 
            //     {$fullname=$row['fname']." ".$row['lname'];}
            $data[] = array(
                // "select-cbox"=>'<input type="checkbox">',
                "select-cbox" => '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input selectrow" id="selectrow' . $count . '">
                        <label class="custom-control-label" for="selectrow' . $count . '"></label>
                        </div>',
                "course_type_id" => $row['id'],
                "name" => $row['name'],
                "program" => $row['program'],
                // "name" => $row['name'],
                // "current_sem" => $row['current_sem'],
                // "dept_name" => $row['dept_name'],
                // "year_of_admission" => $row['year_of_admission'],
                // "action"=>'<button type="button" class="btn btn-primary icon-btn action-btn" data-toggle="modal" data-target="#exampleModalCenter'.$count.'">
                //                <i class="fas fa-tools"></i>
                //             </button>'
                "action" => '<div class="row"><button type="button" id="" class="btn btn-primary mx-1 icon-btn action-btn edit-button">
                <i class="fas fa-pen   "></i>
                  </button><button type="button" id="" class="btn btn-danger mx-1 icon-btn action-btn delete-button">
                  <i class="fas fa-trash   "></i>
                  </button></div>',

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
    } elseif (isset($_POST["delete_course_type"])) {
        $course_type_id = mysqli_escape_string($conn, $_POST['course_type_id']);
        $sql = "DELETE from course_types where id = '$course_type_id'";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        echo "deleted";
    } else if (isset($_POST["edit_course_type"])) {
        $course_type_id = mysqli_escape_string($conn, $_POST['courseTypeId']);
        $course_type_name = mysqli_escape_string($conn, $_POST['courseTypeName']);
        mysqli_escape_string($conn, $_POST['courseTypeId']);
        $sql = "UPDATE course_types set name='$course_type_name' where id = '$course_type_id'";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        echo "edited";
    } else {
        die(json_encode($_POST));
    }
}
