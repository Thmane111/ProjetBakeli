<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Membre extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'image',
        'email',
        'password',
        'role',
        'etat',
        'deletable',
    ];
  

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
