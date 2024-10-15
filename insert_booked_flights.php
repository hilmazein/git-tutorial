<?php
require_once('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['flight_id']) && isset($_POST['ticket_number']) && isset($_POST['price']) && isset($_POST['seat_number']) && isset($_POST['class'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $flight_id = $_POST['flight_id'];
    $ticket_number = $_POST['ticket_number'];
	$price = $_POST['price'];
	$seat_number = $_POST['seat_number'];
	$class = $_POST['class'];

    $sql = "INSERT INTO booked_flights (fullname, username, flight_id, ticket_number, price, seat_number, class) 
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
	
	$sql0 = "SELECT * FROM booked_flights WHERE ticket_number = '$ticketNumber'";
	$resultCheckTicket = $conn->query($sql0);
	if ($resultCheckTicket->num_rows > 0) {
		$row = $resultCheckTicket->fetch_assoc();
		$flightId = $row['flight_id'];
		$price = $row['price'];
		$seatNumber = $row['seat_number'];
		$class = $row['class'];

		$sql2 = "UPDATE flights SET capacity = capacity, booked = booked - 1 WHERE flight_id = '$flightId'";
		$conn->query($sql2);

		echo "Booking canceled successfully!";
	}

	$result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: booked_flights.php");
    } else {
        echo "Error deleting row: " . $conn->error;
    }
} 

$conn->close();
?>
