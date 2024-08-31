<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        'api/registre', // Ajoutez ici l'URI de la route que vous souhaitez exclure
        'api/login', // Ajoutez ici l'URI de la route que vous souhaitez exclure
        'api/user/profile',
        'api/bagwelle/produit/ajoute',
    ];
}
