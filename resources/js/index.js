/**
 * RENAÎT-SENS — index.js (version finale)
 */

/* ═══════════════════════════════════════════════════════════
   1. BURGER MENU
   ═══════════════════════════════════════════════════════════ */
const burger     = document.getElementById('burger');
const mobileMenu = document.getElementById('mobileMenu');
const body       = document.body;

if (burger && mobileMenu) {

  function openMenu() {
    burger.classList.add('is-open');
    mobileMenu.classList.add('is-open');
    burger.setAttribute('aria-expanded', 'true');
    body.style.overflow = 'hidden'; // bloque le scroll derrière
  }

  function closeMenu() {
    burger.classList.remove('is-open');
    mobileMenu.classList.remove('is-open');
    burger.setAttribute('aria-expanded', 'false');
    body.style.overflow = '';
  }

  // Toggle au click burger
  burger.addEventListener('click', () => {
    burger.classList.contains('is-open') ? closeMenu() : openMenu();
  });

  // Ferme au click sur un lien du menu mobile
  mobileMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', closeMenu);
  });

  // Ferme avec la touche Échap
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeMenu();
  });

  // Ferme si on clique en dehors du menu (sur le fond)
  mobileMenu.addEventListener('click', (e) => {
    if (e.target === mobileMenu) closeMenu();
  });
}


/* ═══════════════════════════════════════════════════════════
   2. NAV — opacité au scroll
   ═══════════════════════════════════════════════════════════ */
const nav = document.querySelector('nav');
if (nav) {
  window.addEventListener('scroll', () => {
    nav.style.background = window.scrollY > 50
      ? 'rgba(12,12,12,0.98)'
      : 'rgba(12,12,12,0.92)';
  }, { passive: true });
}


/* ═══════════════════════════════════════════════════════════
   3. SCROLL REVEAL — sections générales (.reveal)
   ═══════════════════════════════════════════════════════════ */
const revealObs = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.classList.add('visible');
      revealObs.unobserve(e.target);
    }
  });
}, { threshold: 0.1 });

document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));


/* ═══════════════════════════════════════════════════════════
   4. SECTION ACCROCHE — FONDU DEPUIS LE HAUT
   ═══════════════════════════════════════════════════════════ */
const accroche = document.getElementById('accroche');

if (accroche) {
  const els = [
    accroche.querySelector('.accroche-badge'),
    accroche.querySelector('.accroche-title'),
    accroche.querySelector('.accroche-sub'),
    accroche.querySelector('.accroche-actions'),
    accroche.querySelector('.accroche-note'),
    accroche.querySelector('.accroche-stats'),
    accroche.querySelector('.accroche-right'),
  ].filter(Boolean);

  const accrObs = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        els.forEach((el, i) => {
          setTimeout(() => el.classList.add('in-view'), i * 130);
        });
        accrObs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.08 });

  accrObs.observe(accroche);
}


/* ═══════════════════════════════════════════════════════════
   5. CANVAS FLAMME
   ═══════════════════════════════════════════════════════════ */
