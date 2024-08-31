<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\sous_categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;
use App\Models\ImageProduct;
use App\Models\Module;
use App\Models\Attribution;
use Auth;
use Illuminate\Support\Facades\DB;
class ProdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_cat=categorie::all();

        $data_prod=Product::all();


        $vv=module::all()->where('dimunitif','=','ListProduit')->first();

        $modESCOUNT=module::all()->where('dimunitif','=','ListProduit')->count();

        $modES=module::all()->where('dimunitif','=','ListProduit')->first();
        $data_prod_count=Product::all()->count();
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();

        return view('Back.produit.index',compact('data_prod','data_prod_count','attribut','modES','vv','modESCOUNT','all_cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=categorie::all();
        $sou_cat=sous_categorie::all();
        return view('Back.produit.add',compact('cat','sou_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product $produit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $voirs=Product::All()->where('id','=',$id)->first();
        $img=ImageProduct::all()->where('product_id','=',$voirs->id);
        return view('Back.produit.view',compact('voirs','img'));


    }

    public function state($id)
    {
        $mod=Product::findOrFail($id);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Produit Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Produit Desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modif=Product::findOrFail($id);
        $cat=categorie::all();
        $sou_cat=sous_categorie::all();
        return view('Back.produit.edit',compact('modif','cat','sou_cat'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $produit
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request,$id)
    {
        $validateDate=$request->validate([
            'titre'=>'required|string|Max:30'
    ]);

    $save= Product::find($id);


    if($request->cat=="0"){
       return BACK()->with('error',"Verifier les categories !");
    }
        if($request->desc_prod==' '){
            $save->description=$request->desc_prod2;
        }else{
            $save->description=$request->desc_prod;
        }
    $save->titre_prod =$request->titre;









   $save->update();
   return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $produit
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $mod=Product::findOrFail($id);
        $mod->delete();
            return BACK()->with("message","Suppression reussi Avec Success");
    }



    public function desactiver($id)
    {
        $get_detail=Product::findOrFail($id);

        $get_detail->deletable=1;
        $get_detail->save();
        return BACK()->with('message','Suppression reussi');
    }


    public function filtre($id)
    {



     switch($id){
        case '1':  $data_prod=Product::all()->where('categorie_id','=',$id); break;
        case '2':  $data_prod=Product::all()->where('categorie_id','=',$id); break;
        case '3':  $data_prod=Product::all()->where('categorie_id','=',$id); break;
     }
     return view('Back.produit.index',compact('data_prod'));
    }


    public function search(Request $request)
    {
        if($request->search){
            $vl1=$request->search;
            $recherche=Product::where('titre_prod', 'LIKE', '%' . $request->search . '%','Or','description', 'LIKE', '%' . $request->search . '%')->latest()->paginate(15);

            $compte=Product::where('titre_prod', 'LIKE', '%' . $request->search . '%','Or','description', 'LIKE', '%' . $request->search . '%')->latest()->paginate(15)
            ->count();
            return view('Front.categorie.recherche',compact('recherche','compte','vl1'));

        }else{
            return redirect('/bagwelle');
        }




        ;



    }


    public function getProduit($id)
    {

         $html=" ";
        // $rid = $request->post('rid');
        // $countries= DB::table('countries')->where('region_id', $rid)->get();
        // dd($countries);

        $sous= sous_categorie::where('categorie_id', $id)->get();

        // dd($countries);


        foreach($sous as $souss){

            $html.= '  <option value="'.$souss->id.'">'.$souss->nom_type.'</option>';
        }
        return response()->json($html);




}




public function UpdateTabe1($id)
{
    // $list= DB::table('products')
    //     ->join('image_products','products.id','image_products.product_id')
    //     ->where('category_id',$id)->get();


        // $list_ticket=Ticket::with('type__ticket')->get();
        // $list_ticket=Ticket::all()->where('event_id',$vq_event->id);
    //     return response()->json(['list_ticket' => $list_ticket]);
    $list=Product::all()->where('category_id',$id);


    return response()->json(['list' => $list]);
}

public function UpdateTabe2($id)
{
    // $list= DB::table('products')
    //     ->join('image_products','products.id','image_products.product_id')
    //     ->where('category_id',$id)->get();


        // $list_ticket=Ticket::with('type__ticket')->get();
        // $list_ticket=Ticket::all()->where('event_id',$vq_event->id);
    //     return response()->json(['list_ticket' => $list_ticket]);
    $html="";
    $list1=ImageProduct::all()->where('product_id',$id)->first();

   $html.='
   <div class="dropdown">
   <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
       <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
   </button>

   <div class="dropdown-menu">
       <?php
       if($modESCOUNT!=0){
        $attrib=Attribution::All()->where("admins_id","=",Auth::guard("admin")->user()->id)->first();
           $mod2=Permission::all()->where("groupe_id","=",$attrib->groupe_id)
           ->where("module_id","=",$vv->id)
           ->where("etat","=",1);
          foreach($mod2 as $mod22) {
       ?>
       @if($mod22->permission=="Activer/désactiver")
       <a class="dropdown-item" href="{{route("Backlg.state",$data_prods->id)}}">@if($data_prods->etat==0)
           activer
           @else desactiver
           @endif
          </a>


     @elseif($mod22->permission=="Supprimer")
     <form id="destroy{{$data_prods->id}}" action="{{route("Backlg.Supprimer",$data_prods->id)}}" method="POST" class="btn btn-danger"
       style="background:transparent;border:solid 0px;padding:0px;">
          @csrf
          @method("DELETE")
          <button onclick="return confirmer()"  style="background:transparent;border:solid 0px;" id="delete">supprimer</button>
     </form>
     @elseif($mod22->permission=="Voir")
     <a href="/bagwelle/membre/show/{{$data_prods->id}}" class="dropdown-item

       ">{{$mod22->permission}}</a>
      @else
     <a href="/bagwelle/membre/{{$data_prods->id}}" class="dropdown-item

       ">{{$mod22->permission}}</a>
      @endif
       <?php }} ?>
   </div>

</div>
   ';
    return response()->json(['list1' => $list1,'html'=>$html]);
}
}

?>
