<?php
require_once('dbconnect.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $enteredCode = $_POST["admin_code"];

    $sql = "SELECT * FROM registration_code WHERE registration_code = '$enteredCode'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: admin_signup.php");
    } else {
        echo "Invalid code. Admin registration failed.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Admin Registration Code</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        form {
            text-align: center;
        }
    </style>
</head>
<body>
    <div>
        <h1>Insert Admin Registration Code</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="admin_code">Enter Admin Registration Code:</label>
            <input type="text" name="admin_code" required>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>