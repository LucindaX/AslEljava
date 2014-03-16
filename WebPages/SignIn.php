<?php ob_start();
include 'lib.php';
session_start();
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
            
            <div id="successMessage" class="successMessage"></div>
            <div id="errorMessage" class="errorMessage"></div>
            
            <!-- Main  -->
            <div id="main">
                <div id="signIn">
                    <?php
                    if (isset($_SESSION['username'])) {
                        header('location: AdminPanel.php');
                    } else {
                        printForm(1);
                    }
                    ?>
                </div>
                <!-- Footer  -->
                <div id="footer">
                    <div id="footer-top"></div>
                    <div id="footer-middle">
                        <div class="col styles">
                            <h3>Styles</h3>
                            <ul>
                                <li><a title="gamer" href="#"><span class="bullet"></span>gamer</a></li>
                                <li><a title="abstract" href="#"><span class="bullet"></span>abstract</a></li>
                                <li><a title="retro" href="#"><span class="bullet"></span>retro</a></li>
                                <li><a title="hi tech" href="#"><span class="bullet"></span>hi tech</a></li>
                                <li><a title="for children" href="#"><span class="bullet"></span>for children</a></li>
                                <li><a title="for ladies" href="#"><span class="bullet"></span>for ladies</a></li>							
                            </ul>
                        </div>
                        <div class="col info">
                            <h3>Information</h3>
                            <ul>
                                <li><a title="About MEGAStore" href="#"><span class="bullet"></span>About MEGAStore</a></li>
                                <li><a title="Privacy Policy" href="#"><span class="bullet"></span>Privacy Policy</a></li>
                                <li><a title="Terms &amp; Conditions" href="#"><span class="bullet"></span>Terms &amp; Conditions</a></li>
                                <li><a title="Contact Us" href="#"><span class="bullet"></span>Contact Us</a></li>
                                <li><a title="Site Map" href="#"><span class="bullet"></span>Site Map</a></li>												
                            </ul>
                        </div>
                        <div class="col newsletter">
                            <h3>Newsletter</h3>
                            <p>NO SPAM! Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <form action="" method="post">
                                <div class="field-holder"><input type="text" class="field" value="Enter Your Email" title="Enter Your Email" /></div>
                                <div class="cl"></div>
                                <input type="checkbox" name="check-box" value="" id="check-box" />
                                <label for="check-box">Lorem ipsum dolor sit amet, consectetur </label>
                                <input type="submit" value="submit" class="submit-button" />
                            </form>
                        </div>
                        <div class="cl"></div>
                    </div>
                    <div id="footer-bottom">
                        <p>&copy; MegaStore. Design by <a href="http://css-free-templates.com/">CSS-FREE-TEMPLATES.COM</a></p>
                    </div>
                </div>
                <!-- END Footer -->
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
                    
                    setInterval(function(){document.getElementById('errorMessage').style.display = "none";},3500);
                            
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
                    
                            setInterval(function(){document.getElementById('errorMessage').style.display = "none";},3500);
                            
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