(function initFlame() {
  const canvas = document.getElementById('flameCanvas');
  if (!canvas) return;

  const ctx = canvas.getContext('2d');
  const W = canvas.width, H = canvas.height;
  const MAX = 38;
  const particles = [];

  const rand = (a, b) => a + Math.random() * (b - a);

  function createParticle() {
    return { x: W/2 + rand(-7,7), y: H-4, vx: rand(-.5,.5), vy: rand(-2.2,-1.2), life: 0, maxLife: rand(28,50), size: rand(5,13) };
  }

  for (let i = 0; i < MAX; i++) {
    const p = createParticle();
    p.life = Math.random() * p.maxLife;
    particles.push(p);
  }

  function flameColor(t) {
    if (t < 0.3)  return `rgb(255,${Math.round(220+(1-t/.3)*35)},${Math.round(120*(1-t/.3))})`;
    if (t < 0.65) return `rgb(255,${Math.round(180-(t-.3)/.35*80)},0)`;
    return `rgb(${Math.round(255-(t-.65)/.35*80)},${Math.round(100-(t-.65)/.35*100)},0)`;
  }

  function drawParticle(p) {
    const t = p.life / p.maxLife;
    const alpha = t < .15 ? t/.15 : 1-(t-.15)/.85;
    const size  = p.size * (1 - t*.5);
    const color = flameColor(t);
    const rgba  = a => color.replace('rgb','rgba').replace(')',`,${a})`);
    const grad  = ctx.createRadialGradient(p.x,p.y,0,p.x,p.y,size);
    grad.addColorStop(0, rgba(alpha));
    grad.addColorStop(.5,rgba(alpha*.6));
    grad.addColorStop(1, rgba(0));
    ctx.beginPath();
    ctx.arc(p.x, p.y, size, 0, Math.PI*2);
    ctx.fillStyle = grad;
    ctx.fill();
  }

  let raf = null;
  function animate() {
    ctx.clearRect(0, 0, W, H);
    const glow = ctx.createRadialGradient(W/2,H,0,W/2,H,W*.8);
    glow.addColorStop(0,'rgba(201,168,76,0.18)');
    glow.addColorStop(1,'rgba(201,168,76,0)');
    ctx.fillStyle = glow; ctx.fillRect(0,0,W,H);
    for (let i = 0; i < particles.length; i++) {
      const p = particles[i];
      p.life++; p.x += p.vx + Math.sin(p.life*.18+i)*.35; p.y += p.vy; p.vy -= .018;
      if (p.life >= p.maxLife) { particles[i] = createParticle(); continue; }
      drawParticle(p);
    }
    raf = requestAnimationFrame(animate);
  }

  new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { if (!raf) animate(); }
      else { cancelAnimationFrame(raf); raf = null; }
    });
  }).observe(canvas);
})();


/* ═══════════════════════════════════════════════════════════
   6. SMOOTH SCROLL — tous les liens internes
   ═══════════════════════════════════════════════════════════ */
document.querySelectorAll('a[href^="#"]').forEach(link => {
  link.addEventListener('click', (e) => {
    const id     = link.getAttribute('href').slice(1);
    const target = document.getElementById(id);
    if (!target) return;
    e.preventDefault();
    const navH = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--nav-h'));
    const top  = target.getBoundingClientRect().top + window.scrollY - navH;
    window.scrollTo({ top, behavior: 'smooth' });
  });
});


/* ═══════════════════════════════════════════════════════════
   7. FORMULAIRE — soumission AJAX vers Laravel
   ═══════════════════════════════════════════════════════════ */
const form = document.getElementById('inscriptionForm');

if (form) {
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = form.querySelector('[type="submit"]');
    const original = btn.textContent;
    btn.textContent = 'Envoi en cours…'; btn.disabled = true; btn.style.opacity = '0.7';

    try {
      const res = await fetch(form.action, {
        method: 'POST',
        headers: {
          'Accept':           'application/json',
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN':     document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '',
        },
        body: new FormData(form),
      });
      const data = await res.json();

      if (data.success) {
        form.closest('.form-box').innerHTML = `
          <div style="text-align:center;padding:2rem 0;">
            <div style="font-size:2.2rem;color:var(--gold);margin-bottom:1.2rem;">✦</div>
            <p style="font-family:'Cormorant Garamond',serif;font-size:1.5rem;font-style:italic;color:var(--white);margin-bottom:.8rem;">
              Merci <strong style="color:var(--gold-light);">${data.prenom}</strong> !
            </p>
            <p style="font-size:.95rem;color:var(--muted);line-height:1.7;">
              Vérifie ta boîte mail — un email t'a été envoyé.<br>
              <span style="font-size:.85rem;">Pense à vérifier tes spams si besoin.</span>
            </p>
          </div>`;
      } else {
        console.error('Erreur serveur:', data);
        showFormError(form, data.message || 'Une erreur est survenue. Réessaie.');
        btn.textContent = original; btn.disabled = false; btn.style.opacity = '1';
      }
    } catch (err) {
      showFormError(form, 'Connexion impossible. Vérifie ta connexion et réessaie.');
      btn.textContent = original; btn.disabled = false; btn.style.opacity = '1';
    }
  });
}

function showFormError(form, message) {
  form.querySelector('.form-error-msg')?.remove();
  const el = Object.assign(document.createElement('p'), {
    className: 'form-error-msg', textContent: message,
  });
  el.style.cssText = 'color:#e07070;font-size:.88rem;margin-top:.8rem;padding:.7rem 1rem;background:rgba(224,112,112,.08);border:1px solid rgba(224,112,112,.25);border-radius:8px;text-align:center;line-height:1.5;';
  form.appendChild(el);
  setTimeout(() => el.remove(), 6000);
}
