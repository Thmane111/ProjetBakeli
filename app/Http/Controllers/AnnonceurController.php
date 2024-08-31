<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


use App\Models\categorie;
use App\Models\Product;


use App\Models\Icon;
use App\Models\sous_categorie;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Signalez;
use Illuminate\Support\Facades\Auth;
// use Intervention\Image\Facades\Image;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\ImageProduct;
use Intervention\Image\Exception\NotReadableException;
use Illuminate\Support\Facades\Validator;


class AnnonceurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prod_user=Product::all()->where('user_id','=',Auth::user()->id)
        ->where('deletable','=','0');
        $compt=Product::all()->where('user_id','=',Auth::user()->id)
        ->where('deletable','=','0')->count();

        return view('Annonceur.space_membre.dashbord_membre',compact('prod_user','compt'));
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
    public function storeA(Request $request)
    {

        $validateDate=$request->validate([
            'titre'=>'required|string|Max:37',
            'prix'=>'required|integer',
            'sous_cat'=>'required',
            'ville'=>'required|string',
            'phone'=>'required|string'


    ]);
   $verifie_prenium=User::all()->where('id',$request->id)->first();
   if($verifie_prenium->type_annonceur_id==2){
    if((count($request->file('image')))>2){
        return BACK()->with('error',"maximum 2 photo !");
    }else{
        $save= new Product;
        $img=new ImageProduct;

        $save->titre_prod =$request->titre;
        $save->user_id =$request->id;
        $save->category_id =$request->cat;
        $save->sous__categorie_id=$request->sous_cat;
        $save->description =$request->detail;
        $save->livraison=$request->liv;
        $save->prix_prod =$request->prix;
        $save->ville=$request->ville;

       $save->deletable=0;
       $save->etat=0;
        if($request->of==0){
            $save->type_offre=0;
        }else{
            $save->type_offre=$request->of;
        }

    $save->save();
    $image=$request->file('image');

    // if ($request->file('image')) {
    //     foreach($image as $images){
    //         $manager = new \Intervention\Image\ImageManager();
    //         $imagess = $request->file('image');
    //         $name_gen = hexdec(uniqid()) . '.' . $imagess->getClientOriginalExtension();
            
    //         // Lire l'image
    //         $img = $manager->make($imagess->getPathname());
            
    //         // Redimensionner l'image
    //         $img->resize(1000, 800);
            
    //         // Enregistrer l'image au format JPEG avec une qualité de 80
    //         $path = base_path('uploads/Annonce/' . $name_gen);
    //         $img->save($path, 80);
            
    //         // Générer un nom de fichier unique
    //         $filename = 'Expad-Rim-' . time() . '.' . $imagess->getClientOriginalExtension();
            
    //         // Enregistrer les informations de l'image dans la base de données
    //         $imgRecord = new Image(); // Assurez-vous que le modèle Image est importé
    //         $imgRecord->image = $filename;
    //         $imgRecord->product_id = $save->id;
    //         $imgRecord->save();
    //     }
 
    // }



    if($request->file('image')){
        foreach($image as $images){
            $manager=new ImageManager(new Driver());
            $name_gen=hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
          
            $imgs=$manager->read($images);
            $imgs=$imgs->resize(1000,800);
           
            $filename='Expad-Rim-'. time(). '.'. $name_gen;
            $imgs->toJpeg(80)->save(base_path('/uploads/Annonce/'.$filename));
            $img->image=$filename;
            $img->product_id=$save->id;
            $img->save();
        }
        
        
        
    }
    
    // foreach($image as $images){

    //     $img =new ImageProduct;
    //         $file=$images;
    //         $extension=$file->getClientOriginalExtension();
    //         $filename='Expad-Rim-'. time(). '.'. $extension;
    //         $resize_image=Image::make($file->getRealPath());
    //         $destinationPath=public_path('/uploads/Annonce');
    //         $resize_image->resize(1000,800)->save($destinationPath.'/'.$filename);
    //         $destinationPath=$images->store('uploads/Annonce');
    //         $img->image=$filename;
    //         $img->product_id=$save->id;
    // $img->save();


    // }

       return BACK()->with('message',"Annonce enregistrer avec success !");
    }
   }else{
    $save= new Product;
    $img=new ImageProduct;
    $save->titre_prod =$request->titre;
    $save->user_id =$request->id;
    $save->category_id =$request->cat;
    $save->sous__categorie_id=$request->sous_cat;
    $save->description =$request->detail;
    $save->livraison=$request->liv;
    $save->prix_prod =$request->prix;
    $save->ville=$request->ville;

   $save->deletable=0;
   $save->etat=0;
    if($request->of==0){
        $save->type_offre=0;
    }else{
        $save->type_offre=$request->of;
    }

$save->save();
$image=$request->file('image');


if($request->file('image')){

    foreach($image as $images){
      
        $manager=new ImageManager(new Driver());
        $name_gen=hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
      
        $imgs=$manager->read($images);
        $imgs=$imgs->resize(1000,800);
   
        $filename='Expad-Rim-'. time(). '.'. $name_gen;
        $imgs->toJpeg(80)->save(base_path('public/uploads/Annonce/'.$filename));
        $img->image=$filename;
        $img->product_id=$save->id;
        $img->save();
    }
    
    
    
}

   return BACK()->with('message',"Annonce enregistrer avec success !");
   }



    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $voirs=Product::All()->where('id','=',$id)->first();
        $img=ImageProduct::all()->where('product_id','=',$voirs->id)->first();
        return view('Annonceur.custom.custom_detail',compact('voirs','img'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): Response
    {
        $modif=Product::findOrFail($id);
        return view('Annonceur.space_membre.edit_produit',compact('modif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validateDate=$request->validate([
            'nom'=>'required|string|Max:50',
            'prenom'=>'required|string|Max:50',
            'tel'=>'required|integer',





    ]);
    $save= User::find($id);
    $save->name =$request->nom;
    $save->prenom =$request->prenom;
    $save->telephone =$request->tel;
    $save->save();
    return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function veuille($id): RedirectResponse
    {
        $get_detail=Product::findOrFail($id);

        $get_detail->deletable=1;
        $get_detail->save();
        return redirect('/expad/annonceur');
    }








    public function update_profile(request $request,$id){

        $validateDate=$request->validate([
            'image'=>'required',


    ]);

    $save=user::find($id);
    if($request->hasfile('image')){
        $destination="photo/profile/".$save->image;
        if(File::exists($destination)){
           File::delete($destination);
        }
       $file= $request->file('image');
       $extension= $file->getClientOriginalExtension();
       $filename= time(). '.'. $extension;
       $file->move('photo/profile/',$filename);
       $save->image=$filename;
   }else{
       return $request ;
       $save->image='';
   }
   $save->update();
   return BACK()->with('message',"Enregistrement avec success !");

    }





    public function state($id)
    {
        $mod=User::findOrFail($id);
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





    public function form_annonce(){
        $countries=categorie::all()->where('id','!=',1)
        ->where('id','!=',2)
        ;




    return view('Annonceur.formulaire_annonce.formulaire_simple', compact('countries'));

    }

    public function prenium(){

    return view('Annonceur.formulaire_annonce.prenium');

    }

    public function immo_annonce(){
        $cat_imm=sous_categorie::all()->where('categorie_id','=',2);

        return view('Annonceur.formulaire_annonce.formulaire_immobiliers',compact('cat_imm'));
    }

    public function vih_annonce(){
        $cat_vih=sous_categorie::all()->where('categorie_id','=',1);
        return view('Annonceur.formulaire_annonce.formulaire_vihicules',compact('cat_vih'));
    }


    public function detail($id)
    {




    }


    public function edit_prod($id)
    {
        $modif=Product::findOrFail($id);
        return view('Annonceur.space_membre.edit_produit',compact('modif'));
    }




    public function update_prod(Request $request,$id)
    {
        $validateDate=$request->validate([
            'titre'=>'required|string|Max:25',
            'prix'=>'required|integer',





    ]);


    $save= Product::find($id);
    $save->titre_prod =$request->titre;

      if($request->ville==""){
        $save->ville=$request->v_ville;
      }else{
        $save->ville=$request->ville;
      }

      if($request->detail==""){
        $save->description =$request->v_detail;
      }else{
        $save->description =$request->detail;
      }

    $save->prix_prod =$request->prix;

    $save->type_offre =0;






   $save->save();
   return BACK()->with('message',"Modification reussi !");
    }



    public function getCountry($id)
    {

         $html=" ";
        $sous= sous_categorie::where('categorie_id', $id)->get();

        foreach($sous as $souss){

            $html.= '  <option value="'.$souss->id.'">'.$souss->nom_type.'</option>';
        }
        return response()->json($html);




}

public function getCountry1($id)
{

    
    $sous_categorie = sous_categorie::where('categorie_id', $id)->get();
    // Récupérer toutes les images associées
        return response()->json($sous_categorie);
}



public function getPrenium($id)
{

     $html=" ";
    // $rid = $request->post('rid');
    // $countries= DB::table('countries')->where('region_id', $rid)->get();
    // dd($countries);

    // $sous= Classe::where('id', $id)->get();

    // dd($countries);

     switch($id){
        case "1": $html.=1000 ; break;
        case "2": $html.=2000 ; break;
        case "3": $html.=3000 ; break;
        default : $html=0;
     }




    return response()->json($html);
}







































public function ajoutAPI(Request $request)
{

 
$validator= Validator::make($request->all(),[
    'titre_prod'=>'required|string|Max:37',
    'prix_prod'=>'required|integer',
    'sous_categorie_id'=>'required',
    'ville'=>'required|string',
    'telephone'=>'required|string'
]);
if($validator->fails()){
    return response()->json([
        'statusCode' => 422,
        'error' => $validator->errors()
    ], 422);
}else{

$verifie_prenium=User::all()->where('id',$request->user_id)->first();
if($verifie_prenium->type_annonceur_id==2){
if((count($request->file('image')))>2){
    return BACK()->with('error',"maximum 2 photo !");
}else{
    $save= new Product;
    $img=new ImageProduct;
    $save->titre_prod =$request->titre_prod;
    $save->user_id =$request->user_id;
    $save->category_id =$request->category_id;
    $save->sous__categorie_id=$request->sous_categorie_id;
    $save->description =$request->description;
    $save->livraison=0;
    $save->prix_prod =$request->prix_prod;
    $save->ville=$request->ville;

   $save->deletable=0;
   $save->etat=0;
    // if($request->of==0){
    //     $save->type_offre=0;
    // }else{
    //     $save->type_offre=$request->of;
    // }
$save->type_offre=0;
$save->save();
$image=$request->file('image');

if (is_array($request->file('image'))) {
    foreach($image as $images){
        $manager=new ImageManager(new Driver());
        $name_gen=hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
      
        $imgs=$manager->read($images);
        $imgs=$imgs->resize(1000,800);
       
        $filename='Expad-Rim-'. time(). '.'. $name_gen;
        $imgs->toJpeg(80)->save(base_path('public/uploads/Annonce/'.$filename));
        $img->image=$filename;
        $img->product_id=$save->id;
        $img->save();
    }
}

return response()->json([
    'statusCode'=>'200',
    'msg'=>'Enregistrement reussi'
]);
}
}else{
$save= new Product;
$img=new ImageProduct;
$save->titre_prod =$request->titre_prod;
    $save->user_id =$request->user_id;
    $save->category_id =$request->category_id;
    $save->sous__categorie_id=$request->sous_categorie_id;
    $save->description =$request->description;
    $save->livraison=0;
    $save->prix_prod =$request->prix_prod;
    $save->ville=$request->ville;

$save->deletable=0;
$save->etat=0;
// if($request->of==0){
//     $save->type_offre=0;
// }else{
//     $save->type_offre=$request->of;
// }
$save->type_offre=0;
$save->save();
$image=$request->file('image');

if (is_array($request->file('image'))) {
    foreach($image as $images){
        $manager=new ImageManager(new Driver());
        $name_gen=hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
      
        $imgs=$manager->read($images);
        $imgs=$imgs->resize(1000,800);
       
        $filename='Expad-Rim-'. time(). '.'. $name_gen;
        $imgs->toJpeg(80)->save(base_path('public/uploads/Annonce/'.$filename));
        $img->image=$filename;
        $img->product_id=$save->id;
        $img->save();
    }
}

return response()->json([
    'statusCode' => 200,
    'msg' => 'Enregistrement réussi'
], 200);
}


}
}


















































}
