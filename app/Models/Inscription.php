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
        'email',
        'telephone',
        'consent',
        'source',
        'email_envoye_at',
    ];

    protected $casts = [
        'consent'          => 'boolean',
        'email_envoye_at'  => 'datetime',
        'created_at'       => 'datetime',
        'updated_at'       => 'datetime',
    ];

   

}
