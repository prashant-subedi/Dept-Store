<!DOCTYPE html>
<?php require_once "config.php"; ?>
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
                    <button class="w3-btn w3-teal w3-hover-blue">
                        <div class="w3-section" style="width:200px;">
                            <span>View Products</span>
                        </div>
                    </button>
                </div>

                <div class="ux-inline-block">
                    <button class="w3-btn w3-teal w3-hover-blue">
                        <div class="w3-section" style="width:200px;">
                            <span>View Inventory</span>
                        </div>
                    </button>
                </div>

                <div class="w3-row w3-center">
                    <div class="ux-inline-block">
                        <button class="w3-btn w3-teal w3-hover-blue">
                            <div class="w3-section" style="width:200px;">
                                View Sales
                            </div>
                        </button>
                    </div>

                    <div class="ux-inline-block ">
                        <button class="w3-btn w3-teal w3-hover-blue">
                            <div class="w3-section" style="width:200px;">
                                Manage Employees
                            </div>
                        </button>
                    </div>

                    <div class="w3-row w3-center">
                        <div class="ux-inline-block">
                            <button class="w3-btn w3-teal w3-hover-blue">
                                <div class="w3-section" style="width:200px;">
                                    Manage Vacations
                                </div>
                            </button>
                        </div>

                        <div class="ux-inline-block ">
                            <button class="w3-btn w3-teal w3-hover-blue">
                                <div class="w3-section" style="width:200px;">
                                    View Orders
                                </div>
                            </button>
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