<?php ob_start(); session_start();

    if(isset($_SESSION['username'])) {
        session_destroy();
        
        setcookie("username", "", time()-3600);
        setcookie("type", "", time()-3600);
    }
    
    header('Location: ../index.php');
    