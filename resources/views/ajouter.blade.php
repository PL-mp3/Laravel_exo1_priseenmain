@extends('index')
@section('section')
    <form action="ajout" method="get">
        <div class="mb-3">
            <label for="titre" class="form-label">Titre du livre</label>
            <input required="required" type="text" class="form-control" id="titre" name="titre" ariadescribedby="titre">
        </div>
        <div class="mb-3">
            <label for="resume" class="form-label">Resumé</label>
            <input required="required" type="text" class="form-control" id="resume" name="resume">
        </div>
        <div class="mb-3">
            <label for="resume" class="form-label">Catégorie</label>
            <select name="categorie_id" class="form-select" aria-label="Default select example">
                @foreach ($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->libelle}}</option> 
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix du livre</label>
            <input required="required" type="text" class="form-control" id="prix" name="prix">
            <input type="hidden" class="form-control" id="user_id" name="user_id" value={{ Auth::user()->id }}>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
@stop
