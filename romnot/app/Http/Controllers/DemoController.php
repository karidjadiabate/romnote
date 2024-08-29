<?php

namespace App\Http\Controllers;

use App\Models\Demo;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listedemandemos = Demo::latest()->get();

        return view('admin.listedemande.listedemandedemo', compact('listedemandemos'));
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
        Demo::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'nometablissement' => $request->nometablissement,
            'email' => $request->email,
            'numerotel' => $request->numerotel
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Demo $demo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demo $demo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demo $demo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demo $demo)
    {
        //
    }
}
