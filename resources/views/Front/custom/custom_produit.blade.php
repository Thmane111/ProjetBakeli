@extends('Front.index')
@section('content')
<div id="content-wrapper">


		<div class="column" id="haut">
			<img id=featured src="/uploads/Annonce/{{$voirs->image_1}}" style="width:100%;height:400px;">

			<div id="slide-wrapper" >
                <img id="slideleft" class="arrow" src="{{asset('Front/images/arrow-left.png')}}">

				<div id="slider">

					<img class="thumbnail active" src="/uploads/Annonce/{{$voirs->image_1}}">


					<img class="thumbnail" src="@if($voirs->image_2=='') /image/vide.gif @elseif($voirs->image_2!=' ')
                    /uploads/Annonce/{{$voirs->image_2}} @endif
                    ">



					<img class="thumbnail" src="@if($voirs->image_3=='') /image/vide.gif @elseif($voirs->image_3!=' ')
                    /uploads/Annonce/{{$voirs->image_3}} @endif">



					<img class="thumbnail " src="@if($voirs->image_4=='') /image/vide.gif @elseif($voirs->image_4!=' ')
                    /uploads/Annonce/{{$voirs->image_4}} @endif">



				</div>

				<img id="slideRight" class="arrow" src="{{asset('Front/images/arrow-right.png')}}">

			</div>
		</div>


		<div class="column" >

        <div class="dff">
		<div class="df" style="margin-left:9px;">



                                     </div>
        </div>


        <div class="col-xl-7 col-lg-6">
            <div class="product-details-content-area product-details--golden" data-aos="fade-up"
                data-aos-delay="200">
                <!-- Start  Product Details Text Area-->
                <div class="product-details-text">
                    <h4 class="title d-flex" style="background: #ad0a0a;">
                        <div class="rond-img" style="width:40px;height:40px;justify-content:left;background:#ad0a0a;border-radius: 50px;">
                            <img src="/photo/profile/{{$voirs->User ? $voirs->User->image:''}}" style="width:40px;height:40px;border-radius: 50px;">
                        </div>
                          <p style="font-size: 20px;padding:5px;">{{ $voirs->User ? $voirs->User->prenom:'' }} {{ $voirs->User ? $voirs->User->name:'' }}<br>


                        </p>

                    </h4>
                    <br>
                    <div class="d-flex align-items-center">
                        <ul class="review-star d-flex">
                            <li class="btn btn-lg" style="padding:4px;text-align:center;color:white;">   <a style="color: black;" href="#"data-bs-toggle="modal" style="color: white;" data-bs-target="#modalAddcart"
                                style="border-radius:20px;"
                               ><img src="{{asset('image/tel.jpg')}}" width="20px;"height="20px;"> telephone</a> </li>



                             <li  class="btn btn-lg" style="margin-left:15px;padding:4px;text-align:center;">  <a style="color:black;" href="https://web.whatsapp.com/send?phone=+22246463096&text=Test%20Link%20WhatsApp" style="color: white;"

                               ><img src="{{asset('image/wt.png')}}" width="25px;"height="25px;"> whatsapp</a></li>






                        </ul>

                    </div>
                    <br>
                    <div class="price">
                        <h3 style="color: #ad0a0a;"><strong>{{$voirs->prix_prod}} MRU</strong></h3>
                    </div>

                    <div class="price">
                        <h5><strong>{{$voirs->titre_prod}}</strong></h5>
                    </div>
                    <div class="product-details-variable"style="padding:0px;">

                        <div class="product-details-meta" style="width:350px;padding:0px;">
                            <a href="wishlist.html" class="icon-space-left">    <i class="fa fa-map-marker" style="font-size:25px; "></i>  Mauritanie, Nouadhibou</a>
                            <a href="compare.html" class="icon-space-right"><i class="fa fa-bookmark" aria-hidden="true"></i>{{$voirs->sous__categorie ? $voirs->sous__categorie->nom_type:''}}</a>

                        </div>


                        <center><a href="compare.html" class="icon-space-right">{{$voirs->created_at}} <i class="fa fa-clock-o" aria-hidden="true"></i>
                        </a></center>




                    </div> <!-- End Product Variable Area -->
                     <div class="col-24" id="lag">
                        <strong><h3>detail du produit</h3></strong>
                    <p>{{$voirs->description}}</p>
                    </div>
                </div> <!-- End  Product Details Text Area-->
                <!-- Start Product Variable Area -->





            </div>
        </div>
			<hr>






			<a class="btn33" href="#">Signalez ce vendeur</a>
		</div>

	</div>


    @include('Front/custom/custom_contact');

	<script type="text/javascript">
		let thumbnails = document.getElementsByClassName('thumbnail')

		let activeImages = document.getElementsByClassName('active')

		for (var i=0; i < thumbnails.length; i++){

			thumbnails[i].addEventListener('mouseover', function(){
				console.log(activeImages)

				if (activeImages.length > 0){
					activeImages[0].classList.remove('active')
				}


				this.classList.add('active')
				document.getElementById('featured').src = this.src
			})
		}


		let buttonRight = document.getElementById('slideRight');
		let buttonLeft = document.getElementById('slideLeft');

		buttonLeft.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft -= 180
		})

		buttonRight.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft += 180
		})


	</script>

