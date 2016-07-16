<?php
ob_start();
session_start();
if(!isset($_SESSION["username"])){
    header("Location: /dept_store/login.php");
}
require_once "dbconfig.php";
$http=$_SERVER['SCRIPT_NAME'];
?>