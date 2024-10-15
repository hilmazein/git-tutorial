<?php

session_start();

require_once('dbconnect.php');

if (isset($_POST['fname']) && isset($_POST['pass'])) {
    $u = $_POST['fname'];
    $p = $_POST['pass'];

    $sqlu = "SELECT * FROM users WHERE username = '$u' AND password = '$p'";
    
    $sqla = "SELECT * FROM admins WHERE user_name = '$u' AND password = '$p'";
    
    $result = mysqli_query($conn, $sqlu);
    $result1 = mysqli_query($conn, $sqla);

    
    if (mysqli_num_rows($result) != 0) {
        
        $_SESSION["username"] = $u;

        header("Location: flights.php");
        exit();
    } 
    
    elseif (mysqli_num_rows($result1) != 0) {
        
        $_SESSION["user_name"] = $u;

        header("Location: admin_home.php");
        exit();
    } else {
        
        echo "Username or Password is wrong";
        
    }
}

mysqli_close($conn);
?>
