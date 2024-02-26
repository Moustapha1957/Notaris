<?php
include 'tableau.php';
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notaris";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérer le nombre de dossiers créés par mois
$dossiers_par_mois = array();
$sql_dossiers = "SELECT MONTH(date_creation) AS mois, COUNT(*) AS nombre_dossiers FROM dossier_client GROUP BY mois";
$result_dossiers = $conn->query($sql_dossiers);
if ($result_dossiers->num_rows > 0) {
    while($row = $result_dossiers->fetch_assoc()) {
        $mois = $row["mois"];
        $nombre_dossiers = $row["nombre_dossiers"];
        $dossiers_par_mois[$mois] = $nombre_dossiers;
    }
}

// Récupérer le nombre d'actes par mois
$actes_par_mois = array();
$sql_actes = "SELECT MONTH(date_creation_acte) AS mois, COUNT(*) AS nombre_actes FROM sous_dossier_client GROUP BY mois";
$result_actes = $conn->query($sql_actes);
if ($result_actes->num_rows > 0) {
    while($row = $result_actes->fetch_assoc()) {
        $mois = $row["mois"];
        $nombre_actes = $row["nombre_actes"];
        $actes_par_mois[$mois] = $nombre_actes;
    }
}

// Fermer la connexion à la base de données
$conn->close();

// Utiliser les données récupérées pour générer les graphiques
// Vous pouvez utiliser ces données pour générer les graphiques à l'aide de la bibliothèque ApexCharts ou d'une autre bibliothèque de votre choix.
$dossiers_par_mois_js = json_encode($dossiers_par_mois);
$actes_par_mois_js = json_encode($actes_par_mois);

// Code JavaScript pour utiliser les données dans ApexCharts
echo '<script>
  var dossiersParMois = ' . $dossiers_par_mois_js . ';
  var actesParMois = ' . $actes_par_mois_js . ';

  // Maintenant, vous pouvez utiliser ces données pour créer des graphiques ApexCharts
  // Créer les options pour les graphiques ApexCharts ici en utilisant les données dossiersParMois et actesParMois
</script>';
?>
