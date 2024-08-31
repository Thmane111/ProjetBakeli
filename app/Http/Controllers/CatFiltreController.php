<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;

class CatFiltreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Panel $panel): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panel $panel): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panel $panel): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panel $panel): RedirectResponse
    {
        //
    }

    public function show_cat(Request $request, $id)
    {

        if(empty($request->gorie_1)){

            $request->gorie_1=0;
        }

        if($request->gorie_2== " "){

            $request->gorie_2=0;
        }

        if($request->gorie_3== " "){

            $request->gorie_3=0;
        }

        if($request->ville_gorie_1== " "){

            $request->ville_gorie_1=" ";
        }

        if($request->ville_gorie_2== " "){

            $request->ville_gorie_2=" ";
        }

        if($request->ville_gorie_3== " "){

            $request->ville_gorie_3=" ";
        }

        switch($id){

            case '00':  $globe_cat=Product::all()->whereIn('sous__categorie_id',[$request->gorie_1,$request->gorie_2,$request->gorie_3])
            ->whereIn('ville',[$request->ville_gorie_1,$request->ville_gorie_2,$request->ville_gorie_3]
        ); break;
            case '1': $globe_cat=Product::all()->where('category_id','=',3); break;

            case '12': $globe_cat=Product::all()->where('sous__categorie_id','=',1); break;


            case '13': $globe_cat=Product::all()->where('sous__categorie_id','=',3); break;

            case '15': $globe_cat=Product::all()->where('sous__categorie_id','=',10,'or','sous__categorie_id','=',11); break;
            case '16': $globe_cat=Product::all()->where('sous__categorie_id','=',12); break;
            case '17': $globe_cat=Product::all()->where('sous__categorie_id','=',13); break;


        }
        return view('Front.categorie.categorie_1',compact('globe_cat'));
    }

    public function show_electro(Request $request, $id)
    {


        if(empty($request->gorie_1)){

            $request->gorie_1=0;
        }

        if($request->gorie_2== " "){

            $request->gorie_2=0;
        }

        if($request->gorie_3== " "){

            $request->gorie_3=0;
        }

        if($request->gorie_4== " "){

            $request->gorie_4=0;
        }

        if($request->ville_gorie_1== " "){

            $request->ville_gorie_1=" ";
        }

        if($request->ville_gorie_2== " "){

            $request->ville_gorie_2=" ";
        }

        if($request->ville_gorie_3== " "){

            $request->ville_gorie_3=" ";
        }
        switch($id){
            case '00':  $globe_cat=Product::all()->whereIn('sous__categorie_id',[$request->gorie_1,$request->gorie_2,$request->gorie_3,$request->gorie_4])
            ->whereIn('ville',[$request->ville_gorie_1,$request->ville_gorie_2,$request->ville_gorie_3]
        ); break;
            case '1': $globe_cat=Product::all()->where('category_id','=',1); break;

            case '12': $globe_cat=Product::all()->where('sous__categorie_id','=',1); break;


            case '13': $globe_cat=Product::all()->where('sous__categorie_id','=',18); break;

            case '15': $globe_cat=Product::all()->where('sous__categorie_id','=',19); break;
            case '16': $globe_cat=Product::all()->where('sous__categorie_id','=',20); break;
            case '17': $globe_cat=Product::all()->where('sous__categorie_id','=',21); break;
            case '18': $globe_cat=Product::all()->where('sous__categorie_id','=',22); break;
            case '19': $globe_cat=Product::all()->where('sous__categorie_id','=',23); break;

            case '20': $globe_cat=Product::all()->where('sous__categorie_id','=',24,'or','sous__categorie_id','=',25); break;


        }
        $filtre=0;
        return view('Front.categorie.categorie_2',compact('globe_cat'));
    }


    public function show_imm(Request $request, $id)
    {
        if(empty($request->gorie_1)){

            $request->gorie_1=0;
        }

        if($request->gorie_2== " "){

            $request->gorie_2=0;
        }

        if($request->gorie_3== " "){

            $request->gorie_3=0;
        }

        if($request->gorie_4== " "){

            $request->gorie_4=0;
        }

        if($request->gorie_5== " "){

            $request->gorie_5=0;
        }

        if($request->ville_gorie_1== " "){

            $request->ville_gorie_1=" ";
        }

        if($request->ville_gorie_2== " "){

            $request->ville_gorie_2=" ";
        }

        if($request->ville_gorie_3== " "){

            $request->ville_gorie_3=" ";
        }




        switch($id){
            case '00':  $globe_cat=Product::all()->whereIn('sous__categorie_id',[$request->gorie_1,$request->gorie_2,$request->gorie_3,$request->gorie_4,$request->gorie_5])
            ->whereIn('ville',[$request->ville_gorie_1,$request->ville_gorie_2,$request->ville_gorie_3]
        );

         break;
            case '1': $globe_cat=Product::all()->where('category_id','=',2); break;

            case '12': $globe_cat=Product::all()->where('sous__categorie_id','=',2); break;


            case '13': $globe_cat=Product::all()->where('sous__categorie_id','=',3); break;

            case '14': $globe_cat=Product::all()->where('sous__categorie_id','=',4); break;
            case '15': $globe_cat=Product::all()->where('sous__categorie_id','=',6); break;
            case '17': $globe_cat=Product::all()->where('sous__categorie_id','=',5); break;
            case '18': $globe_cat=Product::all()->where('sous__categorie_id','=',17); break;


        }
        return view('Front.categorie.categorie_3',compact('globe_cat'));
    }



}
