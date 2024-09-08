<?php

namespace App\Http\Controllers;

use App\Models\Sujet;
use App\Http\Requests\StoreSujetRequest;
use App\Http\Requests\UpdateSujetRequest;
use App\Models\Classe;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\TypeSujet;
use Illuminate\Http\Request;

class SujetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flistesujet = new Sujet();

        $listesujets = $flistesujet->listesujetbyprof();

        return view('admin.sujet.listesujet',compact('listesujets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        $userRole = $user->role_id;

        $ecoleId = auth()->user()->etablissement_id;

        $typessujets = TypeSujet::all();

        $filiere = new Filiere();

        $filieres = $filiere->listefilierebyecole();

        if ($userRole === 2) {
            // Si l'utilisateur est un professeur, récupérer les classes qu'il enseigne dans son école
            $selectedClasses = json_decode($user->selected_classes);
            $classes = Classe::whereIn('id', $selectedClasses)->get();
            // Convertissez la chaîne 'matiere_id' en tableau
            $matiereIds = explode(',', $user->matiere_id);
            // Utilisez ce tableau pour récupérer les matières
            $professeurMatiere = Matiere::findMany($matiereIds);

        } elseif ($userRole === 3) {
            // Si l'utilisateur est un administrateur, récupérer toutes les classes de l'école
            $fclasse = new Classe();

            $fmatiere = new Matiere();

            $classes = Classe::where('etablissement_id',$ecoleId)->get();

            $professeurMatiere = null; // Initialiser à null pour les autres rôles

            $matieres = $fmatiere->listematierebyecole();

        } else {
            // Pour les autres rôles d'utilisateurs, ne pas afficher de classes
            $classes = collect(); // Initialiser avec une collection vide
            $professeurMatiere = null; // Initialiser à null pour les autres rôles
        }

        $cycleIds = [];

        // Obtenir toutes les matières pour l'administrateur, sinon inclure la matière du professeur (si disponible)
        $matieres = ($userRole === 3) ? $matieres = $fmatiere->listematierebyecole() : Matiere::whereIn('cycle_id', $cycleIds)->get();

        if ($professeurMatiere) {
            $matieres->push($professeurMatiere);
        }

        return view('admin.sujet.creersujet',compact('typessujets','matieres','professeurMatiere','classes','filieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        dd($request->all());
        // Validation des données du sujet
        $validated = $request->validate([
            'type_sujet_id' => 'required',
            'filiere_id' => 'required',
            'matiere_id' => 'required',
            'classe_id' => 'required',
            'noteprincipale' => 'required|min:1',
            'heure' => 'required',
        ],
        [
            'type_sujet_id.required' => 'Le Type sujet est obligatoire.',
            'filiere_id.required' => 'La Filière est obligatoire.',
            'matiere_id.required' => 'Le Matière est obligatoire.',
            'classe_id.required' => 'La Classe est obligatoire.',
            'noteprincipale.required' => 'La noteprincipale est obligatoire.',
            'heure.required' => 'L\'heure est obligatoire.'
        ]);


        // Récupérer la matière associée
        $matiere = Matiere::find($validated['matiere_id']);

        if (!$matiere) {
            return redirect()->back()->withErrors(['matiere_error' => 'La matière sélectionnée est invalide.']);
        }

        // Générer le code pour le sujet basé sur le nom de la matière
        $latestSubject = Sujet::where('matiere_id', $matiere->id)->latest()->first();
        $count = $latestSubject ? (int) substr($latestSubject->code, -2) + 1 : 1;
        $code = strtoupper(substr($matiere->nommatiere, 0, 4)) . str_pad($count, 2, '0', STR_PAD_LEFT);

        // Calculer le total des points des réponses
        $totalPoints = 0;
        foreach ($request->input('sections', []) as $section) {
            foreach ($section['questions'] as $question) {
                foreach ($question['reponses'] as $reponse) {
                    $totalPoints += (int) $reponse['points'];
                }
            }
        }

        // Vérifier si le total des points correspond à la note principale
       /*  if ($totalPoints > $validated['noteprincipale']) {
            return redirect()->back()->withErrors(['points_error' => 'Le total des points des réponses ne doit pas dépasser la note principale du sujet.']);
        } */


        // Sauvegarder le sujet avec le statut par défaut
        $subject = Sujet::create([
            'code' => $code, // Code généré automatiquement
            'type_sujet_id' => $validated['type_sujet_id'],
            'filiere_id' => $validated['filiere_id'],
            'matiere_id' => $validated['matiere_id'],
            'classe_id' => $validated['classe_id'],
            'noteprincipale' => $validated['noteprincipale'],
            'heure' => $validated['heure'],
            'status' => 'non-corrigé',
            'user_id' => auth()->user()->id,
            'etablissement_id' => auth()->user()->etablissement_id
        ]);

        // Sauvegarder les sections, questions et réponses
        foreach ($request->input('sections', []) as $sectionData) {
            if (!empty($sectionData['titre']) && !empty($sectionData['soustitre'])) {
                $section = $subject->sections()->create([
                    'titre' => $sectionData['titre'],
                    'soustitre' => $sectionData['soustitre'],
                    'user_id' => auth()->user()->id
                ]);

                foreach ($sectionData['questions'] ?? [] as $questionData) {
                    if (!empty($questionData['libquestion'])) {
                        $question = $section->questions()->create([
                            'libquestion' => $questionData['libquestion'],
                            'user_id' => auth()->user()->id
                        ]);

                        foreach ($questionData['reponses'] ?? [] as $answerData) {
                            if (!empty($answerData['libreponse']) && !empty($answerData['points'])) {
                                // Assurez-vous que la valeur de `result` est correcte avant d'insérer
                                $resultValue = in_array($answerData['result'], ['bonne_reponse', 'mauvaise_reponse', 'mauvaise_reponse-']) ? $answerData['result'] : null;

                                $question->reponses()->create([
                                    'libreponse' => $answerData['libreponse'],
                                    'result' => $resultValue, // Utiliser la valeur validée
                                    'points' => $answerData['points'],
                                    'is_correct' => $answerData['result'] === 'bonne_reponse',
                                    'user_id' => auth()->user()->id
                                ]);
                            }
                        }

                    }
                }
            }
        }


        if (auth()->user()->role_id === 2) {
            return redirect()->route('sujet.professeur')->with('success', 'Sujet créé avec succès.');
        } elseif (auth()->user()->role_id === 3) {
            return redirect()->route('sujet.admin')->with('success', 'Sujet créé avec succès.');
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(Sujet $sujet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sujet $sujet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSujetRequest $request, Sujet $sujet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sujet $sujet)
    {
        //
    }
}
