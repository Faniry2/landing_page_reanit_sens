<?php

namespace App\Services;

use App\Models\Inscription;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BrevoService
{
    private string $apiKey;
    private string $baseUrl = 'https://api.brevo.com/v3';

    public function __construct()
    {
        $apiKey = config('brevo.api_key');

        if (empty($apiKey)) {
            throw new \RuntimeException(
                'BREVO_API_KEY manquante. Ajoute-la dans .env puis : php artisan config:clear'
            );
        }

        $this->apiKey = $apiKey;
    }

    // ── Envoie l'email de confirmation au Nomade ──────────────
    public function envoyerConfirmation(Inscription $inscription): bool
    {
        $payload = [
            'to' => [
                [
                    'email' => $inscription->email,
                    'name'  => $inscription->prenom,
                ],
            ],
            'subject'     => "✦ {$inscription->prenom}, ta Carte de Traversée Personnelle t'attend",
            'htmlContent' => $this->buildConfirmationHtml($inscription),
            'replyTo' => [
                'email' => config('brevo.reply_to'),
                'name'  => 'Renaît-Sens',
            ],
        ];

        return $this->sendTransactional($payload, "confirmation_{$inscription->type}", $inscription->id);
    }

    // ── Notifie l'équipe Renaît-Sens d'une nouvelle inscription ──
    public function notifierAdmin(Inscription $inscription): bool
    {
        $adminEmail = config('brevo.admin_email');

        if (! $adminEmail) {
            return false;
        }

        $payload = [
            'to' => [['email' => $adminEmail, 'name' => 'Renaît-Sens Admin']],
            'sender' => [
                'email' => config('brevo.sender_email'),
                'name'  => 'Renaît-Sens Système',
            ],
            'subject' => "✦ Nouvelle inscription — {$inscription->label_type} — {$inscription->prenom}",
            'htmlContent' => $this->buildAdminHtml($inscription),
        ];

        return $this->sendTransactional($payload, 'notification_admin', $inscription->id);
    }

    // ── Ajoute le contact à la liste Brevo correspondante ────────
    public function ajouterContact(Inscription $inscription): bool
    {
        $listId = match ($inscription->type) {
            'carte_traversee'   => config('brevo.list_carte'),
            'diagnostic_sahara' => config('brevo.list_diagnostic'),
            'fondateur'         => config('brevo.list_fondateur'),
            default             => config('brevo.list_carte'),
        };

        $payload = [
            'email'          => $inscription->email,
            'updateEnabled'  => true,
            'listIds'        => [(int) $listId],
            'attributes'     => [
                'PRENOM'     => $inscription->prenom,
                'TELEPHONE'  => $inscription->telephone ?? '',
                'TYPE'       => $inscription->label_type,
                'SOURCE'     => $inscription->source ?? 'landing_page',
            ],
        ];

        try {
            $response = Http::withHeaders($this->headers())
                ->post("{$this->baseUrl}/contacts", $payload);

            if ($response->successful() || $response->status() === 204) {
                Log::info("Brevo contact ajouté", ['email' => $inscription->email, 'list' => $listId]);
                return true;
            }

            Log::warning("Brevo contact échoué", [
                'status'  => $response->status(),
                'body'    => $response->json(),
                'email'   => $inscription->email,
            ]);
            return false;

        } catch (\Exception $e) {
            Log::error("Brevo contact exception", ['message' => $e->getMessage()]);
            return false;
        }
    }

    // ── Envoi transactionnel générique ───────────────────────────
    private function sendTransactional(array $payload, string $context, int $inscriptionId): bool
    {
        // Ajoute le sender par défaut si absent
        if (! isset($payload['sender'])) {
            $payload['sender'] = [
                'email' => config('brevo.sender_email'),
                'name'  => 'Renaît-Sens',
            ];
        }

        try {
            $response = Http::withHeaders($this->headers())
                ->post("{$this->baseUrl}/smtp/email", $payload);

            if ($response->successful()) {
                Log::info("Brevo email envoyé [{$context}]", [
                    'inscription_id' => $inscriptionId,
                    'message_id'     => $response->json('messageId'),
                ]);
                return true;
            }

            Log::warning("Brevo email échoué [{$context}]", [
                'inscription_id' => $inscriptionId,
                'status'         => $response->status(),
                'body'           => $response->json(),
            ]);
            return false;

        } catch (\Exception $e) {
            Log::error("Brevo exception [{$context}]", [
                'inscription_id' => $inscriptionId,
                'message'        => $e->getMessage(),
            ]);
            return false;
        }
    }

    // ── Email unique : confirmation + Carte de Traversée + Calendly ──
    private function buildConfirmationHtml(Inscription $inscription): string
    {
        $prenom      = htmlspecialchars($inscription->prenom);
        $url         = rtrim(config('app.url'), '/');
        $senderEmail = config('brevo.sender_email', 'contact@renait-sens90.com');
        $calendlyUrl = config('brevo.calendly_url', 'https://calendly.com/renait-sens/carte-traversee');

        // Bloc central adapté selon le type
        $typeLabel = htmlspecialchars($inscription->label_type);

        $introMessage = match ($inscription->type) {
            'diagnostic_sahara' => "Nous allons te contacter très prochainement pour fixer ton <strong style='color:#FAFAF7;font-weight:400;'>Diagnostic Sahara</strong>. En attendant, voici ta Carte de Traversée.",
            'fondateur'         => "Tu fais partie des <strong style='color:#E8C97A;font-weight:400;'>50 Nomades Fondateurs</strong>. Une place rare. Une entrée à part. Voici ta Carte de Traversée pour commencer.",
            default             => "Tu viens de faire ton premier pas avec Renaît-Sens, bravo à toi ! 🎉",
        };

        $ctaLabel = match ($inscription->type) {
            'diagnostic_sahara' => '✦ &nbsp; Réserver ma session Diagnostic',
            'fondateur'         => '✦ &nbsp; Réserver ma session Fondateur',
            default             => '✦ &nbsp; Réserve ta session offerte avec la Sentinelle.',
        };

        return <<<HTML
        <!DOCTYPE html>
        <html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ta Carte de Traversée Personnelle — Renaît-Sens</title>
        </head>
        <body style="margin:0;padding:0;background-color:#0C0C0C;-webkit-font-smoothing:antialiased;">

        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#0C0C0C;padding:48px 16px;">
        <tr><td align="center">

        <table role="presentation" width="580" cellpadding="0" cellspacing="0" border="0"
            style="max-width:580px;width:100%;background-color:#141414;border-radius:20px;overflow:hidden;border:1px solid #2A2218;">

            <!-- BARRE DORÉE TOP -->
            <tr>
            <td style="height:3px;background:linear-gradient(90deg,#8B6914,#C9A84C,#E8C97A,#C9A84C,#8B6914);"></td>
            </tr>

            <!-- HEADER -->
            <tr>
            <td style="padding:44px 48px 36px;background-color:#0D0D0D;text-align:center;border-bottom:1px solid #1C1810;">
                <div style="font-family:Georgia,serif;font-size:10px;letter-spacing:6px;text-transform:uppercase;color:#8B6914;margin-bottom:20px;">
                ✦ &nbsp; R E N A Î T - S E N S &nbsp; ✦
                </div>
                <div style="font-family:Georgia,'Times New Roman',serif;font-size:13px;letter-spacing:3px;text-transform:uppercase;color:#C9A84C;margin-bottom:16px;">
               
                </div>
                <div style="font-family:Georgia,'Times New Roman',serif;font-size:36px;font-weight:300;color:#FAFAF7;line-height:1.15;margin-bottom:6px;">
                La Carte de Traversée
                </div>
                <div style="font-family:Georgia,'Times New Roman',serif;font-size:36px;font-weight:300;color:#C9A84C;font-style:italic;line-height:1.15;">
                Personnelle
                </div>
            </td>
            </tr>

            <!-- SALUTATION -->
            <tr>
            <td style="padding:40px 48px 0;">
                <p style="font-family:Georgia,'Times New Roman',serif;font-size:22px;color:#FAFAF7;margin:0 0 20px;line-height:1.5;">
                Bonjour <span style="color:#E8C97A;font-style:italic;">{$prenom}</span>,
                </p>
                <p style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#A09880;line-height:1.9;margin:0 0 28px;">
                {$introMessage}
                </p>
            </td>
            </tr>

            <!-- DIVIDER -->
            <tr>
            <td style="padding:0 48px 36px;">
                <div style="height:1px;background:linear-gradient(90deg,transparent,rgba(201,168,76,.4),transparent);"></div>
            </td>
            </tr>

            <!-- QU'EST-CE QUE LA CARTE -->
            <tr>
            <td style="padding:0 48px 0;">
                <div style="font-family:Georgia,serif;font-size:10px;letter-spacing:4px;text-transform:uppercase;color:#C9A84C;margin-bottom:20px;">
                Que signifie la carte de traversée ?
                </div>

                <!-- Bloc 1 — version simple -->
                <!-- <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                style="background-color:#1A1610;border:1px solid #2A2218;border-radius:14px;margin-bottom:12px;">
                <tr>
                    <td style="padding:22px 26px 22px 22px;">
                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                        <td width="36" valign="top" style="padding-right:16px;">
                            <div style="width:36px;height:36px;background-color:#0F0C08;border:1px solid #2A2218;border-radius:8px;text-align:center;line-height:36px;font-size:16px;">🧭</div>
                        </td>
                        <td valign="top">
                            <div style="font-family:Georgia,serif;font-size:11px;letter-spacing:2px;text-transform:uppercase;color:#8B6914;margin-bottom:8px;">En clair</div>
                            <p style="font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#C8C0A8;line-height:1.75;margin:0;">
                            Un mini diagnostic personnel de <strong style="color:#FAFAF7;font-weight:400;">15 minutes</strong> pour savoir où tu en es, ce que tu traverses, et vers quoi tu dois aller.
                            </p>
                        </td>
                        </tr>
                    </table>
                    </td>
                </tr>
                </table> -->

                <!-- Bloc 2 — version profonde -->
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                style="background-color:#1A1610;border:1px solid #2A2218;border-radius:14px;margin-bottom:12px;">
                <tr>
                    <td style="padding:22px 26px 22px 22px;">
                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                        <td width="36" valign="top" style="padding-right:16px;">
                            <div style="width:36px;height:36px;background-color:#0F0C08;border:1px solid #2A2218;border-radius:8px;text-align:center;line-height:36px;font-size:16px;">🧭</div>
                        </td>
                        <td valign="top">
                            <div style="font-family:Georgia,serif;font-size:11px;letter-spacing:2px;text-transform:uppercase;color:#8B6914;margin-bottom:8px;">Outil de clarification</div>
                            <p style="font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#C8C0A8;line-height:1.75;margin:0;">
                            Un premier repère offert pour t'aider à comprendre <strong style="color:#FAFAF7;font-weight:400;">ce que tu traverses</strong>, ce qui te bloque, et la direction qui cherche à émerger en toi.
                            </p>
                        </td>
                        </tr>
                    </table>
                    </td>
                </tr>
                </table>

                <!-- Bloc 3 — version symbolique -->
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
                style="background-color:#0F0C08;border:1px solid #3A2E10;border-radius:14px;margin-bottom:36px;">
                <tr>
                    <td style="padding:26px 26px 26px 22px;">
                    <div style="font-family:Georgia,serif;font-size:11px;letter-spacing:3px;text-transform:uppercase;color:#C9A84C;margin-bottom:14px;">✦ &nbsp; Lecture symbolique</div>
                    <p style="font-family:Georgia,'Times New Roman',serif;font-size:16px;color:#E8C97A;line-height:1.9;margin:0;font-style:italic;">
                        "La Carte de Traversée Personnelle est une lecture symbolique de ton passage actuel : elle révèle le désert que tu traverses, la leçon qu'il porte, et l'horizon qui t'appelle."
                    </p>
                    </td>
                </tr>
                </table>

            </td>
            </tr>

            <!-- DIVIDER -->
            <tr>
            <td style="padding:0 48px 0;">
                <div style="height:1px;background:linear-gradient(90deg,transparent,rgba(201,168,76,.4),transparent);"></div>
            </td>
            </tr>

            <!-- CTA CALENDLY -->
            <tr>
            <td style="padding:40px 48px;text-align:center;">
                <div style="font-family:Georgia,serif;font-size:10px;letter-spacing:4px;text-transform:uppercase;color:#C9A84C;margin-bottom:16px;">
                La prochaine étape
                </div>
                <p style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#A09880;line-height:1.8;margin:0 0 6px;">
                Ta session se fait avec la <strong style="color:#FAFAF7;font-weight:400;">Sentinelle</strong>.
                </p>
                <p style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#A09880;line-height:1.8;margin:0 0 32px;">
                Choisis le créneau qui te convient ci-dessous.
                </p>
                <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:0 auto 14px;">
                <tr>
                    <td style="background-color:#C9A84C;border-radius:50px;padding:18px 44px;">
                    <a href="{$calendlyUrl}" target="_blank"
                        style="font-family:Arial,Helvetica,sans-serif;font-size:15px;font-weight:700;color:#0C0C0C;text-decoration:none;letter-spacing:1px;text-transform:uppercase;white-space:nowrap;">
                        {$ctaLabel}
                    </a>
                    </td>
                </tr>
                </table>
                <p style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#888880;margin:0;letter-spacing:1px;">
                Offert &nbsp;·&nbsp; Sans engagement &nbsp;·&nbsp; En ligne
                </p>
            </td>
            </tr>

            <!-- CITATION -->
            <tr>
            <td style="padding:0 48px 40px;text-align:center;">
                <div style="height:1px;background:linear-gradient(90deg,transparent,rgba(201,168,76,.3),transparent);margin-bottom:32px;"></div>
                <p style="font-family:Georgia,'Times New Roman',serif;font-size:16px;font-style:italic;color:#C8C0A8;line-height:1.9;margin:0;">
                "Il arrive un moment où survivre ne suffit plus.<br>Et où renaître devient nécessaire."
                </p>
            </td>
            </tr>

            <!-- BARRE DORÉE BOTTOM -->
            <tr>
            <td style="height:1px;background:linear-gradient(90deg,#8B6914,#C9A84C,#E8C97A,#C9A84C,#8B6914);"></td>
            </tr>

            <!-- FOOTER -->
            <tr>
            <td style="padding:24px 48px;background-color:#0A0A0A;text-align:center;">
                <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#888880;margin:0 0 6px;line-height:1.7;letter-spacing:0.3px;">
                Tu reçois cet email car tu as fait une demande pour réserver un appel avec le Sentinelle.
                <a href="{$url}" style="color:#C9A84C;text-decoration:none;">{$url}</a>
                </p>
                <p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#888880;margin:0;letter-spacing:0.3px;">
                Questions ? <a href="mailto:contact@renait-sens90.com" style="color:#C9A84C;text-decoration:none;">contact@renait-sens90.com</a>
                </p>
            </td>
            </tr>

        </table>

        </td></tr>
        </table>

        </body>
        </html>
        HTML;
            }

            // ── HTML email admin ─────────────────────────────────────────
            private function buildAdminHtml(Inscription $inscription): string
            {
                $tel = $inscription->telephone ?? '<em>non renseigné</em>';
                $date = $inscription->created_at->format('d/m/Y à H:i');

                return <<<HTML
                <!DOCTYPE html>
                <html lang="fr">
                <head><meta charset="UTF-8"></head>
                <body style="font-family: Georgia, serif; background: #0C0C0C; color: #FAFAF7; padding: 40px; margin: 0;">
                <div style="max-width: 560px; margin: 0 auto; background: #1A1A1A; border: 1px solid rgba(201,168,76,.3); border-radius: 12px; overflow: hidden;">
                    <div style="background: linear-gradient(135deg, rgba(201,168,76,.15), rgba(201,168,76,.05)); padding: 32px; border-bottom: 1px solid rgba(201,168,76,.2);">
                    <div style="font-size: 11px; letter-spacing: .3em; text-transform: uppercase; color: #C9A84C; margin-bottom: 8px;">✦ Nouvelle Inscription</div>
                    <div style="font-family: 'Georgia', serif; font-size: 22px; font-weight: 300; color: #FAFAF7;">Renaît-Sens</div>
                    </div>
                    <div style="padding: 32px;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                        <td style="padding: 10px 0; font-size: 12px; letter-spacing: .1em; text-transform: uppercase; color: #888880; width: 40%; border-bottom: 1px solid rgba(255,255,255,.06);">Prénom</td>
                        <td style="padding: 10px 0; font-size: 16px; color: #FAFAF7; border-bottom: 1px solid rgba(255,255,255,.06);">{$inscription->prenom}</td>
                        </tr>
                        <tr>
                        <td style="padding: 10px 0; font-size: 12px; letter-spacing: .1em; text-transform: uppercase; color: #888880; border-bottom: 1px solid rgba(255,255,255,.06);">Email</td>
                        <td style="padding: 10px 0; font-size: 16px; color: #C9A84C; border-bottom: 1px solid rgba(255,255,255,.06);">{$inscription->email}</td>
                        </tr>
                        <tr>
                        <td style="padding: 10px 0; font-size: 12px; letter-spacing: .1em; text-transform: uppercase; color: #888880; border-bottom: 1px solid rgba(255,255,255,.06);">Téléphone</td>
                        <td style="padding: 10px 0; font-size: 16px; color: #FAFAF7; border-bottom: 1px solid rgba(255,255,255,.06);">{$tel}</td>
                        </tr>
                        <tr>
                        
                        <td style="padding: 10px 0; border-bottom: 1px solid rgba(255,255,255,.06);">
                            <span style="background: rgba(201,168,76,.15); border: 1px solid rgba(201,168,76,.3); border-radius: 50px; padding: 4px 12px; font-size: 13px; color: #E8C97A;">{$inscription->label_type}</span>
                        </td>
                        </tr>
                        <tr>
                        <td style="padding: 10px 0; font-size: 12px; letter-spacing: .1em; text-transform: uppercase; color: #888880;">Date</td>
                        <td style="padding: 10px 0; font-size: 14px; color: #888880;">{$date}</td>
                        </tr>
                    </table>
                    </div>
                </div>
                </body>
                </html>
        HTML;
    }

    private function headers(): array
    {
        return [
            'api-key'      => $this->apiKey,
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
        ];
    }
}