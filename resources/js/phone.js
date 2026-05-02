/* ═══════════════════════════════════════════════════════
   PHONE INPUT INTERNATIONALISÉ
   À ajouter dans resources/js/index.js
   ═══════════════════════════════════════════════════════ */

(function initPhoneInputs() {

  // ── Clone la liste pour WhatsApp ─────────────────────
  const waDropdown = document.getElementById('waDropdown');
  const phoneList  = document.getElementById('phoneList');

  if (waDropdown && phoneList) {
    // Crée la structure search + list pour WhatsApp
    waDropdown.innerHTML = `
      <div class="phone-search-wrap">
        <input type="text" class="phone-search" id="waSearch" placeholder="Rechercher un pays..." autocomplete="off">
      </div>
      <ul class="phone-list" id="waList"></ul>
    `;
    // Clone les options
    document.getElementById('waList').innerHTML = phoneList.innerHTML;
  }

  // ── Init chaque sélecteur ─────────────────────────────
  initSelector({
    selectId:    'phoneSelect',
    dropdownId:  'phoneDropdown',
    searchId:    'phoneSearch',
    listId:      'phoneList',
    flagId:      'phoneFlag',
    codeId:      'phoneCode',
    inputId:     'telephone',
    hiddenId:    'telephoneFormatted',
  });

  initSelector({
    selectId:    'waSelect',
    dropdownId:  'waDropdown',
    searchId:    'waSearch',
    listId:      'waList',
    flagId:      'waFlag',
    codeId:      'waCode',
    inputId:     'whatsapp',
    hiddenId:    'whatsappFormatted',
  });

  function initSelector({ selectId, dropdownId, searchId, listId, flagId, codeId, inputId, hiddenId }) {
    const select   = document.getElementById(selectId);
    const search   = document.getElementById(searchId);
    const list     = document.getElementById(listId);
    const flagEl   = document.getElementById(flagId);
    const codeEl   = document.getElementById(codeId);
    const input    = document.getElementById(inputId);
    const hidden   = document.getElementById(hiddenId);

    if (!select || !list || !input) return;

    let currentCode = '+261';

    // ── Ouvre / ferme ──
    select.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = select.classList.contains('open');
      closeAll();
      if (!isOpen) {
        select.classList.add('open');
        search?.focus();
      }
    });

    // ── Sélection d'un pays ──
    list.addEventListener('click', (e) => {
      const option = e.target.closest('.phone-option');
      if (!option) return;

      currentCode = option.dataset.code;
      flagEl.textContent = option.dataset.flag;
      codeEl.textContent = currentCode;

      // Marque l'option active
      list.querySelectorAll('.phone-option').forEach(o => o.classList.remove('active'));
      option.classList.add('active');

      closeAll();
      input.focus();
      updateHidden();
    });

    // ── Recherche ──
    search?.addEventListener('input', () => {
      const q = search.value.toLowerCase().trim();
      list.querySelectorAll('.phone-option').forEach(opt => {
        const name = opt.dataset.name?.toLowerCase() ?? '';
        const code = opt.dataset.code ?? '';
        opt.classList.toggle('hidden', q !== '' && !name.includes(q) && !code.includes(q));
      });
      // Masque les labels si aucun pays visible dessous
      list.querySelectorAll('.phone-list-label').forEach(label => {
        let next = label.nextElementSibling;
        let hasVisible = false;
        while (next && !next.classList.contains('phone-list-label')) {
          if (!next.classList.contains('hidden') && next.classList.contains('phone-option')) {
            hasVisible = true;
            break;
          }
          next = next.nextElementSibling;
        }
        label.style.display = hasVisible ? '' : 'none';
      });
    });

    // ── Met à jour le champ caché avec numéro complet ──
    function updateHidden() {
      if (!hidden) return;
      const num = input.value.replace(/[^0-9]/g, '');
      hidden.value = num ? currentCode + num : '';
    }

    input.addEventListener('input', updateHidden);

    // ── Remplace le name pour envoyer le numéro formaté ──
    // Au submit du form, on remplace la valeur de l'input visible
    const form = input.closest('form');
    if (form) {
      form.addEventListener('submit', () => {
        const num = input.value.replace(/[^0-9]/g, '');
        if (num) {
          input.value = currentCode + num;
        }
      }, { once: false });
    }
  }

  // ── Ferme tous les dropdowns au click extérieur ───────
  function closeAll() {
    document.querySelectorAll('.phone-flag-select.open').forEach(s => {
      s.classList.remove('open');
    });
  }

  document.addEventListener('click', closeAll);

  // ── Ferme avec Échap ──────────────────────────────────
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeAll();
  });

})();
