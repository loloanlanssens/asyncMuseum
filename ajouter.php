<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $image = $_FILES["image"]["name"];
    
    // Sauvegarde de l'image
    move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);

    // Insertion dans la base de données
    $query = "INSERT INTO oeuvres (titre, description, image) VALUES (?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute([$titre, $description, $image]);

    echo "Œuvre ajoutée avec succès !";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Œuvre - AsyncMuseum</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>AsyncMuseum - Admin</h1>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="exposition.php">Exposition</a></li>
                <li><a href="ajouter.php">Ajouter une Œuvre</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Ajouter une Nouvelle Œuvre</h2>
        <form action="ajouter.php" method="POST" enctype="multipart/form-data">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" required>
            
            <label for="description">Description :</label>
            <textarea name="description" required></textarea>
            
            <label for="image">Image :</label>
            <input type="file" name="image" required>
            
            <button type="submit">Ajouter</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 AsyncMuseum. Tous droits réservés.</p>
    </footer>
</body>
</html>
