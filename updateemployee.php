
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
			Update Infromations
		</span>
		</div>
		<div class="w3-section">
				<a class="w3-text-teal" href="/dept_store/employee.php">Back</a>

		</div>
		<!-- This is where the table goes -->
		
		<div class="w3-responsive">
			<table class="w3-table-all"> <!-- Make the table bordered!!! -->
				<tr class="w3-text-teal">
					<th>Employee Id</th>
					<th>FirstName</th>
					<th>LastName</th>
					<th>Date of Join</th>
					<th>City</th>
					<th>Street</th>
					<th>CardType</th>
					<th>CardNo</th>
					<th>ContactNo.</th>
					<th>AccountNo</th>
					<th>Salary</th>
				</tr>

				<tr>
					<form action = "<?php $_PHP_SELF ?>" method = "POST">
					<td><input class="w3-input w3-border-0" type="text" name="employeeid" placeholder="Enter Id"></td>
					<td><input class="w3-input w3-border-0" type="text" name="firstname" placeholder="First Name"></td>
					<td><input class="w3-input w3-border-0" type="text" name="lastname" placeholder="Last Name"></td>
					<td><input class="w3-input w3-border-0" type="text" name="dateofjoin" placeholder="Date of Join"></td>
					<td><input class="w3-input w3-border-0" type="text" name="city" placeholder="City"></td>
					<td><input class="w3-input w3-border-0" type="text" name="street" placeholder="Street"></td>
					<td><input class="w3-input w3-border-0" type="text" name="cardtype" placeholder="Card Type"></td>	
					<td><input class="w3-input w3-border-0" type="text" name="cardno" placeholder="Card No."></td>
					<td><input class="w3-input w3-border-0" type="text" name="phoneno" placeholder="Contact No."></td>
					<td><input class="w3-input w3-border-0" type="text" name="account" placeholder="account"></td>
					<td><input class="w3-input w3-border-0" type="text" name="salary" placeholder="salary"></td>
				</tr>

				
			</table>
            
            <div class="w3-center">
                <input type="submit" name="submit" value="Update" class="w3-btn w3-margin-top w3-teal">
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
$phoneno = null;
$employeeid = null;
if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());
    }

  
	if(isset($_POST['submit']))
	{
	$employeeid = mysqli_real_escape_string($link,$_POST['employeeid']);
	$firstname = mysqli_real_escape_string($link,$_POST['firstname']);
	$lastname = mysqli_real_escape_string($link,$_POST['lastname']);
	$dateofjoin = $_POST['dateofjoin'];
	$street = mysqli_real_escape_string($link,$_POST['street']);
	$city = mysqli_real_escape_string($link,$_POST['city']);
	$cardtype = mysqli_real_escape_string($link,$_POST['cardtype']);
	$cardno = mysqli_real_escape_string($link,$_POST['cardno']);
	$phoneno = mysqli_real_escape_string($link,$_POST['phoneno']);
	$account = mysqli_real_escape_string($link,$_POST['account']);
	$salary = mysqli_real_escape_string($link,$_POST['salary']);
	
	
	$firstname = !empty($firstname) ? "'$firstname'" : "NULL";
	$lastname = !empty($lastname) ? "'$lastname'" : "NULL";
	$dateofjoin = !empty($dateofjoin) ? "'$dateofjoin'" : "NULL";
	$street = !empty($street) ? "'$street'" : "NULL";
	$city = !empty($city) ? "'$city'" : "NULL";
	$cardtype = !empty($cardtype) ? "'$cardtype'" : "NULL";
	$cardno = !empty($cardno) ? "'$cardno'" : "NULL";
	$phoneno = !empty($phoneno) ? "'$phoneno'" : "NULL";
	$account = !empty($account) ? "'$account'" : "NULL";
	$salary = !empty($salary) ? "'$salary'" : "NULL";
	
}

if($employeeid != null){
$data1 = "UPDATE Employee SET
	employee_first_name = COALESCE($firstname,employee_first_name),
	employee_last_name = COALESCE($lastname,employee_last_name),
	date_of_join = COALESCE($dateofjoin,date_of_join),
	employee_street_address = COALESCE($street,employee_street_address),
	employee_city_address = COALESCE($city,employee_city_address),
	employee_account = COALESCE($city,employee_account),
	employee_salary = COALESCE($city,employee_salary),
	employee_card_type = COALESCE($cardtype,employee_card_type),
	employee_card_no = COALESCE($cardno,employee_card_no)
	WHERE employee_id = '$employeeid' ";


$data2 = "INSERT INTO empPhone Values($employeeid,$phoneno)";

if(mysqli_query($link, $data1) && mysqli_query($link,$data2)){

    echo "Records Updated successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}
}
// Close connection
mysqli_close($link);


?>
