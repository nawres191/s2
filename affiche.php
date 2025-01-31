<?php
// Configuration de la base de données
$host = 'localhost';      // Serveur (localhost pour un serveur local)
$dbname = 'contact';      // Nom de la base de données
$username = 'root';       // Nom d'utilisateur (par défaut "root" pour XAMPP/WAMP)
$password = '';           // Mot de passe (par défaut vide pour XAMPP/WAMP)

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparer la requête pour récupérer les messages
    $stmt = $pdo->prepare("SELECT * FROM contacts ORDER BY date DESC");
    $stmt->execute();

    // Récupérer les résultats
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Gestion des erreurs
    echo "Erreur : " . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages reçus</title>
    <link rel="stylesheet" href="../css/afiche.css">
</head>
<body>
    <div class="container">
        <h1>Messages reçus</h1>

        <?php if (count($messages) > 0): ?>
            <?php foreach ($messages as $message): ?>
                <div class="message">
                    <p><span class="email"><?= htmlspecialchars($message['email']) ?></span></p>
                    <p class="date">Envoyé le : <?= htmlspecialchars($message['date']) ?></p>
                    <p><?= nl2br(htmlspecialchars($message['message'])) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun message pour le moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>
