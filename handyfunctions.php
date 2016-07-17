<?php
/**
 * Created by PhpStorm.
 * User: prashant
 * Date: 7/16/16
 * Time: 5:52 PM
 */
function pagination($total,$perpage,$link,$current){
    for ($i = 1; $i <=$total/$perpage ; $i++){
        if ($i==$current) {
            echo "<li ><a class=\"w3-teal\" href = \"$link?page=$i\">$i</a ></li >";
            continue;
        }
        echo "<li ><a href =\"$link?page=$i \" > $i</a ></li >";
    }
}
?>