   <?php

    require_once('WkHtmlToPdf.php');
    include('phpqrcode/qrlib.php'); 
    /*
     * Add your own function with those commands ( da 3shan lw 7ad nasa ;) )
     * git add --> Your Updated File <--
     * git commit -m --> Update Message <-- 
     * git push 
     * 
     * Ay 7ad 3ando comment aw ektra7 yektbo hena :D 
     * 
     * ----------> Name Convention <-----------
     */

    function createConnection() {
        $dbUser = "root"; // Add your username here 
        $dbPass = "54889" ; // Add your password here 
        $dbHost = "localhost";
        $dbName = "phpproject";
        $con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        return $con;
    }
    

    // Security check for admin
    function userAuthentication() {
        session_start();
        if (!isset($_SESSION["userName"])) {
            header('Location: SignIn.php');
        }
    }
    

    // Print All products to add to magazine
    function printAllProducts($conn) {
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {
            
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            
            $cat1 = array();
            $cat2 = array();
            $cat3 = array();
            
            include 'Product.php';
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['p_id'];
                $name = $row['p_name'];
                $price = $row['p_price'];
                $img = $row['p_img'];
                $stock = $row['p_stock'];
                $addData = $row['p_AddData'];
                $category = $row['p_category'];
                
                $item = new Product();
                
                $item->name = $name;
                $item->id = $id;
                $item->price = $price;
                $item->img = $img;
                $item->stock = $stock;
                $item->addData = $addData;
                $item->category = $category;
                
                if($category == 1) {
                    $cat1[$i1] = $item;
                    $i1++;
                }
                else if($category == 2) {
                    $cat2[$i2] = $item;
                    $i2++;
                }
                else if($category == 3) {
                    $cat3[$i3] = $item;
                    $i3++;
                }
           }
           printProducts($cat1,$cat2,$cat3,$conn);
        }
        else {
            echo '<center><h1 style="color:lightgrey"> No Products </h1></center>';
        }
    }
    
    function printProducts($ar1,$ar2,$ar3,$conn) {
        
        echo '<div class="cl"></div>';
        echo '<div class="products">';
          echo '<h2>Category 1 :</h2>';
        foreach ($ar1 as $item) {          
            printHtmlProduct($item,$conn); 
        }
        echo '</div>';
        echo '<div class="cl"></div>';

        echo '<div class="cl"></div>';
        echo '<div class="products">';
          echo '<h2>Category 2 :</h2>';
        foreach ($ar2 as $item) {
            printHtmlProduct($item,$conn);
        }
        echo '</div>';
        echo '<div class="cl"></div>';
       
        echo '<div class="cl"></div>';
        echo '<div class="products">';
          echo '<h2>Category 3 :</h2>';
        foreach($ar3 as $item) {
            printHtmlProduct($item,$conn);
        }
        echo '</div>';
        echo '<div class="cl"></div>';
    }
    
    function printHtmlProduct($item,$conn) {
          echo '<div class="product-holder">';
            echo '<div class="product">';
              echo '<a title="Details" href="ShowProduct.php?id=' . $item->id . '">';
                echo '<img src="' . $item->img . '" alt="Product" />';
              echo '</a>';
              echo '<img id="'.$item->id.'drag" name="'.$item->id.'" src="resources/css/images/drag.png" width="16px" height="16px" alt="drag and drop" ondragstart="event.dataTransfer.setData(&quot; text &quot;,this.name);"/>';

              $query = "SELECT * FROM product_magazine WHERE prod_id = '".$item->id."'";
              $result = mysqli_query($conn, $query);

              if (!mysqli_num_rows($result)) {
                 echo '<img class="sale-label" src="resources/css/images/sale-label.png" alt="Sale!" />';
              }

              echo '<input class="red" type="button" id="'.$item->id.'" name="'.$item->name.'" value="Add" onclick="addItem(this)"/>';
              echo '<p>' . $item->name . '</p>';
            echo '</div>';
            echo '<p>Stock : '.$item->stock.'</p>';
            echo '<div class="price-label">';
              echo '<strike>Discount</strike>';
              echo '<p class="price">' . $item->price . ' L.E </p>';
            echo '</div>';
          echo '</div>';
    }          

    
    function addNewMagazine($conn,$itemsId,$title,$edition) {
        
        $items = split("@", $itemsId);
        
        $query = "INSERT INTO magazine (mag_date,mag_edition,mag_title) VALUES (now(),'".$edition."','".$title."')";
        $result = mysqli_query($conn, $query);
        
        if($result) {
            $query = "SELECT LAST_INSERT_ID()";
            $result = mysqli_query($conn, $query);
            
            if($row = mysqli_fetch_array($result)) {
                $magId = $row[0];
                
                foreach($items as $item) {
                    $query = "INSERT INTO product_magazine VALUES (".$item.",".$magId.")";
                    $result = mysqli_query($conn, $query);
                    
                    if($result) {
                        publish($magId);
                    }
                }
            } 
        }
    }
    
    function printMagazineInfo() {
        echo '<div class="magazineTitles">';
          echo '<h1> Complete Magazine Information :</h1><br></br>'; 
          echo '<font >Title : </font><br/>';
          echo '<input type="text" placeholder="Enter Title" id="title" name="title" /><br></br>';
          echo '<font>Edition :</font><br/>';
          echo '<input type="text" placeholder="Enter Title" " id="edition" name="edition" /><br></br>';
        echo '</div>';
    }

    // this is template .. add your implementation of your own function here :) 
    function yourFunction() {

    }


