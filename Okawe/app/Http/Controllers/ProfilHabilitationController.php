<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Profil;
use App\Models\Projet;
use App\Models\Habilitation;
use Illuminate\Http\Request;
use App\Models\ProfilHabilitation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProfilHabilitationRequest;
use App\Http\Requests\UpdateProfilHabilitationRequest;

class ProfilHabilitationController extends Controller
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

        $data['ProfilHabilitationT']= ProfilHabilitation::where('supprimer','=',0)->count();
        $data['ProfilHabilitationTC']= ProfilHabilitation::where('supprimer','=',1)->count();
        $data['profils']= Profil::where('supprimer','=',0)->orderBy('libelle')->get();
        $data['habilitations']= Habilitation::where('supprimer','=',0)->orderBy('libelle')->get();

        $data['profilhabilitations']= ProfilHabilitation::where('supprimer','=',0)->orderBy('profil_id')->get();
        return view('admins.gestions.parametrages.profilhabilitations.profilhabilitation')->with($data);
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

        $data['ProfilHabilitationT']= ProfilHabilitation::where('supprimer','=',0)->count();
        $data['ProfilHabilitationTC']= ProfilHabilitation::where('supprimer','=',1)->count();
        $data['habilitations']= Habilitation::where('supprimer','=',0)->orderBy('libelle')->get();

        $data['profils']= Profil::where('supprimer','=',0)->orderBy('libelle')->get();

        $data['profilhabilitations']= ProfilHabilitation::where('supprimer','=',1)->orderBy('profil_id')->get();
        return view('admins.gestions.parametrages.profilhabilitations.corbeilleprofilhabilitation')->with($data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $profil_id= $request->profil_id;
        $habilitation_id= $request->habilitation_id;
        try {
            ProfilHabilitation::create([
                'profil_id'=>$profil_id,
                'habilitation_id'=>$habilitation_id
            ]);
            toast('Profil habilitation ajouté avec success','success');

        }
        catch(Exception $e) {
            toast('ajout du profil habilitation impossible','danger');

        }
        return back();
    }
    public function update(Request $request)
    {
        //
        $profilHabilitation = ProfilHabilitation::findOrfail($request->id);
        $profil_id= isset($request->profil_id)?$request->profil_id:$profilHabilitation->profil_id;
        $habilitation_id= isset($request->habilitation_id)?$request->habilitation_id:$profilHabilitation->habilitation_id;

        try{
            $profilHabilitation->update([
                'profil_id' => $profil_id,
                'habilitation_id' => $habilitation_id,
            ]);
            toast("Profil habilitation modifié avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la modification du profil habilitation",'error');
        }
        return back();
    }
    public function corbeille(Request $request){
        $profilHabilitation = ProfilHabilitation::findOrFail($request->id);
        try{
            $profilHabilitation->update([
                'supprimer' =>1
            ]);
            toast('Profil habilitation supprimé avec success','success');

        }
        catch(Exception $e){
            toast('Supression du profil habilitation impossible','danger');
        }
        return back();
    }

    public function destroy(Request $request)
    {
        $profilhabilitation = ProfilHabilitation::findOrFail($request->id);
        try{
            $profilhabilitation->delete();
            toast("Profil habilitation supprimé avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la suppression du profil habilitation !",'error');
        }
        return back();

    }
    public function corbeille_all(Request $request){
        $profilhabilitations = ProfilHabilitation::where('supprimer', 0)->get();
        try{
            foreach($profilhabilitations as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Profils habilitation supprimées avec success','danger');

        }
        catch(Exception $e){
            toast('Supression des profils habilitation impossible','danger');
        }
        return back();
    }
    public function recupUnCorbeille(Request $request){
        $profilhabilitation = ProfilHabilitation::findOrFail($request->id);
        try{
            $profilhabilitation->update([
                'supprimer' =>0
            ]);
            toast('Profil habilitation restoré avec success ','success');

        }
        catch(Exception $e){
            toast("Restauration du du profil habilitation impossible",'danger');
        }
        return back();
    }
    public function recupTousCorbeille(Request $request){
        $profilhabilitations = ProfilHabilitation::where('supprimer', 1)->get();
        try{
            foreach($profilhabilitations as $value){
                $value->update([
                    'supprimer' =>0
                ]);
            }
            toast('Profils habilitation restaurés avec success','primary');

        }
        catch(Exception $e){
            toast('Restauration des profils habilitation impossible','danger');
        }
        return back();
    }
    public function destroyTous(Request $request){
        $profilhabilitations = ProfilHabilitation::where('supprimer', 1)->get();
        try{
            foreach($profilhabilitations as $value){
                $value->delete();
            }
            toast('Supression des profils habilitation éffectuée avec success','success');

        }
        catch(Exception $e){

            toast('Supression des profils habilitation impossible','warning');
        }
        return back();
    }
}
