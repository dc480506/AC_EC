<?php
session_start();
if (isset($_SESSION['email']) && ($_SESSION['role'] == "inst_coor" || $_SESSION['role'] == 'faculty_co')) {
    include_once("../../config.php");
    //For Course deletion
    if (isset($_POST['add_new_course_type'])) {
        $course_type_name = mysqli_escape_string($conn, $_POST['courseTypeName']);
        $program = mysqli_escape_string($conn, $_POST['program']);
        $is_gradable = mysqli_escape_string($conn, $_POST['is_gradable']);
        $is_closed_elective = mysqli_escape_string($conn, $_POST['is_closed_elective']);
        $sql = "insert into course_types(name,prsogram,is_gradable,is_closed_elective) values ('$course_type_name','$program','$is_gradable',$is_closed_elective) ";
        // echo $sql;

        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            // echo "New record created successfully. Last inserted ID is: " . $last_id;
        } else {
            die(mysqli_error($conn));
        }

        $cid = $last_id;
        $Values = "";
        foreach ($_POST['check_dept'] as $u) {
            $Values .= "('$cid','$u'),";
        };
        $query = "INSERT INTO course_type_applicable_dept VALUES " . substr($Values, 0, strlen($Values) - 1);
        // echo $query;
        mysqli_query($conn, $query);
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
        $role_restriction = "1";
        if ($_SESSION['role'] == 'faculty_co' || $_SESSION['role'] == 'HOD') {
            $role_restriction = "ctad.dept_id = {$_SESSION['dept_id']}";
        }


        ## Total number of records without filtering
        $sel = mysqli_query($conn, "select count(distinct(course_type_id)) as totalcount from course_type_applicable_dept ctad where $role_restriction");
        $records = mysqli_fetch_assoc($sel);
        $totalRecords = $records['totalcount'];

        ## Total number of record with filtering
        $sel = mysqli_query($conn, "select count(*) as totalcountfilters  from course_types WHERE " . $searchQuery);
        $records = mysqli_fetch_assoc($sel);
        $totalRecordwithFilter = $records['totalcountfilters'];

        $sql = "select  * from course_types inner join (select distinct course_type_id from course_type_applicable_dept ctad where $role_restriction) as cta on cta.course_type_id = course_types.id  WHERE " . $searchQuery  . $orderQuery . " limit " . $row . "," . $rowperpage;
        // die($sql);
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
                "is_gradable" => $row['is_gradable'] == 0 ? "no" : "yes",
                "is_closed_elective" => $row['is_closed_elective'] == 0 ? "no" : "yes",
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
        $is_gradable = mysqli_escape_string($conn, $_POST['is_gradable']);
        $is_closed_elective = mysqli_escape_string($conn, $_POST['is_closed_elective']);

        // mysqli_escape_string($conn, $_POST['courseTypeId']);
        $sql = "UPDATE course_types set name='$course_type_name',is_gradable='$is_gradable',is_closed_elective='$is_closed_elective' where id = '$course_type_id'";
        // echo $sql;
        mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //Department applicable updation start
        $query = "SELECT dept_id from course_type_applicable_dept where course_type_id = '$course_type_id'";
        // echo $query;
        $result = mysqli_query($conn, $query);
        $delete_dept = array();
        $insert_dept = array();
        $row_dept = array();
        // echo "Prev dept: ";
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($row_dept, $row['dept_id']);
            // echo $row['dept_id']." ";

        }
        // echo "DElete dept: ";
        foreach ($row_dept as $r) {
            if (!in_array($r, $_POST['check_dept'])) {
                array_push($delete_dept, $r);
                // echo $r." ";
            }
        }
        // echo "Insert new dept: ";
        foreach ($_POST['check_dept'] as $r) {
            if (!in_array($r, $row_dept)) {
                array_push($insert_dept, $r);
                // echo $r." ";
            }
        }

        if (!empty($delete_dept)) {
            $s = "(";
            foreach ($delete_dept as $r) {
                $s .= "$r,";
            }
            $s = substr($s, 0, strlen($s) - 1);
            $s .= ")";

            $sql1 = "DELETE FROM course_type_applicable_dept WHERE  course_type_id='$course_type_id' AND dept_id IN $s";
            // echo $sql1;
            mysqli_query($conn, $sql1);
        }

        if (!empty($insert_dept)) {
            $Values = "";
            foreach ($insert_dept as $u) {
                $Values .= "('$course_type_id','$u'),";
            }

            $sql1 = "INSERT INTO course_type_applicable_dept VALUES " . substr($Values, 0, strlen($Values) - 1);
            // echo $sql1;
            mysqli_query($conn, $sql1) or die(mysqli_error($conn));
        }
        //Department applicable updation end

        echo "edited";
    } else {
        die(json_encode($_POST));
    }
}
