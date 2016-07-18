<!DOCTYPE html>
<?php require_once "config.php"; ?>
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
			Employees
		</span>
    </div>
    <div class="w3-section">
        <a class="w3-text-teal" href="/dept_store/product.php">Back</a>
        <a class="w3-text-teal" href="/dept_store/insertproduct.php">Add New Products</a>
    </div>
    <!-- This is where the table goes -->
    <div class="w3-responsive">
        <table class="w3-table-all"> <!-- Make the table bordered!!! -->
            <tr class="w3-text-teal">
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Manufacturer</th>
                <th>Location</th>
            </tr>
            <?php
            $count=$database->query("SELECT COUNT(*) as count FROM ProductType NATURAL JOIN Manufacturer;")->fetch_assoc();
            $count=$count["count"];
            echo $count;
            $list=$database->query("SELECT * FROM ProductType NATURAL JOIN Manufacturer NATURAL  JOIN ProductLocation");
            //TODO IMPLEMEMENT PAGINATION USING LIMIT AND OFFSET
            while ($entry=$list->fetch_assoc()) {
                extract($entry);
                echo "
                <tr>
                    <td>$product_type_id</td>
                    <td>$product_category</td>
                    <td>$product_price</td>
                    <td>$manufacturer_name</td>
                    <td>$sector $floor</td>
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