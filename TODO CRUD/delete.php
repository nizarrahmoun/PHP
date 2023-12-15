<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
    $tacheId = $_GET['id'];
    $userId = $_SESSION['user_id'];

    $stmt = $pdo->prepare("DELETE FROM taches WHERE id = ? AND user_id = ?");
    $stmt->execute([$tacheId, $userId]);

    header("Location: home.php");
    exit;
}

header("Location: home.php");
exit;
?>
