<?php
//Modify (update) item 
require('config.php'); 
require('upload_function.php');

$item_id=$_GET['id'];	//get me the id I'm supposed to modify

$sql_get_item = "SELECT * FROM crud_tbl WHERE item_id=$item_id";	//get me everything about this item
$result = $makeconnection->query( $sql_get_item);					//press send
$row = $result->fetch_assoc();										//break results into an array
//print_r($row );

if (isset($_POST['submit'])) {	//if the form is submitted,then it's time to process

$item_name = $_POST['item_name'];
$item_collection = $_POST['item_collection'];
$item_brand = $_POST['item_brand'];
$item_desc = $_POST['item_desc'];
$item_range = $_POST['item_range'];

	//collect form values
	if(isset($_POST['item_update_img']) && $_POST['item_update_img']=='yes'){		//if user checked that they want to replace the image
$item_img=upload_img();																// call the upload function
		
$sql_modify = "UPDATE crud_tbl SET  					
 item_name = '$item_name',
 item_collection = '$item_collection',
 item_brand = '$item_brand',
 item_desc = '$item_desc',
 item_img='$item_img',
 item_range='$item_range'
 
			  WHERE item_id = '$item_id'";
			  
			  }else{												//if user didn't check the box, then they want to keep the image.
$sql_modify = "UPDATE crud_tbl SET  
 item_name = '$item_name',
 item_collection = '$item_collection',
 item_brand = '$item_brand',
 item_desc = '$item_desc',
 item_range= '$item_range'
 
			  WHERE item_id = '$item_id'";
			  }
	
	

$result = $makeconnection->query( $sql_modify );		//press send, send the update!

header ("Location: index.php");					//Take me back home
}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
			<meta content="width=device-width,initial-scale=1.0" name="viewport">	
<title>Modify Items</title>
<link href="style.css" rel="stylesheet" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="jquery-validation/dist/jquery.validate.js"></script>
	<link href="jquery-validation/basic_form_styling.css" rel="stylesheet" type="text/css">
	
	
	<script>
	function show_upload(){
		
		if(document.modify_item_form.item_update_img.checked){
		document.getElementById("optional_upload").innerHTML=
'<input type=\"file\" name=\"item_img\" id=\"item_img\">';
		}else{
		document.getElementById("optional_upload").innerHTML=""	
		}
			
		}
	
	</script>
	
	
	
</head>

<body>
	<div id="container">
	<header>
		<h1>Modify Art</h1>
		<p><a href="index.php">Home</a></p>
		</header>

		<main>
		
			<form action="" method="post" enctype="multipart/form-data" id="modify_item_form" name="modify_item_form">
			<table width="100%" border="0"  cellspacing="10">

    <tr>
      <td width="40%" height="74" align="right" valign="middle">Art name: </td>
      <td><input type="text" name="item_name" id="item_name" value="<?php echo $row["item_name"]; ?>"></td>
    </tr>

    <tr>

      	<td height="87" align="right" valign="middle">Art Collection: </td>
    	<td><input type="text" name="item_collection" id="item_collection" value="<?php echo $row["item_collection"]; ?>"></td>
    </tr>
    <tr>
      	<td align="right" valign="middle">Art description: </td>
		<td><textarea name="item_desc" id="item_desc" rows="8" cols="21"><?php echo $row["item_desc"]; ?></textarea></td>
	</tr>
	
    <tr>
      <td height="46" align="right" valign="middle">Art Image: </td>
      <td>
		  	<img src="item_images/<?php echo $row["item_img"];?>" alt="<?php echo $row["item_name"]; ?>" height="200">
		  <br>
		 <p>Replace image?  
			 <input type="checkbox" name="item_update_img" id="item_update_img" value="yes" onclick="show_upload()">
		  </p> 
		  <p id="optional_upload"> </p>
		  
      </td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Submit"></td>
    </tr>

</table>
		
	</form>	
		  <script>
					$("#modify_item_form").validate();
				</script>
	  </main>
		<!--end main-->
	
	
	</div>
	<!--end container-->
	
	
	
</body>
</html>