<?php

namespace App\Http\Controllers;

use App\Http\Requests\InscriptionRequest;
use App\Models\Inscription;
use App\Services\BrevoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;

class InscriptionController extends Controller
{
    public function __construct(private BrevoService $brevo) {}

    // ── POST /inscription ─────────────────────────────────────
    public function store(InscriptionRequest $request): JsonResponse|RedirectResponse
    {
        // Rate limiting : 3 tentatives par IP par heure
        $key = 'inscription:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            return $this->respond($request, false, [
                'message' => "Trop de tentatives. Réessaie dans {$seconds} secondes.",
            ], 429);
        }
        RateLimiter::hit($key, 3600);

        $data = $request->validated();

        // ── Vérifie si email déjà inscrit ──
        $existant = Inscription::where('email', $data['email'])->first();
        if ($existant) {
            return $this->respond($request, false, [
                'message' => 'Cette adresse email est déjà inscrite. Vérifie ta boîte mail !',
                'already_registered' => true,
            ], 422);
        }

        // ── Crée l'inscription ──
        try {
            $inscription = Inscription::create([
                'prenom'     => $data['prenom'],
                'email'      => $data['email'],
                'telephone'  => $data['telephone'] ?? null,
               
                'consent'    => $request->boolean('consent'),
                
                
                'source'     => $request->input('source', 'landing_page'),
            ]);
        } catch (\Exception $e) {
            Log::error('Inscription DB error', ['error' => $e->getMessage()]);
            
            return $this->respond($request, false, [
                'message' => 'Une erreur est survenue. Merci de réessayer.',
            ], 500);
        }

        // ── Brevo : email de confirmation + ajout contact + notif admin ──
        $emailOk = $this->brevo->envoyerConfirmation($inscription);
        $this->brevo->ajouterContact($inscription);
        $this->brevo->notifierAdmin($inscription);

        if ($emailOk) {
            $inscription->update(['email_envoye_at' => now()]);
        }

        Log::info('Nouvelle inscription', [
            'id'    => $inscription->id,
            'type'  => $inscription->type,
            'email' => $inscription->email,
        ]);

        return $this->respond($request, true, [
            'message' => "Merci {$inscription->prenom} ! Vérifie ta boîte mail.",
            'prenom'  => $inscription->prenom,
            'type'    => $inscription->label_type,
        ], 201);
    }

    // ── Répond en JSON ou redirect selon le type de requête ──
    private function respond(
        Request $request,
        bool $success,
        array $data,
        int $status = 200
    ): JsonResponse|RedirectResponse {
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(array_merge(['success' => $success], $data), $status);
        }

        if ($success) {
            return redirect()
                ->route('inscription.merci')
                ->with('prenom', $data['prenom'] ?? '')
                ->with('type', $data['type'] ?? '');
        }

        return redirect()
            ->back()
            ->withInput()
            ->with('error', $data['message'] ?? 'Une erreur est survenue.');
    }

    // ── GET /merci ─────────────────────────────────────────────
    public function merci(): \Illuminate\View\View
    {
        return view('inscription.merci', [
            'prenom' => session('prenom', 'Nomade'),
            'type'   => session('type', 'Carte de Traversée Personnelle'),
        ]);
    }
}
