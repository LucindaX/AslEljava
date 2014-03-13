<?php
require_once('WkHtmlToPdf.php');
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
    function createConnection($dbUser,$dbPass) {
        $dbHost = "localhost";
        $dbName = "phpproject";
        $con = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
        
      // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        return $con;
    }
    
    // Security check for admin
    function userAuthentication() {
       session_start();
       if(!isset($_SESSION["userName"])) {
         header('Location: SignIn.php');
       }
    }
    
    // Print All products to add to magazine
    function printAllProducts($conn) {
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result)) {
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row['p_id'];
                $name = $row['p_name'];
                $price = $row['p_price'];
                $img = $row['p_img'];
                $stock = $row['p_stock'];
                $addData = $row['p_AddData'];
                $category = $row['p_category'];
                
                echo '<div class="product-holder">';
	          echo '<div class="product">';
	            echo '<a title="Details" href="ShowProduct.php?id='.$id.'">';
                      echo '<img src="'.$img.'" alt="Product" />';
                    echo '</a>';
                    
                    if(!$addData) {
                     echo '<img class="sale-label" src="resources/css/images/sale-label.png" alt="Sale!" />';
                    }
                    
                    echo '<input class="red" type="button" value="Add" onclick=""/>';						
		    echo '<p>'.$name.'</p>';													
	          echo '</div>';
		  echo '<p>Product 20</p>';
		    echo '<div class="price-label">';
		      echo '<strike>Descount</strike>';
		      echo '<p class="price">'.$price.' L.E </p>';
		    echo '</div>';	
	        echo '</div>';   
            }
        }
        else {
            echo '<center><h1 style="color:lightgrey"> No Products </h1></center>';
        }   
    }
    
    // this is template .. add your implementation of your own function here :) 
    function yourFunction() {
        
    }

//i have included the WkHtmlToPdf class with my commit
//you have to have the WkHtmlToPdf command running on your terminal
//also the css file is included and is primary for the output to be displayed correctly

function publish($id)
{
	$dbUser = 'root';
	$dbPass = 'mysql';
	$con = createConnection($dbUser, $dbPass);
	$pdf = new WkHtmlToPdf(array(
		'no-outline',
		'margin-top' => 20,
		'margin-right' => 0,
		'margin-bottom' => 0,
		'margin-left' => 0,
	));
	$pdf->setPageOptions(array(
		'disable-smart-shrinking',
		'user-style-sheet' => '/var/www/style.css',
		'zoom' => 0.5
	));
	$sql = "select * from products where p_id in (select prod_id from product_magazine where magzn_id = " . $id . ")";
	$magazine = "";
	$result = mysqli_query($con, $sql);
	if ($result)
	{
		$magazine.= "<html><head><link rel='stylesheet' type='text/css' href='/var/www/style.css'></head><body>";
		$prod_count = 0;
		while ($row = mysqli_fetch_array($result))
		{
			if ($prod_count == 4)
			{
				$magazine.= "</body></html>";
				$pdf->addPage($magazine);
				$magazine = "<html><head><link rel='stylesheet' type='text/css' href='/var/www/style.css'></head><body>";
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
	// header('Content-type: application/pdf')

	mysqli_close($con);
	if (!$pdf->saveAs('test.pdf'))
	{
		throw new Exception('Could not create PDF: ' . $pdf->getError()); //
	}
}
?>
