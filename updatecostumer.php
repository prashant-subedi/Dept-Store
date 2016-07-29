<?php
require_once "config.php";
?>

<!DOCTYPE html>
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
			<span class="w3-section w3-text-grey w3-xlarge">
			Update Information
		</span>
		</div>
		<div class="w3-section">
				<a class="w3-text-teal" href="/dept_store/costumer.php">Back</a>

		</div>
		<!-- This is where the table goes -->
		
		<div class="w3-responsive">
			<table class="w3-table-all"> <!-- Make the table bordered!!! -->
				<tr class="w3-text-teal">
					<th>Costumer Id</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>City</th>
					<th>Street</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Due Amount</th>
					<th>Payment Date</th>
				</tr>

				<tr>
					<form action = "<?php $_PHP_SELF ?>" method = "POST">
					<td><input class="w3-input w3-border-0" type="text" name="costumerid" placeholder="ID"></td>
					<td><input class="w3-input w3-border-0" type="text" name="firstname" placeholder="First Name"></td>
					<td><input class="w3-input w3-border-0" type="text" name="lastname" placeholder="Last Name"></td>
					<td><input class="w3-input w3-border-0" type="text" name="city" placeholder="City"></td>
					<td><input class="w3-input w3-border-0" type="text" name="street" placeholder="Street"></td>
					<td><input class="w3-input w3-border-0" type="text" name="email" placeholder="Email Address"></td>	
					<td><input class="w3-input w3-border-0" type="text" name="phoneno" placeholder="Contact No."></td>
					<td><input class="w3-input w3-border-0" type="text" name="dueamount" placeholder="Due Amount"></td>
					<td><input class="w3-input w3-border-0" type="text" name="paymentdate" placeholder="Date"></td>
				</tr>

				
			</table>
            
            <div class="w3-center">
                <input type="submit" name="submit" value="Insert" class="w3-btn w3-margin-top w3-teal">
            </div> 
		</div>
		</form>

		 
	</div>

	<div class=" w3-container w3-section w3-center footer">
			
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


<?php
$link = mysqli_connect("localhost", "root", "", "dept_store");
$firstname =$lastname = $street = $city = $email = "";
$dueamount = null;
$phoneno = null;
$paymentdate = null;
$costumerid = null;
if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());
    }

  
	if(isset($_POST['submit']))
	{
	$costumerid = mysqli_real_escape_string($link,$_POST['costumerid']);
	$firstname = mysqli_real_escape_string($link,$_POST['firstname']);
	$lastname = mysqli_real_escape_string($link,$_POST['lastname']);
	$paymentdate = $_POST['paymentdate'];
	$street = mysqli_real_escape_string($link,$_POST['street']);
	$city = mysqli_real_escape_string($link,$_POST['city']);
	$email = mysqli_real_escape_string($link,$_POST['email']);
	$dueamount = mysqli_real_escape_string($link,$_POST['dueamount']);
	$phoneno = mysqli_real_escape_string($link,$_POST['phoneno']);
	
	$firstname = !empty($firstname) ? "'$firstname'" : "NULL";
	$lastname = !empty($lastname) ? "'$lastname'" : "NULL";
	$paymentdate = !empty($paymentdate) ? "'$paymentdate'" : "NULL";
	$street = !empty($street) ? "'$street'" : "NULL";
	$city = !empty($city) ? "'$city'" : "NULL";
	$email = !empty($email) ? "'$email'" : "NULL";
	$dueamount = !empty($dueamount) ? "'$dueamount'" : "NULL";
	$phoneno = !empty($phoneno) ? "'$phoneno'" : "NULL";
	
	
	
	
	

}

if($costumerid != ""){


$data = "UPDATE Customer SET
	customer_first_name = COALESCE($firstname,customer_first_name),
	customer_last_name = COALESCE($lastname,customer_last_name),
	customer_city_address = COALESCE($city,customer_city_address),
	customer_street_address = COALESCE($street,customer_street_address),
	customer_email = COALESCE($email,customer_email),
	customer_due_amount = COALESCE($dueamount,customer_due_amount),
	customer_payment_date = COALESCE($paymentdate,customer_payment_date)
	WHERE customer_id = '$costumerid'";

	$database->query("INSERT INTO customerPhone VALUE ($costumerid,$phoneno)");
if(mysqli_query($link, $data)){

    echo "Records Updated successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}
}
// Close connection
mysqli_close($link);


?>
