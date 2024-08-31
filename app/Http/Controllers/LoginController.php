<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserTest;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules;


use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Enregistrez ou connectez l'utilisateur ici

        return redirect('/home');
    }

    public function register(Request $req){
        // Validate
        $role=[
            'name'=>'required',
           
            'tel'=>'required',
            'email'=>'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        $validator=Validator::make($req->all(),$role);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        // create new user
        $user=User::create([
            'name' => $req->name,
            'prenom' => " ",
            'telephone' => $req->tel,
            'image'=>$req->image=0,
             'type_annonceur_id'=>1,
            'etat' => $req->etat=0,

            'deletable' => $req->deletable=0,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'NumWhatsap'=>"123",
        ]);
        $token = $user->createToken('Personal Access Token')->accessToken;

        $response=['user'=>$user,'token'=>$token];
        return response()->json($response,200);
    }

    public function login1(Request $request){
        //Valide Inputs
        $role2=[
            'email'=>'required',
            'password'=>'required|string'
        ];
        $request->validate($role2);
        
        //verifier user email in users tables
        $user2=User::where('email',$request->email)->first();

        // if user email found and password is correct
        if($user2 && Hash::check($request->password,$user2->password)){
            $token2 = $user2->createToken('Personal Access Token')->accessToken;
            $response2=['user'=>$user2,'token'=>$token2];
            return response()->json($response2,200);
        }
        $response2=['message'=>'Incorrect email or password'];
        return response()->json($response2,400);

    }
}
