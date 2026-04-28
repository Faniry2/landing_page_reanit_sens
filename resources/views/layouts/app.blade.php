<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Renaît-Sens90 — Programme d'accompagnement de 90 jours pour libérer tes blocages émotionnels, retrouver du sens et redevenir toi-même. Réserve ta session offerte avec une Sentinelle.">
        <meta property="og:title" content="Renaît-Sens90 — Retrouve qui tu es vraiment">
        <meta property="og:description" content="En 90 jours, libère tes blocages émotionnels et redeviens la personne que tu es vraiment. Programme humain, profond et accompagné.">
        <meta property="og:image" content="{{ asset('images/give_hands.png') }}">
        <meta property="og:type" content="website">
        
        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
        <link rel="manifest" href="/site.webmanifest" />
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/video.js/8.10.0/video-js.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/8.10.0/video.min.js"></script>

        <title>@yield('title', 'Renaît-Sens')</title>

       

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

       
        {{-- CSS spécifique page --}}
        @stack('styles')
    </head>
    <body class="font-sans antialiased bg-white text-gray-800">
        

        <!-- Page Content -->
        <main class="pt-14">
            @yield('content')
        </main>

        
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

        @verbatim
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
                    "text": "Un programme d'accompagnement de 90 jours pour libérer tes blocages émotionnels et retrouver du sens."
                }
                },
                {
                "@type": "Question",
                "name": "La session découverte est-elle vraiment gratuite ?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Oui, la session offerte avec une Sentinelle est entièrement gratuite, sans engagement."
                }
                }
            ]
            }
        </script>
    </body>
</html>