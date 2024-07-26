<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etablissement;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function administrateur()
    {
        $fadministrateur = new User();

        $etablissements = Etablissement::all();

        $roles = Role::all();

        $connectedUserRole = auth()->user()->role_id;

        if ($connectedUserRole === 4) {
            // Superadmin
            $roles = Role::whereIn('id', [3])->get();
        } elseif ($connectedUserRole === 3) {
            // Utilisateur avec enseignement supérieur
            $roles = Role::whereIn('id', [1,2])->get();
        } else {
            // Autres utilisateurs
            $roles = Role::whereIn('id', [1,2])->get();
        }

        $administrateurs = $fadministrateur->administrateur();

        return view('admin.user.administrateur',compact('administrateurs','etablissements','roles'));
    }

    public function store(Request $request)
    {
        $isSuperUser = auth()->user()->role_id === 4;

        $media = $request->file('file');
        $name = null;

        if ($media) {
            $name = $media->hashName();
            $media->storeAs('public/profile', $name);
        }

        $data = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
            'image' => $name,
            'role_id' => $request->role_id,
            'matiere_id' => $request->matiere_id,
            'etablissement_id' => $request->etablissement_id,
            'classe_id' => $request->classe_id,
            'username' => $request->username,
            'matricule' => $request->matricule,
        ];

        if ($request->role_id == 1) {
            $data['matiere_id'] = null; // Classe est null pour le rôle "professeur"
        }

        if (is_array($request->classe_id)) {
            $data['classe_id'] = $request->classe_id[0]; // Assurez-vous que classe_id est une chaîne de caractères
        } else {
            $data['classe_id'] = null; // Ou toute autre valeur par défaut appropriée
        }

        $adminEcoleId = null;
        if ($isSuperUser) {
            $adminEcoleId = $request->etablissement_id;
        } elseif (auth()->user()->role_id === 3) {
            $adminEcoleId = auth()->user()->etablissement_id;
        }

        $data['etablissement_id'] = $adminEcoleId;


        $user = User::create(Arr::except($data, ['matiere_id']));
         // Si l'utilisateur est un professeur
        if ($user->role_id == 2 && is_array($request->matiere_id)) {
            $matiereIds = implode(',', $request->matiere_id);
            $user->matiere_id = $matiereIds;
            $user->save();
        }

        //$user->notify(new NouveauCompteNotification($user->username, $request->password));

        if ($user->role_id == 1) {
            $user->classe_id = $request->classe_id;
            $user->save();

            return redirect()->route('admin.etudiant')->with('success', 'Etudiant ajouté avec succès');
        } elseif ($user->role_id == 2) {
            // Si le rôle est professeur, vous pouvez traiter les classes sélectionnées ici
            $classes = $request->classe_id;

            if (is_array($classes)) {
                $user->selected_classes = json_encode($classes); // Stocker les classes sélectionnées sous forme de JSON
            } else {
                $user->selected_classes = json_encode([$classes]); // Stocker une seule classe sous forme de JSON
            }

            $user->save();

            return redirect()->route('professeur')->with('success', 'Professeur ajouté avec succès');
        }

        else{

            return redirect()->route('administrateur')->with('success', 'L\'administrateur ajouté avec succès');

        }
    }
}
