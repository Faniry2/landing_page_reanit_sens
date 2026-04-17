<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Renaît-Sens — Parce qu'il arrive un moment où survivre ne suffit plus</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300;1,400&family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
<style>
:root {
  --gold: #C9A84C;
  --gold-light: #E8C97A;
  --gold-pale: #F7EDD5;
  --gold-dark: #8B6914;
  --gold-dim: rgba(201,168,76,0.15);
  --black: #0C0C0C;
  --black2: #141414;
  --dark: #1A1A1A;
  --dark2: #222222;
  --white: #FAFAF7;
  --white2: #F0EDE5;
  --muted: #888880;
  --radius: 24px;
  --radius-sm: 14px;
  --nav-h: 72px;
}
* { margin:0; padding:0; box-sizing:border-box; }
html { scroll-behavior: smooth; }
body {
  font-family: 'Outfit', sans-serif;
  font-weight: 300;
  background: var(--white2);
  color: var(--black);
  overflow-x: hidden;
  font-size: 18px;
}

/* NAV */
nav {
  position: fixed; top:0; left:0; right:0; z-index:999;
  display:flex; align-items:center; justify-content:space-between;
  padding: 0 3.5rem;
  height: var(--nav-h);
  background: rgba(12,12,12,0.92);
  backdrop-filter: blur(20px);
  border-bottom: 1px solid rgba(201,168,76,0.12);
  transition: background .3s;
}
.logo {
  display:flex; align-items:center; gap:.65rem;
  font-family:'Cormorant Garamond',serif;
  font-size:1.4rem; font-weight:400;
  color:var(--gold); letter-spacing:.1em;
  text-decoration:none;
}
.logo-sym { font-size:1.6rem; }
.nav-links { display:flex; gap:2rem; list-style:none; }
.nav-links a {
  color:rgba(250,250,247,0.65); text-decoration:none;
  font-size:.88rem; letter-spacing:.1em; text-transform:uppercase;
  transition:color .3s;
}
.nav-links a:hover { color:var(--gold); }
.nav-btn {
  background:var(--gold); color:var(--black);
  border:none; padding:.6rem 1.6rem; border-radius:50px;
  font-family:'Outfit',sans-serif; font-size:.82rem;
  font-weight:600; letter-spacing:.1em; text-transform:uppercase;
  cursor:pointer; text-decoration:none;
  transition:background .3s, transform .2s;
  white-space:nowrap;
}
.nav-btn:hover { background:var(--gold-light); transform:translateY(-1px); }

/* ── Burger ── */
.burger {
  display:none; flex-direction:column; justify-content:center;
  gap:5px; width:36px; height:36px;
  background:none; border:none; cursor:pointer; padding:4px;
  position:relative; z-index:1001;
}
.burger-line {
  display:block; width:100%; height:2px;
  background:var(--gold); border-radius:2px;
  transition:transform .35s ease, opacity .25s ease;
  transform-origin:center;
}
.burger.is-open .burger-line:nth-child(1) { transform:translateY(7px) rotate(45deg); }
.burger.is-open .burger-line:nth-child(2) { opacity:0; transform:scaleX(0); }
.burger.is-open .burger-line:nth-child(3) { transform:translateY(-7px) rotate(-45deg); }

/* ── Menu mobile overlay ── */
.mobile-menu {
  display:none; position:fixed; inset:0;
  background:rgba(10,10,10,0.97); backdrop-filter:blur(16px);
  z-index:998; flex-direction:column; align-items:center; justify-content:center;
  gap:0; opacity:0; transform:translateY(-12px);
  transition:opacity .35s ease, transform .35s ease;
  pointer-events:none;
}
.mobile-menu.is-open { opacity:1; transform:translateY(0); pointer-events:all; }
.mobile-menu a {
  font-family:'Cormorant Garamond',serif;
  font-size:clamp(1.8rem,6vw,2.8rem); font-weight:300;
  color:var(--white); text-decoration:none; letter-spacing:.05em;
  transition:color .3s; text-align:center;
  padding:.8rem 0; display:block; width:100%; text-align:center;
}
.mobile-menu a:hover { color:var(--gold); }
.mobile-menu .mobile-cta {
  background:var(--gold); color:var(--black);
  border-radius:50px; padding:.8rem 2.4rem;
  font-family:'Outfit',sans-serif; font-size:1rem;
  font-weight:600; letter-spacing:.1em; text-transform:uppercase;
  margin-top:1.5rem; display:inline-block; width:auto;
}
.mobile-menu .mobile-cta:hover { background:var(--gold-light); color:var(--black); }
.mobile-divider { width:40px; height:1px; background:rgba(201,168,76,.25); margin:.2rem auto; }

/* BUTTONS */
.btn-gold {
  background:var(--gold); color:var(--black);
  border:none; padding:1rem 2.2rem; border-radius:50px;
  font-family:'Outfit',sans-serif; font-size:1rem;
  font-weight:600; letter-spacing:.08em; cursor:pointer;
  text-decoration:none; display:inline-flex; align-items:center; gap:.5rem;
  transition:background .3s, transform .25s, box-shadow .3s;
  box-shadow:0 4px 24px rgba(201,168,76,.25);
}
.btn-gold:hover { background:var(--gold-light); transform:translateY(-2px); box-shadow:0 8px 32px rgba(201,168,76,.4); }
.btn-ghost-light {
  background:transparent; color:var(--white);
  border:1px solid rgba(250,250,247,.2); padding:1rem 2.2rem;
  border-radius:50px; font-family:'Outfit',sans-serif;
  font-size:1rem; font-weight:400; letter-spacing:.08em;
  cursor:pointer; text-decoration:none; display:inline-flex; align-items:center; gap:.5rem;
  transition:border-color .3s, color .3s, transform .25s;
}
.btn-ghost-light:hover { border-color:var(--gold); color:var(--gold); transform:translateY(-2px); }
.btn-ghost {
  background:transparent; color:var(--black);
  border:1px solid rgba(12,12,12,.22); padding:1rem 2.2rem;
  border-radius:50px; font-family:'Outfit',sans-serif;
  font-size:1rem; font-weight:400; letter-spacing:.08em;
  cursor:pointer; text-decoration:none; display:inline-flex; align-items:center; gap:.5rem;
  transition:border-color .3s, color .3s, transform .25s;
}
.btn-ghost:hover { border-color:var(--gold-dark); color:var(--gold-dark); transform:translateY(-2px); }

