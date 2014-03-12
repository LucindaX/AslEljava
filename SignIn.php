<!DOCTYPE html>
<!--
----------------------- Under Construction ----------------
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'lib.php';
        session_start();
        
        if(isset($_SESSION['userName'])) {
            header('location: AdminPanel.php');
        }
         echo 'Redirect to home , Your are signed in now ';
         $_SESSION['userName'] = 'user';
        ?>
    </body>
</html>
