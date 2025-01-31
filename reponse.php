<?php
$host = 'localhost';
$dbname = 'contact';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $message = htmlspecialchars(trim($_POST['message']));

        if (!empty($email) && !empty($message)) {
            $stmt = $pdo->prepare("INSERT INTO contacts (email, message) VALUES (:email, :message)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->execute();

            echo "<h1>Merci pour votre message !</h1>";
            echo "<p>Votre message a été enregistré avec succès.</p>";
        } else {
            echo "<p>Veuillez remplir tous les champs.</p>";
        }
    } else {
        echo "<p>Erreur : Vous devez soumettre le formulaire.</p>";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
