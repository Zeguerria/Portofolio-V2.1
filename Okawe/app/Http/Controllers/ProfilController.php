<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProfilRequest;
use App\Http\Requests\UpdateProfilRequest;

class ProfilController extends Controller
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
        $data['ProfilT']= Profil::where('supprimer','=',0)->count();
        $data['ProfilTC']= Profil::where('supprimer','=',1)->count();
        $data['profils']= Profil::where('supprimer','=',0)->orderBy('libelle')->get();
        return view('admins.gestions.parametrages.profils.profil')->with($data);
    }
    public function indexCorbeille(){
        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['notifications'] = $data['user']->unreadNotifications;

        }
        $data['ProfilT']= Profil::where('supprimer','=',0)->count();
        $data['ProfilTC']= Profil::where('supprimer','=',1)->count();
        $data['profils']= Profil::where('supprimer','=',1)->orderBy('libelle')->get();
        return view('admins.gestions.parametrages.profils.corbeilleprofil')->with($data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $code= $request->code;
        $libelle= $request->libelle;
        $description= $request->description;
        try {
            Profil::create([
                'code'=>$code,
                'libelle'=>$libelle,
                'description'=>$description
            ]);
            toast('Profil ajouté avec success','success');

        }
        catch(Exception $e) {
            toast('ajout du profil impossible','danger');

        }
        return back();
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $profil = Profil::findOrfail($request->id);
        $code= isset($request->code)?$request->code:$profil->code;
        $libelle= isset($request->libelle)?$request->libelle:$profil->libelle;
        $description= isset($request->description)?$request->description:$profil->description;

        try{
            $profil->update([
                'code' => $code,
                'libelle' => $libelle,
                'description' => $description,


            ]);
            toast("Profil modifié avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la modification du profil",'error');
        }
        return back();
    }
    public function corbeille(Request $request){
        $profil = Profil::findOrFail($request->id);
        try{
            $profil->update([
                'supprimer' =>1
            ]);
            toast('Profil supprimé avec success','success');

        }
        catch(Exception $e){
            toast('Supression du profil impossible','danger');
        }
        return back();
    }

    public function destroy(Request $request)
    {
        $profil = Profil::findOrFail($request->id);
        try{
            $profil->delete();
            toast("Profil supprimé avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la suppression du profil !",'error');
        }
        return back();

    }
    public function corbeille_all(Request $request){
        $profils = Profil::where('supprimer', 0)->get();
        try{
            foreach($profils as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Profils supprimés avec success','danger');

        }
        catch(Exception $e){
            toast('Supression des profils impossible','danger');
        }
        return back();
    }
    public function recupUnCorbeille(Request $request){
        $profil = Profil::findOrFail($request->id);
        try{
            $profil->update([
                'supprimer' =>0
            ]);
            toast('Profil restoré avec success ','success');

        }
        catch(Exception $e){
            toast("Restauration du profil impossible",'danger');
        }
        return back();
    }
    public function recupTousCorbeille(Request $request){
        $profils = Profil::where('supprimer', 1)->get();
        try{
            foreach($profils as $value){
                $value->update([
                    'supprimer' =>0
                ]);
            }
            toast('Profils restaurés avec success','primary');

        }
        catch(Exception $e){
            toast('Restauration des profils impossible','danger');
        }
        return back();
    }
    public function destroyTous(Request $request){
        $profils = Profil::where('supprimer', 1)->get();
        try{
            foreach($profils as $value){
                $value->delete();
            }
            toast('Supression des profils éffectué avec success','success');

        }
        catch(Exception $e){

            toast('Supression des profils impossible','warning');
        }
        return back();
    }
}
