
        <?php
        
        include 'lib.php';
        
        session_start();
        if(isset($_SESSION["userName"])) {
          header('Location: AdminPanel.php');
        }
        else {
          header('Location: SignIn.php');
        }
        
        $conn = createConnection("dbUser here ","dbPass Here");
        $query = " Your Query Here " ;
        
        mysqli_query($conn, $query);
        
        // don't forget to close connection :) 
        mysqli_close($conn);

        ?>