<!DOCTYPE html>
<?php

require_once "config.php";
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
			Update Informations
		</span>
    </div>
    <div class="w3-section">
        <a class="w3-text-teal" href="/dept_store/product.php">Back</a>


    </div>
    <!-- This is where the table goes -->

    <div class="w3-responsive">
        <table class="w3-table-all"> <!-- Make the table bordered!!! -->
            <tr class="w3-text-teal">


                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Sector</th>
                <th>Floor</th>
                <th>Manufacturer Name</th>
            </tr>

            <form action="<?php $_PHP_SELF ?>" method="POST">
                <tr>

                    <td><input class="w3-input w3-border-0" type="text" name="product_id" placeholder="ID"></td>
                    <td><input class="w3-input w3-border-0" type="text" name="name" placeholder="Name"></td>
                    <td><input class="w3-input w3-border-0" type="text" name="pprice" placeholder="Price"></td>
                    <td><input class="w3-input w3-border-0" type="text" name="sector" placeholder="Sector"></td>
                    <td><input class="w3-input w3-border-0" type="text" name="floor" placeholder="Floor"></td>
                    <td><input class="w3-input w3-border-0" type="text" name="manuname" placeholder="Name"></td>
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
        <p class="w3-text-grey w3-small">Powered by Team Sudo <br> CE 2nd Year 2nd Semester <br>Kathmandu University
            <br> Dhulikhel, Kavre.</p>


    </div>
</div>
</body>
</html>


<?php
$pcategory = $manuname = $sector = $floor = $productname = null;
$pstatus = null;
$productid = null;
if (isset($_POST['submit'])) {
    $productid = $database->real_escape_string($_POST['product_id']);
    $sector =  $database->real_escape_string($_POST['sector']);
    $floor =  $database->real_escape_string( $_POST['floor']);
    $pprice =  $database->real_escape_string($_POST['pprice']);
    $manuname =  $database->real_escape_string( $_POST['manuname']);
    $pcategory =  $database->real_escape_string( $_POST['name']);

    //This is a function which will check wether the incoming varaible are

    $sector = !empty($sector) ? "'$sector'" : "NULL";
    $floor = !empty($floor) ? "'$floor'" : "NULL";
    $pprice = !empty($pprice) ? "'$pprice'" : "NULL";
    $manuname = !empty($manuname) ? "'$manuname'" : "NULL";
    $pcategory = !empty($pcategory) ? "'$pcategory'" : "NULL";


}


if ($productid != null) {
    if ($manuname!="NULL"&&$man = $database->query("SELECT * FROM Manufacturer WHERE manufacturer_name = $manuname ")) {
        if ($man->num_rows == 0) {
            if($database->query("INSERT INTO Manufacturer VALUES (NULL,$manuname)"))
            {}
            else{

                echo "failed";
            }
        }
        $a = $database->query("SELECT * FROM Manufacturer WHERE manufacturer_name = $manuname");
        $a = $a->fetch_assoc();
        $a = $a["manufacturer_id"];
    } else {
        $a=$database->query("SELECT * FROM ProductType WHERE product_type_id = $productid");
        $a = $a->fetch_assoc();
        $a = $a["manufacturer_id"];
    }

    $data = "UPDATE ProductType SET
	product_category = COALESCE($pcategory,product_category),
	product_price = COALESCE($pprice,product_price),
	sector = COALESCE($sector,sector),
	floor = COALESCE($floor,floor),
	manufacturer_id=$a
	WHERE product_type_id = $productid ;";


    if ($database->query($data)) {

        echo "Records added successfully.";

    } else {
        echo $database->error;
        echo "ERROR: Could not able to execute";

    }
}
// Close connection


?>
