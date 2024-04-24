<?php

$host = "db"; // MySQL server address
$username = "php_docker"; // MySQL username
$password = "password"; // MySQL password
$dbname = "php_docker"; // MySQL database name

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<strong>php_docker_table: </strong>";

    $query = "SELECT * FROM php_docker_table";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<p>".$row['title']."</p>";
        echo "<p>".$row['body']."</p>";
        echo "<p>".$row['date_created']."</p>";
        echo "<hr>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}