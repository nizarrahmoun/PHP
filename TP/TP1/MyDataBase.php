<?php
// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "MyDataBase";

try {
    // Connexion à MySQL
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création de la base de données et de la table
    $conn->exec("CREATE DATABASE IF NOT EXISTS MyDataBase;
                 USE MyDataBase;
                 CREATE TABLE IF NOT EXISTS PRODUIT (
                 id INT(6) AUTO_INCREMENT PRIMARY KEY,
                 PNOM VARCHAR(50),
                 COULEUR VARCHAR(50),
                 POIDS VARCHAR(20),
                 PRIX INT(5)
                 );");

    // Insertion de données dans la table
    $conn->exec("INSERT INTO PRODUIT (PNOM, COULEUR, POIDS, PRIX) VALUES ('Produit1', 'Rouge', '4', 500),
                                                                    ('Produit2', 'Bleu', '6', 300),
                                                                    ('Produit3', 'Vert', '2', 450),
                                                                    ('Produit4', 'Jaune', '3', 150),
                                                                    ('Produit5', 'Noir', '7', 350),
                                                                    ('Produit6', 'Blanc', '1', 600);");

    // Sélection et affichage des données
    echo "<h2>Tous les produits:</h2>";
    $stmt = $conn->prepare("SELECT * FROM PRODUIT");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo "ID: " . $row['id'] . " - Nom: " . $row['PNOM'] . " - Couleur: " . $row['COULEUR'] . " - Poids: " . $row['POIDS'] . " - Prix: " . $row['PRIX'] . "<br>";
    }

    // Modifier le prix d'un produit
    $conn->exec("UPDATE PRODUIT SET PRIX = 400 WHERE id = 3");

    // Supprimer le dernier produit
    $conn->exec("DELETE FROM PRODUIT ORDER BY id DESC LIMIT 1");

    // Supprimer la table à la fin
    // $conn->exec("DROP TABLE PRODUIT");

} catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

// Fermeture de la connexion
$conn = null;
?>
