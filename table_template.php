<!DOCTYPE html>
<?php
require_once("config.php");
$query="SELECT employee_id,employee_first_name,employee_last_name from Employee;";
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
			Employees
		</span>
    </div>
    <div class="w3-section">
        <a class="w3-text-teal" href="">Back</a>
    </div>
    <!-- This is where the table goes -->
    <div class="w3-responsive">
        <table class="w3-table-all"> <!-- Make the table bordered!!! -->
            <tr class="w3-text-teal">
                <th>Employee Id</th>
                <th>Employee Name</th>
            </tr>
            <?php
            while($employee=$emp->fetch_assoc()){
             echo "<tr>
                    <td>".$employee["employee_id"]."</td>
                    <td>
                    <a href=\"/dept_store/employee_profile.php?id=".$employee["employee_id"]."\">".
                     $employee["employee_last_name"]." ".$employee["employee_first_name"]."
                    </td>
                    
                    
                </tr>";
            }
                ?>
        </table>
    </div>
    <!-- Pagination -->
    <div class=" w3-margin w3-center">
        <ul class="w3-pagination">
            <?php pagination(20,5,"",1)?>
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