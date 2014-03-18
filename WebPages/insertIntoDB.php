    <?php ob_start();
    include 'lib.php';
    //1 connect to db

    $Pid = $_POST["pid"];
    $Pname = $_POST["pname"];
    $Pdesc = $_POST["pdesc"];
    $Pprice = $_POST["pprice"];
    $Pstock = $_POST["Pstock"];
    $PDate = $_POST["pdate"];
    $PCategory = $_POST["categ"];

    $conn = createConnection();

    if (!$PDate) {
        $PDate = Date("Y-m-d");
    }
    
    $query = "select p_name from products where p_name='" . $Pname . "' and p_id <>" . $Pid . "";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if ($row) {
        echo "<script> window.location.replace('searchProduct.php?msg=Not Updated - Product name is taken before&type=2'); </script>"; 

    } else {

        $queryIns = "update products set p_name ='" . $Pname . "',p_desc ='" . $Pdesc . "',p_price =" . $Pprice . ",p_stock=" . $Pstock . ",p_AddData='" . $PDate . "',p_category=" . $PCategory . " where p_id ='" . $_POST["pid"] . "'";
        $resultIns = mysqli_query($conn, $queryIns);

        if (mysqli_errno($conn))
        {
            echo mysqli_errno($conn) . ": " . mysqli_error($conn);
        }
        else {
            echo "<script> window.location.replace('searchProduct.php?msg=Product has been Updated Successfully&type=1'); </script>"; 
        }
    }

    mysqli_close($conn);
