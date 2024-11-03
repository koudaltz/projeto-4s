<?php
$servername = "projetosm4.mysql.database.azure.com";
$username = "koudaltz";
$password = "Daniel@1234";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
