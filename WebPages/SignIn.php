<?php ob_start(); session_start();
include 'lib.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <head>
        <title>Add Product</title>
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
        <script src="resources/js/spin.min.js" type="text/javascript"></script>
        <script src="resources/js/spin.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="shell">
            <!-- Header -->
		<div id="header">
			<!-- Search  -->			
			<div id="search">
				<div class="search-holder">
					<form action="" method="post">					
						<input type="text" class="field" placeholder="Search Products" />
						<input type="submit" value="" class="submit-button" />						
					</form>
					<div class="cl"></div>
				</div>	
			</div>
			<!-- END Search -->						
			<div class="cl"></div>
			<!-- Logo -->
			<h1 id="logo"><a title="Home" href="../index.php">AslELjava Stores</a></h1>

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
                                                        <li><a href="searchByVisits.php"><span class="sep-left"></span>Products By Visits</a></li>
							<li><a href="productReport.php?searchBy=notAdded"><span class="sep-left"></span>Products Not Added</a></li>
						</ul>
					</div>
				</li>
                                <li><a title="For Children" href="NewProduct.php"><span class="sep-left"></span>New Product<span class="sep-right"></span></a></li>
                                <li><a title="HI Tech" href="searchProduct.php"><span class="sep-left"></span>Edit Products<span class="sep-right"></span></a></li>		
			</ul>
			<div class="cl"></div>
		</div>
		<!-- END Navigation -->
            
            <div id="successMessage" class="successMessage"></div>
            <div id="errorMessage" class="errorMessage"></div>
            
            <!-- Main  -->
            <div id="main">
                <div id="signIn">
                    <?php
                    if (isset($_SESSION['username'])) {
                        header('location: AdminPanel.php');
                    } else {
                        if(isset($_COOKIE["username"])) {
                            $_SESSION['username'] = $_COOKIE['username'];
                            $_SESSION['type'] = $_COOKIE['type'];
                            
                            header('Location: AdminPanel.php');
                        }
                        else {
                            printForm(1);
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- END Main -->
        </div>	
        <script>

            var spinner = new Spinner().spin();
            var buttonDiv = document.getElementById("signIn").appendChild(spinner.el);
            buttonDiv.style.marginLeft = '470px';
            buttonDiv.style.display = 'none';

            function validate() {
                if (!document.getElementById("username").value.trim() || !document.getElementById("password").value.trim()) {
                    document.getElementById('errorMessage').style.display = "block";
                    document.getElementById('errorMessage').innerHTML = 'All Data are Required !';
                    
                    setTimeout(function(){document.getElementById('errorMessage').style.display = "none";},3500);
                            
                }
                else {
                    document.getElementById("submitBtn").style.display = 'none';
                    buttonDiv.style.display = 'block';
                    setTimeout(function() {
                    }, 2000);

                    var xhr = new XMLHttpRequest();

                    xhr.onload = function() {
                        if (this.responseText.trim() === 'done') {
                            window.location = "AdminPanel.php";
                        }
                        else {
                            document.getElementById('errorMessage').style.display = "block";
                            document.getElementById('errorMessage').innerHTML = this.responseText;
                    
                            setTimeout(function(){document.getElementById('errorMessage').style.display = "none";},3500);
                            
                            document.getElementById("submitBtn").style.display = 'block';
                            buttonDiv.style.display = 'none';
                        }
                    }
                    xhr.open("post", "SignInHandle.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send("username=" + document.getElementById("username").value + "&password=" + document.getElementById("password").value);
                }
            }
        </script>
    </body>
</html>
