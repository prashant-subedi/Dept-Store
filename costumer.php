<!DOCTYPE html>
<?php
require_once("config.php");
$query="SELECT customer_id,customer_first_name,customer_last_name from Customer;";
if(!($cus=$database->query($query))) {
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
			Costumers
		</span>
    </div>
    <div class="w3-section">
        <a class="w3-text-teal" href="/dept_store/">Back</a>
        <a class="w3-text-teal" href="/dept_store/addcostumer.php">Add Costumer</a>
        <a class="w3-text-teal" href="/dept_store/updatecostumer.php">Update Information</a>
    </div>
    
    				

				<form class="w3-container w3-right">
					<input type="text" name="search" placeholder="Search by customer">
					<button class="w3-btn w3-teal">Search</button>
					
					
				</form>
				</div>
    <!-- This is where the table goes -->
    <div class="w3-responsive">
        <table class="w3-table-all"> <!-- Make the table bordered!!! -->
            <tr class="w3-text-teal">
                <th>Customer Id</th>
                <th>Customer  Name</th>
            </tr>
            
                        
<?php
$conn = mysqli_connect("localhost", "root", "", "dept_store");         

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$value = null;
if(isset($_GET['search'])){
$value = $_GET['search'];
}
if($value !=""){

$sql = "SELECT customer_id,customer_first_name,customer_last_name FROM Customer WHERE customer_first_name LIKE '%$value%'";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($customer = $result->fetch_assoc()) {
    extract($customer);
     echo "<tr>
                    <td>".$customer["customer_id"]."</td>
                    <td>
                    <a href=\"/dept_store/customer_profile.php?id=$customer_id\">
                    $customer_first_name  $customer_last_name
                    </td>
                    
                    
                </tr>";
   
    }
}

 else {
    echo "0 results";
}
$conn->close();
       }
            else {
            while($customer=$cus->fetch_assoc()){
                extract($customer);
                echo "<tr>
                    <td>$customer_id</td>
                    <td>
                    <a href=\"/dept_store/customer_profile.php?id=$customer_id\">
                    $customer_first_name  $customer_last_name
                    </td>
                    
                    
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
        <a class="w3-text-teal" href="/dept_store/logout.php">Logout</a>
    </div>
    <div>
        <p class="w3-text-grey w3-small">A DBMS Mini Project for COMP 232</p>
        <p class="w3-text-grey w3-small">Powered by Team Sudo <br> CE 2nd Year 2nd Semester <br>Kathmandu University <br> Dhulikhel, Kavre.</p>



    </div>
</div>
</body>
</html>
