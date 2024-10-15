<?php
require_once('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['flight_id']) && isset($_POST['ticket_number']) && isset($_POST['price']) && isset($_POST['seat_number']) && isset($_POST['class'])) {
    $username = $_POST['username'];
    $flight_id = $_POST['flight_id'];
    $ticket_number = $_POST['ticket_number'];
	$price = $_POST['price'];
	$seat_number = $_POST['seat_number'];
	$class = $_POST['class'];

    $sql = "INSERT INTO booked_flights (username, flight_id, ticket_number, price, seat_number, class) 
    VALUES ('$username', '$flight_id', '$ticket_number', '$price', '$seat_number', '$class')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: booked_flights.php");
    } else {
        echo "Insertion Failed: " . $conn->error;
    }
}

if (isset($_GET['ticket_number'])) {
    $ticket_number = $_GET['ticket_number'];

    $sql = "DELETE FROM booked_flights WHERE ticket_number = '$ticketNumber'";


	$result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: booked_flights.php");
    } else {
        echo "Error deleting row: " . $conn->error;
    }
} 

$conn->close();
?>
