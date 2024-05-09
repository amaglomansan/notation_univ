<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::all();
        return view('admin.universites.index', compact('universities'));
    }
    public function store(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'lien' => 'nullable|string',
            'location' => 'required|string',
            'image' => 'required|string',
        ]);

        $university = new University();
        $university->name = $validatedData['name'];
        $university->description = $validatedData['description'];
        $university->lien = $validatedData['lien'];
        $university->location = $validatedData['location'];
        $university->image = $validatedData['image'];
        $university->save();

        return redirect()->route('admin.universites.index')->with('success', 'Université ajoutée avec succès!');
    }

    public function edit(University $university)
    {
        return view('admin.universites.edit', compact('university'));
    }

    public function update(Request $request, University $university)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'lien' => 'nullable|string',
            'location' => 'required|string',
            'image' => 'required|string',
        ]);

        $university->update($validatedData);

        return redirect()->route('admin.universites.index')->with('success', 'Université mise à jour avec succès!');
    }

    public function destroy(University $university)
    {
        $university->delete();

        return redirect()->route('admin.universites.index')->with('success', 'Université supprimée avec succès!');
    }


    public function indexu()
    {
        $universities = University::all();
        return view('utilisateur.universites.indexu', compact('universities'));
    }
   
}
