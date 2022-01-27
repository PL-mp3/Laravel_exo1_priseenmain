@extends('index')
@section('section')
    <h2>
        Résultat de recherche
    </h2>

    @if (count($livres)==0)
        <p>Pas de livres trouvé</p>
    @else
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Résumé</th>
                <th scope="col">Prix</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livres as $livre)
                <tr>
                    <td>
                        {{ $livre->titre }}
                    </td>
                    <td>
                        {{ $livre->resume }}
                    </td>
                    <td>
                        {{ $livre->prix }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @endif
    

@endsection
