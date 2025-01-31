<?php
// Paramètres de connexion à la base de données
$host = 'localhost';
$dbname = 'contact'; // Remplace par le nom de ta base de données
$username = 'root'; // Remplace par ton nom d'utilisateur MySQL
$password = ''; // Remplace par ton mot de passe MySQL

try {
       // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Vérification que les données sont envoyées via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération et sécurisation des données du formulaire
        $societe = htmlspecialchars($_POST['societe']);
        $nom = htmlspecialchars($_POST['nom']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $fax = isset($_POST['fax']) ? htmlspecialchars($_POST['fax']) : null;
        $email = htmlspecialchars($_POST['email']);
        $renseigne_par = htmlspecialchars($_POST['renseigné_par_nom']);
        $date = htmlspecialchars($_POST['date']);
        $accueil = htmlspecialchars($_POST['accueil']);
        $prise_en_charge = htmlspecialchars($_POST['prise_en_charge']);
        $delais = htmlspecialchars($_POST['delais']);
        $tarifs = htmlspecialchars($_POST['tarifs']);
        $competence = htmlspecialchars($_POST['competence']);
        $rapport = htmlspecialchars($_POST['rapport']);
        $comprehension = htmlspecialchars($_POST['comprehension']);
        $prochaine_prestation = htmlspecialchars($_POST['prochaine_prestation']);
        $remarques = htmlspecialchars($_POST['remarques']);

        // Gestion des cases à cocher (tableau en string JSON)
        $choix = isset($_POST['choix']) ? json_encode($_POST['choix'], JSON_UNESCAPED_UNICODE) : null;

        // Requête SQL pour insérer les données dans la table `ecoute`
        $sql = "INSERT INTO ecoute (societe, nom, telephone, fax, email, renseigne_par, date, accueil, prise_en_charge, delais, tarifs, competence, rapport, comprehension, choix, prochaine_prestation, remarques) 
                VALUES (:societe, :nom, :telephone, :fax, :email, :renseigne_par, :date, :accueil, :prise_en_charge, :delais, :tarifs, :competence, :rapport, :comprehension, :choix, :prochaine_prestation, :remarques)";
        $stmt = $pdo->prepare($sql);

        // Liaison des valeurs aux paramètres
        $stmt->bindParam(':societe', $societe);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':fax', $fax);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':renseigne_par', $renseigne_par);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':accueil', $accueil);
        $stmt->bindParam(':prise_en_charge', $prise_en_charge);
        $stmt->bindParam(':delais', $delais);
        $stmt->bindParam(':tarifs', $tarifs);
        $stmt->bindParam(':competence', $competence);
        $stmt->bindParam(':rapport', $rapport);
        $stmt->bindParam(':comprehension', $comprehension);
        $stmt->bindParam(':choix', $choix);
        $stmt->bindParam(':prochaine_prestation', $prochaine_prestation);
        $stmt->bindParam(':remarques', $remarques);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo "Votre formulaire d'écoute client a été envoyé avec succès.";
        } else {
            echo "Une erreur est survenue lors de l'envoi.";
        }
    }
} catch (PDOException $e) {
    // Gestion des erreurs de connexion ou d'exécution
    echo "Erreur : " . $e->getMessage();
}
?>
s