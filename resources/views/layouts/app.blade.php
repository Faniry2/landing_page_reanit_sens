<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    {{-- ✅ viewport-fit=cover pour l'encoche iPhone --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Renaît-Sens90 — Programme d'accompagnement de 90 jours pour libérer tes blocages émotionnels, retrouver du sens et redevenir toi-même. Réserve ta session offerte avec une Sentinelle.">
    <meta property="og:title" content="Renaît-Sens90 — Retrouve qui tu es vraiment">
    <meta property="og:description" content="En 90 jours, libère tes blocages émotionnels et redeviens la personne que tu es vraiment. Programme humain, profond et accompagné.">
    <meta property="og:image" content="{{ asset('images/give_hands.png') }}">
    <meta property="og:type" content="website">

    {{-- Favicons --}}
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- ✅ Video.js CSS seulement dans le head (pas le JS) --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/video.js/8.10.0/video-js.min.css" rel="stylesheet">

    <title>@yield('title', 'Renaît-Sens90')</title>

    {{-- CSS Vite --}}
    @vite(['resources/css/app.css', 'resources/css/index.css', 'resources/js/app.js'])

    {{-- CSS spécifique page --}}
    @stack('styles')
</head>
<body class="font-sans antialiased">

    {{-- ✅ Pas de pt-14 Tailwind — la nav fixed est gérée en CSS avec --nav-h --}}
    <main>
        @yield('content')
    </main>

    {{-- ✅ Video.js JS chargé en fin de body, pas dans le head --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/8.10.0/video.min.js" defer></script>

    @stack('scripts')

    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Course",
        "name": "Renaît-Sens90",
        "description": "Programme d'accompagnement de 90 jours pour libérer tes blocages émotionnels et retrouver du sens.",
        "provider": {
            "@type": "Organization",
            "name": "Renaît-Sens"
        },
        "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "EUR",
            "description": "Session découverte offerte"
        },
        "timeRequired": "P90D",
        "inLanguage": "fr"
    }
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "Qu'est-ce que Renaît-Sens90 ?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Un programme d'accompagnement de 90 jours pour libérer tes blocages émotionnels."
                }
            },
            {
                "@type": "Question",
                "name": "La session découverte est-elle vraiment gratuite ?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Oui, entièrement gratuite, sans engagement."
                }
            }
        ]
    }
    </script>
    @endverbatim

</body>
</html>
