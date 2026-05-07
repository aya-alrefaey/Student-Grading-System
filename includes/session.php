<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include(__DIR__ . '/dbconnection.php');

if (isset($_SESSION['staffId'])) {
    $staffId = $_SESSION['staffId'];
}
else if (isset($_SESSION['matricNo'])) {
    $matricNo = $_SESSION['matricNo'];
}
else {
    header("Location: ../index.php");
    exit;
}
?>