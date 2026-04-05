{{-- resources/views/inscription/merci.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Merci — Renaît-Sens</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300;1,400&family=Outfit:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --gold: #C9A84C;
      --gold-light: #E8C97A;
      --black: #0C0C0C;
      --dark: #1A1A1A;
      --white: #FAFAF7;
      --muted: #888880;
    }
    * { margin:0; padding:0; box-sizing:border-box; }
    html, body { height:100%; }
    body {
      font-family: 'Outfit', sans-serif;
      background: var(--black);
      color: var(--white);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }
    .bg-glow {
      position: absolute; inset: 0;
      background: radial-gradient(ellipse 70% 60% at 50% 50%, rgba(201,168,76,.07) 0%, transparent 70%);
      pointer-events: none;
    }
    .card {
      position: relative; z-index: 2;
      background: var(--dark);
      border: 1px solid rgba(201,168,76,.25);
      border-radius: 24px;
      padding: 3.5rem;
      max-width: 560px;
      width: calc(100% - 3rem);
      text-align: center;
      animation: fadeUp .9s ease forwards;
    }
    .card::before {
      content: '';
      position: absolute; top:0; left:0; right:0; height:2px;
      background: linear-gradient(90deg, transparent, var(--gold), transparent);
      border-radius: 24px 24px 0 0;
    }
    @keyframes fadeUp {
      from { opacity:0; transform:translateY(30px); }
      to   { opacity:1; transform:translateY(0); }
    }
    .icon { font-size: 2.5rem; margin-bottom: 1.5rem; }
    .label {
      font-size: .75rem; letter-spacing: .3em;
      text-transform: uppercase; color: var(--gold);
      margin-bottom: 1rem;
    }
    h1 {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(2rem, 4vw, 2.8rem);
      font-weight: 300; line-height: 1.2;
      margin-bottom: 1.5rem;
    }
    h1 em { font-style: italic; color: var(--gold); }
    .divider {
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(201,168,76,.3), transparent);
      margin: 1.8rem 0;
    }
    p {
      font-size: 1.05rem; line-height: 1.85;
      color: rgba(250,250,247,.6);
      margin-bottom: 1rem;
    }
    p strong { color: var(--white); font-weight: 400; }
    .type-badge {
      display: inline-block;
      background: rgba(201,168,76,.12);
      border: 1px solid rgba(201,168,76,.3);
      border-radius: 50px;
      padding: .4rem 1.2rem;
      font-size: .88rem;
      color: var(--gold-light);
      margin-bottom: 1.8rem;
    }
    .btn {
      display: inline-block;
      margin-top: 1.5rem;
      background: var(--gold);
      color: var(--black);
      text-decoration: none;
      padding: .9rem 2rem;
      border-radius: 50px;
      font-size: .9rem;
      font-weight: 600;
      letter-spacing: .08em;
      transition: background .3s, transform .2s;
    }
    .btn:hover { background: var(--gold-light); transform: translateY(-2px); }
    .tagline {
      margin-top: 2rem;
      font-family: 'Cormorant Garamond', serif;
      font-size: 1rem;
      font-style: italic;
      color: rgba(136,136,128,.6);
    }
  </style>
</head>
<body>
  <div class="bg-glow"></div>

  <div class="card" role="main" aria-label="Page de confirmation d'inscription">
    <div class="icon" aria-hidden="true">✦</div>
    <div class="label">Inscription confirmée</div>

    <h1>
      Merci <em>{{ $prenom }}</em>,<br>
      tu as fait le pas.
    </h1>

    <span class="type-badge">{{ $type }}</span>

    <div class="divider"></div>

    <p>
      Vérifie ta boîte mail — un email vient de t'être envoyé avec la suite.
    </p>
    <p>
      Si tu ne le vois pas dans les prochaines minutes, pense à regarder dans tes <strong>spams</strong> ou <strong>promotions</strong>.
    </p>

    <a href="{{ route('home') }}" class="btn" aria-label="Retourner à l'accueil Renaît-Sens">
      ← Retour à l'accueil
    </a>

    <p class="tagline">Parce qu'il arrive un moment où survivre ne suffit plus.</p>
  </div>
</body>
</html>
