
// ═══ BURGER MENU ═══
const burger = document.getElementById('burger');
const mobileMenu = document.getElementById('mobileMenu');

if (burger && mobileMenu) {
  function openMenu() {
    burger.classList.add('is-open');
    mobileMenu.classList.add('is-open');
    burger.setAttribute('aria-expanded','true');
    document.body.style.overflow = 'hidden';
  }
  function closeMenu() {
    burger.classList.remove('is-open');
    mobileMenu.classList.remove('is-open');
    burger.setAttribute('aria-expanded','false');
    document.body.style.overflow = '';
  }
  burger.addEventListener('click', () => burger.classList.contains('is-open') ? closeMenu() : openMenu());
  mobileMenu.querySelectorAll('a').forEach(link => link.addEventListener('click', closeMenu));
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeMenu(); });
  mobileMenu.addEventListener('click', e => { if (e.target === mobileMenu) closeMenu(); });
}

// ═══ NAV scroll
const nav = document.getElementById('mainNav');
window.addEventListener('scroll', () => {
  nav.style.background = window.scrollY > 50 ? 'rgba(12,12,12,0.98)' : 'rgba(12,12,12,0.92)';
}, { passive: true });

// Reveal on scroll
const revealObs = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) { e.target.classList.add('visible'); revealObs.unobserve(e.target); }
  });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));

// Accroche stagger
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
  els.forEach(el => { el.style.opacity = '0'; el.style.transform = 'translateY(-28px)'; el.style.transition = 'opacity .85s ease, transform .85s ease'; });
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        els.forEach((el, i) => setTimeout(() => { el.style.opacity = '1'; el.style.transform = 'translateY(0)'; }, i * 120));
        obs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.08 });
  obs.observe(accroche);
}

// ═══ FLAMME CANVAS ═══
(function initFlame() {
  const canvas = document.getElementById('flameCanvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  const W = canvas.width, H = canvas.height;
  const MAX = 42;
  const particles = [];
  const rand = (a, b) => a + Math.random() * (b - a);

  function createParticle() {
    return {
      x: W / 2 + rand(-6, 6),
      y: H - 2,
      vx: rand(-0.45, 0.45),
      vy: rand(-2.4, -1.3),
      life: 0,
      maxLife: rand(26, 52),
      size: rand(5, 14)
    };
  }

  for (let i = 0; i < MAX; i++) {
    const p = createParticle();
    p.life = Math.random() * p.maxLife;
    particles.push(p);
  }

  function flameColor(t) {
    // cœur blanc-jaune → orange → rouge sombre
    if (t < 0.18) {
      const r = 255, g = Math.round(255 - t / 0.18 * 80), b = Math.round(200 * (1 - t / 0.18));
      return `rgb(${r},${g},${b})`;
    }
    if (t < 0.55) {
      const p = (t - 0.18) / 0.37;
      return `rgb(255,${Math.round(175 - p * 90)},0)`;
    }
    const p = (t - 0.55) / 0.45;
    return `rgb(${Math.round(255 - p * 100)},${Math.round(85 - p * 85)},0)`;
  }

  function drawParticle(p) {
    const t = p.life / p.maxLife;
    const alpha = t < 0.12 ? t / 0.12 : Math.pow(1 - t, 1.2);
    const size  = p.size * (1 - t * 0.45);
    const col   = flameColor(t);
    const rgba  = a => col.replace('rgb', 'rgba').replace(')', `,${(a).toFixed(2)})`);
    const g = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, size);
    g.addColorStop(0,   rgba(alpha));
    g.addColorStop(0.45, rgba(alpha * 0.55));
    g.addColorStop(1,   rgba(0));
    ctx.beginPath();
    ctx.arc(p.x, p.y, size, 0, Math.PI * 2);
    ctx.fillStyle = g;
    ctx.fill();
  }

  let raf = null;
  function animate() {
    ctx.clearRect(0, 0, W, H);
    // halo de base
    const glow = ctx.createRadialGradient(W/2, H, 0, W/2, H, W * 0.9);
    glow.addColorStop(0, 'rgba(201,140,30,0.22)');
    glow.addColorStop(1, 'rgba(201,140,30,0)');
    ctx.fillStyle = glow;
    ctx.fillRect(0, 0, W, H);

    for (let i = 0; i < particles.length; i++) {
      const p = particles[i];
      p.life++;
      // mouvement ondulant naturel
      p.x  += p.vx + Math.sin(p.life * 0.16 + i * 0.9) * 0.38;
      p.y  += p.vy;
      p.vy -= 0.016;
      if (p.life >= p.maxLife) { particles[i] = createParticle(); continue; }
      drawParticle(p);
    }
    raf = requestAnimationFrame(animate);
  }

  // démarre seulement quand la section est visible, s'arrête sinon
  new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { if (!raf) animate(); }
      else { cancelAnimationFrame(raf); raf = null; }
    });
  }, { threshold: 0 }).observe(canvas);
})();
document.querySelectorAll('a[href^="#"]').forEach(link => {
  link.addEventListener('click', (e) => {
    const id = link.getAttribute('href').slice(1);
    const target = document.getElementById(id);
    if (!target) return;
    e.preventDefault();
    const navH = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--nav-h'));
    window.scrollTo({ top: target.getBoundingClientRect().top + window.scrollY - navH, behavior: 'smooth' });
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


const backToTop = document.getElementById('backToTop');
if (backToTop) {
  window.addEventListener('scroll', () => {
    backToTop.classList.toggle('visible', window.scrollY > 400);
  }, { passive: true });
  backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
}


// ═══ EFFET VENT DE SABLE ═══
// ═══ EFFET VENT DE SABLE — CONTINU ═══
