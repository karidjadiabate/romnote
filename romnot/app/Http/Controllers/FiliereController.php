<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Http\Requests\StoreFiliereRequest;
use App\Http\Requests\UpdateFiliereRequest;
use App\Models\Niveau;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $filiere = new Filiere();

        $filieres = $filiere->listefilierebyecole();

        $fniveau = new Niveau();

        $niveaux = $fniveau->listeniveauxbyecole();

        return view('admin.filiere.listefiliere',compact('filieres','niveaux'));
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
    public function store(Request $request)
    {
        Filiere::create([
            'code' => $request->code,
            'nomfiliere' => $request->nomfiliere,
            'niveau_id' => $request->niveau_id,
            'etablissement_id' => auth()->user()->etablissement_id,
        ]);

        return to_route('filiere.index')->with('success','Filière ajoutée avec success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Filiere $filiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filiere $filiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFiliereRequest $request, Filiere $filiere)
    {
        $filiere->update([
            'code' => $request->code,
            'nomfiliere' => $request->nomfiliere,
            'niveau_id' => $request->niveau_id,
            'etablissement_id' => auth()->user()->etablissement_id,
        ]);

        return to_route('filiere.index')->with('warning', 'Filière modifiée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $filiere = Filiere::findOrFail($id);

        $filiere->delete();

        return to_route('filiere.index')->with('danger','Filière supprimée avec success!');
    }
}