/* SECTIONS */
.section { padding:6rem 0; }
.container { max-width:1200px; margin:0 auto; padding:0 3.5rem; }
.sec-label {
  font-size:.82rem; letter-spacing:.3em;
  text-transform:uppercase; color:var(--gold);
  display:block; margin-bottom:.8rem;
}
.sec-title {
  font-family:'Cormorant Garamond',serif;
  font-size:clamp(2.2rem,3.5vw,3.5rem);
  font-weight:300; line-height:1.2;
}
.sec-title em { font-style:italic; color:var(--gold); }
.sec-text { font-size:1.05rem; line-height:1.9; color:var(--muted); margin-top:1rem; max-width:540px; }

/* ═══ HERO PROGRAMME ═══ */
.programme-hero {
  background: var(--white2); padding:0;
  position:relative; overflow:hidden; z-index:1;
  min-height:100vh; display:flex; flex-direction:column; justify-content:center;
}
.programme-hero::before {
  content:''; position:absolute; inset:0;
  background:
    radial-gradient(ellipse 70% 80% at 20% 50%, rgba(201,168,76,.13) 0%, transparent 60%),
    radial-gradient(ellipse 50% 60% at 80% 60%, rgba(201,168,76,.07) 0%, transparent 60%);
  pointer-events:none;
}
.hero-stars {
  position:absolute; inset:0; pointer-events:none;
  background-image:
    radial-gradient(1px 1px at 15% 20%, rgba(201,168,76,0.6) 0%, transparent 100%),
    radial-gradient(1px 1px at 80% 15%, rgba(201,168,76,0.5) 0%, transparent 100%),
    radial-gradient(1.5px 1.5px at 90% 70%, rgba(201,168,76,0.7) 0%, transparent 100%),
    radial-gradient(1px 1px at 5% 60%, rgba(201,168,76,0.4) 0%, transparent 100%),
    radial-gradient(2px 2px at 50% 85%, rgba(201,168,76,0.3) 0%, transparent 100%),
    radial-gradient(1px 1px at 35% 45%, rgba(201,168,76,0.4) 0%, transparent 100%),
    radial-gradient(1.5px 1.5px at 65% 30%, rgba(201,168,76,0.5) 0%, transparent 100%);
}
.programme-hero-inner {
  max-width:1200px; margin:0 auto;
  padding:calc(var(--nav-h) + 4rem) 3.5rem 4rem;
  display:grid; grid-template-columns:1fr 1fr;
  gap:5rem; align-items:center;
  position:relative; z-index:2;
}
.ph-title {
  font-family:'Cormorant Garamond',serif;
  font-weight:300; line-height:1.05;
  color:var(--black); margin-bottom:1.5rem;
}
.prog-inline { display:flex; flex-direction:column; }
.prog-label {
  display:block;
  font-size:clamp(1.1rem,1.8vw,1.6rem);
  letter-spacing:.35em; text-transform:uppercase;
  color:var(--black); font-weight:500;
  font-family:'Outfit',sans-serif; margin-bottom:.4rem;
  opacity:.55;
}
.prog-name {
  display:inline;
  font-size:clamp(4rem,8vw,9.5rem);
  letter-spacing:-.02em; white-space:nowrap;
  color:var(--black);
}
.ph-sub {
  font-size:clamp(1.35rem,2.2vw,1.75rem); line-height:1.7;
  color:rgba(12,12,12,.75); max-width:520px; margin-bottom:2.5rem;
  font-family:'Cormorant Garamond',serif; font-style:italic;
}
.ph-sub strong { color:var(--black); font-style:normal; font-weight:600; }
.ph-actions { display:flex; gap:1rem; flex-wrap:wrap; }
.hero-note { margin-top:1.2rem; font-size:1rem; color:rgba(12,12,12,.55); letter-spacing:.08em; }

.ph-right { display:flex; flex-direction:column; gap:1.5rem; }
.ph-stat-row { display:grid; grid-template-columns:1fr 1fr; gap:1.2rem; }
.ph-stat {
  background:var(--white); border:1px solid rgba(201,168,76,.25);
  border-radius:var(--radius); padding:1.8rem;
  box-shadow: 0 2px 16px rgba(0,0,0,.06);
}
.ph-stat-big {
  grid-column:span 2;
  background:linear-gradient(135deg,rgba(201,168,76,.12),rgba(201,168,76,.03));
  border-color:rgba(201,168,76,.4);
  display:flex; align-items:center; gap:1.5rem;
}
.ph-stat-num { font-family:'Cormorant Garamond',serif; font-size:3.2rem; color:var(--black); line-height:1; font-weight:300; }
.ph-stat-lbl { font-size:1rem; color:rgba(12,12,12,.6); letter-spacing:.1em; text-transform:uppercase; margin-top:.4rem; line-height:1.4; }
.ph-stat-text { font-size:1.05rem; color:rgba(12,12,12,.7); line-height:1.7; margin-top:.5rem; }
.ph-stat-icon { font-size:2rem; flex-shrink:0; }

.scroll-hint {
  display:flex; flex-direction:column; align-items:center; gap:.5rem;
  padding-bottom:2.5rem; text-decoration:none; cursor:pointer;
  position:relative; z-index:2;
  animation:fadeUpCenter .8s 1.3s ease both;
}
.arrow-line {
  width:1px; height:36px;
  background:linear-gradient(180deg,var(--gold),transparent);
  animation:arrowAnim 2s ease-in-out infinite;
}
.explorer-label { font-size:.7rem; letter-spacing:.22em; text-transform:uppercase; color:var(--muted); }
@keyframes arrowAnim {
  0%   { opacity:0; transform:scaleY(0); transform-origin:top; }
  50%  { opacity:1; transform:scaleY(1); transform-origin:top; }
  51%  { transform:scaleY(1); transform-origin:bottom; }
  100% { opacity:0; transform:scaleY(0); transform-origin:bottom; }
}
@keyframes fadeUpCenter { from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }
@keyframes slideLeft   { from{opacity:0;transform:translateX(-35px)} to{opacity:1;transform:translateX(0)} }
@keyframes slideRight  { from{opacity:0;transform:translateX(35px)}  to{opacity:1;transform:translateX(0)} }

.ph-anim-1 { animation:slideLeft .9s .2s ease both; }
.ph-anim-2 { animation:slideLeft .9s .55s ease both; }
.ph-anim-3 { animation:slideLeft .9s .8s ease both; }
.ph-anim-4 { animation:slideLeft .9s 1s ease both; }
.ph-anim-r { animation:slideRight 1s .4s ease both; }

