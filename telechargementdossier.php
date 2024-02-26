<?php
$id = $_GET['id'];
$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
// Définir le chemin du dossier des actes
$chemin_dossier = "Documents/Actes/";

// Vérifier si le fichier existe
$nom_dossier = $id . "_" . $prenom . "_" . $nom;
$chemin_complet = $chemin_dossier . $nom_dossier;

if (file_exists($chemin_complet)) {
    // Créer une archive du dossier sans compression
    $archive = new ZipArchive();
    $archive->open($nom_dossier . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
    $dirIterator = new RecursiveDirectoryIterator($chemin_complet);
    $iterator = new RecursiveIteratorIterator($dirIterator, RecursiveIteratorIterator::SELF_FIRST);
    foreach ($iterator as $file) {
        if (!$file->isDir()) {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($chemin_dossier)); // Calculer le chemin relatif par rapport au dossier racine
            $relativePath = ltrim($relativePath, DIRECTORY_SEPARATOR); // Supprimer tout slash initial
            $archive->addFile($filePath, $relativePath);
        }
    }
    $archive->close();

    // Proposer l'archive du dossier en téléchargement
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $nom_dossier . '.zip"');
    readfile($nom_dossier . '.zip');

    // Supprimer l'archive après le téléchargement
    unlink($nom_dossier . '.zip');

    // Après le téléchargement, rediriger vers recup.php
    echo '<script>';
    echo 'setTimeout(function() {';
    echo 'window.location.href = "recup.php";';
    echo 'alert("Le dossier a été téléchargé avec succès");';
    echo '}, 1000);'; // Délai de 1 seconde avant la redirection
    echo '</script>';
} else {
    // Si le dossier n'existe pas, afficher un message d'erreur
    echo '<script>alert("Le dossier de ce Client est vide");</script>';
}
?>