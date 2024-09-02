<?php

namespace App\Http\Controllers;

use App\Models\DemandeInscription;
use App\Http\Requests\StoreDemandeInscriptionRequest;
use App\Http\Requests\UpdateDemandeInscriptionRequest;
use App\Models\Etablissement;
use App\Models\User;
use App\Notifications\AccepteNouvelleDemandeInscription;
use App\Notifications\NouvelleDemandeInscription;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
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
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'nometablissement' => 'required|string|max:255',
            'email' => 'required|email|unique:demos,email',
            'contact' => 'required|string|max:20',
            'adresseetablissement' => 'required|string|max:20',
            'password' => 'required|string|min:4',
            'password_confirm' => 'required|string|min:4',
        ],[
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prenom est obligatoire.',
            'nometablissement.required' => 'Le Nom d\'etablissement est obligatoire.',
            'contact.required' => 'Le contact est obligatoire.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password_confirm.required' => 'Le mot de passe est obligatoire.',
            'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.unique' => 'Cet email est déjà associé à une demande d\'inscription.'
        ]);

        $demandeinscription = DemandeInscription::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'nometablissement' => $validatedData['nometablissement'],
            'adresseetablissement' => $validatedData['adresseetablissement'],
            'email' => $validatedData['email'],
            'contact' => $validatedData['contact'],
            'password' => $validatedData['password'],
            'password_confirm' => $validatedData['password_confirm']
        ]);

        // Envoyer la notification aux administrateurs
        $adminUsers = User::where('role_id', 4)->get();
        foreach ($adminUsers as $admin) {
            $admin->notify(new NouvelleDemandeInscription($demandeinscription));
        }


        return to_route('home')->with('success', 'Votre demande d\'inscription a bien été prise en compte, nous reviendrons vers vous par email.');
    }

    public function accept(Request $request, $id)
{
    $demande = DemandeInscription::find($id);

    if (!$demande) {
        return response()->json(['success' => false, 'message' => 'Demande non trouvée.']);
    }

    // Marquer la demande comme acceptée
    $demande->accepted = true;
    $demande->rejected = false;
    $demande->save();

    try {
        // Notifier l'utilisateur que sa demande a été acceptée
        $demande->notify(new AccepteNouvelleDemandeInscription());
    } catch (Exception $e) {
        Log::error('Erreur lors de l\'envoi de l\'email: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Erreur lors de l\'envoi de l\'email.']);
    }

    return response()->json(['success' => true, 'message' => 'Demande acceptée et email envoyé avec succès!']);
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

    public function demandeinscriptionnotification(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        return redirect()->route('listedemandeinscription');
    }

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
