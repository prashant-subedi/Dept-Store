<!DOCTYPE html>

<?php
require_once("config.php");
$query1="SELECT employee_id , date_start, date_end FROM Vacation";
$query2 = "SELECT employee_first_name, employee_last_name FROM Employee";
if(!($pro=$database->query($query1)) || !($pro=$database->query($query2))) {
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
			Employee Vacations
		</span>
    </div>
    <div class="w3-section">
        <a class="w3-text-teal" href="/dept_store/">Back</a>
        <a class="w3-text-teal" href="/dept_store/addvacation.php">Add Vacation</a>
        <a class="w3-text-teal" href="/dept_store/updatevacation.php">Update Information</a>
    </div>
    <!-- This is where the table goes -->
    <div class="w3-responsive">
        <table class="w3-table-all"> <!-- Make the table bordered!!! -->
            <tr class="w3-text-teal">
                <th>Employee Id</th>
                <th>Employee Name</th>
                <th>Date Start</th>
                <th>Date End</th>
            </tr>
            <?php
            $list=$database->query("SELECT * FROM Vacation NATURAL JOIN Employee");
            //TODO IMPLEMEMENT PAGINATION USING LIMIT AND OFFSET
            while ($entry=$list->fetch_assoc()) {
                extract($entry);
                echo "
                <tr>
                    <td>$employee_id</td>
                    <td>$employee_first_name $employee_last_name</td>
                    <td>$date_start</td>
                    <td>$date_end</td>
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
