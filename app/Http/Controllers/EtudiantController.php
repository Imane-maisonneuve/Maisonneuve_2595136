<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiant.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nom' => 'required|string|min:2|max:50',
                'adresse' => 'required',
                'telephone' => 'required|min:10|max:10',
                'email' => 'required|email|max:100',
                'date_de_naissance' => 'required|date',
                'ville_id' => 'required|exists:villes,id'
            ],
            [],
            ['ville_id' => 'Ville']
        );

        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
        ]);

        return redirect()->route('etudiant.show', $etudiant->id)->with('success', 'L’étudiant a été créé avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view('etudiant.show', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view('etudiant.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate(
            [
                'nom' => 'required|string|min:2|max:50',
                'adresse' => 'required',
                'telephone' => 'required|min:10|max:10',
                'email' => 'required|email|max:100',
                'date_de_naissance' => 'required|date',
                'ville_id' => 'required|exists:villes,id'
            ],
            [],
            ['ville_id' => 'Ville']
        );

        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
        ]);

        return redirect()->route('etudiant.show', $etudiant->id)->with('success', 'L’étudiant a été mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiant.index')->withSuccess('Étudiant supprimé avec succès!');
    }
}
