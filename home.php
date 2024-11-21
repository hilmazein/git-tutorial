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
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    <style>
        .navbar-custom .navbar-nav-first > li > a:hover,
        .navbar-custom .navbar-nav-first > li.active > a {
            color: #fff !important; 
            background-color: #000 !important; 
        }
        .navbar-custom {
            border: none !important;
            border-color: #000 !important;
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
                    <li class="active"><a href="home.php">Home</a></li>
                    <li><a href="divider.php">Sign Up</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section id="home" style="position: relative;">
        <div class="row">
            <div class="col-md-12" style="padding: 0; text-align: center;">
                <img src="img/bg.jpg" alt="Background Image" style="width: 100%; height: 82vh; display: block;">
                <div class="caption" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: #000;">
                    <h1 style="color: #000;">Air Manage</h1>
                    <h3 style="color: #000;">State of the art airport management tool at the click of a button</h3>
                    <a href="login.php" class="section-btn btn btn-default" style="color: white;">Login</a>
                </div>
            </div>
        </div>
    </section>
    
    <style>
        .section-btn:hover {
            color: #000 !important; 
        }
    </style>

    <main>
        <section>
            <div class="container">
                <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="text-center">
                                <h2>About us</h2>
                                <br>
                                <h3>Welcome to Airline Manage!</h3>
                                <br>
                                <p class="lead">At Airline Manage, we're dedicated to making your airport experience smooth and stress-free. 
                                    Our platform offers a convenient and dependable solution for booking essential airport services. 
                                    Fly stress-free with Air Manage!</p>
                                <br>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </main>      

    <script src="js/custom.js"></script>

</body>
</html>
