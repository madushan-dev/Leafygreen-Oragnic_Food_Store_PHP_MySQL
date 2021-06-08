<?php
$servername = "81.19.211.39";
$username = "madushan_leafy";
$password = "leafy@123";
$db = "madushan_leafy";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
