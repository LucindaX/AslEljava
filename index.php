<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include 'lib.php';
        
        
         $conn = createConnection("root","654321");//1 connect to db
         
         $query = "select * from products where p_name ='".$_POST["name"]."'";

          $result =mysqli_query($conn, $query);//3

          $row = mysqli_fetch_array($result);
           
         drawEditLayout($row);//5 draw form to edit a product::::

/*-----------------
         $pname=$_POST["pname"];
         $productList=array();
         $count=0;
          $query = "select * from products where p_name ='".$pname."'";
          $result =mysqli_query($conn, $query);//3
          while ($row = mysqli_fetch_array($result))
            {
              array_push($productList[$count],$row[$count]); //4 store query result in array ::::
              $count++;
            }
//------------------*/

          
          
                         
    
     //  don't forget to close connection :) 
         mysqli_close($conn);  
           
      //   echo"insertion done";
      ?>
    </body>
</html>


