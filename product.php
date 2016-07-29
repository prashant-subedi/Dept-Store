<!DOCTYPE html>

<?php
require_once("config.php");
$query1 = "SELECT manufacturer_id , manufacturer_name FROM Manufacturer";
if (!($pro = $database->query($query1))) {
    die("Database Error");
}

?>
<html>
<head>
    <title>Products | Department Store Management System</title>
    <link rel="stylesheet" type="text/css" href="w3.css"/>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>
<body>
<div class="w3-container">
    <!-- Header Section -->
    <div class="w3-center">
        <p class="w3-section w3-text-teal w3-large">Welcome <br>to <br>Department Store Management System</p>
			<span class="w3-section w3-text-grey w3-xlarge">
			Products
		</span>
    </div>
    <div class="w3-section">
        <a class="w3-text-teal" href="/dept_store/insertproduct.php">Add New Products</a>
        <a class="w3-text-teal" href="/dept_store/updateproduct.php">Update Information</a>
    </div>

    <div class="w3-section">
        <a class="w3-text-teal" href="/dept_store/">Back</a>

        <form class="w3-container w3-right">
            <input type="text" name="search" placeholder="Search by product">
            <button class="w3-btn w3-teal">Search</button>
        </form>
        <form action="" method="POST" class="w3-container w3-right">

            <input type="text" name="delete" placeholder="Enter Product ID">
            <button type="submit" name="submit" class="w3-btn w3-teal">Delete</button>
        </form>
    </div>

    <!-- This is where the table goes -->
    <div class="w3-responsive">
        <table class="w3-table-all"> <!-- Make the table bordered!!! -->
            <tr class="w3-text-teal">
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Location</th>
                <th>Manufacturer</th>
            </tr>

            <?php
            $conn = mysqli_connect("localhost", "root", "", "dept_store");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $getvalue = null;
            if (isset($_POST['submit'])) {
                $getvalue = $_POST['delete'];
            }
            if ($getvalue != "") {
                $data = "DELETE FROM ProductType WHERE product_type_id = '$getvalue' ";
                if (mysqli_query($conn, $data)) {

                    echo "Records Deleted successfully.";

                } else {

                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

                }
            }


            $value = null;
            if (isset($_GET['search'])) {
                $value = $_GET['search'];
            }
            if ($value != "") {

                $sql = "SELECT * FROM ProductType NATURAL JOIN Manufacturer WHERE product_category like '$value'";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($product = $result->fetch_assoc()) {
                        extract($product);
                        echo "
                <tr>
                    <td>" . $product_type_id . "</td>
                    <td>" . $product_category . "</td>
                    <td>" . $product_price . "</td>
                    <td>" . $sector . $floor . "</td>
                    <td>" . $manufacturer_name . "</td>
                 </tr>";

                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
            } else {


                $list = $database->query("SELECT * FROM ProductType  NATURAL JOIN Manufacturer");
                //TODO IMPLEMEMENT PAGINATION USING LIMIT AND OFFSET
                while ($entry = $list->fetch_assoc()) {
                    extract($entry);
                    echo "
                <tr>
                    <td>$product_type_id</td>
                    <td>$product_category</td>
                    <td>$product_price</td>
                    <td>$sector ,$floor</td>
                    <td>$manufacturer_name</td>
                 </tr>";
                }
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
