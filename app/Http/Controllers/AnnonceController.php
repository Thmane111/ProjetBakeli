<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\ImageProduct;
use App\Models\categorie;
use App\Models\sous_categorie;
use Intervention\Image\Exception\NotReadableException;
use Image;
use Illuminate\Support\Facades\File;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonceur=User::all();
        $annonceur_count=User::all()->count();
        return view('Back.Membres.index',compact('annonceur','annonceur_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Back.Membres.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
             'telephone'=>['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $save= new User;

        $save->name=$request->name;
        $save->prenom=$request->prenom;
        $save->email=$request->email;
        if($request->adresse==" "){
            $save->adresse=" ";
        }else{
            $save->adresse=$request->adresse;
        }

        $save->telephone=$request->telephone;
        $save->email=$request->email;
        $save->password=Hash::make($request->password);
        $save->etat=0;
        $save->save();

        return Back()->with('message','Enregistrement reussi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modif=User::findOrFail($id);
        return view('Back.Membres.edit',compact('modif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
             'telephone'=>['required', 'string', 'max:20'],

        ]);

        $save=User::find($id);
        $save->name=$request->name;
        $save->prenom=$request->prenom;
        if($request->adresse==" "){
            $request->adresse=" ";
        }else{
            $save->adresse=$request->adresse;
        }
        $save->telephone=$request->telephone;
        $save->update();
        return BACK()->with('message',"enregistre reussi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user_del=User::findOrFail($request->id_f);
        $user_del->delete();
            return BACK()->with("message","utilisateurs supprimer");
    }


    public function state(Request $request,$id)
    {
        $mod=User::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="utilisateur Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="utilisateur Desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }

    public function ajout(){
$produits = DB::table('products')
    ->select('products.id','products.titre_prod','products.ville','products.prix_prod', 'image_products.image','products.description','products.created_at')
    ->join('image_products', function ($join) {
        $join->on('products.id', '=', 'image_products.product_id')
             ->whereRaw('image_products.id = (select id from image_products where product_id = products.id limit 1)');
    })
    ->get();

        return response()->json($produits);
    }

public function detail($id){
    $proDetail = Product::findOrFail($id);
    $proDetail = Product::select('id', 'titre_prod', 'prix_prod','description','created_at')->findOrFail($id);

return response()->json($proDetail);

}

public function detailImage($id){
  
$imageProd = ImageProduct::where('product_id', $id)->get(); // Récupérer toutes les images associées
return response()->json($imageProd);

}

public function categorie(){
  
    $categorie = categorie::all(); // Récupérer toutes les images associées
    return response()->json($categorie);
    
    }

    public function filtre($id){
$produit = DB::table('products')
    ->select('products.id','products.titre_prod','products.ville', 'products.prix_prod', 'image_products.image','products.description','products.created_at')
    ->where('category_id',$id)
    ->join('image_products', function ($joins) {
        $joins->on('products.id', '=', 'image_products.product_id')
                ->whereRaw('image_products.id = (select id from image_products where product_id = products.id limit 1)');
    }
 
    )
 
    ->get();

        return response()->json($produit);
    }


    public function liste($id){
    $produits = DB::table('products')
        ->select('products.id','products.titre_prod','products.ville','products.prix_prod', 'image_products.image','products.description','products.created_at')
        ->where('user_id',$id)
        ->join('image_products', function ($join) {
            $join->on('products.id', '=', 'image_products.product_id')
                    ->whereRaw('image_products.id = (select id from image_products where product_id = products.id limit 1)');
        })
        ->get();

            return response()->json($produits);
        }


        public function profile(request $request){

            $validateDate=$request->validate([
                'image'=>'required',
                'name'=>'required',

    
    
        ]);
    
        $save=User::find(1);
        if($request->has('image')){
            $img=base64_decode($request->image);
            $destination="photo/profile/".$save->image;
            if(File::exists($destination)){
               File::delete($destination);
            }
            $base64Image = $request->input('image');
            $imageData = base64_decode($base64Image);
            $fileName = time() . '.png'; // Générez un nom de fichier unique ou utilisez celui envoyé par Flutter
            $filePath = public_path('photo/profile/') . $fileName;
            file_put_contents($filePath, $imageData);
            $save->image=$fileName;
            
            
       }else{
           
           return $request;
           $save->image='';
       }
       $save->update();
       return response()->json("Enregistrement avec success",200);
    //    return BACK()->with('message',"Enregistrement avec success !");
    
        }

        public function Cat($id)
        {
            // $sous_categorie = sous_categorie::where('categorie_id', $id)->get();
            // Récupérer toutes les images associées
                return response()->json('ok');
        }
}
