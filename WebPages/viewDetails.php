<html>
    <head>
        <style>
            html,body{height:100%; width:100%; background:grey;}
            .product{
                margin:auto;
                width:70%;
                min-height:70%;
                background:white;
                box-shadow: 10px 10px 5px black;
            }

            .image{
                margin-top:3%;
                float:left;
                margin-left:5%;
                width:30%;
                height:30%;
            }

            .info{
                margin-top:3%;
                width:40%;
                text-align:left;
                height:90%;
                margin-left:10%;
                display:inline-block;
                float:left;
            }

            .space{
                height:4%;
            }






        </style>

    </head>

    <body>
        <div class="product" >

            <div class="image">
                <?php
                require_once('lib.php');

                if (isset($_GET["prod_id"])) {

                    $con = createConnection();

                    $id = $_GET["prod_id"];

                    $sql = "select * from products where p_id=" . $id;

                    $result = mysqli_query($con, $sql);

                    if (mysqli_errno($con))
                        echo mysqli_errno($con) . ": " . mysqli_error($con);

                    if (mysqli_num_rows($result)) {

                        while ($row = mysqli_fetch_array($result)) {

                            echo "<img class='getvalue' id='" . $row["p_id"] . "' src='" . $row["p_img"] . "' width=100%%  height=100%>";
                            ?>
                        </div>

                        <div class="info">

                            <div class="p_name"><strong>Product Name :</strong><?php echo $row["p_name"]; ?> </div><div class="space"></div>
                            <div class="desciption"><strong>Description :</strong><?php echo $row["p_desc"]; ?></div><div class="space"></div>
                            <div class="price"><strong>Price : </strong><?php echo $row["p_price"]; ?> L.E</div><div class="space"></div>
                            <div class="button"><img onclick="check();"src="resources/css/images/buy.jpg" width=35% height=15% ></div>
                        </div>

                    <?php
                    }

                    mysqli_query($con, $sql);
                    if (mysqli_errno($con))
                        echo mysqli_errno($con) . ": " . mysqli_error($con);
                } else
                    echo "<h1> Sorry An error Occured Please try again Later</h1>";
            } else
                echo "<h1> Sorry An error Occured Please try again Later</h1>";

            $sql = "insert into product_visits values(".$id.",NOW())";
            $result = mysqli_query($con, $sql);
            ?>

        </div>
    </body>

    <script>

        function check() {

            var div = document.getElementsByClassName('getvalue')[0];
            var prod_id = div.id;
            window.location = "store.php?prod_id=" + prod_id;
        }
    </script>






</html>

