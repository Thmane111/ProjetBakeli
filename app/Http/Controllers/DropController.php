<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie;
use App\Models\sous_categorie;
use Illuminate\Support\Facades\DB;

class DropController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
       
    }

    /**
     * return states list.
     *
     * @return json
     */
    public function getStates(Request $request)
    {
        $states=sous_categorie::all()->where('categorie_id','=',2);


        if (count($states) > 0) {
            return response()->json($states);
        }
    }
}
