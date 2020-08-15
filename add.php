<?php
require('config.php'); 				//connect to the database
require('upload_function.php');		//an external PHP file with the function to upload images




if (isset($_POST['submit'])) {	//was form submitted? If yes, time to process.

	//$item_img="first.jpg";
	
$item_img=upload_img();
	
$item_name = $_POST['item_name'];
$item_collection = $_POST['item_collection'];
$item_brand = $_POST['item_brand'];
$item_desc = $_POST['item_desc'];
$item_range = $_POST['item_range'];

	//collect what was submitted from the form, put values into local variables.
	
	
	
$insertSQL = "INSERT INTO crud_tbl												
(item_name, item_collection, item_brand, item_desc, item_img, item_range)
VALUES
('$item_name','$item_collection','$item_brand','$item_desc','$item_img','$item_range')";	//compose an insert query
$result = $makeconnection->query( $insertSQL );							//press send

header ("Location: index.php");
}	//end of "if submitted"

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
			<meta content="width=device-width,initial-scale=1.0" name="viewport">	
<title>Add Art</title>
<link href="style.css" rel="stylesheet" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="jquery-validation/dist/jquery.validate.js"></script>
	<link href="jquery-validation/basic_form_styling.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="container">
	<header>
		<h1>Add Art</h1>
		<p><a href="index.php">Back to Home</a></p>
		</header>

		<main>
		
		<form action="" method="post" enctype="multipart/form-data" id="add_item_form">

		<table width="100%" border="0"  cellspacing="10">

		<tr>
		<td colspan="2" align="center"> <h2>Add item</h2></td>
		</tr>

    	<tr>
      	<td width="40%" height="74" align="right" valign="middle">Art name: </td>
      	<td><input type="text" name="item_name" id="item_name"></td>
		</tr>

		<td width="40%" height="74" align="right" valign="middle">Art Collection: </td>
      	<td><input type="text" name="item_collection" id="item_collection"></td>
		</tr>
		
    	<tr>
      	<td align="right" valign="middle">Description: </td>
		<td><textarea name="item_desc" id="item_desc" rows="8" cols="21"></textarea></td>
		</tr>
		
    	<tr>
      	<td height="46" align="right" valign="middle">Art image</td>
      	<td>
       	<input type="file" name="item_img" id="item_img" required></td>
		</tr>
		
    	<tr>
      	<td align="right" valign="middle">&nbsp;</td>
      	<td><input type="submit" name="submit" id="submit" value="Submit"></td>
    	</tr>

		</table>
		
		</form>	
		  <script>
					$("#add_item_form").validate();
				</script>
	  </main>
		<!--end main-->
	
	
	</div>
	<!--end container-->
	
	
	
</body>
</html>