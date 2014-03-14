<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>PHP Project</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="resources/css/images/favicon.ico" />
	<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="resources/css/pbox.css" type="text/css" media="all" />
	<link rel="stylesheet" href="resources/css/prettyCheckboxes.css" type="text/css" media="all" />
	<link rel="stylesheet" href="resources/css/redButton.css" type="text/css" media="all" />
	<script src="resources/js/jquery-1.7.min.js" type="text/javascript"></script>
	<script src="resources/js/jquery.jcarousel.js" type="text/javascript"></script>
	<script src="resources/js/prettyCheckboxes.js" type="text/javascript"></script>
	<script src="resources/js/DD_belatedPNG-min.js" type="text/javascript"></script>
	<script src="vjs/functions.js" type="text/javascript"></script>
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
				<li><a title="Home" href="#">Home<span class="sep-right"></span></a></li>
				<li>
					<a title="Games" href="#"><span class="sep-left"></span>Gamer<span class="sep-right"></span></a>
				</li>
				<li><a title="Abstract" href="#"><span class="sep-left"></span>abstract<span class="sep-right"></span></a></li>
				<li>
					<a title="Retro" href="#"><span class="sep-left"></span>Retro<span class="sep-right"></span></a>
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
				<li><a title="For Ladies" href="#"><span class="sep-left"></span>For Ladies<span class="sep-right"></span></a></li>
						
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
				<h2>Edit Product :</h2>
                               <?php

                           
           include 'lib.php';
                                      selectPToEdit();//2 draw form to select product to edit it::::::
         
                                ?>
                            </div>
				<div class="cl"></div>
			</div>
			<!-- END Latest Products -->		
		</div>
		<!-- END Main -->
	</div>	
</body>
</html>
