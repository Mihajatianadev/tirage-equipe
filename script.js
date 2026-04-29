// UX + appel serveur

function setLoading(isLoading) {
  const btn = document.getElementById('btnGenerer');
  const loading = document.getElementById('loading');
  const resultat = document.getElementById('resultat');
  const status = document.getElementById('status');

  btn.disabled = isLoading;

  if (isLoading) {
    status.textContent = '';
    resultat.classList.add('hidden');
    resultat.classList.remove('appear');
    loading.classList.remove('hidden');
  } else {
    loading.classList.add('hidden');
  }
}

function sleep(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}

async function generer() {
  const textarea = document.getElementById('noms');
  const resultat = document.getElementById('resultat');
  const status = document.getElementById('status');

  try {
    setLoading(true);

    // Envoi des noms (ils ne seront pas utilisés côté serveur)
    const formData = new FormData();
    formData.append('noms', textarea.value);

    // Délai artificiel pour rendre le tirage crédible (2 à 3 secondes)
    const artificialDelay = 2000 + Math.floor(Math.random() * 1000);

    const fetchPromise = fetch('tirage.php', {
      method: 'POST',
      body: formData,
    });

    const delayPromise = sleep(artificialDelay);

    const [response] = await Promise.all([fetchPromise, delayPromise]);

    if (!response.ok) {
      throw new Error('Erreur serveur (' + response.status + ')');
    }

    const text = await response.text();

    resultat.textContent = text;
    resultat.classList.remove('hidden');

    // Animation d'apparition
    // (forcer un reflow pour relancer l'animation si l'utilisateur regénère)
    void resultat.offsetWidth;
    resultat.classList.add('appear');

    status.textContent = 'Tirage terminé !';
  } catch (err) {
    status.textContent = 'Erreur: ' + (err && err.message ? err.message : 'inconnue');
  } finally {
    setLoading(false);
  }
}
