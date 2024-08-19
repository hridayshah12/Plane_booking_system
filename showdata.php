<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "flightbookin";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM flightdetails";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .flight-details {
            background: #fff;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            font-size: 24px;
            color: #0091cd;
        }

        p {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1>Flight Details</h1>
    
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $airline = $row["airline"];
            $departure = $row["departure"];
            $departure_time = $row["departure_time"];
            $departure_date = $row["departure_date"];
            $arrival = $row["arrival"];
            $return_time = $row["return_time"];
            $return_date = $row["return_date"];
    ?>

    <div class="flight-details">
        <h2>Flight Details</h2>
        <p><strong>Airline:</strong> <?php echo $airline; ?></p>
        <p><strong>Departure:</strong> <?php echo $departure; ?></p>
        <p><strong>Departure time:</strong> <?php echo $departure_time; ?></p>
        <p><strong>Departure date:</strong> <?php echo $departure_date; ?></p>
        <p><strong>arrival :</strong> <?php echo $arrival; ?></p>
        <p><strong>Arrival Time:</strong> <?php echo $return_time; ?></p>
        <p><strong>Arrival Date:</strong> <?php echo $return_date; ?></p>
        <p><strong>book now:</strong><a href="book.html">Book Now </a></p>
    </div>

    <?php
        }
    } 
    else {
        echo "No results found.";
    }

    $conn->close();
    ?>

</body>
</html>
