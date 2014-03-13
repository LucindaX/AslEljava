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
        
        $conn = createConnection("dbUser here ","dbPass Here");
        $query = " Your Query Here " ;
        
        mysqli_query($conn, $query);
        
        // don't forget to close connection :) 
        mysqli_close($conn);

        ?>
    </body>
</html>
