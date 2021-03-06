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
			Update Duties
		</span>
		</div>
		<div class="w3-section">
				<a class="w3-text-teal" href="/dept_store/inhouse.php">Back</a>

		</div>
		<!-- This is where the table goes -->
		
		<div class="w3-responsive">
			<table class="w3-table-all"> <!-- Make the table bordered!!! -->
				<tr class="w3-text-teal">
					
					<th>Employee Id</th>
					<th>Sector</th>
					<th>Floor</th>
					<th>Date Start</th>
					<th>Date End</th>
					
				</tr>

				<tr>
					<form action = "<?php $_PHP_SELF ?>" method = "POST">
					<td><input class="w3-input w3-border-0" type="text" name="employeeid" placeholder="ID"></td> 
					<td><input class="w3-input w3-border-0" type="text" name="sector" placeholder="Sector"></td>
					<td><input class="w3-input w3-border-0" type="text" name="floor" placeholder="Floor"></td>
					<td><input class="w3-input w3-border-0" type="text" name="datestart" placeholder="Date"></td>
					<td><input class="w3-input w3-border-0" type="text" name="dateend" placeholder="Date"></td>
					
				
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
$employeeid = $sector =$floor = $datestart = $dateend =  null;
if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());
    }

  
	if(isset($_POST['submit']))
	{
	$employeeid = mysqli_real_escape_string($link,$_POST['employeeid']);
	$sector = mysqli_real_escape_string($link,$_POST['sector']);
	$floor = mysqli_real_escape_string($link,$_POST['floor']);
	$datestart = mysqli_real_escape_string($link,$_POST['datestart']);
	$dateend = mysqli_real_escape_string($link,$_POST['dateend']);
	
	

	
	$sector = !empty($sector) ? "'$sector'" : "NULL";
	$floor = !empty($floor) ? "'$floor'" : "NULL";
	$datestart = !empty($datestart) ? "'$datestart'" : "NULL";
	$dateend = !empty($dateend) ? "'$dateend'" : "NULL";
	

}

if($employeeid != ""){
$data = "UPDATE InHouseDuty SET
date_start = COALESCE($datestart,date_start),
date_end = COALESCE($dateend,date_end),
sector = COALESCE($sector,sector),
floor = COALESCE($floor,floor)
WHERE employee_id = '$employeeid'";
if(mysqli_query($link, $data)){

    echo "Records Updated successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}
}
// Close connection
mysqli_close($link);


?>
