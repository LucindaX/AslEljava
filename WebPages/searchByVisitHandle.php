<?php
    
    include 'lib.php';
    
    $conn = createConnection();
    
    if(isset($_POST['pName']) && isset($_POST['sDate']) && isset($_POST['eDate'])) {
        searchByVisiting($conn, $_POST['pName'], $_POST['sDate'], $_POST['eDate']);
    }
    else {
       echo '<br></br><center><h1 style="color: lightgrey">Data are required </h1></center><br><br></br></br>';

    }