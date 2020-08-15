<?php

$item_id=$_GET['id'];	//Document... If there is a document on the URL called id, grab it and put its value into var $item_id

require( "config.php" );
$sql_get_details = "SELECT * FROM crud_tbl WHERE item_id = $item_id";
$result = $makeconnection->query( $sql_get_details );

$row = $result->fetch_assoc()
	


?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
	<meta content="width=device-width,initial-scale=1.0" name="viewport">
<title>Carlos Tamayo || Project Detailed</title>	
<link href="style.css" rel="stylesheet" type="text/css">
<script src="https://kit.fontawesome.com/80cdf29f61.js" crossorigin="anonymous"></script>        

</head>
<body>
	<div id="container">
    <header>
		<nav class="nav">
                <div class="nav-center">
                    <div class="nav-header">
                        <button class="nav-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <!--Nav links-->
                    <ul class="nav-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">contact</a></li>
                    </ul>
                </div>
            </nav>
			<div class="logo">
                <img src="item_images/CTLOGO.PNG" alt="carlos tamayo">
			</div>

            <!--End of nav bar-->

            <!--sidebar-->
            <aside class="sidebar">
                <div>
                    <button class="close-button">
                        <i class="fas fa-times"></i>
                    </button>
                    <ul class="sidebar-links">
                        <li><a href="index.php">home</a></li>
                        <li><a href="about.html">about</a></li>
                        <!-- <li><a href="work.html">work</a></li> -->
                        <li><a href="contact.html">contact</a></li>
                    </ul>
                </div>
            </aside>

		</header>

		<main>
		<div id="item_catalog">
		
			
		<div class="item_big">
			
				<div class="big_img_holder">
					<img src="item_images/<?php echo $row["item_img"];?>" alt="<?php echo $row["item_name"]; ?>">
				</div>
			
				<div class="big_info_holder">
					<h3 class="item_name"><?php echo $row["item_name"]; ?></h3>
					<h3 class="item_collection">Collection: <?php echo $row["item_collection"]; ?></h3>

					<p class="item_desc">Description:</p> 
					
					<pre><?php echo $row["item_desc"]; ?></pre> <!--Used to keep text spacing-->
		
				</div>
				<!--end item info-->
			</div>
		
			<!--end item big-->

	
			
			</div>
		<!--end item catalog-->
		
				<div class="myclear"></div>
		
		</main>
		<!--end main-->
	
	
	</div>
    <footer class="footer">
			<p>&copy; <span id="date"></span> Carlos Tamayo. All rights reserved.</p>
	
		</footer>
	<!--end container-->
	
	<script src="js/app.js"></script>

	
</body>
</html>