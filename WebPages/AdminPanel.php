<!--
   ----------------------- Under Construction ----------------
-->

<?php
  include 'lib.php';
  
  userAuthentication();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
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
					<div class="cl"></div>
				</div>	
			</div>
			<!-- END Search -->						
			<div class="cl"></div>
			<!-- Logo -->
			<h1 id="logo"><a title="Home" href="../index.php">AslELjava Stores</a></h1>
			<!-- Top Navigation -->
			<div id="top-navigation">	
				<ul>
                                        <li><a class="start" title="My Account" href="SignOutHandle.php"><span></span>Sign Out</a></li>
                                        <li><a class="cart" title="shopping cart" href="../index.php"><span></span>Home</a></li>				
				</ul>		
			</div>				
			<!-- END Top Navigation -->	
			<div class="cl"></div>		
		</div>
		<!-- END Header -->
		<!-- Navigation -->
		<div id="navigation">
			<ul>
				<li><a title="Home" href="#">Home<span class="sep-right"></span></a></li>
				<li>
                                    <a title="Games" href="AddProduct.php"><span class="sep-left"></span>Start Magazine<span class="sep-right"></span></a>
				</li>
                                <li><a title="Abstract" href="NewProduct.php"><span class="sep-left"></span>New Product<span class="sep-right"></span></a></li>
				<li>
					<a title="Retro" href="#"><span class="sep-left"></span>Search<span class="sep-right"></span></a>
					<div class="dd">
						<ul>
							<li><a title="Drop down menu 1" href="#"><span class="sep-left"></span>Drop down menu 1</a></li>
							<li>
								<a title="Drop down menu 2" href="#"><span class="sep-left"></span>Drop down menu 2</a>
								<div class="dd">
									<ul>
										<li><a title="Drop down menu 1" href="#"><span class="sep-left"></span><span class="dd-first"></span>Drop down menu 1</a></li>
										<li><a title="Drop down menu 2" href="#"><span class="sep-left"></span>Drop down menu 2</a></li>
										<li><a title="Drop down menu 3" href="#"><span class="sep-left"></span>Drop down menu 3</a></li>										
									</ul>
								</div>
							</li>
							<li><a title="Drop down menu 3" href="#"><span class="sep-left"></span>Drop down menu 3</a></li>							
						</ul>
					</div>
				</li>
				<li><a title="HI Tech" href="#"><span class="sep-left"></span>HI Tech<span class="sep-right"></span></a></li>
				<li><a title="For Children" href="#"><span class="sep-left"></span>For Children<span class="sep-right"></span></a></li>
						
			</ul>
			<div class="cl"></div>
		</div>
		<!-- END Navigation -->
		<!-- Main  -->
		<div id="main">
			
			<div class="cl"></div>
                        
                        <div id="successMessage" class="successMessage">dasdasda</div>
                        <div id="errorMessage" class="errorMessage">dasdasda</div>
			<!-- Latest Products -->
			<div class="products">
				<h2>Admin Panel :</h2>
				<div class="product-holder">
					<div class="product">
                                            <a title="Details" href="AddProduct.php"><img src="resources/css/images/magazine.png" alt="Black and red stylish computer case" style="margin-bottom: 40px; margin-top: 15px;"/></a>
						<p style="color: white; background: url(resources/css/images/product-label-green.png) repeat-x 0 0;">Start Magazine</p>							
					</div>
				</div>
				<div class="product-holder">
					<div class="product">
                                            <a title="Details" href="NewProduct.php"><img src="resources/css/images/newproduct.png" alt="Beautiful white case with flower motives" style="margin-bottom: 40px; margin-top: 15px;"/></a>		
						<p style="color: white; background: url(resources/css/images/product-label-blue.png) repeat-x 0 0;">New Product</p>													
					</div>
				</div>
				<div class="product-holder">
					<div class="product">
						<a title="Details" href="#"><img src="resources/css/images/edit.png" alt="Beautiful white case with flower motives" style="margin-bottom: 40px; margin-top: 15px;"/></a>			
						<p style="color: white; background: url(resources/css/images/product-label-red.png) repeat-x 0 0;">Edit Products</p>													
					</div>
				</div>
				<div class="product-holder">
					<div class="product">
                                            <a title="Details" href="reports.php"><img src="resources/css/images/reports.png" alt="Beautiful white case with flower motives" style="margin-bottom: 40px; margin-top: 15px;"/></a>			
						<p style="color: white; background: url(resources/css/images/product-label-grey.png) repeat-x 0 0;">Reports</p>													
					</div>
				</div>
                                <?php
                                    if(isset($_SESSION['type'])) {
                                        if($_SESSION['type'] == '1') {
                                ?>
                                
                                <div class="product-holder">
					<div class="product">
                                            <a title="Details" href="SignUp.php"><img src="resources/css/images/reports.png" alt="Beautiful white case with flower motives" style="margin-bottom: 40px; margin-top: 15px;"/></a>			
						<p style="color: white; background: url(resources/css/images/product-label-grey.png) repeat-x 0 0;">New System admin</p>													
					</div>
                                    <p>Super Root Only Allowed</p>
				</div>
                                
                                <?php
                                        }
                                    }
                                ?>
				<div class="cl"></div>
			</div>
			<!-- END Latest Products -->		
		</div>
		<!-- END Main -->
	</div>	
    <script>
        <?php
            if(isset($_GET['msg']) && isset($_GET['type'])) {
                if($_GET['type'] == 'yes') {
        ?>
                    document.getElementById('successMessage').style.display = "block";
                    document.getElementById('successMessage').innerHTML = '<?php echo $_GET['msg']; ?>';
                    
                    setInterval(function(){document.getElementById('successMessage').style.display = "none";},3500);
        <?php
                }
                else if($_GET['type'] == 'no'){
         ?>
                    document.getElementById('errorMessage').style.display = "block";
                    document.getElementById('errorMessage').innerHTML = '<?php echo $_GET['msg'];?>';
                    
                    setInterval(function(){document.getElementById('errorMessage').style.display = "none";},3500);
        <?php
                }
            }
        ?>
    </script>
</body>
</html>