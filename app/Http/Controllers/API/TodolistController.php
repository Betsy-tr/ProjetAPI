<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taches = Todolist::all();

        return response()->json($taches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // La validation de données
        $this->validate($request, [
            'tache' => 'required|max:100',
        ]);

        // On crée un nouvel utilisateur
        $todolist = Todolist::create([
            'tache' => $request->tache,
            'statut' =>0
        ]);

        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($todolist, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todolist $todolist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todolist $todolist)
    {
        $todolist->update([
            "statut" => $request->statut,   
        ]);

        return response()->json(['statut'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();

        return response()->json(['statut'=>true]);
    }
}
