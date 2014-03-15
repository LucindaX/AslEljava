<?php 
	include('lib.php');

	$pName = $_POST["pname"];
	$pDesc = $_POST["pdesc"];
	$pPrice = $_POST["price"];
	$pStock = $_POST["pstock"];
	$pDate =  $_POST["date"];
	$pCateg = $_POST["categ"];

        $pImage = $_FILES["image"]["name"];
	$imgError = $_FILES["image"]["error"];
	$imgType = $_FILES["image"]["type"];
	$imgSize = $_FILES["image"]["size"];
	$imgTmp = $_FILES["image"]["tmp_name"];

        $exten = substr($pImage, -3);
        
        $conn = createConnection();
	$lastId = addNewProduct($conn, $pName, $pDesc, $pPrice, $pStock, $pDate, $pCateg);
        
        $imgName = "resources/pr_images/"."Image_".$lastId.".".$exten;
        productImageUpload($imgError, $imgName, $imgType, $imgSize, $imgTmp, $lastId);

        generateQR($lastId);

                
        
        
?>
