<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partages extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_vente',
        'achat',
        'vente',
        'gain_brut',
        'remise_pourcentage',
        'remise_in',
        'remise_out',
        'transport',
        'gain',
        'depense',
        'agent',
        'admin',
        'entreprise',
        'valide',
    ];
}
