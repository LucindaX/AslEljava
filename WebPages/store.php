<html>
    <body>
        <?php
        require_once('lib.php');

        $con = createConnection();

     /*   if (isset($_SERVER["REMOTE_ADDR"])) {

            $ip = $_SERVER["REMOTE_ADDR"];

            $location = (geoCheckIP($ip));

            $sql = "INSERT INTO hit_locations (country,state,town,hits) VALUES ('" . $location["country"] . "','" . $location["state"] . "','" . $location["town"] . "',default) ON DUPLICATE KEY UPDATE hits=hits+1 ";

            mysqli_query($con, $sql);

            if (mysqli_errno($con))
                echo mysqli_errno($con) . ": " . mysqli_error($con);
        }
*/
        if (isset($_GET["prod_id"])) {

            $prod_id = $_GET["prod_id"];
            $sql = "select p_hits,p_stock from products where p_id = " . $prod_id . " and p_stock > 0 ";
            $result = mysqli_query($con, $sql);
            if (mysqli_errno($con))
                echo mysqli_errno($con) . ": " . mysqli_error($con);

            if ($result) {


                $sql = "update products set p_hits=p_hits+1 , p_stock=p_stock-1 where p_id=" . $prod_id;

                $result = mysqli_query($con, $sql);
                if (mysqli_errno($con))
                    echo mysqli_errno($con) . ": " . mysqli_error($con);

                if ($result) {

                    echo "<h1> Congrats Item Has Been Bought </h1>";
                } else
                    echo "<h1> Could Not Complete Transcation ! Please try again Later </h1>";
            } else
                echo "<h1> Product out of Stock</h1>";
        } else
            echo "<h1>An Error Occured please Re-scan the QR code</h1>";

        mysqli_close($con);
        ?>

    </body>
</html>
