<?php
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

?>