/* ═══ ACCROCHE + VISION (FUSIONNÉES) ═══ */
.accroche {
  min-height:100vh;
  background: var(--black);
  position:relative; overflow:hidden;
  padding-top:var(--nav-h);
}
.accroche-inner {
  max-width:1280px; margin:0 auto; padding:0 3.5rem;
  display:grid; grid-template-columns:1fr 1fr;
  align-items:center; min-height:calc(100vh - var(--nav-h));
  position:relative; z-index:2; gap:4rem;
}
.accroche-blob { position:absolute; border-radius:50%; filter:blur(80px); pointer-events:none; }
.accroche-blob.b1 { width:600px; height:600px; background:radial-gradient(circle,rgba(201,168,76,0.10) 0%,transparent 70%); bottom:-60px; right:-100px; }
.accroche-blob.b2 { width:350px; height:350px; background:radial-gradient(circle,rgba(201,168,76,0.06) 0%,transparent 70%); top:40%; left:-50px; }
.accroche-stars {
  position:absolute; inset:0; pointer-events:none;
  background-image:
    radial-gradient(1px 1px at 15% 20%,rgba(201,168,76,0.6) 0%,transparent 100%),
    radial-gradient(1px 1px at 80% 15%,rgba(201,168,76,0.5) 0%,transparent 100%),
    radial-gradient(1.5px 1.5px at 90% 70%,rgba(201,168,76,0.7) 0%,transparent 100%),
    radial-gradient(1px 1px at 5% 60%,rgba(201,168,76,0.4) 0%,transparent 100%),
    radial-gradient(2px 2px at 50% 85%,rgba(201,168,76,0.3) 0%,transparent 100%);
}

/* ── Gauche : tout en blanc sur noir ── */
.accroche-left { padding:4rem 0; }
.accroche-badge {
  display:inline-flex; align-items:center; gap:.6rem;
  background:rgba(201,168,76,0.12); border:1px solid rgba(201,168,76,0.35);
  border-radius:50px; padding:.35rem 1rem .35rem .5rem; margin-bottom:2rem;
}
.accroche-dot { width:8px; height:8px; border-radius:50%; background:var(--gold); animation:pulse 2s infinite; }
@keyframes pulse { 0%,100%{box-shadow:0 0 0 0 rgba(201,168,76,.6)} 50%{box-shadow:0 0 0 6px rgba(201,168,76,0)} }
.accroche-badge-text { font-size:.82rem; letter-spacing:.15em; text-transform:uppercase; color:var(--gold-light); }
.accroche-title {
  font-family:'Cormorant Garamond',serif;
  font-size:clamp(3rem,5.5vw,6.5rem);
  font-weight:300; line-height:1.08; color:var(--white); margin-bottom:1.5rem;
}
.accroche-title em { font-style:italic; color:var(--gold); display:block; }
.accroche-sub { font-size:1.15rem; line-height:1.85; color:rgba(250,250,247,.65); margin-bottom:2rem; max-width:480px; }

/* phrase vision intégrée */
.accroche-vision-quote {
  font-family:'Cormorant Garamond',serif;
  font-size:1.1rem; font-style:italic;
  color:rgba(201,168,76,.7); line-height:1.75;
  margin-bottom:2rem; max-width:460px;
  padding-left:1.2rem;
  border-left:2px solid rgba(201,168,76,.35);
}
.accroche-actions { display:flex; gap:1rem; flex-wrap:wrap; }
.accroche-note { margin-top:1rem; font-size:.88rem; color:rgba(250,250,247,.38); letter-spacing:.08em; }
.accroche-stats { display:flex; gap:2.5rem; margin-top:3rem; padding-top:2rem; border-top:1px solid rgba(201,168,76,.15); }
.accroche-stat-num { font-family:'Cormorant Garamond',serif; font-size:2.4rem; font-weight:400; color:var(--gold); line-height:1; }
.accroche-stat-label { font-size:.78rem; letter-spacing:.15em; text-transform:uppercase; color:var(--muted); margin-top:.2rem; }

