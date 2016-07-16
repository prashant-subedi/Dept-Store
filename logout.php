<?php
ob_start();
session_start();
session_destroy();
header("Location: /dept_store/login.php");
ob_end_flush();
?>