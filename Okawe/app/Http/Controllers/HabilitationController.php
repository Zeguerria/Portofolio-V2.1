<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Habilitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreHabilitationRequest;
use App\Http\Requests\UpdateHabilitationRequest;

class HabilitationController extends Controller
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
        $data['HabilitationT']= Habilitation::where('supprimer','=',0)->count();
        $data['HabilitationTC']= Habilitation::where('supprimer','=',1)->count();
        $data['habilitations']= Habilitation::where('supprimer','=',0)->orderBy('libelle')->get();
        return view('admins.gestions.parametrages.habilitations.habilitation')->with($data);
    }
    public function indexCorbeille(){
        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['notifications'] = $data['user']->unreadNotifications;

        }
        $data['HabilitationT']= Habilitation::where('supprimer','=',0)->count();
        $data['HabilitationTC']= Habilitation::where('supprimer','=',1)->count();
        $data['habilitations']= Habilitation::where('supprimer','=',1)->orderBy('libelle')->get();
        return view('admins.gestions.parametrages.habilitations.corbeillehabilitation')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            Habilitation::create([
                'code'=>$code,
                'libelle'=>$libelle,
                'description'=>$description
            ]);
            toast('Habilitation ajoutée avec success','success');

        }
        catch(Exception $e) {
            toast("ajout du Type de l'habilitation impossible",'danger');

        }
        return back();
    }

    public function update(Request $request)
    {

        $habilitation = Habilitation::findOrfail($request->id);
        $code= isset($request->code)?$request->code:$habilitation->code;
        $libelle= isset($request->libelle)?$request->libelle:$habilitation->libelle;
        $description= isset($request->description)?$request->description:$habilitation->description;

        try{
            $habilitation->update([
                'code' => $code,
                'libelle' => $libelle,
                'description' => $description,


            ]);
            toast("Habilitation modifiée avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la modification de l'habilitation!",'error');
        }
        return back();
    }
    public function corbeille(Request $request){
        $habilitation = Habilitation::findOrFail($request->id);
        try{
            $habilitation->update([
                'supprimer' =>1
            ]);
            toast('Habilitation supprimée avec success','success');

        }
        catch(Exception $e){
            toast("Supression l'habilitation impossible",'danger');
        }
        return back();
    }

    public function destroy(Request $request)
    {
        $habilitation = Habilitation::findOrFail($request->id);
        try{
            $habilitation->delete();
            toast("Habilation supprimée avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la suppression de l'habilitation !",'error');
        }
        return back();

    }
    public function corbeille_all(Request $request){
        $habilitations = Habilitation::where('supprimer', 0)->get();
        try{
            foreach($habilitations as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Habilitations supprimées avec success','danger');

        }
        catch(Exception $e){
            toast('Supression des habilitations impossible','danger');
        }
        return back();
    }
    public function recupUnCorbeille(Request $request){
        $habilitation = Habilitation::findOrFail($request->id);
        try{
            $habilitation->update([
                'supprimer' =>0
            ]);
            toast('Habilitation restorée avec success ','success');

        }
        catch(Exception $e){
            toast("Restauration de l'habilitation impossible",'danger');
        }
        return back();
    }
    public function recupTousCorbeille(Request $request){
        $habilitations = Habilitation::where('supprimer', 1)->get();
        try{
            foreach($habilitations as $value){
                $value->update([
                    'supprimer' =>0
                ]);
               
            }
            toast('Habilitations restaurés avec success','primary');

        }
        catch(Exception $e){
            toast('Restauration des habilitation impossible','danger');
        }
        return back();
    }
    public function destroyTous(Request $request){
        $habilitations = Habilitation::where('supprimer', 1)->get();
        try{
            foreach($habilitations as $value){
                $value->delete();
            }
            toast('Supression des habilitations éffectuées avec success','success');

        }
        catch(Exception $e){

            toast('Supression des habilitations impossible','warning');
        }
        return back();
    }
}
