<?php

// config/espocrm.php

return [

    // URL de ton instance EspoCRM
    'url'     => env('ESPOCRM_URL', 'https://crm.renait-sens90.com'),

    // Clé API — génère-la dans EspoCRM :
    // Administration → API Keys → Generate API Key
    'api_key' => env('ESPOCRM_API_KEY'),

];
