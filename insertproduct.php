<?
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
			Add Products
		</span>
		</div>
		<div class="w3-section">
				<a class="w3-text-teal" href="/dept_store/product.php">Back</a>

		</div>
		<!-- This is where the table goes -->
		
		<div class="w3-responsive">
			<table class="w3-table-all"> <!-- Make the table bordered!!! -->
				<tr class="w3-text-teal">
					
                			
                			<th>Product Category</th>
                			<th>Product Price</th>
                			<th>Sector</th>
                			<th>Floor</th>
                			<th>Manufacturer Name</th>
				</tr>

					<form action = "<?php $_PHP_SELF ?>" method = "POST">
				<tr>
					
					<td><input class="w3-input w3-border-0" type="text" name="pcategory" placeholder="Category"></td>
					<td><input class="w3-input w3-border-0" type="text" name="pprice" placeholder="Price"></td>
					<td><input class="w3-input w3-border-0" type="text" name="sector" placeholder="Sector"></td>
					<td><input class="w3-input w3-border-0" type="text" name="floor" placeholder="Floor"></td>
					<td><input class="w3-input w3-border-0" type="text" name="manuname" placeholder="Name"></td>
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
$pcategory =$manuname = $sector = $floor = $productname = "";
if(isset($_POST['submit'])) {


	$sector = mysqli_real_escape_string($link, $_POST['sector']);
	$floor = mysqli_real_escape_string($link, $_POST['floor']);
	$pprice = mysqli_real_escape_string($link, $_POST['pprice']);
	$manuname = mysqli_real_escape_string($link, $_POST['manuname']);
	$pcategory = mysqli_real_escape_string($link, $_POST['pcategory']);

	if ($productname != "" || $manuname != "" ) {
		echo "asd";
		if ($man = $database->query("SELECT * FROM Manufacturer WHERE manufacturer_name like '$manuname'")) {
			if ($man->num_rows == 0) {
				$database->query("INSERT INTO Manufacturer VALUES (NULL,'$manuname')");
			}
		} else {
			echo $database->error;
			echo "error in equery";
		}
		$a = $database->query("SELECT * FROM Manufacturer WHERE manufacturer_name = '$manuname'");
		$a = $a->fetch_assoc();
		$a = $a["manufacturer_id"];
		$data = "INSERT INTO ProductType(product_category,product_price,floor,sector,manufacturer_id) VALUES( '$pcategory','$pprice','$floor','$sector','$a')";
		//if($database->query($data1)){
		//echo "data1";
		if ($database->query($data)) {
			echo "Records added successfully.";
		} else {
			echo $database->error;
			echo "ERROR: Could not able to execute ";
		}
	}
}

?>
