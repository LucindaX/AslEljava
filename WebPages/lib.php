
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

    function createConnection() {
        $dbUser = "root"; // Add your username here 
        $dbPass = "54889";
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
        if (!isset($_SESSION["username"])) {
            header('Location: SignIn.php');
        }
    }

    // Print All products to add to magazine
    function printAllProducts($conn) {
        $query = "SELECT products.*,name FROM products,categories WHERE p_category = id ORDER BY name";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {

            $categoryArr = array();
            $new = array();
            $i = 0;

            include 'Product.php';
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['p_id'];
                $name = $row['p_name'];
                $price = $row['p_price'];
                $img = $row['p_img'];
                $stock = $row['p_stock'];
                $addData = $row['p_AddData'];
                $category = $row['name'];

                $item = new Product();

                $item->name = $name;
                $item->id = $id;
                $item->price = $price;
                $item->img = $img;
                $item->stock = $stock;
                $item->addData = $addData;
                $item->category = $category;
                
                
                if($i == 0) {
                    array_push($new,$item);
                    $i = 1;
                }
                else {
                   if($item->category != $new[sizeof($new)-1]->category) {
                        array_push($categoryArr,$new);
                        $new = array();
                        array_push($new,$item);
                    }
                    else {
                        array_push($new,$item);
                    } 
                }       
            }
            array_push($categoryArr,$new);
            
            foreach ($categoryArr as $value) {
                printCategoryProducts($value,$conn);
            }

        } else {
            echo '<center><h1 style="color:lightgrey"> No Products </h1></center>';
        }
    }

    function printCategoryProducts($cat, $conn) {

        echo '<div class="cl"></div>';
        echo '<div class="products">';
        echo '<h2>'.$cat[0]->category.' :</h2>';
        foreach ($cat as $item) {
            printHtmlProduct($item, $conn,1);
        }
        echo '</div>';
        echo '<div class="cl"></div>';
    }

    function printHtmlProduct($item, $conn, $type) {
        echo '<div class="product-holder">';
        echo '<div class="product">';
        echo '<a title="Details" href="ShowProduct.php?id=' . $item->id . '">';
        echo '<img src="' . $item->img . '" alt="Product" />';
        echo '</a>';

        if($type == 1) {
            $query = "SELECT * FROM product_magazine WHERE prod_id = '" . $item->id . "'";
            $result = mysqli_query($conn, $query);

            if (!mysqli_num_rows($result)) {
                echo '<img class="sale-label" src="resources/css/images/sale-label.png" alt="Sale!" />';
            }
            echo '<img id="' . $item->id . 'drag" name="' . $item->id . '" src="resources/css/images/drag.png" width="16px" height="16px" alt="drag and drop" ondragstart="event.dataTransfer.setData(&quot; text &quot;,this.name);"/>';
            echo '<input class="red" type="button" id="' . $item->id . '" name="' . $item->name . '" value="Add" onclick="addItem(this)"/>';
        }

        echo '<p>' . $item->name . '</p>';
        echo '</div>';
        
        if($type == 1) {
            echo '<p>Stock : ' . $item->stock . '</p>';
            echo '<div class="price-label">';
            echo '<strike>Discount</strike>';
            echo '<p class="price">' . $item->price . ' L.E </p>';
            echo '</div>';
        }
        
        echo '</div>';
    }

    function addNewMagazine($conn, $itemsId, $title, $edition) {

        $items = split("@", $itemsId);

        $query = "INSERT INTO magazine (mag_date,mag_edition,mag_title) VALUES (now(),'" . $edition . "','" . $title . "')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $query = "SELECT LAST_INSERT_ID()";
            $result = mysqli_query($conn, $query);

            if ($row = mysqli_fetch_array($result)) {
                $magId = $row[0];

                foreach ($items as $item) {
                    $query = "INSERT INTO product_magazine VALUES (" . $item . "," . $magId . ")";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        publish($magId);
                    }
                }
            }
        }

        return $magId;
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

    //----------------------------------S.S
    function deleteProducts() {

        echo"<html>";
        echo"<body>";
        echo"<form action=deleteproduct.php   method=post>";
        echo"<div class=pform><b><i> Please Enter Product Name To Delete : </i></b> </div>";
        echo"<INPUT TYPE=TEXT NAME=pname class=inputclass /> <br> <br>";
        echo"<input type=submit  id=subbtn name=submitbtn value=DeleteProduct />";
        echo"</form>";
        echo"</body>";
        echo"</html>";
    }

    //----------------------------------S.S
    function selectPToEdit() {
        echo"<html>";
        echo"<body>";
        echo"<form  action=editproduct.php method=post>";
        echo"<div class=pform><b><i> Enter Product Name: </i></b> </div>";
        echo"<INPUT TYPE=TEXT NAME=name class=inputclass /> <br> <br>";
        echo"<input  id=subbtn type=submit name=submitbtn value=EditProduct />";
        echo"</form>";
        echo"</body>";
        echo"</html>";
    }

    //---------------------------------S.S
    function drawEditLayout($prodArr) {
        echo"<html>";
        echo"<body>";
        echo"<form  action='insertIntoDB.php'  method='post' enctype='multipart/form-data'>";
        // echo"Product Id :";
        echo"<INPUT NAME=pid type=hidden value=" . $prodArr[0] . " class=inputclass /> <br> <br>";


        echo"<div class=pform><b><i>Product Name : </i></b> </div>";
        echo"<INPUT TYPE=TEXT NAME=pname    value='" . $prodArr[1] . "' class=inputclass /> <br> <br>";

        echo" <div class=pform><b><i> Product Description :</i></b> </div>";
        // echo"<INPUT TYPE=TEXT NAME=pdesc    value=$prodArr[2]> <br> <br>";//
        echo"<textarea rows=4 cols=50 name=pdesc class=inputclass> " . $prodArr[2] . " </textarea> <br> <br>";

        echo"<div class=pform><b><i>Product Price : </i></b> </div>";
        echo"<INPUT TYPE=number  NAME=pprice   value=" . $prodArr[3] . " class=inputclass /> <br> <br>"; //

        echo"<div class=pform><b><i>Product Stock :</i></b> </div>";
        echo"<INPUT TYPE=number  NAME=Pstock   value=" . $prodArr[4] . " class=inputclass /> <br> <br>"; //

        echo"<div class=pform><b><i>Product Image :</i></b> </div>";
        echo"<INPUT TYPE=file id=pimg NAME=pimg value='" . $prodArr[5] . "' class=inputclass /> <br> <br>"; //done

        echo"<div class=pform><b><i>Product QR :</i></b> </div>";
        echo"<INPUT TYPE=TEXT NAME=Pqr      value='" . $prodArr[6] . "' class=inputclass /> <br> <br>";

        echo"<div class=pform><b><i>Product Date:</i></b> </div>";
        echo"<INPUT TYPE=TEXT NAME=pdate    value= '" . $prodArr[7] . "' class=inputclass /> <br> <br>"; //

        echo"<div class=pform><b><i>Product Category:</i></b> </div>";
        echo"<INPUT TYPE=number  NAME=pcategory value=" . $prodArr[8] . " class=inputclass /> <br> <br>"; //

        echo"<input type=submit name=submitbtn id=subbtn  value=Done />";
        echo"</form>";
        echo"</body>";
        echo"</html>";
    }

    //i have included the WkHtmlToPdf class with my commit
    //you have to have the WkHtmlToPdf command running on your terminal
    //also the css file is included and is primary for the output to be displayed correctly

    function publish($id) {
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
        if ($result) {
            $magazine.= "<html><head><link rel='stylesheet' type='text/css' href='style.css'></head><body>";
            $prod_count = 0;
            while ($row = mysqli_fetch_array($result)) {


                //images should be included with their absolute path for the to appear correctly in the pdf
                //either we include the path in the database or we add it here as defined

                $magazine.= "  <div class='prod'>
                        <div class='image'><img src='~/var/www/AslEljava/WebPages/" . $row["p_img"] . "' width=200px height=150px/></div>
                        <div class='qrcode'><img src='~/var/www/AslEljava/WebPages/" . $row["p_QR"] . "' width=150px height=150px/></div>
                        <div class='description'><div class='product_name'><strong>Product Name : </strong>" . $row["p_name"] . " </div>
                                                 <div class='features'><strong>Description : </strong>" . $row["p_desc"] . "</div>
                                                 <div class='afterprice'><strong>Price : </strong>" . $row["p_price"] . "</div>
                        </div>
                        </div>

            ";

                $prod_count++;
                if ($prod_count == 4) {
                    $magazine.= "</body></html>";
                    $pdf->addPage($magazine);
                    $magazine = "<html><head><link rel='stylesheet' type='text/css' href='style.css'></head><body>";
                    $prod_count = 0;
                }
            }

            if ($prod_count % 4 != 0) {
                $magazine.= "</body></html>";
                $pdf->addPage($magazine);
            }
        }

        // if you want to view document on browser uncomment this header and use $pdf->send() instead of $pdf->saveAs('test.pdf') which
        // saves a pdf file with the output to your php file directory
        // header('Content-type: application/pdf');

        mysqli_close($con);
        if (!$pdf->saveAs($id . '.pdf')) {
            throw new Exception('Could not create PDF: ' . $pdf->getError()); //
        }

        //$pdf->send($id . '.pdf');
    }

    function geoCheckIP($ip) {
        //check, if the provided ip is valid
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            throw new InvalidArgumentException("IP is not valid");
        }

        //contact ip-server
        $response = @file_get_contents('http://www.netip.de/search?query=' . $ip);
        if (empty($response)) {
            throw new InvalidArgumentException("Error contacting Geo-IP-Server");
        }

        //Array containing all regex-patterns necessary to extract ip-geoinfo from page
        $patterns = array();
        $patterns["domain"] = '#Domain: (.*?)&nbsp;#i';
        $patterns["country"] = '#Country: (.*?)&nbsp;#i';
        $patterns["state"] = '#State/Region: (.*?)<br#i';
        $patterns["town"] = '#City: (.*?)<br#i';

        //Array where results will be stored
        $ipInfo = array();

        //check response from ipserver for above patterns
        foreach ($patterns as $key => $pattern) {
            //store the result in array
            $ipInfo[$key] = preg_match($pattern, $response, $value) && !empty($value[1]) ? $value[1] : 'not found';
        }

        return $ipInfo;
    }

    function addNewProduct($conn, $pName, $pDesc, $pPrice, $pStock, $pDate, $pCateg) { //$pQRname, $pDate, $pCateg) {
        $lastId = 0;
        
        $query = "select p_name from products where p_name='" . $pName . "'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);

        if ($row) {
            header("Location: NewProduct.php?taken=1");
        } else {
            $query = "select id from categories where name='".$pCateg."'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result); 
            $pCategId = $row["id"]; 
          
            $query = "insert into products set p_name='" . $pName . "',p_desc='" . $pDesc . "',p_price=" . $pPrice . ",p_stock=" . $pStock . ",p_AddData='" . $pDate . "',p_category=" . $pCategId . "";
            
            
            $result = mysqli_query($conn, $query);
            if ($result) {
                
                $lastId = mysqli_insert_id($conn);
            } else {
                echo "error..";
            }

            return $lastId;
        }
        mysqli_close($conn);
    }
    
    

    function productImageUpload($imgError, $imgName, $imgType, $imgSize, $imgTmp, $lastId) {
        if ($imgError > 0) {
            echo "Error:" . $imgError . "<br/>";
        } elseif ($imgSize <= 4000000) {
            if (file_exists($imgName)) {
                echo $imgName . "already exists.";
            } else {
                move_uploaded_file($imgTmp, $imgName);
                echo "Download is complete";
                $conn = createConnection();
                $query = "update products set p_img='" . $imgName . "' where p_id=" . $lastId . "";
                //echo $query;
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    echo "error in product image";
                }
            }
        } else {
            echo "File doen't match conditions";
        }
    }

    function generateQR($lastId) {
        include '../phpqrcode/qrlib.php';
        $imageName = "resources/qr_images/test" . $lastId . ".png";
        QRcode::png("10.1.42.192/AslEljava/store.php?prod_id=" . $lastId, $imageName);
        $conn = createConnection();
        $query = "update products set p_QR='" . $imageName . "' where p_id=" . $lastId . "";
        echo $query;
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location: productAddAgain.php?lastId=$lastId");
        } else {
            echo "error..";
        }
    }

    function dispalyAddedProduct($conn, $lastId) {

        $query = "select p.*,c.name from products p left join categories c on p.p_category=c.id where p.p_id=".$lastId."";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        return $row;
    } 


    
    
    // ---- REPORTS FUNCTIONS ----
    function searchByMagazine($conn) {
        $query = "SELECT * FROM magazine";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result)) {
           while($row = mysqli_fetch_array($result)) {
             echo '<div class="product-holder">';
             echo '<div class="product">';
             echo '<a title="Details" href="magazine.php?id='.$row[0].'"><h1 style="margin-bottom: 20px; margin-top: 15px;color: darkgrey; margin-left: 75px;">'.$row[3].'</h1></a>';			
	     echo '<img class="sale-label" src="resources/css/images/sale-label.png" alt="Sale!" />';
             echo '<p style="color: white; background: url(resources/css/images/product-label-brown.png) repeat-x 0 0;">Edition : '.$row[2].'</p>';													
	     echo '</div>';
             echo '<p>Date : ' .$row[1]. '</p>';
	     echo '</div>';
           } 
        }
        else {
            echo '<br></br><center><h1 style="color: lightgrey">No Products</h1></center><br><br></br></br>';
        } 
    }     
    
    
    function searchByDiscount($conn) {
        $query = "SELECT p_id,p_name,discount FROM products LEFT JOIN product_discount ON pro_id = p_id WHERE discount IS NOT NULL ORDER BY discount DESC;";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result)) {
           while($row = mysqli_fetch_array($result)) {
             echo '<div class="product-holder">';
             echo '<div class="product">';
             echo '<a title="Details" href="productAddAgain.php?lastId='.$row[0].'"><h1 style="margin-bottom: 20px; margin-top: 15px;color: darkgrey; margin-left: 75px;">'.$row[2].'%</h1></a>';			
	     echo '<img class="sale-label" src="resources/css/images/sale-label.png" alt="Sale!" />';
             echo '<p style="color: white; background: url(resources/css/images/product-label-brown.png) repeat-x 0 0;">'.$row[1].'</p>';													
	     echo '</div>';
	     echo '</div>';
           } 
        }
        else {
            echo '<br></br><center><h1 style="color: lightgrey">No Products</h1></center><br><br></br></br>';
        } 
    }
    
    
    function searchByAdding($conn) {
        $query = "SELECT P_id,p_name,p_stock FROM products";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result)) {
            $check = true;
            while($row = mysqli_fetch_array($result)) {
                $query = "SELECT * FROM product_magazine WHERE prod_id = '" .$row[0]. "'";
                $resultMag = mysqli_query($conn, $query);
 
                if (!mysqli_num_rows($resultMag)) {
                   
                  $check = false;
                    
                  echo '<div class="product-holder">';
                  echo '<div class="product">';
                  echo '<a title="Details" href="productAddAgain.php?lastId='.$row[0].'"><h1 style="margin-bottom: 20px; margin-top: 15px;color: darkgrey; margin-left: 45px;">'.$row[2].' in Stock</h1></a>';
                  echo '<img class="sale-label" src="resources/css/images/sale-label.png" alt="Sale!" />';
                  echo '<p style="color: white; background: url(resources/css/images/product-label-brown.png) repeat-x 0 0;">'.$row[1].'</p>';													
                  echo '</div>';
                  echo '</div>';
                }
             }
             if($check) echo '<br></br><center><h1 style="color: lightgrey">No Products</h1></center><br><br></br></br>';
        }
        else {
            echo '<br></br><center><h1 style="color: lightgrey">No Products</h1></center><br><br></br></br>';
        }  
    }
    
    
    function searchByBought($conn) {
        $query = "SELECT p_id,p_name,p_hits FROM products ORDER BY p_hits DESC";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result)) {
            while($row = mysqli_fetch_array($result)) {
               echo '<div class="product-holder">';
               echo '<div class="product">';
               echo '<a title="Details" href="productAddAgain.php?lastId='.$row[0].'"><h1 style="margin-bottom: 20px; margin-top: 15px;color: darkgrey; margin-left: 50px;">'.$row[2].' Piece</h1></a>';
               echo '<img class="sale-label" src="resources/css/images/sale-label.png" alt="Sale!" />';
               echo '<p style="color: white; background: url(resources/css/images/product-label-brown.png) repeat-x 0 0;">'.$row[1].'</p>';													
               echo '</div>';
               echo '</div>'; 
            }
        }
        else {
            echo '<br></br><center><h1 style="color: lightgrey">No Products</h1></center><br><br></br></br>';
        }
    }
    
    function searchByVisiting($conn) {
        // under conustruction
    }
    // ---- END OF REPORTS FUNCTIONS ----
    
    
    // Preview All Magazine Content
    function previewMagazine($conn , $id) {
        $query = "SELECT * FROM magazine WHERE mag_id = ".$id;
        $resultMag = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($resultMag)) {
            $rowMag = mysqli_fetch_array($resultMag);
            
            echo '<div style="background-color: white; border-left-color: darkgrey; border-left-style: solid; border-left-width: 13px;padding: 5px;"><h1>Title : '.$rowMag[3].'</h1>';
            echo '<h3>Edition : '.$rowMag[2].'</h2>';
            echo '<h3>Date : '.$rowMag[1].'</h2></div>';
            echo '<br></br><h1>Products in magazine : </h1><br></br>';
            
            $query = "SELECT products.* FROM products LEFT JOIN product_magazine ON p_id = prod_id WHERE magzn_id = ".$id;
            $result = mysqli_query($conn, $query);
            
            if(mysqli_num_rows($result)) {
                require_once 'Product.php';
                while($row = mysqli_fetch_assoc($result)) {
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

                   printHtmlProduct($item, $conn,2);
                }
            }
            else {
                echo '<br></br><center><h1 style="color: lightgrey">No Items in this magazine .. Or products has been removed</h1></center><br><br></br></br>';
            }
        }
        else {
            echo '<br></br><center><h1 style="color: lightgrey">Error in magazine ID</h1></center><br><br></br></br>';
        }
    }
    
    
    function addNewCategory($conn, $categName){
        $query = "select name from categories where name='" . $categName . "'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        if ($row) {
            header("Location: AddNewCategoryForm.php?taken=1");
        } else {
            $query = "insert into categories set name='".$categName."'";
            $result = mysqli_query($conn, $query);
            return $result;
        }     
    }
    
    function showCategories($conn){
        $query = "select name from categories";
        $result = mysqli_query($conn, $query);
        
        return $result;       
    }
    
    
    function  printForm($type) {
        echo '<div class="magazineTitles">';
        if($type == 1) {
            $action = 'Sign In';
        }
        else {
            $action = 'Sign Up';
        }
        echo '<h1> '.$action.' :</h1><br></br>';
        echo '<font >Username : </font><br/>';
        echo '<input type="text" placeholder="Enter Username" id="username" name="username" /><br></br>';
        echo '<font>Password :</font><br/>';
        echo '<input type="password" placeholder="Enter Password" " id="password" name="password" /><br></br>';
        echo '</div>';
        echo '<center><input type="button" id="submitBtn" class="red" value="'.$action.'" style="font-size: 18px" onclick="validate()" /> </center><br></br>';
    }
    
    
    
    // this is template .. add your implementation of your own function here :) 
    function yourFunction() {

    }
