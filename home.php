<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
$stmt = $pdo->prepare("SELECT * FROM taches WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$taches = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <span>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
        <a href="logout.php">Déconnexion</a>
    </nav>

    <div class="container">
        <h1>Vos Tâches</h1>
        <?php foreach ($taches as $tache): ?>
            <div>
                <p><?php echo htmlspecialchars($tache['description']); ?></p>
                <a href="update.php?id=<?php echo $tache['id']; ?>"><i class="fa fa-edit"></i></a>
                <a href="delete.php?id=<?php echo $tache['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?');"><i class="fa fa-trash"></i></a>

            </div>
        <?php endforeach; ?>

        <form action="add.php" method="post">
            <input type="text" name="description">
            <input type="submit" value="Ajouter">
        </form>
    </div>
</body>
</html>
