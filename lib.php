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
    
    // this is template .. add your implementation of your own function here :) 
    function yourFunction() {
        
    }

?>
