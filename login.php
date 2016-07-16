<!DOCTYPE html>
<?php
    require_once "dbconfig.php";
if (isset($_POST['username'])&&isset($_POST['password'])){
    $username=$_POST['username'];
    $md5pass=md5($_POST['password']);
    $qsrt="select * from Users where username='$username' and password='$md5pass';";
    echo $qsrt;
    if ($qr=$database->query($qsrt)){
        if ( $qr->num_rows==1 ){
             session_start();
             $_SESSION['username'] = $_POST['username'];
             header('Location: /dept_store');
        }else{
            echo "Please enter a valid username and password<br>";
        }
    }
    else{
        echo "Error in query";
    }
}
?>
<html>
<head>
    <title>Department Store Management System</title>
    <link rel="stylesheet" type="text/css"href="w3.css"/>
    <link rel="stylesheet" type="text/css"href="stylesheet.css"/>
</head>
<body >
<div class="w3-container">
    <h1 class="w3-section w3-center w3-text-teal">Welcome <br>to <br>Department Store Management System</h1>
</div>

<div class="w3-container w3-section w3-center" style="width: 400px; margin: 0 auto 0;">

    <div class="w3-section w3-teal w3-padding-4"><h4>Login</h4></div>
    
    <form action="login.php" method="POST"  class="w3-container">
        <input class="w3-input w3-border w3-margin-bottom " type="text" name="username" placeholder="Username" required=""  value="<?php if(isset($username)) echo $username;?>"/>
        <input class="w3-input w3-border w3-margin-bottom" type="password" name="password" placeholder="Password" required=""/>
        <input class="w3-btn w3-margin w3-teal" type="submit" name="login" value="Login"/>
    </form>
</div>
<hr style="width: 75%; margin: 0 auto 0;">
<div class=" w3-container w3-section w3-center footer">
    <div>
        <p class="w3-text-grey w3-small">A DBMS Mini Project for COMP 232</p>
        <p class="w3-text-grey w3-small">Powered by Team Sudo <br> CE 2nd Year 2nd Semester <br>Kathmandu University <br> Dhulikhel, Kavre.</p>



    </div>
</div>


</body>
</html>