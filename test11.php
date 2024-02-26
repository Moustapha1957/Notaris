<?php 
require_once 'vendor/autoload.php';
include'bdconnect.php';

$id_dossier_client = $_GET['id'];
$id_sous_dossier_client = $_GET['isc'];

$sqlq = "SELECT * FROM dossier_client WHERE id_dossier_client = :id";

$stmtq = $conn->prepare($sqlq);
$stmtq->bindParam(':id', $id_dossier_client, PDO::PARAM_INT);
$stmtq->execute();

while ($rowq = $stmtq->fetch(PDO::FETCH_ASSOC)) {
    // Accédez aux colonnes spécifiques de l'assurance
    $nom_client = $rowq['nom_client'];
    $id_client =  $rowq['id_dossier_client'];
    $prenom_client = $rowq['prenom_client'];
}

$sql = "SELECT * FROM sous_dossier_client WHERE id_dossier_client = :id_dossier AND id_sous_dossier_client = :id_sous_dossier";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_dossier', $id_dossier_client, PDO::PARAM_INT);
$stmt->bindParam(':id_sous_dossier', $id_sous_dossier_client, PDO::PARAM_INT);
$stmt->execute();
$record = $stmt->fetch();

if ($record) {
    $type_sous_dossier = $record['type_sous_dossier'];
    $id_sd = $record['id_sous_dossier_client'];
}


$sqln = "SELECT * FROM frais_emolument WHERE id_sous_dossier = :id_sous_dossier";
$stmtn = $conn->prepare($sqln);
$stmtn->bindParam(':id_sous_dossier', $id_sous_dossier_client, PDO::PARAM_INT);
$stmtn->execute();
$recordn = $stmtn->fetch();

if ($recordn) {
    $numero_notaris = $recordn['numero_notaris'];
    $montant_initial = $recordn['total_frais'];
    $montant_remise = $recordn['montant_remise'];
    $montant_apres_remise = $recordn['montant_apres_remise'];
    $id_emolument = $recordn['id_frais_emolument'];
    $montant_initiale = $recordn['montant_initiale'];
}


$templateProcessor = new \PhpOffice\PhpWord\templateProcessor('./model_word/model.doc');

$templateProcessor->setValues(
[
'nomclient' => $nom_client,
'prenomclient' => $prenom_client,
'typeacte' => $type_sous_dossier,
'emolument_frais' => $montant_initial,
'numero_notaris' => $numero_notaris,
'id_emolument' => $id_emolument,
'montant_initiale' => $montant_initiale
]);




// Nettoyer le nom du fichier
$cleanedNom = preg_replace('/[^a-zA-Z0-9]/', '', $nom_client);
$cleanedid = preg_replace('/[^a-zA-Z0-9]/', '', $id_client);
$cleanedprenom = preg_replace('/[^a-zA-Z0-9]/', '', $prenom_client);
$cleanedtypesousdossier = preg_replace('/[^a-zA-Z0-9]/', '', $type_sous_dossier);
$cleanedidsd = preg_replace('/[^a-zA-Z0-9]/', '', $id_sd);

// Chemin vers le dossier principal
$mainFolderPath = __DIR__ . '/emolument_word/';

// Vérifie si le dossier principal existe, sinon le crée
if (!is_dir($mainFolderPath)) {
    mkdir($mainFolderPath, 0755, true);
}

// Chemin vers le dossier du client
$clientFolderPath = $mainFolderPath . $id_client . '_' . $cleanedprenom . '_' . $cleanedNom . '/';

// Vérifie si le dossier client existe, sinon le crée
if (!is_dir($clientFolderPath)) {
    mkdir($clientFolderPath, 0755, true);
}

// Chemin vers le dossier du type de sous-dossier
$typeSousDossierPath = $clientFolderPath . $cleanedtypesousdossier . '/';

// Vérifie si le dossier du type de sous-dossier existe, sinon le crée
if (!is_dir($typeSousDossierPath)) {
    mkdir($typeSousDossierPath, 0755, true);
}

// Enregistrez le document généré
$outputPath = $typeSousDossierPath . 'Note_De_Frais_Et_Emoluments_' . $cleanedidsd . '_' . $cleanedprenom . '_' . $cleanedNom . '.docx';
$templateProcessor->saveAs($outputPath);

// Ouvrez le document Word généré avec le programme par défaut associé aux fichiers .docx
shell_exec("start $outputPath");

// Redirigez l'utilisateur vers la page précédente
header("Location: emolument_recup.php?id=" . $id_dossier_client . "&isc=" . $id_sous_dossier_client);
exit(); // Assurez-vous d'appeler exit() après header pour éviter toute sortie indésirable
?>