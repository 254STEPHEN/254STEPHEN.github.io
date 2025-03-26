<?php
$servername = "localhost";
$dbusername = "root"; // Update to your DB username
$dbpassword = ""; // Update to your DB password
$dbname = "mm";

// Connect to the database
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle log-in
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username; // Store username in session
        header("Location: home.html"); // Redirect to home page
        exit();
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>
