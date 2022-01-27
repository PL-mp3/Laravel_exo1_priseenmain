<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Categorie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('accueil', function () {
    return view('accueil');
});


Route::get('liste', function () {
    // SQL
    // $livres = DB::select('select*from ltp1livres')
    // ______________________________________________
    // Query Builder
    // $livres = DB::table('livres')->where('titre','like','%Tom%')->get();
    // ORM Eloquent
    $livres = Livre::get();
    // dump($livres);
    return view('liste',["livres"=>$livres]);
});

Route::get('meslivres', function () {
    $livres = Livre::join('categories','categories.id', '=', 'livres.categorie_id')->where('user_id','=',Auth::user()->id)->select('livres.id','livres.titre','livres.resume','livres.prix','categories.libelle')->get();
    // dump($livres);
    return view('meslivres',["livres"=>$livres]);
});

Route::get('ajouter', function() {
    $categories = Categorie::get();
    return view('ajouter', ["categories"=>$categories]);
});

Route::get('ajout', function (Request $request){
    $livre = new Livre;
    $livre->titre=$request->input('titre');
    $livre->resume=$request->input('resume');
    $livre->prix=$request->input('prix');
    $livre->user_id=$request->input('user_id');
    $livre->categorie_id=$request->input('categorie_id');
    if($livre->save()){
        $message = "Livre ajouté";
        return view('index',["message"=>$message]);
    }
    else{
        $message = "Erreur lors de l'ajout";
        return view('index',["message"=>$message]);
    }
});


Route::get('recherche', function (Request $request) {
    $livres = Livre::where('titre','like','%'.$request->input('search').'%')->get();
    // dump($livres);
    return view('recherche',["livres"=>$livres]);
});

Route::get('delete', function(Request $request){
    $livre = Livre::find($request->input('id'));
    $livre->delete();
    // affichage de la nouvelle listeaprès suppression
    $livres = Livre::join('categories','categories.id', '=', 'livres.categorie_id')->where('user_id','=',Auth::user()->id)->select('livres.id','livres.titre','livres.resume','livres.prix','categories.libelle')->get();
    // dump($livres);
    return view('meslivres',["livres"=>$livres]);
});

Route::get('modifier', function(Request $request){
    $livre = Livre::find($request->input('id'));
    $categories = Categorie::get();
    // dump($livre);
    return view('modifier',["livre"=>$livre, "categories"=>$categories]);
});

Route::get('valider_modif', function(Request $request){
    $livre = Livre::find($request->input('id'));
    $livre->titre=$request->input('titre');
    $livre->resume=$request->input('resume');
    $livre->prix=$request->input('prix');
    $livre->categorie_id=$request->input('categorie');
    if($livre->save()){
        $message = "Livre modifié";
        $livres = Livre::join('categories','categories.id', '=', 'livres.categorie_id')->where('user_id','=',Auth::user()->id)->select('livres.id','livres.titre','livres.resume','livres.prix','categories.libelle')->get();
    // dump($livres);
    return view('meslivres',["livres"=>$livres]);
    }
    else{
        $message = "Erreur lors de la modification";
        $livres = Livre::join('categories','categories.id', '=', 'livres.categorie_id')->where('user_id','=',Auth::user()->id)->select('livres.id','livres.titre','livres.resume','livres.prix','categories.libelle')->get();
    // dump($livres);
    return view('meslivres',["livres"=>$livres]);
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
