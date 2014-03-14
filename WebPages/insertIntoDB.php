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
                     
        $Pid=$_POST["pid"];
         $Pname=$_POST["pname"];
         $Pdesc=$_POST["pdesc"];
         $Pprice=$_POST["pprice"];
         $Pstock=$_POST["Pstock"];
         $Pimg=$_POST["pimg"];
         $PQR=$_POST["Pqr"];
         $PDate=$_POST["pdate"];
         $PCategory=$_POST["pcategory"];

         $queryIns = "update products set p_name ='".$Pname."',p_desc ='".$Pdesc."',p_price =".$Pprice.",p_stock=".$Pstock.",p_img='".$Pimg."',p_QR='".$PQR."',p_AddData='".$PDate."',p_category=".$PCategory."";

        echo $queryIns;

         $resultIns =mysqli_query($conn,  $queryIns);

     //  don't forget to close connection :) 
         mysqli_close($conn);  
           
         echo"mabroook insertion done";
          echo "<br/>";
          echo $Pid ;
          echo "<br/>";
          echo "<br/>";
          echo $Pname ;
          echo "<br/>";
          echo $Pdesc ;
          echo "<br/>";
          echo $Pprice ;
          echo "<br/>";
          echo $Pstock ;
          echo "<br/>";
          echo $Pimg ;
          echo "<br/>";
          echo $PQR ;
          echo "<br/>";
          echo $PDate ;
          echo "<br/>";
          echo $PCategory ;
        ?>
    </body>
</html>
