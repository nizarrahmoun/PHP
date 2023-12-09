<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit;
}

$pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

    if (empty($username) || empty($password)) {
        $error_message = "Le nom d'utilisateur et le mot de passe sont requis.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: home.php");
            exit;
        } else {
            $error_message = "Identifiants incorrects";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <style>
        /* Add your CSS styles here */
        .register-button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php if ($error_message): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="post">
        Nom d'utilisateur: <input type="text" name="username" required><br>
        Mot de passe: <input type="password" name="password" required><br>
        <input type="submit" value="Connexion">
        <a href="register.php">
        <input type="button" class="register-button" value="S'inscrire">      
    </a>
    </form>


    </form>
        </body>
        </html>
        </body>
        </html>
