<?php
$servername = "localhost";
$username = "root";
$password = "welcome";
$dbname = "pbl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; // To store the result message

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete query
    $sql = "DELETE FROM customers WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        $message = "Record deleted successfully.";
    } else {
        $message = "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Customer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 50px;
        }

        h2 {
            color: #e74c3c;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 4px solid #e74c3c;
            display: inline-block;
            padding-bottom: 10px;
        }

        .message {
            text-align: center;
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .message p {
            font-size: 18px;
            color: #333;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #f1c40f;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .back-link a:hover {
            background-color: #d4ac0d;
            color: #fff;
        }
    </style>
</head>
<body>

<h2>Delete Customer</h2>

<div class="message">
    <p><?php echo $message; ?></p>
</div>

<div class="back-link">
    <a href="read_customers.php">View Bookings</a>
</div>

</body>
</html>
