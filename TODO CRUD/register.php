<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['new_username'];
    $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Vérifier si l'utilisateur existe déjà
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        echo "Nom d'utilisateur déjà pris";
    } else {
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);
        echo "Compte créé avec succès, vous pouvez maintenant vous <a href='login.php'>connecter</a>.";
    }
}
?>

<link rel="stylesheet" type="text/css" href="style.css">

<form method="post">
    Créer un nouveau compte:<br>
    Nom d'utilisateur: <input type="text" name="new_username"><br>
    Mot de passe: <input type="password" name="new_password"><br>
    <input type="submit" value="Créer un compte">
</form>
    
</form>
