<?php
// db.php
$host = 'localhost'; // or your database host
$port = '1521';      // default Oracle port
$sid = 'XE';         // your Oracle SID (e.g., XE for Express Edition)
$username = 'aidatlas'; // your Oracle username
$password = 'aidatlas';   // your Oracle password

// Create a connection string
$conn_string = "//{$host}:{$port}/{$sid}";

// Establish the connection
$conn = oci_connect($username, $password, $conn_string);

// Check if the connection was successful
if (!$conn) {
    $e = oci_error();
    echo "Connection failed: " . $e['message'];
} else {
    echo "Connected to Oracle Database successfully!";
}
?>