
<html>
<head>
<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar img {
            height: 60px;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .navbar ul li {
            display: inline;
            margin-left: 30px;
        }

        .navbar ul li a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
            transition: all 0.3s ease-in-out;
            border-radius: 5px;
        }

        .navbar ul li a:hover {
            background-color: #ffcc00;
            color: #000;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-size: 16px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="tel"],
        input[type="email"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f9f9f9;
            transition: border 0.3s ease-in-out;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #ffcc00;
            outline: none;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #ffcc00;
            color: #333;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #e6b800;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .navbar ul li {
                display: block;
                margin: 10px 0;
                text-align: center;
            }
        }
    </style>


    
   

</head>
<body>

<div class="navbar">
        <img src="img/logo.png" alt="Logo"> 
        <ul>
            <li><a href="#about">About Us</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="contact.html">Contact Us</a></li>
        </ul>
    </div>

<h1>"Your Ticket Have Been Booked!!"</h1>


</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $passportNo = $_POST['passportNo'];
    $aadhaarNo = $_POST['aadhaarNo'];
    $mealPreferences = $_POST['mealPreferences'];
    $flightTiming = $_POST['flightTiming'];
    $nationality = $_POST['nationality'];

    $fileUpload = $_FILES['fileUpload']['name'];
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($fileUpload);

    if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $uploadFile)) {
        $fileStatus = "File uploaded successfully.";
    } else {
        $fileStatus = "Failed to upload file.";
    }

    echo "<h1>Customer Information</h1>";
    echo "<p><strong>First Name:</strong> $firstName</p>";
    echo "<p><strong>Last Name:</strong> $lastName</p>";
    echo "<p><strong>Age:</strong> $age</p>";
    echo "<p><strong>Date of Birth:</strong> $dob</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>Contact Number:</strong> $contactNumber</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Passport Number:</strong> $passportNo</p>";
    echo "<p><strong>Aadhaar Number:</strong> $aadhaarNo</p>";
    echo "<p><strong>Meal Preferences:</strong> $mealPreferences</p>";
    echo "<p><strong>Flight Timing:</strong> $flightTiming</p>";
    echo "<p><strong>Nationality:</strong> $nationality</p>";
    echo "<p><strong>Uploaded File:</strong> $fileUpload</p>";
    echo "<p>$fileStatus</p>";
}

?>


<?php
// Database connection
$servername = "localhost";
$username = "root"; // Default username in XAMPP
$password = "welcome"; // No password by default in XAMPP
$dbname = "pbl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $passportNo = $_POST['passportNo'];
    $aadhaarNo = $_POST['aadhaarNo'];
    $mealPreferences = $_POST['mealPreferences'];
    $flightTiming = $_POST['flightTiming'];
    $nationality = $_POST['nationality'];
    
    // File upload handling
    $fileUpload = $_FILES['fileUpload']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
    
    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename($_FILES["fileUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Insert data into database
    $sql = "INSERT INTO customers (firstName, lastName, age, dob, gender, contactNumber, email, passportNo, aadhaarNo, mealPreferences, flightTiming, fileUpload, nationality)
    VALUES ('$firstName', '$lastName', '$age', '$dob', '$gender', '$contactNumber', '$email', '$passportNo', '$aadhaarNo', '$mealPreferences', '$flightTiming', '$fileUpload', '$nationality')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
 
<html>
    <head>
</head>
<body>
<div class="col-md-6">
                                    
   <a href="newindex.html">
     <button type="button" id="form-submit" class="btn">Home</button>
    </a>
                          
 </div>
</body>
</html>

