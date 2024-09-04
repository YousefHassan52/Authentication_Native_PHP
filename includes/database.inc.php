<?php
$serverName = 'localhost';
$dbName = "codezilla";
$userName = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$serverName,dbname=$dbName", $userName, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connection failed: " . $e->getMessage();
}
