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
        $societe = htmlspecialchars($_POST['societe']);
        $nom = htmlspecialchars($_POST['nom']);
        $fonction = htmlspecialchars($_POST['fonction']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $fax = isset($_POST['fax']) ? htmlspecialchars($_POST['fax']) : null;
        $email = htmlspecialchars($_POST['email']);
        $sujet = htmlspecialchars($_POST['sujet']);

        // Requête SQL pour insérer les données dans la table reclamations
        $sql = "INSERT INTO reclamations (societe, nom, fonction, adresse, telephone, fax, email, sujet) 
                VALUES (:societe, :nom, :fonction, :adresse, :telephone, :fax, :email, :sujet)";
        $stmt = $pdo->prepare($sql);

        // Liaison des valeurs aux paramètres
        $stmt->bindParam(':societe', $societe);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':fonction', $fonction);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':fax', $fax);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':sujet', $sujet);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo "Votre réclamation a été envoyée avec succès.";
        } else {
            echo "Une erreur est survenue lors de l'envoi de la réclamation.";
        }
    }
} catch (PDOException $e) {
    // Gestion des erreurs de connexion ou d'exécution
    echo "Erreur : " . $e->getMessage();
}
?>
