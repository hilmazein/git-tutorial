<?php
require_once('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['flight_id']) && isset($_POST['ticket_number']) && isset($_POST['price']) && isset($_POST['seat_number']) && isset($_POST['class'])) {
    $flight_id = $_POST['flight_id'];
    $ticket_number = $_POST['ticket_number'];
    $price = $_POST['price'];
    $seat_number = $_POST['seat_number'];
    $class = $_POST['class'];

    $sql = "INSERT INTO tickets (ticket_number, flight_id, price, seat_number, class) 
    VALUES ('$ticket_number', '$flight_id', '$price', '$seat_number', '$class')";
    $result = $conn->query($sql);

	$updatesql = "UPDATE flights SET capacity = capacity+1, booked = booked WHERE flight_id = '$flight_id'";
	$conn->query($updatesql);


    if ($result === TRUE) {
        header("Location: admin_tickets.php");
    } else {
        echo "Insertion Failed: " . $conn->error;
    }
}

if (isset($_GET['ticket_number'])) {
    $ticketNumber = $_GET['ticket_number'];

    $sql = "DELETE FROM tickets WHERE ticket_number = '$ticketNumber'";

	$sql0 = "SELECT * FROM tickets WHERE ticket_number = '$ticketNumber'";
	$resultCheckTicket = $conn->query($sql0);
	if ($resultCheckTicket->num_rows > 0) {
		$row = $resultCheckTicket->fetch_assoc();
		$flightId = $row['flight_id'];
		$updatesql = "UPDATE flights SET capacity = capacity-1, booked = booked WHERE flight_id = '$flightId'";
		$conn->query($updatesql);
	}
	$result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: admin_tickets.php");
    } else {
        echo "Error deleting row: " . $conn->error;
    }
} 


$conn->close();
?>
