<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Articles;

class Pours extends Model
{
    use HasFactory;

    protected $fillable = [
        'pour',
    ];

    public function articles()
    {
        return $this->hasMany('App\Models\Articles');
    }
}
