<?php
// Start session
session_start();

// Define database connection parameters
$servername = "12.0.2.185"; // backend_server_private_ip
$username = "project-aws";  // MySQL user name
$password = "India@2020";   // MySQL login password
$dbname = "project-database"; // database name

// Create connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to hold form data
$name = $email = $phone = $address = "";
$success_message = $error_message = "";

// If the form is submitted, process the input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Prepare and bind SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO general_user_info (name, email, phone, address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $address);

    // Execute the statement
    if ($stmt->execute()) {
        $success_message = "Information successfully submitted!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    // Close the statement
    
}
