<!DOCTYPE html>
<?php require_once "config.php";
?>
<html>
<head>
    <title>Welcome | Department Store Management System</title>
    <link rel="stylesheet" type="text/css"href="w3.css"/>
    <link rel="stylesheet" type="text/css"href="stylesheet.css"/>
</head>
<body>
<div class="w3-container">

    <div class="w3-container">

        <div class="w3-section w3-center">
            <p class="w3-center w3-text-teal w3-large">Welcome <br>to <br>Department Store Management System</p>
        </div>
        <div class="w3-center">
            <p class="w3-xlarge w3-text-grey">What do you want to do next?</p>
        </div>
        <div class="w3-container">
            <div class="w3-row w3-center">
                <div class="ux-inline-block">
                    <a href="/dept_store/sale.php">
                    <button class="w3-btn w3-teal w3-hover-blue">
                        <div class="w3-section" style="width:200px;">
                            <span>Product Sale</span>
                        </div>
                    </button>
                    </a>
                </div>

                <div class="ux-inline-block">
                <a href="/dept_store/product.php">
                    <button class="w3-btn w3-teal w3-hover-blue">
                        <div class="w3-section" style="width:200px;">
                            <span>Products</span>
                        </div>
                    </button></a>
                </div>

                <div class="w3-row w3-center">
                    <div class="ux-inline-block">
                        <a href="/dept_store/viewsales.php">
                        <button class="w3-btn w3-teal w3-hover-blue">
                            <div class="w3-section" style="width:200px;">
                                View Sales
                            </div>
                        </button>
                            </a>
                    </div>

                    <div class="ux-inline-block ">
                    <a href="/dept_store/employee.php">
                        <button class="w3-btn w3-teal w3-hover-blue">
                            <div class="w3-section" style="width:200px;">
                                View Employees
                            </div>
                        </button></a>
                    </div>


                    <div class="w3-row w3-center">
                        <div class="ux-inline-block">
                        <a href="/dept_store/costumer.php">
                            <button class="w3-btn w3-teal w3-hover-blue">
                                <div class="w3-section" style="width:200px;">
                                    Contracted Costumers
                                </div>
                            </button></a>
                        </div>

                        <div class="ux-inline-block ">
                            <a href="/dept_store/inventorydealer.php"><button class="w3-btn w3-teal w3-hover-blue">
                                <div class="w3-section" style="width:200px;">
                                    Inventory
                                </div>
                            </button></a>
                        </div>

                        <div class="w3-row w3-center">
                        <div class="ux-inline-block">
                        <a href="/dept_store/inhouse.php">
                            <button class="w3-btn w3-teal w3-hover-blue">
                                <div class="w3-section" style="width:200px;">
                                    Inhouse Duty
                                </div>
                            </button></a>
                        </div>

                        <div class="ux-inline-block ">
                            <a href="/dept_store/dealer.php"><button class="w3-btn w3-teal w3-hover-blue">
                                <div class="w3-section" style="width:200px;">
                                    Manage Dealers
                                </div>
                            </button></a>
                        </div>

                            <div class="w3-row w3-center">
                                <div class="ux-inline-block">
                                    <a href="/dept_store/vacations.php">
                                        <button class="w3-btn w3-teal w3-hover-blue">
                                            <div class="w3-section" style="width:200px;">
                                                Manage Vacations
                                            </div>
                                        </button></a>
                                </div>

                            </div>
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
            </div>
</body>
</html>
