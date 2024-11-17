<?php
header('Content-Type: application/json');
$mysqli = new mysqli("localhost", "root", "", "cekankonjou");

if ($mysqli->connect_error) {
    die(json_encode(['error' => $mysqli->connect_error]));
}

$result = $mysqli->query("SELECT * FROM games");
$data = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($data);
$mysqli->close();
?>
