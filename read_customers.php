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

$sql = "SELECT * FROM customers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar img {
            height: 50px;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar ul li {
            margin-left: 20px;
        }

        .navbar ul li a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
            border-radius: 5px;
        }

        .navbar ul li a:hover {
            background-color: #ffcc00;
            color: #333;
        }

        table {
            width: 90%;
            margin: 40px auto;
            background-color: #fff;
            border-collapse: collapse;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #ffcc00;
            font-size: 16px;
        }

        td {
            background-color: #f9f9f9;
            color: #555;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        tr:hover {
            background-color: #ffcc00;
            color: #333;
        }

        .action-btn {
            padding: 8px 12px;
            background-color: #ffcc00;
            color: #333;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .action-btn:hover {
            background-color: #e6b800;
        }

        .footer {
            background-color: #333;
            padding: 20px 0;
            text-align: center;
            color: #ffcc00;
        }

        .footer a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            table {
                width: 100%;
            }

            .navbar ul {
                flex-direction: column;
            }

            .navbar ul li {
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <img src="img/logo.png" alt="Logo">
    <!-- <ul>
        <li><a href="#">Home</a></li>
    </ul> -->
</div>

<?php
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Passport Number</th>
                <th>Aadhaar Number</th>
                <th>Meal Preference</th>
                <th>Flight Timing</th>
                <th>Nationality</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["firstName"]."</td>
                <td>".$row["lastName"]."</td>
                <td>".$row["age"]."</td>
                <td>".$row["dob"]."</td>
                <td>".$row["gender"]."</td>
                <td>".$row["contactNumber"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["passportNo"]."</td>
                <td>".$row["aadhaarNo"]."</td>
                <td>".$row["mealPreferences"]."</td>
                <td>".$row["flightTiming"]."</td>
                <td>".$row["nationality"]."</td>
                <td><a href='update.php?id=".$row["id"]."' class='action-btn'>Edit</a></td>
                <td><a href='delete.php?id=".$row["id"]."' class='action-btn' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align: center; color: #333; font-size: 18px;'>No results found.</p>";
}

$conn->close();
?>

<div class="footer">
    <a href="newindex.html">Home</a>
</div>

</body>
</html>
