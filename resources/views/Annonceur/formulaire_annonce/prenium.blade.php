<div class="popup_box2">

    <label>Vous êtes un vendeurs<br>professionnel?

    </label>
    <div class="row">
        <div class="col-md-12 mx-0">

<style>
                      .dashboard_tab_button a:hover{
                            background: #ad0a0a;;
                            }
                            .btn-black-default-hover {
    background: transparent;
    border: solid 3px #ad0a0a;;
    color: #ad0a0a;;
}
.dashboard_tab_button li .btn.active {
    background: #ad0a0a;
    color: white;;
}
</style>
   {{-- &&&&&&&&&&&&&&&&& --}}
        <div class="row d-flex" id="globe-prenium" style="text-align:center;justify-content:center;align-items:center;margin-top:-5%">
            <div class="col-sm-12 col-md-3 col-lg-6" style="display:flex;background: #ffffff;text-align:center;justify-content:center;align-items:center;">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button d-flex" data-aos="fade-up" data-aos-delay="0">
                    <ul role="tablist" class="nav  dashboard-list" style="display:flex;">

                        <li style="padding: 5px;"> <a href="#orders" style="border:solid 3px #ad0a0a;;width: 90px;height:90px;align-items:center;justify-content:center;text-align:center;" data-bs-toggle="tab"
                                class="nav-link btn btn-block btn-md"> <i class="fa fa-rocket" style="font-size: 20px;"></i> Xeweul</a></li>
                        <li style="padding: 5px;"><a href="#account-details" data-bs-toggle="tab" style="width: 90px;height:90px;"
                                class="nav-link btn btn-block btn-md btn-black-default-hover" ><i class="fa fa-crown-king" style="font-size: 20px;"></i> Pro Teranga</a>
                        </li>
                        <li style="padding: 5px;"><a href="#address" data-bs-toggle="tab" style="display:none;width: 90px;height:90px;"
                            class="nav-link btn btn-block btn-md btn-black-default-hover active" >Pro Teranga</a>
                    </li>
                    </ul>
                </div>
            </div>
            </div>
            {{-- &&&&&&&&&&&&&&&&&&&&&&&&&&&&&& --}}

            {{-- éééééééééééééééééééééééééééééééééé --}}
            <div class="row d-flex" id="pres" style="text-align:center;justify-content:center;align-items:center;">
            <div class="col-sm-12 col-md-9 col-lg-9">


                <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                <form action="" method="GET" class="tab-pane fade show" id="orders">
                    @csrf
                    <input type="hidden" name="id" value="{{Auth::user()->id}}"/>
                    <input type="hidden" name="telephone" value="{{Auth::user()->telephone}}"/>
                    <div  style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;;margin-top:20px;
                    color:white;text-align: center;align-items:center;justify-content:center;display:block;background:white;
                    ">

                                <h6 class="title"><i class="fa fa-rocket" style="font-size: 45px;color:#ad0a0a;"></i></h6>
                                     <div class="d-flex" style="align-items:center;justify-content:center;">
                                        <div class="col-10" style="text-align:center;align-items:center;justify-content:center;display:flex;">
                                        <div class="col-10 d-block" style="justify-content:center;align-items:center;text-align:center;">
                                <ul class="review-star d-flex" style=" width:100%;justify-content:center;">
                                    <li class="col-5" style="text-align:left;color:black;"><i class="ion-android-picture"></i><p> <strong>Nombre de photo</strong></p></li>
                                    <li class="fill col-5" style="color:black;float: right;">4</li>
                                </ul>
                                <ul class="review-star d-flex" style=" width:100%;justify-content:center;">
                                    <li class="col-5" style="text-align:left;color:black;"><i class="ion-android-picture"></i><p> <strong>Durée d'affichage</strong></p></li>
                                    <li class="fill col-5" style="color:black;float: right;">15 jours</li>
                                </ul>
                                <ul class="review-star d-flex" style=" width:100%;justify-content:center;">
                                    <li class="col-5" style="text-align:left;color:black;"><i class="ion-android-picture"></i><p> <strong>Promotions exclusives</strong></p></li>
                                    <li class="fill col-5" style="color:black;float: right;">Oui</li>
                                </ul>





                                        </div>
                                        </div>
                                     </div>
                                        <div class="col-12 d-flex" style="text-align:center;align-items:center;justify-content:center;">
                                        <ul class="col-12 d-flex"  style="text-align: center;text-align:center;align-items:center;justify-content:center;">
                                        <li style="padding: 5px;" >
                                            <label class="option_item" style="width: 50px;">

                                                <input type="radio" id="check1" style="width: 100px;" name="sous_cat" value="1"  class="checkbox" checked>
                                                <div class="option_inner facebook" style="width: 50px;border:solid 1px #A52A2A;">


                                                  <div class="name" style="width:50px;;"><p>1<br> mois</p></div>
                                                </div>
                                              </label>
                                        </li>
                                        <li style="padding: 5px;" >
                                            <label class="option_item" style="width: 50px;">

                                                <input type="radio" id="check2" style="width: 100px;" name="sous_cat" value="2"  class="checkbox">
                                                <div class="option_inner facebook" style="width: 50px;border:solid 1px #A52A2A;">


                                                  <div class="name" style="width:50px;;"><p>2<br> mois</p></div>
                                                </div>
                                              </label>
                                        </li>
                                        <li style="padding: 5px;" >
                                            <label class="option_item" style="width: 50px;">

                                                <input type="radio" style="width: 100px;" id="check3" name="sous_cat" value="3"  class="checkbox">
                                                <div class="option_inner facebook" style="width: 50px;border:solid 1px #A52A2A;">


                                                  <div class="name" style="width:50px;;"><p>3<br> mois</p></div>
                                                </div>
                                              </label>
                                        </li>

                                        </ul>
                                        </div>


                                        <div class="content-right bg-danger">
                                            <span class="price" style="color: white" id="prenium1"></span><strong style="color: #fff"> FCFA </strong>
                                        </div>
                                         <span class="price" style="color: black;">Payé par</button></span>
                                        <div class="col-12 d-flex" style="text-align:center;align-items:center;justify-content:center;">

                                            <ul class="col-12 d-flex"  style="text-align: center;text-align:center;align-items:center;justify-content:center;">

                                            <li style="padding: 5px;" >
                                                <label class="option_item" style="width: 50px;">


                                                    <div class="option_inner facebook" style="width: 50px;heighh:30px;border:solid none;">


                                                      <button type="submit" name="wave1"  style="width:50px;heighh:30px;">
                                                      <img src="{{asset('image/th.jpg')}}" style="border-radius:5px;" width="100%" height="100%"/>
                                                      <p>Wave</p>
                                                      </button>
                                                    </div>
                                                  </label>
                                            </li>
                                            <p style="color: #000;">ou</p>
                                            <li style="padding: 5px;" >
                                                <label class="option_item" style="width: 50px;">


                                                    <div class="option_inner facebook" style="width: 50px;heighh:30px;border:solid none;">


                                                      <button type="submit" name="orange1" class="name" style="width:50px;heighh:30px;;">
                                                        <img src="{{asset('image/th1.jpg')}}" style="border-radius:5px;" width="100%" height="100%"/>

                                                      </button>
                                                      <p class="d-flex">orangeM</p>
                                                    </div>
                                                  </label>
                                            </li>


                                            </ul>
                                            </div>
                            </div>
                        </form>







                        <div class="tab-pane active" id="address">
                            <p style="color: #000;">Le succès de votre annonce commence avec Premium</p>
                            <h5 class="billing-address" style="color: #ad0a0a;">"Distinguez-vous de la foule avec nos annonces Premium - La vitrine idéale pour vos offres exceptionnelles."</h5>

                        </div>






