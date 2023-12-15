<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '');

// Mise à jour de la tâche
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['description'])) {
    $stmt = $pdo->prepare("UPDATE taches SET description = ? WHERE id = ? AND user_id = ?");
    $stmt->execute([$_POST['description'], $_POST['id'], $_SESSION['user_id']]);
    header("Location: home.php");
    exit;
}

// Récupérer la tâche actuelle
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM taches WHERE id = ? AND user_id = ?");
    $stmt->execute([$_GET['id'], $_SESSION['user_id']]);
    $tache = $stmt->fetch();
    if (!$tache) {
        header("Location: home.php");
        exit;
    }
} else {
    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mettre à Jour la Tâche</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav class="navbar">
        <!-- Votre barre de navigation -->
    </nav>

    <div class="container">
        <h1>Mettre à Jour la Tâche</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $tache['id']; ?>">
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($tache['description']); ?>" required>
            </div>
            <input type="submit" value="Mettre à jour">
        </form>
    </div>
</body>
</html>