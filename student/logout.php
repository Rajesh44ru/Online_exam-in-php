<?php
session_start();

session_unset('username');
if (isset($_COOKIE['student_exam_id'])) {
    unset($_COOKIE['student_exam_id']);
    setcookie('student_exam_id', null, -1, '/');
}

$_GLOBALS['message'] = 'Logout Successfully';
header("Location: ../index.php");
?>