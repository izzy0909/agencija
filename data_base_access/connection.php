<?php
session_start();

$username="root"; // Mysql username
$password=""; // Mysql password

try {
    $conn = new PDO('mysql:host=localhost;dbname=agencija' . ';charset=UTF8', $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $query = $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$con = new PDO('mysql:host=' . $server . ';dbname=' . $db . ';charset=UTF8', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>