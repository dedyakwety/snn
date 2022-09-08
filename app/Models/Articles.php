<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pours;
use App\Models\Images;
use App\Models\Categories;
use App\Models\Modeles;
use App\Models\Commandes;
use App\Models\Boutiques;

class Articles extends Model
{
    use HasFactory;

    protected $fillable = [
        'boutique_id',
        'pour_id',
        'categorie_id',
        'modele_id',
        'prix',
        'commentaire',
        'quantite',
        'vente',
        'valide',
    ];

    public function boutique()
    {
        return $this->belongsTo('App\Models\Boutiques', 'boutique_id', 'id');
    }

    public function pour()
    {
        return $this->belongsTo('App\Models\Pours', 'pour_id', 'id');
    }

    public function image()
    {
        return $this->hasOne('App\Models\Images', 'article_id', 'id');
    }

    public function categorie()
    {
        return $this->belongsTo('App\Models\Categories', 'categorie_id', 'id');
    }

    public function modele()
    {
        return $this->belongsTo('App\Models\Modeles', 'modele_id', 'id');
    }

    public function commandes()
    {
        return $this->hasMany('App\Models\Commandes');
    }
}
