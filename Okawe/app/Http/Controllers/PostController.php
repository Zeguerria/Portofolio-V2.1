<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use App\Models\User;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;
use Intervention\Image\Facades\Image; // Importer la facade Intervention Image

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['notifications'] = $data['user']->unreadNotifications;
        }
        // DONNEE POUR LE FORMULAIR D'AJOUT D'UNE TACHE DANS LE HOMEADMIN DEBUT
        $data ['projets'] = Projet::where('supprimer','=',0)->orderBy('name')->get();
        $data ['users'] = User::where('profil_id','!=',1)->where('supprimer','=',0)->get();
    // DONNEE POUR LE FORMULAIR D'AJOUT D'UNE TACHE DANS LE HOMEADMIN FIN

        $data['PostT']= Post::where('supprimer','=',0)->count();
        $data['PostTC']= Post::where('supprimer','=',1)->count();
        $data['posts']= Post::where('supprimer','=',0)->orderBy('title')->get();
        return view('admins.gestions.posts.post')->with($data);
    }
    public function indexCorbeille(){
        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['notifications'] = $data['user']->unreadNotifications;
        }
        // DONNEE POUR LE FORMULAIR D'AJOUT D'UNE TACHE DANS LE HOMEADMIN DEBUT
        $data ['projets'] = Projet::where('supprimer','=',0)->orderBy('name')->get();
        $data ['users'] = User::where('profil_id','!=',1)->where('supprimer','=',0)->get();
    // DONNEE POUR LE FORMULAIR D'AJOUT D'UNE TACHE DANS LE HOMEADMIN FIN

        $data['PostT']= Post::where('supprimer','=',0)->count();
        $data['PostTC']= Post::where('supprimer','=',1)->count();
        $data['posts']= Post::where('supprimer','=',1)->orderBy('title')->get();
        return view('admins.gestions.posts.corbeillepost')->with($data);
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour le champ de photo
        ]);


        if(isset($request->photo) && !empty($request->photo)){

            $photo = Storage::putFile('public/images/posts', $request->file('photo'));
        }else{
            $photo = "storage/images/posts/post.jpg";
        }
        $title = $request->title;
        $content = $request->content;
        try{
            Post::create([
                'title'=>$title,
                'content'=>$content,
                'photo'=>$photo,
                'user_id' => Auth::user()->id,
            ]);
           toast("Post Ajouté avec succès",'success');

       }
       catch(Exception $e){
           toast('Ajout  du post impossible','danger');
        // die($e->getMessage());

       }
       return back();
    }
//     public function store(Request $request)
// {
//     // Valider la requête
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'content' => 'nullable|string',
//         'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour le champ de photo
//     ]);

//     // Vérifier si une photo a été téléchargée
//     if (isset($request->photo) && !empty($request->photo)) {
//         // Traiter l'image téléchargée
//         $image = $request->file('photo');
//         $fileName = 'post_' . time() . '.' . $image->getClientOriginalExtension();

//         // Enregistrer l'image dans le répertoire spécifié (par exemple, public/images/posts)
//         $path = $image->storeAs('public/images/posts', $fileName);

//         // Chemin de l'image pour l'enregistrement dans la base de données
//         $photoPath = 'storage/images/posts/' . $fileName;
//     } else {
//         // Aucune image téléchargée, utiliser une image par défaut
//         $photoPath = "storage/images/posts/default.jpg";
//     }

//     // Récupérer les données du formulaire
//     $title = $request->title;
//     $content = $request->content;

//     // Enregistrer le post dans la base de données
//     try {
//         Post::create([
//             'title' => $title,
//             'content' => $content,
//             'photo' => $photoPath, // Utiliser le chemin de l'image téléchargée ou par défaut
//             'user_id' => Auth::id(), // Récupérer l'ID de l'utilisateur actuellement authentifié
//         ]);

//         // Message de succès
//         toast("Post ajouté avec succès", 'success');
//     } catch (\Exception $e) {
//         // En cas d'erreur, afficher un message d'erreur
//         toast('Ajout du post impossible', 'danger');
//         // Vous pouvez utiliser dd($e->getMessage()) pour le débogage en cas d'erreur
//     }

//     return back(); // Rediriger l'utilisateur vers la page précédente
// }


    public function corbeille(Request $request){
        $post = Post::findOrFail($request->id);
        try{
            $post->update([
                'supprimer' =>1
            ]);
            toast('Post supprimé avec success','success');

        }
        catch(Exception $e){
            toast("Supression du post impossible",'danger');
        }
        return back();
    }

    public function update(Request $request)
    {
        $post = Post::findOrfail($request->id);
        $title= isset($request->title)?$request->title:$post->title;
        $content= isset($request->content)?$request->content:$post->content;
        $user_id= isset($request->user_id)?$request->user_id:$post->user_id;
        if(isset($request->photo) and !empty($request->photo)){
            $photo = Storage::putFile('public/images/posts', $request->file('photo'));
        }else{
            $photo = $post->photo;
        }

        try{
            $post->update([
                'title'=>$title,
                'content'=>$content,
                'photo'=>$photo,
                'user_id' => Auth::user()->id,
            ]);
            toast("Post modifié avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la modification du post",'error');
        }
        return back();
    }

    public function destroy(Request $request)
    {
        $post = Post::findOrFail($request->id);
        try{
            $post->delete();
            toast("Post supprimé avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la suppression du post !",'error');
        }
        return back();

    }
    public function corbeille_all(Request $request){
        $posts = post::where('supprimer', 0)->get();
        try{
            foreach($posts as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Posts supprimés avec success','danger');

        }
        catch(Exception $e){
            toast('Supression des posts impossible','danger');
        }
        return back();
    }
    public function recupUnCorbeille(Request $request){
        $post = Post::findOrFail($request->id);
        try{
            $post->update([
                'supprimer' =>0
            ]);
            toast('Post restoré avec success ','success');

        }
        catch(Exception $e){
            toast("Restauration du post impossible",'danger');
        }
        return back();
    }
    public function recupTousCorbeille(Request $request){
        $posts = Post::where('supprimer', 1)->get();
        try{
            foreach($posts as $value){
                $value->update([
                    'supprimer' =>0
                ]);
            }
            toast('Posts restaurés avec success','primary');

        }
        catch(Exception $e){
            toast('Restauration des posts impossible','danger');
        }
        return back();
    }
    public function destroyTous(Request $request){
        $posts = Post::where('supprimer', 1)->get();
        try{
            foreach($posts as $value){
                $value->delete();
            }
            toast('Supression des posts éffectué avec success','success');

        }
        catch(Exception $e){

            toast('Supression des posts impossible','warning');
        }
        return back();
    }
    // CHART DONAUT POST DEBUT
        public function chartpost(){
            // / Récupérer les posts avec le nombre de commentaires
                $data['posts'] = Post::withCount('comments')->get();
                return response()->json($data);

        }
    // CHART DONAUT POST FIN
}
