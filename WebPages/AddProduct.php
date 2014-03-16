<!--
----------------------- Under Construction ----------------
-->

<?php ob_start();
 include 'lib.php';
 
 userAuthentication();
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
			
                    <div class="itemsHolder" id="itemsHolder" ondragover="event.preventDefault();" ondrop="
                         event.preventDefault();
                         elementId = event.dataTransfer.getData('text');                         
                         element = document.getElementById(elementId);
                 
                         addItem(element);
                         ">          
                    </div>
                    <div id="item">    
                       <input type="button" id="xItem" value="x" style="display: none" onmouseover="this.style.backgroundColor = 'darkgrey'"  onmouseout="this.style.backgroundColor = 'lightgrey'" onmousedown="this.style.backgroundColor = 'lightgrey'" onmouseup="this.style.backgroundColor = 'lightgrey'" onclick="removeItem(this.parentNode)"/>
                     </div>

                    <!-- Products -->	

                    <?php
                      if(isset($_GET['page'])) {
                          if($_GET['page'] == 1) {
                              $page = 1;
                          }
                          else if($_GET['page'] == 2) {
                              $page = 2;
                          }
                          else if($_GET['page'] == 3) {
                              $page = 3;
                          }
                      }
                      else {
                          $page = 1;
                      }
                      
                      $conn = createConnection();
                      
                      if($page == 3) {
                          if(isset($_GET['id'])) {
                    ?>

                    <div id="successMessage" class="successMessage" style="display: block">Congratulation .. You have successfully published Magazine :</div><br></br>
                    <center><input type="button" class="red" value="Download Magazine as PDF" style="font-size: 18px" onclick="window.location = <?php echo $_GET['id'];?>+'.pdf' "/> &nbsp;&nbsp;&nbsp;
                           <input type="button" class="red" value="Preview Magazine in browser" style="font-size: 18px" onclick="window.location = <?php echo $_GET['id'];?>+'.pdf' "/> </center><br></br>

                    <?php
                          }
                          else {
                              header('Location: AddProduct.php');  
                          }
                      }
                      else if($page == 2) {
                          $actionSubmit = "Publish";
                    ?>
                         <form action="Publish.php" method="post" onsubmit="return validate()">      
                    <?php
                          if(!isset($_POST['data'])) {
                              header('Location: AddProduct.php');                              
                          }
                          else {
                              echo '<input type="hidden" id="data" name="data" value="'.$_POST['data'].'" />';
                          }
                          printMagazineInfo();  
                    ?>
                            <center><input type="submit" class="red" value="Publilsh" style="font-size: 18px" /> </center><br></br>
                          </form>
                    <?php
                      }
                      else {
                          $actionSubmit = "Continue";
                          printAllProducts($conn);
                    ?>
                          <form action="AddProduct.php?page=2" method="post" onsubmit="return continuePublish()">
                            <input type="hidden" id="data" name="data" />
                            <center><input type="submit" class="red" value="Continue" style="font-size: 18px" /> </center><br></br>
                          </form>
                          
                    <?php
                      }
                      mysqli_close($conn);
                    ?>
                            
                    <!-- END Products -->
	
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
        
        var items = [];

        function addItem(item) {
           
            items.push(item.id);
            
            item.style.background = "lightgrey";
            item.style.borderColor = "transparent";
            item.value = "added"; 
            item.disabled = true;
            
            imgDrag = document.getElementById(item.id+'drag');
            imgDrag.style.display = "none";
            
            var itemDiv = document.getElementById("item");
            var xItem = document.getElementById("xItem");
            var itemHolder = document.getElementById("itemsHolder");
            
            itemNode = itemDiv.cloneNode();
            xItemNode = xItem.cloneNode();
            
            itemNode.innerHTML = item.name ;
            itemNode.name = item.id;
            itemHolder.style.display = "inline-block";
            itemNode.style.display = "inline-block";
            xItemNode.style.display = "inline-block";
            
            itemNode.appendChild(xItemNode);
            itemHolder.appendChild(itemNode);
            
        }
        
        function removeItem(item) {          
            var itemIndex = items.indexOf(item.id);
            items.splice(itemIndex,1);
            
            product = document.getElementById(item.name);
            item.parentNode.removeChild(item);
            
            imgDrag = document.getElementById(item.name+'drag');
            imgDrag.style.display = "inline-block";
            
            product.style.background = "-webkit-gradient(linear,left top,left bottom,from(#aa1317),to(#ed1c24))";
            product.style.border = "solid 1px #980c10";
            product.value = "Add"; 
            product.disabled = false;
        }
        
        function continuePublish() {
            if(items.length <3) {
                alert("Add more Items plz"); 
                return false;
            }
            else {
               var itemsParameter = "";
               
               for(var i=0;i<items.length;i++) {
                   if(i === 0) {
                      itemsParameter = items[0];   
                   }
                   else {
                      itemsParameter = itemsParameter + "@" + items[i];  
                    }
               }
               
               document.getElementById("data").value = itemsParameter;
               return true;
            }
       }
       
       function validate() {
            if(!document.getElementById("title").value.trim() || !document.getElementById("edition").value.trim()) {
             alert('All data are required !');
             return false;    
            }       
            return true;
       }
    </script>
</body>
</html>