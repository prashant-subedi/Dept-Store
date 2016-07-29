<?php
require_once "config.php";
if(!isset($_GET['id']) ){
    die("Server Error");
}
if(isset($_POST['submit'])){
    ob_start();
    echo "qwqwedadasd";
    $id=$_GET['id'];
    $database->query("DELETE FROM Employee WHERE employee_id=$id");
    header("Location:/dept_store/employee.php");
}
$id=$_GET['id'];
$query="SELECT empPhone.phone_no ,Employee.*,
  Bank.*,
  Manager.employee_id as manager_id,Manager.employee_first_name as manager_first_name,Manager.employee_last_name as manager_last_name
  FROM Employee LEFT JOIN RelManages 
  ON Employee.employee_id=RelManages.employee_id 
  LEFT JOIN Employee as Manager ON
  RelManages.manager_id=Manager.employee_id LEFT  JOIN Bank
  ON Employee.bank_id=Bank.bank_id  LEFT JOIN empPhone ON Employee.employee_id=empPhone.employee_id
  WHERE Employee.employee_id = $id ";

if($profile=$database->query($query)){
    $profile = $profile->fetch_assoc();
    $query="SELECT date_start,date_end FROM Vacation WHERE employee_id=$id;";
    extract($profile);
    //TODO IMPLEMENT VACCATIONS HERE!
}
else{
    die("ERROR");
}



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

                <p class="w3-padding-16 w3-xlarge w3-text-teal">Employees</p>
                <div class="w3-section w3-center profile-link">


                    <div class="w3-center">
                        <div>
                            <div class="w3-section">
                                <a class="w3-text-teal" href="/dept_store/employee.php">Back</a>

                            </div>

                            <div class="w3-section">
                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Name</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $employee_first_name.$employee_last_name?></span>
                                    </div>
                                </div>
                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>ID</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $employee_id?></span>
                                    </div>
                                </div>
                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Date Joined</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $date_of_join?></span>
                                    </div>
                                </div>
                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Card Type</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $employee_card_type?></span>
                                    </div>
                                </div>
                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Identification Card No</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $employee_card_no?></span>
                                    </div>
                                </div>
                                <?php
                                if(!empty($manager_id)){
                                    extract($profile);
                                    echo "
                                     <div class=\"w3-container w3-center w3-row-padding\" style=\"width: 60%; min-width: 400px;margin: 0 auto 0;\">
                                    <div class=\"w3-half  w3-padding w3-teal\" id=\"employee-fields\">
                                        <span>Identification Card No</span>
                                    </div>
                                    <div class=\"w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey\" id=\"employee-fields\">
                                        <span>
                                            <a href='/dept_store/employee_profile.php?id=$manager_id'>
                                            $manager_first_name.$manager_last_name </li>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                ";
                                }
                                ?>

                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Address</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $employee_street_address ."  " . $employee_city_address?></span>
                                    </div>
                                </div>
                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Salary</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $employee_salary?></span>
                                    </div>
                                </div>
                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Bank</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $bank_name?></span>
                                    </div>
                                </div>

                                <?php
                                /*echo "<li>"."Id:   ".$profile['employee_id']."</li>".
                                "<li>"."Name:  ".$profile['employee_first_name']." ".$profile['employee_last_name']."</li>".
                                "<li>"."Date Joined:    ".$profile['date_of_join']."</li>";
                                "<li>"."On Vaccation"."</li>";
                                echo "<br>";
                                if(!empty($id=$profile['manager_id'])){
                                extract($profile);
                                echo "<li> Manager:
                                    <a href='/dept_store/employee_profile.php?id=$id'>
                                        $manager_first_name $manager_last_name </li>
                                </a>";
                                }
                                if($_SESSION['level']==10) {
                                echo"Data Only Avialable to Admins. Sharing following information have legal consiquence";
                                echo   "<li>" . "Address:    " . $profile['employee_street_address'] . ",  " . $profile['employee_city_address'] . "</li>" .
                                "<li>" . "Identification Card Type:   " . $profile['employee_card_type'] . "</li>" .
                                "<li>" . "Identification Card No: " . $profile['employee_card_no'] . "</li>" .
                                "<li>" . "Account No. " . $profile['employee_account'] . "</li>" .
                                "<li>" . "Salary: " . $profile['employee_salary'] . "</li>" .
                                "<li>" . "Bank Name:  " . $profile['bank_id'] . "</li>";
                                    }*/

                                ?>

                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Contact</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-border-bottom w3-border-white w3-light-grey" id="employee-fields">
                                        <span><?php echo $phone_no;?></span>
                                    </div>
                                </div>

                                <div class="w3-container w3-center w3-row-padding" style="width: 60%; min-width: 400px;margin: 0 auto 0;">
                                    <div class="w3-half  w3-padding w3-teal" id="employee-fields">
                                        <span>Employee Account Number</span>
                                    </div>
                                    <div class="w3-half  w3-padding w3-light-grey" id="employee-fields">
                                        <span>234982340909324</span>
                                    </div>
                                </div>

                            </div>
                            <div class="w3-center">
                                <form class="w3-container" method="POST" name="delete" action="">
                                    <input name="submit" type="submit" value="Delete">
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