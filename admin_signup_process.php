<?php
require_once('dbconnect.php');

if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['user_name']) && isset($_POST['admin_id']) && isset($_POST['password'])){
    
    $f = $_POST['first_name'];
    $l = $_POST['last_name'];
    $u = $_POST['user_name'];
    $a = $_POST['admin_id'];
    $p = $_POST['password'];
    
    $checkSql = "SELECT * FROM users WHERE username = '$a'";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "Username already exists in the users table. Please choose a different username.";
    } else {
        $sql = "INSERT INTO admins VALUES ('$f', '$l', '$u', '$a', '$p')";
        
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_affected_rows($conn)){
            header("Location: login.php");
        } else {
            echo "Insertion Failed";
            header("Location: admin_signup.php");
        }
    }
}
?>