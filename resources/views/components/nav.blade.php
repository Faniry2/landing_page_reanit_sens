<nav aria-label="Navigation principale">

    {{-- Logo avec image --}}
    <a class="logo" href="/" aria-label="Renaît-Sens — Retour à l'accueil">
        <img
            src="{{ asset('images/logo-renait-sens-removebg-preview.png') }}"
            alt="Logo Renaît-Sens — Phénix doré"
            class="logo-img"
               width="190"
            height="200">
        <span class="logo-text">Renaît-Sens<span class="logo-num">90</span></span>
    </a>

    {{-- Desktop --}}
    <ul class="nav-links" role="list">
        <li><a href="#resonance">Pour qui</a></li>
        <li><a href="#offer">Ce que tu reçois</a></li>
        <li><a href="#steps">Le chemin</a></li>
        <li><a href="#founders">Fondateurs</a></li>
    </ul>
    <a href="#form" class="nav-btn">Je commence ›</a>

    {{-- Burger (visible mobile uniquement) --}}
    <button
        id="burger"
        class="burger"
        aria-label="Ouvrir le menu"
        aria-expanded="false"
        aria-controls="mobileMenu">
        <span class="burger-line"></span>
        <span class="burger-line"></span>
        <span class="burger-line"></span>
    </button>
</nav>

{{-- ═══ MOBILE MENU OVERLAY ═══ --}}
<div id="mobileMenu" class="mobile-menu" role="dialog" aria-label="Menu principal" aria-modal="true">

    {{-- Logo dans le menu mobile --}}
    <div class="mobile-logo">
        <img
            src="{{ asset('images/logo-renait-sens-removebg-preview.png') }}"
            alt="Logo Renaît-Sens"
            width="56"
            height="56"
            style="filter:drop-shadow(0 0 12px rgba(201,168,76,.4));">
    </div>

    <a href="#resonance">Pour qui</a>
    <div class="mobile-divider"></div>
    <a href="#offer">Ce que tu reçois</a>
    <div class="mobile-divider"></div>
    <a href="#steps">Le chemin</a>
    <div class="mobile-divider"></div>
    <a href="#founders">Fondateurs</a>
    <div class="mobile-divider"></div>
    <a href="#form" class="mobile-cta">✦ Je commence</a>
</div>