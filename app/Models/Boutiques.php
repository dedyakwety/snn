<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Articles;

class Boutiques extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'contact_whatsapp',
        'articles',
    ];

    public function articles()
    {
        return $this->hasMany('App\Models\Articles', 'boutique_id', 'id');
    }
}
