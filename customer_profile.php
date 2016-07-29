
<?php
require_once "config.php";
if(!isset($_GET['id']) ){
    die("Server Error");
}
if(isset($_POST['submit'])){
    ob_start();
    $id=$_GET['id'];
    $database->query("DELETE FROM Customer WHERE customer_id=$id");
    header("Location:/dept_store/costumer.php");
}
$id=$_GET['id'];
$query="SELECT * FROM Customer WHERE customer_id=$id ";
$query2 ="SELECT phone_no FROM customerPhone where customer_id=$id";
if($profile=$database->query($query)){
    $profile = $profile->fetch_assoc();
    if($phone=$database->query($query2)){
	$phone = $phone->fetch_assoc();
	$phone=$phone["phone_no"];
    }
    else{
        die("ERROR");
    }

    //TODO IMPLEMENT VACCATIONS HERE!
}
else{
    die("ERROR");
}
extract($profile);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome | Department Store Management System</title>
    <link rel="stylesheet" type="text/css"href="w3.css"/>
    <link rel="stylesheet" type="text/css"href="stylesheet.css"/>
</head>
<body>
<div class="w3-container">

    <div class="w3-container">

        <div class="w3-section w3-center">
            <p class="w3-center w3-text-teal w3-large">Welcome <br>to <br>Department Store Management System</p>
        </div>

        <div class="w3-container">
            <div class="w3-section w3-center">

                <p class="w3-padding-16 w3-xlarge w3-text-teal">Costumer Profile</p>
                <div class="w3-section w3-center profile-link">


                    <div class="w3-center">
                        <div>
                            <div class="w3-section">
                                <a class="w3-text-teal" href="/dept_store/costumer.php">Back</a>

                            </div>

                            <div class="w3-section">
                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Name</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $customer_first_name." ".$customer_last_name?></span>
                                    </div>
                                </div>
                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Address</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $customer_street_address.$customer_city_address?></span>
                                    </div>
                                </div>
                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Email Address</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $customer_email ?></span>
                                    </div>
                                </div>
                             

                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Contact</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $phone?></span>
                                    </div>
                                </div>

                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Due Amount</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-light-grey" id="employee-fields">
                                        <span><?php echo $customer_due_amount;?></span>
                                    </div>
                                </div>
                                
                                  
                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Payment Date</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $customer_payment_date?></span>
                                    </div>
                                </div>

                            </div>
                            <div class="w3-center">
                                <form class="w3-container" method="POST" name="delete" action="">
                                    <input class="w3-btn w3-teal" name="submit" type="submit" value="Delete">
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class=" w3-container w3-section w3-center footer">
                <div class="w3-section">
                    <a class="w3-text-teal" href="/dept_store/logout.php">Logout</a>
                </div>
                <div>
                    <p class="w3-text-grey w3-small">A DBMS Mini Project for COMP 232</p>
                    <p class="w3-text-grey w3-small">Powered by Team Sudo <br> CE 2nd Year 2nd Semester <br>Kathmandu University <br> Dhulikhel, Kavre.</p>



                </div>
            </div>
        </div>
</body>
</html>

