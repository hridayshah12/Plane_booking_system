<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "flightbookin";


    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $departure = $_POST["departure"];
    $arrival = $_POST['arrival'];
    $airline = $_POST["airline"];
    $seating = $_POST['seating'];
    $departure_date = $_POST['departure_date'];
    $departure_time = $_POST['departure_time'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $infants = $_POST['infants'];
    $fare = $_POST["fare"];
    $return_date = $_POST['return_date'];
    $return_time = $_POST['return_time'];
    $suggestions = $_POST['suggestions'];
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    $sql = "INSERT INTO flightbooking (departure, arrival, airline, seating, departure_date, departure_time, adults, children, infants, fare, return_date, return_time, suggestions, full_name, phone_number, email)
            VALUES ('$departure', '$arrival', '$airline', '$seating', '$departure_date', '$departure_time', '$adults', '$children', '$infants', '$fare', '$return_date', '$return_time', '$suggestions', '$full_name', '$phone_number', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "THANKYOU FOR TRAVELLING WITH US YOUR TICKET IS BOOKED";
        
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>