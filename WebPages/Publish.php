<?php ob_start();
  include 'lib.php';
  
  $items = $_POST['data'];
  $title = $_POST['title'];
  $edition = $_POST['edition'];
  
  $conn = createConnection();
  $magId = addNewMagazine($conn,$items,$title,$edition);
  
  mysqli_close($conn);
  
  header('Location: AddProduct.php?page=3&id='.$magId);
