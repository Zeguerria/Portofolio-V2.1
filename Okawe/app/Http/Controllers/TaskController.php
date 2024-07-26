<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Task;
use App\Models\User;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
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
        $data['TaskTotal']= Task::where('supprimer','=',0)->count();
        $data['TaskTotalC']= Task::where('supprimer','=',1)->count();
        $data ['tasks'] = Task::where('supprimer','=',0)->orderBy('title')->get();
        $data ['users'] = User::where('profil_id','!=',1)->where('supprimer','=',0)->get();
        $data ['projets'] = Projet::where('supprimer','=',0)->orderBy('name')->get();

        return view('admins.gestions.tasks.task')->with($data);
    }
    public function hometasks()
    {
        // if(Auth::user()){
        //     $data['user'] = Auth::user();
        //     $data['notifications'] = $data['user']->unreadNotifications;

        // }
        // $data['TaskTotal']= Task::where('supprimer','=',0)->count();
        // $data['TaskTotalC']= Task::where('supprimer','=',1)->count();
        $data ['tasks'] = Task::where('supprimer','=',0)->orderBy('title')->get();
        $data ['users'] = User::where('profil_id','!=',1)->where('supprimer','=',0)->get();
        $data ['projets'] = Projet::where('supprimer','=',0)->orderBy('name')->get();
        return view('admins.menus._menus.modal')->with($data);
    }
    public function indexCorbeille(){
        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['notifications'] = $data['user']->unreadNotifications;
        }
        $data['TaskTotal']= Task::where('supprimer','=',0)->count();
        $data['TaskTotalC']= Task::where('supprimer','=',1)->count();
        $data ['projets'] = Projet::where('supprimer','=',0)->orderBy('name')->get();
        $data ['users'] = User::where('profil_id','!=',1)->where('supprimer','=',0)->get();

        $data ['tasks'] = Task::where('supprimer','=',1)->orderBy('title')->get();
        return view('admins.gestions.tasks.corbeilletask')->with($data);
    }

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:attente,cours,termine','reporte',
            'assigned_to' => 'nullable|exists:users,id',
            'project_id' => 'required|exists:projets,id', // Assurez-vous que project_id est requis et valide
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // Essayer de créer une tâche attente', 'cours', 'ternime'
        try {
            Task::create($validated);
            toast("Tâche ajoutée avec succès", 'success');
        } catch (\Exception $e) {
            toast("Ajout de la tâche impossible : " . $e->getMessage(), 'danger');
        }

        return back();
    }


    public function update(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|in:attente,cours,termine,reporte', // Utilisation de vos valeurs
            'assigned_to' => 'nullable|exists:users,id',
            'project_id' => 'nullable|exists:projets,id', // Assurez-vous que project_id est valide s'il est fourni
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // Trouver la tâche à mettre à jour
        $task = Task::findOrFail($request->id);

        // Mettre à jour les champs uniquement s'ils sont présents dans la requête
        $task->update(array_filter([
            'title' => $validated['title'] ?? $task->title,
            'description' => $validated['description'] ?? $task->description,
            'status' => $validated['status'] ?? $task->status,
            'assigned_to' => $validated['assigned_to'] ?? $task->assigned_to,
            'start_date' => $validated['start_date'] ?? $task->start_date,
            'end_date' => $validated['end_date'] ?? $task->end_date,
            'end_date' => $validated['end_date'] ?? $task->end_date,
            'project_id' => $validated['project_id'] ?? $task->project_id, // Inclure uniquement si nécessaire
        ]));

        // Essayer de mettre à jour la tâche
        try {
            toast("Tâche modifiée avec succès", 'success');
        } catch (\Exception $e) {
            toast("Une erreur est survenue lors de la modification de la tâche : " . $e->getMessage(), 'danger');
        }

        return back();
    }

    public function corbeille(Request $request){
        $task = Task::findOrFail($request->id);
        try{
            $task->update([
                'supprimer' =>1
            ]);
            toast('Tache supprimée avec success','success');

        }
        catch(Exception $e){
            toast("Supression de la tache impossible",'danger');
        }
        return back();
    }
    public function destroy(Request $request)
    {
        $task = Task::findOrfail($request->id);
        try{
            $task->delete();
            toast("Tache supprimée avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la suppression de la tache !",'error');
        }
        return back();

    }
    public function corbeilleAll(Request $request){
        $tasks = Task::where('supprimer', 0)->get();
        try{
            foreach($tasks as $value){
                $value->update([
                    'supprimer' =>1
                ]);
            }
            toast('Taches supprimés avec success','danger');

        }
        catch(Exception $e){
            toast('Supression des taches impossible','danger');
        }
        return back();
    }
    public function recupUnCorbeille(Request $request){
        $task = Task::findOrFail($request->id);
        try{
            $task->update([
                'supprimer' =>0
            ]);
            toast('Tache restorée avec success ','success');

        }
        catch(Exception $e){
            toast("Restauration de la tache impossible",'danger');
        }
        return back();
    }
    public function recupTousCorbeille(Request $request){
        $tasks = Task::where('supprimer', 1)->get();
        try{
            foreach($tasks as $value){
                $value->update([
                    'supprimer' =>0
                ]);
            }
            toast('Taches restaurées avec success','primary');

        }
        catch(Exception $e){
            toast('Restauration des taches impossible','danger');
        }
        return back();
    }
    public function destroyTous(Request $request){
        $tasks = Task::where('supprimer', 1)->get();
        try{
            foreach($tasks as $value){
                $value->delete();
            }
            toast('Supression des taches éffectué avec success','success');

        }
        catch(Exception $e){

            toast('Supression des taches impossible','warning');
        }
        return back();
    }

    // TACHES DANS LE CALENDRIER DEBUT
        public function getEvents()
        {
            // Récupérer les événements des tâches
            $tasks = Task::all(); // Adapte cette requête pour récupérer les événements nécessaires

            // Formater les données pour FullCalendar
            $events = $tasks->map(function ($task) {
                return [
                    'id' => $task->id,
                    'title' => $task->title,
                    'start' => $task->start_date, // Assurez-vous que vous avez un champ start_date dans votre modèle
                    'end' => $task->end_date, // Assurez-vous que vous avez un champ end_date dans votre modèle
                    'status' => $task->status,
                    'effectuant' => $task->user ? $task->user->name." ".$task->user->prenom : 'Aucun Effectuant',
                    'color' => $this->getColorForStatus($task->status), // Associe une couleur à chaque statut
                    'projectName' => $task->project ? $task->project->name : 'Aucun projet', // Inclure le nom du projet
                ];
            });

            return response()->json($events);
        }

        private function getColorForStatus($status)
        {
            switch ($status) {
                case 'attente':
                    return 'red';
                case 'cours':
                    return 'orange';
                case 'ternime':
                    return 'green';
                case 'reporte':
                    return 'blue';
                default:
                    return 'gray';
            }
        }
    // TACHES DANS LE CALENDRIER FIN

    // LISTE DES TACHES DANS LE HOME DEBUT
        public function getTasks(Request $request)
        {
            $tasks = Task::where('supprimer','=',0)->with('user')->orderBy('id','DESC')->paginate(6); // Nombre de tâches par page
            return response()->json($tasks);
        }
        // MODIFICATION DU STATUT ET SUPPRESSION DE LA TACHE DEPUIS LE HOME DEBUT
            public function updateStatus(Request $request, $id)
            {
                $request->validate([
                    'status' => 'required|string|in:attente,cours,termine,reporte',
                ]);

                $task = Task::findOrFail($id);
                try{
                    $task->update([
                        'status' => $request->input('status'),
                    ]);
                    toast("Statut de la tache modifié avec succès", 'success');
                }catch(Exception $e){
                    toast("Une erreur est survenue lors de la modification du statut de la tâche : " . $e->getMessage(), 'danger');
                }


                return back();
            }
            public function destroyTask(Task $task)
            {

                try{
                    $task->delete();
                    toast("Tache supprimé avec succès", 'success');
                }catch(Exception $e){
                    toast("Une erreur est survenue lors de la suppression de la tâche : " . $e->getMessage(), 'danger');
                }
                return back();
            }
        // MODIFICATION DU STATUT ET SUPPRESSION DE LA TACHE DEPUIS LE HOME FIN
    // LISTE DES TACHES DANS LE HOME FIN









    // LES WIDGET EN  DEBUT
            // STATUT DES TACHES EN % DEBUT
                // public function TacheTermine()
                // {
                //     // Récupérer le nombre total de tâches
                //     $totalTasks = Task::where('supprimer', '=', 0)->count();

                //     // Récupérer le nombre de tâches terminées
                //     $completedTasks = Task::where('status', 'termine')->count();

                //     // Calculer le pourcentage des tâches terminées
                //     $percentage = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;

                //     return response()->json([
                //         'percentage' => number_format($percentage, 2) // Formater le pourcentage à 2 décimales
                //     ]);
                // }

                // public function TacheAttente()
                // {
                //     // Récupérer le nombre total de tâches
                //     $totalTasks = Task::where('supprimer', '=', 0)->count();

                //     // Récupérer le nombre de tâches en attente
                //     $AttenteTasks = Task::where('status', 'attente')->count();

                //     // Calculer le pourcentage des tâches en attente
                //     $percentageAttente = $totalTasks > 0 ? ($AttenteTasks / $totalTasks) * 100 : 0;

                //     return response()->json([
                //         'percentageAttente' => number_format($percentageAttente, 2) // Formater le pourcentage à 2 décimales
                //     ]);
                // }


                // public function TacheReporte()
                // {
                //     // Récupérer le nombre total de tâches
                //     $totalTasks = Task::where('supprimer', '=', 0)->count();

                //     // Récupérer le nombre de tâches reportées
                //     $ReporteTasks = Task::where('status', 'reporte')->count();

                //     // Calculer le pourcentage des tâches reportées
                //     $percentageReporte = $totalTasks > 0 ? ($ReporteTasks / $totalTasks) * 100 : 0;

                //     return response()->json([
                //         'percentageReporte' => number_format($percentageReporte, 2) // Formater le pourcentage à 2 décimales
                //     ]);
                // }


                // public function TacheCours()
                // {
                //     // Récupérer le nombre total de tâches
                //     $totalTasks = Task::where('supprimer', '=', 0)->count();

                //     // Récupérer le nombre de tâches en cours
                //     $CoursTasks = Task::where('status', 'cours')->count();

                //     // Calculer le pourcentage des tâches en cours
                //     $percentageCours = $totalTasks > 0 ? ($CoursTasks / $totalTasks) * 100 : 0;

                //     return response()->json([
                //         'percentageCours' => number_format($percentageCours, 2) // Formater le pourcentage à 2 décimales
                //     ]);
                // }
                public function TacheTermine()
                {
                    $totalTasks = Task::where('supprimer', '=', 0)->count();
                    $completedTasks = Task::where('status', 'termine')->count();
                    $percentage = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;

                    return response()->json([
                        'percentage' => number_format($percentage, 2)
                    ]);
                }

                public function TacheAttente()
                {
                    $totalTasks = Task::where('supprimer', '=', 0)->count();
                    $AttenteTasks = Task::where('status', 'attente')->count();
                    $percentageAttente = $totalTasks > 0 ? ($AttenteTasks / $totalTasks) * 100 : 0;

                    return response()->json([
                        'percentageAttente' => number_format($percentageAttente, 2)
                    ]);
                }

                public function TacheReporte()
                {
                    $totalTasks = Task::where('supprimer', '=', 0)->count();
                    $ReporteTasks = Task::where('status', 'reporte')->count();
                    $percentageReporte = $totalTasks > 0 ? ($ReporteTasks / $totalTasks) * 100 : 0;

                    return response()->json([
                        'percentageReporte' => number_format($percentageReporte, 2)
                    ]);
                }

                public function TacheCours()
                {
                    $totalTasks = Task::where('supprimer', '=', 0)->count();
                    $CoursTasks = Task::where('status', 'cours')->count();
                    $percentageCours = $totalTasks > 0 ? ($CoursTasks / $totalTasks) * 100 : 0;

                    return response()->json([
                        'percentageCours' => number_format($percentageCours, 2)
                    ]);
                }




            // STATUT DES TACHES EN % FIN
    // LES WIDGET EN  FIN












}
