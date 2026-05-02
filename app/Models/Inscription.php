<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscription extends Model
{
    use HasFactory;

    protected $table = 'inscriptions';

    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'telephone',
        'whatsapp',
        'consent',
        'source',
        'email_envoye_at',
    ];

    protected $casts = [
        'consent'         => 'boolean',
        'email_envoye_at' => 'datetime',
        'created_at'      => 'datetime',
        'updated_at'      => 'datetime',
    ];

    // ── Scopes ──────────────────────────────────────────────
    // public function scopeCarteTraversee($query)
    // {
    //     return $query->where('type', 'carte_traversee');
    // }

    // public function scopeDiagnosticSahara($query)
    // {
    //     return $query->where('type', 'diagnostic_sahara');
    // }

    // public function scopeFondateurs($query)
    // {
    //     return $query->where('type', 'fondateur');
    // }

    // public function scopeEnAttente($query)
    // {
    //     return $query->where('statut', 'en_attente');
    // }

    // ── Accesseurs ──────────────────────────────────────────
   public function getLabelTypeAttribute(): string
{
    return 'Carte de Traversée Personnelle';
}

    public function getLabelStatutAttribute(): string
    {
        return match ($this->statut) {
            'en_attente' => 'En attente',
            'confirme'   => 'Confirmé',
            'contacte'   => 'Contacté',
            default      => $this->statut,
        };
    }

    // ── WhatsApp : utilise le tel si whatsapp non renseigné ──
    public function getWhatsappContactAttribute(): string
    {
        return $this->whatsapp ?? $this->telephone;
    }
}
