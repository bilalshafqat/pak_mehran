<?php
/**
 * Created by PhpStorm.
 * User: muhammadanas
 * Date: 9/30/17
 * Time: 5:40 PM
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bilal_caters";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>