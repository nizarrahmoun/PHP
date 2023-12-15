<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['pdf'])) {
        $file = $_FILES['pdf'];

        $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (strtolower($file_extension) !== 'pdf') {
            echo "Le fichier doit être un PDF.";
            exit;
        }

        if ($file['size'] > 1000000) {
            echo "Le fichier ne doit pas dépasser 1 Mo.";
            exit;
        }

        
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="pdf">
    <input type="submit" value="Envoyer">
</form>