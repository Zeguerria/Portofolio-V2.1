<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

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
        return view('admins.gestions.tasks.task')->with($data);
    }
    public function indexCorbeille(){
        if(Auth::user()){
            $data['user'] = Auth::user();
            $data['notifications'] = $data['user']->unreadNotifications;
        }
        $data['TaskTotal']= Task::where('supprimer','=',0)->count();
        $data['TaskTotalC']= Task::where('supprimer','=',1)->count();
        $data ['tasks'] = Task::where('supprimer','=',1)->orderBy('title')->get();
        return view('admins.gestions.tasks.corbeilletask')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'assigned_to' => 'nullable|exists:users,id',
        ]);
        $title = $request->title;
        $description = $request->description;
        $status = $request->status;
        $assigned_to = $request->assigned_to;
        try{
            Task::create([
                'title'=>$title,
                'description'=>$description,
                'status'=>$status,
                'assigned_to'=>$assigned_to,
            ]);
           toast("Tache Ajoutée avec succès",'success');

       }
       catch(Exception $e){
           toast('Ajout  de la tache impossible','danger');
        // die($e->getMessage());

       }
       return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'assigned_to' => 'nullable|exists:users,id',
        ]);
        $task = Task::findOrfail($request->id);
        $title= isset($request->title)?$request->title:$task->title;
        $description= isset($request->description)?$request->description:$task->description;
        $status= isset($request->status)?$request->status:$task->status;
        $assigned_to= isset($request->assigned_to)?$request->assigned_to:$task->assigned_to;
        try{
            $task->update([
                'title'=>$title,
                'description'=>$description,
                'status'=>$status,
                'assigned_to'=>$assigned_to,
            ]);
            toast("Tache modifiée avec succès",'success');
        }catch(Exception $e){
            toast("Une ereur est survenue lors de la modification de la tache",'error');
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
    public function corbeille_all(Request $request){
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


    
}