/* ── Droite : carte vidéo flottante ── */
.accroche-right {
  position:relative; display:flex; justify-content:center; align-items:center;
  height:calc(100vh - var(--nav-h));
}
.video-card {
  width:100%; max-width:440px;
  border-radius:28px;
  border:1px solid rgba(201,168,76,.25);
  overflow:hidden;
  box-shadow:0 32px 80px rgba(0,0,0,.7), 0 0 0 1px rgba(201,168,76,.08);
  position:relative;
  background:var(--dark2);
}
.video-card::before {
  content:''; position:absolute; top:0; left:0; right:0; height:2px;
  background:linear-gradient(90deg,transparent,var(--gold),transparent);
  z-index:3;
}
/* placeholder vidéo — remplacer src par l'URL réelle */
.video-card video,
.video-card iframe {
  width:100%; display:block;
  aspect-ratio:9/16;
  object-fit:cover;
  border:none;
}
/* overlay bas avec texte sur la vidéo */
.video-card-overlay {
  position:absolute; bottom:0; left:0; right:0;
  padding:2rem 1.8rem 1.8rem;
  background:linear-gradient(0deg, rgba(10,8,4,.95) 0%, rgba(10,8,4,.6) 60%, transparent 100%);
  z-index:2;
}
.video-card-label {
  font-size:.72rem; letter-spacing:.28em; text-transform:uppercase;
  color:var(--gold); margin-bottom:.5rem; display:block;
}
.video-card-title {
  font-family:'Cormorant Garamond',serif;
  font-size:1.25rem; font-weight:300; font-style:italic;
  color:var(--white); line-height:1.45;
}
/* badge play centré (visible si pas de vidéo) */
.video-placeholder {
  aspect-ratio:9/16;
  background:linear-gradient(160deg, #1a1710 0%, #0c0c0c 100%);
  display:flex; flex-direction:column; align-items:center; justify-content:center; gap:1.2rem;
}
.play-ring {
  width:72px; height:72px; border-radius:50%;
  border:1.5px solid rgba(201,168,76,.5);
  display:flex; align-items:center; justify-content:center;
  background:rgba(201,168,76,.08);
  transition:background .3s, transform .3s;
  cursor:pointer;
}
.play-ring:hover { background:rgba(201,168,76,.18); transform:scale(1.08); }
.play-ring svg { width:24px; height:24px; fill:var(--gold); margin-left:4px; }
.video-placeholder-label {
  font-size:.8rem; letter-spacing:.18em; text-transform:uppercase;
  color:var(--muted);
}

/* ═══ RESONANCE ═══ */
.resonance { background:var(--white2); }
.resonance .container { display:grid; grid-template-columns:1fr 1fr; gap:5rem; align-items:center; }
.res-left .sec-title { color:var(--black); }
.res-left .sec-text  { color:#666; }
.res-tags { display:flex; flex-wrap:wrap; gap:.6rem; margin-top:2rem; }
.res-tag { padding:.45rem 1rem; border-radius:50px; border:1px solid rgba(201,168,76,.4); font-size:.88rem; color:#555; }
.res-quote-card { background:var(--black); border-radius:var(--radius); padding:2.5rem; border:1px solid rgba(201,168,76,.2); position:relative; overflow:hidden; }
.res-quote-card::before { content:''; position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,transparent,var(--gold),transparent); }
.qmark { font-family:'Cormorant Garamond',serif; font-size:5rem; color:var(--gold); opacity:.2; line-height:.8; margin-bottom:.5rem; }
.qtext { font-family:'Cormorant Garamond',serif; font-size:1.35rem; font-style:italic; font-weight:300; color:var(--white); line-height:1.65; }
.nomade-pill { display:inline-flex; align-items:center; gap:.5rem; background:rgba(201,168,76,.12); border:1px solid rgba(201,168,76,.3); border-radius:50px; padding:.5rem 1.1rem; margin-top:1.5rem; }
.nomade-pill span { font-size:.85rem; color:var(--gold-light); letter-spacing:.1em; }

/* ═══ REASONS ═══ */
.reasons { background:var(--black); }
.reasons .container { text-align:center; }
.reasons .sec-title { color:var(--white); text-align:center; }
.reasons .sec-text { margin:1rem auto 0; color:var(--muted); text-align:center; }
.reasons-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:1.5rem; margin-top:3.5rem; }
.reason-card { background:var(--dark); border:1px solid rgba(201,168,76,.12); border-radius:var(--radius); padding:2rem; text-align:left; transition:border-color .3s,transform .3s; }
.reason-card:hover { border-color:rgba(201,168,76,.4); transform:translateY(-4px); }
.reason-icon { width:48px; height:48px; border-radius:12px; background:rgba(201,168,76,.12); border:1px solid rgba(201,168,76,.2); display:flex; align-items:center; justify-content:center; font-size:1.3rem; margin-bottom:1.2rem; }
.reason-title { font-size:1.05rem; font-weight:600; color:var(--gold-light); margin-bottom:.6rem; letter-spacing:.04em; }
.reason-text  { font-size:.95rem; color:var(--muted); line-height:1.75; }

/* ═══ STEPS ═══ */
.steps-section { background:var(--white2); }
.steps-header { display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:3.5rem; flex-wrap:wrap; gap:1.5rem; }
.steps-header .sec-title { color:var(--black); }
.steps-row { display:grid; grid-template-columns:1fr auto 1fr auto 1fr; align-items:start; }
.step-box { background:var(--black); border-radius:var(--radius); padding:2rem 1.8rem; text-align:center; border:1px solid rgba(201,168,76,.15); transition:border-color .3s,transform .3s; }
.step-box:hover { border-color:rgba(201,168,76,.5); transform:translateY(-5px); }
.step-num-ring { width:56px; height:56px; border-radius:50%; border:1.5px solid var(--gold); display:flex; align-items:center; justify-content:center; margin:0 auto 1.2rem; font-family:'Cormorant Garamond',serif; font-size:1.4rem; color:var(--gold); }
.step-title { font-size:1.05rem; font-weight:600; color:var(--white); margin-bottom:.7rem; line-height:1.3; }
.step-text  { font-size:.92rem; color:var(--muted); line-height:1.75; }
.step-arrow { display:flex; align-items:center; justify-content:center; padding:0 1rem; padding-top:1.8rem; color:rgba(201,168,76,.4); font-size:1.2rem; }

/* ═══ OFFER ═══ */
.offer-section { background:var(--black); }
.offer-header { text-align:center; margin-bottom:3.5rem; }
.offer-header .sec-title { color:var(--white); }
.offer-header .sec-text  { margin:1rem auto 0; text-align:center; }
.offer-grid { display:grid; grid-template-columns:1fr; gap:2rem; max-width:600px; margin:0 auto; }
.offer-card { border-radius:var(--radius); padding:2.5rem; border:1px solid rgba(201,168,76,.18); position:relative; overflow:hidden; transition:border-color .3s,transform .3s; }
.offer-card:hover { border-color:rgba(201,168,76,.5); transform:translateY(-5px); }
.offer-card.primary { background:linear-gradient(145deg,var(--dark) 0%,rgba(201,168,76,.06) 100%); }
.offer-card::after { content:''; position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,transparent,var(--gold),transparent); }
.offer-num   { font-family:'Cormorant Garamond',serif; font-size:4rem; font-weight:300; color:rgba(201,168,76,.15); line-height:1; margin-bottom:.5rem; }
.offer-title { font-family:'Cormorant Garamond',serif; font-size:1.6rem; font-weight:300; color:var(--gold); margin-bottom:1.5rem; line-height:1.25; }
.offer-items { list-style:none; margin-bottom:2rem; }
.offer-items li { display:flex; gap:.7rem; align-items:flex-start; padding:.55rem 0; border-bottom:1px solid rgba(255,255,255,.05); font-size:.95rem; color:rgba(250,250,247,.65); line-height:1.55; }
.offer-items li::before { content:'◆'; color:var(--gold); font-size:.45rem; margin-top:.42rem; flex-shrink:0; }

