<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('dbconnection.php');

/* =========================
   SAFE QUERY FUNCTION
========================= */
function runQuery($con, $sql) {
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Database Error: " . mysqli_error($con));
    }

    return $result;
}

/* =========================
   BASIC COUNTS
========================= */

$countFaculty = mysqli_num_rows(runQuery($con, "SELECT * FROM tblfaculty"));

$countDepartment = mysqli_num_rows(runQuery($con, "SELECT * FROM tbldepartment"));

$countAllStudent = mysqli_num_rows(runQuery($con, "SELECT * FROM tblstudent"));

$countAllCourses = mysqli_num_rows(runQuery($con, "SELECT * FROM tblcourse"));

$countAllLevel = mysqli_num_rows(runQuery($con, "SELECT * FROM tbllevel"));

$countAllSemester = mysqli_num_rows(runQuery($con, "SELECT * FROM tblsemester"));

$countAllSession = mysqli_num_rows(runQuery($con, "SELECT * FROM tblsession"));

$countAllStaff = mysqli_num_rows(runQuery($con, "SELECT * FROM tblstaff"));

$countAdmin = mysqli_num_rows(runQuery($con, "SELECT * FROM tbladmin"));

/* =========================
   RESULTS (FINAL RESULTS)
========================= */

$countAllComputed = mysqli_num_rows(runQuery($con, "SELECT * FROM tblfinalresult"));

$countAllDist = mysqli_num_rows(runQuery($con, "SELECT * FROM tblfinalresult WHERE classOfDiploma='Distinction'"));

$countAllUpc = mysqli_num_rows(runQuery($con, "SELECT * FROM tblfinalresult WHERE classOfDiploma='Upper Credit'"));

$countAlllc = mysqli_num_rows(runQuery($con, "SELECT * FROM tblfinalresult WHERE classOfDiploma='Lower Credit'"));

$countAlljp = mysqli_num_rows(runQuery($con, "SELECT * FROM tblfinalresult WHERE classOfDiploma='Pass'"));

$countAllf = mysqli_num_rows(runQuery($con, "SELECT * FROM tblfinalresult WHERE classOfDiploma='Fail'"));

/* =========================
   RESULT TABLE (COURSE LEVEL)
========================= */

$countResultAll = mysqli_num_rows(runQuery($con, "SELECT * FROM tblresult"));

/* =========================
   HELPER INFO (SAFE DEFAULTS)
========================= */


$coutAllStudentCourses = 0;
$countAllStudResult = 0;

if (isset($_SESSION['matricNo'])) {

    $matricNo = $_SESSION['matricNo'];

    $stu = runQuery($con, "SELECT * FROM tblstudent WHERE matricNo='$matricNo'");

    if ($row = mysqli_fetch_array($stu)) {

        $departmentId = $row['departmentId'];

        $courses = runQuery($con, "SELECT * FROM tblcourse WHERE departmentId='$departmentId'");
        $coutAllStudentCourses = mysqli_num_rows($courses);

        $results = runQuery($con, "SELECT * FROM tblfinalresult WHERE matricNo='$matricNo'");
        $countAllStudResult = mysqli_num_rows($results);
    }
}



$departmentName = "";
$facultyName = "";

if (isset($departmentId)) {
    $dep = runQuery($con, "SELECT * FROM tbldepartment WHERE Id='$departmentId'");
    if ($row = mysqli_fetch_array($dep)) {
        $departmentName = $row['departmentName'];
    }
}

if (isset($facultyId)) {
    $fac = runQuery($con, "SELECT * FROM tblfaculty WHERE Id='$facultyId'");
    if ($row = mysqli_fetch_array($fac)) {
        $facultyName = $row['facultyName'];
    }
}

?>