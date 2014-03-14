<?php
  include 'lib.php';
  
  $items = $_POST['data'];
  $title = $_POST['title'];
  $edition = $_POST['edition'];
  
  $conn = createConnection();
  addNewMagazine($conn,$items,$title,$edition);
  
  mysqli_close($conn);
