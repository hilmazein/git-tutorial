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
        .result-container {
            text-align: center;
            margin-top: 20px;
        }

        .table {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
    
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <style>
        .navbar-custom .navbar-nav-first > li > a:hover,
        .navbar-custom .navbar-nav-first > li.active > a {
            color: #fff !important; 
            background-color: #000 !important; 
        }
        .navbar-custom {
            border-color: #000 !important; 
            border: none !important; 
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
                    <li class="active"><a href="flights.php">Flights</a></li>
                    <li><a href="bookings.php">Bookings</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="search-bars" style="margin-top: 20px; margin-bottom: 5px; text-align: center;">
        <div class="container">
            <div class="search-container">
                <form method="post" class="search-form">
                    <div class="form-row">
                        <h3>Search for flight</h3>
                        <div class="form-group col-md-6">
                            <label for="source">Source</label>
                            <input type="text" name="source" id="source" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="destination">Destination</label>
                            <input type="text" name="destination" id="destination" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="airline">Airline</label>
                            <input type="text" name="airline" id="airline" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Search">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php
    require_once('dbconnect.php');

    
    if (isset($_POST["submit"])) {
        
        $source = $_POST["source"];
        $destination = $_POST["destination"];
        $date = $_POST["date"];
        $airline = $_POST["airline"];

        $sql = "SELECT * FROM `flights` WHERE 1";

        if (!empty($source)) {
            $sql .= " AND source = '$source'";
        }

        if (!empty($destination)) {
            $sql .= " AND destination = '$destination'";
        }

        if (!empty($date)) {
            $sql .= " AND date = '$date'";
        }

        if (!empty($airline)) {
            $sql .= " AND airline = '$airline'";
        }

        $result = $conn->query($sql);
    } else {
        
        $result = $conn->query("SELECT * FROM `flights`");
    }

    ?>
    <div class="container result-container" style="margin-top: 5px; margin-bottom: 80px;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Flight ID</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Date</th>
                    <th>Boarding Time</th>
                    <th>Airline</th>
                    <th>Remaining Tickets</th>
                    <th></th> 
                </tr>
            </thead>
            <tbody>
                <?php
                
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row["flight_id"]; ?></td>
                        <td><?php echo $row["source"]; ?></td>
                        <td><?php echo $row["destination"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><?php echo $row["boarding_time"]; ?></td>
                        <td><?php echo $row["airline"]; ?></td>
                        <td><?php echo $row["capacity"] - $row["booked"]; ?></td>
                        <td>
                            <a href="tickets.php?flight_id=<?php echo $row["flight_id"]; ?>" class="btn btn-primary">Book Ticket</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="js/custom.js"></script>

</body>
</html>
