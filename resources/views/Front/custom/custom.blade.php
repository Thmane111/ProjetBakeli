<div class="popup_box1">
        <h2 style="margin-top:4%;font-family:Blippo, fantasy;font-size:53px;">Que vendez-vous ?</h2>
        <div class="cus">
         <div class="custom_cat1" style="margin-right:20px;">
            <a href="{{route('app.form_annonce')}}"><img src="{{asset('Front/image/nn.jpg')}}" width="230px;" height="100px;"></a>
         </div>
         <div class="custom1" style="display:flex ;">
         <div class="custom_cat">
         <a href="{{route('app.immobiliers')}}"> <img src="{{asset('Front/image/nnn.jpg')}}" width="160px;" height="100px;"></a>
         </div>
         <div class="custom_cat" style="margin-left:20px;">
         <a href="{{route('app.vihicules')}}"> <img src="{{asset('Front/image/nnnn.jpg')}}" width="160px;" height="100px;"></a>
         </div>
         </div>
        </div>
        <label>Vous êtes un vendeurs<br>professionnel?

        </label>
        <h1  class="ovr_1"style="justify-content:center;text-align:center;"><center>Ouvrez votre boutique pro</center></h1>
        <div class="btns">
          <a href="#" class="btn111">Fermer</a>

        </div>
      </div>

      <style>
          .popup_box1{

background:rgba(136, 0, 0, 0.74);;
text-align: center;
position:fixed;
color: white;

display: none;
align-items: center;

border-radius: 5px;




 top: 0;
left: 0;
z-index: 1050;

width: 100%;
height: 100%;
overflow: hidden;
outline: 0;

}
           @media screen and (max-width:800px)  {
  body   .cus{
  margin-left: 40px;;
    }

  body .popup_box1 label {
      margin-left:-44px ;
   }
    .popup_box1 .ovr_1{
      font-size: 19px;
      color: white;
   margin-left: -35px;
   }
  }
      </style>
