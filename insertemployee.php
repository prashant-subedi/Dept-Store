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
			Add Employee
		</span>
		</div>
		<div class="w3-section">
				<a class="w3-text-teal" href="/dept_store/employee.php">Back</a>

				
		</div>
		<!-- This is where the table goes -->
		
		<div class="w3-responsive">
			<table class="w3-table-all"> <!-- Make the table bordered!!! -->
				<tr class="w3-text-teal">
					
					<th>FirstName</th>
					<th>LastName</th>
					<th>Date of Join</th>
					<th>City</th>
					<th>Street</th>
					<th>CardType</th>
					<th>CardNo.</th>
					<th>Bank Account</th>
					<th>Salary</th>
				</tr>

				<tr>
					<form action = "<?php $_PHP_SELF ?>" method = "POST">
					<td><input class="w3-input w3-border-0" type="text" name="firstname" placeholder="FirstName"></td>
					<td><input class="w3-input w3-border-0" type="text" name="lastname" placeholder="LastName"></td>
					<td><input class="w3-input w3-border-0" type="text" name="dateofjoin" placeholder="Date"></td>
					<td><input class="w3-input w3-border-0" type="text" name="city" placeholder="City"></td>
					<td><input class="w3-input w3-border-0" type="text" name="street" placeholder="Street"></td>
					<td><input class="w3-input w3-border-0" type="text" name="cardtype" placeholder="CardType"></td>	
					<td><input class="w3-input w3-border-0" type="text" name="cardno" placeholder="CardNo"></td>
					<td><input class="w3-input w3-border-0" type="text" name="account" placeholder="account"></td>
					<td><input class="w3-input w3-border-0" type="text" name="salary" placeholder="salary"></td>
				</tr>

				
			</table>
            
            <div class="w3-center">
                <input type="submit" name="submit" value="Insert" class="w3-btn w3-margin-top w3-teal">
            </div> 
		</div>
		</form>
		<!-- Pagination -->

		 
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
$firstname =$lastname = $street = $city = $cardtype = $cardno= "";
$dateofjoin = null;
if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());
    }

  
	if(isset($_POST['submit']))
	{
	$firstname = mysqli_real_escape_string($link,$_POST['firstname']);
	$lastname = mysqli_real_escape_string($link,$_POST['lastname']);
	$dateofjoin = $_POST['dateofjoin'];
	$street = mysqli_real_escape_string($link,$_POST['street']);
	$city = mysqli_real_escape_string($link,$_POST['city']);
	$cardtype = mysqli_real_escape_string($link,$_POST['cardtype']);
	$cardno = mysqli_real_escape_string($link,$_POST['cardno']);
	$account = mysqli_real_escape_string($link,$_POST['account']);
	$salary = mysqli_real_escape_string($link,$_POST['salary']);

}

if($firstname != "" || $lastname != "" ){
$data = "INSERT INTO Employee (employee_first_name, employee_last_name, date_of_join, employee_street_address, employee_city_address,employee_account,employee_salary,employee_card_type, employee_card_no) VALUES ( '$firstname', '$lastname', '$dateofjoin', '$street', '$city','$account','$salary' ,'$cardtype', '$cardno')";
if(mysqli_query($link, $data)){

    echo "Records added successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}
}
// Close connection
mysqli_close($link);


?>
