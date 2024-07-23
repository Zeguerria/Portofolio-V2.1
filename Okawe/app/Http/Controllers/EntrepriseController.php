<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEntrepriseRequest;
use App\Http\Requests\UpdateEntrepriseRequest;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['notifications'] = $data['user']->unreadNotifications;

        }
        $data['EntrepriseTotal']= Entreprise::where('supprimer','=',0)->count();
        $data['EntrepriseTotalC']= Entreprise::where('supprimer','=',1)->count();
        $data ['entreprises'] = Entreprise::where('supprimer','=',0)->orderBy('nom')->get();
        return view('admins.gestions.entreprises.entreprise')->with($data);
    }
    public function indexCorbeille()
    {
        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['notifications'] = $data['user']->unreadNotifications;

        }
        $data['EntrepriseTotal']= Entreprise::where('supprimer','=',0)->count();
        $data['EntrepriseTotalC']= Entreprise::where('supprimer','=',1)->count();
        $data ['entreprises'] = Entreprise::where('supprimer','=',1)->orderBy('nom')->get();
        return view('admins.gestions.entreprises.corbeilleentreprise')->with($data);
    }
    public function store(Request $request)
    {
        $nom= $request->nom;
        $responsable= $request->responsable;
        $phone= $request->phone;
        $periode= $request->periode;
        if(isset($request->photo) and !empty($request->photo)){

            $photo = Storage::putFile('public/images/entreprises', $request->file('photo'));
        }else{
            $photo = "storage/images/entreprises/profil.jpg";
        }
        try {
            Entreprise::create([
                'nom'=>$nom,
                'responsable'=>$responsable,
                'phone'=>$phone,
                'periode'=>$periode,
                'photo'=>$photo
            ]);
            toast('Entreprise ajoutée avec success','success');

        }
        catch(Exception $e) {
            toast("ajout de l'entreprise impossible",'danger');

        }
        return back();
    }

    public function update(Request $request)
    {
        //
        $entreprise = Entreprise::findOrfail($request->id);
        $nom= isset($request->nom)?$request->nom:$entreprise->nom;
        $responsable= isset($request->responsable)?$request->responsable:$entreprise->responsable;
        $phone= isset($request->phone)?$request->phone:$entreprise->phone;
        $periode= isset($request->periode)?$request->periode:$entreprise->periode;
        if(isset($request->photo) and !empty($request->photo)){
            $photo = Storage::putFile('public/images/entreprises', $request->file('photo'));
        }else{
            $photo = $entreprise->photo;
        }
        try {
            $entreprise->update([
                'nom'=>$nom,
                'responsable'=>$responsable,
                'phone'=>$phone,
                'periode'=>$periode,

                'photo'=>$photo
            ]);
            toast('Entreprise Modifié avec success','success');

        }
        catch(Exception $e) {
            toast("Modification de l'entreprise impossible",'danger');

        }
        return back();
    }
    public function corbeille(Request $request){
        $entreprise = Entreprise::findOrFail($request->id);
        try{
            $entreprise->update([
                'supprimer' =>1
            ]);
            toast('Entrprise supprimée avec success','success');

        }
        catch(Exception $e){
            toast("Supression de l'entreprise impossible",'danger');
        }
        return back();
    }
    public function destroy(Request $request)
    {
        $entreprise = Entreprise::findOrFail($request->id);
        try{
            $entreprise->delete();
            toast("Entreprise supprimée avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la suppression de l'entreprise !",'error');
        }
        return back();

    }
    public function corbeilleAll(Request $request){
        $entreprise = Entreprise::where('supprimer', 0)->get();
        try{
            foreach($entreprise as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Entrprise suppriméss avec success','danger');

        }
        catch(Exception $e){
            toast('Supression des entreprises impossible','danger');
        }
        return back();
    }
    public function recupUnCorbeille(Request $request){
        $entreprise = Entreprise::findOrFail($request->id);
        try{
            $entreprise->update([
                'supprimer' =>0
            ]);
            toast('Entreprise restorée avec success ','success');

        }
        catch(Exception $e){
            toast("Restauration l'entreprise impossible",'danger');
        }
        return back();
    }
    public function recupTousCorbeille(Request $request){
        $entreprise = Entreprise::where('supprimer', 1)->get();
        try{
            foreach($entreprise as $value){
                $value->update([
                    'supprimer' =>0
                ]);
            }
            toast('Entreprises restaurées avec success','primary');

        }
        catch(Exception $e){
            toast("Restauration des entreprises impossible",'danger');
        }
        return back();
    }
    public function destroyTous(Request $request){
        $entreprise = Entreprise::where('supprimer', 1)->get();
        try{
            foreach($entreprise as $value){
                $value->delete();
            }
            toast('Supression des entrprises éffectuée avec success','success');

        }
        catch(Exception $e){

            toast('Supression des entreprises impossible','warning');
        }
        return back();
    }
    public function switc($id){
        try{
            // Trouver l'entreprise cliquée ou échouer si non trouvée
            $clickedEntreprise = Entreprise::findOrFail($id);
            if ($clickedEntreprise->status == 0){
                // Trouver l'entreprise avec statut 1
                $activeEntreprise = Entreprise::where('status', 1)->first();
                // Si une entreprise avec statut 1 existe, mettre son statut à 0
                if ($activeEntreprise) {
                    try{
                        $activeEntreprise->update([
                            'status' =>0
                        ]);
                        toast("L'entreprise $activeEntreprise->nom n'est plus la dernière visité",'success');

                    }catch(Exception $e){
                        toast("L'entreprise $activeEntreprise->nom n'a pas pu etre changé",'danger');

                    }
                }
                try{
                    $clickedEntreprise->updateEntreprise([
                        'status' =>1
                    ]);
                    toast("L'entreprise $clickedEntreprise->nom est maintenant la dernière en cours",'success');

                }catch(Exception $e){
                    toast("L'entreprise $clickedEntreprise->nom n'a pas pu etre mis en cours",'danger');
                }
            }
            toast("Statut de l'entreprise changé avec succès",'success');

        }catch(Exception $e){
            toast("Impossible de changer le statut de l'entreprise ",'danger');

        }
        return back();

    }
    public function switch($id){
        $clickedEntreprise = Entreprise::findOrFail($id);
        $entreprise = Entreprise::where('supprimer', 0)->where('status','=', 1)->get();
        if ($clickedEntreprise->status == 0){
            try{
                foreach($entreprise as $value){
                    $value->update([
                        'status' =>0
                    ]);
                }
                // toast(' suppriméss avec success','danger');
            }
            catch(Exception $e){
                // toast('Supression des entreprises impossible','danger');
            }
            try{
                $clickedEntreprise->update([
                    'status' => 1
                ]);
                toast('Entreprise passé comme dernière en cours avec success','success');

            }catch(Exception $e){
                toast('Erreur survenu lors du changement de statut de cette entreprise','danger');

            }
            return back();
        }else{
            try{
                $clickedEntreprise->update([
                    'status' => 0
                ]);
                toast('Entreprise passé en statut normal avec success','success');

            }catch(Exception $e){
                toast('Erreur survenu lors du changement de statut de cette entreprise','danger');

            }
            return back();
            // toast('Cette entreprise est déja la dernière en cours ','success');

        }
        return back();


    }


}
