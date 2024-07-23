<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Parametre;
use Illuminate\Http\Request;
use App\Models\TypeParametre;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreParametreRequest;
use App\Http\Requests\UpdateParametreRequest;

class ParametreController extends Controller
{
   // LES PARAMETRES EN GENERAL DEBUT
    public function index()
    {
        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['notifications'] = $data['user']->unreadNotifications;

        }
        $data['ParametreTotal']= Parametre::where('supprimer','=',0)->orderBy('code')->count();
        $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->orderBy('code')->count();
        $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
        $data['parametres'] = Parametre::where('supprimer','=',0)->orderBy('code')->get();
        return view("admins.gestions.parametrages.parametres.parametre")->with($data);
    }
   public function indexCorbeille()
   {
       //
        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['notifications'] = $data['user']->unreadNotifications;

        }
       $data['ParametreTotal']= Parametre::where('supprimer','=',0)->orderBy('code')->count();
       $data['ParametreTotalC']= Parametre::where('supprimer','=',1)->orderBy('code')->count();
       $data['type_parametres']= TypeParametre::where('supprimer','=',0)->orderBy('code')->get();
       $data['parametres']= Parametre::where('supprimer','=',1)->orderBy('code')->get();
       return view('admins.gestions.parametrages.parametres.corbeilleparametre')->with($data);


   }
   public function store(Request $request)
   {
       $code = $request->code;
       $libelle = $request->libelle;
       $description = $request->description;
       $type_parametre_id=$request->type_parametre_id;
       try{
           Parametre::create([
               'code'=>$code,
               'libelle'=>$libelle,
               'description'=>$description,
               'type_parametre_id'=>$type_parametre_id
           ]);
           toast("Parametre Ajouté avec succès",'success');

       }
       catch(Exception $e){
        //    toast('Ajout  du Parametre impossible','danger');
        die($e->getMessage());

       }
       return back();
   }

   public function update(Request $request)
   {

       $Parametre = Parametre::findOrfail($request->id);
       $code= isset($request->code)?$request->code:$Parametre->code;
       $libelle= isset($request->libelle)?$request->libelle:$Parametre->libelle;
       $description= isset($request->description)?$request->description:$Parametre->description;
       $type_parametre_id= isset($request->type_parametre_id)?$request->type_parametre_id:$Parametre->type_parametre_id;

       try{
           $Parametre->update([
               'code' => $code,
               'libelle' => $libelle,
               'description' => $description,
               'type_parametre_id' => $type_parametre_id,

           ]);
           toast("Parametre modifié avec succès",'success');
       }catch(Exception $e){
           toast("Une ereur est survenue !",'error');
       }
       return back();
   }
   public function corbeille(Request $request){
       $parametre = Parametre::findOrFail($request->id);
       try{
           $parametre->update([
               'supprimer' =>1
           ]);
           toast('Parametre supprimé avec success','success');

       }
       catch(Exception $e){
           toast('Supression du Parametre impossible','danger');
       }
       return back();
   }
   public function destroy(Request $request)
   {
       $parametre = Parametre::findOrFail($request->id);
       try{
           $parametre->delete();
           toast("Parametre supprimé avec succès",'success');
       }catch(Exception $e){
           toast("Une ereur est survenue lors de la suppression du paramétre !",'error');
       }
       return back();
   }
   public function corbeille_all(Request $request){
       $parametre = Parametre::where('supprimer', 0)->orderBy('code')->get();
       try{
           foreach($parametre as $value){
               $value->update([
                   'supprimer' =>1
               ]);
           }
           toast('Parametres supprimé avec success','success');

       }
       catch(Exception $e){
           toast('Supression des parametres impossible','danger');
       }
       return back();
   }
   public function recupUnCorbeille(Request $request){
       $parametre = Parametre::findOrFail($request->id);
       try{
           $parametre->update([
               'supprimer' =>0
           ]);
           toast('Parametre restauré avec success','primary');

       }
       catch(Exception $e){
           toast('Restauration du Parametre impossible','danger');
       }
       return back();
   }
   public function recupTousCorbeille(Request $request){
       $parametre = Parametre::where('supprimer', 1)->orderBy('code')->get();
       try{
           foreach($parametre as $value){
               $value->update([
                   'supprimer' =>0
               ]);
           }
           toast('Parametre restoré avec success','primary');

       }
       catch(Exception $e){
           toast('Restauration du Parametre impossible','danger');
       }
       return back();
   }
   public function destroyTous(Request $request){
       $parametre = Parametre::where('supprimer', 1)->orderBy('code')->get();
       try{
           foreach($parametre as $value){
               $value->delete();
           }
           toast('Supression des Parametres éffectué avec success','success');

       }
       catch(Exception $e){
           toast('Supression des Parametres impossible','danger');
       }
       return back();
   }
}
