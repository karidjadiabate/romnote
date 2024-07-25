<?php

namespace App\Http\Controllers;

use App\Models\DemandeInscription;
use App\Http\Requests\StoreDemandeInscriptionRequest;
use App\Http\Requests\UpdateDemandeInscriptionRequest;
use Illuminate\Support\Facades\Session;

class DemandeInscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listedemandeinscriptions = DemandeInscription::latest()->get();

        return view('admin.listedemande.listedemandeinscription',compact('listedemandeinscriptions'));
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
    public function store(StoreDemandeInscriptionRequest $request)
    {
        DemandeInscription::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'contact' => $request->contact,
            'email' => $request->email,
            'nometablissement' => $request->nometablissement,
            'adresseetablissement' => $request->adresseetablissement,
            'password' => $request->password,
            'password_confirm' => $request->password_confirm
        ]);

        Session::flash('success', 'Votre demande d\'inscription a bien été soumise !');

        return to_route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(DemandeInscription $demandeInscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DemandeInscription $demandeInscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDemandeInscriptionRequest $request, DemandeInscription $demandeInscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DemandeInscription $demandeInscription)
    {
        //
    }
}
