<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Projet;
use App\Models\Parametre;
use App\Models\Realisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRealisationRequest;
use App\Http\Requests\UpdateRealisationRequest;



class RealisationController extends Controller
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

        $data['RealisationTotal']= Realisation::where('supprimer','=',0)->count();
        $data['RealisationTotalC']= Realisation::where('supprimer','=',1)->count();
        $data['categories']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',2)->orderBy('libelle')->get();
        $data['realisations'] = Realisation::where('supprimer','=',0)->orderBy('titre')->get();
        return view("admins.gestions.realisations.realisation")->with($data);
    }
    public function indexCorbeille()
    {
        //Notifications
        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['notifications'] = $data['user']->unreadNotifications;

        }
        // DONNEE POUR LE FORMULAIR D'AJOUT D'UNE TACHE DANS LE HOMEADMIN DEBUT
        $data ['projets'] = Projet::where('supprimer','=',0)->orderBy('name')->get();
        $data ['users'] = User::where('profil_id','!=',1)->where('supprimer','=',0)->get();
    // DONNEE POUR LE FORMULAIR D'AJOUT D'UNE TACHE DANS LE HOMEADMIN FIN

        $data['RealisationTotalC']= Realisation::where('supprimer','=',1)->count();
        $data['RealisationTotal']= Realisation::where('supprimer','=',0)->count();
        $data['realisations'] = Realisation::where('supprimer','=',1)->orderBy('titre')->get();
        $data['categories']= Parametre::where('supprimer','=',0)->where('type_parametre_id','=',2)->orderBy('libelle')->get();

        return view('admins.gestions.realisations.corbeillerealisation')->with($data);
    }



    public function store(Request $request)
{
    // Validation des données de formulaire
    $request->validate([
        'titre' => 'required|string|max:255',
        'description1' => 'nullable|string',
        'description2' => 'nullable|string',
        'description3' => 'nullable|string',
        'description4' => 'nullable|string',
        'categorie_id' => 'required|integer',
        'photo1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'photo2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'photo3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'photo4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if(isset($request->photo1) && !empty($request->photo1)){

        $photo1 = Storage::putFile('public/images/realisations', $request->file('photo1'));
    }else{
        $photo1 = "public/images/realisations/realisation.jpg";
    }
    if(isset($request->photo2) && !empty($request->photo2)){

        $photo2 = Storage::putFile('public/images/realisations', $request->file('photo2'));
    }else{
        $photo2 = "public/images/realisations/realisation.jpg";
    }
    if(isset($request->photo3) && !empty($request->photo3)){

        $photo3 = Storage::putFile('public/images/realisations', $request->file('photo3'));
    }else{
        $photo3 = "public/images/realisations/realisation.jpg";
    }
    if(isset($request->photo4) && !empty($request->photo4)){

        $photo4 = Storage::putFile('public/images/realisations', $request->file('photo4'));
    }else{
        $photo4 = "public/images/realisations/realisation.jpg";
    }

    try {
        // Sauvegarde des images
        // $photos = [];
        // foreach (['photo1', 'photo2', 'photo3', 'photo4'] as $key => $photoField) {
        //     if ($request->hasFile($photoField)) {
        //         $path = $request->file($photoField)->store('public/images/realisations');
        //         $photos[$photoField] = str_replace('public/', 'storage/', $path);
        //     } else {
        //         $photos[$photoField] = "storage/images/realisations/profil.jpg";
        //     }
        // }

        // Création de la réalisation
        Realisation::create([
            'titre' => $request->titre,
            'description1' => $request->description1,
            'description2' => $request->description2,
            'description3' => $request->description3,
            'description4' => $request->description4,
            'user_id' => Auth::id(),
            'categorie_id' => $request->categorie_id,
            'date' => now()->format('d/m/Y'),
            'photo1' => $photo1,
            'photo2' => $photo2,
            'photo3' => $photo3,
            'photo4' => $photo4,
        ]);

        // Succès
        toast("Réalisation ajoutée avec succès", 'success');
    } catch (\Exception $e) {
        die($e->getMessage());
        Log::error('Erreur lors de la création de la réalisation : ' . $e->getMessage());
        toast('Ajout de la réalisation impossible', 'error');
    }

    return back();
}


    public function update(Request $request)
    {
        //
        $request->validate([
            'titre' => 'required|string|max:255',
            'description1' => 'nullable|string',
            'description2' => 'nullable|string',
            'description3' => 'nullable|string',
            'description4' => 'nullable|string',
            'categorie_id' => 'required|integer',
            'photo1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $realisation = Realisation::findOrfail($request->id);




        $titre= isset($request->titre)?$request->titre:$realisation->titre;
        $description1= isset($request->description1)?$request->description1:$realisation->description1;
        $description2= isset($request->description2)?$request->description2:$realisation->description2;
        $description3= isset($request->description3)?$request->description3:$realisation->description3;
        $description4= isset($request->description4)?$request->description4:$realisation->description4;
        $categorie_id= isset($request->categorie_id)?$request->categorie_id:$realisation->categorie_id;
        if(isset($request->photo1) and !empty($request->photo1)){
            $photo1 = Storage::putFile('public/images/realisations', $request->file('photo1'));
        }else{
            $photo1 = $realisation->photo1;
        }
        if(isset($request->photo2) and !empty($request->photo2)){
            $photo2 = Storage::putFile('public/images/realisations', $request->file('photo2'));
        }else{
            $photo2 = $realisation->photo2;
        }
        if(isset($request->photo3) and !empty($request->photo3)){
            $photo3 = Storage::putFile('public/images/realisations', $request->file('photo3'));
        }else{
            $photo3 = $realisation->photo3;
        }
        if(isset($request->photo4) and !empty($request->photo4)){
            $photo4 = Storage::putFile('public/images/realisations', $request->file('photo4'));
        }else{
            $photo4 = $realisation->photo4;
        }
        try{
            $realisation->update([
                'titre'=>$titre,
                'categorie_id'=>$categorie_id,
                'description1'=>$description1,
                'description2'=>$description2,
                'description3'=>$description3,
                'description4'=>$description4,
                'photo1' => $photo1,
            'photo2' => $photo2,
            'photo3' => $photo3,
            'photo4' => $photo4,
                'user_id' => Auth::user()->id,
                'date' => date('d/m/Y'),
            ]);
            toast('Réalisation modifiée avec success','success');

        }
        catch(Exception $e){
            die($e->getMessage());
            // toast("Probleme survenu lors de la modification de la réalisation","error");
        }
        return back();


    }

    public function corbeille(Request $request)
    {
        // Valider la requête
        $validated = $request->validate([
            'id' => 'required|integer|exists:realisations,id'
        ]);

        Log::info('Requête validée avec ID: ' . $validated['id']);

        // Trouver la réalisation
        $realisation = Realisation::find($validated['id']);

        if (!$realisation) {
            Log::error('Réalisation introuvable avec ID: ' . $validated['id']);
            return back()->with('danger', 'Réalisation introuvable.');
        }

        Log::info('Réalisation trouvée avec ID: ' . $realisation->id);

        // Vérifier si un utilisateur est authentifié
        if (!Auth::check()) {
            Log::error('Utilisateur non authentifié.');
            return back()->with('danger', 'Vous devez être connecté pour effectuer cette action.');
        }

        try {
            // Mettre à jour la réalisation
            $realisation->supprimer = 1;
            $realisation->user_id = Auth::user()->id;
            $realisation->save();

            Log::info('Mise à jour réussie pour la réalisation ID: ' . $realisation->id);
            toast('Réalisation supprimée avec succès', 'success');
        } catch (Exception $e) {
            Log::error('Échec de la mise à jour de la réalisation ID: ' . $realisation->id . ' - Erreur: ' . $e->getMessage());
            toast("Suppression de la réalisation impossible", 'danger');
            die($e->getMessage());
        }

        return back();
    }


    public function destroy(Request $request){
        $realisation = Realisation::findOrFail($request->id);
        try{
            $realisation->delete();
            toast("Réalisation supprimée avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la suppression de la réalisation !",'error');
        }
        return back();
    }
    public function corbeilleAll(Request $request){
        $realisations = Realisation::where('supprimer', 0)->get();
        try{
            foreach($realisations as $value){
                $value->update([
                    'supprimer' =>1,
                    'user_id' => Auth::user()->id
                ]);
            }
            toast('Réalisations supprimées avec success','success');

        }
        catch(Exception $e){
            toast('Supression des réalisations impossible','danger');
        }
        return back();
    }
    public function recupUnCorbeille(Request $request){
        $realisation = Realisation::findOrFail($request->id);
        try{
            $realisation->update([
                'supprimer' =>0,
                'user_id' => Auth::user()->id
            ]);
            toast('Realisation restaurée avec success','primary');

        }
        catch(Exception $e){
            toast("Restauration de la réalisation impossible",'danger');
        }
        return back();
    }
    public function recupTousCorbeille(Request $request){
        $realisations = Realisation::where('supprimer', 1)->get();
        try{
            foreach($realisations as $value){
                $value->update([
                    'supprimer' =>0,
                    'user_id' => Auth::user()->id
                ]);
            }
            toast('Realisations restorées avec success','primary');

        }
        catch(Exception $e){
            toast('Restauration des réalisations impossible','danger');
        }
        return back();
    }
    public function destroyTous(Request $request){
        $realisations = Realisation::where('supprimer', 1)->get();
        try{
            foreach($realisations as $value){
                $value->delete();
            }
            toast('Supression des réalisations éffectuées avec success','success');

        }
        catch(Exception $e){
            toast('Supression des réalisations impossible','danger');
        }
        return back();
    }



    // chart realisation


    public function fetchChartData()
    {
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        $currentYear = date('Y');
        $data = [
            'labels' => $months,
            'datasets' => [
                [
                    'label' => 'Personnelle',
                    'data' => [],
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgb(75, 192, 192)',
                    'borderWidth' => 1
                ],
                [
                    'label' => 'Equipe',
                    'data' => [],
                    'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                    'borderColor' => 'rgb(153, 102, 255)',
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($months as $month) {
            $personnelleCount = intval(Realisation::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', array_search($month, $months) + 1)
                ->where('categorie_id', 2)
                ->count());
            $equipeCount = intval(Realisation::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', array_search($month, $months) + 1)
                ->where('categorie_id', 3)
                ->count());

            $data['datasets'][0]['data'][] = $personnelleCount;
            $data['datasets'][1]['data'][] = $equipeCount;
        }

        return response()->json($data);
    }



}
