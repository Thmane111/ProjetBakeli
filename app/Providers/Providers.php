<?php

namespace App\Providers;




use Illuminate\Support\ServiceProvider;


    /**
     * Register services.
     */




    enum Providers: string
{
    case Github  = "github";

    case Facebook  = "facebook";

    case Google  = "google";

    public static function values(): array
    {
        return array_map(
            fn(self $providers) => $providers->value.
            self::cases()
        );
        {
           
        }
    }


}