<form action="" method="GET"class="tab-pane fade show" id="account-details">
    @csrf
    <div  style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;;margin-top:20px;
                            background:#ad0a0a;color:white;text-align: center;align-items:center;justify-content:center;display:block;
                            ">
    <div  style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;;margin-top:20px;
    color:white;text-align: center;align-items:center;justify-content:center;display:block;background:white;
    ">

                <h6 class="title"><i class="fa fa-user" style="font-size: 45px;color:#ad0a0a;"></i></h6>
                     <div class="d-flex" style="align-items:center;justify-content:center;">
                        <div class="col-10" style="text-align:center;align-items:center;justify-content:center;display:flex;">
                        <div class="col-10 d-block" style=justify-content:center;align-items:center;text-align:center;">
                            <ul class="review-star d-flex" style=" width:100%;justify-content:center;">
                                <li class="col-5" style="text-align:left;color:black;"><i class="ion-android-picture"></i><p> <strong>Nombre de photo</strong></p></li>
                                <li class="fill col-5" style="color:black;float: right;">6</li>
                            </ul>
                            <ul class="review-star d-flex" style=" width:100%;justify-content:center;">
                                <li class="col-5" style="text-align:left;color:black;"><i class="ion-android-picture"></i><p> <strong>Durée d'affichage</strong></p></li>
                                <li class="fill col-5" style="color:black;float: right;">Mois</li>
                            </ul>
                            <ul class="review-star d-flex" style=" width:100%;justify-content:center;">
                                <li class="col-5" style="text-align:left;color:black;"><i class="ion-android-picture"></i><p> <strong>Promotions exclusives</strong></p></li>
                                <li class="fill col-5" style="color:black;float: right;">Oui</li>
                            </ul>





                        </div>
                        </div>
                     </div>
                        <div class="col-12 d-flex" style="text-align:center;align-items:center;justify-content:center;">
                        <ul class="col-12 d-flex"  style="text-align: center;text-align:center;align-items:center;justify-content:center;">
                        <li style="padding: 5px;" >
                            <label class="option_item" style="width: 50px;">

                                <input type="radio" id="check1" style="width: 100px;" name="sous_cat" value="1"  class="checkbox" checked>
                                <div class="option_inner facebook" style="width: 50px;border:solid 1px #A52A2A;">


                                  <div class="name" style="width:50px;;"><p>1<br> mois</p></div>
                                </div>
                              </label>
                        </li>
                        <li style="padding: 5px;" >
                            <label class="option_item" style="width: 50px;">

                                <input type="radio" id="check2" style="width: 100px;" name="sous_cat" value="2"  class="checkbox">
                                <div class="option_inner facebook" style="width: 50px;border:solid 1px #A52A2A;">


                                  <div class="name" style="width:50px;;"><p>2<br> mois</p></div>
                                </div>
                              </label>
                        </li>
                        <li style="padding: 5px;" >
                            <label class="option_item" style="width: 50px;">

                                <input type="radio" style="width: 100px;" id="check3" name="sous_cat" value="3"  class="checkbox">
                                <div class="option_inner facebook" style="width: 50px;border:solid 1px #A52A2A;">


                                  <div class="name" style="width:50px;;"><p>3<br> mois</p></div>
                                </div>
                              </label>
                        </li>

                        </ul>
                        </div>


                        <div class="content-right bg-danger">
                            <span class="price" style="color: white" id="prenium1"></span><strong style="color: #fff"> FCFA </strong>
                        </div>
                         <span class="price" style="color: black;">Payé par</button></span>
                        <div class="col-12 d-flex" style="text-align:center;align-items:center;justify-content:center;">

                            <ul class="col-12 d-flex"  style="text-align: center;text-align:center;align-items:center;justify-content:center;">

                            <li style="padding: 5px;" >
                                <label class="option_item" style="width: 50px;">


                                    <div class="option_inner facebook" style="width: 50px;heighh:30px;border:solid none;">


                                      <button type="submit"  style="width:50px;heighh:30px;">
                                      <img src="{{asset('image/th.jpg')}}" style="border-radius:5px;" width="100%" height="100%"/>
                                      <p>Wave</p>
                                      </button>
                                    </div>
                                  </label>
                            </li>
                            <li style="padding: 5px;" >
                                <label class="option_item" style="width: 50px;">


                                    <div class="option_inner facebook" style="width: 50px;heighh:30px;border:solid none;">


                                      <button type="submit" class="name" style="width:50px;heighh:30px;;">
                                        <img src="{{asset('image/th1.jpg')}}" style="border-radius:5px;" width="100%" height="100%"/>

                                      </button>
                                      <p class="d-flex">orangeM</p>
                                    </div>
                                  </label>
                            </li>


                            </ul>
                            </div>
            </div>
        </div>
        </form>










                        </div>



















            </div>
            </div>
            <div class="btns">
                <a href="#" class="btn111">Annuler</a>

              </div>
            {{-- éééééééééééééééééééééééééééééééééééé --}}
        </div>
    </div>


  </div>






  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



  <script type="text/javascript">

      $(document).ready(function () {
      $('#check1').change(function(){


          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                  }
             });
          var id = $(this).val();




          $.ajax({
                  dataType: "json",
                  url: "/expad/getPrenium/"+id,
                  type: "GET",
                  success: function (data) {
                      console.log(data);
                     $('#prenium1').html(data);

                  },
                 error: function(error) {
                      console.log(error);


                 }
              });







          });



  //call city on country selected


  });




















  $(document).ready(function () {
      $('#check2').change(function(){


          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                  }
             });
          var id = $(this).val();




          $.ajax({
                  dataType: "json",
                  url: "/expad/getPrenium/"+id,
                  type: "GET",
                  success: function (data) {
                      console.log(data);
                     $('#prenium1').html(data);

                  },
                 error: function(error) {
                      console.log(error);


                 }
              });







          });



  //call city on country selected


  });

  </script>











































































































































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




