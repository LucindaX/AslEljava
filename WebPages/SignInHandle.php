<?php session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username =  $_POST['username'];
    $password =  $_POST['password'];

    include 'lib.php';

    $conn = createConnection();

    $query = "SELECT * FROM users WHERE username = '".$username."' AND password = md5('".$password."')";
    $result = mysqli_query($conn, $query);

    if(!mysqli_num_rows($result)) {
        echo 'Error in username or password';
    }
    else {
        $type = mysqli_fetch_assoc($result);

        $_SESSION['username'] = $username;
        $_SESSION['type'] = $type['type'];
        
        $expire=time()+60*60*24;
        setcookie("username", $username, $expire);
        setcookie("type", $type['type'], $expire);
        
        echo 'done';
    }
    mysqli_close($conn);
}
else {
    echo 'Error has been occured';
}
