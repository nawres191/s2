<?php
// Paramètres de connexion à la base de données
$host = 'localhost';
$dbname = 'contact'; // Remplacez par le nom de votre base de données
$username = 'root'; // Remplacez par votre nom d'utilisateur MySQL
$password = ''; // Remplacez par votre mot de passe MySQL
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $raison_sociale = htmlspecialchars($_POST['raison_sociale']);
    $organisme = htmlspecialchars($_POST['organisme']);
    $activite = htmlspecialchars($_POST['activite']);
    $nom = htmlspecialchars($_POST['nom']);
    $fonction = htmlspecialchars($_POST['fonction']);
    $adresse = htmlspecialchars($_POST['adresse']);
    
    $telephone = htmlspecialchars($_POST['telephone']);
    $fax = htmlspecialchars($_POST['fax']);
    $email = htmlspecialchars($_POST['email']);
    $prestations = htmlspecialchars($_POST['prestations']);
    $descriptif = htmlspecialchars($_POST['descriptif']);
    
    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "contact");
    
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO devis (raison_sociale, organisme, activite, nom, fonction, adresse, telephone, fax, email, prestations, descriptif) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $raison_sociale, $organisme, $activite, $nom, $fonction, $adresse, $telephone, $fax, $email, $prestations, $descriptif);
    
    if ($stmt->execute()) {
        echo "Demande de devis envoyée avec succès.";
    } else {
        echo "Erreur : " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo "Méthode non autorisée.";
}
?>