@media screen and (max-width:800px){

.wrapper_cus .container1 {
background-color: #25d366;
display:block;
width: 400px;


}


}




#pres {
display: flex;
flex-wrap: wrap;
}

#pres .option_item {
display: block;
position: relative;
width: 50px;

height: 50px;
margin: 20px;

}

#pres .option_item .checkbox {
position: absolute;
top: 0;

left: 0;
z-index: 1;
opacity: 0;
}

#pres .option_item .option_inner {
width: 100%;
height: 100%;
background: #fff;
border-radius: 5px;
text-align: center;

cursor: pointer;
color: #585c68;
display: block;
border: 1px solid transparent;
position: relative;
}


#pres .option_item .option_inner .icon .fab {
font-size: 32px;
}

#pres  .option_item .option_inner .name {
user-select: none;
text-align: center;
width:100% ;
align-items: center;
justify-content: center;
}
#pres .option_item .option_inner p{
text-align: center;
justify-content: center;
}

#pres .option_item .checkbox:checked ~ .option_inner.facebook {
border-color:rgb(97, 13, 13);
color:white;
background:rgb(97, 13, 13);;
padding:0px;width:50px;;

}











.option_item .option_inner1 .tickmark {
position: absolute;
top: -1px;
left: -1px;
border: 20px solid;
border-color: #000 transparent transparent #000;
display: none;
}

