<?php
// Endpoint backend: simule un tirage "aléatoire" mais lit en réalité un fichier prédéfini.
// IMPORTANT: les données POST reçues sont volontairement ignorées.

header('Content-Type: text/plain; charset=utf-8');

$resultsDir = __DIR__ . DIRECTORY_SEPARATOR . 'results';
$resultFile = $resultsDir . DIRECTORY_SEPARATOR . 'result.txt';

if (!is_dir($resultsDir)) {
  http_response_code(500);
  echo "Erreur serveur: dossier results introuvable.";
  exit;
}

if (!is_file($resultFile)) {
  http_response_code(500);
  echo "Erreur serveur: fichier results/result.txt introuvable.";
  exit;
}

$content = @file_get_contents($resultFile);

if ($content === false) {
  http_response_code(500);
  echo "Erreur serveur: lecture du résultat impossible.";
  exit;
}

echo $content;
