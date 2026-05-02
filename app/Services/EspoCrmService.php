<?php

namespace App\Services;

use App\Models\Inscription;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EspoCrmService
{
    private string $baseUrl;
    private string $apiKey;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('espocrm.url'), '/');
        $this->apiKey  = config('espocrm.api_key');

        if (empty($this->apiKey)) {
            throw new \RuntimeException(
                'ESPOCRM_API_KEY manquante. Ajoute-la dans .env puis : php artisan config:clear'
            );
        }
    }

    // ── Crée un contact dans EspoCRM ─────────────────────────
    public function creerContact(Inscription $inscription): bool
    {
        // Sépare prénom et nom si possible (ici on met tout dans firstName)
        // Nettoie le numéro pour EspoCRM — garde uniquement + et chiffres
        $telephone = preg_replace('/[^+0-9]/', '', $inscription->telephone);
        $whatsapp  = $inscription->whatsapp
            ? preg_replace('/[^+0-9]/', '', $inscription->whatsapp)
            : null;

        $payload = [
            'firstName'    => $inscription->prenom,
            'lastName'     => $inscription->nom,
            'emailAddress' => $inscription->email,
            'phoneNumberData' => [
                [
                    'phoneNumber' => $telephone,
                    'primary'     => true,
                    'type'        => 'Mobile',
                ]
            ],
            'description'  => $this->buildDescription($inscription),
        ];

        // WhatsApp en second numéro si renseigné
        if ($whatsapp) {
            $payload['phoneNumberData'][] = [
                'phoneNumber' => $whatsapp,
                'primary'     => false,
                'type'        => 'Other',
            ];
        }

        try {
            $response = Http::withHeaders($this->headers())
                ->post("{$this->baseUrl}/api/v1/Contact", $payload);

            if ($response->successful()) {
                $contactId = $response->json('id');
                Log::info('EspoCRM contact créé', [
                    'contact_id'     => $contactId,
                    'inscription_id' => $inscription->id,
                    'email'          => $inscription->email,
                ]);
                return true;
            }

            Log::warning('EspoCRM contact échoué', [
                'status'         => $response->status(),
                'body'           => $response->json(),
                'inscription_id' => $inscription->id,
            ]);
            return false;

        } catch (\Exception $e) {
            Log::error('EspoCRM exception', [
                'message'        => $e->getMessage(),
                'inscription_id' => $inscription->id,
            ]);
            return false;
        }
    }

    // ── Vérifie si le contact existe déjà (par email) ────────
    public function contactExiste(string $email): bool
    {
        try {
            $response = Http::withHeaders($this->headers())
                ->get("{$this->baseUrl}/api/v1/Contact", [
                    'where' => [
                        [
                            'type'      => 'equals',
                            'attribute' => 'emailAddress',
                            'value'     => $email,
                        ]
                    ],
                    'maxSize' => 1,
                ]);

            if ($response->successful()) {
                return $response->json('total', 0) > 0;
            }

            return false;

        } catch (\Exception $e) {
            Log::error('EspoCRM vérification existence', ['message' => $e->getMessage()]);
            return false;
        }
    }

    // ── Description auto pour le contact ─────────────────────
    private function buildDescription(Inscription $inscription): string
    {
        $lines = [
            "Source : {$inscription->source}",
            "Type : {$inscription->label_type}",
            "Consent : " . ($inscription->consent ? 'Oui' : 'Non'),
            "Inscrit le : " . $inscription->created_at?->format('d/m/Y à H:i'),
        ];

        if ($inscription->whatsapp) {
            $lines[] = "WhatsApp : {$inscription->whatsapp}";
        }

        return implode("\n", $lines);
    }

    // ── Headers API Key EspoCRM ───────────────────────────────
    private function headers(): array
    {
        return [
            'X-Api-Key'    => $this->apiKey,
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
        ];
    }
}
