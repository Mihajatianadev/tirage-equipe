<?php
// Page principale du mini-site : formulaire + zone d'affichage
?><!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tirage aléatoire des équipes</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <main class="page">
    <section class="card">
      <header class="header">
        <h1>Tirage aléatoire GRATUIT</h1>
      </header>

      <label class="label" for="noms">Noms</label>
      <textarea id="noms" class="textarea" rows="10"></textarea>

      <label class="label" for="vainqueurs">Nombre de vainqueurs</label>
      <input type="text" id="vainqueurs" class="textarea" placeholder="Nombre de vainqueurs">

      <div class="actions">
        <button id="btnGenerer" class="btn" type="button" onclick="generer()">COMMENCER</button>
      </div>

      

      <div id="loading" class="loading hidden" aria-live="polite">
        <div class="spinner" aria-hidden="true"></div>
        <div class="loadingText">Tirage en cours...</div>
      </div>

      <div id="status" class="status" aria-live="polite"></div>

      <pre id="resultat" class="result hidden" aria-live="polite"></pre>
    </section>
  </main>

  <script src="script.js"></script>
</body>
</html>
