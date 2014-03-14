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
    function createConnection($dbUser,$dbPass)//1
    {

        $dbHost = "localhost";
        $dbName = "phpproject";
        $con = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
        
      // Check connection
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        return $con;
    }
    
    // this is template .. add your implementation of your own function here :) 
    function yourFunction() {
        
    }
    //----------------------------------S.S
       function  selectPToEdit()
    {
       echo"<html>";
       echo"<body>";
       echo"<form  action=index.php method=post>";
       echo"Please Enter Product Name To Edit :";
       echo"<INPUT TYPE=TEXT NAME=name   > <br> <br>";
       echo"<input type=submit name=submitbtn value=EditProduct />";
       echo"</form>";
       echo"</body>";
       echo"</html>";
       

   }
    //---------------------------------S.S
    function  drawEditLayout( $prodArr)
    {
       echo"<html>";
       echo"<body>";
       echo"<form  action=insertIntoDB.php  method=post>";
      // echo"Product Id :";
       echo"<INPUT NAME=pid type=hidden value=".$prodArr[0]." > <br> <br>";


       echo"Product Name :";
       echo"<INPUT TYPE=TEXT NAME=pname    value='".$prodArr[1]."' > <br> <br>";

       echo"Product Description :";
       //echo"<INPUT TYPE=TEXT NAME=pdesc    value=$prodArr[2]> <br> <br>";//
       echo"<textarea rows=4 cols=50 name=pdesc value='".$prodArr[2]."'>  </textarea> <br> <br>";
       echo"Product Price :";
       echo"<INPUT TYPE=TEXT NAME=pprice   value=".$prodArr[3]." > <br> <br>";//
       echo"Product Stock :";
       echo"<INPUT TYPE=TEXT NAME=Pstock   value=".$prodArr[4]." > <br> <br>";//
       echo"Product Image :";
       echo"<INPUT TYPE=file NAME=pimg     value='".$prodArr[5]."' > <br> <br>"; //done
       echo"Product QR :";
       echo"<INPUT TYPE=TEXT NAME=Pqr      value='".$prodArr[6]."' > <br> <br>";
       echo"Product Date:";
       echo"<INPUT TYPE=TEXT NAME=pdate    value= '".$prodArr[7]."'> <br> <br>";//
       echo"Product Category:";
       echo"<INPUT TYPE=TEXT NAME=pcategory value=".$prodArr[8]."> <br> <br>";//
       echo"<input type=submit name=submitbtn value=Done />";
       echo"</form>";
       echo"</body>";
       echo"</html>";
       
    } 

    

    function deleteProducts()
    {

       echo"<html>";
       echo"<body>";
       echo"<form action=deleteproduct.php   method=post>";
       echo"Please Enter Product Name To Delete :";
       echo"<INPUT TYPE=TEXT NAME=pname  > <br> <br>";
       echo"<input type=submit name=submitbtn value=DeleteProduct />";
       echo"</form>";
       echo"</body>";
       echo"</html>";

    }

?>
