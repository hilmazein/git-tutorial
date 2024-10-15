<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Split Screen Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .split-container {
            display: flex;
            height: 100vh;
        }

        .left,
        .right {
            flex: 1;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            overflow: hidden;
            transition: background-color 0.3s ease;
        }

        .left:hover,
        .right:hover {
            background-color: rgba(255, 255, 255, 0.1); 
        }

        .left a,
        .right a {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            text-decoration: none;
            color: inherit;
        }

        .left img,
        .right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            transition: filter 0.3s ease;
        }

        .left:hover img,
        .right:hover img {
            filter: brightness(70%); 
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="split-container">
        <div class="left">
            <a href="signup.php">
                <img src="img/bg1.jpg" alt="Left Background Image">
                <div class="content">
                    <h2>User Sign Up</h2>
                </div>
            </a>
        </div>
        <div class="right">
            <a href="admin_registration.php">
                <img src="img/bg2.jpg" alt="Right Background Image">
                <div class="content">
                    <h2>Admin Sign Up</h2>
                </div>
            </a>
        </div>
    </div>

</body>
</html>