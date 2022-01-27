@extends('index')
@section('section')
    <h2>
        Liste de mes livres
    </h2>
    @if (count($livres) == 0)
        <p>Pas de livres trouvé</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Résumé</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Gérer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livres as $livre)
                    <tr>
                        <td>
                            {{ $livre->id }}
                        </td>
                        <td>
                            {{ $livre->titre }}
                        </td>
                        <td>
                            {{ $livre->resume }}
                        </td>
                        <td>
                            {{ $livre->prix }}
                        </td>
                        <td>
                            {{ $livre->libelle }}
                        </td>
                        <td>
                            <form class="d-flex" action="delete">
                                <button name="delete" type="submit" class="btn btn-danger">Supprimer</button>
                                <input type="hidden" name="id" value="{{$livre->id}}">
                            </form>
                        </td>
                        <td>
                            <form class="d-flex" action="modifier">
                                <button type="submit" class="btn btn-warning">Modifier</button>
                                <input type="hidden" name="id" value="{{$livre->id}}">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
