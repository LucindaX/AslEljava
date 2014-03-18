<?php   ob_start();
    include 'lib.php';
    $conn = createConnection();

    if(isset($_POST['name']) && isset($_POST['discount'])) {
        $pname = $_POST['name'];
        $discount = $_POST['discount'];
        
        $query = "select * from products where p_name='".$_POST["name"]."'";
        $result =mysqli_query($conn, $query);

        if(mysqli_num_rows($result)){
            $query = "UPDATE products SET discounts = ".$discount." WHERE p_name = '".$pname."'";
            $result = mysqli_query($conn, $query);

            if($result) {
                echo "<script> window.location.replace('AdminPanel.php?type=yes&msg=Discount has been added to product successfully'); </script>"; 
            }
            else {
                echo "<script> window.location.replace('AdminPanel.php?type=no&msg=Error in adding discount'); </script>"; 
            }   
        }
        else {
                echo "<script> window.location.replace('selectToAddDiscount.php?msg=Product is not found !'); </script>"; 
        }
        
        
    }