/* ═══ FOR WHO ═══ */
.for-who { background:var(--white2); }
.for-who .container { display:grid; grid-template-columns:1fr 1fr; gap:3rem; }
.fw-col-title { font-family:'Cormorant Garamond',serif; font-size:1.5rem; font-weight:400; margin-bottom:1.5rem; padding-bottom:1rem; border-bottom:1.5px solid; }
.fw-col.yes .fw-col-title { color:var(--gold); border-color:rgba(201,168,76,.4); }
.fw-col.no  .fw-col-title { color:#aaa; border-color:rgba(0,0,0,.1); }
.fw-list { list-style:none; display:flex; flex-direction:column; gap:.6rem; }
.fw-list li { display:flex; gap:.8rem; align-items:flex-start; font-size:1rem; line-height:1.6; padding:.65rem .8rem; border-radius:var(--radius-sm); }
.fw-col.yes .fw-list li { color:#333; }
.fw-col.no  .fw-list li { color:#999; }
.fw-dot { width:7px; height:7px; border-radius:50%; flex-shrink:0; margin-top:.42rem; }
.fw-col.yes .fw-dot { background:var(--gold); }
.fw-col.no  .fw-dot { background:#ccc; }

/* ═══ OBJECTIONS ═══ */
.objections { background:var(--black2); }
.objections .container { display:grid; grid-template-columns:1fr 1fr; gap:3rem; }
.obj-card { background:var(--dark); border-radius:var(--radius); padding:2.5rem; border:1px solid rgba(201,168,76,.12); transition:border-color .3s; }
.obj-card:hover { border-color:rgba(201,168,76,.35); }
.obj-q { font-family:'Cormorant Garamond',serif; font-size:1.45rem; font-style:italic; color:var(--gold-light); margin-bottom:1.2rem; line-height:1.4; }
.obj-a { font-size:1rem; color:var(--muted); line-height:1.9; }
.obj-a strong { color:var(--white); font-weight:400; }
.obj-a em     { color:var(--gold-light); font-style:normal; }



/* ═══ FOUNDERS ═══ */
.founders { background:var(--black); }
.founders-inner { display:grid; grid-template-columns:1fr 1fr; gap:5rem; align-items:center; }
.founders-badge { background:linear-gradient(135deg,rgba(201,168,76,.1),rgba(201,168,76,.03)); border:1px solid rgba(201,168,76,.35); border-radius:var(--radius); padding:2.5rem; position:relative; }
.founders-badge::before { content:''; position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,transparent,var(--gold),transparent); }
.founders-label { font-size:.78rem; letter-spacing:.3em; text-transform:uppercase; color:var(--gold); display:block; margin-bottom:.8rem; }
.founders-title { font-family:'Cormorant Garamond',serif; font-size:1.7rem; font-weight:300; color:var(--white); margin-bottom:1.5rem; line-height:1.3; }
.founders-note  { font-size:.88rem; color:var(--muted); font-style:italic; margin-top:1rem; }
.founders-text .sec-title { color:var(--white); }
.founders-counter { display:grid; grid-template-columns:repeat(2,1fr); gap:1rem; margin-top:2.5rem; }
.counter-box { background:var(--dark); border-radius:var(--radius-sm); padding:1.5rem; border:1px solid rgba(201,168,76,.12); }
.counter-num { font-family:'Cormorant Garamond',serif; font-size:2.4rem; color:var(--gold); line-height:1; }
.counter-lbl { font-size:.78rem; color:var(--muted); letter-spacing:.12em; text-transform:uppercase; margin-top:.35rem; }
.perk-list { list-style:none; display:flex; flex-direction:column; gap:.7rem; margin-bottom:2rem; }
.perk-list li { display:flex; gap:.8rem; align-items:flex-start; font-size:.95rem; color:rgba(250,250,247,.7); line-height:1.6; }
.perk-list li::before { content:'◆'; color:var(--gold); font-size:.4rem; margin-top:.5rem; flex-shrink:0; }

/* ═══ CTA FINAL ═══ */
.cta-final { background:var(--black); padding:8rem 0; text-align:center; position:relative; overflow:hidden; }
.cta-final::before { content:''; position:absolute; inset:0; background:radial-gradient(ellipse 80% 60% at 50% 50%,rgba(201,168,76,.06) 0%,transparent 70%); }
.cta-final .container { position:relative; z-index:2; max-width:720px; }
.cta-final .sec-title { color:var(--white); font-size:clamp(2.5rem,5vw,4.5rem); margin-bottom:1.5rem; }
.cta-final .sec-text  { max-width:560px; margin:0 auto 2.5rem; font-size:1.1rem; color:var(--muted); line-height:1.9; text-align:center; }
.cta-btns { display:flex; gap:1rem; justify-content:center; flex-wrap:wrap; }
.cta-sign { margin-top:3rem; font-family:'Cormorant Garamond',serif; font-size:1.15rem; font-style:italic; color:var(--muted); display:flex; align-items:center; justify-content:center; gap:.8rem; }
.cta-sign::before,.cta-sign::after { content:''; display:block; width:50px; height:1px; background:rgba(201,168,76,.3); }

/* ═══ FORM ═══ */
.form-section { background:var(--dark2); padding:5rem 0; }
.form-section .container { max-width:580px; text-align:center; }
.form-section .sec-title { color:var(--white); margin-bottom:.5rem; }
.form-box { background:var(--dark); border:1px solid rgba(201,168,76,.2); border-radius:var(--radius); padding:2.8rem; margin-top:2rem; position:relative; overflow:hidden; }
.form-box::before { content:''; position:absolute; top:0; left:0; right:0; height:2px; background:linear-gradient(90deg,transparent,var(--gold),transparent); }
.form-group { margin-bottom:1.2rem; text-align:left; }
.form-label { display:block; font-size:.82rem; letter-spacing:.15em; text-transform:uppercase; color:var(--muted); margin-bottom:.5rem; }
.form-input { width:100%; background:rgba(255,255,255,.04); border:1px solid rgba(255,255,255,.1); color:var(--white); padding:.95rem 1.2rem; border-radius:10px; font-family:'Outfit',sans-serif; font-size:1rem; outline:none; transition:border-color .3s; }
.form-input:focus { border-color:var(--gold); }
.form-input::placeholder { color:rgba(255,255,255,.25); }
.form-check { display:flex; gap:.7rem; align-items:flex-start; margin:1.4rem 0; text-align:left; }
.form-check input { accent-color:var(--gold); margin-top:.2rem; flex-shrink:0; }
.form-check label { font-size:.88rem; color:var(--muted); line-height:1.6; }

/* ═══ FOOTER ═══ */
footer { background:var(--black); border-top:1px solid rgba(201,168,76,.12); padding:2.5rem 3.5rem; display:flex; align-items:center; justify-content:space-between; gap:1.5rem; flex-wrap:wrap; }
.footer-logo { font-family:'Cormorant Garamond',serif; font-size:1.45rem; color:var(--gold); letter-spacing:.1em; }
.footer-tag  { font-size:.9rem; font-style:italic; font-family:'Cormorant Garamond',serif; color:var(--muted); }
.footer-copy { font-size:.78rem; color:rgba(136,136,128,.5); letter-spacing:.1em; }

/* REVEAL */
.reveal { opacity:0; transition:opacity .85s ease,transform .85s ease; }
.reveal.fl { transform:translateX(-40px); }
.reveal.fr { transform:translateX(40px); }
.reveal.fu { transform:translateY(40px); }
.reveal.visible { opacity:1; transform:translate(0) !important; }
.d1{transition-delay:.1s} .d2{transition-delay:.2s}
.d3{transition-delay:.3s} .d4{transition-delay:.4s}
.d5{transition-delay:.5s}

/* RESPONSIVE */
@media(max-width:768px){
  :root{--nav-h:64px;}
  body{font-size:16px;}
  nav{padding:0 1.5rem;}
  .nav-links,.nav-btn{display:none;}
  .burger{display:flex;}
  .mobile-menu{display:flex;}
  .programme-hero-inner{grid-template-columns:1fr;gap:2.5rem;padding:calc(var(--nav-h)+2.5rem) 1.5rem 3rem;}
  .ph-stat-big{grid-column:span 2;}
  .ph-stat-row{grid-template-columns:1fr 1fr;}
  .accroche-inner{grid-template-columns:1fr;padding:2rem 1.5rem;min-height:auto;}
  .accroche-left{padding:2.5rem 0 1.5rem;}
  .accroche-right{height:auto;margin-bottom:2rem;}
  .video-card{max-width:100%;}
  .resonance .container,.for-who .container,.objections .container,.founders-inner{grid-template-columns:1fr;gap:2rem;}
  .reasons-grid{grid-template-columns:1fr;}
  .steps-row{grid-template-columns:1fr;gap:1rem;}
  .step-arrow{display:none;}
  .section{padding:4rem 0;}
  .container{padding:0 1.5rem;}
  .steps-header{flex-direction:column;align-items:flex-start;}
  .founders-counter{grid-template-columns:1fr 1fr;}
  footer{flex-direction:column;text-align:center;padding:2rem 1.5rem;}
  .cta-btns{flex-direction:column;align-items:center;}
  .btn-gold,.btn-ghost,.btn-ghost-light{width:100%;justify-content:center;}
  .offer-grid{grid-template-columns:1fr;}
  .accroche-stats{gap:1.5rem;}
  .accroche-badge-text{font-size:.72rem;}
}
</style>
</head>
<body>



<!-- ═══ SECTION 1 — PROGRAMME HERO ═══ -->
<section class="programme-hero" id="programme">
  <div class="hero-stars"></div>

  <div class="programme-hero-inner">
    <!-- Left -->
    <div class="ph-left">
      <h1 class="ph-title ph-anim-1">
        <span class="prog-inline">
          <span class="prog-label">Programme</span>
          <span class="prog-name">Renaît-Sens</span>
        </span>
      </h1>

      <p class="ph-sub ph-anim-2">
        En <strong>90 jours</strong>, libère tes blocages émotionnels<br>
        et deviens la personne que tu es vraiment.
      </p>

      <div class="ph-actions ph-anim-3">
        <a href="#form" class="btn-gold">✦ Recevoir ma Carte de Traversée</a>
      </div>

      <p class="hero-note ph-anim-4">Offert · En quelques minutes · Aucun engagement</p>
    </div>

    <!-- Right -->
    <div class="ph-right ph-anim-r">
      <div class="ph-stat-row">
        <div class="ph-stat ph-stat-big">
          <div class="ph-stat-icon">
            <canvas id="flameCanvas" width="48" height="64" style="display:block;"></canvas>
          </div>
          <div>
            <div class="ph-stat-num">90 jours</div>
            <div class="ph-stat-lbl">De transformation profonde</div>
            <div class="ph-stat-text">Un programme structuré, humain et accompagné pour traverser ce seuil une bonne fois pour toutes.</div>
          </div>
        </div>
      </div>
      <div class="ph-stat-row">
        <div class="ph-stat">
          <div class="ph-stat-num">3</div>
          <div class="ph-stat-lbl">Phases de traversée</div>
        </div>
        <div class="ph-stat">
          <div class="ph-stat-num">1:1</div>
          <div class="ph-stat-lbl">Accompagnement Sentinelle</div>
        </div>
        <div class="ph-stat">
          <div class="ph-stat-num">∞</div>
          <div class="ph-stat-lbl">Clarté retrouvée</div>
        </div>
        <div class="ph-stat">
          <div class="ph-stat-num">0</div>
          <div class="ph-stat-lbl">Blocage laissé derrière</div>
        </div>
      </div>
    </div>
  </div>

  <a href="#accroche" class="scroll-hint">
    <div class="arrow-line"></div>
    <span class="explorer-label">Explorer</span>
  </a>
</section>

<!-- ═══ SECTION 2 — ACCROCHE + VISION (FUSIONNÉES) ═══ -->
<section class="accroche" id="accroche">
  <div class="accroche-blob b1"></div>
  <div class="accroche-blob b2"></div>
  <div class="accroche-stars"></div>

  <div class="accroche-inner">

    <!-- Gauche -->
    <div class="accroche-left">
      <div class="accroche-badge">
        <div class="accroche-dot"></div>
        <span class="accroche-badge-text">✦ Renaît-Sens — Il ne s'agit pas de fuir. Il s'agit d'entrer dans un passage.</span>
      </div>

      <h2 class="accroche-title">
        Il arrive un moment<br>
        où <em>survivre</em>
        ne suffit <span style="font-style:normal;color:var(--white);">plus.</span>
      </h2>

      <p class="accroche-sub">
        Tu avances encore. Tu assumes encore. Tu tiens encore.<br>
        Mais au fond, tu sens que quelque chose doit changer.<br>
        Renaît-Sens ouvre un espace humain, profond et vrai.
      </p>

      <div class="accroche-actions">
        <a href="#form" class="btn-gold">✦ Recevoir ma Carte de Traversée</a>
        <a href="#resonance" class="btn-ghost">En savoir plus ›</a>
      </div>
      <p class="accroche-note">Offert · En quelques minutes · Aucun engagement</p>

      <div class="accroche-stats">
        <div class="accroche-stat">
          <div class="accroche-stat-num">50</div>
          <div class="accroche-stat-label">Places fondateurs</div>
        </div>
        <div class="accroche-stat">
          <div class="accroche-stat-num">100%</div>
          <div class="accroche-stat-label">Humain & vrai</div>
        </div>
        <div class="accroche-stat">
          <div class="accroche-stat-num">0€</div>
          <div class="accroche-stat-label">Premier pas</div>
        </div>
      </div>
    </div>

    <!-- Droite — carte vidéo flottante -->
    <div class="accroche-right">
      <div class="video-card">

        <!-- 🎬 Remplace "ton-video.mp4" par l'URL réelle de ta vidéo -->
        <!-- <video autoplay muted loop playsinline src="ton-video.mp4"></video> -->

        <!-- Placeholder en attendant la vidéo -->
        <div class="video-placeholder">
          <div class="play-ring" onclick="this.closest('.video-placeholder').innerHTML='<p style=\'color:var(--muted);font-size:.9rem;padding:2rem;text-align:center;\'>Insère ici l\'URL de ta vidéo dans la balise &lt;video&gt;</p>'">
            <svg viewBox="0 0 24 24"><polygon points="6,3 20,12 6,21"/></svg>
          </div>
          <div class="video-placeholder-label">Vidéo de présentation</div>
        </div>

      </div>
    </div>

  </div>
</section>

<!-- ═══ RESONANCE ═══ -->
<section class="section resonance" id="resonance">
  <div class="container">
    <div class="res-left reveal fl">
      <span class="sec-label">✦ Résonance</span>
      <h2 class="sec-title">Peut-être que tu<br>te <em>reconnais</em> ici…</h2>
      <p class="sec-text">Tu continues d'avancer, mais intérieurement quelque chose s'est fatigué. Tu n'as peut-être pas besoin d'un conseil de plus.</p>
      <p class="sec-text" style="font-family:'Cormorant Garamond',serif;font-size:1.05rem;font-style:italic;color:var(--gold);margin-top:1.2rem;">Tu as peut-être besoin d'un passage.</p>
      <div class="res-tags">
        <span class="res-tag">une séparation</span>
        <span class="res-tag">perte de repères</span>
        <span class="res-tag">vide intérieur</span>
        <span class="res-tag">fatigue profonde</span>
        <span class="res-tag">transition de vie</span>
        <span class="res-tag">trop-plein émotionnel</span>
        <span class="res-tag">ne plus continuer comme avant</span>
      </div>
    </div>

    <div class="res-right reveal fr d3">
      <div class="res-quote-card">
        <div class="qmark">"</div>
        <div class="qtext">Ils savent qu'ils n'ont pas seulement besoin d'aller mieux. Ils ont besoin de revenir à eux.</div>
        <div class="nomade-pill">
          <span>✦ Tu es un Nomade — les Sentinelles sont là</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ 3 REASONS ═══ -->
<section class="section reasons" id="reasons">
  <div class="container">
    <div class="reveal fu">
      <span class="sec-label" style="text-align:center;display:block;">✦ Pourquoi Renaît-Sens</span>
      <h2 class="sec-title">3 raisons de faire<br><em>ce premier pas</em></h2>
      <p class="sec-text">Parce que certaines choses ne se règlent pas avec le temps. Et parce que tu mérites autre chose que de tenir.</p>
    </div>
    <div class="reasons-grid">
      <div class="reason-card reveal fu d1">
        <div class="reason-icon">🧭</div>
        <div class="reason-title">De la clarté, pas du bruit</div>
        <div class="reason-text">Un premier éclairage simple et profond pour voir où tu en es vraiment, sans jargon, sans méthode froide.</div>
      </div>
      <div class="reason-card reveal fu d2">
        <div class="reason-icon">🤝</div>
        <div class="reason-title">Tu n'es pas seul</div>
        <div class="reason-text">Les Sentinelles sont des présences humaines, vraies, là pour t'aider à voir plus clair et ouvrir un nouveau passage.</div>
      </div>
      <div class="reason-card reveal fu d3">
        <div class="reason-icon">✦</div>
        <div class="reason-title">Une traversée, pas un programme</div>
        <div class="reason-text">Pas de discours agressif, pas de promesse forcée. Juste un espace de vérité pour sentir si ce chemin te parle.</div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ STEPS ═══ -->
<section class="section steps-section" id="steps">
  <div class="container">
    <div class="steps-header reveal fu">
      <div>
        <span class="sec-label" style="color:var(--gold);">✦ Comment ça se passe</span>
        <h2 class="sec-title">3 étapes simples<br>pour <em>commencer</em></h2>
      </div>
      <a href="#form" class="btn-gold">Je fais mon premier pas ›</a>
    </div>
    <div class="steps-row">
      <div class="step-box reveal fu d1">
        <div class="step-num-ring">I</div>
        <div class="step-title">Tu fais le premier pas</div>
        <div class="step-text">En demandant ta Carte de Traversée ou ton Diagnostic Sahara. Gratuit, sans engagement, en quelques minutes.</div>
      </div>
      <div class="step-arrow reveal fu d2">›</div>
      <div class="step-box reveal fu d3">
        <div class="step-num-ring">II</div>
        <div class="step-title">Tu reçois un premier éclairage</div>
        <div class="step-text">Tu commences à voir plus clairement ce que tu vis, ce que tu portes, et ce qui mérite d'être traversé.</div>
      </div>
      <div class="step-arrow reveal fu d4">›</div>
      <div class="step-box reveal fu d5">
        <div class="step-num-ring">III</div>
        <div class="step-title">Tu sens si c'est le bon moment</div>
        <div class="step-text">Si cela résonne, nous t'ouvrons la suite de la traversée Renaît-Sens à ton rythme.</div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ OFFER ═══ -->
<section class="section offer-section" id="offer">
  <div class="container">
    <div class="offer-header reveal fu">
      <span class="sec-label" style="text-align:center;display:block;">✦ Ce que tu reçois aujourd'hui</span>
      <h2 class="sec-title" style="var(--dark2);">Choisis ta première<br><em>porte d'entrée</em></h2>
      <p class="sec-text">Un seul but : te donner un premier espace de clarté.</p>
    </div>
    <div class="offer-grid">
      <div class="offer-card primary reveal fu d2">
        <div class="offer-num">01</div>
        <div class="offer-title">La Carte de Traversée Personnelle</div>
        <ul class="offer-items">
          <li>Où tu en es vraiment en ce moment</li>
          <li>Ce que tu traverses intérieurement</li>
          <li>Ce qui te freine dans ton avancée</li>
          <li>Ce qui appelle en toi aujourd'hui</li>
        </ul>
        <a href="#form" class="btn-gold" style="width:100%;justify-content:center;">Je reçois ma Carte ›</a>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FOR WHO ═══ -->
<section class="section for-who" id="for-who">
  <div class="container">
    <div class="fw-col yes reveal fl">
      <span class="sec-label">✦ Cette porte est pour toi si…</span>
      <div class="fw-col-title">Tu te reconnais ici</div>
      <ul class="fw-list">
        <li><span class="fw-dot"></span>Tu sens qu'un cycle arrive à sa fin</li>
        <li><span class="fw-dot"></span>Tu traverses une période de flou, de fatigue ou de rupture</li>
        <li><span class="fw-dot"></span>Tu veux arrêter de tourner en rond seul</li>
        <li><span class="fw-dot"></span>Tu cherches quelque chose de profondément humain</li>
        <li><span class="fw-dot"></span>Tu veux de la clarté, pas du bruit</li>
        <li><span class="fw-dot"></span>Tu es prêt à regarder les choses avec vérité</li>
      </ul>
    </div>
    <div class="fw-col no reveal fr d2">
      <span class="sec-label" style="opacity:.4;">✦ Cette porte n'est pas pour toi si…</span>
      <div class="fw-col-title">Pas encore le bon moment</div>
      <ul class="fw-list">
        <li><span class="fw-dot"></span>Tu veux juste consommer du contenu sans jamais bouger</li>
        <li><span class="fw-dot"></span>Tu cherches une solution magique</li>
        <li><span class="fw-dot"></span>Tu veux être rassuré sans te confronter à rien</li>
        <li><span class="fw-dot"></span>Tu n'es pas prêt à faire un vrai premier pas</li>
      </ul>
    </div>
  </div>
</section>

<!-- ═══ OBJECTIONS ═══ -->
<section class="section objections" id="trust">
  <div class="container">
    <div class="obj-card reveal fl">
      <div class="obj-q">"Je ne sais pas encore si je peux avoir confiance."</div>
      <div class="obj-a">
        C'est normal. <strong>La confiance ne se demande pas. Elle se construit.</strong><br><br>
        C'est précisément pour cela que nous ne te demandons pas de te jeter dans l'inconnu. Nous t'invitons d'abord à faire un premier pas simple, sans pression, pour sentir par toi-même si cela résonne.<br><br>
        Pas de discours agressif. Pas de promesse forcée. Pas de masque.
      </div>
    </div>
    <div class="obj-card reveal fr d2">
      <div class="obj-q">"Et si je ne sais pas encore ce que je vis ?"</div>
      <div class="obj-a">
        <strong>Alors tu es peut-être exactement au bon endroit.</strong><br><br>
        Tu n'as pas besoin d'arriver avec toutes les réponses. Tu n'as pas besoin d'avoir déjà tout compris.<br><br>
        Tu as seulement besoin d'être assez honnête pour reconnaître qu'au fond, <em>quelque chose appelle.</em><br><br>
        Le premier pas sert justement à remettre de la clarté là où tout était devenu flou.
      </div>
    </div>
  </div>
</section>



<!-- ═══ FOUNDERS ═══ -->
<section class="section founders" id="founders">
  <div class="container">
    <div class="founders-inner">
      <div class="founders-text reveal fl">
        <span class="sec-label">✦ Offre de lancement</span>
        <h2 class="sec-title" style="color:var(--white);">Les 50 Nomades<br><em>Fondateurs</em></h2>
        <p class="sec-text">Les 50 premiers à rejoindre Renaît-Sens bénéficieront d'un Passage Fondateur à part entière. Une place rare. Une entrée à part.</p>
        <div class="founders-counter">
          <div class="counter-box">
            <div class="counter-num">50</div>
            <div class="counter-lbl">places nomades limitées</div>
          </div>
          <div class="counter-box">
            <div class="counter-num">Un</div>
            <div class="counter-lbl">Seul premier pas</div>
          </div>
          <div class="counter-box">
            <div class="counter-num">∞</div>
            <div class="counter-lbl">Accès prioritaires</div>
          </div>
          <div class="counter-box">
            <div class="counter-num">Un</div>
            <div class="counter-lbl">diagnostic Sahara prioritaire</div>
          </div>
        </div>
      </div>

      <div class="founders-badge reveal fr d3">
        <span class="founders-label">✦ Passage Fondateur — Places limitées</span>
        <div class="founders-title">Ce que tu reçois en tant que<br>Nomade Fondateur</div>
        <ul class="perk-list">
          <li>Le statut de Nomade Fondateur</li>
          <li>Un Diagnostic Sahara prioritaire</li>
          <li>Un accueil privilégié et personnalisé</li>
          <li>Un accompagnement renforcé au démarrage</li>
          <li>Un accès prioritaire aux prochaines ouvertures et immersions</li>
        </ul>
        <a href="#form" class="btn-gold" style="width:100%;justify-content:center;">Je deviens l'un des 50 Nomades Fondateurs ›</a>
        <p class="founders-note">Un passage réservé aux premiers. Une entrée à part.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ CTA FINAL ═══ -->
<section class="cta-final" id="cta">
  <div class="container">
    <div class="reveal fu">
      <span class="sec-label" style="text-align:center;display:block;">✦ Si ce message résonne</span>
      <h2 class="sec-title">N'ignore pas<br><em>cet appel.</em></h2>
      <p class="sec-text">Parfois, une vie ne bascule pas dans le bruit. Elle bascule dans un instant de lucidité. Dans une porte que l'on accepte enfin d'ouvrir. Dans un premier pas.</p>
      <div class="cta-btns">
        <a href="#form" class="btn-gold">✦ Je fais mon premier pas</a>
        <a href="#form" class="btn-ghost-light">Je réserve mon Diagnostic Sahara ›</a>
      </div>
      <div class="cta-sign">Parce qu'il arrive un moment où survivre ne suffit plus.</div>
    </div>
  </div>
</section>

<!-- ═══ FORMULAIRE ═══ -->
<section class="form-section" id="form">
  <div class="container">
    <span class="sec-label" style="text-align:center;display:block;">✦ Premier pas</span>
    <h2 class="sec-title" style="color:var(--white);margin-bottom:.5rem;">Recevoir ma Carte<br><em>de Traversée</em></h2>
    <div class="form-box">
      <div class="form-group">
        <label class="form-label">Prénom</label>
        <input class="form-input" type="text" placeholder="Ton prénom">
      </div>
      <div class="form-group">
        <label class="form-label">Email</label>
        <input class="form-input" type="email" placeholder="ton@email.com">
      </div>
      <div class="form-group">
        <label class="form-label">Téléphone (optionnel)</label>
        <input class="form-input" type="tel" placeholder="+33 6 ...">
      </div>
      <div class="form-check">
        <input type="checkbox" id="consent">
        <label for="consent">J'accepte de recevoir les contenus et propositions de Renaît-Sens. Je peux me désinscrire à tout moment.</label>
      </div>
      <button class="btn-gold" style="width:100%;justify-content:center;margin-top:.5rem;">Recevoir ma Carte de Traversée Personnelle</button>
    </div>
  </div>
</section>

<!-- ═══ FOOTER ═══ -->
<footer>
  <div class="footer-logo">Renaît-Sens</div>
  <div class="footer-tag">Parce qu'il arrive un moment où survivre ne suffit plus.</div>
  <div class="footer-copy">© 2025 Renaît-Sens</div>
</footer>

<script>
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
</script>
</body>
</html>