<!DOCTYPE html>

<?php
require_once("config.php");
$query1="SELECT manufacturer_id , manufacturer_name FROM Manufacturer";
if(!($pro=$database->query($query1))) {
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
			Sales
		</span>
    </div>
    <div class="w3-section">
        <a class="w3-text-teal" href="/dept_store/index.php">Back</a>
    </div>

    <!-- This is where the table goes -->
    <div class="w3-responsive">
        <table class="w3-table-all"> <!-- Make the table bordered!!! -->
            <tr class="w3-text-teal">
                <th>Date</th>
                <th>Sales ID</th>
                <th>Sale Cost</th>
                <th>User Name</th>
                <th>Customer</th>
            </tr>
            <?php
            $list=$database->query("SELECT * FROM Sales LEFT    JOIN  Customer on Sales.customer_id=Customer.customer_id");
            //TODO IMPLEMEMENT PAGINATION USING LIMIT AND OFFSET
            while ($entry=$list->fetch_assoc()) {
                extract($entry);
                echo "
                <tr>
                    <td>$sales_time</td>
                    <td>$sales_id</td>
                    <td>$sales_cost</td>
                    <td>$username</td>
                    <td>$customer_first_name $customer_last_name</td>
                 </tr>";
            }
            ?>
            </tr>
        </table>
    </div>
   <!-- <div class=" w3-margin w3-center">
        <ul class="w3-pagination">
            <li><a href="#">&laquo;</a></li>
            <li><a class="w3-teal" href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul>
    </div>
!-->

</div>

<?php include('includes/footer.php'); ?>
