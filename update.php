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

// Check if ID is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get updated values from the form
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

        // Update query
        $sql = "UPDATE customers SET firstName='$firstName', lastName='$lastName', age='$age', dob='$dob', gender='$gender', 
                contactNumber='$contactNumber', email='$email', passportNo='$passportNo', aadhaarNo='$aadhaarNo', 
                mealPreferences='$mealPreferences', flightTiming='$flightTiming', nationality='$nationality' 
                WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<h1>Record updated successfully.</h1><a href='read_customers.php'><h3>View Bookings</h3></a>";
        } else {
            echo "Error updating record: " . $conn->error;
        }

    } else {
        // Fetch the customer record based on the ID
        $sql = "SELECT * FROM customers WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();  // Fetch the data
        } else {
            die("No record found for the given ID.");
        }
    }
} else {
    die("Invalid ID.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Customer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 50px;
        }
        h2 {
            color: #f1c40f;
            text-align: center;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        label {
            flex: 1;
            font-weight: bold;
            color: #333;
            margin-right: 10px;
        }
        input[type="text"], input[type="email"], input[type="date"] {
            flex: 2;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #f1c40f;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #d4ac0d;
        }
    </style>
</head>
<body>

<h2>Update Customer</h2>
<form method="POST">
    <div class="form-group">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" value="<?php echo isset($row['firstName']) ? $row['firstName'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" value="<?php echo isset($row['lastName']) ? $row['lastName'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="age">Age:</label>
        <input type="text" name="age" value="<?php echo isset($row['age']) ? $row['age'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="dob">DOB:</label>
        <input type="date" name="dob" value="<?php echo isset($row['dob']) ? $row['dob'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="gender">Gender:</label>
        <input type="text" name="gender" value="<?php echo isset($row['gender']) ? $row['gender'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="contactNumber">Contact Number:</label>
        <input type="text" name="contactNumber" value="<?php echo isset($row['contactNumber']) ? $row['contactNumber'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="passportNo">Passport Number:</label>
        <input type="text" name="passportNo" value="<?php echo isset($row['passportNo']) ? $row['passportNo'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="aadhaarNo">Aadhaar Number:</label>
        <input type="text" name="aadhaarNo" value="<?php echo isset($row['aadhaarNo']) ? $row['aadhaarNo'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="mealPreferences">Meal Preferences:</label>
        <input type="text" name="mealPreferences" value="<?php echo isset($row['mealPreferences']) ? $row['mealPreferences'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="flightTiming">Flight Timing:</label>
        <input type="text" name="flightTiming" value="<?php echo isset($row['flightTiming']) ? $row['flightTiming'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="nationality">Nationality:</label>
        <input type="text" name="nationality" value="<?php echo isset($row['nationality']) ? $row['nationality'] : ''; ?>">
    </div>
    <div class="form-group">
        <input type="submit" value="Update">
    </div>
</form>

</body>
</html>

<?php
$conn->close();
?>
