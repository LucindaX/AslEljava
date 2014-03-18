<?php ob_start();
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
	<script src="vjs/functions.js" type="text/javascript"></script>

	<style>

	label{
	display:inline-block;
	float:left;
	width:150px;
	clear:both;
	}
	
	input{
	display:inline-block;
	float:left;
	
	}
	
	textarea{
	display:inline-block;
	float:left;
	}

	select{
	display:inline-block;
	float:left;
	}

	

	</style>



</head>
    
    <?php
        if(isset($_GET["taken"])){
        echo " <script> alert(\"Product Aleardy Exists\"); </script> "; 
        }
     ?>   
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
		<!-- Main  -->
		<div id="main">
			
			<div class="cl"></div>
			<!-- Latest Products -->
			<div class="products">
                            <div>
                                <?php 
                                    $conn = createConnection();
                                    $result = showCategories($conn);
                                
                                ?>
				<h2>Add Product :</h2>
                                <form class="showProduct" action="addNewProduct.php" method="post" enctype="multipart/form-data">
                                    <label for="pname">Name : </label>
                                    <input type="text" name="pname" id="pname" required/><br/><br/>
                                   
                                    <label for="pdesc">Description : </label>
                                    <textarea rows="4" cols="40" name="pdesc" id="pdesc"></textarea><br/><br/>  
                                   <br><br>
                                    <label for="price">Price : </label>
                                    <input type="number" name="price" id="price" required min="0"/><br/><br/>
                                   
                                    <label for="stock">Stock : </label>
                                    <input type="number" name="pstock" id="stock" required min="0"/><br/><br/>
                                   
                                    <label for="image">Image : </label>
                                    <!--<input type="text" name="image" id="image"/><br/>-->                                   
                                    <input type="file" name="image" id="image" required accept="image/*"/><br/><br/>
                                                                      
                                    
                                    
                                    <label for="date">Addition Date : </label>
                                    <input type="date" name="date" id="date"/><br/><br/>
                                    
                                   <label for="categ">Category : </label>
                              <!--      <input type="text" name="categ" id="categ"/><br/><br/> -->
                                   <select name="categ" id="categ">
                                       <?php while($row =mysqli_fetch_array($result)){ ?>                                    
                                       <option><?php echo $row["name"]; ?></option>
                                       <?php                                       
                                             }
                                             mysqli_close($conn);
                                        ?>
                                   </select>
                                    <br><br>
                                    <input class="red" type="submit" value="Add Product" style="display:block; clear:both" />
                                </form>  
				<br><br>                           
                            </div>
				<div class="cl"></div>
			</div>
			<!-- END Latest Products -->		
		</div>
		<!-- END Main -->
	</div>	
    <div class="footer">
        <div class="footerContent">
            CopyRights @ Reserved to Asl Eljava Team
        </div><img class="imgFooter" src="resources/css/images/logo.png" />
    </div>
   
</body>
</html>
