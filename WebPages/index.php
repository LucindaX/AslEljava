
        <?php
        
        include 'lib.php';
        
      

        session_start();
        if(isset($_SESSION["userName"])) {
          header('Location: AdminPanel.php');
        }
        else {
          header('Location: SignIn.php');
        }
        
       
      ?>
    </body>
</html>



        

