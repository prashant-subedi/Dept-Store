<!DOCTYPE html>
<?php require_once "config.php";
$data=$database->query("SELECT * FROM CurrentTransaction NATURAL JOIN Product NATURAL  JOin ProductType");

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
            <p class="w3-xlarge w3-text-grey">Transactions</p>
            
        </div>
        <div class="w3-container w3-center">
            <div class="w3-section">
                <a class="w3-text-teal" href="/dept_store/sale.php">Back</a> </div>
                
            <div class="w3-container w3-center" style="width: 500px; margin: 0 auto 0;">
                <table class="w3-table-all w3-small w3-center">
                    <tr class="w3-teal w3-medium">
                        <th>Product Name</th>
                        <th>Product Price</th>
                    </tr>
                    <?php
                    $total=0;
                    while($a=$data->fetch_assoc()) {
                        extract($a);
                        echo "<tr>
                        <td>$product_category</td>
                        <td>$product_price</td>
                        </tr>";

                        $total =$total+ $product_price;
                    }
                    if(isset($_POST['sandylehalnaixadexa'])){
                        $cust="NULL";
                        if(!empty($_POST['customerid'])){
                            $cust=$_POST['customerid'];
                        }
                        $username=$_SESSION['username'];
                        if($database->query("INSERT INTO  Sales(sales_cost,username,customer_id) VALUES($total,'$username',$cust)")){
                            $a=$database->query("SELECT * FROM CurrentTransaction NATURAL JOIN  ProductType");
                            while($b=$a->fetch_assoc()){
                                extract($b);
                                $database->query("UPDATE INVENTORY SET sold_count=sold_count+1");
                                header("Location: /dept_store/sale.php");
                            }
                            $database->query("DELETE FROM CurrentTransaction");
                            echo $database->error;
                        }else{
                            echo $database->error;
                        }

                     }
                    ?>
                    <tr class="w3-teal">
                        <td>Total (NRs.)</td>
                        <td><?php echo $total?></td>
                    </tr>
                </table>
                
                <form class="w3-container w3-section w3-center">
                    <input name="customerid" type="text" class="w3-input w3-border w3-margin-bottom" placeholder="Customer ID" formmethod="post">
                    <input name="sandylehalnaixadexa" type="submit" class="w3-btn w3-teal" value="Finalize Transaction" formmethod="post"  >
                </form>
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
    </div>
</body>
</html>
