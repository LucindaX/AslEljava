
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

    
    <?php include('lib.php'); ?>
    
    
    <head>
	<title>PHP Project</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="resources/css/images/favicon.ico" />
	<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="resources/css/prettyCheckboxes.css" type="text/css" media="all" />
	<link rel="stylesheet" href="resources/css/redButton.css" type="text/css" media="all" />
	<script src="resources/js/jquery-1.7.min.js" type="text/javascript"></script>
	<script src="resources/js/jquery.jcarousel.js" type="text/javascript"></script>
	<script src="resources/js/prettyCheckboxes.js" type="text/javascript"></script>
	<script src="resources/js/DD_belatedPNG-min.js" type="text/javascript"></script>
	<script src="resources/js/functions.js" type="text/javascript"></script>
</head>
<body>
	<div class="shell">
		<!-- Header -->
		<div id="header">
			<!-- Search  -->			
			<div id="search">
				<div class="search-holder">
					<form action="" method="post">					
						<input type="text" class="field" value="Search Products" title="Keywords" />
						<input type="submit" value="" class="submit-button" />						
					</form>
					<a class="advanced-search" title="Advanced Search" href="#">Advanced Search</a>
					<div class="cl"></div>
				</div>	
			</div>
			<!-- END Search -->						
			<div class="cl"></div>
			<!-- Logo -->
			<h1 id="logo"><a title="Home" href="#">Mega Store</a></h1>
			<!-- Top Navigation -->
			<div id="top-navigation">	
				<ul>
					<li>0 items  $ 0,00</li>
					<li><a class="start" title="My Account" href="#"><span></span>My Account</a></li>
					<li><a class="cart" title="shopping cart" href="#"><span></span>shopping cart </a></li>
					<li><a class="end" title="checkout" href="#">checkout<span></span></a></li>				
				</ul>		
			</div>				
			<!-- END Top Navigation -->	
			<div class="cl"></div>		
		</div>
		<!-- END Header -->
		<!-- Navigation -->
		<div id="navigation">
			<ul>
				<li><a title="Home" href="../index.php">Home<span class="sep-right"></span></a></li>
				<li>
                                    <a href="AddProduct.php"><span class="sep-left"></span>Start Magazine<span class="sep-right"></span></a>
				</li>
				<li>
                                    <a title="Retro" href="reports.php"><span class="sep-left"></span>Search<span class="sep-right"></span></a>
					<div class="dd">
						<ul>
							<li><a href="productReport.php?searchBy=discount"><span class="sep-left"></span>Discount % Products</a></li>
							<li><a href="productReport.php?searchBy=magazine"><span class="sep-left"></span>Products By Magazine</a></li>
							<li><a href="productReport.php?searchBy=bought"><span class="sep-left"></span>Products By Buys</a></li>
                                                        <li><a href="productReport.php?searchBy=visits"><span class="sep-left"></span>Products By Visits</a></li>
							<li><a href="productReport.php?searchBy=notAdded"><span class="sep-left"></span>Products Not Added</a></li>
						</ul>
					</div>
				</li>
                                <li><a title="For Children" href="NewProduct.php"><span class="sep-left"></span>New Product<span class="sep-right"></span></a></li>
                                <li><a title="HI Tech" href="selectProdToEdit.php"><span class="sep-left"></span>Edit Products<span class="sep-right"></span></a></li>		
			</ul>
			<div class="cl"></div>
		</div>
		<!-- END Navigation -->
		<!-- Main  -->
		<div id="main">
			
			<div class="cl"></div>
			<!-- Latest Products -->
			<div class="products">
                            <div>
				<h2>Product Added :</h2>
                               
                                <?php 
                                $conn = createConnection();
                                $lastId = $_GET["lastId"];                            
                                $row = dispalyAddedProduct($conn, $lastId); 
                                if($row){
                                ?>
                                <p class="showProduct">Name : <?php echo $row["p_name"]; ?> </p><br/><br/>
                                <p class="showProduct">Description : <?php echo $row["p_desc"]; ?> </p><br/><br/>
                                <p class="showProduct">Price : <?php echo $row["p_price"]; ?> </p><br/><br/>
                                <p class="showProduct">Stock : <?php echo $row["p_stock"]; ?> </p><br/><br/><br/><br/>
                                <p class="showProduct">Image : <img class="img1" src="<?php echo $row["p_img"]; ?>"></img></p><br/><br/><br/><br/><br/><br/><br/><br/>
                                <p class="showProduct">QR code : <img class="img2" src="<?php echo $row["p_QR"]; ?>"></img></p><br/><br/> <br/><br/>            
                                <p class="showProduct">Date : <?php echo $row["p_AddData"]; ?> </p><br/><br/>
                                <p class="showProduct">Category : <?php echo $row["name"]; ?> </p><br/><br/>                               
                                <button class="btn1" type="button" onclick="location.href='EditAddedProduct.php?row='.$row.'">Edit</button>
                                <button class="btn2" type="button" onclick="location.href='NewProduct.php'">Add new product</button>

                                <?php }else{
                                            echo "error in selection";
                                }?>
                            </div>
				<div class="cl"></div>
			</div>
			<!-- END Latest Products -->		
		</div>
		<!-- END Main -->
	</div>	
</body>
</html>

