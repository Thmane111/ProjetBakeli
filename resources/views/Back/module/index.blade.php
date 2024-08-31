<?php
use App\Models\Module;
use App\Models\Permission;
use App\Models\Attribution;
$comp=0; ?>
@extends('Back.index')


@section('content')
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Liste des modules</a></li>
        </ol>
    </div>

    <div class="row">


      <tr>
      @if($errors->any())
       @foreach($errors->All() as $error)
       <div class="alert alert-icon alert-danger">
         {{session('errors')}}
      </div>
       @endforeach
       @endif
       @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>{{session::get('error')}}</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>{{session::get('message')}}</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
    </div>
    @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                    <?php
                    $attrib=Attribution::All()->where('admins_id','=',Auth::guard('admin')->user()->id)->first();

                    if($mod_count!=0){
                            if($modESSS!=0){
                     $ver=Permission::all()->where('groupe_id','=',$attrib->groupe_id)
                                                    ->where('module_id','=',$modES->id)
                                                    ->where('etat','=',1)->count();


                                                    if($ver!=0){

                         $mod3=Permission::all()->where('groupe_id','=',$attrib->groupe_id )
                                                    ->where('module_id','=',$modES->id)
                                                    ->where('etat','=',1)->first();



                            if($mod3->permission=="Ajouter"){
                              echo  "<button type='button' class='btn btn-primary mb-2' data-toggle='modal' data-target='#exampleModalpopover'>Ajouter un nouveau ".$modES->dimunitif."</button>";
                            }else{
                                echo "<button type='button' class='btn btn-primary mb-2' data-toggle='modal' data-target='#exampleModalpopover'>Ajouter un nouveau </button> ";
                            }

                        ?>


                    <?php }else{
                        echo" ";
                    }}else{
                        echo " ";}
                    }else{
                        echo "<button type='button' class='btn btn-primary mb-2' data-toggle='modal' data-target='#exampleModalpopover'>Ajouter un nouveau module </button>";
                    }  ?>
<button type='button' class='btn btn-primary mb-2' data-toggle='modal' data-target='#exampleModalpopover'>Ajouter un nouveau </button>
                    <!-- Modal -->
                    {{-- <button type='button' class='btn btn-primary mb-2' data-bs-toggle='modal' data-bs-target='#exampleModalpopover'>dss</button>; --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>#</strong></th>
                                    <th><strong>Nom module</strong></th>
                                    <th><strong>Caption</strong></th>
                                    <th style="display: none;"><strong>DETAIL</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th style="display: none;"><strong>Parent</strong></th>
                                    <th style="display: none;"><strong>Id</strong></th>


                                </tr>
                            </thead>
                            <tbody>
                               @if($mod_count!=0)
                                @foreach($mod as $mods)

                                <tr>
                                    <td>{{$comp++;}}</td>
                                    <td>{{$mods->nom_module}}</td>
                                    <td>{{$mods->dimunitif}}</td>
                                    <td style="display: none;">{{$mods->detail}}</td>
                                    <td>@if($mods->etat==0)
                                        <span class="badge light badge-danger" style="font-size:15px; ">desactver</span>
                                        @elseif($mods->etat==1)
                                        <span class="badge light badge-success" style="font-size:15px; ">activer</span>
                                        @endif
                                    </td>
                                       <td style="display: none;">
                                        <?php

                                            $pa=Module::all()->where('parent','=',$mods->parent)->first();
                                            if($pa->parent==0){
                                                echo "Aucun parent";
                                            }else{
                                                echo $pa->nom_module;
                                            }
                                            ?>

                                       </td>
                                       <td style="display: none;">{{$mods->id}}</td>

                                    <td>
                                        <div class="dropdown">

                                            <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                            </button>

                                            <div class="dropdown-menu">
                                                <?php

                                                    $attrib=Attribution::All()->where('admins_id','=',Auth::guard('admin')->user()->id)->first();
                                                    $modCount=Permission::all()->where('groupe_id','=',$attrib->groupe_id)
                                                    ->where('module_id','=',$mods->id)
                                                    ->where('etat','=',1)->count();
                                                     if($modCount!=0){
                                                    $mod2=Permission::all()->where('groupe_id','=',$attrib->groupe_id)
                                                    ->where('module_id','=',$mods->id)
                                                    ->where('etat','=',1)
                                                    ;
                                                   foreach ($mod2 as $mod22) {

                                                ?>
                                                @if($mod22->permission=="state")
                                                <a class="dropdown-item state" href="#">@if($mods->etat==0)
                                                    activer
                                                    @else desactiver
                                                    @endif
                                                   </a>
                                                   @elseif($mod22->permission!="Ajouter")
                                                <button type="button" class="dropdown-item {{$mod22->permission}}

                                                ">{{$mod22->permission}}</button>

                                              @endif

                                                <?php }

                                            }else{
                                                    echo"
                                                     <button type='button' class='dropdown-item Modifier'>Edit</button>
                                                    <button data-target='#popview' class='dropdown-item Voir'>Voir</button>
                                                    <a class='dropdown-item Supprimer' href='#'>Delete</a>
                                                    <a class='dropdown-item state' href='#'>";if($mods->etat==0){echo 'activer';}else{echo 'desactiver';} echo "</a>";

                                                }

                                                ?>
                                            </div>
                                        </div>

                                    </td>

                                </tr>

                                @endforeach
                                @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


                            <script>
                              function confirmer(){
                                if(confirm('confirmer vous la suppression'))return true;
                                else return false ;
                              }
                            </script>
                            @include('Back.module.add')
@if( $mod_count!=0)
@include('Back.module.edit')
@include('Back.module.view')
@include('Back.module.delete')
@include('Back.module.state')
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<script>
    $(document).ready(function (){

        $('.Modifier').on('click', function (){

            $('#eexampleModalpopover').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          console.log(data);
            $('#update_id').val(data[6]);
            $('#nom_module').val(data[1]);
            $('#caption').val(data[2]);
        });
    });
</script>

<script>
    $(document).ready(function (){

        $('.Voir').on('click', function (){

            $('#popview').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          //alert(data);
          console.log(data);

            $('#nom_module1').html(data[1]);
            $('#dim1').html(data[2]);
            $('#desc1').html(data[3]);
            $('#etat1').html(data[4]);
            $('#parent1').html(data[5]);

        });
    });
</script>


<script>
    $(document).ready(function (){

        $('.Supprimer').on('click', function (){

            $('#popdelete').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          //alert(data);
          console.log(data);

          $('#id_f').val(data[6]);


        });
    });
</script>
<script>
    $(document).ready(function (){

        $('.state').on('click', function (){

            $('#popstate').modal('show');

            $tr= $(this).closest('tr');
            var data= $tr.children("td").map(function() {
              return $(this).text();
            }).get();
          //alert(data);
          console.log(data);

          $('#id_s').val(data[6]);


        });
    });
</script>
@endsection
