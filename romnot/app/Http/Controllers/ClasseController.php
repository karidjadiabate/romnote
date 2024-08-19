<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Http\Requests\StoreClasseRequest;
use App\Http\Requests\UpdateClasseRequest;
use App\Models\Filiere;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fclasse = new Classe();

        $filiere = new Filiere();

        $filieres = $filiere->listefilierebyecole();

        $classes = $fclasse->listeclassbyecole();

        return view('admin.classe.listeclasse',compact('classes','filieres'));
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
        Classe::create([
            'code' => $request->code,
            'nomclasse' => $request->nomclasse,
            'filiere_id' => $request->filiere_id,
            'etablissement_id' => auth()->user()->etablissement_id,
        ]);

        return to_route('classe.index')->with('success','Classe ajoutée avec success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClasseRequest $request, Classe $classe)
    {
        $classe->update([
            'code' => $request->code,
            'nomclasse' => $request->nomclasse,
            'filiere_id' => $request->filiere_id,
            'etablissement_id' => auth()->user()->etablissement_id,
        ]);

        return to_route('classe.index')->with('warning', 'Classe modifiée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);
        $classe->delete();

        return to_route('classe.index')->with('danger','Classe supprimé avec success');
    }
}
