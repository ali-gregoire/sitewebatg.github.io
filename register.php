<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscription";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Traitement de l'inscription des utilisateurs
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insertion des données dans la table des utilisateurs
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

// Traitement de l'envoi de messages dans le chat
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'send_message') {
    $user_id = $_POST['user_id'];
    $message = $_POST['message'];

    // Insertion du message dans la table des messages
    $sql = "INSERT INTO messages (user_id, message) VALUES ('$user_id', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message envoyé";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
