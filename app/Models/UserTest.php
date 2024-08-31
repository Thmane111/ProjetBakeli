<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserTest extends Model
{
    use HasFactory;
    use HasApiTokens;
    protected $fillable = [
        'name',    
        'email',
        'password',
   

    ];
}
