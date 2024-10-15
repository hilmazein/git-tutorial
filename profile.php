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
    <style>
        .navbar-custom .navbar-nav-first>li>a:hover,
        .navbar-custom .navbar-nav-first>li.active>a {
            color: #fff !important;
            background-color: #000 !important;
        }

        .navbar-custom {
            border-color: #000 !important;
            border: none !important;
        }

        .profile-container {
            margin-top: 50px;
        }

        .profile-info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
            margin-bottom: 10px;
        }
    </style>
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
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
                    <li><a href="flights.php">Flights</a></li>
                    <li><a href="bookings.php">Bookings</a></li>
                    <li class="active"><a href="profile.php">Profile</a></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </section>

    <div class="container profile-container">
        <div class="row">
            <div class="col-md-12">
            <?php
                session_start();

                require_once('dbconnect.php');
                
                if (isset($_SESSION['username'])) {
                    
                    $username = $_SESSION['username'];

                    $userDataQuery = "SELECT first_name, last_name, username, passport, nid, date_of_birth, city, country, phone_no, email FROM users WHERE username = '$username'";
                    $userDataResult = mysqli_query($conn, $userDataQuery);

                    if ($userDataResult) {
                        
                        if (mysqli_num_rows($userDataResult) == 1) {
                            
                            $row = mysqli_fetch_assoc($userDataResult);
                            ?>
                            <div class="profile-info">
                                <h2>Welcome, <?php echo $row["first_name"] . " " . $row["last_name"]; ?>!</h2>
                                <p>Username: <?php echo $row["username"]; ?></p>
                                <p>Passport: <?php echo $row["passport"]; ?></p>
                                <p>NID: <?php echo $row["nid"]; ?></p>
                                <p>Date of Birth: <?php echo $row["date_of_birth"]; ?></p>
                                <p>City: <?php echo $row["city"]; ?></p>
                                <p>Country: <?php echo $row["country"]; ?></p>
                                <p>Phone Number: <?php echo $row["phone_no"]; ?></p>
                                <p>Email: <?php echo $row["email"]; ?></p>
                            </div>
                            <?php
                        } else {
                            echo "No user data found for the logged-in user";
                        }
                    } else {
                        echo "Error fetching user data: " . mysqli_error($conn);
                    }
                } else {
                    
                    header("Location: login.php");
                    exit();
                }
                
                mysqli_close($conn);
            ?>
            </div>
        </div>
    </div>

    <script src="js/custom.js"></script>
</body>

</html>
