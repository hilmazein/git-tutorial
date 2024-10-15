<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login Portal</title>
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    <style>
        .navbar-custom .navbar-nav-first > li > a:hover,
        .navbar-custom .navbar-nav-first > li.active > a {
            color: #fff !important; 
            background-color: #000 !important; 
        }
        .navbar-custom {
            border-color: #000 !important; border: none !important; 
        }
    </style>
    
    <section class="navbar custom-navbar navbar-fixed-top navbar-custom" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
            </div>
    
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-nav-first">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="divider.php">Sign Up</a></li>
                    <li class="active"><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </section>

    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="login-box">
                            <div class="text-center">
                                
                                <h2>Login Portal</h2>

                                <br>
                                
                                
                                <form action="login_process.php" method="post">
                                    
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="fname" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" id="password" name="pass" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>    

     <script src="js/custom.js"></script>

</body>
</html>