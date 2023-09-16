<?php
$conn = new mysqli('localhost', 'root','','login');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $wool_type = $_POST["wool_type"];
    $fiber_length = $_POST["fiber_length"];
    $fiber_diameter = $_POST["fiber_diameter"];
    $staple_length = $_POST["staple_length"];
    $cleanliness = $_POST["cleanliness"];


    // Insert data into the database
    $sql = "INSERT INTO transport (wool_type, fiber_length, fiber_diameter,staple_length, cleanliness)
            VALUES ('$wool_type', $fiber_length, $fiber_diameter,$staple_length, $cleanliness)";

    if ($conn->query($sql) === TRUE) {
        echo "Data successfully inserted!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transport Form</title>
    <style>
        body {
            background-color: #f0f0f0; /* Background color */
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff; /* Form container background color */
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333; /* Heading color */
        }

        label {
            font-weight: bold;
            color: #555; /* Label color */
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF; /* Submit button background color */
            color: #fff; /* Submit button text color */
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Hover background color */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Transport Form</h1>
        <form method="post" action="farm.php">
            <label for="wool_type">Wool Type:</label>
            <input type="text" name="wool_type" id="wool_type" required><br><br>

            <label for="fiber_length">Fiber Length (in mm):</label>
            <input type="number" name="fiber_length" id="fiber_length" required><br><br>

            <label for="fiber_diameter">Fiber Diameter (in microns):</label>
            <input type="number" name="fiber_diameter" id="fiber_diameter" required><br><br>

            <label for="staple_length">Staple Length (in cm):</label>
            <input type="number" name="staple_length" id="staple_length" required><br><br>

            <label for="cleanliness">Cleanliness (%):</label>
            <input type="number" id="cleanliness" name="cleanliness" min="0" max="100" required>

            <input type="submit" value="Submit">
         
        </form>
    </div>
</body>
</html>
