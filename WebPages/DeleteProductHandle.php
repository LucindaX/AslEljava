<?php
    include 'lib.php';
    $conn = createConnection();
    
    if(isset($_POST['pid'])) {
        $pid = $_POST['pid'];
        deleteProduct($conn,$pid);
    }
    else {
        echo 'Illegal access ;)';
    }
   
    mysqli_close($conn);