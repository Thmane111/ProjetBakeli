<?php

namespace App\Models;
use App\Models\Categorie;
use App\Models\Icon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sous_Categorie extends Model
{
    public function Categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function icon()
    {
        return $this->belongsTo(icon::class);
    }
}
?>
