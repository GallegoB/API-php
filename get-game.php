<?php
require_once 'db.php';
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// Vérifiez si l'ID est passé en paramètre
if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['message' => 'ID du jeu manquant.']);
    exit;
}

$id = $_GET['id']; // Pas besoin de redondance

// Connexion à la base de données
// $mysqli = new mysqli("localhost", "root", "", "votre_base_de_donnees");

// if ($mysqli->connect_error) {
//     http_response_code(500);
//     echo json_encode(['error' => 'Erreur de connexion à la base de données : ' . $mysqli->connect_error]);
//     exit;
// }

// Requête SQL sécurisée avec requête préparée
if ($stmt = $mysqli->prepare("SELECT * FROM games WHERE id = ?")) {
    $stmt->bind_param("s", $id); // Changez "s" en "i" si `id` est un entier
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'Jeu introuvable pour cet ID.']);
    }

    $stmt->close();
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Erreur lors de la préparation de la requête.']);
}

$mysqli->close();
?>