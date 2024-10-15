<?php
require_once('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['airline_name']) && isset($_POST['no_of_planes']) && isset($_POST['no_of_pilots'])){
    $airline_name = $_POST['airline_name'];
    $no_of_planes = $_POST['no_of_planes'];
    $no_of_pilots = $_POST['no_of_pilots'];

    $insertSql = "INSERT INTO airlines (airline_name, no_of_planes, no_of_pilots) VALUES ('$airline_name', '$no_of_planes', '$no_of_pilots')";
    $result = $conn->query($insertSql);

    if ($result === TRUE) {
        header("Location: airlines.php");
    } else {
        echo "Error inserting row: " . $conn->error;
    }
} else {
    echo "Form data not submitted.";
}

if(isset($_GET['airline_name'])) {
    $airline_name = $_GET['airline_name'];

    $deleteSql = "DELETE FROM airlines WHERE airline_name = '$airline_name'";
    $result = $conn->query($deleteSql);

    if ($result === TRUE) {
        header("Location: airlines.php");
    } else {
        echo "Error deleting row: " . $conn->error;
    }
} 

$conn->close();
?>