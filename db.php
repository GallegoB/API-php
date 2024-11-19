<?php
$host = 'localhost';
$dbname = 'cekankonjou';
$username = 'root';
$password = '';
header('Content-Type: application/json');

function enableCors() {
    header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");

    // Gérer les requêtes OPTIONS pour CORS
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }
}
enableCors();


$mysqli = new mysqli($host, $username, $password , $dbname);

if ($mysqli->connect_error) {
    die(json_encode(['error' => $mysqli->connect_error]));
}

?>