<?php
ob_start();
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
        <script src="js/functions.js" type="text/javascript"></script>

        <style>

            label{
                display:inline-block;
                float:left;
                width:150px;
                clear:both;
            }

            .searchHolder{
                display:inline-block;
                float:left;
                width: 200px;
                height: 25px;
                border-style: solid;
                border-width: 1px;
                border-radius: 4px;
                border-color: darkgrey;
            }

        </style>
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

                <div class="cl"></div>
                <!-- Latest Products -->
                <div class="products">
                    <div>

                        <h2>Edit Product :</h2>
                        <?php
                        selectPToEdit(); //2 draw form to select product to edit it::::::
                        ?>

                        <br></br>
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
        <script>
<?php
if (isset($_GET["msg"]) && isset($_GET['type'])) {
    if($_GET['type'] == '1') {
         ?>
                document.getElementById('successMessage').style.display = "block";
                document.getElementById('successMessage').innerHTML = '<?php echo $_GET['msg'];?>';

                setTimeout(function() {
                    document.getElementById('successMessage').style.display = "none";
                }, 3500);
    <?php
    }
   
    else {
         ?>
                document.getElementById('errorMessage').style.display = "block";
                document.getElementById('errorMessage').innerHTML = '<?php echo $_GET['msg'];?>';

                setTimeout(function() {
                    document.getElementById('errorMessage').style.display = "none";
                }, 3500);
    <?php
    }
}
?>
        </script>
    </body>
</html>
