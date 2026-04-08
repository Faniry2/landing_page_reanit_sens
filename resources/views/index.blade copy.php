@extends('layouts.app')


@push('styles')
    @vite('resources/css/index.css')
@endpush

@section('content')
    <!-- ═══ NAV ═══ -->
    {{-- ═══ NAV — coller dans index.blade.php ═══ --}}
        <x-nav/>

        {{-- ═══ MOBILE MENU OVERLAY ═══ --}}
        <div id="mobileMenu" class="mobile-menu" role="dialog" aria-label="Menu principal" aria-modal="true">
            <a href="#resonance">Pour qui</a>
            <div class="mobile-divider"></div>
           <a href="#steps">Le chemin</a>
            <div class="mobile-divider"></div>
             <a href="#offer">Ce que tu reçois</a>
            
            <div class="mobile-divider"></div>
            <a href="#founders">Je deviens Nomade Fondateur</a>
            <div class="mobile-divider"></div>
            <a href="#form" class="mobile-cta">✦ Je commence</a>
        </div>

    <!-- ═══ SECTION 1 — PROGRAMME RENAÎT-SENS 90 (HERO) ═══ -->
    <section
    class="programme-hero"
    id="programme"
    aria-label="Section principale — Programme Renaît-Sens 90"
    style="min-height:100vh; display:flex; flex-direction:column; justify-content:center;">
    <div class="hero-bg-blob blob1" aria-hidden="true"></div>
    <div class="hero-bg-blob blob2" aria-hidden="true"></div>
    <div class="hero-stars" aria-hidden="true"></div>

    <div class="programme-hero-inner" style="padding-top:6rem; padding-bottom:3rem;">

        <!-- Left -->
        <div class="ph-left">

        <h1 class="ph-title ph-title-huge" aria-label="Programme Renaît-Sens 90" style="opacity:0;animation:slideLeft .9s .2s ease forwards;">
            <span class="prog-inline">
            <span class="prog-label">Programme</span>
            <br>
            <span class="prog-name">Renaît-Sens90</span><span class="prog-num"></span>
            </span>
        </h1>

        <p class="ph-sub ph-sub-big" style="opacity:0;animation:slideLeft .9s .55s ease forwards;">
            En <strong>90 jours</strong>, libère tes blocages émotionnels<br>
            et deviens la personne que tu es vraiment.
        </p>

        <div class="ph-actions" style="opacity:0;animation:slideLeft .9s .8s ease forwards;" role="group" aria-label="Actions principales">
            <a href="#form" class="btn-gold" aria-label="Commencer le Programme Renaît-Sens 90">✦ Recevoir ma Carte de Traversée</a>
           
        </div>

        <p class="hero-note" style="margin-top:1.2rem; opacity:0; animation:slideLeft .9s 1s ease forwards;" aria-label="Conditions d'accès">
            Offert · En quelques minutes · Aucun engagement
        </p>
        </div>

        <!-- Right -->
        <div class="ph-right" style="opacity:0;animation:slideRight 1s .4s ease forwards;" aria-label="Chiffres clés du programme">
        <div class="ph-stat-row">
            <div class="ph-stat ph-stat-big" role="img" aria-label="90 jours de transformation profonde">
            <div class="ph-stat-icon" aria-hidden="true">
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
            <div class="ph-stat" role="img" aria-label="3 phases de traversée">
            <div class="ph-stat-num" aria-hidden="true">3</div>
            <div class="ph-stat-lbl">Phases de traversée</div>
            </div>
            <div class="ph-stat" role="img" aria-label="Accompagnement individuel Sentinelle">
            <div class="ph-stat-num" aria-hidden="true">1:1</div>
            <div class="ph-stat-lbl">Accompagnement Sentinelle</div>
            </div>
            <div class="ph-stat" role="img" aria-label="Clarté retrouvée infinie">
            <div class="ph-stat-num" aria-hidden="true">∞</div>
            <div class="ph-stat-lbl">Clarté retrouvée</div>
            </div>
            <div class="ph-stat" role="img" aria-label="Zéro blocage laissé derrière">
            <div class="ph-stat-num" aria-hidden="true">0</div>
            <div class="ph-stat-lbl">Blocage laissé derrière</div>
            </div>
        </div>
        </div>

    </div>

    <a
        href="#accroche"
        class="scroll-arrow-btn"
        aria-label="Défiler vers la section suivante"
        style="position:relative;bottom:auto;left:auto;transform:none;display:flex;flex-direction:column;align-items:center;gap:.5rem;padding-bottom:2.5rem;opacity:0;animation:fadeUpCenter .8s 1.3s ease forwards;text-decoration:none;cursor:pointer;">
        <div class="arrow-line" aria-hidden="true"></div>
        <span style="font-size:.7rem;letter-spacing:.22em;text-transform:uppercase;color:var(--muted);transition:color .3s;" class="explorer-label">Explorer</span>
    </a>
    </section>

    <!-- ═══ SECTION 2 — HERO ACCROCHE ═══ -->
     <section
        class="accroche"
        id="accroche"
        aria-label="Message d'accroche — Il arrive un moment où survivre ne suffit plus">

        <div class="accroche-blob blob1" aria-hidden="true"></div>
        <div class="accroche-blob blob2" aria-hidden="true"></div>
        <div class="accroche-stars" aria-hidden="true"></div>

        <div class="accroche-inner">

            <!-- Gauche -->
            <div class="accroche-left">

                <div class="accroche-badge">
                    <div class="accroche-dot"></div>
                    <span class="accroche-badge-text">✦ Traversée · Pas un programme</span>
                </div>

                <h2 class="accroche-title">
                    Il arrive un moment<br>
                    où <em>survivre</em>
                    ne suffit <span>plus.</span>
                </h2>

                <p class="accroche-sub">
                    Tu avances encore. Tu assumes encore. Tu tiens encore.<br>
                    Mais au fond, tu sens que quelque chose doit changer.<br>
                    Renaît-Sens ouvre un espace humain, profond et vrai.
                </p>

                <div class="accroche-actions">
                    <a href="#form" class="btn-gold">✦ Recevoir ma Carte de Traversée</a>
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

            <!-- Droite -->
            <div class="accroche-right">
                <div class="accroche-card">
                    <div class="accroche-figure">
                        <div class="accroche-glow"></div>
                        <div class="accroche-circle">
                            <div class="accroche-symbol">⟁</div>
                            <div class="accroche-label">Les Sentinelles<br>sont là</div>
                        </div>
                    </div>
                    <div class="accroche-card-text">
                        <div class="accroche-brand">Renaît-Sens</div>
                        <div class="accroche-tagline">Une traversée pour les Nomades<br>qui arrivent à un seuil.</div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ═══ RESONANCE ═══ -->
    <section class="section resonance" id="resonance" aria-label="Résonance — Ce que tu traverses peut-être">
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
    <section class="section reasons" id="reasons" aria-label="3 raisons de faire ce premier pas">
    <div class="container">
        <div class="reveal fu">
        <span class="sec-label" style="text-align:center;display:block;">✦ Pourquoi Renaît-Sens</span>
        <h2 class="sec-title" style="color:var(--white);">3 raisons de faire<br><em>ce premier pas</em></h2>
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
    <section class="section steps-section" id="steps" aria-label="Comment ça se passe — 3 étapes simples">
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
    <section class="section offer-section" id="offer" aria-label="Offres — Carte de Traversée et Diagnostic Sahara">
    <div class="container">
        <div class="offer-header reveal fu">
        <span class="sec-label" style="text-align:center;display:block;">✦ Ce que tu reçois aujourd'hui</span>
        <h2 class="sec-title" style="color:var(--white);">Choisis ta première<br><em>porte d'entrée</em></h2>
        <p class="sec-text">Un seul but : te donner un premier espace de clarté.</p>
        </div>

        <div class="offer-grid">
        <div class="offer-card primary reveal fl d2">
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

        {{-- <div class="offer-card secondary reveal fr d2">
            <div class="offer-num">02</div>
            <div class="offer-title">Le Diagnostic Sahara</div>
            <ul class="offer-items">
            <li>Poser ce que tu vis avec clarté</li>
            <li>Mettre des mots justes sur ta situation</li>
            <li>Sentir si un vrai passage s'ouvre pour toi</li>
            <li>Un échange humain, sans pression</li>
            </ul>
            <a href="#form" class="btn-ghost" style="width:100%;justify-content:center;">Je réserve mon Diagnostic ›</a>
        </div> --}}
        </div>
    </div>
    </section>

    <!-- ═══ FOR WHO ═══ -->
    <section class="section for-who" id="for-who" aria-label="Pour qui est Renaît-Sens et pour qui ce n'est pas fait">
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
    <section class="section objections" id="trust" aria-label="Réponses aux questions et objections fréquentes">
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

    <!-- ═══ VISION ═══ -->
    <section class="section vision">
    <div class="container">
        <div class="reveal fu">
        <span class="sec-label" style="text-align:center;display:block;">✦ La vision</span>
        <h2 class="sec-title">Il ne s'agit pas de fuir.<br><em>Il s'agit d'entrer dans un passage.</em></h2>
        </div>

        <div class="vis-grid reveal fu d2">
        <div class="vis-col less">
            <div class="vis-col-head">— Moins</div>
            <div class="vis-item">de bruit</div>
            <div class="vis-item">de façade</div>
            <div class="vis-item">de dispersion</div>
        </div>
        <div class="vis-col more">
            <div class="vis-col-head">+ Plus</div>
            <div class="vis-item">de vérité</div>
            <div class="vis-item">de présence</div>
            <div class="vis-item">de sens</div>
        </div>
        </div>

        <p class="vis-cta reveal fu d3">
        Renaît-Sens est une invitation à cesser de survivre en automatique… pour recommencer à habiter ta vie autrement.
        </p>

        <div class="reveal fu d4">
        <a href="#form" class="btn-gold" style="display:inline-flex;">J'ouvre ma traversée ›</a>
        </div>
    </div>
    </section>

    <!-- ═══ FOUNDERS ═══ -->
    <section class="section founders" id="founders" aria-label="Offre de lancement — Les 50 Nomades Fondateurs">
    <div class="container">
        <div class="founders-inner">
        <div class="founders-text reveal fl">
            <span class="sec-label">✦ Offre de lancement</span>
            <h2 class="sec-title" style="color:var(--white);">Les 50 Nomades<br><em>Fondateurs</em></h2>
            <p class="sec-text">Les 50 premiers à rejoindre Renaît-Sens bénéficieront d'un Passage Fondateur à part entière. Une place rare. Une entrée à part.</p>

            <div class="founders-counter">
            <div class="counter-box">
                <div class="counter-num">50</div>
                <div class="counter-lbl">Places totales</div>
            </div>
            <div class="counter-box">
                <div class="counter-num">1</div>
                <div class="counter-lbl">Seul premier pas</div>
            </div>
            <div class="counter-box">
                <div class="counter-num">∞</div>
                <div class="counter-lbl">Accès prioritaires</div>
            </div>
            <div class="counter-box">
                <div class="counter-num">0€</div>
                <div class="counter-lbl">Pour commencer</div>
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
        <h2 class="sec-title" style="margin:0 auto 1.5rem;">N'ignore pas<br><em>cet appel.</em></h2>
        <p class="sec-text">Parfois, une vie ne bascule pas dans le bruit. Elle bascule dans un instant de lucidité. Dans une porte que l'on accepte enfin d'ouvrir. Dans un premier pas.</p>
        <div class="cta-btns">
            <a href="#form" class="btn-gold">✦ Je fais mon premier pas</a>
            <a href="#form" class="btn-ghost">Je réserve mon Diagnostic Sahara ›</a>
        </div>
        <div class="cta-sign">Parce qu'il arrive un moment où survivre ne suffit plus.</div>
        </div>
    </div>
    </section>

    <!-- ═══ FORM ═══ -->
    <x-form/>

    <!-- ═══ FOOTER ═══ -->
    <footer aria-label="Pied de page Renaît-Sens">
    <div class="footer-logo">Renaît-Sens</div>
    <div class="footer-tag">Parce qu'il arrive un moment où survivre ne suffit plus.</div>
    <div class="footer-copy">© 2025 Renaît-Sens</div>
    </footer>
@endsection

@push('scripts')
    @vite('resources/js/index.js')
@endpush