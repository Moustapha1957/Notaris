<?php
session_start();
include 'nav.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notaris";
$date_enregistr_client = date("Y-m-d");

$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;

$nom_client = htmlspecialchars($_POST['nom_client']);
$prenom_client = htmlspecialchars($_POST['prenom_client']);
$adresse_client = htmlspecialchars($_POST['adresse_client']);
$contact_client = htmlspecialchars($_POST['contact_client']);
$email_client = filter_var($_POST['email_client'], FILTER_VALIDATE_EMAIL);
$situation_matrimoniale = htmlspecialchars($_POST['situation_matrimoniale']);
$prenom_pere_client = htmlspecialchars($_POST['prenom_pere_client']);
$nom_pere_client = htmlspecialchars($_POST['nom_pere_client']);
$prenom_mere_client = htmlspecialchars($_POST['prenom_mere_client']);
$nom_mere_client = htmlspecialchars($_POST['nom_mere_client']);
$autres_informations = htmlspecialchars($_POST['autres_informations']);

if ($id_user && $nom_client && $prenom_client && $adresse_client && $contact_client && $email_client && $situation_matrimoniale) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO dossier_client(id_dossier_client, id_user, nom_client, prenom_client, adresse_client, contact_client, prenom_pere_client, nom_pere_client, prenom_mere_client, nom_mere_client, autres_informations, situation_matrimoniale, email_client, date_creation) VALUES (:id_dossier_client, :id_user, :nom_client, :prenom_client, :adresse_client, :contact_client, :prenom_pere_client, :nom_pere_client, :prenom_mere_client, :nom_mere_client, :autres_informations, :situation_matrimoniale, :email_client, :date_creation)";

        $moisAnnee = date("Ym"); // Obtenez le mois et l'année actuels (par exemple, 202401 pour janvier 2024)

        // Obtenez la première lettre du prénom et du nom
$premiereLettrePrenom = substr($prenom_client, 0, 1);
$premiereLettreNom = substr($nom_client, 0, 1);

        // Générez l'identifiant unique en combinant le mois, l'année, la première lettre du prénom et la première lettre du nom
$id_dossier_client = $moisAnnee . crc32(uniqid());

        //id_dossier_client = $date_enregistr_client . "/" ."Notaris/" . $nom_client . "-" . $prenom_client . crc32(uniqid());

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_dossier_client', $id_dossier_client);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':nom_client', $nom_client);
        $stmt->bindParam(':prenom_client', $prenom_client);
        $stmt->bindParam(':adresse_client', $adresse_client);
        $stmt->bindParam(':contact_client', $contact_client);
        $stmt->bindParam(':email_client', $email_client);
        $stmt->bindParam(':situation_matrimoniale', $situation_matrimoniale);
        $stmt->bindParam(':prenom_pere_client', $prenom_pere_client);
        $stmt->bindParam(':nom_pere_client', $nom_pere_client);
        $stmt->bindParam(':prenom_mere_client', $prenom_mere_client);
        $stmt->bindParam(':nom_mere_client', $nom_mere_client);
        $stmt->bindParam(':autres_informations', $autres_informations);
        $stmt->bindParam(':date_creation', $date_enregistr_client);

        if ($stmt->execute()) {
        // La nouvelle entrée a été insérée avec succès
        echo "<script>alert('Nouveau Dossier ouvert avec succès.')</script>";
        echo "<script type='text/javascript'> document.location ='recup.php'; </script>";
    }
        
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    } finally {
        $conn = null;
    }
} else {
    echo "Veuillez remplir tous les champs obligatoires.";
}
?>
