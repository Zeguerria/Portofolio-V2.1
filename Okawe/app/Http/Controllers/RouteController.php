<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use App\Models\User;
use App\Models\Profil;
use App\Models\Projet;
use App\Models\Comment;
use App\Models\Visitor;
use App\Models\Parametre;
use App\Models\Entreprise;
use App\Models\Realisation;
use App\Models\Habilitation;
use Illuminate\Http\Request;
use App\Models\TypeParametre;
use App\Models\CompetenceMaitrise;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewCommentNotification;

class RouteController extends Controller
{
    //
    //les redirections
    public function lesdirections(Request $request){
        //client totats
        $profil=Auth::user()->profil_id;

        if($profil=='3'){
            //SUPERADMIN
            return redirect()->route('HomeAdmin');
            // return redirect()->route('HomeAdmin')->with($data);

        }elseif($profil=='2'){
            //Admin
            return redirect()->route('HomeAdmin');
            // return redirect()->route('HomeAdmin')->with($data);

        }else{
            return redirect()->route('Portofolio');
            // return redirect()->route('HomeSite')->with($data);
        }
    }
    public function Home()
    {
        // DONNEE POUR LE FORMULAIR D'AJOUT D'UNE TACHE DANS LE HOMEADMIN DEBUT
            $data ['projets'] = Projet::where('supprimer','=',0)->orderBy('name')->get();
            $data ['users'] = User::where('profil_id','!=',1)->where('supprimer','=',0)->get();
        // DONNEE POUR LE FORMULAIR D'AJOUT D'UNE TACHE DANS LE HOMEADMIN FIN

        // REALISATION TOTAL DEBUT
            $data['RealisationTotal']= Realisation::where('supprimer','=',0)->count();
        // REALISATION TOTAL FIN
        // COMPTENCENTS ET MAITRISE TOTAL DEBUT
            $data['CompTotal'] =CompetenceMaitrise::where('supprimer', 0)->count();
        // COMPTENCENTS ET MAITRISE TOTAL FIN
        // POSTS TOTAL DEBUT
        $data['PostT']= Post::where('supprimer','=',0)->count();
        // POSTS TOTAL FIN
        // PROJET TOTAL DEBUT
        $data['ProjetTotal']= Projet::where('supprimer','=',0)->count();
        // PROJET TOTAL FIN


        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['notifications'] = $data['user']->unreadNotifications;

        }
        $data['parametrett']=Parametre::where('supprimer','=',0)->count();
        $data['typeparametrett']=TypeParametre::where('supprimer','=',0)->count();
        $data['utilisateurtt']=User::where('supprimer','=',0)->where('profil_id','=',1)->count();
        $data['admintt']=User::where('supprimer','=',0)->where('profil_id','!=',1)->count();
        $data['habilitationtt']=Habilitation::where('supprimer','=',0)->count();
        $data['profiltt']=Profil::where('supprimer','=',0)->count();


        // Ajoutez d'autres données nécessaires à la vue
        $data['competences'] = CompetenceMaitrise::where('supprimer', 0)->where('type_id', 4)->get();
        $data['maitrises'] = CompetenceMaitrise::where('supprimer', 0)->where('type_id', 5)->get();

        return view('admins.menus.home')->with($data);
    }



    public function Portofolio(Request $request){
        // Visitor::create([
        //     'ip_address' => $request->ip(),
        //     'visited_at' => now(),
        // ]);
        // Obtenez l'adresse IP de la requête
        $ipAddress = $request->ip();

        // Vérifiez si une visite pour cette IP a déjà été enregistrée aujourd'hui
        $existingVisit = Visitor::where('ip_address', $ipAddress)
                                ->whereDate('visited_at', now()->toDateString())
                                ->first();
        if (!$existingVisit) {
            // Enregistrer la visite seulement si elle n'a pas encore été enregistrée pour aujourd'hui
            Visitor::create([
                'ip_address' => $ipAddress,
                'visited_at' => now(),
            ]);
        }

        $data['posts']=Post::where('supprimer','=',0)->orderBy('title')->get();
        $data['categories']= Parametre::where('supprimer','=',0)->orderBy('libelle')->get();
        $data['equipe'] = Realisation::where('supprimer','=',0)->where('categorie_id','=',3)->orderBy('titre')->get();
        $data['personnelle'] = Realisation::where('supprimer','=',0)->where('categorie_id','=',2)->orderBy('titre')->get();
        $data['maitrises'] = CompetenceMaitrise::where('supprimer', 0)->where('type_id', '=', 4)->orderBy('nom')->take(3)->get();
        $data['suitemaitrises'] = CompetenceMaitrise::where('supprimer', 0)->where('type_id', '=', 4)->orderBy('nom')->take(PHP_INT_MAX)->skip(3) ->get();


        $data[ 'competences'] = CompetenceMaitrise::where('supprimer', 0)->where('type_id','=',5)->orderBy('nom')->take(3)->get();
        $data['suitecompetences'] = CompetenceMaitrise::where('supprimer', 0)->where('type_id', '=', 5)->orderBy('nom')->take(PHP_INT_MAX)->skip(3) ->get();
        // Entreprises
        $data['dernierreentreprises'] =Entreprise::where('supprimer',0)->where('status',1)->get();
        $data[ 'entreprises'] = Entreprise::where('supprimer', 0)->where('status','=',0)->orderBy('nom')->take(4)->get();
        $data['suiteentreprises'] = Entreprise::where('supprimer', 0)->where('status','=',0)->orderBy('nom')->take(PHP_INT_MAX)->skip(4)->get();

        return view('portofolios.homes.home')->with($data);

    }
    public function chat($id)
    {
        $data['post'] = Post::findOrFail($id);

        return view('portofolios.blogs.blog')->with($data);
    }



    //MARQU VUE A LA NOTIFICATION
    public function markAsRead($id)
    {
        try{
            $notification = auth()->user()->notifications()->findOrFail($id);
            $notification->markAsRead();
            toast("Notification marquée vu avec succès", 'success');

        } catch (Exception $e) {
            toast("Impossible de marquer la notification comme vu", 'danger');
        }
        return back();

        // return redirect()->back()->with('success', 'Notification marquée comme lue.');
    }
    public function adminReply(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => 'required|string',
        ]);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('public/images/commentaires');
        } else {
            $photo = null; // Assurez-vous d'avoir un avatar par défaut dans le dossier public
        }

        try {
            $reply = new Comment();
            $reply->body = $request->body;
            $reply->photo = $photo;
            $reply->post_id = $comment->post_id;
            $reply->parent_id = $comment->id;
            $reply->user_id = Auth::id();
            $reply->save();
            // Marquer la notification comme lue
            $notification = Auth::user()->notifications()->where('data->comment_id', $comment->id)->first();
            if ($notification) {
                $notification->markAsRead();
            }
            toast("Réponse envoyée et notification marquée vu avec succès", 'success');

        } catch (Exception $e) {
          toast("Impossible d'envoyer la réponse", 'danger');
        }






        return back();
    }
    // VISITEURS DEBUT
    public function getVisitorData()
    {
        $visitors = Visitor::select(DB::raw('MONTH(visited_at) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('MONTH(visited_at)'))
            ->pluck('count', 'month')
            ->toArray();

        return response()->json($visitors);
    }
    // VISITEURS FIN




}
