<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Livraisons;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'adresse_id',
        'numero_id',
        'name',
        'postnom',
        'prenom',
        'sexe',
        'contact_whatsapp',
        'etat_civil',
        'contact',
        'email',
        'valide',
        'password',
        'code_reset',
        'liens_reset_password',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Roles');
    }

    public function adresse()
    {
        return $this->belongsTo('App\Models\Adresses');
    }

    public function image()
    {
        return $this->hasOne('App\Models\Images');
    }

    public function numero()
    {
        return $this->belongsTo('App\Models\Numeros', 'numero_id', 'id');
    }

    public function livraisons()
    {
        return $this->hasMany('App\Models\Livraisons');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