//i have included the WkHtmlToPdf class with my commit
//you have to have the WkHtmlToPdf command running on your terminal
//also the css file is included and is primary for the output to be displayed correctly




	function addNewProduct($conn, $pName, $pDesc, $pPrice, $pStock, $pDate, $pCateg) { //$pQRname, $pDate, $pCateg) {
		$lastId = 0;
                $i = 0;
                $query = "select p_name from products where p_name='".$pName."'";
                $result = mysqli_query($conn, $query);
                //$row = mysqli_fetch_row($result);
                
             if($result){
                 header("Location: empty.php?taken=1");
                   }
              
                else{
                /*for($i = 0; $i < count($row); $i++){
                   if ((strcmp($row[i], $pName)) == 0){
                       echo $row[$i];
                        header("Location: http://localhost/AslEljava/notUniqueName.php?pname=$pName&pdesc=$pDesc&price=$pPrice&stock=$pStock&date=$pDate&categ=$pCateg");
                   }
                }*/
                
		$query = "insert into products set p_name='" . $pName . "',p_desc='" . $pDesc . "',p_price=" . $pPrice . ",p_stock=" . $pStock . ",p_AddData='" . $pDate . "',p_category=" . $pCateg . "";
		//,p_QR='" . $pQRname . "',p_img='" . $pImage . "'
                echo $query;
                $result = mysqli_query($conn, $query);
		if ($result) {
        		//echo "Insertion Successfull";
                       $lastId = mysqli_insert_id($conn);                      
   		 } else {
        		echo "error..";
   		 }
    		
                return $lastId;
        }
        mysqli_close($conn);
                 }


        function productImageUpload($imgError, $imgName, $imgType, $imgSize, $imgTmp, $lastId){
		if($imgError>0){
			echo "Error:".$imgError."<br/>";
		}elseif($imgSize <= 4000000){ 
			if(file_exists($imgName)){
				echo $imgName."already exists.";		
			}else{
				move_uploaded_file($imgTmp,$imgName);
				echo "Download is complete";
                                $conn = createConnection("root","hello");
                                $query = "update products set p_img='".$imgName."' where p_id=".$lastId."";
                                //echo $query;
                                $result = mysqli_query($conn, $query);
                                if(!$result){
                                    echo "error in product image";
                                }                               
			}
		}else{
			echo "File doen't match conditions";
		}
	}

            
            function generateQR($lastId){
           
                $imageName = "resources/images/test".$lastId.".png";
                QRcode::png("10.1.42.192/AslEljava/store.php?prod_id=".$lastId,$imageName);
                $conn = createConnection("root","hello");
                $query = "update products set p_QR='".$imageName."' where p_id=".$lastId."";
                echo $query;
                $result = mysqli_query($conn, $query);
		if ($result) {
                    header("Location: http://localhost/AslEljava/productAddAgain.php?lastId=$lastId");
                }else{
                    echo "error..";
                }
    
            }

        
        function dispalyAddedProduct($conn, $lastId){
      
            $query = "select * from products where p_id=".$lastId."";      
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            return $row;
        }


