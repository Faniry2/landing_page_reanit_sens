<?php

// config/brevo.php

return [

    'api_key'      => env('BREVO_API_KEY'),
    'sender_email' => env('BREVO_SENDER_EMAIL', 'contact@renait-sens90.com'),
    'sender_name'  => env('BREVO_SENDER_NAME', 'Renaît-Sens'),
    'reply_to'     => env('BREVO_REPLY_TO', 'contact@renait-sens90.com'),
    'admin_email'  => env('BREVO_ADMIN_EMAIL'),

    // Lien Calendly pour la Carte de Traversée (15 min)
    'calendly_url' => env('BREVO_CALENDLY_URL', 'https://calendly.com/renait-sens/carte-traversee'),

    // IDs listes contacts Brevo
    'list_carte'      => env('BREVO_LIST_CARTE', 1),
    'list_diagnostic' => env('BREVO_LIST_DIAGNOSTIC', 2),
    'list_fondateur'  => env('BREVO_LIST_FONDATEUR', 3),

];