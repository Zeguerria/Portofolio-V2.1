<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Contact;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function sendProject(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('public/images/contacts');
        } else {
            $photo = null;
        }
        $nom=$request->nom;
        $prenom=$request->prenom;
        $email=$request->email;
        $phone=$request->phone;
        $message=$request->message;

        try{

            $contact = Contact::create([
                'nom'=>$nom,
                'prenom'=>$prenom,
                'email'=>$email,
                'phone'=>$phone,
                'message'=>$message

            ]);
            toast('Votre mail a été enregistré avec success','success');
                // Envoyer un email à l'administrateur
                Mail::to('j.okawe123@gmail.com')->send(new ContactMail($contact));

        }catch(Exception $e){
            die($e->getMessage());
        }
        return back();
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
    public function store(StoreContactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
