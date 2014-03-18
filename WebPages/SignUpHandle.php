<?php ob_start();

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username =  $_POST['username'];
    $password =  $_POST['password'];

    include 'lib.php';

    $conn = createConnection();

    $query = "SELECT * FROM users WHERE username = '".$username."';";
    $result = mysqli_query($conn, $query);


    if(!mysqli_num_rows($result)) {
        $query = "INSERT INTO users (username,password,type) VALUES ('".$username."',md5('".$password."'),'2');";
        $result = mysqli_query($conn, $query);

        if($result) {
            echo 'done';
        }
    }
    else {
        echo 'User Already Exists !';
    }
    mysqli_close($conn);
    }
else {
    echo 'Error has been occured';
}
