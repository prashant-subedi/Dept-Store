<?php
require_once "config.php";
if(!isset($_GET['id']) ){
    die("Server Error");
}
$id=$_GET['id'];
$query="SELECT Employee.*,
  Manager.employee_id as manager_id,Manager.employee_first_name as manager_first_name,Manager.employee_last_name as manager_last_name
  FROM Employee LEFT JOIN RelManages 
  ON Employee.employee_id=RelManages.employee_id 
  LEFT JOIN Employee as Manager ON
  RelManages.manager_id=Manager.employee_id 
  WHERE Employee.employee_id = $id;";

if($profile=$database->query($query)){
    $profile = $profile->fetch_assoc();
    $query="SELECT date_start,date_end FROM Vacation WHERE employee_id=$id;";

    //TODO IMPLEMENT VACCATIONS HERE!
}
else{
    die("ERROR");
}
echo "<li>"."Id:   ".$profile['employee_id']."</li>".
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

    }


?>

