@extends('index')
@section('section')
    <form action="valider_modif" method="get">
        <div class="mb-3">
            <label for="titre" class="form-label">Titre du livre</label>
            <input type="text" class="form-control" id="titre" name="titre" ariadescribedby="titre" value="{{$livre->titre}}">
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Catégorie</label>
            <select class="form-select" aria-label="Default select example" name="categorie" id="categorie">
                @foreach ($categories as $cat)
                    @if ($cat->id == $livre->categorie_id)
                        <option selected value="{{$cat->id}}">{{$cat->libelle}}</option>
                    @else
                        <option value="{{$cat->id}}">{{$cat->libelle}}</option>  
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="resume" class="form-label">Resumé</label>
            <input type="text" class="form-control" id="resume" name="resume" value="{{$livre->resume}}">
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix du livre</label>
            <input type="text" class="form-control" id="prix" name="prix" value="{{$livre->prix}}">
        </div>
        <input type="hidden" id="id" name="id" value="{{$livre->id}}">
        <button type="submit" class="btn btn-primary" name="valider_modif">Valider</button>
    </form>
@stop
