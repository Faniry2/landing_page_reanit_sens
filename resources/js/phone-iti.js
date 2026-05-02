/* ═══════════════════════════════════════════════════════
   intl-tel-input — init
   À ajouter dans resources/js/index.js
   ═══════════════════════════════════════════════════════ */

// ── 1. Installe d'abord la lib ──────────────────────────
// npm install intl-tel-input
// puis dans vite.config.js ou app.js :
// import intlTelInput from 'intl-tel-input';
// import 'intl-tel-input/build/css/intlTelInput.css';
import intlTelInput from 'intl-tel-input';
import 'intl-tel-input/styles';

(function initITI() {

  async function setupPhone(inputId, hiddenName) {
    const input = document.getElementById(inputId);
    if (!input) return;

    const iti = intlTelInput(input, {
      initialCountry:       'auto',
      preferredCountries:   ['mg', 'fr', 'be', 'ch', 'sn', 'ci', 'cm', 'cd', 'ma'],
      separateDialCode:     true,
      showSelectedDialCode: true,
      autoPlaceholder:      'aggressive',
      nationalMode:         false, // ← crucial : permet la détection au numéro tapé
      formatOnDisplay:      true,  // ← formate le numéro automatiquement
      loadUtils: () => import('intl-tel-input/utils'),
      geoIpLookup: async function() {
        return fetch('https://ipapi.co/json')
          .then(r => r.json())
          .then(d => d.country_code)
          .catch(() => 'mg');
      },
    });

    // Champ caché avec numéro E.164
    let hidden = document.querySelector(`input[name="${hiddenName}_full"]`);
    if (!hidden) {
      hidden = document.createElement('input');
      hidden.type  = 'hidden';
      hidden.name  = hiddenName;
      input.parentNode.appendChild(hidden);
    }

    input.name = '';

    function syncHidden() {
      hidden.value = iti.getNumber() || input.value;
    }

    input.addEventListener('input', syncHidden);
    input.addEventListener('countrychange', syncHidden);

    // ── Sync forcée au submit ────────────────────────────
    const form = input.closest('form');
    if (form) {
      form.addEventListener('submit', () => {
        syncHidden(); // force la synchro juste avant l'envoi
      });
    }

    input.addEventListener('blur', () => {
      if (input.value.trim() && !iti.isValidNumber()) {
        input.classList.add('input-error');
      } else {
        input.classList.remove('input-error');
      }
    });

    return iti;
  }

  document.addEventListener('DOMContentLoaded', () => {
    setupPhone('telephone', 'telephone');
    setupPhone('whatsapp',  'whatsapp');
  });

})();