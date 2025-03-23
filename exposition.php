<?php
include 'db.php';

$query = "SELECT * FROM oeuvres";
$statement = $pdo->query($query);
$oeuvres = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exposition - AsyncMuseum</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>AsyncMuseum</h1>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="exposition.php">Exposition</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="gallery">
            <h2>Exposition d'Art</h2>
            <?php foreach ($oeuvres as $oeuvre): ?>
                <div class="artwork">
                    <img src="images/<?php echo htmlspecialchars($oeuvre['image']); ?>" alt="<?php echo htmlspecialchars($oeuvre['titre']); ?>">
                    <h3><?php echo htmlspecialchars($oeuvre['titre']); ?></h3>
                    <p><?php echo htmlspecialchars($oeuvre['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 AsyncMuseum. Tous droits réservés.</p>
    </footer>
</body>
</html>