#pres .option_item .option_inner1 .tickmark:before {
content: "";
position: absolute;
top: -18px;
left: -18px;
width: 15px;
height: 5px;
border: 3px solid;
border-color: transparent transparent #fff #fff;
transform: rotate(-45deg);
}

#pres .option_item .checkbox:checked ~ .option_inner .tickmark {
display: block;
}

#pres .option_item .option_inner.facebook .tickmark {
border-color:rgb(97, 13, 13) transparent transparent rgb(97, 13, 13);
}













.form-card .option_item1 {
display: block;
position: relative;
width: 100px;
height: 40px;
border-radius:10px;
color: #000;

margin: 10px;
}

.form-card  .option_item1 .checkbox1 {
position: absolute;
top: 0;
left: 0;
z-index: 1;
border-radius: 3px;
opacity: 0;
height:20px ;
}

.option_item1 .option_inner1 {
width: 100%;
height: 100%;
background: #fff;
border-radius:10px;
text-align: center;

cursor: pointer;
color: #585c68;
display: block;
border: 5px solid transparent;
position: relative;
}
.option_item1 .option_inner1 .icon {
margin-bottom: 10px;
}

.option_item1 .option_inner1 .name {
user-select: none;
}
.option_item1 .checkbox1:checked ~ .option_inner1.reddit {
background: orangered;
color: white;
height: 40px;
}
.checkbox1{
height:40px ;
}
.option_item1  .option_inner1.reddit{
height: 40px;
}



  </style>
