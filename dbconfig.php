<?php
    $username="prashant";
    $password="prashant";
    $md5pass=md5($password);
    $database=new mysqli('localhost',$username,$password,"dept_store");
    if($database->connect_error) {
        die("Hello Prashant");
    }
?>