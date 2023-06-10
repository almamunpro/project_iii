<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_information";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $password = $_POST["password"];

    // Query to retrieve the user from the database
    $query = "SELECT * FROM student_login WHERE id = '$id' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Authentication successful
        echo "Login successful!";
    } else {
        // Authentication failed
        echo "Login failed!";
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="">
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
