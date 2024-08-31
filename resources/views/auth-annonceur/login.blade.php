
    @extends('Front.index')
@section('content')
    <!-- ...:::: Start Customer Login Section :::... -->







































<div class="company-logo-section  section-fluid" style="height:90px;">
    <span ><center><h1 style="margin-top:10px;">   <strong>  Bienvenue sur Expat-Rim </strong></h1></center></span>
    <p style="justify-content: center;text-align:center;font-size:17px;">Pour acheter et vendre en toute sécurité, créez un compte ou connnectez-vous.</p>
</div>
    <div class="customer-login" style="margin-top:2%;">
        <div class="container">


    <div class="row" style="justify-content: center;align-items:center;">

        <!-- User Quick Action Form -->
        <div class="col-12">
        @if(Session::has('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
         <strong>{{session::get('error')}}</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif
            <div class="user-actions accordion" data-aos="fade-up" data-aos-delay="0" style="justify-content: center;text-align:center;align-items:center;

            ">
                <h3 style="font-size:17px;background:white;justify-content: center;text-align:center;align-items:center;color:black;
                border:solid 2px #ad0a0a;
                " >
                    <i
                    class="icon-user"></i>


                    <a class="Returning" style="color:black;"  href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login"aria-expanded="true">
                        connnectez-vous
                    </a>
                </h3>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                        @if(session()->has('success'))
                        <div class="alert alert-icon alert-danger">
                           {{session('success')}}
                        </div>
                        @endif
                <div id="checkout_login" class="collapse" data-parent="#checkout_login" style="justify-content: center;text-align:center;align-items:center;">
                    <div class="checkout_info" style="justify-content: center;text-align:center;align-items:center;
                    background:#ad0a0a;
                    ">

                        <form method="POST" action="{{ route('app.login') }}">
                            @csrf
                            <input  type="hidden" name="role" value="0"  />
                            <div class="form_group default-form-box">
                                <label style="color:white; "> Email <span>*</span></label>
                                <input type="text" name="email" style="background:white;"
                                placeholder="Veuillez saisir votre email"
                                >
                                <x-input-error :messages="$errors->get('email')" style="color:red;" class="mt-2" />
                            </div>
                            <div class="form_group default-form-box">
                                <label  style="color:white; ">Mot de passe<span>*</span></label>
                                <input   type="password" style="background:white;"
                                name="password"
                                autocomplete="current-password" placeholder="Veuillez saisir le mot de passe">
                                <x-input-error :messages="$errors->get('password')" style="color:red;" class="mt-2" />
                            </div>
                            <div class="form_group group default-form-box">
                                <button class="btn btn-md" style="background:white;" name="valider" type="submit">connecter</button>

                            </div>
                            <a href="{{ route('app.password.request') }}"  style="color:white; ">J'ai oublié mon mot de passe</a>



                        </form>




                    </div>




                </div>




            </div>


        </div>
        <div class="col-6">
        <h3 style="font-size:17px;background:rgb(153, 30, 30);justify-content: center;text-align:center;align-items:center;color:white;
        border:solid 1px white; padding:10px;border-radius:30px;
        " >
            <i class="fa fa-google" aria-hidden="true"></i>

            <a class="Returning" style="color: white;" href="#"
             >Utiliser un compte Google</a>


        </h3>
        <h3 style="font-size:17px;background:rgb(95, 95, 182);justify-content: center;text-align:center;align-items:center;color:white;
        border:solid 1px white; padding:10px;border-radius:30px;
        " >
        <i class="fa fa-facebook-square"></i>


            <a class="Returning" style="color: white;" href="#"
             >Utiliser un compte Facebook</a>


        </h3>
        </div>
        <!-- User Quick Action Form -->
    </div>
</div>
</div>
    @endsection
