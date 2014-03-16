<?php
         include 'lib.php';
        //1 connect to db
                     
         $Pid=$_POST["pid"];
         $Pname=$_POST["pname"];
         $Pdesc=$_POST["pdesc"];
         $Pprice=$_POST["pprice"];
         $Pstock=$_POST["Pstock"];
         $PDate=$_POST["pdate"];
         $PCategory=$_POST["categ"];
         
         
         
        $conn = createConnection();
        
        if(!$PDate){
            $PDate = Date("Y-m-d");
        }
        $query = "select p_name from products where p_name='" . $Pname . "' and p_id <>".$Pid."";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);

        if ($row) {
            header("Location:empty.php?taken=1");
            exit();
        } else {
           
         $queryIns = "update products set p_name ='".$Pname."',p_desc ='".$Pdesc."',p_price =".$Pprice.",p_stock=".$Pstock.",p_AddData='".$PDate."',p_category=".$PCategory." where p_id ='".$_POST["pid"]."'";
         $resultIns =mysqli_query($conn,  $queryIns);

        //$imgName = "resources/pr_images/"."Image_".$_POST["pid"].".".$exten;
        //productImageUpload($imgError, $imgName, $imgType, $imgSize, $imgTmp, $_POST["pid"]);

          if (mysqli_errno($conn))
                        echo mysqli_errno($conn) . ": " . mysqli_error($conn);
                } 
         
         mysqli_close($conn);  
        
 