<style>
    .df{
    display: flex;


    }
    .dff{
    display: flex;
    justify-content: center;
    margin-top: 30px;;
    }
    #haut{
        margin-top:-0%;
    }
</style>
<style>

#content-wrapper{
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
}
#lag{
width: 450px;
}

.column{
	width: 500px;
	padding: 10px;


}
.btn33
{
    font-size: 18px;
    padding: 7px;
    border: solid 2px #ad0a0a;
}

#featured{
	max-width: 500px;
	max-height: 600px;
	object-fit: cover;
	cursor: pointer;
	border: 2px solid #ad0a0a;
    border-radius: 20px;

}

.thumbnail{
	object-fit: cover;
	max-width: 180px;
	max-height: 100px;
	cursor: pointer;
	opacity: 0.5;
	margin: 5px;
	border: 2px solid black;

}

.thumbnail:hover{
	opacity:1;
}

.active{
	opacity: 1;
}

#slide-wrapper{
	max-width: 500px;
	display: flex;
	min-height: 100px;
	align-items: center;
}

#slider{
	width: 440px;
	display: flex;
	flex-wrap: nowrap;
	overflow-x: auto;

}

#slider::-webkit-scrollbar {
		width: 8px;

}

#slider::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);

}

#slider::-webkit-scrollbar-thumb {
  background-color:#ad0a0a;
  outline: 1px solid slategrey;
   border-radius: 100px;

}

#slider::-webkit-scrollbar-thumb:hover{
    background-color:#ad0a0a;
}

.arrow{
	width: 30px;
	height: 30px;
	cursor: pointer;
	transition: .3s;
}

.arrow:hover{
	opacity: .5;
	width: 35px;
	height: 35px;
}
@media screen and (max-width:800px){
body #featured{
width:100% ;
}
#haut{
    margin-top:0%;
    padding: 10px;
    width: 300px;

}

#lag{
width: 350px;
}

}

</style>


















<style>
                                .rows{
                                display:flex;
                                 ;align-items:center;
                                 ;flex-wrap: wrap;
                                 justify-content: space-around
                                 ;
                                }
                                .row1{
                                  max-width: 1000px;
                                  margin: auto;
                                  padding-right:25px ;
                                  padding-left:25px ;
                                }
                                .single-product{
                                margin-top: 80px;
                                }
                                .small-img-row{
                                    display: flex;
                                    justify-content: space-around;
                                }

                                .rows img{
                                max-width:100%;
                                ;padding:10px 0 ;
                                }

                                .small-img-col{
                                flex-basis: 24%;
                                cursor: pointer;
                                }
                                .row1 .col-2 img{
                                    max-width: 100%;
                                    padding: 50px 0;
                                    margin: 25px 0;
                                }.single-product .col-2 img{
padding: 0;
}
.single-product .col-2{
padding: 20px;
  }
  .df p a{
                                            background:red;
                                            font-size:17px;
                                            color: white;
                                            padding-top:4px;
                                            padding-left:10px;
                                            padding-right:10px;
                                            padding-bottom:4px;
                                        }
                                        .dff{
                                        display:flex ;
                                        }
                            </style>


@endsection
