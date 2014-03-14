<?php
$name = $_GET['pname'];
include 'lib.php';

$conn = createConnection("root", "hello");

 $query = "select p_name from products where p_name = '".$name."'";
 $result = mysqli_query($conn, $query);
             
 if($result) {
     echo '1';
 }
 
 mysqli_close($conn);