function publish($id)
{
	$con = createConnection();
	$pdf = new WkHtmlToPdf(array(
		'no-outline',
		'margin-top' => 20,
		'margin-right' => 0,
		'margin-bottom' => 0,
		'margin-left' => 0,
	));
	$pdf->setPageOptions(array(
		'disable-smart-shrinking',
		'user-style-sheet' => 'style.css',
		'zoom' => 0.5
	));
	$sql = "select * from products where p_id in (select prod_id from product_magazine where magzn_id = " . $id . ")";
	$magazine = "";
	$result = mysqli_query($con, $sql);
	if ($result)
	{
		$magazine.= "<html><head><link rel='stylesheet' type='text/css' href='style.css'></head><body>";
		$prod_count = 0;
		while ($row = mysqli_fetch_array($result))
		{
			if ($prod_count % 4 == 0)
			{
				$magazine.= "</body></html>";
				$pdf->addPage($magazine);
				$magazine = "<html><head><link rel='stylesheet' type='text/css' href='style.css'></head><body>";
				$prod_count = 1;
			}
		
			//images should be included with their absolute path for the to appear correctly in the pdf
			//either we include the path in the database or we add it here as defined

			$magazine.= "  <div class='prod'>
		<div class='image'><img src='" . $row["p_img"] . "' width=200px height=150px/></div>
		<div class='qrcode'><img src='" . $row["p_QR"] . "' width=150px height=150px/></div>
		<div class='description'><div class='product_name'><strong>Product Name : </strong>" . $row["p_name"] . " </div>
					 <div class='features'><strong>Description : </strong>" . $row["p_desc"] . "</div>
					 <div class='afterprice'><strong>Price : </strong>" . $row["p_price"] . "</div>
		</div>
		</div>

    ";
			$prod_count++;
		}

		if ($prod_count % 4 != 0)
		{
			$magazine.= "</body></html>";
			$pdf->addPage($magazine);
		}
	}

	// if you want to view document on browser uncomment this header and use $pdf->send() instead of $pdf->saveAs('test.pdf') which
	// saves a pdf file with the output to your php file directory
	 header('Content-type: application/pdf');

	mysqli_close($con);
	if (!$pdf->saveAs($id.'.pdf'))
	{
		throw new Exception('Could not create PDF: ' . $pdf->getError()); //
	}
        
        $pdf->send($id.'.pdf');   
}






function geoCheckIP($ip)
       {
               //check, if the provided ip is valid
               if(!filter_var($ip, FILTER_VALIDATE_IP))
               {
                       throw new InvalidArgumentException("IP is not valid");
               }

               //contact ip-server
               $response=@file_get_contents('http://www.netip.de/search?query='.$ip);
               if (empty($response))
               {
                       throw new InvalidArgumentException("Error contacting Geo-IP-Server");
               }

               //Array containing all regex-patterns necessary to extract ip-geoinfo from page
               $patterns=array();
               $patterns["domain"] = '#Domain: (.*?)&nbsp;#i';
               $patterns["country"] = '#Country: (.*?)&nbsp;#i';
               $patterns["state"] = '#State/Region: (.*?)<br#i';
               $patterns["town"] = '#City: (.*?)<br#i';

               //Array where results will be stored
               $ipInfo=array();

               //check response from ipserver for above patterns
               foreach ($patterns as $key => $pattern)
               {
                       //store the result in array
                       $ipInfo[$key] = preg_match($pattern,$response,$value) && !empty($value[1]) ? $value[1] : 'not found';
               }

               return $ipInfo;
       }


