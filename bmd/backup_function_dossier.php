<?php
error_reporting(0);
// Vérifier si le dossier existe
$nom_dossier = "Documents";
$chemin_complet = "../".$nom_dossier;

if (file_exists($chemin_complet)) {
    // Créer une archive du dossier sans compression
    $archive = new ZipArchive();
    $archive->open($nom_dossier . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
    $dirIterator = new RecursiveDirectoryIterator($chemin_complet);
    $iterator = new RecursiveIteratorIterator($dirIterator, RecursiveIteratorIterator::SELF_FIRST);
    foreach ($iterator as $file) {
        if (!$file->isDir()) {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($nom_dossier)); // Correction du nom de variable
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

  
} 
?>
