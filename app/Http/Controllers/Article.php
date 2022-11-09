<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pours;
use App\Models\Categories;
use App\Models\Modeles;
use App\Models\Articles;
use App\Models\Images;
use App\Models\Gestions;
use App\Models\Boutiques;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Article extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'boutique' => ['required'],
            'pour' => ['required'],
            'categorie' => ['required'],
            'modele' => ['required'],
            'image_1' => ['required'],
            'image_2' => ['required'],
            'image_3' => ['required'],
            'image_4' => ['required'],
            'prix' => ['required'],
            'commentaire' => ['required'],
        ]);
        
        try {
            
            // AJOUTER DANS LA BOUTIQUE
            $boutique = Boutiques::findOrFail($request->boutique);
            
            if($boutique->articles >= 1)
            {
                Boutiques::where('nom', $request->boutique)
                        ->update([
                            'articles' => (int)$boutique->articles + 1,
                        ]);
            } elseif($boutique->articles == 0){

                Boutiques::where('nom', $request->boutique)
                        ->update([
                            'articles' => 1,
                        ]);
            }

            // ARTICLE
            $id_pour = Pours::findOrFail($request->pour)->id;
            $id_categorie = Categories::findOrFail($request->categorie)->id;
            $id_modele = Modeles::findOrFail($request->modele)->id;
            
            $id_article = Articles::create([
                'boutique_id' => $request->boutique,
                'pour_id' => $id_pour,
                'categorie_id' => $id_categorie,
                'modele_id' => $id_modele,
                'prix' => $request->prix,
                'commentaire' => $request->commentaire,
            ])->id;

            // ENREGISTREMENT DES IMAGES ARTICLES
                // IMAGES 1
            $path_1 = $request->image_1->storeAs(
                'images/user/article'.$id_article,
                'image_1'.".".$request->image_1->getClientOriginalExtension(),
                's3',
            );
            dd("Images bien enregistrer dans la bdd");
            /*
            // Si la taille d'image est superieur 1.5mb Suprimer Envoi exception 
            if((((double)Storage::size("public/".$path_1) / 1024) / 1024) > 2.5)
            {
                Storage::disk('s3')->delete("public/".$path_1);
                // RETOUR AVEC MESSAGE
                Session::put('erreur', 'La photo est trop lourde doit avoir au max 2.5MB');
                return redirect()->route('index');
            }
                // IMAGES 2
            $path_2 = $request->image_2->storeAs(
                'images/user/article'.$id_article,
                'image_2'.".".$request->image_2->getClientOriginalExtension(),
                's3',
            );
            // Si la taille d'image est superieur 2.5mb Suprimer Envoi exception 
            if((((double)Storage::size("public/".$path_2) / 1024) / 1024) > 2.5)
            {
                Storage::disk('s3')->delete("public/".$path_2);
                // RETOUR AVEC MESSAGE
                Session::put('erreur', 'La photo est trop lourde doit avoir au max 2.5MB');
                return redirect()->route('index');
            }
            // IMAGES 3
            $path_3 = $request->image_3->storeAs(
                'images/user/article'.$id_article,
                'image_3'.".".$request->image_3->getClientOriginalExtension(),
                's3',
            );
            // Si la taille d'image est superieur 2.5mb Suprimer Envoi exception 
            if((((double)Storage::size("public/".$path_3) / 1024) / 1024) > 2.5)
            {
                Storage::disk('s3')->delete("public/".$path_3);
                // RETOUR AVEC MESSAGE
                Session::put('erreur', 'La photo est trop lourde doit avoir au max 2.5MB');
                return redirect()->route('index');
            }
            // IMAGES 4
            $path_4 = $request->image_4->storeAs(
                'images/user/article'.$id_article,
                'image_4'.".".$request->image_4->getClientOriginalExtension(),
                's3',
            );
            // Si la taille d'image est superieur 2.5mb Suprimer Envoi exception 
            if((((double)Storage::size("public/".$path_4) / 1024) / 1024) > 2.5)
            {
                Storage::disk('s3')->delete("public/".$path_4);
                // RETOUR AVEC MESSAGE
                Session::put('erreur', 'La photo est trop lourde doit avoir au max 2.5MB');
                return redirect()->route('index');
            }
            // ENREGISTREMENT IMAGES
            Images::create([
                'article_id' => $id_article,
                'path_1' => $path_1,
                'path_2' => $path_2,
                'path_3' => $path_3,
                'path_4' => $path_4,
            ]);
            // RETOUR AVEC MESSAGE
            Session::put('succes', 'Article ajouter avec sussès');
            return redirect()->route('index');*/

        } catch (Exception $e) {
            return redirect()->route('404');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $gestion = Gestions::findOrFail(1);
            $article = Articles::findOrFail($id);
            $pours = Pours::All();
            $categories = Categories::All();
            $modeles = Modeles::All();
            
            return view('pages.article.article_show', [
                'gestion' => $gestion,
                'article' => $article,
                'pours' => $pours,
                'categories' => $categories,
                'modeles' => $modeles,
                'notification' => parent::commande(),
                'tailles_1' => parent::taille_lettre(),
                'tailles_2' => parent::taille_chiffre(),
            ]);

        } catch (Exception $e) {
            return redirect()->route('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Articles::findOrFail($id);

        $request->validate([
            'pour' => ['required'],
            'categorie' => ['required'],
            'modele' => ['required'],
            'prix' => ['required'],
            'commentaire' => ['required'],
            'password' => ['required'],
        ]);
        
        if(password_verify($request->password, Auth::user()->password))
        {
            $article->update([
                        'pour' => $request->pour,
                        'categorie' => $request->categorie,
                        'modele' => $request->modele,
                        'prix' => $request->prix,
                        'commentaire' => $request->commentaire,
                    ]);
            Session::put('succes', 'Article modifier avec succès');

        } else{

            Session::put('erreur', 'Mot de passe incorect');

        }

        return redirect()->route('Articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
