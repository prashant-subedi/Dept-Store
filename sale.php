<!DOCTYPE html>
<?php
ob_start();
require_once "config.php";
if(isset($_POST["productid"])){
    $pid=$_POST["productid"];
    if(isset($_POST["next"])){
        echo $pid;
        $database->query("INSERT INTO CurrentTransaction VALUES($pid)");
        echo $database->error;
    }else if(isset($_POST["finish"])){
        echo $pid;
        $database->query("INSERT INTO CurrentTransaction VALUES($pid)");
        header("Location:  /dept_store/transaction.php");
        $pids=$database->query("SELECT * FROM CurrentTransaction");
    }
}
else{

}
?>
<html>
<head>
    <title>Products | Department Store Management System</title>
    <link rel="stylesheet" type="text/css"href="w3.css"/>
    <link rel="stylesheet" type="text/css"href="stylesheet.css"/>
</head>
<body>
<div class="w3-container">
    <!-- Header Section -->
    <div class="w3-center">
        <p class="w3-section w3-text-teal w3-large">Welcome <br>to <br>Department Store Management System</p>
    </div>


    <div class="w3-container">

        <div class="" style="width: 50%; margin: 0 auto 0;">
            <div class="w3-container">
                <div class="w3-section">
                    <a class="w3-text-teal" href="/dept_store/">Back</a> </div>
                <div class="w3-section w3-card-4 ">
                    <div class="w3-teal" style="height: 50px;">
                        <h4 class="w3-center">Sales</h4> </div>
                    <div class="w3-center w3-padding">
                        <form action="sale.php" method="POST">
                            <input class="w3-input w3-border" style="" type="text" name="productid" placeholder="Enter Product ID" required="" />

                            <input class="w3-btn w3-teal w3-margin-top" type="submit" name="next" value="Next Product" />
                            <input class="w3-btn w3-teal w3-margin-top" type="submit" name="finish" value="Finish Sale" /> </form>

                    </div>

                </div>
            </div>
        </div>



    </div>
    <!-- Footer Section -->
    <div class=" w3-container w3-section w3-center footer">
        <hr>
        <div class="w3-section">
            <a class="w3-text-teal" href="">Logout</a>
        </div>
        <div>
            <p class="w3-text-grey w3-small">A DBMS Mini Project for COMP 232</p>
            <p class="w3-text-grey w3-small">Powered by Team Sudo <br> CE 2nd Year 2nd Semester <br>Kathmandu University <br> Dhulikhel, Kavre.</p>



        </div>
    </div>
</body>
</html>
