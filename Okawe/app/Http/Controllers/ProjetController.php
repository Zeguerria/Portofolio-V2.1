<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProjetRequest;
use App\Http\Requests\UpdateProjetRequest;

class ProjetController extends Controller
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
        $data['ProjetTotal']= Projet::where('supprimer','=',0)->count();
        $data['ProjetTotalC']= Projet::where('supprimer','=',1)->count();
        $data ['projets'] = Projet::where('supprimer','=',0)->orderBy('name')->get();
        return view('admins.gestions.projets.projet')->with($data);
    }
   


    public function indexCorbeille(){
        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['notifications'] = $data['user']->unreadNotifications;
        }
        $data['ProjetTotal']= Projet::where('supprimer','=',0)->count();
        $data['ProjetTotalC']= Projet::where('supprimer','=',1)->count();
        $data ['projets'] = Projet::where('supprimer','=',1)->orderBy('name')->get();
        return view('admins.gestions.projets.corbeilleprojet')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $name = $request->name;
        $description = $request->description;
        try{
            Projet::create([
                'name'=>$name,
                'description'=>$description,
            ]);
           toast("Projet Ajouté avec succès",'success');

       }
       catch(Exception $e){
           toast('Ajout  du projet impossible','danger');
        // die($e->getMessage());

       }
       return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $projet = Projet::findOrfail($request->id);
        $name= isset($request->name)?$request->name:$projet->name;
        $description= isset($request->description)?$request->description:$projet->description;
        try{
            $projet->update([
                'name'=>$name,
                'description'=>$description,
            ]);
            toast("Projet modifié avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la modification du projet",'error');
        }
        return back();

    }
    public function corbeille(Request $request){
        $projet = Projet::findOrFail($request->id);
        try{
            $projet->update([
                'supprimer' =>1
            ]);
            toast('Projet supprimé avec success','success');

        }
        catch(Exception $e){
            toast("Supression du projet impossible",'danger');
        }
        return back();
    }

    public function destroy(Request $request)
    {
        $projet = Projet::findOrfail($request->id);
        try{
            $projet->delete();
            toast("Projet supprimé avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la suppression du projet !",'error');
        }
        return back();

    }
    public function corbeilleAll(Request $request){
        $projets = Projet::where('supprimer', 0)->get();
        try{
            foreach($projets as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Projets supprimés avec success','danger');

        }
        catch(Exception $e){
            toast('Supression des projets impossible','danger');
        }
        return back();
    }
    public function recupUnCorbeille(Request $request){
        $projet = Projet::findOrFail($request->id);
        try{
            $projet->update([
                'supprimer' =>0
            ]);
            toast('Projet restoré avec success ','success');

        }
        catch(Exception $e){
            toast("Restauration du projet impossible",'danger');
        }
        return back();
    }
    public function recupTousCorbeille(Request $request){
        $projets = Projet::where('supprimer', 1)->get();
        try{
            foreach($projets as $value){
                $value->update([
                    'supprimer' =>0
                ]);
            }
            toast('Projets restaurés avec success','primary');

        }
        catch(Exception $e){
            toast('Restauration des projets impossible','danger');
        }
        return back();
    }
    public function destroyTous(Request $request){
        $projets = Projet::where('supprimer', 1)->get();
        try{
            foreach($projets as $value){
                $value->delete();
            }
            toast('Supression des projets éffectué avec success','success');

        }
        catch(Exception $e){

            toast('Supression des projets impossible','warning');
        }
        return back();
    }
}
