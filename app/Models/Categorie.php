<?php

namespace App\Models;
use App\Models\NavigueMenu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function naviguemenu()
    {
        return $this->belongsTo(NavigueMenu::class);
    }


}
?>
