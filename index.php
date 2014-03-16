
        <?php
        
        include 'lib.php';
        
        session_start();
        if(isset($_SESSION["username"])) {
          header('Location: WebPages/AdminPanel.php');
        }
        else {
          header('Location: WebPages/SignIn.php');
        }
      


        

