<?php

namespace App\Http\Controllers;

use App\Models\DemandeInscription;
use App\Http\Requests\StoreDemandeInscriptionRequest;
use App\Http\Requests\UpdateDemandeInscriptionRequest;
use App\Models\Etablissement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Session;

class DemandeInscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listedemandeinscriptions = DemandeInscription::latest()->get();

        return view('admin.listedemande.listedemandeinscription', compact('listedemandeinscriptions'));
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
        $demandeData = $request->only([
            'prenom',
            'nom',
            'contact',
            'email',
            'nometablissement',
            'adresseetablissement',
            'password',
            'password_confirm'
        ]);

        // Assurez-vous que les champs 'accepted' et 'rejected' sont définis à false par défaut
        $demandeData['accepted'] = false;
        $demandeData['rejected'] = false;

        DemandeInscription::create($demandeData);

        Session::flash('success', 'Votre demande d\'inscription a bien été soumise !');

        return to_route('home');
    }

    public function accept(Request $request, $id)
    {
        $demande = DemandeInscription::find($id);

        if (!$demande) {
            return response()->json(['success' => false, 'message' => 'Demande non trouvée.']);
        }

        // Valider les données
        $data = [
            'code' => $demande->code,
            'nomresponsable' => $demande->nom,
            'prenomresponsable' => $demande->prenom,
            'nometablissement' => $demande->nometablissement,
            'contact' => $demande->contact,
            'adresse' => $demande->adresseetablissement,
            'logo' => null,
        ];

        Log::info('Données à insérer dans l\'établissement:', $data);

        try {
            $ecole = Etablissement::create($data);
        } catch (Exception $e) {
            Log::error('Erreur lors de la création de l\'établissement: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Erreur lors de la création de l\'établissement.']);
        }

        // Marquer la demande comme acceptée
        $demande->accepted = true;
        $demande->rejected = false;
        $demande->save();

        return response()->json(['success' => true, 'message' => 'Demande acceptée et établissement créé avec succès!']);
    }

    public function reject($id)
    {
        $demande = DemandeInscription::find($id);
        if ($demande) {
            $demande->accepted = false;
            $demande->rejected = true;
            $demande->save();

            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
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
