<?php
// Paramètres de connexion à la base de données
$host = 'localhost';
$dbname = 'contact'; // Remplacez par le nom de votre base de données
$username = 'root'; // Remplacez par votre nom d'utilisateur MySQL
$password = ''; // Remplacez par votre mot de passe MySQL

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification que les données sont envoyées via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération des données du formulaire
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $formation = htmlspecialchars($_POST['formation']);
        $message = htmlspecialchars($_POST['message']);

        // Requête SQL pour insérer les données dans la table formulaire_formation
        $sql = "INSERT INTO formulaire_formation (nom, email, telephone, formation, message) 
                VALUES (:nom, :email, :telephone, :formation, :message)";
        $stmt = $pdo->prepare($sql);

        // Liaison des valeurs aux paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':formation', $formation);
        $stmt->bindParam(':message', $message);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo "Votre inscription a été enregistrée avec succès !";
        } else {
            echo "Une erreur est survenue lors de l'envoi du formulaire.";
        }
    }
} catch (PDOException $e) {
    // Gestion des erreurs de connexion ou d'exécution
    echo "Erreur : " . $e->getMessage();
}
?>
