<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Notifications\NewCommentNotification;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    // public function store(Request $request, Post $post)
    // {
    //     $request->validate([
    //         'body' => 'required|string',
    //         'parent_id' => 'nullable|exists:comments,id',
    //     ]);

    //     if ($request->hasFile('photo')) {
    //         $photo = $request->file('photo')->store('public/images/commentaires');
    //     } else {
    //         $photo = null;
    //     }

    //     $body = $request->body;
    //     $parent_id = $request->parent_id;
    //     $post_id = $post->id;

    //     try {
    //         $comment = Comment::create([
    //             'body' => $body,
    //             'post_id' => $post_id,
    //             'parent_id' => $parent_id,
    //             'photo' => $photo,
    //             'user_id' => Auth::id(),
    //         ]);

    //         toast(" Commentaire ajouté avec succès", 'success');

    //         // Notification des administrateurs
    //         $admins = User::where('supprimer', 0)
    //                     ->where(function ($query) {
    //                         $query->whereIn('profil_id', [2, 3]);
    //                     })->get();

    //         foreach ($admins as $admin) {
    //             $admin->notify(new NewCommentNotification($comment));
    //         }

    //     } catch (Exception $e) {
    //         return back()->withErrors(['error' => 'Ajout du commentaire impossible.']);
    //     }

    //     return back();
    // }
    public function store(Request $request, Post $post)
    {
        if(Auth::user()){
            $request->validate([
                'body' => 'required|string',
                'parent_id' => 'nullable|exists:comments,id',
            ]);
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo')->store('public/images/commentaires');
            } else {
                $photo = null;
            }
            $body = $request->body;
            $parent_id = $request->parent_id;
            $post_id = $post->id;
            try {
                $comment = Comment::create([
                    'body' => $body,
                    'post_id' => $post_id,
                    'parent_id' => $parent_id,
                    'photo' => $photo,
                    'user_id' => Auth::id(),
                ]);
                toast(" Commentaire ajouté avec succès", 'success');
                // Notification des administrateurs
                $admins = User::where('supprimer', 0)
                            ->where(function ($query) {
                                $query->whereIn('profil_id', [2, 3]);
                            })->get();
                foreach ($admins as $admin) {
                    $admin->notify(new NewCommentNotification($comment));
                }
            } catch (Exception $e) {
                toast(" Impossible d'ajouter le commentaire", 'error');
                return back()->withErrors(['error' => 'Ajout du commentaire impossible.']);
            }
            return back();

        }else{
            try{
                toast(" Vous devez d'abord vous connecter avant d'ajouter votre commentaire", 'error');
                return redirect('login');
            }catch(Exception $e){
                toast("Impossible d'effectuer la redircetion vers la page de connexion", 'error');
            }
            return back();
        }
    }





    public function reply(Request $request, Comment $comment)
    {

        if(Auth::user()){
            $request->validate([
                'reply_body' => 'required|string|max:255',
            ]);
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo')->store('public/images/commentaires');
            } else {
                $photo = null;
            }
            try{
                $reply = new Comment();
                $reply->body = $request->reply_body;
                $reply-> photo= $photo;
                $reply->user_id = auth()->id();
                $reply->parent_id = $comment->id;
                $reply->post_id = $comment->post_id; // Assurez-vous que `post_id` est défini dans votre modèle de commentaire
                $reply->save();
                toast(" Commentaire ajouté avec succès", 'success');
            }catch(Exception $e){
                toast(" Impossible d'ajouter le commentaire", 'error');
            }
            return back();
        }else{
            try{
                toast(" Vous devez d'abord vous connecter avant d'ajouter votre commentaire", 'error');
                return redirect('login');
            }catch(Exception $e){
                toast("Impossible d'effectuer la redircetion vers la page de connexion", 'error');
            }
            return back();
        }





    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
