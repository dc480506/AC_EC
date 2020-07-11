<?php
include_once('../verify.php');
include_once('../../config.php');
function createZip($zip, $dir)
{
    if (is_dir($dir)) {

        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {

                // If file
                if (is_file($dir . $file)) {
                    if ($file != '' && $file != '.' && $file != '..') {

                        $zip->addFile($dir . $file);
                    }
                } else {
                    // If directory
                    if (is_dir($dir . $file)) {

                        if ($file != '' && $file != '.' && $file != '..') {

                            // Add empty directory
                            $zip->addEmptyDir($dir . $file);

                            $folder = $dir . $file . '/';

                            // Read data of the folder
                            createZip($zip, $folder);
                        }
                    }
                }
            }
            closedir($dh);
        }
    }
}

// {"username":"IC","email":"IC@somaiya.edu","role":"inst_coor","cid":"2UST511","active":0,"type":"temp",
//     "form_id":"9","program":"UG","form_course_type_ids":["3"],"algorithm_chosen":"previous_sem_marks","sem":"5",
//     "year":"2020-21","no_of_preferences":"8","course_table":"f1094e_course",
//     "course_app_dept_table":"f1094e_course_app_dept",
//     "student_pref":"f1094e_student_pref","student_course_table":"f1094e_student_course_alloted",
//     "course_allocate_info":"f1094e_course_info","pref_percent_table":"f1094e_pref_percent",
//     "pref_student_alloted_table":"f1094e_pref_student_alloted"}

$args = '["' . $_SESSION['sem'] . '","' . $_SESSION['year'] . '","' . $_SESSION['student_pref'] . '","' . $_SESSION['student_course_table'] . '","' . $_SESSION['course_allocate_info'] . '","' . $_SESSION['course_table'] . '","' . $_SESSION['pref_percent_table'] . '","' . $_SESSION['pref_student_alloted_table'] . '","' . $_SESSION['course_app_dept_table'] . '","' . $_SESSION['no_of_preferences'] . '","' . $servername . '","' . $username . '","' . $password . '","' . $dbname . '","' . $_SESSION['program'] . '","' . $_SESSION['form_id'] . '","' . $base_dir . ' "]';
$cmd = 'python ./result_gen.py ' . $args;
$output = shell_exec($cmd . " 2>&1");
echo $output;
$filepath = explode("+", $output)[1];
$filepath = substr($filepath, 0, strlen($filepath) - 1);
$download_folder_name = substr($filepath, strlen($base_dir));
$zip = new ZipArchive();
$filename = $base_dir . $download_folder_name . ".zip";
echo $filename;
if ($zip->open($filename, ZipArchive::CREATE) !== TRUE) {
    exit("cannot open <$filename>\n");
}



// Create zip
createZip($zip, $filepath);

$zip->close();


// Create zip


header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filename));
flush(); // Flush system output buffer
readfile($filename);
// die();

echo '<br><br><br>';

// $unallocated_query = "SELECT * FROM {$_SESSION['student_pref']} WHERE email_id not in (select email_id from {$_SESSION['student_course_table']})";


echo json_encode($_SESSION);
