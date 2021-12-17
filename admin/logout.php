<?php
session_start();

session_unset('username');
$_GLOBALS['message'] = 'Logout Successfully';
header("Location: ../index.php");
?>