<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['description'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
    $description = $_POST['description'];
    $userId = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO taches (user_id, description) VALUES (?, ?)");
    $stmt->execute([$userId, $description]);

    header("Location: home.php");
    exit;
}
?>
