<?php
         include 'lib.php';
         $conn = createConnection();//1 connect to db
                     
        $Pid=$_POST["pid"];
         $Pname=$_POST["pname"];
         $Pdesc=$_POST["pdesc"];
         $Pprice=$_POST["pprice"];
         $Pstock=$_POST["Pstock"];
         $PDate=$_POST["pdate"];
         $PCategory=$_POST["pcategory"];
         
         $pImage = $_FILES["pimg"]["name"];
	$imgError = $_FILES["pimg"]["error"];
	$imgType = $_FILES["pimg"]["type"];
	$imgSize = $_FILES["pimg"]["size"];
	$imgTmp = $_FILES["pimg"]["tmp_name"]; 
        
        $exten = substr($pImage, -3);
        
        if(!$PDate){
            $PDate = Date("Y-m-d");
        }

         $queryIns = "update products set p_name ='".$Pname."',p_desc ='".$Pdesc."',p_price =".$Pprice.",p_stock=".$Pstock.",p_AddData='".$PDate."',p_category=".$PCategory." where p_id ='".$_POST["pid"]."'";


         $resultIns =mysqli_query($conn,  $queryIns);

        $imgName = "resources/pr_images/"."Image_".$_POST["pid"].".".$exten;
        productImageUpload($imgError, $imgName, $imgType, $imgSize, $imgTmp, $_POST["pid"]);

         mysqli_close($conn);  
           