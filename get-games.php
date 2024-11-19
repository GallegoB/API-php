<?php
require_once 'db.php';
// function enableCors() {
//     header("Access-Control-Allow-Origin: http://localhost:3000");
//     header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT");
//     header("Access-Control-Allow-Headers: Content-Type, Authorization");
//     header("Access-Control-Allow-Credentials: true");

//     // Gérer les requêtes OPTIONS pour CORS
//     if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//         http_response_code(200);
//         exit();
//     }
// }
// enableCors();


// header('Content-Type: application/json');
// $mysqli = new mysqli("localhost", "root", "", "cekankonjou");

if ($mysqli->connect_error) {
    die(json_encode(['error' => $mysqli->connect_error]));
}

$result = $mysqli->query("SELECT * FROM games");
$data = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($data);
$mysqli->close();
?>
