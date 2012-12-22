<?php
session_start();

$username="root"; // Mysql username
$password=""; // Mysql password

try {
    $conn = new PDO('mysql:host=localhost;dbname=agencija', $username, $password);
    $query = $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>