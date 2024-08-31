     
    @extends('Front.index')
@section('content')
 






































































        <!-- ...:::: Start Customer Login Section :::... -->







































<div class="company-logo-section  section-fluid" style="height:90px;">
    <span ><center><h1 style="margin-top:10px;">   <strong>  Bienvenue sur Expat-Rim </strong></h1></center></span>
    <p style="justify-content: center;text-align:center;font-size:17px;">Pour acheter et vendre en toute sécurité, créez un compte ou connnectez-vous.</p>
</div>
    <div class="customer-login" style="margin-top:2%;">
        <div class="container">


   	<!--login-->
	<div class="login-page"style="justify-content:center;align-items:center;text-align:center;">
		
		<div class="widget-shadow" style="justify-content:center;align-items:center;text-align:center;">
			
			<div class="login-body" id="fond" style="justify-content:center;align-items:center;text-align:center;">
				<form class="wow fadeInUp animated" method="POST" action="{{route('app.register')}}" enctype="multipart/form-data" style="">
                @csrf
                
                <div class="cols">
                                    <div class="default-form-box">
					<input type="text" class="form-control"  required=""
                    name="name"
                     placeholder="Veuillez saisir votre nom"
                    >
                    <x-input-error :messages="$errors->get('name')" style="color:red;" class="mt-2" />
                </div>
                </div>

                <div class="cols">
                                    <div class="default-form-box">
				<input type="text" class="form-control"  required=""
                name="prenom"
                placeholder="Veuillez saisir votre prenom"
                >
                <x-input-error :messages="$errors->get('prenom')" style="color:red;" class="mt-2" />
                </div>
                </div>
    
                <div class="cols">
                <div class="default-form-box">
				<input type="number" class="form-control"  required=""
                name="tel"
                placeholder="Veuillez saisir votre numero telephone"
                >
                <x-input-error :messages="$errors->get('tel')" style="color:red;" class="mt-2" />
                </div>
                </div>
                  
                <div class="cols">
                                    <div class="default-form-box">
					<input type="email" class="form-control"  required=""
                    name="email"
                     placeholder="Veuillez saisir votre email"
                    >
                    <x-input-error :messages="$errors->get('email')" style="color:red;" class="mt-2" />
                </div>
                </div>


                <div class="cols">
                                    <div class="default-form-box">
					<input type="password" class="form-control"  required=""
                    name="password"
                     placeholder="Veuillez saisir votre mot de passe"
                    >
                    <x-input-error :messages="$errors->get('password')" style="color:red;" class="mt-2" />
                </div>
                </div>

                
                <div class="cols">
                                    <div class="default-form-box">
					<input type="password" class="form-control"  required=""
                    name="password_confirmation"
                     placeholder="Confirmez votre mot de passe"
                    >
                    <x-input-error :messages="$errors->get('password_confirmation')" style="color:red;" class="mt-2" />
                </div>
                </div>

                <div class="form_group group default-form-box">
                                <button class="btn btn-md" style="background:red;float:left;" name="valider" type="submit">connecter</button>
                                <button class="btn btn-md" style="background:grey;float:left;" name="valider" type="reset">effacer</button>
                            </div>
				</form>
                
			</div>
		</div>
	</div>
	<!--//login-->
</div>
</div>
<style>
    .cols{
        width:600px;
    }
    #fond{
        background-image: url('/Front/image/fond1.jpg');
        background-repeat: no-repeat;
        background-position: right;
    }
    @media screen and (max-width:800px)  {
  .cols{
  width:300px;
  padding:5px;
  justify-content:center;
  text-align:center;
  align-items:center;
  }
  #fond{
       background:red;
    }
    }


</style>
    @endsection
