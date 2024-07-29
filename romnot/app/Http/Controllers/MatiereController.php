<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Http\Requests\StoreMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fmatiere = new Matiere();

        $matieres = $fmatiere->listematierebyecole();

        return view('admin.matiere.listematiere',compact('matieres'));
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
        Matiere::create([
            'nommatiere' => $request->nommatiere,
            'etablissement_id' => auth()->user()->etablissement_id,
        ]);

        return to_route('matiere.index')->with('success','Matière ajoutée avec success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matiere $matiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatiereRequest $request, Matiere $matiere)
    {
        $matiere->update([
            'nommatiere' => $request->nommatiere,
            'etablissement_id' => auth()->user()->etablissement_id,
        ]);

        return to_route('matiere.index')->with('warning', 'Matière modifiée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $matiere = Matiere::findOrFail($id);

        $matiere->delete();

        return to_route('matiere.index')->with('danger','Matière supprimée avec success!');
    }
}
