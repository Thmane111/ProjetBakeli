<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\ImageProduct;
class AcceuilController extends Controller
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
    public function show($id)
    {
        $voirs=Product::All()->where('id','=',$id)->first();
        $img=ImageProduct::all()->where('product_id','=',$voirs->id);

        $sous_prd=Product::all()->where('sous__categorie_id',$voirs->sous__categorie_id)
        ->where('id','!=',$voirs->id)
        ;



        return view('Annonceur.custom.custom_produit',compact('voirs','img','sous_prd'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
