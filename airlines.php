<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airlines Table</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }

        section {
            padding: 40px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #f2f2f2;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form_design input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
        }

        .form_design input[type="submit"] {
            background-color: #000;
            color: #fff;
            cursor: pointer;
        }

        .form_design input[type="submit"]:hover {
            background-color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
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
                    <li><a href="admin_home.php">Profile</a></li>
                    <li><a href="users.php">Users</a></li>
                   
                    <li><a href="pilot.php">Pilots</a></li>
                    <li class="active"><a href="airlines.php">Airlines</a></li>
                    <li><a href="admin_tickets.php">Tickets</a></li>
                    <li><a href="booked_flights.php">Bookings</a></li>
              
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section id="section1">
        <div class="container">
            <div class="title">Airlines Table</div>

            <?php
            require_once('dbconnect.php');
            $sql = "SELECT * FROM airlines";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr>
                            <th>Airline Name</th>
                            <th>No. of Planes</th>
                            <th>No. of Pilots</th>
                            </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["airline_name"] . "</td><td>" . $row["no_of_planes"] . "</td><td>" . 
                    $row["no_of_pilots"] . "</td></tr>";
                }

                echo "</table>";
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div>
    </section>

    <section id="section2">
        <div class="container">
            <div class="title">Insert Airline</div>

            <form action="insert_airlines.php" class="form_design" method="post">
                <label for="airline_name">Airline Name:</label>
                <input type="text" id="airline_name" name="airline_name" required><br>

                <label for="no_of_planes">Number of Planes:</label>
                <input type="number" id="no_of_planes" name="no_of_planes" required><br>

                <label for="no_of_pilots">Number of Pilots:</label>
                <input type="number" id="no_of_pilots" name="no_of_pilots" required><br>

                <br>
                <input type="submit" value="Add to Database">
            </form>
        </div>
    </section>

    <section id="section3">
        <div class="container">
            <div class="title">Delete Airline</div>
            <form action="insert_airlines.php" method="get">
                <label for="airline_name">Enter Airline Name to Delete:</label>
                <input type="text" id="airline_name" name="airline_name" required>
                <button type="submit">Delete</button>
                <button type="submit">Reset</button>
            </form>
        </div>
    </section>

 <script src="js/custom.js"></script>

</body>

</html>
