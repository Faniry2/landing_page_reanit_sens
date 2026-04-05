// Scroll reveal
const obs = new IntersectionObserver(entries => {
  entries.forEach(e => { if(e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

// Nav scroll
const nav = document.querySelector('nav');
window.addEventListener('scroll', () => {
  nav.style.background = window.scrollY > 50
    ? 'rgba(12,12,12,0.98)'
    : 'rgba(12,12,12,0.92)';
});

// ── CANVAS FLAME ──
(function() {
  const canvas = document.getElementById('flameCanvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  const W = canvas.width;
  const H = canvas.height;

  // Particle pool
  const particles = [];
  const MAX = 38;

  function randBetween(a, b) { return a + Math.random() * (b - a); }

  function createParticle() {
    return {
      x: W / 2 + randBetween(-7, 7),
      y: H - 4,
      vx: randBetween(-0.5, 0.5),
      vy: randBetween(-2.2, -1.2),
      life: 0,
      maxLife: randBetween(28, 50),
      size: randBetween(5, 13),
    };
  }

  for (let i = 0; i < MAX; i++) {
    const p = createParticle();
    p.life = Math.random() * p.maxLife; // stagger start
    particles.push(p);
  }

  function flameColor(t) {
    // t: 0 (base) → 1 (tip)
    // base: bright gold/white → mid: gold/orange → tip: deep red/transparent
    if (t < 0.3) {
      // white-gold core
      const r = Math.round(255);
      const g = Math.round(220 + (1 - t / 0.3) * 35);
      const b = Math.round(120 * (1 - t / 0.3));
      return `rgb(${r},${g},${b})`;
    } else if (t < 0.65) {
      // gold → orange
      const f = (t - 0.3) / 0.35;
      const r = 255;
      const g = Math.round(180 - f * 80);
      const b = 0;
      return `rgb(${r},${g},${b})`;
    } else {
      // orange → deep red
      const f = (t - 0.65) / 0.35;
      const r = Math.round(255 - f * 80);
      const g = Math.round(100 - f * 100);
      const b = 0;
      return `rgb(${r},${g},${b})`;
    }
  }

  function drawParticle(p) {
    const t = p.life / p.maxLife; // 0→1 age
    const alpha = t < 0.15
      ? t / 0.15           // fade in
      : 1 - (t - 0.15) / 0.85; // fade out
    const size = p.size * (1 - t * 0.5);
    const color = flameColor(t);

    const grad = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, size);
    grad.addColorStop(0, color.replace('rgb', 'rgba').replace(')', `,${alpha})`));
    grad.addColorStop(0.5, color.replace('rgb', 'rgba').replace(')', `,${alpha * 0.6})`));
    grad.addColorStop(1, color.replace('rgb', 'rgba').replace(')', ',0)'));

    ctx.beginPath();
    ctx.arc(p.x, p.y, size, 0, Math.PI * 2);
    ctx.fillStyle = grad;
    ctx.fill();
  }

  let raf;
  function animate() {
    ctx.clearRect(0, 0, W, H);

    // Glow base
    const baseGlow = ctx.createRadialGradient(W/2, H, 0, W/2, H, W * 0.8);
    baseGlow.addColorStop(0, 'rgba(201,168,76,0.18)');
    baseGlow.addColorStop(1, 'rgba(201,168,76,0)');
    ctx.fillStyle = baseGlow;
    ctx.fillRect(0, 0, W, H);

    // Update & draw particles
    for (let i = 0; i < particles.length; i++) {
      const p = particles[i];
      p.life += 1;
      p.x += p.vx + Math.sin(p.life * 0.18 + i) * 0.35;
      p.y += p.vy;
      p.vy -= 0.018; // slight acceleration upward

      if (p.life >= p.maxLife) {
        particles[i] = createParticle();
        continue;
      }
      drawParticle(p);
    }

    raf = requestAnimationFrame(animate);
  }

  // Only run when visible
  const flameObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { if (!raf) animate(); }
      else { cancelAnimationFrame(raf); raf = null; }
    });
  });
  flameObs.observe(canvas);

  heroEls.forEach((el, i) => {
  setTimeout(() => el.classList.add('in-view'), i * 130);
    });
})();

