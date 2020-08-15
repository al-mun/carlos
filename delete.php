<?php
require('config.php');  
if(isset ($_GET['id'])&& $_GET['id']!=""){  //If there is a var called id, and if it does have a value
$item_id=$_GET['id'];                       //Then get it!

$sql_delete = "DELETE FROM crud_tbl WHERE item_id = $item_id"; //compose query 
$result = $makeconnection->query( $sql_delete );        //press send

}
header("Location: index.php");			
?>	