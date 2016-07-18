<!DOCTYPE html>
<?php
require_once "config.php";
if(isset($_POST["productid"])&&isset($_POST["next"])){
    $id=$_POST["productid"];
    if($database->query("SELECT * FROM Product WHERE  product_id=$id"));
}
else if(isset($_POST["productid"])&&isset($_POST["finish"])){
    echo "Total";
}
?>
<form action="sale.php" method="POST">
    <input type="text" name="productid" placeholder="Enter Product ID" required=""  value="<?php if(isset($username)) echo $username;?>"/>
    <input type="submit" name="next" value="Next Product"/>
    <input type="submit" name="finish" value="Finish Sale"/>
</form>


