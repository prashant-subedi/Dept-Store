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
			Update Dealer
		</span>
		</div>
		<div class="w3-section">
				<a class="w3-text-teal" href="/dept_store/dealer.php">Back</a>

				
		</div>
		<!-- This is where the table goes -->
		
		<div class="w3-responsive">
			<table class="w3-table-all"> <!-- Make the table bordered!!! -->
				<tr class="w3-text-teal">
					
					<th>Id</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email Address</th>
					<th>Phone Number</th>
					
				</tr>

				<tr>
					<form action = "<?php $_PHP_SELF ?>" method = "POST">
					<td><input class="w3-input w3-border-0" type="text" name="dealerid" placeholder="ID"></td>
					<td><input class="w3-input w3-border-0" type="text" name="firstname" placeholder="First Name"></td>
					<td><input class="w3-input w3-border-0" type="text" name="lastname" placeholder="Last Name"></td>
					<td><input class="w3-input w3-border-0" type="text" name="email" placeholder="Email Address"></td>
					<td><input class="w3-input w3-border-0" type="text" name="contactno" placeholder="phone no"></td>
					
				
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
$firstname = $lastname = $email = $phoneno = "";

$dealerid = null;
if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());
    }

  
	if(isset($_POST['submit']))
	{
	$dealerid = mysqli_real_escape_string($link,$_POST['dealerid']);
	$firstname = mysqli_real_escape_string($link,$_POST['firstname']);
	$lastname = mysqli_real_escape_string($link,$_POST['lastname']);
	$email = mysqli_real_escape_string($link,$_POST['email']);
	$phoneno = mysqli_real_escape_string($link,$_POST['contactno']);
	
	
	$firstname = !empty($firstname) ? "'$firstname'" : "NULL";
	$lastname = !empty($lastname) ? "'$lastname'" : "NULL";
	$email = !empty($email) ? "'$email'" : "NULL";
	$phoneno = !empty($phoneno) ? "'$phoneno'" : "NULL";
	

}

if($dealerid !=""){
$data = "UPDATE Dealer SET
 dealer_email = COALESCE($email,dealer_email), 
 dealer_firstname = COALESCE($firstname,dealer_firstname), 
 dealer_lastname = COALESCE($lastname,dealer_lastname)
  WHERE dealer_id = '$dealerid'";




$phone = "UPDATE dealerPhone SET
phone_no = COALESCE($phoneno,phone_no)
WHERE dealer_id = '$dealerid'";
if(mysqli_query($link, $data) && mysqli_query($link,$phone)){

    echo "Records Updated successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}
}
// Close connection
mysqli_close($link);


?>
