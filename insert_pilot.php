<?php
require_once('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['pilot_id']) && isset($_POST['airline_name'])) {
    $u = $_POST['first_name'];
    $p = $_POST['last_name'];
    $c = $_POST['pilot_id'];
    $a = $_POST['airline_name'];

    $sql = "INSERT INTO pilots VALUES ('$u', '$p', '$c', '$a')";

    if ($conn->query($sql) === TRUE) {
        header("Location: pilot.php");
    } else {
        echo "Insertion Failed";
    }
}

if (isset($_GET['pilot_id'])) {
    $pilot_id = $_GET['pilot_id'];

    $sql = "DELETE FROM pilots WHERE pilot_id = '$pilot_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: pilot.php");
    } else {
        echo "Error deleting row: " . $conn->error;
    }
} else {
    echo "Pilot ID not provided for deletion.";
}

$conn->close();
?>