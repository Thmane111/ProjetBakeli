<div class="modal fade" id="popdelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form  id="destroy{{$sous_cats->id}}" action="{{route('sous_categorie.destroy',$sous_cats->id)}}" method="POST">
                    <input type="hidden" id="id_f" value="{{$sous_cats->id}}" name="id_f">
                    @csrf
                    @method('DELETE')


                    <center><h5 style="font-size: 18px;"> Voulez-vous supprimer ce sous catégorie.</h5></center>


               </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </form>
        </div>
    </div>
</div>