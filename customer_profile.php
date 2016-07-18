<?php
require_once "config.php";
if(!isset($_GET['id']) ){
    die("Server Error");
}
$id=$_GET['id'];
$query="SELECT * FROM Customer WHERE customer_id=$id ";
if($profile=$database->query($query)){
    $profile = $profile->fetch_assoc();
    if($phone=$database->query("SELECT phone_no FROM customerPhone where customer_id=$id")){

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
echo "<li> $customer_first_name $customer_last_name </li></a>
      <li> Address:     $customer_street_address $customer_city_address  </li>
      <li> Email: Rs $customer_email </li>";
echo    "<li> Phone: ";
        while ($n=$phone->fetch_assoc()){
            echo $n["phone_no"];
            echo "</br>";
        }
echo     "</li>";

echo   "<li> Due Amount: Rs $customer_due_amount </li>
       <li> Payment Date: Rs customer_payment_date</li>";

?>

