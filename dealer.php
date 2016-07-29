<!DOCTYPE html>
<?php
require_once("config.php");
$query="SELECT product_type_id,price,sold_count,instock,last_updated from Inventory;";
if(!($emp=$database->query($query))) {
    die("Database Error");
}
?>
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
			Dealers
		</span>
    </div>
    <div class="w3-section">
        
        <a class="w3-text-teal" href="/dept_store/add_dealer.php">Add dealer</a>
               <a class="w3-text-teal" href="/dept_store/updatedealer.php">Update Dealer</a>
    </div>
    <div class="w3-section">
<a class="w3-text-teal" href="/dept_store/">Back</a>

				<form class="w3-container w3-right">
					<input type="text" name="search" placeholder="Search by Dealer">
					<button class="w3-btn w3-teal">Search</button>
					
					
				</form>
				
				 <form action = "" method = "POST" class="w3-container w3-right">
					<input type="text" name="delete" placeholder="Enter Id">
					<button type = "submit" name ="submit" class="w3-btn w3-teal">Delete</button>
				</form>
				
				</div>
    
    
    <!-- This is where the table goes -->
    <div class="w3-responsive">
        <table class="w3-table-all"> <!-- Make the table bordered!!! -->
            <tr class="w3-text-teal">
                <th>Dealer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact No.</th>
            </tr>
            
            <?php
$conn = mysqli_connect("localhost", "root", "", "dept_store");         

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$getvalue = null;
				if(isset($_POST['submit'])){
				$getvalue = $_POST['delete'];
				}
				if($getvalue !=""){
				$data1 = "DELETE FROM Dealer WHERE dealer_id = '$getvalue'"; 
				if(mysqli_query($conn, $data1)){

    echo "Records Deleted successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

}
}


$value = null;
if(isset($_GET['search'])){
$value = $_GET['search'];
}
if($value !=""){

$sql = "SELECT * FROM Dealer NATURAL JOIN dealerPhone 
WHERE dealer_firstname LIKE '%$value%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($dealer = $result->fetch_assoc()) {
    extract($dealer);
   
      echo "
                <tr>
                    <td>".$dealer["dealer_id"]."</td>
                    <td>".$dealer["dealer_firstname"]."</td>
                    <td>".$dealer["dealer_lastname"]."</td>
                    <td>".$dealer["dealer_email"]."</td>
                    <td>".$dealer["phone_no"]."</td>
                    
                    
                 </tr>";
        
   
    }
}

 else {
    echo "0 results";
}
$conn->close();
       }
            
             else{
            $list=$database->query("SELECT * FROM Dealer NATURAL JOIN dealerPhone");
            //TODO IMPLEMEMENT PAGINATION USING LIMIT AND OFFSET
            while ($entry=$list->fetch_assoc()) {
                extract($entry);
                
                echo "
                <tr>
                    <td>$dealer_id</td>
                    <td>$dealer_firstname</td>
                    <td>$deler_lastname</td>
                    <td>$dealer_email</td>
                    <td>$phone_no</td>
                    
                 </tr>";
            }
            }
            
            ?>
        
        </table>
    </div>
    <!-- Pagination ..Implemnt Later..Got No Time To Do It! -->
    <div class=" w3-margin w3-center">
        <ul class="w3-pagination">
            <?php //pagination(20,5,"",1)?>
        </ul>
    </div>


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
