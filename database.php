<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "waste_management";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['complaint_submit'])) {
    $username = $_POST['username'];
    $problem_type = $_POST['problem_type'];
    $details = $_POST['details'];

    $sql_complaints = "INSERT INTO complaints (username, problem_type, details) VALUES ('$username', '$problem_type', '$details')";

    if ($conn->query($sql_complaints) === TRUE) {
        echo "<h3>Complaint Submitted</h3>";
    } else {
        echo "Error: " . $sql_complaints . "<br>" . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feedback_submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    $sql_feedback = "INSERT INTO feedback (name, email, feedback) VALUES ('$name', '$email', '$feedback')";

    if ($conn->query($sql_feedback) === TRUE) {
        echo "<h3>Thank you for your feedback!</h3>";
    } else {
        echo "Error: " . $sql_feedback . "<br>" . $conn->error;
    }
}

$conn->close();
