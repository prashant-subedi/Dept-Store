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
			Update Inventory
		</span>
		</div>
		<div class="w3-section">
				<a class="w3-text-teal" href="/dept_store/inventorydealer.php">Back</a>

		</div>
		<!-- This is where the table goes -->
		
		<div class="w3-responsive">
			<table class="w3-table-all"> <!-- Make the table bordered!!! -->
				<tr class="w3-text-teal">
					
					<th>Product Type Id</th>
					<th>Price</th>
					<th>Sold_Count</th>
					<th>InStock</th>
					<th>LastUpdated</th>
					
				</tr>

				<tr>
					<form action = "<?php $_PHP_SELF ?>" method = "POST">
					<td><input class="w3-input w3-border-0" type="text" name="ptypeid" placeholder="ID"></td> 
					<td><input class="w3-input w3-border-0" type="text" name="price" placeholder="Price"></td>
					<td><input class="w3-input w3-border-0" type="text" name="soldcount" placeholder="Sold Count"></td>
					<td><input class="w3-input w3-border-0" type="text" name="instock" placeholder="InStock"></td>
					<td><input class="w3-input w3-border-0" type="text" name="lastupdated" placeholder="Last Updated"></td>
					
				
				</tr>

				
			</table>
            
            <div class="w3-center">
                <input type="submit" name="submit" value="Update" class="w3-btn w3-margin-top w3-teal">
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
$ptypeid = $price = $soldcount =$instock = $lastupdated = null;
if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());
    }

  
	if(isset($_POST['submit']))
	{
	$ptypeid = mysqli_real_escape_string($link,$_POST['ptypeid']);
	$price = mysqli_real_escape_string($link,$_POST['price']);
	$soldcount = mysqli_real_escape_string($link,$_POST['soldcount']);
	$instock = mysqli_real_escape_string($link,$_POST['instock']);
	$lastupdated = mysqli_real_escape_string($link,$_POST['lastupdated']);
	
	
	
	
	$price = !empty($price) ? "'$price'" : "NULL";
	$soldcount = !empty($soldcount) ? "'$soldcount'" : "NULL";
	$instock = !empty($instock) ? "'$instock'" : "NULL";
	$lastupdated = !empty($lastupdated) ? "'$lastupdated'" : "NULL";
	

}

if($ptypeid != ""){
$data = "UPDATE Inventory SET
price = COALESCE($price,price),
sold_count = COALESCE($soldcount,sold_count),
instock = COALESCE($instock,instock),
last_updated = COALESCE($lastupdated,last_updated)
WHERE product_type_id = '$ptypeid'";
if(mysqli_query($link, $data)){

    echo "Records Updated successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}
}
// Close connection
mysqli_close($link);


?>
