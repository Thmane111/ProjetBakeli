<?php

namespace App\Models;

use App\Models\sous_categorie;
use App\Models\User;
use App\Models\categorie;
use App\Models\ImageProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Product extends Model
{
    use Notifiable;

    public function category()
    {
        return $this->belongsTo(categorie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function sous__categorie()
    {
        return $this->belongsTo(sous_categorie::class);
    }
    public function images()
    {
        return $this->hasMany(ImageProduct::class);
    }


}

?>
