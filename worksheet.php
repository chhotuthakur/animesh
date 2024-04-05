<?php

require 'vendor/autoload.php';

$app = new \Slim\App();

// Database configuration
$host = 'localhost'; // Change to your MySQL host
$dbname = 'biker'; // Change to your MySQL database name
$username = 'root'; // Change to your MySQL username
$password = ''; // Change to your MySQL password

// Create a PDO instance
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// API endpoint to fetch data from worksheet table
$app->get('/worksheet', function ($request, $response, $args) use ($db) {
    try {
        // Query to select all rows from worksheet table
        $sql = "SELECT * FROM worksheet";
        $stmt = $db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $response->withJson($result);
    } catch (PDOException $e) {
        return $response->withStatus(500)->write('Internal Server Error');
    }
});

$app->run();
